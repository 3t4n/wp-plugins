<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_Savepref_class extends WClasses {
	public function securitySave($preferencesA) {
		$extension = 'security.node';
		$preference = 'block_admin_username';
				if ( isset( $preferencesA[$extension][$preference] ) || !empty( $preferencesA[$extension][$preference] ) ) {
			if ( 'admin' == WUsers::get( 'username' ) ) {
								$pref = WPref::get( 'security.node' );
				$pref->updatePref( 'block_admin_username', 0 );
				$this->userE('1458861782SINO');
				WPages::redirect( 'controller=security&task=preferences' );
			}			
		}	
				$preference = 'block_admin_no_whitelist';
		if ( isset( $preferencesA[$extension][$preference] ) || !empty( $preferencesA[$extension][$preference] ) ) {
			$securityBlockipC = WClass::get( 'security.blockip' );
			if ( ! $securityBlockipC->isWhiteList() ) {
								$pref = WPref::get( 'security.node' );
				$pref->updatePref( 'block_admin_no_whitelist', 0 );
				$this->userE('1458861782SINP');
				WPages::redirect( 'controller=security&task=preferences' );
			}				
		}		
	}
}