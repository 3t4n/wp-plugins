<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Credential_model extends WModel {
	function addValidate() {
		if ( empty( $this->namekey ) ) {
			$this->namekey = $this->genNamekey();
		}	
		return true;
	}	
function validate() {
	if ( !empty( $this->crdidtype ) ) {
		$this->type = $this->crdidtype;
	}
	if ( empty($this->rolid) ) {
		$this->rolid = WRoles::getRole( 'sadmin', 'rolid' );
	}	
	return true;
}
function extra() {
		if ( !empty( $this->crdidtype ) ) {
		$this->type = $this->crdidtype;
				$namekey = WModel::getElementData( 'main.credentialtype', $this->crdidtype, 'namekey' );
				$mainCredentialC = WClass::get( 'main.' . $namekey, null, 'class', false );
		if ( !empty($mainCredentialC ) ) {
						if ( method_exists( $mainCredentialC, 'saveCredential' ) ) {
				$mainCredentialC->saveCredential( $this );
			}		}	
	}	
	return true;
}
}