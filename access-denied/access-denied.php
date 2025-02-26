<?php
/*
Plugin Name: Access Denied
Plugin URI: http://paratheme.com
Description: Block any visitors by ip address and login form submission.
Version: 1.0
Author: wpkids
Author URI: http://paratheme.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define('access_denied_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('access_denied_plugin_dir', plugin_dir_path( __FILE__ ) );
define('access_denied_wp_url', 'http://wordpress.org/plugins/access-denied/' );
define('access_denied_pro_url', 'http://paratheme.com' );
define('access_denied_demo_url', 'http://paratheme.com' );
define('access_denied_conatct_url', 'http://paratheme.com/contact' );
define('access_denied_plugin_name', 'Access Denied' );
define('access_denied_share_url', 'http://wordpress.org/plugins/access-denied/' );

require_once( plugin_dir_path( __FILE__ ) . 'includes/access-denied-functions.php');








function access_denied_init_scripts()
	{
		wp_enqueue_script('jquery');

	}
add_action("init","access_denied_init_scripts");





register_activation_hook(__FILE__, 'access_denied_activation');


function access_denied_activation()
	{
		$access_denied_version= "1.0";
		update_option('access_denied_version', $access_denied_version); //update plugin version.
		
		$access_denied_customer_type= "pro"; //customer_type "pro"
		update_option('access_denied_customer_type', $access_denied_customer_type); //update plugin version.
	}





$access_denied_ip_block = get_option( 'access_denied_ip_block' );

if($access_denied_ip_block)
	{
	add_action('get_header', 'access_denied_maintenance_mode');
	}



function access_denied_maintenance_mode()
	{
		if(access_denied_is_ip_blocked()=='yes')
			{
				wp_die('Access Denied');
			}
	}



function access_denied_login_script()
	{

		wp_enqueue_script( 'custom-login', access_denied_plugin_url . 'js/login.js' );
	}

	$access_denied_loginform_block = get_option( 'access_denied_loginform_block' );	


	if($access_denied_loginform_block)
		{
			
		if(access_denied_is_ip_blocked()=='yes')
			{
			add_action( 'login_enqueue_scripts', 'access_denied_login_script' );
			add_filter( 'login_message', 'access_denied_login_message' );
			}
			

		}


function access_denied_login_message( $message ) {
    if ( empty($message) ){
        return '<p style="text-align:center;font-weight: bold;color: #f00;">Access Denied</p>';
    } else {
        return $message;
    }
}





















add_action('admin_menu', 'access_denied_menu_init');


	
function access_denied_menu_help(){
	include('access-denied-help.php');	
}


function access_denied_menu_settings(){
	include('access-denied-settings.php');	
}



function access_denied_menu_init()
	{
		
		
add_menu_page(__('Access Denied Settings','access_denied'), __('Access Denied','access_denied'), 'manage_options', 'access_denied_menu_settings', 'access_denied_menu_settings');
		
		
add_submenu_page('access_denied_menu_settings', __('Access Denied Help & Upgrade','kentopvc'), __('Help & Upgrade','kentopvc'), 'manage_options', 'access_denied_menu_help', 'access_denied_menu_help');


	}





?>