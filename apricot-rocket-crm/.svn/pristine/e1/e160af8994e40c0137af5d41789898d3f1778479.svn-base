<?php
/*
Plugin Name: Apricotrocket CRM Plugin
Plugin URI:  https://crm.apricotrocket.com
Description: Make your website interactive by adding an integrated CRM database, custom forms, email newsletters, marketing automation and drip marketing tool.
Version:     1.0.3
Author:      Lee Thurburn
License:     GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
ob_clean();ob_start();

add_action( 'admin_menu', 'crm_ar_plugin_menu' );

function crm_ar_plugin_menu() {
	add_menu_page( 'Apricot Rocket CRM', 'Apricot Rocket CRM', 'manage_options', 'apricotrocket-dashboard', 'crm_ar_plugin_options' );
	
}


function crm_ar_plugin_options() {
	
$url='https://crm.apricotrocket.com';
wp_redirect($url);
exit();

}

function crm_ar_generate_custom_form($atts) {
	extract(shortcode_atts(array(
	  'form_sc' => 400,'fheight'=>400
	), $atts));
   
  
	$url = "https://crm.apricotrocket.com/api.php?fid=$form_sc";
	
	$cURL = curl_init();
	
	curl_setopt($cURL, CURLOPT_URL, $url);
	curl_setopt($cURL, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($cURL, CURLOPT_HTTPGET, true);
	curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Accept: application/json'
	));
	
	$result = curl_exec($cURL);
	
	curl_close($cURL);
	
	$json = json_decode($result,true);
	return $json['form_html'];

}


add_shortcode('customform', 'crm_ar_generate_custom_form');
add_filter('widget_text', 'do_shortcode');

function crm_ar_generate_directories($atts) {
	extract(shortcode_atts(array(
	  'dir_id' => 400,'fheight'=>400
	), $atts));
   
  
	$url = "https://crm.apricotrocket.com/api.php?dl=$dir_id";
	
	$cURL = curl_init();
	
	curl_setopt($cURL, CURLOPT_URL, $url);
	curl_setopt($cURL, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($cURL, CURLOPT_HTTPGET, true);
	curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Accept: application/json'
	));
	
	$result = curl_exec($cURL);
	
	curl_close($cURL);
	
	$json = json_decode($result,true);
	return $json['form_html'];

}


add_shortcode('dlisting', 'crm_ar_generate_directories');
add_filter('widget_text', 'do_shortcode');


// GENERATING REGISTER PROCESS

function crm_ar_generate_register_process($atts) {
	extract(shortcode_atts(array(
	'reg_uid' => 0,
	), $atts));
   
	$url = "https://crm.apricotrocket.com/api.php?rid=$reg_uid";
	
	$cURL = curl_init();
	
	curl_setopt($cURL, CURLOPT_URL, $url);
	curl_setopt($cURL, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($cURL, CURLOPT_HTTPGET, true);
	curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($cURL, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Accept: application/json'
	));
	
	$result = curl_exec($cURL);
	
	curl_close($cURL);
	
	$json = json_decode($result,true);
	return $json['form_html'];

}

add_shortcode('registration_process', 'crm_ar_generate_register_process');
add_filter('widget_text', 'do_shortcode');
?>