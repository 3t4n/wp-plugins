<?php
/**
* Plugin Name: asMember
* Plugin URI: https://asmember.de
* Description: Membership-Tool
* Version: 1.5.4
* Author: Alexander Suess
* License: GPL2
*/
if(!defined('ABSPATH'))exit;

// Path to the plugin directory
if( ! defined( 'ASMEMBER_PLUGIN_DIR' ) ) {
    define( 'ASMEMBER_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

// URL of the plugin
if( ! defined( 'ASMEMBER_PLUGIN_URL' ) ) {
    define( 'ASMEMBER_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}


$options=get_option('asmember_options_allgemein');

include_once("admin/admin.php");
include_once("admin/members.php");
include_once("admin/options.php");
include_once("admin/login-stat.php");
include_once("admin/memberships.php");
include_once("admin/bookings.php");
include_once("admin/newsletter.php");

include_once("public/user-login.php");
include_once("public/user-register.php");
include_once("public/user-password-reset.php");
include_once("public/shortcode-asmember-memberships.php");

if(!function_exists("asmember_include_styles"))
{
	function asmember_include_styles()
	{
		wp_register_style( 'asmember_css', ASMEMBER_PLUGIN_URL . 'assets/css/asmember.css' );
		wp_enqueue_style( 'asmember_css' );
	}
	add_action('wp_enqueue_scripts', 'asmember_include_styles');
}

if($options['asmember_options_use_bootstrap']==1)
{
	wp_register_script( 'bootstrap-js', ASMEMBER_PLUGIN_URL . 'assets/js/bootstrap.min.js', array( 'jquery' ), '4.3.1', true );
	wp_register_style( 'bootstrap-css', ASMEMBER_PLUGIN_URL . 'assets/css/bootstrap.min.css', array(), '4.3.1', 'all' );
	wp_enqueue_script( 'bootstrap-js' );
	wp_enqueue_style( 'bootstrap-css' );
}



wp_enqueue_style('thickbox');
wp_enqueue_script('thickbox');    



function  asmember_load_head_colors()
{
    $options=get_option("asmember_options_allgemein");
    
    echo "<style>";
    echo ":root {";
    
    if(isset($options["asmember_options_colors_primary"]) and $options["asmember_options_colors_primary"]!="")
    	echo "--asmember-primary: ".$options["asmember_options_colors_primary"].";";
	  	
	echo "}";

    echo "</style>\n";
    
}
add_action('wp_head', 'asmember_load_head_colors');










