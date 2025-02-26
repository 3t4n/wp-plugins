<?php
 
/*
Plugin Name: Force User SSL
Plugin URI: 
Description: Forces logged in users to use SSL.
Author: Martin Teley
Version: 1.0
*/

/**
 * Call this function when header is called
 */
function force_user_ssl() {
	if ( is_user_logged_in() && !is_ssl() ) {
		wp_redirect( "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] );
		exit();
	}
}
add_action( 'get_header', 'force_user_ssl' );

?>