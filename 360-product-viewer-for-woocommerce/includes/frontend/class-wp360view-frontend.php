<?php
namespace WP360view\Frontend;

use \WP360view\Config\Wp360view_Config; 
use \WP360view\Helper\Wp360view_Loader; 
use \WP360view\Frontend\Wp360view_Product_Detail;

/**
 * Fornted all actions and filters 
 * @since      1.0.0
 *
 * @package    WP360view
 * @subpackage WP360view\Frontend
 */

class Wp360view_Frontend {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name = Wp360view_Config::PLUGIN_NAME;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version = Wp360view_Config::PLUGIN_VERSION; 

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
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0 
	 */
	public function __construct() {	

		// Initialize object for actions and filters hooks

		$this->loader = new Wp360view_Loader(); 
		
		$product_details =  new Wp360view_Product_Detail();

		// Load product shortcode
		$product_shortcode = new Wp360view_Shortcode();

		$this->loader->add_filter( 'woocommerce_locate_template',  $this, 'wp360view_plugin_template', 1, 3 );	
 	
		$this->loader->run(); 

	}  
	
	/**
	 * Plugin template changes for locate_template
	 *
	 * @since  1.0.0
	 */
	public function wp360view_plugin_template( $template, $template_name, $template_path ) {

		global $woocommerce;
		$_template = $template;
		if ( ! $template_path ) 
			$template_path = $woocommerce->template_url;
	
		$plugin_path  = WP360VIEW_PLUGIN_DIR . '/templates/woocommerce/';
	
		// Look within passed path within the theme - this is priority
		$template = locate_template(
			array(
				$template_path . $template_name,
				$template_name
			)
		);
	
		if( ! $template && file_exists( $plugin_path . $template_name ) )
			$template = $plugin_path . $template_name;
		
		if ( ! $template )
			$template = $_template;

		return $template;

	}

	/**
	 * Register the stylesheets  
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() { 

		wp_enqueue_style( $this->plugin_name, WP360VIEW_PLUGIN_URL . 'css/custom.css', array(), $this->version, 'all' );
		 		
	}

	/**
	 * Register the js  .
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() { 
		 wp_enqueue_script( $this->plugin_name."_script", WP360VIEW_PLUGIN_URL . 'js/custom.js', array( 'jquery' ), $this->version, false );

	}

}
