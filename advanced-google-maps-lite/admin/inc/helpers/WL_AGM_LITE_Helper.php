<?php
defined( 'ABSPATH' ) or die();

if( !class_exists('WL_AGM_LITE_Helper')) {

	class WL_AGM_LITE_Helper {
	
		const GOOGLE_API_URL = 'https://maps.googleapis.com/maps/api/js';
	
		/* Get plugin current version */
		public static function get_plugin_version() {
			$plugin_data    = get_plugin_data( WL_AGM_LITE_PLUGIN_FILE );
			$plugin_version = $plugin_data['Version'];
	
			return $plugin_version;
		}
	
		
	
		/* Select Map Language on Settings Page */
		public static function map_language_select() {
			$save_settings = get_option( 'wl_agm_settings_data' ); ?>
			<script>
				jQuery('#wl_agm_gmap_lang').val(
					'<?php echo esc_attr($save_settings['wl_agm_gmap_lang']); ?>'
				);
			</script>
			<?php 
		}
	
		/* Admin End google map box for Location Cpt */
		public static function get_location_autocomplete_script( $post_id ) {
			query_posts( 'p=' . $post_id . '&post_type=wl_agm_locations' );
			while ( have_posts() ): the_post();
				$lat  = get_post_meta( get_the_ID(), 'location_lat', true );
				$long = get_post_meta( get_the_ID(), 'location_long', true );
			endwhile;
			wp_reset_query(); ?>
			<script type="text/javascript">
				var placeSearch, autocomplete;
				var componentForm = {
					locality: 'long_name',
					administrative_area_level_1: 'long_name',
					country: 'long_name',
					postal_code: 'short_name'
				};

				function initAutocomplete() {
					<?php if ( ! empty ( $lat ) && ! empty ( $long ) ) { ?>
					var map = new google.maps.Map(document.getElementById('map_admin'), {
						center: {
							lat: <?php echo esc_attr($lat); ?> ,
							lng: <?php echo esc_attr($long); ?>
						},
						zoom: 14,
						mapTypeId: 'roadmap'
					});
					marker = new google.maps.Marker({
						draggable: false,
						animation: google.maps.Animation.BOUNCE,
						position: {
							lat: <?php echo esc_attr($lat); ?> ,
							lng: <?php echo esc_attr($long); ?>
						},
						map: map,
					});
					<?php } else { ?>
					var map = new google.maps.Map(document.getElementById('map_admin'), {
						center: {
							lat: -33.8688,
							lng: 151.2195
						},
						zoom: 12,
						mapTypeId: 'roadmap'
					});
					<?php } ?>

					/* Create the search box and link it to the UI element. */
					var input = document.getElementById('map_search');
					var searchBox = new google.maps.places.SearchBox(input);
					map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

					/* Bias the SearchBox results towards current map's viewport. */
					map.addListener('bounds_changed', function() {
						searchBox.setBounds(map.getBounds());
					});

					var markers = [];
					/* Listen for the event fired when the user selects a prediction and retrieve */
					/* more details for that place. */
					searchBox.addListener('places_changed', function() {
						var places = searchBox.getPlaces();

						if (places.length == 0) {
							return;
						}

						/* Clear out the old markers. */
						markers.forEach(function(marker) {
							marker.setMap(null);
						});
						markers = [];

						/* For each place, get the icon, name and location. */
						var bounds = new google.maps.LatLngBounds();
						places.forEach(function(place) {
							if (!place.geometry) {
								return;
							}
							var icon = {
								url: place.icon,
								size: new google.maps.Size(71, 71),
								origin: new google.maps.Point(0, 0),
								anchor: new google.maps.Point(17, 34),
								scaledSize: new google.maps.Size(25, 25)
							};

							/* Create a marker for each place. */
							markers.push(new google.maps.Marker({
								map: map,
								icon: icon,
								title: place.name,
								position: place.geometry.location
							}));

							if (place.geometry.viewport) {
								/* Only geocodes have viewport. */
								var map_id = bounds.union(place.geometry.viewport);
								console.log(place);
								jQuery('#location_address').val(place.formatted_address);
								jQuery('#map_id_admin').val(place.geometry.location);
								jQuery('#location_lat').val(place.geometry.location.lat());
								jQuery('#location_long').val(place.geometry.location.lng());
							} else {
								bounds.extend(place.geometry.location);
							}
						});
						var map_id1 = map.fitBounds(bounds);
					});


					autocomplete = new google.maps.places.Autocomplete(
						/** @type {!HTMLInputElement} */
						(document.getElementById('map_search')), {
							types: ['geocode']
						});

					/* When the user selects an address from the dropdown, populate the address */
					/* fields in the form. */
					autocomplete.addListener('place_changed', fillInAddress);

					function fillInAddress() {
						/* Get the place details from the autocomplete object. */
						var place = autocomplete.getPlace();

						for (var component in componentForm) {
							document.getElementById(component).value = '';
							document.getElementById(component).disabled = false;
						}

						/* Get each component of the address from the place details */
						/* and fill the corresponding field on the form. */
						for (var i = 0; i < place.address_components.length; i++) {
							var addressType = place.address_components[i].types[0];
							if (componentForm[addressType]) {
								var val = place.address_components[i][componentForm[addressType]];
								document.getElementById(addressType).value = val;
							}
						}

					}

				}
			</script><?php 
		}
	
	
		/* Google AutoComplete Url Request for location maps */
		public static function google_auto_complete_url_request() {
			$save_settings = get_option( 'wl_agm_settings_data' ); ?>
			<script
				src="<?php echo self::GOOGLE_API_URL; ?>?key=<?php echo esc_attr($save_settings['wl_agm_gmap_api']); ?>&libraries=places&callback=initAutocomplete&language=<?php echo esc_attr($save_settings['wl_agm_gmap_lang']); ?>"
				async defer></script><?php 
		}
	
		/* Google AutoComplete Url Request for route maps */
		public static function google_auto_complete_url_request_route() {
			$save_settings = get_option( 'wl_agm_settings_data' ); ?>
			<script src="<?php echo self::GOOGLE_API_URL; ?>?key=<?php echo esc_attr($save_settings['wl_agm_gmap_api']); ?>&libraries=places&callback=initMaproute&language=initAutocomplete&language=<?php echo esc_attr($save_settings['wl_agm_gmap_lang']); ?>" async defer></script><?php 
		}
	
		/* Google map script for Location shortcode */
		public static function google_script_location() {
			$save_settings = get_option( 'wl_agm_settings_data' ); ?>
			<script
				src="<?php echo self::GOOGLE_API_URL; ?>?key=<?php echo esc_attr($save_settings['wl_agm_gmap_api']); ?>&callback=initMap&language=initAutocomplete&language=<?php echo esc_attr($save_settings['wl_agm_gmap_lang']); ?>"
				async defer></script><?php 
		}
	
		/* Map Language Associative array */
		public static function get_map_language_option_array() {
			return array(
				"en"    => 'ENGLISH',
				"ar"    => 'ARABIC',
				"eu"    => 'BASQUE',
				"bg"    => 'BULGARIAN',
				"bn"    => 'BENGALI',
				"ca"    => 'CATALAN',
				"cs"    => 'CZECH',
				"da"    => 'DANISH',
				"de"    => 'GERMAN',
				"el"    => 'GREEK',
				"en-AU" => 'ENGLISH (AUSTRALIAN)',
				"en-GB" => 'ENGLISH (GREAT BRITAIN)',
				"es"    => 'FARSI',
				"fi"    => 'FINNISH',
				"fil"   => 'FILIPINO',
				"fr"    => 'FRENCH',
				"gl"    => 'GALICIAN',
				"gu"    => 'GUJARATI',
				"hi"    => 'HINDI',
				"hu"    => 'HUNGARIAN',
				"id"    => 'INDONESIAN',
				"it"    => 'ITALIAN',
				"iw"    => 'HEBREW',
				"ja"    => 'JAPANESE',
				"kn"    => 'KANNADA',
				"ko"    => 'KOREAN',
				"lt"    => 'LITHUANIAN',
				"lv"    => 'LATVIAN',
				"ml"    => 'MALAYALAM',
				"mr"    => 'MARATHI',
				"nl"    => 'DUTCH',
				"no"    => 'NORWEGIAN',
				"pl"    => 'POLISH',
				"pt"    => 'PORTUGUESE',
				"pt-BR" => 'PORTUGUESE (BRAZIL)',
				"pt-PT" => 'PORTUGUESE (PORTUGAL)',
				"ro"    => 'ROMANIAN',
				"ru"    => 'RUSSIAN',
				"sk"    => 'SLOVAK',
				"sl"    => 'SLOVENIAN',
				"sr"    => 'SERBIAN',
				"sv"    => 'SWEDISH',
				"tl"    => 'TAGALOG',
				"ta"    => 'TAMIL',
				"te"    => 'TELUGU',
				"th"    => 'THAI',
				"tr"    => 'TURKISH',
				"uk"    => 'UKRAINIAN',
				"vi"    => 'VIETNAMESE',
				"zh-CN" => 'CHINESE (SIMPLIFIED)',
				"zh-TW" => 'CHINESE (TRADITIONAL)',
			);
		}
	
		/* Location marker animation array */
		public static function get_location_marker_animation() {
			return array(
				"BOUNCE" => 'Bounce',
				"DROP"   => 'Drop',
			);
		}
	
		/* Map Style Themes array */
		public static function get_map_style_theme() {
			return array(
				"silver"    => 'Silver',
				"retro"     => 'Retro',
				"dark"      => 'Dark',
				"night"     => 'Night',
				"aubergine" => 'Aubergine',
				"standard"  => 'Standard',
			);
		}
	
		/* Stroke Opacity array */
		public static function get_stroke_opacity() {
			return array( '1', '0.9', '0.8', '0.7', '0.6', '0.5', '0.4', '0.3', '0.2', '0.1' );
		}
	
		/* Unit system array */
		public static function get_unit_system() {
			return array( "METRIC", 'IMPERIAL' );
		}
	
		/* Map Type array */
		public static function get_map_type() {
			return array(
				"roadmap"   => esc_html__( 'ROADMAP', WL_AGM_LITE_DOMAIN ),
				"satellite" => esc_html__( 'SATELLITE', WL_AGM_LITE_DOMAIN ),
				"hybrid"    => esc_html__( 'HYBRID', WL_AGM_LITE_DOMAIN ),
				"terrain"   => esc_html__( 'TERRAIN', WL_AGM_LITE_DOMAIN ),
			);
		}
	
		/* Interactive Map's Continents */
		public static function get_continents() {
			return array(
				"002" => esc_html__( 'Africa', WL_AGM_LITE_DOMAIN ),
				"019" => esc_html__( 'Americas', WL_AGM_LITE_DOMAIN ),
				"142" => esc_html__( 'Asia', WL_AGM_LITE_DOMAIN ),
				"150" => esc_html__( 'Europe', WL_AGM_LITE_DOMAIN ),
				"009" => esc_html__( 'Oceania', WL_AGM_LITE_DOMAIN ),
			);
		}
	
		/* Interactive Map's Resolutions */
		public static function get_region_resolution() {
			return array( "countries", "provinces", "metros" );
		}
	
		/* Interactive Map's Display Modes */
		public static function get_map_display_mode() {
			return array( "regions", "markers", "text" );
		}
	
		/* Get Last Updated Day and Time */
		public static function get_last_updated_time( $post_type ) {
			$latest = new WP_Query(
				array(
					'post_type'      => $post_type,
					'post_status'    => 'publish',
					'posts_per_page' => 1,
					'orderby'        => 'modified',
					'order'          => 'DESC'
				)
			);
			if ( $latest->have_posts() ) {
				$modified_date = $latest->posts[0]->post_modified;
				$timestamp     = strtotime( $modified_date );
	
				return $new_date_format = date( 'd M Y,  H:i A', $timestamp );
			}
		}
	
	
		public static function location_cpt_select_options($post_id) {
			// Make sure the $post_id is valid and non-empty
			if (empty($post_id)) {
				return;
			}
		
			// Perform the query to get the post
			query_posts('p=' . $post_id . '&post_type=wl_agm_locations');
		
			// Check if there are posts returned by the query
			if (have_posts()) {
				?>
				<script>
				<?php
				// Loop through the posts
				while (have_posts()): the_post();
					// Retrieve post meta data safely
					$location_marker_ani = get_post_meta(get_the_ID(), 'location_marker_ani', true);
					$location_style_theme = get_post_meta(get_the_ID(), 'location_style_theme', true);
					$location_onclick = get_post_meta(get_the_ID(), 'location_onclick', true);
					$map_zoom_level = get_post_meta(get_the_ID(), 'map_zoom_level', true);
					$loc_map_type = get_post_meta(get_the_ID(), 'loc_map_type', true);
		
					// Safely assign values to JavaScript if they exist
					if (!empty($location_marker_ani)) {
						echo "jQuery('#location_marker_ani').val('" . esc_attr($location_marker_ani) . "');";
					}
		
					if (!empty($loc_map_type)) {
						echo "jQuery('#loc_map_type').val('" . esc_attr($loc_map_type) . "');";
					}
		
					if (!empty($location_style_theme)) {
						echo "jQuery('#location_style_theme').val('" . esc_attr($location_style_theme) . "');";
					}
		
					if (!empty($map_zoom_level)) {
						echo "jQuery('#map_zoom_level').val('" . esc_attr($map_zoom_level) . "');";
					}
		
					// If $location_onclick is 'info_url', hide the redirect info div
					if (!empty($location_onclick) && $location_onclick == 'info_url') {
						echo esc_js("jQuery(document).ready(function () { document.getElementById('redirect_info_div').style.display = 'none'; });");
					}
		
				endwhile;
				?>
				</script>
				<?php
			}
		
			// Reset query to clean up after custom query
			wp_reset_query();
		}
			
		
public static function location_url_redirect( $post_id ) {
    query_posts( 'p=' . $post_id . '&post_type=wl_agm_locations' ); 
    while ( have_posts() ): the_post();
        $location_onclick  = get_post_meta( get_the_ID(), 'location_onclick', true );
        $location_redirect = get_post_meta( get_the_ID(), 'location_redirect', true );
        if ( $location_onclick == 'info_win' ) { ?>
            <style>
                #redirect_input_div {
                    display: none;
                }
            </style> <?php 
        }
        if ( empty( $location_redirect ) ) {
            echo "<script>jQuery(document).ready(function () { document.getElementById('redirect_input_div').style.display = 'none'; });</script>";
        }
    endwhile;
    wp_reset_query();  
}
		/* Route Cpt Metabox Select Field Helper */
		public static function route_cpt_select_options( $post_id ) {
			query_posts( 'p=' . $post_id . '&post_type=wl_agm_routes' ); ?>
			<script>
				<?php while ( have_posts() ): the_post();
							$r_stroke_typ    = get_post_meta( get_the_ID(), 'r_stroke_typ', true );
							$r_storke_weight = get_post_meta( get_the_ID(), 'r_storke_weight', true );
							$r_unit_system   = get_post_meta( get_the_ID(), 'r_unit_system', true );
							$r_style_theme   = get_post_meta( get_the_ID(), 'r_style_theme', true );
							?>
				jQuery('#r_stroke_typ').val('<?php echo esc_attr($r_stroke_typ); ?>');
				jQuery('#r_storke_weight').val('<?php echo esc_attr($r_storke_weight); ?>');
				jQuery('#r_unit_system').val('<?php echo esc_attr($r_unit_system); ?>');
				jQuery('#r_style_theme').val('<?php echo esc_attr($r_style_theme); ?>');
				<?php endwhile; wp_reset_query(); ?>
			</script><?php 
		}
	
		/* Map Cpt Metabox Select Field Helper */
		public static function map_cpt_select_options_one( $post_id ) {
			query_posts( 'p=' . $post_id . '&post_type=wl_agm_maps' ); ?>
			<script>
				<?php while ( have_posts() ): the_post();
							$map_zoom_level = get_post_meta( get_the_ID(), 'map_zoom_level', true );
							$map_type       = get_post_meta( get_the_ID(), 'map_type', true );
							$map_theme      = get_post_meta( get_the_ID(), 'map_theme', true );
							?>
				jQuery('#map_zoom_level').val('<?php echo esc_attr($map_zoom_level); ?>');
				jQuery('#map_type').val('<?php echo esc_attr($map_type); ?>');
				jQuery('#map_theme').val('<?php echo esc_attr($map_theme); ?>');
				<?php endwhile; wp_reset_query(); ?>
			</script><?php 
		}
	
		/* Map Cpt Metabox Select Field Helper for map's Control options */
		public static function map_cpt_select_options_two( $post_id ) {
			query_posts( 'p=' . $post_id . '&post_type=wl_agm_maps' ); ?>
			<script>
				<?php while ( have_posts() ): the_post();
							$info_win_custom = get_post_meta( get_the_ID(), 'info_win_custom', true );
							if ( ! empty ( $info_win_custom ) ) {
								echo esc_js(" jQuery(document).ready(function () { jQuery('#info_window_custom_controls').show(); }); ");
							}
							endwhile; wp_reset_query(); ?>
			</script>
			<?php 
		}
	
		public static function get_lat_long_by_address($value, $address) {
			$prepAddr = str_replace(' ', '+', $address);
			$save_settings = get_option('wl_agm_settings_data');
			
			// Fetch the geocode data from the API
			$response = wp_remote_get('https://maps.google.com/maps/api/geocode/json?key=' . esc_attr($save_settings['wl_agm_gmap_api']) . '&address=' . esc_attr($prepAddr) . '&sensor=false');
			
			// Check for request errors
			if (is_wp_error($response)) {
				error_log('API request error: ' . $response->get_error_message());
				return null; // or handle error as appropriate
			}
		
			// Retrieve the body of the response
			$geocode = wp_remote_retrieve_body($response);
		
			// Check if the response body is false
			if ($geocode === false) {
				error_log('Failed to retrieve the response body.');
				return null; // or handle error as appropriate
			}
		
			// Decode the JSON response
			$output = json_decode($geocode);
		
			// Check if decoding was successful and if results are available
			if (isset($output->results[0]->geometry->location)) {
				if ($value == 'lat') {
					return $output->results[0]->geometry->location->lat;
				} elseif ($value == 'long') {
					return $output->results[0]->geometry->location->lng;
				}
			} else {
				// Log or handle cases where the results or location is not available
				error_log('Unexpected API response format: ' . print_r($output, true));
				return null; // or handle error as appropriate
			}
		}
		
	
		/* Get Interactive Map's elements */
		public static function get_map_elements_data( $post_id ) {
			$regions_arr = array();
			$args        = array( 'post_type' => 'wl_agm_inter_maps', 'post__in' => array( $post_id ) );
			$the_query   = new WP_Query( $args );
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ): $the_query->the_post();
					$saved_data_arr = get_post_meta( get_the_ID(), 'saved_data_arr', true );
					$arr            = json_decode( $saved_data_arr );
					if ( ! empty ( $arr ) ) {
						$size_data = sizeof( $arr );
						for ( $i = 0; $i < $size_data; $i ++ ) {
							$single_arr = [
								$arr[ $i ]->region,
								$arr[ $i ]->tooltip_value,
								$arr[ $i ]->click_value,
								$arr[ $i ]->color
							];
							array_push( $regions_arr, $single_arr );
						}
					}
				endwhile;
			}
			wp_reset_postdata();
	
			return $regions_arr;
		}
	
		/* Get Selected Locations for Map */
		public static function get_multiple_location_for_map( $post_id ) {
			query_posts( 'p=' . $post_id . '&post_type=wl_agm_maps' );
			while ( have_posts() ): the_post();
				$selected_locations = get_post_meta( get_the_ID(), 'selected_locations', true );
				$way_locations_str  = str_replace( [ '[', ']', '"' ], ' ', $selected_locations );
				$way_locations_arr  = ( explode( ",", $way_locations_str ) );
			endwhile;
			wp_reset_query();
	
			$locations = array();
			$args      = array( 'post_type' => 'wl_agm_locations', 'post__in' => $way_locations_arr );
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ): $the_query->the_post();
					$location_address    = get_post_meta( get_the_ID(), 'location_address', true );
					$location_lat        = get_post_meta( get_the_ID(), 'location_lat', true );
					$location_long       = get_post_meta( get_the_ID(), 'location_long', true );
					$location_marker_img = get_post_meta( get_the_ID(), 'location_marker_img', true );
					$location_info_win   = get_post_meta( get_the_ID(), 'location_info_win', true );
					$location_image      = get_post_meta( get_the_ID(), 'location_image', true );
					$single_arr          = [
						get_the_title(),
						$location_lat,
						$location_long,
						$location_marker_img,
						$location_address,
						$location_image,
						$location_info_win
					];
					array_push( $locations, $single_arr );
				endwhile;
			}
			wp_reset_postdata();
	
			return $locations;
		}
	
		/* Interactive Map's Cpt Metabox Select Field Helper */
		public static function interactive_cpt_select_options( $post_id ) {
			query_posts( 'p=' . $post_id . '&post_type=wl_agm_inter_maps' ); ?>
				<script>
					<?php while ( have_posts() ): the_post();
								$map_continents = get_post_meta( get_the_ID(), 'map_continents', true );
								$map_subcontinents = get_post_meta( get_the_ID(), 'map_subcontinents', true );
								$map_country = get_post_meta( get_the_ID(), 'map_country', true );
								$map_resolution = get_post_meta( get_the_ID(), 'map_resolution', true );
								$map_display_mode = get_post_meta( get_the_ID(), 'map_display_mode', true );
								?>
					jQuery('#map_continents').val('<?php echo esc_attr($map_continents); ?>');
					jQuery('#map_subcontinents').val(
						'<?php echo esc_attr($map_subcontinents); ?>');
					jQuery('#map_country').val('<?php echo esc_attr($map_country); ?>');
					jQuery('#map_resolution').val('<?php echo esc_attr($map_resolution); ?>');
					jQuery('#map_display_mode').val('<?php echo esc_attr($map_display_mode); ?>');

					<?php endwhile; wp_reset_query(); ?>
				</script><?php 
		}
	
		/* Send Location's data to Location shortcode */
		public static function get_location_shortcode_data( $post_id ) {
			$args      = array( 'post_type' => 'wl_agm_locations', 'post__in' => array( $post_id ) );
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ): $the_query->the_post();
	
				$location_map_height   = get_post_meta( get_the_ID(), 'location_map_height', true );
				if ( empty ( $location_map_height ) ) {
					$location_map_height = '600px';
				}
				$location_map_width    = get_post_meta( get_the_ID(), 'location_map_width ', true );
				if ( empty ( $location_map_width ) ) {
					$location_map_width = '100%';
				}
				$location_address      = get_post_meta( get_the_ID(), 	'location_address', true );
				$location_lat          = get_post_meta( $post_id, 		'location_lat', true );
				$location_long         = get_post_meta( $post_id, 		'location_long', true );
				$location_onclick      = get_post_meta( get_the_ID(), 	'location_onclick', true );
				$location_info_win     = get_post_meta( get_the_ID(), 	'location_info_win', true );
				$location_image        = get_post_meta( get_the_ID(), 	'location_image', true );
				$location_disable_info = get_post_meta( get_the_ID(), 	'location_disable_info', true );
				$location_marker_ani   = get_post_meta( get_the_ID(), 	'location_marker_ani', true );
				$location_style_theme  = get_post_meta( get_the_ID(), 	'location_style_theme', true );
				$location_marker_img   = get_post_meta( get_the_ID(), 	'location_marker_img', true );
				$location_redirect     = get_post_meta( get_the_ID(), 	'location_redirect', true );
				$map_zoom_level        = get_post_meta( get_the_ID(), 	'map_zoom_level', true );
				$loc_map_type          = get_post_meta( get_the_ID(), 	'loc_map_type', true );
				$location_id		   = get_the_ID();
				$title                 = get_the_title();

				endwhile;
			}
			wp_reset_query();
	
			// Register the script
			wp_register_script( 'wl_agm_lite_loc_frot', WL_AGM_LITE_PLUGIN_URL. 'public/js/location_frontend.js', null, false);
	
			// Localize the script with new data
			$shortcode_data = array(
				'address'      => $location_address,
				'lat'          => $location_lat,
				'long'         => $location_long,
				'onclick'      => $location_onclick,
				'info_win'     => $location_info_win,
				'image'        => $location_image,
				'disable_info' => $location_disable_info,
				'marker_ani'   => $location_marker_ani,
				'theme'        => $location_style_theme,
				'mrker_img'    => $location_marker_img,
				'redirect'     => $location_redirect,
				'location_id'  => $location_id,
				'wl_title'     => $title,
				'wl_zoom'      => $map_zoom_level,
				'wl_map_type'  => $loc_map_type
	
			);
			wp_localize_script( 'wl_agm_lite_loc_frot', 'wl_agm_lite_loc', $shortcode_data );
	
			// Enqueued script with localized data.
			wp_enqueue_script( 'wl_agm_lite_loc_frot' );
			self::google_script_location();
			wp_register_style( 'wl_agm_lite_loc_frot_style', '' );
			wp_enqueue_style( 'wl_agm_lite_loc_frot_style' );
			$css = '#map-'.esc_attr($location_id).' {';
			$css .= 'height: '.esc_attr( $location_map_height ) .';';
			$css .= 'width: '.esc_attr( $location_map_width ) .'; }';
			wp_add_inline_style( 'wl_agm_lite_loc_frot_style', $css );
		}
	
		/* Send Multi Location's data to Location shortcode */
		public static function get_multi_map_shortcode_data( $post_id ) {
			$args      = array( 'post_type' => 'wl_agm_maps', 'post__in' => array( $post_id ) );
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ): $the_query->the_post();
	
				$map_height      = get_post_meta( get_the_ID(), 'map_height', true );
				$map_height      = ( isset( $map_height ) && ! empty( $map_height ) ) ? $map_height : '500px';
				$map_width       = get_post_meta( get_the_ID(), 'map_width', true );
				$map_width       = ( isset( $map_width ) && ! empty( $map_width ) ) ? $map_width : '100%';
				$map_type        = get_post_meta( get_the_ID(), 'map_type', true );
				$map_theme       = get_post_meta( get_the_ID(), 'map_theme', true );
				$map_lat         = get_post_meta( get_the_ID(), 'center_lat', true );
				$map_long        = get_post_meta( get_the_ID(), 'center_long', true );
				$map_scroll      = get_post_meta( get_the_ID(), 'map_scroll_wheel', true );
				$map_draggable   = get_post_meta( get_the_ID(), 'map_m_draggable', true );
				$map_imagery     = get_post_meta( get_the_ID(), 'map_imagery', true );
				$map_zoom        = get_post_meta( get_the_ID(), 'map_zoom_level', true );
				$back_color      = get_post_meta( get_the_ID(), 'custom_back_color', true );
				$border_radius   = get_post_meta( get_the_ID(), 'custom_border_radius', true );
				$border_color    = get_post_meta( get_the_ID(), 'custom_bg_color', true );
				$custom_width    = get_post_meta( get_the_ID(), 'custom_width_info', true );
				$text_color      = get_post_meta( get_the_ID(), 'custom_text_color', true );
				$location_image  = get_post_meta( get_the_ID(), 'location_image', true );
				$locations       = self::get_multiple_location_for_map( $post_id );
				$size            = sizeof( $locations );
				$map_id          = get_the_ID();
	
				if ( empty ( $back_color ) ) {
					$back_color = '#fff';
				}
				if ( empty ( $border_radius ) ) {
					$border_radius = '4px';
				}
				if ( empty ( $border_color ) ) {
					$border_color = '#fff';
				}
				if ( empty ( $custom_width ) ) {
					$custom_width = '350px';
				}
				if ( empty ( $text_color ) ) {
					$text_color = '#000';
				}
				endwhile;
			}
			wp_reset_query();
	
			// Register the script
			wp_register_script( 'wl_agm_lite_multi_frot', WL_AGM_LITE_PLUGIN_URL. 'public/js/multi_frontend.js');
	
			// Localize the script with new data
			$shortcode_data = array(
				'map_type'       => $map_type,
				'lat'            => $map_lat,
				'long'           => $map_long,
				'theme'          => $map_theme,
				'scroll'         => $map_scroll,
				'draggable'      => $map_draggable,
				'imagnary'       => $map_imagery,
				'zoom'         	 => $map_zoom,
				'wl_size'        => $size,
				'locations'      => $locations,
				'map_id'         => $map_id,
				'location_image' => $location_image,
			);
			wp_localize_script( 'wl_agm_lite_multi_frot', 'wl_agm_lite_multi', $shortcode_data );
	
			// Enqueued script with localized data.
			wp_enqueue_script( 'wl_agm_lite_multi_frot' );
			self::google_script_location();

			wp_register_style( 'wl_agm_lite_multi_front_style', '' );
			wp_enqueue_style( 'wl_agm_lite_multi_front_style' );
			$css = '#map {';
			$css .= 'height: '.esc_attr( $map_height ) .';';
			$css .= 'width: '.esc_attr( $map_width ) .'; } .map-infos {';
			$css .= 'background-color: '.esc_attr( $back_color ) .';';
			$css .= 'width: '.esc_attr( $custom_width ) .';';
			$css .= 'border-radius: '.esc_attr( $border_radius ) .';';
			$css .= 'border: 1px solid '.esc_attr( $border_radius ) .'; } .map-infos p {';
			$css .= 'color: '.esc_attr( $text_color ) .'; }';
			wp_add_inline_style( 'wl_agm_lite_multi_front_style', $css );

		}
	
		/* Send Route Location's data to Location shortcode */
		public static function get_multi_route_shortcode_data( $post_id ) {
			$args      = array( 'post_type' => 'wl_agm_routes', 'post__in' => array( $post_id ) );
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ): $the_query->the_post();
	
				$r_stroke_typ     = get_post_meta( get_the_ID(), 'r_stroke_typ', true );
				$r_storke_weight  = get_post_meta( get_the_ID(), 'r_storke_weight', true );
				$r_unit_system    = get_post_meta( get_the_ID(), 'r_unit_system', true );
				$r_draggable      = get_post_meta( get_the_ID(), 'r_draggable', true );
				$r_start_location = get_post_meta( get_the_ID(), 'r_start_location', true );
				$r_end_location   = get_post_meta( get_the_ID(), 'r_end_location', true );
				$r_map_height     = get_post_meta( get_the_ID(), 'r_map_height', true );
				$r_map_width      = get_post_meta( get_the_ID(), 'r_map_width', true );
				$r_style_theme    = get_post_meta( get_the_ID(), 'r_style_theme', true );
				$r_stroke_color   = get_post_meta( get_the_ID(), 'r_stroke_color', true );
				$r_center         = get_post_meta( get_the_ID(), 'r_center', true );
				$r_center_lat     = self::get_lat_long_by_address( 'lat', $r_center );
				$r_center_long    = self::get_lat_long_by_address( 'long', $r_center );
				$route_type       = get_post_meta( get_the_ID(), 'route_type', true );
				$r_waypoints_ed   = get_post_meta( get_the_ID(), 'r_waypoints_ed', true );
				$map_id           = get_the_ID();
	
				endwhile;
			}
			wp_reset_query();
	
			// Register the script
			wp_register_script( 'wl_agm_lite_route_frot', WL_AGM_LITE_PLUGIN_URL. 'public/js/route_frontend.js', null, false);
	
			// Localize the script with new data
			$shortcode_data = array(
				'stroke_typ'     => $r_stroke_typ, 
				'stroke_weight'  => $r_storke_weight,
				'unit_system'    => $r_unit_system,
				'draggable'      => $r_draggable,
				'start_loc'      => $r_start_location,
				'end_loc'        => $r_end_location,
				'theme'          => $r_style_theme,
				'stroke_color'   => $r_stroke_color,
				'wl_lat' 		 => $r_center_lat,
				'wl_long' 		 => $r_center_long,
				'route_type' 	 => $route_type,
				'r_waypoints_ed' => $r_waypoints_ed,
				'map_id'         => $map_id,
			);
			wp_localize_script( 'wl_agm_lite_route_frot', 'wl_agm_lite_route', $shortcode_data );
	
			// Enqueued script with localized data.
			wp_enqueue_script( 'wl_agm_lite_route_frot' );
			self::google_script_location();

			
			wp_register_style( 'wl_agm_lite_route_front_style', '' );
			wp_enqueue_style( 'wl_agm_lite_route_front_style' );

			$css  = '#route_map-'.esc_attr($map_id).' {';;
			$css .= 'height: 	'. ($r_map_height != ''	) ? esc_attr($r_map_height) 	: esc_attr('500px') .';';
			$css .= 'width: 	'. ($r_map_width != ''	) ? esc_attr($r_map_width) 		: esc_attr('100%') 	.'; }';

			wp_add_inline_style( 'wl_agm_lite_route_front_style', $css );
		 }
		 
	
		/* Send Route Location's data to Location shortcode */
		public static function get_interactive_shortcode_data( $post_id ) {
			$args      = array( 'post_type' => 'wl_agm_inter_maps', 'post__in' => array( $post_id ) );
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ): $the_query->the_post();
	
				$map_width          = get_post_meta( get_the_ID(), 'map_width', true );
				$map_height         = get_post_meta( get_the_ID(), 'map_height', true );
				$map_desc           = get_post_meta( get_the_ID(), 'map_desc', true );
				$map_continents     = get_post_meta( get_the_ID(), 'map_continents', true );
				$map_subcontinents  = get_post_meta( get_the_ID(), 'map_subcontinents', true );
				$map_country        = get_post_meta( get_the_ID(), 'map_country', true );
				$map_resolution     = get_post_meta( get_the_ID(), 'map_resolution', true );
				$bg_color           = get_post_meta( get_the_ID(), 'bg_color', true );
				$dataless_color     = get_post_meta( get_the_ID(), 'dataless_color', true );
				$map_interactivity  = get_post_meta( get_the_ID(), 'map_interactivity', true );
				$map_display_mode   = get_post_meta( get_the_ID(), 'map_display_mode', true );
				$save_settings      = get_option( 'wl_agm_settings_data' );
				$regions_arr        = self::get_map_elements_data( get_the_ID() );
				$size               = sizeof( $regions_arr );
				$map_id             = $post_id;
				$save_settings      = get_option( 'wl_agm_settings_data' );
				$map_api_key        = $save_settings['wl_agm_gmap_api'];
				$map_con_id         = $post_id;
				endwhile;
			}
			wp_reset_query();
	
				if ( empty ( $map_height ) ) {
					$map_height = '500px';
				}
				if ( empty ( $map_width ) ) {
					$map_width = '100%';
				}
				if ( empty ( $bg_color ) ) {
					$bg_color = '#ffffff';
				}
				if ( empty ( $dataless_color ) ) {
					$dataless_color = '#f8bbd0';
				}
	
				if ( ! empty ( $map_continents ) && ! empty ( $map_subcontinents ) && ! empty ( $map_country ) ) {
					$region = $map_country;
				} elseif ( ! empty ( $map_continents ) && ! empty ( $map_subcontinents ) && empty ( $map_country ) ) {
					$region = $map_subcontinents;
				} elseif ( ! empty ( $map_continents ) && empty ( $map_subcontinents ) && empty ( $map_country ) ) {
					$region = $map_continents;
				} elseif ( empty ( $map_continents ) && empty ( $map_subcontinents ) && empty ( $map_country ) ) {
					$region = 'world';
				}
	
				if ( ! empty ( $map_interactivity ) ) {
					$interactivity = 'true';
				} else {
					$interactivity = 'false';
				}
	
				$map_id     = 'map-'.$map_id;
				$regions_data = array();
				$single_arr = [ 'Country', 'Value', 'Tooltip' ];
				array_push( $regions_data, $single_arr );
				for ( $i = 0; $i < $size; $i ++ ) { 
					$single_arr = [
								$regions_arr[ $i ][0],
								$i + 1,
								$regions_arr[ $i ][1]
							];
					array_push( $regions_data, $single_arr );
				}
	
				$color_data = array();
				for ( $i = 0; $i < $size; $i ++ ) { 
					$color_arr = $regions_arr[ $i ][3];
					array_push( $color_data, $color_arr );
				}
	
			// Register the script
			wp_register_script( 'wl_agm_lite_inter_frot', WL_AGM_LITE_PLUGIN_URL . 'public/js/inter_frontend.js' );
	
			// Localize the script with new data
			$shortcode_data = array(
				'region'         => $region, 
				'interactivity'  => $interactivity,
				'dataless_color' => $dataless_color,
				'bg_color'       => $bg_color,
				'resolution'     => $map_resolution,
				'regions_arr'    => $regions_arr,
				'wl_size'        => $size,
				'map_id'         => $map_id,
				'api_key'        => $map_api_key,
				'display_mode'   => $map_display_mode,
				'container_id'   => $map_con_id,
				'regions_data'   => $regions_data,
				'color_data'     => $color_data,
			);
			wp_localize_script( 'wl_agm_lite_inter_frot', 'wl_agm_lite_inter', $shortcode_data );
	
			// Enqueued script with localized data.
			wp_enqueue_script( 'wl_agm_lite_inter_frot' );

			
			
			wp_register_style( 'wl_agm_lite_inter_front_style', '' );
			wp_enqueue_style( 'wl_agm_lite_inter_front_style' );

			$css  = '#map-'.esc_attr($map_id).' {';
			$css .= 'height: 	'.esc_attr($map_height) . ';';
			$css .= 'width: 	'.esc_attr($map_width) . '; }';

			wp_add_inline_style( 'wl_agm_lite_inter_front_style', $css );
 		}
	}

}