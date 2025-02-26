<?php
/**
 * @package Advanced_Login_Form
 * @version 1.7.2
 */
/*
Plugin Name: Advanced Login Form
Plugin URI: http://wordpress.org/plugins/advanced-login-form
Description: It is a more customize wordpress login form plugin.
Author: Dipto Paul
Version: 1.0.1
Author URI: https://www.fiverr.com/bootstrapdiv
*/
 

// File Include
function adv_login_include() {
	echo '<link rel="stylesheet" type="text/css" href="' . esc_url( plugins_url( '/advanced-login-form/css/advanced-login-form.css', dirname(__FILE__) ) ) . '"/>';
}

add_action('login_head', 'adv_login_include');

// Logo URL
function adv_login_url( $url ) {
	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'adv_login_url', 10, 1 );

// Header Text
function adv_login_header( $headertext ) {
	$headertext = esc_html__( 'WordPress', 'adv-dipto' );
	return $headertext;
}
add_filter( 'login_headertext', 'adv_login_header' );

// Redirect URL
function adv_login_redirect( $redirect_to, $request, $user ) {
	//is there a user to check?
	if ( isset( $user->roles ) && is_array( $user->roles ) ) {
		//check for admins
		if ( in_array( 'administrator', $user->roles ) ) {
			// redirect them to the default place
			return $redirect_to;
		} else {
			return home_url();
		}
	} else {
		return $redirect_to;
	}
}

add_filter( 'login_redirect', 'adv_login_redirect', 10, 3 );

?>
