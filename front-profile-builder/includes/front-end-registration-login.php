<?php
// user registration login form
function gen_frontpb_registration_form() {
 
	// only show the registration form to non-logged-in members
	if(!is_user_logged_in()) {
 
		global $usts_load_css;
 
		// set this to true so the CSS is loaded
		$usts_load_css = true;
 
		// check to make sure user registration is enabled
		$registration_enabled = get_option('users_can_register');
 
		// only show the registration form if allowed
    // 
		///if($registration_enabled) {
			$output = gen_frontpb_registration_form_fields();
		/*} else {
			$output = __('User registration is not enabled');
		}*/
		return $output;
	}
	else{
		echo "You are logged In. Please Logout to Do a Registration.";
	}
}
add_shortcode('frontpb_profilebuilder_registration', 'gen_frontpb_registration_form');

// user login form
function gen_frontpb_login_form() {
 
	if(!is_user_logged_in()) {
 
		global $usts_load_css;
 
		// set this to true so the CSS is loaded
		$usts_load_css = true;
 
		$output = gen_frontpb_login_form_fields();
	} else {
		// could show some logged in user info here
		// $output = 'user info here';
    ?>
    <script type="text/javascript">
      jQuery('.entry-title').hide();
    </script>
    <?php
    echo '<p><a style="float:left" href="'.wp_logout_url( home_url() ).'" class="icon-cancel standard-button button-logout"><h2>Logout</h2></a></p>';
	}
	return $output;
}
add_shortcode('frontpb_profilebuilder_login', 'gen_frontpb_login_form');

// registration form fields
function gen_frontpb_registration_form_fields() {
 
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
		gen_frontpb_show_error_messages(); ?>
 
		<form id="usts_registration_form" class="usts_form" action="" method="POST">
			<fieldset>
				<p>
					<label for="usts_user_Login"><?php _e('Username'); ?></label>
					<input name="usts_user_login" id="usts_user_login" class="required" type="text"/>
				</p>
				<p>
					<label for="usts_user_email"><?php _e('Email'); ?></label>
					<input name="usts_user_email" id="usts_user_email" class="required" type="email"/>
				</p>
				<p>
					<label for="usts_user_first"><?php _e('First Name'); ?></label>
					<input name="usts_user_first" id="usts_user_first" type="text"/>
				</p>
				<p>
					<label for="usts_user_last"><?php _e('Last Name'); ?></label>
					<input name="usts_user_last" id="usts_user_last" type="text"/>
				</p>
        <p>
					<label for="usts_user_dateofbirth"><?php _e('Date Of Birth'); ?></label>
					<input name="usts_user_dateofbirth" id="usts_user_dateofbirth" type="text"/>
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
					<input type="hidden" name="usts_register_nonce" value="<?php echo wp_create_nonce('usts-register-nonce'); ?>"/>
					<input type="submit" value="<?php _e('Register Your Account'); ?>"/>
				</p>
			</fieldset>
		</form>
	<?php
	return ob_get_clean();
}

// login form fields
function gen_frontpb_login_form_fields() {
 
	ob_start(); 
	$errors='';
	if ( isset($_REQUEST['checkemail']) && $_REQUEST['checkemail'] == 'confirm'){
    ?>
  		
    <p class="login-info">
        Check your email for a link to reset your password.
    </p>
    <?php }?>
		<h3 class="usts_header"><?//php _e('Login'); ?></h3>
 
		<?php
		// show any error messages after form submission
		gen_frontpb_show_error_messages(); ?>
 
		<form id="usts_login_form"  class="usts_form" action="" method="post">
			<fieldset>
				<p>
					<label for="usts_user_Login">Username</label>
					<input name="usts_user_login" id="usts_user_login" class="required" type="text"/>
				</p>
				<p>
					<label for="usts_user_pass">Password</label>
					<input name="usts_user_pass" id="usts_user_pass" class="required" type="password"/>
				</p>
				<p>
                	<div><input id="rememberme" type="checkbox" value="forever" name="rememberme">Remember Me</div>
					<input type="hidden" name="usts_login_nonce" value="<?php echo wp_create_nonce('usts-login-nonce'); ?>"/>
					<input id="usts_login_submit" type="submit" value="Login"/>
                    
				</p>
                
                <div>
                   <!--<a class="forgot-password" href="<?//php echo wp_lostpassword_url(); ?>"><?//php _e( 'Forgot password?', 'frontprofile-builder' ); ?></a>-->
                   <a class="forgot-password" href="<?php echo home_url( 'passwordlost-form' ); ?>"><?php _e( 'Forgot password?', 'frontprofile-builder' ); ?></a>
                   
                  |<a href="<?php echo get_option('siteurl')?>/index.php/registration-form/">Register</a>
                </div>
			</fieldset>
		</form>
	<?php
	return ob_get_clean();
}

