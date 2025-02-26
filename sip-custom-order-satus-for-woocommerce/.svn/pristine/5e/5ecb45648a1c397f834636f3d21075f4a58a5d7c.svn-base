<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://shopitpress.com/
 * @since             1.0.0
 * @package           Sip_Custom_Order_Satus_For_Woocommerce
 *
 * @wordpress-plugin
 * Plugin Name:       SIP Custom Order Satus for WooCommerce
 * Plugin URI:        https://shopitpress.com/plugins/sip-custom-order-satus-woocommerce/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.3
 * Author:            ShopItPress
 * Author URI:        https://shopitpress.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sip-custom-order-satus-for-woocommerce
 * Domain Path:       /languages
 * WC requires at least: 2.6.0
 * WC tested up to: 3.6.5
 * Last updated on: 10 Jul, 2019
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'SIP_COSWC_NAME', 'SIP Custom Order Satus for WooCommerce' );
define( 'SIP_COSWC_VERSION', '1.0.3' );
define( 'SIP_COSWC_PLUGIN_SLUG', 'sip-custom-order-satus-woocommerce' );
define( 'SIP_COSWC_BASENAME', plugin_basename( __FILE__ ) );
define( 'SIP_COSWC_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'SIP_COSWC_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );
define( 'SIP_COSWC_WEBURL', get_bloginfo( 'url' ));
define( 'SIP_COSWC_PLUGIN_PURCHASE_URL', 'https://shopitpress.com/plugins/sip-custom-order-satus-woocommerce/' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sip-custom-order-satus-for-woocommerce-activator.php
 */
function activate_sip_custom_order_satus_for_woocommerce() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sip-custom-order-satus-for-woocommerce-activator.php';
	Sip_Custom_Order_Satus_For_Woocommerce_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sip-custom-order-satus-for-woocommerce-deactivator.php
 */
function deactivate_sip_custom_order_satus_for_woocommerce() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sip-custom-order-satus-for-woocommerce-deactivator.php';
	Sip_Custom_Order_Satus_For_Woocommerce_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sip_custom_order_satus_for_woocommerce' );
register_deactivation_hook( __FILE__, 'deactivate_sip_custom_order_satus_for_woocommerce' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sip-custom-order-satus-for-woocommerce.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sip_custom_order_satus_for_woocommerce() {

	$plugin = new Sip_Custom_Order_Satus_For_Woocommerce();
	$plugin->run();

}
run_sip_custom_order_satus_for_woocommerce();