<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_Ipblockedpages_model extends WModel {
	function validate() {
		$this->page = str_replace( JOOBI_SITE, '', $this->page ); 	
		return true;
	}	
	function addExtra() {
		$securityIPBM = WModel::get( 'security.ipblocked' );
		$securityIPBM->whereE( 'ipblid', $this->ipblid );
		$securityIPBM->setVal( 'blockedpage', 1 );
		$securityIPBM->update();
		return true;
	}	
}