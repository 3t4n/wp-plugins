<?php
/**
 * ArtistPress Shortcodes.
 *
 * @package     ArtistPress/views/shortcodes
 * @version     1.0.0
 * @author      LTDI Studios
 * 
 */


function artistpress_show_shortcode($atts){
	
	$showListSettings           = get_option('artistpress_show_list_settings');
	$showTicketButLabel         = sanitize_text_field( $showListSettings['show_ticket_button_label'] );

	$showSettings = get_option('artistpress_show_settings');
	$showDisplayVenue           = sanitize_text_field( $showSettings['display_venue'] );
	$showDisplayVenueAddress    = sanitize_text_field( $showSettings['display_venue_address'] );        
	$showDisplayVenuePhone      = sanitize_text_field( $showSettings['display_venue_phone'] ); 
	$showDisplayVenueWebBut     = sanitize_text_field( $showSettings['display_venue_website_button'] );
	$showDisplayMap 			= sanitize_text_field( $showSettings['map_display'] );
	$showDisplayDirections		= sanitize_text_field( $showSettings['map_directions'] );
	$showDisplayDate            = sanitize_text_field( $showSettings['display_show_date'] );     
	$showDisplayTime            = sanitize_text_field( $showSettings['display_show_time'] );    
	$showDisplayType            = sanitize_text_field( $showSettings['display_show_type'] );        
	$showDisplayPrice           = sanitize_text_field( $showSettings['display_show_price'] );         
	$showDisplayTicketPhone     = sanitize_text_field( $showSettings['display_ticket_phone'] );         
	$showDisplayTicketButton    = sanitize_text_field( $showSettings['display_ticket_button'] );
	$showDisplayInfo            = sanitize_text_field( $showSettings['display_additional_info'] );  
	$showUseStyles 				= sanitize_text_field( $showSettings['show_use_stylesheet'] );
	$apikey 					= sanitize_text_field( $showSettings['artistpress_maps_api']);
	$mapsapi 					= '//maps.googleapis.com/maps/api/js?key=' . $apikey;
	
	if ( ! empty( $apikey ) ) {
        wp_enqueue_script( 'googlemaps' );
        wp_enqueue_script( 'artistpress_direction_js' );
    }

	if ( $showUseStyles == 'yes') {
		wp_enqueue_style( 'show-styles' );
	}

	extract(shortcode_atts(array(
      'id' => NULL,
    ), $atts));


	if (!$id){

		$shortcodeContent = "<p>You need to provide a show ID to the show shortcode to display a show.</p>";

	}else{

		$showID                 = esc_html($id);
		$show_meta_data         = get_post_custom($showID);
		$showDate               = esc_html( get_post_meta($showID, 'artistpress_show_date', true) );
		$showTime               = esc_html( get_post_meta($showID, 'artistpress_show_time', true) );
		$showType               = esc_html( get_post_meta($showID, 'artistpress_show_type', true) ); 
		$showPrice              = esc_html( get_post_meta($showID, 'artistpress_show_price', true) );           
		$showTicketPhone        = esc_html( get_post_meta($showID, 'artistpress_ticket_phone', true) );
		$showTicketWeb          = esc_html( get_post_meta($showID, 'artistpress_ticket_url', true) );
		$showAdditionalInfo     = esc_html( get_post_meta($showID, 'artistpress_show_add_info', true) );

		$artistID           = unserialize($show_meta_data['artistpress_show_artist'][0]);
		$artistID           = $artistID[0];
		$artistName         = esc_html( get_the_title($artistID) );
		$artistPermalink    = get_the_permalink($artistID);
		
		$venueID            = unserialize($show_meta_data['artistpress_show_venue'][0]);                              
		$venueID            = $venueID[0];
		$venueName          = esc_html( get_the_title($venueID) );
		$venueStreet        = esc_html( get_post_meta($venueID, 'artistpress_venue_address', true));
		$venueCity          = esc_html( get_post_meta($venueID, 'artistpress_venue_city', true));
		$venueState         = esc_html( get_post_meta($venueID, 'artistpress_venue_state', true));
		$venuePostal        = esc_html( get_post_meta($venueID, 'artistpress_venue_postal_code', true));
		$venueCountry       = esc_html( get_post_meta($venueID, 'artistpress_venue_country', true));
		$venueWebsite       = esc_html( get_post_meta($venueID, 'artistpress_venue_website', true)); 
		$venueAddress       = $venueStreet . '<br>' . $venueCity . ', ' . $venueState . ' ' . $venuePostal;
		$artistpress_venue_latlng   = esc_html( get_post_meta($venueID, 'artistpress_venue_latlng', true));
		$artistpress_venue_latlng   = substr($artistpress_venue_latlng, 1, -1);
		$venuePhone         = esc_html( get_post_meta($venueID, 'artistpress_venue_telephone', true));
		$startLatLng = null;
		$endLatLng = $artistpress_venue_latlng;

		
	if( $showType == 'not-sure' ) {
	    $showType = 'Not Sure';
	} elseif( $showType == 'all-ages' ) {
	    $showType = 'All Ages';
	} elseif( $showType == 'all-ages-licensed' ) {
	    $showType = 'All Ages Licensed';
	} elseif( $showType == 'no-minors' ) {
	    $showType = 'No Minors';
	} 
	
	if ($showTicketWeb  != NULL){ 
	    //removes the turminating slash off of URL
	    $showTicketWeb  = trim($showTicketWeb, '/'); 

	    if (!preg_match('#^http(s)?://#', $showTicketWeb)) {
	        // If scheme not included, prepend it
	        $showTicketWeb = 'http://' . $showTicketWeb;
	    }
	}
	
	if ($venueWebsite != NULL){ 
	    //removes the turminaing slash off of URL
	    $venueWebsite   = trim($venueWebsite, '/'); 
	    
	    if (!preg_match('#^http(s)?://#', $venueWebsite)) {
	        // If scheme not included, prepend it
	        $venueWebsite   = 'http://' . $venueWebsite ;
	    }
	}

		











		//Show Details
		$shortcodeContent  = '<div id="show-'. $showID .'" class="showBody">';
		

	

		$shortcodeContent .= '<div class="row"><h1 class="showTitle">' . $artistName . '</h1></div>';
		

		$shortcodeContent .= '<div class="row">';

		$shortcodeContent .= '<div id="artistPhoto" class="artistPhoto">';
		$shortcodeContent .=  get_the_post_thumbnail($showID);
		$shortcodeContent .= '</div>';

		$shortcodeContent .= '<div id="showInfo" class="showInfo">';
		$shortcodeContent .= '<div class="row">';

		

		//Show Details
		$shortcodeContent .= '<div class="showDetails">';
		$shortcodeContent .= '<h2>Show Details</h2>';
		$shortcodeContent .= '<ul>';
			if ( ( $showDisplayDate  == 'yes' ) && ( $showDate != NULL) ){ 
	        	$shortcodeContent .= '<li>Date: ' . $showDate . '</li>'; 
	        }
	        if ( ( $showDisplayTime  == 'yes' ) && ( $showTime != NULL) ){ 
	        	$shortcodeContent .= '<li>Time: ' . $showTime . '</li>'; 
	        }
	        if ( ( $showDisplayType   == 'yes' ) && ( $showType != NULL) ){ 
	        	$shortcodeContent .= '<li>Show Type: ' . $showType . '</li>'; 
	        }
	        if ( ( $showDisplayPrice  == 'yes' ) && ( $showPrice != NULL) ){ 
	        	$shortcodeContent .= '<li>Admission: ' . $showPrice . '</li>';  
	        }
	        if ( ( $showDisplayTicketPhone == 'yes' ) && ( $showTicketPhone != NULL) ){ 
	        	$shortcodeContent .= '<li>Phone: ' . $showTicketPhone . '</li>'; 
	        }
		$shortcodeContent .= '</ul>';
			if ( $showDisplayTicketButton == 'yes' ){
	            if ( $showTicketButLabel == !NULL) {
	                $shortcodeContent .= '<a href="'. $showTicketWeb .'" target="_blank" class="button">'. $showTicketButLabel .'</a>';
	            }else{
	                $shortcodeContent .= '<a href="'. $showTicketWeb .'" target="_blank" class="button">Get Tickets</a>';
	            }
	        }
		$shortcodeContent .= '</div><!-- end show details -->';
				
		

		//Venue Details
		$shortcodeContent .= '<div class="venueDetails">';
        $shortcodeContent .= '<h2>' . $venueName . '</h2>';
        $shortcodeContent .= '<ul>';
			if (( $showDisplayVenueAddress == 'yes' ) && ( $venueAddress != NULL ) ){
                $shortcodeContent .=  '<li>' . $venueAddress . '</li>';
            }
            if (( $showDisplayVenuePhone == 'yes' ) && ( $venuePhone != NULL ) ){
                $shortcodeContent .=  '<li>Venue Phone: ' . $venuePhone . '</li>';
            }
		$shortcodeContent .= '</ul>';
			if ($venueWebsite != NULL){ 
		        $shortcodeContent .= '<a class="button" target="_blank" href="' . $venueWebsite . '">Venue Website</a>';
			}
		$shortcodeContent .= '</div><!-- end venue details -->';
				


		//Additional Info
        if ($showDisplayInfo == 'yes'){
	        $shortcodeContent .= '<div class="row">';
	        $shortcodeContent .= '<div class="showAdInfo">';
	            if ($showAdditionalInfo  != NULL){ 
	                $shortcodeContent .= '<h2>Additional Info:</h2>';
	                $shortcodeContent .= '<span>' . $showAdditionalInfo . '</span>';
	            }
	        $shortcodeContent .= '</div>';
	        $shortcodeContent .= '</div>';
    	}
			
			$shortcodeContent .= '</div>';					
			$shortcodeContent .= '</div>';		

		

		// Map Section
		$shortcodeContent .= '<div class="row">';
			
			if ( $showDisplayMap == 'yes' ){

				$shortcodeContent .= '<div id="venueWrapper" class="venueWrapper">';
				$shortcodeContent .= '<div id="venueMap">';
				$shortcodeContent .= '<noscript><h3 style="color:red; margin:150px 0 0 250px">Oops. Please activate JavaScript to view this map</h3></noscript>';
				$shortcodeContent .= '</div>';
				$shortcodeContent .= '</div>';   

				if ( $showDisplayDirections == 'no' ){
					$shortcodeContent .= '<div id="venueDirection" class="venueDirection" style="display: none;">';
				}else{
					$shortcodeContent .= '<div id="venueDirection" class="venueDirection" style="display: block;">';
				}
				$shortcodeContent .= '<h3>Get Directions</h3>';
				$shortcodeContent .= '<form>';
				$shortcodeContent .= '<label for="start">Your Location:</label></br>'; 
				$shortcodeContent .= '<input id="start" type="text" value="' . $startLatLng . '" size="60" maxlength="150" />';
				$shortcodeContent .= '<input id="end"   type="hidden" value="' . $endLatLng . '" size="60" maxlength="150" /></br>';
				$shortcodeContent .= '<input type="button" class="submit" value="Find Directions!" onclick="calcRoute()"/>';
				$shortcodeContent .= '</form>';
				$shortcodeContent .= '<div id="venueDirections"></div>';
				$shortcodeContent .= '</div>';

			}

		$shortcodeContent .= '</div>';



		


		$shortcodeContent .= '</div>';
		$shortcodeContent .= '</div>';












	

	}
	return $shortcodeContent;
}