<?php
/**
 * Control zumi_ad_shortcodes table in DB.
 */
class ZumiAdShortcode extends ZumiAdModel {
	/**
	 * The key of Table.

	 * @var string $primary_key
	 */
	protected static $primary_key = 'tag';
	/**
	 * The table name.

	 * @var string $table
	 */	
	protected static $table = 'zuminet_ad_shortcode';
	/**
	 * Set incrementing.

	 * @var bool $incrementing
	 */
	protected static $incrementing = false;

	/**
	 * Create a table.
	 */
	public static function createTable() {
		global $wpdb;

		$char = $wpdb->get_charset_collate();

		// SQL.
		$sql = "CREATE TABLE IF NOT EXISTS zuminet_ad_shortcode(
			tag VARCHAR(255) PRIMARY KEY,
			content TEXT,
			description TEXT
		) {$char}";

		// Execute SQL.
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';

		return dbDelta( $sql );
	}

}