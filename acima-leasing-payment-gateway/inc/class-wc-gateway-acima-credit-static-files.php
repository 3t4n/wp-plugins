<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( WC_Gateway_Acima_Credit_Static_Files::class ) ) {
	/**
	 * Acima Digital Payment Gateway Static Files
	 *
	 * Enqueue static files for the Acima Digital Plugin
	 *
	 * @class   WC_Gateway_Acima_Credit_Static_Files
	 * @package WooCommerce/Classes/Payment
	 * @author  Acima Digital, Inc
	 */
	class WC_Gateway_Acima_Credit_Static_Files {

		/**
		 * Get the plugin version for cache busting
		 *
		 * @return string
		 */
		private static function get_asset_version(): string {
			return defined( 'WC_ACIMA_VERSION' ) ? WC_ACIMA_VERSION : '1.0.0';
		}

		/**
		 * Enqueue the static files
		 *
		 * @since 2.0.0
		 */
		public static function enqueue_files() {
			$version = self::get_asset_version();

			if ( is_admin() ) {
				// Static files for admin panel
				return;
			}

			$acima_settings = get_option( 'woocommerce_acima_credit_settings' );
			$sdk_url        = self::getSdkUrl();

			if ( empty( $sdk_url ) ) {
				WC_Gateway_Acima_Credit_Logger::error( 'SDK URL not found in settings' );
				return;
			}

			// Static files for front-end
			wp_enqueue_script(
				'acima-js-sdk',
				$sdk_url,
				array(),
				$version,
				true
			);

			wp_add_inline_script(
				'acima-js-sdk',
				'window.onAcimaSDKLoaded && window.onAcimaSDKLoaded();',
				'after'
			);

			// Register and enqueue main script
			wp_register_script(
				'acima-credit-js',
				plugins_url( '/public/js/acima-credit.js', __DIR__ ),
				array( 'acima-js-sdk' ),
				$version,
				true
			);
			wp_enqueue_script( 'acima-credit-js' );

			// Load webpack-built pre-approval
			$pre_approval_asset_file = include plugin_dir_path( __DIR__ ) . 'assets/js/frontend/pre-approval.asset.php';
			wp_enqueue_script(
				'acima-credit-pre-approval',
				plugins_url( '/assets/js/frontend/pre-approval.js', __DIR__ ),
				array_merge( array( 'acima-js-sdk' ), $pre_approval_asset_file['dependencies'] ),
				$pre_approval_asset_file['version'],
				true
			);

			// Enqueue styles with versions
			wp_enqueue_style(
				'acima-credit-css',
				plugins_url( '/public/css/acima-credit.css', __DIR__ ),
				array(),
				$version
			);
			wp_enqueue_style(
				'acima-credit-checkout-css',
				plugins_url( '/public/css/checkout.css', __DIR__ ),
				array(),
				$version
			);
			wp_enqueue_style(
				'acima-credit-pre-approval-css',
				plugins_url( '/public/css/pre-approval.css', __DIR__ ),
				array(),
				$version
			);

			// Enqueue webpack-generated files
			$blocks_asset_file = include plugin_dir_path( __DIR__ ) . 'assets/js/frontend/blocks.asset.php';
			wp_enqueue_script(
				'acima-credit-blocks',
				plugins_url( '/assets/js/frontend/blocks.js', __DIR__ ),
				$blocks_asset_file['dependencies'],
				$blocks_asset_file['version'],
				true
			);
			wp_script_add_data(
				'acima-credit-blocks',
				'sourcemap',
				plugins_url( '/assets/js/frontend/blocks.js.map', __DIR__ )
			);

			$checkout_asset_file = include plugin_dir_path( __DIR__ ) . 'assets/js/frontend/acima-credit-checkout.asset.php';
			wp_enqueue_script(
				'acima-credit-checkout',
				plugins_url( '/assets/js/frontend/acima-credit-checkout.js', __DIR__ ),
				$checkout_asset_file['dependencies'],
				$checkout_asset_file['version'],
				true
			);

			$block_checkout_asset_file = include plugin_dir_path( __DIR__ ) . 'assets/js/frontend/block-checkout.asset.php';
			wp_enqueue_script(
				'acima-credit-block-checkout',
				plugins_url( '/assets/js/frontend/block-checkout.js', __DIR__ ),
				$block_checkout_asset_file['dependencies'],
				$block_checkout_asset_file['version'],
				true
			);
			wp_script_add_data(
				'acima-credit-block-checkout',
				'sourcemap',
				plugins_url( '/assets/js/frontend/block-checkout.js.map', __DIR__ )
			);

			wp_localize_script(
				'acima-credit-checkout',
				'acimaCredit',
				array(
					'ajax_url'       => admin_url( 'admin-ajax.php' ),
					'rest_nonce'     => wp_create_nonce( 'wp_rest' ),
					'ajax_nonce'     => wp_create_nonce( 'acima-credit-nonce' ),
					'merchant_id'    => $acima_settings['merchant_id'] ?? '',
					'api_url'        => $acima_settings['api_url'] ?? '',
					'payment_method' => WC_Gateway_Acima_Credit::PAYMENT_METHOD_CODE,
				)
			);

			wp_localize_script(
				'acima-credit-block-checkout',
				'acimaBlockCheckout',
				array(
					'nonce' => wp_create_nonce( 'wp_rest' ),
				)
			);
		}

		protected static function getSdkUrl(): string {
			$acimaSettings = get_option( 'woocommerce_acima_credit_settings', array() );
			$configSdkUrl  = $acimaSettings['sdkUrl'] ?? '';

			if ( ! empty( $configSdkUrl ) ) {
				return $configSdkUrl;
			}

			return self::getFallbackSdkUrl( $acimaSettings );
		}

		/**
		 * Logs SDK URL once per day
		 *
		 * @param string $sdkUrl SDK URL to log
		 * @return void
		 */
		private static function logSdkUrl( string $sdkUrl ): void {
			if ( get_transient( 'acima_sdk_url_logged' ) ) {
				return;
			}

			WC_Gateway_Acima_Credit_Logger::log( 'SDK URL: ' . $sdkUrl );
			set_transient( 'acima_sdk_url_logged', true, DAY_IN_SECONDS );
		}

		/**
		 * Generates fallback SDK URL for existing merchants based on API URL
		 *
		 * @param array $settings Acima Credit settings
		 * @return string Generated SDK URL
		 */
		private static function getFallbackSdkUrl( array $settings ): string {
			$apiUrl = $settings['api_url'] ?? '';
			$apiUrl = rtrim( $apiUrl, '/' );

			$envSuffix = self::getEnvironmentSuffix( $apiUrl );
			$sdkUrl    = sprintf( '%s/js/acima%s.min.js', $apiUrl, $envSuffix );

			self::logSdkUrl( $sdkUrl );

			return $sdkUrl;
		}

		/**
		 * Determines environment suffix based on API URL
		 *
		 * @param string $apiUrl API URL to analyze
		 * @return string Environment suffix or empty string
		 */
		private static function getEnvironmentSuffix( string $apiUrl ): string {
			$pattern = '/ecom\.(qa|learning|sandbox|preflight|dev)\.acima(?:credit)?\.(?:in|com)/';

			if ( preg_match( $pattern, $apiUrl, $matches ) ) {
				return '.' . $matches[1];
			}

			return '';
		}
	}
}

add_action( 'wp_enqueue_scripts', array( 'WC_Gateway_Acima_Credit_Static_Files', 'enqueue_files' ) );
