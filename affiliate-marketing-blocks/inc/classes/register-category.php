<?php
/**
 * Afmb Blocks Category
 *
 * @since 1.0.0
 * @package Afmb-blocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Afmb_Category' ) ) {

	/**
	 * Afmb Blocks Category Class
	 *
	 * @since 1.0.0
	 * @package Afmb-blocks
	 */
	class Afmb_Category {

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
						'slug'  => 'afmb-blocks',
						'title' => __( 'Afftra Blocks', 'affiliate-marketing-blocks' ),
					),
				),
				$categories
			);
		}
	}

}

	new Afmb_Category(); // Initialize the category class.
