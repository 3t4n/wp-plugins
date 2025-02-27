<?php

defined( 'ABSPATH' ) || exit;

/**
 * Class Install
 */
class Hide_Anything_Install {

	private static $instance = null;

	public function __construct() {
		if ( ! class_exists( 'Hide_Anything_Update' ) ) {
			require_once HIDE_ANYTHING_INCLUDES . '/class-update.php';
		}

		$updater = new Hide_Anything_Update();

		if ( $updater->needs_update() ) {
			$updater->perform_updates();
		} else {
			self::create_default_data();
		}

		self::create_default_data();
	}


	/**
	 * create default data
	 *
	 * @since 2.0.8
	 */
	private static function create_default_data() {

		update_option( 'hide_anything_redirect', true );

		$version      = get_option( 'hide_anything_version', '0' );
		$install_time = get_option( 'hide_anything_install_time', '' );

		if ( empty( $version ) ) {
			update_option( 'hide_anything_version', HIDE_ANYTHING_VERSION );
		}

		if ( ! empty( $install_time ) ) {
			$date_format = get_option( 'date_format' );
			$time_format = get_option( 'time_format' );
			update_option( 'hide_anything_install_time', date( $date_format . ' ' . $time_format ) );
		}


	}

	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}


}

Hide_Anything_Install::instance();