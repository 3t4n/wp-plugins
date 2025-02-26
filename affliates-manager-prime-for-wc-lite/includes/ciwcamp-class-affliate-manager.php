<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://codexinfra.com
 * @since      1.0.0
 *
 * @package    Ciwcamp_Affliate_Manager
 * @subpackage Ciwcamp_Affliate_Manager/includes
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
 * @package    Ciwcamp_Affliate_Manager
 * @subpackage Ciwcamp_Affliate_Manager/includes
 * @author     CodexInfra <developers@codexinfra.com>
 */
class Ciwcamp_Affliate_Manager {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Ciwcamp_Affliate_Manager_Loader    $ciwcamp_loader    Maintains and registers all hooks for the plugin.
	 */
	protected $ciwcamp_loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $ciwcamp_plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $ciwcamp_plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $ciwcamp_version    The current version of the plugin.
	 */
	protected $ciwcamp_version;

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
		if ( defined( 'CIWCAMP_AFFLIATE_MANAGER_VERSION' ) ) {
			$this->ciwcamp_version = CIWCAMP_AFFLIATE_MANAGER_VERSION;
		} else {
			$this->ciwcamp_version = '1.0.0';
		}
		$this->ciwcamp_plugin_name = 'affliate-manager';

		$this->ciwcamp_load_dependencies();
		$this->ciwcamp_set_locale();
		$this->ciwcamp_define_admin_hooks();
		$this->ciwcamp_define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Ciwcamp_Affliate_Manager_Loader. Orchestrates the hooks of the plugin.
	 * - Ciwcamp_Affliate_Manager_i18n. Defines internationalization functionality.
	 * - Ciwcamp_Affliate_Manager_Admin. Defines all hooks for the admin area.
	 * - Ciwcamp_Affliate_Manager_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function ciwcamp_load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/ciwcamp-class-affliate-manager-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/ciwcamp-class-affliate-manager-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/ciwcamp-class-affliate-manager-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/ciwcamp-class-affliate-manager-public.php';

