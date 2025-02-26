<?php

/**
 * Fired when the plugin is uninstalled.
 *
 * @link       https://www.asc27.com/
 * @since      1.0.0
 *
 * @package    asimov-plugin
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_option('asimov_settings');
wp_clear_scheduled_hook( 'asimov_daily_cron' );
wp_clear_scheduled_hook( 'asimov_hourly_cron' );
