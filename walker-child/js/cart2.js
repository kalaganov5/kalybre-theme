const   $ = jQuery,
        cart = '.header-cart',
        overlay = '.cart-overlay',
        cartList = '.cart-list',
        close = '.cart-close',
        topBar = '.edgtf-top-bar',
        topHeader = 'header',
        ajaxURL = '/wp-admin/admin-ajax.php';


$(document).on('click', cart, function(){
    let $empty_cart = $(cartList).find('.cart-is-empty');
    let $loader = $('.cart-loader__wrap');

    $loader.show();

    // get cart data from server
    let data = {
        action: 'get_cart_items',
    };

    $.ajax({
        url: ajaxURL,
        type: 'POST',
        data: data,
        success: function(response){
            //console.log(response);
            if (response.data === null){
                return false;
            }

            let items = response.data.items,
                items_count = items.length,
                amount = response.data.amount,
                count = response.data.count,
                $cart_list = $('.cart-list-bot'),
                $cart_items = $cart_list.find('.cart-item'),
                $subtotal = $('.cart-subtotal').find('.price');

            // clear cart items
            $cart_items.remove();

            // insert data into the cart
            $cart_list.prepend(items);
            $subtotal.html(amount);

            // if cart is empty - show empty cart text
            if (items_count === 0){
                $empty_cart.show();
            } else {
                $empty_cart.hide();
            }

            $loader.hide();
        }
    });

    $(cart).addClass('show');
    $(overlay).addClass('show');
    $(cartList).addClass('show');
    $(topBar).hide();

    makeHtmlFixed(true);

    return false;
});

/**
 * Cart widget overlay click
 */
$(document).on('click', overlay, function(){
    $(cartList).removeClass('show');
    $(overlay).removeClass('show');
    $(topBar).show();

    makeHtmlFixed(false);
});

/**
 * Cart widget close button click (X)
 */
$(document).on('click', close, function(){
    $(cart).removeClass('show');
    $(overlay).removeClass('show');
    $(cartList).removeClass('show');
    $(topBar).show();

    makeHtmlFixed(false);
});

/**
 * Positioning html element
 * when cart widget is open / closed
 *
 * @param arg
 */
function makeHtmlFixed(arg){
    let body = $('html'),
        cartList = $('.cart-list'),
        scrollY;

    switch (arg){
        case true:
            // when the modal is shown, we want a fixed body
            scrollY = document.documentElement.style.getPropertyValue('--scroll-y');
            body.css('position', 'fixed');
            body.css('top', `-${scrollY}`);
            cartList.css('margin-top', body.css('margin-top'));
        break;

        case false:
            // when the modal is hidden, we want to remain at the top of the scroll position
            scrollY = body.css('top');
            body.css('position', '');
            body.css('top', '');
            cartList.css('margin-top', 0);
            window.scrollTo(0, parseInt(scrollY || '0') * -1);
        break;

        default:
            // remember last scroll position
            document.documentElement.style.setProperty('--scroll-y', `${window.scrollY}px`);
        break;
    }
}

$(window).on('scroll', function(event){
    makeHtmlFixed();
});

/**
 * Choose product sizes in product card
 */
$(document).on('click', '.size', function(){
    let $card = $(this).closest('.product')
    let $quick_add = $card.find('.quick-add');
    let product_id = $(this).attr('data-id');

    $quick_add.removeClass('quick-add-click')
    $quick_add.find('.quick-add__caption').html('Quick Add');
    $quick_add.addClass('quick-add-active')
    $quick_add.removeAttr('disabled');
    $quick_add.attr('data-product-id', product_id);

    $card.find('.size').removeClass('size-active');
    $(this).addClass('size-active');
});

/**
 * Show widget cart after add item to cart
 * (on the product detail page)
 */
/*$(document).on('click', '.single_add_to_cart_button', function(){
    let $button = $(this);
    $(cart).addClass('show');
    $(overlay).addClass('show');
    $(cartList).addClass('show');
    $(topBar).hide();
    $button.prop('disabled', true);
    //$button.html("Adding <i class='fa fa-circle-o-notch fa-spin' style='font-size:13px'></i>");

    // catching the completion of the add to cart request
    $(document).ajaxComplete(function( event, xhr, settings ) {
        if (settings.url === '/?wc-ajax=add_to_cart'){
            $button.html('Add to cart');
            $button.removeAttr('disabled');

            // show cart widget
            $(cart).click();
        }
    });
});*/

/**
 * Quick add button click in product card
 *
 * @param elem
 */
function quickAddToCart(elem){
    let $quick_add = $(elem);
    let has_variations = !$quick_add.hasClass('no-variations');
    let product_id = $quick_add.attr('data-product-id');
    let $card = $quick_add.closest('.product');
    let cart_link = $quick_add.attr('href');

    // skipping processing if the product ID is empty
    if (has_variations && product_id === ''){
        return false;
    }

    if (!has_variations){
        $quick_add.removeAttr('disabled').addClass('quick-add-active');
    }

    // show loading
    $quick_add.addClass('quick-add--loading');
    $quick_add.find('.quick-add__loader').css('display', 'block');
    $quick_add.find('.quick-add__caption').hide();
    $quick_add.prop('disabled', true);

    // if the item has already been added
    // redirect to cart
    if ($quick_add.hasClass('quick-add-click')){
        window.location.href = cart_link;
        return false;
    }

    $card.find('.size').removeClass('size-active');

    // get cart data from server
    let data = {
        action: 'quick_add_to_cart',
        product_id: product_id
    };

    $.ajax({
        url: ajaxURL,
        type: 'POST',
        data: data,
        success: function (response) {
            //console.log(response);

            // show loading
            $quick_add
                .removeClass('quick-add--loading')
                .addClass('quick-add-click')
                .removeAttr('disabled');

            $quick_add.find('.quick-add__loader').css('display', 'none');
            $quick_add.find('.quick-add__caption').show().html('View cart');

            // open cart widget
            $(cart).click();
        }
    });
}

/**
 * Delete product from cart widget
 *
 * @param elem
 * @param item_key
 */
function deleteCartItem(elem, item_key){
    let $cart = $('.cart-list'),
        $empty_cart = $cart.find('.cart-is-empty'),
        $item = $(elem).closest('.cart-item'),
        $amount = $('.cart-subtotal-amount');

    $item.remove();
    let items_count = $cart.find('.cart-item').length;
    if (items_count === 0){
        $empty_cart.show();
        $amount.html('0.00');
    }

    let data = {
        action: 'delete_cart_item',
        item_key: item_key
    };

    $.ajax({
        url: ajaxURL,
        type: 'POST',
        data: data,
        success: function(response){
            let amount = response.data;
            $amount.html(amount);
        }
    });
}
