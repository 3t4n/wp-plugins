<?php
/* Daisycon prijsvergelijkers
 * File: energy_nl.php
 *
 * View for the shorttags to be displayed on the website
 *
 */

class generalDaisyconEnergyNL{

	public static function adminDaisyconEnergyNL()
	{
		// Load files
		wp_enqueue_style('daisycon.css', esc_url(plugins_url('../assets/css/daisycon.css', __FILE__)));
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/jquery-3.5.1.min.js', __FILE__)) . "\"></script>";
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/daisycon.js', __FILE__)) . "\"></script>";

		// Define base settings
		$base = [
			'color_primary'              => '#3498DB',
			'color_secondary'            => '#FF8201',
			'color_text_primary'         => '#626262',
			'color_text_secondary'       => '#888888',
			'discount'                   => [],
			'duration'                   => [],
			'providers'                  => [],
			'sustainability_electricity' => [],
			'sustainability_gas'         => [],
			'tariff_type'                => [],
			'tariff_sort'                => [],
			'limit'                      => '25',
			'limit_split'                => '8',
			'locale'                     => 'nl-NL',
			'profile_id'                 => (false === empty($_POST['profile_id']) ? sanitize_text_field($_POST['profile_id']) : ''),
			'show_filters'               => ['yes'],
			'tool_name'                  => 'energy_nl',
		];

		// Check if settings were submitted
		if (false === empty($_POST['dc_submit']))
		{
			$updateSettings = generalDaisyconSettings::updateSettings($base['profile_id'],
				[
					'button_text'                => [],
					'color_primary'              => [],
					'color_secondary'            => [],
					'color_text_primary'         => [],
					'color_text_secondary'       => [],
					'discount'                   => [],
					'duration'                   => [],
					'providers'                  => [],
					'sustainability_electricity' => [],
					'sustainability_gas'         => [],
					'tariff_type'                => [],
					'tariff_sort'                => [],
					'language'                   => [],
					'limit'                      => [],
					'limit_split'                => [],
					'locale'                     => [],
					'media_id_custom'            => [],
					'show_filters'               => [],
					'sub_id'                     => [],
				]
			);
		}

		// If profile has been loaded, then extra loads are required
		if (false === empty($base['profile_id']))
		{
			// Load settings
			$settings = generalDaisyconSettings::generateToolSettings($base['profile_id']);

			$loadLocale = (false === empty($settings['locale']) ? $settings['locale'] : (false === empty($settings['language']) ? $settings['language'] : 'nl') . '-NL');

			echo "<script type=\"text/javascript\">
						processData(
							{
								url : 'https://daisycon.tools/api/energy/netherlands/" . $loadLocale . "/locale',
							}
						).then((data) => daisycon_load_select('locale', data, 4, 1, '" . $loadLocale . "'));

						processData(
							{
								url : 'https://daisycon.tools/api/energy/netherlands/" . $loadLocale . "/sustainability-electricity',
							}
						).then((data) => daisycon_load_select('sustainability_electricity[]', data, 4, 1, '" . (false === empty($settings['sustainability_electricity']) ? $settings['sustainability_electricity'] : '') . "'));

						processData(
							{
								url : 'https://daisycon.tools/api/energy/netherlands/" . $loadLocale . "/sustainability-gas',
							}
						).then((data) => daisycon_load_select('sustainability_gas[]', data, 4, 1, '" . (false === empty($settings['sustainability_gas']) ? $settings['sustainability_gas'] : '') . "'));

						processData(
							{
								url : 'https://daisycon.tools/api/energy/netherlands/" . $loadLocale . "/tariff-type',
							}
						).then((data) => daisycon_load_select('tariff_type[]', data, 4, 1, '" . (false === empty($settings['tariff_type']) ? $settings['tariff_type'] : '') . "'));

						processData(
							{
								url : 'https://daisycon.tools/api/energy/netherlands/" . $loadLocale . "/tariff-sort',
							}
						).then((data) => daisycon_load_select('tariff_sort[]', data, 4, 1, '" . (false === empty($settings['tariff_sort']) ? $settings['tariff_sort'] : '') . "'));

						processData(
							{
								url : 'https://daisycon.tools/api/energy/netherlands/" . $loadLocale . "/duration',
							}
						).then((data) => daisycon_load_select('duration[]', data, 4, 1, '" . (false === empty($settings['duration']) ? $settings['duration'] : '') . "'));

						processData(
							{
								url : 'https://daisycon.tools/api/energy/netherlands/" . $loadLocale . "/discount',
							}
						).then((data) => daisycon_load_select('discount', data, 4, 1, '" . (false === empty($settings['discount']) ? $settings['discount'] : '') . "'));

						processData(
							{
								url : 'https://daisycon.tools/api/energy/netherlands/" . $loadLocale . "/providers?sort_field=name&sort_direction=asc',
							}
						).then((data) => daisycon_load_select('providers[]', data, 0, 1, '" . (false === empty($settings['providers']) ? $settings['providers'] : '') . "'));

					</script>";
		}

		echo '<div class="dc_box">
				<img class="dc_box_header" src="https://static.daisycon.tools/energy-nl/presentation/wp-plugin-daisycon-header.png" alt="Energievergelijker" />
				<p class="dc_box_description">Daisycon heeft exclusief voor haar publishers een gratis energievergelijker ontwikkeld. De tool is eenvoudig te installeren en stelt de bezoekers van jouw website in staat verschillende energie aanbieders met elkaar te vergelijken. <a href="https://www.daisycon.com/nl/vergelijkers/energievergelijker/" target="_blank">Klik hier om de demowebsite te bekijken</a>.</p>
				<h1 class="dc_box_title">Instellingen</h1>';

			// Load profile selection
			generalDaisyconSettings::chooseProfile($base);

			// Check (default) settings // no $variable ?? $variable yet, due multi php support
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
										<span class="dc_settings_row_name">Platform *</span>
										<span class="dc_settings_row_value">
											<select name="locale"></select>
											<span class="dc_settings_row_value_description">Platform en taal waarin de vergelijker wordt weergegeven.</span>
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
											<input type="text" name="button_text" placeholder="Aanvragen" value="' . $settings['button_text'] . '">
											<span class="dc_settings_row_value_description">(optioneel) hiermee kunt u de tekst op de button aanpassen.</span>
										</span>
									</li>
								</ul>
								<h2 class="dc_box_subtitle">Kleuren</h2>
								<p class="dc_box_subdescription">U kunt de kleuren van de vergelijker aanpassen. Let op, zorg altijd voor voldoende contrast zodat het niet ten koste gaat van de leesbaarheid.</p>
								<ul class="dc_list">
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Hoofd kleur</span>
										<span class="dc_settings_row_value">
											<input type="color" name="color_primary" value="' . (false === empty($settings['color_primary']) ? $settings['color_primary'] : $base['color_primary']) . '" data-default="' . $base['color_primary'] . '">
											<input type="button" name="reset_color" class="dc_settings_row_value_reset_color" value="Reset">
											<span class="dc_settings_row_value_description">(optioneel)</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Hoofd tekst kleur</span>
										<span class="dc_settings_row_value">
											<input type="color" name="color_text_primary" value="' . (false === empty($settings['color_text_primary']) ? $settings['color_text_primary'] : $base['color_text_primary']) . '" data-default="' . $base['color_text_primary'] . '">
											<input type="button" name="reset_color" class="dc_settings_row_value_reset_color" value="Reset">
											<span class="dc_settings_row_value_description">(optioneel)</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Actie kleur</span>
										<span class="dc_settings_row_value">
											<input type="color" name="color_secondary" value="' . (false === empty($settings['color_secondary']) ? $settings['color_secondary'] : $base['color_secondary']) . '" data-default="' . $base['color_secondary'] . '">
											<input type="button" name="reset_color" class="dc_settings_row_value_reset_color" value="Reset">
											<span class="dc_settings_row_value_description">(optioneel)</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Actie tekst kleur</span>
										<span class="dc_settings_row_value">
											<input type="color" name="color_text_secondary" value="' . (false === empty($settings['color_text_secondary']) ? $settings['color_text_secondary'] : $base['color_text_secondary']) . '" data-default="' . $base['color_text_secondary'] . '">
											<input type="button" name="reset_color" class="dc_settings_row_value_reset_color" value="Reset">
											<span class="dc_settings_row_value_description">(optioneel)</span>
										</span>
									</li>
								</ul>
								<h2 class="dc_box_subtitle">Filters</h2>
									<p class="dc_box_subdescription">U kunt een voorkeur aangeven voor het filter wat standaard geselecteerd is. <i>Gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</i></p>
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
											<span class="dc_settings_row_name">Duurzaamheid elektriciteit</span>
											<span class="dc_settings_row_value">
												<select name="sustainability_electricity[]" multiple="multiple">
												<option value=""' . (true === empty($settings['sustainability_electricity']) ? ' selected="selected"' : '') . '>Geen voorkeur</option>
												</select>
												<span class="dc_settings_row_value_description">(optioneel)</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Duurzaamheid gas</span>
											<span class="dc_settings_row_value">
												<select name="sustainability_gas[]" multiple="multiple">
												<option value=""' . (true === empty($settings['sustainability_gas']) ? ' selected="selected"' : '') . '>Geen voorkeur</option>
												</select>
												<span class="dc_settings_row_value_description">(optioneel)</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Tarief type</span>
											<span class="dc_settings_row_value">
												<select name="tariff_type[]" multiple="multiple">
												<option value=""' . (true === empty($settings['tariff_type']) ? ' selected="selected"' : '') . '>Geen voorkeur</option>
												</select>
												<span class="dc_settings_row_value_description">(optioneel)</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Tarief sortering</span>
											<span class="dc_settings_row_value">
												<select name="tariff_sort[]" multiple="multiple">
												<option value=""' . (true === empty($settings['tariff_sort']) ? ' selected="selected"' : '') . '>Geen voorkeur</option>
												</select>
												<span class="dc_settings_row_value_description">(optioneel)</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Looptijd</span>
											<span class="dc_settings_row_value">
												<select name="duration[]" multiple="multiple">
												<option value=""' . (true === empty($settings['duration']) ? ' selected="selected"' : '') . '>Geen voorkeur</option>
												</select>
												<span class="dc_settings_row_value_description">(optioneel)</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Korting</span>
											<span class="dc_settings_row_value">
												<select name="discount">
													<option value="">Geen voorkeur</option>
												</select>
												<span class="dc_settings_row_value_description">(optioneel)</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Providers</span>
											<span class="dc_settings_row_value">
												<select name="providers[]" multiple="multiple">
													<option value=""' . (true === empty($settings['providers']) ? ' selected="selected"' : '') . '>Geen voorkeur</option>
												</select>
												<span class="dc_settings_row_value_description">(optioneel)</span>
											</span>
										</li>
									</ul>
									<input class="dc_settings_button" type="submit" name="dc_submit" id="dc_submit" value="Opslaan">
								</form>
								<h1 class="dc_box_title">Gebruik</h1>
								<p class="dc_box_description">Plak onderstaande shorttag in je blogpost of pagina en de vergelijker verschijnt direct op je website.</p>
								<div class="dc_shorttag" onclick="daisycon_select_all(this)">
									[daisycon_energy_nl profile_id="' . $base['profile_id'] . '"]
								</div>
								<p class="dc_box_description dc_box_description--no_margin">Succes!</p>';
			}
		echo '</div>';
	}

	public static function frontDaisyconEnergyNL($array)
	{
		// Load settings
		$settings = generalDaisyconSettings::generateToolSettings(false === empty($array['profile_id']) ? $array['profile_id'] : '', $array);

		if (true === empty($settings['media_id']) || false === is_numeric($settings['media_id']))
		{
			return 'Ongeldige media id bij "Introductie". Pas uw media id aan.';
		}

		if (false === empty($settings['media_id_custom']) && false === is_numeric($settings['media_id_custom']))
		{
			return 'Ongeldige media id bij "Energie". Pas uw media id aan of maak het veld leeg.';
		}

		// Register files
		wp_register_script('daisycon_energy_nl_js', '//daisycon.tools/energy-nl/app.js');

		// Add files to head
		wp_enqueue_script('daisycon_energy_nl_js');

		$configuration = [
			'filter'   => [
				'sustainabilityElectricityLevels'        => [
					'enabled' => (true === isset($settings['filter_sustainability_electricity_enabled']) && 'no' === $settings['filter_sustainability_electricity_enabled'] ? false : true),
				],
				'sustainabilityGasLevels'                => [
					'enabled' => (true === isset($settings['filter_sustainability_gas_enabled']) && 'no' === $settings['filter_sustainability_gas_enabled'] ? false : true),
				],
				'duration'                               => [
					'enabled' => (true === isset($settings['filter_duration_enabled']) && 'no' === $settings['filter_duration_enabled'] ? false : true),
				],
				'tariffType'                            => [
					'enabled' => (true === isset($settings['filter_tariff_type_enabled']) && 'no' === $settings['filter_tariff_type_enabled'] ? false : true),
				],
				'tariffSort'                            => [
					'enabled' => (true === isset($settings['filter_tariff_sort_enabled']) && 'no' === $settings['filter_tariff_sort_enabled'] ? false : true),
				],
				'discount'                              => [
					'enabled' => (true === isset($settings['filter_discount_enabled']) && 'no' === $settings['filter_discount_enabled'] ? false : true),
				],
				'providerId'                            => [
					'enabled' => (true === isset($settings['filter_providers_enabled']) && 'no' === $settings['filter_providers_enabled'] ? false : true),
				],
			],
			'mediaId'     => [
				'daisycon' => (int)(false === empty($settings['media_id_custom']) ? $settings['media_id_custom'] : $settings['media_id']),
			],
			'limit'       => (false === empty($settings['limit']) ? intval($settings['limit']) : '100'),
			'limitSplit'  => (false === empty($settings['limit_split']) ? intval($settings['limit_split']) : '100'),
			'locale'      => (false === empty($settings['locale']) ? $settings['locale'] : (false === empty($settings['language']) ? $settings['language'] : 'nl') . '-NL'),
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

		if (false === empty($settings['color_primary']))
		{
			$configuration = array_merge((array)$configuration, (array)['colorPrimary' => $settings['color_primary']]);
		}

		if (false === empty($settings['color_text_primary']))
		{
			$configuration = array_merge((array)$configuration, (array)['colorTextPrimary' => $settings['color_text_primary']]);
		}

		if (false === empty($settings['color_secondary']))
		{
			$configuration = array_merge((array)$configuration, (array)['colorSecondary' => $settings['color_secondary']]);
		}

		if (false === empty($settings['color_text_secondary']))
		{
			$configuration = array_merge((array)$configuration, (array)['colorTextSecondary' => $settings['color_text_secondary']]);
		}

		if (false === empty($settings['sustainability_electricity']))
		{
			$configuration['filter']['sustainabilityElectricityLevels'] = array_merge((array)$configuration['filter']['sustainabilityElectricityLevels'], (array)['value' => explode(',', $settings['sustainability_electricity'])]);
		}

		if (false === empty($settings['sustainability_gas']))
		{
			$configuration['filter']['sustainabilityGasLevels'] = array_merge((array)$configuration['filter']['sustainabilityGasLevels'], (array)['value' => explode(',', $settings['sustainability_gas'])]);
		}

		if (false === empty($settings['tariff_type']))
		{
			$configuration['filter']['tariffType'] = array_merge((array)$configuration['filter']['tariffType'], (array)['value' => explode(',', $settings['tariff_type'])]);
		}

		if (false === empty($settings['tariff_sort']))
		{
			$configuration['filter']['tariffSort'] = array_merge((array)$configuration['filter']['tariffSort'], (array)['value' => explode(',', $settings['tariff_sort'])]);
		}

		if (false === empty($settings['duration']))
		{
			$configuration['filter']['duration'] = array_merge((array)$configuration['filter']['duration'], (array)['value' => explode(',', $settings['duration'])]);
		}

		if (false === empty($settings['discount']) || (isset($settings['discount']) && 'false' === $settings['discount']))
		{
			$configuration['filter']['discount'] = array_merge((array)$configuration['filter']['discount'], (array)['value' => $settings['discount']]);
		}

		if (false === empty($settings['providers']))
		{
			$configuration['filter']['providerId'] = array_merge((array)$configuration['filter']['providerId'], (array)['value' => explode(',', $settings['providers'])]);
		}

		return "<div class=\"dc-tool dc-energy-tool\" data-config='" . str_replace("'", '&339;', json_encode($configuration)) . "'></div>";
	}
}
?>
