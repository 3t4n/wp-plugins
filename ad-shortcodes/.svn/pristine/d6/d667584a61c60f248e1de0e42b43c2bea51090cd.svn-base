<?php
/**
 * Sanitize $_POST and $_GET input.
 */
class Sanitize {

	/**
	 * Get sanitized value.

	 * @param string $key is a key of $_POST or $_GET.
	 * @param string $method is post or get.
	 * @param bool   $html_allowed = false is whether html is allowed.
	 * @return string $sanitized_value | false | null
	 */
	public static function get( string $key, string $method, bool $html_allowed = false ) {

		// Comvert the method to Capital.
		$method = strtoupper( $method );

		// Check if something is sent.
		if ( 'POST' === $method ) {
			$bool = isset( $_POST[ $key ] );
		} elseif ( 'GET' === $method ) {
			$bool = isset( $_GET[ $key ] );
		}

		// If no data is posted, return null.
		if ( false === $bool ) {
			return null;
		}

		// If a value is set.
		// If HTML tags are allowed, use wp_kses_post for sanitizing.
		if ( $html_allowed ) {
			if ( 'POST' === $method ) {
				$sanitized_value = wp_kses_post( wp_unslash( $_POST[ $key ] ) );
			} else if ( 'GET' === $method ) {
				$sanitized_value = wp_kses_post( wp_unslash( $_GET[ $key ] ) );
			}
		} else {
			// For others, only text is allowed.
			if ( 'POST' === $method ) {
				$sanitized_value = sanitize_text_field( wp_unslash( $_POST[ $key ] ) );
			} else if ( 'GET' === $method ) {
				$sanitized_value = sanitize_text_field( wp_unslash( $_GET[ $key ] ) );
			}
		}

		if ( isset( $_GET['_wpnonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'zumi-nonce' ) ) {
			return $sanitized_value;
		} else {
			return false;
		}
	}
}
