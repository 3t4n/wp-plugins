<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Daisycon_Woocommerce
 * @subpackage Daisycon_Woocommerce/includes
 * @author     daisycon
 */
class Daisycon_Woocommerce_Auth
{
	protected $user = null;

	protected $pluginSettings;

	protected $debugLog;

	public function __construct()
	{
		$this->pluginSettings = new Daisycon_Woocommerce_Plugin_Settings();
		$this->debugLog = new Daisycon_Woocommerce_Debug_Log();
	}

	public function checkAuthentication(): bool
	{
		$isAuthenticated = false === empty($this->getAccessToken());
		$this->debugLog->log('Checking authentication - result : ' . (true === $isAuthenticated ? 'true' : 'false'));
		return $isAuthenticated;
	}

	public function logout()
	{
		$this->debugLog->log('Logout user');
		$this->pluginSettings->deleteSetting(Daisycon_Woocommerce_Plugin_Settings::SETTING_DAISYCON_ACCESS_TOKEN);
		$this->pluginSettings->deleteSetting(Daisycon_Woocommerce_Plugin_Settings::SETTING_DAISYCON_REFRESH_TOKEN);
	}

	public function getAccessToken()
	{
		$accessToken = $this->pluginSettings->getSetting(Daisycon_Woocommerce_Plugin_Settings::SETTING_DAISYCON_ACCESS_TOKEN);

		if (true === empty($accessToken))
		{
			$this->debugLog->log('Retrieving access token - result empty');
			return null;
		}

		if (true === $this->isTokenExpired($accessToken, 300))
		{
			$this->debugLog->log('Retrieving access token - result expired / expires in ~5 minutes');
			return $this->refreshToken();
		}

		$this->debugLog->log('Retrieving access token - result success');
		return $accessToken;
	}

	public function getAdvertiserId()
	{
		$advertiserId = $this->pluginSettings->getSetting(Daisycon_Woocommerce_Plugin_Settings::SETTING_DAISYCON_ADVERTISER_ID);

		if (true === empty($advertiserId))
		{
			$this->debugLog->log('Retrieving advertiser - result empty');
			return null;
		}

		$this->debugLog->log('Retrieving advertiser - result success');
		return $advertiserId;
	}

	/**
	 * Get the authenticated users profile
	 *
	 * @return mixed|null
	 */
	public function getAuthenticatedUser(bool $fromLoop = false)
	{
		if (false === $this->checkAuthentication())
		{
			return null;
		}

		if (null !== $this->user) {
			return $this->user;
		}

		try {
			$this->user = (new Daisycon_User_Profile_Service())->get();
		} catch (\Exception $exception) {
			if ($exception->getCode() === 401) {
				if (false === $fromLoop) {
					$this->refreshToken();
					return $this->getAuthenticatedUser(true);
				}

				$this->deleteTokens();
				return null;
			}
		}
		$this->debugLog->log('Retrieving access user - result: ' . var_export($this->user, true));
		return $this->user;
	}

	private function deleteTokens()
	{
		$this->debugLog->log('Deleting tokens');
		$this->pluginSettings->deleteSetting(Daisycon_Woocommerce_Plugin_Settings::SETTING_DAISYCON_ACCESS_TOKEN);
		$this->pluginSettings->deleteSetting(Daisycon_Woocommerce_Plugin_Settings::SETTING_DAISYCON_REFRESH_TOKEN);
	}

	private function deleteHmac()
	{
		$this->debugLog->log('Deleting hmac');
		$this->pluginSettings->deleteSetting(Daisycon_Woocommerce_Plugin_Settings::SETTING_HMAC_SECRET);
	}

