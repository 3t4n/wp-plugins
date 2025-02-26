<?php
/**
 * Plugin Name: Featured Image Checker
 * Plugin URI: http://electronic-eye.in
 * Description: This plugin checks if the post has a featured image set or not. It displays yes/no on the posts page on the backend.
 * Version: 1.0.0
 * Author: Shreyans Gandhi
 * Author URI: http://electronic-eye.in
 * License: GPL2
 */

define( 'FIC__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'FIC__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( FIC__PLUGIN_DIR . 'columns.php' );

if ( is_admin() ) {
	global $pagenow;
		add_filter( 'manage_posts_columns', array( 'FIC_Columns', 'fic_register_custom_column_headings' ));
		add_action( 'manage_posts_custom_column', array( 'FIC_Columns', 'fic_register_custom_columns' ));
		
}