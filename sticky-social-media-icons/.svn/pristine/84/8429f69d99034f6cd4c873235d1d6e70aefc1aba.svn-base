<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wpcodecrafter.com/
 * @since             1.0.0
 * @package           Sticky_Social_Media_Icons
 *
 * @wordpress-plugin
 * Plugin Name:       Sticky social media icons
 * Plugin URI:        https://www.youtube.com/channel/UCG76Sy9Zxb5N1Fga-aHhaMQ
 * Description:       This Plugin  allows you to add sticky social media icons on your website easily.
 * Version:           2.1
 * Author:            Hardik Chavada
 * Author URI:        https://wpcodecrafter.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sticky-social-media-icons
 * Domain Path:       /languages
 * Requires at least: 4.9
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
define( 'STICKY_SOCIAL_MEDIA_ICONS_VERSION', '2.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sticky-social-media-icons-activator.php
 */
function activate_sticky_social_media_icons() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sticky-social-media-icons-activator.php';
	Sticky_Social_Media_Icons_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sticky-social-media-icons-deactivator.php
 */
function deactivate_sticky_social_media_icons() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sticky-social-media-icons-deactivator.php';
	Sticky_Social_Media_Icons_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sticky_social_media_icons' );
register_deactivation_hook( __FILE__, 'deactivate_sticky_social_media_icons' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sticky-social-media-icons.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sticky_social_media_icons() {

	$plugin = new Sticky_Social_Media_Icons();
	$plugin->run();

}
run_sticky_social_media_icons();
