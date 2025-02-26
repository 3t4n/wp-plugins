<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_incident_blockuser_controller extends WController {
	function blockuser() {
		$uid = WGlobals::get( 'uid' );
		if ( empty($uid) ) return false;
		$usersAddon = WAddon::get( 'api.'. JOOBI_FRAMEWORK . '.user' );
		$usersAddon->blockUser( 1, $uid );
		$securityReportC = WClass::get( 'security.report' );
		$USERNAME = WUsers::get( 'username', $uid );
		$ADMIN = WUsers::get( 'username' );
		$CAUSE = str_replace(array('$USERNAME','$ADMIN'), array($USERNAME,$ADMIN),WText::t('1454276195MTCB'));
		$details = '';
		$securityReportC->recordIncident( 'manually_blocked', $CAUSE, $details, false, $uid );
		$this->userS('1454634248LEDK');
		return true;
	}	
}