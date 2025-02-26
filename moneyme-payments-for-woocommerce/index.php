<?php
/*
Plugin Name: MoneyMe Payments for WooCommerce
Description: Let your customers pay in installments with up to 60 months interest-free.
Version: 2.0.0
Tested up to: 5.8
Stable tag: 2.0.0
Author: MoneyMe
*/
require_once plugin_dir_path(__FILE__) . 'includes/functions.php';
require_once plugin_dir_path(__FILE__) . 'classes/MMEGateway.php';

// Make sure WooCommerce is active
// tv-21
if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	return;
}


function moneyme_add_to_gateways( $gateways ) {
	$gateways[] = 'MMEGateway';
	return $gateways;
}

function moneyme_payment_gateway_plugin_links( $links ) {

	$plugin_links = array(
		'<a href="' . admin_url( 'admin.php?page=wc-settings&tab=checkout&section=mme_gateway' ) . '">' . __( 'Configure', 'wc-gateway-offline' ) . '</a>'
	);

	return array_merge( $plugin_links, $links );
}
add_filter( 'woocommerce_payment_gateways', 'moneyme_add_to_gateways' );
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'moneyme_payment_gateway_plugin_links' );
add_action( 'plugins_loaded', 'moneyme_gateway_init', 11 );