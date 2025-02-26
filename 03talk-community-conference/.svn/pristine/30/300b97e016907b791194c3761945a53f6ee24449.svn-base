<?php
/*
Plugin Name: 03TALK
Plugin URI: http://www.03TALK.com
Description: The 03TALK Personal Conference Call plugin allows you to create, edit and display your free and anonymous conference call from within Wordpress. 
Version: 0.1a
Author: Zimo Communications Ltd
Author URI: http://www.markdalby.com
*/

/*  Copyright 2010 Zimo Communications Limited (email : mark@dalbymail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Require main API functions. 
require_once('api_functions.php');

// Update Settings Page
if ($_POST['action'] == "update")
{
	$result = conference_changepin($_POST['conference_number'], $_POST['conference_pin'], get_option('conference_site_token'));
	if ($result['rc'] = "1"){
	update_option("conference_widget_header", $_POST['conference_widget_header'], "", "yes");
	update_option("conference_admin_pin", $_POST['conference_admin_pin'], "", "yes");
	update_option("conference_widget_content_offline", $_POST['conference_widget_content_offline'], "", "yes");
	update_option("conference_widget_color_offline", $_POST['conference_widget_color_offline'], "", "yes");
	update_option("conference_widget_color_online", $_POST['conference_widget_color_online'], "", "yes");
	update_option("conference_widget_box_online", $_POST['conference_widget_box_online'], "", "yes");
	update_option("conference_widget_box_offline", $_POST['conference_widget_box_offline'], "", "yes");
	update_option("conference_number", $_POST['conference_number'], "", "yes");
	update_option("conference_pin", $_POST['conference_pin'], "", "yes");
	update_option("conference_active", $_POST['conference_active'], "", "yes");
	$_SESSION['message'] = '<div id="message" class="updated fade"><p>Settings updated successfully.</p></div>';
	}
	else {
		$_SESSION['message'] = '<div id="message" class="updated fade"><p>Problem updating your settings, Please try again later.</p></div>';	
	}
}

if ($_POST['action'] == "rehash")
{
	$result = get_conference_details(get_option('conference_site_token'));
	if ($result['rc'] == "1"){
	update_option("conference_number", $result['conference_number'], "", "yes");
	update_option("conference_pin", $result['conference_pin'], "", "yes");
	}
}

if ($_POST['action'] == "toggle")
{
	require_once '../../../wp-config.php';
	if ($_POST['password'] == get_option("conference_admin_pin"))
	{
		$status = get_option("conference_active");
		if ($status == "yes"){
		update_option("conference_active", "no", "", "yes");
		}else{
		update_option("conference_active", "yes", "", "yes");
		}
	}
	$home = get_option('home');
	header("Location: $home");
}


// Main Functions
function main_settings_menu() {
    // Add a new submenu under Manage:
    add_options_page('03TALK', '03TALK', 'administrator', '03TALK', 'main_03talk_settings');
}


function initiate(){
	
	// add standard options
	add_option('conference_admin_pin','1234');
	add_option("conference_widget_header", "03TALK TO ME");
	add_option("conference_widget_content_offline", "OFFLINE MESSAGE");
	add_option("conference_widget_color_offline", "#000");
	add_option("conference_widget_color_online", "#000");
	add_option("conference_widget_box_online", "#000");
	add_option("conference_widget_box_offline", "#000");
	
	// get new conference details
	$new = get_conference_details(get_option('conference_site_token'));
	
	// if the conference exists create the wordpress options, otherwise mark as unavailable.  
	if ($new['conference_number'] > "1"){
		add_option("conference_number", $new['conference_number'], "", "yes");
		add_option("conference_pin", $new['conference_pin'], "" , "yes");
		add_option("conference_active", "yes", "", "yes");
		return true;
	}
	else {
		add_option("conference_number", "unavailable", "", "yes");
		add_option("conference_pin", "unavailable", "" , "yes");
		add_option("conference_active", "no", "", "yes");	
		return false;	
	}
	
}
// Pre installation of plugin
function conference_preinstall(){
	$random = rand(0000000000,9999999999) + time();
	$sitename = "{$_SERVER['SERVER_NAME']}$random";
	add_option("conference_site_token",$sitename);
	initiate();
}

// main widget registration
function widget_conference_init(){
	register_sidebar_widget(__('03TALK'), 'widget_conference');    
}

// register the 03TALK options page
function main_03talk_settings() {
	if (get_option(conference_setup) !="1"){
		
	// get new conference details
	$new = get_conference_details(get_option('conference_site_token'));
	wp_enqueue_script("jquery");
	add_option("conference_setup", "1", "", "yes");
	}
	include('pages/settings.php');
}

// include the main widget HTML into the widget callback.  
function widget_conference() {
	include("pages/widget.php");
}

// actions and event hooks.
register_activation_hook( __FILE__, 'conference_preinstall' );
add_action("plugins_loaded", "widget_conference_init");
add_action('admin_menu', 'main_settings_menu');
add_action( 'admin_init', 'register_mysettings' );
wp_register_style('conference_style', WP_PLUGIN_URL . '/03talk/main.css');
wp_enqueue_style('conference_style');
wp_register_script('color', WP_PLUGIN_URL . '/03talk/jscolor/jscolor.js');
wp_enqueue_script("color");

?>