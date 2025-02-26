<?php
/**
 * Helpers functions
 *
 * @package AIOC
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get default options.
 *
 * @since 1.0.0
 *
 * @param string $options_type Option type.
 * @return array $default Default options.
 */
function aioc_get_default_options( $options_type = null ) {
	$default = array();

	if ( 'aioc_login_options' === $options_type ) {
		// Login Limit.
		$default['aioc_enable_login_limit']        = 0;
		$default['aioc_login_attempts']            = 4;
		$default['aioc_lockout_duration']          = 10; // minutes.
		$default['aioc_increase_login_attempts']   = 4;
		$default['aioc_increase_lockout_duration'] = 12; // hours.
		$default['aioc_valid_duration']            = 12; // hours.
		$default['aioc_blacklist_user']            = '';
		$default['aioc_recovery_key']              = '';

	} else {
		// Key.
		$default['aioc_captcha_type']        = 'google-recaptcha';
		$default['aioc_google_captcha_type'] = 'v2';
		$default['aioc_site_key']            = '';
		$default['aioc_secret_key']          = '';
		$default['aioc_captcha_key_valid']   = 0;

		// Status.
		$default['aioc_enable_login']             = 1;
		$default['aioc_enable_register']          = 1;
		$default['aioc_enable_lost_password']     = 1;
		$default['aioc_enable_comment_form']      = 1;
		$default['aioc_enable_woo_login']         = 0;
		$default['aioc_enable_woo_register']      = 0;
		$default['aioc_enable_woo_lost_password'] = 0;
		$default['aioc_enable_woo_review']        = 0;
		$default['aioc_enable_woo_checkout']      = 0;
		$default['aioc_enable_wpforms']           = 0;
		$default['aioc_enable_cf7']               = 0;
		$default['aioc_enable_bp_register']       = 0;
		$default['aioc_enable_edd_login']         = 0;
		$default['aioc_enable_edd_register']      = 0;
		$default['aioc_enable_edd_lost_password'] = 0;
		$default['aioc_enable_edd_checkout']      = 0;
		$default['aioc_enable_bbpress_topic']     = 0;
		$default['aioc_enable_bbpress_reply']     = 0;

		// Advanced.
		$default['aioc_captcha_theme']    = 'light';
		$default['aioc_captcha_size']     = 'normal';
		$default['aioc_captcha_badge']    = 'bottomright';
		$default['aioc_captcha_score']    = '0.5';
		$default['aioc_disable_button']   = 0;
		$default['aioc_browser_language'] = 0;
		$default['aioc_captcha_language'] = '';

		// Turnstile.
		$default['aioc_turnstile_theme']      = 'light';
		$default['aioc_turnstile_size']       = 'normal';
		$default['aioc_turnstile_language']   = 'auto';
		$default['aioc_turnstile_appearance'] = 'always';

		// hCaptcha.
		$default['aioc_hcaptcha_theme']    = 'light';
		$default['aioc_hcaptcha_size']     = 'normal';
		$default['aioc_hcaptcha_language'] = '';

		$default['aioc_validation_error_message'] = esc_html__( 'Error verifying CAPTCHA.', 'all-in-one-captcha' );
		$default['aioc_ip_address']               = '';
	}

	return $default;
}

/**
 * Get option.
 *
 * @since 1.0.0
 *
 * @param string $key Option key.
 * @param string $options_type Option type.
 * @return mixed Option value.
 */
function aioc_option( $key, $options_type = null ) {
	if ( empty( $key ) ) {
		return;
	}

	$options = wp_parse_args( (array) get_option( 'aioc_captcha_options' ), aioc_get_default_options() );

	if ( ! empty( $options_type ) ) {
		$options = wp_parse_args( (array) get_option( $options_type ), aioc_get_default_options( $options_type ) );
	}

	$value = null;

	if ( isset( $options[ $key ] ) ) {
		$value = $options[ $key ];
	}

	return $value;
}

/**
 * Return validate options before save.
 *
 * @since 1.0.0
 *
 * @param array $input Options.
 * @param array $tab_id Tab id.
 * @return array Validated options.
 */
