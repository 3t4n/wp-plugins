<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.indianic.com
 * @since      1.0.0
 *
 * @package    Custom_Table_Csv
 * @subpackage Custom_Table_Csv/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Custom_Table_Csv
 * @subpackage Custom_Table_Csv/includes
 * @author     indianic <help@indianic.com>
 */
class Custom_Table_Csv_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		global $wpdb;
        $table_name = $wpdb->prefix.'customers';
        $charset_collate = $wpdb->get_charset_collate();
		
        $sql = "CREATE TABLE $table_name (
			`id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`name` varchar(20) NOT NULL,
			`customer_email` varchar(30) NOT NULL,
			`company` varchar(10) NOT NULL,
			`is_subscribe` enum('1','0') NOT NULL DEFAULT '0',
			`customer_date` datetime NOT NULL
		  ) $charset_collate;";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
		

		 
		$data = array('name' => 'ram', 'customer_email' => 'ram@gmail.com','company'=>'google','is_subscribe'=>0,'customer_date'=>date('Y-m-d H:i:s'));
		$format = array('%s','%s','%s','%s','%s');
		$wpdb->insert($table_name,$data,$format);
	}

}
