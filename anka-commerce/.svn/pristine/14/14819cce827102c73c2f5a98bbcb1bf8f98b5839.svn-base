<?php
	/**
	 * ANKA Pay Blocks integration for WooCommerce.
	 *
	 * @package Anka_Commerce
	 * @since 1.0.0
	 */

	use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

	final class Anka_Commerce_Woocommerce_Gateway_Anka_Pay_Blocks_Support extends AbstractPaymentMethodType {

		/**
		 * The gateway instance.
		 *
		 * @var Anka_Commerce_Woocommerce_Gateway_Anka_Pay
		 */
		private $gateway;

		/**
		 * Payment method name/id/slug.
		 *
		 * @var string
		 */
		protected $name = 'ankapay';

		/**
		 * Initializes the payment method type.
		 */
		public function initialize() {
			$this->settings = array_map( 'sanitize_text_field', get_option( 'woocommerce_ankapay_settings', [] ) );
			$gateways = WC()->payment_gateways->payment_gateways();
			$this->gateway = $gateways[ $this->name ];
		}

		/**
		 * Returns if this payment method should be active. If false, the scripts will not be enqueued.
		 *
		 * @return boolean
		 */
		public function is_active() {
			return $this->gateway->is_available();
		}

		/**
		 * Returns an array of scripts/handles to be registered for this payment method.
		 *
		 * @return array
		 */
		public function get_payment_method_script_handles() {
			$script_path       = '/build/anka-commerce-woocommerce-block.js';
			$script_asset_path = ANKA_COMMERCE_PLUGIN_DIR . 'build/anka-commerce-woocommerce-block.asset.php';
			$script_asset      = file_exists( $script_asset_path )
				? require( $script_asset_path )
				: array(
					'dependencies' => array(),
					'version'      => ANKA_COMMERCE_VERSION
				);
			$script_url        = esc_url( ANKA_COMMERCE_PLUGIN_URL . $script_path );

			wp_register_script(
				'anka_commerce_woocommerce_block',
				$script_url,
				$script_asset[ 'dependencies' ],
				$script_asset[ 'version' ],
				true
			);

			if ( function_exists( 'wp_set_script_translations' ) ) {
				wp_set_script_translations(
					'anka_commerce_woocommerce_block',
					'anka-commerce',
					ANKA_COMMERCE_PLUGIN_DIR . 'languages/'
				);
			}

			return [ 'anka_commerce_woocommerce_block' ];
		}

		/**
		 * Returns an array of key=>value pairs of data made available to the payment methods script.
		 *
		 * @return array
		 */
		public function get_payment_method_data() {
			return array(
				'title'       => sanitize_text_field( $this->get_setting( 'title' ) ),
				'description' => sanitize_text_field( $this->get_setting( 'description' ) ),
				'defaultIcon'	=> esc_url( ANKA_COMMERCE_PLUGIN_URL . 'assets/img/anka-pay-global.png' ),
				'supports'		=> array_filter( $this->gateway->supports, [ $this->gateway, 'supports' ] )
			);
		}
	}
?>
