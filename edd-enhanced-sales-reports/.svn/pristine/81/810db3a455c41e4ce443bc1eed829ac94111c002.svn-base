<?php
/**
 * Uninstall EDD Enhanced Sales Reports
 *
 * Deletes all the plugin data i.e.
 *         1. Plugin options.
 *         2. Integration.
 *         3. Database tables.
 *         4. Cron events.
 *
 * @package     EDD_Enhanced_Sales_Reports
 * @subpackage  Uninstall
 * @copyright   All rights reserved Copyright (c) 2022, PluginsandSnippets.com
 * @author      PluginsandSnippets.com
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

/**
 * Removes the Plugin Data if the Option for Removal of Data was Selected.
 * */
function edd_enhanced_sales_reports_uninstall() {
	$edd_enhanced_sales_reports_settings = get_option( 'edd_enhanced_sales_reports_settings', array() );

	if ( is_array( $edd_enhanced_sales_reports_settings ) && isset( $edd_enhanced_sales_reports_settings['remove_data'] ) && 1 === intval( $edd_enhanced_sales_reports_settings['remove_data'] ) ) {

		global $wpdb;

		// delete the options.
		delete_option( 'edd_enhanced_sales_reports_settings' );
		delete_option( 'edd_enhanced_sales_reports_migrated' );
		delete_option( 'edd_enhanced_sales_reports_review_time' );
        delete_option( 'edd_enhanced_sales_reports_subscription_shown' );
        delete_option( 'edd_enhanced_sales_reports_installed_at' );

		// delete the database table(s).
		$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}enhanced_sales_report" );
	}
}

edd_enhanced_sales_reports_uninstall();
