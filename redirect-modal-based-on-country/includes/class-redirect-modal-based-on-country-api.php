<?php

/** @package  */
class Redirect_Modal_Based_On_Country_API
{
	/**
	 * @param mixed $ip 
	 * @return object 
	 */
	public function get_visitor_ip_info($ip)
	{
		$transientPrefix = RMBOC_SHORT_PREFIX.'_'.$ip;

		if (false === get_transient( $transientPrefix )) {
			$endpoint = 'http://ip-api.com/json/'.esc_attr($ip).'?fields=country,countryCode';

			$res = wp_remote_get($endpoint);

			$results = $this->load_request($res);

			set_transient( $transientPrefix, $results );

			return $results;
		} else {
			return get_transient( $transientPrefix );
		}
	}

	/**
	 * @param mixed $response 
	 * @return object|null
	 */
	private function load_request($response) {
		try {
			$json = json_decode( $response['body'] );
		} catch ( \Exception $ex ) {
			$json = null;
		}

		return $json;
	}
}