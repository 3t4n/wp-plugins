<?php
/*
* Plugin Name: Ajax Rating with Custom Login
* Version: 1.1
* Description: This is a Ajax plugin for Post / Custom Post rating. You can customize rating type, color, count etc. In         this plugin you will get a custom login this is also a ajax driven. You will find shortcode in this plugin so you can use it easily.
* Author: anand23 
* Author URI: https://wordpress.org/support/profile/anand23
* License: Plugin comes under GPL Licence.
*/


function mith_arcl_create_rating_table(){ 

//create rating table //

global  $wpdb;
	$table_name  = $wpdb->prefix . "ratings";
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
	user_id varchar (255) NOT NULL,
	post_id varchar (255) NOT NULL,
	 
	rating_value varchar(255) DEFAULT '' NOT NULL,
	  time timestamp  DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	  UNIQUE KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}

register_activation_hook( __FILE__, 'mith_arcl_create_rating_table' );


require 'functions/ajax_login_query.php';
require 'functions/ajax_rating_query.php';
//require 'functions/create_rating_table.php';
require 'functions/login_form.php';
require 'shortcode/create_rating_shortcode.php';
require 'functions/include_assets.php';
require 'admin/mith_arcl_settings.php';
?>
