<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://technifyguru.com/
 * @since             1.0.0
 * @package           Tgqb
 *
 * @wordpress-plugin
 * Plugin Name:       TG Product Quantity Plus Minus Button
 * Plugin URI:        https://technifyguru.com/
 * Description:       This plugin adds quantity increment and decrement buttons for product quantity on product details and cart pages.
 * Version:           1.1.2
 * Author:            Technify Guru
 * Author URI:        https://technifyguru.com//
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tgqb
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
define( 'TGQB_VERSION', '1.1.2' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tgqb-activator.php
 */
function activate_tgqb() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tgqb-activator.php';
	Tgqb_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tgqb-deactivator.php
 */
function deactivate_tgqb() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tgqb-deactivator.php';
	Tgqb_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_tgqb' );
register_deactivation_hook( __FILE__, 'deactivate_tgqb' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-tgqb.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_tgqb() {

	$plugin = new Tgqb();
	$plugin->run();

}
run_tgqb();
