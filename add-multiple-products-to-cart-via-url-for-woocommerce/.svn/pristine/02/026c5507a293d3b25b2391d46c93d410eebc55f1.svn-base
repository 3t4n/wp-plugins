<?php
/**
 * Plugin Name: Add Multiple Products to Cart via URL for WooCommerce
 * Description: Add multiple products to WooCommerce cart with native add-to-cart parameters.
 * Version: 1.0
 * Requires at least: 5.0
 * Requires PHP: 7.4
 * Author: Alvaro Vasconcelos <contact@alvsconcelos.dev>
 * Author URI: https://alvsconcelos.dev
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: add-multiple-product-wc-cart
 * Domain Path: /languages
 *
 * @package         Add_Multiple_Product_Wc_Cart
 */

defined( 'ABSPATH' ) || exit;

define( 'ALVSAMTW_ADD_MULTIPLE_TO_WC_CART_URL_VERSION', '1.0.0' );
define( 'ALVSAMTW_ADD_MULTIPLE_TO_WC_CART_URL_PLUGIN_FILE', __FILE__ );
define( 'ALVSAMTW_ADD_MULTIPLE_TO_WC_CART_URL_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

if ( ! class_exists( 'Alvsamtw_Add_Multiple_To_Wc_Cart' ) ) {
	include_once __DIR__ . '/includes/class-alvsamtw-add-multiple-to-wc-cart.php';

	add_action( 'plugins_loaded', array( 'Alvsamtw_Add_Multiple_To_Wc_Cart', 'init' ) );
}
