<?php
/**
 * PasswordLess auth Handler
 *
 * @package 1-click-passwordless-login
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Xclickpw_Handler
 *
 * Handles authentication logic for passwordless login.
 *
 * @package 1-click-passwordless-login
 */
class Xclickpw_Handler {

	/**
	 * Constructor - Initializes the authentication handler.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'handle_magic_link' ) );
	}

	/**
	 * Generates a passwordless magic link for the user.
	 *
	 * @param WP_User $user The user object.
	 * @return string The generated magic link URL.
	 */
	public static function generate_magic_link( $user ) {
		$token = Xclickpw_Token::create_token( $user->ID );

		return add_query_arg(
			array(
				'auth_token'          => $token,
				'user_id'             => $user->ID,
				'password_less_nonce' => wp_create_nonce( 'password_less_magic_link_nonce_' . $user->ID ),
			),
			wp_login_url()
		);
	}

	/**
	 * Handles the magic link login process.
	 *
	 * Verifies the authentication token and logs the user in.
	 *
	 * @return void
	 */
	public function handle_magic_link() {
		if ( ! isset( $_GET['auth_token'], $_GET['password_less_nonce'], $_GET['user_id'] ) ) {
			return;
		}

		// Check if the user is already logged in.
		if ( is_user_logged_in() ) {
			// Redirect logged-in users to the homepage or a custom URL.
			$redirect_url = home_url(); // Default redirect URL.
			wp_safe_redirect( $redirect_url );

			return;
		}

		// Check if user_id exists before using it.
		$user_id = (int) sanitize_text_field( wp_unslash( $_GET['user_id'] ) );

		// Sanitize before verifying nonce.
		$nonce = sanitize_text_field( wp_unslash( $_GET['password_less_nonce'] ) );
		if ( ! wp_verify_nonce( $nonce, 'password_less_magic_link_nonce_' . $user_id ) ) {
			wp_die( esc_html__( 'Invalid request. Please try again.', '1-click-passwordless-login' ) );
		}

		// Sanitize token.
		$token = sanitize_text_field( wp_unslash( $_GET['auth_token'] ) );

		// Validate the token.
		$user_id = Xclickpw_Token::validate_token( $token );

		if ( $user_id ) {
			// Log the user in.
			wp_set_auth_cookie( $user_id );

			// Redirect to the homepage or a custom URL.
			$redirect_url = home_url(); // Default redirect URL.
			$redirect_url = apply_filters( 'password_less_login_redirect', $redirect_url, $user_id ); // Allow customization.
			wp_safe_redirect( $redirect_url );
			exit;
		}

		// Handle invalid or expired tokens.
		wp_die( esc_html__( 'Invalid or expired login link. Please request a new one.', '1-click-passwordless-login' ) );
	}

	/**
	 * Handles the AJAX request for passwordless login.
	 *
	 * Validates user email, checks login attempts, and sends a magic link.
	 *
	 * @return void
	 */
	public function handle_login_request(): void {
		check_ajax_referer( 'password_less_login_nonce', 'nonce' );

		if ( empty( $_POST['user_email'] ) ) {
			wp_send_json_error( esc_html__( 'Invalid request. Please provide a username or email.', '1-click-passwordless-login' ) );
		}

		$ip           = $this->get_user_ip();
		$key          = "password_less_attempts_$ip";
		$max_attempts = xclickpw_core()->settings->options['max_attempts'];
		$lockout_time = xclickpw_core()->settings->options['lockout_time'];
		if ( get_transient( $key ) ) {
			$attempts = get_transient( $key );
		} else {
			$attempts = 0;
		}

		if ( $attempts >= $max_attempts ) {
			// Track failed login attempt.
			xclickpw_core()->settings->set_stats( 'failed_attempts' );

			wp_send_json_error( esc_html__( 'Too many login attempts. Try again later.', '1-click-passwordless-login' ) );
		}

		$login = sanitize_text_field( wp_unslash( $_POST['user_email'] ) );
		$user  = is_email( $login ) ? get_user_by( 'email', $login ) : get_user_by( 'login', $login );

		set_transient( $key, $attempts + 1, $lockout_time * MINUTE_IN_SECONDS );

		if ( $user ) {
			Xclickpw_Email::send_magic_link( $user );

			// Track successful login request.
			xclickpw_core()->settings->set_stats( 'successful_logins' );
		}

		sleep( 1 );
		wp_send_json_success( esc_html__( 'Check your email for the login link.', '1-click-passwordless-login' ) );
	}

	/**
	 * Retrieves the user's IP address safely.
	 *
	 * Uses `HTTP_CLIENT_IP`, `HTTP_X_FORWARDED_FOR`, or `REMOTE_ADDR` in that order.
	 *
	 * @return string The sanitized user IP address.
	 */
	private function get_user_ip(): string {
		$ip = '';

		if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
			$ip = sanitize_text_field( wp_unslash( $_SERVER['HTTP_CLIENT_IP'] ) );
		} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
			$forwarded_ips = explode( ',', sanitize_text_field( wp_unslash( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) );
			$ip            = trim( $forwarded_ips[0] ); // Get first valid IP.
		} elseif ( ! empty( $_SERVER['REMOTE_ADDR'] ) ) {
			$ip = sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) );
		}

		return sanitize_text_field( $ip );
	}
}
