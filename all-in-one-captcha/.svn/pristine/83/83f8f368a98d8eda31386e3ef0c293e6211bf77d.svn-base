<?php
/**
 * Setup
 *
 * @package AIOC
 */

use Nilambar\AdminNotice\Notice;

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load language.
 *
 * @since 1.0.0
 */
function aioc_load_language() {
	load_plugin_textdomain( 'all-in-one-captcha', false, dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/' );
}

add_action( 'init', 'aioc_load_language' );

/**
 * Add plugin settings link.
 *
 * @since 1.0.0
 *
 * @param array $links Links.
 * @return array Modified links.
 */
function aioc_add_plugin_action_links( $links ) {
	return array_merge( array( 'settings' => '<a href="' . esc_url( admin_url( 'options-general.php?page=aioc-options' ) ) . '">' . esc_html__( 'Settings', 'all-in-one-captcha' ) . '</a>' ), $links );
}

add_filter( 'plugin_action_links_' . AIOC_BASENAME, 'aioc_add_plugin_action_links' );

/**
 * Load frontend scripts.
 *
 * @since 1.0.0
 */
function aioc_load_scripts() {
	$enable_scripts = true;

	if ( true !== aioc_key_is_ok() ) {
		$enable_scripts = false;
	}

	$wp_login_action = isset( $_REQUEST['action'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['action'] ) ) : 'login'; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

	$wp_login = did_action( 'login_init' );

	if ( ! is_user_logged_in() && true === $enable_scripts ) {
		if ( $wp_login && 1 === absint( aioc_option( 'aioc_enable_login' ) ) && 'login' === $wp_login_action ) {
			$enable_scripts = true;
		} elseif ( $wp_login && 'register' === $wp_login_action && 1 === absint( aioc_option( 'aioc_enable_register' ) ) ) {
			$enable_scripts = true;
		} elseif ( $wp_login && ( 'lostpassword' === $wp_login_action || 'rp' === $wp_login_action || 'resetpass' === $wp_login_action ) && 1 === absint( aioc_option( 'aioc_enable_lost_password' ) ) ) {
			$enable_scripts = true;
		} elseif ( is_singular( 'post' ) && 1 === absint( aioc_option( 'aioc_enable_comment_form' ) ) ) {
			$enable_scripts = true;
		} else {
			$enable_scripts = false;
		}
	} else {
		$enable_scripts = false;
	}

	if ( true === $enable_scripts ) {
		aioc_enqueue_scripts();
	}
}

/**
 * Load frontend scripts.
 *
 * @since 1.0.0
 */
function aioc_enqueue_scripts() {
	if ( aioc_is_captcha_type( 'hcaptcha' ) ) {
		wp_enqueue_script( 'aioc-api', 'https://js.hcaptcha.com/1/api.js', array(), AIOC_VERSION, false );
	} elseif ( aioc_is_captcha_type( 'cloudflare-turnstile' ) ) {
		wp_enqueue_script( 'aioc-api', 'https://challenges.cloudflare.com/turnstile/v0/api.js', array(), AIOC_VERSION, false );
	} elseif ( aioc_is_captcha_type( 'google-recaptcha' ) ) {
		wp_enqueue_script( 'aioc-custom', AIOC_URL . '/build/recaptcha.js', array(), AIOC_VERSION, false );
		$disable_button = ( 1 === absint( aioc_option( 'aioc_disable_button' ) ) ) ? 1 : 0;

		$localized_data = array(
			'site_key'       => esc_attr( aioc_option( 'aioc_site_key' ) ),
			'theme'          => esc_attr( aioc_option( 'aioc_captcha_theme' ) ),
			'type'           => esc_attr( aioc_option( 'aioc_google_captcha_type' ) ),
			'size'           => esc_attr( aioc_option( 'aioc_captcha_size' ) ),
			'badge'          => esc_attr( aioc_option( 'aioc_captcha_badge' ) ),
			'disable_button' => $disable_button,
		);

		wp_localize_script( 'aioc-custom', 'AIOC', $localized_data );

		$api_url = aioc_get_captcha_api_url();

		if ( ! empty( $api_url ) ) {
			wp_enqueue_script( 'aioc-api', $api_url, array(), AIOC_VERSION, false );
		}
	}

	wp_enqueue_style( 'aioc-style', AIOC_URL . '/build/recaptcha.css', array(), AIOC_VERSION );
}

/**
 * Add admin notice.
 *
 * @since 1.0.12
 */
function aioc_add_admin_notice() {
	Notice::init(
		array(
			'slug' => AIOC_SLUG,
			'name' => esc_html__( 'All In One Captcha', 'all-in-one-captcha' ),
		)
	);
}

add_action( 'admin_init', 'aioc_add_admin_notice' );
