<?php

//Testimonials

$testimonial_meta_box = walker_edge_create_meta_box(
    array(
        'scope' => array('testimonials'),
        'title' => esc_html__( 'Testimonial', 'walker' ),
        'name' => 'testimonial_meta'
    )
);

    walker_edge_create_meta_box_field(
        array(
            'name'        	=> 'edgtf_testimonial_title',
            'type'        	=> 'text',
            'label' => esc_html__( 'Title', 'walker' ),
            'description' => esc_html__( 'Enter testimonial title', 'walker' ),
            'parent'      	=> $testimonial_meta_box,
        )
    );


    walker_edge_create_meta_box_field(
        array(
            'name'        	=> 'edgtf_testimonial_author',
            'type'        	=> 'text',
            'label' => esc_html__( 'Author', 'walker' ),
            'description' => esc_html__( 'Enter author name', 'walker' ),
            'parent'      	=> $testimonial_meta_box,
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name'        	=> 'edgtf_testimonial_author_position',
            'type'        	=> 'text',
            'label' => esc_html__( 'Job Position', 'walker' ),
            'description' => esc_html__( 'Enter job position', 'walker' ),
            'parent'      	=> $testimonial_meta_box,
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name'        	=> 'edgtf_testimonial_text',
            'type'        	=> 'text',
            'label' => esc_html__( 'Text', 'walker' ),
            'description' => esc_html__( 'Enter testimonial text', 'walker' ),
            'parent'      	=> $testimonial_meta_box,
        )
    );