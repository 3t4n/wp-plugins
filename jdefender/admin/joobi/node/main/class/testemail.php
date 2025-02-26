<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */

defined('JOOBI_SECURE') or die('J....');
class Main_Testemail_class extends WClasses {
 	function sendTestEmail() {
 		$emailExist = WExtension::exist( 'email.node' );
 		if ( ! $emailExist ) return true;
 		$useCMS = WPref::load( 'PEMAIL_NODE_USECMS' );
 		$mailParams = new stdClass;
 		if ( empty($useCMS) ) {
 			$mailParams->mailer = JOOBI_FRAMEWORK_TYPE;
 		} elseif ( $useCMS == 1 ) {
 			$mailParams->mailer = 'jApps';
 		} elseif ( $useCMS == 9 ) {
 			$emailLoadmailerC = WClass::get( 'email.loadmailer' );
 			$mailerInstance = $emailLoadmailerC->getMailer( 'email' );
 			$mailerInfoO = $mailerInstance->getMailerInformation();
 			$mailParams->mailer = $mailerInfoO->alias;
 		}
 		$emailI = WMail::get();
 		$user = WUser::get();
 		$emailI->setParameters( $mailParams );
 		if ( ! $emailI->sendNow( $user, 'main_test_email' ) ) {
 			$this->_checkError();
 		}
 		return true;
 	}
 	private function _checkError() {
 		if ( WPref::load( 'PEMAIL_NODE_MAILER' ) == 'smtp' ) {	
 			if ( ! WPref::load( 'PEMAIL_NODE_SMTP_AUTH_REQUIRED' ) && strlen( WPref::load( 'PEMAIL_NODE_SMTP_PASSWORD' ) ) >1 ) {
 				$this->adminW( 'You use the SMTP method with a password but you did no require the authentication... you may try to turn the SMTP authentication ON' );
 				return;
 			}
 			if ( WPref::load( 'PEMAIL_NODE_SENDEREMAIL' ) != WPref::load( 'PEMAIL_NODE_SMTP_USERNAME' ) ) {
 				$this->adminW( 'You use the SMTP method but your bounce address is different than your SMTP username... in most of cases those two addresses should be the same' );
 				return;
 			}
 		} else {
 			$BOUNCE = WPref::load( 'PEMAIL_NODE_SENDEREMAIL' );
 			if ( !empty($BOUNCE) ) {
 				$usersEmail = WClass::get('users.email');
 				if ( $usersEmail->validateEmail($BOUNCE) ) {
 					@list( $account, $bounceDomain ) = @explode( '@', $BOUNCE );
 					$DOMAIN = str_replace( 'www.','', @parse_url( JOOBI_SITE, PHP_URL_HOST) );
 					if ($bounceDomain != $DOMAIN ) {
 						$this->adminW( 'Your bounce e-mail "'.$BOUNCE.'" does not belong to your website domain "' . $DOMAIN . '"... in most of cases the bounce address must belong to your own domain' );
 						return;
 					}
 				} else {
 					$this->adminW( 'The bounce email address specified is not a valid email address: ' . $BOUNCE );
 				}
 				if ( !empty($BOUNCE) ) {
 					$this->adminW( 'You can try to do not specify any bounce e-mail (the actual value is "' . $BOUNCE . '") so that the system will generate an automatic one' );
 					return;
 				}
 			}
 		}
 	}
}
