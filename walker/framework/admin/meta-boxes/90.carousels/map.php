<?php

//Carousels

$carousel_meta_box = walker_edge_create_meta_box(
    array(
        'scope' => array('carousels'),
        'title' => esc_html__( 'Carousel', 'walker' ),
        'name' => 'carousel_meta'
    )
);

    walker_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_carousel_image',
            'type'        => 'image',
            'label' => esc_html__( 'Carousel Image', 'walker' ),
            'description' => esc_html__( 'Choose carousel image (min width needs to be 215px)', 'walker' ),
            'parent'      => $carousel_meta_box
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_carousel_hover_image',
            'type'        => 'image',
            'label' => esc_html__( 'Carousel Hover Image', 'walker' ),
            'description' => esc_html__( 'Choose carousel hover image (min width needs to be 215px)', 'walker' ),
            'parent'      => $carousel_meta_box
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_carousel_item_link',
            'type'        => 'text',
            'label' => esc_html__( 'Link', 'walker' ),
            'description' => esc_html__( 'Enter the URL to which you want the image to link to (e.g. http://www.example.com)', 'walker' ),
            'parent'      => $carousel_meta_box
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_carousel_item_target',
            'type'        => 'selectblank',
            'label' => esc_html__( 'Target', 'walker' ),
            'description' => esc_html__( 'Specify where to open the linked document', 'walker' ),
            'parent'      => $carousel_meta_box,
            'options' => array(
            	'_self' => esc_html__( 'Self', 'walker' ),
            	'_blank' => esc_html__( 'Blank', 'walker' )
        	)
        )
    );