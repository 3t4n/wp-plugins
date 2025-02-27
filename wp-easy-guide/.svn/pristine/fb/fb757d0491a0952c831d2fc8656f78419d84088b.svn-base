<?php
/**
 * Plugin Name: WP Easy Guide
 * Plugin URI: https://wpeg.detheme.com
 * Description: Improve user engagement by displaying in-app guided tours that help users perform tasks in your WordPress dashboard. Create an user journey in a quick and easy way.
 * Version: 1.0.0
 * Author: deTheme
 * Author URI: https://detheme.com
 * License: GPLv2 or later
 * Text Domain: wpeg
 *
 * @package envacout-form
 * @since 1.0.0
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'WPEG_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'WPEG_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

register_activation_hook( __FILE__, array( 'WPEG', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'WPEG', 'plugin_deactivation' ) );

if ( ! function_exists( 'is_plugin_active' ) ) {
	include_once ABSPATH . 'wp-admin/includes/plugin.php';
}

require_once WPEG_PLUGIN_DIR . 'class-wpeg.php';
require_once WPEG_PLUGIN_DIR . 'class-wpeg-lang.php';
add_action( 'init', array( 'WPEG', 'init' ), 0 );

require_once WPEG_PLUGIN_DIR . 'class-wpeg-rest-api.php';
add_action( 'rest_api_init', array( 'WPEG_REST_API', 'init' ) );

if ( is_admin() ) {
	require_once WPEG_PLUGIN_DIR . 'class-wpeg-admin.php';
	add_action( 'init', array( 'WPEG_Admin', 'init' ) );
	add_action( 'admin_init', array( 'WPEG_Admin', 'admin_init' ) );
	add_action( 'plugins_loaded', array( 'WPEG_Admin', 'plugins_loaded' ), 99 );

	include_once ABSPATH . 'wp-admin/includes/file.php';
	$files = list_files( WPEG_PLUGIN_DIR . 'compatibility' );
	foreach ( $files as $file ) {
		$pathinfo = pathinfo( $file );

		if ( 'php' === $pathinfo['extension'] ) {
			require_once $file;
		}
	}
}
