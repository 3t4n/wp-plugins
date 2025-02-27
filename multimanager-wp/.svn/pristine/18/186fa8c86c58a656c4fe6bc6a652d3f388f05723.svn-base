<?php
/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    MultiManager_WP
 * @subpackage MultiManager_WP/includes
 */
class MultiManager_WP_Deactivator {

	/**
	 * Clean scheduled events that are not needed
	 *
	 * Unschedule a previously scheduled event.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		$timestamp = wp_next_scheduled( 'multi_manager_wp_login_cleanup_expired_tokens' );
		wp_unschedule_event( $timestamp, 'multi_manager_wp_login_cleanup_expired_tokens' );
	}

}
