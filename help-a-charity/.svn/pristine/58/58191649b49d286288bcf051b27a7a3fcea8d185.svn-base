<?php

/**
 * Plugin Name: Help a Charity
 * Description: A woocommerce extension to show donations.
 * Author: LV8
 * Version: 1.0
 * Text Domain: helpc
 */

// Define plugin constants
define('HELPC_URL', plugin_dir_url(__FILE__));
define('HELPC_PATH', plugin_dir_path(__FILE__));
define('HELPC_ADMIN_SLUG', 'helpc-settings');
define('HELPC_BASE', plugin_basename(__FILE__));

// includes
function HELPC_admin_init(){
	if ( class_exists( 'WooCommerce' ) ) {
		require HELPC_PATH . 'help-a-charity-settings.php';
		require HELPC_PATH . 'includes/helpc-class.php';
	}
}
add_action( 'init', 'HELPC_admin_init' );