<?php

if (!function_exists('walker_edge_woocommerce_products_per_page')) {
	/**
	 * Function that sets number of products per page. Default is 12
	 * @return int number of products to be shown per page
	 */
	function walker_edge_woocommerce_products_per_page() {

		$products_per_page = 12;

		if (walker_edge_options()->getOptionValue('edgtf_woo_products_per_page')) {
			$products_per_page = walker_edge_options()->getOptionValue('edgtf_woo_products_per_page');
		}
		if(isset($_GET['woo-products-count']) && $_GET['woo-products-count'] === 'view-all') {
			$products_per_page = 9999;
		}

		return $products_per_page;
	}
}

if (!function_exists('walker_edge_woocommerce_related_products_args')) {
	/**
	 * Function that sets number of displayed related products. Hooks to woocommerce_output_related_products_args filter
	 * @param $args array array of args for the query
	 * @return mixed array of changed args
	 */
	function walker_edge_woocommerce_related_products_args($args) {

		if (walker_edge_options()->getOptionValue('edgtf_woo_product_list_columns')) {

			$related = walker_edge_options()->getOptionValue('edgtf_woo_product_list_columns');
			switch ($related) {
				case 'edgtf-woocommerce-columns-4':
					$args['posts_per_page'] = 4;
					break;
				case 'edgtf-woocommerce-columns-3':
					$args['posts_per_page'] = 3;
					break;
				default:
					$args['posts_per_page'] = 3;
			}

		} else {
			$args['posts_per_page'] = 3;
		}

		return $args;
	}
}

if (!function_exists('walker_edge_woocommerce_template_loop_product_title')) {
	/**
	 * Function for overriding product title template in Product List Loop
	 */
	function walker_edge_woocommerce_template_loop_product_title() {

		$tag = walker_edge_options()->getOptionValue('edgtf_products_list_title_tag');
		if($tag === '') {
			$tag = 'h5';
		}
		#the_title('<' . $tag . ' class="edgtf-product-list-title"><a href="'.get_the_permalink().'">', '</a></' . $tag . '>');
	}
}

if (!function_exists('walker_edge_woocommerce_template_single_title')) {
	/**
	 * Function for overriding product title template in Single Product template
	 */
	function walker_edge_woocommerce_template_single_title() {

		$tag = walker_edge_options()->getOptionValue('edgtf_single_product_title_tag');
		if($tag === '') {
			$tag = 'h1';
		}
		the_title('<' . $tag . '  itemprop="name" class="edgtf-single-product-title">', '</' . $tag . '>');
	}
}

if (!function_exists('walker_edge_woocommerce_sale_flash')) {
	/**
	 * Function for overriding Sale Flash Template
	 *
	 * @return string
	 */
	function walker_edge_woocommerce_sale_flash() {

		return '<span class="edgtf-onsale">' . esc_html__('OFFER', 'walker') . '</span>';
	}
}

if (!function_exists('walker_edge_woocommerce_product_out_of_stock')) {
	/**
	 * Function for adding Out Of Stock Template
	 *
	 * @return string
	 */
	function walker_edge_woocommerce_product_out_of_stock() {

		global $product;

		if (!$product->is_in_stock()) {
			print '<span class="edgtf-out-of-stock">' . esc_html__('OUT OF STOCK', 'walker') . '</span>';
		}
	}
}

if (!function_exists('walker_edge_woocommerce_product_new_product')) {
	/**
	 * Function for adding New Product Template
	 *
	 * @return string
	 */
	function walker_edge_woocommerce_product_new_product() {

		$new_layout = walker_edge_get_meta_field_intersect('single_product_new');

		if ($new_layout === 'yes') {
			print '<span class="edgtf-new-product">' . esc_html__('NEW', 'walker') . '</span>';
		}
	}
}

