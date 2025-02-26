<?php

/*-------------------------
  Membership Ajax Functions
---------------------------*/

/*login*/
add_action( 'wp_ajax_alw_login', 'alw_login' );
add_action( 'wp_ajax_nopriv_alw_login', 'alw_login' );
function alw_login( ){

	if( empty( $_POST[ 'email' ] ) )
		die( json_encode( array( 'message'=> 'no username/email' ) ) );
	else
		$_POST[ 'email' ] = sanitize_text_field( $_POST[ 'email' ] ); // sanitize as text, not sure if it is email or username yet

	if( empty( $_POST[ 'password' ] ) )
		die( json_encode( array( 'message'=> 'no password' ) ) );
	else
		$_POST[ 'password' ] = sanitize_text_field( $_POST[ 'password' ] );

	$username = $_POST[ 'email' ];

  if( is_email( $username ) ){
      $user = get_user_by( 'email', $username ); // username is an email
      if( $user ) $username = $user->user_login;
		else die( json_encode( array( 'message'=> 'unregistered email' ) ) );
  }else{
		if( ! username_exists( $username ) )
			die( json_encode( array( 'message'=> 'unregistered username' ) ) );
	}

	$creds = array( );
	$creds[ 'user_login' ] = $username;
	$creds[ 'user_password' ] = $_POST[ 'password' ];
	$creds[ 'remember' ] = true;

	remove_all_actions( 'wp_login_failed' );
	add_filter( 'authenticate', 'alw_allow_email_login', 20, 3 );
	if( is_wp_error( wp_signon( $creds, false ) ) )
		die( json_encode( array( 'message'=> 'incorrect password' ) ) );

	die( json_encode( array( 'message'=> 'successful login' ) ) );
}

/*register*/
add_action( 'wp_ajax_alw_register', 'alw_register' );
add_action( 'wp_ajax_nopriv_alw_register', 'alw_register' );
function alw_register( ){

	if( empty( $_POST[ 'first_name' ] ) || ! trim( $_POST[ 'first_name' ] ) )
		die( json_encode( array( 'message'=> 'no first_name' ) ) );
	else
		$_POST[ 'first_name' ] = sanitize_text_field( $_POST[ 'first_name' ] );

	if( empty( $_POST[ 'last_name' ] ) || ! trim( $_POST[ 'last_name' ] ) )
		die( json_encode( array( 'message'=> 'no last_name' ) ) );
	else
		$_POST[ 'last_name' ] = sanitize_text_field( $_POST[ 'last_name' ] );

	// username
	//-- given
	if( empty( $_POST[ 'username' ] ) )
		die( json_encode( array( 'message'=> 'no username' ) ) );
	else
		$_POST[ 'username' ] = sanitize_text_field( $_POST[ 'username' ] );
	// wp only allows lowercase
	if( $_POST[ 'username' ] !== strtolower( $_POST[ 'username' ] ) )
		die( json_encode( array( 'message'=> 'lowercase username' ) ) );
	//-- valid
	if( ! validate_username( $_POST[ 'username' ] ) )
		die( json_encode( array( 'message'=> 'invalid username' ) ) );
	//-- unique
	if( username_exists( $_POST[ 'username' ] ) )
		die( json_encode( array( 'message'=> 'username exists' ) ) );

	// email
	//-- given
	if( empty( $_POST[ 'email' ] ) )
		die( json_encode( array( 'message'=> 'no email' ) ) );
	else
		$_POST[ 'email' ] = sanitize_email( $_POST[ 'email' ] );
	//-- valid
	if( ! is_email( $_POST[ 'email' ] ) )
		die( json_encode( array( 'message'=> 'invalid email' ) ) );
	//-- unique
	if( get_user_by( 'email', $_POST[ 'email' ] ) )
		die( json_encode( array( 'message'=> 'email exists' ) ) );

	// password
	//-- given
	if( empty( $_POST[ 'password' ] ) )
		die( json_encode( array( 'message'=> 'no password' ) ) );
	else
		$_POST[ 'password' ] = sanitize_text_field( $_POST[ 'password' ] );
	//-- valid
	if( ! alw_validate_pass( $_POST[ 'password' ] ) )
		die( json_encode( array( 'message'=> 'invalid password' ) ) );

	// register user
	$userdata = array(
		'user_login'  =>  $_POST[ 'username' ],
		'first_name'    =>  $_POST[ 'first_name' ],
		'last_name'    =>  $_POST[ 'last_name' ],
		'user_email'    =>  $_POST[ 'email' ],
		'user_pass'   =>  $_POST[ 'password' ],
		'role'		=>	sanitize_text_field( get_option( 'ajax-login-by-wph-registered-user-level', 'subscriber' ) )
	);
	wp_insert_user( $userdata );

	// signon
	$creds = array( );
	$creds[ 'user_login' ] = $_POST[ 'email' ];
	$creds[ 'user_password' ] = $_POST[ 'password' ];
	$creds[ 'remember' ] = true;

	remove_all_actions( 'wp_login_failed' );
	add_filter('authenticate', 'alw_allow_email_login', 20, 3);
	if( is_wp_error( wp_signon( $creds, false ) ) )
		die( json_encode( array( 'message'=> 'failed login' ) ) );

	die( json_encode( array( 'message'=> 'successful registration' ) ) );
}

