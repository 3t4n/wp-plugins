<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              activity-log.com
 * @since             1.0.0
 * @package           Admin_Email_Address_Changer
 *
 * @wordpress-plugin
 * Plugin Name:       Admin Email Address Changer
 * Plugin URI:        admin-email-address-changer
 * Description:       Change Admin Email directly from dashboard without email confirmation
 * Version:           1.0.2
 * Author:            SWIT & FreelancersTools (Ivica Delić)
 * Author URI:        activity-log.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       admin-email-address-changer
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
define( 'ADMIN_EMAIL_ADDRESS_CHANGER_VERSION', '1.0.2' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-admin-email-address-changer-activator.php
 */
function activate_admin_email_address_changer() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-admin-email-address-changer-activator.php';
	Admin_Email_Address_Changer_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-admin-email-address-changer-deactivator.php
 */
function deactivate_admin_email_address_changer() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-admin-email-address-changer-deactivator.php';
	Admin_Email_Address_Changer_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_admin_email_address_changer' );
register_deactivation_hook( __FILE__, 'deactivate_admin_email_address_changer' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-admin-email-address-changer.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_admin_email_address_changer() {

	$plugin = new Admin_Email_Address_Changer();
	$plugin->run();

}
run_admin_email_address_changer();
