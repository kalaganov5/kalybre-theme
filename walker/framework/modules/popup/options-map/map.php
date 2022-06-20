<?php

if ( ! function_exists('walker_edge_popup_options_map') ) {

    function walker_edge_popup_options_map() {

        $cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

        $contact_forms = array();
        if ( $cf7 ) {
            foreach ( $cf7 as $cform ) {
                $contact_forms[ $cform->ID ] = $cform->post_title;
            }
        } else {
            $contact_forms[0] =  'No contact forms found';
        }

        walker_edge_add_admin_page(
            array(
                'slug' => '_popup_page',
                'title' => esc_html__( 'Pop-up', 'walker' ),
                'icon' => 'fa fa-pencil-square-o'
            )
        );

        $popup_panel = walker_edge_add_admin_panel(
            array(
                'title' => esc_html__( 'Pop-up', 'walker' ),
                'name' => 'popup',
                'page' => '_popup_page'
            )
        );

        walker_edge_add_admin_field(
            array(
                'parent'		=> $popup_panel,
                'type'			=> 'yesno',
                'name'			=> 'enable_popup',
                'default_value'	=> 'no',
                'label' => esc_html__( 'Enable Pop-up', 'walker' ),
                'description'	=> '',
                'args'			=> array(
                    'dependence' => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#edgtf_enable_popup_container'
                )
            )
        );

        $enable_popup_container = walker_edge_add_admin_container(
            array(
                'parent'			=> $popup_panel,
                'name'				=> 'enable_popup_container',
                'hidden_property'	=> 'enable_popup',
                'hidden_value'		=> 'no',
            )
        );

        walker_edge_add_admin_field(
            array(
                'parent' => $enable_popup_container,
                'type' => 'image',
                'name' => 'popup_image',
                'default_value' => '',
                'label' => esc_html__( 'Background Image', 'walker' ),
                'description' => esc_html__( 'Choose a background image for pop-up window', 'walker' )
            )
        );

        walker_edge_add_admin_field(array(
            'parent' => $enable_popup_container,
            'type' => 'text',
            'name' => 'popup_title',
            'default_value' => '',
            'label' => esc_html__( 'Title', 'walker' ),
            'description' => esc_html__( 'Enter title pop-up window', 'walker' )
        ));

        walker_edge_add_admin_field(array(
            'parent' => $enable_popup_container,
            'type' => 'text',
            'name' => 'popup_subtitle',
            'default_value' => '',
            'label' => esc_html__( 'Subtitle', 'walker' ),
            'description' => esc_html__( 'Enter subtitle pop-up window', 'walker' )
        ));

        walker_edge_add_admin_field(
            array(
                'name'          => 'popup_contact_form',
                'type'          => 'select',
                'default_value' => '',
                'label' => esc_html__( 'Select Contact Form', 'walker' ),
                'description' => esc_html__( 'Choose contact form to display in popup window', 'walker' ),
                'parent'        => $enable_popup_container,
                'options'       => $contact_forms
            )
        );

        walker_edge_add_admin_field(
            array(
                'name'          => 'popup_contact_form_style',
                'type'          => 'select',
                'default_value' => '',
                'label' => esc_html__( 'Contact Form Style', 'walker' ),
                'description' => esc_html__( 'Choose style defined in Contact Form 7 option tab', 'walker' ),
                'parent'        => $enable_popup_container,
                'options'       => array(
                    'default' => esc_html__( 'Default', 'walker' ),
                    'cf7_custom_style_1' => esc_html__( 'Custom Style 1', 'walker' ),
                    'cf7_custom_style_2' => esc_html__( 'Custom Style 2', 'walker' ),
                    'cf7_custom_style_3' => esc_html__( 'Custom Style 3', 'walker' )
                )
            )
        );
    }

    add_action('walker_edge_options_map', 'walker_edge_popup_options_map', 16);
}