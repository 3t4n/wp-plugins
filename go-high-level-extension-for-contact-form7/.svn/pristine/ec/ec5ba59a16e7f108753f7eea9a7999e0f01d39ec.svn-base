<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.ibsofts.com
 * @since             1.0.2
 * @package           GHLCF7
 *
 * @wordpress-plugin
 * Plugin Name:       GHL Contact Bridge – Send Contact Form 7 leads to GHL CRM
 * Plugin URI:        https://www.ibsofts.com/plugins/go-high-level-extension-for-contact-form7
 * Description:       This plugin send Contact Form 7 Data to Go High Level on form submission.
 * Version:           1.0.2
 * Author:            iB Softs
 * Author URI:        https://www.ibsofts.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       go-high-level-extension-for-contact-form7
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.2 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'GHLCF7_VERSION', '1.0.2' );
define( 'GHLCF7_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'GHLCF7_LOCATION_CONNECTED', false );
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ghl-connect-activator.php
 */
if ( ! function_exists( 'ghlcf7_activate' ) ) {
	function ghlcf7_activate() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-ghl-cf7-activator.php';
		GHLCF7_Activator::activate();
	}
	register_activation_hook( __FILE__, 'ghlcf7_activate' );
}
/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ghl-cf7-deactivator.php
 */
if ( ! function_exists( 'ghlcf7_deactivate' ) ) {
	function ghlcf7_deactivate() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-ghl-cf7-deactivator.php';
		GHLCF7_Deactivator::deactivate();
	}
	register_deactivation_hook( __FILE__, 'ghlcf7_deactivate' );
}



/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ghl-cf7.php';
/**
 * Inclusion of definitions.php
 */
require_once plugin_dir_path( __FILE__ ) . 'definitions.php';
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.2
 */
if ( ! function_exists( 'ghlcf7_run' ) ) {
	function ghlcf7_run() {

		$plugin = new GHLCF7();
		$plugin->run();

	}
	ghlcf7_run();
}