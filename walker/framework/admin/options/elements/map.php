<?php

if ( ! function_exists('walker_edge_load_elements_map') ) {
	/**
	 * Add Elements option page for shortcodes
	 */
	function walker_edge_load_elements_map() {

		walker_edge_add_admin_page(
			array(
				'slug' => '_elements_page',
				'title' => esc_html__( 'Elements', 'walker' ),
				'icon' => 'fa fa-star'
			)
		);

		do_action( 'walker_edge_options_elements_map' );

		$panel_parallax = walker_edge_add_admin_panel(
			array(
				'page'  => '_elements_page',
				'name'  => 'panel_parallax',
				'title' => esc_html__( 'Parallax', 'walker' )
			)
		);

		walker_edge_add_admin_field(array(
			'type'			=> 'onoff',
			'name'			=> 'parallax_on_off',
			'default_value'	=> 'off',
			'label' => esc_html__( 'Parallax on touch devices', 'walker' ),
			'description' => esc_html__( 'Enabling this option will allow parallax on touch devices', 'walker' ),
			'parent'		=> $panel_parallax
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'text',
			'name'			=> 'parallax_min_height',
			'default_value'	=> '400',
			'label' => esc_html__( 'Parallax Min Height', 'walker' ),
			'description' => esc_html__( 'Set a minimum height for parallax images on small displays (phones, tablets, etc.)', 'walker' ),
			'args'			=> array(
				'col_width'	=> 3,
				'suffix'	=> 'px'
			),
			'parent'		=> $panel_parallax
		));
	}

	add_action('walker_edge_options_map', 'walker_edge_load_elements_map', 12);
}