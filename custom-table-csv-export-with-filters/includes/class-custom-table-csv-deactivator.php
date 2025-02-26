<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://www.indianic.com
 * @since      1.0.0
 *
 * @package    Custom_Table_Csv
 * @subpackage Custom_Table_Csv/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Custom_Table_Csv
 * @subpackage Custom_Table_Csv/includes
 * @author     indianic <help@indianic.com>
 */
class Custom_Table_Csv_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'customers';
		$sql = "DROP TABLE IF EXISTS $table_name";
		$wpdb->query($sql);
	}

}
