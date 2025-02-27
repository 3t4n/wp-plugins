<?php

class Daisycon_Woocommerce_Settings extends Daisycon_Woocommerce_Admin
{

	const ADMIN_NOTICE_TYPE_DC_ERROR = 'dc_error';
	const ADMIN_NOTICE_TYPE_DC_INFO = 'dc_info';
	const ADMIN_NOTICE_TYPE_ERROR = 'error';
	const ADMIN_NOTICE_TYPE_INFO = 'info';
	const DEFAULT_APPROVAL_DAYS = 14;

	protected $option_name = 'daisycon_woocommerce_options';

	protected $settings = null;

	protected $setting_fields = null;

	protected $required_general_settings = ['campaign_id', 'matching_domain', 'lcc_enabled', 'commission_vat'];

	protected $required_custom_settings = ['campaign_id', 'matching_domain'];

	protected $authenticatedUser = null;

	protected $advertisers = null;

	protected $campaigns = [];

	protected $languages = null;

	protected $integration = null;

	protected $oAuthRedirectUri = null;

	protected $notices = [];

	public function __construct(string $plugin_name, string $version)
	{
		parent::__construct($plugin_name, $version);

		$this->get_settings();

		$debugger = (new Daisycon_Woocommerce_Debug_Log());
		if ($debugger->debugEnabled() && true === isset($_GET['download-log'])) {
			header('Content-Type: text/plain');
			header('Content-Disposition: attachment; filename="debug-log.txt"');
			echo $debugger->export();
			exit();
		}
	}

	public function daisycon_add_options_page()
	{
		add_options_page(
			'Daisycon WooCommerce pixel',
			'Daisycon WooCommerce pixel',
			'manage_options',
			$this->plugin_name,
			[$this, 'daisycon_display_options_page']
		);
	}

	public function daisycon_display_options_page()
	{
		$handler = new Daisycon_Woocommerce_Error_Handler();
		$handler->enable();
		include_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/daisycon-woocommerce-admin-display.php';
		$handler->disable();
	}

	public function daisycon_register_settings()
	{
		$settings = $this->_get_setting_fields();

		add_settings_section($this->option_name . '_general', '', [$this, 'general_description'], $this->plugin_name);

		if (true === is_array($settings)) {
			$this->add_settings('general', $settings['general'], null);
		}

		add_settings_section($this->option_name . '_auto_validation_settings', '', [$this, 'auto_validation_description'], $this->plugin_name);
		$this->add_settings('auto_validation_settings', $this->getAutoValidationSettings(), null);

		foreach ($settings['custom'] as $index => $customSetting) {
			add_settings_section($this->option_name . '_custom_' . $index, '', [$this, 'custom_description'], $this->plugin_name);
			$this->add_settings('custom', $customSetting, $index);
		}

		add_settings_section($this->option_name . '_dummy_custom_{id}', '', [$this, 'custom_description'], $this->plugin_name);
		$this->add_settings('dummy_custom', $this->_get_admin_settings_fields_template('{id}'), '{id}');

		if (count($this->languages) > 1) {
			add_settings_section($this->option_name . '_dummy_add_button', '', [$this, 'custom_description'], $this->plugin_name);
			add_settings_field(
				'dummy_add_another_language',
				'',
				[$this, 'button_field_callback'],
				$this->plugin_name,
				$this->option_name . '_dummy_add_button',
				[
					'group' => 'dummy',
					'name'  => 'dummy_add_another_language',
					'setting'   => [
						'title' => 'Add custom language setting',
						'onclick' => 'return createNewSection()',
						'type' => 'button',
					],
					'label_for' => 'dummy_add_another_language',
				]
			);
		}

		$this->downloadDebugLogIfNeeded();
	}

	private function downloadDebugLogIfNeeded() {
		if (true === wp_doing_ajax()) {
			return;
		}

		if ((new Daisycon_Woocommerce_Debug_Log())->debugEnabled()) {
			$domain = get_site_url();
			$downloadLink = $domain . '/wp-admin/options-general.php?page=daisycon-woocommerce&download-log=true';
			$this->show_admin_notice(
				self::ADMIN_NOTICE_TYPE_DC_INFO,
				'Debugging is enabled',
				true,
				$downloadLink,
				'Download log file',
				true
			);
		}
	}

