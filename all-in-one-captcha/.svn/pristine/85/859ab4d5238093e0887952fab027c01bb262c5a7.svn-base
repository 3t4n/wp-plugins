<?php
/**
 * Utilities
 *
 * @package AIOC
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Check if captcha keys are setup properly.
 *
 * @since 1.0.0
 *
 * @return bool $output True if setup properly; false otherwise.
 */
function aioc_key_setup_status() {
	$site_key   = aioc_option( 'aioc_site_key' );
	$secret_key = aioc_option( 'aioc_secret_key' );
	$output     = true;

	if ( null === $site_key || null === $secret_key || ( 0 === strlen( $site_key ) ) || ( 0 === strlen( $secret_key ) ) ) {
		$output = false;
	}

	return $output;
}

/**
 * Check if captcha keys is verified.
 *
 * @since 1.0.0
 *
 * @return bool $output True if setup properly; false otherwise.
 */
function aioc_key_is_ok() {
	$output = true;

	if ( true !== aioc_key_setup_status() || 1 !== absint( aioc_option( 'aioc_captcha_key_valid' ) ) ) {
		$output = false;
	}

	return $output;
}

/**
 * Check if captcha type.
 *
 * @since 1.0.0
 *
 * @param string $captcha Captcha type.
 * @return bool $output True if captcha is equal to save captcha type; false otherwise.
 */
function aioc_is_captcha_type( $captcha ) {
	$captcha_type = aioc_option( 'aioc_captcha_type' );
	$output       = false;

	if ( $captcha === $captcha_type ) {
		$output = true;
	}

	return $output;
}

/**
 * Check if google recaptcha type.
 *
 * @since 1.0.0
 *
 * @param string $captcha Google recaptcha type.
 * @return bool $output True if captcha is equal to save google captcha type; false otherwise.
 */
function aioc_is_google_recaptcha( $captcha ) {
	$google_recaptcha = aioc_option( 'aioc_google_captcha_type' );
	$output           = false;

	if ( $captcha === $google_recaptcha ) {
		$output = true;
	}

	return $output;
}

/**
 * Return captcha API URL.
 *
 * @since 1.0.0
 *
 * @return string $url API URL.
 */
function aioc_get_captcha_api_url() {
	$url = '';

	$site_key         = aioc_option( 'aioc_site_key' );
	$languages        = get_locale();
	$browser_language = aioc_option( 'aioc_browser_language' );
	$captcha_language = aioc_option( 'aioc_captcha_language' );
	if ( 1 === absint( $browser_language ) && isset( $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) ) {
		$languages = substr( sanitize_text_field( wp_unslash( $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) ), 0, 2 );
	}

	if ( '' !== $captcha_language ) {
		$languages = $captcha_language;
	}
	if ( aioc_is_google_recaptcha( 'v2' ) || aioc_is_google_recaptcha( 'v2-invisible' ) ) {
		$url = 'https://www.google.com/recaptcha/api.js?hl=' . esc_attr( $languages ) . '&onload=aiocGoogleCaptchaLoad&render=explicit';
	} elseif ( aioc_is_google_recaptcha( 'v3' ) ) {
		$url = 'https://www.google.com/recaptcha/api.js?onload=aiocGoogleCaptchaV3&render=' . esc_attr( $site_key ) . '&hl=' . esc_attr( $languages );
	}

	return $url;
}

/**
 * Return captcha section for render block.
 *
 * @since 1.0.0
 *
 * @return string captcha.
 */
function aioc_get_captcha_input() {
	ob_start();

	if ( aioc_is_captcha_type( 'hcaptcha' ) ) {
		aioc_render_hcaptcha_wrapper();
	} elseif ( aioc_is_captcha_type( 'cloudflare-turnstile' ) ) {
		aioc_render_turnstile_wrapper();
	} elseif ( aioc_is_google_recaptcha( 'v2' ) || aioc_is_google_recaptcha( 'v2-invisible' ) ) {
		aioc_render_captcha_wrapper();
	} elseif ( aioc_is_google_recaptcha( 'v3' ) ) {
		aioc_render_captcha_input();
	}
	$captcha = ob_get_clean();

	return $captcha;
}
