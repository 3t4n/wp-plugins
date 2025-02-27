<?php
/* Daisycon prijsvergelijkers
 * File: funeral_insurance.php
 *
 * View for the shorttags to be displayed on the website
 *
 */

class generalDaisyconFuneralInsurance{

	public static function adminDaisyconFuneralInsurance()
	{
		// Load files
		wp_enqueue_style('daisycon.css', esc_url(plugins_url('../assets/css/daisycon.css', __FILE__)));
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/jquery-3.5.1.min.js', __FILE__)) . "\"></script>";
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/daisycon.js', __FILE__)) . "\"></script>";

		// Define base settings
		$base = [
			'color_in_primary'     => '#ffffff',
			'color_in_secondary'   => '#ffffff',
			'color_primary'        => '#3498DB',
			'color_secondary'      => '#FF8201',
			'color_text_primary'   => '#626262',
			'color_text_secondary' => '#888888',
			'limit'                => '25',
			'locale'               => 'nl-NL',
			'profile_id'           => (false === empty($_POST['profile_id']) ? sanitize_text_field($_POST['profile_id']) : ''),
			'show_all'             => '3',
			'sort_age'             => ['18'],
			'tool_name'            => 'funeral_insurance',
		];

		// Check if settings were submitted
		if (false === empty($_POST['dc_submit']))
		{
			$updateSettings = generalDaisyconSettings::updateSettings($base['profile_id'],
				[
					'button_text'          => [],
					'color_in_primary'     => [],
					'color_in_secondary'   => [],
					'color_primary'        => [],
					'color_secondary'      => [],
					'color_text_primary'   => [],
					'color_text_secondary' => [],
					'locale'               => [],
					'limit'                => [],
					'media_id_custom'      => [],
					'show_all'             => [],
					'sort_age'             => [],
					'sub_id'               => [],
				]
			);
		}

		// If profile has been loaded, then extra loads are required
		if (false === empty($base['profile_id']))
		{
			// Load settings
			$settings = generalDaisyconSettings::generateToolSettings($base['profile_id']);

			$loadLocale = (false === empty($settings['locale']) ? $settings['locale'] : $base['locale']);

			echo "<script type=\"text/javascript\">
						processData(
							{
								url : 'https://daisycon.tools/api/funeral-insurance/" . $loadLocale . "/age',
							}
						).then((data) => daisycon_load_select('sort_age', data, 4, 1, '" . (false === empty($settings['sort_age']) ? $settings['sort_age'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/funeral-insurance/" . $loadLocale . "/locale',
							}
						).then((data) => daisycon_load_select('locale', data, 4, 1, '" . (false === empty($settings['locale']) ? $settings['locale'] : '') . "'));
					</script>";
		}

		echo '<div class="dc_box">
				<img class="dc_box_header" src="https://static.daisycon.tools/funeral-insurance/presentation/wp-plugin-daisycon-header.png" alt="Uitvaartverzekering tool" />
				<p class="dc_box_description">Daisycon heeft exclusief voor haar publishers een gratis uitvaartverzekeringvergelijker ontwikkeld. De tool is eenvoudig te installeren. <a href="https://www.daisycon.com/nl/vergelijkers/uitvaartverzekeringen/" target="_blank">Klik hier om de demowebsite te bekijken</a>.</p>
				<h1 class="dc_box_title">Instellingen</h1>';

				// Load profile selection
				generalDaisyconSettings::chooseProfile($base);

				// Check (default) settings // no $variable ?? $variable yet, due multi php support
				$settings['limit'] = false === empty($settings['limit']) ? $settings['limit'] : $base['limit'];

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
											<span class="dc_settings_row_value_description">Land en taal waarin de vergelijker wordt weergegeven.</span>
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
										<span class="dc_settings_row_name">Resultaten zichtbaar</span>
										<span class="dc_settings_row_value">
											<input type="number" name="show_all" value="' . $settings['show_all'] . '" min="3" max="100">
											<span class="dc_settings_row_value_description">Aantal resultaten wat voor de knop "Toon alle resultaten" getoond wordt (max 100).</span>
										</span>								
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Resultaten *</span>
										<span class="dc_settings_row_value">
											<input type="number" name="limit" value="' . $settings['limit'] . '" min="1" max="100">
											<span class="dc_settings_row_value_description">Aantal resultaten wat maximaal in de vergelijker wordt getoond (max 100).</span>
										</span>								
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Sortering</span>
										<span class="dc_settings_row_value">
											<select name="sort_age">
												<option value="">Geen voorkeur</option>
											</select>
											<span class="dc_settings_row_value_description">(optioneel) Oplopend aan de hand van de prijs voor de gekozen leeftijd.</span>
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
									<!--<li class="dc_list_item">
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
									</li>-->
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
								<input class="dc_settings_button" type="submit" name="dc_submit" id="dc_submit" value="Opslaan">
							</form>
							<h1 class="dc_box_title">Gebruik</h1>
							<p class="dc_box_description">Plak onderstaande shorttag in je blogpost of pagina en de vergelijker verschijnt direct op je website.</p>
							<div class="dc_shorttag" onclick="daisycon_select_all(this)">
								[daisycon_funeral_insurance profile_id="' . $base['profile_id'] . '"]
							</div>
							<p class="dc_box_description dc_box_description--no_margin">Succes!</p>';
				}
		echo '</div>';
	}

	public static function frontDaisyconFuneralInsurance($array)
	{
		// Load settings
		$settings = generalDaisyconSettings::generateToolSettings(false === empty($array['profile_id']) ? $array['profile_id'] : '', $array);

		if (true === empty($settings['media_id']) || false === is_numeric($settings['media_id']))
		{
			return 'Ongeldige media id bij "Introductie". Pas uw media id aan.';
		}

		if (false === empty($settings['media_id_custom']) && false === is_numeric($settings['media_id_custom']))
		{
			return 'Ongeldige media id bij "Uitvaartverzekering". Pas uw media id aan of maak het veld leeg.';
		}

		// Register files
		wp_register_script('daisycon_funeral_insurance_js', '//daisycon.tools/funeral-insurance/app.js');

		// Add files to head
		wp_enqueue_script('daisycon_funeral_insurance_js');

		$configuration = [
			'mediaId' => [
				'daisycon' => (int)(false === empty($settings['media_id_custom']) ? $settings['media_id_custom'] : $settings['media_id']),
			],
			'locale'  => (false === empty($settings['locale']) ? $settings['locale'] : 'nl-NL'),
			'limit'   => (false === empty($settings['limit']) ? intval($settings['limit']) : '100'),
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

		if (false === empty($settings['show_all']))
		{
			$configuration = array_merge((array)$configuration, (array)['showAll' => explode(',', $settings['show_all'])]);
		}

		if (false === empty($settings['sort_age']))
		{
			$configuration = array_merge((array)$configuration, (array)['sort' => ['age' => ['value' => explode(',', $settings['sort_age'])]]]);
		}

		return "<div class=\"dc-tool dc-funeral-insurance-tool\" data-config='" . str_replace("'", '&339;', json_encode($configuration)) . "'></div>";
	}
}
?>