	public function show_admin_notice(string $type, string $message, bool $canBeDismissed = true, string $action = null, string $actionMessage = null, bool $newWindow = false)
	{
		switch ($type) {
			case self::ADMIN_NOTICE_TYPE_DC_ERROR:
				$class = 'dc-core-container__notice dc-core-container__notice--error';
				break;

			case self::ADMIN_NOTICE_TYPE_DC_INFO:
				$class = 'dc-core-container__notice dc-core-container__notice--info';
				break;

			case self::ADMIN_NOTICE_TYPE_ERROR:
				$class = 'notice notice-error';
				break;

			default:
				$class = 'notice notice-info';
				break;
		}
		$button = null !== $action && null !== $actionMessage
			? '<p><a class="button button-primary" href="' . $action . '" ' . ($newWindow ? ' target="_blank"' : '') . '>' . esc_attr($actionMessage) . '</a></p>'
			: '';

		$notice = sprintf(
			'<div class="%1$s%2$s"><p>%3$s</p>%4$s</div>',
			esc_attr($class),
			(true === $canBeDismissed ? ' is-dismissible' : ''),
			$message,
			$button
		);

		switch ($type) {
			case self::ADMIN_NOTICE_TYPE_DC_ERROR:
			case self::ADMIN_NOTICE_TYPE_DC_INFO:
				if (false === isset($_SESSION['dc_woocommerce_notices'])) {
					$_SESSION['dc_woocommerce_notices'] = [];
				}

				$_SESSION['dc_woocommerce_notices'][] = $notice;
				break;

			default:
				echo $notice;
				break;
		}
	}

	protected function _get_setting_fields()
	{
		if (true === is_null($this->setting_fields)) {
			$this->setting_fields = [];
			$this->setting_fields['general'] = $this->_get_admin_settings_fields_template(null);
			$this->setting_fields['custom'] = [];
			foreach (array_keys($this->settings['custom'] ?? []) as $index) {
				$this->setting_fields['custom'][$index] = $this->_get_admin_settings_fields_template($index);
			}
		}

		return $this->setting_fields;
	}

	private function isOnSettingsPage() {
		return ($_GET['page'] ?? null) === 'daisycon-woocommerce';
	}

	private function isAuthenticated() {
		if (!$this->isOnSettingsPage()) {
			return false;
		}
		return false === empty((new Daisycon_Woocommerce_Auth())->getAuthenticatedUser());
	}

	private function getAdvertisers() {
		if (false === $this->isAuthenticated())
		{
			return null;
		}

		$this->advertisers = $this->advertisers ?? $this->loadAdvertisers();
		return $this->advertisers ?? null;
	}

	private function getCampaigns($advertiserId) {
		if (false === $this->isAuthenticated() || true === empty($advertiserId))
		{
			return null;
		}
		$this->campaigns[$advertiserId] = $this->campaigns[$advertiserId] ?? $this->loadCampaigns($advertiserId);
		return $this->campaigns[$advertiserId] ?? null;

	}

	private function getLanguages() {
		if (null === $this->languages) {
			$this->languages = [];
			foreach (daisycon_languages() as $language) {
				$this->languages[$language] = $language;
			}
		}
		return $this->languages;
	}

