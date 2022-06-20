<?php

//Slider

$slider_meta_box = walker_edge_create_meta_box(
    array(
        'scope' => array('slides'),
        'title' => esc_html__( 'Slide Background', 'walker' ),
        'name' => 'slides_type'
    )
);

    walker_edge_create_meta_box_field(
        array(
            'name'          => 'edgtf_slide_background_type',
            'type'          => 'select',
            'default_value' => 'image',
            'label' => esc_html__( 'Slide Background Type', 'walker' ),
            'description' => esc_html__( 'Do you want to upload an image or video?', 'walker' ),
            'parent'        => $slider_meta_box,
            'options'       => array(
                "image" => esc_html__( "Image", 'walker' ),
                "video" => esc_html__( "Video", 'walker' )
            ),
            'args' => array(
                "dependence" => true,
                "hide" => array(
                    "image" => "#edgtf_edgtf_slides_video_settings",
                    "video" => "#edgtf_edgtf_slides_image_settings"
                ),
                "show" => array(
                    "image" => "#edgtf_edgtf_slides_image_settings",
                    "video" => "#edgtf_edgtf_slides_video_settings"
                )
            )
        )
    );


//Slide Image

$image_meta_container = walker_edge_add_admin_container(
    array(
        'name' => 'edgtf_slides_image_settings',
        'parent' => $slider_meta_box,
        'hidden_property' => 'edgtf_slide_background_type',
        'hidden_values' => array('video')
    )
);

    walker_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_slide_image',
            'type'        => 'image',
            'label' => esc_html__( 'Slide Image', 'walker' ),
            'description' => esc_html__( 'Choose background image', 'walker' ),
            'parent'      => $image_meta_container
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_slide_image_tablet',
            'type'        => 'image',
            'label' => esc_html__( 'Slide Image for Tablet - Portrait devices', 'walker' ),
            'description' => esc_html__( 'Choose background image', 'walker' ),
            'parent'      => $image_meta_container
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_slide_image_phone',
            'type'        => 'image',
            'label' => esc_html__( 'Slide Image For Mobile devices', 'walker' ),
            'description' => esc_html__( 'Choose background image', 'walker' ),
            'parent'      => $image_meta_container
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_slide_overlay_image',
            'type'        => 'image',
            'label' => esc_html__( 'Overlay Image', 'walker' ),
            'description' => esc_html__( 'Choose overlay image (pattern) for background image', 'walker' ),
            'parent'      => $image_meta_container
        )
    );


//Slide Video

$video_meta_container = walker_edge_add_admin_container(
    array(
        'name' => 'edgtf_slides_video_settings',
        'parent' => $slider_meta_box,
        'hidden_property' => 'edgtf_slide_background_type',
        'hidden_values' => array('image')
    )
);

    walker_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_slide_video_webm',
            'type'        => 'text',
            'label' => esc_html__( 'Video - webm', 'walker' ),
            'description' => esc_html__( 'Path to the webm file that you have previously uploaded in Media Section', 'walker' ),
            'parent'      => $video_meta_container
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_slide_video_mp4',
            'type'        => 'text',
            'label' => esc_html__( 'Video - mp4', 'walker' ),
            'description' => esc_html__( 'Path to the mp4 file that you have previously uploaded in Media Section', 'walker' ),
            'parent'      => $video_meta_container
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_slide_video_ogv',
            'type'        => 'text',
            'label' => esc_html__( 'Video - ogv', 'walker' ),
            'description' => esc_html__( 'Path to the ogv file that you have previously uploaded in Media Section', 'walker' ),
            'parent'      => $video_meta_container
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_slide_video_image',
            'type'        => 'image',
            'label' => esc_html__( 'Video Preview Image', 'walker' ),
            'description' => esc_html__( 'Choose background image that will be visible until video is loaded. This image will be shown on touch devices too.', 'walker' ),
            'parent'      => $video_meta_container
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name' => 'edgtf_slide_video_overlay',
            'type' => 'yesempty',
            'default_value' => '',
            'label' => esc_html__( 'Video Overlay Image', 'walker' ),
            'description' => esc_html__( 'Do you want to have a overlay image on video?', 'walker' ),
            'parent' => $video_meta_container,
            'args' => array(
                "dependence" => true,
                "dependence_hide_on_yes" => "",
                "dependence_show_on_yes" => "#edgtf_edgtf_slide_video_overlay_container"
            )
        )
    );

    $slide_video_overlay_container = walker_edge_add_admin_container(array(
        'name' => 'edgtf_slide_video_overlay_container',
        'parent' => $video_meta_container,
        'hidden_property' => 'edgtf_slide_video_overlay',
        'hidden_values' => array('','no')
    ));

        walker_edge_create_meta_box_field(
            array(
                'name'        => 'edgtf_slide_video_overlay_image',
                'type'        => 'image',
                'label' => esc_html__( 'Overlay Image', 'walker' ),
                'description' => esc_html__( 'Choose overlay image (pattern) for background video.', 'walker' ),
                'parent'      => $slide_video_overlay_container
            )
        );


