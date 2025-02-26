<?php 
/*
Plugin Name: Simple General Settings
Description: Simple General Settings - Make some general settings editable for everyone
Author: Maarten van Gelder
Version: 0.5.1
Author URI: http://www.maartenvangelder.nl
*/

//*************** Admin function ***************
function SimpleGeneralSettings_admin() {
	include('simple-general-settings-admin.php');
}

function SimpleGeneralSettings_admin_actions() {
// pagetitle, menutitle, capacibler, menuslug, function
    add_options_page("Simple General Settings", "Simple General Settings", 1, "simple-general-settings", "SimpleGeneralSettings_admin");
}

add_action('admin_menu', 'SimpleGeneralSettings_admin_actions');