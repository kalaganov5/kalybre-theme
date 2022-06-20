<?php

if ( ! function_exists('walker_edge_sidearea_options_map') ) {

	function walker_edge_sidearea_options_map() {

		walker_edge_add_admin_page(
			array(
				'slug' => '_side_area_page',
				'title' => esc_html__( 'Side Area', 'walker' ),
				'icon' => 'fa fa-indent'
			)
		);

		$side_area_panel = walker_edge_add_admin_panel(
			array(
				'title' => esc_html__( 'Side Area', 'walker' ),
				'name' => 'side_area',
				'page' => '_side_area_page'
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_width',
				'default_value' => '',
				'label' => esc_html__( 'Side Area Width', 'walker' ),
				'description' => esc_html__( 'Enter a width for Side Area', 'walker' ),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		$side_area_slide_with_content_container = walker_edge_add_admin_container(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_slide_with_content_container',
				'hidden_property' => 'side_area_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'side-menu-slide-from-right',
					'side-area-uncovered-from-content'
				)
			)
		);

		$side_area_icon_style_group = walker_edge_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_icon_style_group',
				'title' => esc_html__( 'Side Area Icon Style', 'walker' ),
				'description' => esc_html__( 'Define styles for Side Area icon', 'walker' )
			)
		);

		$side_area_icon_style_row1 = walker_edge_add_admin_row(
			array(
				'parent'		=> $side_area_icon_style_group,
				'name'			=> 'side_area_icon_style_row1'
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_color',
				'default_value' => '',
				'label' => esc_html__( 'Color', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_hover_color',
				'default_value' => '',
				'label' => esc_html__( 'Hover Color', 'walker' ),
			)
		);

		$side_area_icon_style_row2 = walker_edge_add_admin_row(
			array(
				'parent'		=> $side_area_icon_style_group,
				'name'			=> 'side_area_icon_style_row2',
				'next'			=> true
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_light_icon_color',
				'default_value' => '',
				'label' => esc_html__( 'Light Menu Icon Color', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_light_icon_hover_color',
				'default_value' => '',
				'label' => esc_html__( 'Light Menu Icon Hover Color', 'walker' ),
			)
		);

		$side_area_icon_style_row3 = walker_edge_add_admin_row(
			array(
				'parent'		=> $side_area_icon_style_group,
				'name'			=> 'side_area_icon_style_row3',
				'next'			=> true
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row3,
				'type' => 'colorsimple',
				'name' => 'side_area_dark_icon_color',
				'default_value' => '',
				'label' => esc_html__( 'Dark Menu Icon Color', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row3,
				'type' => 'colorsimple',
				'name' => 'side_area_dark_icon_hover_color',
				'default_value' => '',
				'label' => esc_html__( 'Dark Menu Icon Hover Color', 'walker' ),
			)
		);

		$side_area_icon_style_row4 = walker_edge_add_admin_row(
			array(
				'parent'		=> $side_area_icon_style_group,
				'name'			=> 'side_area_icon_style_row4'
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row4,
				'type' => 'colorsimple',
				'name' => 'side_area_close_icon_color',
				'default_value' => '',
				'label' => esc_html__( 'Close Icon Color', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row4,
				'type' => 'colorsimple',
				'name' => 'side_area_close_icon_hover_color',
				'default_value' => '',
				'label' => esc_html__( 'Close Icon Hover Color', 'walker' ),
			)
		);

		$icon_spacing_group = walker_edge_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'icon_spacing_group',
				'title' => esc_html__( 'Side Area Icon Spacing', 'walker' ),
				'description' => esc_html__( 'Define padding and margin for side area icon', 'walker' )
			)
		);

		$icon_spacing_row = walker_edge_add_admin_row(
			array(
				'parent'		=> $icon_spacing_group,
				'name'			=> 'icon_spancing_row',
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'side_area_icon_padding_left',
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
				'name' => 'side_area_icon_padding_right',
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
				'name' => 'side_area_icon_margin_left',
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
				'name' => 'side_area_icon_margin_right',
				'default_value' => '',
				'label' => esc_html__( 'Margin Right', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'selectblank',
				'name' => 'side_area_aligment',
				'default_value' => '',
				'label' => esc_html__( 'Text Aligment', 'walker' ),
				'description' => esc_html__( 'Choose text aligment for side area', 'walker' ),
				'options' => array(
					'center' => esc_html__( 'Center', 'walker' ),
					'left' => esc_html__( 'Left', 'walker' ),
					'right' => esc_html__( 'Right', 'walker' )
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_title',
				'default_value' => '',
				'label' => esc_html__( 'Side Area Title', 'walker' ),
				'description' => esc_html__( 'Enter a title to appear in Side Area', 'walker' ),
				'args' => array(
					'col_width' => 3,
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'color',
				'name' => 'side_area_background_color',
				'default_value' => '',
				'label' => esc_html__( 'Background Color', 'walker' ),
				'description' => esc_html__( 'Choose a background color for Side Area', 'walker' ),
			)
		);

		$padding_group = walker_edge_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'padding_group',
				'title' => esc_html__( 'Padding', 'walker' ),
				'description' => esc_html__( 'Define padding for Side Area', 'walker' )
			)
		);

		$padding_row = walker_edge_add_admin_row(
			array(
				'parent' => $padding_group,
				'name' => 'padding_row',
				'next' => true
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_top',
				'default_value' => '',
				'label' => esc_html__( 'Top Padding', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_right',
				'default_value' => '',
				'label' => esc_html__( 'Right Padding', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_bottom',
				'default_value' => '',
				'label' => esc_html__( 'Bottom Padding', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_left',
				'default_value' => '',
				'label' => esc_html__( 'Left Padding', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$title_group = walker_edge_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'title_group',
				'title' => esc_html__( 'Title', 'walker' ),
				'description' => esc_html__( 'Define Style for Side Area title', 'walker' )
			)
		);

		$title_row_1 = walker_edge_add_admin_row(
			array(
				'parent' => $title_group,
				'name' => 'title_row_1',
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $title_row_1,
				'type' => 'colorsimple',
				'name' => 'side_area_title_color',
				'default_value' => '',
				'label' => esc_html__( 'Text Color', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $title_row_1,
				'type' => 'textsimple',
				'name' => 'side_area_title_fontsize',
				'default_value' => '',
				'label' => esc_html__( 'Font Size', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $title_row_1,
				'type' => 'textsimple',
				'name' => 'side_area_title_lineheight',
				'default_value' => '',
				'label' => esc_html__( 'Line Height', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $title_row_1,
				'type' => 'selectblanksimple',
				'name' => 'side_area_title_texttransform',
				'default_value' => '',
				'label' => esc_html__( 'Text Transform', 'walker' ),
				'options' => walker_edge_get_text_transform_array()
			)
		);

		$title_row_2 = walker_edge_add_admin_row(
			array(
				'parent' => $title_group,
				'name' => 'title_row_2',
				'next' => true
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $title_row_2,
				'type' => 'fontsimple',
				'name' => 'side_area_title_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__( 'Font Family', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $title_row_2,
				'type' => 'selectblanksimple',
				'name' => 'side_area_title_fontstyle',
				'default_value' => '',
				'label' => esc_html__( 'Font Style', 'walker' ),
				'options' => walker_edge_get_font_style_array()
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $title_row_2,
				'type' => 'selectblanksimple',
				'name' => 'side_area_title_fontweight',
				'default_value' => '',
				'label' => esc_html__( 'Font Weight', 'walker' ),
				'options' => walker_edge_get_font_weight_array()
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $title_row_2,
				'type' => 'textsimple',
				'name' => 'side_area_title_letterspacing',
				'default_value' => '',
				'label' => esc_html__( 'Letter Spacing', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);


		$text_group = walker_edge_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'text_group',
				'title' => esc_html__( 'Text', 'walker' ),
				'description' => esc_html__( 'Define Style for Side Area text', 'walker' )
			)
		);

		$text_row_1 = walker_edge_add_admin_row(
			array(
				'parent' => $text_group,
				'name' => 'text_row_1',
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $text_row_1,
				'type' => 'colorsimple',
				'name' => 'side_area_text_color',
				'default_value' => '',
				'label' => esc_html__( 'Text Color', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $text_row_1,
				'type' => 'textsimple',
				'name' => 'side_area_text_fontsize',
				'default_value' => '',
				'label' => esc_html__( 'Font Size', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $text_row_1,
				'type' => 'textsimple',
				'name' => 'side_area_text_lineheight',
				'default_value' => '',
				'label' => esc_html__( 'Line Height', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $text_row_1,
				'type' => 'selectblanksimple',
				'name' => 'side_area_text_texttransform',
				'default_value' => '',
				'label' => esc_html__( 'Text Transform', 'walker' ),
				'options' => walker_edge_get_text_transform_array()
			)
		);

		$text_row_2 = walker_edge_add_admin_row(
			array(
				'parent' => $text_group,
				'name' => 'text_row_2',
				'next' => true
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'fontsimple',
				'name' => 'side_area_text_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__( 'Font Family', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'fontsimple',
				'name' => 'side_area_text_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__( 'Font Family', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'selectblanksimple',
				'name' => 'side_area_text_fontstyle',
				'default_value' => '',
				'label' => esc_html__( 'Font Style', 'walker' ),
				'options' => walker_edge_get_font_style_array()
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'selectblanksimple',
				'name' => 'side_area_text_fontweight',
				'default_value' => '',
				'label' => esc_html__( 'Font Weight', 'walker' ),
				'options' => walker_edge_get_font_weight_array()
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'textsimple',
				'name' => 'side_area_text_letterspacing',
				'default_value' => '',
				'label' => esc_html__( 'Letter Spacing', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$widget_links_group = walker_edge_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'widget_links_group',
				'title' => esc_html__( 'Link Style', 'walker' ),
				'description' => esc_html__( 'Define styles for Side Area widget links', 'walker' )
			)
		);

		$widget_links_row_1 = walker_edge_add_admin_row(
			array(
				'parent' => $widget_links_group,
				'name' => 'widget_links_row_1',
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $widget_links_row_1,
				'type' => 'colorsimple',
				'name' => 'sidearea_link_color',
				'default_value' => '',
				'label' => esc_html__( 'Text Color', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $widget_links_row_1,
				'type' => 'textsimple',
				'name' => 'sidearea_link_font_size',
				'default_value' => '',
				'label' => esc_html__( 'Font Size', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $widget_links_row_1,
				'type' => 'textsimple',
				'name' => 'sidearea_link_line_height',
				'default_value' => '',
				'label' => esc_html__( 'Line Height', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $widget_links_row_1,
				'type' => 'selectblanksimple',
				'name' => 'sidearea_link_text_transform',
				'default_value' => '',
				'label' => esc_html__( 'Text Transform', 'walker' ),
				'options' => walker_edge_get_text_transform_array()
			)
		);

		$widget_links_row_2 = walker_edge_add_admin_row(
			array(
				'parent' => $widget_links_group,
				'name' => 'widget_links_row_2',
				'next' => true
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $widget_links_row_2,
				'type' => 'fontsimple',
				'name' => 'sidearea_link_font_family',
				'default_value' => '-1',
				'label' => esc_html__( 'Font Family', 'walker' ),
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $widget_links_row_2,
				'type' => 'selectblanksimple',
				'name' => 'sidearea_link_font_style',
				'default_value' => '',
				'label' => esc_html__( 'Font Style', 'walker' ),
				'options' => walker_edge_get_font_style_array()
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $widget_links_row_2,
				'type' => 'selectblanksimple',
				'name' => 'sidearea_link_font_weight',
				'default_value' => '',
				'label' => esc_html__( 'Font Weight', 'walker' ),
				'options' => walker_edge_get_font_weight_array()
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $widget_links_row_2,
				'type' => 'textsimple',
				'name' => 'sidearea_link_letter_spacing',
				'default_value' => '',
				'label' => esc_html__( 'Letter Spacing', 'walker' ),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$widget_links_row_3 = walker_edge_add_admin_row(
			array(
				'parent' => $widget_links_group,
				'name' => 'widget_links_row_3',
				'next' => true
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $widget_links_row_3,
				'type' => 'colorsimple',
				'name' => 'sidearea_link_hover_color',
				'default_value' => '',
				'label' => esc_html__( 'Hover Color', 'walker' ),
			)
		);

	}

	add_action('walker_edge_options_map', 'walker_edge_sidearea_options_map', 15);
}