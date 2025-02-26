<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Alley_Business_Toolkit
 * @subpackage Alley_Business_Toolkit/includes
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
 * @package    Alley_Business_Toolkit
 * @subpackage Alley_Business_Toolkit/includes
 * @author     # <a@gmail.com>
 */
class Alley_Business_Toolkit {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Alley_Business_Toolkit_Loader    $loader    Maintains and registers all hooks for the plugin.
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

	
	protected $plugin_full_name;

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
		if ( defined( 'ALLEY_BUSINESS_TOOLKIT_VERSION' ) ) {
			$this->version = ALLEY_BUSINESS_TOOLKIT_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'alley-business-toolkit';

		$this->load_dependencies();
		$this->set_locale();
		$pluginList = alley_business_toolkit_plugin_check_activated();

		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Alley_Business_Toolkit_Loader. Orchestrates the hooks of the plugin.
	 * - Alley_Business_Toolkit_i18n. Defines internationalization functionality.
	 * - Alley_Business_Toolkit_Admin. Defines all hooks for the admin area.
	 * - Alley_Business_Toolkit_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-alley-business-toolkit-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-alley-business-toolkit-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-alley-business-toolkit-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */

		

		require_once ALLEY_BUSINESS_TOOLKIT_PATH . 'admin/functions.php';
		require_once ALLEY_BUSINESS_TOOLKIT_PATH . 'admin/hooks.php';
		require_once ALLEY_BUSINESS_TOOLKIT_PATH . 'admin/abt-widgets.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-alley-business-toolkit-public.php';

		$this->loader = new Alley_Business_Toolkit_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Alley_Business_Toolkit_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Alley_Business_Toolkit_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	private function define_hooks() {

		$plugin_admin = alley_business_toolkit_hooks();

		$this->loader->add_action( 'admin_init', $plugin_admin, 'redirect' );
        $this->loader->add_action( 'advanced_import_demo_lists', $plugin_admin, 'add_demo_lists',999 );
        $this->loader->add_action( 'admin_menu', $plugin_admin, 'import_menu' );
        $this->loader->add_action( 'wp_ajax_alley_business_toolkit_getting_started', $plugin_admin, 'install_advanced_import' );
        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
        $this->loader->add_action( 'admin_init', $plugin_admin, 'admin_enqueue_styles' );
        // add_action( 'wp_enqueue_scripts', 'admin_enqueue_styles' );


	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Alley_Business_Toolkit_Admin( $this->get_plugin_name(), $this->get_version() );

		

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Alley_Business_Toolkit_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {

		if ( defined( 'ALLEY_BUSINESS_TOOLKIT_VERSION' ) ) {
			$this->version = ALLEY_BUSINESS_TOOLKIT_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'alley-business-toolkit';
		$this->plugin_full_name = esc_html__('Alley Business Toolkit','alley-business-toolkit');

		$this->load_dependencies();
		$this->set_locale();
		$pluginList = alley_business_toolkit_plugin_check_activated();

		if ( $pluginList == '1') {
			$this->define_hooks();
			$this->load_hooks();
		}
		else {
			add_action( 'admin_notices', array( $this, 'alley_business_toolkit_missing_notice' ) );
		}
	}

	public function load_hooks() {
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
	 * @return    Alley_Business_Toolkit_Loader    Orchestrates the hooks of the plugin.
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


	public function alley_business_toolkit_missing_notice() {

		
		$pluginList = alley_business_toolkit_plugin_check_activated();

		if($pluginList != '1'){

			$fileexists = alley_business_toolkit_plugin_file_exists();
			
			if( $fileexists == '1' ){
				$alley_business_toolkit_plugin = 'advanced-import/advanced-import.php'; 
				$activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $alley_business_toolkit_plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $alley_business_toolkit_plugin );
                $message = '<p>' . __( 'Alley Business Toolkit Demo Import Feature is not working because you need to activate Advanced Import Plugin.' ) . '</p>';

                $activate_msg = __( 'Activate Advanced Import Now' );
                $message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $activation_url, $activate_msg ) . '</p>';

                echo wp_kses_post('<div class="error"><p>' . $message . '</p></div>');
			}
		}
	}


	public function alley_business_toolkit_is_premium() {
		if ( abt_fs()->can_use_premium_code() ) {
			return true;
		}
	}

}
