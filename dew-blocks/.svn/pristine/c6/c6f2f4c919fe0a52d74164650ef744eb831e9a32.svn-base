<?php
/**
 * Enqueue Assets
 *
 * @since 1.0.0
 * @package Dewb
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Dewb_Enqueue_Assets' ) ) {

	/**
	 * Enqueue Assets
	 *
	 * @since 1.0.0
	 */
	class Dewb_Enqueue_Assets {

		/**
		 * Constructor
		 *
		 * @return void
		 */
		public function __construct() {
			add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor_assets' ), 2 );
			add_action( 'enqueue_block_assets', array( $this, 'enqueue_assets' ) );
		}

		/**
		 * Enqueue Editor Assets
		 *
		 * @return void
		 */
		public function enqueue_editor_assets() {

			if ( ! is_admin() ) {
				return;
			}

			if ( file_exists( trailingslashit( DEWB_PATH ) . './build/global/global.asset.php' ) ) {
				$dependency_file = include_once trailingslashit( DEWB_PATH ) . './build/global/global.asset.php';
			}

			if ( is_array( $dependency_file ) && ! empty( $dependency_file ) ) {
				wp_enqueue_script(
					'dewb-blocks-global-script',
					trailingslashit( DEWB_URL ) . './build/global/global.js',
					isset( $dependency_file['dependencies'] ) ? $dependency_file['dependencies'] : array(),
					isset( $dependency_file['version'] ) ? $dependency_file['version'] : DEWB_VERSION,
					true
				);
			}

			wp_enqueue_style(
				'dewb-blocks-global-style',
				trailingslashit( DEWB_URL ) . './build/global/global.css',
				array(),
				DEWB_VERSION
			);

			// modules.
			if ( file_exists( trailingslashit( DEWB_PATH ) . './build/modules/modules.asset.php' ) ) {
				$modules_dependency_file = include_once trailingslashit( DEWB_PATH ) . './build/modules/modules.asset.php';
			}

			if ( is_array( $modules_dependency_file ) && ! empty( $modules_dependency_file ) ) {
				wp_enqueue_script(
					'dewb-blocks-modules-script',
					trailingslashit( DEWB_URL ) . './build/modules/modules.js',
					isset( $modules_dependency_file['dependencies'] ) ? $modules_dependency_file['dependencies'] : array(),
					isset( $modules_dependency_file['version'] ) ? $modules_dependency_file['version'] : DEWB_VERSION,
					false
				);
			}
		}

		/**
		 * Enqueue Assets
		 *
		 * @return void
		 */
		public function enqueue_assets() {
			// Frontend assets.
		}
	}

	new Dewb_Enqueue_Assets(); // Initialize the class instance.
}
