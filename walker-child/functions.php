<?php

/*** Child Theme Function  ***/

function walker_edge_child_theme_enqueue_scripts() {
	wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css', '', '6465435513535'  );
	wp_enqueue_style( 'childstyle' );
}


add_action('wp_enqueue_scripts', 'walker_edge_child_theme_enqueue_scripts', 11);


/**
 * Loades all modules by going through all folders that are placed directly in modules folder
 * and loads load.php file in each. Hooks to walker_edge_after_options_map action
 *
 * @see http://php.net/manual/en/function.glob.php
 */
add_action('walker_edge_before_options_map', 'walker_child_edge_load_modules');
function walker_child_edge_load_modules() {
    foreach(glob( get_stylesheet_directory() . '/framework/modules/*/load.php') as $module_load) {
        include_once $module_load;
    }
}


// External jQuery

function my_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('scripts', get_stylesheet_directory_uri().'/js/scripts.js', array('jquery'), '6434654556445', false);
    wp_enqueue_script('cart', get_stylesheet_directory_uri().'/js/cart.js', array('jquery'), false, false);
}

add_action( 'wp_enqueue_scripts', 'my_scripts' );


/* Newsletter Signup */

add_action('woocommerce_after_checkout_billing_form', 'checkbox_custom_checkout_field');

function checkbox_custom_checkout_field( $checkout ) {
	echo '<div class="custom_checkbox"><h3>'.__('Kalybre Newsletter').'</h3>';
	woocommerce_form_field( 'custom_checkbox', array(
	'type'          => 'checkbox',
	'class'         => array('checkbox_field'),
	'label'         => __('Newsletter Signup?'),
	'checked'       => 'checked',
	'default'       => 1,
	'required'  => true,
	), $checkout->get_value( 'custom_checkbox' ));
	echo '</div>';

	echo '<small class="signmeup">You can unsubscribe at any time. See our <a href="/privacy-policy/" title="Privacy Policy" class="pp" target="_blank">Privacy Policy</a>.</small>';
}

/* Process Checkout */

add_action('woocommerce_checkout_process', 'checkbox_custom_checkout_process');

function checkbox_custom_checkout_process() {
	global $woocommerce;

/* Send Error If Not Set */

	if (!$_POST['custom_checkbox'])
	wc_add_notice( __( 'Please subscribe to our newsletter!' ), 'error' );
}


/* Update Order Meta With Field Value */

add_action('woocommerce_checkout_update_order_meta', 'checkbox_custom_checkout_order_meta');

function checkbox_custom_checkout_order_meta( $order_id ) {
	if ($_POST['custom_checkbox']) update_post_meta( $order_id, 'checkbox name', esc_attr($_POST['custom_checkbox']));
}

/* Use AED Currency */

add_filter( 'woocommerce_currencies', 'add_aed_currency' );

function add_aed_currency( $currencies ) {
   $currencies['AED'] = __( 'UAE Dirham', 'woocommerce' );
   return $currencies;
}


/* Add AED Currency Symbol */


add_filter('woocommerce_currency_symbol', 'add_aed_currency_symbol', 10, 2);

function add_aed_currency_symbol( $currency_symbol, $currency ) {
  switch( $currency ) {
  case 'AED': $currency_symbol = 'AED'; break;
  }
 return $currency_symbol;
}


add_filter( 'woocommerce_paypal_supported_currencies', 'add_aed_paypal_valid_currency' );

function add_aed_paypal_valid_currency( $currencies ) {
   array_push ( $currencies , 'AED' );
   return $currencies;
}

/* Convert For Paypal Checkout */

add_filter('woocommerce_paypal_args', 'convert_aed_to_usd', 11 );

function get_currency($from_Currency='USD', $to_Currency='AED') {
    $url = "http://www.google.com/finance/converter?a=1&from=$from_Currency&to=$to_Currency";
    $ch = curl_init();
    $timeout = 0;
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_USERAGENT,
    "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $rawdata = curl_exec($ch);
    curl_close($ch);
    $data = explode('bld>', $rawdata);
    $data = explode($to_Currency, $data[1]);
    return round($data[0], 2);
}

