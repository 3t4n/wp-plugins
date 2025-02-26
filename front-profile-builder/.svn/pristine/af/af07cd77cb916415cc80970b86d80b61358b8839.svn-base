<?php
/**
 * Template Name: User Profile
 *
 * Allow users to update their profiles from Frontend.
 *
/* Get user info. */
// user registration login form
//frontpb_editprofile_form();
function gen_frontpb_editprofile_form() {
	// only show the registration form to non-logged-in members
	if(is_user_logged_in()) {
	//die('--->');
		global $usts_load_css;
		// set this to true so the CSS is loaded
		$usts_load_css = true;
		// check to make sure user registration is enabled
		$registration_enabled = get_option('users_can_register');
		// only show the registration form if allowed
    // 
		///if($registration_enabled) {
			$output = gen_frontpb_edit_profile_form_fields();
		/*} else {
			$output = __('User registration is not enabled');
		}*/
		return $output;
	}
}
// registration form fields
function gen_frontpb_edit_profile_form_fields() {
 //die('----->');
	ob_start(); ?>
    <script type="text/javascript">
      jQuery(function() {
        //jQuery( "#dtpdate" ).datepicker({ dateFormat: "yy-mm-dd" });
		    jQuery("#usts_user_dateofbirth").datepicker({dateFormat: "yy-mm-dd"});
		    //jQuery( "#dtptodate" ).datepicker({ dateFormat: "yy-mm-dd" });
      });
    </script> 
		<h3 class="usts_header"><?//php _e('Register New Account'); ?></h3>
 
		<?php 
		// show any error messages after form submission
		//echo '---';
		frontpb_show_error_messages(); ?>
 		 
        <?php $curr_user = wp_get_current_user(); 
		      //die(print_r($curr_user)); 
			  $first_name = get_user_meta( $curr_user->ID, "first_name", true );
			  $last_name = get_user_meta( $curr_user->ID, "last_name", true );
			  $dob = get_user_meta( $curr_user->ID, "_user_date_of_birth", true );
		?>
		<form id="usts_registration_form" class="usts_form" action="" method="POST">
			<fieldset>
				<p>
					<label for="usts_user_Login"><?php _e('Username'); ?></label>
					<input name="usts_user_login" id="usts_user_login" class="required" type="text" value="<?php echo $curr_user->user_login;?>" />
				</p>
				<p>
					<label for="usts_user_email"><?php _e('Email'); ?></label>
					<input name="usts_user_email" id="usts_user_email" class="required" type="email" value="<?php echo $curr_user->user_email;?>" />
				</p>
				<p>
					<label for="usts_user_first"><?php _e('First Name'); ?></label>
					<input name="usts_user_first" id="usts_user_first" type="text" value="<?php echo $first_name;?>" />
				</p>
				<p>
					<label for="usts_user_last"><?php _e('Last Name'); ?></label>
					<input name="usts_user_last" id="usts_user_last" type="text" value="<?php echo $last_name;?>" />
				</p>
        <p>
					<label for="usts_user_dateofbirth"><?php _e('Date Of Birth'); ?></label>
					<input name="usts_user_dateofbirth" id="usts_user_dateofbirth" type="text" value="<?php echo $dob;?>"/>
				</p>
				<p>
					<label for="password"><?php _e('Password'); ?></label>
					<input name="usts_user_pass" id="password" class="required" type="password"/>
				</p>
				<p>
					<label for="password_again"><?php _e('Password Again'); ?></label>
					<input name="usts_user_pass_confirm" id="password_again" class="required" type="password"/>
				</p>
				<p>
					<input type="hidden" name="usts_editprofile_nonce" value="<?php echo wp_create_nonce('usts-editprofile-nonce'); ?>"/>
					<input type="submit" value="<?php _e('Update Profile'); ?>"/>
				</p>
			</fieldset>
		</form>
	<?php
	return ob_get_clean();
}
// Update a user profile
function gen_frontpb_update_member_profile() {

	$curr_user = wp_get_current_user();
	/*if(!is_user_logged_in()) {
		echo "Please login";
	}
	else{
		//die(print_r($curr_user));
	}*/
   //------------------
  	if (isset( $_POST["usts_user_login"] ) && wp_verify_nonce($_POST['usts_editprofile_nonce'], 'usts-editprofile-nonce')) {
		$user_login		= $_POST["usts_user_login"];	
		$user_email		= $_POST["usts_user_email"];
		$user_first 	= $_POST["usts_user_first"];
		$user_last	 	= $_POST["usts_user_last"];
		
    
    $dob = $_POST["usts_user_dateofbirth"];
    $dobarr = explode("-", $dob);
    $dobformated = $dobarr[0].$dobarr[1].$dobarr[2];
    //$user_dateofbirth = $dobformated;
    //die(print_r($user_dateofbirth));
		$user_pass		= $_POST["usts_user_pass"];
		$pass_confirm 	= $_POST["usts_user_pass_confirm"];
 
		// this is required for username checks
		require_once(ABSPATH . WPINC . '/registration.php');
 
		if(!validate_username($user_login)) {
			// invalid username
			usts_errors()->add('username_invalid', __('Invalid username'));
		}
		if($user_login == '') {
			// empty username
			usts_errors()->add('username_empty', __('Please enter a username'));
		}
		if(!is_email($user_email)) {
			//invalid email
			usts_errors()->add('email_invalid', __('Invalid email'));
		}
		if($dob == ''){
		  // empty date of birth
				usts_errors()->add('dateofbirth_empty', __('Please enter Your Date of Birth'));
		}
		if($user_pass == '') {
			// passwords do not match
			usts_errors()->add('password_empty', __('Please enter a password'));
		}
		if($user_pass != $pass_confirm) {
			// passwords do not match
			usts_errors()->add('password_mismatch', __('Passwords do not match'));
		}
 
		$errors = usts_errors()->get_error_messages();
 //die('ID-'.$curr_user->ID);
        $userid = $curr_user->ID;
		// only create the user in if there are no errors
		if(empty($errors)) {
  //die('inside update functionss...');
			$updated_user_id = wp_update_user(array(
					'ID' => $userid,
					'user_login'		=> $user_login,
					'user_pass'	 		=> $user_pass,
					'user_email'		=> $user_email,
					'user_registered'	=> date('Y-m-d H:i:s'),
					'role'				=> 'subscriber'
				)
			);
			update_user_meta($userid,'first_name',$user_first);
			update_user_meta($userid,'last_name',$user_last);
			//update_user_meta($userid,'first_name',$user_first);
			
			//die('updated_user_id='.$updated_user_id);
			if($updated_user_id) {
        		update_usermeta( $updated_user_id, "_user_date_of_birth", $dob );
				// send an email to the admin alerting them of the registration
				wp_new_user_notification($updated_user_id);
 
				// log the new user in
				wp_setcookie($user_login, $user_pass, true);
				wp_set_current_user($updated_user_id, $user_login);	
				do_action('wp_login', $user_login);
 
				// send the newly created user to the home page after logging them in
				wp_redirect(home_url()); exit;
			}
 
		}
 
	}
}
add_action('init', 'gen_frontpb_update_member_profile');
