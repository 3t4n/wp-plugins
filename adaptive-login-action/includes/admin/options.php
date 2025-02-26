<?php
/*
 * WPGear. 
 * Adaptive Login Action
 * options.php
 */

	$AdaptiveLoginAction_Nonce = 'Update_Options_Adaptive-Login-Action';
	$nonce = wp_create_nonce ($AdaptiveLoginAction_Nonce);	
	
	$AdaptiveLoginAction_Action = isset($_REQUEST['action']) ? sanitize_text_field (wp_unslash($_REQUEST['action'])) : null;
	
	if ($AdaptiveLoginAction_Action == 'Update') {
		$WP_Nonce 									= isset($_REQUEST['_wpnonce']) ? sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ) : 'none';	
		$AdaptiveLoginAction_AdminOnly 				= isset($_REQUEST['adaptive_login_action_option_adminonly']) ? 1 : 0;	
		$AdaptiveLoginAction_Enable 				= isset($_REQUEST['adaptive_login_action_option_enable']) ? 1 : 0;	
		$AdaptiveLoginAction_Clearing 				= isset($_REQUEST['adaptive_login_action_option_clearing']) ? 1 : 0;	
		$AdaptiveLoginAction_SecretKey				= isset($_REQUEST['adaptive_login_action_option_secretkey']) ? sanitize_text_field( wp_unslash( $_REQUEST['adaptive_login_action_option_secretkey'] ) ) : '';
		$AdaptiveLoginAction_WhiteListIP 			= isset($_REQUEST['adaptive_login_action_option_whitelist_ip']) ? sanitize_textarea_field( wp_unslash( $_REQUEST['adaptive_login_action_option_whitelist_ip'] ) ) : '';
		$AdaptiveLoginAction_WhiteListAutoUpdate 	= isset($_REQUEST['adaptive_login_action_option_whitelist_ip_autoupdate']) ? 1 : 0;	
	
		if (!wp_verify_nonce($WP_Nonce, $AdaptiveLoginAction_Nonce)) {
			?>
				<div class="wrap">
					<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
					<hr>
					<div class="hackinfo_options_box">						
						<?php echo esc_html( __('Warning! Data Incorrect. Update Disable.', 'adaptive-login-action') ); ?>
					</div>
				</div>
			<?php
			
			exit;
		}	
	
        $AdaptiveLoginAction_WhiteListIP_txt 	= '';
        $AdaptiveLoginAction_WhiteListIP_Wrong 	= '';

		if ($AdaptiveLoginAction_WhiteListIP) {
			$AdaptiveLoginAction_WhiteListIP = explode(PHP_EOL, $AdaptiveLoginAction_WhiteListIP);				

			foreach ($AdaptiveLoginAction_WhiteListIP as $Item) {
				$Item = trim ($Item);
				$Item = str_replace (array("\r\n", "\n", "\r"), '', $Item);			
				
				if (filter_var($Item, FILTER_VALIDATE_IP)) {
					$AdaptiveLoginAction_WhiteListIP_txt .= "$Item,";
				} else {
					if ($Item != '') {
						$AdaptiveLoginAction_WhiteListIP_Wrong .= "$Item\r\n";
					}
				}
			}
		}	

		// Save Options.
		$AdaptiveLoginAction_Options = array(
			'adminonly' => $AdaptiveLoginAction_AdminOnly,
			'enable' => $AdaptiveLoginAction_Enable,
			'clearing' => $AdaptiveLoginAction_Clearing,
			'secretkey' => $AdaptiveLoginAction_SecretKey,
			'whitelist_ip' => $AdaptiveLoginAction_WhiteListIP_txt,
			'whitelist_ip_autoupdate' => $AdaptiveLoginAction_WhiteListAutoUpdate,
		);

		update_option( 'adaptive-login-action_option', $AdaptiveLoginAction_Options ); // phpcs:ignore		
		
		if ($AdaptiveLoginAction_WhiteListIP_Wrong) {
			?>
			<div class="adaptive_login_action_warning" style="margin: 40px;">				
				<?php echo esc_html( __('Not a valid IP address:', 'adaptive-login-action') ); ?>
				<div>
					<?php echo esc_html( $AdaptiveLoginAction_WhiteListIP_Wrong ); ?>
				</div>
			</div>
			<?php			
		}
	}
	
	$AdaptiveLoginAction_Options = AdaptiveLoginAction_Get_Options();
	
	$AdaptiveLoginAction_AdminOnly 			= $AdaptiveLoginAction_Options['adminonly'];
	$AdaptiveLoginAction_Enable				= $AdaptiveLoginAction_Options['enable'];
	$AdaptiveLoginAction_Clearing 			= $AdaptiveLoginAction_Options['clearing'];		
	$AdaptiveLoginAction_SecretKey 			= $AdaptiveLoginAction_Options['secretkey'];
	$AdaptiveLoginAction_WhiteListIP 		= $AdaptiveLoginAction_Options['whitelist_ip'];
	$AdaptiveLoginAction_WhiteListAutoUpdate 	= $AdaptiveLoginAction_Options['whitelist_ip_autoupdate'];
	
	if ($AdaptiveLoginAction_AdminOnly) {
		if (!current_user_can('edit_dashboard')) {
			?>
			<div class="adaptive-login-action_warning" style="margin: 40px;">				
				<?php echo esc_html( __('Sorry, you are not allowed to view this page.', 'adaptive-login-action') ); ?>
			</div>
			<?php
			
			return;
		}		
	}	
	
	?>
	<div class="wrap">
		<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
		<hr>
		
		<div class="adaptive-login-action_options_box">
			<form name="form_AdaptiveLoginAction_Options" method="post" style="margin-top: 20px;">
				<h3><?php echo esc_html( __('General', 'adaptive-login-action') ); ?></h3>
				<div style="margin-left: 20px; margin-bottom: 10px;">
					<table class="form-table">
						<tbody>
							<tr>
								<th scope="row" class="adaptive_login_action_option_field_label">
									<label for="adaptive_login_action_option_adminonly">
										<?php echo esc_html( __('Enable this Page for Admin only', 'adaptive-login-action') ); ?>
									</label>
								</th>
								<td class="adaptive_login_action_options_field_input">
									<input id="adaptive_login_action_option_adminonly" name="adaptive_login_action_option_adminonly" type="checkbox" <?php if($AdaptiveLoginAction_AdminOnly) {echo 'checked';} ?>>
									<span class="adaptive_login_action_options_field_description">
										<?php echo esc_html( __('On/Off', 'adaptive-login-action') ); ?>
									</span>
								</td>
							</tr>
							
							<tr>
								<th scope="row" class="adaptive_login_action_option_field_label">
									<label for="adaptive_login_action_option_enable">
										<?php echo esc_html( __('Enable Adaptive Login Action', 'adaptive-login-action') ); ?>
									</label>
								</th>
								<td class="adaptive_login_action_options_field_input">
									<input id="adaptive_login_action_option_enable" name="adaptive_login_action_option_enable" type="checkbox" <?php if($AdaptiveLoginAction_Enable) {echo 'checked';} ?>>
									<span class="adaptive_login_action_options_field_description">
										<?php echo esc_html( __('On/Off', 'adaptive-login-action') ); ?>
									</span>
								</td>
							</tr>
							
							<tr>
								<th scope="row" class="adaptive_login_action_option_field_label">
									<label for="adaptive_login_action_option_secretkey">
										<?php echo esc_html( __('Secret Key', 'adaptive-login-action') ); ?>
									</label>
								</th>
								<td class="adaptive_login_action_options_field_input">
									<input id="adaptive_login_action_option_secretkey" name="adaptive_login_action_option_secretkey" type="text" value="<?php echo esc_attr( $AdaptiveLoginAction_SecretKey ); ?>">
									<span class="adaptive_login_action_options_field_description">
										<?php echo esc_html( __('Extended Security', 'adaptive-login-action') ); ?>
									</span>
								</td>
							</tr>							
						</tbody>
					</table>
				</div>
				
				<hr>
					
				<h3><?php echo esc_html( __('IP Controls', 'adaptive-login-action') ); ?></h3>
				<div style="margin-left: 20px; margin-bottom: 10px;">
					<table class="form-table">
						<tbody>
							<tr>
								<th scope="row" class="adaptive_login_action_option_field_label">
									<label for="adaptive_login_action_option_whitelist_ip">
										<?php echo esc_html( __('White List IP', 'adaptive-login-action') ); ?>
									</label>
								</th>
								<td class="adaptive_login_action_options_field_input">
									<textarea id="adaptive_login_action_option_whitelist_ip" name="adaptive_login_action_option_whitelist_ip" rows="4" class="adaptive_login_action_options_whitelist_ip"><?php echo esc_attr( $AdaptiveLoginAction_WhiteListIP); ?></textarea>
									<span class="adaptive_login_action_options_field_description">
										<?php echo esc_html( __('one IP per line', 'adaptive-login-action') ); ?>
									</span>
								</td>
							</tr>							
							<tr>
								<th scope="row" class="adaptive_login_action_option_field_label">
									<label for="adaptive_login_action_option_whitelist_ip_autoupdate">
										<?php echo esc_html( __('Auto Update "White List IP"', 'adaptive-login-action') ); ?>
									</label>
								</th>
								<td class="adaptive_login_action_options_field_input">
									<input id="adaptive_login_action_option_whitelist_ip_autoupdate" name="adaptive_login_action_option_whitelist_ip_autoupdate" type="checkbox" <?php if($AdaptiveLoginAction_WhiteListAutoUpdate) {echo 'checked';} ?>>
									<span class="adaptive_login_action_options_field_description">
										<?php echo esc_html( __('On/Off', 'adaptive-login-action') ); ?>
									</span>
								</td>
							</tr>	
						</tbody>
					</table>
				</div>
				
				<hr>
				
				<h3><?php echo esc_html( __('Clearing', 'adaptive-login-action') ); ?></h3>
				<div style="margin-left: 20px; margin-bottom: 10px;">
					<table class="form-table">
						<tbody>
							<tr>
								<th scope="row" class="adaptive_login_action_option_field_label">
									<label for="adaptive_login_action_option_clearing">
										<?php echo esc_html( __('Delete MetaData with Uninstall Plugin.', 'adaptive-login-action') ); ?>
									</label>
								</th>
								<td class="adaptive_login_action_options_field_input">
									<input id="adaptive_login_action_option_clearing" name="adaptive_login_action_option_clearing" type="checkbox" <?php if($AdaptiveLoginAction_Clearing) {echo 'checked';} ?>>
									<span class="adaptive_login_action_options_field_description">
										<?php echo esc_html( __('On/Off', 'adaptive-login-action') ); ?>
									</span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>

				<hr>
				<div style="margin-top: 10px; margin-bottom: 5px; text-align: right;">
					<input id="adaptive_login_action_option_save" type="submit" class="button button-primary" style="margin-right: 5px;" value="<?php echo esc_html( __('Save', 'adaptive-login-action') ); ?>">
				</div>
				<input id="action" name="action" type="hidden" value="Update">
				<input id="_wpnonce" name="_wpnonce" type="hidden" value="<?php echo esc_attr($nonce); ?>">
			</form>
		</div>			
	</div>