	/**
	 * @return string|null
	 */
	private function refreshToken()
	{
		$refreshToken = $this->pluginSettings->getSetting(Daisycon_Woocommerce_Plugin_Settings::SETTING_DAISYCON_REFRESH_TOKEN);

		if (true === empty($refreshToken)) {
			$this->debugLog->log('Refreshing tokens - result no refresh token');
			return null;
		}

		$response = wp_remote_get(
			DAISYCON_PLUGIN_URL_SERVER_TO_SERVER . "/auth/refresh",
			['headers' => ['Authorization' => 'Bearer '. $refreshToken]]
		);
		if (false === is_array($response) || true === is_wp_error($response))
		{
			printf(
				'<div class="notice notice-error is-dismissible"><p>%1$s</p>%2$s</div>',
				'Handshake failed',
				var_export($response, true)
			);
			$this->debugLog->log('Refreshing tokens - result handshake failure ' . var_export($response, true));
			$this->deleteTokens();
			return null;
		}

		$decodedData = @json_decode($response['body'] ?? '');
		if (false === is_object($decodedData) || false === isset($decodedData->data) || false === isset($decodedData->data->accessToken) || false === isset($decodedData->data->refreshToken))
		{
			printf(
				'<div class="notice notice-error is-dismissible"><p>%1$s</p>%2$s</div>',
				'Handshake failed (2)',
				var_export((true === is_array($response) && true === isset($response['body']) ? $response['body'] : $response), true)
			);
			$this->debugLog->log('Refreshing tokens - result handshake failure (no data?) ' . var_export($response, true));
			$this->deleteTokens();
			return null;
		}

		$this->pluginSettings->saveSetting(Daisycon_Woocommerce_Plugin_Settings::SETTING_DAISYCON_ACCESS_TOKEN, $decodedData->data->accessToken);
		$this->pluginSettings->saveSetting(Daisycon_Woocommerce_Plugin_Settings::SETTING_DAISYCON_REFRESH_TOKEN, $decodedData->data->refreshToken);
		$this->debugLog->log('Refreshing tokens - result success');
		return $decodedData->data->accessToken;
	}

	/**
	 * Get the HMAC
	 *
	 * @param bool $registerHmac
	 *
	 * @throws \Exception
	 * @return string
	 */
	public function getHMAC(bool $registerHmac = false): string
	{
		return hash_hmac('sha256', get_site_url(), $this->getHMACSecret($registerHmac));
	}

	/**
	 * @param string $token
	 * @param int $offset
	 *
	 * @return bool
	 */
	public function isTokenExpired(string $token, int $offset = 0): bool
	{
		$body = explode('.', $token)[1];
		$tokenData = base64_decode($body);
		$data = json_decode($tokenData);

		$this->debugLog->log(
			'Checking token expiry'
			. ' - token expires: ' . date('Y-m-d H:i:s', $data->exp) . ' (' . $data->exp . ')'
			. ' - it is currently ' . date('Y-m-d H:i:s')
			. ' - offset: ' . $offset
		);

		return (int)$data->exp <= (time() + $offset);
	}

	/**
	 * @param $handshakeToken
	 * @return bool
	 */
	public function saveDaisyconTokens($handshakeToken): bool
	{
		$response = wp_remote_get(
			DAISYCON_PLUGIN_URL_SERVER_TO_SERVER . "/auth/handshake",
			['headers' => ['Authorization' => 'Bearer '. $handshakeToken]]
		);
		if (false === is_array($response) || true === is_wp_error($response))
		{
			printf(
				'<div class="notice notice-error is-dismissible"><p>%1$s</p>%2$s</div>',
				'Handshake failed',
				var_export($response, true)
			);
			$this->debugLog->log('Converting handshake token to real tokens - result failed ' . var_export($response, true));
			return false;
		}

		$decodedData = @json_decode($response['body'] ?? '');
		if (false === is_object($decodedData) || false === isset($decodedData->data) || false === isset($decodedData->data->accessToken) || false === isset($decodedData->data->refreshToken))
		{
			printf(
				'<div class="notice notice-error is-dismissible"><p>%1$s</p>%2$s</div>',
				'Handshake failed (3)',
				var_export((true === is_array($response) && true === isset($response['body']) ? $response['body'] : $response), true)
			);
			$this->debugLog->log('Converting handshake token to real tokens - result failed (no body?) ' . var_export($response, true));
			return false;
		}

		$this->pluginSettings->saveSetting(Daisycon_Woocommerce_Plugin_Settings::SETTING_DAISYCON_ACCESS_TOKEN, $decodedData->data->accessToken);
		$this->pluginSettings->saveSetting(Daisycon_Woocommerce_Plugin_Settings::SETTING_DAISYCON_REFRESH_TOKEN, $decodedData->data->refreshToken);
		$this->debugLog->log('Converting handshake token to real tokens - result success!');
		return true;
	}

