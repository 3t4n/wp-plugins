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
	$formatDate = explode( ' ', $compactDate);
	$displayDate = str_replace('.', '', $formatDate[0]);
	//if ( strlen($displayDate) < 2 ) $displayDate = '0' . $displayDate;
	$displayMonth = substr($formatDate[1], 0,3);

?>	
<div class="flexbillet-box-wrapper flexbillet-compact-wrap d-flex flex-column col-xl-4 col-lg-6  col-md-12 col-xs-12">

	<div class="flexbillet-inner border d-flex flex-column flex-grow-1 <?php if ($flexbilletShortcodeOptions['border-radius'] == 1) echo 'flexbillet-rounded '; echo 'flexbillet-theme-background-' . esc_html( $flexbilletShortcodeOptions['color-theme'] ); ?> ">
		<div class="row d-flex flex-grow-1">

			<div class="col-12 flex-column d-flex flex-grow-1">
				<div class="padding-left-50">
					<em class="date position-absolute"><? echo esc_html( $displayDate ); ?>.</em>
					<em class="month position-absolute"><? echo esc_html( $displayMonth ); ?></em>

					<p class="flexbillet-title"><?php echo esc_html( $eventList->getEvent( $i )->getEventName() ); ?></p>
					<p class="flexbillet-description"><?php echo esc_html( $eventList->getEvent( $i )->getEventShortDescription() ); ?></p>
				</div>
				<div class="mt-auto">
					<div class="padding-left-50">
					<?php
						if ($eventCategoryList != null) {
							for( $c = 0; $c < count($eventCategoryList); $c++ ) {
								if ($flexbilletShortcodeOptions['color-theme'] == 1) {
									$spanColor = $allEventCategoriesColor[ $eventCategoryList[$c]['external-key'] ];
								} else {
									$spanColor = 0;
								}
							?>
								<span class="cat-tag cat-color-span-<?php echo esc_html( $spanColor ); ?>"><? echo esc_html( $eventCategoryList[$c]['display-name'] ); ?></span>
							<?
							}
						}	
					?>
					<div style="clear: both;"></div>
					<p class="location"><? echo esc_html(  $eventList->getEvent( $i )->getLocationName() ); ?></p>					
				</div>
					

						<a href="<? echo esc_html( FLEXBILLET_EVENTS_URL ) . esc_html( $eventList->getEvent( $i )->getOrganizerKey() ); /* $organizer->getOrganizerKey() */ ?>/event/<? echo esc_html( $eventList->getEvent( $i )->getEventKey() ); ?>/register/l/<? echo esc_html( $urlLocalePostfix ); ?>" class="btn ucasetext float-right <? echo esc_html( $buyTicketsButtonDisabledClass ); ?>" style="background: <? echo esc_html( $flexbilletShortcodeOptions['button-buy-background'] ); ?>; color: <? echo esc_html( $flexbilletShortcodeOptions['button-buy-font-color'] ); ?>" role="button"><? echo esc_html( $buyTicketsButtonLabel ); ?></a>
						<a href="<? echo esc_html( FLEXBILLET_EVENTS_URL ) . esc_html( $eventList->getEvent( $i )->getOrganizerKey() ); /* $organizer->getOrganizerKey() */ ?>/event/<? echo esc_html( $eventList->getEvent( $i )->getEventKey() ); ?>/l/<? echo esc_html( $urlLocalePostfix ); ?>" class="btn ucasetext float-right" style="background: <? echo esc_html( $flexbilletShortcodeOptions['button-info-background'] ); ?>; color: <? echo esc_html( $flexbilletShortcodeOptions['button-info-font-color'] ); ?>" role="button"><? echo flexbillet_events_localize( "button_more_info", esc_html( $currentLocale ) )?></a>	
				</div>
			</div>					
			
		</div>
	</div>
</div>