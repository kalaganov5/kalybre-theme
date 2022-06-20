<?php

if ( ! function_exists('walker_edge_title_options_map') ) {

	function walker_edge_title_options_map() {

		walker_edge_add_admin_page(
			array(
				'slug' => '_title_page',
				'title' => esc_html__( 'Title', 'walker' ),
				'icon' => 'fa fa-list-alt'
			)
		);

		$panel_title = walker_edge_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title',
				'title' => esc_html__( 'Title Settings', 'walker' )
			)
		);

		walker_edge_add_admin_field(
			array(
				'name' => 'show_title_area',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => esc_html__( 'Show Title Area', 'walker' ),
				'description' => esc_html__( 'This option will enable/disable Title Area', 'walker' ),
				'parent' => $panel_title,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#edgtf_show_title_area_container"
				)
			)
		);

		$show_title_area_container = walker_edge_add_admin_container(
			array(
				'parent' => $panel_title,
				'name' => 'show_title_area_container',
				'hidden_property' => 'show_title_area',
				'hidden_value' => 'no'
			)
		);

		walker_edge_add_admin_field(
			array(
				'name' => 'title_area_type',
				'type' => 'select',
				'default_value' => 'standard',
				'label' => esc_html__( 'Title Area Type', 'walker' ),
				'description' => esc_html__( 'Choose title type', 'walker' ),
				'parent' => $show_title_area_container,
				'options' => array(
					'standard' => esc_html__( 'Standard', 'walker' ),
					'breadcrumb' => esc_html__( 'Breadcrumb', 'walker' )
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"standard" => "",
						"breadcrumb" => "#edgtf_title_area_type_container"
					),
					"show" => array(
						"standard" => "#edgtf_title_area_type_container",
						"breadcrumb" => ""
					)
				)
			)
		);

		$title_area_type_container = walker_edge_add_admin_container(
			array(
				'parent' => $show_title_area_container,
				'name' => 'title_area_type_container',
				'hidden_property' => 'title_area_type',
				'hidden_value' => '',
				'hidden_values' => array('breadcrumb'),
			)
		);

		walker_edge_add_admin_field(
			array(
				'name' => 'title_area_enable_breadcrumbs',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__( 'Enable Breadcrumbs', 'walker' ),
				'description' => esc_html__( 'This option will display Breadcrumbs in Title Area', 'walker' ),
				'parent' => $title_area_type_container,
			)
		);

        walker_edge_add_admin_field(
            array(
                'name' => 'title_predefined_size',
                'type' => 'select',
                'default_value' => 'small',
                'label' => esc_html__( 'Predefined Title Size', 'walker' ),
                'description' => esc_html__( 'Choose Title Predefined size', 'walker' ),
                'parent' => $title_area_type_container,
                'options' => array(
                    'small' => esc_html__( 'Small', 'walker' ),
                    'medium' => esc_html__( 'Medium', 'walker' ),
                    'large' => esc_html__( 'Large', 'walker' )
                )
            )
        );

		walker_edge_add_admin_field(
			array(
				'name' => 'title_area_vertial_alignment',
				'type' => 'select',
				'default_value' => 'header_bottom',
				'label' => esc_html__( 'Vertical Alignment', 'walker' ),
				'description' => esc_html__( 'Specify title vertical alignment', 'walker' ),
				'parent' => $show_title_area_container,
				'options' => array(
					'header_bottom' => esc_html__( 'From Bottom of Header', 'walker' ),
					'window_top' => esc_html__( 'From Window Top', 'walker' )
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'name' => 'title_area_content_alignment',
				'type' => 'select',
				'default_value' => 'left',
				'label' => esc_html__( 'Horizontal Alignment', 'walker' ),
				'description' => esc_html__( 'Specify title horizontal alignment', 'walker' ),
				'parent' => $show_title_area_container,
				'options' => array(
					'left' => esc_html__( 'Left', 'walker' ),
					'center' => esc_html__( 'Center', 'walker' ),
					'right' => esc_html__( 'Right', 'walker' )
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'name' => 'title_area_background_color',
				'type' => 'color',
				'label' => esc_html__( 'Background Color', 'walker' ),
				'description' => esc_html__( 'Choose a background color for Title Area', 'walker' ),
				'parent' => $show_title_area_container
			)
		);

		walker_edge_add_admin_field(
			array(
				'name' => 'title_area_background_image',
				'type' => 'image',
				'label' => esc_html__( 'Background Image', 'walker' ),
				'description' => esc_html__( 'Choose an Image for Title Area', 'walker' ),
				'parent' => $show_title_area_container
			)
		);

		walker_edge_add_admin_field(
			array(
				'name' => 'title_area_background_image_responsive',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__( 'Background Responsive Image', 'walker' ),
				'description' => esc_html__( 'Enabling this option will make Title background image responsive', 'walker' ),
				'parent' => $show_title_area_container,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#edgtf_title_area_background_image_responsive_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$title_area_background_image_responsive_container = walker_edge_add_admin_container(
			array(
				'parent' => $show_title_area_container,
				'name' => 'title_area_background_image_responsive_container',
				'hidden_property' => 'title_area_background_image_responsive',
				'hidden_value' => 'yes'
			)
		);

		walker_edge_add_admin_field(
			array(
				'name' => 'title_area_background_image_parallax',
				'type' => 'select',
				'default_value' => 'no',
				'label' => esc_html__( 'Background Image in Parallax', 'walker' ),
				'description' => esc_html__( 'Enabling this option will make Title background image parallax', 'walker' ),
				'parent' => $title_area_background_image_responsive_container,
				'options' => array(
					'no' => esc_html__( 'No', 'walker' ),
					'yes' => esc_html__( 'Yes', 'walker' ),
					'yes_zoom' => esc_html__( 'Yes, with zoom out', 'walker' )
				)
			)
		);

		walker_edge_add_admin_field(array(
			'name' => 'title_area_height',
			'type' => 'text',
			'label' => esc_html__( 'Height', 'walker' ),
			'description' => esc_html__( 'Set a height for Title Area', 'walker' ),
			'parent' => $title_area_background_image_responsive_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));


		$panel_typography = walker_edge_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title_typography',
				'title' => esc_html__( 'Typography', 'walker' )
			)
		);

        walker_edge_add_admin_section_title(array(
            'name' => 'type_section_title',
            'title' => esc_html__( 'Title', 'walker' ),
            'parent' => $panel_typography
        ));

        $group_page_title_styles = walker_edge_add_admin_group(array(
			'name'			=> 'group_page_title_styles',
			'title' => esc_html__( 'Small Size Type', 'walker' ),
			'description' => esc_html__( 'Define styles for page title small type', 'walker' ),
			'parent'		=> $panel_typography
		));

		$row_page_title_styles_1 = walker_edge_add_admin_row(array(
			'name'		=> 'row_page_title_styles_1',
			'parent'	=> $group_page_title_styles
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_title_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Color', 'walker' ),
			'parent'		=> $row_page_title_styles_1
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_fontsize',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Size', 'walker' ),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_1
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_lineheight',
			'default_value'	=> '',
			'label' => esc_html__( 'Line Height', 'walker' ),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_1
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_texttransform',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Transform', 'walker' ),
			'options'		=> walker_edge_get_text_transform_array(),
			'parent'		=> $row_page_title_styles_1
		));

		$row_page_title_styles_2 = walker_edge_add_admin_row(array(
			'name'		=> 'row_page_title_styles_2',
			'parent'	=> $group_page_title_styles,
			'next'		=> true
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_title_google_fonts',
			'default_value'	=> '-1',
			'label' => esc_html__( 'Font Family', 'walker' ),
			'parent'		=> $row_page_title_styles_2
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_fontstyle',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Style', 'walker' ),
			'options'		=> walker_edge_get_font_style_array(),
			'parent'		=> $row_page_title_styles_2
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_fontweight',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Weight', 'walker' ),
			'options'		=> walker_edge_get_font_weight_array(),
			'parent'		=> $row_page_title_styles_2
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_letter_spacing',
			'default_value'	=> '',
			'label' => esc_html__( 'Letter Spacing', 'walker' ),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_2
		));

        $group_page_title_medium_styles = walker_edge_add_admin_group(array(
            'name'			=> 'group_page_title_medium_styles',
            'title' => esc_html__( 'Normal Size Type', 'walker' ),
            'description' => esc_html__( 'Define styles for page title normal type', 'walker' ),
            'parent'		=> $panel_typography
        ));

        $row_page_title_medium_styles_1 = walker_edge_add_admin_row(array(
            'name'		=> 'row_page_title_medium_styles_1',
            'parent'	=> $group_page_title_medium_styles
        ));

        walker_edge_add_admin_field(array(
            'type'			=> 'colorsimple',
            'name'			=> 'page_title_medium_color',
            'default_value'	=> '',
            'label' => esc_html__( 'Text Color', 'walker' ),
            'parent'		=> $row_page_title_medium_styles_1
        ));

        walker_edge_add_admin_field(array(
            'type'			=> 'textsimple',
            'name'			=> 'page_title_medium_fontsize',
            'default_value'	=> '',
            'label' => esc_html__( 'Font Size', 'walker' ),
            'args'			=> array(
                'suffix'	=> 'px'
            ),
            'parent'		=> $row_page_title_medium_styles_1
        ));

        walker_edge_add_admin_field(array(
            'type'			=> 'textsimple',
            'name'			=> 'page_title_medium_lineheight',
            'default_value'	=> '',
            'label' => esc_html__( 'Line Height', 'walker' ),
            'args'			=> array(
                'suffix'	=> 'px'
            ),
            'parent'		=> $row_page_title_medium_styles_1
        ));

        walker_edge_add_admin_field(array(
            'type'			=> 'selectblanksimple',
            'name'			=> 'page_title_medium_texttransform',
            'default_value'	=> '',
            'label' => esc_html__( 'Text Transform', 'walker' ),
            'options'		=> walker_edge_get_text_transform_array(),
            'parent'		=> $row_page_title_medium_styles_1
        ));

        $row_page_title_medium_styles_2 = walker_edge_add_admin_row(array(
            'name'		=> 'row_page_title_medium_styles_2',
            'parent'	=> $group_page_title_medium_styles,
            'next'		=> true
        ));

        walker_edge_add_admin_field(array(
            'type'			=> 'fontsimple',
            'name'			=> 'page_title_medium_google_fonts',
            'default_value'	=> '-1',
            'label' => esc_html__( 'Font Family', 'walker' ),
            'parent'		=> $row_page_title_medium_styles_2
        ));

        walker_edge_add_admin_field(array(
            'type'			=> 'selectblanksimple',
            'name'			=> 'page_title_medium_fontstyle',
            'default_value'	=> '',
            'label' => esc_html__( 'Font Style', 'walker' ),
            'options'		=> walker_edge_get_font_style_array(),
            'parent'		=> $row_page_title_medium_styles_2
        ));

        walker_edge_add_admin_field(array(
            'type'			=> 'selectblanksimple',
            'name'			=> 'page_title_medium_fontweight',
            'default_value'	=> '',
            'label' => esc_html__( 'Font Weight', 'walker' ),
            'options'		=> walker_edge_get_font_weight_array(),
            'parent'		=> $row_page_title_medium_styles_2
        ));

        walker_edge_add_admin_field(array(
            'type'			=> 'textsimple',
            'name'			=> 'page_title_medium_letter_spacing',
            'default_value'	=> '',
            'label' => esc_html__( 'Letter Spacing', 'walker' ),
            'args'			=> array(
                'suffix'	=> 'px'
            ),
            'parent'		=> $row_page_title_medium_styles_2
        ));

        $group_page_title_large_styles = walker_edge_add_admin_group(array(
            'name'			=> 'group_page_title_large_styles',
            'title' => esc_html__( 'Large Size Type', 'walker' ),
            'description' => esc_html__( 'Define styles for page title large type', 'walker' ),
            'parent'		=> $panel_typography
        ));

        $row_page_title_large_styles_1 = walker_edge_add_admin_row(array(
            'name'		=> 'row_page_title_large_styles_1',
            'parent'	=> $group_page_title_large_styles
        ));

        walker_edge_add_admin_field(array(
            'type'			=> 'colorsimple',
            'name'			=> 'page_title_large_color',
            'default_value'	=> '',
            'label' => esc_html__( 'Text Color', 'walker' ),
            'parent'		=> $row_page_title_large_styles_1
        ));

        walker_edge_add_admin_field(array(
            'type'			=> 'textsimple',
            'name'			=> 'page_title_large_fontsize',
            'default_value'	=> '',
            'label' => esc_html__( 'Font Size', 'walker' ),
            'args'			=> array(
                'suffix'	=> 'px'
            ),
            'parent'		=> $row_page_title_large_styles_1
        ));

        walker_edge_add_admin_field(array(
            'type'			=> 'textsimple',
            'name'			=> 'page_title_large_lineheight',
            'default_value'	=> '',
            'label' => esc_html__( 'Line Height', 'walker' ),
            'args'			=> array(
                'suffix'	=> 'px'
            ),
            'parent'		=> $row_page_title_large_styles_1
        ));

        walker_edge_add_admin_field(array(
            'type'			=> 'selectblanksimple',
            'name'			=> 'page_title_large_texttransform',
            'default_value'	=> '',
            'label' => esc_html__( 'Text Transform', 'walker' ),
            'options'		=> walker_edge_get_text_transform_array(),
            'parent'		=> $row_page_title_large_styles_1
        ));

        $row_page_title_large_styles_2 = walker_edge_add_admin_row(array(
            'name'		=> 'row_page_title_large_styles_2',
            'parent'	=> $group_page_title_large_styles,
            'next'		=> true
        ));

        walker_edge_add_admin_field(array(
            'type'			=> 'fontsimple',
            'name'			=> 'page_title_large_google_fonts',
            'default_value'	=> '-1',
            'label' => esc_html__( 'Font Family', 'walker' ),
            'parent'		=> $row_page_title_large_styles_2
        ));

        walker_edge_add_admin_field(array(
            'type'			=> 'selectblanksimple',
            'name'			=> 'page_title_large_fontstyle',
            'default_value'	=> '',
            'label' => esc_html__( 'Font Style', 'walker' ),
            'options'		=> walker_edge_get_font_style_array(),
            'parent'		=> $row_page_title_large_styles_2
        ));

        walker_edge_add_admin_field(array(
            'type'			=> 'selectblanksimple',
            'name'			=> 'page_title_large_fontweight',
            'default_value'	=> '',
            'label' => esc_html__( 'Font Weight', 'walker' ),
            'options'		=> walker_edge_get_font_weight_array(),
            'parent'		=> $row_page_title_large_styles_2
        ));

        walker_edge_add_admin_field(array(
            'type'			=> 'textsimple',
            'name'			=> 'page_title_large_letter_spacing',
            'default_value'	=> '',
            'label' => esc_html__( 'Letter Spacing', 'walker' ),
            'args'			=> array(
                'suffix'	=> 'px'
            ),
            'parent'		=> $row_page_title_large_styles_2
        ));

        walker_edge_add_admin_section_title(array(
            'name' => 'type_section_subtitle',
            'title' => esc_html__( 'Subtitle', 'walker' ),
            'parent' => $panel_typography
        ));

		$group_page_subtitle_styles = walker_edge_add_admin_group(array(
			'name'			=> 'group_page_subtitle_styles',
			'title' => esc_html__( 'Subtitle', 'walker' ),
			'description' => esc_html__( 'Define styles for page subtitle', 'walker' ),
			'parent'		=> $panel_typography
		));

		$row_page_subtitle_styles_1 = walker_edge_add_admin_row(array(
			'name'		=> 'row_page_subtitle_styles_1',
			'parent'	=> $group_page_subtitle_styles
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_subtitle_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Color', 'walker' ),
			'parent'		=> $row_page_subtitle_styles_1
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_fontsize',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Size', 'walker' ),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_1
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_lineheight',
			'default_value'	=> '',
			'label' => esc_html__( 'Line Height', 'walker' ),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_1
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_texttransform',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Transform', 'walker' ),
			'options'		=> walker_edge_get_text_transform_array(),
			'parent'		=> $row_page_subtitle_styles_1
		));

		$row_page_subtitle_styles_2 = walker_edge_add_admin_row(array(
			'name'		=> 'row_page_subtitle_styles_2',
			'parent'	=> $group_page_subtitle_styles,
			'next'		=> true
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_subtitle_google_fonts',
			'default_value'	=> '-1',
			'label' => esc_html__( 'Font Family', 'walker' ),
			'parent'		=> $row_page_subtitle_styles_2
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_fontstyle',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Style', 'walker' ),
			'options'		=> walker_edge_get_font_style_array(),
			'parent'		=> $row_page_subtitle_styles_2
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_fontweight',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Weight', 'walker' ),
			'options'		=> walker_edge_get_font_weight_array(),
			'parent'		=> $row_page_subtitle_styles_2
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_letter_spacing',
			'default_value'	=> '',
			'label' => esc_html__( 'Letter Spacing', 'walker' ),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_2
		));

        walker_edge_add_admin_section_title(array(
            'name' => 'type_section_breadcrumbs',
            'title' => esc_html__( 'Breadcrumbs', 'walker' ),
            'parent' => $panel_typography
        ));

		$group_page_breadcrumbs_styles = walker_edge_add_admin_group(array(
			'name'			=> 'group_page_breadcrumbs_styles',
			'title' => esc_html__( 'Breadcrumbs', 'walker' ),
			'description' => esc_html__( 'Define styles for page breadcrumbs', 'walker' ),
			'parent'		=> $panel_typography
		));

		$row_page_breadcrumbs_styles_1 = walker_edge_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_1',
			'parent'	=> $group_page_breadcrumbs_styles
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_breadcrumb_color',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Color', 'walker' ),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_fontsize',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Size', 'walker' ),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_lineheight',
			'default_value'	=> '',
			'label' => esc_html__( 'Line Height', 'walker' ),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_texttransform',
			'default_value'	=> '',
			'label' => esc_html__( 'Text Transform', 'walker' ),
			'options'		=> walker_edge_get_text_transform_array(),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		$row_page_breadcrumbs_styles_2 = walker_edge_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_2',
			'parent'	=> $group_page_breadcrumbs_styles,
			'next'		=> true
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_breadcrumb_google_fonts',
			'default_value'	=> '-1',
			'label' => esc_html__( 'Font Family', 'walker' ),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_fontstyle',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Style', 'walker' ),
			'options'		=> walker_edge_get_font_style_array(),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_fontweight',
			'default_value'	=> '',
			'label' => esc_html__( 'Font Weight', 'walker' ),
			'options'		=> walker_edge_get_font_weight_array(),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_letter_spacing',
			'default_value'	=> '',
			'label' => esc_html__( 'Letter Spacing', 'walker' ),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		$row_page_breadcrumbs_styles_3 = walker_edge_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_3',
			'parent'	=> $group_page_breadcrumbs_styles,
			'next'		=> true
		));

		walker_edge_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_breadcrumb_hovercolor',
			'default_value'	=> '',
			'label' => esc_html__( 'Hover/Active Color', 'walker' ),
			'parent'		=> $row_page_breadcrumbs_styles_3
		));
    }

	add_action( 'walker_edge_options_map', 'walker_edge_title_options_map', 6);
}