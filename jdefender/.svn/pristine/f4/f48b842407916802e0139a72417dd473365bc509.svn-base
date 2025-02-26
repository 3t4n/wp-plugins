<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_credentials_checktoken_controller extends WController {
	function checktoken() {
				$eid = WGlobals::getEID();	
		$crdidtype = WModel::getElementData( 'main.credential', $eid, 'crdidtype' );
		if ( empty($crdidtype) ) return true;
				$namekey = WModel::getElementData( 'main.credentialtype', $crdidtype, 'namekey' );
		if ( empty($namekey) ) return true;
				WLoadFile( 'main.class.channel' );
		$mainCredentialC = WClass::get( 'main.' . $namekey, null, 'class', false );
		if ( !empty($mainCredentialC ) ) {
						if ( method_exists( $mainCredentialC, 'checkSocialToken' ) ) {
				$mainCredentialC->checkSocialToken( $eid );
			}		}		
		return true;
	}
}