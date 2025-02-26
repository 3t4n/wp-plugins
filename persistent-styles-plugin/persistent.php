<?php
/*
Plugin Name: Persistent Styles
Plugin URI: http://www.siolon.com/2007/persistent-styles-plugin/
Version: 1.3
Description: This plugin allows you to have persistent styles regardless of the theme. DO NOT AUTO UPDATE! It will overwrite your CSS.
Author: Chris Poteet
Author URI: http://www.siolon.com/
*/

function directly_add_admin_menu(){
	global $submenu;
       
	$submenu['themes.php'][] = array(
		'Persistent Styles',
		'edit_themes',
		'plugin-editor.php?file=persistent-styles-plugin/persistent.css&plugin=persistent-styles-plugin/persistent.php',
	);
}

add_action('admin_menu', 'directly_add_admin_menu', 99998);

function print_styles() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('wpurl') . '/wp-content/plugins/persistent-styles-plugin/persistent.css"></link>' . "\n";
}

add_filter('wp_head', 'print_styles');

?>