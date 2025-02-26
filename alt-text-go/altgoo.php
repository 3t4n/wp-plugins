<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://alttextgo.com
 * @since             1.0.0
 * @package           ALTGOO
 *
 * @wordpress-plugin
 * Plugin Name:       Alt Text Go
 * Description:       Generate alt text for images using ai
 * Version:           1.0.1
 * Author:            AltTextGo
 * Author URI:        https://alttextgo.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       alt-text-go
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
define( 'ALTGOO_VERSION', '1.0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-altgoo-activator.php
 */
function altgoo_activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-altgoo-activator.php';
	ALTGOO_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-altgoo-deactivator.php
 */
function altgoo_deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-altgoo-deactivator.php';
	ALTGOO_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'altgoo_activate' );
register_deactivation_hook( __FILE__, 'altgoo_deactivate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-altgoo.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function altgoo_run() {

	$plugin = new ALTGOO();
	$plugin->run();

}
altgoo_run();
