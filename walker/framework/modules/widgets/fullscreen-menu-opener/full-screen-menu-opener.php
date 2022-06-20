<?php

class WalkerEdgeClassFullScreenMenuOpener extends WalkerEdgeClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_full_screen_menu_opener', // Base ID
			esc_html__( 'Walker Full Screen Menu Opener', 'walker' ),
			array( 'description' => esc_html__( 'Display a "hamburger" icon that opens the full screen menu area', 'walker' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		
		$this->params = array(
			array(
				'name'        => 'fullscreen_menu_opener_icon_color',
				'type'        => 'textfield',
				'title'       => esc_html__( 'Icon Color', 'walker' ),
				'description' => esc_html__( 'Define color for Side Area opener icon', 'walker' )
			),
			array(
				'name'    => 'fullscreen_menu_opener_predefined_icon_size',
				'type'    => 'dropdown',
				'title'   => esc_html__( 'Predefined Icon Size', 'walker' ),
				'options' => array(
					''       => esc_html__( 'Default', 'walker' ),
					'small'  => esc_html__( 'Small', 'walker' ),
					'normal' => esc_html__( 'Normal', 'walker' ),
					'medium' => esc_html__( 'Medium', 'walker' ),
					'large'  => esc_html__( 'Large', 'walker' )
				)
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$fullscreen_icon_styles = array();
		
		if ( ! empty( $instance['fullscreen_menu_opener_icon_color'] ) ) {
			$fullscreen_icon_styles[] = 'background-color: ' . $instance['fullscreen_menu_opener_icon_color'];
		}
		
		$icon_size = '';
		if ( walker_edge_options()->getOptionValue( 'fullscreen_menu_opener_predefined_icon_size' ) ) {
			$icon_size = walker_edge_options()->getOptionValue( 'fullscreen_menu_opener_predefined_icon_size' );
		}
		if ( ! empty( $instance['fullscreen_menu_opener_predefined_icon_size'] ) && $instance['fullscreen_menu_opener_predefined_icon_size'] !== '' ) {
			$icon_size = $instance['fullscreen_menu_opener_predefined_icon_size'];
		}
		?>
		<a href="javascript:void(0)" class="edgtf-fullscreen-menu-opener <?php echo esc_attr( $icon_size ); ?>">
        	<span class="edgtf-fullscreen-menu-button-wrapper">
        		<span class="edgt-fullscreen-menu-lines">
        			<span class="edgtf-fullscreen-menu-line edgtf-line-1" <?php walker_edge_inline_style( $fullscreen_icon_styles ) ?>></span>
        			<span class="edgtf-fullscreen-menu-line edgtf-line-2" <?php walker_edge_inline_style( $fullscreen_icon_styles ) ?>></span>
        			<span class="edgtf-fullscreen-menu-line edgtf-line-3" <?php walker_edge_inline_style( $fullscreen_icon_styles ) ?>></span>
        		</span>
        	</span>
		</a>
	<?php }
}