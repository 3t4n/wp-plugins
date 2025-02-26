<?php
/**
 * Plugin Name: ComicBookManagementSystemWeeklyPicks
 * Plugin URI: https://www.inksplat.ie/comic-book-management-system-weekly-picks
 * Description: Animated display of seven comic book picks of the week, for use with blogs, reviews sites and stores.
 * Version: 2.2.0
 * Author: Inksplat
 * Author URI: https://www.inksplat.ie
 * License: GPL v2 or later
 * Text Domain: ComicBookManagementSystem
 */
 

if( ! defined ('ABSPATH' ) ){
	die;
}

define( 'CBMS_WEEKLY_PICKS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'CBMS_WEEKLY_PICKS_COVERS', content_url( 'cbms_weekly_picks_cover/',  __FILE__ ) );
define( 'CBMS_WEEKLY_PICKS_PLUGIN_DIR_LOGO',  plugins_url( 'img/logo.png', __FILE__ ) );
require_once( CBMS_WEEKLY_PICKS_PLUGIN_DIR . 'class.cbms_weekly_picks_admin_panel.php' );
require( CBMS_WEEKLY_PICKS_PLUGIN_DIR . 'class.cbms_weekly_picks.php' );
register_activation_hook( __FILE__, 'cbms_weekly_picks_activate' );


/**Activation.*/
function cbms_weekly_picks_activate() {
	global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'cbms_weekly_picks';
	
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	
	$sql = "CREATE TABLE $table_name (
		id INT NOT NULL AUTO_INCREMENT,
		title VARCHAR(10),
		img VARCHAR(10),
		PRIMARY KEY  (id)
	) $charset_collate;";

	dbDelta( $sql );


	$file_dir = WP_CONTENT_DIR . '/cbms_weekly_picks_cover/';	
	if( !file_exists( $file_dir ) )
	  {
		 wp_mkdir_p( $file_dir );
	   }
		
}

