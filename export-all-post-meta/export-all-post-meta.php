<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://brainvire.com
 * @since             1.2.0
 * @package           export-all-post-meta
 *
 * @wordpress-plugin
 * Plugin Name: Export All Post Meta
 * Plugin URI: http://brainvire.com
 * Description: Export WordPress post with all serialized post meta in readable in CSV format.
 * Version: 1.2.1
 * Author: brainvireinfo
 * Author URI: http://brainvire.com
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: export-all-post-meta
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

include_once 'class-export-post.php';

$export_post = new brainspace\Export_Post();

/**
 *Add link for settings
*/
add_filter( 'plugin_action_links', 'eapm_admin_settings', 10, 4 );

/**
 * Add the Setting Links
 *
 * @since 1.2.0
 * @name eapm_admin_settings
 * @param array  $actions actions.
 * @param string $plugin_file plugin file name.
 * @return $actions
 * @author Brainvire <https://www.brainvire.com/>
 * @link https://www.brainvire.com/
 */
function eapm_admin_settings( $actions, $plugin_file ) {
	static $plugin;
	if ( ! isset( $plugin ) ) {
		$plugin = plugin_basename( __FILE__ );
	}
	if ( $plugin === $plugin_file ) {
		$settings = array();
		$settings['settings']         = '<a href="' . esc_url( admin_url( 'tools.php?page=eapm-export-posts' ) ) . '">' . esc_html__( 'Settings', 'export-all-post-meta' ) . '</a>';
		$actions                      = array_merge( $settings, $actions );
	}
	return $actions;
}
