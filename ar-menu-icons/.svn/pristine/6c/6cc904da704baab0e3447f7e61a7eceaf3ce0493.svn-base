<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class ARMICN {
	
    private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 */

	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {
		load_plugin_textdomain( 'ar-menu-icons' );
	}

	public function init() {

		// Add Plugin actions
		add_filter( 'plugin_action_links_' . ARMICN_PLUGIN_BASE, [ $this, 'armicn_plugin_action_links' ], 10, 4 );

	}

	function armicn_plugin_action_links( $plugin_actions, $plugin_file, $plugin_data, $context ) {

		$new_actions = array();
		$new_actions['armicn_plugin_actions_setting'] = '<a href="'.admin_url( 'admin.php?page=armicn-global-settings' ).'">Settings</a>';
		$new_actions['armicn_plugin_actions_upgrade'] = '<a href="'. esc_url( 'https://arsyntax.com/contact' ) .'" style="color: #39b54a; font-weight: bold;"  target="_blank">Upgrade to Pro</a>';

		return array_merge( $new_actions, $plugin_actions );

	}


}