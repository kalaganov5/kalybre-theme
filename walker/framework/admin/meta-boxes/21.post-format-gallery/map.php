<?php

/*** Gallery Post Format ***/

$gallery_post_format_meta_box = walker_edge_create_meta_box(
	array(
		'scope' =>	array('post'),
		'title' => esc_html__( 'Gallery Post Format', 'walker' ),
		'name' 	=> 'post_format_gallery_meta'
	)
);

walker_edge_add_multiple_images_field(
	array(
		'name'        => 'edgtf_post_gallery_images_meta',
		'label' => esc_html__( 'Gallery Images', 'walker' ),
		'description' => esc_html__( 'Choose your gallery images', 'walker' ),
		'parent'      => $gallery_post_format_meta_box,
	)
);
