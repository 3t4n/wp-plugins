<?php

namespace InsertCodes\Frontend;

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * Class Frontend.
 *
 * @since 1.0.0
 * @package InsertCodes\Frontend
 */
class Frontend {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'init' ), 1 );
	}

	/**
	 * Frontend init.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function init() {
		$header_priority = absint( get_option( 'insertcodes_header_priority', 10 ) );
		$body_priority   = absint( get_option( 'insertcodes_body_priority', 10 ) );
		$footer_priority = absint( get_option( 'insertcodes_footer_priority', 10 ) );

		add_action( 'wp_head', array( $this, 'insert_into_head' ), $header_priority );
		add_action( 'wp_body_open', array( $this, 'insert_into_body' ), $body_priority );
		add_action( 'wp_footer', array( $this, 'insert_into_footer' ), $footer_priority );
		add_filter( 'safe_style_css', array( $this, 'safe_styles' ) );
		add_filter( 'pre_kses', array( $this, 'normalize_entities' ), PHP_INT_MAX );
	}

	/**
	 * Insert codes into head.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function insert_into_head() {
		echo wp_kses( get_option( 'insertcodes_header' ), insertcodes_get_allowed_html() );
	}

	/**
	 * Insert codes into body.
	 * Codes will be printed just after opening the body.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function insert_into_body() {
		echo wp_kses( get_option( 'insertcodes_body' ), insertcodes_get_allowed_html() );
	}

	/**
	 * Insert codes into footer.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function insert_into_footer() {
		echo wp_kses( get_option( 'insertcodes_footer' ), insertcodes_get_allowed_html() );
	}

	/**
	 * Add allowed styles.
	 *
	 * @param array $styles Allowed styles.
	 *
	 * @since 1.1.0
	 * @return array
	 */
	public function safe_styles( $styles ) {
		$styles[] = 'display';
		$styles[] = 'visibility';

		return $styles;
	}

	/**
	 * Normalize entities.
	 *
	 * @param string $content Content.
	 *
	 * @since 1.1.0
	 * @return string
	 */
	public function normalize_entities( $content ) {
		return html_entity_decode( $content );
	}
}
