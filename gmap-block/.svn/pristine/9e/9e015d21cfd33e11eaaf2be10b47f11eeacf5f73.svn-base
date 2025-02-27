<?php
/**
 * Gmap Blocks - Generate Dynamic Styles
 *
 * @since 1.0.0
 * @package GmapBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Gmap_Block_Dynamic_Style' ) ) {

	/**
	 * Gmap Blocks Dynamic Style Class
	 *
	 * @since 1.0.0
	 * @package GmapBlock
	 */
	class Gmap_Block_Dynamic_Style {


		private $dynamic_styles = '';

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
			add_filter( 'render_block', array( $this, 'generate_dynamic_styles' ), 10, 2 );

			// Enqueue Dynamic Styles
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_dynamic_styles' ) );
		}

		/**
		 * Generate Dynamic Styles
		 *
		 * @since 1.0.0
		 * @param string $block_content Block Content.
		 * @param array  $block Block Attributes.
		 * @return string
		 */
		public function generate_dynamic_styles( $block_content, $block ) {
			if ( isset( $block['blockName'] ) && str_contains( $block['blockName'], 'gmap/' ) ) {
				if ( isset( $block['attrs']['blockStyle'] ) ) {
					$style = $block['attrs']['blockStyle'];
					$this->enqueue_dynamic_styles( $style );
				}
			}
			return $block_content;
		}

		/**
		 * Enqueue Dynamic Styles
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		public function enqueue_dynamic_styles( $style ) {
			if ( ! empty( $style ) ) {
				$handle = 'gmap-block-inline-style-' . wp_rand( 100, 10000 );
				wp_register_style( $handle, false, array(), GMAP_VERSION, 'all' );
				wp_enqueue_style( $handle, false, array(), GMAP_VERSION, 'all' );
				wp_add_inline_style( $handle, $style );
			}
		}
	}

	new Gmap_Block_Dynamic_Style(); // Initialize the Dynamic Style class.
}

