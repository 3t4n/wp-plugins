<?php

class Social_Parts_Activator {

	public static function activate() {
		wp_cache_flush();
		self::create_plugin_table();
	}

	public static function create_plugin_table() {
		global $wpdb;

		$charset_collate = $wpdb->get_charset_collate();

		$table_name = $wpdb->prefix . SOCIAL_PARTS_TABLE_NAME;

		$sql = "CREATE TABLE IF NOT EXISTS $table_name(
          id mediumint(9) NOT NULL AUTO_INCREMENT,
          time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
          domain_id mediumint(9) DEFAULT 0 NOT NULL,
          PRIMARY KEY  (id)
        ) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

		add_option( 'social_parts_version', SOCIAL_PARTS_VERSION );
	}
}