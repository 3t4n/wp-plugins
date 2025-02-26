<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://michalrobak.pl
 * @since             1.0.0
 * @package           Admin_Plugins_Description
 *
 * @wordpress-plugin
 * Plugin Name:       Admin Plugins Description
 * Plugin URI:        https://michalrobak.pl/admin-plugins-description
 * Description:       Add custom descriptions to plugins in your admin panel on the plugins page and have more control over your installed plugins.
 * Version:           1.0.0
 * Author:            Michał Robak
 * Author URI:        https://michalrobak.pl/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       admin-plugins-description
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
define( 'ADMIN_PLUGINS_DESCRIPTION_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-admin-plugins-description-activator.php
 */
function activate_admin_plugins_description() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-admin-plugins-description-activator.php';
	Admin_Plugins_Description_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-admin-plugins-description-deactivator.php
 */
function deactivate_admin_plugins_description() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-admin-plugins-description-deactivator.php';
	Admin_Plugins_Description_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_admin_plugins_description' );
register_deactivation_hook( __FILE__, 'deactivate_admin_plugins_description' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-admin-plugins-description.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_admin_plugins_description() {

	$plugin = new Admin_Plugins_Description();
	$plugin->run();

}
run_admin_plugins_description();
