<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
if ( avan_getoption( 'avanwc2' ) ) {
	add_action('wp_enqueue_scripts', 'avuti_disable_woocommerce_fragmentation', 99);
}
function avuti_disable_woocommerce_fragmentation() {
	if(function_exists('is_woocommerce')) {
		wp_dequeue_script('wc-cart-fragments');
		wp_deregister_script('wc-cart-fragments');
	}
}

