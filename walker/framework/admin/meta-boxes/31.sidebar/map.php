<?php

$custom_sidebars = walker_edge_get_custom_sidebars();

$sidebar_meta_box = walker_edge_create_meta_box(
    array(
        'scope' => array('page', 'portfolio-item', 'post'),
        'title' => esc_html__( 'Sidebar', 'walker' ),
        'name' => 'sidebar_meta'
    )
);

    walker_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_sidebar_meta',
            'type'        => 'select',
            'label' => esc_html__( 'Layout', 'walker' ),
            'description' => esc_html__( 'Choose the sidebar layout', 'walker' ),
            'parent'      => $sidebar_meta_box,
            'options'     => array(
				'' => esc_html__( 'Default', 'walker' ),
				'no-sidebar' => esc_html__( 'No Sidebar', 'walker' ),
				'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'walker' ),
				'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'walker' ),
				'sidebar-33-left' => esc_html__( 'Sidebar 1/3 Left', 'walker' ),
				'sidebar-25-left' => esc_html__( 'Sidebar 1/4 Left', 'walker' ),
			)
        )
    );

if(count($custom_sidebars) > 0) {
    walker_edge_create_meta_box_field(array(
        'name' => 'edgtf_custom_sidebar_meta',
        'type' => 'selectblank',
        'label' => esc_html__( 'Choose Widget Area in Sidebar', 'walker' ),
        'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'walker' ),
        'parent' => $sidebar_meta_box,
        'options' => $custom_sidebars
    ));
}

    walker_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_sidebar_boxed_layout_meta',
            'type'        => 'yesno',
            'label' => esc_html__( 'Disable Sidebar Area Boxed Layout', 'walker' ),
            'description' => esc_html__( 'Enabling this option will disable boxed around sidebar holder', 'walker' ),
            'parent'      => $sidebar_meta_box,
            'default_value' => 'no',
        )
    );