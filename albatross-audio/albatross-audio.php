<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.badlittlerobot.com
 * @since             1.0.0
 * @package           Albatross_Audio
 *
 * @wordpress-plugin
 * Plugin Name:       Albatross Audio
 * Plugin URI:        https://www.badlittlerobot.com
 * Description:       Playlist functionality coupled with a stylish, responsive audio player. Empowering effortless creation and management of songs and playlists.
 * Version:           1.0.4
 * Author:            Bad Little Robot
 * Author URI:        https://www.badlittlerobot.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       albatross-audio
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'ALBATROSS_AUDIO_VERSION', '1.0.4' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-albatross-audio-activator.php
 */
function albaau_activate_albatross_audio() {
	require_once plugin_dir_path( __FILE__ ) . 'inc/class-albatross-audio-activator.php';
	Albatross_Audio_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-albatross-audio-deactivator.php
 */
function albaau_deactivate_albatross_audio() {
	require_once plugin_dir_path( __FILE__ ) . 'inc/class-albatross-audio-deactivator.php';
	Albatross_Audio_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'albaau_activate_albatross_audio' );
register_deactivation_hook( __FILE__, 'albaau_deactivate_albatross_audio' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'inc/class-albatross-audio.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function albaau_run_albatross_audio() {

	$plugin = new Albatross_Audio();
	$plugin->run();

}
albaau_run_albatross_audio();