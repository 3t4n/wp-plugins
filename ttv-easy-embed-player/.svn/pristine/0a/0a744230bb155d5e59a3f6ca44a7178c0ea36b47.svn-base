<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.streamweasels.com
 * @since             1.0.0
 * @package           Streamweasels_Player_Pro
 *
 * @wordpress-plugin
 * Plugin Name:       Streamweasels Twitch Integration - Player Add-on
 * Plugin URI:        https://www.streamweasels.com
 * Description:       This is an add-on plugin for StreamWeasels Twitch Integration that enables the Player layout.
 * Version:           2.1.3
 * Author:            StreamWeasels
 * Author URI:        https://www.streamweasels.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       streamweasels-player-pro
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
define( 'STREAMWEASELS_PLAYER_PRO_VERSION', '2.1.3' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-streamweasels-player-pro-activator.php
 */
function activate_streamweasels_player_pro() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-streamweasels-player-pro-activator.php';
	Streamweasels_Player_Pro_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-streamweasels-player-pro-deactivator.php
 */
function deactivate_streamweasels_player_pro() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-streamweasels-player-pro-deactivator.php';
	Streamweasels_Player_Pro_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_streamweasels_player_pro' );
register_deactivation_hook( __FILE__, 'deactivate_streamweasels_player_pro' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-streamweasels-player-pro.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_streamweasels_player_pro() {

	$plugin = new Streamweasels_Player_Pro();
	$plugin->run();

}

// Get the plugin data of the target plugins
$free_plugin_slug = 'streamweasels-twitch-integration';
$pro_plugin_slug = 'streamweasels-twitch-integration-pro';
$streamweasels_active = false;
$free_plugin_check = false;
$pro_plugin_check = false;
$free_plugin_version = false;
$pro_plugin_version = false;

if (!function_exists('is_plugin_active')) {
    // Include the necessary WordPress core file
    require_once(ABSPATH . 'wp-admin/includes/plugin.php');
}

// Retrieve the version of the free plugin
if (is_plugin_active($free_plugin_slug . '/streamweasels.php')) {
	$free_plugin_path = WP_PLUGIN_DIR . '/' . $free_plugin_slug . '/streamweasels.php';
	$free_plugin_data = get_plugin_data($free_plugin_path);
	$free_plugin_version = $free_plugin_data['Version'];
}

// Retrieve the version of the pro plugin
if (is_plugin_active($pro_plugin_slug . '/streamweasels.php')) {
	$pro_plugin_path = WP_PLUGIN_DIR . '/' . $pro_plugin_slug . '/streamweasels.php';
	$pro_plugin_data = get_plugin_data($pro_plugin_path);
	$pro_plugin_version = $pro_plugin_data['Version'];
}

if ($free_plugin_version || $pro_plugin_version) {
	$streamweasels_active = true;
}

if ($free_plugin_version && version_compare($free_plugin_version, '1.6.0', '>=')) {
	$free_plugin_check = true;
}

if ($pro_plugin_version && version_compare($pro_plugin_version, '1.6.0', '>=')) {
	$pro_plugin_check = true;
}

function ttv_player_display_admin_upsell() {
	echo '<div class="notice is-dismissible swti-notice">';
	echo '<div class="swti-notice__content">';
	echo '<h2>"StreamWeasels Twitch Integration - Player Add-on" has been moved into the main plugin and can safely be disabled!</h2>';
	echo '<p>The latest update for StreamWeasels Twitch Integration (1.6+) has absorbed the Twitch Player Add-on, meaning you can now safely disable the Twitch Player Add-on plugin and your Twitch Player will be unaffected.</p>';
    echo '<form method="post">';
	echo '<input type="hidden" name="disable_plugin_player" value="1" />';
    echo '<button type="submit" class="button">Disable Twitch Rail Add-on</button>';
    echo '</form>';
	echo '</div>';
	echo '</div>';
}

function ttv_player_handle_disable_button() {
    if (isset($_POST['disable_plugin_player']) && $_POST['disable_plugin_player'] === '1') {
        // Disable the plugin
        deactivate_plugins(plugin_basename(__FILE__));
        // Optionally, you can perform additional cleanup or actions when the plugin is disabled
    }
}

// Perform conditional operations based on the plugin version
if ($free_plugin_check || $pro_plugin_check) {
	add_action( 'admin_notices', 'ttv_player_display_admin_upsell' );
	add_action( 'admin_init', 'ttv_player_handle_disable_button' );
} else {
    run_streamweasels_player_pro();
}