<?php
/* Daisycon prijsvergelijkers
 * File: general.php
 *
 * View for the shorttags to be displayed on the website
 *
 */

class generalDaisyconSettings{

	public static function adminDaisyconSettings()
	{
		// Load stylesheet
		wp_enqueue_style('daisycon.css', esc_url(plugins_url('../assets/css/daisycon.css', __FILE__)));

		// Check if settings were submitted
		if (false === empty($_POST['dc_submit_media']))
		{
			$updateSettings = generalDaisyconSettings::updateSettings('1',
				[
					'media_id'     => [
						'title'      => 'Media ID',
						'validation' => 'numeric',
					],
					'xpartners_id'     => [
						'title'      => 'Xpartners ID',
						'validation' => 'numeric',
					],
				]
			);
		}

		// Check if settings were submitted
		if (false === empty($_POST['dc_submit_profile']))
		{
			$updateSettings = generalDaisyconSettings::createProfile(
				[
					'tool' => [
						'required' => true,
						'title'    => 'Tool',
					],
					'profile' => [
						'required' => true,
						'title'    => 'Profiel',
					]
				]
			);
		}

		// Load settings
		$settings = generalDaisyconSettings::generateToolSettings('1');

		$output = 	'<div class="dc_box">
						<img class="dc_box_header" src="https://static.daisycon.tools/common/presentation/wp-plugin-daisycon-header.png" alt="Daisycon prijsvergelijkers" />
						<p class="dc_box_description">Daisycon biedt haar publishers gratis tools. Deze zijn doormiddel van een shorttag direct op je WordPress-website te plaatsen. Plaats de shorttag op een pagina of post, en de tool werkt direct.</p>
						<p class="dc_box_description">Om de plugins te gebruiken moet je aangemeld zijn als publisher bij Daisycon. <a href="http://www.daisycon.com/nl/publishers/" target="_blank">Klik hier om je gratis aan te melden.</a></p>
						<h1 class="dc_box_title">Algemene instellingen</h1>
						<p class="dc_box_description">Vul hier je <strong>Media ID</strong> en/of <strong>Xpartners ID</strong> in en deze wordt dan automatisch ingevuld in de shorttags van de tool(s). Het Xpartners ID is alleen relevant voor speciale campagnes binnen dating.</p>
						' . (false === empty($_POST['dc_submit_media']) && false === empty($updateSettings['message']) ? $updateSettings['message'] : '' ) . '
						<form action="" class="dc_settings" method="POST"/>
							<ul class="dc_list">
								<li class="dc_list_item">
									<span class="dc_settings_row_name">Media ID *</span>
									<span class="dc_settings_row_value">
										<input type="number" name="media_id" value="' . (false === empty($settings['media_id']) ? $settings['media_id'] : '') . '"' . (false === empty($updateSettings['notices']['media_id']) ? ' class="error"' : '') . '>
										<span class="dc_settings_row_value_description">
											(optioneel bij ingevulde Xpartners ID) <a href="https://faq-publisher.daisycon.com/hc/nl/articles/205765911-Waar-vind-ik-mijn-Media-ID-" target="_blank">waar vind ik mijn media id</a>?
										</span>
									</span>
								</li>
								<li class="dc_list_item">
									<span class="dc_settings_row_name">Xpartners ID*</span>
									<span class="dc_settings_row_value">
										<input type="number" name="xpartners_id" value="' . (false === empty($settings['xpartners_id']) ? $settings['xpartners_id'] : '') . '"' . (false === empty($updateSettings['notices']['xpartners_id']) ? ' class="error"' : '') . '>
										<span class="dc_settings_row_value_description">
											(optioneel bij ingevulde Media ID) <a href="https://www.daisycon.com/nl/blog/meer-adverteerders-in-datingsitevergelijker/" target="_blank">waarom een Xpartners id</a>?
										</span>
									</span>
								</li>
							</ul>
							<input class="dc_settings_button" type="submit" name="dc_submit_media" id="dc_submit_media" value="Opslaan">
						</form>
						<h1 class="dc_box_title">Profielen</h1>
						<p class="dc_box_description">Aan een profiel worden puur de instellingen van de tool gekoppeld. Hiermee kunt u bijvoorbeeld een profiel <i>Landingspagina A</i> aanmaken, waarna u bij de tool het betreffende profiel laad en zaken instelt zoals een sub_id, kleuren of filters. Heeft u meer landingspagina\'s? Geen probleem, u kunt een onbeperkt aantal profielen aanmaken! Op deze manier is elk profiel uniek en kunt u op verschillende pagina\'s dezelfde vergelijker laden, maar met verschillende instellingen.</p>
						' . (false === empty($_POST['dc_submit_profile']) && false === empty($updateSettings['message']) ? $updateSettings['message'] : '' ) . '
						<form action="" class="dc_settings" method="POST"/>
							<ul class="dc_list">
								<li class="dc_list_item">
									<span class="dc_settings_row_name">Tool *</span>
									<span class="dc_settings_row_value">
										<select name="tool"' . (false === empty($updateSettings['notices']['tool']) ? ' class="error"' : '') . '>
											<option value="">Selecteer ..</option>
											<option value="all_in_one"' . (false === empty($_POST['tool']) && 'all_in_one' === sanitize_text_field($_POST['tool']) ? 'selected="selected"' : '') . '>Alles in één</option>
											<!--<option value="car_insurance"' . (false === empty($_POST['tool']) && 'car_insurance' === sanitize_text_field($_POST['tool']) ? 'selected="selected"' : '') . '>Autoverzekering</option>!-->
											<option value="accounting"' . (false === empty($_POST['tool']) && 'accounting' === sanitize_text_field($_POST['tool']) ? 'selected="selected"' : '') . '>Boekhoudsoftware</option>
											<option value="dating"' . (false === empty($_POST['tool']) && 'dating' === sanitize_text_field($_POST['tool']) ? 'selected="selected"' : '') . '>Dating</option>
											<option value="energy_be"' . (false === empty($_POST['tool']) && 'energy_be' === sanitize_text_field($_POST['tool']) ? 'selected="selected"' : '') . '>Energie (BE)</option>
											<option value="energy_nl"' . (false === empty($_POST['tool']) && 'energy_nl' === sanitize_text_field($_POST['tool']) ? 'selected="selected"' : '') . '>Energie (NL)</option>
											<option value="car_lease"' . (false === empty($_POST['tool']) && 'car_lease' === sanitize_text_field($_POST['tool']) ? 'selected="selected"' : '') . '>Leaseauto</option>
											<option value="market_research"' . (false === empty($_POST['tool']) && 'market_research' === sanitize_text_field($_POST['tool']) ? 'selected="selected"' : '') . '>Marktonderzoek</option>
											<option value="funeral_insurance"' . (false === empty($_POST['tool']) && 'funeral_insurance' === sanitize_text_field($_POST['tool']) ? 'selected="selected"' : '') . '>Uitvaartverzekering</option>
											<option value="vacation"' . (false === empty($_POST['tool']) && 'vacation' === sanitize_text_field($_POST['tool']) ? 'selected="selected"' : '') . '>Vakantie</option>
											<!--<option value="wine"' . (false === empty($_POST['tool']) && 'wine' === sanitize_text_field($_POST['tool']) ? 'selected="selected"' : '') . '>Wijn</option>-->
											<option value="health_insurance"' . (false === empty($_POST['tool']) && 'health_insurance' === sanitize_text_field($_POST['tool']) ? 'selected="selected"' : '') . '>Zorgverzekering</option>
											<option value="prefill_energy_be"' . (false === empty($_POST['tool']) && 'prefill_energy_be' === sanitize_text_field($_POST['tool']) ? 'selected="selected"' : '') . '>Prefill energie (BE)</option>
											<option value="prefill_energy_nl"' . (false === empty($_POST['tool']) && 'prefill_energy_nl' === sanitize_text_field($_POST['tool']) ? 'selected="selected"' : '') . '>Prefill energie (NL)</option>
										</select>
										<span class="dc_settings_row_value_description">alleen mogelijk met vernieuwde tools, vandaar dat een aantal nog ontbreekt.</span>
									</span>
								</li>
								<li class="dc_list_item">
									<span class="dc_settings_row_name">Profiel *</span>
									<span class="dc_settings_row_value">
										<input type="text" name="profile" value="' . (false === empty($_POST['profile']) ? sanitize_text_field($_POST['profile']) : '') . '"' . (false === empty($updateSettings['notices']['profile']) ? ' class="error"' : '') . '>
									</span>
								</li>
							</ul>
							<input class="dc_settings_button" type="submit" name="dc_submit_profile" id="dc_submit" value="Aanmaken">
						</form>
						<h1 class="dc_box_title">Voorbeelden</h1>
						<ul>
							<li>
								<a href="https://www.daisycon.com/nl/vergelijkers/alles-in-een-vergelijker/" target="_blank">Bekijk hier een voorbeeld van de Alles-in-&eacute;&eacute;n-vergelijker.</a>
							</li>
							<li>
								<a href="https://www.daisycon.com/nl/vergelijkers/autoverzekeringvergelijker/" target="_blank">Bekijk hier een voorbeeld van de Autoverzekeringvergelijker.</a>
							</li>
							<li>
								<a href="https://www.daisycon.com/nl/vergelijkers/boekhoudsoftware-vergelijker/" target="_blank">Bekijk hier een voorbeeld van de Boekhoudsoftware-vergelijker.</a>
							</li>
							<li>
								<a href="https://www.daisycon.com/nl/vergelijkers/datingsitevergelijker/" target="_blank">Bekijk hier een voorbeeld van de Datingsitevergelijker.</a>
							</li>
							<li>
								<a href="https://www.daisycon.com/nl/vergelijkers/energievergelijker/belgie" target="_blank">Bekijk hier een voorbeeld van de Energievergelijker (BE).</a>
							</li>
							<li>
								<a href="https://www.daisycon.com/nl/vergelijkers/energievergelijker/" target="_blank">Bekijk hier een voorbeeld van de Energievergelijker (NL).</a>
							</li>
							<li>
								<a href="https://www.daisycon.com/nl/vergelijkers/lease-auto-vergelijker/" target="_blank">Bekijk hier een voorbeeld van de Leaseauto vergelijker.</a>
							</li>
							<li>
								<a href="https://www.daisycon.com/nl/vergelijkers/sim-only-vergelijker/" target="_blank">Bekijk hier een voorbeeld van de Sim only-vergelijker.</a>
							</li>
							<li>
								<a href="https://www.daisycon.com/nl/vergelijkers/uitvaartverzekeringen/" target="_blank">Bekijk hier een voorbeeld van de Uitvaartverzekeringtool.</a>
							</li>
							<li>
								<a href="https://www.daisycon.com/nl/vergelijkers/vakantie-vergelijker/" target="_blank">Bekijk hier een voorbeeld van de Vakantievergelijker.</a>
							</li>
							<li>
								<a href="https://www.daisycon.com/nl/vergelijkers/wijn-vergelijker/" target="_blank">Bekijk hier een voorbeeld van de Wijnvergelijker.</a>
							</li>
							<li>
								<a href="https://www.daisycon.com/nl/vergelijkers/zorgverzekeringvergelijker/" target="_blank">Bekijk hier een voorbeeld van de Zorgverzekeringvergelijker.</a>
							</li>
						</ul>
						<h1 class="dc_box_title">Andere publishertools van Daisycon</h1>
						<p class="dc_box_description dc_box_description--no_margin">Bekijk <a href="https://www.daisycon.com/nl/vergelijkers/" target="_blank">hier</a> alle tools die Daisycon voor haar publishers beschikbaar heeft.</p>
					</div>
					';

		echo $output;
	}

