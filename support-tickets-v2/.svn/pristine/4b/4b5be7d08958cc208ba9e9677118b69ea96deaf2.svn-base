<?php

add_action( 'suptic_control_create_ticket', 'suptic_ticket_created_notification' );

function suptic_ticket_created_notification( &$ticket ) {
	if ( ! $ticket )
		return;

	$subject = sprintf( __( '%s - Confirmation of submission, Application Reference Number (#%d)', 'suptic' ), get_option( 'blogname' ), $ticket->id );

	$body = sprintf( __( "Dear %s,", 'suptic' ), $ticket->author_name() ) . "\n";
	$body .= __( "Thank you for submitting your application for the Accord Australasia 'Recognised Environmental - Credentials Scheme.' Your unique application reference number and a link to your application are provided below. You will need these for future access to your application and when corresponding with Toxikos. Please ensure you keep these details confidential.", 'suptic' ) . "\n";
	$body .= sprintf( __( 'Application Reference Number: %s', 'suptic' ), $ticket->id ) . "\n";
	$body .= sprintf( __( 'Brands: %s', 'suptic' ), $ticket->get_meta('16-brand-name')) . "\n";
	$body .= sprintf( __( "Link: %s", 'suptic' ), $ticket->url( true ) ) . "\n\n";
	$body .= __( 'In order to progress with your application, please ensure that you submit payment of the screening fee (AUD $420 ex GST) and include your application reference number in the payment description. If you forget to include your application reference number this may delay the screening process.', 'suptic' ) . "\n";
	$body .= __( 'Payment can be submitted at https://www.flycke.com/brand/toxikos', 'suptic' ) . "\n\n";
	$body .= __( 'In addition please ensure you upload all relevant documents at https://www.toxikos.com/envirocreds/supporting-documentation. Alternatively you can send the relevant documentation to Toxikos Pty Ltd via Express Post to the following address:
Attn: Environmental Credentials Scheme
Toxikos Pty Ltd
PO BOX 23293
Docklands, VIC
The relevant documents include:
1.	Material Safety Data Sheets (MSDSs) for the product and/or its ingredients
2.	Technical Data Sheets (TDSs) for the product and/or its ingredients.
3.	Test reports (e.g. results of toxicity, biodegradability or bioconcentration testing).

A receipt will be issued upon payment of the screening fee.  An e-mail confirmation will also be issued once the supporting documentation is received. Please note that if you do not receive an e-mail confirmation, we have not received your supporting documentation. Once payment and supporting documentation is received, screening can commence. The screening process generally takes up to 10 working days, unless otherwise advised by Toxikos. You will be notified at the conclusion of the screening period whether or not your application has passed screening and can proceed to a full technical assessment.

Should you have any queries, please do not hesitate to contact Toxikos on 03 9681 8551. 

Sincerely, 
Toxikos Pty Ltd', 'suptic' ) . "\n";

	$footer = "--\n";
	$footer .= __( "Please do not reply to this message; it was sent from an unmonitored email address.", 'suptic' ) . "\n";

	if ( is_email( $ticket->author_email ) ) {
		@wp_mail( $ticket->author_email, $subject, $body . $footer );
	}

	if ( ( $admin_email = get_option('admin_email') ) && $admin_email != $ticket->author_email ) {
		$message_body = '';

		if ( $initial_message = $ticket->first_message() ) {
			$message_body = __( 'A new request was submitted. Message Body: ', 'suptic' ) . "\n";
		}

		@wp_mail( $admin_email, $subject, $message_body . $body . $footer );
	}
}

add_action( 'suptic_control_add_message', 'suptic_message_replied_notification', 10, 2 );

function suptic_message_replied_notification( &$ticket, &$message ) {
	if ( ! $ticket || ! $message )
		return;

	if ( ! $message->has_status( 'publish' ) )
		return;

	if ( $message->is_admin_reply() ) {

		$subject = sprintf( __( '%s - You have a reply to your Application submission #%d', 'suptic' ),	get_option( 'blogname' ), $ticket->id );

		$body = sprintf( __( "Dear %s,", 'suptic' ), $ticket->author_name() ) . "\n";
		$body .= __( "You have a new reply message.", 'suptic' ) . "\n";

		$body .= sprintf( __( "See the message and reply on the web at %s", 'suptic' ),
			$ticket->url( true ) ) . "\n\n";

		$body .= "--\n";
		$body .= __( "Please do not reply to this message; it was sent from an unmonitored email address.", 'suptic' ) . "\n";

		if ( is_email( $ticket->author_email ) )
			@wp_mail( $ticket->author_email, $subject, $body );

	} else {

		$subject = sprintf( __( '%s - You have a reply to your Application submission #%d', 'suptic' ),	get_option( 'blogname' ), $ticket->id );

		$body = sprintf( __( "You have a new reply message from %s", 'suptic' ), $message->author_name() ) . "\n\n";

		$body .= sprintf( __( "See the message and reply on the web at %s", 'suptic' ),	$ticket->url( true ) ) . "\n\n";

		$body .= "--\n";
		$body .= __( "Please do not reply to this message; it was sent from an unmonitored email address.", 'suptic' ) . "\n";

		if ( $admin_email = get_option('admin_email') )
			@wp_mail( $admin_email, $subject, $body );

	}
}

?>