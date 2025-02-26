<?php
/**
 * Plugin Name: Autocomplete Orders Status for WooCommerce
 * Plugin URI: https://wordpress.org/plugins/advanced-autocomplete-orders-for-woocommerce
 * Description: Autocomplete WooCommerce Orders automatically and easily.
 * Version: 1.0.8
 * Author: HappyDevs
 * Author URI: https://happydevs.net/
 * Text Domain: advanced-autocomplete-orders-for-woocommerce
 * License:	GPL v2 or later
 * License URI:	https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path: /languages/
 *
 * WP Requirement & Test
 * Requires at least: 4.4
 * Tested up to: 6.7
 * Requires PHP: 5.6
 *
 * WC Requirement & Test
 * WC requires at least: 3.2
 * WC tested up to: 9.0
 *
 * @package AutoComplete_Orders
 */

defined( 'ABSPATH' ) || exit;

use Optemiz\AWO\AutoComplete_Orders;

if ( ! defined( 'HAWO_VERSION' ) ) {
	/**
	 * Plugin Version
	 * @var string
	 * @since 1.0.0
	 */
	define( 'HAWO_VERSION', '1.0.8' );
}

if ( ! defined( 'HAWO_FILE' ) ) {
    define( 'HAWO_FILE', __FILE__ );
}

if ( ! defined( 'HAWO_BASENAME' ) ) {
    define( 'HAWO_BASENAME', plugin_basename(__FILE__) );
}

if ( ! defined( 'HAWO_FILE_DIR' ) ) {
    define( 'HAWO_FILE_DIR', dirname( __FILE__ ) );
}

if ( ! defined( 'HAWO_PLUGIN_URL' ) ) {
    define( 'HAWO_PLUGIN_URL', plugins_url( '', HAWO_FILE ) );
}

if ( ! defined( 'HAWO_MIN_WC_VERSION' ) ) {
    /**
     * Minimum WooCommerce Version Supported
     *
     * @var string
     * @since 1.0.0
     */
    define( 'HAWO_MIN_WC_VERSION', '3.2' );
}

// Include the Plugin class.
if ( ! class_exists( 'Optemiz\AWO\AutoComplete_Orders' ) ) {
	require_once plugin_dir_path( __FILE__ ) . '/includes/AutoComplete_Orders.php';
}

/**
 * HPOS compatability.
 *
 * @since  1.0.0
 * @return void
 */
function hawo_hpos_compatibility() {
    if ( class_exists(\Automattic\WooCommerce\Utilities\FeaturesUtil::class) ) {
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
    }
}

add_action( 'before_woocommerce_init', 'hawo_hpos_compatibility' );


/**
 * Returns the main instance of AutoComplete_Orders.
 *
 * @return AutoComplete_Orders
 * @since 1.0.0
 */
function hawo_autocomplete_orders(): AutoComplete_Orders {
	return AutoComplete_Orders::instance();
}

if ( class_exists( 'Optemiz\AWO\AutoComplete_Orders' ) ) {
	/**
	 * Plugin class init
	 */
	function hawo_autocomplete_orders_init() {

		if ( ! class_exists( 'WooCommerce', false ) ) {
			return false;
		}

		load_plugin_textdomain( 'advanced-autocomplete-orders-for-woocommerce', false, plugin_dir_path( __FILE__ ) . 'languages' );

		$GLOBALS['hawo_autocomplete_orders'] = hawo_autocomplete_orders();
	}

	add_action( 'plugins_loaded', 'hawo_autocomplete_orders_init' );
}