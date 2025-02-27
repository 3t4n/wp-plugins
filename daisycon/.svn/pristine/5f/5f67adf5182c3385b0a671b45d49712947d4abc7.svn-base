<?php
/* Daisycon prijsvergelijkers
 * File: vacation.php
 *
 * View for the shorttags to be displayed on the website
 *
 */

class generalDaisyconVacation
{
	public static function adminDaisyconVacation()
	{
		// Load files
		wp_enqueue_style('daisycon.css', esc_url(plugins_url('../assets/css/daisycon.css', __FILE__)));
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/jquery-3.5.1.min.js', __FILE__)) . "\"></script>";
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/daisycon.js', __FILE__)) . "\"></script>";

		// Define base settings
		$base = [
			'buttonText'                                => 'Bekijken',
			'color_in_primary'                          => '#ffffff',
			'color_in_secondary'                        => '#ffffff',
			'color_primary'                             => '#3498DB',
			'color_secondary'                           => '#FF8201',
			'color_text_primary'                        => '#626262',
			'color_text_secondary'                      => '#888888',
			'filter_accommodation_type_value'           => [],
			'filter_departure_city_value'               => [],
			'filter_destination_city_value'             => [],
			'filter_destination_country_value'          => [],
			'filter_destination_region_value'           => [],
			'filter_lowest_price'                       => [],
			'filter_lowest_price_max'                   => [],
			'filter_lowest_price_min'                   => [],
			'filter_program_id_value'                   => [],
			'filter_star_rating'                        => [],
			'filter_star_rating_max'                    => [],
			'filter_star_rating_min'                    => [],
			'filter_travel_transportation_type_value'   => [],
			'language'                                  => 'nl',
			'limit'                                     => '50',
			'profile_id'                                => (false === empty($_POST['profile_id']) ? sanitize_text_field($_POST['profile_id']) : ''),
			'show_filters'                              => ['yes'],
			'tool_name'                                 => 'vacation',
		];

		// Check if settings were submitted
		if (false === empty($_POST['dc_submit']))
		{
			$updateSettings = generalDaisyconSettings::updateSettings($base['profile_id'],
				[
					'button_text'                               => [],
					'color_in_primary'                          => [],
					'color_in_secondary'                        => [],
					'color_primary'                             => [],
					'color_secondary'                           => [],
					'color_text_primary'                        => [],
					'color_text_secondary'                      => [],
					'filter_accommodation_type_value'           => [],
					'filter_departure_city_value'               => [],
					'filter_destination_city_value'             => [],
					'filter_destination_country_value'          => [],
					'filter_destination_region_value'           => [],
					'filter_lowest_price'                       => [],
					'filter_lowest_price_max'                   => [],
					'filter_lowest_price_min'                   => [],
					'filter_program_id_value'                   => [],
					'filter_star_rating'                        => [],
					'filter_star_rating_max'                    => [],
					'filter_star_rating_min'                    => [],
					'filter_travel_transportation_type_value'   => [],
					'language'                                  => [],
					'limit'                                     => [],
					'media_id_custom'                           => [],
					'show_filters'                              => [],
					'sub_id'                                    => [],
				]
			);
		}

		// If profile has been loaded, then extra loads are required
		if (false === empty($base['profile_id']))
		{
			// Load settings
			$settings = generalDaisyconSettings::generateToolSettings($base['profile_id']);

			// Check (default) settings
			$settings['language'] = false === empty($settings['language']) ? $settings['language'] : $base['language'];
			$settings['limit'] = false === empty($settings['limit']) ? $settings['limit'] : $base['limit'];
			$settings['show_filters'] = false === empty($settings['show_filters']) ? $settings['show_filters'] : $base['show_filters'];
			$settings['filter_accommodation_type_value'] = false === empty($settings['filter_accommodation_type_value']) ? $settings['filter_accommodation_type_value'] : $base['filter_accommodation_type_value'];
			$settings['filter_departure_city_value'] = false === empty($settings['filter_departure_city_value']) ? $settings['filter_departure_city_value'] : $base['filter_departure_city_value'];
			$settings['filter_destination_city_value'] = false === empty($settings['filter_destination_city_value']) ? $settings['filter_destination_city_value'] : $base['filter_destination_city_value'];
			$settings['filter_destination_country_value'] = false === empty($settings['filter_destination_country_value']) ? $settings['filter_destination_country_value'] : $base['filter_destination_country_value'];
			$settings['filter_program_id_value'] = false === empty($settings['filter_program_id_value']) ? $settings['filter_program_id_value'] : $base['filter_program_id_value'];
			$settings['filter_destination_region_value'] = false === empty($settings['filter_destination_region_value']) ? $settings['filter_destination_region_value'] : $base['filter_destination_region_value'];
			$settings['filter_lowest_price'] = false === empty($settings['filter_lowest_price']) ? $settings['filter_lowest_price'] : $base['filter_lowest_price'];
			$settings['filter_lowest_price_max'] = false === empty($settings['filter_lowest_price_max']) ? $settings['filter_lowest_price_max'] : $base['filter_lowest_price_max'];
			$settings['filter_lowest_price_min'] = false === empty($settings['filter_lowest_price_min']) ? $settings['filter_lowest_price_min'] : $base['filter_lowest_price_min'];
			$settings['filter_star_rating'] = false === empty($settings['filter_star_rating']) ? $settings['filter_star_rating'] : $base['filter_star_rating'];
			$settings['filter_star_rating_max'] = false === empty($settings['filter_star_rating_max']) ? $settings['filter_star_rating_max'] : $base['filter_star_rating_max'];
			$settings['filter_star_rating_min'] = false === empty($settings['filter_star_rating_min']) ? $settings['filter_star_rating_min'] : $base['filter_star_rating_min'];
			$settings['filter_travel_transportation_type_value'] = false === empty($settings['filter_travel_transportation_type_value']) ? $settings['filter_travel_transportation_type_value'] : $base['filter_travel_transportation_type_value'];

			echo "<script type=\"text/javascript\">						
						loadData();
						
						function loadData ()
						{
							var currentAccommodationType        = $('#filter_accommodation_type').val();
							var currentDepartureCity            = $('#filter_departure_city').val();
							var currentDestinationCity          = $('#filter_destination_city').val();
							var currentDestinationCountry       = $('#filter_destination_country').val();
							var currentProgramId                = $('#filter_program_id').val();
							var currentDestinationRegion        = $('#filter_destination_region').val();
							var currentLowestPriceMax           = $('#filter_lowest_price_max').val();
							var currentLowestPriceMin           = $('#filter_lowest_price_min').val();
							var currentStarRatingMax            = $('#filter_star_rating_max').val();
							var currentStarRatingMin            = $('#filter_star_rating_min').val();
							var currentTravelTransportationType = $('#filter_travel_transportation_type').val();
							
							var savedAccommodationType        = '" . (false === empty($settings['filter_accommodation_type_value']) ? $settings['filter_accommodation_type_value'] : '') . "';
							var savedDepartureCity            = '" . (false === empty($settings['filter_departure_city_value']) ? $settings['filter_departure_city_value'] : '') . "';
							var savedDestinationCity          = '" . (false === empty($settings['filter_destination_city_value']) ? $settings['filter_destination_city_value'] : '') . "';
							var savedDestinationCountry       = '" . (false === empty($settings['filter_destination_country_value']) ? $settings['filter_destination_country_value'] : '') . "';
							var savedProgramId                = '" . (false === empty($settings['filter_program_id_value']) ? $settings['filter_program_id_value'] : '') . "';
							var savedDestinationRegion        = '" . (false === empty($settings['filter_destination_region_value']) ? $settings['filter_destination_region_value'] : '') . "';
							var savedLowestPriceMax           = '" . (false === empty($settings['filter_lowest_price_max']) ? $settings['filter_lowest_price_max'] : '5000') . "';
							var savedLowestPriceMin           = '" . (false === empty($settings['filter_lowest_price_min']) || true === isset($settings['filter_lowest_price_min']) && '0' === $settings['filter_lowest_price_min'] ? $settings['filter_lowest_price_min'] : '0') . "';
							var savedStarRatingMax            = '" . (false === empty($settings['filter_star_rating_max']) ? $settings['filter_star_rating_max'] : '5') . "';
							var savedStarRatingMin            = '" . (false === empty($settings['filter_star_rating_min']) || true === isset($settings['filter_star_rating_min']) && '0' === $settings['filter_star_rating_min'] ? $settings['filter_star_rating_min'] : '0') . "';
							var savedTravelTransportationType = '" . (false === empty($settings['filter_travel_transportation_type_value']) ? $settings['filter_travel_transportation_type_value'] : '') . "';
							
							var accommodationType        = currentAccommodationType ?? savedAccommodationType;
							var departureCity            = currentDepartureCity ?? savedDepartureCity;
							var destinationCity          = currentDestinationCity ?? savedDestinationCity;
							var destinationCountry       = currentDestinationCountry ?? savedDestinationCountry;
							var programId                = currentProgramId ?? savedProgramId;
							var destinationRegion        = currentDestinationRegion ?? savedDestinationRegion;
							var lowestPriceMax           = currentLowestPriceMax ?? savedLowestPriceMax;
							var lowestPriceMin           = currentLowestPriceMin ?? savedLowestPriceMin;
							var starRatingMax            = currentStarRatingMax ?? savedStarRatingMax;
							var starRatingMin            = currentStarRatingMin ?? savedStarRatingMin;
							var travelTransportationType = currentTravelTransportationType ?? savedTravelTransportationType;

							lowestPriceMax = (5000 >= lowestPriceMax ? lowestPriceMax : 5000);
							starRatingMax  = (5 >= starRatingMax ? starRatingMax : '5');

							let extraUrl = '';

							extraUrl += (0 < accommodationType.length ? '&filter[accommodation_type]=' + accommodationType : '');
							extraUrl += (0 < departureCity.length ? '&filter[departure_city]=' + departureCity : '');					
							extraUrl += (0 < destinationCity.length ? '&filter[destination_city]=' + destinationCity : '');
							extraUrl += (0 < destinationCountry.length ? '&filter[destination_country]=' + destinationCountry : '');
							extraUrl += (0 < programId.length ? '&filter[program_id]=' + programId : '');
							extraUrl += (0 < destinationRegion.length ? '&filter[destination_region]=' + destinationRegion : '');
							extraUrl += (0 < lowestPriceMax.length ? '&filter[lowest_price][lte]=' + lowestPriceMax : '');
							extraUrl += (0 < lowestPriceMin.length ? '&filter[lowest_price][gte]=' + lowestPriceMin : '');
							extraUrl += (0 < starRatingMax.length ? '&filter[star_rating][lte]=' + starRatingMax : '');
							extraUrl += (0 < starRatingMin.length ? '&filter[star_rating][gte]=' + starRatingMin : '');
							extraUrl += (0 < travelTransportationType.length ? '&filter[travel_transportation_type]=' + travelTransportationType : '');
						
							processData(
								{
									url : 'https://daisycon.tools/api/vacation/nl-NL/product-filters?language=" . $settings['language'] . "' + extraUrl,
								}
							).then(function (data) {
								if (undefined !== data) {

									let aggregations = data.aggregations;

									let dataAccommodationType        = aggregations.accommodation_type;
									let dataDepartureCity            = aggregations.departure_city;
									let dataDestinationCity          = aggregations.destination_city;
									let dataDestinationCountry       = aggregations.destination_country;
									let dataProgramId                = aggregations.program_id;
									let dataDestinationRegion        = aggregations.destination_region;
									let dataLowestPrice              = aggregations.lowest_price;
									let dataStarRating               = aggregations.star_rating;
									let dataTravelTransportationType = aggregations.travel_transportation_type;
	
									daisycon_load_select('filter_accommodation_type_value[]', dataAccommodationType, 3, 0, accommodationType);
									daisycon_load_select('filter_departure_city_value[]', dataDepartureCity, 3, 0, departureCity);
									daisycon_load_select('filter_destination_city_value[]', dataDestinationCity, 3, 0, destinationCity);
									daisycon_load_select('filter_destination_country_value[]', dataDestinationCountry, 3, 0, destinationCountry);
									daisycon_load_select('filter_program_id_value[]', dataProgramId, 3, 0, programId);
									daisycon_load_select('filter_destination_region_value[]', dataDestinationRegion, 3, 0, destinationRegion);
									daisycon_load_input('filter_lowest_price_min[]', dataLowestPrice, 'min', lowestPriceMin);
									daisycon_load_input('filter_lowest_price_max[]', dataLowestPrice, 'max', lowestPriceMax);
									daisycon_load_input('filter_star_rating_min[]', dataStarRating, 'min', starRatingMin);
									daisycon_load_input('filter_star_rating_max[]', dataStarRating, 'max', starRatingMax);
									daisycon_load_select('filter_travel_transportation_type_value[]', dataTravelTransportationType, 3, 0, travelTransportationType);
								}
								else {
									alert('De filters kunnen niet worden geladen. Laad uw profiel alstublieft opnieuw of wijzig uw platform en/of taal naar Nederland(s).');
								}
							});
						}
					</script>";
		}

		echo '<div class="dc_box">
				<img class="dc_box_header" src="https://static.daisycon.tools/vacation/presentation/wp-plugin-daisycon-header.png" alt="Vakantievergelijker" />
				<p class="dc_box_description">Daisycon heeft exclusief voor haar publishers een gratis vakantie vergelijker ontwikkeld. Met deze tool kunnen jouw bezoekers hun ideale vakantie vinden. <a href="https://www.daisycon.com/nl/vergelijkers/vakantie-vergelijker/" target="_blank">Klik hier om de demowebsite te bekijken</a>.</p>
				<h1 class="dc_box_title">Instellingen</h1>';

		// Load profile selection
		generalDaisyconSettings::chooseProfile($base);

		// Now load all available settings
		if (false === empty($base['profile_id']))
		{
			echo '<p class="dc_box_description' . (true === empty($updateSettings['message']) ? ' dc_box_description--no_margin' : '') . '">Door de gegevens in te vullen genereert u op een eenvoudige manier onze vergelijker.</p>
							' . (false === empty($updateSettings['message']) ? $updateSettings['message'] : '' ) . '
							<form action="" class="dc_settings" method="POST"/>
								<input type="hidden" name="profile_id" value="' . $base['profile_id'] . '">
								<h2 class="dc_box_subtitle">Algemeen</h2>
								<ul class="dc_list">
									<input type="hidden" name="language" value="nl">
									<!--NOT YET USEFULL<li class="dc_list_item">
										<span class="dc_settings_row_name">Taal *</span>
										<span class="dc_settings_row_value">
											<select name="language">
												<option value="en"' . ('en' === $settings['language'] ? 'selected="selected"' : '') . '>Engels</option>
												<option value="nl"' . ('en' !== $settings['language'] ? 'selected="selected"' : '') . '>Nederlands</option>
											</select>
											<span class="dc_settings_row_value_description">De taal waarin de vergelijker wordt weergegeven.</span>
										</span>
									</li>-->
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Resultaten *</span>
										<span class="dc_settings_row_value">
											<input type="number" name="limit" value="' . $settings['limit'] . '" min="1" max="100">
											<span class="dc_settings_row_value_description">Aantal resultaten wat maximaal in de vergelijker wordt weergegeven (max 100).</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Media ID</span>
										<span class="dc_settings_row_value">
											<input type="text" name="media_id_custom" value="' . $settings['media_id_custom'] . '">
											<span class="dc_settings_row_value_description">
												(optioneel) indien leeg wordt het media id van "Introductie" gebruikt
											</span>
										</span>	
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Sub ID</span>
										<span class="dc_settings_row_value">
											<input type="text" name="sub_id" value="' . $settings['sub_id'] . '">
											<span class="dc_settings_row_value_description">
												(optioneel) <a href="https://faq-publisher.daisycon.com/hc/nl/articles/204894772-Hoe-stel-ik-een-Sub-ID-in-" target="_blank">waarom een sub id</a>?
											</span>
										</span>
									</li>
								</ul>
								<h2 class="dc_box_subtitle">Kleuren</h2>
								<p class="dc_box_subdescription">U kunt de kleuren van de vergelijker aanpassen. Let op, zorg altijd voor voldoende contrast zodat het niet ten koste gaat van de leesbaarheid.</p>
								<ul class="dc_list">
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Primaire kleur</span>
										<span class="dc_settings_row_value">
											<input type="color" name="color_primary" value="' . (false === empty($settings['color_primary']) ? $settings['color_primary'] : $base['color_primary']) . '" data-default="' . $base['color_primary'] . '">
											<input type="button" name="reset_color" class="dc_settings_row_value_reset_color" value="Reset">
											<span class="dc_settings_row_value_description">(optioneel)</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Primaire vul kleur</span>
										<span class="dc_settings_row_value">
											<input type="color" name="color_in_primary" value="' . (false === empty($settings['color_in_primary']) ? $settings['color_in_primary'] : $base['color_in_primary']) . '" data-default="' . $base['color_in_primary'] . '">
											<input type="button" name="reset_color" class="dc_settings_row_value_reset_color" value="Reset">
											<span class="dc_settings_row_value_description">(optioneel)</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Secundaire kleur</span>
										<span class="dc_settings_row_value">
											<input type="color" name="color_secondary" value="' . (false === empty($settings['color_secondary']) ? $settings['color_secondary'] : $base['color_secondary']) . '" data-default="' . $base['color_secondary'] . '">
											<input type="button" name="reset_color" class="dc_settings_row_value_reset_color" value="Reset">
											<span class="dc_settings_row_value_description">(optioneel)</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Secondaire vul kleur</span>
										<span class="dc_settings_row_value">
											<input type="color" name="color_in_secondary" value="' . (false === empty($settings['color_in_secondary']) ? $settings['color_in_secondary'] : $base['color_in_secondary']) . '" data-default="' . $base['color_in_secondary'] . '">
											<input type="button" name="reset_color" class="dc_settings_row_value_reset_color" value="Reset">
											<span class="dc_settings_row_value_description">(optioneel)</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Primaire tekstkleur</span>
										<span class="dc_settings_row_value">
											<input type="color" name="color_text_primary" value="' . (false === empty($settings['color_text_primary']) ? $settings['color_text_primary'] : $base['color_text_primary']) . '" data-default="' . $base['color_text_primary'] . '">
											<input type="button" name="reset_color" class="dc_settings_row_value_reset_color" value="Reset">
											<span class="dc_settings_row_value_description">(optioneel)</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Secundaire tekstkleur</span>
										<span class="dc_settings_row_value">
											<input type="color" name="color_text_secondary" value="' . (false === empty($settings['color_text_secondary']) ? $settings['color_text_secondary'] : $base['color_text_secondary']) . '" data-default="' . $base['color_text_secondary'] . '">
											<input type="button" name="reset_color" class="dc_settings_row_value_reset_color" value="Reset">
											<span class="dc_settings_row_value_description">(optioneel)</span>
										</span>
									</li>
								</ul>							
								<h2 class="dc_box_subtitle">Filters</h2>
								<p class="dc_box_subdescription">U kunt hier filters verbergen, maar ook een voorkeur aangeven voor wat standaard geselecteerd zal zijn.</p>								
								<ul class="dc_list">
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Toon filters</span>
										<span class="dc_settings_row_value">
											<select name="show_filters[]">
												<option value="yes"' . ('yes' === $settings['show_filters'] ? 'selected="selected"' : '') . '>Ja</option>
												<option value="no"' . ('no' === $settings['show_filters'] ? 'selected="selected"' : '') . '>Nee</option>
											</select>
											<span class="dc_settings_row_value_description">(optioneel)</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Land</span>
										<span class="dc_settings_row_value">
											<select name="filter_destination_country_value[]" multiple="multiple" onchange="loadData()" id="filter_destination_country"></select>
											<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Regio</span>
										<span class="dc_settings_row_value">
											<select name="filter_destination_region_value[]" multiple="multiple" onchange="loadData()" id="filter_destination_region"></select>
											<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Stad</span>
										<span class="dc_settings_row_value">
											<select name="filter_destination_city_value[]" multiple="multiple" onchange="loadData()" id="filter_destination_city"></select>
											<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Vervoerstype</span>
										<span class="dc_settings_row_value">
											<select name="filter_travel_transportation_type_value[]" multiple="multiple" onchange="loadData()" id="filter_travel_transportation_type"></select>
											<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Vertrek stad</span>
										<span class="dc_settings_row_value">
											<select name="filter_departure_city_value[]" multiple="multiple" onchange="loadData()" id="filter_departure_city"></select>
											<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Budget</span>
										<span class="dc_settings_row_value">
											<select class="dc_settings_row_value--marginBottom" name="filter_lowest_price">
												<option value="general"' . ('specific' !== $settings['filter_lowest_price'] ? 'selected="selected"' : '') . '>Geen voorkeur</option>
												<option value="specific"' . ('specific' === $settings['filter_lowest_price'] ? 'selected="selected"' : '') . '>Onderstaande range</option>
											</select><br>
											<input type="number" name="filter_lowest_price_min[]" value="" onchange="loadData()" id="filter_lowest_price_min"> t/m <input type="number" name="filter_lowest_price_max[]" value="" onchange="loadData()" id="filter_lowest_price_max">
											<span class="dc_settings_row_value_description">Alleen van toepassing bij keuze "range"</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Type</span>
										<span class="dc_settings_row_value">
											<select name="filter_accommodation_type_value[]" multiple="multiple" onchange="loadData()" id="filter_accommodation_type"></select>
											<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Ster beoordeling</span>
										<span class="dc_settings_row_value">
											<select class="dc_settings_row_value--marginBottom" name="filter_star_rating">
												<option value="general"' . ('specific' !== $settings['filter_star_rating'] ? 'selected="selected"' : '') . '>Geen voorkeur</option>
												<option value="specific"' . ('specific' === $settings['filter_star_rating'] ? 'selected="selected"' : '') . '>Onderstaande range</option>
											</select><br>
											<input type="number" name="filter_star_rating_min[]" value="" onchange="loadData()" id="filter_star_rating_min"> t/m <input type="number" name="filter_star_rating_max[]" value="" onchange="loadData()" id="filter_star_rating_max" max="5">
											<span class="dc_settings_row_value_description">Alleen van toepassing bij keuze "range"</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Aanbieder</span>
										<span class="dc_settings_row_value">
											<select name="filter_program_id_value[]" multiple="multiple" onchange="loadData()" id="filter_program_id"></select>
											<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
										</span>
									</li>
								</ul>
								<input class="dc_settings_button" type="submit" name="dc_submit" id="dc_submit" value="Opslaan">
							</form>
							<h1 class="dc_box_title">Gebruik</h1>
							<p class="dc_box_description">Plak onderstaande shorttag in je blogpost of pagina en de vergelijker verschijnt direct op je website.</p>
							<div class="dc_shorttag" onclick="daisycon_select_all(this)">
								[daisycon_vacation profile_id="' . $base['profile_id'] . '"]
							</div>
							<p class="dc_box_description dc_box_description--no_margin">Succes!</p>';
		}
		echo '</div>';
	}

