<?php

namespace TopDeliverability\Email;

class PHPMailerExtender {

	function extend( \PHPMailer\PHPMailer\PHPMailer $phpmailer ) {
		$class = get_class( $phpmailer );
		switch ( $class ) {
			case 'PHPMailer\\PHPMailer\\PHPMailer':
				return new PHPMailer( $phpmailer, new HeaderEncoder() );

			case 'WPMailSMTP\\MailCatcherV6':
				/* @var MailCatcherV6 $phpmailer */
				return new MailCatcherV6( $phpmailer, new HeaderEncoder() );

			default:
				error_log( "$class is not supported" );
				return $phpmailer;
		}
	}
}