function convert_aed_to_usd($paypal_args){
    if ( $paypal_args['currency_code'] == 'AED'){
	$convert_rate = get_currency(); //Set converting rate
	$paypal_args['currency_code'] = 'USD'; //change AED to USD

    $i = 1;

        while (isset($paypal_args['amount_' . $i])) {
            $paypal_args['amount_' . $i] = round( $paypal_args['amount_' . $i] / $convert_rate, 2);
            ++$i;
        }

		if ( $paypal_args['shipping_1'] > 0 ) {
			$paypal_args['shipping_1'] = round( $paypal_args['shipping_1'] / $convert_rate, 2);
		}

		if ( $paypal_args['discount_amount_cart'] > 0 ) {
			$paypal_args['discount_amount_cart'] = round( $paypal_args['discount_amount_cart'] / $convert_rate, 2);
		}

		if ( $paypal_args['tax_cart'] > 0 ) {
  			$paypal_args['tax_cart'] = round( $paypal_args['tax_cart'] / $convert_rate, 2);
		}

	}
return $paypal_args;
}



/* Auto Update order status Paypal Checkout */


function update_wc_order_status($posted) {
    $order_id = isset($posted['invoice']) ? $posted['invoice'] : '';
    if(!empty($order_id)) {
        $order = new WC_Order($order_id);
        $order->update_status('completed');
    }
}

add_action('paypal_ipn_for_wordpress_payment_status_completed', 'update_wc_order_status', 10, 1);
add_filter('autoptimize_filter_cachecheck_sendmail','__return_false');

/*Set default checkbox terms*/
add_filter( 'woocommerce_terms_is_checked_default', '__return_true' );

//Remove prettyPhoto lightbox
add_action( 'wp_enqueue_scripts', 'fc_remove_woo_lightbox', 9999 );
function fc_remove_woo_lightbox() {
    remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
        wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
        wp_dequeue_script( 'prettyPhoto' );
        wp_dequeue_script( 'prettyPhoto-init' );
}


/*Set default United Arab Emirates in checkout*/
add_filter('woocommerce_checkout_fields', 'my_woocommerce_checkout_fields');
add_filter('woocommerce_billing_fields', 'my_woocommerce_billing_fields');
function my_woocommerce_checkout_fields($fields) {
  $fields['billing'] = my_woocommerce_billing_fields($fields['billing']);
  return $fields;
}
function my_woocommerce_billing_fields($fields) {
  $fields['billing_state']['default'] = 'United Arab Emirates';
  return $fields;
}
/*Change text Continue Shopping */
add_filter( 'gettext', 'wpc_translations', 99, 2 );
function wpc_translations( $translation, $text ) {
	if ( $text === 'Continue Shopping' ) {
		return 'Checkout';
	}

	return $translation;
}

// cart widget
add_action('wp_ajax_get_cart_items', 'get_cart_items_callback');
add_action('wp_ajax_nopriv_get_cart_items', 'get_cart_items_callback');

add_action('wp_ajax_delete_cart_item', 'delete_cart_item_callback');
add_action('wp_ajax_nopriv_delete_cart_item', 'delete_cart_item_callback');

add_action('wp_ajax_quick_add_to_cart', 'quick_add_to_cart_callback');
add_action('wp_ajax_nopriv_quick_add_to_cart', 'quick_add_to_cart_callback');

add_action( 'init', 'custom_vs_widgets_callback' );

/**
 * Custom carousel VC widget for main page
 */
function custom_vs_widgets_callback() {
    require_once(get_stylesheet_directory().'/vc-elements/manu-products-carousel.php');
}

