<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.asc27.com/
 * @since      1.0.0
 *
 * @package    Asimov
 * @subpackage Asimov/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Asimov
 * @subpackage Asimov/includes
 * @author     https://www.asc27.com/
 */
class Asimov_Activator {

	/**
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		if ( ! wp_next_scheduled('asimov_hourly_cron') ) {
			$timestamp = time() + 30;
			wp_schedule_event($timestamp , 'asimov_hourly', 'asimov_hourly_cron');
		}
		if ( ! wp_next_scheduled('asimov_daily_cron') ) {
			$timestamp = time() + 30;
			wp_schedule_event($timestamp , 'asimov_daily', 'asimov_daily_cron');
		}
	}

}
