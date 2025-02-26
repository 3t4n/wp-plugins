<?php

if ( ! class_exists( 'Rescue_Children_Banner' ) ) {
	/**
	 * Adds a "Rescue Children" banner to the top left or top right corner of your site, which links to Destiny Rescue's website.
	 */
	class Rescue_Children_Banner {
		// Declare variables and constants
		protected $display_banner;
		const VERSION = '1.0';

		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'init',      array( $this, 'init' ) );
			add_action( 'wp',        array( $this, 'set_display_banner' ) );
			add_action( 'wp',        array( $this, 'load_resources' ) );
			add_action( 'wp_footer', array( $this, 'render_banner' ) );
		}

		/*
		 * Assign variables and other initialization
		 */
		public function init() {
			$this->display_banner = null;
		}

		/**
		 * Load CSS file
		 */
		public function load_resources() {
			wp_register_script(
				'rcb_script_front_end',
				plugins_url( 'javascript/front-end.js', dirname( __FILE__ ) ),
				array( 'jquery' ),
				self::VERSION,
				true
			);

			wp_register_style(
				'rcb_style_front_end',
				plugins_url( 'css/front-end.css', dirname( __FILE__ ) ),
				false,
				self::VERSION
			);

			if ( $this->display_banner ) {
				wp_enqueue_script( 'rcb_script_front_end' );
				wp_enqueue_style(  'rcb_style_front_end'  );
			}
		}

		/**
		 * Determines if the banner should be displayed on the current page
		 */
		public function set_display_banner() {
			if ( isset( $this->display_banner ) ) {
				return;
			}

			if ( ! is_admin() && ! in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ) {
				$display = true;
			} else {
				$display = false;
			}

			$this->display_banner = apply_filters( 'rcb_set_display_banner', $display );
		}

		/**
		 * Renders the banner
		 * Note: The icon is from http://icons.mysitemyway.com/orange-white-pearls-icons-media/
		 */
		public function render_banner() {
			if ( $this->display_banner ) {
				extract( $GLOBALS['RCB_Settings']->get_settings() );
				
				require_once( dirname( dirname( __FILE__ ) ) . '/views/banner-markup.php' );
			}
		}
	} // end Rescue_Children_Banner
}