if (!function_exists('get_cart_items_callback')){
    /**
     * Providing a list of cart items to the frontend
     * for inserting them into the cart widget
     */
    function get_cart_items_callback(){
        global $woocommerce;

        $items = $woocommerce->cart->get_cart();
        $cart = array();
        $currency = get_woocommerce_currency();
        $cart['amount'] = $woocommerce->cart->cart_contents_total;
        $cart['amount'] = number_format($cart['amount'], 2, '.', '.');
        $cart['amount'] = "$currency <span class='cart-subtotal-amount'>{$cart['amount']}</span>";
        $cart['count'] = count($woocommerce->cart->get_cart());
        $cart['items'] = '';

        foreach ($items as $key => $values){
            $id = $values['data']->get_id();
            $wc_item = wc_get_product($id);

            $name = $wc_item->get_name();
            $price = get_post_meta($values['product_id'] , '_price', true);
            $price = number_format($price, 2, '.', '.');
            $quantity = $values['quantity'];
            $image_id = $wc_item->get_image_id() ? $wc_item->get_image_id() : wc_placeholder_img_src();
            $image = wp_get_attachment_image_src($image_id, array(100, 100));
            $image = $image[0];

			$price         = $wc_item->get_price();
			$regular_price = $wc_item->get_sale_price() && $wc_item->get_regular_price() ? $currency.' '.$wc_item->get_regular_price() : '';

            $cart['items'] .= "
                <div class='cart-item'>
                    <div class='cart-item-img'>
                        <img src='{$image}' alt='{$name}'>
                    </div>

                    <div class='cart-item-descr'>
                        <div class='cart-item-title'>{$name}</div>
                        <div>
                            <span>{$quantity}</span>
                            <span>x</span>
							<span class='price-old'>{$regular_price}</span>
                            <span class='price'>{$currency} {$price}</span>
                        </div>
                    </div>

                    <div class='wrapper-close' onclick='deleteCartItem(this, \"{$key}\")'>
                        <div class='cart-item-close'></div>
                    </div>
                </div>
            ";
        }

        wp_send_json_success($cart, 200);
    }
}

if (!function_exists('delete_cart_item_callback')){
    /**
     * Deleting item from cart (request from cart widget)
     *
     * @return bool
     */
    function delete_cart_item_callback(){
        global $woocommerce;

        $item_key = isset($_REQUEST['item_key']) ? $_REQUEST['item_key'] : '';

        if ($item_key == ''){
            return false;
        }

        $woocommerce->cart->remove_cart_item($item_key);

        // recalc items amount
        $amount = $woocommerce->cart->cart_contents_total;
        $amount = number_format($amount, 2, '.', '.');

        wp_send_json_success($amount, 200);
    }
}


if (!class_exists('newMiniCartWidget')){
    /**
     * Mini cart widget
     *
     * Class newMiniCartWidget
     */
    class newMiniCartWidget extends WP_Widget {
        function __construct() {
            parent::__construct(
                'new_mini_cart_widget',
                'Mini cart widget',
                array( 'description' => 'Mini cart widget for products view.' )
            );
        }

        public function widget( $args, $instance ) {
            echo $args['before_widget'];

            global $woocommerce;

            $items = $woocommerce->cart->get_cart();
            $cart_count = count($woocommerce->cart->get_cart());
            $cart_amount = $woocommerce->cart->cart_contents_total;
            $cart_amount = number_format($cart_amount, 2, '.', '.');
            $currency = get_woocommerce_currency();
        ?>

            <!-- cart icon -->
            <a class="header-cart show" href="/cart">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </a>

            <div class="cart-overlay"></div>

            <div class="cart-list">
                <!-- loader -->
                <div class="cart-loader__wrap">
                    <div class="cart-loader">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>

                <div class="cart-list-top">
                    <div class="cart-close"></div>
                    <span class="cart-title">
                        <?php echo __('cart')?>
                    </span>
                    <p class="cart-descr cart-is-empty">
                        <?php echo __('No products in the cart')?>.
                    </p>
                </div>

                <div class="cart-list-bot">
                    <div class="cart-subtotal">
                        <div class="cart-line cart-line-subtotal"></div>

                        <span><?php echo __('Subtotal')?>:</span>
                        <span class="price price-black">
                            <?php echo $currency?> <span class="cart-subtotal-amount"><?php echo $cart_amount?></span>
                        </span>

                    </div>

                    <div class="cart-info">
                        <a href="<?php echo wc_get_cart_url()?>" style="color:#fff !important;" class="cart-link"><?php echo __('view cart')?></a>
                        <a href="<?php echo wc_get_checkout_url()?>" style="color:#fff !important;" class="cart-link"><?php echo __('checkout')?></a>
                    </div>

                </div>
            </div>

            <?php echo $args['after_widget'];
        }

        public function form( $instance ) {

        }

        public function update( $new_instance, $old_instance ) { ?>

        <?php }
    }
}

if (!function_exists('new_mini_cart_widget_load')){
    /**
     * Init mini cart widget
     */
    function new_mini_cart_widget_load()
    {
        register_widget('newMiniCartWidget');
    }

    add_action( 'widgets_init', 'new_mini_cart_widget_load' );
}


