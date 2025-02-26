<?php

/*
Plugin Name: Pretty Theme Files
Plugin URI: http://www.prelovac.com/vladimir/wordpress-plugins/pretty-theme-files
Description: Plugin which sorts your theme files edit list in wp admin
Version: 1.0
Author: Vladimir Prelovac
Author URI: http://www.prelovac.com/vladimir/
*/


function load_script() {
	$theme_files_plugin_url = trailingslashit( get_bloginfo('wpurl') ).PLUGINDIR.'/'. dirname( plugin_basename(__FILE__) );
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-form');
	wp_enqueue_script('theme_files_script', $theme_files_plugin_url.'/pretty-theme-files.js', array('jquery', 'jquery-form'));
	//wp_localize_script('theme_files_script', 'file_settings', array());

}

add_action("admin_print_scripts-theme-editor.php",'load_script');


?>
