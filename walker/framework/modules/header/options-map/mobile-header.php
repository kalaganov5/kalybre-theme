<?php

if ( ! function_exists('walker_edge_mobile_header_options_map') ) {

	function walker_edge_mobile_header_options_map() {

		walker_edge_add_admin_page(array(
			'slug'  => '_mobile_header',
			'title' => esc_html__( 'Mobile Header', 'walker' ),
			'icon'  => 'fa fa-mobile'
		));

		$panel_mobile_header = walker_edge_add_admin_panel(array(
			'title' => esc_html__( 'Mobile header', 'walker' ),
			'name'  => 'panel_mobile_header',
			'page'  => '_mobile_header'
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_header_height',
			'type'        => 'text',
			'label' => esc_html__( 'Mobile Header Height', 'walker' ),
			'description' => esc_html__( 'Enter height for mobile header in pixels', 'walker' ),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_header_background_color',
			'type'        => 'color',
			'label' => esc_html__( 'Mobile Header Background Color', 'walker' ),
			'description' => esc_html__( 'Choose background color for mobile header', 'walker' ),
			'parent'      => $panel_mobile_header
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_header_border_bottom_color',
			'type'        => 'color',
			'label' => esc_html__( 'Mobile Header Border Bottom Color', 'walker' ),
			'description' => esc_html__( 'Choose border bottom color for mobile header', 'walker' ),
			'parent'      => $panel_mobile_header
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_menu_background_color',
			'type'        => 'color',
			'label' => esc_html__( 'Mobile Menu Background Color', 'walker' ),
			'description' => esc_html__( 'Choose background color for mobile menu', 'walker' ),
			'parent'      => $panel_mobile_header
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_menu_border_bottom_color',
			'type'        => 'color',
			'label' => esc_html__( 'Mobile Menu Border Bottom Color', 'walker' ),
			'description' => esc_html__( 'Choose border bottom color for mobile menu', 'walker' ),
			'parent'      => $panel_mobile_header
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_menu_separator_color',
			'type'        => 'color',
			'label' => esc_html__( 'Mobile Menu Item Separator Color', 'walker' ),
			'description' => esc_html__( 'Choose color for mobile menu horizontal separators', 'walker' ),
			'parent'      => $panel_mobile_header
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_logo_height',
			'type'        => 'text',
			'label' => esc_html__( 'Logo Height For Mobile Header', 'walker' ),
			'description' => esc_html__( 'Define logo height for screen size smaller than 1024px', 'walker' ),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_logo_height_phones',
			'type'        => 'text',
			'label' => esc_html__( 'Logo Height For Mobile Devices', 'walker' ),
			'description' => esc_html__( 'Define logo height for screen size smaller than 480px', 'walker' ),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		walker_edge_add_admin_section_title(array(
			'parent' => $panel_mobile_header,
			'name'   => 'mobile_header_fonts_title',
			'title' => esc_html__( 'Typography', 'walker' )
		));

		$first_level_group = walker_edge_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name' => 'first_level_group',
				'title' => esc_html__( '1st Level Menu', 'walker' ),
				'description' => esc_html__( 'Define styles for 1st level in Mobile Menu Navigation', 'walker' )
			)
		);

		$first_level_row1 = walker_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row1'
			)
		);

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_text_color',
			'type'        => 'colorsimple',
			'label' => esc_html__( 'Navigation Text Color', 'walker' ),
			'description' => esc_html__( 'Define color for mobile navigation text', 'walker' ),
			'parent'      => $first_level_row1
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_text_hover_color',
			'type'        => 'colorsimple',
			'label' => esc_html__( 'Navigation Hover/Active Color', 'walker' ),
			'description' => esc_html__( 'Define hover/active color for mobile navigation text', 'walker' ),
			'parent'      => $first_level_row1
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_font_family',
			'type'        => 'fontsimple',
			'label' => esc_html__( 'Navigation Font Family', 'walker' ),
			'description' => esc_html__( 'Define font family for mobile navigation text', 'walker' ),
			'parent'      => $first_level_row1
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_font_size',
			'type'        => 'textsimple',
			'label' => esc_html__( 'Navigation Font Size', 'walker' ),
			'description' => esc_html__( 'Define font size for mobile navigation text', 'walker' ),
			'parent'      => $first_level_row1,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		$first_level_row2 = walker_edge_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name' => 'first_level_row2'
			)
		);

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_line_height',
			'type'        => 'textsimple',
			'label' => esc_html__( 'Navigation Line Height', 'walker' ),
			'description' => esc_html__( 'Define line height for mobile navigation text', 'walker' ),
			'parent'      => $first_level_row2,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_text_transform',
			'type'        => 'selectsimple',
			'label' => esc_html__( 'Navigation Text Transform', 'walker' ),
			'description' => esc_html__( 'Define text transform for mobile navigation text', 'walker' ),
			'parent'      => $first_level_row2,
			'options'     => walker_edge_get_text_transform_array(true)
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_font_style',
			'type'        => 'selectsimple',
			'label' => esc_html__( 'Navigation Font Style', 'walker' ),
			'description' => esc_html__( 'Define font style for mobile navigation text', 'walker' ),
			'parent'      => $first_level_row2,
			'options'     => walker_edge_get_font_style_array(true)
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_font_weight',
			'type'        => 'selectsimple',
			'label' => esc_html__( 'Navigation Font Weight', 'walker' ),
			'description' => esc_html__( 'Define font weight for mobile navigation text', 'walker' ),
			'parent'      => $first_level_row2,
			'options'     => walker_edge_get_font_weight_array(true)
		));

		$second_level_group = walker_edge_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name' => 'second_level_group',
				'title' => esc_html__( 'Dropdown Menu', 'walker' ),
				'description' => esc_html__( 'Define styles for 1st level in Mobile Menu Navigation', 'walker' )
			)
		);

		$second_level_row1 = walker_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row1'
			)
		);

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_dropdown_text_color',
			'type'        => 'colorsimple',
			'label' => esc_html__( 'Navigation Text Color', 'walker' ),
			'description' => esc_html__( 'Define color for mobile navigation text', 'walker' ),
			'parent'      => $second_level_row1
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_dropdown_text_hover_color',
			'type'        => 'colorsimple',
			'label' => esc_html__( 'Navigation Hover/Active Color', 'walker' ),
			'description' => esc_html__( 'Define hover/active color for mobile navigation text', 'walker' ),
			'parent'      => $second_level_row1
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_dropdown_font_family',
			'type'        => 'fontsimple',
			'label' => esc_html__( 'Navigation Font Family', 'walker' ),
			'description' => esc_html__( 'Define font family for mobile navigation text', 'walker' ),
			'parent'      => $second_level_row1
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_dropdown_font_size',
			'type'        => 'textsimple',
			'label' => esc_html__( 'Navigation Font Size', 'walker' ),
			'description' => esc_html__( 'Define font size for mobile navigation text', 'walker' ),
			'parent'      => $second_level_row1,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		$second_level_row2 = walker_edge_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name' => 'second_level_row2'
			)
		);

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_dropdown_line_height',
			'type'        => 'textsimple',
			'label' => esc_html__( 'Navigation Line Height', 'walker' ),
			'description' => esc_html__( 'Define line height for mobile navigation text', 'walker' ),
			'parent'      => $second_level_row2,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_dropdown_text_transform',
			'type'        => 'selectsimple',
			'label' => esc_html__( 'Navigation Text Transform', 'walker' ),
			'description' => esc_html__( 'Define text transform for mobile navigation text', 'walker' ),
			'parent'      => $second_level_row2,
			'options'     => walker_edge_get_text_transform_array(true)
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_dropdown_font_style',
			'type'        => 'selectsimple',
			'label' => esc_html__( 'Navigation Font Style', 'walker' ),
			'description' => esc_html__( 'Define font style for mobile navigation text', 'walker' ),
			'parent'      => $second_level_row2,
			'options'     => walker_edge_get_font_style_array(true)
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_dropdown_font_weight',
			'type'        => 'selectsimple',
			'label' => esc_html__( 'Navigation Font Weight', 'walker' ),
			'description' => esc_html__( 'Define font weight for mobile navigation text', 'walker' ),
			'parent'      => $second_level_row2,
			'options'     => walker_edge_get_font_weight_array(true)
		));

		walker_edge_add_admin_section_title(array(
			'name' => 'mobile_opener_panel',
			'parent' => $panel_mobile_header,
			'title' => esc_html__( 'Mobile Menu Opener', 'walker' )
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_menu_title',
			'type'        => 'text',
			'label' => esc_html__( 'Mobile Navigation Title', 'walker' ),
			'description' => esc_html__( 'Enter title for mobile menu navigation', 'walker' ),
			'parent'      => $panel_mobile_header,
			'default_value' => 'MENU',
			'args' => array(
				'col_width' => 3
			)
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_icon_pack',
			'type'        => 'select',
			'label' => esc_html__( 'Mobile Navigation Icon Pack', 'walker' ),
			'default_value' => 'font_awesome',
			'description' => esc_html__( 'Choose icon pack for mobile navigation icon', 'walker' ),
			'parent'      => $panel_mobile_header,
			'options'     => walker_edge_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'simple_line_icons'))
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_icon_color',
			'type'        => 'color',
			'label' => esc_html__( 'Mobile Navigation Icon Color', 'walker' ),
			'description' => esc_html__( 'Choose color for icon header', 'walker' ),
			'parent'      => $panel_mobile_header
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_icon_hover_color',
			'type'        => 'color',
			'label' => esc_html__( 'Mobile Navigation Icon Hover Color', 'walker' ),
			'description' => esc_html__( 'Choose hover color for mobile navigation icon ', 'walker' ),
			'parent'      => $panel_mobile_header
		));

		walker_edge_add_admin_field(array(
			'name'        => 'mobile_icon_size',
			'type'        => 'text',
			'label' => esc_html__( 'Mobile Navigation Icon size', 'walker' ),
			'description' => esc_html__( 'Choose size for mobile navigation icon ', 'walker' ),
			'parent'      => $panel_mobile_header,
			'args' => array(
				'col_width' => 3,
				'suffix' => 'px'
			)
		));

	}

	add_action( 'walker_edge_options_map', 'walker_edge_mobile_header_options_map', 5);
}