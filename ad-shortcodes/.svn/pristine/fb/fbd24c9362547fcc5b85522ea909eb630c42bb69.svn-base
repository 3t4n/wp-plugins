<?php
/**
 * Control zumi_fixed_ads table in DB.
 */
class ZumiFixedAd extends ZumiAdModel {
	/**
	 * The table name.

	 * @var string $table
	 */
	protected static $table = 'zuminet_fixed_ads';


	/**
	 * Create a table.
	 */
	public static function createTable() {
		global $wpdb;

		$char = $wpdb->get_charset_collate();

		// SQL.
		$sql = "CREATE TABLE IF NOT EXISTS zuminet_fixed_ads(
			id INT(11) PRIMARY KEY AUTO_INCREMENT,
			name varchar(255),
			content TEXT,
			position varchar(255),
			description TEXT
		) {$char}";

		// Execute SQL.
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';

		return dbDelta( $sql );
	}
}
