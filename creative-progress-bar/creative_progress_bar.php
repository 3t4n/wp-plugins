<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              #
 * @since             1.0.0
 * @package           Creative_progress_bar
 *
 * @wordpress-plugin
 * Plugin Name:       Creative Progress Bar
 * Plugin URI:        https://wordpress.org/plugins/creative-progress-bar
 * Description:       A creative Progress bar is a Creative with unique 6 different creative progress bar templates, add a creative progress bar in your page/post easily, responsive, full customize progress bar plugin for your WordPress website.
 * Version:           1.0.0
 * Author:            Rigal Patel
 * Author URI:        https://profiles.wordpress.org/rigal-patel/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       creative_progress_bar
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
define( 'CREATIVE_PROGRESS_BAR_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-creative_progress_bar-activator.php
 */
function activate_creative_progress_bar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-creative_progress_bar-activator.php';
	Creative_progress_bar_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-creative_progress_bar-deactivator.php
 */
function deactivate_creative_progress_bar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-creative_progress_bar-deactivator.php';
	Creative_progress_bar_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_creative_progress_bar' );
register_deactivation_hook( __FILE__, 'deactivate_creative_progress_bar' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-creative_progress_bar.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_creative_progress_bar() {

	$plugin = new Creative_progress_bar();
	$plugin->run();

}
run_creative_progress_bar();
