<?php
use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

/**
 * Class WC_Payex_Block_Support
 */
final class WC_Payex_Block_Support extends AbstractPaymentMethodType {

	/**
	 * WC_Payex_Block_Support constructor.
	 *
	 * @var WC_Payex_Gateway
	 */
	private $gateway;

	/**
	 * WC_Payex_Block_Support name.
	 *
	 * @var $name
	 */
	protected $name = 'payex';

	/**
	 * WC_Payex_Block_Support initialize constructor.
	 */
	public function initialize() {
		$this->settings = get_option( 'woocommerce_payex_settings', array() );
		$gateways       = WC()->payment_gateways->payment_gateways();
		$this->gateway  = $gateways[ $this->name ];
	}

	/**
	 * WC_Payex_Block_Support Check gateway is available.
	 *
	 * @return bool
	 */
	public function is_active() {
		return $this->gateway->is_available();
	}

	/**
	 * Scripts/handles to be registered for this payment method.
	 *
	 * @return bool
	 */
	public function get_payment_method_script_handles() {

		$script_path       = '/assets/build/frontend/blocks.js';
		$script_asset_path = WC_Payex_Payments::plugin_abspath() . 'assets/build/frontend/blocks.asset.php';
		$script_asset      = file_exists( $script_asset_path )
			? require $script_asset_path
			: array(
				'dependencies' => array(),
				'version'      => '1.2.0',
			);
		$script_url        = WC_Payex_Payments::plugin_url() . $script_path;

		wp_register_script(
			'wc-payex-block-support',
			$script_url,
			$script_asset['dependencies'],
			$script_asset['version'],
			true
		);

		return array( 'wc-payex-block-support' );
	}

	/**
	 * Get Data for payment method script
	 *
	 * @return array
	 */
	public function get_payment_method_data() {

		return array(
			// 'name'        => $this->name,
			'title'       => $this->get_setting( 'title' ),
			'description' => $this->get_setting( 'description' ),
			'supports'    => array_filter( $this->gateway->supports, array( $this->gateway, 'supports' ) ),
		);
	}
}