	public static function getMediaId()
	{
		global $wpdb;

		$oMediaId = $wpdb->get_row("SELECT `value` FROM `".$wpdb->prefix."daisycon_tools_settings` WHERE `profile_id`='1' AND `name`='media_id' LIMIT 1;");

		if (true === empty($oMediaId))
		{
			$sMediaId = 'XXXXX';
		}
		else
		{
			$sMediaId = $oMediaId->value;
		}

		return $sMediaId;
	}

	public static function generateToolSettings($profile_id = '1', $custom_config = [])
	{
		global $wpdb;

		$database_general = $wpdb->get_results("SELECT `name`, `value` FROM `".$wpdb->prefix."daisycon_tools_settings` WHERE `profile_id`='1';");
		$settings         = array();

		if (0 !== count($database_general))
		{
			foreach($database_general as $result)
			{
				$settings[$result->name] = $result->value;
			}
		}

		$database_custom = $wpdb->get_results("SELECT `name`, `value` FROM `".$wpdb->prefix."daisycon_tools_settings` WHERE `profile_id`='" . $profile_id . "';");

		if (0 !== count($database_custom))
		{
			foreach($database_custom as $result)
			{
				$settings[$result->name] = $result->value;
			}
		}

		// Re-route old custom configurations
		if (false === empty($custom_config['media_id']) || false === empty($custom_config['mediaid']))
		{
			$custom_config['media_id'] = (false === empty($custom_config['media_id']) ? $custom_config['media_id'] : $custom_config['mediaid']);
		}

		if (false === empty($custom_config['sub_id']) || false === empty($custom_config['subid']))
		{
			$custom_config['sub_id'] = (false === empty($custom_config['sub_id']) ? $custom_config['sub_id'] : $custom_config['subid']);
		}

		if (false === empty($custom_config['limit']) || false === empty($custom_config['amount']))
		{
			$custom_config['limit'] = (false === empty($custom_config['limit']) ? $custom_config['limit'] : $custom_config['amount']);
		}

		if (false === empty($custom_config['button_text']) || false === empty($custom_config['buttontext']))
		{
			$custom_config['button_text'] = (false === empty($custom_config['button_text']) ? $custom_config['button_text'] : $custom_config['buttontext']);
		}

		# Set defaults for database values
		$settings['color_primary']        = (false === empty($settings['color_primary'])        ? $settings['color_primary'] : '');
		$settings['color_text_primary']   = (false === empty($settings['color_text_primary'])   ? $settings['color_text_primary'] : '');
		$settings['color_secondary']      = (false === empty($settings['color_secondary'])      ? $settings['color_secondary'] : '');
		$settings['color_text_secondary'] = (false === empty($settings['color_text_secondary']) ? $settings['color_text_secondary'] : '');

		// Custom is leading, database settings are default
		$settings['button_text'] = self::convertData($settings, $custom_config, 'button_text');
		$settings['language']    = self::convertData($settings, $custom_config, 'language');
		$settings['limit']       = intval(self::convertData($settings, $custom_config, 'limit'));
		$settings['locale']      = self::convertData($settings, $custom_config, 'locale');
		$settings['media_id']    = intval(self::convertData($settings, $custom_config, 'media_id'));
		$settings['sub_id']      = self::convertData($settings, $custom_config, 'sub_id');

		return $settings;
	}

