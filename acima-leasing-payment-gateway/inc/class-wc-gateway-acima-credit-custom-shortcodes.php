<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Acima Digital Payment Gateway Custom Shortcodes
 *
 * Register custom shortcodes for Acima Digital
 *
 * @class   WC_Gateway_Acima_Credit_Custom_Shortcodes
 * @package WooCommerce/Classes/Payment
 * @author  Acima Digital, Inc
 */
function acima_leasing_init_pre_approval_button() {
	ob_start();

	$acimaSettings = get_option( 'woocommerce_acima_credit_settings' );

	if ( $acimaSettings
		&& isset( $acimaSettings['merchant_id'] )
		&& ! empty( $acimaSettings['merchant_id'] )
		&& isset( $acimaSettings['api_url'] )
		&& ! empty( $acimaSettings['api_url'] )
	) {
		/**
		* Render Pre-approval button
		*/
		WC_Gateway_Acima_Credit_Template_Engine::render(
			'pre-approval-button',
			array(
				'ACIMA_CREDIT_IFRAME_URL' => $acimaSettings['api_url'],
				'IMAGE_URL'               => plugin_dir_url( __DIR__ ) . 'public/images/pre-approval-button.png',
			)
		);
		/**
		* Render Pre-approval iframe
		*/
		WC_Gateway_Acima_Credit_Template_Engine::render(
			'pre-approval-iframe',
			array(
				'ACIMA_CREDIT_IFRAME_URL' => $acimaSettings['api_url'],
			)
		);
	} else {
		echo esc_html('*** You MUST set your Acima Merchant ID and API URL to use this shortcode. ***');
	}

	return ob_get_clean();
}
add_shortcode( 'acima_credit_pre_approval_button', 'acima_leasing_init_pre_approval_button' );

function acima_leasing_init_needed_text_link() {
	ob_start();

	$acimaSettings = get_option( 'woocommerce_acima_credit_settings' );

	if ( $acimaSettings
		&& isset( $acimaSettings['merchant_id'] )
		&& ! empty( $acimaSettings['merchant_id'] )
		&& isset( $acimaSettings['api_url'] )
		&& ! empty( $acimaSettings['api_url'] )
	) {
		/**
		* Render text link w/question mark
		*/
		WC_Gateway_Acima_Credit_Template_Engine::render(
			'no-credit-needed-text-link',
			array(
				'ACIMA_CREDIT_IFRAME_URL' => $acimaSettings['api_url'],
				'LOGO_URL'                => plugin_dir_url( __DIR__ ) . 'public/images/acima-logo-color.svg',
			)
		);
		/**
		* Render Pre-approval iframe
		*/
		WC_Gateway_Acima_Credit_Template_Engine::render(
			'pre-approval-iframe',
			array(
				'ACIMA_CREDIT_IFRAME_URL' => $acimaSettings['api_url'],
			)
		);
	} else {
		echo esc_html('*** You MUST set your Acima Merchant ID and API URL to use this shortcode. ***');
	}

	return ob_get_clean();
}
add_shortcode( 'no_credit_needed_text_link', 'acima_leasing_init_needed_text_link' );

function acima_leasing_init_financing_text_link() {
	ob_start();

	$acimaSettings = get_option( 'woocommerce_acima_credit_settings' );

	if ( $acimaSettings
		&& isset( $acimaSettings['merchant_id'] )
		&& ! empty( $acimaSettings['merchant_id'] )
		&& isset( $acimaSettings['api_url'] )
		&& ! empty( $acimaSettings['api_url'] )
	) {
		/**
		* Render Pre-approval button
		*/
		WC_Gateway_Acima_Credit_Template_Engine::render(
			'no-credit-financing-text-link',
			array(
				'ACIMA_CREDIT_IFRAME_URL' => $acimaSettings['api_url'],
				'LOGO_URL'                => plugin_dir_url( __DIR__ ) . 'public/images/acima-logo-color.svg',
				'QM_CIRCLE_ICON_URL'      => plugin_dir_url( __DIR__ ) . 'public/images/question-mark-circle.svg',

			)
		);
		/**
		* Render Pre-approval iframe
		*/
		WC_Gateway_Acima_Credit_Template_Engine::render(
			'pre-approval-iframe',
			array(
				'ACIMA_CREDIT_IFRAME_URL' => $acimaSettings['api_url'],
			)
		);
	} else {
		echo esc_html('*** You MUST set your Acima Merchant ID and API URL to use this shortcode. ***');
	}

	return ob_get_clean();
}
add_shortcode( 'no_credit_financing_text_link', 'acima_leasing_init_financing_text_link' );

// enable shortcodes in text widgets
add_filter( 'widget_text', 'do_shortcode' );