//Slide Elements

$elements_meta_box = walker_edge_create_meta_box(
    array(
        'scope' => array('slides'),
        'title' => esc_html__( 'Slide Elements', 'walker' ),
        'name' => 'edgtf_slides_elements'
    )
);

    walker_edge_add_admin_section_title(
        array(
            'parent' => $elements_meta_box,
            'name' => 'edgtf_slides_elements_frame',
            'title' => esc_html__( 'Elements Holder Frame', 'walker' )
        )
    );

    walker_edge_add_slide_holder_frame_scheme(
        array(
            'parent' => $elements_meta_box
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_slide_holder_elements_alignment',
            'type'        => 'select',
            'label' => esc_html__( 'Elements Alignment', 'walker' ),
            'description' => esc_html__( 'How elements are aligned with respect to the Holder Frame', 'walker' ),
            'parent'      => $elements_meta_box,
            'default_value' => 'center',
            'options' => array(
                "center" => esc_html__( "Center", 'walker' ),
                "left" => esc_html__( "Left", 'walker' ),
                "right" => esc_html__( "Right", 'walker' ),
                "custom" => esc_html__( "Custom", 'walker' )
            ),
            'args'        => array(
                "dependence" => true,
                "hide" => array(
                    "center" => "#edgtf_edgtf_slide_holder_frame_height",
                    "left" => "#edgtf_edgtf_slide_holder_frame_height",
                    "right" => "#edgtf_edgtf_slide_holder_frame_height",
                    "custom" => ""
                ),
                "show" => array(
                    "center" => "",
                    "left" => "",
                    "right" => "",
                    "custom" => "#edgtf_edgtf_slide_holder_frame_height"
                )
            )
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name'        => 'edgtf_slide_holder_frame_in_grid',
            'type'        => 'select',
            'label' => esc_html__( 'Holder Frame in Grid?', 'walker' ),
            'description' => esc_html__( 'Whether to keep the holder frame width the same as that of the grid.', 'walker' ),
            'parent'      => $elements_meta_box,
            'default_value' => 'no',
            'options' => array(
                "yes" => esc_html__( "Yes", 'walker' ),
                "no" => esc_html__( "No", 'walker' )
            ),
            'args'        => array(
                "dependence" => true,
                "hide" => array(
                    "yes" => "#edgtf_edgtf_slide_holder_frame_width, #edgtf_edgtf_holder_frame_responsive_container",
                    "no" => ""
                ),
                "show" => array(
                    "yes" => "",
                    "no" => "#edgtf_edgtf_slide_holder_frame_width, #edgtf_edgtf_holder_frame_responsive_container"
                )
            )
        )
    );

    $holder_frame = walker_edge_add_admin_group(array(
        'title' => esc_html__( 'Holder Frame Properties', 'walker' ),
        'description' => esc_html__( 'The frame is always positioned centrally on the slide. All elements are positioned and sized relatively to the holder frame. Refer to the scheme above.', 'walker' ),
        'name' => 'edgtf_holder_frame',
        'parent' => $elements_meta_box
    ));

        $row1 = walker_edge_add_admin_row(array(
            'name' => 'row1',
            'parent' => $holder_frame
        ));

            $holder_frame_width = walker_edge_create_meta_box_field(
                array(
                    'name'        => 'edgtf_slide_holder_frame_width',
                    'type'        => 'textsimple',
                    'label' => esc_html__( 'Relative width (C/A*100)', 'walker' ),
                    'parent'      => $row1,
                    'hidden_property' => 'edgtf_slide_holder_frame_in_grid',
                    'hidden_values' => array('yes')
                )
            );

            $holder_frame_height = walker_edge_create_meta_box_field(
                array(
                    'name'        => 'edgtf_slide_holder_frame_height',
                    'type'        => 'textsimple',
                    'label' => esc_html__( 'Height to width ratio (D/C*100)', 'walker' ),
                    'parent'      => $row1,
                    'hidden_property' => 'edgtf_slide_holder_elements_alignment',
                    'hidden_values' => array('center', 'left', 'right')
                )
            );

    $holder_frame_responsive_container = walker_edge_add_admin_container(array(
        'name' => 'edgtf_holder_frame_responsive_container',
        'parent' => $elements_meta_box,
        'hidden_property' => 'edgtf_slide_holder_frame_in_grid',
        'hidden_values' => array('yes')
    ));

    $holder_frame_responsive = walker_edge_add_admin_group(array(
        'title' => esc_html__( 'Responsive Relative Width', 'walker' ),
        'description' => esc_html__( 'Enter different relative widths of the holder frame for each responsive stage. Leave blank to have the frame width scale proportionally to the screen size.', 'walker' ),
        'name' => 'edgtf_holder_frame_responsive',
        'parent' => $holder_frame_responsive_container
    ));
    
    $screen_widths_holder_frame = array(
        // These values must match those in edgt.layout.inc, slider.php and shortcodes.js
        "mobile" => 600,
        "tabletp" => 800,
        "tabletl" => 1024,
        "laptop" => 1440
    );

        $row2 = walker_edge_add_admin_row(array(
            'name' => 'row2',
            'parent' => $holder_frame_responsive
        ));

            $holder_frame_width = walker_edge_create_meta_box_field(
                array(
                    'name'        => 'edgtf_slide_holder_frame_width_mobile',
                    'type'        => 'textsimple',
                    'label' => sprintf( esc_html__( 'Mobile (up to %spx)', 'walker' ), $screen_widths_holder_frame["mobile"] ),
                    'parent'      => $row2
                )
            );

            $holder_frame_height = walker_edge_create_meta_box_field(
                array(
                    'name'        => 'edgtf_slide_holder_frame_width_tablet_p',
                    'type'        => 'textsimple',
                    'label' => sprintf( esc_html__( 'Tablet - Portrait (%spx - %spx)', 'walker' ), $screen_widths_holder_frame["mobile"]+1, $screen_widths_holder_frame["tabletp"] ),
                    'parent'      => $row2
                )
            );

            $holder_frame_height = walker_edge_create_meta_box_field(
                array(
                    'name'        => 'edgtf_slide_holder_frame_width_tablet_l',
                    'type'        => 'textsimple',
                    'label' => sprintf( esc_html__( 'Tablet - Landscape (%spx - %spx)', 'walker' ), $screen_widths_holder_frame["tabletp"]+1, $screen_widths_holder_frame["tabletl"] ),
                    'parent'      => $row2
                )
            );

        $row3 = walker_edge_add_admin_row(array(
            'name' => 'row3',
            'parent' => $holder_frame_responsive
        ));

            $holder_frame_width = walker_edge_create_meta_box_field(
                array(
                    'name'        => 'edgtf_slide_holder_frame_width_laptop',
                    'type'        => 'textsimple',
                    'label' => sprintf( esc_html__( 'Laptop (%spx - %spx)', 'walker' ), $screen_widths_holder_frame["tabletl"]+1, $screen_widths_holder_frame["laptop"] ),
                    'parent'      => $row3
                )
            );

            $holder_frame_height = walker_edge_create_meta_box_field(
                array(
                    'name'        => 'edgtf_slide_holder_frame_width_desktop',
                    'type'        => 'textsimple',
                    'label' => sprintf( esc_html__( 'Desktop (above %spx)', 'walker' ), $screen_widths_holder_frame["laptop"]),
                    'parent'      => $row3
                )
            );

    walker_edge_create_meta_box_field(
        array(
            'parent' => $elements_meta_box,
            'type' => 'text',
            'name' => 'edgtf_slide_elements_default_width',
            'label' => esc_html__( 'Default Screen Width in px (A)', 'walker' ),
            'description' => esc_html__( 'All elements marked as responsive scale at the ratio of the actual screen width to this screen width. Default is 1920px.', 'walker' )
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'parent' => $elements_meta_box,
            'type' => 'select',
            'name' => 'edgtf_slide_elements_default_animation',
            'default_value' => 'none',
            'label' => esc_html__( 'Default Elements Animation', 'walker' ),
            'description' => esc_html__( 'This animation will be applied to all elements except those with their own animation settings.', 'walker' ),
            'options' => array(
                "none" => esc_html__( "No Animation", 'walker' ),
                "flip" => esc_html__( "Flip", 'walker' ),
                "spin" => esc_html__( "Spin", 'walker' ),
                "fade" => esc_html__( "Fade In", 'walker' ),
                "from_bottom" => esc_html__( "Fly In From Bottom", 'walker' ),
                "from_top" => esc_html__( "Fly In From Top", 'walker' ),
                "from_left" => esc_html__( "Fly In From Left", 'walker' ),
                "from_right" => esc_html__( "Fly In From Right", 'walker' )
            )
        )
    );

    walker_edge_add_admin_section_title(
        array(
            'parent' => $elements_meta_box,
            'name' => 'edgtf_slides_elements_list',
            'title' => esc_html__( 'Elements', 'walker' )
        )
    );

    $slide_elements = walker_edge_add_slide_elements_framework(
        array(
            'parent' => $elements_meta_box,
            'name' => 'edgtf_slides_elements_holder'
        )
    );