	private function _get_admin_settings_fields_template($customId): array {
		$advertisers = $this->getAdvertisers();
		$advertiserValues = [];

		if (true === is_array($advertisers)) {
			if (
				count($advertisers) > 0
				&& false === in_array($this->settings['general']['advertiser_id'] ?? null, array_column($advertisers, 'id'))
			) {
				$this->settings['general']['advertiser_id'] = $advertisers[0]->id;
			}

			foreach ($advertisers as $advertiser) {
				$advertiserValues[$advertiser->id] = strtr('{name} ({id})', ['{name}' => $advertiser->name, '{id}' => $advertiser->id]);
			}
			if (count($advertiserValues) > 1) {
				$advertiserValues = ['' => 'Select'] + $advertiserValues;
			}
		}

		$campaigns = $this->getCampaigns($this->settings['general']['advertiser_id'] ?? null);
		$campaignValues = [];

		if (true === is_array($campaigns)) {
			foreach ($campaigns as $campaign) {
				$campaignValues[$campaign->id] = strtr('{name} ({id})', ['{name}' => $campaign->name, '{id}' => $campaign->id]);
			}
			if (count($campaigns) === 1) {
				$this->settings['general']['campaign_id'] = $campaigns[0]->id;
			}
			if (count($campaignValues) > 1) {
				$campaignValues = ['' => 'Select'] + $campaignValues;
			}
		}

		$languages = $this->getLanguages();

		$containerTitle = $customId === null
			? 'General pixel settings'
			: 'Custom pixel settings (' . $customId . ')';

		return [
			'explain_language_fields' => [
				'title' => '<div class="dc-core-container__title dc-core-container__title--' . (null === $customId ? 'general' : 'custom-' . $customId) . '"><span>' . $containerTitle . '</span></div>',
				'type'  => 'title',
				'text'  => '<hr>',
			],
			'advertiser_id'           => [
				'title'             => 'Advertiser',
				'type'              => 'select',
				'readonly'          => count($advertiserValues) <= 1 ? 'readonly' : null,
				'options'           => true === empty($advertiserValues) ? ['' => 'No (active) advertisers'] : $advertiserValues,
			],
			'campaign_id'             => [
				'title'    => 'Campaign',
				'type'     => 'select',
				'readonly' => count($campaignValues) <= 1 ? 'readonly' : null,
				'options'  => true === empty($campaignValues) ? ['' => 'No (active) campaigns'] : $campaignValues,
			],
			'matching_domain'         => [
				'title'    => 'Matching Domain',
				'type'     => 'text',
				'readonly' => 'readonly',
			],
		] + (
			null !== $customId
				? [
					'languages' => [
						'title'             => 'Languages',
						'type'              => 'select',
						'multiple'          => true,
						'default'           => '',
						'options'           => true === empty($languages) ? ['' => 'No (active) languages'] : $languages,
					],
					'delete_button'                 => [
						'title'       => 'Delete custom settings',
						'type'        => 'button',
						'class'       => 'button button-danger',
						'onclick'     => "return deleteCustomSetting('" . $customId . "')",
						'placeholder' => '',
					],
				]
				: [
					'languages' => [
						'title'             => 'Languages',
						'type'              => 'select',
						'readonly'          => 'readonly',
						'default'           => '',
						'options'           => ['' => 'All other languages'],
					],
					'lcc_enabled'             => [
						'default' => 'no',
						'title'   => 'Use LCC cookie',
						'type'    => 'select',
						'options' => [
							'no'  => 'No',
							'yes' => 'Yes',
						],
					],
					'lcc_url_param'           => [
						'title'   => 'LCC network',
						'type'    => 'text',
						'default' => 'afnetwork',
					],
					'commission_vat'          => [
						'title'   => 'Commission VAT',
						'type'    => 'select',
						'options' => [
							''     => 'Select',
							'incl' => 'Including VAT',
							'excl' => 'Excluding VAT',
						],
					],
					'explain_custom_fields'   => [
						'title' => '',
						'type'  => 'separator',
						'text'  => '<p>You can add product extra fields or attributes by adding the name.</p>',
					],
					'cf_one'                  => [
						'title'       => 'Extra field 1',
						'type'        => 'text',
						'placeholder' => '',
					],
					'cf_two'                  => [
						'title'       => 'Extra field 2',
						'type'        => 'text',
						'placeholder' => '',
					],
					'cf_three'                => [
						'title'       => 'Extra field 3',
						'type'        => 'text',
						'placeholder' => '',
					],
					'cf_four'                 => [
						'title'       => 'Extra field 4',
						'type'        => 'text',
						'placeholder' => '',
					],
					// This field only used to trigger update_option hook for update the integration data
					'updated_at' => [
						'title'       => '',
						'type'        => 'text',
						'readonly'    => 'readonly',
						'hidden'    => 'hidden',
						'placeholder' => '',
					],
				]
			);
	}

	private function getAutoValidationSettings(): array {
		return [
			'explain_general_fields' => [
				'title' => '<div class="dc-core-container__title"><span>Automatic transaction validation settings</span></div>',
				'type'  => 'title',
				'text'  => '<hr>',
			],
			'enabled'                 => [
				'title'   => 'Status',
				'type'    => 'select',
				'default' => 'inactive',
				'options' => [
					''         => 'Select',
					'active'  => 'Enabled',
					'inactive' => 'Disabled',
				],
			],
			'days'                    => [
				'title'       => 'Days',
				'type'        => 'number',
				'steps'       => '1',
				'placeholder' => '',
				'default'     => self::DEFAULT_APPROVAL_DAYS,
			],
			'explain_woocommerce_auth_fields' => [
				'title' => '',
				'type'  => 'separator',
				'text'  => '<p>Link the Woocommerce store with your Daisycon account.</p>',
			],
			'link_for_woocoomerce_rest_api_keys' => [
				'title' => 'Generate keys here',
				'href' => '/wp-admin/admin.php?page=wc-settings&tab=advanced&section=keys',
				'type'  => 'link',
			],
			'consumer_key'                  => [
				'title'       => 'Consumer key',
				'type'        => 'text',
				'placeholder' => '',
			],
			'consumer_secret'                  => [
				'title'       => 'Consumer secret',
				'type'        => 'text',
				'placeholder' => '',
			],
		];
	}

