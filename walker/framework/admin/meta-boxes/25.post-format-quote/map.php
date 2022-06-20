<?php

/*** Quote Post Format ***/

$quote_post_format_meta_box = walker_edge_create_meta_box(
	array(
		'scope' =>	array('post'),
		'title' => esc_html__( 'Quote Post Format', 'walker' ),
		'name' 	=> 'post_format_quote_meta'
	)
);

walker_edge_create_meta_box_field(
	array(
		'name'        => 'edgtf_post_quote_text_meta',
		'type'        => 'text',
		'label' => esc_html__( 'Quote Text', 'walker' ),
		'description' => esc_html__( 'Enter Quote text', 'walker' ),
		'parent'      => $quote_post_format_meta_box,

	)
);