<?php
/**
 * Initialize required resources.
 *
 * @since 1.0.0
 * @version 1.0.0
 */

namespace CP24\Tools\Inc;

defined( 'ABSPATH' ) || exit;

use CP24\Tools\Inc\Email\Email;

/**
 * Initialize required resources.
 *
 * @since 1.0.0
 * @version 1.0.0
 */
class Init {
	const NONCE = 'cp24-wp-tools';

	/**
	 * Constructor method.
	 *
	 * @since 1.0.0
	 * @version 1.0.0
	 */
	public function __construct() {
		$require_files = [
			'inc/class-settings.php',
			'inc/class-base.php',
			'inc/email/class-email.php',
			'inc/membership/class-membership.php',
			'inc/layout/class-layout.php',
		];

		self::load_files( $require_files );

		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_frontend_scripts' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_backend_scripts' ] );
		add_action( 'wp_ajax_cp24_smtp_get_cp24_list', [ $this, 'get_plugins_list' ] );
	}

	/**
	 * Load plugin files.
	 *
	 * @param array $array array of files.
	 * @since 1.2.0
	 * @version 1.2.0
	 */
	public static function load_files( $array ) {
		foreach ( $array as $file ) {
			require_once CP24_MULTI_SMTP_PATH . $file;
		}
	}

	/**
	 * Get CP24 plugins list.
	 *
	 * @since 1.0.0
	 * @version 1.0.0
	 */
	public function get_plugins_list() {
		check_ajax_referer( Email::EMAIL_NONCE, 'nonce' );

		$url     = 'https://code-portal24.com/wp-json/code-portal/v1/plugins';
		$plugins = wp_remote_get( $url );

		if ( is_wp_error( $plugins ) ) {
			wp_send_json_error();
		}

		$body    = wp_remote_retrieve_body( $plugins );
		$plugins = json_decode( $body, true );

		wp_send_json_success( $plugins );
	}

	/**
	 * Enqueue scripts.
	 *
	 * @since 1.0.0
	 * @version 1.0.0
	 */
	public function enqueue_backend_scripts() {
		$page = filter_input( INPUT_GET, 'page', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
		$page = sanitize_text_field( $page );

		$plugin_admin_pages = CP24_DASHBOARD_PAGES;

		if ( ! in_array( $page, $plugin_admin_pages, true ) ) {
			return;
		}

		wp_enqueue_style(
			'growtop-email-backend-style',
			CP24_WP_TOOLS_URL . 'dist/backend.css',
			[],
			'1.0.0'
		);

		wp_enqueue_script(
			'growtop-email-backend-script',
			CP24_WP_TOOLS_URL . 'dist/backend.js',
			[ 'lodash', 'wp-element', 'wp-i18n', 'wp-util', 'jquery' ],
			'1.0.0',
			true
		);

		wp_localize_script(
			'growtop-email-backend-script',
			'growtopEmail',
			[
				'adminUrl' => admin_url( 'admin.php?page=cp24-email' ),
				'nonce'    => wp_create_nonce( self::NONCE ),
			]
		);
	}

	/**
	 * Enqueue frontend scripts.
	 *
	 * @since 1.2.0
	 * @version 1.2.0
	 */
	public function enqueue_frontend_scripts() {
		wp_enqueue_script(
			'cp24-tools-frontend-script',
			CP24_WP_TOOLS_URL . 'dist/frontend.js',
			[ 'lodash', 'wp-element', 'wp-i18n', 'wp-util', 'jquery' ],
			'1.0.0',
			true
		);

		wp_enqueue_style(
			'cp24-tools-frontend-style',
			CP24_WP_TOOLS_URL . 'dist/frontend.css',
			[],
			'1.0.0'
		);

		wp_localize_script(
			'cp24-tools-frontend-script',
			'cp24WpToolsFrontend',
			[
				'nonce'    => wp_create_nonce( self::NONCE ),
				'ajax_url' => admin_url( 'admin-ajax.php' ),
			]
		);
	}
}

new Init();
