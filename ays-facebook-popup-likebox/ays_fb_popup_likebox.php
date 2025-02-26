<?php
/*
Plugin name: AYS Facebook Popup Likebox
Plugin URI: http://ays-pro.com/
Description: Add your favorite facebook page to your website page popup
Author: AYS Project
Author URI: http://ays-pro.com/
Version:1.0.1
*/


/**********************************************************
*GLOBAL VARIABLES
***********************************************************/

$ays_nk_plugin_name = "AYS Facebook Popup Likebox";

//vercnum enq mer plugini settings-y db-i options table-ic
$ays_nk_options = get_option('ays_nk_settings');
if($ays_nk_option['fb_url']==""){
	$defaults = array(
	  'fb_url' => 'https://www.facebook.com/WordPress/',
	  'width' => '500',
	  'height' => '400',
	  'delay' => '2000',
	  'aucl' => '20',
	  'tbl' => 'Default text',
	);
	$ays_nk_options = wp_parse_args(get_option('ays_nk_settings'), $defaults);
}
/**********************************************************
*Setting up cookies
**********************************************************/
$ays_nk_time_expiered =  $ays_nk_options['siev'] * 60;
setcookie("ays_nk_fb_page_prom_ays_nk", "Yeaaaaaaaaaaaaaah", time() + $ays_nk_time_expiered);
/**********************************************************
*INCLUDES
***********************************************************/

include('includes/scripts.php');//controlss all css an js files
include('includes/data-processing.php');//controlls plugin data
if($_COOKIE["ays_nk_fb_page_prom_ays_nk"]!="Yeaaaaaaaaaaaaaah"){
	include('includes/display-functions.php');
}
include('includes/admin-page.php');//show plugin settings in wp dashboard

function ays_nk_plug_activate(){
	$defaults = array(
	  'fb_url' => 'https://www.facebook.com/WordPress/',
	  'width' => '500',
	  'height' => '400',
	  'delay' => '2000',
	  'aucl' => '20',
	  'tbl' => 'Default text',
	);
	$ays_nk_options = wp_parse_args(get_option('ays_nk_settings'), $defaults);	
}
function ays_nk_plug_deactivate(){
    delete_option("ays_nk_settings");
}
register_activation_hook( __FILE__, 'ays_nk_plug_activate');
register_deactivation_hook( __FILE__, 'ays_nk_plug_deactivate' );
?>