<?php
/* Daisycon prijsvergelijkers
 * File: prefill_energy_nl.php
 *
 * View for the shorttags to be displayed on the website
 *
 */

class generalDaisyconPrefillEnergyNL{

	public static function adminDaisyconPrefillEnergyNL()
	{
		// Load files
		wp_enqueue_style('daisycon.css', esc_url(plugins_url('../assets/css/daisycon.css', __FILE__)));
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/jquery-3.5.1.min.js', __FILE__)) . "\"></script>";
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/daisycon.js', __FILE__)) . "\"></script>";

		// Define base settings
		$base = [
			'color_primary'        => '#3498DB',
			'color_secondary'      => '#FF8201',
			'color_text_primary'   => '#FFFFFF',
			'color_text_secondary' => '#888888',
			'profile_id'           => (false === empty($_POST['profile_id']) ? sanitize_text_field($_POST['profile_id']) : ''),
			'tool_name'            => 'prefill_energy_nl',
		];

		// Check if settings were submitted
		if (false === empty($_POST['dc_submit']))
		{
			$updateSettings = generalDaisyconSettings::updateSettings($base['profile_id'],
				[
					'language'             => [],
					'link'                 => [
						'required' => true,
						'title'    => 'Link',
					],
					'button_text'          => [],
					'color_primary'        => [],
					'color_text_primary'   => [],
					'color_secondary'      => [],
					'color_text_secondary' => [],
					'household'            => [],
					'meter'                => [],
					'solar'                => [],
					'gas'                  => [],
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
								url : 'https://daisycon.tools/api/energy/netherlands/nl-NL/meter?language=nl',
							}
						).then((data) => daisycon_load_select('meter', data, 4, 1, '" . (false === empty($settings['meter']) ? $settings['meter'] : '') . "'));						
					</script>";
		}

		echo '<div class="dc_box">
				<img class="dc_box_header" src="https://static.daisycon.tools/energy-nl/presentation/wp-plugin-daisycon-header.png" alt="Energievergelijker" />
				<p class="dc_box_description">Daisycon heeft exclusief voor haar publishers een gratis prefill energievergelijker ontwikkeld. De tool is eenvoudig te installeren en stelt de bezoekers van jouw website in staat te prefillen alvorens de energievergelijker geladen wordt.</p>
				<h1 class="dc_box_title">Instellingen</h1>';

			// Load profile selection
			generalDaisyconSettings::chooseProfile($base);

			// Now load all available settings
			if (false === empty($base['profile_id']))
			{
				echo '<p class="dc_box_description' . (true === empty($updateSettings['message']) ? ' dc_box_description--no_margin' : '') . '">Door de gegevens in te vullen genereert u op een eenvoudige manier onze prefill energie tool.</p>
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
											<span class="dc_settings_row_value_description">De taal waarin de tool wordt weergegeven.</span>
										</span>								
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Link *</span>
										<span class="dc_settings_row_value">
											<input type="text" name="link" value="' . $settings['link'] . '" maxlength="100"' . (false === empty($updateSettings['notices']['link']) ? ' class="error"' : '') . '>
											<span class="dc_settings_row_value_description">Plaats hier de volledige link naar uw energievergelijker.</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Button tekst</span>
										<span class="dc_settings_row_value">
											<input type="text" name="button_text" placeholder="Berekenen" value="' . $settings['button_text'] . '" maxlength="100">
											<span class="dc_settings_row_value_description">(optioneel) hiermee kunt u de tekst op de button aanpassen.</span>
										</span>
									</li>
								</ul>
								<h2 class="dc_box_subtitle">Kleuren</h2>
								<p class="dc_box_subdescription">U kunt de kleuren van de tool aanpassen. Let op, zorg altijd voor voldoende contrast zodat het niet ten koste gaat van de leesbaarheid.</p>							
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
										<span class="dc_settings_row_name">Primaire tekst kleur</span>
										<span class="dc_settings_row_value">
											<input type="color" name="color_text_primary" value="' . (false === empty($settings['color_text_primary']) ? $settings['color_text_primary'] : $base['color_text_primary']) . '" data-default="' . $base['color_text_primary'] . '">
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
										<span class="dc_settings_row_name">Secundaire tekst kleur</span>
										<span class="dc_settings_row_value">
											<input type="color" name="color_text_secondary" value="' . (false === empty($settings['color_text_secondary']) ? $settings['color_text_secondary'] : $base['color_text_secondary']) . '" data-default="' . $base['color_text_secondary'] . '">
											<input type="button" name="reset_color" class="dc_settings_row_value_reset_color" value="Reset">
											<span class="dc_settings_row_value_description">(optioneel)</span>
										</span>								
									</li>
								</ul>												
								<h2 class="dc_box_subtitle">Prefill</h2>
									<p class="dc_box_subdescription">U kunt een voorkeur aangeven voor wat standaard geselecteerd is.</p>
									<ul class="dc_list">
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Samenstelling huishouden</span>
											<span class="dc_settings_row_value">
												<select name="household">
													<option value=""' . (true === empty($settings['household']) ? ' selected="selected"' : '') . '>Geen voorkeur</option>
													<option value="1"' . (false === empty($settings['household']) && '1' === $settings['household'] ? ' selected="selected"' : '') . '>1 persoon</option>
													<option value="2"' . (false === empty($settings['household']) && '2' === $settings['household'] ? ' selected="selected"' : '') . '>2 personen</option>
													<option value="3"' . (false === empty($settings['household']) && '3' === $settings['household'] ? ' selected="selected"' : '') . '>3 personen</option>
													<option value="4"' . (false === empty($settings['household']) && '4' === $settings['household'] ? ' selected="selected"' : '') . '>4 personen</option>
													<option value="5"' . (false === empty($settings['household']) && '5' === $settings['household'] ? ' selected="selected"' : '') . '>5 personen</option>
												</select>
												<span class="dc_settings_row_value_description">(optioneel)</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Meter</span>
											<span class="dc_settings_row_value">
												<select name="meter">
													<option value=""' . (true === empty($settings['meter']) ? ' selected="selected"' : '') . '>Geen voorkeur</option>
												</select>
												<span class="dc_settings_row_value_description">(optioneel)</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Zonnepanelen</span>
											<span class="dc_settings_row_value">
												<select name="solar">
													<option value=""' . (true === empty($settings['solar']) ? ' selected="selected"' : '') . '>Geen voorkeur</option>
													<option value="show"' . (false === empty($settings['solar']) && 'show' === $settings['solar'] ? ' selected="selected"' : '') . '>Tonen</option>
													<option value="hide"' . (false === empty($settings['solar']) && 'hide' === $settings['solar'] ? ' selected="selected"' : '') . '>Verbergen</option>
												</select>
												<span class="dc_settings_row_value_description">(optioneel)</span>
											</span>
										</li>
										<li class="dc_list_item">
											<span class="dc_settings_row_name">Gas</span>
											<span class="dc_settings_row_value">
												<select name="gas">
													<option value=""' . (true === empty($settings['gas']) ? ' selected="selected"' : '') . '>Geen voorkeur</option>
													<option value="show"' . (false === empty($settings['gas']) && 'show' === $settings['gas'] ? ' selected="selected"' : '') . '>Tonen</option>
													<option value="hide"' . (false === empty($settings['gas']) && 'hide' === $settings['gas'] ? ' selected="selected"' : '') . '>Verbergen</option>
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
									[daisycon_prefill_energy_nl profile_id="' . $base['profile_id'] . '"]
								</div>
								<p class="dc_box_description dc_box_description--no_margin">Succes!</p>';
			}
		echo '</div>';
	}

