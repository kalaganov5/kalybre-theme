<?php

    $standard_post_format_meta_box = walker_edge_create_meta_box(
        array(
            'scope' => array('post'),
            'title' => esc_html__( 'Standard Post Format', 'walker' ),
            'name'  => 'post_format_standard_meta'
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_post_disable_feature_image',
            'type'        => 'select',
            'default_value' => 'no',
            'label' => esc_html__( 'Disable Feature Image', 'walker' ),
            'description' => esc_html__( 'Enabling this option you will hide feature image on single post', 'walker' ),
            'parent'      => $standard_post_format_meta_box,
            'options'     => array(
                'no' => esc_html__( 'No', 'walker' ),
                'yes' => esc_html__( 'Yes', 'walker' )
            )
        )
    );