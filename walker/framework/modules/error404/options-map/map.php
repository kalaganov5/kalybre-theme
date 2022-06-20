<?php

if ( ! function_exists('walker_edge_error_404_options_map') ) {

	function walker_edge_error_404_options_map() {

		walker_edge_add_admin_page(array(
			'slug' => '__404_error_page',
			'title' => esc_html__( '404 Error Page', 'walker' ),
			'icon' => 'fa fa-exclamation-triangle'
		));

		$panel_404_options = walker_edge_add_admin_panel(array(
			'page' => '__404_error_page',
			'name'	=> 'panel_404_options',
			'title' => esc_html__( '404 Page Option', 'walker' )
		));

		walker_edge_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'color',
				'name' => '404_page_background_color',
				'default_value' => '',
				'label' => esc_html__( 'Background Color', 'walker' )
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'image',
				'name' => '404_page_background_image',
				'default_value' => '',
				'label' => esc_html__( 'Background Image', 'walker' ),
				'description' => esc_html__( 'Choose a background image for 404 page', 'walker' )
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type' => 'image',
				'name' => '404_page_background_pattern_image',
				'default_value' => '',
				'label' => esc_html__( 'Pattern Background Image', 'walker' ),
				'description' => esc_html__( 'Choose a pattern image for 404 page', 'walker' )
			)
		);

		walker_edge_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_title',
			'default_value' => '',
			'label' => esc_html__( 'Title', 'walker' ),
			'description' => esc_html__( 'Enter title for 404 page. Default label is "404".', 'walker' )
		));

		$first_level_group = walker_edge_add_admin_group(
			array(
				'parent' => $panel_404_options,
				'name' => 'first_level_group',
				'title' => esc_html__( 'Title Style', 'walker' ),
				'description' => esc_html__( 'Define styles for 404 page title', 'walker' )
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
					'name' => '404_title_color',
					'default_value' => '',
					'label' => esc_html__( 'Text Color', 'walker' ),
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row1,
					'type' => 'fontsimple',
					'name' => '404_title_google_fonts',
					'default_value' => '-1',
					'label' => esc_html__( 'Font Family', 'walker' ),
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row1,
					'type' => 'textsimple',
					'name' => '404_title_fontsize',
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
					'name' => '404_title_lineheight',
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
					'name' => '404_title_fontstyle',
					'default_value' => '',
					'label' => esc_html__( 'Font Style', 'walker' ),
					'options' => walker_edge_get_font_style_array()
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row2,
					'type' => 'selectblanksimple',
					'name' => '404_title_fontweight',
					'default_value' => '',
					'label' => esc_html__( 'Font Weight', 'walker' ),
					'options' => walker_edge_get_font_weight_array()
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row2,
					'type' => 'textsimple',
					'name' => '404_title_letterspacing',
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
					'name' => '404_title_texttransform',
					'default_value' => '',
					'label' => esc_html__( 'Text Transform', 'walker' ),
					'options' => walker_edge_get_text_transform_array()
				)
			);

		walker_edge_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_subtitle',
			'default_value' => '',
			'label' => esc_html__( 'Subtitle', 'walker' ),
			'description' => esc_html__( 'Enter subtitle for 404 page. Default label is "PAGE NOT FOUND".', 'walker' )
		));

		$second_level_group = walker_edge_add_admin_group(
			array(
				'parent' => $panel_404_options,
				'name' => 'second_level_group',
				'title' => esc_html__( 'Subtitle Style', 'walker' ),
				'description' => esc_html__( 'Define styles for 404 page subtitle', 'walker' )
			)
		);

		$second_level_row1 = walker_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row1'
			)
		);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_row1,
					'type' => 'colorsimple',
					'name' => '404_subtitle_color',
					'default_value' => '',
					'label' => esc_html__( 'Text Color', 'walker' ),
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_row1,
					'type' => 'fontsimple',
					'name' => '404_subtitle_google_fonts',
					'default_value' => '-1',
					'label' => esc_html__( 'Font Family', 'walker' ),
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_row1,
					'type' => 'textsimple',
					'name' => '404_subtitle_fontsize',
					'default_value' => '',
					'label' => esc_html__( 'Font Size', 'walker' ),
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_row1,
					'type' => 'textsimple',
					'name' => '404_subtitle_lineheight',
					'default_value' => '',
					'label' => esc_html__( 'Line Height', 'walker' ),
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

		$second_level_row2 = walker_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row2',
				'next' => true
			)
		);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_row2,
					'type' => 'selectblanksimple',
					'name' => '404_subtitle_fontstyle',
					'default_value' => '',
					'label' => esc_html__( 'Font Style', 'walker' ),
					'options' => walker_edge_get_font_style_array()
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_row2,
					'type' => 'selectblanksimple',
					'name' => '404_subtitle_fontweight',
					'default_value' => '',
					'label' => esc_html__( 'Font Weight', 'walker' ),
					'options' => walker_edge_get_font_weight_array()
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_row2,
					'type' => 'textsimple',
					'name' => '404_subtitle_letterspacing',
					'default_value' => '',
					'label' => esc_html__( 'Letter Spacing', 'walker' ),
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_row2,
					'type' => 'selectblanksimple',
					'name' => '404_subtitle_texttransform',
					'default_value' => '',
					'label' => esc_html__( 'Text Transform', 'walker' ),
					'options' => walker_edge_get_text_transform_array()
				)
			);

		walker_edge_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_back_to_home',
			'default_value' => '',
			'label' => esc_html__( 'Back to Home Button Label', 'walker' ),
			'description' => esc_html__( 'Enter label for "BACK TO HOME" button', 'walker' )
		));

	}

	add_action( 'walker_edge_options_map', 'walker_edge_error_404_options_map', 19);
}