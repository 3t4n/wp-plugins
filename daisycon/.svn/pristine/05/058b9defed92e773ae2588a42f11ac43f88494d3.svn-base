<?php
/* Daisycon prijsvergelijkers
 * File: accounting.php
 *
 * View for the shorttags to be displayed on the website
 *
 */

class generalDaisyconAccounting{

	public static function adminDaisyconAccounting()
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
			'filter_user_max'      => ['25'],
			'filter_user_min'      => ['1'],
			'limit'                => '25',
			'profile_id'           => (false === empty($_POST['profile_id']) ? sanitize_text_field($_POST['profile_id']) : ''),
			'show_filters'         => ['yes'],
			'tool_name'            => 'accounting',
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
					'filter_amount_period' => [],
					'filter_company_type'  => [],
					'filter_free_package'  => [],
					'filter_option'        => [],
					'filter_program'       => [],
					'filter_type'          => [],
					'filter_user'          => [],
					'filter_user_max'      => [],
					'filter_user_min'      => [],
					'language'             => [],
					'limit'                => [],
					'media_id_custom'      => [],
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
								url : 'https://daisycon.tools/api/accounting/nl-NL/type?language=nl',
							}
						).then((data) => daisycon_load_select('filter_type', data, 4, 1, '" . (false === empty($settings['filter_type']) ? $settings['filter_type'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/accounting/nl-NL/company-type?language=nl',
							}
						).then((data) => daisycon_load_select('filter_company_type[]', data, 4, 1, '" . (false === empty($settings['filter_company_type']) ? $settings['filter_company_type'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/accounting/nl-NL/amount-period?language=nl',
							}
						).then((data) => daisycon_load_select('filter_amount_period', data, 4, 1, '" . (false === empty($settings['filter_amount_period']) ? $settings['filter_amount_period'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/accounting/nl-NL/option?language=nl',
							}
						).then((data) => daisycon_load_select('filter_option[]', data, 4, 1, '" . (false === empty($settings['filter_option']) ? $settings['filter_option'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/accounting/nl-NL/programs',
							}
						).then((data) => daisycon_load_select('filter_program[]', data, 0, 1, '" . (false === empty($settings['filter_program']) ? $settings['filter_program'] : '') . "'));
						
					</script>";
		}

		echo '<div class="dc_box">
				<img class="dc_box_header" src="https://static.daisycon.tools/accounting/presentation/wp-plugin-daisycon-header.png" alt="Boekhoudvergelijker" />
				<p class="dc_box_description">Daisycon heeft exclusief voor haar publishers een gratis boekhoudvergelijker ontwikkeld. De tool is eenvoudig te installeren en stelt de bezoekers van jouw website in staat verschillende boekhoudsoftware met elkaar te vergelijken. <a href="https://www.daisycon.com/nl/vergelijkers/boekhoudsoftware-vergelijker/" target="_blank">Klik hier om de demowebsite te bekijken</a>.</p>
				<h1 class="dc_box_title">Instellingen</h1>';

			// Load profile selection
			generalDaisyconSettings::chooseProfile($base);

			// Check (default) settings
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
											<span class="dc_settings_row_name">Type</span>
											<span class="dc_settings_row_value">
												<select name="filter_type">
													<option value="">Geen voorkeur</option>
												</select>
												<span class="dc_settings_row_value_description">(optioneel)</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Soort bedrijf</span>
											<span class="dc_settings_row_value">
												<select name="filter_company_type[]" multiple="multiple">
												<option value=""' . (true === empty($settings['filter_company_type']) ? ' selected="selected"' : '') . '>Geen voorkeur</option>
												</select>
												<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Gebruikers</span>
											<span class="dc_settings_row_value">
												<select class="dc_settings_row_value--marginBottom" name="filter_user">
													<option value="general"' . (false === empty($settings['filter_user']) && 'specific' !== $settings['filter_user'] ? 'selected="selected"' : '') . '>Geen voorkeur</option>
													<option value="specific"' . (false === empty($settings['filter_user']) && 'specific' === $settings['filter_user'] ? 'selected="selected"' : '') . '>Onderstaande range</option>
												</select><br>
												<input type="number" name="filter_user_min[]" min="0" max="25" value="' . (false === empty($settings['filter_user_min']) ? $settings['filter_user_min'] : '0') . '"> t/m <input type="number" name="filter_user_max[]" min="0" max="25" value="' . (false === empty($settings['filter_user_max']) ? $settings['filter_user_max'] : '25') . '">
												<span class="dc_settings_row_value_description">Alleen van toepassing bij keuze "range"</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Tarief</span>
											<span class="dc_settings_row_value">
												<select name="filter_amount_period">
													<option value="">Geen voorkeur</option>
												</select>
												<span class="dc_settings_row_value_description">(optioneel)</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Tonen gratis pakket(ten)</span>
											<span class="dc_settings_row_value">
												<select name="filter_free_package">
													<option value="true"' . (false === empty($settings['filter_free_package']) && 'false' !== $settings['filter_free_package'] ? 'selected="selected"' : '') . '>Ja</option>
													<option value="false"' . (false === empty($settings['filter_free_package']) && 'false' === $settings['filter_free_package'] ? 'selected="selected"' : '') . '>Nee</option>
												</select>
												<span class="dc_settings_row_value_description"></span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Opties</span>
											<span class="dc_settings_row_value">
												<select name="filter_option[]" multiple="multiple">
												<option value=""' . (true === empty($settings['filter_option']) ? ' selected="selected"' : '') . '>Geen voorkeur</option>
												</select>
												<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Programma\'s</span>
											<span class="dc_settings_row_value">
												<select name="filter_program[]" multiple="multiple">
													<option value=""' . (true === empty($settings['filter_program']) ? ' selected="selected"' : '') . '>Geen voorkeur</option>
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
									[daisycon_accounting profile_id="' . $base['profile_id'] . '"]
								</div>
								<p class="dc_box_description dc_box_description--no_margin">Succes!</p>';
			}
		echo '</div>';
	}

	public static function frontDaisyconAccounting($array)
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
		wp_register_script('daisycon_accounting_js', '//daisycon.tools/accounting/app.js');

		// Add files to head
		wp_enqueue_script('daisycon_accounting_js');

		$configuration = [
			'filter'      => [],
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

		if (false === empty($settings['filter_type']))
		{
			$configuration['filter'] = array_merge((array)$configuration['filter'], (array)[
				'type' => (array)[
					'value' => $settings['filter_type'],
				],
			]);
		}

		if (false === empty($settings['filter_company_type']))
		{
			$configuration['filter'] = array_merge((array)$configuration['filter'], (array)[
				'companyType' => (array)[
					'value' => explode(',', $settings['filter_company_type']),
				],
			]);
		}

		if (false === empty($settings['filter_user']) && 'specific' === $settings['filter_user'] && (false === empty($settings['filter_user_min']) || (isset($settings['filter_user_min']) && '0' === $settings['filter_user_min'])) && false === empty($settings['filter_user_max']))
		{
			$configuration['filter'] = array_merge((array)$configuration['filter'], (array)[
				'users' => (array)[
					'max' => (int)$settings['filter_user_max'],
					'min' => (int)$settings['filter_user_min'],
				],
			]);
		}

		if (false === empty($settings['filter_amount_period']))
		{
			$configuration['filter'] = array_merge((array)$configuration['filter'], (array)[
				'amountPeriod' => (array)[
					'value' => $settings['filter_amount_period'],
				],
			]);
		}

		if (true === isset($settings['filter_free_package']))
		{
			$configuration['filter'] = array_merge((array)$configuration['filter'], (array)[
				'freePackage' => (array)[
					'value' => $settings['filter_free_package'],
				],
			]);
		}

		if (false === empty($settings['filter_option']))
		{
			$configuration['filter'] = array_merge((array)$configuration['filter'], (array)[
				'option' => (array)[
					'value' => explode(',', $settings['filter_option']),
				],
			]);
		}

		if (false === empty($settings['filter_program']))
		{
			$configuration['filter'] = array_merge((array)$configuration['filter'], (array)[
				'program' => (array)[
					'value' => explode(',', $settings['filter_program']),
				],
			]);
		}

		return "<div class=\"dc-tool dc-accounting-tool\" data-config='" . str_replace("'", '&339;', json_encode($configuration)) . "'></div>";
	}
}
?>
