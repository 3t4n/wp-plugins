<?
	/* locale is not dynamic as of 1.0.0 */
	$urlLocalePostfix = 'da';
	$eventList = flexbillet_events_getEvents( $currentLocale, $uriObject->getOrganizerKey(), false, $flexbilletPassPhrase );
	$flexbilletShortcodeOptions = get_option( 'flexbillet_events_shortcode_options' );

	//Filtering and compact view settings 
	$activeFilters  			= $eventList->isFilteringEnabled();
	$activeFilters  			= false;
	$activeAvailabilityFilter 	= $eventList->isAvailabilityFilteringEnabled();
	
	$activeCategoryFilter 		= $eventList->isTextFilteringEnabled();
	$activeDateFilter			= $eventList->isCalendarFilteringEnabled();
	$compactView 				= ( $eventList->useCompactListRendering() == "1" ? TRUE : FALSE );
	$compactView = true;
	$boxRowCounter = 0;

	//Double pass to create category select dropdown list if active filter 
	if ($activeCategoryFilter) {
		$allEventCategories = array();
		$allEventCategoriesColor = array();
		for( $i = 0; $i < $eventList->getNumberOfEvents(); $i++ ) {
			if( ( $eventList->getEvent( $i )->getStateKey() === "PublishedMode" ) ) {
							
				$eventCategoryList = $eventList->getEvent( $i )->flexbillet_events_getCategoryList();
				
				if ($eventCategoryList != null) {
					//print_r($eventCategoryList);
					for( $c = 0, $d = 1; $c < count($eventCategoryList); $c++, $d++ ) {
						$allEventCategories[$eventCategoryList[$c]['external-key']] = $eventCategoryList[$c]['display-name'];
					}
				}			
			}		
			
		}
		$d = 1;
		foreach ($allEventCategories as $externalKey => $keyName) {
			$allEventCategoriesColor[$externalKey] = $d;
			$d++;
		}
	}

?>
<div>
	
	<div id="eventdetaillist" class="flexbillet-bootstrap">