	public function daisycon_check_required_settings()
	{
		if (!$this->isOnSettingsPage()) {
			return;
		}

		global $wpdb;
		if (true === method_exists($wpdb, 'send_reads_to_master')) {
			$wpdb->send_reads_to_master();
		}

		$domain = get_site_url();
		$settingsPage = $domain . '/wp-admin/options-general.php?page=daisycon-woocommerce';

		if (true === wp_doing_ajax()) {
			return;
		}

		$auth = new Daisycon_Woocommerce_Auth();
		if (false === empty($_GET['handshakeToken'])) {
			if (true === $auth->saveDaisyconTokens($_GET['handshakeToken'])) {
				wp_redirect($settingsPage);
			}
			return;
		}

		if ('true' === ($_GET['logout'] ?? 'false')) {
			$auth->logout();
		}

		$authenticated = $auth->checkAuthentication();
		$this->authenticatedUser = true === $authenticated
			? $auth->getAuthenticatedUser()
			: null;

		if (true === empty($this->authenticatedUser)) {
			$this->oAuthRedirectUri = $auth->getRedirectionUrl(true);
			return;
		}

		$settings = $this->get_settings();

		$feedbackNames = $this->_get_admin_settings_fields_template(null);

		$errors = [];
		foreach ($this->required_general_settings as $required_setting) {
			$value = $this->getValue('general', $required_setting);
			if (true === empty($value)) {
				$errors[] = $feedbackNames[$required_setting]['title'];
			}
		}

		if (false === empty($errors)) {
			$error_text = '';

			foreach ($errors as $error) {
				$error_text .= '&nbsp;-&nbsp;' . $error . '<br>';
			}

			$feedback = '<br><i>Do you see this message but the <b>data already looks good</b>? Just save it once more and this message should be gone!</i>';

			$this->show_admin_notice(
				self::ADMIN_NOTICE_TYPE_DC_ERROR,
				'Not all required <strong>general pixel settings</strong> for the Daisycon WooCommerce pixel plugin have been set<br>' . $error_text . $feedback
			);
		}

		foreach (($settings['custom'] ?? []) as $customId => $customSettings) {
			$errors = [];
			foreach ($this->required_custom_settings as $required_setting) {
				$value = $this->getValue('custom', $required_setting, $customId);
				if (true === empty($value)) {
					$errors[] = $feedbackNames[$required_setting]['title'];
				}
			}

			if (false === empty($errors)) {
				$error_text = '';

				foreach ($errors as $error) {
					$error_text .= '&nbsp;-&nbsp;' . $error . '<br>';
				}

				$feedback = '<br><i>Do you see this message but the <b>data already looks good</b>? Just save it once more and this message should be gone!</i>';

				$this->show_admin_notice(
					self::ADMIN_NOTICE_TYPE_DC_ERROR,
					'Not all required <strong>custom pixel settings (' . $customId . ')</strong> for the Daisycon WooCommerce pixel plugin have been set<br>' . $error_text . $feedback
				);
			}
		}
	}

	public function get_settings()
	{
		if (is_null($this->settings)) {
			$this->settings = get_option($this->option_name);
		}

		if (true === empty($this->settings)) {
			$this->settings = [
				'general' => [],
				'custom' => [],
			];
		}

		$this->convertSettingsToNewStructure();
		$this->appendIntegrationSettings();

		return $this->settings;
	}

	protected function appendIntegrationSettings()
	{
		$integrationSettings = (array)$this->getIntegrationSetting();
		// when integration settings are empty only before user authentication
		if (true === empty($integrationSettings)) {
			return;
		}

		if (true === empty($this->settings['auto_validation_settings'])) {
			$this->settings['auto_validation_settings'] = [
				'enabled' => 'inactive',
				'days'    => 14,
			];
		}

		$this->settings['auto_validation_settings']['enabled'] = $integrationSettings['transaction_validation']['status']
			?? $this->settings['auto_validation_settings']['enabled']
			?? 'inactive';
		$this->settings['auto_validation_settings']['days'] = $integrationSettings['transaction_validation']['days']
			?? $this->settings['auto_validation_settings']['days']
			?? 14;

		// if (false === empty($this->settings['general'])) {
		// 	$marketPlace = (array)$integrationSettings['market_places'];
		// 	if (false === empty($marketPlace[$generalLanguage])) {
		// 		$selectedMarketPlace = (array)$marketPlace[$generalLanguage];
		// 		$this->settings['general']['advertiser_id'] = $selectedMarketPlace['advertiser'] ?? null;
		// 		$this->settings['general']['campaign_id'] = $selectedMarketPlace['campaign'] ?? null;
		// 	}
		// }
		//
		// if (false === empty($this->settings['custom'])) {
		// 	foreach ($this->settings['custom'] as $key => $value) {
		// 		$marketPlace = (array)$integrationSettings['market_places'];
		// 		$customSettingLang = $this->settings['custom'][$key]['languages'][0];
		// 		if (false === empty($marketPlace[$customSettingLang])){
		// 			$selectedMarketPlace = (array)$marketPlace[$customSettingLang];
		// 			$this->settings['custom'][$key]['advertiser_id'] = $selectedMarketPlace['advertiser'] ?? null;
		// 			$this->settings['custom'][$key]['campaign_id'] = $selectedMarketPlace['campaign'] ?? null;
		// 		}
		// 	}
		// }
	}

