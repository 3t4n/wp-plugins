<?php

namespace Codemanas\SimplePopupBlock;

final class Bootstrap {

	const MINIMUM_WP_VERSION = '6.0';
	const MINIMUM_PHP_VERSION = '7.0';

	public static ?Bootstrap $instance = null;

	public static function get_instance(): ?Bootstrap {
		return is_null( self::$instance ) ? self::$instance = new self() : self::$instance;
	}

	protected function __construct() {

		// Check WordPress version
		if ( version_compare( get_bloginfo( 'version' ), self::MINIMUM_WP_VERSION, '<' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			deactivate_plugins( SIMPLE_POPUP_BLOCK_BASENAME );
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_wp_version' ] );
			return;
		}

		if ( version_compare( phpversion(), self::MINIMUM_PHP_VERSION, '<' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			deactivate_plugins( SIMPLE_POPUP_BLOCK_BASENAME );
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
		}

		//need to load autoloader
		$this->autoload();

		//load plugin modules
		add_action( 'plugins_loaded', [ $this, 'load_modules' ] );

	}



	public function autoload(): void {
		require_once SIMPLE_POPUP_BLOCK_DIR_PATH . 'vendor/autoload.php';
	}


	public function admin_notice_minimum_wp_version() {
		$activate_param = filter_input( INPUT_GET, 'activate', FILTER_SANITIZE_STRING );

		if ( $activate_param !== null ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
		/* translators: 1: Plugin name 2: WordPress 3: Required WordPress version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'simple-popup-block' ),
			'<strong>' . esc_html__( 'Simple Popup Block', 'simple-popup-block' ) . '</strong>',
			'<strong>' . esc_html__( 'WordPress', 'simple-popup-block' ) . '</strong>',
			self::MINIMUM_WP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	public function admin_notice_minimum_php_version() {
		$activate_param = filter_input( INPUT_GET, 'activate', FILTER_SANITIZE_STRING );

		if ( $activate_param !== null ) {
			unset( $_GET['activate'] );
		}
		$message = sprintf(
		/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'simple-popup-block' ),
			'<strong>' . esc_html__( 'Simple Popup Block', 'simple-popup-block' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'simple-popup-block' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function load_modules() {
		Blocks::get_instance();
		Patterns::get_instance();
	}
}

Bootstrap::get_instance();
