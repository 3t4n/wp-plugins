<?php
/**
 * Validation Function
 *
 * @package AIOC
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$validation_type = aioc_get_captcha_validation_type();
$key             = array_key_exists( 'response_key', $validation_type ) ? $validation_type['response_key'] : '';
$response        = array_key_exists( 'response_cb', $validation_type ) && is_callable( $validation_type['response_cb'] ) ? call_user_func( $validation_type['response_cb'] ) : '';
$error_name      = array_key_exists( 'error_name', $validation_type ) ? $validation_type['error_name'] : '';
$error_message   = aioc_option( 'aioc_validation_error_message' );

/**
 * Validate login form.
 *
 * @since 1.0.0
 *
 * @param WP_User|WP_Error $user     WP_User or WP_Error object.
 * @return WP_User|WP_Error Modified object.
 */
function aioc_validate_login_form( $user ) {
	global $key, $response, $error_name, $error_message;

	if ( isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_REQUEST[ $key ] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( true !== $response ) {
			$user = new WP_Error( esc_html( $error_name ), '<strong>' . esc_html__( 'ERROR:', 'all-in-one-captcha' ) . '</strong> ' . esc_html( $error_message ) );
		}
	} else {
		$user = new WP_Error( esc_html( $error_name ), '<strong>' . esc_html__( 'ERROR:', 'all-in-one-captcha' ) . '</strong> ' . esc_html( $error_message ) );
	}

	return $user;
}

/**
 * Validate register form.
 *
 * @since 1.0.0
 *
 * @param WP_Error $errors               A WP_Error object.
 * @return WP_Error Modified error object.
 */
function aioc_validate_register_form( $errors ) {
	global $key, $response, $error_name, $error_message;

	if ( isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_REQUEST[ $key ] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( true !== $response ) {
			$errors = new WP_Error( esc_html( $error_name ), '<strong>' . esc_html__( 'ERROR:', 'all-in-one-captcha' ) . '</strong> ' . esc_html( $error_message ) );
		}
	} else {
		$errors = new WP_Error( esc_html( $error_name ), '<strong>' . esc_html__( 'ERROR:', 'all-in-one-captcha' ) . '</strong> ' . esc_html( $error_message ) );
	}

	return $errors;
}

/**
 * Validate lost password form.
 *
 * @since 1.0.0
 *
 * @param WP_Error $errors A WP_Error object.
 */
function aioc_validate_lost_password_form( $errors ) {
	global $key, $response, $error_name, $error_message;
	$error_message = aioc_option( 'aioc_validation_error_message' );

	if ( isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_REQUEST[ $key ] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( true !== $response ) {
			$errors->add( esc_html( $error_name ), '<strong>' . esc_html__( 'ERROR:', 'all-in-one-captcha' ) . '</strong> ' . esc_html( $error_message ) );
		}
	} else {
		$errors->add( esc_html( $error_name ), '<strong>' . esc_html__( 'ERROR:', 'all-in-one-captcha' ) . '</strong> ' . esc_html( $error_message ) );
	}
}

/**
 * Validate comment form.
 *
 * @since 1.0.0
 *
 * @param array $commentdata Comment data.
 * @return array Modified comment data.
 */
function aioc_validate_comment_form( $commentdata ) {
	global $key, $response, $error_name, $error_message;
	$comment_validation = false;

	if ( 'comment' === $commentdata['comment_type'] && 1 === absint( aioc_option( 'aioc_enable_comment_form' ) ) ) {
		$comment_validation = true;
	} elseif ( 'review' === $commentdata['comment_type'] && 1 === absint( aioc_option( 'aioc_enable_woo_review' ) ) ) {
		$comment_validation = true;
	}

	// No need to check for loggedin user.
	if ( absint( $commentdata['user_ID'] ) > 0 || false === $comment_validation ) {
		return $commentdata;
	}

	if ( isset( $_SERVER['REQUEST_METHOD'] ) && 'POST' === $_SERVER['REQUEST_METHOD'] && isset( $_REQUEST[ $key ] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( true !== $response ) {
			wp_die(
				'<p><strong>' . esc_html__( 'ERROR:', 'all-in-one-captcha' ) . '</strong> ' . esc_html( $error_message ) . '</p>',
				esc_html( $error_name ),
				array(
					'response'  => 403,
					'back_link' => 1,
				)
			);
		}
	} else {
			wp_die(
				'<p><strong>' . esc_html__( 'ERROR:', 'all-in-one-captcha' ) . '</strong> ' . esc_html( $error_message ) . '</p>',
				esc_html( $error_name ),
				array(
					'response'  => 403,
					'back_link' => 1,
				)
			);
	}

	return $commentdata;
}
