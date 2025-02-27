<?php
/* Daisycon prijsvergelijkers
 * File: wine.php
 *
 * View for the shorttags to be displayed on the website
 *
 */

class generalDaisyconWine
{
	public static function adminDaisyconWine()
	{
		// Load files
		wp_enqueue_style('daisycon.css', esc_url(plugins_url('../assets/css/daisycon.css', __FILE__)));
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/jquery-3.5.1.min.js', __FILE__)) . "\"></script>";
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/daisycon.js', __FILE__)) . "\"></script>";

		// Define base settings
		$base = [
			'buttonText'                        => 'Bekijken',
			'color_primary'                     => '#3498DB',
			'color_secondary'                   => '#FF8201',
			'color_text_primary'                => '#626262',
			'color_text_secondary'              => '#888888',
			'filter_alcohol_percentage_enabled' => ['yes'],
			'filter_alcohol_percentage_value'   => [],
			'filter_category_enabled'           => ['yes'],
			'filter_category_value'             => [],
			'filter_country_enabled'            => ['yes'],
			'filter_country_value'              => [],
			'filter_grape_enabled'              => ['yes'],
			'filter_grape_value'                => [],
			'filter_price'                      => [],
			'filter_price_enabled'              => ['yes'],
			'filter_price_max'                  => [],
			'filter_price_min'                  => [],
			'filter_taste_enabled'              => ['yes'],
			'filter_taste_value'                => [],
			'filter_year'                       => [],
			'filter_year_enabled'               => ['yes'],
			'filter_year_max'                   => [],
			'filter_year_min'                   => [],
			'language'                          => 'nl',
			'locale'                            => 'nl-NL',
			'profile_id'                        => (false === empty($_POST['profile_id']) ? sanitize_text_field($_POST['profile_id']) : ''),
			'show_filters'                      => ['yes'],
			'tool_name'                         => 'wine',
		];

		// Check if settings were submitted
		if (false === empty($_POST['dc_submit']))
		{
			$updateSettings = generalDaisyconSettings::updateSettings($base['profile_id'],
				[
					'button_text'                       => [],
					'color_primary'                     => [],
					'color_secondary'                   => [],
					'color_text_primary'                => [],
					'color_text_secondary'              => [],
					'filter_alcohol_percentage_enabled' => [],
					'filter_alcohol_percentage_value'   => [],
					'filter_category_enabled'           => [],
					'filter_category_value'             => [],
					'filter_country_enabled'            => [],
					'filter_country_value'              => [],
					'filter_grape_enabled'              => [],
					'filter_grape_value'                => [],
					'filter_price'                      => [],
					'filter_price_enabled'              => [],
					'filter_price_max'                  => [],
					'filter_price_min'                  => [],
					'filter_taste_enabled'              => [],
					'filter_taste_value'                => [],
					'filter_year'                       => [],
					'filter_year_enabled'               => [],
					'filter_year_max'                   => [],
					'filter_year_min'                   => [],
					'language'                          => [],
					'locale'                            => [],
					'media_id_custom'                   => [],
					'show_filters'                      => [],
					'sub_id'                            => [],
				]
			);
		}

		// If profile has been loaded, then extra loads are required
		if (false === empty($base['profile_id']))
		{
			// Load settings
			$settings = generalDaisyconSettings::generateToolSettings($base['profile_id'], $base);

			// Check (default) settings
			$settings['locale'] = false === empty($settings['locale']) ? $settings['locale'] : $base['locale'];
			$settings['language'] = false === empty($settings['language']) ? $settings['language'] : $base['language'];
			$settings['show_filters'] = false === empty($settings['show_filters']) ? $settings['show_filters'] : $base['show_filters'];
			$settings['filter_alcohol_percentage_enabled'] = false === empty($settings['filter_alcohol_percentage_enabled']) ? $settings['filter_alcohol_percentage_enabled'] : $base['filter_alcohol_percentage_enabled'];
			$settings['filter_alcohol_percentage_value'] = false === empty($settings['filter_alcohol_percentage_value']) ? $settings['filter_alcohol_percentage_value'] : $base['filter_alcohol_percentage_value'];
			$settings['filter_category_enabled'] = false === empty($settings['filter_category_enabled']) ? $settings['filter_category_enabled'] : $base['filter_category_enabled'];
			$settings['filter_category_value'] = false === empty($settings['filter_category_value']) ? $settings['filter_category_value'] : $base['filter_category_value'];
			$settings['filter_country_enabled'] = false === empty($settings['filter_country_enabled']) ? $settings['filter_country_enabled'] : $base['filter_country_enabled'];
			$settings['filter_country_value'] = false === empty($settings['filter_country_value']) ? $settings['filter_country_value'] : $base['filter_country_value'];
			$settings['filter_taste_enabled'] = false === empty($settings['filter_taste_enabled']) ? $settings['filter_taste_enabled'] : $base['filter_taste_enabled'];
			$settings['filter_taste_value'] = false === empty($settings['filter_taste_value']) ? $settings['filter_taste_value'] : $base['filter_taste_value'];
			$settings['filter_grape_enabled'] = false === empty($settings['filter_grape_enabled']) ? $settings['filter_grape_enabled'] : $base['filter_grape_enabled'];
			$settings['filter_grape_value'] = false === empty($settings['filter_grape_value']) ? $settings['filter_grape_value'] : $base['filter_grape_value'];
			$settings['filter_year'] = false === empty($settings['filter_year']) ? $settings['filter_year'] : $base['filter_year'];
			$settings['filter_year_enabled'] = false === empty($settings['filter_year_enabled']) ? $settings['filter_year_enabled'] : $base['filter_year_enabled'];
			$settings['filter_year_max'] = false === empty($settings['filter_year_max']) ? $settings['filter_year_max'] : $base['filter_year_max'];
			$settings['filter_year_min'] = false === empty($settings['filter_year_min']) ? $settings['filter_year_min'] : $base['filter_year_min'];
			$settings['filter_price'] = false === empty($settings['filter_price']) ? $settings['filter_price'] : $base['filter_price'];
			$settings['filter_price_enabled'] = false === empty($settings['filter_price_enabled']) ? $settings['filter_price_enabled'] : $base['filter_price_enabled'];
			$settings['filter_price_max'] = false === empty($settings['filter_price_max']) ? $settings['filter_price_max'] : $base['filter_price_max'];
			$settings['filter_price_min'] = false === empty($settings['filter_price_min']) ? $settings['filter_price_min'] : $base['filter_price_min'];

			echo "<script type=\"text/javascript\">
						processData(
							{
								url : 'https://daisycon.tools/api/wine/" . $settings['locale'] . "/products?language=" . $settings['language'] . "',
							}
						).then(function (data) {

							if (undefined !== data.aggregations) {
							
								let category = data.aggregations.category;
								let country  = data.aggregations.wine_country;
								let grape    = data.aggregations.wine_grape;
								let price    = data.aggregations.lowest_price;
								let taste    = data.aggregations.taste;
								let year     = data.aggregations.wine_year;

								daisycon_load_select('filter_category_value[]', category, 3, 0, '" . (false === empty($settings['filter_category_value']) ? $settings['filter_category_value'] : '') . "');
								daisycon_load_select('filter_country_value[]', country, 3, 0, '" . (false === empty($settings['filter_country_value']) ? $settings['filter_country_value'] : '') . "');
								daisycon_load_select('filter_grape_value[]', grape, 3, 0, '" . (false === empty($settings['filter_grape_value']) ? $settings['filter_grape_value'] : '') . "');
								daisycon_load_input('filter_price_min[]', price, 'min', '" . (false === empty($settings['filter_price_min']) || true === isset($settings['filter_price_min']) && '0' === $settings['filter_price_min'] ? $settings['filter_price_min'] : '') . "');
								daisycon_load_input('filter_price_max[]', price, 'max', '" . (false === empty($settings['filter_price_max']) ? $settings['filter_price_max'] : '') . "');
								daisycon_load_select('filter_taste_value[]', taste, 3, 0, '" . (false === empty($settings['filter_taste_value']) ? $settings['filter_taste_value'] : '') . "');
								daisycon_load_input('filter_year_min[]', year, 'min', '" . (false === empty($settings['filter_year_min']) || true === isset($settings['filter_year_min']) && '0' === $settings['filter_year_min'] ? $settings['filter_year_min'] : '') . "');
								daisycon_load_input('filter_year_max[]', year, 'max', '" . (false === empty($settings['filter_year_max']) ? $settings['filter_year_max'] : '') . "');
							}
							else {
								alert('De filters kunnen niet worden geladen. Laad uw profiel alstublieft opnieuw of wijzig uw platform en/of taal naar Nederland(s).');
							}
						});
					</script>";
		}

		echo '<div class="dc_box">
				<img class="dc_box_header" src="' . esc_url(plugins_url('../assets/img/header_wine.png', __FILE__)) . '" alt="Wijn vergelijker" />
				<p class="dc_box_description">Daisycon heeft exclusief voor haar publishers een gratis Wijn vergelijker ontwikkeld. Met deze tool kunnen jouw bezoekers wijnen laten zoeken die het best aansluiten op hun smaakprofiel. <a href="https://www.daisycon.com/nl/vergelijkers/wijn-vergelijker/" target="_blank">Klik hier om de demowebsite te bekijken</a>.</p>
				<h1 class="dc_box_title">Instellingen</h1>';

		// Load profile selection
		generalDaisyconSettings::chooseProfile($base);

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
											<select name="locale">
												<option value="dk-DK"' . ('dk-DK' === $settings['locale'] ? 'selected="selected"' : '') . '>Denemarken</option>
												<option value="nl-NL"' . ('dk-DK' !== $settings['locale'] ? 'selected="selected"' : '') . '>Nederland</option>
											</select>
											<span class="dc_settings_row_value_description">Het platform van de vergelijker.</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Taal *</span>
										<span class="dc_settings_row_value">
											<select name="language">
												<option value="da"' . ('da' === $settings['language'] ? 'selected="selected"' : '') . '>Deens</option>
												<option value="en"' . ('en' === $settings['language'] ? 'selected="selected"' : '') . '>Engels</option>
												<option value="nl"' . ('da' !== $settings['language'] && 'en' !== $settings['language'] ? 'selected="selected"' : '') . '>Nederlands</option>
											</select>
											<span class="dc_settings_row_value_description">De taal waarin de vergelijker wordt weergegeven.</span>
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
								<p class="dc_box_subdescription">U kunt hier filters verbergen, maar ook een voorkeur aangeven voor wat standaard geselecteerd zal zijn.</p>								
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
										<span class="dc_settings_row_name">Alcohol percentage</span>
										<span class="dc_settings_row_value">
											<select class="dc_settings_row_value--marginBottom" name="filter_alcohol_percentage_enabled[]">
												<option value="yes"' . ('yes' === $settings['filter_alcohol_percentage_enabled'] ? 'selected="selected"' : '') . '>Toon</option>
												<option value="no"' . ('no' === $settings['filter_alcohol_percentage_enabled'] ? 'selected="selected"' : '') . '>Verberg</option>
											</select><br>
											<select name="filter_alcohol_percentage_value[]">
												<option value=""' . ('' === $settings['filter_alcohol_percentage_value'] ? 'selected="selected"' : '') . '>Geen voorkeur</option>
												<option value="0"' . ('0' === $settings['filter_alcohol_percentage_value'] ? 'selected="selected"' : '') . '>Alcoholvrij</option>
											</select>
											<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Categorie</span>
										<span class="dc_settings_row_value">
											<select class="dc_settings_row_value--marginBottom" name="filter_category_enabled[]">
												<option value="yes"' . ('yes' === $settings['filter_category_enabled'] ? 'selected="selected"' : '') . '>Toon</option>
												<option value="no"' . ('no' === $settings['filter_category_enabled'] ? 'selected="selected"' : '') . '>Verberg</option>
											</select><br>
											<select name="filter_category_value[]" multiple="multiple"></select>
											<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Land</span>
										<span class="dc_settings_row_value">
											<select class="dc_settings_row_value--marginBottom" name="filter_country_enabled[]">
												<option value="yes"' . ('yes' === $settings['filter_country_enabled'] ? 'selected="selected"' : '') . '>Toon</option>
												<option value="no"' . ('no' === $settings['filter_country_enabled'] ? 'selected="selected"' : '') . '>Verberg</option>
											</select><br>
											<select name="filter_country_value[]" multiple="multiple"></select>
											<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Druif</span>
										<span class="dc_settings_row_value">
											<select class="dc_settings_row_value--marginBottom" name="filter_grape_enabled[]">
												<option value="yes"' . ('yes' === $settings['filter_grape_enabled'] ? 'selected="selected"' : '') . '>Toon</option>
												<option value="no"' . ('no' === $settings['filter_grape_enabled'] ? 'selected="selected"' : '') . '>Verberg</option>
											</select><br>
											<select name="filter_grape_value[]" multiple="multiple"></select>
											<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Prijs</span>
										<span class="dc_settings_row_value">
											<select class="dc_settings_row_value--marginBottom" name="filter_price_enabled[]">
												<option value="yes"' . ('yes' === $settings['filter_price_enabled'] ? 'selected="selected"' : '') . '>Toon</option>
												<option value="no"' . ('no' === $settings['filter_price_enabled'] ? 'selected="selected"' : '') . '>Verberg</option>
											</select><br>
											<select class="dc_settings_row_value--marginBottom" name="filter_price">
												<option value="general"' . ('specific' !== $settings['filter_price'] ? 'selected="selected"' : '') . '>Geen voorkeur</option>
												<option value="specific"' . ('specific' === $settings['filter_price'] ? 'selected="selected"' : '') . '>Onderstaande range</option>
											</select><br>
											<input type="number" name="filter_price_min[]" value=""> t/m <input type="number" name="filter_price_max[]" value="">
											<span class="dc_settings_row_value_description">Alleen van toepassing bij keuze "range"</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Smaak</span>
										<span class="dc_settings_row_value">
											<select class="dc_settings_row_value--marginBottom" name="filter_taste_enabled[]">
												<option value="yes"' . ('yes' === $settings['filter_taste_enabled'] ? 'selected="selected"' : '') . '>Toon</option>
												<option value="no"' . ('no' === $settings['filter_taste_enabled'] ? 'selected="selected"' : '') . '>Verberg</option>
											</select><br>
											<select name="filter_taste_value[]" multiple="multiple"></select>
											<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Jaar</span>
										<span class="dc_settings_row_value">
											<select class="dc_settings_row_value--marginBottom" name="filter_year_enabled[]">
												<option value="yes"' . ('yes' === $settings['filter_year_enabled'] ? 'selected="selected"' : '') . '>Toon</option>
												<option value="no"' . ('no' === $settings['filter_year_enabled'] ? 'selected="selected"' : '') . '>Verberg</option>
											</select><br>
											<select class="dc_settings_row_value--marginBottom" name="filter_year">
												<option value="general"' . ('specific' !== $settings['filter_year'] ? 'selected="selected"' : '') . '>Geen voorkeur</option>
												<option value="specific"' . ('specific' === $settings['filter_year'] ? 'selected="selected"' : '') . '>Onderstaande range</option>
											</select><br>

											<input type="number" name="filter_year_min[]" value=""> t/m <input type="number" name="filter_year_max[]" value="">
											<span class="dc_settings_row_value_description">Alleen van toepassing bij keuze "range"</span>
										</span>
									</li>
								</ul>
								<input class="dc_settings_button" type="submit" name="dc_submit" id="dc_submit" value="Opslaan">
							</form>
							<h1 class="dc_box_title">Gebruik</h1>
							<p class="dc_box_description">Plak onderstaande shorttag in je blogpost of pagina en de vergelijker verschijnt direct op je website.</p>
							<div class="dc_shorttag" onclick="daisycon_select_all(this)">
								[daisycon_wine profile_id="' . $base['profile_id'] . '"]
							</div>
							<p class="dc_box_description dc_box_description--no_margin">Succes!</p>';
		}
		echo '</div>';
	}

	public static function frontDaisyconWine($array)
	{
		// Load settings
		$settings = generalDaisyconSettings::generateToolSettings(false === empty($array['profile_id']) ? $array['profile_id'] : '', $array);

		if (true === empty($settings['media_id']) || false === is_numeric($settings['media_id']))
		{
			return 'Ongeldige media id bij "Introductie". Pas uw media id aan.';
		}

		if (false === empty($settings['media_id_custom']) && false === is_numeric($settings['media_id_custom']))
		{
			return 'Ongeldige media id bij "Wijn". Pas uw media id aan of maak het veld leeg.';
		}

		// Register files
		wp_register_script('daisycon_wine_js', '//daisycon.tools/wine/app.js');

		// Add files to head
		wp_enqueue_script('daisycon_wine_js');

		$configuration = [
			'mediaId'  => [
				'daisycon' => (int)(false === empty($settings['media_id_custom']) ? $settings['media_id_custom'] : $settings['media_id']),
			],
			'locale'   => 'nl-NL',
			'language' => $settings['language'],
			'filter'   => [
				'alcoholPercentage' => [
					'enabled' => (true === isset($settings['filter_alcohol_percentage_enabled']) && 'no' === $settings['filter_alcohol_percentage_enabled'] ? false : true),
				],
				'category'          => [
					'enabled' => (true === isset($settings['filter_category_enabled']) && 'no' === $settings['filter_category_enabled'] ? false : true),
				],
				'country'           => [
					'enabled' => (true === isset($settings['filter_country_enabled']) && 'no' === $settings['filter_country_enabled'] ? false : true),
				],
				'grape'             => [
					'enabled' => (true === isset($settings['filter_grape_enabled']) && 'no' === $settings['filter_grape_enabled'] ? false : true),
				],
				'price'             => [
					'enabled' => (true === isset($settings['filter_price_enabled']) && 'no' === $settings['filter_price_enabled'] ? false : true),
				],
				'taste'             => [
					'enabled' => (true === isset($settings['filter_taste_enabled']) && 'no' === $settings['filter_taste_enabled'] ? false : true),
				],
				'year'              => [
					'enabled' => (true === isset($settings['filter_year_enabled']) && 'no' === $settings['filter_year_enabled'] ? false : true),
				],
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

		if (false === empty($settings['filter_alcohol_percentage_value']) || (isset($settings['filter_alcohol_percentage_value']) && '0' === $settings['filter_alcohol_percentage_value']))
		{
			$configuration['filter']['alcoholPercentage'] = array_merge((array)$configuration['filter']['alcoholPercentage'], (array)['value' => explode(',', $settings['filter_alcohol_percentage_value'])]);
		}

		if (false === empty($settings['filter_category_value']))
		{
			$configuration['filter']['category'] = array_merge((array)$configuration['filter']['category'], (array)['value' => explode(',', $settings['filter_category_value'])]);
		}

		if (false === empty($settings['filter_country_value']))
		{
			$configuration['filter']['country'] = array_merge((array)$configuration['filter']['country'], (array)['value' => explode(',', $settings['filter_country_value'])]);
		}

		if (false === empty($settings['filter_grape_value']))
		{
			$configuration['filter']['grape'] = array_merge((array)$configuration['filter']['grape'], (array)['value' => explode(',', $settings['filter_grape_value'])]);
		}

		if (false === empty($settings['filter_price']) && 'specific' === $settings['filter_price'] && (false === empty($settings['filter_price_min']) || (isset($settings['filter_price_min']) && '0' === $settings['filter_price_min'])) && false === empty($settings['filter_price_max']))
		{
			$configuration['filter']['price'] = array_merge((array)$configuration['filter']['price'], (array)[
				'max' => explode(',', $settings['filter_price_max']),
				'min' => explode(',', $settings['filter_price_min']),
			]);
		}

		if (false === empty($settings['filter_taste_value']))
		{
			$configuration['filter']['taste'] = array_merge((array)$configuration['filter']['taste'], (array)['value' => explode(',', $settings['filter_taste_value'])]);
		}

		if (false === empty($settings['filter_year']) && 'specific' === $settings['filter_year'] && (false === empty($settings['filter_year_min']) || (isset($settings['filter_year_min']) && '0' === $settings['filter_year_min'])) && false === empty($settings['filter_year_max']))
		{
			$configuration['filter']['year'] = array_merge((array)$configuration['filter']['year'], (array)[
				'max' => explode(',', $settings['filter_year_max']),
				'min' => explode(',', $settings['filter_year_min']),
			]);
		}

		return "<div class=\"dc-tool dc-wine-tool\" data-config='" . str_replace("'", '&339;', json_encode($configuration)) . "'></div>";
	}
}
