<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Alcud_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		global $wpdb;

		// create tables during activation
		// Leads
		$table_name = $wpdb->prefix . "alcud"; 
		$sql = "CREATE TABLE IF NOT EXISTS $table_name (
			id INTEGER(9) NOT NULL AUTO_INCREMENT,
			business_name VARCHAR(255),
			contact_person VARCHAR(255),
			contact_number VARCHAR(255),
			email_address VARCHAR(255),
			address TEXT,
			open_hours VARCHAR(255),
			note TEXT,
			UNIQUE KEY id (id)
			);";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

		$table_name = $wpdb->prefix . "alcud_options";
		$sql = "CREATE TABLE IF NOT EXISTS $table_name (
			id INTEGER(9) NOT NULL AUTO_INCREMENT,
			widget_type INTEGER(2),
			UNIQUE KEY id (id)
			);";
		
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

		// status variable values: NULL, transfered
		$table_name = $wpdb->prefix . "alcud_options"; 

		$counter = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE id = 1");
		if(!$counter) {
			$result = $wpdb->insert($table_name, array('widget_type'=> 1));
		}

		else{			
			$result = $wpdb->update($table_name,
				array('widget_type'=> 1),
				array('id' => 1)
				);
		}
	}

}
