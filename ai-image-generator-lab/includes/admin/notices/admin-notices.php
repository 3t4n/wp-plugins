<?php
/**
 *  Adds admin notices
 *  - Review notice
 *  - License is not active notice (based on the version)
 */

defined( 'ABSPATH' ) || die();


class WPZ_Ai_Image_Lab_Notices {

	/**
	 * Display review notice after number of days.
	 *
	 * @used in notice_admin_conditions()
	 */

	const NOTICE_DAYS = 14;

	public static function setup() {

		if ( self::notice_admin_review_conditions() ) {
			add_action( 'admin_notices', [ 'WPZ_Ai_Image_Lab_Notices', 'notice_admin_review_content' ] );
			add_action( 'wp_ajax_wpz_ai_image_lab_notice_hide', [ 'WPZ_Ai_Image_Lab_Notices', 'notice_admin_review_hide' ] );
			add_action( 'admin_enqueue_scripts', [ 'WPZ_Ai_Image_Lab_Notices', 'admin_scripts' ], 11 );
		}

	}

	/**
	 * Enqueue scripts for all admin pages.
	 * Called in setup()
	 *
	 * @since 1.0.0
	 *
	 */
	public static function admin_scripts() {
		wp_enqueue_script( 'wpz_ai_image_lab_notice-admin', WpzAiImageLab::$pluginUrl . 'assets/js/admin.min.js', [ 'jquery' ], WpzAiImageLab::VERSION, true );
	}

	/**
	 * Review Notice:
	 * Conditions based on which notice is displayed
	 */
	public static function notice_admin_review_conditions() {
		return get_option( 'wpz_ai_image_lab_first_activate') && get_option( 'wpz_ai_image_lab_notice_hidden' ) != 1 && time() - get_option( 'wpz_ai_image_lab_first_activate' ) >= ( self::NOTICE_DAYS * 86400 );
	}

	/**
	 * Review Notice:
	 * Content of the notice
	 */
	public static function notice_admin_review_content() {
		$link = 'https://wordpress.org/plugins/ai-image-generator-lab/';

		// translators: 1 is the plugin name, 2 and 3 are <a> tags
		$message = sprintf( esc_html__( 'Do you use the %1$s plugin? Please support us by %2$swriting a review%3$s.', 'wpz-ai-image-lab' ),
			'<strong>AI Image Lab</strong>',
			'<a href="' . esc_html( $link ) . '" target="_blank">', '</a>'
		);

		printf( '<div id="wpz-ai-image-lab-notice" class="updated notice is-dismissible"><p>%1$s</p></div>',
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			$message
		);
	}

	/**
	 * Review Notice:
	 * Triggered on dismiss notice button click
	 */
	public static function notice_admin_review_hide() {
		update_option( 'wpz_ai_image_lab_notice_hidden', 1 );
	}


}

WPZ_Ai_Image_Lab_Notices::setup();