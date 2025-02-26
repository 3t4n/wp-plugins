<?php
/*
Plugin Name: Add editor link to admin bar
Plugin URI: http://kevinw.de/download/change-admin-bar.zip
Description: Since WordPress Version 3.1 - you know - there is the admin bar. Through this plugin you will add a link to the theme editor.
Author: Kevin Weber
Version: 1.1
Author URI: http://kevinw.de/
License: GPLv2 or later
*/

/** Remove the menu button called 'appearance' (including widgets and menus) because you will add the links manually. **/
function remove_admin_bar_menu() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('appearance');
} add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_menu' );


/** Now add your own appearance button. I named it 'design'. **/
function add_admin_bar_menu1() {
	global $wp_admin_bar;

	$wp_admin_bar->add_menu( array( 'id' => 'design', 'title' => __('Design'), 'href' => admin_url('theme-editor.php')  ) );

	if ( !current_user_can('edit_theme_options') )
		return;
		$wp_admin_bar->add_menu( array( 'parent' => 'design', 'id' => 'editor', 'title' => __('Editor'), 'href' => admin_url('theme-editor.php') ) );

	if ( current_theme_supports( 'widgets' )  )
		$wp_admin_bar->add_menu( array( 'parent' => 'design', 'id' => 'widgets', 'title' => __('Widgets'), 'href' => admin_url('widgets.php') ) );

	 if ( current_theme_supports( 'menus' ) || current_theme_supports( 'widgets' ) )
		$wp_admin_bar->add_menu( array( 'parent' => 'design', 'id' => 'menus', 'title' => __('Menus'), 'href' => admin_url('nav-menus.php') ) );

if ( !current_user_can('switch_themes') )
		return;
$wp_admin_bar->add_menu( array( 'parent' => 'design', 'id' => 'themes', 'title' => __('Themes'), 'href' => admin_url('themes.php') ) );


/** Optional: Add additional links. For example:
$wp_admin_bar->add_menu( array( 'parent' => 'design', 'id' => 'links', 'title' => __('Links') ) );
$wp_admin_bar->add_menu( array( 'parent' => 'links', 'id' => 'link1', 'title' => __('kevinw.de'), 'href' => 'http://kevinw.de','meta' => array('target' => '_blank') ) );
$wp_admin_bar->add_menu( array( 'parent' => 'links', 'id' => 'link2', 'title' => __('poesieview.de'), 'href' => 'http://poesieview.de','meta' => array('target' => '_blank') ) );
**/

/** Make your function work. **/
} add_action( 'admin_bar_menu', 'add_admin_bar_menu1', 20 );

/****  by Kevin Weber || kevinw.de ****/

?>
