<?php
/**
 * @package Anytheme Lock Theme
 * @version 1.1
 */
/*
Plugin Name: Anytheme Lock Theme
Plugin URI: http://wordpress.org/extend/plugins/anytheme-lock-theme/
Description: This plugin lock the site at specific theme. You can activate any theme you want, the site will look like the lock theme you choose into the plugin code. Into the code of plugin there are 3 php variables. Those vars set the lock theme. Once installed as a WordPress plugin, the lock theme is the only active theme that our site see.
Author: Mario
Version: 1.1
Author URI: http://olarmarius.tk/
*/

//
//  Here is the lock theme, set this to change the lock theme.
//
$anytheme_lock_theme = 'Twenty Ten';
$anytheme_lock_stylesheet = 'twentyten';
$anytheme_lock_template = 'twentyten';

//---------------------------------------------------------
function filter_current_theme($content) {
	global $anytheme_lock_theme;
    $content = str_ireplace($content, $anytheme_lock_theme, $content);
    return $content;
}

//---------------------------------------------------------
function filter_stylesheet($content) {
	global $anytheme_lock_stylesheet;
    $content = str_ireplace($content, $anytheme_lock_stylesheet, $content);
    return $content;
}

//---------------------------------------------------------
function filter_template($content) {
	global $anytheme_lock_template;
    $content = str_ireplace($content, $anytheme_lock_template, $content);
    return $content;
}

//---------------------------------------------------------
function anytheme_lock_theme() {
  add_filter( 'option_current_theme', 'filter_current_theme');
  add_filter( 'option_stylesheet', 'filter_stylesheet');
  add_filter( 'option_template', 'filter_template');
}

//---------------------------------------------------------
add_action('plugins_loaded', 'anytheme_lock_theme');

?>
