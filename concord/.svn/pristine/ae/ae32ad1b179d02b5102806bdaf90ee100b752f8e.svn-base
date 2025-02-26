<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://concord.tech
 * @since             1.0.0
 * @package           Concord
 *
 * @wordpress-plugin
 * Plugin Name:       Concord – Cookie Banner & Full Privacy Platform for Cookie Consent & GDPR/CCPA Compliance
 * Plugin URI:        https://www.concord.tech
 * Description:       Concord’s easy-to-use data privacy platform helps companies build trust and stay compliant with global data privacy laws like GDPR and CCPA.
 * Version:           1.0.0
 * Author:            Concord
 * Author URI:        https://concord.tech
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       concord
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
define( 'CONCORD_VERSION', '1.0.0' );
define( 'CONCORD_PATH', plugin_dir_path( __FILE__ ) );
define( 'CONCORD_URL', plugin_dir_url( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-concord-activator.php
 */
function concord_activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-concord-activator.php';
	Concord_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-concord-deactivator.php
 */
function concord_deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-concord-deactivator.php';
	Concord_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'concord_activate' );
register_deactivation_hook( __FILE__, 'concord_deactivate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-concord.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function concord_run() {

	$plugin = new Concord();
	$plugin->run();

}
concord_run();
