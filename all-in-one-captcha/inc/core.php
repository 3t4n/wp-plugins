<?php
/**
 * Core functions
 *
 * @package AIOC
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Captcha setup for wp default.
 *
 * @since 1.0.0
 */
function aioc_setup_wp_default() {
	if ( true !== aioc_key_is_ok() ) {
		return;
	}

	$captcha_hooks = array();

	// Login.
	if ( 1 === absint( aioc_option( 'aioc_enable_login' ) ) ) {
		$captcha_hooks[] = 'login_form';
	}

	// Register.
	if ( 1 === absint( aioc_option( 'aioc_enable_register' ) ) ) {
		$captcha_hooks[] = 'register_form';
	}

	// Lost password and reset password.
	if ( 1 === absint( aioc_option( 'aioc_enable_lost_password' ) ) ) {
		$captcha_hooks = array_merge( $captcha_hooks, array( 'lostpassword_form', 'resetpass_form', 'retrieve_password' ) );
	}

	aioc_register_captcha_hook( $captcha_hooks );
}
add_action( 'init', 'aioc_setup_wp_default' );

/**
 * Captcha setup.
 *
 * @since 1.0.0
 */
function aioc_setup() {
	if ( true !== aioc_key_is_ok() || is_user_logged_in() ) {
		return;
	}

	$captcha_hooks = array();

	// Comment form.
	if ( 1 === absint( aioc_option( 'aioc_enable_comment_form' ) ) && is_singular( 'post' ) ) {
		$captcha_hooks[] = 'comment_form_after_fields';
	}

	aioc_register_captcha_hook( $captcha_hooks );
}

add_action( 'wp', 'aioc_setup' );

/**
 * Register captcha hooks.
 *
 * @since 1.0.0
 *
 * @param string $captcha_hooks Captcha hooks.
 */
function aioc_register_captcha_hook( $captcha_hooks ) {

	if ( ! empty( $captcha_hooks ) ) {
		foreach ( $captcha_hooks as $hook ) {
			if ( aioc_is_captcha_type( 'hcaptcha' ) ) {
				add_action( $hook, 'aioc_render_hcaptcha_wrapper' );
			} elseif ( aioc_is_captcha_type( 'cloudflare-turnstile' ) ) {
				add_action( $hook, 'aioc_render_turnstile_wrapper' );
			} elseif ( aioc_is_google_recaptcha( 'v2' ) || aioc_is_google_recaptcha( 'v2-invisible' ) ) {
				add_action( $hook, 'aioc_render_captcha_wrapper' );
			} elseif ( aioc_is_google_recaptcha( 'v3' ) ) {
				add_action( $hook, 'aioc_render_captcha_input' );
			}
		}
	}
}

/**
 * Display captcha wrapper.
 *
 * @since 1.0.0
 */
function aioc_render_captcha_wrapper() {
	echo '<div class="aioc-captcha-wrapper"></div>';
}

/**
 * Display captcha input.
 *
 * @since 1.0.0
 */
function aioc_render_captcha_input() {
	echo '<input type="hidden" name="g-recaptcha-response" class="g-recaptcha-response">';
}

/**
 * Display turnstile wrapper.
 *
 * @since 1.0.0
 */
function aioc_render_turnstile_wrapper() {
	$sitekey    = aioc_option( 'aioc_site_key' );
	$theme      = aioc_option( 'aioc_turnstile_theme' );
	$size       = aioc_option( 'aioc_turnstile_size' );
	$language   = aioc_option( 'aioc_turnstile_language' );
	$appearance = aioc_option( 'aioc_turnstile_appearance' );

	echo '<div class="aioc-turnstile cf-turnstile" data-sitekey="' . esc_attr( $sitekey ) . '" data-theme="' . esc_attr( $theme ) . '" data-language="' . esc_attr( $language ) . '" data-size="' . esc_attr( $size ) . '" data-appearance="' . esc_attr( $appearance ) . '"></div>';
}

/**
 * Display hcaptcha wrapper.
 *
 * @since 1.0.0
 */
function aioc_render_hcaptcha_wrapper() {
	$sitekey  = aioc_option( 'aioc_site_key' );
	$theme    = aioc_option( 'aioc_hcaptcha_theme' );
	$size     = aioc_option( 'aioc_hcaptcha_size' );
	$language = aioc_option( 'aioc_hcaptcha_language' );

	echo '<div class="aioc-hcaptcha h-captcha" data-sitekey="' . esc_attr( $sitekey ) . '" data-theme="' . esc_attr( $theme ) . '" data-hl="' . esc_attr( $language ) . '" data-size="' . esc_attr( $size ) . '"></div>';
}
