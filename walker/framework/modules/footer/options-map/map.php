<?php

if ( ! function_exists('walker_edge_footer_options_map') ) {
	/**
	 * Add footer options
	 */
	function walker_edge_footer_options_map() {

		walker_edge_add_admin_page(
			array(
				'slug' => '_footer_page',
				'title' => esc_html__( 'Footer', 'walker' ),
				'icon' => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = walker_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'walker' ),
				'name' => 'footer',
				'page' => '_footer_page'
			)
		);

		walker_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'footer_in_grid',
				'default_value' => 'no',
				'label' => esc_html__( 'Footer in Grid', 'walker' ),
				'description' => esc_html__( 'Enabling this option will place Footer content in grid', 'walker' ),
				'parent' => $footer_panel,
			)
		);

		walker_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_top',
				'default_value' => 'yes',
				'label' => esc_html__( 'Show Footer Top', 'walker' ),
				'description' => esc_html__( 'Enabling this option will show Footer Top area', 'walker' ),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_show_footer_top_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_top_container = walker_edge_add_admin_container(
			array(
				'name' => 'show_footer_top_container',
				'hidden_property' => 'show_footer_top',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);

		walker_edge_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns',
				'default_value' => '4',
				'label' => esc_html__( 'Footer Top Columns', 'walker' ),
				'description' => esc_html__( 'Choose number of columns for Footer Top area', 'walker' ),
				'options' => array(
					'1' => esc_html__( '1', 'walker' ),
					'2' => esc_html__( '2', 'walker' ),
					'3' => esc_html__( '3', 'walker' ),
					'4' => esc_html__( '4', 'walker' ),
					'5' => esc_html__( '3(25%+25%+50%)', 'walker' ),
					'6' => esc_html__( '3(50%+25%+25%)', 'walker' )
				),
				'parent' => $show_footer_top_container,
			)
		);

		walker_edge_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns_alignment',
				'default_value' => '',
				'label' => esc_html__( 'Footer Top Columns Alignment', 'walker' ),
				'description' => esc_html__( 'Text Alignment in Footer Columns', 'walker' ),
				'options' => array(
					'left' => esc_html__( 'Left', 'walker' ),
					'center' => esc_html__( 'Center', 'walker' ),
					'right' => esc_html__( 'Right', 'walker' )
				),
				'parent' => $show_footer_top_container,
			)
		);

		walker_edge_add_admin_field(array(
			'name' => 'footer_top_background_color',
			'type' => 'color',
			'label' => esc_html__( 'Background Color', 'walker' ),
			'description' => esc_html__( 'Set background color for top footer area', 'walker' ),
			'parent' => $show_footer_top_container
		));

		walker_edge_add_admin_field(array(
			'name' => 'footer_top_padding_top',
			'type' => 'text',
			'label' => esc_html__( 'Padding Top', 'walker' ),
			'description' => esc_html__( 'Enter footer top padding (Default is 68)', 'walker' ),
			'parent' => $show_footer_top_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		walker_edge_add_admin_field(array(
			'name' => 'footer_top_padding_bottom',
			'type' => 'text',
			'label' => esc_html__( 'Padding Bottom', 'walker' ),
			'description' => esc_html__( 'Enter footer bottom padding (Default is 70)', 'walker' ),
			'parent' => $show_footer_top_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		$first_level_group = walker_edge_add_admin_group(
			array(
				'parent' => $show_footer_top_container,
				'name' => 'first_level_group',
				'title' => esc_html__( 'Widget Title Style', 'walker' ),
				'description' => esc_html__( 'Define styles for widgets title', 'walker' )
			)
		);

		$first_level_row1 = walker_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row1'
			)
		);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row1,
					'type' => 'colorsimple',
					'name' => 'footer_title_color',
					'default_value' => '',
					'label' => esc_html__( 'Text Color', 'walker' ),
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row1,
					'type' => 'fontsimple',
					'name' => 'footer_title_google_fonts',
					'default_value' => '-1',
					'label' => esc_html__( 'Font Family', 'walker' ),
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row1,
					'type' => 'textsimple',
					'name' => 'footer_title_fontsize',
					'default_value' => '',
					'label' => esc_html__( 'Font Size', 'walker' ),
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row1,
					'type' => 'textsimple',
					'name' => 'footer_title_lineheight',
					'default_value' => '',
					'label' => esc_html__( 'Line Height', 'walker' ),
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

		$first_level_row2 = walker_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row2',
				'next' => true
			)
		);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row2,
					'type' => 'selectblanksimple',
					'name' => 'footer_title_fontstyle',
					'default_value' => '',
					'label' => esc_html__( 'Font Style', 'walker' ),
					'options' => walker_edge_get_font_style_array()
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row2,
					'type' => 'selectblanksimple',
					'name' => 'footer_title_fontweight',
					'default_value' => '',
					'label' => esc_html__( 'Font Weight', 'walker' ),
					'options' => walker_edge_get_font_weight_array()
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row2,
					'type' => 'textsimple',
					'name' => 'footer_title_letterspacing',
					'default_value' => '',
					'label' => esc_html__( 'Letter Spacing', 'walker' ),
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row2,
					'type' => 'selectblanksimple',
					'name' => 'footer_title_texttransform',
					'default_value' => '',
					'label' => esc_html__( 'Text Transform', 'walker' ),
					'options' => walker_edge_get_text_transform_array()
				)
			);

		walker_edge_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_bottom',
				'default_value' => 'yes',
				'label' => esc_html__( 'Show Footer Bottom', 'walker' ),
				'description' => esc_html__( 'Enabling this option will show Footer Bottom area', 'walker' ),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#edgtf_show_footer_bottom_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_bottom_container = walker_edge_add_admin_container(
			array(
				'name' => 'show_footer_bottom_container',
				'hidden_property' => 'show_footer_bottom',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);

		walker_edge_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_bottom_columns',
				'default_value' => '2',
				'label' => esc_html__( 'Footer Bottom Columns', 'walker' ),
				'description' => esc_html__( 'Choose number of columns for Footer Bottom area', 'walker' ),
				'options' => array(
					'1' => esc_html__( '1', 'walker' ),
					'2' => esc_html__( '2', 'walker' ),
					'3' => esc_html__( '3', 'walker' )
				),
				'parent' => $show_footer_bottom_container,
			)
		);

		walker_edge_add_admin_field(array(
			'name' => 'footer_bottom_height',
			'type' => 'text',
			'label' => esc_html__( 'Height', 'walker' ),
			'description' => esc_html__( 'Enter footer bottom bar height (Default is 60)', 'walker' ),
			'parent' => $show_footer_bottom_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		walker_edge_add_admin_field(array(
			'name' => 'footer_bottom_background_color',
			'type' => 'color',
			'label' => esc_html__( 'Background Color', 'walker' ),
			'description' => esc_html__( 'Set background color for bottom footer area', 'walker' ),
			'parent' => $show_footer_bottom_container
		));

		walker_edge_add_admin_field(array(
			'name' => 'footer_bottom_border_top_color',
			'type' => 'color',
			'label' => esc_html__( 'Border Top Color', 'walker' ),
			'description' => esc_html__( 'Set border top color for bottom footer area', 'walker' ),
			'parent' => $show_footer_bottom_container
		));
	}

	add_action( 'walker_edge_options_map', 'walker_edge_footer_options_map', 11);
}