<?php
/**
 * Handle the login process feature.
 *
 * @since 1.2.0
 */

namespace CP24\Tools\Inc\Membership\Login;

defined( 'ABSPATH' ) || die();

use CP24\Tools\Inc\Init;

class Login {
	/**
	 * Constructor.
	 *
	 * @since 1.2.0
	 */
	public function __construct() {
		add_shortcode( 'cp24-membership-login-form', [ $this, 'login_form_shortcode' ] );
		add_action( 'wp_ajax_nopriv_cp24_membership_login_manager', [ $this, 'manage_login' ] );
		add_action( 'wp_ajax_cp24_membership_login_manager', [ $this, 'manage_login' ] );
	}

	/**
	 * Login form shortcode.
	 *
	 * @since 1.2.0
	 * @return string
	 */
	public function login_form_shortcode() {
		$default_template = '1';

		ob_start();
		require_once CP24_MULTI_SMTP_PATH . 'inc/membership/login/templates/login-template-v' . $default_template .'.php';
		return ob_get_clean();
	}

	/**
	 * Handle login feature ajax calls.
	 *
	 * @since 1.2.0
	 */
	public function manage_login() {
		check_ajax_referer( Init::NONCE, 'nonce' );

		if ( empty( $_REQUEST['sub_action'] ) ) { // phpcs:ignore
			wp_send_json_error( esc_html__( 'Bad Request.', 'cp24' ) );
		}

		$action = filter_var( wp_unslash( $_REQUEST['sub_action'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$action = sanitize_text_field( $action );

		if ( ! method_exists( $this, $action ) ) {
			wp_send_json_error();
		}

		call_user_func( [ $this, $action ] );
	}

	/**
	 * Handle login main process.
	 *
	 * @since 1.2.0
	 */
	private function manage_login_main_process() {
		$password      = filter_var( wp_unslash( $_REQUEST['password'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$username_type = filter_var( wp_unslash( 'username_type' ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$username_type = sanitize_text_field( $username_type );
		$remember_me   = filter_var( wp_unslash( $_REQUEST['remember_me'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$remember      = false;
		$username      = '';

		if ( 'email' === $username_type ) {
			$username = filter_var( wp_unslash( $_REQUEST['username'] ), FILTER_SANITIZE_EMAIL );
			$username = sanitize_email( $username );
		} else {
			$username = filter_var( wp_unslash( $_REQUEST['username'] ), FILTER_SANITIZE_FULL_SPECIAL_CHARS );
			$username = sanitize_text_field( $username );
		}

		$password    = sanitize_text_field( $password );
		$remember_me = sanitize_text_field( $remember_me );

		if ( empty( $password ) ) {
			wp_send_json_error( esc_html__( 'Password is required.', 'cp24' ) );
		}

		$user = wp_authenticate( $username, $password );

		if ( is_wp_error( $user ) ) {
			wp_send_json_error( $user->get_error_message() );
		}

		if ( true === $remember_me || 'true' === $remember_me ) {
			$remember = true;
		}

		wp_clear_auth_cookie();
		wp_set_current_user( $user->ID );
    	wp_set_auth_cookie( $user->ID, $remember );
    	do_action( 'wp_login', $user->data->user_login, $user->data );

		wp_send_json_success( [
			'message'      => esc_html__( 'Logged in successfully, redirecting to home page.', 'cp24' ),
			'redirect_url' => esc_url( home_url() ),
		] );
	}
}
