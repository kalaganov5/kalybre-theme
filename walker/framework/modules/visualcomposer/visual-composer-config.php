<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if(function_exists('vc_set_as_theme')) {
	vc_set_as_theme(true);
}

/**
 * Change path for overridden templates
 */
if(function_exists('vc_set_shortcodes_templates_dir')) {
	$dir = EDGE_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists('walker_edge_configure_visual_composer') ) {
	/**
	 * Configuration for Visual Composer
	 * Hooks on vc_after_init action
	 */
	function walker_edge_configure_visual_composer() {

		/**
		 * Removing shortcodes
		 */
		if (function_exists('vc_remove_element')) {
			vc_remove_element("vc_section");
		}
		/**
		 * Remove unused parameters
		 */
		if (function_exists('vc_remove_param')) {
			vc_remove_param('vc_row', 'full_width');
			vc_remove_param('vc_row', 'full_height');
			vc_remove_param('vc_row', 'content_placement');
			vc_remove_param('vc_row', 'video_bg');
			vc_remove_param('vc_row', 'video_bg_url');
			vc_remove_param('vc_row', 'video_bg_parallax');
			vc_remove_param('vc_row', 'parallax');
			vc_remove_param('vc_row', 'parallax_image');
			vc_remove_param('vc_row', 'gap');
			vc_remove_param('vc_row', 'columns_placement');
			vc_remove_param('vc_row', 'equal_height');
			vc_remove_param('vc_row', 'parallax_speed_bg');
			vc_remove_param('vc_row', 'parallax_speed_video');
			vc_remove_param('vc_row', 'disable_element');
			vc_remove_param('vc_row', 'css_animation');

			vc_remove_param('vc_row_inner', 'content_placement');
			vc_remove_param('vc_row_inner', 'equal_height');
			vc_remove_param('vc_row_inner', 'gap');
			vc_remove_param('vc_row_inner', 'disable_element');
		}
	}

	add_action('vc_after_init', 'walker_edge_configure_visual_composer');
}

if ( ! function_exists('walker_edge_configure_visual_composer_frontend_editor') ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function walker_edge_configure_visual_composer_frontend_editor() {
		/**
		 * Remove frontend editor
		 */
		if(function_exists('vc_disable_frontend')){
			vc_disable_frontend();
		}
	}

	add_action('vc_after_init', 'walker_edge_configure_visual_composer_frontend_editor');
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Edgtf_Accordion extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Accordion_Tab extends WPBakeryShortCodesContainer {}
    class WPBakeryShortCode_Edgtf_Animation_Holder extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Elements_Holder extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Elements_Holder_Item extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Frame_Slider extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Frame_Slider_Left_Panel extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Frame_Slider_Right_Panel extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Parallax_Sections extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Pricing_Tables extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Tabs extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Tab extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Edgtf_Team_Carousels extends WPBakeryShortCodesContainer {}
}

