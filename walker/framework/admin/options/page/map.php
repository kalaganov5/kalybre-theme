<?php

if ( ! function_exists('walker_edge_page_options_map') ) {

    function walker_edge_page_options_map() {

        walker_edge_add_admin_page(
            array(
                'slug'  => '_page_page',
                'title' => esc_html__( 'Page', 'walker' ),
                'icon'  => 'fa fa-file-text-o'
            )
        );

        /***************** Page Layout - begin **********************/

            $custom_sidebars = walker_edge_get_custom_sidebars();

            $panel_sidebar = walker_edge_add_admin_panel(
                array(
                    'page'  => '_page_page',
                    'name'  => 'panel_sidebar',
                    'title' => esc_html__( 'Page Style', 'walker' )
                )
            );

            walker_edge_add_admin_field(array(
                'name'        => 'page_sidebar_layout',
                'type'        => 'select',
                'label' => esc_html__( 'Sidebar Layout', 'walker' ),
                'description' => esc_html__( 'Choose a sidebar layout for pages', 'walker' ),
                'default_value' => 'default',
                'parent'      => $panel_sidebar,
                'options'     => array(
                    'default' => esc_html__( 'No Sidebar', 'walker' ),
                    'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'walker' ),
                    'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'walker' ),
                    'sidebar-33-left' => esc_html__( 'Sidebar 1/3 Left', 'walker' ),
                    'sidebar-25-left' => esc_html__( 'Sidebar 1/4 Left', 'walker' )
                )
            ));


            if(count($custom_sidebars) > 0) {
                walker_edge_add_admin_field(array(
                    'name' => 'page_custom_sidebar',
                    'type' => 'selectblank',
                    'label' => esc_html__( 'Sidebar to Display', 'walker' ),
                    'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'walker' ),
                    'parent' => $panel_sidebar,
                    'options' => $custom_sidebars
                ));
            }

            walker_edge_add_admin_field(array(
                'name'        => 'page_show_comments',
                'type'        => 'yesno',
                'label' => esc_html__( 'Show Comments', 'walker' ),
                'description' => esc_html__( 'Enabling this option will show comments on your page', 'walker' ),
                'default_value' => 'yes',
                'parent'      => $panel_sidebar
            ));

        /***************** Page Layout - end **********************/    

        /***************** Sidebar Layout - begin **********************/

            $panel_widgets = walker_edge_add_admin_panel(
                array(
                    'page'  => '_page_page',
                    'name'  => 'panel_widgets',
                    'title' => esc_html__( 'Sidebar Style', 'walker' )
                )
            );

            /**
             * Navigation style
             */
            walker_edge_add_admin_field(array(
                'type'          => 'color',
                'name'          => 'sidebar_background_color',
                'default_value' => '',
                'label' => esc_html__( 'Sidebar Background Color', 'walker' ),
                'description' => esc_html__( 'Choose background color for sidebar', 'walker' ),
                'parent'        => $panel_widgets
            ));

            $group_sidebar_padding = walker_edge_add_admin_group(array(
                'name'      => 'group_sidebar_padding',
                'title' => esc_html__( 'Padding', 'walker' ),
                'parent'    => $panel_widgets
            ));

            $row_sidebar_padding = walker_edge_add_admin_row(array(
                'name'      => 'row_sidebar_padding',
                'parent'    => $group_sidebar_padding
            ));

            walker_edge_add_admin_field(array(
                'type'          => 'textsimple',
                'name'          => 'sidebar_padding_top',
                'default_value' => '',
                'label' => esc_html__( 'Top Padding', 'walker' ),
                'args'          => array(
                    'suffix'    => 'px'
                ),
                'parent'        => $row_sidebar_padding
            ));

            walker_edge_add_admin_field(array(
                'type'          => 'textsimple',
                'name'          => 'sidebar_padding_right',
                'default_value' => '',
                'label' => esc_html__( 'Right Padding', 'walker' ),
                'args'          => array(
                    'suffix'    => 'px'
                ),
                'parent'        => $row_sidebar_padding
            ));

            walker_edge_add_admin_field(array(
                'type'          => 'textsimple',
                'name'          => 'sidebar_padding_bottom',
                'default_value' => '',
                'label' => esc_html__( 'Bottom Padding', 'walker' ),
                'args'          => array(
                    'suffix'    => 'px'
                ),
                'parent'        => $row_sidebar_padding
            ));

            walker_edge_add_admin_field(array(
                'type'          => 'textsimple',
                'name'          => 'sidebar_padding_left',
                'default_value' => '',
                'label' => esc_html__( 'Left Padding', 'walker' ),
                'args'          => array(
                    'suffix'    => 'px'
                ),
                'parent'        => $row_sidebar_padding
            ));

            walker_edge_add_admin_field(array(
                'type'          => 'select',
                'name'          => 'sidebar_alignment',
                'default_value' => '',
                'label' => esc_html__( 'Text Alignment', 'walker' ),
                'description' => esc_html__( 'Choose text aligment', 'walker' ),
                'options'       => array(
                    'left' => esc_html__( 'Left', 'walker' ),
                    'center' => esc_html__( 'Center', 'walker' ),
                    'right' => esc_html__( 'Right', 'walker' )
                ),
                'parent'        => $panel_widgets
            ));

        /***************** Sidebar Layout - end **********************/    

        /***************** Content Layout - begin **********************/

            $panel_content = walker_edge_add_admin_panel(
                array(
                    'page'  => '_page_page',
                    'name'  => 'panel_content',
                    'title' => esc_html__( 'Content Style', 'walker' )
                )
            );

            walker_edge_add_admin_field(array(
                'type'          => 'text',
                'name'          => 'content_top_padding',
                'description' => esc_html__( 'Enter top padding for content area for templates in full width. If you set this value then it\'s important to set also Content top padding for mobile header value', 'walker' ),
                'default_value' => '0',
                'label' => esc_html__( 'Content Top Padding for Template in Full Width', 'walker' ),
                'args'          => array(
                    'suffix'    => 'px',
                    'col_width' => 3
                ),
                'parent'        => $panel_content
            ));

            walker_edge_add_admin_field(array(
                'type'          => 'text',
                'name'          => 'content_top_padding_in_grid',
                'description' => esc_html__( 'Enter top padding for content area for Templates in grid. If you set this value then it\'s important to set also Content top padding for mobile header value', 'walker' ),
                'default_value' => '40',
                'label' => esc_html__( 'Content Top Padding for Templates in Grid', 'walker' ),
                'args'          => array(
                    'suffix'    => 'px',
                    'col_width' => 3
                ),
                'parent'        => $panel_content
            ));

            walker_edge_add_admin_field(array(
                'type'          => 'text',
                'name'          => 'content_top_padding_mobile',
                'description' => esc_html__( 'Enter top padding for content area for Mobile Header', 'walker' ),
                'default_value' => '0',
                'label' => esc_html__( 'Content Top Padding for Mobile Header', 'walker' ),
                'args'          => array(
                    'suffix'    => 'px',
                    'col_width' => 3
                ),
                'parent'        => $panel_content
            ));

        /***************** Content Layout - end **********************/    

        /***************** Content Bottom Layout - begin **********************/

            $panel_content_bottom = walker_edge_add_admin_panel(
                array(
                    'page'  => '_page_page',
                    'name'  => 'panel_content_bottom',
                    'title' => esc_html__( 'Content Bottom Area Style', 'walker' )
                )
            );

            walker_edge_add_admin_field(array(
                'name'          => 'enable_content_bottom_area',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__( 'Enable Content Bottom Area', 'walker' ),
                'description' => esc_html__( 'This option will enable Content Bottom area on pages', 'walker' ),
                'args'          => array(
                    'dependence' => true,
                    'dependence_hide_on_yes' => '',
                    'dependence_show_on_yes' => '#edgtf_enable_content_bottom_area_container'
                ),
                'parent'        => $panel_content_bottom
            ));

            $enable_content_bottom_area_container = walker_edge_add_admin_container(
                array(
                    'parent'            => $panel_content_bottom,
                    'name'              => 'enable_content_bottom_area_container',
                    'hidden_property'   => 'enable_content_bottom_area',
                    'hidden_value'      => 'no'
                )
            );

            $custom_sidebars = walker_edge_get_custom_sidebars();

            walker_edge_add_admin_field(array(
                'type'          => 'selectblank',
                'name'          => 'content_bottom_sidebar_custom_display',
                'default_value' => '',
                'label' => esc_html__( 'Widget Area to Display', 'walker' ),
                'description' => esc_html__( 'Choose a Content Bottom widget area to display', 'walker' ),
                'options'       => $custom_sidebars,
                'parent'        => $enable_content_bottom_area_container
            ));

            walker_edge_add_admin_field(array(
                'type'          => 'yesno',
                'name'          => 'content_bottom_in_grid',
                'default_value' => 'yes',
                'label' => esc_html__( 'Display in Grid', 'walker' ),
                'description' => esc_html__( 'Enabling this option will place Content Bottom in grid', 'walker' ),
                'parent'        => $enable_content_bottom_area_container
            ));

            walker_edge_add_admin_field(array(
                'type'          => 'color',
                'name'          => 'content_bottom_background_color',
                'default_value' => '',
                'label' => esc_html__( 'Background Color', 'walker' ),
                'description' => esc_html__( 'Choose a background color for Content Bottom area', 'walker' ),
                'parent'        => $enable_content_bottom_area_container
            ));

            walker_edge_add_admin_field(array(
                'type'          => 'image',
                'name'          => 'content_bottom_background_image',
                'default_value' => '',
                'label' => esc_html__( 'Background Image', 'walker' ),
                'description' => esc_html__( 'Choose a background Image for Content Bottom area', 'walker' ),
                'parent'        => $enable_content_bottom_area_container
            ));

        /***************** Content Bottom Layout - end **********************/

    }

    add_action( 'walker_edge_options_map', 'walker_edge_page_options_map', 8);
}