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
 * Activator class.
 *
 * This class contains relevant code executed during plugin activation.
 *
 * @since      0.5.0
 * @package    Disable_WebP_By_Default
 * @subpackage Disable_WebP_By_Default\Inc
 * @author     David Baumwald <davidbaumwald>
 */
class Activator {
	/**
	 * Activate plugin.
	 *
	 * @since  0.5.0
	 * @access public
	 *
	 * @global WPDB  $wpdb          The gloabl $wpdb database object.
	 * @param  bool  $network_wide  Is the plugin being activated network wide?.
	 * @return void
	 */
	public static function activate( $network_wide ) {
		global $wpdb;

		if ( is_multisite() && $network_wide ) {
			// Get all blogs in the network and activate plugin on each one.
			$blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );

			foreach ( $blog_ids as $blog_id ) {
				switch_to_blog( $blog_id );

				self::create_options();

				restore_current_blog();
			}
		} else {
			self::create_options();
		}
	}

	/**
	 * Create options.
	 *
	 * @since  0.5.0
	 * @access private
	 *
	 * @return void
	 */
	private static function create_options() {
		update_option( 'disable_webp_by_default_plugin_version', DE_WP_DISABLE_WEBP_BY_DEFAULT_PLUGIN_VERSION );
		update_option( 'disable_webp_by_default_database_version', DE_WP_DISABLE_WEBP_BY_DEFAULT_DATABASE_VERSION );
		update_option( 'disable_webp_transforms', '1' );
	}

	/**
	 * Add a new site to the network.
	 *
	 * @since  0.5.0
	 * @access public
	 *
	 * @param  \WP_Site  $site  New site object.
	 * @return void
	 */
	public static function add_blog( $site ) {
		if ( is_plugin_active_for_network( 'disable-webp-by-default/disable-webp-by-default.php' ) ) {
			switch_to_blog( (int) $site->blog_id );

			self::create_options();

			restore_current_blog();
		}
	}
}
