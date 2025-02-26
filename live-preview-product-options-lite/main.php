<?php
/*
 * Plugin Name: Live Preview - Product Options - Lite
 * Description: Add text and symbols to products with Live Preview.
 * Author URI: https://sahu.media
 * Version: 1.1.3
 * Domain Path: /languages
 *
 * Text Domain: sahu_live_product_options_lite
 * @package sahu_live_product_options_lite
 * @copyright Copyright (c) 2020, SAHU MEDIA®
 *
 */

 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


if ( is_plugin_active( 'live-product-options-sahu/main.php' ) ) {
	
	add_action('admin_notices', 'sahu_live_product_options_lite_admin_notice');
    function sahu_live_product_options_lite_admin_notice(){

         echo __( '<div class="error">
				<p>Du hast die PRO-Version von Live-Produkt Options installiert, daher deaktivieren wir die "Lite-Version" von Live-Produkt Options</p>
			   </div>', 'sahu_live_product_options_lite' );
	}
	
	deactivate_plugins( 'live-product-options-sahu-lite/main.php' );
}
	 
// Erstelle Administrativeoberfläche

include 'includes/admin/function_admin.php';

// Lade WooCommerce Optionen

include 'includes/woocommerce/function.php';
include 'includes/woocommerce/function_checkout.php';

// Lade CSS & Javascript Funktionen

include 'includes/default_functions.php';
include 'includes/shortcode_inc.php';
