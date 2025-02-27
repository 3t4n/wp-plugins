<?php
/* Daisycon prijsvergelijkers
 * File: energy_be.php
 *
 * View for the shorttags to be displayed on the website
 *
 */

class generalDaisyconEnergyBE {

	public static function adminDaisyconEnergyBE()
	{
		// Load files
		wp_enqueue_style('daisycon.css', esc_url(plugins_url('../assets/css/daisycon.css', __FILE__)));
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/jquery-3.5.1.min.js', __FILE__)) . "\"></script>";
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/daisycon.js', __FILE__)) . "\"></script>";

		// Define base settings
		$base = [
			'color_primary'                                   => '#3498DB',
			'color_secondary'                                 => '#FF8201',
			'color_text_primary'                              => '#626262',
			'color_text_secondary'                            => '#888888',
			'filter_sustainability_electricity_level_enabled' => ['yes'],
			'filter_sustainability_electricity_level_value'   => [],
			'filter_sustainability_gas_level_enabled'         => ['yes'],
			'filter_sustainability_gas_level_value'           => [],
			'filter_duration_enabled'                         => ['yes'],
			'filter_duration_value'                           => [],
			'filter_providers_enabled'                        => ['yes'],
			'filter_providers_value'                          => [],
			'filter_locale_enabled'                           => ['yes'],
			'filter_locale_value'                             => [],
			'filter_energy_meter_enabled'                     => ['yes'],
			'filter_energy_meter_value'                       => [],
			'filter_tariff_sort_enabled'                      => ['yes'],
			'filter_tariff_sort_value'                        => [],
			'filter_tariff_type_enabled'                      => ['yes'],
			'filter_tariff_type_value'                        => [],
			'limit'                                           => '25',
			'limit_split'                                     => '8',
			'locale'                                          => 'nl-NL',
			'profile_id'                                      => (false === empty($_POST['profile_id']) ? sanitize_text_field($_POST['profile_id']) : ''),
			'show_filters'                                    => ['yes'],
			'tool_name'                                       => 'energy_be',
		];

		// Check if settings were submitted
		if (false === empty($_POST['dc_submit']))
		{
			$updateSettings = generalDaisyconSettings::updateSettings($base['profile_id'],
				[
					'buttonText'                                      => [],
					'color_in_primary'                                => [],
					'color_in_secondary'                              => [],
					'color_primary'                                   => [],
					'color_secondary'                                 => [],
					'color_text_primary'                              => [],
					'color_text_secondary'                            => [],
					'filter_sustainability_electricity_level_enabled' => [],
					'filter_sustainability_electricity_level_value'   => [],
					'filter_sustainability_gas_level_enabled'         => [],
					'filter_sustainability_gas_level_value'           => [],
					'filter_duration_enabled'                         => [],
					'filter_duration_value'                           => [],
					'filter_providers_enabled'                        => [],
					'filter_providers_value'                          => [],
					'filter_locale_enabled'                           => ['yes'],
					'filter_locale_value'                             => [],
					'filter_energy_meter_enabled'                     => [],
					'filter_energy_meter_value'                       => [],
					'filter_tariff_sort_enabled'                      => [],
					'filter_tariff_sort_value'                        => [],
					'filter_tariff_type_enabled'                      => [],
					'filter_tariff_type_value'                        => [],
					'language'                                        => [],
					'limit'                                           => [],
					'limit_split'                                     => [],
					'locale'                                          => [],
					'media_id_custom'                                 => [],
					'show_filters'                                    => [],
					'sub_id'                                          => [],
				]
			);
		}

		// If profile has been loaded, then extra loads are required
		if (false === empty($base['profile_id']))
		{
			// Load settings
			$settings = generalDaisyconSettings::generateToolSettings($base['profile_id']);
			$loadLocale = (false === empty($settings['locale']) ? $settings['locale'] : (false === empty($settings['language']) ? $settings['language'] : 'nl') . '-NL');

			// Check (default) settings
			$settings['language'] = false === empty($settings['language']) ? $settings['language'] : $base['language'];
			$settings['limit'] = false === empty($settings['limit']) ? $settings['limit'] : $base['limit'];
			$settings['limit_split'] = false === empty($settings['limit_split']) ? $settings['limit_split'] : $base['limit_split'];
			$settings['show_filters'] = false === empty($settings['show_filters']) ? $settings['show_filters'] : $base['show_filters'];
			$settings['filter_sustainability_electricity_level_enabled'] = false === empty($settings['filter_sustainability_electricity_level_enabled']) ? $settings['filter_sustainability_electricity_level_enabled'] : $base['filter_sustainability_electricity_level_enabled'];
			$settings['filter_sustainability_electricity_level_value'] = false === empty($settings['filter_sustainability_electricity_level_value']) ? $settings['filter_sustainability_electricity_level_value'] : $base['filter_sustainability_electricity_level_value'];
			$settings['filter_sustainability_gas_level_enabled'] = false === empty($settings['filter_sustainability_gas_level_enabled']) ? $settings['filter_sustainability_gas_level_enabled'] : $base['filter_sustainability_gas_level_enabled'];
			$settings['filter_sustainability_gas_level_value'] = false === empty($settings['filter_sustainability_gas_level_value']) ? $settings['filter_sustainability_gas_level_value'] : $base['filter_sustainability_gas_level_value'];
			$settings['filter_duration_enabled'] = false === empty($settings['filter_duration_enabled']) ? $settings['filter_duration_enabled'] : $base['filter_duration_enabled'];
			$settings['filter_duration_value'] = false === empty($settings['filter_duration_value']) ? $settings['filter_duration_value'] : $base['filter_duration_value'];
			$settings['filter_locale_enabled'] = false === empty($settings['filter_locale_enabled']) ? $settings['filter_locale_enabled'] : $base['filter_locale_enabled'];
			$settings['filter_locale_value'] = false === empty($settings['filter_locale_value']) ? $settings['filter_locale_value'] : $base['filter_locale_value'];
			$settings['filter_providers_enabled'] = false === empty($settings['filter_providers_enabled']) ? $settings['filter_providers_enabled'] : $base['filter_providers_enabled'];
			$settings['filter_providers_value'] = false === empty($settings['filter_providers_value']) ? $settings['filter_providers_value'] : $base['filter_providers_value'];
			$settings['filter_energy_meter_enabled'] = false === empty($settings['filter_energy_meter_enabled']) ? $settings['filter_energy_meter_enabled'] : $base['filter_energy_meter_enabled'];
			$settings['filter_energy_meter_value'] = false === empty($settings['filter_energy_meter_value']) ? $settings['filter_energy_meter_value'] : $base['filter_energy_meter_value'];
			$settings['filter_tariff_sort_enabled'] = false === empty($settings['filter_tariff_sort_enabled']) ? $settings['filter_tariff_sort_enabled'] : $base['filter_tariff_sort_enabled'];
			$settings['filter_tariff_sort_value'] = false === empty($settings['filter_tariff_sort_value']) ? $settings['filter_tariff_sort_value'] : $base['filter_tariff_sort_value'];
			$settings['filter_tariff_type_enabled'] = false === empty($settings['filter_tariff_type_enabled']) ? $settings['filter_tariff_type_enabled'] : $base['filter_tariff_type_enabled'];
			$settings['filter_tariff_type_value'] = false === empty($settings['filter_tariff_type_value']) ? $settings['filter_tariff_type_value'] : $base['filter_tariff_type_value'];

			echo "<script type=\"text/javascript\">
						loadData();
						
						function loadData ()
						{
							var currentSustainabilityElectricityLevel = $('#filter_sustainability_electricity_level').val();
							var currentSustainabilityGasLevel         = $('#filter_sustainability_gas_level').val();
							var currentDuration                       = $('#filter_duration').val();
							var currentLocale                         = $('#filter_locale').val();
							var currentProviders                      = $('#filter_providers').val();
							var currentEnergyMeter                    = $('#filter_energy_meter').val();
							var currentTariffSort                     = $('#filter_tariff_sort').val();
							var currentTariffType                     = $('#filter_tariff_type').val();
							
							var savedSustainabilityElectricityLevel = '" . (false === empty($settings['filter_sustainability_electricity_level_value']) ? $settings['filter_sustainability_electricity_level_value'] : '') . "';
							var savedSustainabilityGasLevel         = '" . (false === empty($settings['filter_sustainability_gas_level_value']) ? $settings['filter_sustainability_gas_level_value'] : '') . "';
							var savedDuration                       = '" . (false === empty($settings['filter_duration_value']) ? $settings['filter_duration_value'] : '') . "';
							var savedLocale                         = '" . (false === empty($settings['filter_locale_value']) ? $settings['filter_locale_value'] : '') . "';
							var savedProviders                      = '" . (false === empty($settings['filter_providers_value']) ? $settings['filter_providers_value'] : '') . "';
							var savedEnergyMeter                    = '" . (false === empty($settings['filter_energy_meter_value']) ? $settings['filter_energy_meter_value'] : '') . "';
							var savedGasUsage                       = '" . (false === empty($settings['filter_gas_usage_value']) ? $settings['filter_gas_usage_value'] : '') . "';
							var savedTariffSort                     = '" . (false === empty($settings['filter_tariff_sort_value']) ? $settings['filter_tariff_sort_value'] : '') . "';
							var savedTariffType                     = '" . (false === empty($settings['filter_tariff_type_value']) ? $settings['filter_tariff_type_value'] : '') . "';

							var sustainabilityElectricityLevel = currentSustainabilityElectricityLevel ?? savedSustainabilityElectricityLevel;
							var sustainabilityGasLevel = currentSustainabilityGasLevel ?? savedSustainabilityGasLevel;
							var duration = currentDuration ?? savedDuration;
							var locale = currentLocale ?? savedLocale;
							var providers = currentProviders ?? savedProviders;
							var energyMeter = currentEnergyMeter ?? savedEnergyMeter;
							var tariffSort = currentTariffSort ?? savedTariffSort;
							var tariffType = currentTariffType ?? savedTariffType;

							processData(
								{
									url : 'https://daisycon.tools/api/energy/belgium/" . $loadLocale . "/locale',
								}
							).then(function (data) {
								if (undefined !== data) {
									daisycon_load_select('locale', data, 4, 1, '" . $loadLocale . "');
								}
								else {
									alert('De filters voor locale kunnen niet worden geladen. Laad uw profiel alstublieft opnieuw of wijzig uw platform en/of taal naar Nederland(s).');
								}
							});

							processData(
								{
									url : 'https://daisycon.tools/api/energy/belgium/" . $loadLocale . "/sustainability-electricity',
								}
							).then(function (data) {
								if (undefined !== data) {
									daisycon_load_select('filter_sustainability_electricity_level_value[]', data, 4, 1, sustainabilityElectricityLevel);
								}
								else {
									alert('De filters voor electriciteit duurzaamheid kunnen niet worden geladen. Laad uw profiel alstublieft opnieuw of wijzig uw platform en/of taal naar Nederland(s).');
								}
							});

							processData(
								{
									url : 'https://daisycon.tools/api/energy/belgium/" . $loadLocale . "/sustainability-gas',
								}
							).then(function (data) {
								if (undefined !== data) {
									daisycon_load_select('filter_sustainability_gas_level_value[]', data, 4, 1, sustainabilityGasLevel);
								}
								else {
									alert('De filters voor gas duurzaamheid kunnen niet worden geladen. Laad uw profiel alstublieft opnieuw of wijzig uw platform en/of taal naar Nederland(s).');
								}
							});

							processData(
								{
									url : 'https://daisycon.tools/api/energy/belgium/" . $loadLocale . "/duration',
								}
							).then(function (data) {
								if (undefined !== data) {
									daisycon_load_select('filter_duration_value[]', data, 4, 1, duration);
								}
								else {
									alert('De filters voor looptijd kunnen niet worden geladen. Laad uw profiel alstublieft opnieuw of wijzig uw platform en/of taal naar Nederland(s).');
								}
							});

							processData(
								{
									url : 'https://daisycon.tools/api/energy/belgium/" . $loadLocale . "/providers',
								}
							).then(function (data) {
								if (undefined !== data) {
									daisycon_load_select('filter_providers_value[]', data, 0, 1, providers);
								}
								else {
									alert('De filters voor aanbieder kunnen niet worden geladen. Laad uw profiel alstublieft opnieuw of wijzig uw platform en/of taal naar Nederland(s).');
								}
							});

							processData(
								{
									url : 'https://daisycon.tools/api/energy/belgium/" . $loadLocale . "/meter',
								}
							).then(function (data) {
								if (undefined !== data) {
									daisycon_load_select('filter_energy_meter_value[]', data, 4, 1, energyMeter);
								}
								else {
									alert('De filters voor energiemeter kunnen niet worden geladen. Laad uw profiel alstublieft opnieuw of wijzig uw platform en/of taal naar Nederland(s).');
								}
							});

							processData(
								{
									url : 'https://daisycon.tools/api/energy/belgium/" . $loadLocale . "/tariff-sort',
								}
							).then(function (data) {
								if (undefined !== data) {
									daisycon_load_select('filter_tariff_sort_value[]', data, 4, 1, tariffSort)
								}
								else {
									alert('De filters voor tarief-sortering kunnen niet worden geladen. Laad uw profiel alstublieft opnieuw of wijzig uw platform en/of taal naar Nederland(s).');
								}
							});

							processData(
								{
									url : 'https://daisycon.tools/api/energy/belgium/" . $loadLocale . "/tariff-type',
								}
							).then(function (data) {
								if (undefined !== data) {
									daisycon_load_select('filter_tariff_type_value[]', data, 4, 1, tariffType);
								}
								else {
									alert('De filters voor tarief-type kunnen niet worden geladen. Laad uw profiel alstublieft opnieuw of wijzig uw platform en/of taal naar Nederland(s).');
								}
							});

						}
					</script>";
		}

		echo '<div class="dc_box">
				<img class="dc_box_header" src="https://static.daisycon.tools/energy-nl/presentation/wp-plugin-daisycon-header.png" alt="Energievergelijker" />
				<p class="dc_box_description">Daisycon heeft exclusief voor haar publishers een gratis energievergelijker ontwikkeld. De tool is eenvoudig te installeren en stelt de bezoekers van jouw website in staat verschillende energie aanbieders met elkaar te vergelijken. <a href="https://www.daisycon.com/be/vergelijkers/energievergelijker/" target="_blank">Klik hier om de demowebsite te bekijken</a>.</p>
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
									<p class="dc_box_subdescription">U kunt een voorkeur aangeven voor het filter wat standaard geselecteerd is. <i>gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</i></p>
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
										<span class="dc_settings_row_name">Type tarief</span>
										<span class="dc_settings_row_value">
											<select name="filter_tariff_type_enabled[]">
												<option value="yes"' . ('yes' === $settings['filter_tariff_type_enabled'] ? 'selected="selected"' : '') . '>Toon</option>
												<option value="no"' . ('no' === $settings['filter_tariff_type_enabled'] ? 'selected="selected"' : '') . '>Verberg</option>
											</select>
											<select name="filter_tariff_type_value[]" multiple="multiple" id="filter_tariff_type"></select>
											<span class="dc_settings_row_value_description">(optioneel)</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Duurzaamheid elektriciteit</span>
										<span class="dc_settings_row_value">
											<select class="dc_settings_row_value--marginBottom" name="filter_sustainability_electricity_level_enabled[]">
												<option value="yes"' . ('yes' === $settings['filter_sustainability_electricity_level_enabled'] ? 'selected="selected"' : '') . '>Toon</option>
												<option value="no"' . ('no' === $settings['filter_sustainability_electricity_level_enabled'] ? 'selected="selected"' : '') . '>Verberg</option>
											</select><br>
											<select name="filter_sustainability_electricity_level_value[]" multiple="multiple" id="filter_sustainability_electricity_level"></select>
											<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Duurzaamheid gas</span>
										<span class="dc_settings_row_value">
											<select class="dc_settings_row_value--marginBottom" name="filter_sustainability_gas_level_enabled[]">
												<option value="yes"' . ('yes' === $settings['filter_sustainability_gas_level_enabled'] ? 'selected="selected"' : '') . '>Toon</option>
												<option value="no"' . ('no' === $settings['filter_sustainability_gas_level_enabled'] ? 'selected="selected"' : '') . '>Verberg</option>
											</select><br>
											<select name="filter_sustainability_gas_level_value[]" multiple="multiple" id="filter_sustainability_gas_level"></select>
											<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Slimme meter</span>
										<span class="dc_settings_row_value">
											<select class="dc_settings_row_value--marginBottom" name="filter_energy_meter_enabled[]">
												<option value="yes"' . ('yes' === $settings['filter_energy_meter_enabled'] ? 'selected="selected"' : '') . '>Toon</option>
												<option value="no"' . ('no' === $settings['filter_energy_meter_enabled'] ? 'selected="selected"' : '') . '>Verberg</option>
											</select><br>
											<select name="filter_energy_meter_value[]" multiple="multiple" id="filter_energy_meter"></select>
											<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Looptijd</span>
										<span class="dc_settings_row_value">
											<select class="dc_settings_row_value--marginBottom" name="filter_duration_enabled[]">
												<option value="yes"' . ('yes' === $settings['filter_duration_enabled'] ? 'selected="selected"' : '') . '>Toon</option>
												<option value="no"' . ('no' === $settings['filter_duration_enabled'] ? 'selected="selected"' : '') . '>Verberg</option>
											</select><br>
											<select name="filter_duration_value[]" multiple="multiple" id="filter_duration"></select>
											<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Aanbieder</span>
										<span class="dc_settings_row_value">
											<select class="dc_settings_row_value--marginBottom" name="filter_providers_enabled[]">
												<option value="yes"' . ('yes' === $settings['filter_providers_enabled'] ? 'selected="selected"' : '') . '>Toon</option>
												<option value="no"' . ('no' === $settings['filter_providers_enabled'] ? 'selected="selected"' : '') . '>Verberg</option>
											</select><br>
											<select name="filter_providers_value[]" multiple="multiple" id="filter_providers"></select>
											<span class="dc_settings_row_value_description">(optioneel) gebruik CTRL klik om meerdere opties te selecteren of deselecteren.</span>
										</span>
									</li>
									<li class="dc_list_item">
										<span class="dc_settings_row_name">Sortering</span>
										<span class="dc_settings_row_value">
											<select name="filter_tariff_sort_enabled[]">
												<option value="yes"' . ('yes' === $settings['filter_tariff_sort_enabled'] ? 'selected="selected"' : '') . '>Toon</option>
												<option value="no"' . ('no' === $settings['filter_tariff_sort_enabled'] ? 'selected="selected"' : '') . '>Verberg</option>
											</select>
											<select name="filter_tariff_sort_value[]" id="filter_tariff_sort"></select>
											<span class="dc_settings_row_value_description">(optioneel)</span>
										</span>
									</li>
									</ul>
									<input class="dc_settings_button" type="submit" name="dc_submit" id="dc_submit" value="Opslaan">
								</form>
								<h1 class="dc_box_title">Gebruik</h1>
								<p class="dc_box_description">Plak onderstaande shorttag in je blogpost of pagina en de vergelijker verschijnt direct op je website.</p>
								<div class="dc_shorttag" onclick="daisycon_select_all(this)">
									[daisycon_energy_be profile_id="' . $base['profile_id'] . '"]
								</div>
								<p class="dc_box_description dc_box_description--no_margin">Succes!</p>';
			}
		echo '</div>';
	}

	public static function frontDaisyconEnergyBE($array)
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
		wp_register_script('daisycon_energy_be_js', '//daisycon.tools/energy-be/app.js');

		// Add files to head
		wp_enqueue_script('daisycon_energy_be_js');

		$configuration = [
			'filter'      => [
				'sustainabilityElectricitylevels'        => [
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
				'energyMeter'                              => [
					'enabled' => (true === isset($settings['filter_energy_meter_enabled']) && 'no' === $settings['filter_energy_meter_enabled'] ? false : true),
				],
				'providerId'                            => [
					'enabled' => (true === isset($settings['filter_providers_enabled']) && 'no' === $settings['filter_providers_enabled'] ? false : true),
				],
			],
			'locale'      => (false === empty($settings['locale']) ? $settings['locale'] : (false === empty($settings['language']) ? $settings['language'] : 'nl') . '-NL'),
			'language'    => $settings['language'],
			'limit'       => (false === empty($settings['limit']) ? intval($settings['limit']) : '100'),
			'limitSplit'  => (false === empty($settings['limit_split']) ? intval($settings['limit_split']) : '100'),
			'mediaId'     => [
				'daisycon' => (int)(false === empty($settings['media_id_custom']) ? $settings['media_id_custom'] : $settings['media_id']),
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

		if (false === empty($settings['filter_sustainability_electricity_level_value']))
		{
			$configuration['filter']['sustainabilityElectricityLevels'] = array_merge((array)$configuration['filter']['sustainabilityElectricityLevels'], (array)['value' => explode(',', $settings['filter_sustainability_electricity_level_value'])]);
		}

		if (false === empty($settings['filter_sustainability_gas_level_value']))
		{
			$configuration['filter']['sustainabilityGasLevels'] = array_merge((array)$configuration['filter']['sustainabilityGasLevels'], (array)['value' => explode(',', $settings['filter_sustainability_gas_level_value'])]);
		}

		if (false === empty($settings['filter_tariff_type_value']))
		{
			$configuration['filter']['tariffType'] = array_merge((array)$configuration['filter']['tariffType'], (array)['value' => explode(',', $settings['filter_tariff_type_value'])]);
		}

		if (false === empty($settings['filter_tariff_sort_value']))
		{
			$configuration['filter']['tariffSort'] = array_merge((array)$configuration['filter']['tariffSort'], (array)['value' => explode(',', $settings['filter_tariff_sort_value'])]);
		}

		if (false === empty($settings['filter_duration_value']))
		{
			$configuration['filter']['duration'] = array_merge((array)$configuration['filter']['duration'], (array)['value' => explode(',', $settings['filter_duration_value'])]);
		}

		if (false === empty($settings['filter_energy_meter_value']) || (isset($settings['energy_meter']) && 'false' === $settings['energy_meter']))
		{
			$configuration['filter']['energyMeter'] = array_merge((array)$configuration['filter']['energyMeter'], (array)['value' => $settings['filter_energy_meter_value']]);
		}

		if (false === empty($settings['filter_providers_value']))
		{
			$configuration['filter']['providerId'] = array_merge((array)$configuration['filter']['providerId'], (array)['value' => explode(',', $settings['filter_providers_value'])]);
		}

		return "<div class=\"dc-tool dc-energy-tool\" data-config='" . str_replace("'", '&339;', json_encode($configuration)) . "'></div>";
	}
}
?>
