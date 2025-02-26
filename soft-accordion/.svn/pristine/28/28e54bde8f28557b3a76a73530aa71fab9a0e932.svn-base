<?php

namespace Soft_Accordion;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Base class
 */
final class Base {

	/**
	 * Instance of the class.
	 *
	 * @var self|null
	 */
	protected static $instance = null;

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheating huh?', 'soft-accordion' ), '1.0.0' );
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheating huh?', 'soft-accordion' ), '1.0.0' );
	}

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		register_activation_hook( SOFT_ACCORDION_FILE, array( $this, 'soft_accordion_activation' ) );
		register_deactivation_hook( SOFT_ACCORDION_FILE, array( $this, 'soft_accordion_deactivate' ) );
		$this->includes();
		$this->init_hooks();
	}

	/**
	 * Activation
	 */
	public function soft_accordion_activation() {

		if ( ! class_exists( 'Soft_Accordion_Install' ) ) {
			include_once SOFT_ACCORDION_INCLUDES . '/class-install.php';
		}

		Install::activate();
	}

	/**
	 * Deactivation
	 */
	public function soft_accordion_deactivate() {

		if ( ! class_exists( 'Soft_Accordion_Install' ) ) {
			include_once SOFT_ACCORDION_INCLUDES . '/class-install.php';
		}

		Install::deactivate();
	}

	/**
	 * Includes
	 */
	public function includes() {
		include_once SOFT_ACCORDION_INCLUDES . '/functions.php';
		include_once SOFT_ACCORDION_INCLUDES . '/class-enqueue.php';
		include_once SOFT_ACCORDION_INCLUDES . '/class-ajax.php';
		include_once SOFT_ACCORDION_INCLUDES . '/class-hooks.php';
		include_once SOFT_ACCORDION_INCLUDES . '/class-shortcode.php';

		include_once SOFT_ACCORDION_INCLUDES . '/class-integrations.php';

		if ( is_admin() ) {
			include_once SOFT_ACCORDION_INCLUDES . '/class-admin.php';
		}
	}

	/**
	 * Hooks
	 */
	public function init_hooks() {
		add_action( 'plugins_loaded', array( $this, 'load_text_domain' ) );
		add_filter(
			'plugin_action_links_' . plugin_basename( SOFT_ACCORDION_FILE ),
			array(
				$this,
				'add_action_links',
			)
		);
	}

	/**
	 * Load Text Domain
	 **/
	public function load_text_domain() {
		load_plugin_textdomain( 'soft-accordion', false, dirname( plugin_basename( SOFT_ACCORDION_FILE ) ) . '/languages' );
	}

	/**
	 * Add action links
	 *
	 * @param array $links Plugin action links.
	 *
	 * @return array
	 */
	public function add_action_links( $links ) {
		$settings_link = sprintf(
			'<a href="%s">%s</a>',
			esc_url( admin_url( 'admin.php?page=soft-accordion' ) ),
			esc_html__( 'Add Accordion', 'soft-accordion' )
		);

		array_unshift( $links, $settings_link );

		return $links;
	}

	/**
	 * Get the instance of Base class.
	 *
	 * @since 1.0.0
	 * @return Base
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}

Base::instance();
