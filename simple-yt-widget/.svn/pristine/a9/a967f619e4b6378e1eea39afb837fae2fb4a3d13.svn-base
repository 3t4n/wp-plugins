<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.youtube.com/channel/UCtfzwnao4xpOg8d9vnZSSpw
 * @since             1.0.0
 * @package           Syt_Widgets
 *
 * @wordpress-plugin
 * Plugin Name:       Simple YT Widget
 * Plugin URI:        https://www.youtube.com/channel/UCtfzwnao4xpOg8d9vnZSSpw
 * Description:       Simple plugin that adds a customizable YouTube Channel widget to your website. 
 * Version:           1.0.0
 * Author:            WP Plugin Boss
 * Author URI:        https://github.com/WPPBoss
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       syt-widgets
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
define( 'SYT_WIDGETS_VERSION', '1.0.0' );
define( 'SYT_WIDGETS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'SYT_WIDGETS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-syt-widgets-activator.php
 */
function activate_syt_widgets() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-syt-widgets-activator.php';
	Syt_Widgets_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-syt-widgets-deactivator.php
 */
function deactivate_syt_widgets() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-syt-widgets-deactivator.php';
	Syt_Widgets_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_syt_widgets' );
register_deactivation_hook( __FILE__, 'deactivate_syt_widgets' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-syt-widgets.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_syt_widgets() {

	$plugin = new Syt_Widgets();
	$plugin->run();

}

run_syt_widgets();