	public static function frontDaisyconVacation($array)
	{
		// Load settings
		$settings = generalDaisyconSettings::generateToolSettings(false === empty($array['profile_id']) ? $array['profile_id'] : '', $array);

		if (true === empty($settings['media_id']) || false === is_numeric($settings['media_id']))
		{
			return 'Ongeldige media id bij "Introductie". Pas uw media id aan.';
		}

		if (false === empty($settings['media_id_custom']) && false === is_numeric($settings['media_id_custom']))
		{
			return 'Ongeldige media id bij "Vakantie". Pas uw media id aan of maak het veld leeg.';
		}

		// Register files
		wp_register_script('daisycon_vacation_js', 'https://daisycon.tools/vacation/app.js');

		// Add files to head
		wp_enqueue_script('daisycon_vacation_js');

		$configuration = [
			'locale'   => 'nl-NL',
			'language' => $settings['language'],
			'limit'    => (false === empty($settings['limit']) ? intval($settings['limit']) : '100'),
			'mediaId'  => [
				'daisycon' => (int)(false === empty($settings['media_id_custom']) ? $settings['media_id_custom'] : $settings['media_id']),
			],
			'showFilters' => (true === isset($settings['show_filters']) && 'no' === $settings['show_filters'] ? false : true),
		];

		if (false === empty($settings['sub_id']))
		{
			$configuration = array_merge((array)$configuration, (array)['subId' => ['daisycon' => $settings['sub_id']]]);
		}

		if (false === empty($settings['button_text']))
		{
			$configuration = array_merge((array)$configuration, (array)['buttonText' => $settings['button_text']]);
		}

		if (false === empty($settings['color_in_primary']))
		{
			$configuration = array_merge((array)$configuration, (array)['colorInPrimary' => $settings['color_in_primary']]);
		}

		if (false === empty($settings['color_in_secondary']))
		{
			$configuration = array_merge((array)$configuration, (array)['colorInSecondary' => $settings['color_in_secondary']]);
		}

		if (false === empty($settings['color_primary']))
		{
			$configuration = array_merge((array)$configuration, (array)['colorPrimary' => $settings['color_primary']]);
		}

		if (false === empty($settings['color_secondary']))
		{
			$configuration = array_merge((array)$configuration, (array)['colorSecondary' => $settings['color_secondary']]);
		}

		if (false === empty($settings['color_text_primary']))
		{
			$configuration = array_merge((array)$configuration, (array)['colorTextPrimary' => $settings['color_text_primary']]);
		}

		if (false === empty($settings['color_text_secondary']))
		{
			$configuration = array_merge((array)$configuration, (array)['colorTextSecondary' => $settings['color_text_secondary']]);
		}

		if (false === empty($settings['filter_destination_country_value']))
		{
			$configuration['filter']['destinationCountry'] = array_merge((array)$configuration['filter']['destinationCountry'], (array)['value' => explode(',', $settings['filter_destination_country_value'])]);
		}

		if (false === empty($settings['filter_destination_region_value']))
		{
			$configuration['filter']['destinationRegion'] = array_merge((array)$configuration['filter']['destinationRegion'], (array)['value' => explode(',', $settings['filter_destination_region_value'])]);
		}

		if (false === empty($settings['filter_destination_city_value']))
		{
			$configuration['filter']['destinationCity'] = array_merge((array)$configuration['filter']['destinationCity'], (array)['value' => explode(',', $settings['filter_destination_city_value'])]);
		}

		if (false === empty($settings['filter_travel_transportation_type_value']))
		{
			$configuration['filter']['travelTransportationType'] = array_merge((array)$configuration['filter']['travelTransportationType'], (array)['value' => explode(',', $settings['filter_travel_transportation_type_value'])]);
		}

		if (false === empty($settings['filter_departure_city_value']))
		{
			$configuration['filter']['departureCity'] = array_merge((array)$configuration['filter']['departureCity'], (array)['value' => explode(',', $settings['filter_departure_city_value'])]);
		}

		if (false === empty($settings['filter_lowest_price']) && 'specific' === $settings['filter_lowest_price'] && (false === empty($settings['filter_lowest_price_min']) || (isset($settings['filter_lowest_price_min']) && '0' === $settings['filter_lowest_price_min'])) && false === empty($settings['filter_lowest_price_max']))
		{
			$configuration['filter']['lowestPrice'] = array_merge((array)$configuration['filter']['lowestPrice'], (array)[
				'max' => explode(',', $settings['filter_lowest_price_max']),
				'min' => explode(',', $settings['filter_lowest_price_min']),
			]);
		}

		if (false === empty($settings['filter_accommodation_type_value']))
		{
			$configuration['filter']['accommodationType'] = array_merge((array)$configuration['filter']['accommodationType'], (array)['value' => explode(',', $settings['filter_accommodation_type_value'])]);
		}

		if (false === empty($settings['filter_star_rating']) && 'specific' === $settings['filter_star_rating'] && (false === empty($settings['filter_star_rating_min']) || (isset($settings['filter_star_rating_min']) && '0' === $settings['filter_star_rating_min'])) && false === empty($settings['filter_star_rating_max']))
		{
			$configuration['filter']['starRating'] = array_merge((array)$configuration['filter']['starRating'], (array)[
				'max' => explode(',', $settings['filter_star_rating_max']),
				'min' => explode(',', $settings['filter_star_rating_min']),
			]);
		}

		if (false === empty($settings['filter_program_id_value']))
		{
			$configuration['filter']['programId'] = array_merge((array)$configuration['filter']['programId'], (array)['value' => explode(',', $settings['filter_program_id_value'])]);
		}

		return "<div class=\"dc-tool dc-vacation-tool\" data-config='" . str_replace("'", '&339;', json_encode($configuration)) . "'></div>";
	}
}
