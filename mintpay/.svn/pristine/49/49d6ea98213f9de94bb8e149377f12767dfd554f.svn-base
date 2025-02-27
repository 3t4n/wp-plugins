<?php
/*
 * Plugin Name: Mintpay
 * Plugin URI: https://mintpay.lk
 * Description: WooCommerce plugin of Mintpay. Sri Lanka's first buy now pay later platform, that allows consumers to split their payment into 3 interst-free installments.
 * Version: 2.0.6
 * Author: Mintpay (Private) Limited
 * Author URI: https://mintpay.lk
 * License: GPL-3.0
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: mintpay
 * Domain Path: /languages
 *
 * @package Mintpay
 */


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WooCommerce Mintpay Gateway main class.
 *
 * @class WC_MintPay
 */
class WC_Mintpay {
	/**
	 * Plugin bootstrap.
	 */
	public static function init(): void {
		// Mintpay Gateway class.
		add_action( 'plugins_loaded', array( __CLASS__, 'include_gateway_class' ), 0 );

		// Add the gateway to WooCommerce.
		add_filter( 'woocommerce_payment_gateways', array( __CLASS__, 'add_gateway' ) );

		// Add action links.
		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( __CLASS__, 'plugin_action_links' ) );

		// Registers WooCommerce Blocks integration.
		add_action( 'woocommerce_blocks_loaded', array(
			__CLASS__,
			'woocommerce_gateway_mintpay_woocommerce_block_support'
		) );

		// Mintpay Price Breakdown.
		add_action( 'plugins_loaded', array( __CLASS__, 'include_price_breakdown' ), 0 );
	}

	/**
	 * Include the Mintpay Gateway class.
	 */
	public static function include_gateway_class(): void {

		// Make the WC_Gateway_Dummy class available.
		if ( class_exists( 'WC_Payment_Gateway' ) ) {
			require_once dirname( __FILE__ ) . '/gateway/index.php';
		}
	}

	/**
	 * Include the Price Breakdown file.
	 */
	public static function include_price_breakdown(): void {
		// Make the WC_Gateway_Dummy class available.
		if ( class_exists( 'WC_Payment_Gateway' ) ) {
			require_once dirname( __FILE__ ) . '/price-breakdown/index.php';
		}
	}


	/**
	 * Add the gateway to WooCommerce.
	 *
	 * @param array $methods Payment methods.
	 *
	 * @return array Payment methods.
	 */
	public static function add_gateway( array $methods ): array {
		$methods[] = 'Mintpay_Gateway';

		return $methods;
	}

	/**
	 * Custom action links.
	 *
	 * @param array $links Plugin action links.
	 *
	 */
	public static function plugin_action_links( array $links ): array {
		$plugin_links = array(
			'<a href="' . admin_url( 'admin.php?page=wc-settings&tab=checkout&section=mintpay' ) . '">' . __( 'Settings', 'mintpay' ) . '</a>',
		);

		return array_merge( $plugin_links, $links );
	}

	/**
	 * Plugin url.
	 *
	 * @return string
	 */
	public static function plugin_url() {
		return untrailingslashit( plugins_url( '/', __FILE__ ) );
	}

	/**
	 * Plugin url.
	 *
	 * @return string
	 */
	public static function plugin_abspath() {
		return trailingslashit( plugin_dir_path( __FILE__ ) );
	}

	public static function woocommerce_gateway_mintpay_woocommerce_block_support() {
		if ( class_exists( 'Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType' ) ) {
			require_once dirname( __FILE__ ) . '/gateway/blocks.php';
			add_action(
				'woocommerce_blocks_payment_method_type_registration',
				function ( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
					$payment_method_registry->register( new WC_Mintpay_Blocks() );
				}
			);
		}
	}

}

// Check if WooCommerce is active.
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ), true ) ) {
	WC_Mintpay::init();
} else {
	add_action(
		'admin_notices',
		function () {
			?>
            <div class="notice notice-error is-dismissible">
                <p><?php esc_html_e( 'Mintpay Plugin requires WooCommerce to be installed and active.', 'mintpay' ); ?></p>
            </div>
			<?php
		}
	);
}