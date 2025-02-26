<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_Blockip_class extends WClasses {
	static $ipO = array();
	public function isWhiteList($ip=null) {
		if ( empty($ip) ) {
			$memberSessionC = WUser::session();
			$ip = $memberSessionC->getIP();
			if ( empty($ip) ) return false;
		}		
		if ( !isset( self::$ipO[$ip] ) ) self::$ipO[$ip] = $this->_loadIPInfo( $ip );
		if ( empty(self::$ipO[$ip]) ) return false;
		$ipO = self::$ipO[$ip];
		if ( 3 == $ipO->status ) {
						if ( $ipO->startdate >0 && time() < $ipO->startdate ) return false;
			elseif ( $ipO->enddate >0 && time() > $ipO->enddate ) return false;
			return true;
		}		
		return false;
	}	
	public function isIpBlocked($ip) {
				if ( empty($ip) ) return false;
		$task = WGlobals::get( 'task' );
		$cntroller = WGlobals::get( 'controller' );
		$mainApp = WGlobals::get( JOOBI_URLAPP_PAGE );
		if ( 'blockpage' == $task && 'security' == $cntroller ) {				return false;
		}		
				$blockRobos = WPref::load( 'PSECURITY_NODE_BLOCK_ROBOTS' );
		$blockUnknwn = WPref::load( 'PSECURITY_NODE_BLOCK_UNKNOWN' );
		if ( $blockRobos || $blockUnknwn ) {
			$browserO = WPage::browser();			
			if ( ! is_numeric($browserO->key) ) {
				return 'unknow_browser';
			} elseif ( $blockUnknwn && 239 == $browserO->key ) {
				return 'unknow_browser';
			} elseif ( $blockRobos && $browserO->key > 150 && $browserO->key < 190 ) {
				return 'robot';
			}		
		}		
		$longIP = ip2long( $ip );
				$blacklist = WPref::load( 'PSECURITY_NODE_BLOCK_BLACKLIST' );
		if ( $blacklist ) {
						$ipO = $this->_loadIPInfo( $ip );
			if ( !empty($ipO) ) {
								if ( 7 == $ipO->status ) {
										if ( $ipO->startdate > 0 && time() < $ipO->startdate ) return false;
					elseif ( $ipO->enddate > 0 && time() > $ipO->enddate ) return false;
					return 'backlist_ip';
				}				
			}
		}		
								$ipO = $this->_loadIPInfo( $ip );
		if ( !empty($ipO) ) {
						if ( 5 == $ipO->status ) {
								if ( $ipO->startdate >0 && time() < $ipO->startdate ) return false;
				elseif ( $ipO->enddate >0 && time() > $ipO->enddate ) return false;
				if ( empty($ipO->blockedpage) ) {
					if ( WRoles::isAdmin() ) {
						return 'block_ip';
					} else {
						if ( empty( $ipO->message ) ) {
							$ipO->message = WText::t('1462318744JSSK');
						} else {
							WGlobals::setSession( 'security', 'blockMessage', $ipO->message );
						}						
						$MESSAGE = $ipO->message;
						$this->userW( $MESSAGE );
						return $this->_blockPage( $MESSAGE );
					}				
				} else {
										$securityIPBPageM = WModel::get( 'security.ipblockedpages' );
					$securityIPBPageM->remember( $ipO->ipblid, true );
					$securityIPBPageM->whereE( 'ipblid', $ipO->ipblid );
					$pageA = $securityIPBPageM->load( 'lra', 'page' );
					if ( empty( $pageA ) ) {
						if ( WRoles::isAdmin() ) {
							return 'block_ip';
						} else {
							if ( empty( $ipO->message ) ) {
								$ipO->message = WText::t('1462318744JSSK');
							} else {
								WGlobals::setSession( 'security', 'blockMessage', $ipO->message );
							}							
							$MESSAGE = $ipO->message;
							$this->userW( $MESSAGE );
							return $this->_blockPage( $MESSAGE );
						}					
					} else {
						$url = WGlobals::get( 'REQUEST_URI', '', 'server' );
						if ( strpos( $url, '?' ) !== false ) {
							$hasMark = true;
						} else {
							$hasMark = false;
						}
						if ( JOOBI_USE_SEF ) {
							$url2Check = substr( $url, strlen(JOOBI_SITE_PATH) );
						} else {
							$aA = explode( '?', $url );
							$url2Check = array_pop( $aA );
						}						
						$pageIsBlocked = false;
												foreach( $pageA as $page ) {
							$isBlockedURL = true;
														if ( '?' == $page[0] ) $page = substr( $page, 1 );
							if ( strpos( $page, '?' ) !== false ) {
								$apA = explode( '?', $page );
								$page = array_pop( $apA );
							}
							if ( $page == $url2Check ) {
								$pageIsBlocked = true;
								break;
							} else {
								if ( $hasMark ) {
									$pgA = explode( '&', $page );
									$isBlockedURL = false;
									$globalsBlocked = true;
									foreach( $pgA as $check ) {
																														$explodeEqualA = explode( '=', $check );
										if ( !empty($explodeEqualA[1]) ) {
											if ( $explodeEqualA[1] != WGlobals::get( $explodeEqualA[0] ) ) {
												$globalsBlocked = false;
											}										} else {
											$globalsBlocked = false;
										}					
									}									
									if ( $globalsBlocked ) {
										$pageIsBlocked = true;
										break;
									}									
								} else {
									$pageIsBlocked = false;
								}								
							}								
						}						
						if ( $pageIsBlocked ) {
														if ( empty( $ipO->message ) ) {
								$ipO->message = WText::t('1462318744JSSK');
							} else {
								WGlobals::setSession( 'security', 'blockMessage', $ipO->message );
							}								
							$MESSAGE = $ipO->message;
							$this->userW( $MESSAGE );
							return $this->_blockPage( $MESSAGE );
						}			
					}						
				}				
				return false;
			}	
		}		
		return false;
	}
	private function _loadIPInfo($ip) {
		if ( isset( self::$ipO[$ip] ) ) return self::$ipO[$ip];
		$longIP = ip2long( $ip );
		$securityIPBM = WModel::get( 'security.ipblocked' );
		$hasCondition = false;
		if ( WPref::load( 'PSECURITY_NODE_MANAGE_IP' ) ) {
			$securityIPBM->whereE( 'ip', $longIP );
			$hasCondition = true;
			$or = true;
		} else {
			$or = false;
		}	
		if ( WPref::load( 'PSECURITY_NODE_MANAGE_USERNAME' ) ) {
			$username = WUsers::get( 'username' );
			if ( !empty($username) ) {
				if ($or) $securityIPBM->operator( 'OR' );
				$securityIPBM->whereE( 'username', $username );
				$hasCondition = true;
				$or = true;
			} else {
				$or = false;
			}		} else {
			$or = false;
		}	
		if ( WPref::load( 'PSECURITY_NODE_MANAGE_COUNTRY' ) ) {
			$iptrackerLookupC = WClass::get( 'security.lookup' );
			$ctyid = $iptrackerLookupC->ipInfo( $ip, 'ctyid' );
			if ( !empty($ctyid) ) {
				if ($or) $securityIPBM->operator( 'OR' );
				$securityIPBM->whereE( 'ctyid', $ctyid );
				$hasCondition = true;
				$or = true;
			} else {
				$or = false;
			}		} else {
			$or = false;
		}	
		if ( WPref::load( 'PSECURITY_NODE_MANAGE_ROLE' ) ) {
			$rolidA = WUsers::roles();
			if ( !empty($rolidA) ) {
				if ($or) $securityIPBM->operator( 'OR' );
				$securityIPBM->whereIn( 'rolid', $rolidA );
				$hasCondition = true;
				$or = true;
			} else {
				$or = false;
			}		} else {
			$or = false;
		}	
		if ( $hasCondition ) $ipO = $securityIPBM->load( 'o' );
		if ( empty( $ipO ) ) $ipO = false;
		self::$ipO[$ip] = $ipO;
		return $ipO;
	}	
	private function _blockPage($mess) {
		$hasPageId = WPage::getPageId( 'security' );
		if ( JOOBI_USE_SEF ) {
			if ( $hasPageId && ! is_bool($hasPageId) ) {
				WPages::redirect( 'controller=security&task=blockpage', $hasPageId );
			} else {
				$securityReportC = WClass::get( 'security.report' );
				echo $securityReportC->displayBlueMessage( $mess );
				exit;
			}			
		} else {
			if ( ! is_bool($hasPageId) ) {
				WPages::redirect( 'controller=security&task=blockpage', $hasPageId );
			} else {
				$securityReportC = WClass::get( 'security.report' );
				echo $securityReportC->displayBlueMessage( $mess );
				exit;
			}		}		
		return false;
	}	
	public function blockNow($ip) {
				$securityActivityM = WModel::get( 'security.activity' );
		if ( empty($securityActivityM) ) return false;
		$longIP = ip2long( $ip );
		$securityActivityM->whereE( 'ip', $longIP );
		$allSessionA = $securityActivityM->load( 'lra', 'sessionid' );
		if ( empty($allSessionA) ) return true;
		$usersAddon = WAddon::get( 'api.'. JOOBI_FRAMEWORK . '.user' );
		$usersAddon->deleteSession( $allSessionA );
	}	
}