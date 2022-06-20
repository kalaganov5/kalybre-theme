<?php

class WalkerEdgeClassSideAreaOpener extends WalkerEdgeClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_side_area_opener', // Base ID
			esc_html__( 'Walker Side Area Opener', 'walker' ),
			array( 'description' => esc_html__( 'Display a "hamburger" icon that opens the side area', 'walker' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		
		$this->params = array(
			array(
				'type'  => 'textfield',
				'title' => esc_html__( 'Widget Title', 'walker' ),
				'name'  => 'widget_title'
			),
			array(
				'type'        => 'textfield',
				'title'       => esc_html__( 'Widget Title Color', 'walker' ),
				'name'        => 'widget_title_color',
				'description' => esc_html__( 'Define color for Side Area Title', 'walker' )
			),
			array(
				'type'  => 'textfield',
				'title' => esc_html__( 'Widget Title Margin (top right bottom left)', 'walker' ),
				'name'  => 'widget_title_margin'
			),
			array(
				'name'        => 'side_area_opener_icon_color',
				'type'        => 'textfield',
				'title'       => esc_html__( 'Icon Color', 'walker' ),
				'description' => esc_html__( 'Define color for Side Area opener icon', 'walker' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$sidearea_icon_title_styles = array();
		if ( ! empty( $instance['widget_title_margin'] ) ) {
			$sidearea_icon_title_styles[] = 'margin: ' . $instance['widget_title_margin'];
		}
		if ( ! empty( $instance['widget_title_color'] ) ) {
			$sidearea_icon_title_styles[] = 'color: ' . $instance['widget_title_color'];
		}
		$sidearea_icon_styles = array();
		if ( ! empty( $instance['side_area_opener_icon_color'] ) ) {
			$sidearea_icon_styles[] = 'background-color: ' . $instance['side_area_opener_icon_color'];
		}
		?>
		<a class="edgtf-side-menu-button-opener" href="javascript:void(0)">
			<?php if ( ! empty( $instance['widget_title'] ) && $instance['widget_title'] !== '' ) { ?>
				<h5 class="edgtf-side-menu-title" <?php walker_edge_inline_style( $sidearea_icon_title_styles ) ?>><?php echo wp_kses_post( $instance['widget_title'] ); ?></h5>
			<?php } ?>
			<span class="edgtf-side-menu-lines">
        		<span class="edgtf-side-menu-line edgtf-line-1" <?php walker_edge_inline_style( $sidearea_icon_styles ) ?>></span>
        		<span class="edgtf-side-menu-line edgtf-line-2" <?php walker_edge_inline_style( $sidearea_icon_styles ) ?>></span>
                <span class="edgtf-side-menu-line edgtf-line-3" <?php walker_edge_inline_style( $sidearea_icon_styles ) ?>></span>
        	</span>
		</a>
	
	<?php }
}