<?php

if ( ! function_exists('walker_edge_woocommerce_options_map') ) {

	/**
	 * Add Woocommerce options page
	 */
	function walker_edge_woocommerce_options_map() {

		walker_edge_add_admin_page(
			array(
				'slug' => '_woocommerce_page',
				'title' => esc_html__( 'Woocommerce', 'walker' ),
				'icon' => 'fa fa-shopping-cart'
			)
		);

		/**
		 * Product List Settings
		 */
		$panel_product_list = walker_edge_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_product_list',
				'title' => esc_html__( 'Product List', 'walker' )
			)
		);

		walker_edge_add_admin_field(
			array(
				'name' => 'archive_woo_background_color',
				'type' => 'color',
				'label' => esc_html__( 'Archive and Category Background Color', 'walker' ),
				'description' => esc_html__( 'Choose a background color for Archive and Category pages', 'walker' ),
				'parent' => $panel_product_list
			)
		);

		walker_edge_add_admin_field(array(
			'name'        	=> 'edgtf_woo_product_list_columns',
			'type'        	=> 'select',
			'label' => esc_html__( 'Product List Columns', 'walker' ),
			'default_value'	=> 'edgtf-woocommerce-columns-4',
			'description' => esc_html__( 'Choose number of columns for product listing and related products on single product', 'walker' ),
			'options'		=> array(
				'edgtf-woocommerce-columns-3' => esc_html__( '3 Columns (2 with sidebar)', 'walker' ),
				'edgtf-woocommerce-columns-4' => esc_html__( '4 Columns (3 with sidebar)', 'walker' )
			),
			'parent'      	=> $panel_product_list,
		));

		walker_edge_add_admin_field(array(
			'name'        	=> 'edgtf_woo_product_list_columns_space',
			'type'        	=> 'select',
			'label' => esc_html__( 'Space Between Products', 'walker' ),
			'default_value'	=> 'edgtf-woo-small-space',
			'description' => esc_html__( 'Select space between products for product listing and related products on single product', 'walker' ),
			'options'		=> array(
				'edgtf-woo-small-space' => esc_html__( 'Small', 'walker' ),
				'edgtf-woo-normal-space' => esc_html__( 'Normal', 'walker' )
			),
			'parent'      	=> $panel_product_list,
		));

		walker_edge_add_admin_field(array(
			'name'        	=> 'edgtf_woo_product_list_info_position',
			'type'        	=> 'select',
			'label' => esc_html__( 'Product Info Position', 'walker' ),
			'default_value'	=> 'info_below_image',
			'description' => esc_html__( 'Select product info position for product listing and related products on single product', 'walker' ),
			'options'		=> array(
				'info_below_image' => esc_html__( 'Info Below Image', 'walker' ),
				'info_on_image_hover' => esc_html__( 'Info On Image Hover', 'walker' )
			),
			'parent'      	=> $panel_product_list,
		));

		walker_edge_add_admin_field(array(
			'name'        	=> 'edgtf_woo_products_per_page',
			'type'        	=> 'text',
			'label' => esc_html__( 'Number of products per page', 'walker' ),
			'default_value'	=> '',
			'description' => esc_html__( 'Set number of products on shop page', 'walker' ),
			'parent'      	=> $panel_product_list,
			'args' 			=> array(
				'col_width' => 3
			)
		));

		walker_edge_add_admin_field(array(
			'name'        	=> 'edgtf_products_list_title_tag',
			'type'        	=> 'select',
			'label' => esc_html__( 'Products Title Tag', 'walker' ),
			'default_value'	=> 'h5',
			'description' 	=> '',
			'options'		=> array(
				'h2' => esc_html__( 'h2', 'walker' ),
				'h3' => esc_html__( 'h3', 'walker' ),
				'h4' => esc_html__( 'h4', 'walker' ),
				'h5' => esc_html__( 'h5', 'walker' ),
				'h6' => esc_html__( 'h6', 'walker' ),
			),
			'parent'      	=> $panel_product_list,
		));

		/**
		 * Single Product Settings
		 */
		$panel_single_product = walker_edge_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_single_product',
				'title' => esc_html__( 'Single Product', 'walker' )
			)
		);

		walker_edge_add_admin_field(array(
			'name'        	=> 'single_product_layout',
			'type'        	=> 'select',
			'label' => esc_html__( 'Single Product Layout', 'walker' ),
			'default_value'	=> 'standard',
			'description' => esc_html__( 'Select single product page layout', 'walker' ),
			'options'		=> array(
				'standard' => esc_html__( 'Standard', 'walker' ),
                'full-width' => esc_html__( 'Wide Gallery', 'walker' ),
                'sticky-info' => esc_html__( 'Sticky Info', 'walker' )
			),
			'parent'      	=> $panel_single_product,
			'args' => array(
				'dependence' => true,
				'show' => array(
					'standard' => '#edgtf_panel_single_product_standard',
					'full-width' => '#edgtf_panel_single_product_full_width',
					'sticky-info' => '#edgtf_panel_single_product_sticky_info'
				),
				'hide' => array(
					'standard' => '#edgtf_panel_single_product_full_width,#edgtf_panel_single_product_sticky_info',
					'full-width' => '#edgtf_panel_single_product_standard,#edgtf_panel_single_product_sticky_info',
					'sticky-info' => '#edgtf_panel_single_product_standard,#edgtf_panel_single_product_full_width'
				)
			)
		));

			/********************** Standard - Single Product Layout **********************/

				$panel_single_product_standard = walker_edge_add_admin_container(array(
					'name' => 'panel_single_product_standard',
					'parent' => $panel_single_product,
					'hidden_property' => 'single_product_layout',
					'hidden_values' => array(
						'full-width',
						'sticky-info'
					)
				));

					walker_edge_add_admin_field(array(
						'name'          => 'woo_enable_single_thumb_featured_switch',
						'type'          => 'yesno',
						'label' => esc_html__( 'Switch Featured Image on Thumbnail Click', 'walker' ),
						'description' => esc_html__( 'Enabling this option will switch featured image with thumbnail image on thumbnail click', 'walker' ),
						'default_value' => 'yes',
						'parent'        => $panel_single_product_standard
					));

					walker_edge_add_admin_field(array(
						'name'          => 'woo_enable_single_zoom_main_image',
						'type'          => 'yesno',
						'label' => esc_html__( 'Enable Zoom Maginfier for Featured Image', 'walker' ),
						'description' => esc_html__( 'Enabling this option will show magnifier image on the right side of the main image. Original image must be larger then you set in woocommerce options because of zoom effect.', 'walker' ),
						'default_value' => 'no',
						'parent'        => $panel_single_product_standard
					));


			/********************** Standard - Single Product Layout **********************/	

			/********************** Wide Gallery - Single Product Layout **********************/

				$panel_single_product_full_width = walker_edge_add_admin_container(array(
					'name' => 'panel_single_product_full_width',
					'parent' => $panel_single_product,
					'hidden_property' => 'single_product_layout',
					'hidden_values' => array(
						'standard',
						'sticky-info'
					)
				));

			/********************** Wide Gallery - Single Product Layout **********************/

			/********************** Sticky Info - Single Product Layout **********************/

				$panel_single_product_sticky_info = walker_edge_add_admin_container(array(
					'name' => 'panel_single_product_sticky_info',
					'parent' => $panel_single_product,
					'hidden_property' => 'single_product_layout',
					'hidden_values' => array(
						'standard',
						'full-width'
					)
				));

					walker_edge_add_admin_field(array(
						'name'          => 'woo_enable_single_sticky_content',
						'type'          => 'yesno',
						'label' => esc_html__( 'Sticky Side Text', 'walker' ),
						'description' => esc_html__( 'Enabling this option will make side text sticky on Single Product pages', 'walker' ),
						'default_value' => 'yes',
						'parent'        => $panel_single_product_sticky_info
					));

			/********************** Sticky Info - Single Product Layout **********************/

		walker_edge_add_admin_field(array(
			'name'        	=> 'edgtf_single_product_title_tag',
			'type'        	=> 'select',
			'label' => esc_html__( 'Single Product Title Tag', 'walker' ),
			'default_value'	=> 'h4',
			'description' 	=> '',
			'options'		=> array(
				'h1' => esc_html__( 'h1', 'walker' ),
				'h2' => esc_html__( 'h2', 'walker' ),
				'h3' => esc_html__( 'h3', 'walker' ),
				'h4' => esc_html__( 'h4', 'walker' ),
				'h5' => esc_html__( 'h5', 'walker' ),
				'h6' => esc_html__( 'h6', 'walker' ),
			),
			'parent'      	=> $panel_single_product,
		));

		/**
		 * DropDown Cart Widget Settings
		 */
		$panel_dropdown_cart = walker_edge_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_dropdown_cart',
				'title' => esc_html__( 'Dropdown Cart Widget', 'walker' )
			)
		);

			walker_edge_add_admin_field(array(
				'name'        	=> 'edgtf_woo_dropdown_cart_description',
				'type'        	=> 'text',
				'label' => esc_html__( 'Cart Description', 'walker' ),
				'default_value'	=> '',
				'description' => esc_html__( 'Enter dropdown cart description', 'walker' ),
				'parent'      	=> $panel_dropdown_cart
			));
	}

	add_action( 'walker_edge_options_map', 'walker_edge_woocommerce_options_map', 21);
}