//Slide Behaviour

$behaviours_meta_box = walker_edge_create_meta_box(
    array(
        'scope' => array('slides'),
        'title' => esc_html__( 'Slide Behaviours', 'walker' ),
        'name' => 'edgtf_slides_behaviour_settings'
    )
);  

    walker_edge_add_admin_section_title(
        array(
            'parent' => $behaviours_meta_box,
            'name' => 'edgtf_header_styling_title',
            'title' => esc_html__( 'Header', 'walker' )
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'parent' => $behaviours_meta_box,
            'type' => 'selectblank',
            'name' => 'edgtf_slide_header_style',
            'default_value' => '',
            'label' => esc_html__( 'Header Style', 'walker' ),
            'description' => esc_html__( 'Header style will be applied when this slide is in focus', 'walker' ),
            'options' => array(
                "light" => esc_html__( "Light", 'walker' ),
                "dark" => esc_html__( "Dark", 'walker' )
            )
        )
    );

    walker_edge_add_admin_section_title(
        array(
            'parent' => $behaviours_meta_box,
            'name' => 'edgtf_image_animation_title',
            'title' => esc_html__( 'Slide Image Animation', 'walker' )
        )
    );

    walker_edge_create_meta_box_field(
        array(
            'name' => 'edgtf_enable_image_animation',
            'type' => 'yesno',
            'default_value' => 'no',
            'label' => esc_html__( 'Enable Image Animation', 'walker' ),
            'description' => esc_html__( 'Enabling this option will turn on a motion animation on the slide image', 'walker' ),
            'parent' => $behaviours_meta_box,
            'args' => array(
                "dependence" => true,
                "dependence_hide_on_yes" => "",
                "dependence_show_on_yes" => "#edgtf_edgtf_enable_image_animation_container"
            )
        )
    );

    $enable_image_animation_container = walker_edge_add_admin_container(array(
        'name' => 'edgtf_enable_image_animation_container',
        'parent' => $behaviours_meta_box,
        'hidden_property' => 'edgtf_enable_image_animation',
        'hidden_value' => 'no'
    ));

        walker_edge_create_meta_box_field(
            array(
                'parent' => $enable_image_animation_container,
                'type' => 'select',
                'name' => 'edgtf_enable_image_animation_type',
                'default_value' => 'zoom_center',
                'label' => esc_html__( 'Animation Type', 'walker' ),
                'options' => array(
                    "zoom_center" => esc_html__( "Zoom In Center", 'walker' ),
                    "zoom_top_left" => esc_html__( "Zoom In to Top Left", 'walker' ),
                    "zoom_top_right" => esc_html__( "Zoom In to Top Right", 'walker' ),
                    "zoom_bottom_left" => esc_html__( "Zoom In to Bottom Left", 'walker' ),
                    "zoom_bottom_right" => esc_html__( "Zoom In to Bottom Right", 'walker' )
                )
            )
        );