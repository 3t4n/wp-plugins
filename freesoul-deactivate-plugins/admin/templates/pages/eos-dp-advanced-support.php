<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
//Callback for deactivate by archive settings page
function eos_dp_advanced_support_callback(){
	if( !current_user_can( 'activate_plugins' ) ){
	?>
		<h2><?php _e( 'Sorry, you have not the right for this page','eos-dp' ); ?></h2>
		<?php
		return;
	}
	eos_dp_alert_plain_permalink();
	eos_dp_navigation();
	wp_nonce_field( 'eos_dp_advanced_support','eos_dp_advanced_support' );
	$opts = eos_dp_get_option( 'eos_dp_opts' );
	$email = isset( $opts['advanced_help_email'] ) ? esc_attr( $opts['advanced_help_email'] ): get_option( 'admin_email' );
	$username = isset( $opts['advanced_help_username'] ) ? esc_attr( $opts['advanced_help_username'] ): '';
	$password = isset( $opts['advanced_help_password'] ) ? esc_attr( $opts['advanced_help_password'] ): '';
	$privacy_url = 'https://freesoul-deactivate-plugins.com/remote-support-privacy-policy/';
	$terms_url = 'https://freesoul-deactivate-plugins.com/remote-support-terms-and-conditions/';
	?>
	<section id="eos-dp-advanced-support-section" class="eos-dp-section">
		<h2><?php _e( 'Premium Support.','eos-dp' ); ?></h2>	
		<form class="margin-top-32px" autocomplete="off" autofill="off">	
			<h4 class="eos-first-option-title"><?php _e( 'Remote support permission','eos-dp' ); ?></h4>
			<div>
				<select id="advanced_help_permission">
					<?php $selected = isset( $opts['advanced_help_permission'] ) && '' === $opts['advanced_help_permission'] ? ' selected' : ''; ?>
					<option value=""<?php echo $selected; ?>><?php _e( "Don't allow remote support","eos-dp" ); ?></option>
					<?php $selected = isset( $opts['advanced_help_permission'] ) && 'allowed' === $opts['advanced_help_permission'] ? ' selected' : ''; ?>
					<option value="allowed"<?php echo $selected; ?>><?php _e( "Allow remote support","eos-dp" ); ?></option>
				</select>
				<p id="eos-dp-allow-remote-help-msg" class="eos-dp-error eos-hidden"><?php _e( 'You must allow the remote help','eos-dp' ); ?></p>
				<p><?php _e( 'If you allow the remote support and give us your site URL, the username and the password below, we will be able to check your pages disabling plugins in preview mode without logging into your backend','eos-dp' ); ?></p>
				<p><?php _e( 'This is useful if you want help for the set up without giving your backend credentials to anybody.','eos-dp' ); ?></p>
				<p><?php _e( 'Choose your username and password below.','eos-dp' ); ?></p>
			</div>
			<h4><?php _e( 'Your email','eos-dp' ); ?></h4>
			<div>
				<input type="email" id="advanced_help_email" name="advanced_help_email" data-value="<?php echo $email; ?>" value="<?php echo $email; ?>" data-lpignore="true" autocomplete="off" autofill="off" />
				<p id="eos-dp-email-msg" class="eos-dp-error eos-hidden"><?php _e( 'The email must be a valid email','eos-dp' ); ?></p>
			</div>
			<h4><?php _e( 'Username','eos-dp' ); ?></h4>
			<div>
				<input type="text" id="advanced_help_username" name="advanced_help_username" data-value="<?php echo $username; ?>" value="<?php echo $username; ?>" data-lpignore="true" autocomplete="off" autofill="off" />
				<p id="eos-dp-username-msg" class="eos-dp-error eos-hidden"><?php _e( 'The username must be a valid username','eos-dp' ); ?></p>
			</div>
			<h4><?php _e( 'Password','eos-dp' ); ?></h4>
			<div style="position:relative;display:inline-block;margin-top:-5px;">
				<input type="password" id="advanced_help_password" name="advanced_help_password" data-value="<?php echo $password; ?>" value="<?php echo $password; ?>" data-lpignore="true" autocomplete="off" autofill="off" />
				<span style="position:absolute;<?php echo is_rtl() ? 'left' : 'right'; ?>:2px;top:4px;" id="eos-show-psw" onclick="javascript:jQuery('#eos-show-psw').addClass('eos-hidden');jQuery('#eos-hide-psw').removeClass('eos-hidden');jQuery('#advanced_help_password').attr('type','text');"><span class="dashicons dashicons-visibility"></span></span>
				<span style="position:absolute;<?php echo is_rtl() ? 'left' : 'right'; ?>:2px;top:4px;" class="eos-hidden" id="eos-hide-psw" onclick="javascript:jQuery('#eos-show-psw').removeClass('eos-hidden');jQuery('#eos-hide-psw').addClass('eos-hidden');jQuery('#advanced_help_password').attr('type','password');"><span class="dashicons dashicons-hidden"></span></span>
				<p id="eos-dp-password-msg" class="eos-dp-error eos-hidden"><?php _e( 'Please provide a strong password','eos-dp' ); ?></p>
			</div>
			<span style="margin-top:-5px;" class="button" onclick="javascript:var text='';var charset = 'abcdefghijklmnopqrstuvwxyz0123456789';for( var i=0; i < 16; i++ ){text += charset.charAt(Math.floor(Math.random() * charset.length));}jQuery('#advanced_help_password').val(text);"><?php _e( 'Generate password','eos-dp' ); ?></span>		
			<div class="eos-dp-margin-top-48">
				<p>
					<input type="checkbox" id="eos-dp-remote-help-agreement" /><span><?php printf( __( 'I have read and agree with the %sprivacy policy%s and %sterms and conditions%s','eos-dp' ),'<a href="'.$privacy_url.'" target="_blank" rel="noopener">','</a>','<a href="'.$terms_url.'" target="_blank" rel="noopener">','</a>' ); ?></span>
					<p id="eos-dp-agreement-msg" class="eos-dp-error eos-hidden"><?php _e( 'You have to agree with the privacy policy and terms and conditions','eos-dp' ); ?></p>
				</p>
				<p>
					<span id="eos-dp-remote-help-send" class="button"><?php _e( 'Send us your premium support request','eos-dp' ); ?></span>
					<?php eos_dp_ajax_loader_img(); ?>
					<div style="display:inline-block">
						<div class="eos-hidden eos-dp-opts-msg notice notice-success eos-dp-opts-msg_success msg_response" style="padding:10px;margin:10px;">
							<span><?php echo __( 'Request send.','eos-dp' ); ?></span>
						</div>
						<div class="eos-dp-opts-msg_failed eos-dp-opts-msg notice notice-error eos-hidden msg_response" style="padding:10px;margin:10px;">
							<span><?php echo __( 'Something went wrong, maybe you need to refresh the page and try again, but you will lose all your changes','eos-dp' ); ?></span>
						</div>
						<div class="eos-dp-opts-msg_warning eos-dp-opts-msg notice notice-warning eos-hidden msg_response" style="padding:10px;margin:10px;">
							<span></span>
						</div>
					</div>					
				</p>
			</div>
		</form>
	</section>
	<?php
	eos_dp_save_button();
}