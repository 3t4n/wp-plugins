<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * As long as you make sure each setting has a constant here that starts with SETTING_ they will be removed once the plugin gets removed
 *
 * @package    Daisycon_Woocommerce
 * @subpackage Daisycon_Woocommerce/includes
 * @author     daisycon
 */
class Daisycon_Woocommerce_Debug_Log
{
	/**
	 * @var wpdb
	 */
	private $database;

	/**
	 * @var string
	 */
	private $table;

	public function __construct()
	{
		global $wpdb;
		$this->database = $wpdb;
		$this->table    = $this->database->prefix . 'daisycon_debug_log';
	}

	public function debugEnabled(): bool
	{
		return true === defined('DAISYCON_DEBUG_LOG') && true === DAISYCON_DEBUG_LOG;
	}

	/**
	 * @return $this
	 */
	public function createTables(): Daisycon_Woocommerce_Debug_Log
	{
		if (false === $this->debugEnabled()) {
			return $this;
		}

		$charset_collate = $this->database->get_charset_collate();
		$sql = " $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta($sql);

		return $this;
	}

	/**
	 * @return $this
	 */
	public function deleteTables(): Daisycon_Woocommerce_Debug_Log
	{
		$sql = "DROP TABLE IF EXISTS " . $this->table . ";";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta($sql);

		return $this;
	}

	public function log(string $message): Daisycon_Woocommerce_Debug_Log
	{
		if (!$this->debugEnabled()) {
			return $this;
		}

		$this->database->insert(
			$this->table,
			[
				'message' => $message,
				'date' => date('Y-m-d H:i:s')
			]
		);
		return $this;
	}

	public function export()
	{
		if (!$this->deleteTables()) {
			return 'Debugger not enabled';
		}

		$this->database->flush();
		$result = $this->database->get_results('SELECT SQL_NO_CACHE * FROM ' . $this->table . ' ORDER BY date ASC', ARRAY_A);
		return array_reduce(
			$result,
			function ($accumulator, $row) {
				return $accumulator . $row['date'] . ': ' . $row['message'] . PHP_EOL . PHP_EOL;
			},
			''
		);
	}
}
