<?php

namespace AsinSmartInternationalLinks\Functionality;

use PluboRoutes\Route\RedirectRoute;

class Routes
{

	protected $plugin_name;
	protected $plugin_version;

	public function __construct($plugin_name, $plugin_version)
	{
		$this->plugin_name = $plugin_name;
		$this->plugin_version = $plugin_version;

		add_action('after_setup_theme', [$this, 'load_plubo_routes']);
		add_filter('plubo/routes', [$this, 'add_routes']);
	}

	public function load_plubo_routes($routes)
	{
		\PluboRoutes\RoutesProcessor::init();
	}

	/**
	 * Get current user IP Address.
	 *
	 * @return string
	 */
	private function get_ip_address() {
		if ( isset( $_SERVER['HTTP_X_REAL_IP'] ) ) {
			return sanitize_text_field( wp_unslash( $_SERVER['HTTP_X_REAL_IP'] ) );
		} elseif ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
			// Proxy servers can send through this header like this: X-Forwarded-For: client1, proxy1, proxy2
			return (string) rest_is_ip_address( trim( current( preg_split( '/,/', sanitize_text_field( wp_unslash( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) ) ) ) );
		} elseif ( isset( $_SERVER['REMOTE_ADDR'] ) ) {
			return sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) );
		}
		return '';
	}

	public function add_routes($routes)
	{
		$routes[] = new RedirectRoute(
			'asin-smart-links/{asin:([a-zA-Z0-9-]+)}',
			function ($matches) {
				$ip = $this->get_ip_address();
				$response  = wp_remote_get( 'http://www.geoplugin.net/php.gp?ip='. $ip );
				$body = wp_remote_retrieve_body( $response );
				$country_code = 'US';

				if(200 === wp_remote_retrieve_response_code( $response )) {
					$geo_data = maybe_unserialize( $body );
					$country_code = isset($geo_data['geoplugin_countryCode']) ? sanitize_text_field($geo_data['geoplugin_countryCode']) : 'US';
				}

				$asin = sanitize_text_field( $matches['asin'] );
				$domain = '.com';
				$associate_id = carbon_get_theme_option('asil_affiliate');
				$associate_type = carbon_get_theme_option('asil_affiliate_type');
				$is_global_associate = ($associate_type === 'unique');

				switch ($country_code) {
					case 'AU':
						$domain = '.com.au';
						$associate_id = $is_global_associate ? $associate_id : carbon_get_theme_option('asil_affiliate_au');
						break;
					case 'AT':
					case 'CZ':
					case 'DE':
						$domain = '.de';
						$associate_id = $is_global_associate ? $associate_id : carbon_get_theme_option('asil_affiliate_de');
						break;
					case 'BE':
						$domain = '.com.be';
						$associate_id = $is_global_associate ? $associate_id : carbon_get_theme_option('asil_affiliate_be');
						break;
					case 'BR':
						$domain = '.com.br';
						$associate_id = $is_global_associate ? $associate_id : carbon_get_theme_option('asil_affiliate_br');
						break;
					case 'CA':
						$domain = '.ca';
						$associate_id = $is_global_associate ? $associate_id : carbon_get_theme_option('asil_affiliate_ca');
						break;
					case 'CN':
						$domain = '.cn';
						$associate_id = $is_global_associate ? $associate_id : carbon_get_theme_option('asil_affiliate_cn');
						break;
					case 'EG':
						$domain = '.eg';
						$associate_id = $is_global_associate ? $associate_id : carbon_get_theme_option('asil_affiliate_eg');
						break;
					case 'FR':
						$domain = '.fr';
						$associate_id = $is_global_associate ? $associate_id : carbon_get_theme_option('asil_affiliate_fr');
						break;
					case 'IN':
						$domain = '.in';
						$associate_id = $is_global_associate ? $associate_id : carbon_get_theme_option('asil_affiliate_in');
						break;
					case 'IT':
						$domain = '.it';
						$associate_id = $is_global_associate ? $associate_id : carbon_get_theme_option('asil_affiliate_it');
						break;
					case 'JP':
						$domain = '.com.jp';
						$associate_id = $is_global_associate ? $associate_id : carbon_get_theme_option('asil_affiliate_jp');
						break;
					case 'MX':
						$domain = '.com.mx';
						$associate_id = $is_global_associate ? $associate_id : carbon_get_theme_option('asil_affiliate_mx');
						break;
					case 'NL':
						$domain = '.nl';
						$associate_id = $is_global_associate ? $associate_id : carbon_get_theme_option('asil_affiliate_nl');
						break;
					case 'PL':
						$domain = '.pl';
						$associate_id = $is_global_associate ? $associate_id : carbon_get_theme_option('asil_affiliate_pl');
						break;
					case 'SA':
						$domain = '.sa';
						$associate_id = $is_global_associate ? $associate_id : carbon_get_theme_option('asil_affiliate_sa');
						break;
					case 'SG':
						$domain = '.sg';
						$associate_id = $is_global_associate ? $associate_id : carbon_get_theme_option('asil_affiliate_sg');
						break;
					case 'ES':
						$domain = '.es';
						$associate_id = $is_global_associate ? $associate_id : carbon_get_theme_option('asil_affiliate_es');
						break;
					case 'SE':
						$domain = '.se';
						$associate_id = $is_global_associate ? $associate_id : carbon_get_theme_option('asil_affiliate_se');
						break;
					case 'TR':
						$domain = '.com.tr';
						$associate_id = $is_global_associate ? $associate_id : carbon_get_theme_option('asil_affiliate_tr');
						break;
					case 'AE':
						$domain = '.ae';
						$associate_id = $is_global_associate ? $associate_id : carbon_get_theme_option('asil_affiliate_ae');
						break;
					case 'GB':
						$domain = '.co.uk';
						$associate_id = $is_global_associate ? $associate_id : carbon_get_theme_option('asil_affiliate_gb');
						break;
				}

				return "http://www.amazon{$domain}/dp/{$asin}/ref=nosim?tag={$associate_id}";
			},
			[
				'status' => 302, //Default 301
				'external' => true, //Default false
			]
		);
		return $routes;
	}
}
