<?php
namespace Altoviz;

defined('ABSPATH') || exit;

class AOZ4WC_App {

	public function __construct() {
	}
	/**
	 * Summary of get_url
	 * 
	 * @return bool|string
	 */
	public function get_url() {
		$slug = AOZ4WC()->app()->get_settings_slug();
		if (!$slug) {
			return false;
		}
		if (defined('AOZ4WC_INTERNAL')) {
			$url = AOZ4WC()->replace_subdomain('app');
		} else {
			$url = 'https://app.altoviz.com';
		}
		if (!$url) {
			return false;
		}
		return $url . '/' . $slug;
	}
	/**
	 * Summary of get_settings_default_shipping_classification
	 */
	public function get_settings_default_shipping_classification() {
		$settings = $this->get_settings();
		return $settings ? $settings['sales']['defaultShippingClassification']['id'] : false;
	}
	/**
	 * Summary of get_settings_slug
	 */
	public function get_settings_slug() {
		$settings = $this->get_settings();
		return $settings ? $settings['company']['urlCompanyName'] : false;
	}
	/**
	 * Summary of get_settings_language
	 * 
	 * @return string
	 */
	public function get_settings_language() {
		$settings = $this->get_settings();
		//return $settings ? $settings['company']['urlCompanyName'] : false;
		return 'fr_FR';
	}
	/**
	 * Summary of get_settings
	 */
	public function get_settings() {
		$settings = AOZ4WC()->api()->settings_get();
		return $settings;
	}
	/**
	 * Summary of get_supported_currencies
	 * 
	 * @return void
	 */
	public function get_supported_currencies(): array {
		return [ 'EUR' ];
	}
	public function is_supported_currency(string $currency): string {
		return in_array( strtoupper( $currency ), $this->get_supported_currencies(), true );
	}
	/**
	 * Summary of switch_language
	 * 
	 * @param mixed $callback
	 */
	public function switch_language($callback) {
		$return = false;
		$switch = switch_to_locale(AOZ4WC()->app()->get_settings_language());
		if ($switch) {
			AOZ4WC()->load_text_domain();
		}
		try {
			$return = $callback();
		} finally {
			if ($switch) {
				restore_previous_locale();
				AOZ4WC()->load_text_domain();
			}
			return $return;
		}
	}
}
