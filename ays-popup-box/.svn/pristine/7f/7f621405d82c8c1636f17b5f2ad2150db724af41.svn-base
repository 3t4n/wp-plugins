<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://ays-pro.com/
 * @since             1.0.0
 * @package           Ays_Pb
 *
 * @wordpress-plugin
 * Plugin Name:       Popup Box
 * Plugin URI:        http://ays-pro.com/index.php/wordpress/popup_box
 * Description:       Popup everything you want!! Just put any shortcode and enjoy it 
 * Version:           1.0.0
 * Author:            AYS Pro LLC
 * Author URI:        http://ays-pro.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ays-pb
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
define( 'AYS_PB_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ays-pb-activator.php
 */
function activate_ays_pb() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ays-pb-activator.php';
	Ays_Pb_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ays-pb-deactivator.php
 */
function deactivate_ays_pb() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ays-pb-deactivator.php';
	Ays_Pb_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ays_pb' );
register_deactivation_hook( __FILE__, 'deactivate_ays_pb' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ays-pb.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ays_pb() {

	$plugin = new Ays_Pb();
	$plugin->run();

}
run_ays_pb();
