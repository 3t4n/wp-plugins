<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://peprojects.nl
 * @since             1.0.0
 * @package           Apostle_Social_Wall
 *
 * @wordpress-plugin
 * Plugin Name:       Apostle Social Wall
 * Description:       Apostle Social Wall is a great plugin for adding the apostle connect social wall to your website.
 * Version:           1.0.0
 * Author:            Door PE Projects
 * Author URI:        https://peprojects.nl
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       apostle-social-wall
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
define( 'Apostle_Social_Wall_Version', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-apostle-social-wall-activator.php
 */
function activate_apostle_social_wall() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-apostle-social-wall-activator.php';
	Apostle_Social_Wall_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-apostle-social-wall-deactivator.php
 */
function deactivate_apostle_social_wall() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-apostle-social-wall-deactivator.php';
	Apostle_Social_Wall_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_apostle_social_wall' );
register_deactivation_hook( __FILE__, 'deactivate_apostle_social_wall' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-apostle-social-wall.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_apostle_social_wall() {

	$plugin = new Apostle_Social_Wall();
	$plugin->run();

}
run_apostle_social_wall();
