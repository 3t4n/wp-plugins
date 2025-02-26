<?php
/*
Plugin Name: Add Home to Wordpress 3.1 admin bar
Plugin URI: http://roesapps.com/?p=80
Description: Since WordPress Version 3.1 - you know - there is the admin bar. This adds a link to the home page for easy return.  Based on the "add editor link to admin bar" plugin by <a href="http://kevinw.de/" target="_blank">Kevin Weber</a>
Author: Courtney Roes
Version: 1.0
Author URI: http://RoesApps.com/
License: GPLv2 or later
*/


function Add_Home_add_admin_bar_menu() {
	global $wp_admin_bar;

	$wp_admin_bar->add_menu( array( 'id' => 'go-home', 'title' => __('Go Home'), 'href' => get_home_url()  ) );

/** Optional: Add additional links. For example:
$wp_admin_bar->add_menu( array( 'parent' => 'design', 'id' => 'links', 'title' => __('Links') ) );
$wp_admin_bar->add_menu( array( 'parent' => 'links', 'id' => 'link1', 'title' => __('kevinw.de'), 'href' => 'http://kevinw.de','meta' => array('target' => '_blank') ) );
$wp_admin_bar->add_menu( array( 'parent' => 'links', 'id' => 'link2', 'title' => __('poesieview.de'), 'href' => 'http://poesieview.de','meta' => array('target' => '_blank') ) );
**/

}

/** Make your function work. **/
add_action( 'admin_bar_menu', 'Add_Home_add_admin_bar_menu', 20 );

/****  by Courtney Roes || RoesApps.com ****/

?>
