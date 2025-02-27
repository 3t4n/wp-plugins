<?php
/**
 * Upgrades the db
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WPInv_Wallet_Install Class.
 */
class WPInv_Wallet_Install {

	/**
	 * The current db's character set collation
	 */
	public $charset_collate;

	/**
	 * WordPress tables' prefix
	 */
	public $table_prefix;

	/**
	 * Install WPINV Wallet
	 */
	public function __construct( $upgrade_from ) {
		global $wpdb;

        //Abort if this is MS and the blog is not installed
		if ( ! is_blog_installed() ) {
			return;
		}

		$this->charset_collate = $wpdb->get_charset_collate();
		$this->table_prefix    = $wpdb->prefix;

        //If this is a fresh install
		if( !$upgrade_from ){
			$this->do_full_install();
		}

	}

	/**
	 * Returns the balances table schema
	 */
	private function get_balances_table_schema() {

		$table = $this->table_prefix . 'wpinv_wallet_balance';
		$charset_collate = $this->charset_collate;

		return "CREATE TABLE $table
			(balance_id BIGINT(20) unsigned NOT NULL auto_increment,
            user_id BIGINT(20) unsigned NOT NULL,
            currency VARCHAR(20) NOT NULL,
            balance VARCHAR(200) NOT NULL,
            last_modified TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY  (balance_id),
			KEY user_id (user_id)) $charset_collate";

	}

	/**
	 * Returns the transactions table schema
	 */
	private function get_transactions_table_schema() {

		$table = $this->table_prefix . 'wpinv_wallet_transactions';
		$charset_collate = $this->charset_collate;

		return "CREATE TABLE $table
			(transaction_id BIGINT(20) unsigned NOT NULL auto_increment,
            user_id BIGINT(20) unsigned NOT NULL DEFAULT '0',
            type VARCHAR(200) NOT NULL,
			amount VARCHAR(200) NOT NULL,
            balance VARCHAR(200) NOT NULL,
			currency VARCHAR(20) NOT NULL,
			details TEXT,
            date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
			PRIMARY KEY  (transaction_id),
			KEY user_id (user_id)) $charset_collate";

	}

	/**
	 * Does a full install of the plugin.
	 */
	private function do_full_install() {
		global $wpdb;
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

		// Create tables.
		dbDelta( array( $this->get_balances_table_schema() ) );
		dbDelta( array( $this->get_transactions_table_schema() ) );

	}


}
