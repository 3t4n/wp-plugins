<?php
/**
 * Validation helper
 *
 * @package AIOC
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get captcha validation type details.
 *
 * @since 1.0.0
 *
 * @return array $output Captcha response lists.
 */
function aioc_get_captcha_validation_type() {
	$output = array(
		'response_key' => 'g-recaptcha-response',
		'response_cb'  => 'aioc_validate_posted_captcha',
		'error_name'   => 'reCAPTCHA',
	);

	if ( aioc_is_captcha_type( 'hcaptcha' ) ) {
		$output = array(
			'response_key' => 'h-captcha-response',
			'response_cb'  => 'aioc_validate_posted_hcaptcha',
			'error_name'   => 'cfTurnstile',
		);
	} elseif ( aioc_is_captcha_type( 'cloudflare-turnstile' ) ) {
		$output = array(
			'response_key' => 'cf-turnstile-response',
			'response_cb'  => 'aioc_validate_posted_turnstile',
			'error_name'   => 'cfTurnstile',
		);
	}

	return $output;
}

/**
 * Return validate posted captcha.
 *
 * @since 1.0.0
 *
 * @return bool True if valid.
 */
function aioc_validate_posted_captcha() {
	$site_key      = sanitize_text_field( aioc_option( 'aioc_site_key' ) );
	$secret_key    = aioc_option( 'aioc_secret_key' );
	$captcha_score = aioc_option( 'aioc_captcha_score' );
	$output        = false;

	if ( ! empty( $site_key ) && ! empty( $secret_key ) ) {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$grecaptcha_response = isset( $_REQUEST['g-recaptcha-response'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['g-recaptcha-response'] ) ) : '';
		$server_name         = isset( $_SERVER['SERVER_NAME'] ) ? sanitize_text_field( wp_unslash( $_SERVER['SERVER_NAME'] ) ) : '';
		$remote_address      = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';
		$captcha_obj         = new \ReCaptcha\ReCaptcha( $secret_key );

		$resp  = $captcha_obj->setExpectedHostname( $server_name )->verify( $grecaptcha_response, $remote_address );
		$score = $resp->getScore() ? $resp->getScore() : 0;

		if ( aioc_is_google_recaptcha( 'v3' ) ) {
			$output = ( $captcha_score <= $score ) ? (bool) $resp->isSuccess() : false;
		} else {
			$output = (bool) $resp->isSuccess();
		}
	}

	return $output;
}

/**
 * Return validate posted turnstile.
 *
 * @since 1.0.0
 *
 * @return bool True if valid.
 */
function aioc_validate_posted_turnstile() {
	$site_key   = sanitize_text_field( aioc_option( 'aioc_site_key' ) );
	$secret_key = sanitize_text_field( aioc_option( 'aioc_secret_key' ) );
	$output     = false;

	if ( ! empty( $site_key ) && ! empty( $secret_key ) ) {

		$turnstile_response = isset( $_REQUEST['cf-turnstile-response'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['cf-turnstile-response'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

		$headers  = array(
			'body' => array(
				'secret'   => $secret_key,
				'response' => $turnstile_response,
			),
		);
		$verify   = wp_remote_post( 'https://challenges.cloudflare.com/turnstile/v0/siteverify', $headers );
		$verify   = wp_remote_retrieve_body( $verify );
		$response = json_decode( $verify );
		if ( true === $response->success ) {
			$output = $response->success;
		}
	}

	return $output;
}

/**
 * Return validate posted hcaptcha.
 *
 * @since 1.0.0
 *
 * @return bool True if valid.
 */
function aioc_validate_posted_hcaptcha() {
	$site_key   = sanitize_text_field( aioc_option( 'aioc_site_key' ) );
	$secret_key = sanitize_text_field( aioc_option( 'aioc_secret_key' ) );
	$output     = false;

	if ( ! empty( $site_key ) && ! empty( $secret_key ) ) {

		$hcaptcha_response = isset( $_REQUEST['h-captcha-response'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['h-captcha-response'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

		$headers = array(
			'body' => array(
				'secret'   => $secret_key,
				'response' => $hcaptcha_response,
			),
		);

		$verify   = wp_remote_post( 'https://api.hcaptcha.com/siteverify', $headers );
		$verify   = wp_remote_retrieve_body( $verify );
		$response = json_decode( $verify );

		if ( true === $response->success ) {
			$output = $response->success;
		}
	}

	return (bool) $output;
}
