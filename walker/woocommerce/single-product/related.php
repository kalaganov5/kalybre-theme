<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>
	
	<div class="related products">
		
		<!-- this line of code is changed - begin -->
		<h2 class="edgtf-related-title">
			<span class="edgtf-related-left-part"><span></span></span>
			<span class="edgtf-related-text"><?php esc_html_e('Related Products', 'walker'); ?></span>
			<span class="edgtf-related-right-part"><span></span></span>
		</h2>
		<!-- this line of code is changed - end -->
		
		<?php woocommerce_product_loop_start(); ?>
		
		<?php foreach ( $related_products as $related_product ) : ?>
			
			<?php
			$post_object = get_post( $related_product->get_id() );
			
			setup_postdata( $GLOBALS['post'] =& $post_object );
			
			wc_get_template_part( 'content', 'product' ); ?>
		
		<?php endforeach; ?>
		
		<?php woocommerce_product_loop_end(); ?>
	
	</div>

<?php endif;

wp_reset_postdata();