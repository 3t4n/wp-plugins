<?php

/**
 * Plugin Name:       EnvyNotifs
 * Plugin URI:        https://wordpress.org/plugins/envynotifs
 * Description:       All-in-One Notification Management WordPress Plugin.
 * Version:           1.1
 * Author:            EnvyTheme
 * Author URI:        https://envytheme.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       envy-notifs
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.1 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ENVY_NOTIFS_VERSION', '1.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-envy-notifs-activator.php
 */
function envy_notifs_activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-envy-notifs-activator.php';
	Envy_Notifs_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-envy-notifs-deactivator.php
 */
function envy_notifs_deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-envy-notifs-deactivator.php';
	Envy_Notifs_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'envy_notifs_activate' );
register_deactivation_hook( __FILE__, 'envy_notifs_deactivate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-envy-notifs.php';

// Include Plugin Options
require plugin_dir_path( __FILE__ ) . 'includes/class-envy-notifs-global-options.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-envy-notifs-post-options.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.1
 */
function envy_notifs_run() {

	$plugin = new Envy_Notifs();
	$plugin->run();

}
envy_notifs_run();
