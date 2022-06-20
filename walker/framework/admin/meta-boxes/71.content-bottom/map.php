<?php

$content_bottom_meta_box = walker_edge_create_meta_box(
	array(
		'scope' => array('page', 'portfolio-item', 'post'),
		'title' => esc_html__( 'Content Bottom', 'walker' ),
		'name' => 'content_bottom_meta'
	)
);

	walker_edge_create_meta_box_field(
		array(
			'name' => 'edgtf_enable_content_bottom_area_meta',
			'type' => 'selectblank',
			'default_value' => '',
			'label' => esc_html__( 'Enable Content Bottom Area', 'walker' ),
			'description' => esc_html__( 'This option will enable Content Bottom area on pages', 'walker' ),
			'parent' => $content_bottom_meta_box,
			'options' => array(
				'no' => esc_html__( 'No', 'walker' ),
				'yes' => esc_html__( 'Yes', 'walker' )
			),
			'args' => array(
				'dependence' => true,
				'hide' => array(
					'' => '#edgtf_edgtf_show_content_bottom_meta_container',
					'no' => '#edgtf_edgtf_show_content_bottom_meta_container'
				),
				'show' => array(
					'yes' => '#edgtf_edgtf_show_content_bottom_meta_container'
				)
			)
		)
	);

	$show_content_bottom_meta_container = walker_edge_add_admin_container(
		array(
			'parent' => $content_bottom_meta_box,
			'name' => 'edgtf_show_content_bottom_meta_container',
			'hidden_property' => 'edgtf_enable_content_bottom_area_meta',
			'hidden_value' => '',
			'hidden_values' => array('','no')
		)
	);

		walker_edge_create_meta_box_field(
			array(
				'name' => 'edgtf_content_bottom_sidebar_custom_display_meta',
				'type' => 'selectblank',
				'default_value' => '',
				'label' => esc_html__( 'Sidebar to Display', 'walker' ),
				'description' => esc_html__( 'Choose a Content Bottom sidebar to display', 'walker' ),
				'options' => walker_edge_get_custom_sidebars(),
				'parent' => $show_content_bottom_meta_container
			)
		);

		walker_edge_create_meta_box_field(
			array(
				'type' => 'selectblank',
				'name' => 'edgtf_content_bottom_in_grid_meta',
				'default_value' => '',
				'label' => esc_html__( 'Display in Grid', 'walker' ),
				'description' => esc_html__( 'Enabling this option will place Content Bottom in grid', 'walker' ),
				'options' => array(
					'no' => esc_html__( 'No', 'walker' ),
					'yes' => esc_html__( 'Yes', 'walker' )
				),
				'parent' => $show_content_bottom_meta_container
			)
		);

		walker_edge_create_meta_box_field(
			array(
				'type' => 'color',
				'name' => 'edgtf_content_bottom_background_color_meta',
				'default_value' => '',
				'label' => esc_html__( 'Background Color', 'walker' ),
				'description' => esc_html__( 'Choose a background color for Content Bottom area', 'walker' ),
				'parent' => $show_content_bottom_meta_container
			)
		);

        walker_edge_create_meta_box_field(
            array(
                'type' => 'image',
                'name' => 'edgtf_content_bottom_background_image_meta',
                'default_value' => '',
                'label' => esc_html__( 'Background Image', 'walker' ),
                'description' => esc_html__( 'Choose a background image for Content Bottom area', 'walker' ),
                'parent' => $show_content_bottom_meta_container
            )
        );