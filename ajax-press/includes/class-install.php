<?php

namespace Ajax_Press;

defined( 'ABSPATH' ) || exit;

/**
 * Class Install
 */
class Install {

	/**
	 * Plugin activation stuffs
	 *
	 * @since 1.0.0
	 */
	public static function activate() {
		self::create_default_data();
		self::create_default_settings();
	}

	public static function create_default_settings() {
		$settings = [
			'enableAjax'     => true,
			'enableScroll'   => true,
			'enableCache'    => true,
			'extraSelectors' => [],
			'mainSelector'   => '#content',
			'preloader'      => 'default',
			'scripts'        => '',
			'transition'     => 'fade',
			'triggers'       => 'a, form',
			'updateClass'    => true,
			'updateStyles'   => true,
		];

		update_option( 'ajax_press_settings', $settings );
	}


	/**
	 * Create plugin settings default data
	 *
	 * @since 1.0.0
	 */
	private static function create_default_data() {

		$version = get_option( 'ajax_press_version' );

		// If the plugin version is not set, it may be a fresh installation.
		if ( ! $version ) {
			update_option( 'ajax_press_version', AJAX_PRESS_VERSION );

			$date_format = get_option( 'date_format' );
			$time_format = get_option( 'time_format' );
			update_option( 'ajax_press_install_time', date( $date_format . ' ' . $time_format ) );

			// update theme configure notice showing status new
			if ( Theme_Configs::instance()->get_current_theme_configs() ) {
				update_option( 'ajax_press_theme_config_status', 'new' );
			}
		}
	}


}