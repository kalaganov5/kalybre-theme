<?php

$title_meta_box = walker_edge_create_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__( 'Title', 'walker' ),
        'name' => 'title_meta'
    )
);

    walker_edge_create_meta_box_field(
        array(
            'name' => 'edgtf_show_title_area_meta',
            'type' => 'select',
            'default_value' => '',
            'label' => esc_html__( 'Show Title Area', 'walker' ),
            'description' => esc_html__( 'Disabling this option will turn off page title area', 'walker' ),
            'parent' => $title_meta_box,
            'options' => array(
                '' => '',
                'no' => esc_html__( 'No', 'walker' ),
                'yes' => esc_html__( 'Yes', 'walker' )
            ),
            'args' => array(
                "dependence" => true,
                "hide" => array(
                    "" => "",
                    "no" => "#edgtf_edgtf_show_title_area_meta_container",
                    "yes" => ""
                ),
                "show" => array(
                    "" => "#edgtf_edgtf_show_title_area_meta_container",
                    "no" => "",
                    "yes" => "#edgtf_edgtf_show_title_area_meta_container"
                )
            )
        )
    );

    $show_title_area_meta_container = walker_edge_add_admin_container(
        array(
            'parent' => $title_meta_box,
            'name' => 'edgtf_show_title_area_meta_container',
            'hidden_property' => 'edgtf_show_title_area_meta',
            'hidden_value' => 'no'
        )
    );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_type_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__( 'Title Area Type', 'walker' ),
                'description' => esc_html__( 'Choose title type', 'walker' ),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'standard' => esc_html__( 'Standard', 'walker' ),
                    'breadcrumb' => esc_html__( 'Breadcrumb', 'walker' )
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "standard" => "",
                        "standard" => "",
                        "breadcrumb" => "#edgtf_edgtf_title_area_type_meta_container"
                    ),
                    "show" => array(
                        "" => "#edgtf_edgtf_title_area_type_meta_container",
                        "standard" => "#edgtf_edgtf_title_area_type_meta_container",
                        "breadcrumb" => ""
                    )
                )
            )
        );

        $title_area_type_meta_container = walker_edge_add_admin_container(
            array(
                'parent' => $show_title_area_meta_container,
                'name' => 'edgtf_title_area_type_meta_container',
                'hidden_property' => 'edgtf_title_area_type_meta',
                'hidden_value' => '',
                'hidden_values' => array('breadcrumb'),
            )
        );

            walker_edge_create_meta_box_field(
                array(
                    'name' => 'edgtf_title_area_enable_breadcrumbs_meta',
                    'type' => 'select',
                    'default_value' => '',
                    'label' => esc_html__( 'Enable Breadcrumbs', 'walker' ),
                    'description' => esc_html__( 'This option will display Breadcrumbs in Title Area', 'walker' ),
                    'parent' => $title_area_type_meta_container,
                    'options' => array(
                        '' => '',
                        'no' => esc_html__( 'No', 'walker' ),
                        'yes' => esc_html__( 'Yes', 'walker' )
                    ),
                )
            );

            walker_edge_create_meta_box_field(
                array(
                    'name' => 'edgtf_title_predefined_size_meta',
                    'type' => 'select',
                    'default_value' => '',
                    'label' => esc_html__( 'Predefined Title Size', 'walker' ),
                    'description' => esc_html__( 'Choose Title Predefined size', 'walker' ),
                    'parent' => $title_area_type_meta_container,
                    'options' => array(
                        '' => '',
                        'small' => esc_html__( 'Small', 'walker' ),
                        'medium' => esc_html__( 'Medium', 'walker' ),
                        'large' => esc_html__( 'Large', 'walker' )
                    )
                )
            );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_vertial_alignment_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__( 'Vertical Alignment', 'walker' ),
                'description' => esc_html__( 'Specify title vertical alignment', 'walker' ),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'header_bottom' => esc_html__( 'From Bottom of Header', 'walker' ),
                    'window_top' => esc_html__( 'From Window Top', 'walker' )
                )
            )
        );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_content_alignment_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__( 'Horizontal Alignment', 'walker' ),
                'description' => esc_html__( 'Specify title horizontal alignment', 'walker' ),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'left' => esc_html__( 'Left', 'walker' ),
                    'center' => esc_html__( 'Center', 'walker' ),
                    'right' => esc_html__( 'Right', 'walker' )
                )
            )
        );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_text_color_meta',
                'type' => 'color',
                'label' => esc_html__( 'Title Color', 'walker' ),
                'description' => esc_html__( 'Choose a color for title text', 'walker' ),
                'parent' => $show_title_area_meta_container
            )
        );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_breadcrumb_color_meta',
                'type' => 'color',
                'label' => esc_html__( 'Breadcrumb Color', 'walker' ),
                'description' => esc_html__( 'Choose a color for breadcrumb text', 'walker' ),
                'parent' => $show_title_area_meta_container
            )
        );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_color_meta',
                'type' => 'color',
                'label' => esc_html__( 'Background Color', 'walker' ),
                'description' => esc_html__( 'Choose a background color for Title Area', 'walker' ),
                'parent' => $show_title_area_meta_container
            )
        );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_hide_background_image_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__( 'Hide Background Image', 'walker' ),
                'description' => esc_html__( 'Enable this option to hide background image in Title Area', 'walker' ),
                'parent' => $show_title_area_meta_container,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "#edgtf_edgtf_hide_background_image_meta_container",
                    "dependence_show_on_yes" => ""
                )
            )
        );

        $hide_background_image_meta_container = walker_edge_add_admin_container(
            array(
                'parent' => $show_title_area_meta_container,
                'name' => 'edgtf_hide_background_image_meta_container',
                'hidden_property' => 'edgtf_hide_background_image_meta',
                'hidden_value' => 'yes'
            )
        );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_image_meta',
                'type' => 'image',
                'label' => esc_html__( 'Background Image', 'walker' ),
                'description' => esc_html__( 'Choose an Image for Title Area', 'walker' ),
                'parent' => $hide_background_image_meta_container
            )
        );

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_title_area_background_image_responsive_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__( 'Background Responsive Image', 'walker' ),
                'description' => esc_html__( 'Enabling this option will make Title background image responsive', 'walker' ),
                'parent' => $hide_background_image_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__( 'No', 'walker' ),
                    'yes' => esc_html__( 'Yes', 'walker' )
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "" => "",
                        "no" => "",
                        "yes" => "#edgtf_edgtf_title_area_background_image_responsive_meta_container, #edgtf_edgtf_title_area_height_meta"
                    ),
                    "show" => array(
                        "" => "#edgtf_edgtf_title_area_background_image_responsive_meta_container, #edgtf_edgtf_title_area_height_meta",
                        "no" => "#edgtf_edgtf_title_area_background_image_responsive_meta_container, #edgtf_edgtf_title_area_height_meta",
                        "yes" => ""
                    )
                )
            )
        );

        $title_area_background_image_responsive_meta_container = walker_edge_add_admin_container(
            array(
                'parent' => $hide_background_image_meta_container,
                'name' => 'edgtf_title_area_background_image_responsive_meta_container',
                'hidden_property' => 'edgtf_title_area_background_image_responsive_meta',
                'hidden_value' => 'yes'
            )
        );

            walker_edge_create_meta_box_field(
                array(
                    'name' => 'edgtf_title_area_background_image_parallax_meta',
                    'type' => 'select',
                    'default_value' => '',
                    'label' => esc_html__( 'Background Image in Parallax', 'walker' ),
                    'description' => esc_html__( 'Enabling this option will make Title background image parallax', 'walker' ),
                    'parent' => $title_area_background_image_responsive_meta_container,
                    'options' => array(
                        '' => '',
                        'no' => esc_html__( 'No', 'walker' ),
                        'yes' => esc_html__( 'Yes', 'walker' ),
                        'yes_zoom' => esc_html__( 'Yes, with zoom out', 'walker' )
                    )
                )
            );

        walker_edge_create_meta_box_field(array(
            'name' => 'edgtf_title_area_height_meta',
            'type' => 'text',
            'label' => esc_html__( 'Height', 'walker' ),
            'description' => esc_html__( 'Set a height for Title Area', 'walker' ),
            'parent' => $show_title_area_meta_container,
            'args' => array(
                'col_width' => 2,
                'suffix' => 'px'
            )
        ));

        walker_edge_create_meta_box_field(array(
            'name' => 'edgtf_title_area_subtitle_meta',
            'type' => 'text',
            'default_value' => '',
            'label' => esc_html__( 'Subtitle Text', 'walker' ),
            'description' => esc_html__( 'Enter your subtitle text', 'walker' ),
            'parent' => $show_title_area_meta_container,
            'args' => array(
                'col_width' => 6
            )
        ));

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_subtitle_color_meta',
                'type' => 'color',
                'label' => esc_html__( 'Subtitle Color', 'walker' ),
                'description' => esc_html__( 'Choose a color for subtitle text', 'walker' ),
                'parent' => $show_title_area_meta_container
            )
        );