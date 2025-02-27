<?php
/* Daisycon prijsvergelijkers
 * File: dating.php
 *
 * View for the shorttags to be displayed on the website
 *
 */

class generalDaisyconDating{

	public static function adminDaisyconDating()
	{
		// Load files
		wp_enqueue_style('daisycon.css', esc_url(plugins_url('../assets/css/daisycon.css', __FILE__)));
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/jquery-3.5.1.min.js', __FILE__)) . "\"></script>";
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/daisycon.js', __FILE__)) . "\"></script>";

		// Define base settings
		$base = [
			'color_primary'        => '#3498DB',
			'color_secondary'      => '#FF8201',
			'limit'                => '100',
			'profile_id'           => (false === empty($_POST['profile_id']) ? sanitize_text_field($_POST['profile_id']) : ''),
			'show_filters'         => ['yes'],
			'tool_name'            => 'dating',
		];

		// Check if settings were submitted
		if (false === empty($_POST['dc_submit']))
		{
			$updateSettings = generalDaisyconSettings::updateSettings($base['profile_id'],
				[
					'ages'                => [],
					'button_text'         => [],
					'categories'          => [],
					'color_primary'       => [],
					'color_secondary'     => [],
					'intentions'          => [],
					'limit'               => [],
					'locale'              => [],
					'media_id_custom'     => [],
					'options'             => [],
					'show_filters'        => [],
					'sub_id'              => [],
					'targets'             => [],
					'xpartners_id_custom' => [],
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
								url : 'https://daisycon.tools/api/dating/nl-NL/locale?language=nl',
							}
						).then((data) => daisycon_load_select('locale', data, 4, 1, '" . (false === empty($settings['locale']) ? $settings['locale'] : 'nl-NL') . "'));

						processData(
							{
								url : 'https://daisycon.tools/api/dating/targets/nl-NL',
							}
						).then((data) => daisycon_load_select('targets[]', data, 0, 2, '" . (false === empty($settings['targets']) ? $settings['targets'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/dating/ages/nl-NL',
							}
						).then((data) => daisycon_load_select('ages[]', data, 0, 2, '" . (false === empty($settings['ages']) ? $settings['ages'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/dating/categories/nl-NL',
							}
						).then((data) => daisycon_load_select('categories[]', data, 0, 2, '" . (false === empty($settings['categories']) ? $settings['categories'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/dating/intentions/nl-NL',
							}
						).then((data) => daisycon_load_select('intentions[]', data, 0, 2, '" . (false === empty($settings['intentions']) ? $settings['intentions'] : '') . "'));
						
						processData(
							{
								url : 'https://daisycon.tools/api/dating/options/nl-NL',
							}
						).then((data) => daisycon_load_select('options[]', data, 0, 2, '" . (false === empty($settings['options']) ? $settings['options'] : '') . "'));
						
					</script>";
		}

		echo '<div class="dc_box">
				<img class="dc_box_header" src="https://static.daisycon.tools/dating/presentation/wp-plugin-daisycon-header.png" alt="Datingsitevergelijker" />
				<p class="dc_box_description">Daisycon heeft exclusief voor haar publishers een gratis datingsitevergelijker ontwikkeld. De tool is eenvoudig te installeren en stelt de bezoekers van jouw website in staat een groot aanbod van dating websites te bekijken en vergelijken. <a href="https://www.daisycon.com/nl/vergelijkers/datingsitevergelijker/" target="_blank">Klik hier om de demowebsite te bekijken</a></p>
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
										<span class="dc_settings_row_value_description">Hiermee bepaalt u uit welk land u datingsites wilt tonen.</span>
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
											(optioneel) indien leeg wordt het media id van "Introductie" gebruikt, indien gevuld
										</span>
									</span>								
								</li>
								<li class="dc_list_item">
									<span class="dc_settings_row_name">Xpartners ID</span>
									<span class="dc_settings_row_value">
										<input type="text" name="xpartners_id_custom" value="' . $settings['xpartners_id_custom'] . '">
										<span class="dc_settings_row_value_description">
											(optioneel) indien leeg wordt het xpartners id van "Introductie" gebruikt, indien gevuld
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
									<span class="dc_settings_row_name">Actie kleur</span>
									<span class="dc_settings_row_value">
										<input type="color" name="color_secondary" value="' . (false === empty($settings['color_secondary']) ? $settings['color_secondary'] : $base['color_secondary']) . '" data-default="' . $base['color_secondary'] . '">
										<input type="button" name="reset_color" class="dc_settings_row_value_reset_color" value="Reset">							
										<span class="dc_settings_row_value_description">(optioneel)</span>
									</span>								
								</li>
							</ul>							
							<h2 class="dc_box_subtitle">Filters</h2>
								<p class="dc_box_subdescription">U kunt een voorkeur aangeven voor het filter wat standaard geselecteerd is. <i>gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</i></p>
								<ul class="dc_list">
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Toon filters</span>
										<span class="dc_settings_row_value">
											<select name="show_filters">
												<option value="">Geen voorkeur</option>
												<option value="yes"' . ('yes' === $settings['show_filters'] ? 'selected="selected"' : '') . '>Ja</option>
												<option value="no"' . ('no' === $settings['show_filters'] ? 'selected="selected"' : '') . '>Nee</option>
											</select>
											<span class="dc_settings_row_value_description">(optioneel)</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Doelgroep</span>
										<span class="dc_settings_row_value">
											<select name="targets[]" multiple="multiple">
												<option value=""' . (true === empty($settings['targets']) ? ' selected="selected"' : '') . '>Geen voorkeur</option>
											</select>
											<span class="dc_settings_row_value_description">(optioneel)</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Doel leeftijd</span>
										<span class="dc_settings_row_value">
											<select name="ages[]" multiple="multiple">
												<option value=""' . (true === empty($settings['ages']) ? ' selected="selected"' : '') . '>Geen voorkeur</option>
											</select>
											<span class="dc_settings_row_value_description">(optioneel)</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Categorieën</span>
										<span class="dc_settings_row_value">
											<select name="categories[]" multiple="multiple">
												<option value=""' . (true === empty($settings['categories']) ? ' selected="selected"' : '') . '>Geen voorkeur</option>
											</select>
											<span class="dc_settings_row_value_description">(optioneel)</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Intenties</span>
										<span class="dc_settings_row_value">
											<select name="intentions[]" multiple="multiple">
												<option value=""' . (true === empty($settings['intentions']) ? ' selected="selected"' : '') . '>Geen voorkeur</option>
											</select>
											<span class="dc_settings_row_value_description">(optioneel)</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Opties</span>
										<span class="dc_settings_row_value">
											<select name="options[]" multiple="multiple">
												<option value=""' . (true === empty($settings['options']) ? ' selected="selected"' : '') . '>Geen voorkeur</option>
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
								[daisycon_dating profile_id="' . $base['profile_id'] . '"]
							</div>
							<p class="dc_box_description dc_box_description--no_margin">Succes!</p>';
				}
		echo '</div>';
	}

	public static function frontDaisyconDating($array)
	{
		// Load settings
		$settings = generalDaisyconSettings::generateToolSettings(false === empty($array['profile_id']) ? $array['profile_id'] : '', $array);

		if (true === empty($settings['media_id']) && true === empty($settings['xpartners_id']))
		{
			return 'Er is geen Media ID én geen Xpartners ID ingevuld, minimaal één van beide is nodig om de tool te kunnen gebruiken.';
		}
		else {
			if (false === empty($settings['media_id']) && false === is_numeric($settings['media_id']))
			{
				return 'Er is een ongeldige media id bij "Introductie" ingevuld.';
			}

			if (false === empty($settings['xpartners_id']) && false === is_numeric($settings['xpartners_id']))
			{
				return 'Er is een ongeldige xpartners id bij "Introductie" ingevuld.';
			}
		}

		if (false === empty($settings['media_id_custom']) && false === is_numeric($settings['media_id_custom']))
		{
			return 'Ongeldige media id bij "Dating". Pas uw media id aan of maak het veld leeg.';
		}

		if (false === empty($settings['xpartners_id_custom']) && false === is_numeric($settings['xpartners_id_custom']))
		{
			return 'Ongeldige xpartners id bij "Dating". Pas uw xpartners id aan of maak het veld leeg.';
		}

		// Register files
		wp_register_script('daisycon_dating_js', '//daisycon.tools/dating/app.js');

		// Add files to head
		wp_enqueue_script('daisycon_dating_js');

		$configuration = [
			'mediaId'     => [],
			'locale'      => (false === empty($settings['locale']) ? $settings['locale'] : 'nl-NL'),
			'limit'       => (false === empty($settings['limit']) ? intval($settings['limit']) : '100'),
			'showFilters' => (true === isset($settings['show_filters']) && 'no' === $settings['show_filters'] ? false : true),
		];

		if (false === empty($settings['media_id']) || false === empty($settings['media_id_custom']))
		{
			$configuration['mediaId'] += ['daisycon' => (int)(false === empty($settings['media_id_custom']) ? $settings['media_id_custom'] : $settings['media_id'])];
		}

		if (false === empty($settings['xpartners_id']) || false === empty($settings['xpartners_id_custom']))
		{
			$configuration['mediaId'] += ['xpartners' => (int)(false === empty($settings['xpartners_id_custom']) ? $settings['xpartners_id_custom'] : $settings['xpartners_id'])];
		}

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

		if (false === empty($settings['color_secondary']))
		{
			$configuration = array_merge((array)$configuration, (array)['colorSecondary' => $settings['color_secondary']]);
		}

		if (false === empty($settings['targets']))
		{
			$configuration = array_merge((array)$configuration, (array)['targetId' => explode(',', $settings['targets'])]);
		}

		if (false === empty($settings['ages']))
		{
			$configuration = array_merge((array)$configuration, (array)['ageId' => explode(',', $settings['ages'])]);
		}

		if (false === empty($settings['categories']))
		{
			$configuration = array_merge((array)$configuration, (array)['categoryId' => explode(',', $settings['categories'])]);
		}

		if (false === empty($settings['intentions']))
		{
			$configuration = array_merge((array)$configuration, (array)['intentionId' => explode(',', $settings['intentions'])]);
		}

		if (false === empty($settings['options']))
		{
			$configuration = array_merge((array)$configuration, (array)['optionId' => explode(',', $settings['options'])]);
		}

		return "<div class=\"dc-tool dc-dating-tool\" data-config='" . str_replace("'", '&339;', json_encode($configuration)) . "'></div>";
	}
}
?>
