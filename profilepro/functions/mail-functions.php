<?php

	/**
	Sends mail
	This function manage the Mail stuff sent by plugin
	to users
	**/
	
	function profilepro_set_content_type( $content_type ) {
		return 'text/html';
	}

	function profilepro_mail($id, $template=null, $var1=null, $form=null, $from_user=null) {
		global $profilepro;
		$general_setting = get_option('profilepro_general_settings');
		$email_template = get_option('profilepro_email_settings');
		add_filter( 'wp_mail_content_type', 'profilepro_set_content_type' );
		$user = get_userdata($id);
		$builtin = array(
			'{PROFILEPRO_ADMIN_EMAIL}' => profilepro_get_option('from_email_address'),
			'{PROFILEPRO_BLOGNAME}' =>profilepro_get_option('from_email_name'),
			'{PROFILEPRO_BLOG_URL}' => home_url(),
			'{PROFILEPRO_BLOG_ADMIN}' => admin_url(),
			'{PROFILEPRO_LOGIN_URL}' => $profilepro->api->permalink(0, 'login'),
			'{PROFILEPRO_USERNAME}' => $user->user_login,
			'{PROFILEPRO_FIRST_NAME}' => profilepro_profile_details('first_name', $user->ID ),
			'{PROFILEPRO_LAST_NAME}' => profilepro_profile_details('last_name', $user->ID ),
			'{PROFILEPRO_NAME}' => profilepro_profile_details('display_name', $user->ID ),
			'{PROFILEPRO_EMAIL}' => $user->user_email,
			'{PROFILEPRO_PROFILE_LINK}' => $profilepro->api->permalink( $user->ID ),
			'{PROFILEPRO_VALIDATE_URL}' => $profilepro->api->create_validate_url( $user->ID ),
		    '{PROFILEPRO_PASSWORD_RESET_LINK}' => $profilepro->api->permalink(0, 'login')."?reset=true"
		);
		
		if (isset($var1) && !empty($var1) ){
			$builtin['{VAR1}'] = $var1;
		}
		
		if(isset($from_user) && !empty($from_user)){
			$user_from=get_userdata($from_user);
			$builtin['{PROFILEPRO_FROM_NAME}'] = $user_from->user_login;
		}
		
		if (isset($form) && $form != ''){
			$profile_fields = $profilepro->api->profilepro_extract_profile_for_mail( $user->ID, $form );
			$builtin['{PROFILEPRO_PROFILE_FIELDS}'] = $profile_fields['output'];
			$builtin = array_merge($builtin,$profile_fields['custom_fields']);
		}
		
		$search = array_keys($builtin);
		$replace = array_values($builtin);

		$headers = 'From: '.$builtin["{PROFILEPRO_BLOGNAME}"].' <'.$builtin["{PROFILEPRO_ADMIN_EMAIL}"].'>' . "\r\n";

		
		if( $template == 'reset_password' ){
			$subject = $email_template['passwordreset_subject'];
			$subject = str_replace( $search, $replace, $subject );
			$message = nl2br($email_template['passwordreset_content']);
			$message = str_replace( $search, $replace, $message );
		}
		
		/////////////////////////////////////////////////////////
		/* new user's account */
		/////////////////////////////////////////////////////////
		if ($template == 'newaccount' ) {
			if( profilepro_get_option('new_user_notification')=='1')
			{			
				$subject = $email_template['welcome_email_subject'];
				$subject = str_replace( $search, $replace, $subject );
				$message = nl2br($email_template['welcome_email_content']);
				$message = str_replace( $search, $replace, $message );

			}
		}
		
		if($template=="passwordchange")
		{
			$subject = $email_template('mail_password_change_s');
			$subject = str_replace( $search, $replace, $subject );
			$message = nl2br($email_template('mail_password_change'));
			$message = str_replace( $search, $replace, $message );

		}
	
		if ($template == 'verifyemail'){
			$subject = $email_template['verify_email_s'];
			$subject = str_replace( $search, $replace, $subject );
			$message = nl2br($email_template['verify_email_c']);
			$message = str_replace( $search, $replace, $message );
		}
			
		if( $template == 'pendingadminapprove' ){
			$subject = $email_template['awaiting_admin_approval_s'];
			$subject = str_replace( $search, $replace, $subject );
			$message = nl2br($email_template['awaiting_admin_approval_c']);
			$message = str_replace( $search, $replace, $message );
			
		}
		
		if( !empty( $subject) && !empty( $message ) ){
			$message = html_entity_decode(nl2br($message));
			wp_mail( $user->user_email, $subject, $message, $headers );
		}
		
}
