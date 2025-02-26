<?php
/**
 * Afmb Blocks Registration
 *
 * @since 1.0.0
 * @package Afmb-blocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Afmb_Registration' ) ) {

	/**
	 * Afmb Blocks Registration Class
	 *
	 * @since 1.0.0
	 * @package Afmb-blocks
	 */
	class Afmb_Registration {

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
				'top-pick',
				'progressbar',
				'progressbars',
			);

			if ( ! empty( $blocks ) and is_array( $blocks ) ) {
				foreach ( $blocks as $block ) {
					register_block_type( trailingslashit( AFMB_PLUGIN_DIR ) . '/build/blocks/' . $block );
				}
			}
		}
	}

}

	new Afmb_Registration(); // Initialize the class.
