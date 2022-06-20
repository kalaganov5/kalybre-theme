<?php

if ( ! function_exists('walker_edge_general_options_map') ) {
    /**
     * General options page
     */
    function walker_edge_general_options_map() {

        walker_edge_add_admin_page(
            array(
                'slug'  => '',
                'title' => esc_html__( 'General', 'walker' ),
                'icon'  => 'fa fa-institution'
            )
        );

        $panel_design_style = walker_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_design_style',
                'title' => esc_html__( 'Design Style', 'walker' )
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'google_fonts',
                'type'          => 'font',
                'default_value' => '-1',
                'label' => esc_html__( 'Google Font Family', 'walker' ),
                'description' => esc_html__( 'Choose a default Google font for your site', 'walker' ),
                'parent' => $panel_design_style
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'additional_google_fonts',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__( 'Additional Google Fonts', 'walker' ),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_additional_google_fonts_container"
                )
            )
        );

        $additional_google_fonts_container = walker_edge_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'additional_google_fonts_container',
                'hidden_property'   => 'additional_google_fonts',
                'hidden_value'      => 'no'
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font1',
                'type'          => 'font',
                'default_value' => '-1',
                'label' => esc_html__( 'Font Family', 'walker' ),
                'description' => esc_html__( 'Choose additional Google font for your site', 'walker' ),
                'parent'        => $additional_google_fonts_container
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font2',
                'type'          => 'font',
                'default_value' => '-1',
                'label' => esc_html__( 'Font Family', 'walker' ),
                'description' => esc_html__( 'Choose additional Google font for your site', 'walker' ),
                'parent'        => $additional_google_fonts_container
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font3',
                'type'          => 'font',
                'default_value' => '-1',
                'label' => esc_html__( 'Font Family', 'walker' ),
                'description' => esc_html__( 'Choose additional Google font for your site', 'walker' ),
                'parent'        => $additional_google_fonts_container
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font4',
                'type'          => 'font',
                'default_value' => '-1',
                'label' => esc_html__( 'Font Family', 'walker' ),
                'description' => esc_html__( 'Choose additional Google font for your site', 'walker' ),
                'parent'        => $additional_google_fonts_container
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'additional_google_font5',
                'type'          => 'font',
                'default_value' => '-1',
                'label' => esc_html__( 'Font Family', 'walker' ),
                'description' => esc_html__( 'Choose additional Google font for your site', 'walker' ),
                'parent'        => $additional_google_fonts_container
            )
        );

        walker_edge_add_admin_field(
            array(
                'name' => 'google_font_weight',
                'type' => 'checkboxgroup',
                'default_value' => '',
                'label' => esc_html__( 'Google Fonts Style & Weight', 'walker' ),
                'description' => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'walker' ),
                'parent' => $panel_design_style,
                'options' => array(
                    '100' => esc_html__( '100 Thin', 'walker' ),
                    '100italic' => esc_html__( '100 Thin Italic', 'walker' ),
                    '200' => esc_html__( '200 Extra-Light', 'walker' ),
                    '200italic' => esc_html__( '200 Extra-Light Italic', 'walker' ),
                    '300' => esc_html__( '300 Light', 'walker' ),
                    '300italic' => esc_html__( '300 Light Italic', 'walker' ),
                    '400' => esc_html__( '400 Regular', 'walker' ),
                    '400italic' => esc_html__( '400 Regular Italic', 'walker' ),
                    '500' => esc_html__( '500 Medium', 'walker' ),
                    '500italic' => esc_html__( '500 Medium Italic', 'walker' ),
                    '600' => esc_html__( '600 Semi-Bold', 'walker' ),
                    '600italic' => esc_html__( '600 Semi-Bold Italic', 'walker' ),
                    '700' => esc_html__( '700 Bold', 'walker' ),
                    '700italic' => esc_html__( '700 Bold Italic', 'walker' ),
                    '800' => esc_html__( '800 Extra-Bold', 'walker' ),
                    '800italic' => esc_html__( '800 Extra-Bold Italic', 'walker' ),
                    '900' => esc_html__( '900 Ultra-Bold', 'walker' ),
                    '900italic' => esc_html__( '900 Ultra-Bold Italic', 'walker' )
                )
            )
        );

        walker_edge_add_admin_field(
            array(
                'name' => 'google_font_subset',
                'type' => 'checkboxgroup',
                'default_value' => '',
                'label' => esc_html__( 'Google Fonts Subset', 'walker' ),
                'description' => esc_html__( 'Choose a default Google font subsets for your site', 'walker' ),
                'parent' => $panel_design_style,
                'options' => array(
                    'latin' => esc_html__( 'Latin', 'walker' ),
                    'latin-ext' => esc_html__( 'Latin Extended', 'walker' ),
                    'cyrillic' => esc_html__( 'Cyrillic', 'walker' ),
                    'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'walker' ),
                    'greek' => esc_html__( 'Greek', 'walker' ),
                    'greek-ext' => esc_html__( 'Greek Extended', 'walker' ),
                    'vietnamese' => esc_html__( 'Vietnamese', 'walker' )
                )
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'first_color',
                'type'          => 'color',
                'label' => esc_html__( 'First Main Color', 'walker' ),
                'description' => esc_html__( 'Choose the most dominant theme color. Default color is #5d5d5d', 'walker' ),
                'parent'        => $panel_design_style
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'page_background_color',
                'type'          => 'color',
                'label' => esc_html__( 'Page Background Color', 'walker' ),
                'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'walker' ),
                'parent'        => $panel_design_style
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'selection_color',
                'type'          => 'color',
                'label' => esc_html__( 'Text Selection Color', 'walker' ),
                'description' => esc_html__( 'Choose the color users see when selecting text', 'walker' ),
                'parent'        => $panel_design_style
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'boxed',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__( 'Boxed Layout', 'walker' ),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_boxed_container"
                )
            )
        );

        $boxed_container = walker_edge_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'boxed_container',
                'hidden_property'   => 'boxed',
                'hidden_value'      => 'no'
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'page_background_color_in_box',
                'type'          => 'color',
                'label' => esc_html__( 'Page Background Color', 'walker' ),
                'description' => esc_html__( 'Choose the page background color outside box.', 'walker' ),
                'parent'        => $boxed_container
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'boxed_background_image',
                'type'          => 'image',
                'label' => esc_html__( 'Background Image', 'walker' ),
                'description' => esc_html__( 'Choose an image to be displayed in background', 'walker' ),
                'parent'        => $boxed_container
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'boxed_pattern_background_image',
                'type'          => 'image',
                'label' => esc_html__( 'Background Pattern', 'walker' ),
                'description' => esc_html__( 'Choose an image to be used as background pattern', 'walker' ),
                'parent'        => $boxed_container
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'boxed_background_image_attachment',
                'type'          => 'select',
                'default_value' => 'fixed',
                'label' => esc_html__( 'Background Image Attachment', 'walker' ),
                'description' => esc_html__( 'Choose background image attachment', 'walker' ),
                'parent'        => $boxed_container,
                'options'       => array(
                    'fixed' => esc_html__( 'Fixed', 'walker' ),
                    'scroll' => esc_html__( 'Scroll', 'walker' )
                )
            )
        );
        
        walker_edge_add_admin_field(
            array(
                'name'          => 'paspartu',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__( 'Passepartout', 'walker' ),
                'description' => esc_html__( 'Enabling this option will display passepartout around site content', 'walker' ),
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_paspartu_container"
                )
            )
        );

        $paspartu_container = walker_edge_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'paspartu_container',
                'hidden_property'   => 'paspartu',
                'hidden_value'      => 'no'
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'paspartu_color',
                'type'          => 'color',
                'label' => esc_html__( 'Passepartout Color', 'walker' ),
                'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'walker' ),
                'parent'        => $paspartu_container
            )
        );

        walker_edge_add_admin_field(
            array(
                'name' => 'paspartu_width',
                'type' => 'text',
                'label' => esc_html__( 'Passepartout Size', 'walker' ),
                'description' => esc_html__( 'Enter size amount for passepartout', 'walker' ),
                'parent' => $paspartu_container,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => '%'
                )
            )
        );

        walker_edge_add_admin_field(
            array(
                'parent' => $paspartu_container,
                'type' => 'yesno',
                'default_value' => 'no',
                'name' => 'disable_top_paspartu',
                'label' => esc_html__( 'Disable Top Passepartout', 'walker' )
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'initial_content_width',
                'type'          => 'select',
                'default_value' => '',
                'label' => esc_html__( 'Initial Width of Content', 'walker' ),
                'description' => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid"', 'walker' ),
                'parent'        => $panel_design_style,
                'options'       => array(
                    "" => esc_html__( "1100px - default", 'walker' ),
                    "grid-1300" => esc_html__( "1300px", 'walker' ),
                    "grid-1200" => esc_html__( "1200px", 'walker' ),
                    "grid-1000" => esc_html__( "1000px", 'walker' ),
                    "grid-800" => esc_html__( "800px", 'walker' )
                )
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'preload_pattern_image',
                'type'          => 'image',
                'label' => esc_html__( 'Preload Pattern Image', 'walker' ),
                'description' => esc_html__( 'Choose preload pattern image to be displayed until images are loaded ', 'walker' ),
                'parent'        => $panel_design_style
            )
        );

        walker_edge_add_admin_field(
            array(
                'name' => 'element_appear_amount',
                'type' => 'text',
                'label' => esc_html__( 'Element Appearance', 'walker' ),
                'description' => esc_html__( 'For animated elements, set distance (related to browser bottom) to start the animation', 'walker' ),
                'parent' => $panel_design_style,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                )
            )
        );

        $panel_settings = walker_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_settings',
                'title' => esc_html__( 'Settings', 'walker' )
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'smooth_scroll',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__( 'Smooth Scroll', 'walker' ),
                'description' => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'walker' ),
                'parent'        => $panel_settings
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'smooth_page_transitions',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__( 'Smooth Page Transitions', 'walker' ),
                'description' => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links.', 'walker' ),
                'parent'        => $panel_settings,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#edgtf_page_transitions_container"
                )
            )
        );

        $page_transitions_container = walker_edge_add_admin_container(
            array(
                'parent'            => $panel_settings,
                'name'              => 'page_transitions_container',
                'hidden_property'   => 'smooth_page_transitions',
                'hidden_value'      => 'no'
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'smooth_pt_bgnd_color',
                'type'          => 'color',
                'label' => esc_html__( 'Page Loader Background Color', 'walker' ),
                'parent'        => $page_transitions_container
            )
        );

        $group_pt_spinner_animation = walker_edge_add_admin_group(array(
            'name'          => 'group_pt_spinner_animation',
            'title' => esc_html__( 'Loader Style', 'walker' ),
            'description' => esc_html__( 'Define styles for loader spinner animation', 'walker' ),
            'parent'        => $page_transitions_container
        ));

        $row_pt_spinner_animation = walker_edge_add_admin_row(array(
            'name'      => 'row_pt_spinner_animation',
            'parent'    => $group_pt_spinner_animation
        ));

        walker_edge_add_admin_field(array(
            'type'          => 'selectsimple',
            'name'          => 'smooth_pt_spinner_type',
            'default_value' => '',
            'label' => esc_html__( 'Spinner Type', 'walker' ),
            'parent'        => $row_pt_spinner_animation,
            'options'       => array(
                "rotate_circles" => esc_html__( "Rotate Circles", 'walker' ),
                "pulse" => esc_html__( "Pulse", 'walker' ),
                "double_pulse" => esc_html__( "Double Pulse", 'walker' ),
                "cube" => esc_html__( "Cube", 'walker' ),
                "rotating_cubes" => esc_html__( "Rotating Cubes", 'walker' ),
                "stripes" => esc_html__( "Stripes", 'walker' ),
                "wave" => esc_html__( "Wave", 'walker' ),
                "two_rotating_circles" => esc_html__( "2 Rotating Circles", 'walker' ),
                "five_rotating_circles" => esc_html__( "5 Rotating Circles", 'walker' ),
                "atom" => esc_html__( "Atom", 'walker' ),
                "clock" => esc_html__( "Clock", 'walker' ),
                "mitosis" => esc_html__( "Mitosis", 'walker' ),
                "lines" => esc_html__( "Lines", 'walker' ),
                "fussion" => esc_html__( "Fussion", 'walker' ),
                "wave_circles" => esc_html__( "Wave Circles", 'walker' ),
                "pulse_circles" => esc_html__( "Pulse Circles", 'walker' )
            )
        ));

        walker_edge_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'smooth_pt_spinner_color',
            'default_value' => '',
            'label' => esc_html__( 'Spinner Color', 'walker' ),
            'parent'        => $row_pt_spinner_animation
        ));

        walker_edge_add_admin_field(
            array(
                'name'          => 'show_back_button',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label' => esc_html__( 'Show "Back To Top Button"', 'walker' ),
                'description' => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'walker' ),
                'parent'        => $panel_settings
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'responsiveness',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label' => esc_html__( 'Responsiveness', 'walker' ),
                'description' => esc_html__( 'Enabling this option will make all pages responsive', 'walker' ),
                'parent'        => $panel_settings
            )
        );

        $panel_custom_code = walker_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_custom_code',
                'title' => esc_html__( 'Custom Code', 'walker' )
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'custom_css',
                'type'          => 'textarea',
                'label' => esc_html__( 'Custom CSS', 'walker' ),
                'description' => esc_html__( 'Enter your custom CSS here', 'walker' ),
                'parent'        => $panel_custom_code
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'custom_js',
                'type'          => 'textarea',
                'label' => esc_html__( 'Custom JS', 'walker' ),
                'description' => esc_html__( 'Enter your custom Javascript here', 'walker' ),
                'parent'        => $panel_custom_code
            )
        );

        $panel_google_maps_api_key = walker_edge_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_google_maps_api_key',
                'title' => esc_html__( 'Google Maps API key', 'walker' )
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'google_maps_api_key',
                'type'          => 'text',
                'label' => esc_html__( 'Google Maps API key', 'walker' ),
                'description' => esc_html__( 'Enter your Google Maps API key here', 'walker' ),
                'parent'        => $panel_google_maps_api_key
            )
        );

    }

    add_action( 'walker_edge_options_map', 'walker_edge_general_options_map', 1);

}