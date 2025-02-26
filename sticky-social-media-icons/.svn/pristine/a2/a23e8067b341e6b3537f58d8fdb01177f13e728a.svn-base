<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://wpcodecrafter.com/
 * @since      1.0.0
 *
 * @package    Sticky_Social_Media_Icons
 * @subpackage Sticky_Social_Media_Icons/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Sticky_Social_Media_Icons
 * @subpackage Sticky_Social_Media_Icons/includes
 * @author     Hardik Chavada <hardikb.chavada@gmail.com>
 */
class Sticky_Social_Media_Icons_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		
		//Dynamic Table Generation
		global $wpdb;
        
        $table_name = $wpdb->prefix . 'sticky_sm_icons_tbl';
		
		$wpdb->query("DROP table IF Exists ". $table_name);
	}

}
