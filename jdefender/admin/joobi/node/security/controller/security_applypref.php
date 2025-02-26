<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_applypref_controller extends WController {
	function applypref() {
		parent::applypref();
		$redirectSaveprefC = WClass::get( 'security.savepref' );
		$redirectSaveprefC->securitySave( $this->generalPreferences );
		return true;
	}	
}