<?
	/* ****************************************************
	   Class Eventlistdetails
	   **************************************************** */
	   
	class Eventlistdetails {
		private $m_eventKey;
		private $m_eventName;
		private $m_eventShortDescription;
		private $m_shortTitle;
		private $m_eventDescription;
		
		private $m_organizerKey;

		private $m_logoURL;
		private $m_flyerURL;
		private $m_eventImageURL;						// NEW SITE JUNE 2016 - NEW ATTRIBUTE
		private $m_eventAltImageURL;					// NEW SITE JUNE 2016 - NEW ATTRIBUTE
		private $m_socialImageURL;						// NEW SITE JUNE 2016 - NEW ATTRIBUTE
		
		private $m_facebookPixelID;
		private $m_googleAnalyticsID;
		
		private $m_stateKey;
		private $m_public;
		
		private $m_paidEvent;
		private $m_freeEvent;

		private $m_openForRegistration;
		private $m_registrationStart;
		private $m_registrationStartVisible;
		private $m_registrationEnd;
		private $m_registrationEndVisible;

		private $m_visibleFrom;
		private $m_visibleTo;
		
		private $m_eventStart;
		private $m_eventStartVisible;
		private $m_eventEnd;
		private $m_eventEndVisible;

		private $m_locationName;
		private $m_locationDescription;
		private $m_locationAddress;
		private $m_locationGeoLocation;
		private $m_locationGeoLocationLat;
		private $m_locationGeoLocationLong;
		private $m_locationLogoURL;
		private $m_locationStreetAddress1;				// NEW SITE JUNE 2016 - NEW ATTRIBUTE
		private $m_locationStreetAddress2;				// NEW SITE JUNE 2016 - NEW ATTRIBUTE
		private $m_locationZipCode;						// NEW SITE JUNE 2016 - NEW ATTRIBUTE
		private $m_locationCity;							// NEW SITE JUNE 2016 - NEW ATTRIBUTE
		private $m_locationCountry;						// NEW SITE JUNE 2016 - NEW ATTRIBUTE
		
		private $m_labelButtonMore;
		private $m_labelButtonRegister;
		private $m_soldOutLabel;							// NEW SITE JUNE 2016 - NEW ATTRIBUTE
		
		// Account
		private $m_minimumPrice;
		private $m_currencyCode;
		private $m_fixedPrice;
		private $m_shortPriceDescription;
		private $m_richPriceDescription;
		
		// Participant Designations						// NEW SITE JUNE 2016: DO WE NEED THESE???
		private $m_designationList;
		private $m_designationListPtr;
		private $m_eventReservedTotal;
		private $m_eventTicketsAvailableTotal;
		
		private $m_displayRegisteredParticipants;
		private $m_displaySocialWidgets;
		private $m_eventTags;
		
		private $m_eventParticipantListKey;
                
		private $m_eventReturnURL;
		
		private $m_eventType;
		private $m_cancellationIsPossible;
		private $m_cancellationUntilDate;
		
		// Event Price Info List
		private $m_priceInfoMinimumPriceToPay;
		private $m_priceInfoMaximumPriceToPay;
		private $m_priceInfoFixedPrice;
      
      private $m_priceInfoList;
		private $m_priceInfoListPointer;
		
		private $m_currentPriceInfoLevel;

        private $m_editEventUrl;
		private $m_categoryList;
		

		public function __construct() {
		 // Constructor
			$this->m_eventTicketsAvailableTotal = 0;

			$this->m_priceInfoList = array();
			$this->m_priceInfoListPointer = 0;
			
			$this->m_currentPriceInfoLevel = 0;
		}
		
		/***********************************
		Accessor Methods
		***********************************/
		
		public function setBasicEventDetails(	$a_eventKey,
															$a_eventName,
															$a_eventShortDescription,
															$a_eventDescription,
															$a_eventStart,
															$a_eventStartVisible,
															$a_logoURL,
															$a_flyerURL,
															$a_stateKey,
															$a_public,
															$a_paidEvent,
															$a_freeEvent,
															$a_openForRegistration,
															$a_registrationStart,
															$a_registrationStartVisible,
															$a_registrationEnd,
															$a_registrationEndVisible,
															$a_labelButtonMore,
															$a_labelButtonRegister,
															$a_shortTitle,
															$a_organizerKey,
															$a_visibleFrom,
															$a_visibleTo,
															$a_eventEnd,
															$a_eventEndVisible,
															$a_eventTags,
															$a_displayRegisteredParticipants,
															$a_displaySocialWidgets,
															$a_eventReturnURL,
															$a_eventType,
															$a_cancellationUntilDate,
															$a_maxAvailableTickets,
															$a_soldOutLabel = "",
															$a_socialImageURL,
															$a_facebookPixelID,
															$a_googleAnalyticsID,
															$a_editEventUrl) {
			$this->m_eventKey = $a_eventKey;
			$this->m_eventName = $a_eventName;
			$this->m_eventShortDescription = $a_eventShortDescription;
			$this->m_eventDescription = $a_eventDescription;
			$this->m_eventStart = $a_eventStart;
			$this->m_eventStartVisible = $a_eventStartVisible;
			$this->m_logoURL = $a_logoURL;
			$this->m_flyerURL = $a_flyerURL;
			$this->m_stateKey = $a_stateKey;
			$this->m_public = $a_public;
			$this->m_paidEvent = $a_paidEvent;
			$this->m_freeEvent = $a_freeEvent;
			$this->m_openForRegistration = $a_openForRegistration;
			$this->m_registrationStart = $a_registrationStart;
			$this->m_registrationStartVisible = $a_registrationStartVisible;
			$this->m_registrationEnd = $a_registrationEnd;
			$this->m_registrationEndVisible = $a_registrationEndVisible;
			$this->m_labelButtonMore = $a_labelButtonMore;
			$this->m_labelButtonRegister = $a_labelButtonRegister;
			$this->m_shortTitle = $a_shortTitle;
			$this->m_organizerKey = $a_organizerKey;
			$this->m_visibleFrom = $a_visibleFrom;
			$this->m_visibleTo = $a_visibleTo;
			$this->m_eventEnd = $a_eventEnd;
			$this->m_eventEndVisible = $a_eventEndVisible;
			$this->m_displayRegisteredParticipants = $a_displayRegisteredParticipants;
			$this->m_displaySocialWidgets = $a_displaySocialWidgets;
			$this->m_showSocialWidgets = $a_displaySocialWidgets;
			$this->m_eventTags = $a_eventTags;
			$this->m_eventReturnURL = $a_eventReturnURL;
			$this->m_eventType = $a_eventType;
			$this->m_cancellationIsPossible = ( $a_cancellationUntilDate != "" );
			$this->m_cancellationUntilDate = $a_cancellationUntilDate;
			$this->m_eventTicketsAvailableTotal = $a_maxAvailableTickets; // NB! This property makes no sense - counts TICKETS
			$this->m_soldOutLabel = $a_soldOutLabel;
			$this->m_socialImageURL = $a_socialImageURL;
			$this->m_facebookPixelID = $a_facebookPixelID;
			$this->m_googleAnalyticsID = $a_googleAnalyticsID;
			$this->m_editEventUrl = $a_editEventUrl;
		}
	
		public function setEventPriceInfo(	$a_minimumPriceToPay,
														$a_maximumPriceToPay,
														$a_fixedPrice ) {
			if( $a_minimumPriceToPay > 0 ) {
				$this->m_priceInfoMinimumPriceToPay = $a_minimumPriceToPay;
				$this->m_priceInfoMaximumPriceToPay = $a_maximumPriceToPay;
				$this->m_priceInfoFixedPrice = ( $a_fixedPrice == "true" );
			}
		}

		public function getEditEventUrl()
		{
			 return $this->m_editEventUrl;
		}
		
		public function getFacebookPixelID() {
			return $this->m_facebookPixelID;
		}
		
		public function getGoogleAnalyticsID() {
			return $this->m_googleAnalyticsID;
		}
		
		public function getSocialMediaURL() {
			return $this->m_socialImageURL;
		}	
		
		public function getSoldOutLabel() {
			return $this->m_soldOutLabel;
		}
		
		public function getGeoLocationLat() {
			return $this->m_locationGeoLocationLat;
		}
		
		public function getGeoLocationLong() {
			return $this->m_locationGeoLocationLong;
		}
		
		public function getTicketMax() {
			// Soon to be deprecated as it counts TICKETS instead of participants
			return $this->m_eventTicketsAvailableTotal;
		}
		
		public function getTicketAvailabilityStatus() {
			// First check the general TICKET limitation (advanced tab)
			//logDebug( "Tickets Res.: " .  $this->m_eventReservedTotal . " - Max: " . $this->m_eventTicketsAvailableTotal );
			if( $this->m_eventTicketsAvailableTotal > 0 && $this->m_eventReservedTotal >= $this->m_eventTicketsAvailableTotal  ) {
				//logDebug( "Reserved has reached MAX!" );
				return false;
			} else {
				// Check individual participant designation limitations
				//logDebug( "INDIVIDUAL LIMITATIONS! " . $this->m_designationListPtr . " entries to check..." );
				$i = 0;
				while( $i < $this->m_designationListPtr ) {
					//logDebug( $i . " / " . $this->m_designationListPtr );
					if( $this->m_designationList[ $i ]->getIsParticipantDesignation() ) {
						//logDebug( "PRICEINFO " . $i . ": Participant Res: " . $this->m_designationList[ $i ]->getDesignationReservedTotal() . " - Max: " . $this->m_designationList[ $i ]->getMaxParticipants() );
						if( $this->m_designationList[ $i ]->getMaxParticipants() == 0 ) {
							//logDebug( " -> Max = 0" );
							return true;
						} else if( $this->m_designationList[ $i ]->getDesignationReservedTotal() < $this->m_designationList[ $i ]->getMaxParticipants() ) {
							//logDebug( " -> Max > 0 and Participants < Max" );
							return true;
						} else {
							//logDebug( " -> NONE OF THE ABOVE!" );
						}
					}

					$i++;
				}

				return false;				
			}
		}
			
		public function getEventPriceEntries() {
			return $this->m_priceInfoListPointer;
		}
		
		public function getEventPriceInfo( $a_index ) {
			return $this->m_priceInfoList[ $a_index ];
		}

		public function getPriceInfoMinimumPriceToPay() {
			return $this->m_priceInfoMinimumPriceToPay;
		}
		
		public function getPriceInfoMaximumPriceToPay() {
			return $this->m_priceInfoMaximumPriceToPay;
		}
		
		public function getPriceInfoFixedPrice() {
			return $this->m_priceInfoFixedPrice;
		}
		
		public function setLocationDetails(	$a_locationName,
											$a_locationDescription,
											$a_locationAddress,
											$a_locationGeoLocation,
											$a_locationLogoURL ) {
			$this->m_locationName = $a_locationName;
			$this->m_locationDescription = $a_locationDescription;
			$this->m_locationAddress = $a_locationAddress;
			$this->m_locationGeoLocation = $a_locationGeoLocation;
			$this->m_locationLogoURL = $a_locationLogoURL;
			
			// Split geo location in Lat and Long
			if( $this->m_locationGeoLocation != "" ) {
				$geolocation = explode( ",", $this->m_locationGeoLocation );
				$this->m_locationGeoLocationLat = $geolocation[ 0 ];
				$this->m_locationGeoLocationLong = $geolocation[ 1 ];				
			}
		}
		
		public function setAccountDetails(	$a_minimumPrice,
														$a_currencyCode,
														$a_fixedPrice,
														$a_shortPriceDescription,
														$a_richPriceDescription ) {
			$this->m_minimumPrice = ( (float)$a_minimumPrice / 100 );
			$this->m_currencyCode = $a_currencyCode;
			$this->m_fixedPrice = ( $a_fixedPrice == "true" );
			$this->m_shortPriceDescription = $a_shortPriceDescription;
			$this->m_richPriceDescription = $a_richPriceDescription;
		}
		
		public function createDesignationList() {
			 $this->m_designationList = array();
			 $this->m_designationList = NULL;
			 
			 $this->m_designationListPtr = 0;
			 
			 $this->m_eventReservedTotal = 0;
		}
		
		public function setDesignations(	$a_designationName,
											$a_designationDescription,
											$a_designationMaxParticipantsTotal,
											$a_designationMaxParticipantsPerCustomer,
											$a_designationReservedTotal ) {
											
			$this->m_designationList[ $this->m_designationListPtr ] = new Participantdesignation();
			
			$this->m_designationList[ $this->m_designationListPtr ]->setDesignations(	$a_designationName,
																						$a_designationDescription,
																						$a_designationMaxParticipantsTotal,
																						$a_designationMaxParticipantsPerCustomer,
																						$a_designationReservedTotal );
			
			$this->m_designationListPtr++;
			
			//$this->m_eventTicketsAvailableTotal+=$a_designationMaxParticipantsTotal;
			$this->m_eventReservedTotal += $a_designationReservedTotal;
		}

		
		public function setParticipantListKey( $a_eventParticipantListKey ) {
			$this->m_eventParticipantListKey = $a_eventParticipantListKey;
		}
		
		public function getParticipantListKey() {
			return $this->m_eventParticipantListKey;
		}
		
		public function getEventKey() {
			return $this->m_eventKey;
		}
		
		public function getEventName() {
			return $this->m_eventName;
		}

		public function getEventShortDescription() {
			return $this->m_eventShortDescription;
		}

		public function getEventDescription() {
			return $this->m_eventDescription;
		}

		public function getLogoURL() {
			return $this->m_logoURL;
		}

		public function getFlyerURL() {
			return $this->m_flyerURL;
		}

		public function getStateKey() {
			return $this->m_stateKey;
		}

		public function getPublic() {
			return $this->m_public;
		}

		public function getPaidEvent() {
			return $this->m_paidEvent;
		}

		public function getFreeEvent() {
			return $this->m_freeEvent;
		}

		public function getOpenForRegistration() {
			return $this->m_openForRegistration;
		}

		public function getRegistrationStart() {
			return $this->m_registrationStart;
		}

		public function getRegistrationStartVisible() {
			return $this->m_registrationStartVisible;
		}

		public function getRegistrationEnd() {
			return $this->m_registrationEnd;
		}

		public function getRegistrationEndVisible() {
			return $this->m_registrationEndVisible;
		}

		public function getEventStart() {
			return $this->m_eventStart;
		}

		public function getEventStartVisible() {
			return $this->m_eventStartVisible;
		}

		public function getOrganizerKey() {
			return $this->m_organizerKey;
		}

		public function getEventEnd() {
			return $this->m_eventEnd;
		}

		public function getEventEndVisible() {
			return $this->m_eventEndVisible;
		}

		public function getEventTags() {
			return $this->m_eventTags;
		}

		public function getShortTitle() {
			return $this->m_shortTitle;
		}

		public function getDisplayRegisteredParticipants() {
			return ( $this->m_displayRegisteredParticipants == "true" );
		}

		public function getShowSocialWidgets() {
			return $this->m_showSocialWidgets;
		}

		public function getVisibleFrom() {
			return $this->m_visibleFrom;
		}

		public function getVisibleTo() {
			return $this->m_visibleTo;
		}

		public function getLocationName() {
			return $this->m_locationName;
		}

		public function getLocationDescription() {
			return $this->m_locationDescription;
		}

		public function getLocationAddress() {
			return $this->m_locationAddress;
		}

		public function getlocationGeoLocation() {
			return $this->m_locationGeoLocation;
		}

		public function getLocationLogoURL() {
			return $this->m_locationLogoURL;
		}

		public function getLabelButtonMore() {
			return $this->m_labelButtonMore;
		}

		public function getLabelButtonRegister() {
			return $this->m_labelButtonRegister;
		}
		
		public function getMinimumPrice() {
			//return $this->m_minimumPrice;
			return $this->m_priceInfoMinimumPriceToPay;
		}
		
		public function getCurrencyCode() {
			return $this->m_currencyCode;
		}
		
		public function getFixedPrice() {
			//return $this->m_fixedPrice;
			return $this->m_priceInfoFixedPrice;
		}
		
		public function getShortPriceDescription() {
			return $this->m_shortPriceDescription;
		}
		
		public function getRichPriceDescription() {
			return $this->m_richPriceDescription;
		}
		
		public function getDesignationName( $a_ptr ) {
			return $this->m_designationList[ $a_ptr ]->getDesignationName();
		}
		
		public function getDesignationReservedTotal( $a_ptr ) {
			return $this->m_designationList[ $a_ptr ]->getDesignationReservedTotal();
		}
		
		public function getEventTotalReservation() {
			$reservedCount = 0;
			
			for( $i = 0; $i < $this->m_designationListPtr; $i++ ) {
				$reservedCount += $this->m_designationList[ $i ]->getDesignationReservedTotal();
			}
			
			return $reservedCount;
		}
		
		public function getEventTicketsAvailableTotal() {
			return $this->m_eventTicketsAvailableTotal;
		}
		
		public function getNumberOfDesignations() {
			return $this->m_designationListPtr;
		}
                
		public function getEventReturnURL() {
			 return $this->m_eventReturnURL;
		}
		
		public function getEventType() {
			 return $this->m_eventType;
		}
		
		public function getIsCancellationPossible() {
			 return $this->m_cancellationIsPossible;
		}
		
		public function getCancellationPossibleUntil() {
			 return $this->m_cancellationUntilDate;
		}
		
		public function flexbillet_events_getCategoryList() {
			 return $this->m_categoryList;
		}	
		public function createCategoryList() {
			 $this->m_categoryList = array();

		}
		public function setCategory(	$a_categoryPtr,
										$a_categoryKey,
										$a_categoryDisplayName ) {
											
			$this->m_categoryList[$a_categoryPtr]['external-key'] = $a_categoryKey;
			$this->m_categoryList[$a_categoryPtr]['display-name'] = $a_categoryDisplayName;
		}
		
		/***********************************
		SAX Parser Element Handlers
		***********************************/
		
		public function startElementHandler( $a_parser, $a_elementName, $a_attrArray ) {
			switch( $a_elementName ) {
				
				case "event-details":
					// Set Basic Eventdetails Properties
					if( isset( $a_attrArray[ "last-unregister-allowed-date" ] ) ) {
						$lastUnregisterDate = $a_attrArray[ "last-unregister-allowed-date" ];
					} else {
						$lastUnregisterDate = "";
					}
					
					if( isset( $a_attrArray[ "facebook-pixel-id" ] ) ) {
						$facebookPixelID = $a_attrArray[ "facebook-pixel-id" ];
					} else {
						$facebookPixelID = "";
					}

					if( isset( $a_attrArray[ "google-analytics-id" ] ) ) {
						$googleAnalyticsID = $a_attrArray[ "google-analytics-id" ];
					} else {
						$googleAnalyticsID = "";
					}

                    if( isset( $a_attrArray[ "edit-event-url" ] ) ) {
                        $editEventUrl = $a_attrArray[ "edit-event-url" ];
                    } else {
                        $editEventUrl = "";
                    }

					$this->setBasicEventDetails(	$a_attrArray[ "event-key" ],
															$a_attrArray[ "event-name" ],
															$a_attrArray[ "event-short-description" ],
															$a_attrArray[ "event-description" ],
															$a_attrArray[ "event-start" ],
															$a_attrArray[ "event-start-visible" ],
															$a_attrArray[ "logo-url" ],
															$a_attrArray[ "flyer-url" ],
															$a_attrArray[ "state-key" ],
															$a_attrArray[ "public" ],
															$a_attrArray[ "paid-event" ],
															$a_attrArray[ "free-event" ],
															$a_attrArray[ "open-for-registration" ],
															$a_attrArray[ "registration-start" ],
															$a_attrArray[ "registration-start-visible" ],
															$a_attrArray[ "registration-end" ],
															$a_attrArray[ "registration-end-visible" ],
															$a_attrArray[ "button-more-label" ],
															$a_attrArray[ "button-register-label" ],
															$a_attrArray[ "short-title" ],
															$a_attrArray[ "organizer-key" ],
															$a_attrArray[ "visible-from" ],
															$a_attrArray[ "visible-to" ],
															$a_attrArray[ "event-end" ],
															$a_attrArray[ "event-end-visible" ],
															$a_attrArray[ "event-tags" ],
															$a_attrArray[ "display-registered-participants" ],
															$a_attrArray[ "show-social-widgets" ],
															$a_attrArray[ "booking-return-target" ],
															$a_attrArray[ "event-type" ],
															$lastUnregisterDate,
															$a_attrArray[ "max-available-tickets" ],
															$a_attrArray[ "sold-out-label" ],
															$a_attrArray[ "social-image-url" ],
															$facebookPixelID,
															$googleAnalyticsID,
                                                            $editEventUrl);
					
					//echo "THIS EVENT IS OPEN? " . $a_attrArray[ "open-for-registration" ] . "<br>";
					
					break;
				
				case "location":
				
					// Set Location Properties
					$this->setLocationDetails(	$a_attrArray[ "name" ],
												$a_attrArray[ "description" ],
												$a_attrArray[ "address" ],
												$a_attrArray[ "geo-location" ],
												$a_attrArray[ "logo-url" ] );
					break;
					
				case "account":
					// Set Account Properties
					$this->setAccountDetails(	$a_attrArray[ "minimum-price-to-pay" ],
														$a_attrArray[ "currency-code" ],
														$a_attrArray[ "fixed-price" ],
														$a_attrArray[ "short-price-description" ],
														$a_attrArray[ "rich-price-description" ] );
					break;
					
				case "participant-designation-list":
					$this->createDesignationList();
					
					break;
				
				case "participant-designation":
					// Set Participation Designation Properties
					$this->setDesignations(		$a_attrArray[ "participant-designation-name" ],
												$a_attrArray[ "participant-designation-description" ],
												$a_attrArray[ "max-participants" ],
												$a_attrArray[ "max-participants-per-customer" ],
												$a_attrArray[ "reserved-total" ] );
					break;
					
				case "event-tag-list":
					$this->setParticipantListKey( $a_attrArray[ "event-tag-list-key" ] );
					break;
				
				case "event-price-info-list":
					$this->m_currentPriceInfoLevel++;
					
					//logDebug( "event-price-info-list: " . $this->m_currentPriceInfoLevel );
					
					if( $this->m_currentPriceInfoLevel == 1 ) {
						$this->setEventPriceInfo(	$a_attrArray[ "minimum-price-to-pay" ],
															$a_attrArray[ "maximum-price-to-pay" ],
															$a_attrArray[ "fixed-price" ] );
					}

					break;
				
				case "event-price-info":
					//$this->m_currentPriceInfoLevel++;
					
					$this->m_priceInfoList[ $this->m_priceInfoListPointer ] = new EventPriceInfo();
				
					if( isset( $a_attrArray[ "participant-designation-name" ] ) ) {
						// Fullblown participant designation price list entity 
						$this->m_priceInfoList[ $this->m_priceInfoListPointer ]->setEventPriceInfoLevel0(
							$this->m_currentPriceInfoLevel,
							$a_attrArray[ "event-price-info-label" ],
							$a_attrArray[ "event-price-info-price" ],
							$a_attrArray[ "event-price-info-fixed-price" ],
							$a_attrArray[ "participant-designation-name" ],
							$a_attrArray[ "participant-designation-description" ],
							$a_attrArray[ "choice-description" ],
							$a_attrArray[ "input-field-label" ],
							$a_attrArray[ "max-participants" ],
							$a_attrArray[ "max-participants-per-customer" ],
							$a_attrArray[ "reserved-total" ],
							$a_attrArray[ "registrant-fixed-fee" ],
							$a_attrArray[ "order-total-percentile-fee" ],
							true );
						
							$this->m_priceInfoListPointer++;
					} else {
						// Non-participant designation entity
						$this->m_priceInfoList[ $this->m_priceInfoListPointer ]->setEventPriceInfoLevel1(
							$this->m_currentPriceInfoLevel,
							$a_attrArray[ "event-price-info-label" ],
							$a_attrArray[ "event-price-info-price" ],
							$a_attrArray[ "event-price-info-fixed-price" ],
							false );

							$this->m_priceInfoListPointer++;						
					}

					break;
					
				

				default:
					//echo "<br>Unsupported element!";
					break;
			}
		}
	
		public function endElementHandler( $a_parser, $a_elementName ) {
			switch( $a_elementName ) {
				case "event-price-info-list":
					$this->m_currentPriceInfoLevel--;
				break;
			}
		}
	}
?>