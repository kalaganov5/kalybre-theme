<?php

if(!function_exists('walker_edge_register_sidebars')) {
    /**
     * Function that registers theme's sidebars
     */
    function walker_edge_register_sidebars() {

        register_sidebar(array(
            'name' => esc_html__( 'Sidebar', 'walker' ),
            'id' => 'sidebar',
            'description'   => esc_html__( 'Default Sidebar area. In order to display this area you need to enable sidebar layout through global theme options or on page meta box options.', 'walker' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>'
        ));

    }

    add_action('widgets_init', 'walker_edge_register_sidebars');
}

if(!function_exists('walker_edge_add_support_custom_sidebar')) {
    /**
     * Function that adds theme support for custom sidebars. It also creates WalkerEdgeClassSidebar object
     */
    function walker_edge_add_support_custom_sidebar() {
        add_theme_support('WalkerEdgeClassSidebar');
        if (get_theme_support('WalkerEdgeClassSidebar')) new WalkerEdgeClassSidebar();
    }

    add_action('after_setup_theme', 'walker_edge_add_support_custom_sidebar');
}