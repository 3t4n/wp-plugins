<?php

class Daisycon_Integration_Service
{
	/**
	 * @param array $data
	 *
	 * @throws \Exception
	 * @return array|mixed
	 */
	public function updateIntegrationSettings(array $data) {
		$response = (new Daisycon_Http_Handler())
			->put(
				DAISYCON_PLUGIN_URL_SERVER_TO_SERVER . "/store/settings",
				$data
			);

		$body = wp_remote_retrieve_body($response);

		return false === empty($body) ? json_decode($body)->data ?? [] : [];
	}

	/**
	 * @throws \Exception
	 * @return array|mixed
	 */
	public function getIntegrationSettings()
	{
		$response = (new Daisycon_Http_Handler())->get(DAISYCON_PLUGIN_URL_SERVER_TO_SERVER . "/store/settings");

		return true === is_array($response) && true === isset($response['body'])
			? json_decode($response['body'])->data ?? null
			: [];
	}
}
