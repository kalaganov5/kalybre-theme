<?php

if ( ! function_exists('walker_edge_fullscreen_menu_options_map')) {

	function walker_edge_fullscreen_menu_options_map() {

		walker_edge_add_admin_page(
			array(
				'slug' => '_fullscreen_menu_page',
				'title' => esc_html__( 'Fullscreen Menu', 'walker' ),
				'icon' => 'fa fa-th-large'
			)
		);

		$fullscreen_panel = walker_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Fullscreen Menu', 'walker' ),
				'name' => 'fullscreen_menu',
				'page' => '_fullscreen_menu_page'
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $fullscreen_panel,
				'type' => 'select',
				'name' => 'fullscreen_menu_animation_style',
				'default_value' => 'fade-push-text-right',
				'label' => esc_html__( 'Fullscreen Menu Overlay Animation', 'walker' ),
				'description' => esc_html__( 'Choose animation type for fullscreen menu overlay', 'walker' ),
				'options' => array(
					'fade-push-text-right' => esc_html__( 'Fade Push Text Right', 'walker' ),
					'fade-push-text-top' => esc_html__( 'Fade Push Text Top', 'walker' ),
					'fade-text-scaledown' => esc_html__( 'Fade Text Scaledown', 'walker' )
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $fullscreen_panel,
				'type' => 'image',
				'name' => 'fullscreen_logo',
				'default_value' => '',
				'label' => esc_html__( 'Logo in Fullscreen Menu Overlay', 'walker' ),
				'description' => esc_html__( 'Place logo in top left corner of fullscreen menu overlay', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $fullscreen_panel,
				'type' => 'yesno',
				'name' => 'fullscreen_in_grid',
				'default_value' => 'no',
				'label' => esc_html__( 'Fullscreen Menu in Grid', 'walker' ),
				'description' => esc_html__( 'Enabling this option will put fullscreen menu content in grid', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $fullscreen_panel,
				'type' => 'selectblank',
				'name' => 'fullscreen_alignment',
				'default_value' => '',
				'label' => esc_html__( 'Fullscreen Menu Alignment', 'walker' ),
				'description' => esc_html__( 'Choose alignment for fullscreen menu content', 'walker' ),
				'options' => array(
					"left" => esc_html__( "Left", 'walker' ),
					"center" => esc_html__( "Center", 'walker' ),
					"right" => esc_html__( "Right", 'walker' )
				)
			)
		);

		$background_group = walker_edge_add_admin_group(
			array(
				'parent' => $fullscreen_panel,
				'name' => 'background_group',
				'title' => esc_html__( 'Background', 'walker' ),
				'description' => esc_html__( 'Select a background color and transparency for Fullscreen Menu (0 = fully transparent, 1 = opaque)', 'walker' )

			)
		);

		$background_group_row = walker_edge_add_admin_row(
			array(
				'parent' => $background_group,
				'name' => 'background_group_row'
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $background_group_row,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_background_color',
				'default_value' => '',
				'label' => esc_html__( 'Background Color', 'walker' )
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $background_group_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_background_transparency',
				'default_value' => '',
				'label' => esc_html__( 'Transparency (values:0-1)', 'walker' )
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $fullscreen_panel,
				'type' => 'image',
				'name' => 'fullscreen_menu_background_image',
				'default_value' => '',
				'label' => esc_html__( 'Background Image', 'walker' ),
				'description' => esc_html__( 'Choose a background image for Fullscreen Menu background', 'walker' )
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $fullscreen_panel,
				'type' => 'image',
				'name' => 'fullscreen_menu_pattern_image',
				'default_value' => '',
				'label' => esc_html__( 'Pattern Background Image', 'walker' ),
				'description' => esc_html__( 'Choose a pattern image for Fullscreen Menu background', 'walker' )
			)
		);

		//1st level style group
		$first_level_style_group = walker_edge_add_admin_group(
			array(
				'parent' => $fullscreen_panel,
				'name' => 'first_level_style_group',
				'title' => esc_html__( '1st Level Style', 'walker' ),
				'description' => esc_html__( 'Define styles for 1st level in Fullscreen Menu', 'walker' )
			)
		);

		$first_level_style_row1 = walker_edge_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row1'
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_color',
				'default_value' => '',
				'label' => esc_html__( 'Text Color', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_color',
				'default_value' => '',
				'label' => esc_html__( 'Hover Text Color', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_active_color',
				'default_value' => '',
				'label' => esc_html__( 'Active Text Color', 'walker' ),
			)
		);

		$first_level_style_row2 = walker_edge_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row2'
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row2,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_background_color',
				'default_value' => '',
				'label' => esc_html__( 'Background Hover Color', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row2,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_active_background_color',
				'default_value' => '',
				'label' => esc_html__( 'Background Active Color', 'walker' ),
			)
		);

		$first_level_style_row3 = walker_edge_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row3'
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row3,
				'type' => 'fontsimple',
				'name' => 'fullscreen_menu_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__( 'Font Family', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row3,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_fontsize',
				'default_value' => '',
				'label' => esc_html__( 'Font Size', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row3,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_lineheight',
				'default_value' => '',
				'label' => esc_html__( 'Line Height', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$first_level_style_row4 = walker_edge_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row4'
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontstyle',
				'default_value' => '',
				'label' => esc_html__( 'Font Style', 'walker' ),
				'options' => walker_edge_get_font_style_array()
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontweight',
				'default_value' => '',
				'label' => esc_html__( 'Font Weight', 'walker' ),
				'options' => walker_edge_get_font_weight_array()
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_letterspacing',
				'default_value' => '',
				'label' => esc_html__( 'Letter Spacing', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_texttransform',
				'default_value' => '',
				'label' => esc_html__( 'Text Transform', 'walker' ),
				'options' => walker_edge_get_text_transform_array()
			)
		);

		//2nd level style group
		$second_level_style_group = walker_edge_add_admin_group(
			array(
				'parent' => $fullscreen_panel,
				'name' => 'second_level_style_group',
				'title' => esc_html__( '2nd Level Style', 'walker' ),
				'description' => esc_html__( 'Define styles for 2nd level in Fullscreen Menu', 'walker' )
			)
		);

		$second_level_style_row1 = walker_edge_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name' => 'second_level_style_row1'
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_color_2nd',
				'default_value' => '',
				'label' => esc_html__( 'Text Color', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_color_2nd',
				'default_value' => '',
				'label' => esc_html__( 'Hover/Active Text Color', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_background_color_2nd',
				'default_value' => '',
				'label' => esc_html__( 'Background Hover Color', 'walker' ),
			)
		);

		$second_level_style_row2 = walker_edge_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name' => 'second_level_style_row2'
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row2,
				'type' => 'fontsimple',
				'name' => 'fullscreen_menu_google_fonts_2nd',
				'default_value' => '-1',
				'label' => esc_html__( 'Font Family', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row2,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_fontsize_2nd',
				'default_value' => '',
				'label' => esc_html__( 'Font Size', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row2,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_lineheight_2nd',
				'default_value' => '',
				'label' => esc_html__( 'Line Height', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_style_row3 = walker_edge_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name' => 'second_level_style_row3'
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontstyle_2nd',
				'default_value' => '',
				'label' => esc_html__( 'Font Style', 'walker' ),
				'options' => walker_edge_get_font_style_array()
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontweight_2nd',
				'default_value' => '',
				'label' => esc_html__( 'Font Weight', 'walker' ),
				'options' => walker_edge_get_font_weight_array()
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_letterspacing_2nd',
				'default_value' => '',
				'label' => esc_html__( 'Letter Spacing', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_texttransform_2nd',
				'default_value' => '',
				'label' => esc_html__( 'Text Transform', 'walker' ),
				'options' => walker_edge_get_text_transform_array()
			)
		);

		$third_level_style_group = walker_edge_add_admin_group(
			array(
				'parent' => $fullscreen_panel,
				'name' => 'third_level_style_group',
				'title' => esc_html__( '3rd Level Style', 'walker' ),
				'description' => esc_html__( 'Define styles for 3rd level in Fullscreen Menu', 'walker' )
			)
		);

		$third_level_style_row1 = walker_edge_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name' => 'third_level_style_row1'
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_color_3rd',
				'default_value' => '',
				'label' => esc_html__( 'Text Color', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_color_3rd',
				'default_value' => '',
				'label' => esc_html__( 'Hover/Active Text Color', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_background_color_3rd',
				'default_value' => '',
				'label' => esc_html__( 'Background Hover Color', 'walker' ),
			)
		);

		$third_level_style_row2 = walker_edge_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name' => 'second_level_style_row2'
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row2,
				'type' => 'fontsimple',
				'name' => 'fullscreen_menu_google_fonts_3rd',
				'default_value' => '-1',
				'label' => esc_html__( 'Font Family', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row2,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_fontsize_3rd',
				'default_value' => '',
				'label' => esc_html__( 'Font Size', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row2,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_lineheight_3rd',
				'default_value' => '',
				'label' => esc_html__( 'Line Height', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_style_row3 = walker_edge_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name' => 'second_level_style_row3'
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontstyle_3rd',
				'default_value' => '',
				'label' => esc_html__( 'Font Style', 'walker' ),
				'options' => walker_edge_get_font_style_array()
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontweight_3rd',
				'default_value' => '',
				'label' => esc_html__( 'Font Weight', 'walker' ),
				'options' => walker_edge_get_font_weight_array()
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_letterspacing_3rd',
				'default_value' => '',
				'label' => esc_html__( 'Letter Spacing', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_texttransform_3rd',
				'default_value' => '',
				'label' => esc_html__( 'Text Transform', 'walker' ),
				'options' => walker_edge_get_text_transform_array()
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $fullscreen_panel,
				'type' => 'select',
				'name' => 'fullscreen_menu_opener_predefined_icon_size',
				'default_value' => 'normal',
				'label' => esc_html__( 'Predefined Icon Size', 'walker' ),
				'description' => esc_html__( 'Choose predefined size for Full Screen Menu Icons', 'walker' ),
				'options' => array(
					'normal' => esc_html__( 'Normal', 'walker' ),
					'small' => esc_html__( 'Small', 'walker' ),
					'medium' => esc_html__( 'Medium', 'walker' ),
					'large' => esc_html__( 'Large', 'walker' )
				),
			)
		);

		$icon_colors_group = walker_edge_add_admin_group(
			array(
				'parent' => $fullscreen_panel,
				'name' => 'fullscreen_menu_icon_colors_group',
				'title' => esc_html__( 'Full Screen Menu Icon Style', 'walker' ),
				'description' => esc_html__( 'Define styles for Fullscreen Menu Icon', 'walker' )
			)
		);

		$icon_colors_row1 = walker_edge_add_admin_row(
			array(
				'parent' => $icon_colors_group,
				'name' => 'icon_colors_row1'
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_icon_color',
				'label' => esc_html__( 'Color', 'walker' ),
			)
		);
		walker_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_icon_hover_color',
				'label' => esc_html__( 'Hover Color', 'walker' ),
			)
		);
		$icon_colors_row2 = walker_edge_add_admin_row(
			array(
				'parent' => $icon_colors_group,
				'name' => 'icon_colors_row2',
				'next' => true
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row2,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_light_icon_color',
				'label' => esc_html__( 'Light Menu Icon Color', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row2,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_light_icon_hover_color',
				'label' => esc_html__( 'Light Menu Icon Hover Color', 'walker' ),
			)
		);

		$icon_colors_row3 = walker_edge_add_admin_row(
			array(
				'parent' => $icon_colors_group,
				'name' => 'icon_colors_row3',
				'next' => true
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row3,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_dark_icon_color',
				'label' => esc_html__( 'Dark Menu Icon Color', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row3,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_dark_icon_hover_color',
				'label' => esc_html__( 'Dark Menu Icon Hover Color', 'walker' ),
			)
		);

		$icon_colors_row4 = walker_edge_add_admin_row(
			array(
				'parent' => $icon_colors_group,
				'name' => 'icon_colors_row4',
				'next' => true
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row4,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_icon_background_color',
				'label' => esc_html__( 'Background Color', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $icon_colors_row4,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_icon_background_hover_color',
				'label' => esc_html__( 'Background Hover Color', 'walker' ),
			)
		);

		$icon_spacing_group = walker_edge_add_admin_group(
			array(
				'parent' => $fullscreen_panel,
				'name' => 'icon_spacing_group',
				'title' => esc_html__( 'Full Screen Menu Icon Spacing', 'walker' ),
				'description' => esc_html__( 'Define padding and margin for full screen menu icon', 'walker' )
			)
		);

		$icon_spacing_row = walker_edge_add_admin_row(
			array(
				'parent' => $icon_spacing_group,
				'name' => 'icon_spacing_row'
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_icon_padding_left',
				'default_value' => '',
				'label' => esc_html__( 'Padding Left', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_icon_padding_right',
				'default_value' => '',
				'label' => esc_html__( 'Padding Right', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_icon_margin_left',
				'default_value' => '',
				'label' => esc_html__( 'Margin Left', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_icon_margin_right',
				'default_value' => '',
				'label' => esc_html__( 'Margin Right', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

	}

	add_action('walker_edge_options_map', 'walker_edge_fullscreen_menu_options_map', 17);
}