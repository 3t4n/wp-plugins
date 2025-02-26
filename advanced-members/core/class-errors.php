<?php
/**
 * Manage Advanced Members for ACF Location Rules
 *
 * @since 	1.0
 *
 */
namespace AMem;

use AMem\Module;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Errors extends Module {

	// Translated error strings
	public $messages = [];

	protected $errors = [];

	function __construct() {
		$this->messages = [
			'logged_in' => __( 'You already logged in.', 'advanced-members' ),
			/* translators: Login URL */
			'logged_out' => sprintf( __( 'You logged out form site. You can <a href="%s">log in here</a>.', 'advanced-members' ), esc_url( amem_get_core_page('login', false, 'current') ) ),
			'invalid_form' => __( 'Invalid form detected.', 'advanced-members' ),
			'empty_username_email' => __( 'Please enter your username or email', 'advanced-members' ),
			'empty_password' => __( 'Please enter your password', 'advanced-members' ),
			'empty_email' => __( 'Please enter your email', 'advanced-members' ),
			/* translators: Given username */
			'username_not_exists' => __( 'The username %s is not existing in this site. Please try a different username', 'advanced-members' ),
			'password_incorrect' => __( 'Password is incorrect. Please try again.', 'advanced-members' ),
			/* translators: Current URL */
			'nonce_failed' => sprintf( __( 'Your submission failed. Please <a href="%s">reload the page</a> and try again.', 'advanced-members' ), amem_get_current_url() ),
			'invalid_honeypot' => __( 'Spam Detected', 'advanced-members' ),
			'rejected'	=> __( 'rejected user', 'advanced-members' ),
		];

		add_action( 'init', array( $this, 'messages' ), 50 );
	}

	function messages() {
		$this->messages = apply_filters('amem/error/messages', $this->messages);

		return $this->messages;
	}

	function add_text($key, $text) {
		if ( !isset($this->messages[$key]) )
			$this->messages[$key] = $text;
	}

	function text($key) {
		if ( isset($this->messages[$key]) )
			return $this->messages[$key];

		return '';
	}

	function add($input='', $message='') {
		if ( !$message && isset($this->messages[$input]) )
			$message = $this->messages[$input];

		$this->errors[$input] = $message;
	}

	function get($input) {
		if ( isset($this->errors[$input]) )
			return isset($this->errors[$input]);
		return null;
	}

	function reset() {
		$this->errors = [];
	}

	function get_errors() {
		return $this->errors;
	}

	function has_errors() {
		return count($this->errors) > 0;
	}

	function to_wp_error() {
		$wp_error = new \WP_Error;

		$errors = acf_get_validation_errors();
		if ( $errors ) {
		  foreach ( $errors as $error ) {
		    $wp_error->add( $error['input'], $error['message'] );
		  }
		}

		if ( count($this->errors) > 0 ) {
			foreach ( $this->errors as $key => $val ) {
				$wp_error->add( $key, $val );
			}
		}

		return $wp_error;
	}

}

amem()->register_module('errors', Errors::getInstance());
