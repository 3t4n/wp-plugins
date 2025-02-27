<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.daisycon.com
 * @since      1.0.0
 *
 * @package    Daisycon_Woocommerce
 * @subpackage Daisycon_Woocommerce/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Daisycon_Woocommerce
 * @subpackage Daisycon_Woocommerce/includes
 * @author     daisycon
 */
class Daisycon_Woocommerce_Activator
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate()
	{
        self::createTables();
	}

	private static function createTables()
	{
		global $wpdb;
		$prefix = $wpdb->prefix;
		$settingsTable = $prefix . 'daisycon_settings';
		self::checkTable(
			$settingsTable,
			'name',
			[
				'name' => ['type' => 'varchar', 'size' => '32', 'nullable' => false, 'default' => null],
				'value' => ['type' => 'text', 'size' => null, 'nullable' => true, 'default' => null],
			],
			'CREATE TABLE ' . $settingsTable . ' (
				name varchar(32) NOT NULL PRIMARY KEY,
				value text DEFAULT NULL
			)'
		);

		if ((new Daisycon_Woocommerce_Debug_Log())->debugEnabled()) {
			$debugTable = $prefix . 'daisycon_debug_log';
			self::checkTable(
				$debugTable,
				'id',
				[
					'id' => ['type' => 'int', 'size' => '11', 'nullable' => false, 'default' => null],
					'message' => ['type' => 'text', 'size' => null, 'nullable' => false, 'default' => null],
					'date' => ['type' => 'datetime', 'size' => null, 'nullable' => false, 'default' => null],
				],
				'CREATE TABLE ' . $debugTable . ' (
					id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
					message TEXT NOT NULL,
					date datetime NOT NULL
				)'
			);
		}
	}

	private static function checkTable($tableName, $primaryKey, $expectedFields, $createStatement)
	{
		global $wpdb;
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		$tableExists = $wpdb->get_var("SHOW TABLES LIKE '$tableName'") === $tableName;
		$createTable = false === $tableExists;
		if (true === $tableExists) {
			$columns = $wpdb->get_results('DESCRIBE ' . $tableName, ARRAY_A);
			foreach ($columns as $column) {
				$column = array_change_key_case($column, CASE_LOWER);
				$name = $column['field'];
				if (false === isset($expectedFields[$name])) {
					$createTable = true;
					break;
				}

				$matches =[];
				preg_match('/(?P<type>\w+)(?:\((?P<size>\d+)\))?/', $column['type'], $matches);
				$type = $matches['type'] ?? null;
				$size = $matches['size'] ?? null;

				if ($type !== $expectedFields[$name]['type'] || $size !== $expectedFields[$name]['size']) {
					if ($name === $primaryKey) {
						$createTable = true;
						break;
					}

					$query = 'ALTER TABLE ' . $tableName . ' CHANGE '
							 . ' `' . $name . '`'
							 . self::createStatement($name, $expectedFields[$name]) . ';';
					$wpdb->query($query);
				}
				unset($expectedFields[$name]);
			}
		}

		if (false === empty($expectedFields)) {
			foreach ($expectedFields as $name => $configuration) {
				if ($name === $primaryKey) {
					$createTable = true;
					break;
				}

				$query = 'ALTER TABLE ' . $tableName . ' ADD ' . self::createStatement($name, $configuration) . ';';
				$wpdb->query($query);
			}
		}

		if (true === $createTable) {
			self::deleteTable($tableName);
			$charset_collate = $wpdb->get_charset_collate();

			$sql = $createStatement . " $charset_collate;";

			dbDelta($sql);
		}
	}

	private static function createStatement($name, $configuration)
	{
		return ' `' . $name . '`'
			. ' ' . $configuration['type']
			. (null !== $configuration['size'] ? '(' . $configuration['size'] . ')' : '')
			. ($configuration['nullable'] ? ' DEFAULT NULL' : ' NOT NULL')
			. (!$configuration['nullable'] && null !== $configuration['default'] ? " DEFAULT '" . $configuration['default'] . "'" : '');
	}

	private static function deleteTable($tableName)
	{
		global $wpdb;
		$tableExists = $wpdb->get_var("SHOW TABLES LIKE '$tableName'") === $tableName;
		if ($tableExists) {
			$sql = "DROP TABLE " . $tableName . ";";
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			$wpdb->query($sql);
		}
	}

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate()
	{
		global $wpdb;
		$prefix = $wpdb->prefix;
		self::deleteTable($prefix . 'daisycon_settings');
		self::deleteTable($prefix . 'daisycon_debug_log');
	}
}
