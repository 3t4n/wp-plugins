<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/*
Plugin Name: BH Custom Preloader
Plugin URI: https://wordpress.org/plugins/bh-custom-preloader/
Description: This is BH Custom Preloader WordPress plugin.It will be enable Preloader on your web site. You can change Every things from settings
Author: Masum Billah
Author URI: https://themesvila.com/
Version: 2.1
*/


//define

define( 'BHCUSTOMPREPLUGINDIR', dirname( __FILE__ ) ); 

// Some configure
define('BH_CUSTOM_PRELOADER_WORDPRESS' , WP_PLUGIN_URL .'/' . plugin_basename(dirname(__FILE__)) . '/');

// Adding css and jquery files
function bh_custom_preloader_files(){
	wp_enqueue_style('bh-preloader' , BH_CUSTOM_PRELOADER_WORDPRESS .'css/bh_custom_preloader.css' );		
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'bh-preloader', BH_CUSTOM_PRELOADER_WORDPRESS . '/assets/js/scripts.js', array('jquery'), '54895', true );
}

add_action('wp_enqueue_scripts' , 'bh_custom_preloader_files');

// Added Setting Link
add_filter( 'plugin_action_links_'.plugin_basename(__FILE__), 'bh_custom_preloader_settings_link' );
function bh_custom_preloader_settings_link($links) {
	$newlink = sprintf("<a href='%s'>%s</a>",'admin.php?page=bh-preloader',__('Settings','bh-scrolltop'));
	$links[] = $newlink;
	return $links;
}
	
// Add main files
if( !class_exists( 'CSF' ) ) {	

include_once(BHCUSTOMPREPLUGINDIR. '/options/codestar-framework.php');

}

include_once(BHCUSTOMPREPLUGINDIR. '/functions.php');
include_once(BHCUSTOMPREPLUGINDIR. '/preloader.php');