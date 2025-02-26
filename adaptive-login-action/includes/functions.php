<?php
/*
 * WPGear. 
 * Adaptive Login Action
 * functions.php
 */
 
	/* Get_Options / Option
	----------------------------------------------------------------- */ 	
	function AdaptiveLoginAction_Get_Options( $Option = null ) {
		$AdaptiveLoginAction_Options = get_option( "adaptive-login-action_option", array(
			'adminonly' => 1,
			'enable' => 1,
			'clearing' => 1,
			'secretkey' => '',
			'whitelist_ip' => '',
			'whitelist_ip_autoupdate' => 1,
			)
		);		
		
		$AdaptiveLoginAction_AdminOnly 				= isset( $AdaptiveLoginAction_Options['adminonly'] ) ? $AdaptiveLoginAction_Options['adminonly'] : 1;
		$AdaptiveLoginAction_Enable 				= isset( $AdaptiveLoginAction_Options['enable'] ) ? $AdaptiveLoginAction_Options['enable'] : 1;
		$AdaptiveLoginAction_Clearing 				= isset( $AdaptiveLoginAction_Options['clearing'] ) ? $AdaptiveLoginAction_Options['clearing'] : 1;
		$AdaptiveLoginAction_SecretKey 				= isset( $AdaptiveLoginAction_Options['secretkey'] ) ? $AdaptiveLoginAction_Options['secretkey'] : '';
		$AdaptiveLoginAction_WhiteListIP	 		= isset( $AdaptiveLoginAction_Options['whitelist_ip'] ) ? $AdaptiveLoginAction_Options['whitelist_ip'] : '';
		$AdaptiveLoginAction_WhiteListAutoUpdate 	= isset( $AdaptiveLoginAction_Options['whitelist_ip_autoupdate'] ) ? $AdaptiveLoginAction_Options['whitelist_ip_autoupdate'] : 1;

		if ($AdaptiveLoginAction_WhiteListIP) {
			$AdaptiveLoginAction_WhiteListIP = str_replace(",", "\r\n", $AdaptiveLoginAction_WhiteListIP);
		}
		
		$AdaptiveLoginAction_Options = array(
			'adminonly' => $AdaptiveLoginAction_AdminOnly,
			'enable' => $AdaptiveLoginAction_Enable,
			'clearing' => $AdaptiveLoginAction_Clearing,
			'secretkey' => $AdaptiveLoginAction_SecretKey,
			'whitelist_ip' => $AdaptiveLoginAction_WhiteListIP,
			'whitelist_ip_autoupdate' => $AdaptiveLoginAction_WhiteListAutoUpdate,
		);
		
		if ($Option) {
			return $AdaptiveLoginAction_Options[$Option];
		}

		return $AdaptiveLoginAction_Options;
	}
 
	/* Get User IP
	----------------------------------------------------------------- */	
	function AdaptiveLoginAction_GetUserIP () {
		$IP = null;
		
		if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] )) {
			$IP = sanitize_text_field( wp_unslash( $_SERVER['HTTP_CLIENT_IP'] ) );
		} else if ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] )) {
			$IP = sanitize_text_field( wp_unslash( $_SERVER['HTTP_X_FORWARDED_FOR'] ) );
		} else if ( ! empty( $_SERVER['REMOTE_ADDR'] )) {
			$IP = sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) );
		} else {
			// Очень Странная Ситуация
		}
		
		return $IP;
	}
	
	/* Update IP-Stat
	----------------------------------------------------------------- */
	function AdaptiveLoginAction_Update_LoginIP ($UserIP, $Success = true) {
		$AdaptiveLoginAction_IP = get_option('adaptive-login-action_ip_' .$UserIP, array());
		
		$AdaptiveLoginAction_IP_LoginTotal 		= isset($AdaptiveLoginAction_IP['total']) ? $AdaptiveLoginAction_IP['total'] : 0;
		$AdaptiveLoginAction_IP_LoginSuccess 	= isset($AdaptiveLoginAction_IP['success']) ? $AdaptiveLoginAction_IP['success'] : 0;
					
		$AdaptiveLoginAction_IP_LoginTotal += 1;
		
		if ($Success == true) {
			$AdaptiveLoginAction_LastOK = 1;	
			$AdaptiveLoginAction_IP_LoginSuccess += 1;
		} else {
			$AdaptiveLoginAction_LastOK = 0;
		}
		
		$AdaptiveLoginAction_IP = array (
			'last_ok' => $AdaptiveLoginAction_LastOK,
			'total' => $AdaptiveLoginAction_IP_LoginTotal,
			'success' => $AdaptiveLoginAction_IP_LoginSuccess,
		);
			
		update_option('adaptive-login-action_ip_' .$UserIP, $AdaptiveLoginAction_IP); // phpcs:ignore 
		update_option('adaptive-login-action_last_ok', $AdaptiveLoginAction_LastOK); // phpcs:ignore 
	}
	
	/* Check Plugin Installed
	----------------------------------------------------------------- */		
	function AdaptiveLoginAction_Check_Plugin_Installed ($Plugin_Slug = null) {
		$Result = false;
		
		if ($Plugin_Slug) {
			if (! function_exists ('get_plugins')) {
				require_once ABSPATH .'wp-admin/includes/plugin.php';
			}
			
			$Plugins = get_plugins();
			
			foreach ($Plugins as $Plugin) {
				$Plugin_TextDomain = $Plugin['TextDomain'];
				if ($Plugin_TextDomain == $Plugin_Slug) {
					$Result = true;
				}
			}			
		}	
		
		return $Result;
	}