<?
	$renderedEvents = 0;

	for( $i = 0; $i < $eventList->getNumberOfEvents(); $i++ ) {
		//logDebug( "EVENT STATE KEY: " . $eventList->getEvent( $i )->getStateKey() );
		if( ( $eventList->getEvent( $i )->getStateKey() === "PublishedMode" ) || ( $eventList->getEvent( $i )->getStateKey() === "TestMode" && $userIsManagerOnThisOrganizer ) ) {
			$renderThisEvent = true;
		} else {
			$renderThisEvent = false;
		}
			
		if( $renderThisEvent ) {
			$renderedEvents++;

			// 
			$priceCurrency = $eventList->getEvent( $i )->getCurrencyCode();
			$priceFrom = $eventList->getEvent( $i )->getFixedPrice() ? "" : flexbillet_events_localize( "price_from", $currentLocale ) . " ";
			$priceLeadingString = $priceFrom . " " . $priceCurrency . " ";

			// DETERMINE WHETHER "BUY TICKETS" BUTTON SHOULD BE ACTIVE OR NOT
			// SET TICKETS AVAILABILITY CLASS FOR WRAPPER WITH "event-signup-closed" for filtering
			if( $eventList->getEvent( $i )->getOpenForRegistration() == "true" ) {

				if( $eventList->getEvent( $i )->getTicketAvailabilityStatus() ) {
					if( $eventList->getEvent( $i )->getLabelButtonRegister() !== "" ) {
						$buyTicketsButtonLabel = strtoupper( $eventList->getEvent( $i )->getLabelButtonRegister() );
					} else {
						$buyTicketsButtonLabel = flexbillet_events_localize( "button_buy_tickets-" . $siteTheme, $currentLocale );
					}
					$buyTicketsButtonDisabledClass = "";
					$availableTicketsClass = "event-signup-open";
				} else {
					if( $eventList->getEvent( $i )->getSoldOutLabel() != "" ) {
						$buyTicketsButtonLabel = $eventList->getEvent( $i )->getSoldOutLabel();
					} else {
						$buyTicketsButtonLabel = flexbillet_events_localize( "sold_out", $currentLocale );
					}

					$buyTicketsButtonDisabledClass = "disabled";
					$availableTicketsClass = "event-signup-closed";
				}
			} else {
				$now = new DateTime( "now" );
				$regStart = new DateTime( $eventList->getEvent( $i )->getRegistrationStart() );
				$regEnd = new DateTime( $eventList->getEvent( $i )->getRegistrationEnd() );
				$diff = date_diff( $now, $regStart );
				

				if( $regStart > $now ) {
					// Not open yet
					$buyTicketsButtonLabel = flexbillet_events_localize( "registration_not_open", $currentLocale );
					$buyTicketsButtonDisabledClass = "disabled";
					$availableTicketsClass = "event-signup-closed";
				} else if( $now > $regEnd ) {
					// Has closed
					$buyTicketsButtonLabel = flexbillet_events_localize( "registration_not_open", $currentLocale );
					$buyTicketsButtonDisabledClass = "disabled";
					$availableTicketsClass = "event-signup-closed";
				}
			}

?>
		
		<? //Filter classes 
		$eventCategoryClasses = '';
		$eventStartClass = '';
		
		if ($activeCategoryFilter) {
			$eventCategoryList = $eventList->getEvent( $i )->flexbillet_events_getCategoryList();
			if ($eventCategoryList != null) {
				for( $c = 0; $c < count($eventCategoryList); $c++ ) {
					$eventCategoryClasses .= 'category-' . $eventCategoryList[$c]['external-key'] . ' ';
					//$allEventCategories[$eventCategoryList[$c]['external-key']] = $eventCategoryList[$c]['display-name'];
					
					//Set category color for compact view user
					$catAccentColor = $allEventCategoriesColor[$eventCategoryList[$c]['external-key']];
				}
			}
		}
		if ($activeDateFilter) {		
			$eventStartClass = 'eventstart' . strtotime( $eventList->getEvent( $i )->getEventStart() );	
		}
		
		?>
		
		<?
		if ($compactView) {
			// Display event by default
			$displayEvent = TRUE;
			$displayType = 'boxed';
			//If attributes are set, event needs to pass these to be shown 
			if ( $flexbilletShortcodeAttributes['categories'] ) { 
				$displayEvent = FALSE; 

				for( $c = 0; $c < count($eventCategoryList); $c++ ) {
					if ( array_search( $eventCategoryList[$c]['external-key'], $flexbilletShortcodeAttributes['categories']) !== FALSE ) {
						$displayEvent = TRUE;
					} 
				}
			}

			if ( $displayEvent ) {
				$boxRowCounter++;
				if ( $flexbilletShortcodeAttributes['boxed'] ) {

					if ($boxRowCounter == 1) { 
					?>
						<div class="row row-eq-height">
					<?php 			
					}		
					include('boxedevent.php');
	
				} else {

					include('compactevent.php');

				}


			}
			//Logic for closing our row
			if ( $flexbilletShortcodeAttributes['boxed'] && $boxRowCounter > 0 ) {
					if ($renderedEvents == $eventList->getNumberOfEvents() ) { 
						?>
					</div>
					<?php
					}
			}
		} else {

			}
		}
	}
	
	if( $renderedEvents == 0 ) {
?>
		<div class="row no-gutters panel-theme content-panel no-loaded-events">
			<div class="col-xs-12">
				<div class="site-organizer-frontpage-text "><h3><? echo esc_html( flexbillet_events_localize( "no_events_header", $currentLocale ) ); ?></h3><? echo esc_html( flexbillet_events_localize( "no_events_text", $currentLocale ) ); ?></div>
			</div>
		</div>
<?
	}
	if ($activeFilters) {	
?>
		<div class="row no-gutters panel-theme content-panel no-filtered-events">
			<div class="col-xs-12">
				<div class="site-organizer-frontpage-text center"><h1><? echo esc_html( flexbillet_events_localize( "no_events_header", $currentLocale ) ); ?></h1><? echo esc_html( flexbillet_events_localize( "no_events_text", $currentLocale ) ); ?></div>
			</div>
		</div>
<?
	}

?>	
	</div>
	<div class="site-vertical-spacer"></div>
</div>