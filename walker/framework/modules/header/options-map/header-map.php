<?php

if ( ! function_exists('walker_edge_header_options_map') ) {

	function walker_edge_header_options_map() {

		walker_edge_add_admin_page(
			array(
				'slug' => '_header_page',
				'title' => esc_html__( 'Header', 'walker' ),
				'icon' => 'fa fa-header'
			)
		);

		$panel_header = walker_edge_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header',
				'title' => esc_html__( 'Header', 'walker' )
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'radiogroup',
				'name' => 'header_type',
				'default_value' => 'header-standard',
				'label' => esc_html__( 'Choose Header Type', 'walker' ),
				'description' => esc_html__( 'Select the type of header you would like to use', 'walker' ),
				'options' => array(
					'header-standard' => array(
						'image' => EDGE_FRAMEWORK_ADMIN_ASSETS_ROOT.'/img/header-standard.png'
					),
					'header-simple' => array(
                        'image' => EDGE_FRAMEWORK_ADMIN_ASSETS_ROOT.'/img/header-simple.png'
                    ),
					'header-classic' => array(
						'image' => EDGE_FRAMEWORK_ADMIN_ASSETS_ROOT.'/img/header-classic.png'
					),
                    'header-full-screen' => array(
                        'image' => EDGE_FRAMEWORK_ADMIN_ASSETS_ROOT.'/img/header-full-screen.png'
                    ),
                    'header-vertical' => array(
                        'image' => EDGE_FRAMEWORK_ADMIN_ASSETS_ROOT.'/img/header-vertical.png'
                    ),
                    'header-bottom' => array(
                        'image' => EDGE_FRAMEWORK_ADMIN_ASSETS_ROOT.'/img/header-bottom.png'
                    )
				),
				'args' => array(
					'use_images' => true,
					'hide_labels' => true,
					'dependence' => true,
					'show' => array(
						'header-standard' => '#edgtf_panel_header_standard,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_panel_main_menu',
						'header-simple' => '#edgtf_panel_header_simple,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_panel_main_menu',
						'header-classic' => '#edgtf_panel_header_classic,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_panel_main_menu',
						'header-full-screen' => '#edgtf_panel_header_full_screen',
                        'header-vertical' => '#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu',
                        'header-bottom' => '#edgtf_panel_header_bottom,#edgtf_panel_fixed_header,#edgtf_panel_main_menu'
					),
					'hide' => array(
						'header-standard' => '#edgtf_panel_header_simple,#edgtf_panel_header_full_screen,#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu,#edgtf_panel_header_bottom',
						'header-simple' => '#edgtf_panel_header_standard,#edgtf_panel_header_full_screen,#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu,#edgtf_panel_header_bottom',
						'header-classic' => '#edgtf_panel_header_standard,#edgtf_panel_header_simple,#edgtf_panel_header_full_screen,#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu,#edgtf_panel_header_bottom',
						'header-full-screen' => '#edgtf_panel_header_standard,#edgtf_panel_header_simple,#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu,#edgtf_panel_header_bottom,#edgtf_panel_main_menu,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header',
                        'header-vertical' => '#edgtf_panel_header_standard,#edgtf_panel_header_simple,#edgtf_panel_header_full_screen,#edgtf_panel_header_bottom,#edgtf_header_behaviour,#edgtf_panel_fixed_header,#edgtf_panel_sticky_header,#edgtf_panel_main_menu',
                        'header-bottom' => '#edgtf_panel_header_standard,#edgtf_panel_header_simple,#edgtf_panel_header_full_screen,#edgtf_panel_header_vertical,#edgtf_panel_vertical_main_menu,#edgtf_header_behaviour,#edgtf_panel_sticky_header,#edgtf_panel_main_menu'
                        
					)
				)
			)
		);

		walker_edge_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'select',
				'name' => 'header_behaviour',
				'default_value' => 'fixed-on-scroll',
				'label' => esc_html__( 'Choose Header Behaviour', 'walker' ),
				'description' => esc_html__( 'Select the behaviour of header when you scroll down to page', 'walker' ),
				'options' => array(
					'sticky-header-on-scroll-up' => esc_html__( 'Sticky on scroll up', 'walker' ),
					'sticky-header-on-scroll-down-up' => esc_html__( 'Sticky on scroll up/down', 'walker' ),
					'fixed-on-scroll' => esc_html__( 'Fixed on scroll', 'walker' )
				),
				'args' => array(
					'dependence' => true,
					'show' => array(
						'sticky-header-on-scroll-up' => '#edgtf_panel_sticky_header',
						'sticky-header-on-scroll-down-up' => '#edgtf_panel_sticky_header',
						'fixed-on-scroll' => '#edgtf_panel_fixed_header'
					),
					'hide' => array(
						'sticky-header-on-scroll-up' => '#edgtf_panel_fixed_header',
						'sticky-header-on-scroll-down-up' => '#edgtf_panel_fixed_header',
						'fixed-on-scroll' => '#edgtf_panel_sticky_header'
					)
				),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array(
	                'header-full-screen',
	                'header-vertical',
	                'header-bottom'
                )
			)
		);

		/***************** Top Header Layout **********************/

			walker_edge_add_admin_field(
				array(
					'name' => 'top_bar',
					'type' => 'yesno',
					'default_value' => 'no',
					'label' => esc_html__( 'Top Bar', 'walker' ),
					'description' => esc_html__( 'Enabling this option will show top bar area', 'walker' ),
					'parent' => $panel_header,
					'args' => array(
						"dependence" => true,
						"dependence_hide_on_yes" => "",
						"dependence_show_on_yes" => "#edgtf_top_bar_container"
					)
				)
			);

			$top_bar_container = walker_edge_add_admin_container(array(
				'name' => 'top_bar_container',
				'parent' => $panel_header,
				'hidden_property' => 'top_bar',
				'hidden_value' => 'no'
			));

			walker_edge_add_admin_field(
				array(
					'parent' => $top_bar_container,
					'type' => 'select',
					'name' => 'top_bar_layout',
					'default_value' => 'three-columns',
					'label' => esc_html__( 'Choose Top Bar Layout', 'walker' ),
					'description' => esc_html__( 'Select the layout for top bar', 'walker' ),
					'options' => array(
						'two-columns' => esc_html__( 'Two columns', 'walker' ),
						'three-columns' => esc_html__( 'Three columns', 'walker' )
					),
					'args' => array(
						"dependence" => true,
						"hide" => array(
							"two-columns" => "#edgtf_top_bar_layout_container",
							"three-columns" => ""
						),
						"show" => array(
							"two-columns" => "",
							"three-columns" => "#edgtf_top_bar_layout_container"
						)
					)
				)
			);

			$top_bar_layout_container = walker_edge_add_admin_container(array(
				'name' => 'top_bar_layout_container',
				'parent' => $top_bar_container,
				'hidden_property' => 'top_bar_layout',
				'hidden_value' => '',
				'hidden_values' => array("two-columns"),
			));

			walker_edge_add_admin_field(
				array(
					'parent' => $top_bar_layout_container,
					'type' => 'select',
					'name' => 'top_bar_column_widths',
					'default_value' => '30-30-30',
					'label' => esc_html__( 'Choose Column Widths', 'walker' ),
					'description' => '',
					'options' => array(
						'30-30-30' => esc_html__( '33% - 33% - 33%', 'walker' ),
						'25-50-25' => esc_html__( '25% - 50% - 25%', 'walker' )
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'name' => 'top_bar_in_grid',
					'type' => 'yesno',
					'default_value' => 'no',
					'label' => esc_html__( 'Top Bar in Grid', 'walker' ),
					'description' => esc_html__( 'Set top bar content to be in grid', 'walker' ),
					'parent' => $top_bar_container,
					'args' => array(
						"dependence" => true,
						"dependence_hide_on_yes" => "",
						"dependence_show_on_yes" => "#edgtf_top_bar_in_grid_container"
					)
				)
			);

			walker_edge_add_admin_field(array(
				'name' => 'top_bar_background_color',
				'type' => 'color',
				'label' => esc_html__( 'Background Color', 'walker' ),
				'description' => esc_html__( 'Set background color for top bar', 'walker' ),
				'parent' => $top_bar_container
			));

			walker_edge_add_admin_field(array(
				'name' => 'top_bar_background_transparency',
				'type' => 'text',
				'label' => esc_html__( 'Background Transparency', 'walker' ),
				'description' => esc_html__( 'Set background transparency for top bar', 'walker' ),
				'parent' => $top_bar_container,
				'args' => array('col_width' => 3)
			));

			walker_edge_add_admin_field(array(
				'name' => 'top_bar_height',
				'type' => 'text',
				'label' => esc_html__( 'Top Bar Height', 'walker' ),
				'description' => esc_html__( 'Enter top bar height (Default is 42px)', 'walker' ),
				'parent' => $top_bar_container,
				'args' => array(
					'col_width' => 2,
					'suffix' => 'px'
				)
			));

		/***************** Top Header Layout **********************/	

		/***************** Header Skin Options ********************/

			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header,
					'type' => 'select',
					'name' => 'header_style',
					'default_value' => '',
					'label' => esc_html__( 'Header Skin', 'walker' ),
					'description' => esc_html__( 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'walker' ),
					'options' => array(
						'' => '',
						'light-header' => esc_html__( 'Light', 'walker' ),
						'dark-header' => esc_html__( 'Dark', 'walker' )
					)
				)
			);

		/***************** Header Skin Options ********************/	

		/***************** Standard Header Layout *****************/

			$panel_header_standard = walker_edge_add_admin_panel(
				array(
					'page' => '_header_page',
					'name' => 'panel_header_standard',
					'title' => esc_html__( 'Header Standard', 'walker' ),
					'hidden_property' => 'header_type',
					'hidden_value' => '',
					'hidden_values' => array(
	                    'header-simple',
						'header-classic',
	                    'header-full-screen',
	                    'header-vertical',
	                    'header-bottom'
					)
				)
			);

			walker_edge_add_admin_section_title(
				array(
					'parent' => $panel_header_standard,
					'name' => 'menu_area_title',
					'title' => esc_html__( 'Menu Area', 'walker' )
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header_standard,
					'type' => 'color',
					'name' => 'menu_area_background_color_header_standard',
					'default_value' => '',
					'label' => esc_html__( 'Background Color', 'walker' ),
					'description' => esc_html__( 'Set background color for header', 'walker' )
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header_standard,
					'type' => 'text',
					'name' => 'menu_area_background_transparency_header_standard',
					'default_value' => '',
					'label' => esc_html__( 'Background Transparency', 'walker' ),
					'description' => esc_html__( 'Set background transparency for header', 'walker' ),
					'args' => array(
						'col_width' => 3
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header_standard,
					'type' => 'color',
					'name' => 'menu_area_border_color_header_standard',
					'default_value' => '',
					'label' => esc_html__( 'Border Color', 'walker' ),
					'description' => esc_html__( 'Set border color for header', 'walker' )
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header_standard,
					'type' => 'text',
					'name' => 'menu_area_height_header_standard',
					'default_value' => '',
					'label' => esc_html__( 'Height', 'walker' ),
					'description' => esc_html__( 'Enter Header Height (default is 80px)', 'walker' ),
					'args' => array(
						'col_width' => 3,
						'suffix' => 'px'
					)
				)
			);

		/***************** Standard Header Layout *****************/

		/***************** Simple Header Layout *******************/

			$panel_header_simple = walker_edge_add_admin_panel(
				array(
					'page' => '_header_page',
					'name' => 'panel_header_simple',
					'title' => esc_html__( 'Header Simple', 'walker' ),
					'hidden_property' => 'header_type',
					'hidden_value' => '',
					'hidden_values' => array(
	                    'header-standard',
						'header-classic',
	                    'header-full-screen',
	                    'header-vertical',
	                    'header-bottom'
					)
				)
			);

			walker_edge_add_admin_section_title(
				array(
					'parent' => $panel_header_simple,
					'name' => 'header_simple_title',
					'title' => esc_html__( 'Header Simple', 'walker' )
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header_simple,
					'type' => 'yesno',
					'name' => 'enable_grid_layout_header_simple',
					'default_value' => 'yes',
					'label' => esc_html__( 'Enable Grid Layout', 'walker' ),
					'description' => esc_html__( 'Enabling this option you will set simple header area to be in grid', 'walker' ),
				)
			);

			walker_edge_add_admin_section_title(
				array(
					'parent' => $panel_header_simple,
					'name' => 'menu_area_title',
					'title' => esc_html__( 'Menu Area', 'walker' )
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header_simple,
					'type' => 'color',
					'name' => 'menu_area_background_color_header_simple',
					'default_value' => '',
					'label' => esc_html__( 'Background Color', 'walker' ),
					'description' => esc_html__( 'Set background color for header', 'walker' )
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header_simple,
					'type' => 'text',
					'name' => 'menu_area_background_transparency_header_simple',
					'default_value' => '',
					'label' => esc_html__( 'Background Transparency', 'walker' ),
					'description' => esc_html__( 'Set background transparency for header', 'walker' ),
					'args' => array(
						'col_width' => 3
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header_simple,
					'type' => 'color',
					'name' => 'menu_area_border_bottom_color_header_simple',
					'default_value' => '',
					'label' => esc_html__( 'Border Bottom Color', 'walker' ),
                	'description' => esc_html__( 'Choose a border bottom color for header area', 'walker' ),
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header_simple,
					'type' => 'text',
					'name' => 'menu_area_height_header_simple',
					'default_value' => '',
					'label' => esc_html__( 'Height', 'walker' ),
					'description' => esc_html__( 'Enter Header Height (default is 80px)', 'walker' ),
					'args' => array(
						'col_width' => 3,
						'suffix' => 'px'
					)
				)
			);

		/***************** Simple Header Layout *******************/
		
		/****************** Classic Header Layout *****************/
		
			$panel_header_classic = walker_edge_add_admin_panel(
				array(
					'page' => '_header_page',
					'name' => 'panel_header_classic',
					'title' => esc_html__( 'Header Classic', 'walker' ),
					'hidden_property' => 'header_type',
					'hidden_value' => '',
					'hidden_values' => array(
						'header-standard',
						'header-simple',
						'header-full-screen',
						'header-vertical',
						'header-bottom'
					)
				)
			);

			walker_edge_add_admin_section_title(
				array(
					'parent' => $panel_header_classic,
					'name' => 'menu_area_title',
					'title' => esc_html__( 'Menu Area', 'walker' )
				)
			);
			
			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header_classic,
					'type' => 'color',
					'name' => 'menu_area_background_color_header_classic',
					'default_value' => '',
					'label' => esc_html__( 'Background Color', 'walker' ),
					'description' => esc_html__( 'Set background color for header', 'walker' )
				)
			);
			
			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header_classic,
					'type' => 'text',
					'name' => 'menu_area_background_transparency_header_classic',
					'default_value' => '',
					'label' => esc_html__( 'Background Transparency', 'walker' ),
					'description' => esc_html__( 'Set background transparency for header', 'walker' ),
					'args' => array(
						'col_width' => 3
					)
				)
			);
			
			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header_classic,
					'type' => 'color',
					'name' => 'menu_area_border_color_header_classic',
					'default_value' => '',
					'label' => esc_html__( 'Border Color', 'walker' ),
					'description' => esc_html__( 'Set border color for header', 'walker' )
				)
			);
			
			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header_classic,
					'type' => 'text',
					'name' => 'logo_area_height_header_classic',
					'default_value' => '',
					'label' => esc_html__( 'Logo Area Height', 'walker' ),
					'description' => esc_html__( 'Enter Logo Area Height (default is 102px)', 'walker' ),
					'args' => array(
						'col_width' => 3,
						'suffix' => 'px'
					)
				)
			);
			
			walker_edge_add_admin_field(
				array(
					'parent'      => $panel_header_classic,
					'type'        => 'text',
					'name'        => 'logo_area_top_padding_header_classic',
					'label' => esc_html__( 'Top Padding For Non-Scrolled Logo', 'walker' ),
					'description' => esc_html__( 'Enter top padding value to move your logo image down in pixels.', 'walker' ),
					'args'        => array(
						'col_width' => 3,
						'suffix'    => 'px'
					)
				)
			);
			
			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header_classic,
					'type' => 'text',
					'name' => 'menu_area_height_header_classic',
					'default_value' => '',
					'label' => esc_html__( 'Menu Area Height', 'walker' ),
					'description' => esc_html__( 'Enter Menu Area Height (default is 84px)', 'walker' ),
					'args' => array(
						'col_width' => 3,
						'suffix' => 'px'
					)
				)
			);
		
		/****************** Classic Header Layout ******************/

		/***************** Full Screen Header Layout *******************/

			$panel_header_full_screen = walker_edge_add_admin_panel(
				array(
					'page' => '_header_page',
					'name' => 'panel_header_full_screen',
					'title' => esc_html__( 'Header Full Screen', 'walker' ),
					'hidden_property' => 'header_type',
					'hidden_value' => '',
					'hidden_values' => array(
	                    'header-standard',
	                    'header-simple',
						'header-classic',
	                    'header-vertical',
	                    'header-bottom'
					)
				)
			);

			walker_edge_add_admin_section_title(
				array(
					'parent' => $panel_header_full_screen,
					'name' => 'header_full_screen_title',
					'title' => esc_html__( 'Header Full Screen', 'walker' )
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header_full_screen,
					'type' => 'yesno',
					'name' => 'enable_grid_layout_header_full_screen',
					'default_value' => 'yes',
					'label' => esc_html__( 'Enable Grid Layout', 'walker' ),
					'description' => esc_html__( 'Enabling this option you will set full screen header area to be in grid', 'walker' ),
				)
			);

			walker_edge_add_admin_section_title(
				array(
					'parent' => $panel_header_full_screen,
					'name' => 'menu_area_title',
					'title' => esc_html__( 'Menu Area', 'walker' )
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header_full_screen,
					'type' => 'color',
					'name' => 'menu_area_background_color_header_full_screen',
					'default_value' => '',
					'label' => esc_html__( 'Background Color', 'walker' ),
					'description' => esc_html__( 'Set background color for header', 'walker' )
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header_full_screen,
					'type' => 'text',
					'name' => 'menu_area_background_transparency_header_full_screen',
					'default_value' => '',
					'label' => esc_html__( 'Background Transparency', 'walker' ),
					'description' => esc_html__( 'Set background transparency for header', 'walker' ),
					'args' => array(
						'col_width' => 3
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header_full_screen,
					'type' => 'color',
					'name' => 'menu_area_border_bottom_color_header_full_screen',
					'default_value' => '',
					'label' => esc_html__( 'Border Bottom Color', 'walker' ),
                	'description' => esc_html__( 'Choose a border bottom color for header area', 'walker' ),
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header_full_screen,
					'type' => 'text',
					'name' => 'menu_area_height_header_full_screen',
					'default_value' => '',
					'label' => esc_html__( 'Height', 'walker' ),
					'description' => esc_html__( 'Enter Header Height (default is 80px)', 'walker' ),
					'args' => array(
						'col_width' => 3,
						'suffix' => 'px'
					)
				)
			);

		/***************** Full Screen Header Layout *******************/

        /***************** Vertical Header Layout *****************/

	        $panel_header_vertical = walker_edge_add_admin_panel(
	            array(
	                'page' => '_header_page',
	                'name' => 'panel_header_vertical',
	                'title' => esc_html__( 'Header Vertical', 'walker' ),
	                'hidden_property' => 'header_type',
	                'hidden_value' => '',
	                'hidden_values' => array(
	                    'header-standard',
	                    'header-simple',
		                'header-classic',
	                    'header-full-screen',
	                    'header-bottom'
	                )
	            )
	        );

            walker_edge_add_admin_field(array(
                'name' => 'vertical_header_background_color',
                'type' => 'color',
                'label' => esc_html__( 'Background Color', 'walker' ),
                'description' => esc_html__( 'Set background color for vertical menu', 'walker' ),
                'parent' => $panel_header_vertical
            ));

            walker_edge_add_admin_field(array(
                'name' => 'vertical_header_transparency',
                'type' => 'text',
                'label' => esc_html__( 'Background Transparency', 'walker' ),
                'description' => esc_html__( 'Enter transparency for vertical menu (value from 0 to 1)', 'walker' ),
                'parent' => $panel_header_vertical,
                'args' => array(
                    'col_width' => 1
                )
            ));

            walker_edge_add_admin_field(
                array(
                    'name' => 'vertical_header_background_image',
                    'type' => 'image',
                    'default_value' => '',
                    'label' => esc_html__( 'Background Image', 'walker' ),
                    'description' => esc_html__( 'Set background image for vertical menu', 'walker' ),
                    'parent' => $panel_header_vertical
                )
            );

            walker_edge_add_admin_field(
	            array(
	                'name' => 'vertical_header_text_align',
	                'type' => 'select',
	                'default_value' => '',
	                'label' => esc_html__( 'Choose Text Alignment', 'walker' ),
	                'description' => esc_html__( 'Choose text alignment for Vertical Header elements (logo, menu and widgets)', 'walker' ),
	                'parent' => $panel_header_vertical,
	                'options' => array(
	                    '' => '',
	                    'left' => esc_html__( 'Left', 'walker' ),
	                    'center' => esc_html__( 'Center', 'walker' ),
	                )
	            )
	        );

        /***************** Vertical Header Layout *****************/    

        /***************** Bottom Header Layout *****************/

			$panel_header_bottom = walker_edge_add_admin_panel(
				array(
					'page' => '_header_page',
					'name' => 'panel_header_bottom',
					'title' => esc_html__( 'Header Bottom', 'walker' ),
					'hidden_property' => 'header_type',
					'hidden_value' => '',
					'hidden_values' => array(
	                    'header-standard',
	                    'header-simple',
						'header-classic',
	                    'header-full-screen',
	                    'header-vertical'
					)
				)
			);

			walker_edge_add_admin_section_title(
				array(
					'parent' => $panel_header_bottom,
					'name' => 'menu_area_title',
					'title' => esc_html__( 'Menu Area', 'walker' )
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header_bottom,
					'type' => 'color',
					'name' => 'menu_area_background_color_header_bottom',
					'default_value' => '',
					'label' => esc_html__( 'Background Color', 'walker' ),
					'description' => esc_html__( 'Set background color for header', 'walker' )
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header_bottom,
					'type' => 'text',
					'name' => 'menu_area_background_transparency_header_bottom',
					'default_value' => '',
					'label' => esc_html__( 'Background Transparency', 'walker' ),
					'description' => esc_html__( 'Set background transparency for header', 'walker' ),
					'args' => array(
						'col_width' => 3
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header_bottom,
					'type' => 'color',
					'name' => 'menu_area_border_color_header_bottom',
					'default_value' => '',
					'label' => esc_html__( 'Border Color', 'walker' ),
					'description' => esc_html__( 'Set border color for header', 'walker' )
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $panel_header_bottom,
					'type' => 'text',
					'name' => 'menu_area_height_header_bottom',
					'default_value' => '',
					'label' => esc_html__( 'Height', 'walker' ),
					'description' => esc_html__( 'Enter Header Height (default is 80px)', 'walker' ),
					'args' => array(
						'col_width' => 3,
						'suffix' => 'px'
					)
				)
			);

		/***************** Bottom Header Layout *****************/

        /***************** Sticky Header Layout *******************/

			$panel_sticky_header = walker_edge_add_admin_panel(
				array(
					'title' => esc_html__( 'Sticky Header', 'walker' ),
					'name' => 'panel_sticky_header',
					'page' => '_header_page',
					'hidden_property' => 'header_type',
					'hidden_value' => '',
					'hidden_values' => array(
	                    'header-full-screen',
	                    'header-vertical',
	                    'header-bottom'
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'name' => 'scroll_amount_for_sticky',
					'type' => 'text',
					'label' => esc_html__( 'Scroll Amount for Sticky', 'walker' ),
					'description' => esc_html__( 'Enter scroll amount for Sticky Menu to appear (deafult is header height). This value can be overriden on a page level basis.', 'walker' ),
					'parent' => $panel_sticky_header,
					'args' => array(
						'col_width' => 2,
						'suffix' => 'px'
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'name' => 'sticky_header_in_grid',
					'type' => 'yesno',
					'default_value' => 'no',
					'label' => esc_html__( 'Sticky Header in Grid', 'walker' ),
					'description' => esc_html__( 'Enabling this option will put sticky header in grid', 'walker' ),
					'parent' => $panel_sticky_header,
				)
			);

			walker_edge_add_admin_field(array(
				'name' => 'sticky_header_background_color',
				'type' => 'color',
				'label' => esc_html__( 'Background Color', 'walker' ),
				'description' => esc_html__( 'Set background color for sticky header', 'walker' ),
				'parent' => $panel_sticky_header
			));

			walker_edge_add_admin_field(array(
				'name' => 'sticky_header_transparency',
				'type' => 'text',
				'label' => esc_html__( 'Background Transparency', 'walker' ),
				'description' => esc_html__( 'Enter transparency for sticky header (value from 0 to 1)', 'walker' ),
				'parent' => $panel_sticky_header,
				'args' => array(
					'col_width' => 1
				)
			));

			walker_edge_add_admin_field(array(
				'name' => 'sticky_header_border_color',
				'type' => 'color',
				'label' => esc_html__( 'Border Color', 'walker' ),
				'description' => esc_html__( 'Set bottom border color for sticky header', 'walker' ),
				'parent' => $panel_sticky_header
			));

			walker_edge_add_admin_field(array(
				'name' => 'sticky_header_height',
				'type' => 'text',
				'label' => esc_html__( 'Sticky Header Height', 'walker' ),
				'description' => esc_html__( 'Enter height for sticky header (default is 60px)', 'walker' ),
				'parent' => $panel_sticky_header,
				'args' => array(
					'col_width' => 2,
					'suffix' => 'px'
				)
			));

			$group_sticky_header_menu = walker_edge_add_admin_group(array(
				'title' => esc_html__( 'Sticky Header Menu', 'walker' ),
				'name' => 'group_sticky_header_menu',
				'parent' => $panel_sticky_header,
				'description' => esc_html__( 'Define styles for sticky menu items', 'walker' ),
			));

			$row1_sticky_header_menu = walker_edge_add_admin_row(array(
				'name' => 'row1',
				'parent' => $group_sticky_header_menu
			));

			walker_edge_add_admin_field(array(
				'name' => 'sticky_color',
				'type' => 'colorsimple',
				'label' => esc_html__( 'Text Color', 'walker' ),
				'description' => '',
				'parent' => $row1_sticky_header_menu
			));

			walker_edge_add_admin_field(array(
				'name' => 'sticky_hovercolor',
				'type' => 'colorsimple',
				'label' => esc_html__( 'Hover/Active color', 'walker' ),
				'description' => '',
				'parent' => $row1_sticky_header_menu
			));

			$row2_sticky_header_menu = walker_edge_add_admin_row(array(
				'name' => 'row2',
				'parent' => $group_sticky_header_menu
			));

			walker_edge_add_admin_field(
				array(
					'name' => 'sticky_google_fonts',
					'type' => 'fontsimple',
					'label' => esc_html__( 'Font Family', 'walker' ),
					'default_value' => '-1',
					'parent' => $row2_sticky_header_menu,
				)
			);

			walker_edge_add_admin_field(
				array(
					'type' => 'textsimple',
					'name' => 'sticky_fontsize',
					'label' => esc_html__( 'Font Size', 'walker' ),
					'default_value' => '',
					'parent' => $row2_sticky_header_menu,
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'type' => 'textsimple',
					'name' => 'sticky_lineheight',
					'label' => esc_html__( 'Line Height', 'walker' ),
					'default_value' => '',
					'parent' => $row2_sticky_header_menu,
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'type' => 'selectblanksimple',
					'name' => 'sticky_texttransform',
					'label' => esc_html__( 'Text Transform', 'walker' ),
					'default_value' => '',
					'options' => walker_edge_get_text_transform_array(),
					'parent' => $row2_sticky_header_menu
				)
			);

			$row3_sticky_header_menu = walker_edge_add_admin_row(array(
				'name' => 'row3',
				'parent' => $group_sticky_header_menu
			));

			walker_edge_add_admin_field(
				array(
					'type' => 'selectblanksimple',
					'name' => 'sticky_fontstyle',
					'default_value' => '',
					'label' => esc_html__( 'Font Style', 'walker' ),
					'options' => walker_edge_get_font_style_array(),
					'parent' => $row3_sticky_header_menu
				)
			);

			walker_edge_add_admin_field(
				array(
					'type' => 'selectblanksimple',
					'name' => 'sticky_fontweight',
					'default_value' => '',
					'label' => esc_html__( 'Font Weight', 'walker' ),
					'options' => walker_edge_get_font_weight_array(),
					'parent' => $row3_sticky_header_menu
				)
			);

			walker_edge_add_admin_field(
				array(
					'type' => 'textsimple',
					'name' => 'sticky_letterspacing',
					'label' => esc_html__( 'Letter Spacing', 'walker' ),
					'default_value' => '',
					'parent' => $row3_sticky_header_menu,
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

		/***************** Sticky Header Layout *******************/	

		/***************** Fixed Header Layout ********************/	

			$panel_fixed_header = walker_edge_add_admin_panel(
				array(
					'title' => esc_html__( 'Fixed Header', 'walker' ),
					'name' => 'panel_fixed_header',
					'page' => '_header_page',
					'hidden_property' => 'header_type',
					'hidden_value' => '',
					'hidden_values' => array(
	                    'header-full-screen',
	                    'header-vertical'
					)
				)
			);

			walker_edge_add_admin_field(array(
				'name' => 'fixed_header_background_color',
				'type' => 'color',
				'default_value' => '',
				'label' => esc_html__( 'Background Color', 'walker' ),
				'description' => esc_html__( 'Set background color for fixed header', 'walker' ),
				'parent' => $panel_fixed_header
			));

			walker_edge_add_admin_field(array(
				'name' => 'fixed_header_transparency',
				'type' => 'text',
				'label' => esc_html__( 'Background Transparency', 'walker' ),
				'description' => esc_html__( 'Enter transparency for fixed header (value from 0 to 1)', 'walker' ),
				'parent' => $panel_fixed_header,
				'args' => array(
					'col_width' => 1
				)
			));

			walker_edge_add_admin_field(
				array(
					'parent' => $panel_fixed_header,
					'type' => 'color',
					'name' => 'fixed_header_border_bottom_color',
					'default_value' => '',
					'label' => esc_html__( 'Border Bottom Color', 'walker' ),
                	'description' => esc_html__( 'Choose a border bottom color for fixed header area', 'walker' ),
				)
			);

			$group_fixed_header_menu = walker_edge_add_admin_group(array(
				'title' => esc_html__( 'Fixed Header Menu', 'walker' ),
				'name' => 'group_fixed_header_menu',
				'parent' => $panel_fixed_header,
				'description' => esc_html__( 'Define styles for fixed menu items', 'walker' ),
			));

			$row1_fixed_header_menu = walker_edge_add_admin_row(array(
				'name' => 'row1',
				'parent' => $group_fixed_header_menu
			));

			walker_edge_add_admin_field(array(
				'name' => 'fixed_color',
				'type' => 'colorsimple',
				'label' => esc_html__( 'Text Color', 'walker' ),
				'description' => '',
				'parent' => $row1_fixed_header_menu
			));

			walker_edge_add_admin_field(array(
				'name' => 'fixed_hovercolor',
				'type' => 'colorsimple',
				'label' => esc_html__( 'Hover/Active color', 'walker' ),
				'description' => '',
				'parent' => $row1_fixed_header_menu
			));

			$row2_fixed_header_menu = walker_edge_add_admin_row(array(
				'name' => 'row2',
				'parent' => $group_fixed_header_menu
			));

			walker_edge_add_admin_field(
				array(
					'name' => 'fixed_google_fonts',
					'type' => 'fontsimple',
					'label' => esc_html__( 'Font Family', 'walker' ),
					'default_value' => '-1',
					'parent' => $row2_fixed_header_menu,
				)
			);

			walker_edge_add_admin_field(
				array(
					'type' => 'textsimple',
					'name' => 'fixed_fontsize',
					'label' => esc_html__( 'Font Size', 'walker' ),
					'default_value' => '',
					'parent' => $row2_fixed_header_menu,
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'type' => 'textsimple',
					'name' => 'fixed_lineheight',
					'label' => esc_html__( 'Line Height', 'walker' ),
					'default_value' => '',
					'parent' => $row2_fixed_header_menu,
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'type' => 'selectblanksimple',
					'name' => 'fixed_texttransform',
					'label' => esc_html__( 'Text Transform', 'walker' ),
					'default_value' => '',
					'options' => walker_edge_get_text_transform_array(),
					'parent' => $row2_fixed_header_menu
				)
			);

			$row3_fixed_header_menu = walker_edge_add_admin_row(array(
				'name' => 'row3',
				'parent' => $group_fixed_header_menu
			));

			walker_edge_add_admin_field(
				array(
					'type' => 'selectblanksimple',
					'name' => 'fixed_fontstyle',
					'default_value' => '',
					'label' => esc_html__( 'Font Style', 'walker' ),
					'options' => walker_edge_get_font_style_array(),
					'parent' => $row3_fixed_header_menu
				)
			);

			walker_edge_add_admin_field(
				array(
					'type' => 'selectblanksimple',
					'name' => 'fixed_fontweight',
					'default_value' => '',
					'label' => esc_html__( 'Font Weight', 'walker' ),
					'options' => walker_edge_get_font_weight_array(),
					'parent' => $row3_fixed_header_menu
				)
			);

			walker_edge_add_admin_field(
				array(
					'type' => 'textsimple',
					'name' => 'fixed_letterspacing',
					'label' => esc_html__( 'Letter Spacing', 'walker' ),
					'default_value' => '',
					'parent' => $row3_fixed_header_menu,
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

		/***************** Fixed Header Layout ********************/	

		/******************* Main Menu Layout *********************/

			$panel_main_menu = walker_edge_add_admin_panel(
				array(
					'title' => esc_html__( 'Main Menu', 'walker' ),
					'name' => 'panel_main_menu',
					'page' => '_header_page',
					'hidden_property' => 'header_type',
	                'hidden_values' => array(
	                	'header-full-screen',
	                	'header-vertical'
	            	)
				)
			);

			walker_edge_add_admin_section_title(
				array(
					'parent' => $panel_main_menu,
					'name' => 'main_menu_area_title',
					'title' => esc_html__( 'Main Menu General Settings', 'walker' )
				)
			);

			$drop_down_group = walker_edge_add_admin_group(
				array(
					'parent' => $panel_main_menu,
					'name' => 'drop_down_group',
					'title' => esc_html__( 'Main Dropdown Menu', 'walker' ),
					'description' => esc_html__( 'Choose a color and transparency for the main menu background (0 = fully transparent, 1 = opaque)', 'walker' )
				)
			);

			$drop_down_row1 = walker_edge_add_admin_row(
				array(
					'parent' => $drop_down_group,
					'name' => 'drop_down_row1',
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $drop_down_row1,
					'type' => 'colorsimple',
					'name' => 'dropdown_background_color',
					'default_value' => '',
					'label' => esc_html__( 'Background Color', 'walker' ),
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $drop_down_row1,
					'type' => 'textsimple',
					'name' => 'dropdown_background_transparency',
					'default_value' => '',
					'label' => esc_html__( 'Background Transparency', 'walker' ),
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $panel_main_menu,
					'type' => 'select',
					'name' => 'menu_dropdown_appearance',
					'default_value' => 'dropdown-animate-height',
					'label' => esc_html__( 'Main Dropdown Menu Appearance', 'walker' ),
					'description' => esc_html__( 'Choose appearance for dropdown menu', 'walker' ),
					'options' => array(
						'dropdown-default' => esc_html__( 'Default', 'walker' ),
						'dropdown-animate-height' => esc_html__( 'Animate Height', 'walker' )
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $panel_main_menu,
					'type' => 'text',
					'name' => 'dropdown_top_position',
					'default_value' => '',
					'label' => esc_html__( 'Dropdown Position', 'walker' ),
					'description' => esc_html__( 'Enter value in percentage of entire header height', 'walker' ),
					'args' => array(
						'col_width' => 3,
						'suffix' => '%'
					)
				)
			);

			$first_level_group = walker_edge_add_admin_group(
				array(
					'parent' => $panel_main_menu,
					'name' => 'first_level_group',
					'title' => esc_html__( '1st Level Menu', 'walker' ),
					'description' => esc_html__( 'Define styles for 1st level in Top Navigation Menu', 'walker' )
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
					'name' => 'menu_color',
					'default_value' => '',
					'label' => esc_html__( 'Text Color', 'walker' ),
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row1,
					'type' => 'colorsimple',
					'name' => 'menu_hovercolor',
					'default_value' => '',
					'label' => esc_html__( 'Hover Text Color', 'walker' ),
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row1,
					'type' => 'colorsimple',
					'name' => 'menu_activecolor',
					'default_value' => '',
					'label' => esc_html__( 'Active Text Color', 'walker' ),
				)
			);

			$first_level_row3 = walker_edge_add_admin_row(
				array(
					'parent' => $first_level_group,
					'name' => 'first_level_row3',
					'next' => true
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row3,
					'type' => 'colorsimple',
					'name' => 'menu_light_hovercolor',
					'default_value' => '',
					'label' => esc_html__( 'Light Menu Hover Text Color', 'walker' ),
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row3,
					'type' => 'colorsimple',
					'name' => 'menu_light_activecolor',
					'default_value' => '',
					'label' => esc_html__( 'Light Menu Active Text Color', 'walker' ),
				)
			);

			$first_level_row4 = walker_edge_add_admin_row(
				array(
					'parent' => $first_level_group,
					'name' => 'first_level_row4',
					'next' => true
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row4,
					'type' => 'colorsimple',
					'name' => 'menu_dark_hovercolor',
					'default_value' => '',
					'label' => esc_html__( 'Dark Menu Hover Text Color', 'walker' ),
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row4,
					'type' => 'colorsimple',
					'name' => 'menu_dark_activecolor',
					'default_value' => '',
					'label' => esc_html__( 'Dark Menu Active Text Color', 'walker' ),
				)
			);

			$first_level_row5 = walker_edge_add_admin_row(
				array(
					'parent' => $first_level_group,
					'name' => 'first_level_row5',
					'next' => true
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row5,
					'type' => 'fontsimple',
					'name' => 'menu_google_fonts',
					'default_value' => '-1',
					'label' => esc_html__( 'Font Family', 'walker' ),
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row5,
					'type' => 'textsimple',
					'name' => 'menu_fontsize',
					'default_value' => '',
					'label' => esc_html__( 'Font Size', 'walker' ),
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row5,
					'type' => 'textsimple',
					'name' => 'menu_lineheight',
					'default_value' => '',
					'label' => esc_html__( 'Line Height', 'walker' ),
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			$first_level_row6 = walker_edge_add_admin_row(
				array(
					'parent' => $first_level_group,
					'name' => 'first_level_row6',
					'next' => true
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row6,
					'type' => 'selectblanksimple',
					'name' => 'menu_fontstyle',
					'default_value' => '',
					'label' => esc_html__( 'Font Style', 'walker' ),
					'options' => walker_edge_get_font_style_array()
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row6,
					'type' => 'selectblanksimple',
					'name' => 'menu_fontweight',
					'default_value' => '',
					'label' => esc_html__( 'Font Weight', 'walker' ),
					'options' => walker_edge_get_font_weight_array()
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row6,
					'type' => 'textsimple',
					'name' => 'menu_letterspacing',
					'default_value' => '',
					'label' => esc_html__( 'Letter Spacing', 'walker' ),
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row6,
					'type' => 'selectblanksimple',
					'name' => 'menu_texttransform',
					'default_value' => '',
					'label' => esc_html__( 'Text Transform', 'walker' ),
					'options' => walker_edge_get_text_transform_array()
				)
			);

			$first_level_row7 = walker_edge_add_admin_row(
				array(
					'parent' => $first_level_group,
					'name' => 'first_level_row7',
					'next' => true
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row7,
					'type' => 'textsimple',
					'name' => 'menu_padding_left_right',
					'default_value' => '',
					'label' => esc_html__( 'Padding Left/Right', 'walker' ),
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $first_level_row7,
					'type' => 'textsimple',
					'name' => 'menu_margin_left_right',
					'default_value' => '',
					'label' => esc_html__( 'Margin Left/Right', 'walker' ),
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			$second_level_group = walker_edge_add_admin_group(
				array(
					'parent' => $panel_main_menu,
					'name' => 'second_level_group',
					'title' => esc_html__( '2nd Level Menu', 'walker' ),
					'description' => esc_html__( 'Define styles for 2nd level in Top Navigation Menu', 'walker' )
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
					'name' => 'dropdown_color',
					'default_value' => '',
					'label' => esc_html__( 'Text Color', 'walker' )
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_row1,
					'type' => 'colorsimple',
					'name' => 'dropdown_hovercolor',
					'default_value' => '',
					'label' => esc_html__( 'Hover/Active Color', 'walker' )
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
					'type' => 'fontsimple',
					'name' => 'dropdown_google_fonts',
					'default_value' => '-1',
					'label' => esc_html__( 'Font Family', 'walker' )
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_row2,
					'type' => 'textsimple',
					'name' => 'dropdown_fontsize',
					'default_value' => '',
					'label' => esc_html__( 'Font Size', 'walker' ),
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_row2,
					'type' => 'textsimple',
					'name' => 'dropdown_lineheight',
					'default_value' => '',
					'label' => esc_html__( 'Line Height', 'walker' ),
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			$second_level_row3 = walker_edge_add_admin_row(
				array(
					'parent' => $second_level_group,
					'name' => 'second_level_row3',
					'next' => true
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_row3,
					'type' => 'selectblanksimple',
					'name' => 'dropdown_fontstyle',
					'default_value' => '',
					'label' => esc_html__( 'Font style', 'walker' ),
					'options' => walker_edge_get_font_style_array()
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_row3,
					'type' => 'selectblanksimple',
					'name' => 'dropdown_fontweight',
					'default_value' => '',
					'label' => esc_html__( 'Font weight', 'walker' ),
					'options' => walker_edge_get_font_weight_array()
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_row3,
					'type' => 'textsimple',
					'name' => 'dropdown_letterspacing',
					'default_value' => '',
					'label' => esc_html__( 'Letter spacing', 'walker' ),
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_row3,
					'type' => 'selectblanksimple',
					'name' => 'dropdown_texttransform',
					'default_value' => '',
					'label' => esc_html__( 'Text Transform', 'walker' ),
					'options' => walker_edge_get_text_transform_array()
				)
			);

			$second_level_wide_group = walker_edge_add_admin_group(
				array(
					'parent' => $panel_main_menu,
					'name' => 'second_level_wide_group',
					'title' => esc_html__( '2nd Level Wide Menu', 'walker' ),
					'description' => esc_html__( 'Define styles for 2nd level in Wide Menu', 'walker' )
				)
			);

			$second_level_wide_row1 = walker_edge_add_admin_row(
				array(
					'parent' => $second_level_wide_group,
					'name' => 'second_level_wide_row1'
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_wide_row1,
					'type' => 'colorsimple',
					'name' => 'dropdown_wide_color',
					'default_value' => '',
					'label' => esc_html__( 'Text Color', 'walker' )
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_wide_row1,
					'type' => 'colorsimple',
					'name' => 'dropdown_wide_hovercolor',
					'default_value' => '',
					'label' => esc_html__( 'Hover/Active Color', 'walker' )
				)
			);

			$second_level_wide_row2 = walker_edge_add_admin_row(
				array(
					'parent' => $second_level_wide_group,
					'name' => 'second_level_wide_row2',
					'next' => true
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_wide_row2,
					'type' => 'fontsimple',
					'name' => 'dropdown_wide_google_fonts',
					'default_value' => '-1',
					'label' => esc_html__( 'Font Family', 'walker' )
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_wide_row2,
					'type' => 'textsimple',
					'name' => 'dropdown_wide_fontsize',
					'default_value' => '',
					'label' => esc_html__( 'Font Size', 'walker' ),
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_wide_row2,
					'type' => 'textsimple',
					'name' => 'dropdown_wide_lineheight',
					'default_value' => '',
					'label' => esc_html__( 'Line Height', 'walker' ),
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			$second_level_wide_row3 = walker_edge_add_admin_row(
				array(
					'parent' => $second_level_wide_group,
					'name' => 'second_level_wide_row3',
					'next' => true
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_wide_row3,
					'type' => 'selectblanksimple',
					'name' => 'dropdown_wide_fontstyle',
					'default_value' => '',
					'label' => esc_html__( 'Font style', 'walker' ),
					'options' => walker_edge_get_font_style_array()
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_wide_row3,
					'type' => 'selectblanksimple',
					'name' => 'dropdown_wide_fontweight',
					'default_value' => '',
					'label' => esc_html__( 'Font weight', 'walker' ),
					'options' => walker_edge_get_font_weight_array()
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_wide_row3,
					'type' => 'textsimple',
					'name' => 'dropdown_wide_letterspacing',
					'default_value' => '',
					'label' => esc_html__( 'Letter spacing', 'walker' ),
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $second_level_wide_row3,
					'type' => 'selectblanksimple',
					'name' => 'dropdown_wide_texttransform',
					'default_value' => '',
					'label' => esc_html__( 'Text Transform', 'walker' ),
					'options' => walker_edge_get_text_transform_array()
				)
			);

			$third_level_group = walker_edge_add_admin_group(
				array(
					'parent' => $panel_main_menu,
					'name' => 'third_level_group',
					'title' => esc_html__( '3nd Level Menu', 'walker' ),
					'description' => esc_html__( 'Define styles for 3nd level in Top Navigation Menu', 'walker' )
				)
			);

			$third_level_row1 = walker_edge_add_admin_row(
				array(
					'parent' => $third_level_group,
					'name' => 'third_level_row1'
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $third_level_row1,
					'type' => 'colorsimple',
					'name' => 'dropdown_color_thirdlvl',
					'default_value' => '',
					'label' => esc_html__( 'Text Color', 'walker' )
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $third_level_row1,
					'type' => 'colorsimple',
					'name' => 'dropdown_hovercolor_thirdlvl',
					'default_value' => '',
					'label' => esc_html__( 'Hover/Active Color', 'walker' )
				)
			);

			$third_level_row2 = walker_edge_add_admin_row(
				array(
					'parent' => $third_level_group,
					'name' => 'third_level_row2',
					'next' => true
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $third_level_row2,
					'type' => 'fontsimple',
					'name' => 'dropdown_google_fonts_thirdlvl',
					'default_value' => '-1',
					'label' => esc_html__( 'Font Family', 'walker' )
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $third_level_row2,
					'type' => 'textsimple',
					'name' => 'dropdown_fontsize_thirdlvl',
					'default_value' => '',
					'label' => esc_html__( 'Font Size', 'walker' ),
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $third_level_row2,
					'type' => 'textsimple',
					'name' => 'dropdown_lineheight_thirdlvl',
					'default_value' => '',
					'label' => esc_html__( 'Line Height', 'walker' ),
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			$third_level_row3 = walker_edge_add_admin_row(
				array(
					'parent' => $third_level_group,
					'name' => 'third_level_row3',
					'next' => true
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $third_level_row3,
					'type' => 'selectblanksimple',
					'name' => 'dropdown_fontstyle_thirdlvl',
					'default_value' => '',
					'label' => esc_html__( 'Font style', 'walker' ),
					'options' => walker_edge_get_font_style_array()
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $third_level_row3,
					'type' => 'selectblanksimple',
					'name' => 'dropdown_fontweight_thirdlvl',
					'default_value' => '',
					'label' => esc_html__( 'Font weight', 'walker' ),
					'options' => walker_edge_get_font_weight_array()
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $third_level_row3,
					'type' => 'textsimple',
					'name' => 'dropdown_letterspacing_thirdlvl',
					'default_value' => '',
					'label' => esc_html__( 'Letter spacing', 'walker' ),
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $third_level_row3,
					'type' => 'selectblanksimple',
					'name' => 'dropdown_texttransform_thirdlvl',
					'default_value' => '',
					'label' => esc_html__( 'Text Transform', 'walker' ),
					'options' => walker_edge_get_text_transform_array()
				)
			);

			$third_level_wide_group = walker_edge_add_admin_group(
				array(
					'parent' => $panel_main_menu,
					'name' => 'third_level_wide_group',
					'title' => esc_html__( '3rd Level Wide Menu', 'walker' ),
					'description' => esc_html__( 'Define styles for 3rd level in Wide Menu', 'walker' )
				)
			);

			$third_level_wide_row1 = walker_edge_add_admin_row(
				array(
					'parent' => $third_level_wide_group,
					'name' => 'third_level_wide_row1'
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $third_level_wide_row1,
					'type' => 'colorsimple',
					'name' => 'dropdown_wide_color_thirdlvl',
					'default_value' => '',
					'label' => esc_html__( 'Text Color', 'walker' )
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $third_level_wide_row1,
					'type' => 'colorsimple',
					'name' => 'dropdown_wide_hovercolor_thirdlvl',
					'default_value' => '',
					'label' => esc_html__( 'Hover/Active Color', 'walker' )
				)
			);

			$third_level_wide_row2 = walker_edge_add_admin_row(
				array(
					'parent' => $third_level_wide_group,
					'name' => 'third_level_wide_row2',
					'next' => true
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $third_level_wide_row2,
					'type' => 'fontsimple',
					'name' => 'dropdown_wide_google_fonts_thirdlvl',
					'default_value' => '-1',
					'label' => esc_html__( 'Font Family', 'walker' )
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $third_level_wide_row2,
					'type' => 'textsimple',
					'name' => 'dropdown_wide_fontsize_thirdlvl',
					'default_value' => '',
					'label' => esc_html__( 'Font Size', 'walker' ),
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $third_level_wide_row2,
					'type' => 'textsimple',
					'name' => 'dropdown_wide_lineheight_thirdlvl',
					'default_value' => '',
					'label' => esc_html__( 'Line Height', 'walker' ),
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			$third_level_wide_row3 = walker_edge_add_admin_row(
				array(
					'parent' => $third_level_wide_group,
					'name' => 'third_level_wide_row3',
					'next' => true
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $third_level_wide_row3,
					'type' => 'selectblanksimple',
					'name' => 'dropdown_wide_fontstyle_thirdlvl',
					'default_value' => '',
					'label' => esc_html__( 'Font style', 'walker' ),
					'options' => walker_edge_get_font_style_array()
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $third_level_wide_row3,
					'type' => 'selectblanksimple',
					'name' => 'dropdown_wide_fontweight_thirdlvl',
					'default_value' => '',
					'label' => esc_html__( 'Font weight', 'walker' ),
					'options' => walker_edge_get_font_weight_array()
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $third_level_wide_row3,
					'type' => 'textsimple',
					'name' => 'dropdown_wide_letterspacing_thirdlvl',
					'default_value' => '',
					'label' => esc_html__( 'Letter spacing', 'walker' ),
					'args' => array(
						'suffix' => 'px'
					)
				)
			);

			walker_edge_add_admin_field(
				array(
					'parent' => $third_level_wide_row3,
					'type' => 'selectblanksimple',
					'name' => 'dropdown_wide_texttransform_thirdlvl',
					'default_value' => '',
					'label' => esc_html__( 'Text Transform', 'walker' ),
					'options' => walker_edge_get_text_transform_array()
				)
			);

        /******************* Main Menu Layout *********************/

        /****************** Vertical Main Menu Layout ********************/

			$panel_vertical_main_menu = walker_edge_add_admin_panel(
	            array(
	                'title' => esc_html__( 'Vertical Main Menu', 'walker' ),
	                'name' => 'panel_vertical_main_menu',
	                'page' => '_header_page',
	                'hidden_property' => 'header_type',
	                'hidden_values' => array(
	                	'header-standard',
	                	'header-simple',
		                'header-classic',
	                	'header-full-screen',
	                	'header-bottom'
	            	)
	            )
	        );

	        $drop_down_group = walker_edge_add_admin_group(
	            array(
	                'parent' => $panel_vertical_main_menu,
	                'name' => 'vertical_drop_down_group',
	                'title' => esc_html__( 'Main Dropdown Menu', 'walker' ),
	                'description' => esc_html__( 'Set a style for dropdown menu', 'walker' )
	            )
	        );

	        $vertical_drop_down_row1 = walker_edge_add_admin_row(
	            array(
	                'parent' => $drop_down_group,
	                'name' => 'edgtf_drop_down_row1',
	            )
	        );

	        	walker_edge_add_admin_field(array(
	                'type'			=> 'textsimple',
	                'name'			=> 'vertical_menu_top_margin',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Top Margin', 'walker' ),
	                'args'			=> array(
	                    'suffix'	=> 'px'
	                ),
	                'parent'		=> $vertical_drop_down_row1
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'textsimple',
	                'name'			=> 'vertical_menu_bottom_margin',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Bottom Margin', 'walker' ),
	                'args'			=> array(
	                    'suffix'	=> 'px'
	                ),
	                'parent'		=> $vertical_drop_down_row1
	            ));

	        $group_vertical_first_level = walker_edge_add_admin_group(array(
	            'name'			=> 'group_vertical_first_level',
	            'title' => esc_html__( '1st level', 'walker' ),
	            'description' => esc_html__( 'Define styles for 1st level menu', 'walker' ),
	            'parent'		=> $panel_vertical_main_menu
	        ));

	            $row_vertical_first_level_1 = walker_edge_add_admin_row(array(
	                'name'		=> 'row_vertical_first_level_1',
	                'parent'	=> $group_vertical_first_level
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'colorsimple',
	                'name'			=> 'vertical_menu_1st_color',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Text Color', 'walker' ),
	                'parent'		=> $row_vertical_first_level_1
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'colorsimple',
	                'name'			=> 'vertical_menu_1st_hover_color',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Hover/Active Color', 'walker' ),
	                'parent'		=> $row_vertical_first_level_1
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'textsimple',
	                'name'			=> 'vertical_menu_1st_fontsize',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Font Size', 'walker' ),
	                'args'			=> array(
	                    'suffix'	=> 'px'
	                ),
	                'parent'		=> $row_vertical_first_level_1
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'textsimple',
	                'name'			=> 'vertical_menu_1st_lineheight',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Line Height', 'walker' ),
	                'args'			=> array(
	                    'suffix'	=> 'px'
	                ),
	                'parent'		=> $row_vertical_first_level_1
	            ));

	            $row_vertical_first_level_2 = walker_edge_add_admin_row(array(
	                'name'		=> 'row_vertical_first_level_2',
	                'parent'	=> $group_vertical_first_level,
	                'next'		=> true
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'selectblanksimple',
	                'name'			=> 'vertical_menu_1st_texttransform',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Text Transform', 'walker' ),
	                'options'		=> walker_edge_get_text_transform_array(),
	                'parent'		=> $row_vertical_first_level_2
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'fontsimple',
	                'name'			=> 'vertical_menu_1st_google_fonts',
	                'default_value'	=> '-1',
	                'label' => esc_html__( 'Font Family', 'walker' ),
	                'parent'		=> $row_vertical_first_level_2
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'selectblanksimple',
	                'name'			=> 'vertical_menu_1st_fontstyle',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Font Style', 'walker' ),
	                'options'		=> walker_edge_get_font_style_array(),
	                'parent'		=> $row_vertical_first_level_2
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'selectblanksimple',
	                'name'			=> 'vertical_menu_1st_fontweight',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Font Weight', 'walker' ),
	                'options'		=> walker_edge_get_font_weight_array(),
	                'parent'		=> $row_vertical_first_level_2
	            ));

	            $row_vertical_first_level_3 = walker_edge_add_admin_row(array(
	                'name'		=> 'row_vertical_first_level_3',
	                'parent'	=> $group_vertical_first_level,
	                'next'		=> true
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'textsimple',
	                'name'			=> 'vertical_menu_1st_letter_spacing',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Letter Spacing', 'walker' ),
	                'args'			=> array(
	                    'suffix'	=> 'px'
	                ),
	                'parent'		=> $row_vertical_first_level_3
	            ));

	        $group_vertical_second_level = walker_edge_add_admin_group(array(
	            'name'			=> 'group_vertical_second_level',
	            'title' => esc_html__( '2nd level', 'walker' ),
	            'description' => esc_html__( 'Define styles for 2nd level menu', 'walker' ),
	            'parent'		=> $panel_vertical_main_menu
	        ));

	            $row_vertical_second_level_1 = walker_edge_add_admin_row(array(
	                'name'		=> 'row_vertical_second_level_1',
	                'parent'	=> $group_vertical_second_level
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'colorsimple',
	                'name'			=> 'vertical_menu_2nd_color',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Text Color', 'walker' ),
	                'parent'		=> $row_vertical_second_level_1
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'colorsimple',
	                'name'			=> 'vertical_menu_2nd_hover_color',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Hover/Active Color', 'walker' ),
	                'parent'		=> $row_vertical_second_level_1
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'textsimple',
	                'name'			=> 'vertical_menu_2nd_fontsize',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Font Size', 'walker' ),
	                'args'			=> array(
	                    'suffix'	=> 'px'
	                ),
	                'parent'		=> $row_vertical_second_level_1
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'textsimple',
	                'name'			=> 'vertical_menu_2nd_lineheight',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Line Height', 'walker' ),
	                'args'			=> array(
	                    'suffix'	=> 'px'
	                ),
	                'parent'		=> $row_vertical_second_level_1
	            ));

	            $row_vertical_second_level_2 = walker_edge_add_admin_row(array(
	                'name'		=> 'row_vertical_second_level_2',
	                'parent'	=> $group_vertical_second_level,
	                'next'		=> true
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'selectblanksimple',
	                'name'			=> 'vertical_menu_2nd_texttransform',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Text Transform', 'walker' ),
	                'options'		=> walker_edge_get_text_transform_array(),
	                'parent'		=> $row_vertical_second_level_2
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'fontsimple',
	                'name'			=> 'vertical_menu_2nd_google_fonts',
	                'default_value'	=> '-1',
	                'label' => esc_html__( 'Font Family', 'walker' ),
	                'parent'		=> $row_vertical_second_level_2
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'selectblanksimple',
	                'name'			=> 'vertical_menu_2nd_fontstyle',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Font Style', 'walker' ),
	                'options'		=> walker_edge_get_font_style_array(),
	                'parent'		=> $row_vertical_second_level_2
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'selectblanksimple',
	                'name'			=> 'vertical_menu_2nd_fontweight',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Font Weight', 'walker' ),
	                'options'		=> walker_edge_get_font_weight_array(),
	                'parent'		=> $row_vertical_second_level_2
	            ));

	            $row_vertical_second_level_3 = walker_edge_add_admin_row(array(
	                'name'		=> 'row_vertical_second_level_3',
	                'parent'	=> $group_vertical_second_level,
	                'next'		=> true
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'textsimple',
	                'name'			=> 'vertical_menu_2nd_letter_spacing',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Letter Spacing', 'walker' ),
	                'args'			=> array(
	                    'suffix'	=> 'px'
	                ),
	                'parent'		=> $row_vertical_second_level_3
	            ));

	        $group_vertical_third_level = walker_edge_add_admin_group(array(
	            'name'			=> 'group_vertical_third_level',
	            'title' => esc_html__( '3rd level', 'walker' ),
	            'description' => esc_html__( 'Define styles for 3rd level menu', 'walker' ),
	            'parent'		=> $panel_vertical_main_menu
	        ));

	            $row_vertical_third_level_1 = walker_edge_add_admin_row(array(
	                'name'		=> 'row_vertical_third_level_1',
	                'parent'	=> $group_vertical_third_level
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'colorsimple',
	                'name'			=> 'vertical_menu_3rd_color',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Text Color', 'walker' ),
	                'parent'		=> $row_vertical_third_level_1
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'colorsimple',
	                'name'			=> 'vertical_menu_3rd_hover_color',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Hover/Active Color', 'walker' ),
	                'parent'		=> $row_vertical_third_level_1
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'textsimple',
	                'name'			=> 'vertical_menu_3rd_fontsize',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Font Size', 'walker' ),
	                'args'			=> array(
	                    'suffix'	=> 'px'
	                ),
	                'parent'		=> $row_vertical_third_level_1
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'textsimple',
	                'name'			=> 'vertical_menu_3rd_lineheight',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Line Height', 'walker' ),
	                'args'			=> array(
	                    'suffix'	=> 'px'
	                ),
	                'parent'		=> $row_vertical_third_level_1
	            ));

	            $row_vertical_third_level_2 = walker_edge_add_admin_row(array(
	                'name'		=> 'row_vertical_third_level_2',
	                'parent'	=> $group_vertical_third_level,
	                'next'		=> true
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'selectblanksimple',
	                'name'			=> 'vertical_menu_3rd_texttransform',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Text Transform', 'walker' ),
	                'options'		=> walker_edge_get_text_transform_array(),
	                'parent'		=> $row_vertical_third_level_2
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'fontsimple',
	                'name'			=> 'vertical_menu_3rd_google_fonts',
	                'default_value'	=> '-1',
	                'label' => esc_html__( 'Font Family', 'walker' ),
	                'parent'		=> $row_vertical_third_level_2
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'selectblanksimple',
	                'name'			=> 'vertical_menu_3rd_fontstyle',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Font Style', 'walker' ),
	                'options'		=> walker_edge_get_font_style_array(),
	                'parent'		=> $row_vertical_third_level_2
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'selectblanksimple',
	                'name'			=> 'vertical_menu_3rd_fontweight',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Font Weight', 'walker' ),
	                'options'		=> walker_edge_get_font_weight_array(),
	                'parent'		=> $row_vertical_third_level_2
	            ));

	            $row_vertical_third_level_3 = walker_edge_add_admin_row(array(
	                'name'		=> 'row_vertical_third_level_3',
	                'parent'	=> $group_vertical_third_level,
	                'next'		=> true
	            ));

	            walker_edge_add_admin_field(array(
	                'type'			=> 'textsimple',
	                'name'			=> 'vertical_menu_3rd_letter_spacing',
	                'default_value'	=> '',
	                'label' => esc_html__( 'Letter Spacing', 'walker' ),
	                'args'			=> array(
	                    'suffix'	=> 'px'
	                ),
	                'parent'		=> $row_vertical_third_level_3
	            ));

	    /****************** Vertical Main Menu Layout ********************/        
	}

	add_action( 'walker_edge_options_map', 'walker_edge_header_options_map', 4);
}