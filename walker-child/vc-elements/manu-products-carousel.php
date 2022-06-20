<?php
    /**
    * Element Description: VC MANU Products Carousel
    */

    // Element Class
    class manuProductsCarousel extends WPBakeryShortCode {
        function __construct() {
            add_action( 'vc_before_init', array( $this, 'vc_infobox_mapping' ) );
            add_shortcode( 'vc_manu_products_carousel', array( $this, 'vc_infobox_html' ) );
        }

        // Element HTML
        public function vc_infobox_html($atts) {
            #global $woocommerce;

            // Params extraction
            extract(
                shortcode_atts(
                    array(
                        'sort'   => '',
                    ),
                    $atts
                )
            );

            // Fill $html var with data
            $html = '
                <div class="edgtf-plc-holder edgtf-navigation-image edgtf-standard-type edgtf-small-space custom-products-slider" data-number-of-visible-items="4" data-autoplay="yes" data-autoplay-timeout="3000" data-loop="yes" data-speed="1000" data-navigation="yes" data-pagination="no">';

            $products = wc_get_products(array(
                'category' => array($sort),
            ));

            if (empty($products)){
                $products = wc_get_products(array(
                    'tag' => array($sort),
                ));
            }

            foreach ($products as $product){
                // fill prices
                $currency = get_woocommerce_currency();
                $price = $currency.' '.$product->get_price();
                $sale_price = $product->get_sale_price() != '' ? $currency.' '.$product->get_sale_price() : '';

                // fill sizes
                $sizes = '';
                $variations = new WC_Product_Variable($product->get_id());
                $variations = $variations->get_available_variations();
                foreach ($variations as $variation){
                    $size_symbol = $variation['attributes']['attribute_pa_size'];
                    $size_id = $variation['variation_id'];
                    $sizes .= "<li data-id='{$size_id}' class='size'>{$size_symbol}</li>";
                }

                // fill gallery
                $gallery = '';
                $dots = '';

                $attachment_ids = $product->get_gallery_image_ids();
                array_unshift($attachment_ids, $product->get_image_id());
                $product_permakink = get_the_permalink($product->get_id());
                foreach ($attachment_ids as $index => $attachment_id){
                    $image_link = wp_get_attachment_image_url($attachment_id, array(600, 900));
                    $image_class = $index == 0 ? 'item-img  item-img-active' : 'item-img';
                    $dots_class = $index == 0 ? 'img-pagination img-pagination-active' : 'img-pagination';

                    $gallery .= "
                        <a href='{$product_permakink}'>
                            <img src='{$image_link}' class='{$image_class}' alt='{$product->get_title()}'>
                        </a>
                    ";

                    $dots .= "<div class='{$dots_class}'></div>";
                }

                // check product variations / sizes
                $is_no_variations = count($variations) == 0 ? 'no-variations quick-add-active' : '';
                $data_product_id = $is_no_variations ? $product->get_id() : '';

                $permalink = get_permalink($product->get_id());

                $html .= "
                    <div class='product item'>
                        <div class='slider'>
                            <div class='item-img-wrapper'>
                                {$gallery}
                            </div>
                            <div class='wrapper-img-pagination'>
                                {$dots}
                            </div>
                        </div>
            
                        <div class='item-descr'>
                            <ul>
                                {$sizes}
                            </ul>
                            
                            <div class='item-info'>{$product->get_title()}</div>
                            
                            <div class='item-info'>
                                <span class='price price-sale'>{$sale_price}</span>
                                <span class='price'>{$price}</span>
                            </div>
                            
                            <div class='item-links'>
                                <a href='".wc_get_cart_url()."' data-product-id='{$data_product_id}' class='quick-add {$is_no_variations}' onclick='quickAddToCart(this); return false;' disabled>
                                    <span class='quick-add__caption'>".__('Quick add')."</span>
                                    <i class='fa fa-circle-o-notch fa-spin quick-add__loader'></i>
                                </a>
                                <a href='{$permalink}' class='view-product'>".__('View product')."</a>
                            </div>
                        </div>
                    </div>
                ";
            }

            $html .= '</div>';

            return $html;
        }

        // Element Mapping
        public function vc_infobox_mapping() {

            // Stop all if VC is not enabled
            if ( !defined( 'WPB_VC_VERSION' ) ) {
                return;
            }

            // Map the block with vc_map()
            vc_map(
                array(
                    'name' => __('VC MANU Products Carousel', 'walker'),
                    'base' => 'vc_manu_products_carousel',
                    'description' => __('Simple products carousel', 'walker'),
                    'category' => __('My Custom Elements', 'walker'),
                    'icon' => get_template_directory_uri().'/assets/img/vc-icon.png',
                    'params' => array(

                        array(
                            'type' => 'textfield',
                            'holder' => 'h3',
                            'class' => 'title-class',
                            'heading' => __( 'Sort', 'walker' ),
                            'param_name' => 'sort',
                            'value' => __( '', 'walker' ),
                            'description' => __( 'Enter products tag / category', 'text-domain' ),
                            'admin_label' => false,
                            'weight' => 0,
                            'group' => 'Custom Group',
                        ),

                    )
                )
            );

        }

    }

    // Element Class Init
    new manuProductsCarousel();