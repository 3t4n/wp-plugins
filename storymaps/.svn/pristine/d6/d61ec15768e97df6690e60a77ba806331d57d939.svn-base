<?php 

/*
Plugin Name: Storymaps
Plugin URI: 
Description: StoryMapJS by Knight Lab is a free tool to help you tell stories on the web that highlight the locations of a series of events.
Version: 1.02
Author: Ben Parry
Author URI: http://uiux.me
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! function_exists( 'is_plugin_active' ) )
     require_once( ABSPATH . '/wp-admin/includes/plugin.php' );

function storymaps_communicate_dependency_notice() {
	if(is_plugin_active('advanced-custom-fields/acf.php') == false && is_plugin_active('advanced-custom-fields-pro/acf.php') == false) {
    	echo'<div class="error"><p>Storymaps requires the plugin Advanced Custom Fields or Advanced Custom Fields Pro to be installed & active.</p></div>'; 
    }
}

add_action( 'admin_notices', 'storymaps_communicate_dependency_notice' );

if(is_plugin_active('advanced-custom-fields/acf.php') || is_plugin_active('advanced-custom-fields-pro/acf.php')) {

	include 'storymaps-core.php';
	include 'storymap-posttype.php';
	include 'gigapixel-storymaps-core.php';
	include 'gigapixel-storymap-posttype.php';

	if(is_plugin_active('advanced-custom-fields-pro/acf.php')) {
		include 'storymap-acf-pro-fields.php';
		include 'gigapixel-storymap-acf-pro-fields.php';
	} else if (is_plugin_active('advanced-custom-fields/acf.php')){
		include 'storymap-acf-fields.php';
		include 'gigapixel-storymap-acf-fields.php';
	}

	// templates and things
	add_filter('single_template', 'storymap_custom_templates');

	function storymap_custom_templates($single) {
		global $post;
	    if ('gigapixel-storymap' == get_post_type(get_queried_object_id())) {
	        $single = dirname(__FILE__) . '/templates/gigapixel_storymap_template.php';
	    } else if ('storymap' == get_post_type(get_queried_object_id())) {
	        $single = dirname(__FILE__) . '/templates/storymap_template.php';
	    }

	    return $single;

	}

}

?>