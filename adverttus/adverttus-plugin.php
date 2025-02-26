<?php
/**
* Plugin Name: Adverttus Plugin
* Plugin URI: https://adverttus.com/
* Description: This plugin helps Wordpress users who want to be partners with Adverttus to add the main JavaScript file (adverttusads.js) into their websites. So, before you use the plugin, make sure you have subscribed and submitted your website for review at adverttus.com. Adverttus is a web app that help websites managers and owners to turn their websites traffic into free ads.
* Version: 1.0
* Author: Adverttus
**/
if ( !function_exists( 'add_action' ) ) {
	echo 'This is a plugin, you can not access it directly';
	exit;
}
function add_adverttus_script() {
$adverttusSRC='https://gate.adverttus.com/js/adverttusads.js';
wp_enqueue_script( 'adverttusads', $adverttusSRC, array(), 1.1, true );
}
add_action( 'wp_enqueue_scripts', 'add_adverttus_script' );
?>