	public static function frontDaisyconPrefillEnergyNL($array)
	{
		// Load settings
		$settings = generalDaisyconSettings::generateToolSettings(false === empty($array['profile_id']) ? $array['profile_id'] : '', $array);

		if (true === empty($settings['media_id']) || false === is_numeric($settings['media_id']))
		{
			return 'Ongeldige media id. Pas uw media id aan.';
		}

		// Register files
		wp_register_script('daisycon_prefill_energy_nl_js', '//daisycon.tools/prefill-energy-nl/app.js');

		// Add files to head
		wp_enqueue_script('daisycon_prefill_energy_nl_js');

		$configuration = [
			'mediaId'  => [
				'daisycon' => $settings['media_id'],
			],
			'locale'   => 'nl-NL',
			'language' => $settings['language'],
		];

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

		if (false === empty($settings['link']))
		{
			$configuration = array_merge((array)$configuration, (array)['link' => $settings['link']]);
		}

		if (false === empty($settings['household']))
		{
			$configuration = array_merge((array)$configuration, (array)['household' => explode(',', $settings['household'])]);
		}

		if (false === empty($settings['meter']))
		{
			$configuration = array_merge((array)$configuration, (array)['meter' => explode(',', $settings['meter'])]);
		}

		if (false === empty($settings['solar']))
		{
			$configuration = array_merge((array)$configuration, (array)['solar' => 'show' === $settings['solar'] ? 1 : 0]);
		}

		if (false === empty($settings['gas']))
		{
			$configuration = array_merge((array)$configuration, (array)['gas' => 'show' === $settings['gas'] ? 1 : 0]);
		}

		return "<div class=\"dc-tool dc-prefill-energy-tool\" data-config='" . str_replace("'", '&339;', json_encode($configuration)) . "'></div>";
	}
}
?>
