<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.facebook.com/sahilgulati007/
 * @since             1.0.0
 * @package           Integration_Nummuspay
 *
 * @wordpress-plugin
 * Plugin Name:       Integration for Nummuspay
 * Plugin URI:        http://sgtechcoder.com/
 * Description:       A plugin to integreate nummuspay payment gateway with woocommerce.
 * Version:           1.0.0
 * Author:            Sahil Gulati
 * Author URI:        https://www.facebook.com/sahilgulati007/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       integration-nummuspay
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'INTEGRATION_NUMMUSPAY_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-integration-nummuspay-activator.php
 */
function activate_integration_nummuspay() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-integration-nummuspay-activator.php';
	Integration_Nummuspay_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-integration-nummuspay-deactivator.php
 */
function deactivate_integration_nummuspay() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-integration-nummuspay-deactivator.php';
	Integration_Nummuspay_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_integration_nummuspay' );
register_deactivation_hook( __FILE__, 'deactivate_integration_nummuspay' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-integration-nummuspay.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_integration_nummuspay() {

	$plugin = new Integration_Nummuspay();
	$plugin->run();

}
run_integration_nummuspay();

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    //plugin is activated
} else {
	add_action( 'admin_notices', 'integration_nummuspay_notice' );
}

function integration_nummuspay_notice() {
  ?>
  <div class="update-nag notice">
      <p><?php _e( 'Please install WooCommerce, it is required for this plugin to work properly! Nummuspay Integration', 'integration_nummuspay' ); ?></p>
  </div>
  <?php
}

add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'integration_nummuspay_add_plugin_page_settings_link');
function integration_nummuspay_add_plugin_page_settings_link( $links ) {
	$links[] = '<a href="' .
		admin_url( 'options-general.php?page=integration-nummuspay' ) .
		'">' . __('Settings') . '</a>';
	return $links;
}
