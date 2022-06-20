<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.

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

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

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


	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>


		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<?php
		do_action( 'woocommerce_before_add_to_cart_quantity' );

		woocommerce_quantity_input(
			array(
				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
				'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
			)
		);

		do_action( 'woocommerce_after_add_to_cart_quantity' );
		?>

		<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
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
