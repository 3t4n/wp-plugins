<?php
/******************************************************************
Plugin Name:Appten Image Rotator
Plugin URI:http://appten.net/
Description: Flash Image Rotator Plugin for Wordpress Websites.
Version:2.0
Author:Mr. Appten
License: GPLv2
******************************************************************/

require_once('installer.php');
require_once('uninstaller.php');
require_once('shortcode.php');
require_once('tabs.php');

global $appten_imagerotator_version;
global $installed_appten_imagerotator_version;

$appten_imagerotator_version = "2.0";
$installed_appten_imagerotator_version = get_site_option('appten_imagerotator_version');


/******************************************************************
/* Creating Menus
******************************************************************/
function appten_imagerotator_plugin_menu() {
	add_menu_page("Image Rotator", "Image Rotator", "administrator", "appten_imagerotator", "appten_imagerotator_plugin_pages");
	add_submenu_page("appten_imagerotator", "Image Rotator Documentation", "Documentation", "administrator", "appten_documentation", "appten_imagerotator_plugin_pages");
}

/******************************************************************
/* Assigning Menu Pages
******************************************************************/
function appten_imagerotator_plugin_pages() {
	appten_imagerotator_admin_tabs($_GET["page"]);
	require_once (dirname(__FILE__) . "/" . $_GET["page"] . "/__default.php");
}

/******************************************************************
/* Implementing Hooks
******************************************************************/
if (is_admin()) {
  	add_action("admin_menu", "appten_imagerotator_plugin_menu");
	register_activation_hook(__FILE__,'appten_imagerotator_db_install');
	register_uninstall_hook(__FILE__, 'appten_imagerotator_db_uninstall');
}
?>