	private function convertSettingsToNewStructure() {
		$newSettings = [];
		foreach (daisycon_languages() as $language) {
			$languageCollection = [];
			foreach ($this->settings as $key => $value) {
				if (substr($key, -strlen($language)) === $language) {
					$languageCollection[substr($key, 0, -(strlen($language) + 1))] = is_array($value) ? array_shift($value) : $value;
					unset($this->settings[$key]);
				}
			}

			if (false === empty($languageCollection)) {
				$languageCollection['languages'] = [$language];
				$newSettings[] = $languageCollection;
			}
		}

		if (count($newSettings) > 0) {
			if (false === isset($this->settings['general'])) {
				$generalIndex = $this->convertSettingsFindBestGeneral($newSettings);
				$this->settings['general'] = $newSettings[$generalIndex];
				unset($newSettings[$generalIndex]);
			}

			if (false === isset($this->settings['custom'])) {
				$this->settings['custom'] = [];
			}

			foreach ($newSettings as $setting) {
				$matchingSettingIndex = $this->convertSettingsFindMatchingSetting($this->settings['custom'], $setting);
				if ($matchingSettingIndex) {
					$this->settings['custom'][$matchingSettingIndex]['languages'] = array_unique(
						array_merge($this->settings['custom'][$matchingSettingIndex]['languages'], $setting['languages'])
					);
					continue;
				}

				$this->settings['custom'][] = $setting;
			}
		}
	}

	private function convertSettingsFindBestGeneral($newSettings) {
		return array_search(
			max(
				array_map(
					function ($setting) {
						return count($setting['languages']);
					},
					$newSettings
				)
			),
			$newSettings
		);
	}

	private function convertSettingsFindMatchingSetting($newSettings, $settingToMatch) {
		unset($settingToMatch['languages']);
		ksort($settingToMatch);
		$settingToMatch = json_encode($settingToMatch);

		foreach ($newSettings as $index => $setting) {
			unset($setting['languages']);
			ksort($setting);
			if (json_encode($setting) === $settingToMatch) {
				return $index;
			}
		}
		return null;
	}

	public function debugVariable($name, $variable, $returnValue = false)
	{
		$message = '<h3>Debug :: ' . $name . '</h3><pre style="padding: 1rem; border: solid 1px blue; border-radius: 0.5rem; background: white; margin-right: 1rem">'
			. htmlentities(var_export($variable, true))
			. '</pre>';

		if (!$returnValue) {
			echo $message;
			return;
		}
		return $message;
	}

	public function general_description()
	{
		$faqLink = 'https://faq-advertiser.daisycon.com/hc/en-us/articles/360014540054-Explanation-Implement-Daisycon-conversion-pixel-in-WordPress-WooCommerce';
		echo '<p class="dc-core-container__explanation">'
			. 'For further information on the conversion pixel settings, please see our '
			. '<a href="' . $faqLink . '" target="_blank" rel="nofollow noreferer noopener">FAQ</a>.'
			. '</p>';
	}

	public function auto_validation_description()
	{
		$faqLink = 'https://faq-advertiser.daisycon.com/hc/en-us/articles/360014540054-Explanation-Implement-Daisycon-conversion-pixel-in-WordPress-WooCommerce';
		echo '<p class="dc-core-container__explanation">'
			. 'For further information about the transaction validation settings, please see our '
			. '<a href="' . $faqLink . '" target="_blank" rel="nofollow noreferer noopener">FAQ</a>.'
			. '</p>';
	}

	public function custom_description()
	{
		// do nothing
	}

	protected function add_settings(string $group, array $settings, $groupIndex)
	{
		foreach ($settings as $settingName => $setting) {
			$callback = $setting['type'] . '_field_callback';

			add_settings_field(
				$settingName,
				$setting['title'],
				[$this, $callback],
				$this->plugin_name,
				$this->option_name . '_' . $group . ($groupIndex ? '_' . $groupIndex : ''),
				[
					'group'      => $group,
					'groupIndex' => $groupIndex,
					'name'       => $settingName,
					'setting'    => $setting,
					'label_for'  => $settingName,
				]
			);
		}

		register_setting($this->plugin_name, $this->option_name, [$this, 'validate_options']);
	}

	protected function getValue(string $group, string $name, $groupIndex = null, $defaultValue = null) {
		return $groupIndex === null
			? $this->settings[$group][$name] ?? $defaultValue
			: $this->settings[$group][$groupIndex][$name] ?? $defaultValue;
	}