/*** Row ***/
if ( ! function_exists('walker_edge_vc_row_map') ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function walker_edge_vc_row_map() {

		$animations = array(
			esc_html__( 'No animation', 'walker' ) => '',
			esc_html__( 'Elements Shows From Left Side', 'walker' ) => 'edgtf-element-from-left',
			esc_html__( 'Elements Shows From Right Side', 'walker' ) => 'edgtf-element-from-right',
			esc_html__( 'Elements Shows From Top Side', 'walker' ) => 'edgtf-element-from-top',
			esc_html__( 'Elements Shows From Bottom Side', 'walker' ) => 'edgtf-element-from-bottom',
			esc_html__( 'Elements Shows From Fade', 'walker' ) => 'edgtf-element-from-fade'
		);

		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'class' => '',
			'heading' =>  esc_html__( 'Row Type', 'walker' ),
			'param_name' => 'row_type',
			'value' => array(
				esc_html__( 'Row', 'walker' ) => 'row',
				esc_html__( 'Parallax', 'walker' ) => 'parallax'
			)
		));

		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'class' => '',
			'heading' =>  esc_html__( 'Content Width', 'walker' ),
			'param_name' => 'content_width',
			'value' => array(
				esc_html__( 'Full Width', 'walker' ) => 'full-width',
				esc_html__( 'In Grid', 'walker' ) => 'grid'
			)
		));

		vc_add_param('vc_row', array(
			'type' => 'textfield',
			'class' => '',
			'heading' =>  esc_html__( 'Anchor ID', 'walker' ),
			'param_name' => 'anchor',
			'value' => '',
			'description' => esc_html__( 'For example home', 'walker' )
		));

		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'class' => '',
			'heading' =>  esc_html__( 'Content Aligment', 'walker' ),
			'param_name' => 'content_aligment',
			'value' => array(
				esc_html__( 'Left', 'walker' ) => 'left',
				esc_html__( 'Center', 'walker' ) => 'center',
				esc_html__( 'Right', 'walker' ) => 'right'
			)
		));

		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'class' => '',
			'heading' =>  esc_html__( 'Video Background', 'walker' ),
			'value' => array(
				esc_html__( 'No', 'walker' ) => '',
				esc_html__( 'Yes', 'walker' ) => 'show_video'
			),
			'param_name' => 'video',
			'description' => '',
			'dependency' => Array('element' => 'row_type', 'value' => array('row'))
		));

		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'class' => '',
			'heading' =>  esc_html__( 'Video Overlay', 'walker' ),
			'value' => array(
				esc_html__( 'No', 'walker' ) => '',
				esc_html__( 'Yes', 'walker' ) => 'show_video_overlay'
			),
			'param_name' => 'video_overlay',
			'description' => '',
			'dependency' => Array('element' => 'video', 'value' => array('show_video'))
		));

		vc_add_param('vc_row', array(
			'type' => 'attach_image',
			'class' => '',
			'heading' =>  esc_html__( 'Video Overlay Image (pattern)', 'walker' ),
			'value' => '',
			'param_name' => 'video_overlay_image',
			'description' => '',
			'dependency' => Array('element' => 'video_overlay', 'value' => array('show_video_overlay'))
		));

		vc_add_param('vc_row', array(
			'type' => 'textfield',
			'class' => '',
			'heading' =>  esc_html__( 'Video Background (webm) File URL', 'walker' ),
			'value' => '',
			'param_name' => 'video_webm',
			'description' => '',
			'dependency' => Array('element' => 'video', 'value' => array('show_video'))
		));

		vc_add_param('vc_row', array(
			'type' => 'textfield',
			'class' => '',
			'heading' =>  esc_html__( 'Video Background (mp4) file URL', 'walker' ),
			'value' => '',
			'param_name' => 'video_mp4',
			'description' => '',
			'dependency' => Array('element' => 'video', 'value' => array('show_video'))
		));

		vc_add_param('vc_row', array(
			'type' => 'textfield',
			'class' => '',
			'heading' =>  esc_html__( 'Video Background (ogv) file URL', 'walker' ),
			'value' => '',
			'param_name' => 'video_ogv',
			'description' => '',
			'dependency' => Array('element' => 'video', 'value' => array('show_video'))
		));

		vc_add_param('vc_row', array(
			'type' => 'attach_image',
			'class' => '',
			'heading' =>  esc_html__( 'Video Preview Image', 'walker' ),
			'value' => '',
			'param_name' => 'video_image',
			'description' => '',
			'dependency' => Array('element' => 'video', 'value' => array('show_video'))
		));

		vc_add_param("vc_row", array(
			'type' => 'dropdown',
			'class' => '',
			'heading' =>  esc_html__( 'Full Screen Height', 'walker' ),
			'param_name' => 'full_screen_section_height',
			'value' => array(
				esc_html__( 'No', 'walker' ) => 'no',
				esc_html__( 'Yes', 'walker' ) => 'yes'
			),
			'save_always' => true,
			'dependency' => Array('element' => 'row_type', 'value' => array('parallax'))
		));

		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'class' => '',
			'heading' =>  esc_html__( 'Vertically Align Content In Middle', 'walker' ),
			'param_name' => 'vertically_align_content_in_middle',
			'value' => array(
				esc_html__( 'No', 'walker' ) => 'no',
				esc_html__( 'Yes', 'walker' ) => 'yes'
			),
			'dependency' => array('element' => 'full_screen_section_height', 'value' => 'yes')
		));

		vc_add_param('vc_row', array(
			'type' => 'textfield',
			'class' => '',
			'heading' =>  esc_html__( 'Section Height', 'walker' ),
			'param_name' => 'section_height',
			'value' => '',
			'dependency' => Array('element' => 'full_screen_section_height', 'value' => array('no'))
		));

		vc_add_param('vc_row', array(
			'type' => 'attach_image',
			'class' => '',
			'heading' =>  esc_html__( 'Parallax Background image', 'walker' ),
			'value' => '',
			'param_name' => 'parallax_background_image',
			'description' => esc_html__( 'Please note that for parallax row type, background image from Design Options will not work so you should to fill this field', 'walker' ),
			'dependency' => Array('element' => 'row_type', 'value' => array('parallax'))
		));

		vc_add_param('vc_row', array(
			'type' => 'textfield',
			'class' => '',
			'heading' =>  esc_html__( 'Parallax speed', 'walker' ),
			'param_name' => 'parallax_speed',
			'value' => '',
			'dependency' => Array('element' => 'row_type', 'value' => array('parallax'))
		));

		vc_add_param('vc_row', array(
			'type' => 'dropdown',
			'heading' =>  esc_html__( 'CSS Animation', 'walker' ),
			'param_name' => 'css_animation',
			'value' => $animations,
			'description' => '',
			'dependency' => Array('element' => 'row_type', 'value' => array('row'))
		));

		vc_add_param('vc_row', array(
			'type' => 'textfield',
			'heading' =>  esc_html__( 'Transition delay (ms)', 'walker' ),
			'param_name' => 'transition_delay',
			'admin_label' => true,
			'value' => '',
			'description' => '',
			'dependency' => array('element' => 'css_animation', 'not_empty' => true)
		));

		/*** Row Inner ***/

		vc_add_param('vc_row_inner', array(
			'type' => 'dropdown',
			'class' => '',
			'heading' =>  esc_html__( 'Row Type', 'walker' ),
			'param_name' => 'row_type',
			'value' => array(
				esc_html__( 'Row', 'walker' ) => 'row',
				esc_html__( 'Parallax', 'walker' ) => 'parallax'
			)
		));

		vc_add_param('vc_row_inner', array(
			'type' => 'dropdown',
			'class' => '',
			'heading' =>  esc_html__( 'Content Width', 'walker' ),
			'param_name' => 'content_width',
			'value' => array(
				esc_html__( 'Full Width', 'walker' ) => 'full-width',
				esc_html__( 'In Grid', 'walker' ) => 'grid'
			)
		));

		vc_add_param("vc_row_inner", array(
			'type' => 'dropdown',
			'class' => '',
			'heading' =>  esc_html__( 'Full Screen Height', 'walker' ),
			'param_name' => 'full_screen_section_height',
			'value' => array(
				esc_html__( 'No', 'walker' ) => 'no',
				esc_html__( 'Yes', 'walker' ) => 'yes'
			),
			'save_always' => true,
			'dependency' => Array('element' => 'row_type', 'value' => array('parallax'))
		));

		vc_add_param('vc_row_inner', array(
			'type' => 'dropdown',
			'class' => '',
			'heading' =>  esc_html__( 'Vertically Align Content In Middle', 'walker' ),
			'param_name' => 'vertically_align_content_in_middle',
			'value' => array(
				esc_html__( 'No', 'walker' ) => 'no',
				esc_html__( 'Yes', 'walker' ) => 'yes'
			),
			'dependency' => array('element' => 'full_screen_section_height', 'value' => 'yes')
		));

		vc_add_param('vc_row_inner', array(
			'type' => 'textfield',
			'class' => '',
			'heading' =>  esc_html__( 'Section Height', 'walker' ),
			'param_name' => 'section_height',
			'value' => '',
			'dependency' => Array('element' => 'full_screen_section_height', 'value' => array('no'))
		));

		vc_add_param('vc_row_inner', array(
			'type' => 'attach_image',
			'class' => '',
			'heading' =>  esc_html__( 'Parallax Background image', 'walker' ),
			'value' => '',
			'param_name' => 'parallax_background_image',
			'description' => esc_html__( 'Please note that for parallax row type, background image from Design Options will not work so you should to fill this field', 'walker' ),
			'dependency' => Array('element' => 'row_type', 'value' => array('parallax'))
		));

		vc_add_param('vc_row_inner', array(
			'type' => 'textfield',
			'class' => '',
			'heading' =>  esc_html__( 'Parallax speed', 'walker' ),
			'param_name' => 'parallax_speed',
			'value' => '',
			'dependency' => Array('element' => 'row_type', 'value' => array('parallax'))
		));
		vc_add_param('vc_row_inner', array(
			'type' => 'dropdown',
			'class' => '',
			'heading' =>  esc_html__( 'Content Aligment', 'walker' ),
			'param_name' => 'content_aligment',
			'value' => array(
				esc_html__( 'Left', 'walker' ) => 'left',
				esc_html__( 'Center', 'walker' ) => 'center',
				esc_html__( 'Right', 'walker' ) => 'right'
			)
		));

		vc_add_param('vc_row_inner', array(
			'type' => 'dropdown',
			'heading' =>  esc_html__( 'CSS Animation', 'walker' ),
			'param_name' => 'css_animation',
			'admin_label' => true,
			'value' => $animations,
			'description' => '',
			'dependency' => Array('element' => 'row_type', 'value' => array('row'))
		));

		vc_add_param('vc_row_inner', array(
			'type' => 'textfield',
			'heading' =>  esc_html__( 'Transition delay (ms)', 'walker' ),
			'param_name' => 'transition_delay',
			'admin_label' => true,
			'value' => '',
			'description' => '',
			'dependency' => Array('element' => 'row_type', 'value' => array('row'))
		));
	}

	add_action('vc_after_init', 'walker_edge_vc_row_map');
}