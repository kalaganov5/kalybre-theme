jQuery(document).ready(function($) {
	$(document)
		.on('click', '.item-descr ul li', function(){
		    var reg  = parseInt( $(this).data('price_reg') ),
				sale = parseInt( $(this).data('price_sale') ),
				curr = $(this).data('currency');

			var box  = $(this).closest('.item-descr');
			if( reg == sale ) {
				box.find('span.price').html( curr + ' ' + reg );
				box.find('span.price-sale').html('');
			}
			if( reg > sale ) {
				box.find('span.price').html( curr + ' ' + sale );
				box.find('span.price-sale').html( curr + ' ' + reg );
			}
		});

    $('button.news').click(function() {
        $('#news_drop').slideToggle('slow');
    });

    /**
     * Slider for custom VC-widgets
     */
    if ( $('.custom-products-slider').length) {
        let carousel = $('.custom-products-slider'),
            numberOfItems = (carousel.data('number-of-visible-items') !== '') ? parseInt(carousel.data('number-of-visible-items')) : 3,
            autoplay = (carousel.data('autoplay') === 'yes') ? true : false,
            autoplayTimeout = (carousel.data('autoplay-timeout') !== '') ? parseInt(carousel.data('autoplay-timeout')) : 5000,
            loop = (carousel.data('loop') === 'yes') ? true : false,
            speed = (carousel.data('speed') !== '') ? parseInt(carousel.data('speed')) : 650,
            margin = (carousel.hasClass('edgtf-normal-space')) ? 30 : 10,
            navigation = (carousel.data('navigation') === 'yes') ? true : false,
            pagination = (carousel.data('pagination') === 'yes') ? true : false;

        let responsiveItems1 = numberOfItems;
        let responsiveItems2 = 3;
        let responsiveItems3 = 2;

        if (numberOfItems > 4) {
            responsiveItems1 = 4;
        }

        if (numberOfItems < 3) {
            responsiveItems2 = numberOfItems;
            responsiveItems3 = numberOfItems;
        }

        if (numberOfItems === 1) {
            margin = 0;
        }

        carousel.owlCarousel({
            items: numberOfItems,
            autoplay: autoplay,
            autoplayTimeout: autoplayTimeout,
            autoplayHoverPause: true,
            loop: loop,
            smartSpeed: speed,
            margin: margin,
            nav: navigation,
            navText: [
                '<span class="edgtf-prev-icon"><span class="edgtf-icon-arrow icon-arrows-left"></span><span class="edgtf-nav-label edgtf-prev-label">PREV</span></span>',
                '<span class="edgtf-next-icon"><span class="edgtf-nav-label edgtf-next-label">NEXT</span><span class="edgtf-icon-arrow icon-arrows-right"></span></span>'
            ],
            dots: pagination,
            mouseDrag:true,
            touchDrag: true,
            responsive:{
                1200:{
                    items: numberOfItems
                },
                1024:{
                    items: responsiveItems1
                },
                769:{
                    items: responsiveItems2
                },
                601:{
                    items: responsiveItems3
                },
                0:{
                    items: 1
                }
            }
        });
    }

    $('.sizetable__button').click(function(e){
        e.preventDefault();

        $('html').addClass('sizetable__scroll');
        $('.sizetable__popup').fadeIn(200);

    });

    $('.sizetable__close, .sizetable__popup-bg, .sizetable__popup-close').click(function(e){
        e.preventDefault();

        $('html').removeClass('sizetable__scroll');
        $('.sizetable__popup').fadeOut(200);

    });

    $('.tabs__head').click(function(e){
        e.preventDefault();

        $(this).toggleClass('active');
        $(this).next().slideToggle(200);
    });

    $('.previews__slider').slick({
        infinite: true,
        /*slidesToShow: 2,
        slidesToScroll: 2,*/
        adaptiveHeight: true,
        prevArrow: $('.previews__arrow_left'),
        nextArrow: $('.previews__arrow_right'),
        responsive: [
            {
                breakpoint: 5000,
                settings: {
                    slidesToShow: 2,
                    slidesToShow: 2,
                }
            },        
            {
                breakpoint: 1280,
                settings: {
                    slidesToShow: 2,
                    slidesToShow: 2,
                }
            },   
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToShow: 1,
                }
            }
        ]
    });

    $('.previews__item').click(function(e){
        e.preventDefault();

        let id = $(this).data('id');

        //$('html').addClass('sizetable__scroll');
        //$('.mreviews').fadeIn(200);
        if (id) {
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                data: {
                    id: id,
                    action: 'previews_load'
                },
                type:'POST',
            }).done(function(result){

                //console.log(result);

                if (result) {
                    $('.mreviews__load').html(result);
                    $('html').addClass('sizetable__scroll');
                    $('.mreviews').fadeIn(200);
                }
            });
        }

    });

    $('.previews__popup-bg, .previews__popup-close').click(function(e){
        e.preventDefault();

        $('html').removeClass('sizetable__scroll');
        $('.mreviews').fadeOut(200);

    });

    $('.previews__head a').click(function(e){
        e.preventDefault();

        $('html').addClass('sizetable__scroll');
        $('.addreviews').fadeIn(200);

    });

    $('.addreviews .previews__popup-bg, .addreviews .previews__popup-close').click(function(e){
        e.preventDefault();

        $('html').removeClass('sizetable__scroll');
        $('.addreviews').fadeOut(200);

    });

    $('.addreviews__rating-input input').change(function(){

        $('.addreviews__rating-input').removeClass('checked');

        $(this).parent().addClass('checked');
        $(this).parent().prevAll().addClass('checked');
    });

    $('.addreviews__button a').click(function(e){
        e.preventDefault();

        let form_button = $(this);

        if (form_button.hasClass('clicked'))
            return false;

        let form = $(this).closest('.addreviews__form'),
            product_id = $(this).data('id'),
            name = form.find('input[name="name"]'),
            email = form.find('input[name="email"]'),
            comment = form.find('textarea[name="comment"]'),
            rating = form.find('.addreviews__rating-input.checked').length,
            form_message = form.find('.addreviews__message'),
            pattern_mail = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        form_button.addClass('clicked');
        $('input.error, textarea.error').removeClass('error');

        if (name.val() == '') {
            name.addClass('error');
        }

        if (comment.val() == '') {
            comment.addClass('error');
        }

        if (email.val() == '') {
            email.addClass('error');
        } else {
            if (!pattern_mail.test(email.val())) {
                email.addClass('error');
            }
        }

        //$('html').addClass('sizetable__scroll');
        //$('.mreviews').fadeIn(200);
        if(form.find('input.error').length == 0 && form.find('textarea.error').length == 0) {
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                data: {
                    id: product_id,
                    name: name.val(),
                    comment: comment.val(),
                    email: email.val(),
                    rating: rating,
                    action: 'addreviews_load'
                },
                type:'POST',
            }).done(function(result){

                if (result.success == true) {
                    form_message.html(result.message).addClass('success').slideDown(200);
                    name.val('');
                    comment.val('');
                    email.val('');
                    $('.addreviews__rating-input').removeClass('checked');
                } else {
                   form_message.html(result.message).addClass('fail').slideDown(200); 
                }

                form_button.removeClass('clicked');
            });
        } else {
            form_button.removeClass('clicked');
        }

    });


    if ($(window).width() <= 767) {
        /*$('.related .products').slick({
            infinite: true,
            slide: 'li',
            adaptiveHeight: true,
            prevArrow: $('.previews__arrow_left'),
            nextArrow: $('.previews__arrow_right'),
            responsive: [
                {
                    breakpoint: 5000,
                    settings: {
                        slidesToShow: 2,
                        slidesToShow: 2,
                    }
                },        
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToShow: 1,
                    }
                }
            ]
        });*/
    }

});

/**
 * Carousel in product card
 */
jQuery(document).on('click', '.img-pagination', function(){
    let $slider = jQuery(this).closest('.slider');
    let $dots_wrap = jQuery(this).closest('.wrapper-img-pagination');
    let $dots = $dots_wrap.find('.img-pagination');
    let index = jQuery(this).index();

    $dots.removeClass('img-pagination-active');
    jQuery(this).addClass('img-pagination-active');
    $slider.find('.item-img').removeClass('item-img-active');
    $slider.find('.item-img:eq('+index+')').addClass('item-img-active');
});

/*jQuery(document).on('click', '.item .item-img-wrapper a', function(){
    let $slider = jQuery(this).closest('.slider');
    let $next_dot = $slider.find('.img-pagination-active').next('.img-pagination');
    $next_dot = $next_dot.length ? $next_dot : $slider.find('.img-pagination:first-child');

    $next_dot.click();
});*/
