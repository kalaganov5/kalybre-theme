<?php/** * The template for displaying product content in the single-product.php template * * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php. * * HOWEVER, on occasion WooCommerce will need to update template files and you * (the theme developer) will need to copy the new files to your theme to * maintain compatibility. We try to do this as little as possible, but it does * happen. When this occurs the version of the template file will be bumped and * the readme will list any important changes. * * @see     https://docs.woocommerce.com/document/template-structure/ * @package WooCommerce\Templates * @version 3.6.0 */defined( 'ABSPATH' ) || exit;global $product;/** * Hook: woocommerce_before_single_product. * * @hooked woocommerce_output_all_notices - 10 */do_action( 'woocommerce_before_single_product' );if ( post_password_required() ) {	echo get_the_password_form(); // WPCS: XSS ok.	return;}$product_id = get_the_ID();$comments = get_comments([	'post_id' => $product_id,	'status' => 'approve']);?><div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>	<?php	/**	 * Hook: woocommerce_before_single_product_summary.	 *	 * @hooked woocommerce_show_product_sale_flash - 10	 * @hooked woocommerce_show_product_images - 20	 */	do_action( 'woocommerce_before_single_product_summary' );	?>	<div class="summary entry-summary">		<?php		/**		 * Hook: woocommerce_single_product_summary.		 *		 * @hooked woocommerce_template_single_title - 5		 * @hooked woocommerce_template_single_rating - 10		 * @hooked woocommerce_template_single_price - 10		 * @hooked woocommerce_template_single_excerpt - 20		 * @hooked woocommerce_template_single_add_to_cart - 30		 * @hooked woocommerce_template_single_meta - 40		 * @hooked woocommerce_template_single_sharing - 50		 * @hooked WC_Structured_Data::generate_product_data() - 60		 */		do_action( 'woocommerce_single_product_summary' );		?>		<div class="product__reviews previews">			<div class="previews__head">				<span>Reviews</span>				<a href="#">Add a review</a>			</div>			<?php if($comments){ ?>				<div class="previews__block">					<div class="previews__arrow previews__arrow_left">						<svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">							<path d="M8 2L3 7L8 12L7 14L0 7L7 0L8 2Z" fill="#D2D2D2"/>						</svg>					</div>					<div class="previews__arrow previews__arrow_right">						<svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">							<path d="M0 12L5 7L0 2L1 0L8 7L1 14L0 12Z" fill="#D2D2D2"/>						</svg>					</div>					<div class="previews__slider">						<?php foreach ($comments as $comment) {							$comment_stars = get_comment_meta($comment->comment_ID, 'rating'); ?>							<div class="previews__item" data-id="<?= $comment->comment_ID; ?>">								<div class="previews__item-head">									<div class="previews__item-name"><?= $comment->comment_author; ?></div>									<div class="previews__item-date"><?= date('F d, Y', strtotime($comment->comment_date)); ?></div>								</div>								<?php if($comment_stars){ ?>								<div class="previews__item-stars">									<?= str_repeat('<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.4155 4.82756L7.94421 4.32307L6.39245 1.17717C6.35007 1.09104 6.28034 1.02131 6.19421 0.97893C5.9782 0.872289 5.7157 0.961156 5.60769 1.17717L4.05593 4.32307L0.584642 4.82756C0.488939 4.84123 0.401439 4.88635 0.334446 4.95471C0.253457 5.03795 0.208827 5.14995 0.210366 5.26608C0.211904 5.38221 0.259483 5.49298 0.34265 5.57405L2.85417 8.02268L2.26081 11.4803C2.2469 11.5607 2.2558 11.6435 2.28651 11.7191C2.31721 11.7947 2.36849 11.8602 2.43454 11.9082C2.50058 11.9562 2.57875 11.9847 2.66017 11.9905C2.74159 11.9963 2.82301 11.9792 2.89519 11.941L6.00007 10.3086L9.10495 11.941C9.18972 11.9862 9.28816 12.0012 9.38249 11.9848C9.62038 11.9438 9.78034 11.7182 9.73933 11.4803L9.14597 8.02268L11.6575 5.57405C11.7259 5.50706 11.771 5.41956 11.7846 5.32385C11.8216 5.08459 11.6548 4.86311 11.4155 4.82756Z" fill="black"/></svg>', $comment_stars[0]); ?>								</div>								<?php } ?>								<div class="previews__item-text">									<?php 										$string = $comment->comment_content;										$string = substr($string, 0, 110);										echo $string;									?>								</div>							</div>						<?php } ?>					</div>				</div>				<div class="previews__popup mreviews">					<div class="previews__popup-block">						<div class="previews__popup-title">Review</div>						<div class="mreviews__load">													</div>						<div class="previews__popup-close">							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">								<path d="M3.60048 1.02911L12.0005 9.4291L20.4005 1.05456C20.5659 0.886279 20.7644 0.754146 20.9834 0.666517C21.2025 0.578888 21.4374 0.53767 21.6732 0.545469C22.1359 0.575415 22.572 0.772756 22.8998 1.10064C23.2277 1.42853 23.4251 1.86455 23.455 2.32729C23.4573 2.5548 23.4134 2.78042 23.3259 2.99045C23.2384 3.20047 23.1091 3.39054 22.9459 3.5491L14.5205 12L22.9459 20.4509C23.2768 20.7716 23.4601 21.2146 23.455 21.6727C23.4251 22.1355 23.2277 22.5715 22.8998 22.8994C22.572 23.2273 22.1359 23.4246 21.6732 23.4546C21.4374 23.4624 21.2025 23.4211 20.9834 23.3335C20.7644 23.2459 20.5659 23.1137 20.4005 22.9455L12.0005 14.5709L3.62593 22.9455C3.46054 23.1137 3.26204 23.2459 3.04297 23.3335C2.82389 23.4211 2.58902 23.4624 2.3532 23.4546C1.88184 23.43 1.43627 23.2317 1.10251 22.898C0.768751 22.5642 0.570467 22.1187 0.545931 21.6473C0.543628 21.4198 0.587565 21.1942 0.675076 20.9841C0.762587 20.7741 0.891849 20.584 1.05502 20.4255L9.48048 12L1.02957 3.5491C0.870989 3.3884 0.746432 3.19737 0.663335 2.98744C0.580239 2.77752 0.540309 2.55299 0.545931 2.32729C0.575877 1.86455 0.773218 1.42853 1.10111 1.10064C1.42899 0.772756 1.86501 0.575415 2.32775 0.545469C2.56173 0.534356 2.7955 0.571563 3.01447 0.654772C3.23344 0.737981 3.43292 0.865407 3.60048 1.02911Z" fill="#333333"/>							</svg>						</div>					</div>					<div class="previews__popup-bg"></div>				</div>			<?php } ?>			<div class="previews__popup addreviews">				<div class="previews__popup-block">					<div class="previews__popup-title">Add a review</div>					<div class="addreviews__form">						<div class="addreviews__row">							<label>Name</label>							<input type="text" name="name" placeholder="Valeria">						</div>						<div class="addreviews__row">							<label>Email</label>							<input type="text" name="email" placeholder="smirnovavaleriiia@gmail.ru">							<span>*Your email address will not be published</span>						</div>						<div class="addreviews__row addreviews__rating">							<label>Rating</label>							<div class="addreviews__rating-block">								<div class="addreviews__rating-input">									<input type="checkbox" name="rating" value="1">									<label></label>								</div>								<div class="addreviews__rating-input">									<input type="checkbox" name="rating" value="2">									<label></label>								</div>								<div class="addreviews__rating-input">									<input type="checkbox" name="rating" value="3">									<label></label>								</div>								<div class="addreviews__rating-input">									<input type="checkbox" name="rating" value="4">									<label></label>								</div>								<div class="addreviews__rating-input">									<input type="checkbox" name="rating" value="5">									<label></label>								</div>							</div>						</div>						<div class="addreviews__row">							<label>Review</label>							<textarea name="comment" placeholder="Everything is at wonderful quality! I will recommend it to my friends, thanks!"></textarea>						</div>						<div class="addreviews__button">							<a href="#" data-id="<?= $product_id; ?>">Submit</a>						</div>						<div class="addreviews__message"></div>					</div>					<div class="previews__popup-close">						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">							<path d="M3.60048 1.02911L12.0005 9.4291L20.4005 1.05456C20.5659 0.886279 20.7644 0.754146 20.9834 0.666517C21.2025 0.578888 21.4374 0.53767 21.6732 0.545469C22.1359 0.575415 22.572 0.772756 22.8998 1.10064C23.2277 1.42853 23.4251 1.86455 23.455 2.32729C23.4573 2.5548 23.4134 2.78042 23.3259 2.99045C23.2384 3.20047 23.1091 3.39054 22.9459 3.5491L14.5205 12L22.9459 20.4509C23.2768 20.7716 23.4601 21.2146 23.455 21.6727C23.4251 22.1355 23.2277 22.5715 22.8998 22.8994C22.572 23.2273 22.1359 23.4246 21.6732 23.4546C21.4374 23.4624 21.2025 23.4211 20.9834 23.3335C20.7644 23.2459 20.5659 23.1137 20.4005 22.9455L12.0005 14.5709L3.62593 22.9455C3.46054 23.1137 3.26204 23.2459 3.04297 23.3335C2.82389 23.4211 2.58902 23.4624 2.3532 23.4546C1.88184 23.43 1.43627 23.2317 1.10251 22.898C0.768751 22.5642 0.570467 22.1187 0.545931 21.6473C0.543628 21.4198 0.587565 21.1942 0.675076 20.9841C0.762587 20.7741 0.891849 20.584 1.05502 20.4255L9.48048 12L1.02957 3.5491C0.870989 3.3884 0.746432 3.19737 0.663335 2.98744C0.580239 2.77752 0.540309 2.55299 0.545931 2.32729C0.575877 1.86455 0.773218 1.42853 1.10111 1.10064C1.42899 0.772756 1.86501 0.575415 2.32775 0.545469C2.56173 0.534356 2.7955 0.571563 3.01447 0.654772C3.23344 0.737981 3.43292 0.865407 3.60048 1.02911Z" fill="#333333"/>						</svg>					</div>				</div>				<div class="previews__popup-bg"></div>			</div>		</div>	</div>	<?php	/**	 * Hook: woocommerce_after_single_product_summary.	 *	 * @hooked woocommerce_output_product_data_tabs - 10	 * @hooked woocommerce_upsell_display - 15	 * @hooked woocommerce_output_related_products - 20	 */	do_action( 'woocommerce_after_single_product_summary' );	?></div><?php do_action( 'woocommerce_after_single_product' ); ?><?php do_action( 'woocommerce_after_single_product_with_id', $product_id); ?>