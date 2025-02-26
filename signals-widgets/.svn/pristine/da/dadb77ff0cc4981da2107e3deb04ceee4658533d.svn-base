<?php

/**
 * Support for the plugin by 69signals
 * Direct ticket submission from the WordPress panel
 *
 * @link       http://www.69signals.com
 * @since      0.1
 * @package    Signals_Framework
 * @subpackage Widgets
 */

function widgets_admin_support() {

	// Grabbing admin_email from the database
	$signals_admin_email = get_option( 'admin_email', '' );

	// View template for the support panel
	require 'views/support.php';

}



// AJAX request for user support
function widgets_ajax_support() {

	// We are going to store the response in the $response() array
	$response = array(
		'code' 		=> 'error',
		'response' 	=> __( 'Please fill in both the fields to create your support ticket.', 'signals' )
	);

	if ( ! empty( $_POST['signals_support_email'] ) && ! empty( $_POST['signals_support_issue'] ) ) {
		// Filtering and sanitizing the support issue.
		$admin_email 	= sanitize_text_field( $_POST['signals_support_email'] );
		$issue 			= $_POST['signals_support_issue'];

		$subject 		= '[Support Ticket] by '. $admin_email;
		$body 			= "Email: $admin_email \r\nIssue: $issue";
		$headers 		= 'From: ' . $admin_email . "\r\n" . 'Reply-To: ' . $admin_email;

		// Sending the mail to the support email
		if ( true === wp_mail( 'support@69signals.com', $subject, $body, $headers ) ) {
			// Sending the success response
			$response = array(
				'code' 		=> 'success',
				'response' 	=> __( 'We have received your support ticket. We will get back to you shortly!', 'signals' )
			);
		} else {
			// Sending the failure response
			$response = array(
				'code' 		=> 'error',
				'response' 	=> __( 'There was an error creating the support ticket. You can try again later or send us an email directly to <strong>support@69signals.com</strong>', 'signals' )
			);
		}
	}

	// Sending proper headers and sending the response back in the JSON format
	header( "Content-Type: application/json" );
	echo json_encode( $response );

	// Exiting the AJAX function. This is always required
	exit();

}
add_action( 'wp_ajax_signals_support', 'widgets_ajax_support' );