<?php

	$nonce = $_POST['PanaRegNonce'];
 
    // check to see if the submitted nonce matches with the
    // generated nonce we created earlier
    if ( ! wp_verify_nonce( $nonce, 'pana-registeration-nonce' ) )
        die ( 'لطفل یک روش دیگر برای هک کردن استفاده کنید.');
	$errors = new WP_Error();
	
	if (isset($_POST['register']) && $_POST['register'] && get_option('users_can_register')==1) :
		// Process signup form
		$posted = array(
			'username' 		=> $_POST['your_username'],
			'email' 		=> $_POST['your_email'],
			'password' 		=> $_POST['your_password'],
			'password_2' 	=> $_POST['your_password_2']
		);

		$posted = array_map('stripslashes', $posted);
		$posted['username'] = sanitize_user($posted['username']);
		// Validation
		if ( empty($posted['username']) ) $errors->add('required-username', __('Please enter a username.', 'pana_reg_localization') );
		if ( empty($posted['email']) ) $errors->add('required-email', __('Please enter your email address.', 'pana_reg_localization') );
		if ( empty($posted['password']) ) $errors->add('required-password', __('Please enter a password.', 'pana_reg_localization') );
		if ( empty($posted['password_2']) ) $errors->add('required-password_2', __('Please re-enter your password.', 'pana_reg_localization') );
		if ( $posted['password']!==$posted['password_2'] ) $errors->add('required-password', __('Passwords do not match.', 'pana_reg_localization') );

		// Check the username
		if ( !validate_username( $posted['username'] ) || strtolower($posted['username'])=='admin' ) :
			$errors->add('required-username', __('Invalid username.', 'pana_reg_localization') );
		elseif ( username_exists( $posted['username'] ) ) :
			$errors->add('required-username', __('An account is already registered with that username. Please choose another.', 'pana_reg_localization') );
		endif;
		
		// Check the e-mail address
		if ( !is_email( $posted['email'] ) ) :
			$errors->add('required-email', __('Invalid email address.', 'pana_reg_localization') );
		elseif ( email_exists( $posted['email'] ) ) :
			$errors->add('required-email', __('An account is already registered with your email address. Please login.', 'pana_reg_localization') );
		endif;
	    	// Errors and notices

		if ( !$errors->get_error_code() ) :
		
			do_action('register_post', $posted['username'], $posted['email'], $errors);
			$errors = apply_filters( 'registration_errors', $errors, $posted['username'], $posted['email'] );
				
            // if there are no errors, let's create the user account
			if ( !$errors->get_error_code() ) :
		
	            $user_id = wp_create_user( $posted['username'], $posted['password'], $posted['email'] );
	            if ( !$user_id ) :
	            	
	            	$errors->add('error', sprintf(__('<strong>ERROR</strong>: Couldn&#8217;t register you... please contact the <a href="mailto:%s">webmaster</a> !', 'pana_reg_localization'), get_option('admin_email')) );
	            	
	            else :
	
		            // Change role
		            wp_update_user( array ('ID' => $user_id, 'role' => 'subscriber') ) ;
		
		            // send the user a confirmation and their login details
		            wp_new_user_notification( $user_id, $posted['password'] );
		
		            // set the WP login cookie
		           // $secure_cookie = is_ssl() ? true : false;
		            //wp_set_auth_cookie($user_id, true, $secure_cookie);
		            
		            
		            echo '<div class="notice green"><span><strong><p>'.__('Sign-up success', 'pana_reg_localization').sprintf(__('</strong>In order to login use <a href="%s">log-in page</a>.</p></span></div>','pana_reg_localization'),admin_url());
		            exit;
	            
	            endif;
                  
			endif;
		
		endif;

	endif;

	    	if ( $errors->get_error_code() ) :
	    		
	    		echo '<div class="notice red"><span><strong><p>'.__('Sign-up error', 'pana_reg_localization').'</strong>'.wptexturize(str_replace('<strong>ERROR</strong>: ', '', $errors->get_error_message())).'</p></span></div>';
    			die();
	    	endif;	
?>
