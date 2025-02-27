<?php 
/*
Plugin Name: Contact Info
Plugin URI: https://wordpress.org/plugins/contact-info/
Description: This Plugin will allow the admin user to update the contact information and display them using functions and shortcodes. This includes Phone no, Email, and Address.
Version: 3.1.8
Text Domain: contact-info
Author: aviplugins.com
Author URI: https://www.aviplugins.com/
*/	

/**
	  |||||   
	<(`0_0`)> 	
	()(afo)()
	  ()-()
**/

/* 
* Create more icons at https://fontawesome.com/v4.7.0/icons/
*
* Add Icons at config/config_general.php
*/

define( 'CI_DIR_NAME', 'contact-info' );
define( 'CI_DIR_PATH', dirname( __FILE__ ) );

function ci_plug_install(){
	include_once CI_DIR_PATH . '/config/config-general.php';
	include_once CI_DIR_PATH . '/includes/class-settings.php';
	include_once CI_DIR_PATH . '/includes/class-scripts.php';
	include_once CI_DIR_PATH . '/contact-info-widget.php';
	include_once CI_DIR_PATH . '/functions.php';
	new Contact_info;
	new Contact_Info_Scripts;
}

class CI_Plugin_Init {
	function __construct() {
		ci_plug_install();
	}
}
new CI_Plugin_Init;

add_shortcode( 'ci', 'ci_sc_function' );

add_action( 'widgets_init', function(){ register_widget( 'Contact_Info_Widget' ); } );

add_action( 'plugins_loaded', 'contact_info_text_domain' );