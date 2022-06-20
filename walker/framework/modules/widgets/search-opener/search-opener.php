<?php

/**
 * Widget that adds search icon that triggers opening of search form
 */
class WalkerEdgeClassSearchOpener extends WalkerEdgeClassWidget {
	/**
	 * Set basic widget options and call parent class construct
	 */
	public function __construct() {
		parent::__construct(
			'edgtf_search_opener', // Base ID
			esc_html__( 'Walker Search Opener', 'walker' ),
			array( 'description' => esc_html__( 'Display a "search" icon that opens the search form', 'walker' ) )
		);
		
		$this->setParams();
	}
	
	/**
	 * Sets widget options
	 */
	protected function setParams() {
		$this->params = array(
			array(
				'name'  => 'search_icon_margin',
				'type'  => 'textfield',
				'title' => esc_html__( 'Search Icon Margin (top right bottom left)', 'walker' ),
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
		$search_type_class    = 'edgtf-search-opener';
		$search_opener_styles = array();
		
		if ( ! empty( $instance['search_icon_margin'] ) ) {
			$search_opener_styles[] = 'margin: ' . $instance['search_icon_margin'];
		}
		?>
		<a <?php walker_edge_inline_style( $search_opener_styles ); ?> <?php walker_edge_class_attribute( $search_type_class ); ?> href="javascript:void(0)">
            <span class="edgtf-search-opener-wrapper">
                <span class="edgtf-search-icon"></span>
            </span>
		</a>
	<?php }
}