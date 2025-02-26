<?php

namespace Soft_Accordion;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Integrations
 */
class Integrations {

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
		$this->includes();
	}

	/**
	 * Includes
	 */
	public function includes() {
		include_once SOFT_ACCORDION_INCLUDES . '/class-tinymce.php';
		include_once SOFT_ACCORDION_INCLUDES . '/blocks/class-blocks.php';

		if ( is_plugin_active( 'elementor/elementor.php' ) ) {
			include_once SOFT_ACCORDION_INCLUDES . '/class-elementor.php';
		}

		if ( is_plugin_active( 'woocommerce/woocommerce.php' ) && sa_fs()->can_use_premium_code__premium_only() ) {
			include_once SOFT_ACCORDION_INCLUDES . '/class-woocommarce.php';
		}
	}

	/**
	 * Get the instance of Integrations class.
	 *
	 * @since 1.0.0
	 * @return Integrations
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}

Integrations::instance();
