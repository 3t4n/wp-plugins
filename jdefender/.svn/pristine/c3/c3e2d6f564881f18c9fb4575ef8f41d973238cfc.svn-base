<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_Report_class extends WClasses {
	private $_actid = 0;
	private $_ip = 0;
	private static $_userA = array();
	public function blockPage($reason='',$cause='',$details='',$destrySession=true,$uid=null,$blockPage=true) {
		$task = WGlobals::get( 'blockpage' );
		$cntroller = WGlobals::get( 'controller' );
		$mainApp = WGlobals::get( JOOBI_URLAPP_PAGE );
		if ( 'blockpage' == $task && 'security' == $cntroller && JOOBI_MAIN_APP == WApplication::getApp(false) ) {
			return true;
		}		
				if ( WPref::load( 'PSECURITY_NODE_ALLOW_WHITELIST' ) ) {						
						$securityBlockipC = WClass::get( 'security.blockip' );
			if ( $securityBlockipC->isWhiteList( $this->_ip ) ) {
				$blockPage = false;
			}
		}		
		$incidentTypeP = WView::picklist( 'security_incident' );
		$type = $incidentTypeP->getValueFromIdentifier( $reason );
		if ( !empty($type) ) {
												$incdtid = $this->recordIncident( $reason, $cause, $details, true, $uid, null, $blockPage );
		}
				if ( ! $blockPage ) return true;
		$blockIncidents = WPref::load( 'PSECURITY_NODE_BLOCK_INCIDENTS' );
		$explodeA = explode( '|_|', $blockIncidents );
		if ( ( in_array( 0, $explodeA ) || in_array( $type, $explodeA ) ) ) {
			$blockAction = WPref::load( 'PSECURITY_NODE_BLOCK_INCIDENTS_ACTION' );
			if ( 3 == $blockAction ) {
				$this->_blockIP( 'auto_block_ip', $type, $cause, false );
			} elseif ( 5 == $blockAction ) {
				$uid = WUsers::get( 'uid' );
				if ( !empty($uid) ) {
					$securityBlockipC = WClass::get( 'security.blockip' );
					if ( ! $securityBlockipC->isWhiteList() ) {
												$userLockC = WClass::get( 'users.api' );
						$status = $userLockC->blockUser( 1, $uid, false );
					}					
					$this->recordIncident( 'auto_blocked_user', $cause, $details );
				}				
			} else {					$this->_blockIP( 'auto_block_ip', $type, $cause, false );
				$uid = WUsers::get( 'uid' );
				if ( !empty($uid) ) {
					$securityBlockipC = WClass::get( 'security.blockip' );
					if ( ! $securityBlockipC->isWhiteList() ) {
												$userLockC = WClass::get( 'users.api' );
						$status = $userLockC->blockUser( 1, $uid, false );
					}					
					$this->recordIncident( 'auto_blocked_user', $cause, $details );
				}				
			}			
		}		
		if ( $destrySession ) {
						$usersAddon = WAddon::get( 'api.' . JOOBI_FRAMEWORK . '.user' );
			$usersAddon->deleteSession( WUsers::getSessionId() );
			$usersAddon->destroySession();
		}	
		$showForm = true;
		switch ( $reason ) {
			case 'badwords':				case 'adminsecret':					$message = $cause;
				break;
			case 'shieldsql':				case 'shieldmua':				case 'shieldrfi':				case 'shielddfi':				case 'shieldsp':				case 'tpmlmisuse':				case 'shieldfile':					
				$message = WText::t('1456267582MLHB');
				break;
			case 'failed_login':					$message = $details;
				break;
			case 'auto_blocked_user':					$message = WText::t('1454634248LEDH');
				break;
			case 'auto_block_ip':					$message = WText::t('1454634248LEDI');
				break;
			case 'auto_blacklist_ip':					$message = WText::t('1454634248LEDJ');
				break;
			case 'manually_blocked_ip':					$message = WText::t('1454634248LEDH');
				break;
			case 'admin_failed_login':					$message = WText::t('1453566967ZCP');
				break;
			case 'admin_no_whitelist':					$message = WText::t('1453566967ZCQ');
				break;
			case 'admin_username':					$message = WText::t('1453566967ZCR');
				break;
			case 'backlist_ip':
				$message = WText::t('1389444030LCWO');
				break;
			case 'block_ip':
				$message = WText::t('1454947264HLMX');
				break;
			case 'unknow_browser':
				$message = WText::t('1453566967ZCS');
				$showForm = false;
				break;
			case 'robot':					$message = WText::t('1453566967ZCT');
				$showForm = false;
				break;
			default:
				$message = WText::t('1453566967ZCU');
				$showForm = false;
				break;
		}	
		if ( empty($message) ) $message = WText::t('1453566967ZCT');
		$html = $this->displayBlueMessage( $message );
								if ( $destrySession && $showForm && !empty($requestEmail) && WPref::load( 'PSECURITY_NODE_REQUEST_FORM' ) ) {
			$html .= '<br>';
			$html .= '<div style="margin: 50px; padding: 50px; background: white none repeat scroll 0pt; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; color: gray; font-size: 1.2em; text-align: center;">';
			$html .= '<form action="mailto:' . $requestEmail . '" method="post" enctype="text/plain">';
			if ( WUsers::get( 'uid' ) ) {
				$name = WUsers::get( 'name' );
				$email = WUsers::get( 'email' );
			} else {
				$name = WText::t('1453721227OEOB');
				$email = WText::t('1206732400OXBP');
			}	
			$html .= WText::t('1206732392OZVB') . ': <input type="text" name="name" value="' . $name . '"><br>';
			$html .= WText::t('1206732411EGRU') . ': <input type="text" name="mail" value="' . $email . '"><br>';
			$html .= WText::t('1453721227OEOC') . ':<br>';
			$html .= '<textarea name="comment" cols="80" rows="5">';
			$incidentTypeP = WView::picklist( 'security_incident' );
			$type = $incidentTypeP->getValueFromIdentifier( $reason );
			$incidentTypeP = WView::picklist( 'security_incident' );
			$myReason = $incidentTypeP->getName( $type );
			$html .= 'I have been blocked from accessing your website: ' . JOOBI_SITE . "\n";
			$html .= 'Would you mind to re-establish my access?' . "\n";
			$html .= 'Reason: ' . $myReason . "\n";
						$html .= '</textarea><br><br>';
			$html .= '<input style="font-size: 1.3em;background-color: lightcyan;" type="submit" value="' . WText::t('1453721227OEOD') . '"></form>';
			$html .= '</div>';
		}	
		$html .= '</body>';
		echo $html;
		exit;
	}	
	public function setIP($ip='',$actid='') {
		if ( empty($ip) ) {
			$memberSessionC = WUser::session();
			$ip = $memberSessionC->getIP();
		}		if ( empty($actid) ) {
			$actid = WGlobals::getSession( 'activity', 'actid', 0 );
		}		
		$this->_ip = $ip;
		$this->_actid = $actid;
	}	
	public function recordIncident($reason='',$cause='',$details='',$sendEmail=true,$uid=null,$ip=null,$blockPage=true) {
		static $alreadyDoneA = array();
		if ( !empty( $alreadyDoneA[$reason] ) ) return true;
		$alreadyDoneA[$reason] = true;
					$incidentTypeP = WView::picklist( 'security_incident' );
		$type = $incidentTypeP->getValueFromIdentifier( $reason );
		if ( !isset($uid) ) $uid = WUsers::get( 'uid' );
		if ( empty($ip) ) $ip = $this->_ip;
		if ( $blockPage ) {
									if ( 30 < $type ) {
				$delayPeriod = WPref::load( 'PSECURITY_NODE_SHIELD_INCIDENT_BLOCK_PERIOD' );
				$longIP = ip2long( $ip );
								$incidentM = WModel::get( 'security.incident' );
				$incidentM->where( 'created', '>', time() - $delayPeriod );
				$incidentM->whereE( 'publish', 1 );
				$incidentM->whereE( 'ip', $longIP );
				$incidentM->where( 'type', '>', 30 );
				$incidentA = $incidentM->load( 'ol', array( 'ip', 'incdtid', 'created', 'type' ) );
				if ( !empty($incidentA) ) {
					$isBlocked = false;
										if ( count($incidentA) >= WPref::load( 'PSECURITY_NODE_SHIELD_INCIDENT_BLACKLIST_MAX' ) ) {
						$this->_blockIP( 'auto_blacklist_ip', $type, $cause );
						$isBlocked = true;
					} else {
						$typesA = array();
												foreach( $incidentA as $incidt ) {
							$typesA[$incidt->type] = true;
						}						
						if ( count($typesA) >= WPref::load( 'PSECURITY_NODE_SHIELD_INCIDENT_BLACKLIST_MAXDIFF' ) ) {
														$this->_blockIP( 'auto_blacklist_ip', $type, $cause );
							$isBlocked = true;
						}							
					}
					if ( ! $isBlocked ) {
												if ( count($incidentA) >= WPref::load( 'PSECURITY_NODE_SHIELD_INCIDENT_BLOCK_MAX' ) ) {
							$this->_blockIP( 'auto_block_ip', $type, $cause );
						} else {
							$typesA = array();
														foreach( $incidentA as $incidt ) {
								$typesA[$incidt->type] = true;
							}						
							if ( count($typesA) >= WPref::load( 'PSECURITY_NODE_SHIELD_INCIDENT_BLOCK_MAXDIFF' ) ) {
																$this->_blockIP( 'auto_block_ip', $type, $cause );
							}						
						}						
					}						
				}					
			} elseif ( 'manually_blocked_ip' == $reason ) {
				$this->_blockIP( 'manually_blocked_ip', $type, $cause, true, $ip );
			}			
		}
			$url = WGlobals::get( 'REQUEST_URI', null, 'server' );
			$securityIncidentM = WModel::get( 'security.incident' );
			$securityIncidentM->setVal( 'type', $type );
			$securityIncidentM->setVal( 'ip', $ip, 0, null, 'ip' );
			$securityIncidentM->setVal( 'uid', $uid );
			$securityIncidentM->setVal( 'publish', 1 );
			$securityIncidentM->setVal( 'created', time() );
			$securityIncidentM->setVal( 'severity', $this->_severityMatch( $type ) );
			$securityIncidentM->setVal( 'actid', $this->_actid );
			if ( !empty($cause) ) $securityIncidentM->setVal( 'alias', $cause );
			if ( !empty($url) ) $securityIncidentM->setVal( 'url', $url );
			if ( !empty($details) ) $securityIncidentM->setVal( 'details', $details );
			$securityIncidentM->returnId();
			$securityIncidentM->insertIgnore();
		$incidentEmail = WPref::load( 'PSECURITY_NODE_INCIDENT_EMAILS' );
		$explodeA = explode( '|_|', $incidentEmail );
		if ( $sendEmail && ( in_array( $type, $explodeA ) ) ) {				$this->sendEmail( $uid, true, $type, 'security_incident_alert', $cause );
		}	
		if ( !empty($securityIncidentM->incdtid) ) return $securityIncidentM->incdtid;
		else return 0;
	}	
	public function sendEmail($uid,$admin2Email=true,$reason='',$emailType='security_login_alert',$cause='') {
		if ( 'security_login_alert' == $emailType ) {
			if ( empty($uid) && in_array( $uid, self::$_userA ) ) return false;
			self::$_userA[] = $uid;
		} else {
			$admin2Email = true;
		}	
		$mail = WMail::get();
		$mail->setParameters( $this->_getEmailParams( $uid, $reason, $cause ) );
		if ( $admin2Email ) {
			$adminEmail = WPref::load( 'PSECURITY_NODE_NOTIF_LOGIN_EMAIL' );
			if ( !empty($adminEmail) ) {
								$mail->sendNow( $adminEmail, $emailType, false );
			} else {
				$mail->sendAdmin( $emailType, false );
			}				
		} else {
			$mail->sendNow( $uid, $emailType, false );
		}	
		return true;
	}		
	public function displayBlueMessage($message) {
				$html = '<body style="background-color: rgb(43, 163, 212);">';
		$html .= '<div style="margin: 50px; padding: 50px; background: white none repeat scroll 0pt; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial; color: red; font-size: 1.5em; text-align: center;">';
		$html .= $message; 		$html .= '<br><br>';
		$html .= WText::t('1453566967ZCV');
		$requestEmail = WPref::load( 'PSECURITY_NODE_REQUEST_EMAIL' );
		if ( !empty($requestEmail) ) {
			$html .= ' at ' . str_replace( '@', '  @ ', $requestEmail );
		}		$html .= '</div>';
		return $html;
	}	
	private function _severityMatch($type) {
		switch( $type ) {
			case 11:
								return 1;
				return 21;
				return 22;
				break;
			case 5:
			case 18:
			case 31:
			case 61:
			case 62:
								return 3;
				break;
			case 3:
			case 32:
			case 78:
								return 5;
				break;
			case 4:				case 14:
			case 15:
			case 46:
			case 47:
								return 7;
				break;
			case 16:
			case 17:
			case 35:
			case 41:
			case 42:
			case 43:
			case 44:
			case 45:
			case 49:
			default:
								return 9;
				break;
		}	
	}		
	private function _blockIP($reason,$type,$cause,$manual=false,$ip=null) {
		static $alreadyDoneA = array();
		if ( !empty($alreadyDoneA[$reason]) ) return true;
		$alreadyDoneA[$reason] = true;
		if ( !isset($ip) ) $ip = $this->_ip;
		$longIP = ip2long( $ip );
				$securityIPBM = WModel::get( 'security.ipblocked' );
				$securityIPBM->whereE( 'ip', $longIP );
		$ipblid = $securityIPBM->load( 'lr', 'ipblid' );
		if ( ! $manual ) {
						if ( 'auto_blacklist_ip' == $reason ) {
				$duration = time() + WPref::load( 'PSECURITY_NODE_SHIELD_INCIDENT_BLACKLIST_PERIOD' );
			} else {					$duration = time() + WPref::load( 'PSECURITY_NODE_SHIELD_INCIDENT_BLOCK_PERIOD' );
			}											}	
		if ( empty($ipblid) ) {
			$securityIPBM->setVal( 'ip', $longIP );
			$securityIPBM->setVal( 'created', time() );
			$securityIPBM->setVal( 'modified', time() );
			$securityIPBM->setVal( 'uid', WUsers::get( 'uid' ) );
			$securityIPBM->setVal( 'status', 5 );
			$securityIPBM->setVal( 'publish', 1 );
			if ( !empty($duration) ) $securityIPBM->setVal( 'enddate', $duration );
			$securityIPBM->setVal( 'reasontype', $type );
			$securityIPBM->setVal( 'reason', $cause );
			$securityIPBM->insertIgnore();
		} else {
			$securityIPBM->whereE( 'ipblid', $ipblid );
			$securityIPBM->where( 'status', '!=', 3 );				$securityIPBM->setVal( 'status', 5 );
			$securityIPBM->setVal( 'reasontype', $type );
			$securityIPBM->setVal( 'reason', $cause );
			if ( !empty($duration) ) $securityIPBM->setVal( 'enddate', $duration );
			$securityIPBM->setVal( 'modified', time() );
			$securityIPBM->update();
		}			
								$this->recordIncident( $reason );
	}	
	private function _getEmailParams($uid,$reason='',$cause='') {
		$mailParamsO = new stdClass;
		if ( empty($uid) ) {
			$mailParamsO->admin = WText::t('1457055063DIDA');
			$mailParamsO->name = $mailParamsO->admin;
			$mailParamsO->username = $mailParamsO->admin;
			$mailParamsO->email = '';
		} else {
			$mailParamsO->admin = WUser::get( 'name' , $uid );
			$mailParamsO->name = $mailParamsO->admin;
			$mailParamsO->username = WUser::get( 'username' , $uid );
			$mailParamsO->email = WUser::get( 'email' , $uid );
		}		
		$mailParamsO->time = WApplication::date( WTools::dateFormat( 'day-date-time', true ),  time() );
		if ( empty($this->_ip) ) {
			$memberSessionC = WUser::session();
			$this->_ip = $memberSessionC->getIP();
		}		$mailParamsO->ip = $this->_ip;
		$mailParamsO->country = '';
		$libraryDeviceC = WClass::get( 'library.device' );
		$platformO = $libraryDeviceC->platform();
		$mailParamsO->platform = $platformO->name;
			$ipInfo = WClass::get( 'security.lookup' );
			$ctyid = $ipInfo->ipInfo( $mailParamsO->ip, 'ctyid' );
			$countriesHelperC = WClass::get( 'countries.helper', null, 'class', false );
			if ( !empty($countriesHelperC) ) $mailParamsO->country = $countriesHelperC->getData( $ctyid, 'name' );
		$browserO = WPage::browser();
		$mailParamsO->referer = WGlobals::get( 'HTTP_REFERER', null, 'server' );
		$mailParamsO->browser = $browserO->name . ' ' . $browserO->version;
		$libraryDeviceC = WClass::get( 'library.device' );
		$mailParamsO->mobile = ( $libraryDeviceC->isMobile() ? WText::t('1206732372QTKI') : WText::t('1206732372QTKJ') );
		$mailParamsO->agent = WGlobals::get( 'HTTP_USER_AGENT', null, 'server' );
		if ( empty($this->_actid) ) $this->_actid = WGlobals::getSession( 'activity', 'actid', 0 );
		if ( !empty($this->_actid) ) {
			$text = WText::t('1244448970SMQM');
			$link = WPages::linkAdmin( 'controller=security-activity&search=' . $this->_actid );
			$mailParamsO->link = '<a href="' . $link . '">' . $text . '</a>';
		} else {
			$mailParamsO->link = '';
		}	
		$rolesA = WUsers::get( 'rolids' , $uid );
		$roleList = '';
		foreach( $rolesA as $role ) $roleList .= "<br>" . WRoles::getRole( $role, 'namekey' );
		if ( JOOBI_FRAMEWORK_TYPE == 'joomla' ) {
						$User = JFactory::getUser();
			$roleList .= "<br>Joomla Groups: " . implode( ', ', $User->groups );
		}	
				$mailParamsO->roles = $roleList;
		if ( !empty($cause) ) {
			$mailParamsO->cause = $cause;
		} else {
			$mailParamsO->cause = '';
		}	
		switch( $reason ) {
			case 'onAdminLogin':
				$mailParamsO->reason = WText::t('1453134606FWVA');
				break;
			case 'onRoles':
				$mailParamsO->reason = WText::t('1453134606FWVB');
				break;
			case 'onUsers':
				$mailParamsO->reason = WText::t('1453134606FWVC');
				break;
			case 'onIPs':
				$mailParamsO->reason = WText::t('1453134606FWVD');
				break;
			default:
				$incidentTypeP = WView::picklist( 'security_incident' );
				$mailParamsO->reason = $incidentTypeP->getName( $reason );
				break;
		}	
		return $mailParamsO;
	}	
}