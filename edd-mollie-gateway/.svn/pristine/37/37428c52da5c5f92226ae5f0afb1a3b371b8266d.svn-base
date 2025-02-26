<?php
class Mollie_EDD_Helper_Settings
{
	/**
	 * @return bool
	 */
	public function isTestModeEnabled()
	{
		return edd_is_test_mode();
	}

	/**
	 * @param bool $test_mode
	 * @return null|string
	 */
	public function getApiKey($test_mode = false)
	{
		$mode = $test_mode === false ? 'live' : 'test';
		return EDD_Mollie()->settings()->get_api_key( $mode );
	}

	/**
	 * Retrieve the Payment Locale Setting from Database
	 *
	 * @return string
	 */
	protected function getPaymentLocaleSetting()
	{
		$option = EDD_Mollie()->settings()->get_option( 'payment_locale', 'wp_locale' );

		return trim($option);
	}

	/**
	 * Retrieve the Payment Locale
	 *
	 * @return string
	 */
	public function getPaymentLocale()
	{
		$setting = $this->getPaymentLocaleSetting();

		if ($setting === 'detect_by_browser') {
			return $this->browserLanguage();
		}

		$setting === 'wp_locale'
			? $languageCode = $this->getCurrentLocale()
			: $languageCode = $setting;

		// TODO Missing Post condition, $languageCode has to be check for a valid
		//      language code.

		return $languageCode ?: $this->getDefaultLocale();
	}

	 /**
	 * Retrieve the Payment Locale
	 *
	 * @return string
	 */
	public function getDefaultLocale()
	{
		return 'en_US';
	}   

	/**
	 * Store customer details at Mollie
	 *
	 * @return string
	 */
	public function shouldStoreCustomer ()
	{
		return EDD_Mollie()->settings()->get_option( 'store_customer_details' ) === 'yes';
	}

	/**
	 * @return bool
	 */
	public function isDebugEnabled ()
	{
		return EDD_Mollie()->settings()->get_option( 'enable_debug' ) === 'yes';
	}

	/**
	 * @return string
	 */
	public function getGlobalSettingsUrl ()
	{
		return admin_url('edit.php?post_type=download&page=edd-settings&tab=gateways&section=edd-mollie');
	}

	/**
	 * @return string
	 */
	public function getLogsUrl ()
	{
		return admin_url('edit.php?post_type=download&page=edd-reports&tab=logs&view=gateway_errors');
	}

	/**
	 * Get current locale by WordPress
	 *
	 * Default to $this->getDefaultLocale()
	 *
	 * @return string
	 */
	protected function getCurrentLocale()
	{
		$locale = apply_filters('wpml_current_language', get_locale());

		// Convert known exceptions
		$locale = $locale === 'nl_NL_formal' ? 'nl_NL' : $locale;
		$locale = $locale === 'de_DE_formal' ? 'de_DE' : $locale;
		$locale = $locale === 'no_NO' ? 'nb_NO' : $locale;

		return $this->extractValidLanguageCode([$locale]);
	}

	/**
	 * Retrieve the browser language
	 *
	 * @return string
	 */
	protected function browserLanguage()
	{
		if (empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
			return $this->getDefaultLocale();
		}

		$httpAcceptedLanguages = explode(',', sanitize_text_field( wp_unslash( $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) ));
		foreach ($httpAcceptedLanguages as $index => $languageCode) {
			$languageCode = explode(';', $languageCode)[0];
			if (strpos($languageCode, '-') !== false) {
				$languageCode = str_replace('-', '_', $languageCode);
			}

			$httpAcceptedLanguages[$index] = $languageCode;
		}
		$httpAcceptedLanguages = array_filter($httpAcceptedLanguages);

		if (!$httpAcceptedLanguages) {
			return $this->getDefaultLocale();
		}

		return $this->extractValidLanguageCode($httpAcceptedLanguages);
	}

	/**
	 * Extract a valid code Language from the given arguments
	 *
	 * The language Code could contains valid language codes that are not supported such as
	 * country codes.
	 *
	 * Since the Browser can send both country and region codes we need to map the country code
	 * to a region code on the fly.
	 *
	 * The method does that, it try to retrieve the language code if it's exists within the
	 * allowed language codes dictionary, if not it will try to retrieve the first one that
	 * contains the country code.
	 *
	 * @param array $languageCodes
	 * @return string
	 */
	protected function extractValidLanguageCode(array $languageCodes)
	{
		// TODO Need Assertion to ensure $languageCodes is not empty and contains only strings

		/**
		 * Filter Allowed Language Codes
		 *
		 * @param array $allowedLanguageCodes
		 */
		$allowedLanguageCodes = apply_filters(
			'mollie_allowed_language_code_setting',
			$this->getAllowedLanguageCodes()
		);

		if (empty($allowedLanguageCodes)) {
			// TODO Need validation for Language Code
			return (string)$languageCodes[0];
		}

		foreach ($languageCodes as $index => $languageCode) {
			if (in_array($languageCode, $allowedLanguageCodes, true)) {
				return $languageCode;
			}
		}

		foreach ($languageCodes as $languageCode) {
			foreach ($allowedLanguageCodes as $currentAllowedLanguageCode) {
				$countryCode = substr($currentAllowedLanguageCode, 0, 2);
				if ($countryCode === $languageCode) {
					return $currentAllowedLanguageCode;
				}
			}
		}

		return $this->getDefaultLocale();
	}

	public function getAllowedLanguageCodes()
	{
		return [
			'en_US',
			'nl_NL',
			'nl_BE',
			'fr_FR',
			'fr_BE',
			'de_DE',
			'de_AT',
			'de_CH',
			'es_ES',
			'ca_ES',
			'pt_PT',
			'it_IT',
			'nb_NO',
			'sv_SE',
			'fi_FI',
			'da_DK',
			'is_IS',
			'hu_HU',
			'pl_PL',
			'lv_LV',
			'lt_LT',
		];
	}
}
