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
class Asimov_Deactivator {

	/**
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		wp_clear_scheduled_hook( 'asimov_daily_cron' );
		wp_clear_scheduled_hook( 'asimov_hourly_cron' );
	}

}
