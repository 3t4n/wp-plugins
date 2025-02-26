<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://dragwp.com
 * @since             1.0.0
 * @package           Affiliate_Notice_Manager
 *
 * @wordpress-plugin
 * Plugin Name:       Affiliate Notice Manager
 * Plugin URI:        https://dragwp.com/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.1
 * Author:            Drag WP
 * Author URI:        https://dragwp.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       affiliate-notice-manager
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
define( 'AFFILIATE_NOTICE_MANAGER_VERSION', '1.0.0' );
define( 'AFFILIATE_NOTICE_MANAGER_PATH', plugin_dir_path( __FILE__ ) );
define( 'AFFILIATE_NOTICE_MANAGER_URL', plugin_dir_url( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-affiliate-notice-manager-activator.php
 */
function activate_affiliate_notice_manager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-affiliate-notice-manager-activator.php';
	$activator = new Affiliate_Notice_Manager_Activator();
	$activator->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-affiliate-notice-manager-deactivator.php
 */
function deactivate_affiliate_notice_manager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-affiliate-notice-manager-deactivator.php';
	$deactivate = new Affiliate_Notice_Manager_Deactivator();
	$deactivate->deactivate(); 
}

register_activation_hook( __FILE__, 'activate_affiliate_notice_manager' );
register_deactivation_hook( __FILE__, 'deactivate_affiliate_notice_manager' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-affiliate-notice-manager.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_affiliate_notice_manager() {

	$plugin = new Affiliate_Notice_Manager();
	$plugin->run();

}
run_affiliate_notice_manager();
