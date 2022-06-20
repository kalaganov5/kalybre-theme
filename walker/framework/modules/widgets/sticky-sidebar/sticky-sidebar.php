<?php

class WalkerEdgeClassStickySidebar extends WalkerEdgeClassWidget {
	protected $params;
	
	public function __construct() {
		parent::__construct(
			'edgtf_sticky_sidebar', // Base ID
			esc_html__( 'Walker Sticky Sidebar', 'walker' ),
			array( 'description' => esc_html__( 'Use this widget to make the sidebar sticky. Drag it into the sidebar above the widget which you want to be the first element in the sticky sidebar.', 'walker' ), ) // Args
		);
		$this->setParams();
	}
	
	protected function setParams() {
		
	}
	
	public function widget( $args, $instance ) {
		echo '<div class="widget edgtf-widget-sticky-sidebar"></div>';
	}
}
