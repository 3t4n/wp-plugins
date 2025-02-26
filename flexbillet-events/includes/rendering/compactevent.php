<? 
	if ($flexbilletShortcodeOptions['color-theme'] == 1) {
			if ( $eventCategoryList ) {
				$accentColor1 = $allEventCategoriesColor[ $eventCategoryList[0]['external-key'] ];
				$accentColor2 = (count($eventCategoryList) < 2) ? $accentColor1 : $allEventCategoriesColor[ $eventCategoryList[1]['external-key'] ];
				$accentColor3 = (count($eventCategoryList) < 3) ? $accentColor2 : $allEventCategoriesColor[ $eventCategoryList[2]['external-key'] ];
			} else {
				$accentColor1 = 1;
				$accentColor2 = 1;
				$accentColor3 = 1;
			}
	} else {
		$accentColor1 = 0;
		$accentColor2 = 0;
		$accentColor3 = 0;
	}
?>

	<div class="<? echo esc_html( $eventStartClass ); ?> flexbillet-compact-wrap row eventdetailpanel compact flexbillet-boxed <? echo esc_html( $eventCategoryClasses ); ?> <? echo esc_html( $availableTicketsClass ); ?>" style="margin-bottom: 15px;">
		<div class="col-lg-2 col-xs-12">

			<div class="row date-wrapper compact">
				<? //Split up our original formatted date return for compact use
					$compactFormattedDate = explode( " ", ucfirst( flexbillet_events_displayFormattedDateTime( $eventList->getEvent( $i )->getEventStart(), $currentLocale ) ) );
					
					if ($currentLocale == 'en') { $dateTokens['compact-date-day'] = 1; $dateTokens['compact-date-month'] = 2; $dateTokens['compact-date-time'] = 5; }
					else { $dateTokens['compact-date-day'] = 2; $dateTokens['compact-date-month'] = 3; $dateTokens['compact-date-time'] = 6; }

					$compactWeekday = $compactFormattedDate[ 0 ];
					$compactDate = $compactFormattedDate[ $dateTokens['compact-date-day'] ] . ' ' . $compactFormattedDate[ $dateTokens['compact-date-month'] ];
					if (!empty($compactFormattedDate[ $dateTokens['compact-date-time'] ])) {
						$compactTime = $compactFormattedDate[ $dateTokens['compact-date-time'] ];
					} else {
						$compactTime = '';
					}
				?>			
				<div class="col col-lg-12 weekday compact cat-color-acc-<? echo esc_html( $accentColor1 ); ?> cat-color-bg-<? echo esc_html( $accentColor1 ); ?> <?php if ($flexbilletShortcodeOptions['border-radius'] == 1) echo 'flex-events-border-radius-top-left'; ?>"><?php echo esc_html( $compactWeekday ); ?></div>
				<div class="col col-lg-12 date cat-color-acc-<? echo esc_html( $accentColor2 ); ?> cat-color-bg-<? echo esc_html( $accentColor1 ); ?> compact"><?php echo esc_html( $compactDate); ?></div>
				<div class="col col-lg-12 time cat-color-acc-<? echo esc_html( $accentColor3 ); ?> cat-color-bg-<? echo esc_html( $accentColor1 ); ?> compact <?php if ($flexbilletShortcodeOptions['border-radius'] == 1) echo 'flex-events-border-radius-bottom-left'; ?>">
					<?
					if (!empty($compactTime)) {
					?>
					<i class="fa fa-clock-o fa-fw"></i><?php echo esc_html( $compactTime ); ?>
					<?
					}
					?>
				</div>
			</div>
		</div>
		
		<div class="col-lg-10 col-xs-12 right-event-wrapper border-acc-<? echo esc_html( $accentColor1 ); ?> compact  <?php if ($flexbilletShortcodeOptions['border-radius'] == 1) echo 'flex-events-border-radius-top-bottom-right'; ?> <?php echo 'flexbillet-theme-background-' . esc_html( $flexbilletShortcodeOptions['color-theme'] ); ?>">
			<div class="row">
				<!-- description wrapper -->
				<div class="col-md-12 event-title-wrap compact">
				<? echo esc_html(  $eventList->getEvent( $i )->getEventName() ); ?>
				<p><? echo esc_html( $eventList->getEvent( $i )->getEventShortDescription() ); ?></p>
				</div>

					<div class="col-md-6 col-xs-12 lower-event-blocks">
						<!-- category wrapper -->
						<div class="col-md-12 category-wrap compact padding-left-0">
						<?
							if ($eventCategoryList != null) {
								for( $c = 0; $c < count($eventCategoryList); $c++ ) {
									if ($flexbilletShortcodeOptions['color-theme'] == 1) {
										$spanColor = $allEventCategoriesColor[ $eventCategoryList[$c]['external-key'] ];
									} else {
										$spanColor = 0;
									}
								?>
									<span class="cat-tag cat-color-span-<?php echo esc_html( $spanColor); ?>"><? echo esc_html( $eventCategoryList[$c]['display-name'] ); ?></span>
								<?
								}
							}	
						?>
						</div>				
						<!-- location -->
						<div class="col-md-12 location-wrap padding-left-0 compact">
							<?php if ($eventList->getEvent( $i )->getLocationName() != '-') { ?>
								<i class="fa fa-map-marker fa-fw site-event-details-icon align-middle"></i><p class="align-middle"><? echo esc_html(  $eventList->getEvent( $i )->getLocationName() ); ?></p>
							<?php } ?>
						</div>
					</div>
					<div class="col-md-6 col-xs-12 lower-event-blocks text-right">
						<!-- info button -->
						<a href="<? echo esc_html( FLEXBILLET_EVENTS_URL ) . esc_html( $eventList->getEvent( $i )->getOrganizerKey() ); /* $organizer->getOrganizerKey() */ ?>/event/<? echo esc_html( $eventList->getEvent( $i )->getEventKey() ); ?>/l/<? echo esc_html( $urlLocalePostfix ); ?>" class="btn ucasetext" style="background: <? echo esc_html( $flexbilletShortcodeOptions['button-info-background'] ); ?>; color: <? echo esc_html( $flexbilletShortcodeOptions['button-info-font-color'] ); ?>" role="button"><? echo esc_html( flexbillet_events_localize( "button_more_info", $currentLocale ) ); ?></a>						
						<!-- buy tickets button -->
						<a href="<? echo esc_html( FLEXBILLET_EVENTS_URL ) . esc_html( $eventList->getEvent( $i )->getOrganizerKey() ); /* $organizer->getOrganizerKey() */ ?>/event/<? echo esc_html( $eventList->getEvent( $i )->getEventKey() ); ?>/register/l/<? echo esc_html( $urlLocalePostfix ); ?>" class="btn ucasetext mr-0 <? echo esc_html( $buyTicketsButtonDisabledClass ); ?>" style="background: <? echo esc_html( $flexbilletShortcodeOptions['button-buy-background'] ); ?>; color: <? echo esc_html( $flexbilletShortcodeOptions['button-buy-font-color'] ); ?>" role="button"><? echo esc_html( $buyTicketsButtonLabel ); ?></a>
					</div>

			</div>				
		</div>
	</div>