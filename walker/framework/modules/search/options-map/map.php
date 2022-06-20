<?php

if ( ! function_exists('walker_edge_search_options_map') ) {

	function walker_edge_search_options_map() {

		walker_edge_add_admin_page(
			array(
				'slug' => '_search_page',
				'title' => esc_html__( 'Search', 'walker' ),
				'icon' => 'fa fa-search'
			)
		);

		$search_page_panel = walker_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Search Page', 'walker' ),
				'name' => 'search_template',
				'page' => '_search_page'
			)
		);

		walker_edge_add_admin_field(array(
			'name'        => 'enable_search_page_sidebar',
			'type'        => 'select',
			'label' => esc_html__( 'Enable Sidebar for Search Pages', 'walker' ),
			'description' => esc_html__( 'Enabling this option you will display sidebar on your Search Pages', 'walker' ),
			'default_value' => 'yes',
			'parent'      => $search_page_panel,
			'options'     => array(
				'yes' => esc_html__( 'Yes', 'walker' ),
				'no' => esc_html__( 'No', 'walker' )
			)
		));

		$custom_sidebars = walker_edge_get_custom_sidebars();

		if(count($custom_sidebars) > 0) {
			walker_edge_add_admin_field(array(
				'name' => 'search_page_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__( 'Custom Sidebar to Display', 'walker' ),
				'description' => esc_html__( 'Choose a custom sidebar to display on your Search Pages. Default sidebar is "Sidebar Page"', 'walker' ),
				'parent' => $search_page_panel,
				'options' => walker_edge_get_custom_sidebars()
			));
		}

		$search_panel = walker_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Search', 'walker' ),
				'name' => 'search',
				'page' => '_search_page'
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'select',
				'name'			=> 'search_type',
				'default_value'	=> 'fullscreen-search',
				'label' => esc_html__( 'Select Search Type', 'walker' ),
				'description' => esc_html__( "Choose a type of Select search bar (Note: Slide From Header Bottom search type doesn't work with Vertical Header)", 'walker' ),
				'options' 		=> array(
					'fullscreen-search' => esc_html__( 'Fullscreen Search', 'walker' ),
					'slide-from-header-bottom' => esc_html__( 'Slide From Header Bottom', 'walker' ),
				)
			)
		);
	}

	add_action('walker_edge_options_map', 'walker_edge_search_options_map', 16);
}