<?php
/* Daisycon prijsvergelijkers
 * File: allesin1.php
 *
 * View for the shorttags to be displayed on the website
 *
 */

class generalDaisyconAllInOne {

	public static function adminDaisyconAllInOne()
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
			'color_text_secondary' => '#888888',
			'limit'                => '25',
			'profile_id'           => (false === empty($_POST['profile_id']) ? sanitize_text_field($_POST['profile_id']) : ''),
			'show_filters'         => ['yes'],
			'tool_name'            => 'all_in_one',
		];

		// Check if settings were submitted
		if (false === empty($_POST['dc_submit']))
		{
			$updateSettings = generalDaisyconSettings::updateSettings($base['profile_id'],
				[
					'button_text'          => [],
					'color_primary'        => [],
					'color_secondary'      => [],
					'color_text_primary'   => [],
					'color_text_secondary' => [],
					'connection_type'      => [],
					'download_speed'       => [],
					'language'             => [],
					'limit'                => [],
					'media_id_custom'      => [],
					'providers'            => [],
					'show_filters'         => [],
					'sub_id'               => [],
					'television_option'    => [],
					'type'                 => [],
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
								url : 'https://daisycon.tools/api/all-in-one/nl-NL/types?language=nl',
							}
						).then(function (data) {
						
							data.splice(0,1);

							daisycon_load_select('type[]', data, 4, 1, '1," . (false === empty($settings['type']) ? $settings['type'] : '') . "');
						});
						
						processData(
							{
								url : 'https://daisycon.tools/api/all-in-one/nl-NL/connection-types?language=nl',
							}
						).then((data) => daisycon_load_select('connection_type[]', data, 4, 1, '" . (false === empty($settings['connection_type']) ? $settings['connection_type'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/all-in-one/nl-NL/internet-speeds?language=nl',
							}
						).then((data) => daisycon_load_select('download_speed[]', data, 4, 1, '" . (false === empty($settings['download_speed']) ? $settings['download_speed'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/all-in-one/nl-NL/television-options?language=nl',
							}
						).then((data) => daisycon_load_select('television_option[]', data, 4, 1, '" . (false === empty($settings['television_option']) ? $settings['television_option'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/all-in-one/nl-NL/providers',
							}
						).then((data) => daisycon_load_select('providers[]', data, 0, 1, '" . (false === empty($settings['providers']) ? $settings['providers'] : '') . "'));
					</script>";
		}

		echo '<div class="dc_box">
				<img class="dc_box_header" src="https://static.daisycon.tools/all-in-one/presentation/wp-plugin-daisycon-header.png" alt="Alles in één vergelijker" />
				<p class="dc_box_description">Daisycon heeft exclusief voor haar publishers een gratis Alles-in-&eacute;&eacute;n-vergelijker ontwikkeld. Met deze tool kunnen jouw bezoekers pakketten met internet, televisie en (vaste)telefonie vergelijken. <a href="https://www.daisycon.com/nl/vergelijkers/alles-in-een-vergelijker/" target="_blank">Klik hier om de demowebsite te bekijken</a>.</p>
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
											<span class="dc_settings_row_name">Type</span>
											<span class="dc_settings_row_value">
												<select name="type[]" multiple="multiple"></select>
												<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Verbindingstype</span>
											<span class="dc_settings_row_value">
												<select name="connection_type[]" multiple="multiple"></select>
												<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Downloadsnelheid</span>
											<span class="dc_settings_row_value">
												<select name="download_speed[]" multiple="multiple"></select>
												<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Televisie opties</span>
											<span class="dc_settings_row_value">
												<select name="television_option[]" multiple="multiple"></select>
												<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
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
									[daisycon_all_in_one profile_id="' . $base['profile_id'] . '"]
								</div>
								<p class="dc_box_description dc_box_description--no_margin">Succes!</p>';
		}
		echo '</div>';
	}

	public static function frontDaisyconAllInOne($array)
	{
		// Load settings
		$settings = generalDaisyconSettings::generateToolSettings(false === empty($array['profile_id']) ? $array['profile_id'] : '', $array);

		if (true === empty($settings['media_id']) || false === is_numeric($settings['media_id']))
		{
			return 'Ongeldige media id bij "Introductie". Pas uw media id aan.';
		}

		if (false === empty($settings['media_id_custom']) && false === is_numeric($settings['media_id_custom']))
		{
			return 'Ongeldige media id bij "Alles in één". Pas uw media id aan of maak het veld leeg.';
		}

		// Register files
		wp_register_script('daisycon_all_in_one_js', '//daisycon.tools/all-in-one/app.js');

		// Add files to head
		wp_enqueue_script('daisycon_all_in_one_js');

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

		if (false === empty($settings['type']))
		{
			$configuration = array_merge((array)$configuration, (array)['type' => explode(',', $settings['type'])]);
		}

		if (false === empty($settings['connection_type']))
		{
			$configuration = array_merge((array)$configuration, (array)['connectionType' => explode(',', $settings['connection_type'])]);
		}

		if (false === empty($settings['download_speed']))
		{
			$configuration = array_merge((array)$configuration, (array)['downloadSpeed' => explode(',', $settings['download_speed'])]);
		}

		if (false === empty($settings['television_option']))
		{
			$configuration = array_merge((array)$configuration, (array)['televisionOption' => explode(',', $settings['television_option'])]);
		}

		if (false === empty($settings['providers']))
		{
			$configuration = array_merge((array)$configuration, (array)['provider' => explode(',', $settings['providers'])]);
		}

		return "<div class=\"dc-tool dc-all-in-one-tool\" data-config='" . str_replace("'", '&339;', json_encode($configuration)) . "'></div>";
	}
}
?>