		$this->ciwcamp_loader = new Ciwcamp_Affliate_Manager_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Ciwcamp_Affliate_Manager_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function ciwcamp_set_locale() {

		$ciwcamp_plugin_i18n = new Ciwcamp_Affliate_Manager_i18n();

		$this->ciwcamp_loader->ciwcamp_add_action( 'plugins_loaded', $ciwcamp_plugin_i18n, 'ciwcamp_load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function ciwcamp_define_admin_hooks() {

		$ciwcamp_plugin_admin = new Ciwcamp_Affliate_Manager_Admin( $this->ciwcamp_get_plugin_name(), $this->ciwcamp_get_version() );

		$this->ciwcamp_loader->ciwcamp_add_action( 'admin_enqueue_scripts', $ciwcamp_plugin_admin, 'ciwcamp_enqueue_styles' );

		$this->ciwcamp_loader->ciwcamp_add_action( 'admin_enqueue_scripts', $ciwcamp_plugin_admin, 'ciwcamp_enqueue_scripts' );

		$this->ciwcamp_loader->ciwcamp_add_action( 'admin_menu', $ciwcamp_plugin_admin, 'ciwcamp_custom_menu_cb' );

		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_monthly_visits_and_conversion_action', $ciwcamp_plugin_admin, 'ciwcamp_monthly_visits_and_conversion_cb' );

		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_monthly_sales_and_commission_action', $ciwcamp_plugin_admin, 'ciwcamp_monthly_sales_and_commission_cb' );
		
		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_monthly_affiliate_registration_action', $ciwcamp_plugin_admin, 'ciwcamp_monthly_affiliate_registration_cb' );
		
		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_affiliates_list_action', $ciwcamp_plugin_admin, 'ciwcamp_affiliates_list_cb' );

		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_create_affiliate_action', $ciwcamp_plugin_admin, 'ciwcamp_create_new_affiliate_cb' );

		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_change_affiliate_status_action', $ciwcamp_plugin_admin, 'ciwcamp_change_affiliate_status_cb' );
		
		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_delete_affiliate_action', $ciwcamp_plugin_admin, 'ciwcamp_ciwcamp_delete_affiliate_cb' );

		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_affiliate_details_action', $ciwcamp_plugin_admin, 'ciwcamp_affiliate_details_cb' );

		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_update_affiliate_action', $ciwcamp_plugin_admin, 'ciwcamp_update_affiliate_cb' );

		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_an_affliate_sales_list_action', $ciwcamp_plugin_admin, 'ciwcamp_an_affliate_sales_list_cb' );
		
		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_affiliate_withdraw_list_action', $ciwcamp_plugin_admin, 'ciwcamp_affiliate_withdraw_list_cb' );

		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_withdraw_request_list_action', $ciwcamp_plugin_admin, 'ciwcamp_withdraw_request_list_cb' );
		
		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_approve_withdraw_action', $ciwcamp_plugin_admin, 'ciwcamp_approve_withdraw_cb' );
		
		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_reject_withdraw_action', $ciwcamp_plugin_admin, 'ciwcamp_reject_withdraw_cb' );

		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_withdraw_delete_action', $ciwcamp_plugin_admin, 'ciwcamp_withdraw_delete_cb' );
		
		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_sales_list_action', $ciwcamp_plugin_admin, 'ciwcamp_sales_list_cb' );
		
		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_approve_sale_action', $ciwcamp_plugin_admin, 'ciwcamp_approve_sale_cb' );

		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_reject_sale_action', $ciwcamp_plugin_admin, 'ciwcamp_reject_sale_cb' );

		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_delete_sale_action', $ciwcamp_plugin_admin, 'ciwcamp_delete_sale_cb' );
		
		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_commission_setting_action', $ciwcamp_plugin_admin, 'ciwcamp_commission_setting_cb' );
		
		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_setting_action', $ciwcamp_plugin_admin, 'ciwcamp_admin_setting_cb' );
		
		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_save_bank_transfer_details_action', $ciwcamp_plugin_admin, 'ciwcamp_save_bank_transfer_details_cb');
		
		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_save_cash_transfer_details_action', $ciwcamp_plugin_admin, 'ciwcamp_save_cash_transfer_details_cb');
	
		$this->ciwcamp_loader->ciwcamp_add_action( 'woocommerce_order_status_changed', $ciwcamp_plugin_admin, 'ciwcamp_affiliate_sales_amount_transfer_cb' , 10, 3);
		
		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_affiliate_status_count_action', $ciwcamp_plugin_admin, 'ciwcamp_affiliate_status_count_cb' );

		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_a_generate_password_action', $ciwcamp_plugin_admin, 'ciwcamp_a_generate_password_cb' );
		
		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_current_active_action', $ciwcamp_plugin_admin, 'ciwcamp_current_active_cb' );
		
	} 
  
	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function ciwcamp_define_public_hooks() {

		$ciwcamp_plugin_public = new Ciwcamp_Affliate_Manager_Public( $this->ciwcamp_get_plugin_name(), $this->ciwcamp_get_version() );

		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_enqueue_scripts', $ciwcamp_plugin_public, 'ciwcamp_enqueue_styles' );

		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_enqueue_scripts', $ciwcamp_plugin_public, 'ciwcamp_enqueue_scripts' );

		$this->ciwcamp_loader->ciwcamp_add_action( 'woocommerce_register_form_start', $ciwcamp_plugin_public, 'ciwcamp_add_register_fields_upside_cb' );

		$this->ciwcamp_loader->ciwcamp_add_action( 'woocommerce_register_form', $ciwcamp_plugin_public, 'ciwcamp_add_register_fields_downside_cb' );

		$this->ciwcamp_loader->ciwcamp_add_action( 'woocommerce_register_post', $ciwcamp_plugin_public, 'ciwcamp_register_validation_cb', 10, 3);

		$this->ciwcamp_loader->ciwcamp_add_action( 'woocommerce_created_customer', $ciwcamp_plugin_public, 'ciwcamp_account_registration_cb');

		$this->ciwcamp_loader->ciwcamp_add_filter( 'woocommerce_get_endpoint_url', $ciwcamp_plugin_public, 'ciwcamp_affiliate_dashboard_hook_endpoint', 10, 4);

		$this->ciwcamp_loader->ciwcamp_add_filter( 'theme_page_templates', $ciwcamp_plugin_public, 'ciwcamp_custom_template', 10, 4);

		$this->ciwcamp_loader->ciwcamp_add_filter( 'template_include', $ciwcamp_plugin_public, 'ciwcamp_redirect_page_template', 10, 1);

		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_affiliate_dashboard_count_action', $ciwcamp_plugin_public, 'ciwcamp_affiliate_dashboard_count_cb' );
		
		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_affiliate_sales_and_visits_action', $ciwcamp_plugin_public, 'ciwcamp_affiliate_sales_and_visits_cb');

		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_my_earnings_action', $ciwcamp_plugin_public, 'ciwcamp_my_earnings_cb');
		
		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_sale_list_action', $ciwcamp_plugin_public, 'ciwcamp_sale_list_cb');

		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_earnings_list_action', $ciwcamp_plugin_public, 'ciwcamp_earnings_list_cb');

		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_affiliate_withdraw_request_list_action', $ciwcamp_plugin_public, 'ciwcamp_affiliate_withdraw_request_list_cb');
		
		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_withdraw_amt_req_action', $ciwcamp_plugin_public, 'ciwcamp_withdraw_amt_req_cb');
		
		$this->ciwcamp_loader->ciwcamp_add_action( 'init', $ciwcamp_plugin_public, 'ciwcamp_get_referral_url');

		$this->ciwcamp_loader->ciwcamp_add_action( 'wp_ajax_ciwcamp_save_affiliate_profile_action', $ciwcamp_plugin_public, 'ciwcamp_save_affiliate_profile_cb' );
		
		$this->ciwcamp_loader->ciwcamp_add_action( 'woocommerce_thankyou', $ciwcamp_plugin_public, 'ciwcamp_get_order_details', 10, 1);

		
		
	} 
	 
	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function ciwcamp_run() {
		$this->ciwcamp_loader->ciwcamp_run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function ciwcamp_get_plugin_name() {
		return $this->ciwcamp_plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Affliate_Manager_Loader    Orchestrates the hooks of the plugin.
	 */
	public function ciwcamp_get_loader() {
		return $this->ciwcamp_loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function ciwcamp_get_version() {
		return $this->ciwcamp_version;
	}

}
