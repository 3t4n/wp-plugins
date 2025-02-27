<?php
class Daisycon_Hmac_Verification_Service
{
	public function verifyHmac($hmac = null)
	{
		$input = $hmac;
		$hmac = false === empty($hmac) ? base64_decode($hmac) : base64_decode($_REQUEST['hmac'] ?? '');

		$hmacSecret = (new Daisycon_Woocommerce_Plugin_Settings())->getSetting(Daisycon_Woocommerce_Plugin_Settings::SETTING_HMAC_SECRET);
		wp_send_json(['valid' => $hmacSecret === $hmac]);
	}
}
