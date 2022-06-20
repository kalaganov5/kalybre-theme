<?php

$header_meta_box = walker_edge_create_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__( 'Header', 'walker' ),
        'name' => 'header_meta'
    )
);

    walker_edge_create_meta_box_field(
        array(
            'name' => 'edgtf_header_type_meta',
            'type' => 'select',
            'default_value' => '',
            'label' => esc_html__( 'Choose Header Type', 'walker' ),
            'description' => esc_html__( 'Select header type layout', 'walker' ),
            'parent' => $header_meta_box,
            'options' => array(
                '' => esc_html__( 'Default', 'walker' ),
                'header-standard' => esc_html__( 'Standard Header Layout', 'walker' ),
                'header-simple' => esc_html__( 'Simple Header Layout', 'walker' ),
                'header-classic' => esc_html__( 'Classic Header Layout', 'walker' ),
                'header-full-screen' => esc_html__( 'Full Screen Header Layout', 'walker' ),
                'header-vertical' => esc_html__( 'Vertical Header Layout', 'walker' ),
                'header-bottom' => esc_html__( 'Bottom Header Layout', 'walker' )
            ),
            'args' => array(
                "dependence" => true,
                "hide" => array(
                    "" => '#edgtf_edgtf_header_standard_type_meta_container, #edgtf_edgtf_header_simple_type_meta_container, #edgtf_edgtf_header_full_screen_type_meta_container, #edgtf_edgtf_header_vertical_type_meta_container, #edgtf_edgtf_header_bottom_type_meta_container',
                    "header-standard" => '#edgtf_edgtf_header_simple_type_meta_container, #edgtf_edgtf_header_classic_type_meta_container, #edgtf_edgtf_header_full_screen_type_meta_container, #edgtf_edgtf_header_vertical_type_meta_container, #edgtf_edgtf_header_bottom_type_meta_container',
                    "header-simple" => '#edgtf_edgtf_header_standard_type_meta_container, #edgtf_edgtf_header_classic_type_meta_container, #edgtf_edgtf_header_full_screen_type_meta_container, #edgtf_edgtf_header_vertical_type_meta_container, #edgtf_edgtf_header_bottom_type_meta_container',
                    "header-classic" => '#edgtf_edgtf_header_standard_type_meta_container, #edgtf_edgtf_header_simple_type_meta_container, #edgtf_edgtf_header_full_screen_type_meta_container, #edgtf_edgtf_header_vertical_type_meta_container, #edgtf_edgtf_header_bottom_type_meta_container',
                    "header-full-screen" => '#edgtf_edgtf_header_standard_type_meta_container, #edgtf_edgtf_header_simple_type_meta_container, #edgtf_edgtf_header_classic_type_meta_container, #edgtf_edgtf_header_vertical_type_meta_container, #edgtf_edgtf_header_bottom_type_meta_container',
                    "header-vertical" => '#edgtf_edgtf_header_standard_type_meta_container, #edgtf_edgtf_header_simple_type_meta_container, #edgtf_edgtf_header_classic_type_meta_container, #edgtf_edgtf_header_full_screen_type_meta_container, #edgtf_edgtf_header_bottom_type_meta_container',
                    "header-bottom" => '#edgtf_edgtf_header_standard_type_meta_container, #edgtf_edgtf_header_simple_type_meta_container, #edgtf_edgtf_header_classic_type_meta_container, #edgtf_edgtf_header_full_screen_type_meta_container, #edgtf_edgtf_header_vertical_type_meta_container',
                ),
                "show" => array(
                    "" => '',
                    "header-standard" => '#edgtf_edgtf_header_standard_type_meta_container',
                    "header-simple" => '#edgtf_edgtf_header_simple_type_meta_container',
                    "header-classic" => '#edgtf_edgtf_header_classic_type_meta_container',
                    "header-full-screen" => '#edgtf_edgtf_header_full_screen_type_meta_container',
                    "header-vertical" => '#edgtf_edgtf_header_vertical_type_meta_container',
                    "header-bottom" => '#edgtf_edgtf_header_bottom_type_meta_container'
                )
            )
        )
    );

    $header_standard_type_meta_container = walker_edge_add_admin_container(
        array(
            'parent' => $header_meta_box,
            'name' => 'edgtf_header_standard_type_meta_container',
            'hidden_property' => 'edgtf_header_type_meta',
            'hidden_values' => array(
                'header-simple',
	            'header-classic',
                'header-full-screen',
                'header-vertical',
                'header-bottom'
            ),
        )
    );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_background_color_header_standard_meta',
                'type' => 'color',
                'label' => esc_html__( 'Background Color', 'walker' ),
                'description' => esc_html__( 'Choose a background color for header area', 'walker' ),
                'parent' => $header_standard_type_meta_container
            )
        );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_background_transparency_header_standard_meta',
                'type' => 'text',
                'label' => esc_html__( 'Background Transparency', 'walker' ),
                'description' => esc_html__( 'Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'walker' ),
                'parent' => $header_standard_type_meta_container,
                'args' => array(
                    'col_width' => 2
                )
            )
        );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_border_bottom_color_header_standard_meta',
                'type' => 'color',
                'label' => esc_html__( 'Border Bottom Color', 'walker' ),
                'description' => esc_html__( 'Choose a border bottom color for header area', 'walker' ),
                'parent' => $header_standard_type_meta_container
            )
        );

    $header_simple_type_meta_container = walker_edge_add_admin_container(
        array(
            'parent' => $header_meta_box,
            'name' => 'edgtf_header_simple_type_meta_container',
            'hidden_property' => 'edgtf_header_type_meta',
            'hidden_values' => array(
                'header-standard',
	            'header-classic',
                'header-full-screen',
                'header-vertical',
                'header-bottom'
            ),
        )
    );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_enable_grid_layout_header_simple_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__( 'Enable Grid Layout', 'walker' ),
                'description' => esc_html__( 'Enabling this option you will set simple header area to be in grid', 'walker' ),
                'parent' => $header_simple_type_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__( 'No', 'walker' ),
                    'yes' => esc_html__( 'Yes', 'walker' ),
                )
            )
        );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_background_color_header_simple_meta',
                'type' => 'color',
                'label' => esc_html__( 'Background Color', 'walker' ),
                'description' => esc_html__( 'Choose a background color for header area', 'walker' ),
                'parent' => $header_simple_type_meta_container
            )
        );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_background_transparency_header_simple_meta',
                'type' => 'text',
                'label' => esc_html__( 'Background Transparency', 'walker' ),
                'description' => esc_html__( 'Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'walker' ),
                'parent' => $header_simple_type_meta_container,
                'args' => array(
                    'col_width' => 2
                )
            )
        );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_border_bottom_color_header_simple_meta',
                'type' => 'color',
                'label' => esc_html__( 'Border Bottom Color', 'walker' ),
                'description' => esc_html__( 'Choose a border bottom color for header area', 'walker' ),
                'parent' => $header_simple_type_meta_container
            )
        );

	$header_classic_type_meta_container = walker_edge_add_admin_container(
		array(
			'parent' => $header_meta_box,
			'name' => 'edgtf_header_classic_type_meta_container',
			'hidden_property' => 'edgtf_header_type_meta',
			'hidden_values' => array(
				'header-standard',
				'header-simple',
				'header-full-screen',
				'header-vertical',
				'header-bottom'
			),
		)
	);
	
		walker_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_menu_area_background_color_header_classic_meta',
				'type' => 'color',
				'label' => esc_html__( 'Background Color', 'walker' ),
				'description' => esc_html__( 'Choose a background color for header area', 'walker' ),
				'parent' => $header_classic_type_meta_container
			)
		);
		
		walker_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_menu_area_background_transparency_header_classic_meta',
				'type' => 'text',
				'label' => esc_html__( 'Background Transparency', 'walker' ),
				'description' => esc_html__( 'Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'walker' ),
				'parent' => $header_classic_type_meta_container,
				'args' => array(
					'col_width' => 2
				)
			)
		);
		
		walker_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_menu_area_border_bottom_color_header_classic_meta',
				'type' => 'color',
				'label' => esc_html__( 'Border Bottom Color', 'walker' ),
				'description' => esc_html__( 'Choose a border bottom color for header area', 'walker' ),
				'parent' => $header_classic_type_meta_container
			)
		);
	
	$header_full_screen_type_meta_container = walker_edge_add_admin_container(
        array(
            'parent' => $header_meta_box,
            'name' => 'edgtf_header_full_screen_type_meta_container',
            'hidden_property' => 'edgtf_header_type_meta',
            'hidden_values' => array(
                'header-standard',
                'header-simple',
	            'header-classic',
                'header-vertical',
                'header-bottom'
            ),
        )
    );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_enable_grid_layout_header_full_screen_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__( 'Enable Grid Layout', 'walker' ),
                'description' => esc_html__( 'Enabling this option you will set full screen header area to be in grid', 'walker' ),
                'parent' => $header_full_screen_type_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__( 'No', 'walker' ),
                    'yes' => esc_html__( 'Yes', 'walker' ),
                )
            )
        );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_background_color_header_full_screen_meta',
                'type' => 'color',
                'label' => esc_html__( 'Background Color', 'walker' ),
                'description' => esc_html__( 'Choose a background color for header area', 'walker' ),
                'parent' => $header_full_screen_type_meta_container
            )
        );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_background_transparency_header_full_screen_meta',
                'type' => 'text',
                'label' => esc_html__( 'Background Transparency', 'walker' ),
                'description' => esc_html__( 'Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'walker' ),
                'parent' => $header_full_screen_type_meta_container,
                'args' => array(
                    'col_width' => 2
                )
            )
        );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_border_bottom_color_header_full_screen_meta',
                'type' => 'color',
                'label' => esc_html__( 'Border Bottom Color', 'walker' ),
                'description' => esc_html__( 'Choose a border bottom color for header area', 'walker' ),
                'parent' => $header_full_screen_type_meta_container
            )
        );

    $header_vertical_type_meta_container = walker_edge_add_admin_container(
        array(
            'parent' => $header_meta_box,
            'name' => 'edgtf_header_vertical_type_meta_container',
            'hidden_property' => 'edgtf_header_type_meta',
            'hidden_values' => array(
                'header-standard',
                'header-simple',
	            'header-classic',
                'header-full-screen',
                'header-bottom'
            ),
        )
    );

        walker_edge_create_meta_box_field(array(
            'name'        => 'edgtf_vertical_header_background_color_meta',
            'type'        => 'color',
            'label' => esc_html__( 'Background Color', 'walker' ),
            'description' => esc_html__( 'Set background color for vertical menu', 'walker' ),
            'parent'      => $header_vertical_type_meta_container
        ));

        walker_edge_create_meta_box_field(array(
            'name'        => 'edgtf_vertical_header_transparency_meta',
            'type'        => 'text',
            'label' => esc_html__( 'Transparency', 'walker' ),
            'description' => esc_html__( 'Enter transparency for vertical menu (value from 0 to 1)', 'walker' ),
            'parent'      => $header_vertical_type_meta_container,
            'args'        => array(
                'col_width' => 1
            )
        ));

        walker_edge_create_meta_box_field(
            array(
                'name'          => 'edgtf_vertical_header_background_image_meta',
                'type'          => 'image',
                'default_value' => '',
                'label' => esc_html__( 'Background Image', 'walker' ),
                'description' => esc_html__( 'Set background image for vertical menu', 'walker' ),
                'parent'        => $header_vertical_type_meta_container
            )
        );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_disable_vertical_header_background_image_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__( 'Disable Background Image', 'walker' ),
                'description' => esc_html__( 'Enabling this option will hide background image in Vertical Menu', 'walker' ),
                'parent' => $header_vertical_type_meta_container
            )
        );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_vertical_header_text_align_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__( 'Choose Text Alignment', 'walker' ),
                'description' => esc_html__( 'Choose text alignment for Vertical Header elements (logo, menu and widgets)', 'walker' ),
                'parent' => $header_vertical_type_meta_container,
                'options' => array(
                    '' => '',
                    'left' => esc_html__( 'Left', 'walker' ),
                    'center' => esc_html__( 'Center', 'walker' ),
                )
            )
        );    

    $header_bottom_type_meta_container = walker_edge_add_admin_container(
        array(
            'parent' => $header_meta_box,
            'name' => 'edgtf_header_bottom_type_meta_container',
            'hidden_property' => 'edgtf_header_type_meta',
            'hidden_values' => array(
                'header-standard',
                'header-simple',
	            'header-classic',
                'header-full-screen',
                'header-vertical'
            ),
        )
    );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_background_color_header_bottom_meta',
                'type' => 'color',
                'label' => esc_html__( 'Background Color', 'walker' ),
                'description' => esc_html__( 'Choose a background color for header area', 'walker' ),
                'parent' => $header_bottom_type_meta_container
            )
        );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_background_transparency_header_bottom_meta',
                'type' => 'text',
                'label' => esc_html__( 'Background Transparency', 'walker' ),
                'description' => esc_html__( 'Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'walker' ),
                'parent' => $header_bottom_type_meta_container,
                'args' => array(
                    'col_width' => 2
                )
            )
        );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_menu_area_border_bottom_color_header_bottom_meta',
                'type' => 'color',
                'label' => esc_html__( 'Border Bottom Color', 'walker' ),
                'description' => esc_html__( 'Choose a border bottom color for header area', 'walker' ),
                'parent' => $header_bottom_type_meta_container
            )
        );    

    walker_edge_create_meta_box_field(
        array(
            'name' => 'edgtf_top_bar_meta',
            'type' => 'select',
            'default_value' => '',
            'label' => esc_html__( 'Top Bar', 'walker' ),
            'description' => esc_html__( 'Enabling this option will show top bar area', 'walker' ),
            'parent' => $header_meta_box,
            'options' => array(
                '' => esc_html__( 'Default', 'walker' ),
                'no' => esc_html__( 'No', 'walker' ),
                'yes' => esc_html__( 'Yes', 'walker' )
            ),
            'args' => array(
	            "dependence" => true,
	            "hide" => array(
		            "" => '#edgtf_edgtf_header_top_meta_container',
		            "no" => '#edgtf_edgtf_header_top_meta_container'

	            ),
	            "show" => array(
		            "yes" => '#edgtf_edgtf_header_top_meta_container'
	            )
            )
        )
    );

		$header_top_meta_container = walker_edge_add_admin_container(
			array(
				'parent' => $header_meta_box,
				'name' => 'edgtf_header_top_meta_container',
				'hidden_property' => 'edgtf_top_bar_meta',
				'hidden_values' => array(
					'',
					'no'
				),
			)
		);

		walker_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_top_bar_in_grid_meta',
				'type' => 'select',
				'default_value' => '',
				'label' => esc_html__( 'Enable Grid Layout', 'walker' ),
				'description' => esc_html__( 'Enabling this option you will set top header area to be in grid', 'walker' ),
				'parent' => $header_top_meta_container,
				'options' => array(
					'' => '',
					'no' => esc_html__( 'No', 'walker' ),
					'yes' => esc_html__( 'Yes', 'walker' )
				)
			)
		);

    if(walker_edge_options() -> getOptionValue('header_type') !== 'header-vertical') {
        walker_edge_create_meta_box_field(
            array(
                'name'            => 'edgtf_scroll_amount_for_sticky_meta',
                'type'            => 'text',
                'label' => esc_html__( 'Scroll amount for sticky header appearance', 'walker' ),
                'description' => esc_html__( 'Define scroll amount for sticky header appearance', 'walker' ),
                'parent'          => $header_meta_box,
                'args'            => array(
                    'col_width' => 2,
                    'suffix'    => 'px'
                ),
                'hidden_property' => 'header_behaviour',
                'hidden_values'   => array("sticky-header-on-scroll-up", "fixed-on-scroll")
            )
        );
    }

    walker_edge_create_meta_box_field(
        array(
            'name' => 'edgtf_header_style_meta',
            'type' => 'select',
            'default_value' => '',
            'label' => esc_html__( 'Header Skin', 'walker' ),
            'description' => esc_html__( 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'walker' ),
            'parent' => $header_meta_box,
            'options' => array(
                '' => '',
                'light-header' => esc_html__( 'Light', 'walker' ),
                'dark-header' => esc_html__( 'Dark', 'walker' )
            )
        )
    );        