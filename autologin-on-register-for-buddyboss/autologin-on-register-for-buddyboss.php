<?php

/*
 * Plugin Name: Auto Login on Register for BuddyBoss
 * Author: Xavier Lopez
 * Author URI: https://xavierlopez.dev
 * Version: 1.0.0
 * Description: This plugin automatically logs in the user and redirects them to their profile when they register on BuddyBoss Platform.
 * License: GPLv2
 * Last Modified: Jan 05, 2020
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


function bbautologin_autologin_on_activation( $user_id) {

	if ( defined( 'DOING_AJAX' ) || is_admin() ) {
		return;
	}

	$bp = buddypress();

	bp_core_add_message( __( 'Your account is now active!', 'buddypress' ) );

	$bp->activation_complete = true;
	
	wp_set_auth_cookie( $user_id, true, false );

	bp_core_redirect( apply_filters( 'bbautologin_autoactivate_redirect_url', bp_core_get_user_domain( $user_id ), $user_id ) );
}

add_action( 'bp_core_signup_user', 'bbautologin_autologin_on_activation', 40, 1 );




function bbautologin_disable_validation( $user_id, $user_login ) {
	global $wpdb;	
	$wpdb->query( $wpdb->prepare( "UPDATE $wpdb->users SET user_status = 0 WHERE ID = %d", $user_id ) );
	$wpdb->query( $wpdb->prepare( "UPDATE {$wpdb->prefix}signups SET active = 1 WHERE user_login = %s", $user_login ) );
}
add_action( 'bp_core_signup_user', 'bbautologin_disable_validation', 20, 2 );
	
	
	
function bbautologin_fix_signup_form_validation_text() {
	return false;
}

add_filter( 'bp_registration_needs_activation', 'bbautologin_fix_signup_form_validation_text' );
add_filter( 'bp_core_signup_send_activation_key', 'bbautologin_fix_signup_form_validation_text',1);