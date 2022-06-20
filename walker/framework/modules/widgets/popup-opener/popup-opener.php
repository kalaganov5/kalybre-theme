<?php

/**
 * Widget that adds popup icon that triggers opening of popup form
 */
class WalkerEdgeClassEdgefPopupOpener extends WalkerEdgeClassWidget {
	public function __construct() {
		parent::__construct(
			'edgtf_popup_opener', // Base ID
			esc_html__( 'Walker Pop-up Opener', 'walker' ),
			array( 'description' => esc_html__( 'Display a "pop-up" icon that opens the pop-up area', 'walker' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		
		$this->params = array(
			array(
				'name'        => 'popup_opener_text',
				'type'        => 'textfield',
				'title'       => esc_html__( 'Pop-up Opener Text', 'walker' ),
				'description' => esc_html__( 'Enter text for pop-up opener', 'walker' )
			),
			array(
				'name'        => 'popup_opener_color',
				'type'        => 'textfield',
				'title'       => esc_html__( 'Pop-up Opener Color', 'walker' ),
				'description' => esc_html__( 'Define color for pop-up opener', 'walker' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$popup_styles = array();
		$popup_text   = esc_html__( 'NEWSLETTER', 'walker' );
		
		if ( ! empty( $instance['popup_opener_color'] ) ) {
			$popup_styles[] = 'color: ' . $instance['popup_opener_color'];
		}
		if ( ! empty( $instance['popup_opener_text'] ) ) {
			$popup_text = $instance['popup_opener_text'];
		}
		?>
		<a class="edgtf-popup-opener" <?php walker_edge_inline_style( $popup_styles ) ?> href="javascript:void(0)">
			<span class="edgtf-popup-opener-text"><?php echo wp_kses_post( $popup_text ); ?></span>
		</a>
	<?php }
}