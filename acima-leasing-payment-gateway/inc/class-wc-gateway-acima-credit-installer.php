<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WC_Gateway_Acima_Credit_Installer {
	/**
	 * Install the necessary database tables.
	 */
	public static function install() {
		global $wpdb;
		$table_name      = $wpdb->prefix . 'acima_checkout';
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE IF NOT EXISTS $table_name (
        acima_checkout_id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        session_id BIGINT(20) UNSIGNED NOT NULL,
        order_id BIGINT(20) UNSIGNED,
        lease_id VARCHAR(255) NOT NULL UNIQUE,
        lease_number VARCHAR(255),
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY  (acima_checkout_id),
        INDEX session_id (session_id),
        INDEX order_id (order_id)
    ) $charset_collate;";

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta( $sql );
	}
}