/*validate password*/
function alw_validate_pass( $pass ){
	$pass = sanitize_text_field( $pass );

	$length = strlen( $pass );
	if( $length > 25 || $length < 6 ){
		return false;
	}

	$pass_arr = str_split( $pass );
	$allowed = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_ []{}<>~`+=,.;:/?|';
	$valid = true;

	foreach( $pass_arr as $pass_char ){
		if( strpos( $allowed, $pass_char ) === false ){ // needs to be explicit as 'a' is at 0 which is falsey
			$valid = false;
		}
	}
	return $valid;
}

/*authenticate users with email*/
function alw_allow_email_login( $user, $username, $password ) {
	$username = sanitize_text_field( $username );
	$password = sanitize_text_field( $password );

	if ( is_email( $username ) ) {
      $user = get_user_by( 'email', $username );
      if ( $user ) $username = $user->user_login;
  }
  return wp_authenticate_username_password( null, $username, $password );
}

/*forgot password*/
add_action( 'wp_ajax_alw_forgot_password', 'alw_forgot_password' );
add_action( 'wp_ajax_nopriv_alw_forgot_password', 'alw_forgot_password' );
function alw_forgot_password( ){

	// email
	//-- given
	if( empty( $_POST[ 'email' ] ) )
		die( json_encode( array( 'message'=> 'no email' ) ) );

	$email = sanitize_text_field( $_POST[ 'email' ] );

	//-- registered
	if( is_email( $email ) ){
		$user = get_user_by( 'email', $email );
		if( ! $user ) die( json_encode( array( 'message'=> 'unregistered email' ) ) );
		$user_email = $email;
		$user_login = $user->data->user_login;

	}else{
		$username = $email;
		$user = get_user_by( 'login', $username );
		if( ! $user ) die( json_encode( array( 'message'=> 'unregistered username' ) ) );
		$user_email = $user->data->user_email;
		$user_login = $user->data->user_login;

	}

	$user_email = sanitize_text_field( $user_email );
	$user_login = sanitize_text_field( $user_login );

	// mail the link
  global $wpdb, $wp_hasher;

  do_action( 'lostpassword_post' );

  do_action( 'retreive_password', $user_login );  // Misspelled and deprecated
  do_action( 'retrieve_password', $user_login );

  $allow = apply_filters( 'allow_password_reset', true, $user->data->ID );

  if ( ! $allow )
      die( 'not allowed' );
  else if ( is_wp_error($allow) )
      die( 'error' );

  $key = wp_generate_password( 20, false );
  do_action( 'retrieve_password_key', $user_login, $key );

  if ( empty( $wp_hasher ) ) {
      require_once ABSPATH . 'wp-includes/class-phpass.php';
      $wp_hasher = new PasswordHash( 8, true );
  }
  $hashed = time() . ':' . $wp_hasher->HashPassword( $key );
  $wpdb->update( $wpdb->users, array( 'user_activation_key' => $hashed ), array( 'user_login' => $user_login ) );

  $message = __('Someone requested that the password be reset for the following account:') . "\r\n\r\n";
  $message .= network_home_url( '/' ) . "\r\n\r\n";
  $message .= sprintf(__('Username: %s'), $user_login) . "\r\n\r\n";
  $message .= __('If this was a mistake, just ignore this email and nothing will happen.') . "\r\n\r\n";
  $message .= __('To reset your password, visit the following address:') . "\r\n\r\n";
  $message .= '<' . network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login), 'login') . ">\r\n";

  if ( is_multisite() )
      $blogname = sanitize_text_field( $GLOBALS['current_site']->site_name );
  else
      $blogname = wp_specialchars_decode( sanitize_text_field( get_option( 'blogname' ) ), ENT_QUOTES);

  $title = sprintf( __('[%s] Password Reset'), $blogname );

  $title = apply_filters('retrieve_password_title', $title);
  $message = apply_filters('retrieve_password_message', $message, $key);

  if ( $message && ! wp_mail($user_email, $title, $message) )
      wp_die( __('The e-mail could not be sent.') . "<br />\n" . __('Possible reason: your host may have disabled the mail() function...') );

	die( json_encode( array( 'message'=> 'successful reset' ) ) );
}

/*template loader*/
function alw_get_template( $name ) {
	if ( $overridden_template = locate_template( $name ) ) {
		load_template( $overridden_template );
	} else {
		load_template( plugin_dir_path(__FILE__) . '../templates/alw-popup.php' );
	}
}

?>
