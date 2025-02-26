<?php
/*
	# Plugin Name: AppointPress 
	# Version: 1.3
	# Description: Online appointment scheduling system.
	# Author: AppointPress
	# Author URI: http://www.appointpress.com
	# Plugin URI: http://www.appointpress.com

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

###	Run 'Install' script on plugin activation ###
register_activation_hook( __FILE__, 'AppointpressInstallScript' );
function AppointpressInstallScript()
{
	include('ap-install-script.php');
}


### Translate all text & lebals of plugin ###
add_action('plugins_loaded', 'LoadAppointpressPluginLanguage');
 
function LoadAppointpressPluginLanguage() {
 load_plugin_textdomain('appointpress', FALSE, dirname( plugin_basename(__FILE__)).'/languages/' );
}


### Admin dashboard Menu Pages For Appointpress Plugin ####
add_action('admin_menu','appointpress_menu');

function appointpress_menu() 
{	
	//create new top-level menu 'appointpress'
	$menu = add_menu_page( 'Appointpress', __('AppointPress', 'appointpress'), 'administrator', 'appointpress');

	// Calendar Page
	$submenu1 = add_submenu_page( 'appointpress', 'Appointpress', __('AppointPress', 'appointpress'), 'administrator', 'appointpress', 'appointpress_page' );
			
	// Remove Plugin
	$submenu2 = add_submenu_page( 'appointpress', 'Remove Plugin', __('Remove Plugin', 'appointpress'), 'administrator', 'ap-uninstall-plugin', 'uninstall_page' );
	
	// Support & Help
	$submenu3 = add_submenu_page( 'appointpress', 'Help & Support', __('Help & Support', 'appointpress'), 'administrator', 'supportnhelp', 'helpnsupport_page' );
	
	//admin menu
	add_action( 'admin_print_styles-' . $menu, 'appointpress_css_js' );
	//appointpress
	add_action( 'admin_print_styles-' . $submenu1, 'appointpress_css_js' );
	
	//remove plugin
	add_action( 'admin_print_styles-' . $submenu2, 'appointpress_css_js' );
	//support n help
	add_action( 'admin_print_styles-' . $submenu3, 'appointpress_css_js' );
	
	
}// end of menu function


function appointpress_css_js()
{ 
	wp_enqueue_script('ap-tooltip',plugins_url('menu-pages/bootstrap-assets/js/bootstrap-tooltip.js', __FILE__), array('jquery'));
	wp_enqueue_script('ap-bootstrap-affix',plugins_url('menu-pages/bootstrap-assets/js/bootstrap-affix.js', __FILE__), array('jquery'));
	wp_enqueue_script('ap-bootstrap-application',plugins_url('menu-pages/bootstrap-assets/js/application.js', __FILE__), array('jquery'));
	
	wp_register_style('ap-bootstrap-css',plugins_url('menu-pages/bootstrap-assets/css/bootstrap.css', __FILE__));
	wp_enqueue_style('ap-bootstrap-css');
}



//short-code detect
function appointpress_shortcode_detect()
{
    global $wp_query;	
    $posts = $wp_query->posts;
    $pattern = get_shortcode_regex();
    
    foreach ($posts as $post)
	{
		if ( preg_match_all( '/'. $pattern .'/s', $post->post_content, $matches ) && array_key_exists( 2, $matches ) && in_array( 'APPOINTPRESS', $matches[2] ) )
		{
			//wp_register_style('ap-bootstrap-css',plugins_url('menu-pages/bootstrap-assets/css/bootstrap.css', __FILE__));
			wp_enqueue_style('ap-bootstrap-css',plugins_url('menu-pages/bootstrap-assets/css/bootstrap-appointpress.css', __FILE__));
		}    
    }
}
add_action( 'wp', 'appointpress_shortcode_detect' );

 ### Rendering All appointpress Menu Page ###
 
 # appointpress page
 function appointpress_page()
 {
	include('menu-pages/appointpress-home.php');
 }
 
 # Uninstall plugin
 function uninstall_page()
 {
 	include("ap-uninstall-script.php");
 }
 
 # Support & Help
 function helpnsupport_page()
 {
 	include("menu-pages/helpnsupport.php");
 }
 
 
// Including Appointpress Short-Code Page
include("appointpress-shortcode.php");
?>