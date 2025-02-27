<?php 
/*
Plugin Name: WPTD Image Compare
Plugin URI: http://plugins.wpthemedevelopers.com/wptd-image-compare/
Description: WPTD Image Compare is advanced elementor image compare plugin. We provide horizontal and vertical image compare slider for user convenient.
Version: 1.2
Author: wpthemedevelopers
Author URI: https://wpthemedevelopers.com
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'WPTD_IMGC_DIR', plugin_dir_path( __FILE__ ) );
define( 'WPTD_IMGC_URL', plugin_dir_url( __FILE__ ) );

/*
* Intialize and Sets up the plugin
*/
class WPTD_Image_Compare {
	
	private static $_instance = null;
	
	public static $version = '1.0';
	
	/**
	* Sets up needed actions/filters for the plug-in to initialize.
	* @since 1.0.0
	* @access public
	* @return void
	*/
	public function __construct() {

		//WPTD Image Compare setup page
		add_action( 'plugins_loaded', array( $this, 'wptd_imgc_setup') );
		
		//WPTD Image Compare shortcodes
		add_action( 'init', array( $this, 'wptd_imgc_init_addons' ), 20 );
		
	}
	
	/**
	* Installs translation text domain
	* @since 1.0.0
	* @access public
	* @return void
	*/
	public function wptd_imgc_setup() {
		//Load text domain
		$this->wptd_imgc_load_domain();
	}
	
	/**
	 * Load plugin translated strings using text domain
	 * @since 1.0.0
	 * @access public
	 * @return void
	 */
	public function wptd_imgc_load_domain() {
		load_plugin_textdomain( 'wptd-image-compare', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/');
	}
		
	/**
	* Load required file for addons integration
	* @return void
	*/
	public function wptd_imgc_init_addons() {
		//Settings
		require_once ( WPTD_IMGC_DIR . 'admin/wptd-settings.php' );
		
		//Shortcodes
		require_once ( WPTD_IMGC_DIR . 'inc/class.elementor.settings.php' );
	}
	
	/**
	 * Creates and returns an instance of the class
	 * @since 2.6.8
	 * @access public
	 * return object
	 */
	public static function get_instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

}
WPTD_Image_Compare::get_instance();