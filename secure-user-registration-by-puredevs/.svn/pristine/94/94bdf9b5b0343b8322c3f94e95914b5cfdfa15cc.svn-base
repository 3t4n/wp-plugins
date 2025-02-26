<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://puredevs.com
 * @since      1.0.0
 *
 * @package    Secure_User_Registration_by_PureDevs
 * @subpackage Secure_User_Registration_by_PureDevs/includes
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
 * @package    Secure_User_Registration_by_PureDevs
 * @subpackage Secure_User_Registration_by_PureDevs/includes
 * @author     puredevs <admin@puredevs.com>
 */
class Pdsrw_Secure_User_Registration_by_PureDevs {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Secure_User_Registration_by_PureDevs_Loader    $loader    Maintains and registers all hooks for the plugin.
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
		if ( defined( 'PDSRW_VERSION' ) ) {
			$this->version = PDSRW_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'secure-user-registration-by-puredevs';

		$this->pdsrw_load_dependencies();
		$this->pdsrw_set_locale();
		$this->pdsrw_define_admin_hooks();
		$this->pdsrw_define_public_hooks();
		add_filter( 'plugin_action_links_'.PDSRW_PLUGIN_BASENAME, array( $this, 'pdsrw_add_plugin_page_settings_link' ) );
	}
	
	/**
     * Show action links on the plugin screen.
     *
     * @param mixed $links Plugin Action links.
     *
     * @return array
     */

    public function pdsrw_add_plugin_page_settings_link( $links ) {
        $links[] = '<a href="' .
            admin_url( 'admin.php?page=secure-user-registration-by-puredevs-settings' ) .
            '">' . esc_html__('Settings', 'secure-user-registration-by-puredevs') . '</a>';
        return $links;
    }

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Secure_User_Registration_by_PureDevs_Loader. Orchestrates the hooks of the plugin.
	 * - Secure_User_Registration_by_PureDevs_i18n. Defines internationalization functionality.
	 * - Secure_User_Registration_by_PureDevs_Admin. Defines all hooks for the admin area.
	 * - Secure_User_Registration_by_PureDevs_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function pdsrw_load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-secure-user-registration-by-puredevs-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-secure-user-registration-by-puredevs-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-secure-user-registration-by-puredevs-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-secure-user-registration-by-puredevs-public.php';

		$this->loader = new Pdsrw_Secure_User_Registration_by_PureDevs_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Secure_User_Registration_by_PureDevs_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function pdsrw_set_locale() {

		$plugin_i18n = new Pdsrw_Secure_User_Registration_by_PureDevs_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'pdsrw_load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function pdsrw_define_admin_hooks() {

		$plugin_admin = new Pdsrw_Secure_User_Registration_by_PureDevs_Admin( $this->pdsrw_get_plugin_name(), $this->pdsrw_get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'pdsrw_enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'pdsrw_enqueue_scripts' );
		
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'pdsrw_safe_registration_settings_page' );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'pdsrw_safe_registration_settings_fields' );
		$this->loader->add_action( 'current_screen', $plugin_admin, 'pdsrw_kses_allowed_html_tags' );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function pdsrw_define_public_hooks() {

		$plugin_public = new Pdsrw_Secure_User_Registration_by_PureDevs_Public( $this->pdsrw_get_plugin_name(), $this->pdsrw_get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'pdsrw_enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'pdsrw_enqueue_scripts' );
		
		$_protect_registration = get_option( 'pdsrw_protect_registration' );
		if(empty($_protect_registration)){
			$_protect_registration = array('registrationfrm');
		}
		if(!empty($_protect_registration) && in_array('registrationfrm', $_protect_registration)){
			$this->loader->add_action( 'login_enqueue_scripts', $plugin_public, 'pdsrw_add_recaptcha_scripts' );
			$this->loader->add_action( 'register_form', $plugin_public, 'pdsrw_add_register_form_recaptcha_field' );
			$this->loader->add_action( 'register_post', $plugin_public, 'pdsrw_register_form_validate_fields', 99, 3 );
		}
		if(!empty($_protect_registration) && in_array('wooocommerceregistrationfrm', $_protect_registration)){
			$this->loader->add_action( 'wp_head', $plugin_public, 'pdsrw_add_recaptcha_scripts' );
			$this->loader->add_action( 'woocommerce_register_form', $plugin_public, 'pdsrw_add_register_form_recaptcha_field' );
			$this->loader->add_action( 'woocommerce_register_post', $plugin_public, 'pdsrw_register_form_validate_fields', 9, 3 );
		}

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function pdsrw_run() {
		$this->loader->pdsrw_run_loader();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function pdsrw_get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Secure_User_Registration_by_PureDevs_Loader    Orchestrates the hooks of the plugin.
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
	public function pdsrw_get_version() {
		return $this->version;
	}

}
