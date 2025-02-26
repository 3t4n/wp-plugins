<?php
/**
 * Defines all functions for the show templates
 *
 * @author      LTDI Studios
 * @package     ArtistPress/public/includes
 * @version     1.0.0
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}        


/**
 *	
 * Creates the Title for the ArtistPress Single Show template
 *
 * @author      LTDI Studios
 * @since       1.0.0
 *
 */
function artistpressShowTitle(){
	$showID     		= get_the_ID();
	$show_meta_data     = get_post_custom($showID);
	$artistID           = unserialize($show_meta_data['artistpress_show_artist'][0]);
	$artistID           = $artistID[0];
	$artistName         = esc_html( get_the_title($artistID) );

	$content  = '<div class="row">';
    $content .= '<h1 class="showTitle">' . $artistName . '</h1>';
    $content .= '</div>';

    echo $content;
}


/**
 *	
 * Creates the Artwork for the ArtistPress Single Show template
 *
 * @author      LTDI Studios
 * @since       1.0.0
 *
 */
function artistpressShowArtwork(){
	$showID     		= get_the_ID();
	$showSettings 		= get_option('artistpress_show_settings');
	$showDisplayArtwork = sanitize_text_field( $showSettings['display_show_artwork'] ); 

	if ( ( $showDisplayArtwork  == 'yes' ) && ( has_post_thumbnail($showID) ) ){

		$content   =  '<div id="artistPhoto" class="artistPhoto">';
		$content  .=  get_the_post_thumbnail($showID);
		$content  .=  '</div>';

		echo $content;
	}
}


/**
 *	
 * Creates the Show Information for the ArtistPress Single Show template
 *
 * @author      LTDI Studios
 * @since       1.0.0
 *
 */
