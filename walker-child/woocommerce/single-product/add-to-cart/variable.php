<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.5
 */

defined( 'ABSPATH' ) || exit;

global $product;

/*$product_cat = wp_get_post_terms(get_the_ID(), 'product_cat');
$product_table = get_field('tables', 'product_cat_'.$product_cat[0]->term_id, $product_cat[0]->term_id);
$table_list = get_field($product_table, 'option');*/

$view_table_size = get_field('view_table_size', get_the_ID());
$product_table = get_field('tables', get_the_ID());

$categories = get_the_terms(get_the_ID(), 'product_cat');
$collection = [];
foreach ($categories as $key => $value) {
	if ($value->parent == 441) {
		$collection = $value;
	}
}

if (!empty($collection)) {

	$args = array("post_type"=>"product","product_cat"=>$collection->slug,"posts_per_page"=>20);
	$productsInCollection = get_posts($args);
}

$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php echo esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'woocommerce' ) ) ); ?></p>
	<?php else : ?>
		<table class="variations" cellspacing="0">
			<tbody>
				<?php foreach ( $attributes as $attribute_name => $options ) : ?>
					<tr style="min-width: 300px; max-width: 100%;">
						<td class="label">
							<label for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>"><?php echo wc_attribute_label( $attribute_name ); // WPCS: XSS ok. ?></label>
						</td>
						<td class="value">
							<?php
								wc_dropdown_variation_attribute_options(
									array(
										'options'   => $options,
										'attribute' => $attribute_name,
										'product'   => $product,
									)
								);
								echo end( $attribute_keys ) === $attribute_name ? wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'woocommerce' ) . '</a>' ) ) : '';
							?>
						</td>
						<?php if(!$view_table_size){ ?>
							<td class="sizetable__td">
								<a href="#" class="sizetable__button">Size table</a>
							</td>
						<?php } ?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php if (!empty($productsInCollection)): ?>
			<table class="variations product__color" cellspacing="0">
				<tbody>
					<tr style="min-width: 300px; max-width: 100%;">
						<td class="label">
							<label for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>">COLOR</label>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="colors">
				<?php foreach ($productsInCollection as $productInCollection): ?>
					<a class="colors__item <?=(($productInCollection->ID == get_the_ID())?'colors__item_active':'')?>" style="background-color: <?=get_field('color_product_color',$productInCollection->ID);?>" href="<?=get_permalink($productInCollection->ID);?>">
						<?php $img_bg = get_field('color_product',$productInCollection->ID); ?>
						<?php if ($img_bg): ?>
							<img src="<?=get_field('color_product',$productInCollection->ID)?>" alt="">
						<?php endif; ?>
					</a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>




		<div class="single_variation_wrap">
			<?php
				/**
				 * Hook: woocommerce_before_single_variation.
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
				 *
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				do_action( 'woocommerce_single_variation' );

				/**
				 * Hook: woocommerce_after_single_variation.
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php

if (!$view_table_size) {
	if (empty($product_table)) {
		$table_list = get_field('table_1', 'option');
	} else {
		$table_list = get_field($product_table, 'option');
	}

	if ($table_list) { ?>
	<div class="sizetable__popup">
		<div class="sizetable__popup-block">
			<div class="sizetable__popup-title">Size table</div>
			<div class="sizetable__popup-subtitle"><?= ($product_table == 'table_3' ? 'NOTE: due to fabric elasticity, measurements may be off by 2-3 cm' : 'NOTE: 1-3 CM difference within standard'); ?></div>
			<div class="sizetable__popup-preval">CM</div>
			<div class="sizetable__table">

				<table class="sizetable__table table table-bordered">
					<thead>
						<td>Size</td>
						<td>Length</td>
						<td>Chest 1/2</td>
						<td><?= ($product_table == 'table_3' ? 'Collar' : 'Shoulder'); ?></td>
						<td>Sleeve</td>
					</thead>
					<tbody>
						<?php foreach ($table_list as $item) { ?>
							<tr>
								<td><?= $item['size']; ?></td>
								<td><?= $item['length']; ?></td>
								<td><?= $item['chest_12']; ?></td>
								<td><?= $item['shoulder']; ?></td>
								<td><?= $item['sleeve']; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="sizetable__popup-close">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M3.59999 1.02911L12 9.4291L20.4 1.05456C20.5654 0.886279 20.7639 0.754146 20.983 0.666517C21.202 0.578888 21.4369 0.53767 21.6727 0.545469C22.1355 0.575415 22.5715 0.772756 22.8994 1.10064C23.2272 1.42853 23.4246 1.86455 23.4545 2.32729C23.4568 2.5548 23.4129 2.78042 23.3254 2.99045C23.2379 3.20047 23.1086 3.39054 22.9454 3.5491L14.52 12L22.9454 20.4509C23.2764 20.7716 23.4596 21.2146 23.4545 21.6727C23.4246 22.1355 23.2272 22.5715 22.8994 22.8994C22.5715 23.2273 22.1355 23.4246 21.6727 23.4546C21.4369 23.4624 21.202 23.4211 20.983 23.3335C20.7639 23.2459 20.5654 23.1137 20.4 22.9455L12 14.5709L3.62544 22.9455C3.46006 23.1137 3.26155 23.2459 3.04248 23.3335C2.82341 23.4211 2.58853 23.4624 2.35272 23.4546C1.88135 23.43 1.43578 23.2317 1.10202 22.898C0.768263 22.5642 0.569978 22.1187 0.545443 21.6473C0.54314 21.4198 0.587076 21.1942 0.674588 20.9841C0.762099 20.7741 0.891361 20.584 1.05453 20.4255L9.47999 12L1.02908 3.5491C0.870501 3.3884 0.745943 3.19737 0.662847 2.98744C0.579751 2.77752 0.539821 2.55299 0.545443 2.32729C0.575389 1.86455 0.772729 1.42853 1.10062 1.10064C1.42851 0.772756 1.86453 0.575415 2.32726 0.545469C2.56124 0.534356 2.79501 0.571563 3.01398 0.654772C3.23295 0.737981 3.43243 0.865407 3.59999 1.02911Z" fill="#333333"/>
				</svg>
			</div>
		</div>
		<div class="sizetable__popup-bg"></div>
	</div>
	<?php }}?>

	<style media="screen">
		.product__color{
			margin-top: 20px !important;
		}
		.colors{
			display: flex;
			margin-top: -17px;
			margin-bottom: 15px;
		}
		.colors__item{
			display: block;
			width: 48px;
			height: 48px;
			position: relative;
			margin-right: 8px;
		}
		.colors__item_active{
			outline: 1px solid #000;
		}
		.colors__item:not(.colors__item_active):hover{
			outline: 1px solid #333;
		}
		.colors__item img{
			display: block;
			width: 100%;
			height: 100%;
			position: absolute;
			top: 0;
			left: 0;
			object-fit: cover;
		}
	</style>


<?php
do_action( 'woocommerce_after_add_to_cart_form' );