	protected function createName(string $group, string $name, bool $multiple, $groupIndex) {
		return $this->option_name . '[' . $group . ']' . ($groupIndex ? '[' . $groupIndex. ']' : '') . '[' . $name . ']' . ($multiple ? '[]' : '');
	}

	public function title_field_callback(array $args) {
		return;
	}

	public function separator_field_callback(array $args) {
		if (false === isset($args['setting'])) {
			return;
		}

		if (true === isset($args['setting']['text'])) {
			echo $args['setting']['text'];
		}
	}

	public function text_field_callback(array $args)
	{
		if (false === isset($args['setting'])) {
			return;
		}

		$this->_show_text_field(
			$args['group'],
			$args['name'],
			$args['setting']['placeholder'] ?? '',
			'readonly' === ($args['setting']['readonly'] ?? ''),
			'hidden' === ($args['setting']['hidden'] ??  ''),
			$args['groupIndex'] ?? null
		);
	}

	protected function _show_text_field(string $group, string $name, string $placeholder, bool $readonly, bool $hidden, $groupIndex)
	{
		echo '<div class="dc-woocommerce-setting-container"><input'
			 . ' class="regular-text"'
			 . (true === $hidden ? ' type="hidden"' : 'type="text"')
		     . ' id="' . esc_attr($this->option_name . '_' . $group . "[" . $name . "]") . '"'
		     . ' name="' . esc_attr($this->createName($group, $name, false, $groupIndex)) . '"'
		     . ' value="' . esc_attr($this->getValue($group, $name, $groupIndex)) . '"'
		     . ' placeholder="' . esc_attr($placeholder) . '"'
			 . (true === $readonly ? ' readonly="readonly"' : '')
		     . ' /></div>';
	}

	public function number_field_callback(array $args)
	{
		if (false === isset($args['setting'])) {
			return;
		}

		echo '<div class="dc-woocommerce-setting-container"><input'
			 . ' class="regular-text"'
			 . ' type="number"'
			 . ' steps="' . esc_attr($args['setting']['steps'] ?? '1') . '"'
			 . ' id="' . esc_attr($this->option_name . '_' . $args['group'] . "[" . $args['name'] . "]") . '"'
			 . ' name="' . esc_attr($this->createName($args['group'], $args['name'], false, $args['groupIndex'] ?? null)) . '"'
			 . ' value="' . esc_attr($this->getValue($args['group'], $args['name'], $args['groupIndex'] ?? null, $args['setting']['default'] ?? null)) . '"'
			 . ' placeholder="' . esc_attr($args['setting']['placeholder'] ?? '') . '"'
			 . ('readonly' === ($args['setting']['readonly'] ?? '') ? ' readonly="readonly"' : '')
		 . ' /></div>';
	}

	public function password_field_callback(array $args)
	{
		if (false === isset($args['setting'])) {
			return;
		}

		$this->_show_password_field($args['group'], $args['name'], $args['setting']['placeholder'] ?? '', $args['groupIndex'] ?? null);
	}

	protected function _show_password_field(string $group, string $name, string $placeholder, $groupIndex)
	{
		echo '<div class="dc-woocommerce-setting-container"><input'
		     . ' class="regular-text"'
		     . ' type="password"'
		     . ' id="' . esc_attr($this->option_name . '_' . $group . "[" . $name . "]") . '"'
		     . ' name="' . esc_attr($this->createName($group, $name, false, $groupIndex)) . '"'
		     . ' value="' . esc_attr($this->getValue($group, $name, $groupIndex)) . '"'
		     . ' placeholder="' . esc_attr($placeholder) . '"'
		     . ' /></div>';
	}

	public function button_field_callback(array $args)
	{
		$onclick = true === isset($args['setting']['onclick'])
			? 'onclick="' . $args['setting']['onclick'] . '"'
			: '';
		$class = $args['setting']['class'] ?? 'button button-default';
		echo '<div class="dc-woocommerce-setting-container">'
			. '<button'
				. ' id="' . esc_attr($this->option_name . '_' . $args['group'] . "[" . $args['name'] . "]") . '" '
			 	. ' class="' . $class . '"'
			 	. ' value="' . $args['name'] . '"'
				. $onclick
			. '>'
				. htmlentities($args['setting']['title'])
			. '</button>'
		.'</div>';
	}

	public function link_field_callback(array $args)
	{
		echo '<div class="dc-woocommerce-setting-container"><a href="' . esc_attr($args['setting']['href']) . '" target="_blank">' . htmlentities($args['setting']['title']) . '</a></div>';
	}