function artistpressShowInformation(){

	$showID                 	= get_the_ID();
	$show_meta_data         	= get_post_custom($showID);
	$showDate               	= esc_html( get_post_meta($showID, 'artistpress_show_date', true) );
	$showTime               	= esc_html( get_post_meta($showID, 'artistpress_show_time', true) );
	$showType               	= esc_html( get_post_meta($showID, 'artistpress_show_type', true) );
	$showPrice              	= esc_html( get_post_meta($showID, 'artistpress_show_price', true) );   
	$showTicketPhone        	= esc_html( get_post_meta($showID, 'artistpress_ticket_phone', true) );
	$showTicketWeb          	= esc_html( get_post_meta($showID, 'artistpress_ticket_url', true) );
	$showAdditionalInfo     	= esc_html( get_post_meta($showID, 'artistpress_show_add_info', true) );   
	
	$venueID            		= unserialize($show_meta_data['artistpress_show_venue'][0]);                              
	$venueID            		= $venueID[0];
	$venueName          		= esc_html( get_the_title($venueID) );
	$venueStreet        		= esc_html( get_post_meta($venueID, 'artistpress_venue_address', true));
	$venueCity          		= esc_html( get_post_meta($venueID, 'artistpress_venue_city', true));
	$venueState         		= esc_html( get_post_meta($venueID, 'artistpress_venue_state', true));
	$venuePostal        		= esc_html( get_post_meta($venueID, 'artistpress_venue_postal_code', true));
	$venueCountry      	 		= esc_html( get_post_meta($venueID, 'artistpress_venue_country', true));
	$venueAddress       		= $venueStreet . '<br>' . $venueCity . ', ' . $venueState . ' ' . $venuePostal;
	$venueWebsite       		= esc_html( get_post_meta($venueID, 'artistpress_venue_website', true));
	$venuePhone         		= esc_html( get_post_meta($venueID, 'artistpress_venue_telephone', true));

	$showSettings 				= get_option('artistpress_show_settings');
	$showListSettings           = get_option('artistpress_show_list_settings');
	$showDisplayDate            = sanitize_text_field( $showSettings['display_show_date'] );     
	$showDisplayTime            = sanitize_text_field( $showSettings['display_show_time'] );    
	$showDisplayType            = sanitize_text_field( $showSettings['display_show_type'] );        
	$showDisplayPrice           = sanitize_text_field( $showSettings['display_show_price'] );         
	$showDisplayTicketPhone     = sanitize_text_field( $showSettings['display_ticket_phone'] );         
	$showDisplayTicketButton    = sanitize_text_field( $showSettings['display_ticket_button'] );
	$showDisplayInfo            = sanitize_text_field( $showSettings['display_additional_info'] );  
	$showTicketButLabel         = sanitize_text_field( $showListSettings['show_ticket_button_label'] );
	$showDisplayVenue           = sanitize_text_field( $showSettings['display_venue'] );
	$showDisplayVenueAddress    = sanitize_text_field( $showSettings['display_venue_address'] );        
	$showDisplayVenuePhone      = sanitize_text_field( $showSettings['display_venue_phone'] ); 
	$showDisplayVenueWebBut     = sanitize_text_field( $showSettings['display_venue_website_button'] );

	/**
	 * Formats the Show Type variable for display.
	 */
	if( $showType == 'not-sure' ) {
	    $showType = 'Not Sure';
	} elseif( $showType == 'all-ages' ) {
	    $showType = 'All Ages';
	} elseif( $showType == 'all-ages-licensed' ) {
	    $showType = 'All Ages Licensed';
	} elseif( $showType == 'no-minors' ) {
	    $showType = 'No Minors';
	} 

	/**
	 * Formats the URL for the Ticket Web Address.
	 */
	if ($showTicketWeb  != NULL){ 
		$showTicketWeb  = trim($showTicketWeb, '/'); 
		if (!preg_match('#^http(s)?://#', $showTicketWeb)) {
		    $showTicketWeb = 'http://' . $showTicketWeb;
		}
	}

	/**
	 * Formats the URL for the Venue Web Address.
	 */
	if ($venueWebsite != NULL){ 
	    if (!preg_match('#^http(s)?://#', $venueWebsite)) {
	        $venueWebsite   = 'http://' . $venueWebsite ;
	    }
	}
	
	$content    = '<div id="showInfo" class="showInfo">';
	$content   .= '<div class="row">';
	
	$content   .= '<div class="showDetails">';
    $content   .= '<h2>Show Details</h2>';
    $content   .= '<ul>';
        if ( ( $showDisplayDate  == 'yes' ) && ( $showDate != NULL) ){ 
        	$content   .= '<li>Date: ' . $showDate . '</li>'; 
        }
        if ( ( $showDisplayTime  == 'yes' ) && ( $showTime != NULL) ){ 
        	$content   .= '<li>Time: ' . $showTime . '</li>'; 
        }
        if ( ( $showDisplayType   == 'yes' ) && ( $showType != NULL) ){ 
        	$content   .= '<li>Show Type: ' . $showType . '</li>'; 
        }
        if ( ( $showDisplayPrice  == 'yes' ) && ( $showPrice != NULL) ){ 
        	$content   .= '<li>Admission: ' . $showPrice . '</li>';  
        }
        if ( ( $showDisplayTicketPhone == 'yes' ) && ( $showTicketPhone != NULL) ){ 
        	$content   .= '<li>Phone: ' . $showTicketPhone . '</li>'; 
        }
    $content   .= '</ul>';

       
	if ( $showTicketWeb != NULL ){
	    if ( $showDisplayTicketButton == 'yes' ){
            if ( $showTicketButLabel != NULL) {
                $content   .= '<a target="_blank" class="button"" href="'. $showTicketWeb .'">'. $showTicketButLabel .'</a>';
            }else{
                $content   .= '<a target="_blank" class="button"" href="'. $showTicketWeb .'">Get Tickets</a>';
            }
        }
    }

    $content   .= '</div>';
	
	if ($showDisplayVenue == 'yes'){
        $content   .= '<div class="venueDetails">';
        $content   .= '<h2>' . $venueName . '</h2>';
        $content   .= '<ul>';
            if (( $showDisplayVenueAddress == 'yes' ) && ( $venueAddress != NULL ) ){
                $content   .= '<li>' . $venueAddress . '</li>';
            }
            if (( $showDisplayVenuePhone == 'yes' ) && ( $venuePhone != NULL ) ){
                $content   .= '<li>Venue Phone: ' . $venuePhone . '</li>';
            }
        $content   .= '</ul>';

            if (( $showDisplayVenueWebBut == 'yes' ) && ($venueWebsite != NULL) ){
                $content   .= '<a class="button" target="_blank" href="' . $venueWebsite . '">Venue Website</a>'; 
            }
        $content   .= '</div>';
    }

	$content   .= '</div>';
	
	if ($showDisplayInfo == 'yes'){
        $content   .= '<div class="row">';
        $content   .= '<div class="showAdInfo">';
            if ($showAdditionalInfo  != NULL){ 
                $content   .= '<h2>Additional Info:</h2>';
                $content   .= '<span>' . $showAdditionalInfo . '</span>';
            }
        $content   .= '</div>';
        $content   .= '</div>';
    }
	
	$content   .= '</div>';

	echo $content;
}


