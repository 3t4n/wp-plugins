<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Flexnet_Flexnet_action {
	function create($status,$obj) {
WMessage::log( 'Main_Flexnet_Flexnet_action : ' , 'flexnet_debug' );
WMessage::log( $obj , 'flexnet_debug' );
		$mainCredentialC = WClass::get( 'main.flexnet', null, 'class', false );
		if ( !empty($mainCredentialC ) ) {
			if ( method_exists( $mainCredentialC, 'processAction' ) ) {
				$mainCredentialC->processAction( $obj );
			}			
		}		
		return true;
	}
}