if (!function_exists('walker_edge_woocommerce_loop_add_to_cart_link')) {
	/**
	 * Function for adding New Product Template
	 *
	 * @return string
	 */
	function walker_edge_woocommerce_loop_add_to_cart_link() {
		global $product;

		// fill prices
        $currency      = get_woocommerce_currency();
		$price         = $currency.' '.$product->get_price();
		$regular_price = $product->get_sale_price() && $product->get_regular_price() ? $currency.' '.$product->get_regular_price() : '';

        // fill sizes
        $sizes = '';
        $variations = new WC_Product_Variable($product->get_id());
        $variations = $variations->get_available_variations();

        foreach ($variations as $variation){
            if (!$regular_price && (int)$variation['display_regular_price'] !== (int)$product->get_price()) {
                $regular_price = $currency . ' ' . $variation['display_regular_price'];
            }
            $size_symbol = $variation['attributes']['attribute_pa_size'];
            $size_id     = $variation['variation_id'];
			$price_reg   = $variation['display_regular_price'];
			$price_sale  = $variation['display_price'];
			if( $size_id && $size_symbol ) {
				$sizes .= "<li data-id='{$size_id}' data-currency='{$currency}' data-price_reg='{$price_reg}' data-price_sale='{$price_sale}' class='size'>{$size_symbol}</li>";
			}
        }

        // fill gallery
        $gallery = '';
        $dots = '';
        $attachment_ids = $product->get_gallery_image_ids();
        array_unshift($attachment_ids, $product->get_image_id());
        $product_permalink = get_the_permalink($product->get_id());
        foreach ($attachment_ids as $index => $attachment_id){
            $image_link = wp_get_attachment_image_url($attachment_id, array(600, 900));
            $image_class = $index == 0 ? 'item-img  item-img-active' : 'item-img';
            $dots_class = $index == 0 ? 'img-pagination img-pagination-active' : 'img-pagination';
            $gallery .= "
                <a href='{$product_permalink}'>
                    <img src='{$image_link}' class='{$image_class}' alt='{$product->get_title()}'>
                </a>
            ";

            $dots .= "<div class='{$dots_class}'></div>";
        }

        // check product variations / sizes
        $is_no_variations = empty( $sizes ) ? 'no-variations quick-add-active' : '';
        $data_product_id = $is_no_variations ? $product->get_id() : '';

        $permalink = get_permalink($product->get_id());

        $html = apply_filters(
            'walker_edge_woocommerce_loop_add_to_cart_link',

            "<div class='item'>
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

                    <a class='item-info'>{$product->get_title()}</a>

                    <div class='item-info'>
                        <span class='price price-sale'>{$regular_price}</span>
                        <span class='price'>{$price}</span>
                    </div>

                    <div class='item-links'>
                        <!--a href='".wc_get_cart_url()."' data-product-id='{$data_product_id}' class='quick-add {$is_no_variations} js-wsb-add-to-cart-redirect'  >
                            <span class='quick-add__caption'>".esc_html( $product->single_add_to_cart_text() )."</span>
                            <i class='fa fa-circle-o-notch fa-spin quick-add__loader'></i>
                        </a-->
                        <a href='{$permalink}' class='view-product'>".__('View product')."</a>
                    </div>
                </div>
            </div>",

            $product
        );

		return $html;
	}
}

if (!function_exists('walker_edge_woocommerce_view_all_pagination')) {
	/**
	 * Function for adding New WooCommerce Pagination Template
	 *
	 * @return string
	 */
	function walker_edge_woocommerce_view_all_pagination() {

		global $wp_query;

		if ( $wp_query->max_num_pages <= 1 ) {
			return;
		}

		$html = '';

		if(get_option('woocommerce_shop_page_id')) {
			$html .= '<div class="edgtf-woo-view-all-pagination">';
			$html .= '<a href="'.get_permalink(get_option('woocommerce_shop_page_id')).'?woo-products-count=view-all">'.esc_html__('View All', 'walker').'</a>';
			$html .= '</div>';
		}

		echo walker_edge_get_module_part( $html );
	}
}

if (!function_exists('walker_edge_woo_view_all_pagination_additional_tag_before')) {
	function walker_edge_woo_view_all_pagination_additional_tag_before() {

		print '<div class="edgtf-woo-pagination-holder"><div class="edgtf-woo-pagination-inner">';
	}
}

if (!function_exists('walker_edge_woo_view_all_pagination_additional_tag_after')) {
	function walker_edge_woo_view_all_pagination_additional_tag_after() {

		print '</div></div>';
	}
}

if (!function_exists('walker_edge_woocommerce_product_thumbnail_column_size')) {
	function walker_edge_woocommerce_product_thumbnail_column_size() {

		$product_single_layout = walker_edge_get_meta_field_intersect('single_product_layout');

		if ($product_single_layout === 'full-width') {
			return 2;
		} else if ($product_single_layout === 'sticky-info') {
			return 1;
		} else {
			return 4;
		}
	}
}

if (!function_exists('walker_edge_woocommerce_product_thumbnail_size')) {
	function walker_edge_woocommerce_product_thumbnail_size() {

		$product_single_layout = walker_edge_get_meta_field_intersect('single_product_layout');

		if ($product_single_layout !== 'standard') {
			return "shop_single";
		} else {
			return "shop_thumbnail";
		}
	}
}

if (!function_exists('walker_edge_single_product_content_additional_tag_before')) {
	function walker_edge_single_product_content_additional_tag_before() {

		print '<div class="edgtf-single-product-content">';
	}
}

if (!function_exists('walker_edge_single_product_content_additional_tag_after')) {
	function walker_edge_single_product_content_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('walker_edge_single_product_summary_additional_tag_before')) {
	function walker_edge_single_product_summary_additional_tag_before() {

		print '<div class="edgtf-single-product-summary">';
	}
}

if (!function_exists('walker_edge_single_product_summary_additional_tag_after')) {
	function walker_edge_single_product_summary_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('walker_edge_single_product_additional_tag_before')) {
	function walker_edge_single_product_additional_tag_before() {

		$product_single_layout = walker_edge_get_meta_field_intersect('single_product_layout');

		if($product_single_layout === 'full-width') {
			print '<div class="edgtf-grid">';
		}
	}
}