/**
 *	
 * Creates the Map for the ArtistPress Single Show template
 *
 * @author      LTDI Studios
 * @since       1.0.0
 *
 */
function artistpressShowMap(){

	$showSettings = get_option('artistpress_show_settings');
	$showDisplayMap = sanitize_text_field($showSettings['map_display'] );
	$showDisplayDirections	= sanitize_text_field($showSettings['map_directions'] );

	$showID                     = get_the_ID();
	$show_meta_data             = get_post_custom($showID);
	$venueID                    = unserialize($show_meta_data['artistpress_show_venue'][0]);                              
	$venueID                    = $venueID[0];
	$artistpress_venue_latlng   = esc_html( get_post_meta($venueID, 'artistpress_venue_latlng', true));
	$artistpress_venue_latlng   = substr($artistpress_venue_latlng, 1, -1);
	$startLatLng = null;
	$endLatLng = $artistpress_venue_latlng;

	if ( $showDisplayMap == 'yes' ){

		$content    = '<div id="venueWrapper" class="venueWrapper">';
		$content   .= '<div id="venueMap">';
		$content   .= '<noscript><h3 style="color:red; margin:150px 0 0 250px">Oops. Please activate JavaScript to view this map</h3></noscript>';
		$content   .= '</div>';
		$content   .= '</div>';   

		if ( $showDisplayDirections == 'no' ){
		$content   .= '<div id="venueDirection" class="venueDirection" style="display: none;">';
		}else{
		$content   .= '<div id="venueDirection" class="venueDirection" style="display: block;">';
		}
		$content   .= '<h3>Get Directions</h3>';
		$content   .= '<form>';
		$content   .= '<label for="start">Your Location:</label></br>'; 
		$content   .= '<input id="start" type="text" value="' . $startLatLng . '" size="60" maxlength="150" />';
		$content   .= '<input id="end"   type="hidden" value="' . $endLatLng . '" size="60" maxlength="150" /></br>';
		$content   .= '<input type="button" class="submit" value="Find Directions!" onclick="calcRoute()"/>';
		$content   .= '</form>';
		$content   .= '<div id="venueDirections"></div>';
		$content   .= '</div>';

	
	echo $content;
	}
	

}


/**
 *	
 * Creates the List of Shows for the ArtistPress Show Archive template
 *
 * @author      LTDI Studios
 * @since       1.0.0
 *
 */
