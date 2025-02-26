<?php
/*
Plugin Name: Add Free shipping text on Cart page 
Plugin URI: https://profiles.wordpress.org/kinjaldalwadi/#content-plugins
Description: Allow to add free shipping text on woocommerce cart page.
Version: 1.0
Author: Kinjal Dalwadi
Author URI: https://profiles.wordpress.org/kinjaldalwadi/
License: GPL2
*/

$wc_plugins = apply_filters('active_plugins', get_option('active_plugins'));
if (stripos(implode($wc_plugins), 'woocommerce.php')) {

	add_action( 'woocommerce_before_cart_table', 'wphead_cart_free_shipping_text' );
	/**
	 * Add "free shipping" text to WooCommerce cart page
	 *
	 */
	function wphead_cart_free_shipping_text() {
		echo '<div class="woocommerce-info">Free Shipping available from $299!</div>';
	}
}else{
	echo "WooCommerce is not activated";
}
?>
