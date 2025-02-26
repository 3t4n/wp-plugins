<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_incident_blockip_controller extends WController {
	function blockip() {
		$IP = WGlobals::get( 'ip' );
		if ( empty($IP) || '0.0.0.0' ==  $IP ) {
			$this->userE('1454866807PZCX');
			return true;
		}		
		$securityReportC = WClass::get( 'security.report' );
		$ADMIN = WUsers::get( 'username' );
		$CAUSE = str_replace(array('$IP','$ADMIN'), array($IP,$ADMIN),WText::t('1454634248LEDL'));
		$details = '';
		$securityReportC->recordIncident( 'manually_blocked_ip', $CAUSE, $details, false, null, $IP );
		$this->userS('1454634248LEDM');
		return true;
	}	
}