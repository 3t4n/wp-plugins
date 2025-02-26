<?php
if ( ! class_exists( 'APTMCE_SCRIPTS' ) ) {
	class APTMCE_SCRIPTS {
		protected static $instance = null;

		public static function get_instance() {
			// If the single instance hasn't been set, set it now.
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_style' ) );
		}

		public function enqueue_scripts() {
			wp_register_script( 'magnific-pop-up-js', plugins_url( 'js/jquery.magnific-popup.js', APTMC_BASE_PATH ), array( 'jquery' ), '', true );
			wp_register_script( 'custom', plugins_url( 'js/custom.js', APTMC_BASE_PATH ), array(
				'jquery',
				'magnific-pop-up-js',
			), '', true );
			wp_enqueue_script( 'magnific-pop-up-js' );
			wp_enqueue_script( 'custom' );

		}

		public function enqueue_style() {
			wp_register_style( 'magnific-pop-up-css', plugins_url( 'css/magnific-popup.css', APTMC_BASE_PATH ) );
			wp_register_style( 'aptmc-custom-css', plugins_url( 'css/custom.css', APTMC_BASE_PATH ) );
			wp_enqueue_style( 'magnific-pop-up-css' );
			wp_enqueue_style( 'aptmc-custom-css' );


		}
	}
}

add_action( 'plugins_loaded', array( 'APTMCE_SCRIPTS', 'get_instance' ) );