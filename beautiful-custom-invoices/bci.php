<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://mokuapp.io
 * @since             1.0.0
 * @package           BCI
 *
 * @wordpress-plugin
 * Plugin Name:       Beautiful Custom Invoices
 * Plugin URI:        https://wordpress.org/plugins/beautiful-custom-invoices
 * Description:       Generate and send beautiful, custom invoices to your clients with ease
 * Version:           1.0.0
 * Author:            Moku
 * Author URI:        http://mokuapp.io/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bci
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
define( 'SERVERLESS_INVOICES_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bci-activator.php
 */
function activate_bci() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bci-activator.php';
	BCI_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bci-deactivator.php
 */
function deactivate_bci() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bci-deactivator.php';
	BCI_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bci' );
register_deactivation_hook( __FILE__, 'deactivate_bci' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bci.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bci() {

	$plugin = new BCI();
	$plugin->run();

}
run_bci();
