<?php
/**
 * Control zumi_ads table in DB.
 */
class ZumiAd extends ZumiAdModel {
	/**
	 * The key of Table.

	 * @var string $primary_key
	 */
	protected static $primary_key = 'ad_id';
	/**
	 * The table name.

	 * @var string $table
	 */
	protected static $table = 'zuminet_ads';
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
		$sql = "CREATE TABLE IF NOT EXISTS zuminet_ads(
			ad_id VARCHAR(255) PRIMARY KEY,
			code TEXT,
			description TEXT
		) {$char}";

		// Execute SQL.
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';

		return dbDelta( $sql );
	}
}
