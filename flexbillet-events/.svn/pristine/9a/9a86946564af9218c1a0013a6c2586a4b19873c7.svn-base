<?
	/* ****************************************************
	   Class Eventlist
	   **************************************************** */
	   
	class Eventlist {
		private $m_eventList;
		private $m_eventListPtr;
		private $m_eventCategoryPtr;
		
		// Eventlist filtering and render mode
		private $m_showCategoryFilter;
		private $m_showFilterLocation;
		private $m_showFilterCalendar;
		private $m_showFilterAvailable;
		private $m_showFilterTextSearch;
		private $m_eventListLayout;
		
        public function __construct() {
			 // Instantiate + Clear Array and Reset Pointer
			 $this->m_eventList = array();
			 $this->m_eventList = NULL;
			 
			 $this->m_eventListPtr = 0;
			 $this->m_eventCategoryPtr = 0;
			 
			 // Set defaults for eventlist filtering and render mode
			$this->m_showCategoryFilter = false;
			$this->m_showFilterLocation = false;
			$this->m_showFilterCalendar = false;
			$this->m_showFilterAvailable = false;
			$this->m_showFilterTextSearch = false;
			$this->m_eventListLayout = "Full";
        }
		
		/***********************************
		Accessor Methods
		***********************************/
		
		
		public function getNumberOfEvents() {
			return $this->m_eventListPtr;
		}
		
		public function getEvent( $a_eventIndex ) {
			return $this->m_eventList[ $a_eventIndex ];
		}
		
		public function isFilteringEnabled() {
			// Return true if either filter has been enabled
			return ( $this->m_showCategoryFilter || $this->m_showFilterLocation || $this->m_showFilterCalendar || $this->m_showFilterAvailable || $this->m_showFilterTextSearch );
		}
		
		public function isCategoryFilteringEnabled() {
			return ( $this->m_showCategoryFilter == "true" );
		}

		public function isLocationFilteringEnabled() {
			return ( $this->m_showFilterLocation == "true" );
		}

		public function isCalendarFilteringEnabled() {
			return ( $this->m_showFilterCalendar == "true" );
		}

		public function isAvailabilityFilteringEnabled() {
			return ( $this->m_showFilterAvailable == "true" );
		}

		public function isTextFilteringEnabled() {
			return ( $this->m_showFilterTextSearch == "true" );
		}
		
		public function useCompactListRendering() {
			return ( $this->m_eventListLayout != "Full" );
		}

		/***********************************
		SAX Parser Element Handlers
		***********************************/
	
		public function startElementHandler( $a_parser, $a_elementName, $a_attrArray ) {
			switch( $a_elementName ) {
				case "event-list-config":
					// Added 2020-04-11 (KH): Parsing event list configuration
					if( is_object( $this ) && $this != null ) {
						// <event-list-config showFilterCategory="false" showFilterLocation="false" showFilterCalendar="true" showFilterAvailable="false" showFilterTextSearch="false" eventListLayout="Full"/>
						$this->m_showCategoryFilter = $a_attrArray[ "showFilterCategory" ];
						$this->m_showFilterLocation = $a_attrArray[ "showFilterLocation" ];
						$this->m_showFilterCalendar = $a_attrArray[ "showFilterCalendar" ];
						$this->m_showFilterAvailable = $a_attrArray[ "showFilterAvailable" ];
						$this->m_showFilterTextSearch = $a_attrArray[ "showFilterTextSearch" ];
						$this->m_eventListLayout = $a_attrArray[ "eventListLayout" ];
					}
					
					break;
				case "event-list-details":
					// Instantiate new Eventlistdetails Object
					$this->m_eventList[ $this->m_eventListPtr ] = new Eventlistdetails;
					
					// Set Basic Eventdetails Properties
					if( isset( $a_attrArray[ "last-unregister-allowed-date" ] ) ) {
						$lastUnregisterDate = $a_attrArray[ "last-unregister-allowed-date" ];
					}
					else {
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
					
					$this->m_eventList[ $this->m_eventListPtr ]->setBasicEventDetails(	$a_attrArray[ "event-key" ],
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
					break;
				
				case "location":
					// Set Location Properties
					$this->m_eventList[ $this->m_eventListPtr ]->setLocationDetails(	$a_attrArray[ "name" ],
																											$a_attrArray[ "description" ],
																											$a_attrArray[ "address" ],
																											$a_attrArray[ "geo-location" ],
																											$a_attrArray[ "logo-url" ] );
					break;
					
				case "account":
					// Set Account Properties
					$this->m_eventList[ $this->m_eventListPtr ]->setAccountDetails(	$a_attrArray[ "minimum-price-to-pay" ],
																											$a_attrArray[ "currency-code" ],
																											$a_attrArray[ "fixed-price" ],
																											$a_attrArray[ "short-price-description" ],
																											$a_attrArray[ "rich-price-description" ] );
					break;
					
				case "participant-designation-list":
					$this->m_eventList[ $this->m_eventListPtr ]->createDesignationList();
					
					break;
				
				case "participant-designation":
					// Set Participation Designation Properties
					$this->m_eventList[ $this->m_eventListPtr ]->setDesignations(		$a_attrArray[ "participant-designation-name" ],
																						$a_attrArray[ "participant-designation-description" ],
																						$a_attrArray[ "max-participants" ],
																						$a_attrArray[ "max-participants-per-customer" ],
																						$a_attrArray[ "reserved-total" ] );
					
					break;
				
				case "event-price-info-list":
					if( !empty( $a_attrArray[ "minimum-price-to-pay" ] ) ) {
						$this->m_eventList[ $this->m_eventListPtr ]->setEventPriceInfo(	$a_attrArray[ "minimum-price-to-pay" ],
																												$a_attrArray[ "maximum-price-to-pay" ],
																												$a_attrArray[ "fixed-price" ] );
					}
               
					break;
					
				case "event-category-list":
					$this->m_eventCategoryPtr = 0;
					$this->m_eventList[ $this->m_eventListPtr ]->createCategoryList();
					break;	
					
				case "category":
					$this->m_eventList[ $this->m_eventListPtr ]->setCategory($this->m_eventCategoryPtr, $a_attrArray[ "external-key" ], $a_attrArray[ "display-name" ]);
					$this->m_eventCategoryPtr += 1;
					
					break;	

				default:
					//echo "<br>Unsupported element!";
					break;
			}
		}
		
		public function endElementHandler( $a_parser, $a_elementName ) {
			switch( $a_elementName ) {
				case "event-list-details":
					$this->m_eventListPtr += 1;
				break;
			}
		}
 
	}
?>