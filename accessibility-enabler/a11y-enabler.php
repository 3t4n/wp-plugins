<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://hikeorders.com/accessibility_enabler/home/
 * @since             1.0.0
 * @package           A11y_Enabler
 *
 * @wordpress-plugin
 * Plugin Name:       Accessibility Enabler
 * Plugin URI:        https://hikeorders.com/accessibility_enabler/home/
 * Description:       This plugin increases compliance with WCAG 2.0 , ATAG 2.0 , ADA , & Section 508 without changing your website’s existing code
 * Version:           1.8.3
 * Author:            HikeOrders
 * Author URI:        https://hikeorders.com
 * License:           GPL-2.0+
 * License URI:       https://hikeorders.com/gnu-general-public-license/
 * Text Domain:       a11y-enabler
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
define( 'A11y_Enabler_VERSION', '1.8.3' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-a11y-enabler-activator.php
 */
function activate_A11y_Enabler() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-a11y-enabler-activator.php';
	A11y_Enabler_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-a11y-enabler-deactivator.php
 */
function deactivate_A11y_Enabler() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-a11y-enabler-deactivator.php';
	A11y_Enabler_Deactivator::deactivate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-a11y-enabler-deactivator.php
 */
function uninstall_A11y_Enabler() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-a11y-enabler-uninstall.php';
    A11y_Enabler_Uninstall::uninstall();
}



register_activation_hook( __FILE__, 'activate_A11y_Enabler' );
register_deactivation_hook( __FILE__, 'deactivate_A11y_Enabler' );
register_uninstall_hook( __FILE__, 'uninstall_A11y_Enabler' );







/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-a11y-enabler.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_A11y_Enabler() {

	$plugin = new A11y_Enabler();
	$plugin->run();

}
run_A11y_Enabler();
