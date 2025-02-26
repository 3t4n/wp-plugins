<?php

function profilepro_get_option( $option ) {
		$profilepro_default_options = profilepro_default_options();
		$settings = get_option('profilepro');
		switch($option){
		
			default:
				if (isset($settings[$option])){
					return $settings[$option];
				} else {
					if (isset($profilepro_default_options[$option])){
					return $profilepro_default_options[$option];
					}
				}
				break;
	}
}
	
	/* set a global option */
function profilepro_set_option($option, $newvalue){
		$settings = get_option('profilepro');
		$settings[$option] = $newvalue;
		update_option('profilepro', $settings);
}

function profilepro_default_options(){
		$array['slug'] = 'profile';
		$array['slug_register'] = 'register';
		$array['slug_edit'] = 'edit';
		$array['slug_login'] = 'login';
		$array['slug_logout'] = 'logout';
                $array['user_gravatar'] = 'n';
		
		$mail_verifyemail = __('Hi there,') . "\r\n\r\n";
		$mail_verifyemail .= __("Thanks for signing up at {PROFILEPRO_BLOGNAME}. You must confirm/validate your account before logging in.","profilepro") . "\r\n\r\n";
		$mail_verifyemail .= __("Please click on the following link to successfully activate your account:","profilepro") . "\r\n";
		$mail_verifyemail .= "{PROFILEPRO_VALIDATE_URL}" . "\r\n\r\n";
		$mail_verifyemail .= __('If you have any problems, please contact us at {PROFILEPRO_ADMIN_EMAIL}.','profilepro') . "\r\n\r\n";
		$mail_verifyemail .= __('Best Regards!','profilepro');
		
		$mail_newaccount = __('Hi there,') . "\r\n\r\n";
		$mail_newaccount .= __("Thanks for registering. Your account is now active.","profilepro") . "\r\n\r\n";
		$mail_newaccount .= __("To login please visit the following URL:","profilepro") . "\r\n";
		$mail_newaccount .= "{PROFILEPRO_LOGIN_URL}" . "\r\n\r\n";
		$mail_newaccount .= __('Your account e-mail: {PROFILEPRO_EMAIL}','profilepro') . "\r\n";
		$mail_newaccount .= __('Your account username: {PROFILEPRO_USERNAME}','profilepro') . "\r\n";
		$mail_newaccount .= __('Your account password: {VAR1}','profilepro') . "\r\n\r\n";
		$mail_newaccount .= __('If you have any problems, please contact us at {PROFILEPRO_ADMIN_EMAIL}.','profilepro') . "\r\n\r\n";
		$mail_newaccount .= __('Best Regards!','profilepro');
		
		$array['welcome_email_subject'] = sprintf(__('Welcome to %s!','profilepro'), get_bloginfo('name') );
		$array['welcome_email_content'] = $mail_newaccount;
		
		$array['verify_email_s'] = __('Verify your Account','profilepro');
		$array['verify_email_c'] = $mail_verifyemail;

		$array['new_user_approve']=0;
		$array['from_email_address']=get_bloginfo('admin_email');
		$array['from_email_name']=get_bloginfo('admin_name');
	
		

		
		return $array;
}	
