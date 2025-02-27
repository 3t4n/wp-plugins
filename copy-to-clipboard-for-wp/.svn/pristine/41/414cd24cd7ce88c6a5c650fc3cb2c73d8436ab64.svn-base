<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/noruzzamanrubel
 * @since             1.0.0
 * @package           Catcwp
 *
 * @wordpress-plugin
 * Plugin Name:       Copy to Clipboard for WordPress
 * Plugin URI:        https://wordpress.org/plugins/copy-to-clipboard-for-wp/
 * Description:       Copy to Clipboard for WordPress is a powerful and user-friendly plugin designed to enhance the copy-and-paste functionality on your WordPress website.
 * Version:           1.8.0
 * Author:            Noruzzaman
 * Author URI:        https://github.com/noruzzamans
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       catcwp
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
define( 'CATCWP_VERSION', '1.8.0' );
define( 'CATCWP_PATH', plugin_dir_path( __FILE__ ) );
define( 'CATCWP_URL', plugin_dir_url( __FILE__ ) );
define( 'CATCWP_NAME', 'catcwp' );
define( 'CATCWP_FULL_NAME', 'Copy to Clipboard for WordPress' );
define( 'CATCWP_BASE_NAME', plugin_basename( __FILE__ ) );



/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-catcwp-activator.php
 */
function catcwp_activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-catcwp-activator.php';
	Catcwp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-catcwp-deactivator.php
 */
function catcwp_deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-catcwp-deactivator.php';
	Catcwp_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'catcwp_activate' );
register_deactivation_hook( __FILE__, 'catcwp_deactivate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-catcwp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_catcwp() {

	$plugin = new Catcwp();
	$plugin->run();

}
run_catcwp();

require_once plugin_dir_path( __FILE__ ) . 'widgets/catcwp-widget.php';
require_once plugin_dir_path( __FILE__ ) . 'functions.php';