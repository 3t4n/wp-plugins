<?php

namespace Soft_Accordion;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * TinyMCE
 */
class TinyMCE {
	/**
	 * Instance of the class.
	 *
	 * @var self|null
	 */
	protected static $instance = null;

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		// classic editor button.
		add_action( 'media_buttons', array( $this, 'add_button' ), 20 );
	}

	/**
	 * Add Soft Accordion Button on the classic editor
	 */
	public function add_button() {
		if ( ! function_exists( 'get_current_screen' ) ) {
			return;
		}

		$screen = get_current_screen();

		if ( ! empty( $screen ) && ( 'post' !== $screen->base ) ) {
			return;
		}

		printf(
			'<a href="#" class="button" id="soft-accordion" title="%1$s"><img width="20" src="%2$s/assets/images/soft-accordion.svg" /> %1$s</a>',
			__( 'Soft Accordion', 'soft-accordion' ),
			SOFT_ACCORDION_URL
		);
	}

	/**
	 * Get the instance of TinyMCE class.
	 *
	 * @since 1.0.0
	 * @return TinyMCE
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}

TinyMCE::instance();
