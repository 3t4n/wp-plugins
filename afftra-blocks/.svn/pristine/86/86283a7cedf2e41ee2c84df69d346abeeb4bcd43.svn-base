<?php
/**
 * Afftra Blocks Registration
 *
 * @since 1.0.0
 * @package AfftraBlocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'AfftraBlocks_Registration' ) ) {

	/**
	 * Afftra Blocks Registration Class
	 *
	 * @since 1.0.0
	 * @package AfftraBlocks
	 */
	class AfftraBlocks_Registration {

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
			add_action( 'init', array( $this, 'register_blocks' ) );
		}

		/**
		 * Register Blocks
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function register_blocks() {

			// blocks list.
			$blocks = array(
				'button',
				'buttons',
				'heading',
				'rating',
				'pros-cons',
				'single-product'
			);

			if ( ! empty( $blocks ) and is_array( $blocks ) ) {
				foreach ( $blocks as $block ) {
					register_block_type( trailingslashit( AFFTRA_PLUGIN_DIR ) . '/build/blocks/' . $block );
				}
			}
		}
	}

}

	new AfftraBlocks_Registration(); // Initialize the class.
