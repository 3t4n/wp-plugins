<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_savepref_controller extends WController {
	function savepref() {
		parent::savepref();
		$redirectSaveprefC = WClass::get( 'security.savepref' );
		$redirectSaveprefC->securitySave( $this->generalPreferences );
		return true;
	}	
}