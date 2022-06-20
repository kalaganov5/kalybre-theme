<?php

/**
 * Widget that adds separator boxes type
 *
 * Class Separator_Widget
 */
class WalkerEdgeClassSeparatorWidget extends WalkerEdgeClassWidget {
	/**
	 * Set basic widget options and call parent class construct
	 */
	public function __construct() {
		parent::__construct(
			'edgtf_separator_widget', // Base ID
			esc_html__( 'Walker Separator Widget', 'walker' ),
			array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'walker' ) )
		);
		
		$this->setParams();
	}
	
	/**
	 * Sets widget options
	 */
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'title'   => esc_html__( 'Type', 'walker' ),
				'name'    => 'type',
				'options' => array(
					'normal'     => esc_html__( 'Normal', 'walker' ),
					'full-width' => esc_html__( 'Full Width', 'walker' )
				)
			),
			array(
				'type'    => 'dropdown',
				'title'   => esc_html__( 'Position', 'walker' ),
				'name'    => 'position',
				'options' => array(
					'center' => esc_html__( 'Center', 'walker' ),
					'left'   => esc_html__( 'Left', 'walker' ),
					'right'  => esc_html__( 'Right', 'walker' )
				)
			),
			array(
				'type'    => 'dropdown',
				'title'   => esc_html__( 'Style', 'walker' ),
				'name'    => 'border_style',
				'options' => array(
					'solid'  => esc_html__( 'Solid', 'walker' ),
					'dashed' => esc_html__( 'Dashed', 'walker' ),
					'dotted' => esc_html__( 'Dotted', 'walker' )
				)
			),
			array(
				'type'  => 'textfield',
				'title' => esc_html__( 'Color', 'walker' ),
				'name'  => 'color'
			),
			array(
				'type'        => 'textfield',
				'title'       => esc_html__( 'Width', 'walker' ),
				'name'        => 'width'
			),
			array(
				'type'        => 'textfield',
				'title'       => esc_html__( 'Thickness (px)', 'walker' ),
				'name'        => 'thickness'
			),
			array(
				'type'        => 'textfield',
				'title'       => esc_html__( 'Top Margin', 'walker' ),
				'name'        => 'top_margin'
			),
			array(
				'type'        => 'textfield',
				'title'       => esc_html__( 'Bottom Margin', 'walker' ),
				'name'        => 'bottom_margin'
			)
		);
	}
	
	/**
	 * Generates widget's HTML
	 *
	 * @param array $args args from widget area
	 * @param array $instance widget's options
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		
		//prepare variables
		$params = '';
		
		//is instance empty?
		if ( is_array( $instance ) && count( $instance ) ) {
			//generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
		}
		
		echo '<div class="widget edgtf-separator-widget">';
		echo do_shortcode( "[edgtf_separator $params]" ); // XSS OK
		echo '</div>'; //close div.edgtf-separator-widget
	}
}