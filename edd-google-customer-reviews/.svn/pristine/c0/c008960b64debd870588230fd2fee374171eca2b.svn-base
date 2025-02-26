<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       dcgws.com
 * @since      1.0.0
 *
 * @package    EDD_Google_Customer_Reviews
 * @subpackage EDD_Google_Customer_Reviews/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    EDD_Google_Customer_Reviews
 * @subpackage EDD_Google_Customer_Reviews/admin
 * @author     David Davis <david.davis@dcgws.com>
 */
class EDD_Google_Customer_Reviews_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since      1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	protected $google_merchant_id;
	
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		$screen = get_current_screen();
		if ( $screen->id == 'edd-google-customer-reviews-admin-display' ||(isset($_GET['page']) && $_GET['page'] == 'edd-google-customer-reviews-admin-display')){
			wp_register_style('font_awesome','//use.fontawesome.com/releases/v5.0.13/css/all.css');
            wp_enqueue_style('font_awesome');
			wp_register_style('aga_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
			wp_enqueue_style('aga_bootstrap');
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/edd-google-customer-reviews-admin.css', array(), $this->version, 'all' );	
		}
		

	}
	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		$screen = get_current_screen();
		if ( $screen->id == 'edd-google-customer-reviews-admin-display' ||(isset($_GET['page']) && $_GET['page'] == 'edd-google-customer-reviews-admin-display')){
			wp_register_script('popper_bootstrap', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js');
			wp_enqueue_script('popper_bootstrap');
			wp_register_script('aga_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js');
			wp_enqueue_script('aga_bootstrap');
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/edd-google-customer-reviews-admin.js', array( 'jquery' ), $this->version, false );
		}
		
	}
	
	/**
	 * Display Admin Page.
	 *
	 * @since    1.0.0
	 */
	public function display_admin_page() {
		add_menu_page(
			'EDD Google Customer Reviews',
			'EDD Google Customer Reviews',
			'NULL',
			'gcr',
			'',
			plugin_dir_url(__FILE__) . 'images/edd_ee_logo.png',
			26
		);
	}
	
	/**
	 * Display Tab page.
	 *
	 * @since    1.0.0
	 */
	public function add_new_menu(){
		add_submenu_page("gcr",
						 "EDD Google Customer Reviews",
						 "EDD Google Customer Reviews",
						 "manage_options",
						 "edd-google-customer-reviews-admin-display",
						 array($this,'showPage'),
						 99);
	}
	public function showPage() {
		require_once( 'panels/edd-google-customer-reviews-admin-display.php');
		if(!empty($_GET['tab'])){
			$get_action = $_GET['tab'];
		}
		else{
			$get_action = "general_settings";
		}
		if(method_exists($this, $get_action)) {
			$this->$get_action();
		}
		
	}
	
	public function general_settings() {
		require_once( 'panels/general-fields.php');
	}
	
	public function conversion_tracking() {
		require_once( 'panels/conversion-tracking.php');
	}
	
	public function google_optimize() {
		require_once( 'panels/google-optimize.php');
	}
	
	public function about_plugin() {
		require_once( 'panels/about-plugin.php');
	}
}
