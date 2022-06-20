<?php

$footer_meta_box = walker_edge_create_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__( 'Footer', 'walker' ),
        'name' => 'footer_meta'
    )
);

    walker_edge_create_meta_box_field(
        array(
            'name' => 'edgtf_disable_footer_meta',
            'type' => 'yesno',
            'default_value' => 'no',
            'label' => esc_html__( 'Disable Footer for this Page', 'walker' ),
            'description' => esc_html__( 'Enabling this option will hide footer on this page', 'walker' ),
            'parent' => $footer_meta_box,
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name' => 'edgtf_set_footer_skin_meta',
            'type' => 'select',
            'default_value' => 'no',
            'label' => esc_html__( 'Footer Elements Skin', 'walker' ),
            'description' => esc_html__( 'Choose a footer style to make footer elements in that predefined style', 'walker' ),
            'parent' => $footer_meta_box,
            'options' => array(
                '' => esc_html__( 'Default', 'walker' ),
                'light' => esc_html__( 'Light', 'walker' )
            ),
        )
    );