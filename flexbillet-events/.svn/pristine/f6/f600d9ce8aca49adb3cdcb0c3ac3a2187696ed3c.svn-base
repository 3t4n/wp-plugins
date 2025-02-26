<?
	class URIHandler {
		private $m_uri;
		
		private $m_uriPrimary;
		private $m_uriSecondary;
		
		private $m_primaryParameters;
		private $m_secondaryParameters;
		
		public function __construct( $a_URI ) {
			// Constructor
			$this->setURI( $a_URI );
		}
		
		public function setURI( $a_URI ) {
			$this->m_uri = $a_URI;
			
			if( strpos( $a_URI, "?" ) ) {
				// Split in two
				$uriHalfs = explode( "?", $a_URI );
				$this->m_uriPrimary = $uriHalfs[ 0 ];
				$this->m_uriSecondary = $uriHalfs[ 1 ];
			} else {
				$this->m_uriPrimary = $a_URI;
				$this->m_uriSecondary = null;
			}
			
			$firstURIindex = 1;

			// Primary
			$uri_array = explode( "/", $this->m_uriPrimary );
			$this->m_primaryParameters = $this->trimURIarray( $uri_array, $firstURIindex );

			// Secondary
			if( $this->m_uriSecondary != null ) {
				$this->m_secondaryParameters =  explode( "&", $this->m_uriSecondary );
			}				
		}
		
		private function trimURIarray( $a_uriArray, $a_firstURIindex ) {
			$resultingArray = Array();
			$destinationIndex = 0;

			for( $i = $a_firstURIindex; $i < count( $a_uriArray ); $i++ ) {
				if( $a_uriArray[ $i ] != '' ) {
					$resultingArray[ $destinationIndex++ ] = $a_uriArray[ $i ];
				}
			}

			return $resultingArray;
		}
		
		public function getURI() {
			return $this->m_uri;
		}
		
		public function getAlteredURI( $a_parameter, $a_alteredValue ) {
			if( $this->existsPrimary( $a_parameter ) ) {
				$oldValue = "/" . $a_parameter . "/" . $this->getPrimaryValue( $a_parameter );
				$newValue = "/" . $a_parameter . "/" . $a_alteredValue;
				
				$alteredURI = str_replace( $oldValue, $newValue, $this->m_uri );
				
			
				return $alteredURI;
			} else {
			    $uriParts = explode( "?", $this->m_uri );
			    $path = $uriParts[0];
			    $queryString = "";
			    if( sizeof($uriParts) > 1 ) {
			        $queryString = "?" . $uriParts[1];
                }
                $pathEndsWithSlashURI = $path[ strlen( $path ) - 1 ] == "/";

				if( $pathEndsWithSlashURI ) {
					$addTrailing = "";
				} else {
					$addTrailing = "/";
				}
				$alteredURI = $path . $addTrailing . $a_parameter . "/" . $a_alteredValue . $queryString;
				return $alteredURI;
			}
		}
		
		public function getPrimaryCount() {
			return sizeof( $this->m_primaryParameters );
		}
		
		public function existsPrimary( $a_parameter ) {
			return in_array( $a_parameter, $this->m_primaryParameters );
		}
		
		public function getPrimaryValue( $a_parameter ) {
			$parameterFound = false;
			$parameterString = null;
			$i = 0;

			while( !$parameterFound && $i < $this->getPrimaryCount() ) {
				if( strtolower( $this->m_primaryParameters[ $i ] ) == $a_parameter ) {
					// Parameter found
					if( $this->getPrimaryCount() > $i ) {
						$parameterString = /* strtolower */ ( $this->m_primaryParameters[ $i + 1 ] );
						$parameterFound = true;
					}
				}

				$i++;
			}

			return $parameterString;
		}
		
		public function appendURIParameters() {
			$postfixToURL = "";
			
			if( $this->existsPrimary( "l" ) ) {
				$postfixToURL .= "/l/" . $this->getPrimaryValue( "l" );
			}

			// Token
			if( $this->existsPrimary( "token" ) ) {
				$postfixToURL .= "/token/" . $this->getPrimaryValue( "token" );
			}		
			
			if( $this->existsPrimary( "elr" ) ) {
				$postfixToURL .= "/elr/" . $this->getPrimaryValue( "elr" );
			}

			// Invitee
			if( $this->existsPrimary( "invitee" ) ) {
				$postfixToURL .= "/invitee/" . $this->getPrimaryValue( "invitee" );
			}
			
			if( $this->existsPrimary( "teamtoken" ) ) {
				$postfixToURL .= "/teamtoken/" . $this->getPrimaryValue( "teamtoken" );
			}

			if( $this->existsPrimary( "cpitoken" ) ) {
				$postfixToURL .= "/cpitoken/" . $this->getPrimaryValue( "cpitoken" );
			}
			
			//logDebug( $postfixToURL );
			
			return $postfixToURL;
		}
		
		public function getOrganizerKey() {
			if( $this->getPrimaryCount() >= 1 ) {
				return $this->m_primaryParameters[ 0 ];
			} else {
				return null;
			}
		}
		
		public function getPageType() {
			if( $this->getPrimaryCount() > 1 ) {
                $primaryTarget = strtoupper($this->m_primaryParameters[1]);

				if(	( $primaryTarget !== "EVENT" ) &&
                        ( $primaryTarget !== "PAYMENT" ) &&
                        ( $primaryTarget !== "MEMBERSIGNUP" ) &&
						( $primaryTarget !== "ADMIN" ) &&
						( $primaryTarget !== "TEAMCATALOG" ) &&
						( $primaryTarget !== "INVITE" ) &&
                        ( $primaryTarget !== "REFUND" ) &&
                        ( $primaryTarget !== "INVITATIONNOTHANKS" ) &&
						( $primaryTarget !== "PREAUTHDETAILS" ) &&
						( $primaryTarget !== "CREATEDEPARTMENT" ) ) {
					
					if( $this->getPrimaryCount() == 3 && $this->existsPrimary( "l" ) ) {
						// Eventlist, localized
						return strtoupper( "events" );
					}

				
					$search = "/" . $this->getOrganizerKey() . "/";
					$replace = $search . "event/";
					
					$alteredURI = str_replace( $search, $replace, $this->m_uri );
					
					//logDebug( "New URI: " . $alteredURI );
					
					$this->setURI ( $alteredURI );
					
					//logDebug( "Setting new URI: " . $this->getURI() );
				}
				
				if( strtoupper( $this->m_primaryParameters[ 1 ] ) == "EVENT" ) {
					if( $this->existsPrimary( "register") ) {
						return strtoupper( "eventregistration" );
					} else if( $this->existsPrimary( "register-noqueue") ) {
						 return strtoupper( "eventregistration" );
					} else if( $this->existsPrimary( "confirm") ) {
						 return strtoupper( "eventregistration" );
					} else if( $this->existsPrimary( "unregister") ) {
						 return strtoupper( "eventregistration" );
					} else if( $this->existsPrimary( "finalpayment") ) {
						 return strtoupper( "eventregistration" );
					} else if( $this->existsPrimary( "payment") ) {
						 return strtoupper( "eventregistration" );
					} else {
						return strtoupper( "eventdetails" );
					}
				} else if( strtoupper( $this->m_primaryParameters[ 1 ] ) == "L" ) {
					// Event list (with language parameter)
					return strtoupper( "events" );
				} else {
					return strtoupper( $this->m_primaryParameters[ 1 ] );
				}
			}  else if( $this->getPrimaryCount() == 0 ) {
				//logDebug( "PORTAL!" );
				return strtoupper( "portal" );
			} else if( $this->getPrimaryCount() == 1 ) {
                //logDebug( "EVENTS!" );
                return strtoupper("events");
			} else {
				return null;
			}
		}
		
		public function getIncludePage( $a_pageType ) {
			switch( $a_pageType ) {
				case "PORTAL":
					return "site/pages/portal.php";
				
				case "EVENTS":
					return "site/pages/events.php";
				
				case "EVENTDETAILS":
					return "site/pages/eventdetails.php";

				case "EVENTREGISTRATION":
					return "site/pages/eventregistration.php";
				
				case "ADMIN":
					return "site/pages/admin.php";
				
				case "INVITE":
					return "site/pages/invite.php";

				case "REFUND":
					return "site/pages/refund.php";
				
				case "CREATEDEPARTMENT":
					return "site/pages/createdepartment.php";

                case "INVITATIONNOTHANKS":
                    return "site/pages/invitationnothanks.php";

				case "PREAUTHDETAILS":
					return "site/pages/cancelpreauth.php";
					
				case "TEAMCATALOG":
					return "site/pages/teamcatalog.php";

                case "PAYMENT":
                    return "site/pages/payment.php";

                case "MEMBERSIGNUP":
                    return "site/pages/membersignup.php";
			}
		}
                
		public function getRegisterIntent() {
			if( strtolower( $this->m_primaryParameters[ 3 ] == "payment" ) ) {
				return "payment";
			} else if( strtolower( $this->m_primaryParameters[ 3 ] == "confirm" ) ) {
				return "confirm";
			} else if( strtolower( $this->m_primaryParameters[ 3 ] == "finalpayment" ) ) {
				return "finalpayment";
			} else if( strtolower( $this->m_primaryParameters[ 3 ] == "unregister" ) ) {
				return "unregister";
			} else {
				return strtolower( $this->m_primaryParameters[ 1 ] );
			}
		}
	}
?>