	public function select_field_callback(array $args)
	{
		$group = $args['group'] ?? '';
		$name = $args['name'] ?? '';

		$readonly = $args['setting']['readonly'] ?? '';
		$all_options = $args['setting']['options'];

		$selected_options = count($all_options) === 1 && $readonly === 'readonly'
			? [array_keys($all_options)[0]]
			: $this->getValue(
				$group,
				$name,
				$args['groupIndex'] ?? null,
				$args['setting']['default'] ?? null
			);

		$options = '';
		foreach ($all_options as $option => $title)
		{
			$options .= $this->_show_select_option_field($option, (array)$selected_options, $title);
		}

		$name = $this->createName($group, $name, isset($args['setting']['multiple']), $args['groupIndex'] ?? null);
		echo '<div class="dc-woocommerce-setting-container">';
		echo strtr(
			'<select name="{name}" style="width: 25em;" {multiple} {readonly}>{options}</select>',
			[
				'{name}'             => esc_attr(($readonly === 'readonly' ? 'dummy_' : '') . $name),
				'{readonly}'         => ($readonly === 'readonly' ? 'disabled="disabled"' : ''),
				'{multiple}'         => isset($args['setting']['multiple']) ? 'multiple' : '',
				'{options}'          => $options,
			]
		);

		if ($readonly === 'readonly')
		{
			foreach ((array)$selected_options as $value) {
				echo strtr(
					'<input type="hidden" name="{name}" value="{value}"/>',
					[
						'{name}'             => $name,
						'{value}'            => $value,
					]
				);
			}
		}
		echo '</div>';
	}

	protected function _show_select_option_field(string $value, array $selected_options, string $title = null): string
	{
		$checked = true === in_array($value, $selected_options) ? 'selected="selected"' : false;
		$title = $title ?: ucfirst($value);

		return strtr(
			'<option value="{value}" {selected}>{label}</option>',
			[
				'{value}'    => esc_attr($value),
				'{selected}' => $checked,
				'{label}'    => esc_attr($title),
			]
		);
	}

	protected function loadCampaigns(int $advertiserId): array
	{
		try
		{
			$campaigns = (new Daisycon_Campaign_Service())->getCampaigns($advertiserId);
		}
		catch (Daisycon_Advertiser_Service_Exception $exception)
		{
			$this->show_admin_notice(self::ADMIN_NOTICE_TYPE_DC_ERROR, 'Advertiser Service Error <br>' . $exception->getMessage());
			return [];
		}
		catch (Daisycon_Campaign_Service_Exception $exception)
		{
			$this->show_admin_notice(self::ADMIN_NOTICE_TYPE_DC_ERROR, 'Campaign Service Error <br> ' . $exception->getMessage());
			return [];
		}

		if (false === empty($campaigns->error))
		{
			$this->show_admin_notice(self::ADMIN_NOTICE_TYPE_DC_ERROR, 'Campaign Service Error <br>' . $campaigns->error);
			return [];
		}

		if (true === empty($campaigns))
		{
			$this->show_admin_notice(self::ADMIN_NOTICE_TYPE_DC_ERROR, 'No campaigns found');
			return [];
		}

		return $campaigns;
	}

	protected function loadAdvertisers(): array
	{
		try
		{
			$advertisers = (new Daisycon_Advertiser_Service())->getAdvertisers();
		}
		catch (Daisycon_Advertiser_Service_Exception $exception)
		{
			$this->show_admin_notice(self::ADMIN_NOTICE_TYPE_DC_ERROR, 'Advertiser Service Error <br>' . $exception->getMessage());

			return [];
		}

		if (true === empty($advertisers)) {
			$this->show_admin_notice(self::ADMIN_NOTICE_TYPE_DC_ERROR, 'Advertisers not found');
		}

		return (array)$advertisers;
	}

