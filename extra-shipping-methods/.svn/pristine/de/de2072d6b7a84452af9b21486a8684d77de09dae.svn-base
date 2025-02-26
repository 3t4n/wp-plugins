<?php
/**
 * Plugin Name: Coffee Code - Extra Shipping Methods
 * Description: Coffee Code - A plugin to add an extra shipping method in WooCommerce.
 * Version: 1.1
 * Author: Coffee Code
 * Author URI: https://coffee-code.tech/
 * Version: 1.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * WC tested up to: 8.4.0
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.pt-br.html
 * Text Domain: extra-shipping-methods
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Load composer dependencies.
if ( file_exists( __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php' ) ) {
	require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
}

// Initialize the plugin and instantiate it.
CoffeCode\ExtraShippingMethods\Main::instance();
