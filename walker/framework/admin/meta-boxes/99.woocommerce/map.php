<?php

//WooCommerce
if(walker_edge_is_woocommerce_installed()){

    $woo_single_layout = walker_edge_options()->getOptionValue('single_product_layout');
    $woo_single_layout_hide = '';
    $woo_single_layout_show = '#edgtf_edgtf_show_standard_layout_container';

    if($woo_single_layout !== 'standard') {
        $woo_single_layout_hide = '#edgtf_edgtf_show_standard_layout_container';
        $woo_single_layout_show = '';
    }

    $woocommerce_meta_box = walker_edge_create_meta_box(
        array(
            'scope' => array('product'),
            'title' => esc_html__( 'Product Meta', 'walker' ),
            'name' => 'woo_product_meta'
        )
    );

        walker_edge_create_meta_box_field(array(
            'name'        => 'edgtf_single_product_layout_meta',
            'type'        => 'select',
            'label' => esc_html__( 'Single Product Layout', 'walker' ),
            'description' => esc_html__( 'Select single product page layout', 'walker' ),
            'parent'      => $woocommerce_meta_box,
            'options'     => array(
                '' => esc_html__( 'Default', 'walker' ),
                'standard' => esc_html__( 'Standard', 'walker' ),
                'full-width' => esc_html__( 'Wide Gallery', 'walker' ),
                'sticky-info' => esc_html__( 'Sticky Info', 'walker' )
            ),
            'args' => array(
                'dependence' => true,
                'hide' => array(
                    '' => $woo_single_layout_hide,
                    'standard' => '',
                    'full-width' => '#edgtf_edgtf_show_standard_layout_container',
                    'sticky-info' => '#edgtf_edgtf_show_standard_layout_container'
                ),
                'show' => array(
                    '' => $woo_single_layout_show,
                    'standard' => '#edgtf_edgtf_show_standard_layout_container',
                    'full-width' => '',
                    'sticky-info' => ''
                )
            )
        ));

            $show_standard_layout_container = walker_edge_add_admin_container(
                array(
                    'parent' => $woocommerce_meta_box,
                    'name' => 'edgtf_show_standard_layout_container',
                    'hidden_property' => 'edgtf_single_product_layout_meta',
                    'hidden_values' => array(
                        $woo_single_layout_hide,
                        'full-width',
                        'sticky-info'
                    ),
                )
            );

                walker_edge_create_meta_box_field(array(
                    'name'        => 'edgtf_woo_enable_single_thumb_featured_switch_meta',
                    'type'        => 'select',
                    'label' => esc_html__( 'Switch Featured Image on Thumbnail Click', 'walker' ),
                    'description' => esc_html__( 'Enabling this option will switch featured image with thumbnail image on thumbnail click', 'walker' ),
                    'parent'      => $show_standard_layout_container,
                    'options'     => array(
                        '' => esc_html__( 'Default', 'walker' ),
                        'no' => esc_html__( 'No', 'walker' ),
                        'yes' => esc_html__( 'Yes', 'walker' )
                    )
                ));

                walker_edge_create_meta_box_field(array(
                    'name'        => 'edgtf_woo_enable_single_zoom_main_image_meta',
                    'type'        => 'select',
                    'label' => esc_html__( 'Enable Zoom Maginfier for Featured Image', 'walker' ),
                    'description' => esc_html__( 'Enabling this option will show magnifier image on the right side of the main image. Original image must be larger then you set in woocommerce options because of zoom effect.', 'walker' ),
                    'parent'      => $show_standard_layout_container,
                    'options'     => array(
                        '' => esc_html__( 'Default', 'walker' ),
                        'no' => esc_html__( 'No', 'walker' ),
                        'yes' => esc_html__( 'Yes', 'walker' )
                    )
                ));
             

        walker_edge_create_meta_box_field(array(
            'name'        => 'edgtf_single_product_new_meta',
            'type'        => 'select',
            'label' => esc_html__( 'Enable New Product Mark', 'walker' ),
            'description' => esc_html__( 'Enabling this option will show new product mark on your product lists and product single', 'walker' ),
            'parent'      => $woocommerce_meta_box,
            'options'     => array(
                '' => esc_html__( 'No', 'walker' ),
                'yes' => esc_html__( 'Yes', 'walker' )
            )
        ));

        walker_edge_create_meta_box_field(array(
            'name'        => 'edgtf_product_featured_image_size',
            'type'        => 'select',
            'label' => esc_html__( 'Dimensions for Product List Shortcode', 'walker' ),
            'description' => esc_html__( 'Choose image layout when it appears in Edge Product List - Masonry layout shortcode', 'walker' ),
            'parent'      => $woocommerce_meta_box,
            'options'     => array(
                'edgtf-woo-image-normal-width' => esc_html__( 'Default', 'walker' ),
                'edgtf-woo-image-large-width' => esc_html__( 'Large Width', 'walker' )
            )
        ));

        walker_edge_create_meta_box_field(
            array(
                'name' => 'edgtf_woo_show_title_area_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__( 'Show Title Area', 'walker' ),
                'description' => esc_html__( 'Disabling this option will turn off page title area', 'walker' ),
                'parent' => $woocommerce_meta_box,
                'options'     => array(
                    '' => esc_html__( 'Default', 'walker' ),
                    'no' => esc_html__( 'No', 'walker' ),
                    'yes' => esc_html__( 'Yes', 'walker' )
                )
            )
        );

        walker_edge_create_meta_box_field(
            array(
                'name'        => 'edgtf_disable_page_content_top_padding_meta',
                'type'        => 'select',
                'label' => esc_html__( 'Disable Content Top Padding', 'walker' ),
                'description' => esc_html__( 'Enabling this option will disable content top padding', 'walker' ),
                'parent'      => $woocommerce_meta_box,
                'options'     => array(
                    'no' => esc_html__( 'No', 'walker' ),
                    'yes' => esc_html__( 'Yes', 'walker' )
                )
            )
        ); 
}