	public function daisyconSaveAutomaticValidationSettings($optionName, $oldValue, $newValue)
	{

		if ($optionName !== $this->option_name) {
			return;
		}

		$integrationSettings = $this->getIntegrationSetting();

		if (
			'active' === $newValue['auto_validation_settings']['enabled']
			&& (false === isset($integrationSettings['has_credentials']) || true !== $integrationSettings['has_credentials'])
			&& (
				true === empty($newValue['auto_validation_settings']['consumer_key'])
				|| true === empty($newValue['auto_validation_settings']['consumer_secret'])
			)
		) {
			$this->show_admin_notice(self::ADMIN_NOTICE_TYPE_DC_ERROR, 'Please fill the consumer key and secret');
			return;
		}

		$encryptedKeys = [];
		if (
			false === empty($newValue['auto_validation_settings']['consumer_key'])
			&& false === empty($newValue['auto_validation_settings']['consumer_secret'])
		) {
			try {
				$encryptedKeys = $this->encryptKeys($newValue['auto_validation_settings']['consumer_key'], $newValue['auto_validation_settings']['consumer_secret']);
			} catch (Daisycon_Crypto_Exception $exception) {
				$this->show_admin_notice(self::ADMIN_NOTICE_TYPE_DC_ERROR, $exception->getMessage());
				var_dump($exception->getMessage());
				die;
			}
		}

		$data = [
			'advertiser_id'      => (int)$newValue["general"]['advertiser_id'],
			'campaign_id'        => (int)$newValue["general"]['campaign_id'],
			'transaction_validation' => [
				'status' => $newValue['auto_validation_settings']['enabled'] ?? 'inactive',
				'approval_days' => (int)$newValue['auto_validation_settings']['days'],
				'include_vat' => 'incl' === ($newValue['general']['commission_vat'] ?? 'excl'),
				'test_mode' => $integrationSettings['test_mode'] ?? 'disabled',
			],
			'custom_markets' => true === isset($newValue['custom'])
				? array_map(
					function ($entry) {
						return [
							'advertiser_id' => (int)$entry['advertiser_id'],
							'campaign_id' => (int)$entry['campaign_id'],
							'markets' => $entry['languages'],
						];
					},
					$newValue['custom']
				)
				: [],
		] + $encryptedKeys;

		try
		{
			(new Daisycon_Integration_Service())->updateIntegrationSettings($data);
		}
		catch (Exception $exception)
		{
			$this->show_admin_notice(
				self::ADMIN_NOTICE_TYPE_DC_ERROR,
				'Unable to update automatic validation settings: ' . $exception->getMessage()
			);
			var_dump($exception->getMessage());
			die;
		}
	}

	public function daisyconGetWoocommerceApiKeys()
	{
		global $wpdb;
		$userId = get_current_user_id();

		return $wpdb->get_row(
			$wpdb->prepare(
				"SELECT consumer_key, consumer_secret, permissions FROM {$wpdb->prefix}woocommerce_api_keys WHERE user_id = %d",
				$userId
			),
			ARRAY_A
		);
	}

	public function getIntegrationSetting()
	{
		if (false === $this->isAuthenticated())
		{
			return null;
		}

		if (null !== $this->integration) {
			return $this->integration;
		}

		try
		{
			$integration = (new Daisycon_Integration_Service())->getIntegrationSettings();
		}
		catch (Exception $exception)
		{
			if ($exception->getCode() !== 404) {
				$this->show_admin_notice(
					self::ADMIN_NOTICE_TYPE_DC_ERROR,
					'Unable to load automatic validation Settings: ' . $exception->getMessage()
				);
			}

			return $exception->getCode();
		}
		$this->integration = $integration->data ?? null;
		return $this->integration;
	}

	public function encryptKeys($consumerKey, $consumerSecret): array
	{
		$filePath = plugin_dir_path(__DIR__) . '/keys/woocommerce-pixel-plugin-auth-public.key.pub';

		if (false === file_exists($filePath))
		{
			throw new Daisycon_Crypto_Exception('Public Key not found in ' . $filePath);
		}

		$publicKey = file_get_contents($filePath);

		if (true === empty($publicKey))
		{
			throw new Daisycon_Crypto_Exception('Public key is empty');
		}

		$encryptedConsumerKey = $this->encrypt($consumerKey, $publicKey);
		if (true === empty($encryptedConsumerKey))
		{
			throw new Daisycon_Crypto_Exception('Encrypted consumer key is empty');
		}

		$encryptedConsumerSecret = $this->encrypt($consumerSecret, $publicKey);
		if (true === empty($encryptedConsumerSecret))
		{
			throw new Daisycon_Crypto_Exception('Encrypted consumer secret is empty');
		}

		return [
			'consumer_key'    =>  $encryptedConsumerKey,
			'consumer_secret' =>  $encryptedConsumerSecret,
		];
	}

	private function encrypt($value, $publicKey): string
	{
		try
		{
			$encryptStatus = openssl_public_encrypt($value, $encrypted, $publicKey);

			if (false === $encryptStatus)
			{
				throw new Daisycon_Crypto_Exception(
					'Unable to encrypt Woocommerce API: something went wrong when encryption'
				);
			}

			if (true === empty($encrypted))
			{
				throw new Daisycon_Crypto_Exception(
					'Unable to encrypt Woocommerce API: Encryption value is empty'
				);
			}
		}
		catch (Exception $exception)
		{
			throw new Daisycon_Crypto_Exception(
				'Unable to encrypt Woocommerce API consumer key: ' . $exception->getMessage(),
				$exception->getCode(),
				$exception
			);
		}

		try
		{
			return bin2hex($encrypted);
		}
		catch (Exception $exception)
		{
			throw new Daisycon_Crypto_Exception(
				'Unable to encrypt Woocommerce API : hex conversion error : ' . $exception->getMessage(),
				$exception->getCode(),
				$exception
			);
		}
	}
}
