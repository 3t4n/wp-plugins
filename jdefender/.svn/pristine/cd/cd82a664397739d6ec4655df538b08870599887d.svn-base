<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_Shield_class extends WClasses {
	public static $fileValide = false;
	private $_actid = 0;
	private $_ip = 0;
	private $_reportIncident = false;
	private $_blockIP = false;
	public function verifyShield($ip,$actid) {
		if ( ! WPref::load( 'PSECURITY_NODE_DEFENSE_ACTIVE' ) ) return true;
		$this->_ip = $ip;
		$this->_actid = $actid;
		if ( WRoles::isAdmin() ) {
						$secretAdmin = WPref::load( 'PSECURITY_NODE_SECRET_ADMIN' );
			$secretAdmin = trim( $secretAdmin );
			if ( !empty($secretAdmin) ) {					
				if ( ! WUser::get('uid') ) {
					$uri = WGlobals::get( 'REQUEST_URI', '', 'server' );
					if ( false === strpos( $uri, $secretAdmin) ) {
						$adminURI = WGlobals::getSession( 'lastLogin', 'adminURI', '' );
						if ( false === strpos( $adminURI, $secretAdmin) ) {
														$this->_reportIncident = true;
							$this->_blockIP = true;
							$CAUSE = WText::t('1454522468NWLK');
							$details = 'Someone is trying to login in the backend without the secret word.';
							$securityReportC = WClass::get( 'security.report' );
							$securityReportC->setIP( $this->_ip, $this->_actid );
							$securityReportC->blockPage( 'adminsecret', $CAUSE, $details, false );
							return false;
						}					
					} else {
						WGlobals::setSession( 'lastLogin', 'adminURI', $uri );
					}								
				} else {
					if ( 'joomla' == JOOBI_FRAMEWORK_TYPE ) {
						$logout = true;
						$task = WGlobals::get( 'task' );
						$option = WGlobals::get( 'option' );
						if ( 'com_login' == $option && 'logout' == $task ) {
							$usersAddon = WAddon::get( 'api.'. JOOBI_FRAMEWORK . '.user' );
							$usersAddon->deleteSession( WUsers::getSessionId() );
							$usersAddon->destroySession();							
							WPages::redirect( JOOBI_SITE . '/administrator/index.php?' . $secretAdmin );
						}												
					}					
					WGlobals::setSession( 'lastLogin', 'adminURI', '' );
				}				
			}			
		}				
		if ( 'joomla' == JOOBI_FRAMEWORK_TYPE ) {
						if ( ! WRoles::isNotAdmin() && WPref::load( 'PSECURITY_NODE_BLOCK_TMPL' ) ) {
				$tmpl = WGlobals::get( 'tmpl' );
				if ( !empty( $tmpl ) ) {
					$allowed = WPref::load( 'PSECURITY_NODE_BLOCK_TMPL_LIST' );
					if ( !empty($allowed) ) {
												$commaString = trim($allowed);
						$commaString = strtolower($commaString);
						$commaString = str_replace( ' ', '', $commaString );
						$commaString = str_replace( array( "\r\n", "\n\r", "\r", "\n" ), ',', $commaString );
						$allowedA = explode( ',', $commaString );
					} else {
						$allowedA = array();
					}					
					$allowedA[] = 'component';
					$allowedA[] = 'system';
					if ( ! in_array( $tmpl, $allowedA) ) {
						$this->_reportIncident = true;
						$this->_blockIP = true;
						$CAUSE = WText::t('1454522468NWLL');
						$details = 'A potential misuse of tmpl=foo was blocked:<br>tmpl=' . $tmpl;
						$securityReportC = WClass::get( 'security.report' );
						$securityReportC->setIP( $this->_ip, $this->_actid );
						$securityReportC->blockPage( 'tpmlmisuse', $CAUSE, $details, false );
						return false;
					}					
				}				
			}					
			if ( ! WRoles::isNotAdmin() && WPref::load( 'PSECURITY_NODE_BLOCK_TEMPLATE' ) ) {
				$template = WGlobals::get( 'template' );
				if ( !empty( $template ) ) {
					$onlyPublished = WPref::load( 'PSECURITY_NODE_BLOCK_TEMPLATE_PUBLISH' );
					$option = WGlobals::get( 'option' );
					if ( 'com_mailto' == $option ) {
						$onlyPublished = true;
					}					
					$block = false;
					if ( $onlyPublished ) {
						JLoader::import( 'joomla.filesystem.folder' );
						$siteTemplatesA = JFolder::folders( JPATH_SITE . '/templates' );
						if ( ! in_array( $template, $siteTemplatesA ) ) {
							$block = true;
						}					} else {
												$block = true;
					}					
					if ( $block ) {
						$this->_reportIncident = true;
						$this->_blockIP = true;
						$CAUSE = WText::t('1454522468NWLM');
						$details = 'A potential misuse of template=foo was blocked:<br>template=' . $tmpl;
						$securityReportC = WClass::get( 'security.report' );
						$securityReportC->setIP( $this->_ip, $this->_actid );
						$securityReportC->blockPage( 'templatemisuse', $CAUSE, $details, false );
						return false;
					}				}			}			
		}		
				$sqlInjection = WPref::load( 'PSECURITY_NODE_SHIELD_SQLINJECTION' );
		if ( $sqlInjection ) {
			$status = $this->_sqlInjection();
			if ( $status ) {
				return false;
			}		}		
				$extD = WExtension::get( 'jdefender.application', 'data' );
		if ( empty($extD) ) return true;
		WExtension::checkAuthorizedLevel( $extD );
				if ( ! WGlobals::checkCandy( 50, false, $extD->wid ) ) return true;
				$mua = WPref::load( 'PSECURITY_NODE_SHIELD_MUA' );
		if ( $mua ) {
			$status = $this->_checkMUA();
						if ( $status ) {
				return false;
			}			
		}		
				if ( WPref::load( 'PSECURITY_NODE_SHIELD_RFI' ) ) {
			$status = $this->_checkRFI();
						if ( $status ) {
				return false;
			}			
		}		
				if ( WPref::load( 'PSECURITY_NODE_SHIELD_DFI' ) ) {
			$status = $this->_checkDFI();
						if ( $status ) {
				return false;
			}			
		}		
				if ( WPref::load( 'PSECURITY_NODE_SHIELD_SP' ) ) {
			$status = $this->_checkSP();
						if ( $status ) {
				return false;
			}			
		}		
				$file = WPref::load( 'PSECURITY_NODE_SHIELD_FILE' );
		if ( $file ) {
			$status = $this->_checkFile();
						if ( $status ) {
				return false;
			}			
		}		
						$badwords = WPref::load( 'PSECURITY_NODE_SHIELD_BADWORDS' );
		if ( $badwords ) {
			$status = $this->_badWords( $badwords );
						if ( $status ) {
				return false;
			}			
		}		
		return true;
	}	
	private function _checkFile() {
		$controller = WGlobals::get( 'controller' );
		$task = WGlobals::get( 'task' );
		if ( ( 'output' == $controller && 'uploadfile' == $task ) || ( 'backup-upload' == $controller ) ) {
			return false;
		}		
		$filesA = WGlobals::getEntireSuperGlobal( 'files' );
		$axFilesA = WGlobals::get( 'ax-uploaded-files', array(), 'request', 'array' );
		if ( empty($filesA) && empty($axFilesA) ) {
			return false;
		}
		self::$fileValide = true;
				foreach( $filesA as $map => $oneFile ) {
			$tmpNameA = array();
			if ( is_array($oneFile) && !array_key_exists( 'tmp_name', $oneFile) ) {
				$tmpNameA = $oneFile;
			} else {
				$tmpNameA[] = $oneFile;
			}			
			foreach( $tmpNameA as $file ) {
				if ( empty($file['tmp_name']) ) continue;
				$processFileA = array();
				if ( is_array($file['tmp_name']) ) {
					foreach( $file['tmp_name'] as $k => $value ) {
						if ( empty($file['tmp_name'][$k]) ) continue;
												if ( is_array($file['tmp_name'][$k]) ) {
							foreach( $file['tmp_name'][$k] as $j => $valJ ) {
								if ( empty($file['tmp_name'][$k][$j]) ) continue;
								$processFileA[] = array(
									'name'	=> $file['name'][$k][$j],
									'type'	=> $file['type'][$k][$j],
									'tmp_name' => $file['tmp_name'][$k][$j],
									'error'	=> $file['error'][$k][$j],
									'size'	=> $file['size'][$k][$j]
								);
							}								
						} else {
							$processFileA[] = array(
								'name'	=> $file['name'][$k],
								'type'	=> $file['type'][$k],
								'tmp_name' => $file['tmp_name'][$k],
								'error'	=> $file['error'][$k],
								'size'	=> $file['size'][$k]
							);
						}						
					}					
				} else {
					if ( empty($file['tmp_name']) ) continue;
					$processFileA[] = $file;
				}				
				foreach( $processFileA as $fileInfo ) {
					$tempNames = $fileInfo['tmp_name'];
					$fileNames = $fileInfo['name'];
					if ( !is_array($tempNames) ) $tempNames = array( $tempNames );
					if ( !is_array($fileNames) ) $fileNames = array( $fileNames );
					$len = count($tempNames);
					$fileName = '';
					for( $i = 0; $i < $len; $i++ ) {
						$tempName = array_shift($tempNames);
						$fileName = array_shift($fileNames);
					}
					if ( !empty($fileName) ) {
						$tmpFileA = explode( '.', $fileName );
						$type = array_pop( $tmpFileA );
						$fileSanitizeC = WClass::get( 'files.sanitize' );
						if ( ! $fileSanitizeC->validateFile( $fileName, $type, $tempName ) ) {
							return true;
						}						
					} else {
					}					
				}				
			}			
		}		
		return false;
	}		
	private function _checkSP() {
		$regexA = array(
						'@[\|:]O:\d{1,}:"[\w_][\w\d_]{0,}":\d{1,}:{@i',
						'@[\|:]a:\d{1,}:{@i'
		);		
		$badWordsA = array();
		$keyWordsA = array();
				$globalA = array( 'get', 'post' );
		$wordsA = array();
						foreach( $globalA as $gbl ) {
			$post = WGlobals::getEntireSuperGlobal( $gbl );
			if ( empty( $post ) ) continue;
			foreach( $regexA as $regex ) {
				foreach( $post as $key => $var ) {
					$status = $this->_findMatchs( $matches, $badWordsA, $regex, $key, $var, $gbl );
					if ( $status ) {
						$this->_blockIP = true;
						break;
					}						
				}				
				if ( $this->_blockIP ) break;
			}
			if ( $this->_blockIP ) break;
		}				
		if ( $this->_reportIncident || $this->_blockIP ) {
			$CAUSE = WText::t('1454377686PJHA');
			$this->userW( $CAUSE );
			$details = 'A potential Session Poisoning was blocked:<br>' . print_r( $badWordsA, true ) . ' into the following variable ' . print_r( $keyWordsA, true );
			$securityReportC = WClass::get( 'security.report' );
			$securityReportC->setIP( $this->_ip, $this->_actid );
			$securityReportC->blockPage( 'shieldsp', $CAUSE, $details, false );
		}	
		return $this->_blockIP;
	}	
	private function _checkDFI() {
				if ( 'joomla' == JOOBI_FRAMEWORK_TYPE ) {
			$option = WGlobals::get( 'option' );
			$view = WGlobals::get( 'view' );
			$layout = WGlobals::get( 'layout' );
			if ( $option == 'com_jce' && $view == 'editor' && $layout == 'plugin' ) {
				return false;
			}
						if ( WRoles::isAdmin( 'sadmin') && 'com_jnews' == WGlobals::get( 'option' ) && 'configuration' == WGlobals::get( 'act' ) &&  ( 'apply' == WGlobals::get( 'task' ) || 'save' == WGlobals::get( 'task' ) || 'cancel' == WGlobals::get( 'task' ) ) ) return false;
		}		
				$globalA = array( 'get', 'post' );
		$result = array();
		foreach( $globalA as $gbl ) {
			$post = WGlobals::getEntireSuperGlobal( $gbl );
			if ( empty( $post ) ) continue;
			if ( $this->_findDFI( $post ) ) {
				$result = $post;
				$this->_reportIncident = true;
				$this->_blockIP = true;
				break;
			}					
		}	
		if ( $this->_reportIncident || $this->_blockIP ) {
			$CAUSE = WText::t('1454377686PJHB');
			$details = 'A potential Direct File Inclusion was blocked:<br>' . print_r( $result, true );
			$securityReportC = WClass::get( 'security.report' );
			$securityReportC->setIP( $this->_ip, $this->_actid );
			$securityReportC->blockPage( 'shielddfi', $CAUSE, $details, false );
		}	
		return $this->_blockIP;
	}	
	private function _findDFI($post) {
		$status = false;
		if ( is_array($post) ) {
			$regex = '#^(/|\.\.|[a-z]{1,2}:\\\)#i';
			foreach( $post as $k => $v ) {
								if ( strstr( $k, "\u0000") ) {
					$status = true;
					break;
				}	
								if ( empty($v) ) $v = $k;
								if ( is_array($v) ) {
					$status = $this->_findDFI( $v );
				} else {
										if ( strstr($v, "\u0000") ) {
						$status = true;
						break;
					}	
										$v = str_replace( '\\', '/', $v );
					if ( preg_match( $regex, $v ) ) {
						$fileS = WGet::file();
						$status = $fileS->exist( $v );
						if ( ! $status ) {
							$badPartA = explode( '../', $v );
							$partA = array();
							foreach ( $badPartA as $p ) {
								if ( !empty($p) ) $partA[] = $p;
							}	
							$path = implode( '/', $partA );
							$status = $fileS->exist( $path );
						}						
						break;
					}	
					if ( $status ) break;
				}				
			}			
		}	
		return $status;
	}	
	private function _checkRFI() {
				$globalA = array( 'get', 'post' );
		$wordsA = array();
		$result = array();
		foreach( $globalA as $gbl ) {
			$post = WGlobals::getEntireSuperGlobal( $gbl );
			if ( empty( $post ) ) continue;
			$status = $this->_findRFI( $post );
			if ( $status ) {
				$result = $post;
				$this->_reportIncident = true;
				$this->_blockIP = true;
				break;
			}					
			if ( $this->_blockIP ) break;
		}				
		if ( $this->_reportIncident || $this->_blockIP ) {
			$CAUSE = WText::t('1454377686PJHC');
			$details = 'A potential Remote File Inclusion was blocked:<br>' . print_r( $result, true );
			$securityReportC = WClass::get( 'security.report' );
			$securityReportC->setIP( $this->_ip, $this->_actid );
			$securityReportC->blockPage( 'shieldrfi', $CAUSE, $details, false );
		}	
		return $this->_blockIP;
	}	
	private function _findRFI($post) {
		$status = false;
		$regex = '#(http|ftp){1,1}(s){0,1}://.*#i';
		if ( is_array($post) ) {
			foreach( $post as $k => $v ) {
								if ( is_numeric($v) ) continue;
				if ( 'wordpress' == JOOBI_FRAMEWORK_TYPE && 'redirect_to' == $k ) {
					continue;
				}		
				if ( is_array($v) ) {
					$status = $this->_findRFI( $v );
				} else {
					$status = preg_match( $regex, $v );
				}		
				if ( $status ) {
										$text = @file_get_contents($v);
					if ( !empty($text) ) {
						$status = ( strstr( $text, '<?php' ) !== false );
						if ( $status ) break;
					} else {
						$status = false;
					}				}				
			}			
		} elseif ( is_string($post) ) {
			$status = preg_match( $regex, $post );
			if ( $status ) {
								$text = @file_get_contents( $post );
				if ( !empty($text) ) {
					$status = ( strstr( $text, '<?php' ) !== false );
					if ( $status ) return $status;
				} else {
					$status = false;
				}				
			}			
		}		
		return $status;
	}
	private function _checkMUA() {
				$userAgent = WGlobals::get( 'HTTP_USER_AGENT', null, 'server' );
		if ( empty( $userAgent ) ) return false;
		$userAgent = trim($userAgent);
		if ( strstr( $userAgent, '<?') ) {
			$this->_reportIncident = true;
			$this->_blockIP = true;
			return $this->_reportMUA( $userAgent );
		}		
		$regexA = array();
		$regexA[] = '@"feed_url@';			$regexA[] = '@}__(.*)|O:@';			if ( 'joomla' == JOOBI_FRAMEWORK_TYPE ) $regexA[] = '@"J?Simple(p|P)ie(Factory)?"@';			
		foreach ( $regexA as $regex ) {
			if ( preg_match( $regex, $userAgent ) ) {
				$this->_reportIncident = true;
				$this->_blockIP = true;
				return $this->_reportMUA( $userAgent );
			}			
		}	
		return false;
	}	
	private function _reportMUA($userAgent='') {
		if ( $this->_reportIncident || $this->_blockIP ) {
			$CAUSE = WText::t('1454377686PJHD');
			$details = 'A potential User Agent Attack was blocked:<br>' . $userAgent;
			$securityReportC = WClass::get( 'security.report' );
			$securityReportC->setIP( $this->_ip, $this->_actid );
			$securityReportC->blockPage( 'shieldmua', $CAUSE, $details, false );
		}		
		return true;
	}	
	private function _sqlInjection() {
				if ( WRoles::isAdmin( 'sadmin') && 'apps-query' == WGlobals::get( 'controller' ) && 'execute' == WGlobals::get( 'task' ) ) return false;
		$regex = '#(union([\s]{1,}|/\*(.*)\*/){1,}(all([\s]{1,}|/\*(.*)\*/){1,})?select|select(([\s]{1,}|/\*(.*)\*/|`){1,}([\w]|_|-|\.|\*){1,}([\s]{1,}|/\*(.*)\*/|`){1,}(,){0,})*from([\s]{1,}|/\*(.*)\//){1,}[a-z0-9]{1,}_|select([\s]{1,}|/\*(.*)\*/|\(){1,}(COUNT|MID|FLOOR|LIMIT|RAND|SLEEP|ELT)|select([\s]{1,}|/\*(.*)\*/|`){1,}.*from([\s]{1,}|/\*(.*)\//){1,}INFORMATION_SCHEMA\.|EXTRACTVALUE([\s]{1,}|\(){1,}|(insert|replace)(([\s]{1,}|/\*(.*)\*/){1,})((low_priority|delayed|high_priority|ignore)([\s]{1,}|/\*(.*)\*/){1,}){0,}into|drop([\s]{1,}|/\*(.*)\*/){1,}(database|schema|event|procedure|function|trigger|view|index|server|(temporary([\s]{1,}|/\*(.*)\*/){1,}){0,1}table){1,1}([\s]{1,}|/\*(.*)\*/){1,}|update([\s]{1,}|/\*[^\w]*\/){1,}(low_priority([\s]{1,}|/\*[^\w]*\/){1,}|ignore([\s]{1,}|/\*[^\w]*\/){1,})?`?[\w]*_.*set|delete([\s]{1,}|/\*(.*)\*/){1,}((low_priority|quick|ignore)([\s]{1,}|/\*(.*)\*/){1,}){0,}from|benchmark([\s]{1,}|/\*(.*)\*/){0,}\(([\s]{1,}|/\*(.*)\*/){0,}[0-9]{1,}){1,}#i';
		$badWordsA = array();
		$keyWordsA = array();
				$globalA = array( 'get', 'post' );
		$wordsA = array();
		foreach( $globalA as $gbl ) {
			$post = WGlobals::getEntireSuperGlobal( $gbl );
			if ( empty( $post ) ) continue;
			foreach( $post as $key => $var ) {
				$status = $this->_findMatchs( $matches, $badWordsA, $regex, $key, $var, $gbl );
				if ( $status ) {
					$keyWordsA[] = strtoupper($gbl) . ': ' . $key;
					break;
				}					
			}
			if ( $this->_blockIP ) break;
		}				
		if ( $this->_reportIncident || $this->_blockIP ) {
			$BADWORDS = implode( ', ', $badWordsA );
			$CAUSE = WText::t('1454276766LNLW');
			$details = 'A potential SQL injection was blocked:<br>' . $BADWORDS . '<br>into the following variable: ' . implode( ', ', $keyWordsA );
			$securityReportC = WClass::get( 'security.report' );
			$securityReportC->setIP( $this->_ip, $this->_actid );
			$securityReportC->blockPage( 'shieldsql', $CAUSE, $details, false );
		}	
		return $this->_blockIP;
	}	
	private function _badWords($badwords) {
		$controller  = WGlobals::get( 'controller' );
		if ( 'security-badwords' == $controller ) return false;
		$admin = WPref::load( 'PSECURITY_NODE_SHIELD_BADWORDS_ADMIN' );
		if ( ! $admin && WRoles::isAdmin() ) return false;
		$role = WPref::load( 'PSECURITY_NODE_SHIELD_BADWORDS_ROLE' );
		$explodeA = explode( '|_|', $role );
		if ( !empty($explodeA) ) {
			foreach( $explodeA as $rolid ) {
				if ( WRoles::hasRole( $rolid ) ) return false;
			}		}		
				$securityBadwordsM = WModel::get( 'security.badwords' );
		$securityBadwordsM->rememberQuery( true );
		$securityBadwordsM->whereE( 'publish', 1 );
		$securityBadwordsM->whereE( 'type', 1 );
		$securityBadwordsM->whereE( 'lgid', WUsers::get( 'lgid') );
		$wordsA = $securityBadwordsM->load( 'lra', 'alias' );
		if ( empty( $wordsA ) ) return false;
		$replaceChar = WPref::load( 'PSECURITY_NODE_SHIELD_BADWORDS_REPLACE' );
		$regex = "/\b(" . implode( $wordsA, "|" ) . ")\b/i";
		$badWordsA = array();
		$keyWordsA = array();
		if ( 3 == $badwords ) {
						$editorsA = array();
			$editors = WGlobals::get( JOOBI_VAR_DATA . 'zt', null, 'post' );				if ( !empty($editors) ) {
				$editorsA = $editors['edt'];
			}			if ( !empty($editorsA) ) {
				$matches = array();
				foreach( $editorsA as $edt ) {
					if ( empty($edt) ) continue;
					foreach( $edt as $k => $v ) {
						$var = WGlobals::get( $k, '', 'post' );
						$status = $this->_findMatchs( $matches, $badWordsA, $regex, $k, $var, 'post', $replaceChar );
						if ( $status ) WGlobals::set( $k, $var, 'post' );
					}				}			}
		} else {
						$globalA = array( 'get', 'post' );
			$wordsA = array();
			foreach( $globalA as $gbl ) {
				$post = WGlobals::getEntireSuperGlobal( $gbl );
				if ( empty( $post ) ) continue;
				foreach( $post as $key => $var ) {
					$status = $this->_findMatchs( $matches, $badWordsA, $regex, $key, $var, $gbl, $replaceChar );
					if ( $status ) {
						WGlobals::set( $key, $var, $gbl );
					}					
				}				
				if ( $this->_blockIP ) break;
			}			
		}		
		if ( $this->_reportIncident || $this->_blockIP ) {
			$BADWORDS = implode( ', ', $badWordsA );
			$CAUSE = str_replace(array('$BADWORDS'), array($BADWORDS),WText::t('1453902133GRLX'));
			$this->userW( $CAUSE );
			$details = 'The following words ' . $BADWORDS . ' have been used into the following variable ' . implode( ', ', $keyWordsA );
			$securityReportC = WClass::get( 'security.report' );
			$securityReportC->setIP( $this->_ip, $this->_actid );
			if ( $this->_blockIP ) $securityReportC->blockPage( 'badwords', $CAUSE, $details, false );
			else $securityReportC->recordIncident( 'badwords', $CAUSE, $details, false );
		}		
		return $this->_blockIP;
	}	
	private function _findMatchs(&$matches,&$badWordsA,$regex,$key,&$var,$gbl,$replaceChar=null,$filterSQL=false) {
		if ( empty($var) ) return false;
		if ( is_numeric( $var ) ) return false;				
		if ( is_array($var) ) {
			$status = false;
			foreach( $var as $k => $v ) {
				$statusNow = $this->_findMatchs( $matches, $badWordsA, $regex, $k, $v, $gbl, $replaceChar );
				if ( $statusNow ) {
					$status = true;
					$var[$k] = $v;
				}			}			
			return $status;
		}		
		if ( $filterSQL ) $var = $this->_SQLAnalyze( $var );
		$matches = array();
		$findOneB = @preg_match_all( $regex, $var, $matches );
		if ( $findOneB ) {
			$foundWordsA = array_unique( $matches[0] );
			$badWordsA = array_merge( $badWordsA, $foundWordsA );
			$keyWordsA[] = $key;
						if ( isset($replaceChar) ) {
								$len = strlen( $foundWordsA[0] );
				$screwed = '';
				for ($i = 0; $i < $len; $i++) $screwed .= $replaceChar;
								$var = preg_replace( $regex, $screwed, $var );
			} else {
								$this->_blockIP = true;
			}		
			$this->_reportIncident = true;
			return true;
		}		
		return false;
	}	
	private function _SQLAnalyze($str) {
				if ( empty($str) ) return $str;
				if ( preg_match('#^[\p{L}\d,\s]+$#iu', $str) >= 1) {
			return $str;
		}	
				$regex1 = '@(--|#).+\n@iu';
		$regex2 = '#/\*(.*?)\*/#iu';
		$str = preg_replace( $regex1, ' ', $str );
		$str = preg_replace( $regex2, ' ', $str );
				$str = str_replace( array( "\n", "\r" ), ' ', $str );
		return $str;
	}	
}