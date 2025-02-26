<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_Ipblocked_model extends WModel {
	function addValidate() {
		if ( WPref::load( 'PSECURITY_NODE_MANAGE_IP' ) && !empty($this->ip) ) {
			$this->ip = trim( $this->ip );
						$longIP = ip2long( $this->ip );
			if ( !empty($longIP) ) {
								$securityIPBM = WModel::get( 'security.ipblocked' );
								$securityIPBM->whereE( 'ip', $longIP );
				$ipblid = $securityIPBM->load( 'lr', 'ipblid' );
				if ( !empty($ipblid) ) {
					$this->historyW('1454866807PZCY');
				}			}					
		}		
		if ( WPref::load( 'PSECURITY_NODE_MANAGE_USERNAME' ) && !empty($this->username) ) {
						$securityIPBM = WModel::get( 'security.ipblocked' );
						$securityIPBM->whereE( 'username', $this->username );
			$ipblid = $securityIPBM->load( 'lr', 'ipblid' );
			if ( !empty($ipblid) ) {
				$this->historyW('1459827184QBMZ');
			}				
		}		
		if ( WPref::load( 'PSECURITY_NODE_MANAGE_COUNTRY' ) && !empty($this->ctyid) ) {
						$securityIPBM = WModel::get( 'security.ipblocked' );
						$securityIPBM->whereE( 'ctyid', $this->ctyid );
			$ipblid = $securityIPBM->load( 'lr', 'ipblid' );
			if ( !empty($ipblid) ) {
				$this->historyW('1459827184QBNA');
			}		
		}		
		if ( WPref::load( 'PSECURITY_NODE_MANAGE_ROLE' ) && !empty($this->rolid) ) {
						$securityIPBM = WModel::get( 'security.ipblocked' );
						$securityIPBM->whereE( 'rolid', $this->rolid );
			$ipblid = $securityIPBM->load( 'lr', 'ipblid' );
			if ( !empty($ipblid) ) {
				$this->historyW('1459827184QBNB');
			}		
		}		
		return true;
	}
	function validate() {
		$this->validateDate( 'startdate' );
		$this->validateDate( 'enddate', true );
		if ( WPref::load( 'PSECURITY_NODE_MANAGE_IP' ) && !empty($this->ip) ) {
			$this->ip = trim( $this->ip );
			$userSessionC = WUser::session();
			if ( ! $userSessionC->validateIP( $this->ip, true ) ) {
				$message = WMessage::get();
				return $message->historyE('1382224949KWML');
			}					
		}		
		if ( WPref::load( 'PSECURITY_NODE_MANAGE_USERNAME' ) && !empty($this->username) ) {
			$uid = WUsers::get( 'uid', $this->username );
			if ( empty($uid) ) {
				$this->historyW('1459827184QBNC');
			}				
		}		
		if ( 3 == $this->status ) {				$this->reasontype = 22;
		}		
		if ( 1 == $this->status ) {				$this->reasontype = 21;
		}		
		if ( empty( $this->reasontype ) ) {
			$this->reasontype = 11;
		}
		return true;
	}
	function extra() {
		if ( 4 < $this->status ) {
			if ( !empty($this->ip) ) {
								$securityBlockIpC = WClass::get( 'security.blockip' );
				$securityBlockIpC->blockNow( $this->ip );
			}				
		}
		return true;
	}
	function copyValidate() {
		unset( $this->ip );
		$this->username = '';
		$this->ctyid = 0;
		$this->rolid = 0;
		return true;
	}
}