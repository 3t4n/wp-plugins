<?php

/**
 * Plugin Name: Hide Anything
 * Plugin URI:  https://wpmilitary.com/hide-anything
 * Description: Hide any element on any page.
 * Version:     1.0.2
 * Author:      WP Military
 * Author URI:  https://wpmilitary.com/
 * Text Domain: hide-anything
 * Domain Path: /languages/
 */

defined( 'ABSPATH' ) || exit();

define( 'HIDE_ANYTHING_VERSION', '1.0.2' );
define( 'HIDE_ANYTHING_FILE', __FILE__ );
define( 'HIDE_ANYTHING_PATH', dirname( HIDE_ANYTHING_FILE ) );
define( 'HIDE_ANYTHING_INCLUDES', HIDE_ANYTHING_PATH . '/includes' );
define( 'HIDE_ANYTHING_URL', plugin_dir_url( __FILE__ ) );
define( 'HIDE_ANYTHING_ASSETS', HIDE_ANYTHING_URL . 'assets' );


final class Hide_Anything {
	/** @var null */
	private static $instance = null;

	/**
	 * Hide_Anything constructor.
	 */
	public function __construct() {
		$this->includes();
		$this->init_hooks();

		register_activation_hook( HIDE_ANYTHING_FILE, [ $this, 'activation' ] );
	}

	public function activation() {
		include_once HIDE_ANYTHING_INCLUDES . '/class-install.php';
	}

	public function includes() {
	
		include_once HIDE_ANYTHING_INCLUDES . '/functions.php';
		include_once HIDE_ANYTHING_INCLUDES . '/class-enqueue.php';
		include_once HIDE_ANYTHING_INCLUDES . '/class-hooks.php';
		include_once HIDE_ANYTHING_INCLUDES . '/class-rest-api.php';

		if ( is_admin() ) {
			include_once HIDE_ANYTHING_INCLUDES . '/class-admin.php';
		}
	}

	/**
	 * Hook into actions and filters.
	 *
	 * @since 2.3
	 */
	private function init_hooks() {
		add_action( 'init', [ $this, 'localization_setup' ] );
	}

	public function localization_setup() {
		load_plugin_textdomain( 'hide-anything', false, dirname( plugin_basename( HIDE_ANYTHING_FILE ) ) . '/languages/' );
	}

	/**
	 * @return Hide_Anything|null
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}


function hide_anything() {
	Hide_Anything::instance();
}

hide_anything();