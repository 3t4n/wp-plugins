<?php
/**
 * Disable WebP By Default
 *
 * @package disable-webp-by-default
 * @author David Baumwald <davidbaumwald>
 * @license GPLv2
 */

/**
 * Plugin Name: Disable WebP By Default
 * Author: David Baumwald
 * Description: A small plugin to disable WebP image creation on image upload by default.
 * Version: 0.7.0
 * License: MIT
 * Text Domain: disable-webp-by-default
 * Requires PHP: 7.0
 * Requires at least: 5.8
 */

// Bail early if accessed directly around WP.
defined( 'ABSPATH' ) || die( 'We\'re sorry, but you cannot directly access this file.' );

// Define the current plugin version.
define( 'DE_WP_DISABLE_WEBP_BY_DEFAULT_PLUGIN_VERSION', '0.7.0' );
define( 'DE_WP_DISABLE_WEBP_BY_DEFAULT_DATABASE_VERSION', 50 );

require_once plugin_dir_path( __FILE__ ) . 'inc/class-disable-webp-by-default.php';

/**
 * Activation hook.
 *
 * @since  0.5.0
 *
 * @param  bool  $network_wide  Is the plugin being activated network wide?.
 * @return void
 */
function de_wp_disable_webp_activate_plugin( $network_wide ) {
	require_once plugin_dir_path( __FILE__ ) . 'inc/activator.php';

	Disable_WebP_By_Default\Inc\Activator::activate( $network_wide );
}
register_activation_hook( __FILE__, 'de_wp_disable_webp_activate_plugin' );

/**
 * Deactivation hook.
 *
 * @since  0.5.0
 *
 * @param  bool  $network_wide  Is the plugin being DEactivated network wide?.
 * @return void
 */
function de_wp_disable_webp_deactivate_plugin( $network_wide ) {
	require_once plugin_dir_path( __FILE__ ) . 'inc/deactivator.php';

	Disable_WebP_By_Default\Inc\Deactivator::deactivate( $network_wide );
}
register_deactivation_hook( __FILE__, 'de_wp_disable_webp_deactivate_plugin' );

/**
 * Add a new site to a network.
 *
 * @since  0.5.0
 *
 * @param  WP_Site  $site  New site object.
 * @return void
 */
function de_wp_disable_webp_new_site( $site ) {
	require_once plugin_dir_path( __FILE__ ) . 'inc/activator.php';

	Disable_WebP_By_Default\Inc\Activator::add_blog( $site );
}

add_action( 'wp_insert_site', 'de_wp_disable_webp_new_site' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since  0.6.0
 *
 * @return void
 */
function de_wp_disable_webp_by_default_init() {
	$plugin_class = new Disable_WebP_By_Default\Inc\Plugin();

	add_filter( 'admin_init', array( $plugin_class, 'disable_webp_settings' ) );

	// Bail here if the option doesn't exist or is intentionally set to '0'.
	if ( '1' !== get_option( 'disable_webp_transforms' ) ) {
		return;
	}

	add_filter( 'wp_upload_image_mime_transforms', array( $plugin_class, 'disable_jpeg_webp_transform' ) );
}

de_wp_disable_webp_by_default_init();
