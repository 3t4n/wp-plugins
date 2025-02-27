<?php
/**
 * File class-cleanupaddresses.php
 *
 * @since 2024-11-11
 * @license GPL-3.0-or-later
 *
 * @package ProtectLogin/Cronjobs
 */

namespace ProtectLogin\Modules\LimitLoginAttempts\Actions;

use ProtectLogin\Modules\RemoteApi\Actions\ApiClient;

/**
 * Contains functionality for automatic cleanups
 */
class CleanupAddresses {

	/**
	 * Cleanups all addresses more than one week expired.
	 * Also cleans these addresses from other sites in private cloud by using the REST-API
	 *
	 * @return void
	 */
	public static function cleanup_expired_lockouts() {
		$all_addresses = get_option( 'protect_login_limit_login_lockouts', array() );
		$now           = mktime( 0 );
		$delete_before = $now - WEEK_IN_SECONDS;
		$new_lockouts  = array();
		$api           = ApiClient::get_instance();
		foreach ( $all_addresses as $current_lockout => $lockout_end ) {
			if ( $lockout_end > $delete_before ) {
				$new_lockouts[ $current_lockout ] = $lockout_end;
			} else {
				$api->remove();
			}
		}

		protect_login_update_option_on_mulitsite( 'protect_login_limit_login_lockouts', $new_lockouts );
	}

	/**
	 * Adds a new cron interval for cleanup, every day
	 *
	 * @param array $schedules Previous existing cleanups.
	 *
	 * @return array
	 */
	public static function add_cron_interval( $schedules ) {
		$schedules['protect_login_cleanup'] = array(
			'interval' => DAY_IN_SECONDS,
			'display'  => esc_html__( 'Daily', 'protect-login' ),
		);
		return $schedules;
	}
}

add_filter( 'cron_schedules', array( 'ProtectLogin\Modules\LimitLoginAttempts\Actions\CleanupAddresses', 'add_cron_interval' ) );
add_action(
	'protect-one/login/cleanup-released-addresses',
	array(
		'ProtectLogin\Modules\LimitLoginAttempts\Actions\CleanupAddresses',
		'cleanup_expired_lockouts',
	)
);

if ( ! wp_next_scheduled( 'protect-one/login/cleanup-released-addresses' ) ) {
	$now = mktime( 0, 15, 0 ) + DAY_IN_SECONDS;
	wp_schedule_event( $now, 'protect_login_cleanup', 'protect-one/login/cleanup-released-addresses' );
}