if (!function_exists('quick_add_to_cart_callback')){
    function quick_add_to_cart_callback(){
        global $woocommerce;
        $product_id = $_POST['product_id'];

        if (!isset($product_id)){
            wp_send_json_error(__('The product ID is empty'), 501);
        }

        $added = $woocommerce->cart->add_to_cart(
            $product_id,
            $quantity = 1,
            $variation_id = 0,
            $variation = array(),
            $cart_item_data = array()
        );

        #wp_send_json_success(__('The product was added'), 200);
        wp_send_json_success($added, 200);
    }
}


add_action( 'wp_ajax_previews_load', 'previews_load' );
add_action( 'wp_ajax_nopriv_previews_load', 'previews_load' );

function previews_load(){
    $c_id = (int)$_POST['id'];
    if ($c_id) {
        $comment = get_comment($c_id);
        if ($comment) {
            $comment_stars = get_comment_meta($comment->comment_ID, 'rating');
            //print_r( $comment ); ?>
            <div class="mreviews__head">
                <div class="mreviews__name"><?= $comment->comment_author; ?></div>
                <div class="mreviews__date"><?= date('F d, Y', strtotime($comment->comment_date)); ?></div>
            </div>
            <?php if($comment_stars){ ?>
            <div class="mreviews__stars">
                <?= str_repeat('<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.4155 4.82756L7.94421 4.32307L6.39245 1.17717C6.35007 1.09104 6.28034 1.02131 6.19421 0.97893C5.9782 0.872289 5.7157 0.961156 5.60769 1.17717L4.05593 4.32307L0.584642 4.82756C0.488939 4.84123 0.401439 4.88635 0.334446 4.95471C0.253457 5.03795 0.208827 5.14995 0.210366 5.26608C0.211904 5.38221 0.259483 5.49298 0.34265 5.57405L2.85417 8.02268L2.26081 11.4803C2.2469 11.5607 2.2558 11.6435 2.28651 11.7191C2.31721 11.7947 2.36849 11.8602 2.43454 11.9082C2.50058 11.9562 2.57875 11.9847 2.66017 11.9905C2.74159 11.9963 2.82301 11.9792 2.89519 11.941L6.00007 10.3086L9.10495 11.941C9.18972 11.9862 9.28816 12.0012 9.38249 11.9848C9.62038 11.9438 9.78034 11.7182 9.73933 11.4803L9.14597 8.02268L11.6575 5.57405C11.7259 5.50706 11.771 5.41956 11.7846 5.32385C11.8216 5.08459 11.6548 4.86311 11.4155 4.82756Z" fill="black"/></svg>', $comment_stars[0]); ?>
            </div>
            <?php } ?>
            <div class="mreviews__text">
                <?= $comment->comment_content; ?>
            </div>
        <?php }
    }

    wp_die();
}


add_action( 'wp_ajax_addreviews_load', 'addreviews_load' );
add_action( 'wp_ajax_nopriv_addreviews_load', 'addreviews_load' );

function addreviews_load(){

    $id = $_POST['id'];
    $name = htmlspecialchars($_POST['name']);
    $comment = htmlspecialchars($_POST['comment']);
    $email = htmlspecialchars($_POST['email']);
    $rating = htmlspecialchars($_POST['rating']);

    if ($id && $name && $email && $comment) {

        $data = [
            'comment_post_ID' => $id,
            'comment_author' => $name,
            'comment_author_email' => $email,
            'comment_content' => $comment,
            'comment_approved' => 0
        ];

        $comment_id = wp_insert_comment( wp_slash($data) );

        if ($rating) {
            update_comment_meta($comment_id, 'rating', $rating);
        }

        wp_send_json([
            'success' => true,
            'message' => 'The comment will be added after verification'
        ]);

    } else {
        wp_send_json([
            'success' => false,
            'message' => 'Fill in all required fields'
        ]);
    }

    wp_die();
}

