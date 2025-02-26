<?php
/*
	# Plugin Name: Simple Business Hours
	# Version: 1.0
	# Description: Simple Business Hours allows to admin display its business working hours in any sidebar area using a widget.
	# Author: Appointpress
	# Author URI: http://www.appointpress.com/
	# Plugin URI: http://www.appointpress.com/
	
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 3 of the License, or
	(at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
	along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

//Run 'Install' script on plugin activation
register_activation_hook( __FILE__, 'SBHInstallScript' );
function SBHInstallScript()
{
	include('install-plugin.php');
}

//Translate all text & lebals of plugin
add_action('plugins_loaded', 'SBHLoadPluginLanguage');

function SBHLoadPluginLanguage() {
 load_plugin_textdomain('sbh', FALSE, dirname( plugin_basename(__FILE__)).'/languages/' );
}

// Admin dashboard Menu Pages For Booking Calendar Plugin
add_action('admin_menu','simple_business_hours');

function simple_business_hours()
{
	//create new top-level menu 'spl-biz-hrs'
	$menu = add_menu_page('Appointment Calendar', __('Simple Business Hours', 'sbh'), 'administrator', 'spl-biz-hrs-dashboard');

	//Business Hours Page
	$submenuA = add_submenu_page( 'spl-biz-hrs-dashboard', 'Dashboard', __('Dashboard', 'sbh'), 'administrator', 'spl-biz-hrs-dashboard', 'sbh_page' );
	
	//Remove Plugin
	$submenuR = add_submenu_page( 'spl-biz-hrs-dashboard', 'Remove Plugin', __('Remove Plugin', 'sbh'), 'administrator', 'remove-sbh', 'sbh_remove_plugin_page' );

	add_action( 'admin_print_styles-' . $menu, 'sbh_admins_css_js' );
	add_action( 'admin_print_styles-' . $submenuA, 'sbh_admins_css_js' );
	add_action( 'admin_print_styles-' . $submenuR, 'sbh_admins_css_js' );
}


function sbh_admins_css_js()
{
	//bootstrap css + js
	wp_enqueue_style('sbh-bs-css',plugins_url('/bootstrap-assets/css/bootstrap.css', __FILE__));
	wp_enqueue_script('sbh-bs',plugins_url('/bootstrap-assets/js/bootstrap.js', __FILE__), array('jquery'));
	wp_enqueue_script('sbh-bs-min',plugins_url('/bootstrap-assets/js/bootstrap.min.js', __FILE__), array('jquery'));
	wp_enqueue_script('sbh-bs-tab',plugins_url('/bootstrap-assets/js/bootstrap-tab.js', __FILE__), array('jquery'));
	wp_enqueue_script('sbh-tooltip',plugins_url('/bootstrap-assets/js/bootstrap-tooltip.js', __FILE__), array('jquery'));
	//time validation js
	wp_enqueue_script('sbh-date-js',plugins_url('/menu-pages/js/date.js', __FILE__), array('jquery'));
}

//simple business hours
function sbh_page()
{
	include('menu-pages/sbh-dashboard.php');
}
//Remove plugin
function sbh_remove_plugin_page()
{
	include("remove-plugin.php");
}

//Including SBH Short Code Page
//include("spl-biz-hrs-shortcode.php");
//Including SBH Widget Code Page
include("sbh-widget.php ");
?>