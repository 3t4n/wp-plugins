<?php

/**
 * Plugin Name: Acima Digital Payment Gateway
 * Plugin URI: https://github.com/acima-credit/ecom-woocommerce
 * Description: Acima Digital Payment Gateway for WooCommerce.
 * Author: Acima Digital, Inc
 * Author URI: https://github.com/acima-credit/
 * Text Domain: acima-leasing-payment-gateway
 * Domain Path: /languages
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Requires at least: 4.8
 * Requires PHP: 7.4
 *
 * Version: 3.2.5
 *
 * @package   WC-Gateway-Acima-Credit
 * @category  Admin
 */

defined( 'ABSPATH' ) or exit;

/**
 * Required minimums and constants
 */
define( 'WC_ACIMA_VERSION', '3.2.6' );
define( 'ACIMA_CREDIT_MAIN_FILE', __FILE__ );

/**
 * Check if WooCommerce is active
 */
if ( ! in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	return;
}

require_once __DIR__ . '/inc/class-wc-gateway-acima-credit-head.php';

require_once __DIR__ . '/inc/class-wc-gateway-acima-credit.php';

require_once __DIR__ . '/inc/class-wc-gateway-acima-credit-static-files.php';

require_once __DIR__ . '/inc/class-wc-gateway-acima-credit-iframe.php';

require_once __DIR__ . '/inc/class-wc-gateway-acima-credit-template-engine.php';

require_once __DIR__ . '/inc/class-wc-gateway-acima-credit-custom-shortcodes.php';

require_once __DIR__ . '/inc/class-wc-gateway-acima-credit-ajax-requests.php';

require_once __DIR__ . '/inc/class-wc-gateway-acima-credit-exception.php';

require_once __DIR__ . '/inc/class-wc-gateway-acima-credit-logger.php';

require_once __DIR__ . '/inc/webhook/class-wc-gateway-acima-credit-processor-interface.php';

require_once __DIR__ . '/inc/webhook/class-wc-gateway-acima-credit-processor.php';

require_once __DIR__ . '/inc/webhook/processors/class-wc-gateway-acima-credit-default-processor.php';

require_once __DIR__ . '/inc/webhook/processors/class-wc-gateway-acima-credit-delivery-confirmed-processor.php';

require_once __DIR__ . '/inc/webhook/processors/class-wc-gateway-acima-credit-delivery-pending-processor.php';

require_once __DIR__ . '/inc/webhook/processors/class-wc-gateway-acima-credit-lease-cancelled-processor.php';

require_once __DIR__ . '/inc/webhook/class-wc-gateway-acima-credit-event.php';

require_once __DIR__ . '/inc/webhook/class-wc-gateway-acima-credit-processor-factory.php';

require_once __DIR__ . '/inc/class-wc-gateway-acima-credit-webhook-handler.php';

require_once __DIR__ . '/inc/class-wc-gateway-acima-credit-failure-handler.php';

require_once __DIR__ . '/inc/class-wc-gateway-acima-credit-installer.php';

require_once __DIR__ . '/inc/class-wc-gateway-acima-credit-api.php';

require_once __DIR__ . '/inc/class-wc-gateway-acima-credit-refund-handler.php';

require_once __DIR__ . '/inc/class-wc-gateway-acima-credit-error-reporter.php';

require_once __DIR__ . '/inc/class-wc-gateway-acima-credit-nonce-handler.php';

add_action(
	'plugins_loaded',
	function () {
		new WC_Gateway_Acima_Credit_Webhook_Handler();
		new WC_Gateway_Acima_Credit_Failure_Handler();

		if ( is_admin() ) {
			new WC_Gateway_Acima_Credit_Refund_Handler();
		}
	}
);

/**
 * Add Content Security Policy header for Acima Credit admin section
 * Includes proper security checks and sanitization
 */
function wc_acima_add_csp_header() {
	if ( ! is_admin() || ! isset( $_GET['section'] ) ) {
		return;
	}

	if ( ! isset( $_GET['_wpnonce'] ) ) {
		return;
	}

	$section = sanitize_text_field( wp_unslash( $_GET['section'] ) );

	$nonce = sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) );

	if ( ! wp_verify_nonce( $nonce, 'acima_credit_section_nonce' ) ) {
		wp_die(
			esc_html__( 'Security check failed. Please try again.', 'acima-leasing-payment-gateway' ),
			esc_html__( 'Security Error', 'acima-leasing-payment-gateway' ),
			array( 'response' => 403 )
		);
	}

	if ( $section === 'acima_credit' ) {
		$csp_header = 'Content-Security-Policy: ' .
						"default-src * data: blob: 'unsafe-eval' 'unsafe-inline'";

		if ( ! headers_sent() ) {
			header( $csp_header );
		}
	}
}
add_action( 'admin_init', 'wc_acima_add_csp_header' );

register_activation_hook( __FILE__, array( 'WC_Gateway_Acima_Credit_Installer', 'install' ) );