if (!function_exists('walker_edge_single_product_additional_tag_after')) {
	function walker_edge_single_product_additional_tag_after() {

		$product_single_layout = walker_edge_get_meta_field_intersect('single_product_layout');

		if($product_single_layout === 'full-width') {
			print '</div>';
		}
	}
}

if (!function_exists('walker_edge_pl_holder_additional_tag_before')) {
	function walker_edge_pl_holder_additional_tag_before() {

		print '<div class="edgtf-pl-main-holder">';
	}
}

if (!function_exists('walker_edge_pl_holder_additional_tag_after')) {
	function walker_edge_pl_holder_additional_tag_after() {

		print '</div>';
	}
}

if (!function_exists('walker_edge_pl_inner_additional_tag_before')) {
	function walker_edge_pl_inner_additional_tag_before() {

		#print '<div class="item">';
	}
}

if (!function_exists('walker_edge_pl_inner_additional_tag_after')) {
	function walker_edge_pl_inner_additional_tag_after() {

		#print '</div>';
	}
}

if (!function_exists('walker_edge_pl_image_additional_tag_before')) {
	function walker_edge_pl_image_additional_tag_before() {

		#print '<div class="slider">
        #        <div class="item-img-wrapper">';
	}
}

if (!function_exists('walker_edge_pl_image_additional_tag_after')) {
	function walker_edge_pl_image_additional_tag_after() {

		#print '</div>
        #    </div>';
	}
}

if (!function_exists('walker_edge_pl_yith_additional_tag_before')) {
	function walker_edge_pl_yith_additional_tag_before() {
		if(walker_edge_is_yith_wishlist_install() || walker_edge_is_yith_wcqv_install()){
			$add_class = "";
			if(walker_edge_is_yith_wishlist_install() && walker_edge_is_yith_wcqv_install()){
				#$add_class = "edgtf-pl-yith-items";
			}
			#print '<div class="item-descr '.esc_html($add_class).'"><div class="edgtf-pl-yith-inner">';
		}
	}
}

if (!function_exists('walker_edge_pl_yith_additional_tag_after')) {
	function walker_edge_pl_yith_additional_tag_after() {
		if(walker_edge_is_yith_wishlist_install() || walker_edge_is_yith_wcqv_install()){
			#print '</div></div>';
		}
	}
}

if (!function_exists('walker_edge_pl_inner_text_additional_tag_before')) {
	function walker_edge_pl_inner_text_additional_tag_before() {

		#print '<div class="edgtf-pl-text"><div class="edgtf-pl-text-outer"><div class="edgtf-pl-text-inner">';
	}
}

if (!function_exists('walker_edge_pl_inner_text_additional_tag_after')) {
	function walker_edge_pl_inner_text_additional_tag_after() {

		#print '</div></div></div>';
	}
}

if (!function_exists('walker_edge_pl_text_wrapper_additional_tag_before')) {
	function walker_edge_pl_text_wrapper_additional_tag_before() {

		#print '<div class="edgtf-pl-text-wrapper">';
	}
}

if (!function_exists('walker_edge_pl_text_wrapper_additional_tag_after')) {
	function walker_edge_pl_text_wrapper_additional_tag_after() {

		#print '</div>';
	}
}

if (!function_exists('walker_edge_pl_rating_additional_tag_before')) {
	function walker_edge_pl_rating_additional_tag_before() {

		#print '<div class="edgtf-pl-rating-holder">';
	}
}

if (!function_exists('walker_edge_pl_rating_additional_tag_after')) {
	function walker_edge_pl_rating_additional_tag_after() {

		#print '</div>';
	}
}

if (!function_exists('walker_edge_woocommerce_wishlist_position')) {
	function walker_edge_woocommerce_wishlist_position() {

		$args = array();
		$args = apply_filters('walker_edge_woocommerce_yith_wcwl_positions', array(
					'add-to-cart' => array('hook' => 'woocommerce_single_product_summary', 'priority' => 28),
					'thumbnails'  => array('hook' => 'woocommerce_product_thumbnails', 'priority' => 21),
					'summary'     => array('hook' => 'woocommerce_after_single_product_summary', 'priority' => 11)
				));

		return $args;
	}
}

if (!function_exists('walker_edge_override_woocommerce_catalog_orderby')) {
	function walker_edge_override_woocommerce_catalog_orderby() {

		$args = array();
		$args = apply_filters( 'walker_edge_woocommerce_catalog_orderby', array(
					'menu_order' => esc_html__( 'Default', 'walker' ),
					'popularity' => esc_html__( 'Popularity', 'walker' ),
					'rating'     => esc_html__( 'Average Rating', 'walker' ),
					'date'       => esc_html__( 'Newness', 'walker' ),
					'price'      => esc_html__( 'Price: Low to High', 'walker' ),
					'price-desc' => esc_html__( 'Price: High to Low', 'walker' )
				) );

		return $args;
	}
}
