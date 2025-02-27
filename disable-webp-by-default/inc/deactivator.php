<?php
/**
 * Disable WebP By Default
 *
 * @package disable-webp-by-default
 * @author David Baumwald <davidbaumwald>
 * @license GPLv2
 */

namespace Disable_WebP_By_Default\Inc;

// Bail early if accessed directly around WP.
defined( 'ABSPATH' ) || die( 'We\'re sorry, but you cannot directly access this file.' );

/**
 * Deactivator class.
 *
 * This class contains relevant code executed during plugin deactivation.
 *
 * @since      0.5.0
 * @package    Disable_WebP_By_Default
 * @subpackage Disable_WebP_By_Default\Inc
 * @author     David Baumwald <davidbaumwald>
 */
class Deactivator {
	/**
	 * Deactivate plugin.
	 *
	 * @since  0.5.0
	 * @access public
	 *
	 * @global WPDB  $wpdb          The gloabl $wpdb database object.
	 * @param  bool  $network_wide  Is the plugin being deactivated network wide?.
	 * @return void
	 */
	public static function deactivate( $network_wide ) {
		global $wpdb;

		if ( is_multisite() && $network_wide ) {
			// Get all blogs in the network and activate plugin on each one.
			$blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );

			foreach ( $blog_ids as $blog_id ) {
				switch_to_blog( $blog_id );

				// If this plugin was activated on this site manually, keep it running.
				if ( ! in_array( 'disable-webp-by-default/disable-webp-by-default.php', (array) get_option( 'active_plugins', array() ), true ) ) {
					self::cleanup_options();
				}

				restore_current_blog();
			}
		} else {
			self::cleanup_options();
		}
	}

	/**
	 * Cleanup options.
	 *
	 * @since  0.5.0
	 * @access private
	 *
	 * @return void
	 */
	private static function cleanup_options() {
		delete_option( 'disable_webp_by_default_plugin_version' );
		delete_option( 'disable_webp_by_default_database_version' );
		delete_option( 'disable_webp_transforms' );
	}
}
