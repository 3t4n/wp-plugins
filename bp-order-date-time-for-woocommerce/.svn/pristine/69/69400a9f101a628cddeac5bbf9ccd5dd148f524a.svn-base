<?php
/**
 * Plugin Name: Order Delivery Date Time & Pickup for WooCommerce
 * Plugin URI: https://wordpress.org/plugins/bp-order-date-time-for-woocommerce/
 * Author: Bright Plugins
 * Author URI: https://brightplugins.com
 * Description: During the checkout process, customers can effortlessly choose a delivery date and time for their orders.
 * Text Domain: wc-wdda-delivery-timeslots
 * Domain Path: /languages
 * Version: 1.0.1
 * Requires PHP: 7.2.0
 * Requires at least: 5.5.6
 * Tested up to: 6.7.2
 * WC tested up to: 9.4.3
 * Requires Plugins: woocommerce
 *
 * @package BP Delivery For Woocommerce
 */

defined( 'ABSPATH' ) or exit;
define( 'BDFW_PLUGIN_BASE', plugin_basename( __FILE__ ) );

if ( !file_exists( __DIR__ . "/vendor/autoload.php" ) ) {return;}
require_once __DIR__ . "/vendor/autoload.php";

use Bright_Delivery_for_Woocommerce\Api\HandlerCallback;

add_action( 'before_woocommerce_init', function () {
	if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
		\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
	}
} );
add_action( 'before_woocommerce_init', function() {
    if ( class_exists( '\Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'cart_checkout_blocks', __FILE__, false );
    }
} );
final class BDFW {

	/**
	 * @var mixed
	 */
	static $instance = null;
	/**
	 * @var mixed
	 */
	static $handler_callback = null;

	private function __construct() {

		define( 'BV_BDFW_ASSETS', plugins_url( '', __FILE__ ) . '/assets' );
		define( 'BV_BDFW_ASSETS_PATH', plugin_dir_path( __FILE__ ) . '/assets' );
		register_activation_hook( __FILE__, array( $this, 'activate_plugin' ) );
		//register_deactivation_hook( __FILE__, array( $this, 'deactivate_plugin' ) );
		
		$this->init_plugin();
	}

	/**
	 * Initialize the plugin
	 *
	 * @access public
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function init_plugin() {

		if ( !class_exists( 'Bright_Delivery_for_Woocommerce\Bootstrap' ) ) {return;}
		\Bright_Delivery_for_Woocommerce\Bootstrap::registerServices();
	}

	/**
	 * Run codes on Plugin activation
	 *
	 * @access public
	 * @static
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function activate_plugin() {
		$installed = get_option( 'bp_order_delivery_date_installed' );

		if ( !$installed ) {
			update_option( 'bp_order_delivery_date_installed', time() );
		}

		do_action( 'bp_order_delivery_date_activation' );
	}

	/**
	 * Check if WooCommerce plugin is installed
	 *
	 * @access public
	 * @static
	 * @since 1.0.0
	 *
	 * @return bool true if woocommerce is installed | false otherwise
	 */
	public static function woocommerce_installed() {

		self::$handler_callback = new HandlerCallback();

		$actived_plugins       = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );
		$woocommerce_installed = in_array( 'woocommerce/woocommerce.php', $actived_plugins, true );

		if ( !$woocommerce_installed ) {
			add_action( 'admin_notices', [self::$handler_callback, 'add_error_to_admin_notices'] );
			return false;
		}

		return true;
	}

	/**
	 * Run codes on Plugin deactivation
	 *
	 * @access public
	 * @static
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public static function deactivate_plugin() {
		Deactivate::start();
	}

	/**
	 * Initializes a singleton instance
	 *
	 * @access public
	 * @static
	 * @since 1.0.0
	 *
	 * @return $instance
	 */
	public static function init() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	
}
/**
 * Load Textdomain
 *
 * @access public
 * @since 1.0.0
 *
 * @return void
 */
function bdfw_load_text_domain(){
	
	load_plugin_textdomain(
			'wc-wdda-delivery-timeslots',
			false,
			basename( dirname( __FILE__ ) ) . '/languages'
		);
}
/**
 * Check if WooCommerce plugin is installed
 */
if ( !BDFW::woocommerce_installed() ) {
	return;
}

/**
 * Initializes the main plugin
 */
function BDFW_start() {
	return BDFW::init();
}

// kick-off the plugin
add_action( 'plugin_loaded', 'BDFW_start' );
add_action( 'init', 'bdfw_load_text_domain' );
