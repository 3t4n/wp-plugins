<?php
/**
 * Verify key
 *
 * @package AIOC
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Ajax callback recaptcha verify key.
 *
 * @since 1.0.0
 */
function aioc_recaptcha_verify_key() {
	if ( isset( $_POST['nonce'] ) && ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'admin-ajax-nonce' ) ) {
		wp_send_json( array( 'output' => 'Nonce Error' ) );
	}

	$output = false;

	if ( ! empty( $_POST['secret_key'] ) ) {
		$secret_key          = sanitize_text_field( wp_unslash( $_POST['secret_key'] ) );
		$response            = ! empty( $_POST['response'] ) ? sanitize_text_field( wp_unslash( $_POST['response'] ) ) : '';
		$grecaptcha_response = $response;
		$server_name         = isset( $_SERVER['SERVER_NAME'] ) ? sanitize_text_field( wp_unslash( $_SERVER['SERVER_NAME'] ) ) : '';
		$remote_address      = isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '';
		$captcha_obj         = new \ReCaptcha\ReCaptcha( $secret_key );

		$resp   = $captcha_obj->setExpectedHostname( $server_name )->verify( $grecaptcha_response, $remote_address );
		$output = (bool) $resp->isSuccess();
	}

	wp_send_json( array( 'output' => $output ) );
}

add_action( 'wp_ajax_aioc_recaptcha_verify_key', 'aioc_recaptcha_verify_key' );

/**
 * Ajax callback turnstile verify key.
 *
 * @since 1.0.0
 */
function aioc_turnstile_verify_key() {
	if ( isset( $_POST['nonce'] ) && ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'admin-ajax-nonce' ) ) {
		wp_send_json( array( 'output' => 'Nonce Error' ) );
	}

	$output = false;

	if ( ! empty( $_POST['secret_key'] ) ) {
		$secret_key = sanitize_text_field( wp_unslash( $_POST['secret_key'] ) );
		$response   = ! empty( $_POST['response'] ) ? sanitize_text_field( wp_unslash( $_POST['response'] ) ) : '';

		$headers = array(
			'body' => array(
				'secret'   => $secret_key,
				'response' => $response,
			),
		);

		$verify   = wp_remote_post( 'https://challenges.cloudflare.com/turnstile/v0/siteverify', $headers );
		$verify   = wp_remote_retrieve_body( $verify );
		$response = json_decode( $verify );

		if ( true === $response->success ) {
			$output = $response->success;
		}
	}

	wp_send_json( array( 'output' => $output ) );
}

add_action( 'wp_ajax_aioc_turnstile_verify_key', 'aioc_turnstile_verify_key' );

/**
 * Ajax callback hcaptcha verify key.
 *
 * @since 1.0.0
 */
function aioc_hcaptcha_verify_key() {
	if ( isset( $_POST['nonce'] ) && ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'admin-ajax-nonce' ) ) {
		wp_send_json( array( 'output' => 'Nonce Error' ) );
	}

	$output = false;

	if ( ! empty( $_POST['secret_key'] ) ) {
		$secret_key = sanitize_text_field( wp_unslash( $_POST['secret_key'] ) );
		$response   = ! empty( $_POST['response'] ) ? sanitize_text_field( wp_unslash( $_POST['response'] ) ) : '';

		$headers  = array(
			'body' => array(
				'secret'   => $secret_key,
				'response' => $response,
			),
		);
		$verify   = wp_remote_post( 'https://api.hcaptcha.com/siteverify', $headers );
		$verify   = wp_remote_retrieve_body( $verify );
		$response = json_decode( $verify );

		if ( true === $response->success ) {
			$output = (bool) $response->success;
		}
	}

	wp_send_json( array( 'output' => $output ) );
}

add_action( 'wp_ajax_aioc_hcaptcha_verify_key', 'aioc_hcaptcha_verify_key' );

/**
 * Ajax callback pointer dismiss.
 *
 * @since 1.0.0
 */
function aioc_pointer_dismiss() {
	if ( isset( $_POST['nonce'] ) && ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'admin-ajax-nonce' ) ) {
		wp_send_json( array( 'output' => 'Nonce Error' ) );
	}

	if ( isset( $_POST['pointer'] ) && 'pointer_dismiss' === $_POST['pointer'] ) {
		delete_option( 'aioc_pointer' );
		wp_send_json_success();
	}
}

add_action( 'wp_ajax_aioc_pointer_dismiss', 'aioc_pointer_dismiss' );
