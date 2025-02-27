<?php

namespace InsertCodes\Controllers;

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * Actions class.
 *
 * @since 1.0.0
 * @package InsertCodes\Controllers
 */
class Actions {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'admin_post_insertcodes_hbf_scripts', array( __CLASS__, 'handle_hbf_scripts' ) );
		add_action( 'admin_post_insertcodes_snippets', array( __CLASS__, 'handle_snippets' ) );
		add_action( 'admin_post_insertcodes_settings', array( __CLASS__, 'handle_settings' ) );
	}

	/**
	 * Updating settings.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function handle_hbf_scripts() {
		check_admin_referer( 'insertcodes_hbf_scripts' );

		// User capability check. You must have manage_options capability to perform this action.
		if ( ! current_user_can( 'manage_options' ) ) {
			insertcodes()->add_flash_notice( __( 'You do not have sufficient permissions to perform this action.', 'insert-codes' ) );
		}

		$header_scripts = isset( $_POST['insertcodes_header'] ) ? wp_kses( wp_unslash( $_POST['insertcodes_header'] ), insertcodes_get_allowed_html() ) : '';
		$body_scripts   = isset( $_POST['insertcodes_body'] ) ? wp_kses( wp_unslash( $_POST['insertcodes_body'] ), insertcodes_get_allowed_html() ) : '';
		$footer_scripts = isset( $_POST['insertcodes_footer'] ) ? wp_kses( wp_unslash( $_POST['insertcodes_footer'] ), insertcodes_get_allowed_html() ) : '';

		// Updating options.
		update_option( 'insertcodes_header', $header_scripts );
		update_option( 'insertcodes_body', $body_scripts );
		update_option( 'insertcodes_footer', $footer_scripts );

		insertcodes()->add_flash_notice( __( 'Codes saved successfully.', 'insert-codes' ) );
		wp_safe_redirect( wp_get_referer() );
		exit();
	}

	/**
	 * Updating PHP code snippets.
	 *
	 * @since 1.2.0
	 * @return void
	 */
	public static function handle_snippets() {
		check_admin_referer( 'insertcodes_snippets' );

		// User capability check. You must have manage_options capability to perform this action.
		if ( ! current_user_can( 'manage_options' ) ) {
			insertcodes()->add_flash_notice( __( 'You do not have sufficient permissions to perform this action.', 'insert-codes' ) );
		}

		// Get the sanitized PHP code snippets.
		$php_snippets = self::sanitize_snippet( $_POST );

		// Get settings value.
		$enable_snippets = isset( $_POST['insertcodes_enable_snippets'] ) ? sanitize_key( wp_unslash( $_POST['insertcodes_enable_snippets'] ) ) : '';
		$location        = isset( $_POST['insertcodes_snippets_location'] ) ? sanitize_key( wp_unslash( $_POST['insertcodes_snippets_location'] ) ) : '';

		// If '<?php' is present beginning of the code, then remove it.
		if ( 0 === strpos( $php_snippets, '<?php' ) ) {
			$php_snippets = substr( $php_snippets, 5 );
		}

		// Updating options.
		update_option( 'insertcodes_php', $php_snippets );
		update_option( 'insertcodes_enable_snippets', $enable_snippets );
		update_option( 'insertcodes_snippets_location', $location );

		insertcodes()->add_flash_notice( __( 'PHP code snippets saved successfully.', 'insert-codes' ) );
		wp_safe_redirect( wp_get_referer() );
		exit();
	}

	/**
	 * Updating settings.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function handle_settings() {
		check_admin_referer( 'insertcodes_settings' );

		// User capability check. You must have manage_options capability to perform this action.
		if ( ! current_user_can( 'manage_options' ) ) {
			insertcodes()->add_flash_notice( __( 'You do not have sufficient permissions to perform this action.', 'insert-codes' ) );
		}

		$headers_priority = isset( $_POST['insertcodes_header_priority'] ) ? intval( wp_unslash( $_POST['insertcodes_header_priority'] ) ) : intval( '10' );
		$body_priority    = isset( $_POST['insertcodes_body_priority'] ) ? intval( wp_unslash( $_POST['insertcodes_body_priority'] ) ) : intval( '10' );
		$footers_priority = isset( $_POST['insertcodes_footer_priority'] ) ? intval( wp_unslash( $_POST['insertcodes_footer_priority'] ) ) : intval( '10' );
		$is_delete_data   = isset( $_POST['insertcodes_delete_data'] ) ? sanitize_key( wp_unslash( $_POST['insertcodes_delete_data'] ) ) : '';

		// Updating options.
		update_option( 'insertcodes_header_priority', $headers_priority );
		update_option( 'insertcodes_body_priority', $body_priority );
		update_option( 'insertcodes_footer_priority', $footers_priority );
		update_option( 'insertcodes_delete_data', $is_delete_data );

		insertcodes()->add_flash_notice( __( 'Settings saved successfully.', 'insert-codes' ) );
		wp_safe_redirect( wp_get_referer() );
		exit();
	}

	/**
	 * Sanitize PHP codes.
	 *
	 * @param array $data POST data.
	 *
	 * @since 1.2.0
	 * @return string $codes Sanitized PHP codes.
	 */
	public static function sanitize_snippet( $data ) {
		$codes = isset( $data['insertcodes_php'] ) ? wp_unslash( $data['insertcodes_php'] ) : '';

		return $codes;
	}
}
