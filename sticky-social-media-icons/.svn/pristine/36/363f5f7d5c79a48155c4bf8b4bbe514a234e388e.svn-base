<?php

/**
 * Fired during plugin activation
 *
 * @link       https://wpcodecrafter.com/
 * @since      1.0.0
 *
 * @package    Sticky_Social_Media_Icons
 * @subpackage Sticky_Social_Media_Icons/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Sticky_Social_Media_Icons
 * @subpackage Sticky_Social_Media_Icons/includes
 * @author     Hardik Chavada <hardikb.chavada@gmail.com>
 */
class Sticky_Social_Media_Icons_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		
		//Dynamic Table Generation
		global $wpdb;
        
        $table_name = $wpdb->prefix . 'sticky_sm_icons_tbl';
        $charset_collate = $wpdb->get_charset_collate();
		// check if the table exists

		if($wpdb->get_var("SHOW tables like '". $table_name ."'") != '". $table_name ."'){
			$sql = " CREATE TABLE $table_name (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`position` text NOT NULL,
				`facebook` text NOT NULL,
				`youtube` text NOT NULL,
				`twitter` text NOT NULL,
				`instagram` text NOT NULL,
				`quora` text NOT NULL,
				`tumblr` text NOT NULL,
				`linkedin` text NOT NULL,
				`pinterest` text NOT NULL,
				`telegram` text NOT NULL,
				PRIMARY KEY (`id`)
			   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; ";
			   
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );

			//insert blank values into table

			$insert_query="insert into $table_name (position, facebook, youtube, twitter, instagram, quora, tumblr, linkedin, pinterest, telegram) values ('left', '', '', '', '', '', '', '', '', '')";
			$wpdb->query($insert_query);
		}

		
		
	}
}
