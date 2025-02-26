<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}

if( !class_exists( 'PROFILEPROAjax' ) ){

	class PROFILEPROAjax{
		function __construct(){
			add_action( 'wp_ajax_profilepro_form_actions', array( $this, 'profilepro_form_actions' ) );
			add_action( 'wp_ajax_nopriv_profilepro_form_actions', array( $this, 'profilepro_form_actions' ) );
			
			add_action( 'wp_ajax_profilepro_form_change', array( $this, 'profilepro_form_change' ) );
			add_action( 'wp_ajax_nopriv_profilepro_form_change', array( $this, 'profilepro_form_change' ) );
			
			add_action( 'wp_ajax_profilepro_ajax_upload', array( $this, 'ajax_upload' ) );
			add_action( 'wp_ajax_nopriv_profilepro_ajax_upload', array( $this, 'ajax_upload' ) );
		}
		
		function profilepro_form_change(){
			$form_id = intval($_POST['id']);
			if( isset( $_POST['mode']) && $_POST['mode'] == 'profile' ){
				$output['html'] = do_shortcode('[profilepro id='.$form_id.']');
			}else{
				$output['html'] = do_shortcode('[profilepro id='.$form_id.' mode="profile"]');
			}
			echo json_encode($output);
			die();
		}
		
		function profilepro_form_actions(){
			global $profilepro;
			$action =sanitize_text_field($_POST['id']);
			$output = '';
			$user_email=sanitize_email($_POST['user_email']);
			$user_login=sanitize_user($_POST['user_login']);
			$user_password=sanitize_text_field($_POST['user_pass']);
			$username= sanitize_user($_POST['username']);
			$login_redirect=sanitize_text_field($_POST['login_redirect']);
			$register_redirect=sanitize_text_field($_POST['register_redirect']);
			switch( $action ){
			
				case 'register':
					$flag = 0;
					$output['error'] = '';
					if( isset( $user_login ) ){
						$user_exists = username_exists( $user_login );
						$user_login =$user_login;
					}else{
						$user_exists = '';
						$user_login = $user_email;
					}
					if( empty( $user_exists ) && isset( $user_email ) && email_exists( $user_email) == false ){
						if (!isset($user_password)) 
							$user_pass = wp_generate_password( $length=12, $include_standard_special_chars=false );
						else
							$user_pass = $user_password;
					}
					
					if( !isset( $user_email ) ){
						$user_email = $user_login.'@fakemail.com';
					}
					
					if( username_exists( $user_login ) ){
						$flag = 1;
						$output['error']['user_login'] = __('The username is already taken');
					}
					if( username_exists( $user_email ) ){
						$flag = 1;
						$output['error']['user_email'] = __('The email address already exists');
					}
					if( !$flag ){
					$user_id = $profilepro->api->create_new_user( $user_login, $user_pass, $user_email, $_POST );

					if( profilepro_get_option('new_user_approve') == 0 ){
						if( $_POST['profilepro-form-autologin'] && isset( $user_login ) ){
							profilepro_auto_login( $user_login, true );
						}
						profilepro_mail( $user_id, 'newaccount', null, $_POST );
					if( $user_id ){
						if(isset($register_redirect) && !empty($register_redirect)){
							$output['redirect'] = $register_redirect;
						}else{
							$output['redirect'] = $profilepro->api->permalink( 0, 'profile' );
						}
					}
					else{
						if(isset($register_redirect)){
							$output['redirect'] = $register_redirect;
						}else{
							$output['redirect'] = $profilepro->api->permalink( 0, 'login' );
						}
					 }
					}else if( profilepro_get_option('new_user_approve') == 1 ){
						$profilepro->api->admin_approve($user_id, $user_pass, $_POST);
						$output['html'] = do_shortcode('[profilepro id='.get_option('profilepro_default_login').' msg_type=admin_approve]');
					}else if( profilepro_get_option('new_user_approve') == 2 ){
						$profilepro->api->email_approve($user_id, $user_pass, $_POST);
						$output['html'] = do_shortcode('[profilepro id='.get_option('profilepro_default_login').' msg_type=email_approve]');
					}
					}
					break;
				
				case 'login':
					$username_or_email = $username;
					$credentials = array();
					$credentials['user_login'] = $username_or_email;
					$credentials['user_password'] = $user_password;
					$user = wp_signon( $credentials, false );
					if ( is_wp_error($user) ) {

					if ( $user->get_error_code() == 'invalid_email' || $user->get_error_code() == 'invalid_username') {
					$output['error']['username'] = __('Invalid email or username entered',PROFILEPRO_PLUGIN_SLUG);
					} elseif ( $user->get_error_code() == 'incorrect_password') {
					$output['error']['user_pass'] = __('The password you entered is incorrect',PROFILEPRO_PLUGIN_SLUG);
					}
					}else if( get_user_meta($user->ID,'profilepro_account_status',true) == 'pending'){
						$output['error']['username'] = __('Please verify your account',PROFILEPRO_PLUGIN_SLUG);
						wp_logout();
					}else if( get_user_meta($user->ID,'profilepro_account_status',true)=='pending_admin'){
						$output['error']['username'] = __('Your account is awaiting admin approval',PROFILEPRO_PLUGIN_SLUG);
						wp_logout();
					}
					else{
						profilepro_auto_login( $user->user_login );
						if(isset($login_redirect) && !empty($login_redirect)){
							$output['redirect'] = $login_redirect;
						}else{
							$output['redirect'] = $profilepro->api->permalink( 0, 'profile' );
						}
					}
					break;
					
				case 'profile':
					$user_id = profilepro_get_edit_user();
					if ($user_id != get_current_user_id() ){	
						die();
					}
					profilepro_update_user_profile( $user_id, $_POST, $action='ajax_save' );
					$output['msg'] = __( 'Profile updated successfully', PROFILEPRO_PLUGIN_SLUG );
					$output['redirect'] = 'refresh';
					break;	
				case 'forgot':
					$email = $user_email;
					if( email_exists( $email ) ){
						$user = get_user_by('email', $email);
						$uniquekey =  wp_generate_password(20, $include_standard_special_chars=false);
						update_user_meta( $user->ID, 'profilepro_secret_key', $uniquekey);
						profilepro_mail( $user->ID, 'reset_password', $uniquekey );
						
						$output['msg'] = __( 'Reset password intruction has been sent to your email address', PROFILEPRO_PLUGIN_SLUG );
					}
					else{
						$output['error']['user_email'] = __('Invalid email entered',PROFILEPRO_PLUGIN_SLUG);
					}
					break;	
				case 'reset':
					$users = get_users(array(
						'meta_key'     => 'profilepro_secret_key',
						'meta_value'   => sanitize_text_field($_POST['secretkey']),
						'meta_compare' => '=',
					));
					if (!$users[0]) {
						$output['error']['secretkey'] = __('The secret key is invalid or expired.',PROFILEPRO_PLUGIN_SLUG);
					}
					else{
						$user_id = $users[0]->ID;
					 	wp_update_user( array( 'ID' => $user_id, 'user_pass' => $user_password ) );
						$output['msg'] = __('Password changed successfully', PROFILEPRO_PLUGIN_SLUG);
					}	
					break;
							
			}
			echo json_encode( $output );
			die();
		}
		
		function ajax_upload(){
			global $profilepro;
			if( isset($_FILES["profilepro_uploaded_file"]) ) {
				if (empty($_FILES["profilepro_uploaded_file"]["name"])){
					die();
			} else {
				if ($_FILES["profilepro_uploaded_file"]["error"] > 0){
					die();
			} else {
				if(!is_uploaded_file($_FILES["profilepro_uploaded_file"]["tmp_name"])){
					die();
				} elseif(0){
					$ret['status'] = 2;
					echo json_encode($ret);
					die();
				} else {
                	$ret = array();
					if(class_exists('finfo'))
					{	
						$finfo = new finfo();
						$fileinfo = $finfo->file($_FILES["profilepro_uploaded_file"]["tmp_name"], FILEINFO_MIME_TYPE);
					}
					else
					{
						$fileinfo = $_FILES['profilepro_uploaded_file']['type'];
					}
					$accepted_file_mime_types = array('image/gif','image/jpg','image/jpeg','image/png');
                	$file_extension = strtolower(strrchr($_FILES["profilepro_uploaded_file"]["name"], "."));
					if( !in_array($file_extension, array( '.gif','.jpg','.jpeg','.png' )  ) || !in_array( $fileinfo,$accepted_file_mime_types ) ){
                		$ret['status'] = 0;
                		echo json_encode($ret);
						die();
                	}else{
						if(!is_array($_FILES["profilepro_uploaded_file"]["name"])) {
							$wp_filetype = wp_check_filetype_and_ext($_FILES["profilepro_uploaded_file"]["tmp_name"], $_FILES["profilepro_uploaded_file"]["name"]);
						
							$ext = empty( $wp_filetype['ext'] ) ? '' : $wp_filetype['ext'];
							$type = empty( $wp_filetype['type'] ) ? '' : $wp_filetype['type'];
							$proper_filename = empty( $wp_filetype['proper_filename'] ) ? '' : $wp_filetype['proper_filename'];
						
							if ( $proper_filename ) {
								$file['name'] = $proper_filename;
							}
						
							if (! $type || !$ext ) die();
						
							if ( ! $type ) {
								$type = $file['type'];
							}
						
							$unique_id = uniqid();
							$ret = array();
							$target_file = $profilepro->api->get_upload_dir() ."/". $unique_id . $file_extension;
							move_uploaded_file( $_FILES["profilepro_uploaded_file"]["tmp_name"], $target_file );
							$ret['target_file'] = $target_file;
							$ret['target_file_uri'] = $profilepro->api->get_upload_url() ."/". basename($target_file);
							$ret['status'] = 1;
							echo json_encode($ret);
							die();
							}
						}
					}
				}
			}
		}
	}
 }
	
	new PROFILEPROAjax();
}

