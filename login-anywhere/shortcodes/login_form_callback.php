<?php
/*
ShortCodes:
1. With default WP Login Form use: [login-form]
2. With custom attributes use: [login-form label_username="Enter Username" label_password="Enter Password" label_remember="Remember Me on this System" label_log_in "Sign In"]
*/
function Login_Form($attr){
 if ( is_user_logged_in() )
		return '<p>You are already logged in!</p>';

	$inBuilt = array(
		'redirect' => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
		'label_username' => 'Username',
		'label_password' => 'Password',
		'label_remember' => 'Remember Me',
        'label_log_in'   => 'Log In',
	);

	$attr = shortcode_atts( $inBuilt, $attr );

	$attr['echo'] = false;

	return wp_login_form( $attr );
}
?>