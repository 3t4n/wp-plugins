<?php
defined( 'ABSPATH' ) || exit;	
/**
 * Fired during plugin activation
 *
 * @link       Coming soon
 * @since      1.0.0
 *
 * @package    Ajaxify_Wp_Post_Comment_Form
 * @subpackage Ajaxify_Wp_Post_Comment_Form/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ajaxify_Wp_Post_Comment_Form
 * @subpackage Ajaxify_Wp_Post_Comment_Form/includes
 * @author     Kairav Thakar <kairavthaker2016@gmail.com>
 */
class Ajaxify_Wp_Post_Comment_Form_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		 global $wpdb;
		 $table_name = $wpdb->prefix . 'ajaxify_wp_post_comments_form';
		 $wpdb_collate = $wpdb->collate;
		 $sql =
			 "CREATE TABLE {$table_name} (
			 id mediumint(20) NOT NULL auto_increment ,
			 ajaxify_enable varchar(20) NOT NULL,
			 ajaxify_main_container varchar(20) NOT NULL,
			 PRIMARY KEY  (id)			 
			 )
			 COLLATE {$wpdb_collate}";
	 
		 require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		 dbDelta( $sql );
	}

}
