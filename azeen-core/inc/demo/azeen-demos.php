<?php
/**
 * Plugin Name:			Azeen demo import
 * Plugin URI:			https://imonthemes.com/
 * Description:			Demo Import
 * Version:				  1.0
 * Author:				  imonthemes
 * Author URI:			https://imonthemes.com/
 *
 * @package Azeen_Core
 * @category Core
 * @author imonthemes
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns the main instance of Futurio_Extra to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object Azeen_Core
 */
function Azeen_Core_Demo() {
	return Azeen_Core_Demo ::instance();
} // End Futurio_Extra()

Azeen_Core_Demo();

/**
 * Main Azeen_Core Class
 *
 * @class Azeen_Core
 * @version	1.0.0
 * @since 1.0.0
 * @package	Azeen_Core
 */
final class Azeen_Core_Demo {
	/**
	 * Azeen_Core The single instance of Azeen_Core.
	 * @var 	object
	 * @access  private
	 * @since 	1.0.0
	 */
	private static $_instance = null;

	/**
	 * The token.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $token;

	/**
	 * The version number.
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $version;

	// Admin - Start
	/**
	 * The admin object.
	 * @var     object
	 * @access  public
	 * @since   1.0.0
	 */
	public $admin;

	/**
	 * Constructor function.
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function __construct() {
		$this->token 			= 'azeen-core';
		$this->plugin_url 		= plugin_dir_url( __FILE__ );
		$this->plugin_path 		= plugin_dir_path( __FILE__ );
		$this->version 			= '1.0.0';

		define( 'FE_URL', $this->plugin_url );
		define( 'FE_PATH', $this->plugin_path );
		define( 'FE_VERSION', $this->version );


		register_activation_hook( __FILE__, array( $this, 'install' ) );

		// Setup all the things
		add_action( 'init', array( $this, 'setup' ) );

	}

	/**
	 * Main Azeen_Core Instance
	 *
	 * Ensures only one instance of Futurio_Extra is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @static
	 * @see Azeen_Core()
	 * @return Main Azeen_Core instance
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) )
			self::$_instance = new self();
		return self::$_instance;
	} // End instance()

	/**
	 * Cloning is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __clone() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?' ), '1.0.0' );
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 1.0.0
	 */
	public function __wakeup() {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?' ), '1.0.0' );
	}

	/**
	 * Installation.
	 * Runs on activation.
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function install() {

	}



	/**
	 * Setup all the things.
	 * @return void
	 */
	public function setup() {
		$theme = wp_get_theme();

		if ( 'Azeen' == $theme->name || 'azeen' == $theme->template ) {

				require_once( FE_PATH .'/demos.php' );

		}
	}



} // End Class
