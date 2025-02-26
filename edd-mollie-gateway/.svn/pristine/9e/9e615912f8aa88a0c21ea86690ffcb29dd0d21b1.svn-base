<?php
/**
 * Log messages to EDD log
 *
 * @param mixed $message
 * @param bool  $set_debug_header Set X-Mollie-Debug header (default false)
 */

function edd_mollie_debug_log( $message, $payment_id = 0, $title = 'Mollie Debugging', $set_debug_header = false ) {
	if ( ! EDD_Mollie_Helper()->settings->isDebugEnabled() ) {
		return;
	}

	// Convert message to string
	if ( ! is_string( $message ) ) {
		$message = wp_json_encode( $message );
	}

	// Set debug header
	if ( $set_debug_header && PHP_SAPI !== 'cli' && !headers_sent() ) {
		header("X-Mollie-Debug: $message");
	}

	// Log message
	if ( function_exists('edd_record_gateway_error') ) {
		edd_record_gateway_error( $title, $message, $payment_id );
	}
}

/**
 * Returns the main instance of the Helper class for easy access.
 *
 * @since  3.0
 * @return EDD_Mollie_Helper
 */
function EDD_Mollie_Helper() {
	return EDD_Mollie_Helper::instance();
}