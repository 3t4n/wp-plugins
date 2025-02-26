<?php
/**
 * Afftra Blocks Category
 *
 * @since 1.0.0
 * @package AfftraBlocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'AfftraBlocks_Category' ) ) {

	/**
	 * Afftra Blocks Category Class
	 *
	 * @since 1.0.0
	 * @package AfftraBlocks
	 */
	class AfftraBlocks_Category {

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
			add_filter( 'block_categories_all', array( $this, 'register_category' ), 10, 2 );
		}

		/**
		 * Register Category
		 *
		 * @since 1.0.0
		 * @return void
		 */
		public function register_category( $categories ) {
			return array_merge(
				array(
					array(
						'slug'  => 'afftra-blocks',
						'title' => __( 'Afftra Blocks', 'afftra-blocks' ),
					),
				),
				$categories
			);
		}
	}

}

	new AfftraBlocks_Category(); // Initialize the category class.
