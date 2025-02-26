<?php
/**
 * Afmb Blocks Enqueue Assets
 *
 * @package Afmb-blocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Afmb_Assets' ) ) {

	/**
	 * Afmb Blocks Enqueue Assets Class
	 *
	 * @since 1.0.0
	 * @package Afmb-blocks
	 */
	class Afmb_Assets {

		/**
		 * Constructor
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function __construct() {
			$this->init();
		}

		/**
		 * Initialize the Class
		 *
		 * @since 1.0.0
		 * @return void
		 */
		private function init() {
			add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor_assets' ), 2 ); // Editor Assets.
			add_action( 'enqueue_block_assets', array( $this, 'enqueue_assets' ) ); // Frontend Assets + Editor Assets.
		}

		/**
		 * Enqueue Assets for Frontend + Editor
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function enqueue_assets() {
			
			// global styles
			wp_enqueue_style(
				'afmb-global-styles',
				trailingslashit( AFMB_URL_FILE ) . 'assets/css/global.css',
				array(),
				AFMB_VERSION,
				'all'
			);

		}

		/**
		 * Enqueue Editor Assets
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function enqueue_editor_assets() {

			// modules
			if ( file_exists( trailingslashit( AFMB_PLUGIN_DIR ) . '/build/modules/index.asset.php' ) ) {
				$modulesDependencies = require_once trailingslashit( AFMB_PLUGIN_DIR ) . '/build/modules/index.asset.php';

				wp_enqueue_script(
					'afmb-blocks-modules-script',
					trailingslashit( AFMB_URL_FILE ) . 'build/modules/index.js',
					$modulesDependencies['dependencies'],
					$modulesDependencies['version'],
					false
				);


			}

			// global
			if ( file_exists( trailingslashit( AFMB_PLUGIN_DIR ) . '/build/global/index.asset.php' ) ) {
				$globalDependencies = require_once trailingslashit( AFMB_PLUGIN_DIR ) . '/build/global/index.asset.php';

				wp_enqueue_script(
					'afmb-blocks-global-script',
					trailingslashit( AFMB_URL_FILE ) . 'build/global/index.js',
					$globalDependencies['dependencies'],
					AFMB_VERSION,
					false
				);

				wp_enqueue_style(
					'afmb-blocks-global-style',
					trailingslashit( AFMB_URL_FILE ) . 'build/global/index.css',
					array(),
					AFMB_VERSION,
					'all'
				);

			}
		}

		/**
		 * Get Theme Fonts
		 */
		public static function get_theme_fonts() {
			$global_settings = wp_get_global_settings();
			$global_fonts    = $global_settings['typography']['fontFamilies'] ?? array();

			if ( empty( $global_fonts ) ) {
				return array();
			}

			$theme_fonts  = array();
			$custom_fonts = array();
			$final_fonts  = array();

			// Check if theme fonts exist and are not empty
			if ( isset( $global_fonts['theme'] ) && ! empty( $global_fonts['theme'] ) ) {
				foreach ( $global_fonts['theme'] as $font ) {
					if ( isset( $font['name'] ) ) {
						$theme_fonts[] = $font['name'];
					}
				}
			}

			// Check if custom fonts exist and are not empty
			if ( isset( $global_fonts['custom'] ) && ! empty( $global_fonts['custom'] ) ) {
				foreach ( $global_fonts['custom'] as $font ) {
					if ( isset( $font['name'] ) ) {
						$custom_fonts[] = $font['name'];
					}
				}
			}

			// Merge theme and custom fonts into the final array
			$final_fonts = array_merge( $theme_fonts, $custom_fonts );

			$system_fonts = array_filter(
				$final_fonts,
				function ( $font ) {
					return strpos( $font, 'system' ) !== false || strpos( $font, 'System' ) !== false;
				}
			);

			// final fonts array including system fonts at the top
			$final_fonts = array_merge( $system_fonts, array_diff( $final_fonts, $system_fonts ) );

			return $final_fonts;
		}
	}

}

	new Afmb_Assets(); // Initialize the class.
