<?php
/**
 * Afftra Blocks Enqueue Assets
 *
 * @package AfftraBlocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'AfftraBlocks_Assets' ) ) {

	/**
	 * Afftra Blocks Enqueue Assets Class
	 *
	 * @since 1.0.0
	 * @package AfftraBlocks
	 */
	class AfftraBlocks_Assets {

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
				'afftra-global-styles',
				trailingslashit( AFFTRA_URL_FILE ) . 'assets/css/global.css',
				array(),
				AFFTRA_VERSION,
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

			if ( ! is_admin() ) {
				return;
			}

			// modules
			if ( file_exists( trailingslashit( AFFTRA_PLUGIN_DIR ) . '/build/modules/index.asset.php' ) ) {
				$modulesDependencies = require_once trailingslashit( AFFTRA_PLUGIN_DIR ) . '/build/modules/index.asset.php';

				wp_enqueue_script(
					'afftra-blocks-modules-script',
					trailingslashit( AFFTRA_URL_FILE ) . 'build/modules/index.js',
					$modulesDependencies['dependencies'],
					$modulesDependencies['version'],
					false
				);

				// wp localizations
				wp_localize_script(
					'afftra-blocks-modules-script',
					'afftraParams',
					array(
						'theme_fonts' => self::get_theme_fonts(),
					)
				);

			}

			// global
			if ( file_exists( trailingslashit( AFFTRA_PLUGIN_DIR ) . '/build/global/index.asset.php' ) ) {
				$globalDependencies = require_once trailingslashit( AFFTRA_PLUGIN_DIR ) . '/build/global/index.asset.php';

				wp_enqueue_script(
					'afftra-blocks-global-script',
					trailingslashit( AFFTRA_URL_FILE ) . 'build/global/index.js',
					$globalDependencies['dependencies'],
					AFFTRA_VERSION,
					false
				);

				wp_enqueue_style(
					'afftra-blocks-global-style',
					trailingslashit( AFFTRA_URL_FILE ) . 'build/global/index.css',
					array(),
					AFFTRA_VERSION,
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

	new AfftraBlocks_Assets(); // Initialize the class.