	public static function convertData($settings, $custom_config, $key)
	{
		return (false === empty($custom_config[$key]) ? $custom_config[$key] : (false === empty($settings[$key]) ? $settings[$key] : null));
	}

	public static function createProfile($fields)
	{
		global $wpdb;

		// General settings
		$notices    = self::doValidation($fields);
		$table_name = $wpdb->prefix . 'daisycon_tools';

		// Check for notices regarding required and validation
		if (false === empty($notices))
		{
			return self::showNotices($notices);
		}

		# Insert into database
		$insert = $wpdb->insert($table_name, array('tool' => sanitize_text_field($_POST['tool']), 'profile' => sanitize_text_field($_POST['profile'])));
		if (false === $insert)
		{
			$notices[] = 'Het profiel kan niet worden opgeslagen. Probeer het nogmaals of wellicht bestaat het profiel al.';
		}

		// Check for notices regarding required and validation
		if (false === empty($notices))
		{
			return self::showNotices($notices);
		}
		else
		{
			unset($_POST['tool'], $_POST['profile']);

			return [
				'message' => '
						<p class="dc_message dc_message_success">
							Het profiel is succesvol aaangemaakt.
						</p>
					'
			];
		}
	}

	public static function updateSettings($profile_id, $fields)
	{
		global $wpdb;

		// General settings
		$notices    = self::doValidation($fields);
		$table_name = $wpdb->prefix . 'daisycon_tools_settings';

		// Check for notices regarding required and validation
		if (false === empty($notices))
		{
			return self::showNotices($notices);
		}

		// Update database values
		foreach($fields as $name => $field)
		{
			// Update value
			$value = (false === empty($_POST[$name]) ? $_POST[$name] : '');

			if (true === is_array($value))
			{
				$value = implode(',', $value);
			}

			$update = $wpdb->replace($table_name, array('profile_id' => $profile_id, 'name' => $name, 'value' => sanitize_text_field($value)));

			if (false === $update)
			{
				$notices = 'Niet alle instellingen konden worden opgeslagen. Probeer het nogmaals.';
			}
		}

		// Check for notices regarding required and validation
		if (false === empty($notices))
		{
			return [
				'notices' => $notices,
				'message' => '
						<p class="dc_message dc_message_warning">
						' . $message . '
						</p>
					'
			];
		}
		else
		{
			return [
				'message' => '
						<p class="dc_message dc_message_success">
							De instellingen zijn succesvol opgeslagen.
						</p>
					'
			];
		}
	}

