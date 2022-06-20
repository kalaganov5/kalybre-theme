<?php

if(!function_exists('walker_edge_map_portfolio_settings')) {
    function walker_edge_map_portfolio_settings() {
        $meta_box = walker_edge_create_meta_box(array(
            'scope' => 'portfolio-item',
            'title' => esc_html__( 'Portfolio Settings', 'walker' ),
            'name'  => 'portfolio_settings_meta_box'
        ));

        walker_edge_create_meta_box_field(array(
            'name'        => 'edgtf_portfolio_single_template_meta',
            'type'        => 'select',
            'label' => esc_html__( 'Portfolio Type', 'walker' ),
            'description' => esc_html__( 'Choose a default type for Single Project pages', 'walker' ),
            'parent'      => $meta_box,
            'options'     => array(
                '' => esc_html__( 'Default', 'walker' ),
                'small-images' => esc_html__( 'Portfolio small images', 'walker' ),
                'small-slider' => esc_html__( 'Portfolio small slider', 'walker' ),
                'big-images' => esc_html__( 'Portfolio big images', 'walker' ),
                'big-slider' => esc_html__( 'Portfolio big slider', 'walker' ),
                'custom' => esc_html__( 'Portfolio custom', 'walker' ),
                'full-width-custom' => esc_html__( 'Portfolio full width custom', 'walker' ),
                'gallery' => esc_html__( 'Portfolio gallery', 'walker' )
            )
        ));

        $all_pages = array();
        $pages     = get_pages();
        foreach($pages as $page) {
            $all_pages[$page->ID] = $page->post_title;
        }

        walker_edge_create_meta_box_field(array(
            'name'        => 'portfolio_single_back_to_link',
            'type'        => 'select',
            'label' => esc_html__( '"Back To" Link', 'walker' ),
            'description' => esc_html__( 'Choose "Back To" page to link from portfolio Single Project page', 'walker' ),
            'parent'      => $meta_box,
            'options'     => $all_pages
        ));

        walker_edge_create_meta_box_field(array(
            'name'        => 'portfolio_external_link',
            'type'        => 'text',
            'label' => esc_html__( 'Portfolio External Link', 'walker' ),
            'description' => esc_html__( 'Enter URL to link from Portfolio List page', 'walker' ),
            'parent'      => $meta_box,
            'args'        => array(
                'col_width' => 3
            )
        ));
    }

    add_action('walker_edge_meta_boxes_map', 'walker_edge_map_portfolio_settings');
}