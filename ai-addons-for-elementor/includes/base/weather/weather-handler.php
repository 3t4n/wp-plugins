<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

/**
 * AIEA_Weather_Handler Class.
 */
class AIEA_Weather_Handler {
	
	protected static $instance;

	/**
	 * Get Weather Data.
	 *
	 * @access public
	 * @since 2.8.23
	 *
	 * @return array
	 */
	public function get_weather_data( $settings ) {
		
		$req_url = '';
		if( $settings['version'] == '3.0' ) {
			$location = $this->get_lat_long_by_city( $settings['city'], $settings['api_key'] );
			$req_url = 'https://api.openweathermap.org/data/3.0/onecall?lat='. $location['lat'] .'&lon='. $location['lon'];
		} else {
			$req_url = 'https://api.openweathermap.org/data/2.5/weather?q='. $settings['city'];
		}
		
		$req_url .= '&units=metric&exclude=minutely,alerts';
		$req_url .= '&appid=' . $settings['api_key'];

		$weather_data = wp_remote_get(
			$req_url,
			array(
				'timeout'   => 60,
				'sslverify' => false,
			)
		);

		if ( is_wp_error( $weather_data ) || empty( $weather_data ) ) {
			return array(
				'status' => false
			);
		}

		$weather_data = json_decode( wp_remote_retrieve_body( $weather_data ), true );

		return [ 'status' => 'success', 'data' => $weather_data ];
		
	}
	
	public function get_lat_long_by_city( $city, $api_key ) {
		
		$req_url = 'http://api.openweathermap.org/geo/1.0/direct?q='. $city .'&limit=1&&appid='. $api_key;
		
		$weather_data = wp_remote_get(
			$req_url,
			array(
				'timeout'   => 60,
				'sslverify' => false,
			)
		);

		if ( is_wp_error( $weather_data ) || empty( $weather_data ) ) {
			return false;
		}
		
		
		
		$weather_data = json_decode( wp_remote_retrieve_body( $weather_data ), true );

		return [ 'lat' => $weather_data[0]['lat'], 'lon' => $weather_data[0]['lon'] ];
		
	}
	
	public function get_weather_icons( $key ) {
		
		$icons = [
			'01d' => '01d',
			'01n' => '01n',
			'02d' => '02d',
			'02n' => '02n',
			'03d' => '03',
			'04d' => '03',
			'03n' => '03',
			'04n' => '03',
			'09d' => '09',
			'09n' => '09',
			'10d' => '10d',
			'10n' => '10n',
			'11d' => '11',
			'11n' => '11',
			'13d' => '13',
			'13n' => '13',
			'50d' => '03',
			'50n' => '03',
		];

		return isset( $icons[$key] ) ? $icons[$key] . '.svg' : '';
		
	}
		
	public static function instance() {

		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
	
}

function aiea_weather_handler() {
	return AIEA_Weather_Handler::instance();
}