	public static function doValidation($fields)
	{
		$notices = [];

		// Check if media id and/or xpartners id is set
		if (false === empty($fields['media_id']) && false === empty($fields['xpartners_id']))
		{
			// Check if data has been given
			if (true === empty($_POST['media_id']) && true === empty($_POST['xpartners_id']))
			{
				$notices['general'] = '<strong>Media ID</strong> én <strong>Xpartners ID</strong> zijn leeg. Minimaal één ID moet ingevuld worden om gebruik te kunnen maken van de tools.';
			}
		}

		foreach ($fields as $name => $field)
		{
			// Check if required
			if (false === empty($field['required']) && true === $field['required'] && true === empty($_POST[$name]))
			{
				$notices[$name] = '<strong>' . $field['title'] . '</strong> is leeg.';
			}

			// Check if validation is_numeric is needed
			if (false === empty($field['validation']) && 'is_numeric' === $field['validation'] && false === is_numeric($_POST[$name]))
			{
				$notices[$name] = '<strong>' . $field['title'] . '</strong> is geen nummer.';
			}
		}

		return $notices;
	}

	public static function showNotices($notices)
	{
		$message = '';

		foreach($notices as $notice)
		{
			$message .= (false === empty($message) ? '<br>' : '') . $notice;
		}

		return [
			'notices' => $notices,
			'message' => '
						<p class="dc_message dc_message_warning">
						' . $message . '
						</p>
					'
		];
	}

