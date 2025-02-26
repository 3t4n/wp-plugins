<?
/*	****************************************************
	Constants
	**************************************************** */


	define( "THEME_FLEXBILLET", "flexbillet" );

	/**
	 * Returns the protocol used "https://" or "http://". 
	 */
	function flexbillet_events_getProtocol() {
		return isProtocolHttps() ? "https://" : "http://";
	}

    function flexbillet_events_displayFormattedTime( $a_time, $a_locale ) {
        // Decode date for display 14:55
        $time = $a_time;
        $time2 = explode( ":", $time );

        switch( $a_locale ) {
            case "da":
                $decodedTime = $time2[ 0 ] . ":" . $time2[ 1 ];

                return $decodedTime;

            case "en":
                $decodedTime = $time2[ 0 ] . ":" . $time2[ 1 ];

                return $decodedTime;

            default:
                return "UNSUPPORTED LOCALE";
        }
    }

    function flexbillet_events_displayFormattedDateTime($a_date, $a_locale, $dateOnly = NULL) {
	    if(!isset($dateOnly)) {
	        $dateOnly = false;
        }
        // Decode date for display 2019-05-29 14:55
        $date = explode( "-", $a_date );
        $time = explode( " ", $a_date );
        $time2 = explode( ":", $time[ 1 ] );

        $dateom = explode( " ", $date[ 2 ] );
        $dateom2 = ltrim( $dateom[ 0 ], "0" ); // Remove leading zero from date

        $day = getdate( mktime( 0, 0, 0, (int)$date[ 1 ], (int)$dateom2, (int)$date[ 0 ] ) );
        $wkday = (int)$day[ "wday" ];

        switch( $a_locale ) {
            case "da":
                // Locale DA - "d/m/yy"
                $weekdays = array( "søndag d.", "mandag d.", "tirsdag d.", "onsdag d.", "torsdag d.", "fredag d.", "lørdag d." );
                $months = array( "januar", "februar", "marts", "april", "maj", "juni", "juli", "august", "september", "oktober", "november", "december" );

                $decodedDay = $weekdays[ $wkday ];
                $decodedDate = $dateom2 . ". " . $months[ (int)$date[ 1 ] - 1 ] . " " . $date[ 0 ];
                $decodedTime = $time2[ 0 ] . ":" . $time2[ 1 ];

                if( $dateOnly || ( $decodedTime == "00:00" ) || ( $decodedTime == "24:00" ) || ( $decodedTime == "23:59" ) ) {
                    $outputTime = $decodedDay . " " . $decodedDate;
                } else {
                    $outputTime = $decodedDay . " " . $decodedDate . " kl. " . $decodedTime;
                }

                return $outputTime;

            case "en":
                // Locale EN - "m/d/yy"
                $weekdays = array( "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday" );
                $months = array( "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" );

                $decodedDay = $weekdays[ $wkday ];
                $decodedDate = $dateom2 . ". " . $months[ (int)$date[ 1 ] - 1 ] . " " . $date[ 0 ];
                $decodedTime = $time2[ 0 ] . ":" . $time2[ 1 ];

                if( $dateOnly || ( $decodedTime == "00:00" ) || ( $decodedTime == "24:00" ) || ( $decodedTime == "23:59" ) ) {
                    $outputTime = $decodedDay . " " . $decodedDate;
                } else {
                    $outputTime = $decodedDay . " " . $decodedDate . " at " . $decodedTime;
                }

                return $outputTime;

            default:
                return "UNSUPPORTED LOCALE";
        }
    }
    function flexbillet_events_getCategoryList( $a_eventList) {
		$allEventCategories = array();
		$allEventCategoriesColor = array();
		for( $i = 0; $i < $a_eventList->getNumberOfEvents(); $i++ ) {
			if( ( $a_eventList->getEvent( $i )->getStateKey() === "PublishedMode" ) ) {
							
				$eventCategoryList = $a_eventList->getEvent( $i )->flexbillet_events_getCategoryList();
				
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
		
    	return $allEventCategories;
    }

	function flexbillet_events_formatCurrencyAmount( $a_amount, $a_locale ) {
		//$amount = ( $a_amount / 100 );
		$amount = $a_amount;
		
		switch( $a_locale ) {
			case "da":
				return number_format( $amount, 2, ",", "." );
				break;
			
			case "en":
				return number_format( $amount, 2, ".", "," );
				break;
			
			default:
				return "UNSUPPORTED";
				break;
		}
	}
	
	function flexbillet_events_localize( $a_key, $a_locale ) {
		if( $a_locale == null || $a_locale == "" ) {
			// Default locale: DANISH (da)
			$locale = "da";
		} else {
			$locale = $a_locale;
		}
			
		if( $a_key == null || $a_key == "" ) {
			// Default key: "undefined"
			$key = "undefined";
		} else {
			$key = $a_key;
		}

		switch( $locale ) {
			case "da":
				$locals = array(
					"undefined" => "Ikke defineret!",
					
					/* MENU */
					"menu_contact_organizer" => "KONTAKT ARRANGØR",
					"menu_contact_flexminds" => "KONTAKT FLEXBILLET",
					"menu_login" => "ARRANGØR LOGIN",
					"menu_logout" => "LOG UD",
					"menu_eventlist" => "VIS EVENTLISTE",
					"menu_admin" => "ARRANGØRVÆRKTØJER",
					"menu_sitelogin" => "ARRANGØR LOGIN (SITE)",
					"menu_problem" => "RAPPORTER PROBLEM",
					
					/* MODAL DIALOGS */
					"flexminds_contact_title" => "Flexbillet",
					"flexminds_contact_body" => "<p><b>Flexbillet.dk drives af:</b></p><p>Flexbillet ApS<br>Sindalsvej 7<br>8240 Risskov</p><p><b>Kontakt os:</b></p><p>Email: support@flexbillet.dk<br>Telefon: +45 4422 8888<br>Web: https://flexbillet.dk</p>",
					"flexminds_contact_close" => "LUK",
					
					"organizer_contact_title" => "Kontakt arrangøren",
					"organizer_contact_name" => "Arrangør",
					"organizer_contact_contactinformation" => "Kontaktinformation",
					"organizer_contact_phone" => "Telefon",
                    "organizer_contact_phone_hours" => "Træffetid",
					"organizer_contact_email" => "Email",
					"organizer_contact_web" => "Web",
					"organizer_contact_body" => "Kontakt altid arrangøren hvis du har spørgsmål i forbindelse med et arrangement eller lignende. Flexbillet yder udelukkende teknisk support og kan ikke besvare spørgsmål, som hidrører arrangøren eller dennes arrangementer.",
					"organizer_contact_close" => "LUK",

					"login_dialog_login_as" => "Login som arrangør",
					"login_dialog_cancel" => "ANNULLER",
                    "dialog_close" => "LUK",

                    "login_dialog_bypass_thirdparty_missing" => "Lad mig prøve alligevel",

                    "login_minimum_requirements_issue_dialog" => "Systemkravene er ikke opfyldt",
                    "check_minimum_requirements" => "Klik her for at få hjælp til at ændre indstillingerne",

                    "login_dialog_user_login_failed" => "Login som administrator mislykkedes",
                    "user_login_failed" => "Login som administrator på den givne arrangør er mislykkes eftersom du ikke har adgang til denne. Kontakt venligst arrangøren hvis du mener at du burde have adgang. Du kan også have modtaget en email med en administrator-invitation som ikke er benyttet endnu.",

                    "login_dialog_user-login-failed-invitation-resend" => "Login som administrator - administrator invitation er nu sendt",
                    "user-login-failed-invitation-resend" => "Login som administrator på den givne arrangør kan først ske når du har modtaget og fulgt instruktionerne i administrator-invitationen som vi lige har gensendt til dig.",

                    "user-login-failed-unknown-manager-invitation" => "Login som administrator mislykkedes - administratorinvitationen er ukendt eller allerede brugt",
                    "user-login-failed-unknown-department-invitation" => "Login som administrator mislykkedes - afdelingsinvitationen er ukendt",

                    "login_dialog_user_login_no_access_to_organizer" => "Hovsa du har ikke adgang...",
                    "user_login_no_access_to_organizer" => "Hovsa - du har ikke adgang til denne arrangør. ... men du er administrator på ALT_ORGANIZER_NAME.",
                    "login_dialog_goto_url" => "Klik her for at gå derhen",

                    /* HEADER */
					"event_list" => "OVERSIGT",
                    "tab_membersignup" => "MEDLEMSTILMELDING",
                    "tab_payment" => "BETALING",


                    /* EVENT LIST & EVENT DETAILS */
					"no_events_header" => "Ingen aktive events",
					"no_events_text" => "Der er ingen aktive events at vise lige nu.",
					"participants" => "deltager(e)",
					"button_buy_tickets-flexbillet" => "KØB BILLETTER",
					"button_buy_tickets-flextilmeld" => "TILMELDING",
					"button_more_info" => "MERE INFO",
					"price_from" => "Fra",
					"event_time" => "Tidspunkt: ",
					"share_event" => "Del arrangementet på de sociale medier:",
					"fee" => "gebyr",

					"few_tickets" => "FÅ BILLETTER",
					"sold_out" => "UDSOLGT",
					"registration_not_open" => "IKKE ÅBEN",
					"registration_closed" => "REGISTRERING SLUT",
					"registration_opens" => "ÅBNER ",
					"registration_start" => "Registrering starter",
					"registration_end" => "Registrering slutter",
					"details_contact_organizer" => "Kontakt arrangør",
					"no_participants_yet" => "Der er ingen registrerede deltagere endnu...",
					"cancellation_until" => "Afmelding mulig frem til ",

					"edit_in_manager_button_text" => "ADMINISTRER EVENT",

					/* FILTERS */
					"filter_name_category" => "Kategori",
					"filter_name_availability" => "Tilgængelighed",
					"filter_name_date_range" => "Datointerval",
					"filter_placeholder_all_events" => "Alle events",
					"filter_placeholder_available_tickets" => "Ledige billetter",
					"filter_placeholder_all" => "Alle",
					"filter_placeholder_start_date" => "Start dato",					
					"filter_placeholder_end_date" => "Slut dato",
					"filter_datepicker_locale" => "da-DK",		
					"filter_clear_filters_label" => "Ryd filtre",	
					
					/* Queue System Messaging */
					"connecting_to_queue" => "Opretter forbindelse til kø-system.",
					"in_queue_header_please_wait" => "Vent venligst...",
					"in_queue" => "Du er placeret i kø og vil inden længe få mulighed for at gennemføre din tilmelding / dit billetkøb. Hold dig orienteret om din position i køen nedenfor og undlad at genindlæse siden, da dette vil placere dig bagest i køen!",
					"queue_position" => "Kø-position: ",
					"queue_messages" => "Beskeder:",

					"queue_error_error1" => "Fejl:",
					"queue_error_error2" => "Der er desværre opstået en fejl, og du er ikke længere i kø. Indlæs venligst siden igen ved tryk på [F5]. Fejlbeskrivelse: ",
					"queue_error_exit1" => "Fejl: forbindelse afbrudt.",
					"queue_error_exit2" => "Der er desværre opstået en fejl, og du er ikke længere i kø. Indlæs venligst siden igen ved tryk på [F5].",
					"queue_error_timeexceeded1" => "Fejl: forbindelse ikke etableret.",
					"queue_error_timeexceeded2" => "Din forbindelse til køsystemet kunne ikke oprettes indenfor den tilladte tid. Prøv igen: tryk [F5] for at genindlæse siden.",

					"queue_systemdown_header" => "Systemet opdateres!",
					"queue_systemdown_text1" => "Systemet er lukket ned pga. opdateringer, og du kan således ikke gennemføre din tilmelding eller dit billetkøb lige nu. Vi beklager ulejligheden. Processen forventes at tage endnu ca. ",
					"queue_systemdown_text2" => " minutter. Hvis du bliver på denne side, vil du automatisk blive sendt videre, når systemet atter er klar.",
					
					/* Team Catalog */
					"teamcatalog_nothing_to_show_header" => "Ingen aktive hold",
					"teamcatalog_nothing_to_show_body" => "Der er ingen aktive hold at vise lige nu.",


                    "membersignup_header" => "Bliv medlem af",
                    "membersignup_become_a_member" => "Tilmeld",
                    "membersignup_list_of_teams" => "Vis liste af hold",
					 
					/* Test */
					"testing" => "Testing"
					 
				);	
				
				break;

			case "en":
				$locals = array(
					 "undefined" => "Undefined!",
					
					/* MENU */
					"menu_contact_organizer" => "CONTACT ORGANIZER",
					"menu_contact_flexminds" => "CONTACT FLEXBILLET",
					"menu_login" => "ORGANIZER LOGIN",
					"menu_logout" => "LOGOUT",
					"menu_eventlist" => "SHOW EVENTS",
					"menu_admin" => "ORGANIZER TOOLS",
                    "menu_sitelogin" => "ORGANIZER LOGIN (SITE)",
					"menu_problem" => "REPORT A BUG",
					
					/* MODAL DIALOGS */
					"flexminds_contact_title" => "Flexbillet",
					"flexminds_contact_body" => "<p><b>Flexbillet.dk is operated by:</b></p><p>Flexbillet ApS<br>Sindalsvej 7<br>8240 Risskov<br>Denmark</p><p><b>Contact us:</b></p><p>Email: support@flexbillet.dk<br>Phone: +45 4422 8888<br>Web: https://flexbillet.dk</p>",
					"flexminds_contact_close" => "CLOSE",
					
					"organizer_contact_title" => "Contact the Organizer",
					"organizer_contact_name" => "Organizer",
					"organizer_contact_contactinformation" => "Contact Information",
					"organizer_contact_phone" => "Phone",
                    "organizer_contact_phone_hours" => "Phone hours",
					"organizer_contact_email" => "Email",
					"organizer_contact_web" => "Web",
					"organizer_contact_body" => "Always contact the organizer if you have questions or problems related to the event. Flexbillet merely provide technical support and can not answer questions about the organizer or its events.",
					"organizer_contact_close" => "CLOSE",
					
					"login_dialog_login_as" => "Login as organizer",
					"login_dialog_cancel" => "CANCEL",
                    "dialog_close" => "CLOSE",

                    "login_dialog_bypass_thirdparty_missing" => "Let me try anyway",

                    "login_minimum_requirements_issue_dialog" => "System requirements are not met",
                    "check_minimum_requirements" => "Click here for help to change the settings",

                    "login_dialog_user_login_failed" => "Login as administrator unsuccessful",
                    "user_login_failed" => "Login as administrator on the given organizer has ended unsuccessful because you do not have access to it. Please contact the administrator of the organizer if you should be able to login. You may also have received an email with an administrator invitation that has not been used yet.",

                    "login_dialog_user-login-failed-invitation-resend" => "Login as administrator - administrator invitation sent",
                    "user-login-failed-invitation-resend" => "Login as administrator on the given organizer did not succeed but we have resent an administrator invitation to your email. Please check your email and follow the instructions.",

                    "user-login-failed-unknown-manager-invitation" => "Login as administrator unsuccessful - unknown manager invitation or used already",
                    "user-login-failed-unknown-department-invitation" => "Login as administrator unsuccessful - unknown department invitation",

                    "login_dialog_user_login_no_access_to_organizer" => "Oops, you do not have access...",
                    "user_login_no_access_to_organizer" => "Oops, you do not have access access to this organizer. ... but you are administrator on ALT_ORGANIZER_NAME.",
                    "login_dialog_goto_url" => "Click here to goto url",

                    /* HEADER */
					"event_list" => "OVERVIEW",
					"tab_membersignup" => "MEMBER SIGNUP",
                    "tab_payment" => "PAYMENT",
					
					/* EVENT LIST & EVENT DETAILS */
					"no_events_header" => "No active events",
					"no_events_text" => "There are no active events to show right now.",
					"participants" => "participant(s)",
					"button_buy_tickets-flexbillet" => "BUY TICKETS",
					"button_buy_tickets-flextilmeld" => "REGISTRATION",
					"button_more_info" => "MORE INFO",
					"price_from" => "From",
					"event_time" => "Time: ",
					"share_event" => "Share the event on social media:",
					"fee" => "fee",
					
					"few_tickets" => "FEW TICKETS",
					"sold_out" => "SOLD OUT",
					"registration_not_open" => "NOT OPEN",
					"registration_closed" => "REGISTRATION ENDED",
					"registration_opens" => "OPENS ",
					"registration_start" => "Registration starts",
					"registration_end" => "Registration ends",
					"details_contact_organizer" => "Contact Organizer",
					"no_participants_yet" => "No participants have been registered as of yet...",
					"cancellation_until" => "Cancellation possible until ",

                    "edit_in_manager_button_text" => "EDIT EVENT",
					
					/* FILTERS */
					"filter_name_category" => "Category",
					"filter_name_availability" => "Availability",
					"filter_name_date_range" => "Date range",
					"filter_placeholder_all_events" => "All events",
					"filter_placeholder_available_tickets" => "Available tickets",					
					"filter_placeholder_all" => "All",
					"filter_placeholder_start_date" => "Start date",					
					"filter_placeholder_end_date" => "End date",					
					"filter_datepicker_locale" => "en-EN",
					"filter_clear_filters_label" => "Clear filters",						
					
					/* Queue System Messaging */
					"connecting_to_queue" => "Connecting to queue system.",
					"in_queue_header_please_wait" => "Please wait...",
					"in_queue" => "You have been placed in queue. Shortly you will be able to complete your sign-up / ticket purchase. Note your queue position below and avoid refreshing the page as this will place you at the very tail end of the queue!",
					"queue_position" => "Queue Position: ",
					"queue_messages" => "Messages:",

					"queue_error_error1" => "Error:",
					"queue_error_error2" => "An error has occured, unfortunately, and you are no longer in queue. Please reload the page bt pressing [F5]. Error description: ",
					"queue_error_exit1" => "Error: Connection failed.",
					"queue_error_exit2" => "An error has occured, unfortunately, and you are no longer in queue. Please reload the page by pressing [F5].",
					"queue_error_timeexceeded1" => "Error: Connection could not be established.",
					"queue_error_timeexceeded2" => "A connection to the queue system could not be established within the allowed amount of time. Please try again; press [F5] to reload the page.",

					"queue_systemdown_header" => "The system is down for maintenance!",
					"queue_systemdown_text1" => "The system has been shut down for maintenance, and you can not currently complete your purchase. We apologize for any inconvenience. The process is expected to take yet another ",
					"queue_systemdown_text2" => " minutes. If you remain on this page, you will automatically be redirected to complete your purchase as soon as the system is online again.",

					/* Team Catalog */
					"teamcatalog_nothing_to_show_header" => "No Active Teams",
					"teamcatalog_nothing_to_show_body" => "There are currently no active teams to show.",

                    "membersignup_header" => "Become a member of",
                    "membersignup_become_a_member" => "Signup",
                    "membersignup_list_of_teams" => "Show list of teams",

					 /* Test */
					 "testing" => "Testing"
					);	
				
				break;
		}
		
		$localizedString = $locals[ $key ];
		
		if( $localizedString == null || $localizedString == "" ) {
			$localizedString = "Key not defined: $key";
		}
		
		return $localizedString;			 
	}
?>