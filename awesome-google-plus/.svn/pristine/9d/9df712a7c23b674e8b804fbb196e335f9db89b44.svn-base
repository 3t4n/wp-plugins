<?php 
/*
Plugin Name: Awesome Google+ Plugins
Plugin URI: 
Author: Raihanul Islam
Author URI:http://raihanislamcse.me
Description: The Google+ Plugins is a wordpress widget plugin.
Version: 1.0
*/

define( 'SM_GOOGLEPLUS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

include_once( SM_GOOGLEPLUS_PLUGIN_PATH . 'includes/sm_google_plus_follow_button.php' );



// Register and load the widget
function awwe_plus_load_widget() {
	register_widget( 'sm_google_plus_follow_button');
}
add_action( 'widgets_init', 'awwe_plus_load_widget' );

