<?php

/**
 * The core plugin class.
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @since      1.0.0
 * @package    TyresAddict/TCM
 * @subpackage TyresAddict/TCM/includes
 * @author     TyresAddict
 * @link       http://b2b.tyresaddict.com
 */

namespace TyresAddict\TCM;



class Plugin
{
	const title 	= \TyresAddictWooTyreCustomMetadataPluginVer::title;
	const name 		= \TyresAddictWooTyreCustomMetadataPluginVer::name;
	const lang 		= \TyresAddictWooTyreCustomMetadataPluginVer::lang;
	const code 		= \TyresAddictWooTyreCustomMetadataPluginVer::code;
	const version 	= \TyresAddictWooTyreCustomMetadataPluginVer::version;
	const prefix 	= \TyresAddictWooTyreCustomMetadataPluginVer::name . '-';
	const features 	= \TyresAddictWooTyreCustomMetadataPluginVer::features;

	// The loader that's responsible for maintaining and registering all hooks that power the plugin.
	protected $loader;
	protected $_features = [];	

	protected $page_options = null;	


	// singleton

	protected static $instance;

	public static function get_instance() {
		if ( is_null( static::$instance ) ) {
			static::$instance = new static;
			static::$instance->run();			// run loader
		}
		return static::$instance;
	}
	

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 */
	public function __construct() 
	{
		$this->load_dependencies();

		PluginI18n::textdomains();

		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - PluginLoader. Orchestrates the hooks of the plugin.
	 * - PluginI18n. Defines internationalization functionality.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() 
	{
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/PluginLoader.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/PluginI18n.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/PluginPublic.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/Woo.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/DB.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/PluginOptions.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/PageOptions.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/FeatureWheels.php';

		foreach( Plugin::features as $feature )
		{
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/' . $feature . '.php';

			$feature_class = __NAMESPACE__ . "\\" . $feature;
			$this->_features[ $feature ] = new $feature_class();
		}

		$this->loader = new PluginLoader();
	}

	// Register all of the hooks related to the admin area functionality

	private function define_admin_hooks() 
	{
		$this->loader->add_action( 'admin_enqueue_scripts', $this, 'admin_enqueue_css');

		$this->page_options = new PageOptions();
	}

	public function admin_enqueue_css() 
	{
		wp_enqueue_style( Plugin::name, plugins_url() . '/' . Plugin::name . '/public/css/tcm-admin-style.css', [], Plugin::version, 'all' );
	}


	// Register all of the hooks related to the public-facing functionality

	private function define_public_hooks() 
	{
		$this->plugin_public = new PluginPublic();

		foreach( $this->_features as $feature => $feature_class ) 
		{
		    if ( method_exists( $feature_class, 'enqueue_styles' ) )
				$this->loader->add_action( 'wp_enqueue_scripts', $feature_class, 'enqueue_styles' );

		    if ( method_exists( $feature_class, 'woocommerce_product_meta_end' ) )
				$this->loader->add_action( 'woocommerce_product_meta_end', $feature_class, 'woocommerce_product_meta_end' );

		    if ( method_exists( $feature_class, 'woocommerce_display_product_attributes' ) )
				$this->loader->add_filter( 'woocommerce_display_product_attributes', $feature_class, 'woocommerce_display_product_attributes', 10, 2 );
		}
	}

	public function run() {
		$this->loader->run();

		foreach( Plugin::features as $feature )
		{
		    if ( method_exists( $this->_features[ $feature ], 'run' ) )
				$this->_features[ $feature ]->run();
		}
	}

	public function get_loader() {
		return $this->loader;
	}

}

