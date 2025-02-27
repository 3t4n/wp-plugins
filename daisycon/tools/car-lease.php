<?php
/* Daisycon prijsvergelijkers
 * File: car_lease.php
 *
 * View for the shorttags to be displayed on the website
 *
 */

class generalDaisyconCarLease
{
	public static function adminDaisyconCarLease()
	{
		// Load files
		wp_enqueue_style('daisycon.css', esc_url(plugins_url('../assets/css/daisycon.css', __FILE__)));
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/jquery-3.5.1.min.js', __FILE__)) . "\"></script>";
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/daisycon.js', __FILE__)) . "\"></script>";

		// Define base settings
		$base = [
			'buttonText'               => 'Bekijken',
			'color_in_primary'         => '#ffffff',
			'color_in_secondary'       => '#ffffff',
			'color_primary'            => '#3498DB',
			'color_secondary'          => '#FF8201',
			'color_text_primary'       => '#626262',
			'color_text_secondary'     => '#888888',
			'filter_body_type_value'   => [],
			'filter_brand_value'       => [],
			'filter_program_id_value'  => [],
			'filter_condition_value'   => [],
			'filter_duration'          => [],
			'filter_duration_max'      => '60',
			'filter_duration_min'      => '12',
			'filter_price'             => [],
			'filter_price_max'         => '2000',
			'filter_price_min'         => '0',
			'filter_fuel_type_value'   => [],
			'filter_gear_system_value' => [],
			'filter_lease_type_value'  => [],
			'filter_km_per_year'       => [],
			'filter_km_per_year_max'   => '100000',
			'filter_km_per_year_min'   => '5000',
			'language'                 => 'nl',
			'limit'                    => '50',
			'limit_split'              => '8',
			'profile_id'               => (false === empty($_POST['profile_id']) ? sanitize_text_field($_POST['profile_id']) : ''),
			'show_filters'             => ['yes'],
			'tool_name'                => 'car_lease',
		];

		// Check if settings were submitted
		if (false === empty($_POST['dc_submit']))
		{
			$updateSettings = generalDaisyconSettings::updateSettings($base['profile_id'],
				[
					'button_text'              => [],
					'color_in_primary'         => [],
					'color_in_secondary'       => [],
					'color_primary'            => [],
					'color_secondary'          => [],
					'color_text_primary'       => [],
					'color_text_secondary'     => [],
					'filter_body_type_value'   => [],
					'filter_brand_value'       => [],
					'filter_program_id_value'  => [],
					'filter_condition_value'   => [],
					'filter_duration'          => [],
					'filter_duration_max'      => '',
					'filter_duration_min'      => '',
					'filter_price'             => [],
					'filter_price_max'         => '2000',
					'filter_price_min'         => '0',
					'filter_fuel_type_value'   => [],
					'filter_gear_system_value' => [],
					'filter_lease_type_value'  => [],
					'filter_km_per_year'       => [],
					'filter_km_per_year_max'   => '',
					'filter_km_per_year_min'   => '',
					'language'                 => [],
					'limit'                    => [],
					'limit_split'              => [],
					'media_id_custom'          => [],
					'show_filters'             => [],
					'sub_id'                   => [],
				]
			);
		}

		// If profile has been loaded, then extra loads are required
		if (false === empty($base['profile_id']))
		{
			// Load settings
			$settings = generalDaisyconSettings::generateToolSettings($base['profile_id']);

			echo "<script type=\"text/javascript\">
						processData(
							{
								url : 'https://daisycon.tools/api/car-lease/nl-NL/lease-type?language=nl',
							}
						).then((data) => daisycon_load_select('filter_lease_type_value[]', data, 4, 1, '" . (false === empty($settings['filter_lease_type_value']) ? $settings['filter_lease_type_value'] : '') . "'));

						processData(
							{
								url : 'https://daisycon.tools/api/car-lease/nl-NL/fuel-type?language=nl',
							}
						).then((data) => daisycon_load_select('filter_fuel_type_value[]', data, 4, 1, '" . (false === empty($settings['filter_fuel_type_value']) ? $settings['filter_fuel_type_value'] : '') . "'));

						processData(
							{
								url : 'https://daisycon.tools/api/car-lease/nl-NL/gear-system?language=nl',
							}
						).then((data) => daisycon_load_select('filter_gear_system_value[]', data, 4, 1, '" . (false === empty($settings['filter_gear_system_value']) ? $settings['filter_gear_system_value'] : '') . "'));

						processData(
							{
								url : 'https://daisycon.tools/api/car-lease/nl-NL/condition?language=nl',
							}
						).then((data) => daisycon_load_select('filter_condition_value[]', data, 4, 1, '" . (false === empty($settings['filter_condition_value']) ? $settings['filter_condition_value'] : '') . "'));

						processData(
							{
								url : 'https://daisycon.tools/api/car-lease/nl-NL/body-type?language=nl',
							}
						).then((data) => daisycon_load_select('filter_body_type_value[]', data, 4, 1, '" . (false === empty($settings['filter_body_type_value']) ? $settings['filter_body_type_value'] : '') . "'));

						processData(
							{
								url : 'https://daisycon.tools/api/car-lease/nl-NL/programs?language=nl',
							}
						).then((data) => daisycon_load_select('filter_program_id_value[]', data, 1, 2, '" . (false === empty($settings['filter_program_id_value']) ? $settings['filter_program_id_value'] : '') . "'));

						processData(
							{
								url : 'https://daisycon.tools/api/car-lease/nl-NL/brand?language=nl',
							}
						).then((data) => daisycon_load_select('filter_brand_value[]', data, 4, 1, '" . (false === empty($settings['filter_brand_value']) ? $settings['filter_brand_value'] : '') . "'));
					</script>";
		}

		echo '<div class="dc_box">
				<img class="dc_box_header" src="https://static.daisycon.tools/car-lease/presentation/wp-plugin-daisycon-header.png" alt="Leaseauto vergelijker" />
				<p class="dc_box_description">Daisycon heeft exclusief voor haar publishers een gratis Leaseauto vergelijker ontwikkeld. Met deze tool kunnen jouw bezoekers specificaties en prijzen van leaseauto\'s vergelijken. <a href="https://www.daisycon.com/nl/vergelijkers/lease-auto-vergelijker/" target="_blank">Klik hier om de demowebsite te bekijken</a>.</p>
				<h1 class="dc_box_title">Instellingen</h1>';

		// Load profile selection
		generalDaisyconSettings::chooseProfile($base);

		// Check (default) settings // no $variable ?? $variable yet, due multi php support
		$settings['filter_duration'] = false === empty($settings['filter_duration']) ? $settings['filter_duration'] : $base['filter_duration'];
		$settings['filter_duration_max'] = false === empty($settings['filter_duration_max']) ? $settings['filter_duration_max'] : $base['filter_duration_max'];
		$settings['filter_duration_min'] = false === empty($settings['filter_duration_min']) ? $settings['filter_duration_min'] : $base['filter_duration_min'];
		$settings['filter_price'] = false === empty($settings['filter_price']) ? $settings['filter_price'] : $base['filter_price'];
		$settings['filter_price_max'] = false === empty($settings['filter_price_max']) ? $settings['filter_price_max'] : $base['filter_price_max'];
		$settings['filter_price_min'] = false === empty($settings['filter_price_min']) ? $settings['filter_price_min'] : $base['filter_price_min'];
		$settings['filter_km_per_year'] = false === empty($settings['filter_km_per_year']) ? $settings['filter_km_per_year'] : $base['filter_km_per_year'];
		$settings['filter_km_per_year_max'] = false === empty($settings['filter_km_per_year_max']) ? $settings['filter_km_per_year_max'] : $base['filter_km_per_year_max'];
		$settings['filter_km_per_year_min'] = false === empty($settings['filter_km_per_year_min']) ? $settings['filter_km_per_year_min'] : $base['filter_km_per_year_min'];
		$settings['language'] = false === empty($settings['language']) ? $settings['language'] : $base['language'];
		$settings['limit'] = false === empty($settings['limit']) ? $settings['limit'] : $base['limit'];
		$settings['limit_split'] = false === empty($settings['limit_split']) ? $settings['limit_split'] : $base['limit_split'];
		$settings['show_filters'] = false === empty($settings['show_filters']) ? $settings['show_filters'] : $base['show_filters'];

		// Now load all available settings
		if (false === empty($base['profile_id']))
		{
			echo '<p class="dc_box_description' . (true === empty($updateSettings['message']) ? ' dc_box_description--no_margin' : '') . '">Door de gegevens in te vullen genereert u op een eenvoudige manier onze vergelijker.</p>
							' . (false === empty($updateSettings['message']) ? $updateSettings['message'] : '' ) . '
							<form action="" class="dc_settings" method="POST"/>
								<input type="hidden" name="profile_id" value="' . $base['profile_id'] . '">
								<h2 class="dc_box_subtitle">Algemeen</h2>
								<ul class="dc_list">
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Taal *</span>
										<span class="dc_settings_row_value">
											<select name="language">
												<option value="en"' . ('en' === $settings['language'] ? 'selected="selected"' : '') . '>Engels</option>
												<option value="nl"' . ('en' !== $settings['language'] ? 'selected="selected"' : '') . '>Nederlands</option>
											</select>
											<span class="dc_settings_row_value_description">De taal waarin de vergelijker wordt weergegeven.</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Resultaten *</span>
										<span class="dc_settings_row_value">
											<input type="number" name="limit" value="' . $settings['limit'] . '" min="1" max="100">
											<span class="dc_settings_row_value_description">Aantal resultaten wat maximaal in de vergelijker wordt weergegeven (max 100).</span>
										</span>								
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Resultaten zichtbaar *</span>
										<span class="dc_settings_row_value">
											<input type="number" name="limit_split" value="' . $settings['limit_split'] . '" min="1" max="100">
											<span class="dc_settings_row_value_description">Aantal resultaten wat maximaal tegelijk wordt weergegeven (max 100).</span>
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
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Button tekst</span>
										<span class="dc_settings_row_value">
											<input type="text" name="button_text" placeholder="Bekijken" value="' . $settings['button_text'] . '">
											<span class="dc_settings_row_value_description">(optioneel) hiermee kunt u de tekst op de button aanpassen.</span>
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
									<p class="dc_box_subdescription">U kunt een voorkeur aangeven voor het filter wat standaard geselecteerd is.</p>
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
											<span class="dc_settings_row_name">Lease type</span>
											<span class="dc_settings_row_value">
												<select name="filter_lease_type_value[]" multiple="multiple"></select>
												<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Km per jaar</span>
											<span class="dc_settings_row_value">
												<select class="dc_settings_row_value--marginBottom" name="filter_km_per_year">
													<option value="general"' . ('specific' !== $settings['filter_km_per_year'] ? 'selected="selected"' : '') . '>Geen voorkeur</option>
													<option value="specific"' . ('specific' === $settings['filter_km_per_year'] ? 'selected="selected"' : '') . '>Onderstaande range</option>
												</select><br>
												<input type="number" name="filter_km_per_year_min[]" value="' . (false === empty($settings['filter_km_per_year_min']) || '0' === $settings['filter_km_per_year_min'] ? $settings['filter_km_per_year_min'] : '') . '" min="5000" max="100000"> t/m <input type="number" name="filter_km_per_year_max[]" value="' . (false === empty($settings['filter_km_per_year_max']) ? $settings['filter_km_per_year_max'] : '') . '" min="5000" max="100000">
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Looptijd in maanden</span>
											<span class="dc_settings_row_value">
												<select class="dc_settings_row_value--marginBottom" name="filter_duration">
													<option value="general"' . ('specific' !== $settings['filter_duration'] ? 'selected="selected"' : '') . '>Geen voorkeur</option>
													<option value="specific"' . ('specific' === $settings['filter_duration'] ? 'selected="selected"' : '') . '>Onderstaande range</option>
												</select><br>
												<input type="number" name="filter_duration_min[]" value="' . (false === empty($settings['filter_duration_min']) || '0' === $settings['filter_duration_min'] ? $settings['filter_duration_min'] : '') . '" min="1" max="60"> t/m <input type="number" name="filter_duration_max[]" value="' . (false === empty($settings['filter_duration_max']) ? $settings['filter_duration_max'] : '') . '" min="12" max="60">
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Prijs</span>
											<span class="dc_settings_row_value">
												<select class="dc_settings_row_value--marginBottom" name="filter_price">
													<option value="general"' . ('specific' !== $settings['filter_price'] ? 'selected="selected"' : '') . '>Geen voorkeur</option>
													<option value="specific"' . ('specific' === $settings['filter_price'] ? 'selected="selected"' : '') . '>Onderstaande range</option>
												</select><br>
												<input type="number" name="filter_price_min[]" value="' . (false === empty($settings['filter_price_min']) || '0' === $settings['filter_price_min'] ? $settings['filter_price_min'] : '') . '" min="0" max="2000"> t/m <input type="number" name="filter_price_max[]" value="' . (false === empty($settings['filter_price_max']) ? $settings['filter_price_max'] : '') . '" min="0" max="2000">
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Conditie</span>
											<span class="dc_settings_row_value">
												<select name="filter_condition_value[]" multiple="multiple"></select>
												<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Merk</span>
											<span class="dc_settings_row_value">
												<select name="filter_brand_value[]" multiple="multiple"></select>
												<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Transmissie</span>
											<span class="dc_settings_row_value">
												<select name="filter_gear_system_value[]" multiple="multiple"></select>
												<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Brandstof type</span>
											<span class="dc_settings_row_value">
												<select name="filter_fuel_type_value[]" multiple="multiple"></select>
												<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Carrosserie</span>
											<span class="dc_settings_row_value">
												<select name="filter_body_type_value[]" multiple="multiple"></select>
												<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Aanbieder</span>
											<span class="dc_settings_row_value">
												<select name="filter_program_id_value[]" multiple="multiple"></select>
												<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
											</span>
										</li>
									</ul>
									<input class="dc_settings_button" type="submit" name="dc_submit" id="dc_submit" value="Opslaan">
								</form>
								<h1 class="dc_box_title">Gebruik</h1>
								<p class="dc_box_description">Plak onderstaande shorttag in je blogpost of pagina en de vergelijker verschijnt direct op je website.</p>
								<div class="dc_shorttag" onclick="daisycon_select_all(this)">
									[daisycon_car_lease profile_id="' . $base['profile_id'] . '"]
								</div>
								<p class="dc_box_description dc_box_description--no_margin">Succes!</p>';
		}
		echo '</div>';
	}