	/**
	 * @param bool $registerHmac
	 *
	 * @throws \Exception
	 * @return string
	 */
	public function getHMACSecret(bool $registerHmac = false): string
	{
		$hmacSecret = $this->pluginSettings->getSetting(Daisycon_Woocommerce_Plugin_Settings::SETTING_HMAC_SECRET);

		if (false === empty($hmacSecret) && false === $registerHmac)
		{
			$this->debugLog->log('Retrieving HMAC - result, already exists no need for registration');
			return $hmacSecret;
		}

		if (true === empty($hmacSecret))
		{
			$hmacSecret = $this->generateRandomString(120);
			$this->debugLog->log('Retrieving HMAC - CREATING');
		}

		if (true === $this->registerHMAC($hmacSecret))
		{
			$this->pluginSettings->saveSetting(Daisycon_Woocommerce_Plugin_Settings::SETTING_HMAC_SECRET, $hmacSecret);
			$this->debugLog->log('Retrieving HMAC - registration success, SAVING');
		}
		return $hmacSecret;
	}

	/**
	 * @throws \Exception
	 */
	public function getRedirectionUrl($registerHmac = false): string
	{
		$domain = get_site_url();
		$hmac = $this->getHMAC($registerHmac);
		$redirectionUrl = DAISYCON_PLUGIN_URL_REDIRECT . "/auth?" . http_build_query(['domain' => $domain, 'hmac' => $hmac]);
		$this->debugLog->log('Retrieving redirection URL - ' . $redirectionUrl);
		return $redirectionUrl;
	}

	/**
	 * @throws Exception
	 */
	public function registerHMAC($hmacSecret): bool
	{
		$domain = get_site_url();
		$response = wp_remote_post(
			DAISYCON_PLUGIN_URL_SERVER_TO_SERVER . "/auth/register",
			['body' => ['source' => 'woocommerce', 'domain' => $domain, 'hmac' => $hmacSecret]]
		);
		if (false === is_array($response) || true === is_wp_error($response))
		{
			printf(
				'<div class="notice notice-error is-dismissible"><p>%1$s</p>%2$s</div>',
				'HMAC Registration failed 1',
				var_export($response, true)
			);
			$this->debugLog->log('Registering HMAC - Result failed ' . var_export($response, true));
			$this->deleteHmac();
			return false;
		}

		$decodedData = @json_decode($response['body'] ?? '');
		if (false === is_object($decodedData) || false === isset($decodedData->data) || false === isset($decodedData->data->success) || true !== $decodedData->data->success)
		{
			printf(
				'<div class="notice notice-error is-dismissible"><p>%1$s</p>%2$s</div>',
				'HMAC Registration failed 2',
				var_export((true === is_array($response) && true === isset($response['body']) ? $response['body'] : $response), true)
			);
			$this->debugLog->log('Registering HMAC - Result failed (no body?)' . var_export($response, true));
			$this->deleteHmac();
			return false;
		}
		$this->debugLog->log('Registering HMAC - Result success!');
		return true;
	}

	/**
	 * @throws Exception
	 */
	public function generateRandomString(int $stringLength): string
	{
		if ($stringLength < 1)
		{
			throw new Exception('Length must be a positive integer');
		}

		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-._~';
		$charsLength = strlen($chars);

		return array_reduce(
			range(0, $stringLength - 1),
			function ($acc) use ($chars, $charsLength) {
				return $acc . $chars[random_int(0, $charsLength - 1)];
			},
			''
		);
	}
}
