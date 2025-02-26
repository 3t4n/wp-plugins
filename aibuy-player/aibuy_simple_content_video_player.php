<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/billizzard
 * @since             1.0.0
 * @package           Aibuy_simple_content_video_player
 *
 * @wordpress-plugin
 * Plugin Name:       AIBuy Simple Content Video Player
 * Plugin URI:        https://github.com/billizzard/aibuy_simple_content_video_player
 * Description:       This plugin adds a button to the content panel to insert video
 * Version:           1.0.0
 * Author:            Hmylko Vladimir
 * Author URI:        https://github.com/billizzard
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       aibuy_simple_content_video_player
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
define( 'AIBUY_SIMPLE_CONTENT_VIDEO_PLAYER', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-aibuy_simple_content_video_player-activator.php
 */
function activate_aibuy_simple_content_video_player() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-aibuy_simple_content_video_player-activator.php';
	Aibuy_simple_content_video_player_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-aibuy_simple_content_video_player-deactivator.php
 */
function deactivate_aibuy_simple_content_video_player() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-aibuy_simple_content_video_player-deactivator.php';
	Aibuy_simple_content_video_player_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_aibuy_simple_content_video_player' );
register_deactivation_hook( __FILE__, 'deactivate_aibuy_simple_content_video_player' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-aibuy_simple_content_video_player.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_aibuy_simple_content_video_player() {

	$plugin = new Aibuy_simple_content_video_player();
	$plugin->run();

}
run_aibuy_simple_content_video_player();
