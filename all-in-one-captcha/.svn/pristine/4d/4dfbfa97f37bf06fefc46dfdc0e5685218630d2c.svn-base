<?php
/**
 * Validation
 *
 * @package AIOC
 */

/**
 * Register hooks.
 *
 * @since 1.0.0
 */
function aioc_attach_hooks() {
	if ( true !== aioc_key_is_ok() ) {
		return;
	}

	add_action( 'login_enqueue_scripts', 'aioc_load_scripts' );
	add_action( 'wp_footer', 'aioc_load_scripts' );

	// Login.
	if ( 1 === absint( aioc_option( 'aioc_enable_login' ) ) && 'wp-login.php' === $GLOBALS['pagenow'] ) {
		add_action( 'wp_authenticate_user', 'aioc_validate_login_form', 10, 2 );
	}

	// Register.
	if ( 1 === absint( aioc_option( 'aioc_enable_register' ) ) ) {
		add_filter( 'registration_errors', 'aioc_validate_register_form', 10, 3 );
	}

	// Lost password and reset password.
	if ( 1 === absint( aioc_option( 'aioc_enable_lost_password' ) ) && 'wp-login.php' === $GLOBALS['pagenow'] ) {
		add_action( 'lostpassword_post', 'aioc_validate_lost_password_form', 10, 1 ); // Lost password.
		add_action( 'validate_password_reset', 'aioc_validate_lost_password_form', 10, 2 ); // Reset password.
	}

	// Comment form.
	if ( 1 === absint( aioc_option( 'aioc_enable_comment_form' ) ) || 1 === absint( aioc_option( 'aioc_enable_woo_review' ) ) ) {
		add_filter( 'preprocess_comment', 'aioc_validate_comment_form', 10, 1 );
	}
}

add_action( 'plugins_loaded', 'aioc_attach_hooks' );
