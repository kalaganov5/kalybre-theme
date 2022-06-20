<?php

    $general_meta_box = walker_edge_create_meta_box(
        array(
            'scope' => array('page', 'portfolio-item', 'post'),
            'title' => esc_html__( 'General', 'walker' ),
            'name' => 'general_meta'
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name' => 'edgtf_page_background_color_meta',
            'type' => 'color',
            'default_value' => '',
            'label' => esc_html__( 'Page Background Color', 'walker' ),
            'description' => esc_html__( 'Choose background color for page content', 'walker' ),
            'parent' => $general_meta_box
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name' => 'edgtf_page_slider_meta',
            'type' => 'text',
            'default_value' => '',
            'label' => esc_html__( 'Slider Shortcode', 'walker' ),
            'description' => esc_html__( 'Paste your slider shortcode here', 'walker' ),
            'parent' => $general_meta_box
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_page_slider_meta_position',
            'type'        => 'select',
            'label' => esc_html__( 'Set Slider Shortcode to Start Behind Header', 'walker' ),
            'parent'      => $general_meta_box,
            'options'     => array(
                'no' => esc_html__( 'No', 'walker' ),
                'yes' => esc_html__( 'Yes', 'walker' ),
            )
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_paspartu_meta',
            'type'        => 'select',
            'label' => esc_html__( 'Passepartout', 'walker' ),
            'description' => esc_html__( 'Enabling this option will display passepartout around site content', 'walker' ),
            'parent'      => $general_meta_box,
            'options'     => array(
                '' => esc_html__( 'Default', 'walker' ),
                'no' => esc_html__( 'No', 'walker' ),
                'yes' => esc_html__( 'Yes', 'walker' )
            )
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'parent' => $general_meta_box,
            'type' => 'select',
            'name' => 'edgtf_disable_top_paspartu_meta',
            'label' => esc_html__( 'Disable Top Passepartout', 'walker' ),
            'options' => array(
                '' => esc_html__( 'Default', 'walker' ),
                'no' => esc_html__( 'No', 'walker' ),
                'yes' => esc_html__( 'Yes', 'walker' )
            )
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_page_transition_type',
            'type'        => 'selectblank',
            'label' => esc_html__( 'Page Transition', 'walker' ),
            'description' => esc_html__( 'Choose the type of transition to this page', 'walker' ),
            'parent'      => $general_meta_box,
            'default_value' => '',
            'options'     => array(
                'no-animation' => esc_html__( 'No animation', 'walker' ),
                'fade' => esc_html__( 'Fade', 'walker' )
            )
        )
    );

    $edgtf_content_padding_group = walker_edge_add_admin_group(array(
        'name' => 'content_padding_group',
        'title' => esc_html__( 'Content Style', 'walker' ),
        'description' => esc_html__( 'Define styles for Content area', 'walker' ),
        'parent' => $general_meta_box
    ));

    $edgtf_content_padding_row = walker_edge_add_admin_row(array(
        'name' => 'edgtf_content_padding_row',
        'next' => true,
        'parent' => $edgtf_content_padding_group
    ));

    walker_edge_create_meta_box_field(
        array(
            'name'          => 'edgtf_page_content_top_padding',
            'type'          => 'textsimple',
            'default_value' => '',
            'label' => esc_html__( 'Content Top Padding', 'walker' ),
            'parent'        => $edgtf_content_padding_row,
            'args'          => array(
                'suffix' => 'px'
            )
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_page_content_top_padding_mobile',
            'type'        => 'selectblanksimple',
            'label' => esc_html__( 'Set this top padding for mobile header', 'walker' ),
            'parent'      => $edgtf_content_padding_row,
            'options'     => array(
                'yes' => esc_html__( 'Yes', 'walker' ),
                'no' => esc_html__( 'No', 'walker' ),
            )
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_page_comments_meta',
            'type'        => 'selectblank',
            'label' => esc_html__( 'Show Comments', 'walker' ),
            'description' => esc_html__( 'Enabling this option will show comments on your page', 'walker' ),
            'parent'      => $general_meta_box,
            'options'     => array(
                'yes' => esc_html__( 'Yes', 'walker' ),
                'no' => esc_html__( 'No', 'walker' ),
            )
        )
    );

    walker_edge_create_meta_box_field(array(
        'name'        => 'edgtf_enable_full_screen_content',
        'type'        => 'yesno',
        'label' => esc_html__( 'Full Screen Content', 'walker' ),
        'description' => esc_html__( 'Enabling this option will set full screen content for Coming Soon Template', 'walker' ),
        'default_value' => 'no',
        'parent'      => $general_meta_box,
        'args' => array(
            "dependence" => true,
            "hide" => array(
                "no" => "#edgtf_edgtf_full_screen_content_container",
                "yes" => ""
            ),
            "show" => array(
                "no" => "",
                "yes" => "#edgtf_edgtf_full_screen_content_container"
            )
        )
    ));

        $full_screen_content_container = walker_edge_add_admin_container(
            array(
                'parent' => $general_meta_box,
                'name' => 'edgtf_full_screen_content_container',
                'hidden_property' => 'edgtf_enable_full_screen_content',
                'hidden_value' => 'no',
            )
        );

            walker_edge_create_meta_box_field(
                array(
                    'parent' => $full_screen_content_container,
                    'type' => 'image',
                    'name' => 'edgtf_full_screen_content_background_image',
                    'default_value' => '',
                    'label' => esc_html__( 'Background Image', 'walker' ),
                    'description' => esc_html__( 'Choose a background image for coming soon page content', 'walker' )
                )
            );

            walker_edge_create_meta_box_field(
                array(
                    'parent' => $full_screen_content_container,
                    'type' => 'select',
                    'name' => 'edgtf_full_screen_content_vertical_alignment',
                    'default_value' => '',
                    'label' => esc_html__( 'Vertical Alignment', 'walker' ),
                    'description' => esc_html__( 'Specify content elements vertical alignment', 'walker' ),
                    'options'     => array(
                        '' => esc_html__( 'Default', 'walker' ),
                        'middle' => esc_html__( 'Middle', 'walker' ),
                    )
                )
            );