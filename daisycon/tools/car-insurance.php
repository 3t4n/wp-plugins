<?php
/* Daisycon prijsvergelijkers
 * File: car_insurance.php
 *
 * View for the shorttags to be displayed on the website
 *
 */

class generalDaisyconCarInsurance {

	public static function adminDaisyconCarInsurance()
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
			'color_text_secondary' => '#FFFFFF',
			'limit'                => '25',
			'profile_id'           => (false === empty($_POST['profile_id']) ? sanitize_text_field($_POST['profile_id']) : ''),
			'show_filters'         => ['yes'],
			'tool_name'            => 'car_insurance',
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
					'coverage'             => [],
					'km_year'              => [],
					'language'             => [],
					'limit'                => [],
					'payment_term'         => [],
					'show_filters'         => [],
					'sub_id'               => [],
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
								url : 'https://daisycon.tools/api/car-insurance/nl-NL/coverages',
							}
						).then((data) => daisycon_load_select('coverage', data, 0, 1, '" . (false === empty($settings['coverage']) ? $settings['coverage'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/car-insurance/nl-NL/km-years',
							}
						).then((data) => daisycon_load_select('km_year', data, 0, 1, '" . (false === empty($settings['km_year']) ? $settings['km_year'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/car-insurance/nl-NL/payment-terms',
							}
						).then((data) => daisycon_load_select('payment_term', data, 0, 1, '" . (false === empty($settings['payment_term']) ? $settings['payment_term'] : '') . "'));
					</script>";
		}

		echo '<div class="dc_box">
				<img class="dc_box_header" src="https://static.daisycon.tools/car-insurance/presentation/wp-plugin-daisycon-header.png" alt="Autoverzekeringvergelijker" />
				<p class="dc_box_description">Daisycon heeft exclusief voor haar publishers een gratis autoverzekeringvergelijker ontwikkeld. De tool is eenvoudig te installeren en stelt de bezoekers van jouw website in staat verschillende autoverzekeringen met elkaar te vergelijken. <a href="https://www.daisycon.com/nl/vergelijkers/autoverzekeringvergelijker/" target="_blank">Klik hier om de demowebsite te bekijken</a>.</p>
				<h1 class="dc_box_title">Instellingen</h1>';

		// Load profile selection
		generalDaisyconSettings::chooseProfile($base);

		// Check (default) settings // no $variable ?? $variable yet, due multi php support
		$settings['limit'] = false === empty($settings['limit']) ? $settings['limit'] : $base['limit'];
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
								<span class="dc_settings_row_value_description">de taal waarin de vergelijker wordt weergegeven.</span>
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
								<span class="dc_settings_row_name">Dekking</span>
								<span class="dc_settings_row_value">
									<select name="coverage">
										<option value="">Geen voorkeur</option>
									</select>
									<span class="dc_settings_row_value_description">(optioneel)</span>
								</span>
							</li>
							<li class="dc_list_item">
								<span class="dc_settings_row_name">Km per jaar</span>
								<span class="dc_settings_row_value">
									<select name="km_year">
										<option value="">Geen voorkeur</option>
									</select>
									<span class="dc_settings_row_value_description">(optioneel)</span>
								</span>								
							</li>
							<li class="dc_list_item">
								<span class="dc_settings_row_name">Betalingstermijn</span>
								<span class="dc_settings_row_value">
									<select name="payment_term">
										<option value="">Geen voorkeur</option>
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
						[daisycon_car_insurance profile_id="' . $base['profile_id'] . '"]
					</div>
					<p class="dc_box_description dc_box_description--no_margin">Succes!</p>';
			}
		echo '</div>';
	}

	public static function frontDaisyconCarInsurance($array)
	{
		// Load settings
		$settings = generalDaisyconSettings::generateToolSettings(false === empty($array['profile_id']) ? $array['profile_id'] : '', $array);

		if (true === empty($settings['media_id']) || false === is_numeric($settings['media_id']))
		{
			return 'Ongeldige media id. Pas uw media id aan.';
		}

		// Register files
		wp_register_script('daisycon_car_insurance_js', '//daisycon.tools/car-insurance/app.js');

		// Add files to head
		wp_enqueue_script('daisycon_car_insurance_js');

		$configuration = [
			'mediaId'     => [
				'daisycon' => $settings['media_id'],
			],
			'locale'      => 'nl-NL',
			'language'    => $settings['language'],
			'limit'       => (false === empty($settings['limit']) ? intval($settings['limit']) : '100'),
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

		if (false === empty($settings['coverage']))
		{
			$configuration = array_merge((array)$configuration, (array)['coverageId' => $settings['coverage']]);
		}

		if (false === empty($settings['km_year']))
		{
			$configuration = array_merge((array)$configuration, (array)['kmYearsId' => $settings['km_year']]);
		}

		if (false === empty($settings['payment_term']))
		{
			$configuration = array_merge((array)$configuration, (array)['paymentTermsId' => $settings['payment_term']]);
		}

		return "<div class=\"dc-tool dc-car-insurance-tool\" data-config='" . str_replace("'", '&339;', json_encode($configuration)) . "'></div>";
	}
}
?>
