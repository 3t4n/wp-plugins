<?php
/*
*	@PACKAGE Tracking Code To Thank You
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if(! class_exists('tctty_settings_page')){
	class tctty_setting_page{

		/*public function tctty_create_settings_page(){
				add_submenu_page('woocommerce', 
						__('WC Tracking Code Settings', 'tctty'), 
						__('WC Tracking Code', 'tctty'),
						'manage_options',
					 	'tctty_settings',
					 	'tctty_setting_page_callback'
						  );
		}*/

		public function tctty_add_section( $sections ) {	
			$sections['tctty'] = __( 'WC Tracking Code', 'tctty' );
			return $sections;
		}


	}
}