<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

$product_delivery = get_field('delivery', 'option');

if ( ! empty( $product_tabs ) ) : ?>

	<div class="woocommerce-tabs wc-tabs-wrapper">
		<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
			<div class="tabs__item">
				<div class="tabs__head"><?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?> <span><svg width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.00002 0.200012L9.00002 6.20001L15 0.200012L17.4 1.40001L9.00002 9.80001L0.600021 1.40001L3.00002 0.200012Z" fill="#333333"/></svg></span></div>
				<div class="tabs__body">
				<?php
					if ( isset( $product_tab['callback'] ) ) {
						call_user_func( $product_tab['callback'], $key, $product_tab );
					}
				?>
				</div>		
			</div>
		<?php endforeach; ?>


		<?php if ($product_delivery): ?>
			<div class="tabs__item">
				<div class="tabs__head">Delivery <span><svg width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3.00002 0.200012L9.00002 6.20001L15 0.200012L17.4 1.40001L9.00002 9.80001L0.600021 1.40001L3.00002 0.200012Z" fill="#333333"/></svg></span></div>
				<div class="tabs__body del">
					<div class="del__row">
						<?php foreach ($product_delivery as $del): ?>
							<div class="del__col">
								<div class="del__item">
									<?php if($del['icon']): ?>
										<div class="del__icon">
											<img src="<?= $del['icon']; ?>" alt="<?= $del['title']; ?>">
										</div>
									<?php endif; ?>
									<div class="del__text">
										<?php if($del['title']): ?>
											<div class="del__title"><?= $del['title']; ?></div>
										<?php endif; ?>
										<?= $del['text']; ?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php do_action( 'woocommerce_product_after_tabs' ); ?>
	</div>

<?php endif; ?>
