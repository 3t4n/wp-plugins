<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_Login_class extends WClasses {
	public function failedLogin($message,$ip,$actid) {
		if ( ! WPref::load( 'PSECURITY_NODE_DEFENSE_ACTIVE' ) ) return true;
						$period = WPref::load( 'PSECURITY_NODE_SHIELD_LOGIN_FAILPERIOD' );
		if ( $period < 60 ) $period = 60;
				if ( !empty($message['username']) ) {
			$uid = WUsers::get( 'uid', $message['username'] );
						if ( !empty($uid) && WPref::load( 'PSECURITY_NODE_NOTIF_LOGIN_ADMIN_FAIL' ) ) {
				$isAdmin = WRoles::hasRole( 'manager', $uid );
				if ( $isAdmin ) {
					$securityReportC = WClass::get( 'security.report' );
					$securityReportC->sendEmail( $uid, true, 'failedLogin' );
				}				
			}			
		} else {
			$uid = 0;
		}		
		$longIP = ip2long( $ip );
		$incidentM = WModel::get( 'security.incident' );
		$incidentM->where( 'created', '>', time() - $period );
		$incidentM->whereE( 'publish', 1 );
		$incidentM->whereIn( 'type', array( 3, 5 ) );
		if ( $uid > 0 ) $incidentM->openBracket();
		$incidentM->whereE( 'ip', $longIP );
		if ( $uid > 0 ) {
			$incidentM->operator( 'OR' );
			$incidentM->whereE( 'uid', $uid );
			$incidentM->closeBracket();
		}		
		$loginAttemptA = $incidentM->load( 'ol', array( 'uid', 'ip', 'created' ) );
		$USERNAME = ( !empty($message['username']) ? $message['username'] : 'unknown' );
		$CAUSE = str_replace(array('$USERNAME'), array($USERNAME),WText::t('1454276766LNLS'));
		$delayPeriod = WPref::load( 'PSECURITY_NODE_SHIELD_LOGIN_FAILBLOCKED' );
		$details = WText::t('1454690826HWMU');
		$details .= '<br>';
		$details .= WText::t('1454690826HWMV');
		$sessionMess = WText::t('1454690826HWMW');
		$sessionMess .= '<br>';
		$sessionMess .= WText::t('1454690826HWMX');
		if ( $delayPeriod > 0 ) {
			if ( $delayPeriod < WPref::load( 'PSECURITY_NODE_SHIELD_LOGIN_FAILPERIOD' ) ) $delayPeriod = WPref::load( 'PSECURITY_NODE_SHIELD_LOGIN_FAILPERIOD' ) * 1.2;
			$PERIOD = round( $delayPeriod * 1.1 );
			$PERIOD = WTools::durationToString( $PERIOD );
						$details .= ' ' . str_replace(array('$PERIOD'), array($PERIOD),WText::t('1466002448MMWH'));
			$sessionMess .= '<br>' . $details;
		}		
		$securityReportC = WClass::get( 'security.report' );
		$securityReportC->setIP( $ip, $actid );
				if ( ( count( $loginAttemptA ) + 1 ) >= WPref::load( 'PSECURITY_NODE_SHIELD_LOGIN_FAILNB' ) ) {
			WGlobals::setSession( 'lastLogin', 'blocked' . $USERNAME, $sessionMess );
						$userLockC = WClass::get( 'users.api' );
			$status = $userLockC->blockUser( 1, $uid, false, WText::t('1453344545SNXI') );
						$incidentM->whereE( 'uid', $uid );
			$incidentM->whereE( 'type', 14 );
			$incidentM->setVal( 'publish', -1 );
			$incidentM->update();
			$CAUSE = str_replace(array('$USERNAME'), array($USERNAME),WText::t('1454276766LNLV'));
						$securityReportC->recordIncident( 'auto_blocked_user', $CAUSE, $details, true, $uid );
			$CAUSE = str_replace(array('$USERNAME'), array($USERNAME),WText::t('1454276766LNLS'));
						$securityReportC->blockPage( 'failed_login', $CAUSE, $details, false, $uid );
		} else {
			$details = '';
			$securityReportC->recordIncident( 'failed_login', $CAUSE, $details, true, $uid );
		}		
		return true;
	}	
}