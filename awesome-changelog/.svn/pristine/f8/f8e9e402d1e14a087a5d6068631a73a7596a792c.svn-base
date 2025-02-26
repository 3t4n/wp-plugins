<?php

/*
* @Author 		pickplugins
* Copyright: 	2015 pickplugins
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class class_ac_settings  {
	
	public function __construct(){

		add_action( 'admin_menu', array( $this, 'admin_menu' ), 12 );
    }
	
	public function admin_menu() {
		
		add_menu_page( __( 'Changelog', 'awesome-changelog' ), __( 'Changelog', 'awesome-changelog' ), 'manage_options', 'ac-settings', array( $this, 'ac_settings' ) );
		
		do_action( 'ac_action_admin_menus' );
	}
	
	public function ac_settings(){
		include( AC_PLUGIN_DIR. 'includes/menus/settings.php' );
	}	
		
} new class_ac_settings();

