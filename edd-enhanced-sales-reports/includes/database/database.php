<?php
/**
 * Database Helper
 *
 * @package     EDD_Enhanced_Sales_Reports\Database
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'edd_enhanced_sales_reports_create_tables' ) ) {
	/**
	 * Creates required database tables if they are not already present.
	 *
	 * @return void
	 */
	function edd_enhanced_sales_reports_create_tables() {

		global $wpdb;
		$table = $wpdb->prefix . 'enhanced_sales_report';

		// create database table.
		if ( $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $table ) ) !== $table ) {
			$sql = 'CREATE TABLE ' . $table . ' (
				`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
				`order_id` int(11) NOT NULL,
				`subscription_id` int(11) NOT NULL,
				`order_number` varchar(255) NOT NULL,
				`user_id` int(11) NOT NULL,
				`customer_id` int(11) NOT NULL,
				`type` varchar(20) NOT NULL,
				`email` varchar(100) NOT NULL,
				`order_date` datetime NOT NULL DEFAULT current_timestamp(),
				`gateway` varchar(100) NOT NULL,
				`transaction_id` varchar(50) NOT NULL,
				`sub_total` decimal(18,9) NOT NULL,
				`discount` decimal(18,9) NOT NULL,
				`tax` decimal(18,9) NOT NULL,
				`total` decimal(18,9) NOT NULL,
				`author_id` int(11) NOT NULL,
				`is_existing_customer` int(11) NOT NULL,
				`order_item_id` int(11) NOT NULL,
				`product_id` int(11) NOT NULL,
				`product_name` text NOT NULL,
				`product_quantity` int(11) NOT NULL,
				`product_amount` decimal(18,9) NOT NULL,
				`product_sub_total` decimal(18,9) NOT NULL,
				`product_discount` decimal(18,9) NOT NULL,
				`product_tax` decimal(18,9) NOT NULL,
				`product_total` decimal(18,9) NOT NULL,
				`billing_country` mediumtext NOT NULL,
				`billing_state` mediumtext NOT NULL,
				`commission` decimal(18,9) NOT NULL
			);';

			require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta( $sql );
		}

		// remove database tables from previous versions.
		$older_tables = array(
			$wpdb->prefix . 'enhanced_sales_reports',
			$wpdb->prefix . 'enhanced_sales_reports_free',
			$wpdb->prefix . 'edd_sales_reports_lookup',
			$wpdb->prefix . 'edd_enhanced_sales_reports_pro',
		);

		foreach ( $older_tables as $old_table ) {
			if ( $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $old_table ) ) === $old_table ) {
				$wpdb->query( $wpdb->prepare( 'DROP TABLE %s', $old_table ) );
			}
		}
	}
}