function artistpressShowListLoop(){

	    $showListSettings       = get_option('artistpress_show_list_settings');
		$showDisplayType        = sanitize_text_field( $showListSettings['show_list_display'] );
		$showDisplayOrder       = sanitize_text_field( $showListSettings['show_list_order'] );
        $showDisplayArtistName  = sanitize_text_field( $showListSettings['display_show_artist'] );
        $showDisplayVenueName   = sanitize_text_field( $showListSettings['display_show_venue'] );
        $showDisplayTicketBut   = sanitize_text_field( $showListSettings['display_ticket_button'] );
        $showTicketButLabel     = sanitize_text_field( $showListSettings['show_ticket_button_label'] );
        $showDisplayInfoBut     = sanitize_text_field( $showListSettings['display_info_button'] );
        $showInfoButLabel       = sanitize_text_field( $showListSettings['show_info_button_label'] );
        $showListUseStyles      = sanitize_text_field( $showListSettings['show_list_use_stylesheet'] );
        $showListUseShortcode   = sanitize_text_field( $showListSettings['show_list_use_shortcode'] );
		$content   				= NULL;
		$current_meta_value 	= NULL;

		if ( $showDisplayType == 'show_date') {
			$show_meta_key = 'artistpress_show_date';

		}elseif( $showDisplayType == 'show_venue' ){
			$show_meta_key = 'artistpress_show_venue_name';

		}elseif( $showDisplayType == 'show_artist' ){
			$show_meta_key = 'artistpress_show_artist_name';
		}
		
		$args = array(
                'post_type' => 'show',               
                'meta_key'  => $show_meta_key,
                'orderby'   => 'meta_value',
                'order'     => $showDisplayOrder,
                'posts_per_page' => -1,
        );
        $shows = new WP_Query( $args ); ?>

		<?php if ( $shows->have_posts() ) : ?>
        <?php while ( $shows->have_posts() ) : $shows->the_post(); ?>
		
			<?php

				$showID             = get_the_ID();
	            $show_meta_data     = get_post_custom($showID);
	            $showDate           = esc_html( get_post_meta($showID, 'artistpress_show_date', true) );
	            $showTicketWeb      = esc_html( get_post_meta($showID, 'artistpress_ticket_url', true) );
	            
	            if ( $showTicketWeb != NULL ){
	                $showTicketWeb  = trim($showTicketWeb, '/'); 
	                
	                if (!preg_match('#^http(s)?://#', $showTicketWeb)) {
	                    $showTicketWeb = 'http://' . $showTicketWeb . 's';
	                }
	            }
				$artistID           = unserialize($show_meta_data['artistpress_show_artist'][0]);
				$venueID            = unserialize($show_meta_data['artistpress_show_venue'][0]);                              
				$artistID           = $artistID[0];
				$artistName         = esc_html( get_the_title($artistID) );
				$artistPermalink    = get_the_permalink($artistID);

				$venueID            = $venueID[0];
				$venueName          = esc_html( get_the_title($venueID) );
				$venuePermalink     = get_the_permalink($venueID);
				$venueStreet        = esc_html( get_post_meta($venueID, 'artistpress_venue_address', true));
				$venueCity          = esc_html( get_post_meta($venueID, 'artistpress_venue_city', true));
				$venueState         = esc_html( get_post_meta($venueID, 'artistpress_venue_state', true));
				$venuePostal        = esc_html( get_post_meta($venueID, 'artistpress_venue_postal_code', true));
				$venueCountry       = esc_html( get_post_meta($venueID, 'artistpress_venue_country', true));
				$venueWebsite       = esc_html( get_post_meta($venueID, 'artistpress_venue_website', true));
				$venuePhone         = esc_html( get_post_meta($venueID, 'artistpress_venue_telephone', true));
				$venueAddress       = $venueStreet . '<br>' . $venueCity . ', ' . $venueState . ' ' . $venuePostal;

				if ($showDisplayType == 'show_date'){
	                if ($showDate != $current_meta_value){
	                    $content  .= '<h3>' . $showDate . '</h3>';
	                }
	            } elseif ($showDisplayType == 'show_venue'){
	                if ($venueID != $current_meta_value){
	                    $content  .= '<h3>' . $venueName . '</h3>';
	                }
	            } elseif ($showDisplayType == 'show_artist'){
	                if ($artistID != $current_meta_value){
	                    $content  .= '<h3>' . $artistName . '</h3>';
	                }
	            }

				$content  .= '<article id="show-' . $showID . '" class="show">';

				if ($showDisplayType == 'show_date'){
                        if ($showDate != $current_meta_value){
                            $content  .= '<div class="showHeader">';
                            if(  $showDisplayArtistName == 'yes' ) {
                                $content  .= '<div class="artist">Artist</div>';
                            }
                            if( $showDisplayVenueName == 'yes' ) {
                                $content  .= '<div class="venue">Venue</div>';
                            }
                            $content  .= '<div class="city">City</div>';
                            $content  .= '</div>';
                        }
                    } elseif ($showDisplayType == 'show_venue'){
                        if ($venueID != $current_meta_value){
                            $content  .= '<div class="showHeader">';
                            $content  .= '<div class="date">Date</div>';
                            if(  $showDisplayArtistName == 'yes' ) {
                                $content  .= '<div class="artist">Artist</div>';
                            }
                            $content  .= '<div class="city">City</div>';
                            $content  .= '</div>';
                        }
                    } elseif ($showDisplayType == 'show_artist'){
                        if ($artistID != $current_meta_value){
                            $content  .= '<div class="showHeader">';
                            $content  .= '<div class="date">Date</div>';
                            if( $showDisplayVenueName == 'yes' ) {
                                $content  .= '<div class="venue">Venue</div>';
                            }
                            $content  .= '<div class="city">City</div>';
                            $content  .= '</div>';
                        }
                    }
                    
				$content .= '<div class="showBody">';

				if ($showDisplayType  == 'show_date'){
					if ( $showDisplayArtistName == 'yes' ){
						$content .= '<div class="artist">' . $artistName . '</div>';
					}
					if ( $showDisplayVenueName == 'yes' ) {
						$content .= '<div class="venue">' . $venueName . '</div>';
					}
					$content .= '<div class="city">' . $venueCity . ', ' . $venueState . '</div>';

				} elseif ($showDisplayType  == 'show_venue'){
					$content .= '<div class="date">' . $showDate . '</div>';
					if(  $showDisplayArtistName == 'yes' ){
						$content .= '<div class="artist">' . $artistName . '</div>';
					}
					$content .= '<div class="city">' . $venueCity . ', ' . $venueState . '</div>';

				} elseif ($showDisplayType  == 'show_artist'){
					$content .= '<div class="date">' . $showDate . '</div>';
					if ( $showDisplayVenueName == 'yes' ) {
						$content .= '<div class="venue">' . $venueName . '</div>';
					}
					$content .= '<div class="city">' . $venueCity . ', ' . $venueState . '</div>';
				}

				if ( $showDisplayInfoBut == 'yes' ){
					$content .= '<div class="info">';
					if ( $showInfoButLabel  ){
						$content .= '<a class="button" href="'. get_the_permalink() .'">'. $showInfoButLabel .'</a>';
					}else{
						$content .= '<a class="button" href="'. get_the_permalink() .'">Additional Info</a>';
					}
					$content .= '</div>';
				}

				if ( $showDisplayTicketBut == 'yes' ){
					if ( $showTicketWeb != NULL ){
						$content .= '<div class="tickets">';
						if ( $showTicketButLabel){
							$content .= '<a target="_blank" class="button"" href="'. $showTicketWeb .'">'. $showTicketButLabel .'</a>';
						}else{
							$content .= '<a target="_blank" class="button"" href="'. $showTicketWeb .'">Get Tickets</a>';
						}
						$content .= '</div>';
					}
				}
				
				$content .= '</div>';

				if ( $showDisplayType == 'show_date' ){
                    $current_meta_value = $showDate;
                } elseif ( $showDisplayType == 'show_venue' ){
                    $current_meta_value = $venueID;
                } elseif ( $showDisplayType  == 'show_artist'){
                    $current_meta_value = $artistID;
                }
				
				
				$content  .= '</article>';
			
			?>
		
		<?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <p><?php _e( 'Sorry, No Shows Have Been Scheduled.' ); ?></p>
        <?php endif; ?>
		
		<?php

		echo $content;

}

?>