<?php
namespace WP360view;

use \WP360view\Helper\Wp360view_Loader;
use \WP360view\Config\Wp360view_Config;
use \WP360view\Core\Wp360view_i18n;
use \WP360view\Admin\Wp360view_Admin;
use \WP360view\Frontend\Wp360view_Frontend; 

/**
 * Core class file to import all other classes 
 *
 * @package  WP360view
 * @version  1.0.0
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Wp360view_Run {

	/**
	 * Filter and actions of the plugin
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Wp360view_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	public $loader;

	/**
	 * Fired during plugin activation.
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Wp360view_Activator    $activator    Defines all code necessary to run during the plugin's activation.
	 */
	public $activator;

	/**
	 * Fired during plugin deactivation.
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      Wp360view_Deactivator    $deactivator    Defines all code necessary to run during the plugin's deactivation.
	 */
	public $deactivator;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	public $plugin_name = Wp360view_Config::PLUGIN_NAME;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version = Wp360view_Config::PLUGIN_VERSION; 
	 
	/**
	 * Min required WC version.
	 *
	 * @var string
	 */
	private $wc_min_version = Wp360view_Config::WC_MIN_PLUGIN_VERSION;

	/**
	 * The single instance of the class.
	 *
	 * @var WC_Wp360view
	 */
	protected static $_instance = null;

	/**
	 * Tab name for settings.
	 *
	 * @var WC_Wp360view
	 */
	protected $tab_name = Wp360view_Config::WC_TAB_NAME;
	
	/**
	 * @var $request
	 */
	protected $request;

	/**
	 * Main WC_Wp360view instance. Ensures only one instance is loaded or can be loaded - @see 'WC_Wp360view()'.
	 *
	 * @static
	 * @return  WC_Wp360view
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	} 
    
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0 
	 */
	public function __construct() {

		// Initialize object for actions and filters hooks
		$this->loader = new Wp360view_Loader();
  
		// Initialize languages translations 
		$this->set_locale_lang();

		// Load Admin Settings
		$admin_settings = new Wp360view_Admin();

		// Load Fronted Settings
		$frontend_settings = new Wp360view_Frontend(); 
 
	}      
	
	/**
	 * Wp360view_i18n class in order to set the domain
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale_lang() {

		$plugin_i18n = new Wp360view_i18n(); 

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'wp360view_load_plugin_textdomain' );
		
		$this->run();
	}

	/**
	 * Execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	} 
	  
}