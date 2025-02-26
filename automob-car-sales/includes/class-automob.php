<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       automob.co.za
 * @since      1.0.0
 *
 * @package    Automob
 * @subpackage Automob/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Automob
 * @subpackage Automob/includes
 * @author     Luke Madzedze <lukemadzedze@gmail.com>
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class Automob {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Automob_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'automob';
		$this->version = '1.0.0';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Automob_Loader. Orchestrates the hooks of the plugin.
	 * - Automob_i18n. Defines internationalization functionality.
	 * - Automob_Admin. Defines all hooks for the admin area.
	 * - Automob_Public. Defines all hooks for the public side of the site.
	 
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'model/class-automob-table-car.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'model/class-automob-table-page.php';
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'vendor/autoload.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'vendor/simpleimage/simpleimage.php';
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'vendor/webdevstudios/cmb2/init.php';
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-automob-template-manager.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-automob-loader.php';
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-automob-image-manager.php';
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-automob-i18n.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-automob-admin.php';
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-automob-subpages.php';		

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-automob-public.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-automob-metaboxes.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-automob-shortcodes.php';
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'search/class-automob-search-filter.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-automob-ajax.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-automob-ajax.php';



		$this->define_default_settings();
		
		$this->loader = new Automob_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Automob_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Automob_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Automob_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'init', $plugin_admin, 'register_car' );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'menu' );
		$this->loader->add_action( 'init', $plugin_admin, 'test');
		$this->loader->add_action( 'admin_init', $plugin_admin, 'register_settings' );
		$this->loader->add_action( 'add_meta_boxes',$plugin_admin, 'add_tabs' );
		$this->loader->add_action( 'manage_vehicles-for-sale_posts_custom_column',$plugin_admin, 'manage_vehicles_for_sale_columns', 10, 2 );
		$this->loader->add_filter( 'manage_edit-vehicles-for-sale_columns',$plugin_admin, 'edit_vehicles_for_sale_columns' ) ;
		
		
		
		$plugin_metaboxes = new Automob_Metaboxes();
		$this->loader->add_action( 'cmb2_init', $plugin_metaboxes, 'add_images_metabox' );
		$this->loader->add_action( 'cmb2_init', $plugin_metaboxes, 'add_showroom_ribbons_metabox' );
		$this->loader->add_action( 'cmb2_init', $plugin_metaboxes, 'add_specs_metabox' );
		$this->loader->add_action( 'cmb2_init', $plugin_metaboxes, 'add_pricing_metabox' );	
		
		
		$ajax_functions = new AutomobAjax();
		$this->loader->add_action(  'wp_ajax_am_save_vehicle', $ajax_functions, 'am_save_vehicle' );

	}


	private function define_shortcodes() 
	{
		$plugin_shortcodes = new Automob_Shortcode();
		$this->loader->add_shortcode( 'automob_vehicle_search_form', $plugin_shortcodes, 'car_search_func' );
		$this->loader->add_shortcode( 'automob_vehicle_inventory', $plugin_shortcodes, 'car_inventory_func' );
		$this->loader->add_shortcode( 'automob_vehicle_single', $plugin_shortcodes, 'car_single_func' );
	}

	private function define_ajax_funcs() 
	{
		$search = new Automob_Search_Filter();
		$this->loader->add_action( 'wp_ajax_search_filter_options', $search, 'search_filter_options' );
		$this->loader->add_action( 'wp_ajax_nopriv_search_filter_options',$search, 'search_filter_options' );

		$car_table = new Automob_Car_Table();
		$this->loader->add_action( 'wp_ajax_async_car_list', $car_table, 'async_car_list' );
		$this->loader->add_action( 'wp_ajax_nopriv_async_car_list',$car_table, 'async_car_list' );
		
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() 
	{

		$plugin_public = new Automob_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
	
		
		$this->define_shortcodes();
		$this->define_ajax_funcs(); 


		$ajax_functions = new AutomobPublicAjax();
		$this->loader->add_action(  'wp_ajax_am_send_email', $ajax_functions, 'am_send_email' );
		
		$template_loader  = new AutomobTemplateManager();
		$this->loader->add_action( 'init', $template_loader, 'init' );

	}

	private function define_default_settings() 
	{
		$currency_symbol  = get_option('currency_symbol');
		if (empty($currency_symbol))
		{
			update_option('currency_symbol', '$');
		}

		$max_vehicles  = get_option('max-vehicles');
		if (empty($max_vehicles))
		{
			update_option('max-vehicles', '9');
		}
		$show_sold_cars  = get_option('show-sold-cars');
		if (empty($show_sold_cars))
		{
			update_option('show-sold-cars',false);
		}
		$search_results_page  = get_option('search_results_page');
		if (empty($search_results_page))
		{
			update_option('search_results_page',0);
		}

		$distance_unit  = get_option('distance_unit');
		if (empty($distance_unit))
		{
			update_option('distance_unit',"km");
		}

		$decimal_separater  = get_option('decimal-separater');
		if (empty($decimal_separater))
		{
			update_option('decimal-separater',".");
		}

		$thousands_separater  = get_option('thousands_separater');
		if (empty($thousands_separater))
		{
			update_option('thousands_separater',",");
		}

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Automob_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
