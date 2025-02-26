<?php
/**
 * Plugin Name: Optimize AdScale Calls For WooCommerce
 * Description: A plugin to limit AdScale XHR requests, in case the WC cart hasn't changed. To be used with Adscales' official plugin : https://adscale.com/integrations/woocommerce/ 
 * Version: 0.3.1
 * Requires at least: 5.9
 * Requires PHP: 7.0
 * Tested up to: 6.4.2
 * Tags: woocommerce, adscale, xhr
 * Author: eddr
 * Contributors: eddr,secretchord
 * License: GPLv3 or later

 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

// Enqueue the script
function adscale_limit_enqueue_scripts() {
	
    wp_enqueue_script('adscale-limit-main', plugin_dir_url(__FILE__) . '/assets/js/main.js', [], time() . '1.0.0', false );
}

add_action( 'wp_enqueue_scripts', 'adscale_limit_enqueue_scripts', 1 );

/**
 * HPOS compatibility declaration
 * This plugin does not use WP default table by itself, nor any specific WC data specifically
 **/
add_action( 'before_woocommerce_init', 'adscale_limit_hpos_compatibility' );
function adscale_limit_hpos_compatibility() {
	
	if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
		
		\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
	}
}