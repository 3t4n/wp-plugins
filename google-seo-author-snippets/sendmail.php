<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if(wp_verify_nonce( $_POST['postdata']['gsas_nonce_field'], 'gsas_nonce_value' ) == true) {
	$to            = 'helpdesk@smackcoders.com';
	$admin_mail_id = get_option( 'admin_email' );
	$site_url      = get_option( 'siteurl' );
	$subject       = WP_GSAS_PLUGIN_NAME . ': ';
	$subject .= 'I need some support';
	$firstname  = sanitize_text_field( $_POST['postdata']['fname'] );
	$lastname   = sanitize_text_field( $_POST['postdata']['lname'] );
	$user_info  = get_userdata( 1 );
	$first_name = $user_info->first_name;
	$last_name  = $user_info->last_name;
	if ( sanitize_text_field( $_POST['postdata']['fname'] ) == null || sanitize_text_field( $_POST['postdata']['fname'] ) == '' ) {
		$firstname = $first_name;
	}
	if ( sanitize_text_field( $_POST['postdata']['lname'] ) == null || sanitize_text_field( $_POST['postdata']['lname'] ) == '' ) {
		$lastname = $last_name;
	}
	if ( $firstname == null || $firstname == '' ) {
		$firstname = 'Anonymous';
	}
	if ( $lastname == null || $lastname == '' ) {
		$lastname = '';
	}
	$username  = $firstname . ' ' . $lastname;
	$headers[] = 'From: ' . $username . ' <' . sanitize_email( $admin_mail_id ) . '>';
	$headers[] = 'Cc: ' . $username . ' <' . sanitize_email( $admin_mail_id ) . '>';
	$message   = "\n\n First Name: " . $firstname;
	$message .= "\n\n Last Name: " . $lastname;
	$message .= "\n\n WordPress URL: " . $site_url;
	$message .= "\n\n Plugin: " . WP_GSAS_PLUGIN_NAME;
	$message .= "\n\n Email: " . sanitize_email( $admin_mail_id );
	$message .= "\n\n Message: " . stripslashes( sanitize_text_field( $_POST['postdata']['msg'] ) );
	$response = wp_mail( $to, $subject, $message, $headers );
	print_r( json_encode( $response ) );
	die;
}
die;
