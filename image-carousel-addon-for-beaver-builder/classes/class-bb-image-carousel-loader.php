<?php

/**
 * A class that handles loading custom modules and custom
 * fields if the builder is installed and activated.
 */
class DG_Image_Carousel_Loader {

	/**
	 * Initializes the class once all plugins have loaded.
	 */
	static public function init() {
		add_action( 'plugins_loaded', __CLASS__ . '::setup_hooks' );
		add_action( 'plugins_loaded', __CLASS__ . '::load_textdomain' );
	}

	/**
	 * Setup hooks if the builder is installed and activated.
	 */
	static public function setup_hooks() {
		if ( ! class_exists( 'FLBuilder' ) ) {
			return;
		}

		// Load custom modules.
		add_action( 'init', __CLASS__ . '::load_modules' );

		// Enqueue custom field assets.
		add_action( 'init', __CLASS__ . '::enqueue_field_assets' );
	}

	/**
	 * Load plugin textdomain.
	 */
	static public function load_textdomain() {
		 load_plugin_textdomain( 'bb-image-carousel', false, BB_IMAGE_CAROUSEL_LANGUAGES_DIR . '/languages' );
	}

	/**
	 * Loads our custom modules.
	 */
	static public function load_modules() {
		require_once BB_IMAGE_CAROUSEL_DIR . 'modules/image-carousel/image-carousel.php';
	}

	/**
	 * Enqueues our custom field assets only if the builder UI is active.
	 */
	static public function enqueue_field_assets() {
		if ( ! FLBuilderModel::is_builder_active() ) {
			return;
		}

		wp_enqueue_style( 'dg-image-carousel', BB_IMAGE_CAROUSEL_URL . 'assets/css/fields.css', array(), '' );
		wp_enqueue_script( 'dg-image-carousel', BB_IMAGE_CAROUSEL_URL . 'assets/js/fields.js', array(), '', true );
	}
}

DG_Image_Carousel_Loader::init();