	public static function frontDaisyconCarLease($array)
	{
		// Load settings
		$settings = generalDaisyconSettings::generateToolSettings(false === empty($array['profile_id']) ? $array['profile_id'] : '', $array);

		if (true === empty($settings['media_id']) || false === is_numeric($settings['media_id']))
		{
			return 'Ongeldige media id bij "Introductie". Pas uw media id aan.';
		}

		if (false === empty($settings['media_id_custom']) && false === is_numeric($settings['media_id_custom']))
		{
			return 'Ongeldige media id bij "Leaseauto". Pas uw media id aan of maak het veld leeg.';
		}

		// Register files
		wp_register_script('daisycon_car_lease_js', '//daisycon.tools/car-lease/app.js');

		// Add files to head
		wp_enqueue_script('daisycon_car_lease_js');

		$configuration = [
			'mediaId'     => [
				'daisycon' => (int)(false === empty($settings['media_id_custom']) ? $settings['media_id_custom'] : $settings['media_id']),
			],
			'locale'      => 'nl-NL',
			'language'    => $settings['language'],
			'limit'       => (false === empty($settings['limit']) ? intval($settings['limit']) : '100'),
			'limitSplit'  => (false === empty($settings['limit_split']) ? intval($settings['limit_split']) : '100'),
			'filter'      => [
				'kmPerYear'  => [],
				'duration'   => [],
				'price'      => [],
				'fuelType'   => [],
				'leaseType'  => [],
				'gearSystem' => [],
				'condition'  => [],
				'bodyType'   => [],
				'brand'      => [],
				'programId'  => [],
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

		if (false === empty($settings['filter_km_per_year']) && 'specific' === $settings['filter_km_per_year'] && (false === empty($settings['filter_km_per_year_min']) || (isset($settings['filter_km_per_year_min']) && '0' === $settings['filter_km_per_year_min'])) && false === empty($settings['filter_km_per_year_max']))
		{
			$configuration['filter']['kmPerYear'] = array_merge((array)$configuration['filter']['kmPerYear'], (array)[
				'max' => explode(',', $settings['filter_km_per_year_max']),
				'min' => explode(',', $settings['filter_km_per_year_min']),
			]);
		}

		if (false === empty($settings['filter_duration']) && 'specific' === $settings['filter_duration'] && (false === empty($settings['filter_duration_min']) || (isset($settings['filter_duration_min']) && '0' === $settings['filter_duration_min'])) && false === empty($settings['filter_duration_max']))
		{
			$configuration['filter']['duration'] = array_merge((array)$configuration['filter']['duration'], (array)[
				'max' => explode(',', $settings['filter_duration_max']),
				'min' => explode(',', $settings['filter_duration_min']),
			]);
		}

		if (false === empty($settings['filter_price']) && 'specific' === $settings['filter_price'] && (false === empty($settings['filter_price_min']) || (isset($settings['filter_price_min']) && '0' === $settings['filter_price_min'])) && false === empty($settings['filter_price_max']))
		{
			$configuration['filter']['price'] = array_merge((array)$configuration['filter']['price'], (array)[
				'max' => explode(',', $settings['filter_price_max']),
				'min' => explode(',', $settings['filter_price_min']),
			]);
		}

		if (false === empty($settings['filter_fuel_type_value']))
		{
			$configuration['filter']['fuelType'] = array_merge((array)$configuration['filter']['fuelType'], (array)['value' => explode(',', $settings['filter_fuel_type_value'])]);
		}

		if (false === empty($settings['filter_lease_type_value']))
		{
			$configuration['filter']['leaseType'] = array_merge((array)$configuration['filter']['leaseType'], (array)['value' => explode(',', $settings['filter_lease_type_value'])]);
		}

		if (false === empty($settings['filter_gear_system_value']))
		{
			$configuration['filter']['gearSystem'] = array_merge((array)$configuration['filter']['gearSystem'], (array)['value' => explode(',', $settings['filter_gear_system_value'])]);
		}

		if (false === empty($settings['filter_condition_value']))
		{
			$configuration['filter']['condition'] = array_merge((array)$configuration['filter']['condition'], (array)['value' => explode(',', $settings['filter_condition_value'])]);
		}

		if (false === empty($settings['filter_body_type_value']))
		{
			$configuration['filter']['bodyType'] = array_merge((array)$configuration['filter']['bodyType'], (array)['value' => explode(',', $settings['filter_body_type_value'])]);
		}

		if (false === empty($settings['filter_brand_value']))
		{
			$configuration['filter']['brand'] = array_merge((array)$configuration['filter']['brand'], (array)['value' => explode(',', $settings['filter_brand_value'])]);
		}

		if (false === empty($settings['filter_program_id_value']))
		{
			$configuration['filter']['programId'] = array_merge((array)$configuration['filter']['programId'], (array)['value' => explode(',', $settings['filter_program_id_value'])]);
		}

		return "<div class=\"dc-tool dc-car-lease-tool\" data-config='" . str_replace("'", '&339;', json_encode($configuration)) . "'></div>";
	}
}
