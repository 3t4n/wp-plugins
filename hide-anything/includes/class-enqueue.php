<?php

defined( 'ABSPATH' ) || exit();

class Hide_Anything_Enqueue {
	/** @var null */
	private static $instance = null;

	/**
	 * Hide_Anything_Enqueue constructor.
	 */
	public function __construct() {

		add_action( 'wp_enqueue_scripts', [ $this, 'frontend_scripts' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_scripts' ] );
	}

	function frontend_scripts() {

		if ( ! hide_anything_can_show() ) {
			return;
		}

		wp_enqueue_style( 'hide-anything', HIDE_ANYTHING_ASSETS . '/css/frontend.css', [ 'dashicons', ] );
		wp_enqueue_script( 'hide-anything', HIDE_ANYTHING_ASSETS . '/js/frontend.js', [
			'wp-element',
			'wp-components',
			'wp-api-fetch',
			'wp-util'
		], HIDE_ANYTHING_VERSION, true );

		$settings = (array) get_option( 'hide_anything_settings' );

		global $wp;
		wp_localize_script( 'hide-anything', 'hideAnything', [
			'pluginURL'    => HIDE_ANYTHING_URL,
			'adminURL'     => admin_url(),
			'current_page' => $wp->request,
			'selectors'    => hide_anything_get_selectors(),
			'settings'     => $settings,
		] );

	}

	public function admin_scripts() {
		$settings = (array) get_option( 'hide_anything_settings' );

		wp_enqueue_style( 'hide-anything', HIDE_ANYTHING_ASSETS . '/css/admin.css', [ 'dashicons', 'wp-components' ] );

		wp_enqueue_script( 'hide-anything', HIDE_ANYTHING_ASSETS . '/js/admin.js', [
			'wp-element',
			'wp-components',
			'wp-api-fetch',
			'wp-util'
		], false, true );

		wp_localize_script( 'hide-anything', 'hideAnything', [
			'pluginURL'    => HIDE_ANYTHING_URL,
			'adminURL'     => admin_url(),
			'current_page' => '',
			'selectors'    => hide_anything_get_admin_selectors(),
			'is_admin'     => true,
			'settings'     => $settings,
		] );

	}


	/**
	 * @return Hide_Anything_Enqueue|null
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}

Hide_Anything_Enqueue::instance();