	public static function chooseProfile($base)
	{
		global $wpdb;

		// Check if a profile is loaded
		if (false === empty($_POST['dc_submit_profile']))
		{
			// Check if profile is correct
			$loadProfile = self::loadProfile(
				[
					'profile_id' => [
						'required' => true,
						'title'    => 'Profiel',
					]
				]
			);
		}

		echo '<p class="dc_box_description">Laad eerst het gewenste profiel en vervolgens kunt u de instellingen van de tool wijzigen.</p>
			 ' . (false === empty($_POST['dc_submit_profile']) && false === empty($loadProfile['notices']['profile_id']) ? $loadProfile['message'] : '' ) . '
			  <form action="" class="dc_settings' . (true === empty($base['profile_id']) ? ' dc_settings--no_margin' : '') . '" method="POST"/>
					<ul class="dc_list">
						<li class="dc_list_item">
							<span class="dc_settings_row_name">Profiel *</span>
							<span class="dc_settings_row_value">
								<select name="profile_id"' . (false === empty($loadProfile['notices']['profile_id']) ? ' class="error"' : '') . '>
									<option value="">Selecteer profiel ..</option>';

									$database_data = $wpdb->get_results("SELECT `id`, `profile` FROM `" . $wpdb->prefix . "daisycon_tools` WHERE `tool`='" . $base['tool_name'] . "';");
									if (0 !== count($database_data))
									{
										foreach($database_data as $result)
										{
											echo '<option value="' . $result->id . '"' . (false === empty($base['profile_id']) && $result->id === $base['profile_id'] ? 'selected="selected"' : '') . '>' . $result->profile . '</option>';
										}
									}

								echo '</select>
								<span class="dc_settings_row_value_description">staat er geen profiel? Maak deze dan eerst aan in bij het kopje <strong>Introductie</strong>.</span>
							</span>
						</li>
					</ul>
					<input class="dc_settings_button" type="submit" name="dc_submit_profile" id="dc_submit_profile" value="Laden">
				</form>';
	}

	public static function loadProfile($fields)
	{
		$notices = self::doValidation($fields);

		// Check for notices regarding required and validation
		if (false === empty($notices))
		{
			return self::showNotices($notices);
		}
	}
}
