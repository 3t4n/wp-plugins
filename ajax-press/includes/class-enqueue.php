<?php

namespace Ajax_Press;

defined( 'ABSPATH' ) || die( 'Cheatin\' uh?' );

class Enqueue {

	private static $instance = null;

	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
	}

	public function admin_scripts() {
		wp_enqueue_style( 'ajax-press', AJAX_PRESS_ASSETS . '/css/admin.css', array( 'wp-components' ), AJAX_PRESS_VERSION );

		wp_enqueue_script( 'ajax-press', AJAX_PRESS_ASSETS . '/js/admin.js', array(
			'jquery',
			'wp-element',
			'wp-components',
			'wp-i18n',
			'wp-api',
			'wp-util',
		), AJAX_PRESS_VERSION, true );

		wp_localize_script( 'ajax-press', 'ajaxPress', [
			'pluginUrl' => AJAX_PRESS_URL,
			'settings' => (array) get_option( 'ajax_press_settings' ),
		] );
	}

	public function enqueue_scripts() {
		wp_enqueue_style( 'ajax-press', AJAX_PRESS_ASSETS . '/css/frontend.css', array(), AJAX_PRESS_VERSION );
		wp_enqueue_script( 'ajax-press', AJAX_PRESS_ASSETS . '/js/frontend.js', array(), AJAX_PRESS_VERSION, true );

		wp_localize_script( 'ajax-press', 'ajaxPress', [
			'pluginUrl' => AJAX_PRESS_URL,
			'settings' => (array) get_option( 'ajax_press_settings' ),
		] );
	}

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

}

Enqueue::instance();

