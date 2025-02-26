<?php

namespace Soft_Accordion;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Blocks
 */
class Blocks {

	/**
	 * Instance of the class
	 */
	protected static $instance = null;

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'register_blocks' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'block_editor_assets' ) );
	}

	/**
	 * Registers the block
	 */
	public function register_blocks() {
		register_block_type(
			__DIR__ . '/build/soft-accordion',
			array(
				'render_callback' => array( $this, 'render_soft_accordion_block' ),
			)
		);
	}

	/**
	 * Render blocks
	 *
	 * @param array $attributes shortcode id.
	 * @return string
	 */
	public function render_soft_accordion_block( $attributes ) {

		$id = ! empty( $attributes['id'] ) ? intval( $attributes['id'] ) : '';

		return sprintf( '<div>%s</div>', do_shortcode( "[soft_accordion id=$id]" ) );
	}

	/**
	 * Block Editor Assets
	 */
	public function block_editor_assets() {
		wp_enqueue_style( 'sa-animate', SOFT_ACCORDION_URL . '/assets/vendor/animate/animate.min.css', array(), SOFT_ACCORDION_VERSION );
		wp_enqueue_style( 'sa-frontend', SOFT_ACCORDION_URL . '/assets/css/frontend.css', array(), SOFT_ACCORDION_VERSION );
	}

	/**
	 * Get the instance of Block class.
	 *
	 * @since 1.0.0
	 * @return Block
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}

Blocks::instance();
