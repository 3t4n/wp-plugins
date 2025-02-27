<?php
/**
 * Settings related events
 *
 * @package super-payments
 */

/**
 * Send super payments plugin settings updated event.
 *
 * @param array $old_value Old plugin settings value.
 * @param array $new_value New plugin settings value.
 * @param array $option_name Plugin settings option name.
 *
 * @return void.
 */
function wcsp_super_payments_settings_updated( $old_value, $new_value, $option_name ) { //phpcs:ignore VariableAnalysis.CodeAnalysis.VariableAnalysis.UnusedVariable

	if ( isset( WC()->payment_gateways ) ) {
		$payment_gateways         = WC()->payment_gateways->payment_gateways();
		$enabled_payment_gateways = array_keys(
			array_filter(
				$payment_gateways,
				function( $gateway ) {
					return 'yes' === $gateway->enabled;
				}
			)
		);
	} else {
		$enabled_payment_gateways = [];
	}

	wcsp_send_event(
		'PluginSettingsUpdated',
		[
			'paymentGatewayOrder' => $enabled_payment_gateways,
			'oldValue'            => [
				'enabled'                                  => ! empty( $old_value['enabled'] ) ? $old_value['enabled'] : null,
				'success_url'                              => ! empty( $old_value['success_url'] ) ? $old_value['success_url'] : null,
				'failure_url'                              => ! empty( $old_value['failure_url'] ) ? $old_value['failure_url'] : null,
				'cancel_url'                               => ! empty( $old_value['cancel_url'] ) ? $old_value['cancel_url'] : null,
				'enable_pdp'                               => ! empty( $old_value['enable_pdp'] ) ? $old_value['enable_pdp'] : null,
				'enable_bp'                                => ! empty( $old_value['enable_bp'] ) ? $old_value['enable_bp'] : null,
				'enable_banner_home'                       => ! empty( $old_value['enable_banner_home'] ) ? $old_value['enable_banner_home'] : null,
				'enable_banner_site'                       => ! empty( $old_value['enable_banner_site'] ) ? $old_value['enable_banner_site'] : null,
				'update_total'                             => ! empty( $old_value['update_total'] ) ? $old_value['update_total'] : null,
				'enable_order_received_page_referral_link' => ! empty( $old_value['enable_order_received_page_referral_link'] ) ? $old_value['enable_order_received_page_referral_link'] : null,
				'enable_order_email_referral_link'         => ! empty( $old_value['enable_order_email_referral_link'] ) ? $old_value['enable_order_email_referral_link'] : null,
				'set_as_default_payment_method'            => ! empty( $old_value['set_as_default_payment_method'] ) ? $old_value['set_as_default_payment_method'] : null,
			],
			'newValue'            => [
				'enabled'                                  => ! empty( $new_value['enabled'] ) ? $new_value['enabled'] : null,
				'success_url'                              => ! empty( $new_value['success_url'] ) ? $new_value['success_url'] : null,
				'failure_url'                              => ! empty( $new_value['failure_url'] ) ? $new_value['failure_url'] : null,
				'cancel_url'                               => ! empty( $new_value['cancel_url'] ) ? $new_value['cancel_url'] : null,
				'enable_pdp'                               => ! empty( $new_value['enable_pdp'] ) ? $new_value['enable_pdp'] : null,
				'enable_bp'                                => ! empty( $new_value['enable_bp'] ) ? $new_value['enable_bp'] : null,
				'enable_banner_home'                       => ! empty( $new_value['enable_banner_home'] ) ? $new_value['enable_banner_home'] : null,
				'enable_banner_site'                       => ! empty( $new_value['enable_banner_site'] ) ? $new_value['enable_banner_site'] : null,
				'update_total'                             => ! empty( $new_value['update_total'] ) ? $new_value['update_total'] : null,
				'enable_order_received_page_referral_link' => ! empty( $new_value['enable_order_received_page_referral_link'] ) ? $new_value['enable_order_received_page_referral_link'] : null,
				'enable_order_email_referral_link'         => ! empty( $new_value['enable_order_email_referral_link'] ) ? $new_value['enable_order_email_referral_link'] : null,
				'set_as_default_payment_method'            => ! empty( $new_value['set_as_default_payment_method'] ) ? $new_value['set_as_default_payment_method'] : null,
			],
		]
	);
}
add_action( 'update_option_woocommerce_superpayments_settings', 'wcsp_super_payments_settings_updated', 10, 3 );

/**
 * Send payment gateways order updated event.
 *
 * @param array $old_value Old payment gateways order value.
 * @param array $new_value New payment gateways order value.
 * @param array $option_name Payment gateways order option name.
 *
 * @return void.
 */
function wcsp_payment_gateways_order_updated( $old_value, $new_value, $option_name ) { //phpcs:ignore VariableAnalysis.CodeAnalysis.VariableAnalysis.UnusedVariable
	$payment_gateways         = WC()->payment_gateways->payment_gateways();
	$enabled_payment_gateways = array_filter(
		$payment_gateways,
		function( $gateway ) {
			return 'yes' === $gateway->enabled;
		}
	);

	wcsp_send_event(
		'PaymentGatewaysOrderUpdated',
		[
			'oldValue' => $old_value,
			'newValue' => $new_value,
			'enabled'  => array_keys( $enabled_payment_gateways ),
		]
	);
}
add_action( 'update_option_woocommerce_gateway_order', 'wcsp_payment_gateways_order_updated', 10, 3 );
