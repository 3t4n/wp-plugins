<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_System_plugin extends WPlugin {
	private $_blockedUser = false;
	private static $_onRoute = false;
	private static $_actid = 0;
	private static $_ip = 0;
	function onUserLogin($user,$options) {
		if ( ! WPref::load( 'PSECURITY_NODE_DEFENSE_ACTIVE' ) ) return;
		if ( 'joomla' != JOOBI_FRAMEWORK_TYPE ) {
						$userM = WModel::get( 'users' );
			$userM->whereE( 'username', $user['username'] );
			$userM->whereE( 'blocked', 1 );
			$isBlocked = $userM->load( 'lr' );
			if ( $isBlocked ) {
								$USERNAME = $user['username'];
				$cause = str_replace(array('$USERNAME'), array($USERNAME),WText::t('1455832504BURV'));
				return $this->_blockOnLogin( 'failed_login', $cause );
			}			
		}
		$notifyIP = true;
		if ( WPref::load( 'PSECURITY_NODE_EMAIL_IPCHANGE' ) ) {
			$memberSessionC = WUser::session();
			self::$_ip = $memberSessionC->getIP();
						$previousip = WUsers::get( 'previousip', $user['username'] );
			if ( !empty($previousip) && $previousip == self::$_ip ) {
				$notifyIP = false;
			}				
		}		
		$isAdmin = WRoles::hasRole( 'manager' );
		$uid = WUser::get( 'uid' , $user['username'] );
		if ( $isAdmin && WPref::load( 'PSECURITY_NODE_EMAIL_ADMINS' ) ) {
			if ( !empty($uid) ) {
				if ( $notifyIP ) {
					$securityReportC = WClass::get( 'security.report' );
					$securityReportC->sendEmail( $uid, false, 'onAdminLogin' );
				}				
			} else {
				$email_wrong_attempt = WPref::load( 'PSECURITY_NODE_EMAIL_WRONG_ATTEMPT' );
				if ( !empty($email_wrong_attempt) ) {
					$mail = WMail::get();
					$subject = 'Login Attempt not identified';
					$body = "Hi, \r\n  The following user tried to login to the site but could not be identify";
					$body .= " \r\n  " . print_r( $user );
					$body .= " \r\n  Time:" . WApplication::date( WTools::dateFormat( 'day-date-time' ),  time() );
					$body .= " \r\n  IP:" . $memberSessionC->getIP();
					$mail->sendTextAdmin( $subject, $body, false );
				}
			}
		}		
		if ( $isAdmin && WPref::load( 'PSECURITY_NODE_EMAIL_ALLADMINS' ) ) {
			if ( $notifyIP ) {
				$securityReportC = WClass::get( 'security.report' );
				$securityReportC->sendEmail( $uid, true, 'onAdminLogin' );
			}					
		}					
		if ( WRoles::isAdmin() ) {
						$allowedAdmin = WPref::load( 'PSECURITY_NODE_ALLOWED_BE' );
			if ( $allowedAdmin ) {
				$allowedAdmin = trim( $allowedAdmin );
				$allowedAdminA = $this->_processString( $allowedAdmin );
				$USERNAME = strtolower( $user['username'] );
				if ( ! in_array( $USERNAME, $allowedAdminA ) ) {
					$cause = str_replace(array('$USERNAME'), array($USERNAME),WText::t('1453566966OOSN'));
					return $this->_blockOnLogin( 'admin_failed_login', $cause );
				}				
			}			
		}
		$notifyRoles = WPref::load( 'PSECURITY_NODE_NOTIF_LOGIN_ROLES' );
		if ( !empty($notifyRoles) ) {
			$notifyRolesA = $this->_processString( $notifyRoles );
			if ( !empty($notifyRolesA) ) {
				foreach( $notifyRolesA as $role ) {
					if ( WRoles::hasRole( $role, $uid ) ) {
						$securityReportC = WClass::get( 'security.report' );
						$securityReportC->sendEmail( $uid, true, 'onRoles' );
						break;
					}				}				
			}		
		}		
		$notifyUSers = WPref::load( 'PSECURITY_NODE_NOTIF_LOGIN_USERS' );
		if ( !empty($notifyUSers) ) {
			$notifyUsersA = $this->_processString( $notifyUSers );
			if ( !empty($notifyUsersA) ) {
				$uid = WUser::get( 'uid' , $user['username'] );
				$userName = strtolower( $user['username'] );
				foreach( $notifyUsersA as $myUser ) {
					if ( $uid == $myUser || $userName == $myUser ) {
						$securityReportC = WClass::get( 'security.report' );
						$securityReportC->sendEmail( $uid, true, 'onUsers' );
						break;
					}				}		
			}		
		}		
				$this->_monitorUserInfo();
						if ( WRoles::hasRole( 'manager', $uid ) ) {
			if ( WPref::load( 'PSECURITY_NODE_DISPLAY_LOGINS' ) ) {
																$usersM = WModel::get( 'users' );
				$usersM->whereE( 'uid', $uid );
				$userInfoO = $usersM->load( 'o', array( 'login', 'ip', 'ctyid' ) );
				$IP = long2ip( $userInfoO->ip );
				$countriesHelperC = WClass::get( 'countries.helper', null, 'class', false );
				if ( !empty($countriesHelperC) ) {
					$IP .= ' ' . $countriesHelperC->getCountryFlag( $userInfoO->ctyid, false, true );
				}			
				$message = str_replace(array('$IP'), array($IP),WText::t('1454522469STQJ'));
				$message .= '<br>';
				$DATE = WApplication::date( WTools::dateFormat( 'day-date-time' ), $userInfoO->login );
				$ELAPSED = WTools::durationToString( time() - $userInfoO->login );
				$message .= str_replace(array('$DATE','$ELAPSED'), array($DATE,$ELAPSED),WText::t('1454634249JQOE'));
				WGlobals::setSession( 'lastLogin', 'message', $message );
			}			
			$period = WPref::load( 'PSECURITY_NODE_USER_PWD_PERIOD' );
			if ( $period ) {					
								$usersDetailsM = WModel::get( 'users.details' );
				$usersDetailsM->whereE( 'uid', $uid );
				$datepwd = $usersDetailsM->load( 'lr', 'datepwd' );
				if ( empty( $datepwd ) ) {
					$message = WText::t('1457026745QZQH');
					$message .= '<br>';
					$message .= WText::t('1454593934TENX');
					WGlobals::setSession( 'lastPwdChange', 'message', $message );
				} else {
					$period = time() - $period * 86400;
					if ( $datepwd < $period ) {
						$DATE = WApplication::date( WTools::dateFormat( 'day-date-time' ) , $datepwd );
						$message = str_replace(array('$DATE'), array($DATE),WText::t('1454690829MGWZ'));
						$message .= '<br>';
						$message .= WText::t('1454593934TENX');
						WGlobals::setSession( 'lastPwdChange', 'message', $message );
					}								
				}				
			}			
		}		
	}
	function onAfterInitialise() {
		if ( ! WPref::load( 'PSECURITY_NODE_DEFENSE_ACTIVE' ) ) return true;
				if ( $this->_checkIPBlocked() ) return true;
				$securityBlockipC = WClass::get( 'security.blockip' );
		if ( $securityBlockipC->isWhiteList() ) {
						return true;
		}		
				$securityShieldC = WClass::get( 'security.shield' );
		$reason='';
		$cause='';
		$details = '';
		if ( ! $securityShieldC->verifyShield( self::$_ip, self::$_actid ) ) {
			return false;
		}		
		return true;		
	}
	function onAfterRoute() {
		if ( self::$_onRoute ) return;
		self::$_onRoute = true;
		self::$_actid = WGlobals::getSession( 'activity', 'actid', 0 );
				if ( ! $this->_checkRecordActivities() ) {
						if ( 'record' != self::$_actid ) {
								$this->_monitorIP();
			}
			WGlobals::setSession( 'activity', 'actid', 'record' );
			$this->_monitorUserInfo();
			return true;
		} else {
			$this->_monitorUserInfo();
		}
				$recordActivityPages = WGlobals::getSession( 'security', 'recordActivityPages' );
		$obj = $this->_fetchData( $recordActivityPages );
				$this->_defineAction( $recordActivityPages, $obj );
	}
	function onUserLoginFailure($message=array()) {
		if ( ! WPref::load( 'PSECURITY_NODE_DEFENSE_ACTIVE' ) ) return true;
		if ( empty($message['username']) ) return true;
		$securityLoginC = WClass::get( 'security.login' );
		$securityLoginC->failedLogin( $message, self::$_ip, self::$_actid );
		return true;
	}	
	public function onAfterDispatch() {
		if ( ! WPref::load( 'PSECURITY_NODE_DEFENSE_ACTIVE' ) ) return true;
				if ( WPref::load( 'PSECURITY_NODE_GENERATOR_HIDE' ) ) {
			$generator = WPref::load( 'PSECURITY_NODE_GENERATOR_CUSTOM' );
			if ( empty($generator) ) $generator = 'WEBAPP';
			if ( 'joomla' == JOOBI_FRAMEWORK_TYPE ) {
								$document = JFactory::getDocument();
				if ( ! method_exists( $document, 'setGenerator' ) ) {
					return;
				}				
				$document->setGenerator( $generator );
			} else {
							}		
		}		
	}	
	private function _checkIPBlocked() {
		$memberSessionC = WUser::session();
		self::$_ip = $memberSessionC->getIP();
				$securityBlockipC = WClass::get( 'security.blockip' );
		if ( $reason = $securityBlockipC->isIpBlocked( self::$_ip ) ) {				return $this->_blockNow( $reason );
		}					
			return false;
	}
	private function _checkRecordActivities() {
				$recordActivities = WPref::load( 'PSECURITY_NODE_RECORDACTIVITIES' );
		if ( $recordActivities == 1 ) return false;
				$noRecordIP = WPref::load( 'PSECURITY_NODE_NO_RECORD_IP' );
		$noRecordA = $this->_processString( $noRecordIP );
		if ( empty(self::$_ip) ) {
			$memberSessionC = WUser::session();
			self::$_ip = $memberSessionC->getIP();
		}		if ( in_array( self::$_ip, $noRecordA ) ) return false;
				$recordActivityPages = WGlobals::getSession( 'security', 'recordActivityPages' );
		if ( ! isset($recordActivityPages) ) {
			if ( WGlobals::checkCandy(50) ) {
				$recordActivityPages = WPref::load( 'PSECURITY_NODE_RECORDACTIVITYPAGES' );
				if ( $recordActivityPages == 2 && WRoles::isNotAdmin() ) {
					WGlobals::setSession('security','recordActivityPages', false );
				} elseif ( $recordActivityPages == 3 && WRoles::isAdmin() ) {
					WGlobals::setSession('security','recordActivityPages', false );
				} elseif ( $recordActivityPages == 1  ) {
					WGlobals::setSession('security','recordActivityPages', false );
				} else {
					WGlobals::setSession('security','recordActivityPages', true );
				}				
			} else {
				WGlobals::setSession('security','recordActivityPages', false );
			}
		}
				if ( $recordActivities == 2 && WRoles::isNotAdmin() ) { 
			return false;
		} elseif ( $recordActivities == 3 && WRoles::isAdmin() ) {
			return false; 
		} else { 
			return true;
		}
	}
	private function _monitorIP($ip='') {
		if ( ! WPref::load( 'PSECURITY_NODE_DEFENSE_ACTIVE' ) ) return false;
				$notifyIPs = WPref::load( 'PSECURITY_NODE_NOTIF_LOGIN_IPS' );
		if ( !empty($notifyIPs) ) {
			if ( empty($ip) ) {
				$memberSessionC = WUser::session();
				$ip = $memberSessionC->getIP();
			}				
			$notifyRolesA = $this->_processString( $notifyIPs );
			if ( !empty($notifyRolesA) ) {
				foreach( $notifyRolesA as $myIp ) {
					if ( $myIp === $ip ) {
						$securityReportC = WClass::get( 'security.report' );
						$securityReportC->sendEmail( WUsers::get( 'uid' ), true, 'onIPs' );
						break;
					}				}			
			}			
		}		
		return false;
	}	
	private function _monitorUserInfo() {
		if ( ! WPref::load( 'PSECURITY_NODE_DEFENSE_ACTIVE' ) ) return false;
				$allowedAdmin = WPref::load( 'PSECURITY_NODE_ALLOWED_ADMIN' );
		if ( !empty($allowedAdmin) ) {
			if ( WRoles::hasRole( 'admin' ) ) {
				$allowedAdminA = $this->_processString( $allowedAdmin );
				$USERNAME = strtolower( WUsers::get( 'username' ) );
				if ( ! in_array( $USERNAME, $allowedAdminA) ) {
					$cause = str_replace(array('$USERNAME'), array($USERNAME),WText::t('1453566967ZCL'));
					return $this->_blockOnLogin( 'admin_failed_login', $cause );
				}	
			}			
		}
		$blockFEAdmin = WPref::load( 'PSECURITY_NODE_BLOCK_FE_ADMIN' );
		if ( $blockFEAdmin && WRoles::isNotAdmin() ) {
			if ( WRoles::hasRole( 'admin' ) ) {
				$USERNAME = WUsers::get( 'username' );
				$cause = str_replace(array('$USERNAME'), array($USERNAME),WText::t('1453566967ZCM'));
				return $this->_blockOnLogin( 'admin_failed_login', $cause );
			}		}		
		$blockNoneWhitelistAdmin = WPref::load( 'PSECURITY_NODE_BLOCK_ADMIN_NO_WHITELIST' );			if ( $blockNoneWhitelistAdmin && WRoles::hasRole( 'manager' ) ) {
						$securityBlockipC = WClass::get( 'security.blockip' );
			if ( ! $securityBlockipC->isWhiteList( self::$_ip ) ) {
				$USERNAME = WUsers::get( 'username' );
				$cause = str_replace(array('$USERNAME'), array($USERNAME),WText::t('1453566967ZCN'));
				return $this->_blockOnLogin( 'admin_no_whitelist', $cause );
			}			
		}		
		$admin_username = WPref::load( 'PSECURITY_NODE_BLOCK_ADMIN_USERNAME' );
		if ( $admin_username ) {
			if ( 'admin' == WUsers::get( 'username' ) ) {
				$cause = WText::t('1453566967ZCO');
				return $this->_blockOnLogin( 'admin_username', $cause ); 
			}		}		
		return false;
	}		
	private function _fetchData($recordActivityPages) {	
		$obj = new stdClass;
				if ( empty(self::$_actid) ) {
			$browserO = WPage::browser();
			$libraryDeviceC = WClass::get( 'library.device' );
			$platformO = $libraryDeviceC->platform();
			$platformO->name = $platformO->name;
			$memberSessionC = WUser::session();
			self::$_ip = $memberSessionC->getIP();
			$ipInfo = WClass::get( 'security.lookup' );
			$ctyid = $ipInfo->ipInfo( self::$_ip, 'ctyid' );
			$obj->ctyid = $ctyid;
			$obj->ip = self::$_ip;
			$obj->sessionid = WUser::getSessionId();
			$obj->referer = WGlobals::get( 'HTTP_REFERER', null, 'server' );
			$obj->browser = $browserO->key;
			$obj->os = $platformO->key;
			if ( IS_ADMIN ) {
				$obj->space = IS_ADMIN;
			} else {
				$obj->space = 1;
			}
			$libraryDeviceC = WClass::get( 'library.device' );
			$obj->mobile = $libraryDeviceC->isMobile();
			$obj->robot = ( ( $browserO->key > 150 && $browserO->key < 200 ) ? 1: 0 );
			$https = WGlobals::get( 'HTTPS', null, 'server' );
			if ( !empty($https) ) {
				$obj->secure = 1;
			} else {
				$obj->secure = 0;
			}
		}
		$obj->uid = WUsers::get('uid');
		if ( empty($obj->uid) ) {
			$obj->login = 1;
		} else {
			$obj->login = ( WRoles::hasRole( 'admin' ) ? 9 : 5 );
		}		
				if ( !empty($recordActivityPages) ) {
			$agent = WGlobals::get( 'HTTP_USER_AGENT', null, 'server' );
			$pagetitle = WGlobals::get( 'titleheader', '', '', 'string' );
						$pageurl = WGlobals::get( 'REQUEST_URI', null, 'server' );
			$ctrid = $this->_createControllerInformation();
			$optionExt = WApplication::getApp() . '.application';
			$wid = WExtension::get( $optionExt, 'wid' );
			$obj->pageurl = $pageurl;
			$obj->pagetitle = $pagetitle;
			$obj->wid = $wid;
			$obj->ctrid = $ctrid;
			if ( WPref::load( 'PSECURITY_NODE_RECORD_REQUEST' ) ) {
				$request = WGlobals::getEntireSuperGlobal( 'request' );
				$files = WGlobals::getEntireSuperGlobal( 'files' );
				$joobiUser = WGlobals::getSession( 'JoobiUser' );
				if ( JOOBI_FRAMEWORK_TYPE == 'joomla' ) {
					$joomlaUser = WGlobals::getSession( '__default' );
					if ( empty($joomlaUser) ) {
												$jadminToolUser = JFactory::getUser();
						$joomlaUser = new stdClass;
						$joomlaUser->id = $jadminToolUser->id;
						$joomlaUser->name = $jadminToolUser->name;
						$joomlaUser->username = $jadminToolUser->username;
						$joomlaUser->email = $jadminToolUser->email;
						$joomlaUser->guest = $jadminToolUser->guest;
						if ( !empty($jadminToolUser->gid) ) $joomlaUser->gid = $jadminToolUser->gid;
						$joomlaUser->groups = $jadminToolUser->groups;
					}				}				
				$jsonA = array();
				$jsonA['REQUEST'] = $request;
				if ( !empty($joomlaUser) ) {
					$jsonA['JOOMLAUSER'] = $joomlaUser;
				}				$jsonA['JOOBIUSER'] = $joobiUser;
				$obj->request = serialize( $jsonA );
				if ( !empty($files) ) {
					$jsonA['FILES'] = $files;
				}
				$obj->request = serialize( $jsonA );
			}			
		}
		return $obj;
	}
	private function _defineAction($recordActivityPages,$obj) {
		if ( empty(self::$_actid) ) {
						self::$_actid = $this->_saveActivity( $obj );
		} else {
						$this->_updateActivity();
		}
		if ( !empty($recordActivityPages)  && $recordActivityPages && !empty(self::$_actid) ) {
						$this->_insertActivityPages( $obj );
		}
	}
	private function _saveActivity($obj) {
		$blocked = ( $this->_blockedUser ? 6 : 9 );
				$securityActivityM = WModel::get( 'security.activity' );
		if ( empty($securityActivityM) ) return false;
		$securityActivityM->whereE( 'ip', ip2long($obj->ip) );
		$count = $securityActivityM->total();
		$returning = ( !empty($count) ? 1 : 0 );
										if ( $returning > 0 ) {
			$securityActivityM->whereE( 'ip', ip2long($obj->ip) );
			$securityActivityM->whereE( 'browser', $obj->browser );
			$securityActivityM->whereE( 'os', $obj->os );
			$securityActivityM->where( 'created', '>', ( time() - 10 ) );
			$securityActivityM->orderBy( 'created', 'DESC' );
			self::$_actid = $securityActivityM->load( 'lr', 'actid' );
			if ( !empty(self::$_actid) ) $securityActivityM->actid = self::$_actid;
		}		
		$securityActivityM->ip = $obj->ip;
		$securityActivityM->uid = $obj->uid;
		$securityActivityM->sessionid = $obj->sessionid;
		$securityActivityM->referer = $obj->referer;
		$securityActivityM->browser = $obj->browser;
		$securityActivityM->os = $obj->os;
		$securityActivityM->space = $obj->space;
		$securityActivityM->secure = $obj->secure;
		$securityActivityM->blocked = $blocked;
		$securityActivityM->returning = $returning;
		$securityActivityM->newuser = (!$returning);
		$securityActivityM->returningcount = $count;
		$securityActivityM->mobile = $obj->mobile;
		$securityActivityM->nonemobile = ( ! $obj->mobile );
		$securityActivityM->robot = $obj->robot;
		$securityActivityM->ctyid = $obj->ctyid;
		$securityActivityM->login = $obj->login;
		$securityActivityM->returnId();
		$securityActivityM->save();
		self::$_actid = $securityActivityM->actid;
		WGlobals::setSession( 'activity', 'actid', self::$_actid );
				$this->_monitorIP( $obj->ip );
		return self::$_actid;
	}
	private function _insertActivityPages($obj) {
		$eid = WGlobals::getEID();
		$securityActivityPagesM = WModel::get( 'security.activitypages' );
		$securityActivityPagesM->actid = self::$_actid;
		$securityActivityPagesM->pagetile = $obj->pagetitle;
		$securityActivityPagesM->pageurl = $obj->pageurl;
		$securityActivityPagesM->login = $obj->login;
		$securityActivityPagesM->wid = $obj->wid;
		$securityActivityPagesM->ctrid = $obj->ctrid;
		if ( !empty($obj->request) ) $securityActivityPagesM->request = $obj->request;
		if ( !empty($eid) ) $securityActivityPagesM->eid = $eid;
		$securityActivityPagesM->created = time(); 
		$securityActivityPagesM->insert();
	}
	private function _updateActivity() {
				$sessionid = WUser::getSessionId();
		$uid = WUser::get('uid');
		$securityActivityM = WModel::get('security.activity');
		if ( empty($securityActivityM) ) return false;
		if ( ! WUsers::get('uid') ) {
			$login = 1;
		} else {
			$login = ( WRoles::hasRole( 'admin' ) ? 9 : 5 );
		}		
		$securityActivityM->setVal( 'login', $login );
		$securityActivityM->setVal( 'modified', time() );
		$securityActivityM->setVal( 'duration', $securityActivityM->setCalcul( 'modified', '-', 'created', 0, 0 ) );
		$securityActivityM->setVal( 'uid', $uid );
		$securityActivityM->whereE( 'actid', self::$_actid );
		$securityActivityM->update();
	}
	private function _blockNow($reason='',$cause='') {
		$this->_blockedUser = true;
				$this->onAfterRoute();
		if ( !empty(self::$_ip) ) {
						$securityIPBM = WModel::get( 'security.ipblocked' );
			$securityIPBM->whereE( 'ip', ip2long( self::$_ip ) );
			$securityIPBM->setVal( 'modified', time() );
			$securityIPBM->updatePlus( 'attempt' );
			$securityIPBM->update();
		}	
		$securityReportC = WClass::get( 'security.report' );
		$securityReportC->setIP( self::$_ip, self::$_actid );
		return $securityReportC->blockPage( $reason, $cause );
	}	
	private function _blockOnLogin($reason='',$cause='') {
		$dontCheckLogin = WGlobals::getSession( 'gosht', 'dontCheckLogin', false );
		if ( $dontCheckLogin ) return true;
				$this->onAfterRoute();
				$whitelist = WPref::load( 'PSECURITY_NODE_ALLOW_WHITELIST' );
		if ( $whitelist ) {
			$securityBlockipC = WClass::get( 'security.blockip' );
			if ( $securityBlockipC->isWhiteList( self::$_ip ) ) return true;
		}		
		$securityReportC = WClass::get( 'security.report' );
		$securityReportC->setIP( self::$_ip, self::$_actid );
		return $securityReportC->blockPage( $reason, $cause );
	}	
	private function _getUid($user) {
		$uid = WUser::get('uid');
		if ( !isset($user['id']) ) {
			$user['id'] = WUser::cmsMyUser( 'id' );
		}
		if ( empty($user['id']) ) {
			$usersM = WModel::get( 'users', 'object' );
			$usersM->whereE( 'username', $user['username'] );
			$user['uid'] = $usersM->load('lr','uid');
		}
		$uid = $user['uid'];
		return $uid;
	}
	private function _processString($commaString) {
				$commaString = trim($commaString);
		$commaString = strtolower($commaString);
		$commaString = str_replace( ' ', '', $commaString );
		$commaString = str_replace( array( "\r\n", "\n\r", "\r", "\n" ), ',', $commaString );
		return explode( ',', $commaString );
	}	
	private function _createControllerInformation() {
		$app = WGlobals::get( 'controller' );
		if ( empty($app) ) return 0;
				return WController::get( '', 'ctrid' );
	}
}