add_filter( 'woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);
function sb_woo_remove_reviews_tab($tabs) {
    unset($tabs['reviews']);
    return $tabs;
}


if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Settings table & delivery',
        'menu_title'    => 'Settings table & delivery',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

// custom order input checkout page
add_filter("woocommerce_checkout_fields", "custom_override_checkout_fields", 1);
function custom_override_checkout_fields($fields) {
	$fields['billing']['billing_email']['priority'] = 3;
	$fields['billing']['billing_phone']['priority'] = 4;
    return $fields;
}

add_filter( 'woocommerce_default_address_fields', 'custom_override_default_locale_fields' );
function custom_override_default_locale_fields( $fields ) {
	$fields['first_name']['priority'] = 1;
    $fields['last_name']['priority'] = 2;
    $fields['country']['priority'] = 5;
    $fields['state']['priority'] = 6;
	$fields['city']['priority'] = 7;
    $fields['address_1']['priority'] = 8;
    $fields['address_2']['priority'] = 9;
    $fields['postcode']['priority'] = 10;
    return $fields;
}

// Limit number of cross sells items on cart page in WooCommerce
add_filter('woocommerce_cross_sells_total', 'cartCrossSellTotal');
function cartCrossSellTotal($total) {
	$total = '4';
	return $total;
}



/**
 * Show sale prices at the checkout.
 */
function my_custom_show_sale_price_at_checkout( $subtotal, $cart_item, $cart_item_key ) {

	/** @var WC_Product $product */
	$product = $cart_item['data'];
	$quantity = $cart_item['quantity'];

	if ( ! $product ) {
		return $subtotal;
	}

	$regular_price = $sale_price = $suffix = '';

	if ( $product->is_taxable() ) {

		if ( 'excl' === WC()->cart->tax_display_cart ) {

			$regular_price = wc_get_price_excluding_tax( $product, array( 'price' => $product->get_regular_price(), 'qty' => $quantity ) );
			$sale_price    = wc_get_price_excluding_tax( $product, array( 'price' => $product->get_sale_price(), 'qty' => $quantity ) );

			if ( WC()->cart->prices_include_tax && WC()->cart->tax_total > 0 ) {
				$suffix .= ' <small class="tax_label">' . WC()->countries->ex_tax_or_vat() . '</small>';
			}
		} else {

			$regular_price = wc_get_price_including_tax( $product, array( 'price' => $product->get_regular_price(), 'qty' => $quantity ) );
			$sale_price = wc_get_price_including_tax( $product, array( 'price' => $product->get_sale_price(), 'qty' => $quantity ) );

			if ( ! WC()->cart->prices_include_tax && WC()->cart->tax_total > 0 ) {
				$suffix .= ' <small class="tax_label">' . WC()->countries->inc_tax_or_vat() . '</small>';
			}
		}
	} else {
		$regular_price    = $product->get_price() * $quantity;
		$sale_price       = $product->get_sale_price() * $quantity;
	}

	if ( $product->is_on_sale() && ! empty( $sale_price ) ) {
		$price = wc_format_sale_price(
			         wc_get_price_to_display( $product, array( 'price' => $product->get_regular_price(), 'qty' => $quantity ) ),
			         wc_get_price_to_display( $product, array( 'qty' => $quantity ) )
		         ) . $product->get_price_suffix();
	} else {
		$price = wc_price( $regular_price ) . $product->get_price_suffix();
	}

	// VAT suffix
	$price = $price . $suffix;

	return $price;

}
add_filter( 'woocommerce_cart_item_subtotal', 'my_custom_show_sale_price_at_checkout', 10, 3 );


/*Show Total Savings on Cart and Checkout Page*/
function wc_discount_total() {
   global $woocommerce;
    $discount_total = 0;

    foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values) {

    $_product = $values['data'];

        if ( $_product->is_on_sale() ) {
        $regular_price = $_product->get_regular_price();
        $sale_price = $_product->get_sale_price();
        $discount = ($regular_price - $sale_price) * $values['quantity'];
        $discount_total += $discount;
        }
    }
    if ( $discount_total > 0 ) {
    echo '<tr class="cart-discount">
    <th>'. __( 'Your Savings', 'woocommerce' ) .'</th>
    <td data-title=" '. __( 'You Saved', 'woocommerce' ) .' ">'
    . wc_price( $discount_total + $woocommerce->cart->discount_cart ) .'</td>
    </tr>';
    }
}
add_action( 'woocommerce_cart_totals_after_order_total', 'wc_discount_total', 99);
add_action( 'woocommerce_review_order_after_order_total', 'wc_discount_total', 99);


