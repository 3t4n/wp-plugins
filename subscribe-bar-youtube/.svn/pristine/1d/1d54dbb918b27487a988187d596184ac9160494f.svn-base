<?php
namespace YouTubeSubscribeBar\Plugin;

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    YouTubeSubscribeBar
 * @subpackage YouTubeSubscribeBar/Plugin
 */
class YTSubscribeBarUninstall {

	/**
	 * Delete all the options stored in the DB
	 *
	 * @since    1.0.0
	 */
	public static function amysb_deactivate( $plugin_slug ) {
		delete_option( $plugin_slug . '-settings' );
		delete_option( $plugin_slug . '_welcome' );
	}

}
