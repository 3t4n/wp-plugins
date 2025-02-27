<?php
/* Daisycon prijsvergelijkers
 * File: zorg.php
 *
 * View for the shorttags to be displayed on the website
 *
 */

class generalDaisyconHealth{

	public static function adminDaisyconHealth()
	{
		// Load files
		wp_enqueue_style('daisycon.css', esc_url(plugins_url('../assets/css/daisycon.css', __FILE__)));
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/jquery-3.5.1.min.js', __FILE__)) . "\"></script>";
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/daisycon.js', __FILE__)) . "\"></script>";

		// Define base settings
		$base = [
			'color_primary'        => '#3498DB',
			'color_secondary'      => '#FF8201',
			'color_text_primary'   => '#626262',
			'color_text_secondary' => '#FFFFFF',
			'limit'                => '25',
			'profile_id'           => (false === empty($_POST['profile_id']) ? sanitize_text_field($_POST['profile_id']) : ''),
			'show_filters'         => ['yes'],
			'tool_name'            => 'health_insurance',
		];

		// Check if settings were submitted
		if (false === empty($_POST['dc_submit']))
		{
			$updateSettings = generalDaisyconSettings::updateSettings($base['profile_id'],
				[
					'alternative_healthcare'      => [],
					'button_text'                 => [],
					'choice_in_healthcare'        => [],
					'color_primary'               => [],
					'color_secondary'             => [],
					'color_text_primary'          => [],
					'color_text_secondary'        => [],
					'deductible_excess'           => [],
					'dental_insurance_amount'     => [],
					'dental_insurance_percentage' => [],
					'eye_care'                    => [],
					'language'                    => [],
					'limit'                       => [],
					'media_id_custom'             => [],
					'medications'                 => [],
					'orthodontics'                => [],
					'physiotherapy'               => [],
					'providers'                   => [],
					'show_filters'                => [],
					'sub_id'                      => [],
					'vaccinations'                => [],
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
								url : 'https://daisycon.tools/api/health-insurance/nl-NL/choice-in-healthcare?language=nl',
							}
						).then((data) => daisycon_load_select('choice_in_healthcare', data, 4, 1, '" . (false === empty($settings['choice_in_healthcare']) ? $settings['choice_in_healthcare'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/health-insurance/nl-NL/deductible-excess?language=nl',
							}
						).then((data) => daisycon_load_select('deductible_excess', data, 4, 1, '" . (false === empty($settings['deductible_excess']) ? $settings['deductible_excess'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/health-insurance/nl-NL/physiotherapy?language=nl',
							}
						).then((data) => daisycon_load_select('physiotherapy', data, 4, 1, '" . (false === empty($settings['physiotherapy']) ? $settings['physiotherapy'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/health-insurance/nl-NL/eye-care?language=nl',
							}
						).then((data) => daisycon_load_select('eye_care', data, 4, 1, '" . (false === empty($settings['eye_care']) ? $settings['eye_care'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/health-insurance/nl-NL/alternative-healthcare?language=nl',
							}
						).then((data) => daisycon_load_select('alternative_healthcare', data, 4, 1, '" . (false === empty($settings['alternative_healthcare']) ? $settings['alternative_healthcare'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/health-insurance/nl-NL/medications?language=nl',
							}
						).then((data) => daisycon_load_select('medications', data, 4, 1, '" . (false === empty($settings['medications']) ? $settings['medications'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/health-insurance/nl-NL/vaccinations?language=nl',
							}
						).then((data) => daisycon_load_select('vaccinations', data, 4, 1, '" . (false === empty($settings['vaccinations']) ? $settings['vaccinations'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/health-insurance/nl-NL/dental-insurance-amount?language=nl',
							}
						).then((data) => daisycon_load_select('dental_insurance_amount', data, 4, 1, '" . (false === empty($settings['dental_insurance_amount']) ? $settings['dental_insurance_amount'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/health-insurance/nl-NL/dental-insurance-percentage?language=nl',
							}
						).then((data) => daisycon_load_select('dental_insurance_percentage', data, 4, 1, '" . (false === empty($settings['dental_insurance_percentage']) ? $settings['dental_insurance_percentage'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/health-insurance/nl-NL/orthodontics?language=nl',
							}
						).then((data) => daisycon_load_select('orthodontics', data, 4, 1, '" . (false === empty($settings['orthodontics']) ? $settings['orthodontics'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/health-insurance/nl-NL/providers',
							}
						).then((data) => daisycon_load_select('providers[]', data, 0, 1, '" . (false === empty($settings['providers']) ? $settings['providers'] : '') . "'));
					</script>";
		}

		echo '<div class="dc_box">
				<img class="dc_box_header" src="https://static.daisycon.tools/health-insurance/presentation/wp-plugin-daisycon-header.png" alt="Zorgverzekeringvergelijker" />
				<p class="dc_box_description">Daisycon heeft exclusief voor haar publishers een gratis zorgverzekeringvergelijker ontwikkeld. De tool is eenvoudig te installeren en stelt de bezoekers van jouw website in staat verschillende zorgverzekeringen met elkaar te vergelijken. <a href="https://www.daisycon.com/nl/vergelijkers/zorgverzekeringvergelijker/" target="_blank">Klik hier om de demowebsite te bekijken</a>.</p>
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
											<span class="dc_settings_row_name">Vrije zorgkeuze</span>
											<span class="dc_settings_row_value">
												<select name="choice_in_healthcare"></select>
												<span class="dc_settings_row_value_description">(optioneel)</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Eigen risico</span>
											<span class="dc_settings_row_value">
												<select name="deductible_excess"></select>
												<span class="dc_settings_row_value_description">(optioneel)</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Fysiotherapie</span>
											<span class="dc_settings_row_value">
												<select name="physiotherapy"></select>
												<span class="dc_settings_row_value_description">(optioneel)</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Bril &amp; lenzen</span>
											<span class="dc_settings_row_value">
												<select name="eye_care"></select>
												<span class="dc_settings_row_value_description">(optioneel)</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Alternatieve geneeswijzen</span>
											<span class="dc_settings_row_value">
												<select name="alternative_healthcare"></select>
												<span class="dc_settings_row_value_description">(optioneel)</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Medicijnen</span>
											<span class="dc_settings_row_value">
												<select name="medications"></select>
												<span class="dc_settings_row_value_description">(optioneel)</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Vaccinaties</span>
											<span class="dc_settings_row_value">
												<select name="vaccinations"></select>
												<span class="dc_settings_row_value_description">(optioneel)</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Tandarts budget</span>
											<span class="dc_settings_row_value">
												<select name="dental_insurance_amount"></select>
												<span class="dc_settings_row_value_description">(optioneel)</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Tandarts dekking</span>
											<span class="dc_settings_row_value">
												<select name="dental_insurance_percentage"></select>
												<span class="dc_settings_row_value_description">(optioneel)</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Orthodontie</span>
											<span class="dc_settings_row_value">
												<select name="orthodontics"></select>
												<span class="dc_settings_row_value_description">(optioneel)</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Providers</span>
											<span class="dc_settings_row_value">
												<select name="providers[]" multiple="multiple">
													<option value=""' . (true === empty($settings['providers']) ? ' selected="selected"' : '') . '>Geen voorkeur</option>
												</select>
												<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
											</span>
										</li>
									</ul>
									<input class="dc_settings_button" type="submit" name="dc_submit" id="dc_submit" value="Opslaan">
								</form>
								<h1 class="dc_box_title">Gebruik</h1>
								<p class="dc_box_description">Plak onderstaande shorttag in je blogpost of pagina en de vergelijker verschijnt direct op je website.</p>
								<div class="dc_shorttag" onclick="daisycon_select_all(this)">
									[daisycon_health_insurance profile_id="' . $base['profile_id'] . '"]
								</div>
								<p class="dc_box_description dc_box_description--no_margin">Succes!</p>';
				}
		echo '</div>';
	}

	public static function frontDaisyconHealth($array)
	{
		// Load settings
		$settings = generalDaisyconSettings::generateToolSettings(false === empty($array['profile_id']) ? $array['profile_id'] : '', $array);

		if (true === empty($settings['media_id']) || false === is_numeric($settings['media_id']))
		{
			return 'Ongeldige media id bij "Introductie". Pas uw media id aan.';
		}

		if (false === empty($settings['media_id_custom']) && false === is_numeric($settings['media_id_custom']))
		{
			return 'Ongeldige media id bij "Accounting". Pas uw media id aan of maak het veld leeg.';
		}

		// Register files
		wp_register_script('daisycon_health_insurance_js', '//daisycon.tools/health-insurance/app.js');

		// Add files to head
		wp_enqueue_script('daisycon_health_insurance_js');

		$configuration = [
			'mediaId'     => [
				'daisycon' => (int)(false === empty($settings['media_id_custom']) ? $settings['media_id_custom'] : $settings['media_id']),
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

		if (false === empty($settings['choice_in_healthcare']) || (isset($settings['choice_in_healthcare']) && '' === $settings['choice_in_healthcare']))
		{
			$configuration = array_merge((array)$configuration, (array)['choiceInHealthcare' => explode(',', $settings['choice_in_healthcare'])]);
		}

		if (false === empty($settings['deductible_excess']))
		{
			$configuration = array_merge((array)$configuration, (array)['deductibleExcess' => explode(',', $settings['deductible_excess'])]);
		}

		if (false === empty($settings['physiotherapy']))
		{
			$configuration = array_merge((array)$configuration, (array)['physiotherapy' => explode(',', $settings['physiotherapy'])]);
		}

		if (false === empty($settings['eye_care']))
		{
			$configuration = array_merge((array)$configuration, (array)['eyeCare' => $settings['eye_care']]);
		}

		if (false === empty($settings['alternative_healthcare']))
		{
			$configuration = array_merge((array)$configuration, (array)['alternativeHealthcare' => $settings['alternative_healthcare']]);
		}

		if (false === empty($settings['medications']))
		{
			$configuration = array_merge((array)$configuration, (array)['medications' => $settings['medications']]);
		}

		if (false === empty($settings['vaccinations']))
		{
			$configuration = array_merge((array)$configuration, (array)['vaccinations' => $settings['vaccinations']]);
		}

		if (false === empty($settings['dental_insurance_amount']))
		{
			$configuration = array_merge((array)$configuration, (array)['dentalInsuranceAmount' => $settings['dental_insurance_amount']]);
		}

		if (false === empty($settings['dental_insurance_percentage']))
		{
			$configuration = array_merge((array)$configuration, (array)['dentalInsurancePercentage' => $settings['dental_insurance_percentage']]);
		}

		if (false === empty($settings['orthodontics']))
		{
			$configuration = array_merge((array)$configuration, (array)['orthodontics' => $settings['orthodontics']]);
		}

		if (false === empty($settings['providers']))
		{
			$configuration = array_merge((array)$configuration, (array)['providerId' => explode(',', $settings['providers'])]);
		}

		return "<div class=\"dc-tool dc-health-insurance-tool\" data-config='" . str_replace("'", '&339;', json_encode($configuration)) . "'></div>";
	}
}
?>
