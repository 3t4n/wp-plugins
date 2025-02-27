<?php
/* Daisycon prijsvergelijkers
 * File: market_research.php
 *
 * View for the shorttags to be displayed on the website
 *
 */

class generalDaisyconMarketResearch{

	public static function adminDaisyconMarketResearch()
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
			'limit'                => '50',
			'profile_id'           => (false === empty($_POST['profile_id']) ? sanitize_text_field($_POST['profile_id']) : ''),
			'show_filters'         => ['yes'],
			'tool_name'            => 'market_research',
		];

		// Check if settings were submitted
		if (false === empty($_POST['dc_submit']))
		{
			$updateSettings = generalDaisyconSettings::updateSettings($base['profile_id'],
				[
					'color_in_primary'     => [],
					'color_in_secondary'   => [],
					'color_primary'        => [],
					'color_secondary'      => [],
					'color_text_primary'   => [],
					'color_text_secondary' => [],
					'filter_age'           => [],
					'filter_category'      => [],
					'filter_gender'        => [],
					'filter_reward'        => [],
					'limit'                => [],
					'locale'               => [],
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
								url : 'https://daisycon.tools/api/market-research/nl-NL/locale?sort=asc',
							}
						).then((data) => daisycon_load_select('locale', data, 4, 1, '" . (false === empty($settings['locale']) ? $settings['locale'] : 'nl-NL') . "'));

						processData(
							{
								url : 'https://daisycon.tools/api/market-research/nl-NL/age?sort=asc',
							}
						).then((data) => daisycon_load_select('filter_age[]', data, 4, 1, '" . (false === empty($settings['filter_age']) ? $settings['filter_age'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/market-research/nl-NL/gender?sort=asc',
							}
						).then((data) => daisycon_load_select('filter_gender[]', data, 4, 1, '" . (false === empty($settings['filter_gender']) ? $settings['filter_gender'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/market-research/nl-NL/category?sort=asc',
							}
						).then((data) => daisycon_load_select('filter_category[]', data, 4, 1, '" . (false === empty($settings['filter_category']) ? $settings['filter_category'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/market-research/nl-NL/reward?language=nl',
							}
						).then((data) => daisycon_load_select('filter_reward[]', data, 4, 1, '" . (false === empty($settings['filter_reward']) ? $settings['filter_reward'] : '') . "'));
						
					</script>";
		}

		echo '<div class="dc_box">
				<img class="dc_box_header" src="https://static.daisycon.tools/market-research/presentation/wp-plugin-daisycon-header.png" alt="Marktonderzoekvergelijker" />
				<p class="dc_box_description">Daisycon heeft exclusief voor haar publishers een gratis marktonderzoekvergelijker ontwikkeld. De tool is eenvoudig te installeren en stelt de bezoekers van jouw website in staat verschillende marktonderzoeken met elkaar te vergelijken. <a href="https://www.daisycon.com/nl/vergelijkers/marktonderzoek-vergelijker/" target="_blank">Klik hier om de demowebsite te bekijken</a>.</p>
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
										<span class="dc_settings_row_name">Platform *</span>
										<span class="dc_settings_row_value">
											<select name="locale"></select>
											<span class="dc_settings_row_value_description">Het land (en eventueel de taal) waarin de marktonderzoeken worden aangeboden.</span>
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
											<span class="dc_settings_row_name">Leeftijd</span>
											<span class="dc_settings_row_value">
												<select name="filter_age[]" multiple="multiple">
													<option value=""' . (true === empty($settings['filter_age']) ? ' selected="selected"' : '') . '>Geen voorkeur</option>
												</select>
												<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Geslacht</span>
											<span class="dc_settings_row_value">
												<select name="filter_gender[]" multiple="multiple">
													<option value=""' . (true === empty($settings['filter_gender']) ? ' selected="selected"' : '') . '>Geen voorkeur</option>
												</select>
												<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Categorie</span>
											<span class="dc_settings_row_value">
												<select name="filter_category[]" multiple="multiple">
													<option value=""' . (true === empty($settings['filter_category']) ? ' selected="selected"' : '') . '>Geen voorkeur</option>
												</select>
												<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Beloning</span>
											<span class="dc_settings_row_value">
												<select name="filter_reward[]" multiple="multiple">
													<option value=""' . (true === empty($settings['filter_reward']) ? ' selected="selected"' : '') . '>Geen voorkeur</option>
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
									[daisycon_market_research profile_id="' . $base['profile_id'] . '"]
								</div>
								<p class="dc_box_description dc_box_description--no_margin">Succes!</p>';
			}
		echo '</div>';
	}

	public static function frontDaisyconMarketResearch($array)
	{
		// Load settings
		$settings = generalDaisyconSettings::generateToolSettings(false === empty($array['profile_id']) ? $array['profile_id'] : '', $array);

		if (true === empty($settings['media_id']) || false === is_numeric($settings['media_id']))
		{
			return 'Ongeldige media id bij "Introductie". Pas uw media id aan.';
		}

		if (false === empty($settings['media_id_custom']) && false === is_numeric($settings['media_id_custom']))
		{
			return 'Ongeldige media id bij "Marktonderzoek". Pas uw media id aan of maak het veld leeg.';
		}

		// Register files
		wp_register_script('daisycon_market_research_js', '//daisycon.tools/market-research/app.js');

		// Add files to head
		wp_enqueue_script('daisycon_market_research_js');

		$configuration = [
			'filter'      => [],
			'mediaId'     => [
				'daisycon' => (int)(false === empty($settings['media_id_custom']) ? $settings['media_id_custom'] : $settings['media_id']),
			],
			'limit'       => (false === empty($settings['limit']) ? intval($settings['limit']) : '50'),
			'locale'      => (false === empty($settings['locale']) ? $settings['locale'] : 'nl-NL'),
			'showFilters' => (true === isset($settings['show_filters']) && 'no' === $settings['show_filters'] ? false : true),
		];

		if (false === empty($settings['sub_id']))
		{
			$configuration = array_merge((array)$configuration, (array)['subId' => ['daisycon' => $settings['sub_id']]]);
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

		if (false === empty($settings['filter_age']))
		{
			$configuration['filter'] = array_merge((array)$configuration['filter'], (array)[
				'age' => (array)[
					'value' => explode(',', $settings['filter_age']),
				],
			]);
		}

		if (false === empty($settings['filter_gender']))
		{
			$configuration['filter'] = array_merge((array)$configuration['filter'], (array)[
				'gender' => (array)[
					'value' => explode(',', $settings['filter_gender']),
				],
			]);
		}

		if (false === empty($settings['filter_category']))
		{
			$configuration['filter'] = array_merge((array)$configuration['filter'], (array)[
				'category' => (array)[
					'value' => explode(',', $settings['filter_category']),
				],
			]);
		}

		if (false === empty($settings['filter_reward']))
		{
			$configuration['filter'] = array_merge((array)$configuration['filter'], (array)[
				'reward' => (array)[
					'value' => explode(',', $settings['filter_reward']),
				],
			]);
		}

		return "<div class=\"dc-tool dc-market-research-tool\" data-config='" . str_replace("'", '&339;', json_encode($configuration)) . "'></div>";
	}
}
?>
