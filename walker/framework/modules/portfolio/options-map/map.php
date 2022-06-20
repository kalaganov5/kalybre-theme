<?php

if ( ! function_exists('walker_edge_portfolio_options_map') ) {

	function walker_edge_portfolio_options_map() {

		walker_edge_add_admin_page(array(
			'slug'  => '_portfolio',
			'title' => esc_html__( 'Portfolio', 'walker' ),
			'icon'  => 'fa fa-camera-retro'
		));

		$panel = walker_edge_add_admin_panel(array(
			'title' => esc_html__( 'Portfolio Single', 'walker' ),
			'name'  => 'panel_portfolio_single',
			'page'  => '_portfolio'
		));

		walker_edge_add_admin_field(array(
			'name'        => 'portfolio_single_template',
			'type'        => 'select',
			'label' => esc_html__( 'Portfolio Type', 'walker' ),
			'default_value'	=> 'small-images',
			'description' => esc_html__( 'Choose a default type for Single Project pages', 'walker' ),
			'parent'      => $panel,
			'options'     => array(
				'small-images' => esc_html__( 'Portfolio small images', 'walker' ),
				'small-slider' => esc_html__( 'Portfolio small slider', 'walker' ),
				'big-images' => esc_html__( 'Portfolio big images', 'walker' ),
				'big-slider' => esc_html__( 'Portfolio big slider', 'walker' ),
				'custom' => esc_html__( 'Portfolio custom', 'walker' ),
				'full-width-custom' => esc_html__( 'Portfolio full width custom', 'walker' ),
				'gallery' => esc_html__( 'Portfolio gallery', 'walker' )
			)
		));

		walker_edge_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_images',
			'type'          => 'yesno',
			'label' => esc_html__( 'Lightbox for Images', 'walker' ),
			'description' => esc_html__( 'Enabling this option will turn on lightbox functionality for projects with images.', 'walker' ),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		walker_edge_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_videos',
			'type'          => 'yesno',
			'label' => esc_html__( 'Lightbox for Videos', 'walker' ),
			'description' => esc_html__( 'Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects.', 'walker' ),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		walker_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_categories',
			'type'          => 'yesno',
			'label' => esc_html__( 'Hide Categories', 'walker' ),
			'description' => esc_html__( 'Enabling this option will disable category meta description on Single Projects.', 'walker' ),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		walker_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_date',
			'type'          => 'yesno',
			'label' => esc_html__( 'Hide Date', 'walker' ),
			'description' => esc_html__( 'Enabling this option will disable date meta on Single Projects.', 'walker' ),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		walker_edge_add_admin_field(array(
			'name'          => 'portfolio_single_comments',
			'type'          => 'yesno',
			'label' => esc_html__( 'Show Comments', 'walker' ),
			'description' => esc_html__( 'Enabling this option will show comments on your page.', 'walker' ),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		walker_edge_add_admin_field(array(
			'name'          => 'portfolio_single_sticky_sidebar',
			'type'          => 'yesno',
			'label' => esc_html__( 'Sticky Side Text', 'walker' ),
			'description' => esc_html__( 'Enabling this option will make side text sticky on Single Project pages', 'walker' ),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		walker_edge_add_admin_field(array(
			'name'          => 'portfolio_single_hide_pagination',
			'type'          => 'yesno',
			'label' => esc_html__( 'Hide Pagination', 'walker' ),
			'description' => esc_html__( 'Enabling this option will turn off portfolio pagination functionality.', 'walker' ),
			'parent'        => $panel,
			'default_value' => 'no',
			'args' => array(
				'dependence' => true,
				'dependence_hide_on_yes' => '#edgtf_navigate_same_category_container'
			)
		));

		$container_navigate_category = walker_edge_add_admin_container(array(
			'name'            => 'navigate_same_category_container',
			'parent'          => $panel,
			'hidden_property' => 'portfolio_single_hide_pagination',
			'hidden_value'    => 'yes'
		));

		walker_edge_add_admin_field(array(
			'name'            => 'portfolio_single_nav_same_category',
			'type'            => 'yesno',
			'label' => esc_html__( 'Enable Pagination Through Same Category', 'walker' ),
			'description' => esc_html__( 'Enabling this option will make portfolio pagination sort through current category.', 'walker' ),
			'parent'          => $container_navigate_category,
			'default_value'   => 'no'
		));

		walker_edge_add_admin_field(array(
			'name'        => 'portfolio_single_numb_columns',
			'type'        => 'select',
			'label' => esc_html__( 'Number of Columns', 'walker' ),
			'default_value' => 'three-columns',
			'description' => esc_html__( 'Enter the number of columns for Portfolio Gallery type', 'walker' ),
			'parent'      => $panel,
			'options'     => array(
				'two-columns' => esc_html__( '2 columns', 'walker' ),
				'three-columns' => esc_html__( '3 columns', 'walker' ),
				'four-columns' => esc_html__( '4 columns', 'walker' )
			)
		));

		walker_edge_add_admin_field(array(
			'name'        => 'portfolio_single_slug',
			'type'        => 'text',
			'label' => esc_html__( 'Portfolio Single Slug', 'walker' ),
			'description' => esc_html__( 'Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'walker' ),
			'parent'      => $panel,
			'args'        => array(
				'col_width' => 3
			)
		));

	}

	add_action( 'walker_edge_options_map', 'walker_edge_portfolio_options_map', 14);

}