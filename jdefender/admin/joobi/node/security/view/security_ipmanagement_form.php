<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_Security_ipmanagement_form_view extends Output_Forms_class {
	function prepareView() {
		if ( ! WPref::load( 'PSECURITY_NODE_MANAGE_IP' ) ) {
			$this->removeElements( 'security_ipblocked_form_ip' );
		}
		if ( ! WPref::load( 'PSECURITY_NODE_MANAGE_USERNAME' ) ) {
			$this->removeElements( 'security_ipblocked_form_username' );
		}
		if ( ! WPref::load( 'PSECURITY_NODE_MANAGE_COUNTRY' ) ) {
			$this->removeElements( 'security_ipblocked_form_country' );
		}
		if ( ! WPref::load( 'PSECURITY_NODE_MANAGE_ROLE' ) ) {
			$this->removeElements( 'security_ipblocked_form_role' );
		}
		return true;
	}	
}