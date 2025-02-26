<?php
/*
*	@PACKAGE Tracking Code To Thank You
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if(! class_exists('tctty_save_settings')){
	
	class tctty_save_settings{
		
			public function tctty_save_admin_fields(){

				check_admin_referer('tctty_save_setting_fields_verify');
				
				if(!current_user_can('manage_options')){				
					wp_die('You are not allowed to edit settings');				
				}

				$tctty_label 	= sanitize_text_field($_POST['tctty_label']);
				$tctty_tr_code 	= sanitize_text_field($_POST['tctty_tr_code']);

				$values = array(
						'tctty_label' => $rvps_label,
						'tctty_tr_code' => $rvps_numb_products,
					);

				if($tctty_label == '' || $tctty_tr_code == '' ){
					wp_redirect(get_admin_url().'admin.php?page=tctty_settings&error='.urlencode('Error updating the options'));
				exit();	
				}

				update_option('tctty_setting', $values);				
				wp_redirect(get_admin_url().'admin.php?page=tctty_settings&success='.urlencode('settings saved'));
				exit();
			}
	}


}