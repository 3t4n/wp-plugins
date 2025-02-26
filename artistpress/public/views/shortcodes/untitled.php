





					


		
	
    	// Map Section
		$shortcodeContent .= '<div class="row">';

		// Cache the variables for google maps
        $map_settings = get_option('artistpress_map_settings');
    	sanitize_text_field($map_settings['map_display'] );
    	sanitize_text_field($map_settings['map_directions'] );
    	$startLatLng = null;
        $endLatLng = $artistpress_venue_latlng;
		if ( $map_settings['map_display'] == 'yes' ){
 			$shortcodeContent .= '<div id="venueWrapper" class="venueWrapper">';
	        $shortcodeContent .= '<div id="venueMap">';
			$shortcodeContent .= '<noscript><h3 style="color:red; margin:150px 0 0 250px">Oops. Please activate JavaScript to view this map</h3></noscript>';
	        $shortcodeContent .= '</div>';
	        $shortcodeContent .= '</div>';
			if ( $map_settings['map_directions'] == 'no' ){
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
			$shortcodeContent .= '</div>';
    		$shortcodeContent .= '</div>'; 
    		 
		}