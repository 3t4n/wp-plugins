<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_Notify_class extends WClasses {
	public function notifPayment($object) {
				if ( ! WPref::load( 'PSECURITY_NODE_NOTIF_PAYMENT' ) ) return false;
		if ( WRoles::isAdmin( 'vendor') ) {
			$mail = WMail::get();
			$subject = 'The payment system has been changed: ' . $object->alias;
			$body = 'This is just a notification that one of the payment system on the site : ' . JOOBI_SITE . ' has been changed!';
			$body .= "\r\n\r\n"  . 'If you have the one who changed it, there is nothing to do.';
			$body .= "\r\n"  . 'Otherwise double check that the credentials are still correct.';
			$mail->sendTextAdmin( $subject, $body, false );
		}		
	}	
}