<?php

include_once get_stylesheet_directory() .'/framework/modules/woocommerce/woocommerce-functions.php';

if (walker_edge_is_woocommerce_installed()) {
	include_once get_stylesheet_directory().'/framework/modules/woocommerce/options-map/map.php';
	include_once get_stylesheet_directory().'/framework/modules/woocommerce/woocommerce-template-hooks.php';
	include_once get_stylesheet_directory().'/framework/modules/woocommerce/woocommerce-config.php';
}
