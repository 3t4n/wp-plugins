<?php

class Daisycon_Http_Handler
{
	const CACHE_KEY_PREFIX = 'daisycon_cache';
	const CACHE_LIFETIME = 300;

	/**
	 * @throws \Exception
	 */
	public function get($url)
	{
		$cacheKey = self::CACHE_KEY_PREFIX . '__' . md5($url);
		$response = get_transient($cacheKey);
		if (false !== $response) {
			return $response;
		}

		$response =  wp_remote_get($url,
			[
				'headers' => [
					'Content-Type'  => 'application/json',
					'Authorization' => 'Bearer ' . (new Daisycon_Woocommerce_Auth())->getAccessToken(),
				],
			]
		);

		$this->checkResponse($response);
		set_transient($cacheKey, $response, self::CACHE_LIFETIME);
		
		return $response;
	}

	/**
	 * @throws \Exception
	 */
	public function put($url, array $data)
	{
		$response = wp_remote_request($url, [
			'headers' => [
				'Content-Type'  => 'application/json',
				'Authorization' => 'Bearer ' . (new Daisycon_Woocommerce_Auth())->getAccessToken(),
			],
			'body'    => json_encode($data),
			'method'  => 'PUT',
		]);

		$this->checkResponse($response);

		return $response;
	}

	/**
	 * @param $response
	 * @throws \Exception
	 * @return void
	 */
	private function checkResponse($response)
	{
		if (is_wp_error($response)) {
			throw new Exception('Something went wrong: ' . implode(', ', $response->get_error_messages()));
		}

		$responseCode = wp_remote_retrieve_response_code($response);
		if ($responseCode >= 400) {
			$body = wp_remote_retrieve_body($response);
			$decoded = false === empty($body) ? json_decode($body, true) : [];
			$errorMessage = $decoded['data']['error'] ?? var_export($response, true);
			throw new Exception('Request failed: ' . $errorMessage, $responseCode);
		}
	}
}