function aioc_validate_options_before_save( $input, $tab_id ) {
	if ( empty( $input ) ) {
		return;
	}

	if ( 'aioc-captcha-integration' === $tab_id ) {
		// Enable Settings.
		$input['aioc_enable_login']             = ( isset( $input['aioc_enable_login'] ) && (bool) $input['aioc_enable_login'] ) ? 1 : 0;
		$input['aioc_enable_register']          = ( isset( $input['aioc_enable_register'] ) && (bool) $input['aioc_enable_register'] ) ? 1 : 0;
		$input['aioc_enable_lost_password']     = ( isset( $input['aioc_enable_lost_password'] ) && (bool) $input['aioc_enable_lost_password'] ) ? 1 : 0;
		$input['aioc_enable_comment_form']      = ( isset( $input['aioc_enable_comment_form'] ) && (bool) $input['aioc_enable_comment_form'] ) ? 1 : 0;
		$input['aioc_enable_woo_login']         = ( isset( $input['aioc_enable_woo_login'] ) && (bool) $input['aioc_enable_woo_login'] ) ? 1 : 0;
		$input['aioc_enable_woo_register']      = ( isset( $input['aioc_enable_woo_register'] ) && (bool) $input['aioc_enable_woo_register'] ) ? 1 : 0;
		$input['aioc_enable_woo_lost_password'] = ( isset( $input['aioc_enable_woo_lost_password'] ) && (bool) $input['aioc_enable_woo_lost_password'] ) ? 1 : 0;
		$input['aioc_enable_woo_review']        = ( isset( $input['aioc_enable_woo_review'] ) && (bool) $input['aioc_enable_woo_review'] ) ? 1 : 0;
		$input['aioc_enable_woo_checkout']      = ( isset( $input['aioc_enable_woo_checkout'] ) && (bool) $input['aioc_enable_woo_checkout'] ) ? 1 : 0;
		$input['aioc_enable_wpforms']           = ( isset( $input['aioc_enable_wpforms'] ) && (bool) $input['aioc_enable_wpforms'] ) ? 1 : 0;
		$input['aioc_enable_cf7']               = ( isset( $input['aioc_enable_cf7'] ) && (bool) $input['aioc_enable_cf7'] ) ? 1 : 0;
		$input['aioc_enable_bp_register']       = ( isset( $input['aioc_enable_bp_register'] ) && (bool) $input['aioc_enable_bp_register'] ) ? 1 : 0;
		$input['aioc_enable_edd_login']         = ( isset( $input['aioc_enable_edd_login'] ) && (bool) $input['aioc_enable_edd_login'] ) ? 1 : 0;
		$input['aioc_enable_edd_register']      = ( isset( $input['aioc_enable_edd_register'] ) && (bool) $input['aioc_enable_edd_register'] ) ? 1 : 0;
		$input['aioc_enable_edd_lost_password'] = ( isset( $input['aioc_enable_edd_lost_password'] ) && (bool) $input['aioc_enable_edd_lost_password'] ) ? 1 : 0;
		$input['aioc_enable_edd_checkout']      = ( isset( $input['aioc_enable_edd_checkout'] ) && (bool) $input['aioc_enable_edd_checkout'] ) ? 1 : 0;
		$input['aioc_enable_bbpress_topic']     = ( isset( $input['aioc_enable_bbpress_topic'] ) && (bool) $input['aioc_enable_bbpress_topic'] ) ? 1 : 0;
		$input['aioc_enable_bbpress_reply']     = ( isset( $input['aioc_enable_bbpress_reply'] ) && (bool) $input['aioc_enable_bbpress_reply'] ) ? 1 : 0;

	} elseif ( 'aioc-login-settings' === $tab_id ) {
		// Settings.
		$input['aioc_enable_login_limit']        = ( isset( $input['aioc_enable_login_limit'] ) && (bool) $input['aioc_enable_login_limit'] ) ? 1 : 0;
		$input['aioc_login_attempts']            = absint( $input['aioc_login_attempts'] );
		$input['aioc_lockout_duration']          = absint( $input['aioc_lockout_duration'] ); // minutes.
		$input['aioc_increase_login_attempts']   = absint( $input['aioc_increase_login_attempts'] );
		$input['aioc_increase_lockout_duration'] = absint( $input['aioc_increase_lockout_duration'] ); // hours.
		$input['aioc_valid_duration']            = absint( $input['aioc_valid_duration'] ); // hours.
		$input['aioc_recovery_key']              = sanitize_text_field( $input['aioc_recovery_key'] );

	} else {
		// Key Settings.
		$input['aioc_captcha_type']        = sanitize_text_field( $input['aioc_captcha_type'] );
		$input['aioc_google_captcha_type'] = sanitize_text_field( $input['aioc_google_captcha_type'] );
		$input['aioc_site_key']            = sanitize_text_field( $input['aioc_site_key'] );
		$input['aioc_secret_key']          = sanitize_text_field( $input['aioc_secret_key'] );
		$input['aioc_captcha_key_valid']   = ( isset( $input['aioc_captcha_key_valid'] ) && (bool) $input['aioc_captcha_key_valid'] ) ? 1 : 0;

		// Advance Settings.
		$input['aioc_captcha_theme']    = sanitize_text_field( $input['aioc_captcha_theme'] );
		$input['aioc_captcha_size']     = sanitize_text_field( $input['aioc_captcha_size'] );
		$input['aioc_captcha_badge']    = sanitize_text_field( $input['aioc_captcha_badge'] );
		$input['aioc_captcha_score']    = sanitize_text_field( $input['aioc_captcha_score'] );
		$input['aioc_disable_button']   = ( isset( $input['aioc_disable_button'] ) && (bool) $input['aioc_disable_button'] ) ? 1 : 0;
		$input['aioc_browser_language'] = ( isset( $input['aioc_browser_language'] ) && (bool) $input['aioc_browser_language'] ) ? 1 : 0;
		$input['aioc_captcha_language'] = sanitize_text_field( $input['aioc_captcha_language'] );

		// Turnstile Settings.
		$input['aioc_turnstile_theme']      = sanitize_text_field( $input['aioc_turnstile_theme'] );
		$input['aioc_turnstile_size']       = sanitize_text_field( $input['aioc_turnstile_size'] );
		$input['aioc_turnstile_language']   = sanitize_text_field( $input['aioc_turnstile_language'] );
		$input['aioc_turnstile_appearance'] = sanitize_text_field( $input['aioc_turnstile_appearance'] );

		// hCaptcha Settings.
		$input['aioc_hcaptcha_theme']    = sanitize_text_field( $input['aioc_hcaptcha_theme'] );
		$input['aioc_hcaptcha_size']     = sanitize_text_field( $input['aioc_hcaptcha_size'] );
		$input['aioc_hcaptcha_language'] = sanitize_text_field( $input['aioc_hcaptcha_language'] );

		$input['aioc_validation_error_message'] = sanitize_text_field( $input['aioc_validation_error_message'] );
		$input['aioc_ip_address']               = wp_kses_post( $input['aioc_ip_address'] );

	}

	return $input;
}
