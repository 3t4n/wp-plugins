<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'wp_mail' ) ) {
	function wp_mail( $to, $subject, $message, $headers = '', $attachments = array() ) {
		$sendCloud = new SendCloud();

		return $sendCloud->sendMail( $to, $subject, $message, $headers, $attachments );
	}
}
