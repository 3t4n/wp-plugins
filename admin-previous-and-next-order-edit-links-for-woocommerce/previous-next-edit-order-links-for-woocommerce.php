<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wpbelo.com/wordpress-development/
 * @since             1.0.1
 * @package           Previous_Next_Edit_Order_Links_For_Woocommerce
 *
 * @wordpress-plugin
 * Plugin Name:       Admin Previous and Next Order Edit Links for Woocommerce
 * Plugin URI:        https://wpbelo.com/wordpress-development/
 * Description:       This plugin enables you to quickly access and edit the next and previous orders. It saves times while processing orders in a sequence which boosts productivity.
  * Version:          1.0.2
 * Author:            WP-Belo  
 * Author URI:        https://wpbelo.com/wordpress-development/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       belo-prev-next-order-links-for-woocommerce
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

$apnfw_active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );
if ( is_multisite() ){
	$apnfw_active_plugins = array_merge( $apnfw_active_plugins, get_site_option( 'active_sitewide_plugins', array() ) );

}
	
$apnfw_required_plugins = array(
  "woocommerce/woocommerce.php"
);

foreach ($apnfw_required_plugins as $rp) {
    if ( ! in_array( $rp, $apnfw_active_plugins ) ) {
        return;
    }
}

/**
 * Currently plugin version.
 * Start at version 1.0.1 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PREVIOUS_NEXT_EDIT_ORDER_LINKS_FOR_WOOCOMMERCE_VERSION', '1.0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-previous-next-edit-order-links-for-woocommerce-activator.php
 */
function activate_previous_next_edit_order_links_for_woocommerce() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-previous-next-edit-order-links-for-woocommerce-activator.php';
	Previous_Next_Edit_Order_Links_For_Woocommerce_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-previous-next-edit-order-links-for-woocommerce-deactivator.php
 */
function deactivate_previous_next_edit_order_links_for_woocommerce() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-previous-next-edit-order-links-for-woocommerce-deactivator.php';
	Previous_Next_Edit_Order_Links_For_Woocommerce_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_previous_next_edit_order_links_for_woocommerce' );
register_deactivation_hook( __FILE__, 'deactivate_previous_next_edit_order_links_for_woocommerce' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-previous-next-edit-order-links-for-woocommerce.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.1
 */  
function run_previous_next_edit_order_links_for_woocommerce() {

	$plugin = new Previous_Next_Edit_Order_Links_For_Woocommerce();
	$plugin->run();

}
run_previous_next_edit_order_links_for_woocommerce();