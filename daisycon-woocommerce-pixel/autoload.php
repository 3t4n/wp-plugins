<?php

class Daisycon_WooCommerce_Autoload
{
	private static $classMap = [
		'Daisycon_Auth_Exception'               => __DIR__ . '/exceptions/class-daisycon-auth-exception.php',
		'Daisycon_Campaign_Service_Exception'   => __DIR__ . '/exceptions/class-daisycon-campaign-service-exception.php',
		'Daisycon_Crypto_Exception'             => __DIR__ . '/exceptions/class-daisycon-crypto-exception.php',
		'Daisycon_Advertiser_Service_Exception' => __DIR__ . '/exceptions/class-daisycon-advertiser-service-exception.php',
		'Daisycon_Hmac_Verification_Service'    => __DIR__ . '/services/class-daisycon-hmac-verification-service.php',
		'Daisycon_Advertiser_Service'           => __DIR__ . '/services/class-daisycon-advertiser-service.php',
		'Daisycon_User_Profile_Service'         => __DIR__ . '/services/class-daisycon-user-profile-service.php',
		'Daisycon_Common_Service'               => __DIR__ . '/services/class-daisycon-common-service.php',
		'Daisycon_Integration_Service'          => __DIR__ . '/services/class-daisycon-integration-service.php',
		'Daisycon_Campaign_Service'             => __DIR__ . '/services/class-daisycon-campaign-service.php',
		'Daisycon_Woocommerce_Loader'           => __DIR__ . '/includes/class-daisycon-woocommerce-loader.php',
		'Daisycon_Woocommerce_Plugin_Settings'  => __DIR__ . '/includes/class-daisycon-woocommerce-plugin-settings.php',
		'Daisycon_Woocommerce_Auth'             => __DIR__ . '/includes/class-daisycon-woocommerce-auth.php',
		'Daisycon_Woocommerce_Activator'        => __DIR__ . '/includes/class-daisycon-woocommerce-activator.php',
		'Daisycon_Woocommerce_i18n'             => __DIR__ . '/includes/class-daisycon-woocommerce-i18n.php',
		'Daisycon_Woocommerce'                  => __DIR__ . '/includes/class-daisycon-woocommerce.php',
		'Daisycon_Woocommerce_Debug_Log'        => __DIR__ . '/includes/class-daisycon-woocommerce-debug-log.php',
		'Daisycon_Woocommerce_Error_Handler'    => __DIR__ . '/includes/class-daisycon-woocommerce-error-handler.php',
		'Daisycon_Woocommerce_Settings'         => __DIR__ . '/admin/class-daisycon-woocommerce-settings.php',
		'Daisycon_Woocommerce_Admin'            => __DIR__ . '/admin/class-daisycon-woocommerce-admin.php',
		'Daisycon_Http_Handler'                 => __DIR__ . '/utils/class-daisycon-http-handler.php',
		'Daisycon_Woocommerce_Public'           => __DIR__ . '/public/class-daisycon-woocommerce-public.php',
	];

	public static function loadClass($className) {
		if (true === array_key_exists($className, static::$classMap)) {
			require_once static::$classMap[$className];
			return true;
		}
		return false;
	}
}
