<?php

/*** Video Post Format ***/

$video_post_format_meta_box = walker_edge_create_meta_box(
	array(
		'scope' =>	array('post'),
		'title' => esc_html__( 'Video Post Format', 'walker' ),
		'name' 	=> 'post_format_video_meta'
	)
);

walker_edge_create_meta_box_field(
	array(
		'name'        => 'edgtf_video_type_meta',
		'type'        => 'select',
		'label' => esc_html__( 'Video Type', 'walker' ),
		'description' => esc_html__( 'Choose video type', 'walker' ),
		'parent'      => $video_post_format_meta_box,
		'default_value' => 'youtube',
		'options'     => array(
			'youtube' => esc_html__( 'Youtube', 'walker' ),
			'vimeo' => esc_html__( 'Vimeo', 'walker' ),
			'self' => esc_html__( 'Self Hosted', 'walker' )
		),
		'args' => array(
		'dependence' => true,
		'hide' => array(
			'youtube' => '#edgtf_edgtf_video_self_hosted_container',
			'vimeo' => '#edgtf_edgtf_video_self_hosted_container',
			'self' => '#edgtf_edgtf_video_embedded_container'
		),
		'show' => array(
			'youtube' => '#edgtf_edgtf_video_embedded_container',
			'vimeo' => '#edgtf_edgtf_video_embedded_container',
			'self' => '#edgtf_edgtf_video_self_hosted_container')
	)
	)
);

$edgtf_video_embedded_container = walker_edge_add_admin_container(
	array(
		'parent' => $video_post_format_meta_box,
		'name' => 'edgtf_video_embedded_container',
		'hidden_property' => 'edgtf_video_type_meta',
		'hidden_value' => 'self'
	)
);

$edgtf_video_self_hosted_container = walker_edge_add_admin_container(
	array(
		'parent' => $video_post_format_meta_box,
		'name' => 'edgtf_video_self_hosted_container',
		'hidden_property' => 'edgtf_video_type_meta',
		'hidden_values' => array('youtube', 'vimeo')
	)
);



walker_edge_create_meta_box_field(
	array(
		'name'        => 'edgtf_post_video_id_meta',
		'type'        => 'text',
		'label' => esc_html__( 'Video ID', 'walker' ),
		'description' => esc_html__( 'Enter Video ID', 'walker' ),
		'parent'      => $edgtf_video_embedded_container,

	)
);


walker_edge_create_meta_box_field(
	array(
		'name'        => 'edgtf_post_video_image_meta',
		'type'        => 'image',
		'label' => esc_html__( 'Video Image', 'walker' ),
		'description' => esc_html__( 'Upload video image', 'walker' ),
		'parent'      => $edgtf_video_self_hosted_container,

	)
);

walker_edge_create_meta_box_field(
	array(
		'name'        => 'edgtf_post_video_webm_link_meta',
		'type'        => 'text',
		'label' => esc_html__( 'Video WEBM', 'walker' ),
		'description' => esc_html__( 'Enter video URL for WEBM format', 'walker' ),
		'parent'      => $edgtf_video_self_hosted_container,

	)
);

walker_edge_create_meta_box_field(
	array(
		'name'        => 'edgtf_post_video_mp4_link_meta',
		'type'        => 'text',
		'label' => esc_html__( 'Video MP4', 'walker' ),
		'description' => esc_html__( 'Enter video URL for MP4 format', 'walker' ),
		'parent'      => $edgtf_video_self_hosted_container,

	)
);

walker_edge_create_meta_box_field(
	array(
		'name'        => 'edgtf_post_video_ogv_link_meta',
		'type'        => 'text',
		'label' => esc_html__( 'Video OGV', 'walker' ),
		'description' => esc_html__( 'Enter video URL for OGV format', 'walker' ),
		'parent'      => $edgtf_video_self_hosted_container,

	)
);