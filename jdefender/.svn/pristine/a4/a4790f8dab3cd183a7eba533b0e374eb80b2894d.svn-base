<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_badwords_importlist_controller extends WController {
	function importlist() {
				$appsInfoC = WCLass::get( 'apps.info' );
		$token = $appsInfoC->possibleUpdate( 0, false, true );
		if ( empty($token) || true === $token ) {
			$this->userW('1454616017RFVY');
			return true;
		}		
		$appsInfoC = WClass::get( 'apps.info' );
		$sendData = new stdClass;
		$sendData->token = $token;
		$sendData->url = $appsInfoC->myURL();
		$sendData->lgid = WApplication::availLanguages( 'lgid' );
		$server = WPref::load( 'PAPPS_NODE_SERVICE' );
				$netcom = WNetcom::get();
		$resultO = $netcom->send( $server, 'serviceprovider', 'getBadWords', $sendData );		
				if ( !empty($resultO) && $resultO->status && !empty($resultO->result) && $resultO->result ) {
			$resultA = unserialize( $resultO->result );
			$securityBadwordsM = WModel::get( 'security.badwords' );
			foreach( $resultA as $words ) {
				if ( empty($words) ) continue;
				$securityBadwordsM->adbdwdid = null;
				$securityBadwordsM->alias = $words->alias;
				$securityBadwordsM->lgid = $words->lgid;
				$securityBadwordsM->type = 1;
				$securityBadwordsM->publish = $words->publish;
				$securityBadwordsM->setIgnore();
				$securityBadwordsM->save();
			}			
			$this->userS('1454593934TENV');
		} else {
			$this->userE('1454593934TENW');
			if ( !empty($resultO->message) ) {
				$MESSAGE = $resultO->message;
				$this->userW( $MESSAGE );
			}			
		}		
		return true;
	}	
}