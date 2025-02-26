<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_Unblock_scheduler extends Scheduler_Parent_class  {
	private $_time = 0;
	function process() {
						$delayPeriod = WPref::load( 'PSECURITY_NODE_SHIELD_LOGIN_FAILBLOCKED' );
		if ( $delayPeriod > 0 ) {
			if ( $delayPeriod < WPref::load( 'PSECURITY_NODE_SHIELD_LOGIN_FAILPERIOD' ) ) $delayPeriod = WPref::load( 'PSECURITY_NODE_SHIELD_LOGIN_FAILPERIOD' ) * 1.2;
			$incidentM = WModel::get( 'security.incident' );
			$incidentM->where( 'created', '<', time() - $delayPeriod );
			$incidentM->whereE( 'publish', 1 );
			$incidentM->whereE( 'type', 14 );
			$incidentA = $incidentM->load( 'ol', array( 'uid', 'incdtid', 'created' ) );
						if ( !empty( $incidentA ) ) {
				$uidA = array();
				$autoBlockA = array();
								$userLockC = WClass::get( 'users.api' );
				foreach( $incidentA as $one ) {
					if ( empty($one->uid) ) continue;
					$autoBlockA[] = $one->incdtid;
					$uidA[] = $one->uid;
										$incidentM->whereE( 'uid', $one->uid );
					$incidentM->whereE( 'publish', 1 );
					$incidentM->whereE( 'type', 11 );
					if ( $incidentM->exist() ) continue; 
					$status = $userLockC->blockUser( 0, $one->uid );
				}				
				$incidentM->whereIn( 'uid', $uidA );
				$incidentM->whereIn( 'type', array( 3, 5 ) );
				$incidentM->whereE( 'publish', 1 );
				$incidentM->setVal( 'publish', -1 );
				$incidentM->update();
			}			
		}		
				$delayPeriod = WPref::load( 'PSECURITY_NODE_SHIELD_INCIDENT_BLOCK_PERIOD' );
		if ( $delayPeriod > 0 ) {
			$incidentM = WModel::get( 'security.incident' );
			$incidentM->where( 'created', '<', time() - $delayPeriod );
			$incidentM->whereE( 'publish', 1 );
			$incidentM->whereE( 'type', 15 );				$incidentA = $incidentM->load( 'ol', array( 'ip', 'incdtid' ) );			
						if ( !empty( $incidentA ) ) {
				$autoBlockA = array();
				$ipA = array();
				foreach( $incidentA as $one ) {
					$autoBlockA[] = $one->incdtid;
					$ipA[] = $one->ip;
				}				
				$securityIPBM = WModel::get( 'security.ipblocked' );
								$securityIPBM->whereIn( 'ip', $ipA );
				$securityIPBM->whereE( 'status', 11 );
				$securityIPBM->setVal( 'status', 1 );
				$securityIPBM->update();
								$incidentM->whereIn( 'ip', $ipA );
				$incidentM->where( 'type', '>', 30 );
				$incidentM->whereE( 'publish', 1 );
				$incidentM->setVal( 'publish', -1 );
				$incidentM->update();
			}				
		}		
				$delayPeriod = WPref::load( 'PSECURITY_NODE_SHIELD_INCIDENT_BLACKLIST_PERIOD' );
		if ( $delayPeriod > 0 ) {
			$incidentM = WModel::get( 'security.incident' );
			$incidentM->where( 'created', '<', time() - $delayPeriod );
			$incidentM->whereE( 'publish', 1 );
			$incidentM->whereE( 'type', 16 );				$incidentA = $incidentM->load( 'ol', array( 'ip', 'incdtid' ) );			
						if ( !empty( $incidentA ) ) {
				$autoBlockA = array();
				$ipA = array();
				foreach( $incidentA as $one ) {
					$autoBlockA[] = $one->incdtid;
					$ipA[] = $one->ip;
				}		
				$securityIPBM = WModel::get( 'security.ipblocked' );
								$securityIPBM->whereIn( 'ip', $ipA );
				$securityIPBM->whereE( 'status', 7 );
				$securityIPBM->setVal( 'status', 1 );
				$securityIPBM->update();
				$incidentM->whereIn( 'ip', $ipA );
				$incidentM->where( 'type', '>', 30 );
				$incidentM->whereE( 'publish', 1 );
								$incidentM->setVal( 'publish', -1 );
				$incidentM->update();
			}		
		}		
				$securityIPBM = WModel::get( 'security.ipblocked' );
				$securityIPBM->where( 'enddate', '>', 99999 );			$securityIPBM->where( 'enddate', '<', time() );
		$securityIPBM->whereIn( 'status', array( 5, 7 ) );
		$securityIPBM->setVal( 'status', 1 );
		$securityIPBM->update();
	}	
}