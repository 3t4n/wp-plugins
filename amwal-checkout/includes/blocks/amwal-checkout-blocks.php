<?php

class Amwal_Checkout_Blocks {

	public function __construct() {
		// Load WooCommerce Amwal Block.
		add_action( 'woocommerce_blocks_loaded', array( $this, 'Amwal_Woo_Block_Loaded' ) );
	}
	public function Amwal_Woo_Block_Loaded() {
		global $wpdb;

		if ( class_exists( 'Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType' ) && class_exists( 'Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry' ) ) {

				
				require_once AMWALWC_PATH . 'includes/blocks/amwal-quick-block.php';
				require_once AMWALWC_PATH . 'includes/blocks/amwal-installment-block.php';
				
				$quickBlock = 'WC_Amwal_Quick_Blocks';
				add_action(
					'woocommerce_blocks_payment_method_type_registration',
					function ( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) use ( $quickBlock ) {
						$container = Automattic\WooCommerce\Blocks\Package::container();
						$container->register(
							$quickBlock,
							function () use ( $quickBlock ) {
								return new $quickBlock();
							}
						);
						$payment_method_registry->register( $container->get( $quickBlock ) );
					}
				);

				$installmentBlock = 'WC_Amwal_Installment_Blocks';
				add_action(
					'woocommerce_blocks_payment_method_type_registration',
					function ( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) use ( $installmentBlock ) {
						$container = Automattic\WooCommerce\Blocks\Package::container();
						$container->register(
							$installmentBlock,
							function () use ( $installmentBlock ) {
								return new $installmentBlock();
							}
						);
						$payment_method_registry->register( $container->get( $installmentBlock ) );
					}
				);
			
		} else {
			// Debugging output
			error_log( 'WooCommerce Blocks classes not found.' );
		}
	}
}

new Amwal_Checkout_Blocks();