// logs a member in after submitting a form
function gen_frontpb_login_member() {
 
	if(isset($_POST['usts_user_login']) && wp_verify_nonce($_POST['usts_login_nonce'], 'usts-login-nonce')) {
 
		// this returns the user ID and other info from the user name
		$user = get_userdatabylogin($_POST['usts_user_login']);
 
		if(!$user) {
			// if the user name doesn't exist
			gen_usts_errors()->add('empty_username', __('Invalid username'));
		}
 
		if(!isset($_POST['usts_user_pass']) || $_POST['usts_user_pass'] == '') {
			// if no password was entered
			gen_usts_errors()->add('empty_password', __('Please enter a password'));
		}
 
		// check the user's login with their password
		if(!wp_check_password($_POST['usts_user_pass'], $user->user_pass, $user->ID)) {
			// if the password is incorrect for the specified user
			gen_usts_errors()->add('empty_password', __('Incorrect password'));
		}
 
		// retrieve all error messages
		$errors = gen_usts_errors()->get_error_messages();
 
		// only log the user in if there are no errors
		if(empty($errors)) {
 
			wp_setcookie($_POST['usts_user_login'], $_POST['usts_user_pass'], true);
			wp_set_current_user($user->ID, $_POST['usts_user_login']);	
			do_action('wp_login', $_POST['usts_user_login']);
 
			wp_redirect(home_url()); exit;
		}
	}
}
add_action('init', 'gen_frontpb_login_member');


// register a new user
function gen_frontpb_add_new_member() {
    
    //die(print_r($rndnum));
    
  	if (isset( $_POST["usts_user_login"] ) && wp_verify_nonce($_POST['usts_register_nonce'], 'usts-register-nonce')) {
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
 
		if(username_exists($user_login)) {
			// Username already registered
			gen_usts_errors()->add('username_unavailable', __('Username already taken'));
		}
		if(!validate_username($user_login)) {
			// invalid username
			gen_usts_errors()->add('username_invalid', __('Invalid username'));
		}
		if($user_login == '') {
			// empty username
			gen_usts_errors()->add('username_empty', __('Please enter a username'));
		}
		if(!is_email($user_email)) {
			//invalid email
			gen_usts_errors()->add('email_invalid', __('Invalid email'));
		}
		if(email_exists($user_email)) {
			//Email address already registered
			gen_usts_errors()->add('email_used', __('Email already registered'));
		}
    if($dob == ''){
      // empty date of birth
			gen_usts_errors()->add('dateofbirth_empty', __('Please enter Your Date of Birth'));
    }
		if($user_pass == '') {
			// passwords do not match
			gen_usts_errors()->add('password_empty', __('Please enter a password'));
		}
		if($user_pass != $pass_confirm) {
			// passwords do not match
			gen_usts_errors()->add('password_mismatch', __('Passwords do not match'));
		}
 
		$errors = gen_usts_errors()->get_error_messages();
 
		// only create the user in if there are no errors
		if(empty($errors)) {
 
			$new_user_id = wp_insert_user(array(
					'user_login'		=> $user_login,
					'user_pass'	 		=> $user_pass,
					'user_email'		=> $user_email,
					'first_name'		=> $user_first,
					'last_name'			=> $user_last,
					'user_registered'	=> date('Y-m-d H:i:s'),
					'role'				=> 'subscriber'
				)
			);
			if($new_user_id) {
        update_usermeta( $new_user_id, "_user_date_of_birth", $dob );
        //$rndnum = Int(Rnd(1) * (9999 - 1000)) + 1000;
        $rndnum = intval(rand(1, 9999));
        $user_unique_patientid = $dobformated.$rndnum;
        update_usermeta( $new_user_id, "_user_unique_patient_id", $user_unique_patientid );
        
				// send an email to the admin alerting them of the registration
				wp_new_user_notification($new_user_id);
 
				// log the new user in
				wp_setcookie($user_login, $user_pass, true);
				wp_set_current_user($new_user_id, $user_login);	
				do_action('wp_login', $user_login);
 
				// send the newly created user to the home page after logging them in
				wp_redirect(home_url()); exit;
			}
 
		}
 
	}
}
add_action('init', 'gen_frontpb_add_new_member');


// used for tracking error messages
function gen_usts_errors(){
    static $wp_error; // Will hold global variable safely
    return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
}

// displays error messages from form submissions
function gen_frontpb_show_error_messages() {
	if($codes = gen_usts_errors()->get_error_codes()) {
		echo '<div class="usts_errors">';
		    // Loop error codes and display errors
		   foreach($codes as $code){
		        $message = gen_usts_errors()->get_error_message($code);
		        echo '<span class="error"><strong>' . __('Error') . '</strong>: ' . $message . '</span><br/>';
		    }
		echo '</div>';
	}	
}

//function frontpb_editprofile_form(){
include_once(GEN_USTS_FRONTPROFILE_DIR."includes/frontend_edit_user_profile.php");
//}
add_shortcode('frontpb_profilebuilder_editprofile', 'gen_frontpb_editprofile_form');
