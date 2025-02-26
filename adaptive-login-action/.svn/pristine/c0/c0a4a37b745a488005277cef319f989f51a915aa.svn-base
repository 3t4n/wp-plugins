<?php
/*
 * WPGear. 
 * Adaptive Login Action
 * uninstall.php
 */	

	if( !defined( 'ABSPATH' ) && !defined( 'WP_UNINSTALL_PLUGIN' ) )
		exit();
	
	$AdaptiveLoginAction_Options = AdaptiveLoginAction_Get_Options();
	
	$AdaptiveLoginAction_Clearing = $AdaptiveLoginAction_Get_Options['clearing'];
	
	if ($AdaptiveLoginAction_Clearing) {
		// Remove Options & Users Data
		global $wpdb;
		
		$AdaptiveLoginAction_options_table = $wpdb -> prefix .'options';
		
		$Query = "
			DELETE 
			FROM $AdaptiveLoginAction_options_table 
			WHERE option_name LIKE 'adaptive-login-action_%'
		";
		
		$wpdb -> query($Query); // phpcs:ignore 
	}