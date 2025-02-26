<?php
/*
Plugin Name: Adaptive Login Action
Plugin URI: https://wpgear.xyz/adaptive-login-action
Description: Compromise between Comfort and Paranoia.
Version: 1.6
Text Domain: adaptive-login-action
Domain Path: /languages
Author: WPGear
Author URI: https://wpgear.xyz
License: GPLv2
*/

	$AdaptiveLoginAction_plugin_url = plugin_dir_url( __FILE__ ); // со слэшем на конце	
	
	$AdaptiveLoginAction_LocalePath = dirname (plugin_basename ( __FILE__ )) . '/languages/';
	__('Compromise between Comfort and Paranoia.', 'adaptive-login-action');
	
	include_once( __DIR__ .'/includes/functions.php' );
	include_once( __DIR__ .'/includes/admin/admin.php' );
	
	/* Translate.
	----------------------------------------------------------------- */
	add_action ('plugins_loaded', 'AdaptiveLoginAction_Action_plugins_loaded');
	function AdaptiveLoginAction_Action_plugins_loaded() {
		global $AdaptiveLoginAction_LocalePath;		
		
		load_plugin_textdomain ('adaptive-login-action', false, $AdaptiveLoginAction_LocalePath);
	}	

	/* Login Form - Styles.
	----------------------------------------------------------------- */	
	add_action ('login_enqueue_scripts', 'AdaptiveLoginAction_Action_login_enqueue_scripts' );	
	function AdaptiveLoginAction_Action_login_enqueue_scripts ($hook) {	
		if ($GLOBALS['pagenow'] == 'wp-login.php') {
			global $AdaptiveLoginAction_plugin_url;			
		
			wp_enqueue_style ('adaptive-login-action_style', $AdaptiveLoginAction_plugin_url .'style.css');	 // phpcs:ignore 
		}
	}		
	
	/* Login Form
	----------------------------------------------------------------- */
	add_action('login_form', 'AdaptiveLoginAction_Action_login_form');
	function AdaptiveLoginAction_Action_login_form(){
		$AdaptiveLoginAction_Options = AdaptiveLoginAction_Get_Options();
		
		$AdaptiveLoginAction_Enable			= $AdaptiveLoginAction_Options['enable'];
		$AdaptiveLoginAction_SecretKey 		= $AdaptiveLoginAction_Options['secretkey'];
		$AdaptiveLoginAction_WhiteListIP 	= $AdaptiveLoginAction_Options['whitelist_ip'];
		
		if ($AdaptiveLoginAction_Enable) {
			$UserIP = AdaptiveLoginAction_GetUserIP();
			
			$AdaptiveLoginAction_NormalMode = false;		
			
			if ($UserIP) {
				$AdaptiveLoginAction_IP = get_option('adaptive-login-action_ip_' .$UserIP, array());
				
				$AdaptiveLoginAction_LastOK = isset($AdaptiveLoginAction_IP['last_ok']) ? $AdaptiveLoginAction_IP['last_ok'] : 0;
				
				if ($AdaptiveLoginAction_WhiteListIP && $AdaptiveLoginAction_LastOK == 1) {
					$AdaptiveLoginAction_WhiteListIP = explode(",", $AdaptiveLoginAction_WhiteListIP);				
					
					foreach ($AdaptiveLoginAction_WhiteListIP as $Item) {
						$Item = trim ($Item);
						$Item = str_replace (array("\r\n", "\n", "\r"), '', $Item);
				
						if ($UserIP == $Item) {						
							$AdaptiveLoginAction_NormalMode = true;
						} 
					}
				}
			}

			if ($AdaptiveLoginAction_NormalMode) {
				// Normal Form.
				if ($UserIP) {
					?>
					<div class="adaptive-login-action_normal_field_ip">
						IP: <span><?php echo esc_html( $UserIP ); ?></span>
					</div>
					<?php			
				}			
			} else {
				// Ext. Security.
				?>
				<p class="adaptive-login-action_field_secretkey">		
					<label for="adaptive-login-action_secretkey"><?php echo esc_html( __('Secret Key', 'adaptive-login-action') ); ?></label>
					<input id="adaptive-login-action_secretkey" name="adaptive-login-action_secretkey" type="password" class="input password-input"/>
				</p>
				<?php
				if ($UserIP) {
					?>
					<div class="adaptive-login-action_security_field_ip">
						IP: <span><?php echo esc_html( $UserIP ); ?></span> <?php echo esc_html( __('will be saved to DB.', 'adaptive-login-action') ); ?>
					</div>
					<?php			
				}			
			}

			return true;

		} else {
			return true;
		}		
	}	
	
	/* Check Secret Key
	----------------------------------------------------------------- */	
	add_filter('wp_authenticate_user', 'AdaptiveLoginAction_Filter_wp_authenticate_user', 10);	
	function AdaptiveLoginAction_Filter_wp_authenticate_user($user) {
		$AdaptiveLoginAction_Options = AdaptiveLoginAction_Get_Options();
		
		$AdaptiveLoginAction_Enable			= $AdaptiveLoginAction_Options['enable'];
		$AdaptiveLoginAction_SecretKey 		= $AdaptiveLoginAction_Options['secretkey'];
		
		if ($AdaptiveLoginAction_Enable) {
			$AdaptiveLoginAction_SecretKey_Input = isset($_REQUEST['adaptive-login-action_secretkey']) ? sanitize_text_field( wp_unslash( $_REQUEST['adaptive-login-action_secretkey'] ) ) : null; // phpcs:ignore
			
			if (! is_null($AdaptiveLoginAction_SecretKey_Input)) {
				if ($AdaptiveLoginAction_SecretKey_Input != $AdaptiveLoginAction_SecretKey) {				
					$message = __('Authentication Error!', 'adaptive-login-action');
					return new WP_Error ('secret_string_problem', $message);
				}
			}

			if (AdaptiveLoginAction_Check_Plugin_Installed ('new-users-monitor')) {
				// New Users Monitor. Integration.
				if (is_wp_error($user)) {
					global $NUM_Authentication_Msg;
					
					$message = $user -> get_error_message();

					if ($message == $NUM_Authentication_Msg) {
						return new WP_Error ('no_confirm_user', $message);	
					}
				}
			}
		} 

		return $user;
	}	
	
	/* After Login. LoginOK
	----------------------------------------------------------------- */	
	add_action('wp_login', 'AdaptiveLoginAction_Action_wp_login', 10, 2);
	function AdaptiveLoginAction_Action_wp_login($User_login, $user) {
		$AdaptiveLoginAction_Options = AdaptiveLoginAction_Get_Options();
		
		$AdaptiveLoginAction_Enable					= $AdaptiveLoginAction_Options['enable'];
		$AdaptiveLoginAction_WhiteListIP 			= $AdaptiveLoginAction_Options['whitelist_ip'];
		$AdaptiveLoginAction_WhiteListAutoUpdate 	= $AdaptiveLoginAction_Options['whitelist_ip_autoupdate'];
		
		if ($AdaptiveLoginAction_Enable) {
			$UserIP = AdaptiveLoginAction_GetUserIP();
			
			if ($AdaptiveLoginAction_WhiteListAutoUpdate) {
				// Auto Update "White List IP"			
				if ($UserIP) {
					if ($AdaptiveLoginAction_WhiteListIP) {
						if (!preg_match("/$UserIP/", $AdaptiveLoginAction_WhiteListIP)) {
							$AdaptiveLoginAction_WhiteListIP .= "$UserIP,";
							
							$AdaptiveLoginAction_Options['whitelist_ip'] = $AdaptiveLoginAction_WhiteListIP;
							update_option( 'adaptive-login-action_option', $AdaptiveLoginAction_Options ); // phpcs:ignore	
						}
					} else {
						$AdaptiveLoginAction_WhiteListIP = "$UserIP,";
						
						$AdaptiveLoginAction_Options['whitelist_ip'] = $AdaptiveLoginAction_WhiteListIP;
						update_option( 'adaptive-login-action_option', $AdaptiveLoginAction_Options ); // phpcs:ignore				
					}
				}			
			}
			
			if ($UserIP) {
				// Remember the Success of the Login from this IP
				$Success = true;
				
				AdaptiveLoginAction_Update_LoginIP ($UserIP, $Success);
			}
		}		
	}	
	
	/* Login Failed. LoginFailed
	----------------------------------------------------------------- */	
	add_action('wp_login_failed', 'AdaptiveLoginAction_Action_wp_login_failed');
	function AdaptiveLoginAction_Action_wp_login_failed ($username){
		$AdaptiveLoginAction_Enable = AdaptiveLoginAction_Get_Options('enable');

		if ($AdaptiveLoginAction_Enable) {
			$UserIP = AdaptiveLoginAction_GetUserIP();
			
			if (AdaptiveLoginAction_Check_Plugin_Installed ('new-users-monitor')) {
				// New Users Monitor. Integration.
				$is_User_Confirmed = false;

				$user = get_user_by ('login', $username);

				if ($user) {
					$User_ID = $user -> ID;
					
					$is_User_Confirmed = get_user_meta ($User_ID, 'num_confirm', true);	
				}
			} else {
				$is_User_Confirmed = true;
			}
			
			if ($is_User_Confirmed) {
				if ($UserIP) {
					// Remember the Failed of the Login from this IP
					$Success = false;
					
					AdaptiveLoginAction_Update_LoginIP ($UserIP, $Success);
				}
			}
		}
	}	
	
	/* Login Errors
	----------------------------------------------------------------- */
	add_filter('login_errors', 'AdaptiveLoginAction_Filter_login_errors');	
	function AdaptiveLoginAction_Filter_login_errors ($message) {
		$message = __('Authentication Error!', 'adaptive-login-action');

		return $message;
	}			