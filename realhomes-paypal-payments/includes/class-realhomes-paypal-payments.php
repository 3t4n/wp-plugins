<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @since      1.0.0
 * @package    realhomes-paypal-payments
 * @subpackage realhomes-paypal-payments/includes
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
 */
class Realhomes_Paypal_Payments {

	/**
	 * The paypal handler that's responsible for handling all paypal payments related tasks in
	 * the plugin.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    Realhomes_Paypal_Payments_Handler $paypal Handls all paypal payments related tasks.
	 */
	protected $paypal;

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    Realhomes_Paypal_Payments_Loader $loader Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $plugin_name The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $version The current version of the plugin.
	 */
	protected $version;

	/**
	 * Stores the plugin settings.
	 *
	 * This variable holds an array of the plugin's settings.
	 *
	 * @since    2.0.4
	 * @access   protected
	 * @var      array    $settings  Plugin settings.
	 */
	protected $settings;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		// Setting the plugin current version.
		if ( defined( 'REALHOMES_PAYPAL_PAYMENTS_VERSION' ) ) {
			$this->version = REALHOMES_PAYPAL_PAYMENTS_VERSION;
		} else {
			$this->version = '1.0.0';
		}

		// Setting the plugin unique identifire.
		if ( defined( 'REALHOMES_PAYPAL_PAYMENTS_NAME' ) ) {
			$this->plugin_name = REALHOMES_PAYPAL_PAYMENTS_NAME;
		} else {
			$this->plugin_name = 'realhomes-paypal-payments';
		}

		$this->settings = get_option( 'rpp_settings' );

		add_action( 'admin_notices', array( $this, 'paypal_api_keys_notice' ) );

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
	 * - Realhomes_Paypal_Payments_Loader. Orchestrates the hooks of the plugin.
	 * - Realhomes_Paypal_Payments_i18n. Defines internationalization functionality.
	 * - Realhomes_Paypal_Payments_Admin. Defines all hooks for the admin area.
	 * - Realhomes_Paypal_Payments_Public. Defines all hooks for the public side of the site.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-realhomes-paypal-payments-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-realhomes-paypal-payments-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-realhomes-paypal-payments-admin.php';

		/**
		 * The class responsible for realhomes paypal payments settings.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-realhomes-paypal-payments-settings.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-realhomes-paypal-payments-public.php';

		/**
		 * The class responsible for defining all actions that occur in the paypal payment
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-realhomes-paypal-payments-handler.php';

		$this->loader = new Realhomes_Paypal_Payments_Loader();
	}

	/**
	 * Displays a warning notice on the admin screen if PayPal API keys are missing.
	 *
	 * This function checks if the PayPal payment gateway is enabled and verifies whether both the client ID and secret ID are provided.
	 * If either of the keys is missing, a dismissible warning notice is shown to the admin, prompting them to complete the PayPal configuration.
	 *
	 * @since 2.0.4
	 *
	 * @return void
	 */
	public function paypal_api_keys_notice() {
		$rpp_settings = $this->settings;

		// Check if PayPal is enabled and if either the client ID or secret ID is missing
		if ( ! empty( $rpp_settings['enable_paypal'] ) && ( empty( $rpp_settings['client_id'] ) || empty( $rpp_settings['secret_id'] ) ) ) {

			// Display a dismissible warning notice about missing PayPal API keys
			?>
            <div class="notice notice-warning is-dismissible">
                <p>
					<?php
					printf(
						esc_html__( '%1$sPayPal API Keys%2$s are missing in %1$sEasy Real Estate > PayPal Settings%2$s. Please provide the missing key(s) to ensure the plugin functions correctly on the site.', 'realhomes-paypal-payments' ),
						'<strong>',
						'</strong>'
					);
					?>
                </p>
            </div>
			<?php
		}
	}


	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Realhomes_Paypal_Payments_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Realhomes_Paypal_Payments_i18n();

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

		// Adding action links to admin plugins list page
		add_filter( 'plugin_action_links_' . REALHOMES_PAYPAL_PAYMENTS_PLUGIN_BASENAME, [ $this, 'plugin_action_links' ] );

		$plugin_settings = new Realhomes_Paypal_Payments_settings();
		$this->loader->add_action( 'admin_init', $plugin_settings, 'register_settings' );
		$this->loader->add_action( 'admin_menu', $plugin_settings, 'settings_page_menu' );

		$plugin_admin = new Realhomes_Paypal_Payments_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

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
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		if ( rpp_is_enabled() && rpp_is_dashboard_properties_page() ) {

			$plugin_public = new Realhomes_Paypal_Payments_Public( $this->get_plugin_name(), $this->get_version() );
			$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
			$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		}

	}

	/**
	 * Plugin action links.
	 *
	 * Adds action links to the plugin list table
	 *
	 * Fired by `plugin_action_links` filter.
	 *
	 * @since 2.0.2
	 *
	 * @param array $links An array of plugin action links.
	 *
	 * @return array An array of plugin action links.
	 */
	public function plugin_action_links( $links ) {
		$settings_link      = sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'admin.php?page=realhomes-paypal-settings' ), esc_html__( 'Settings', 'realhomes-paypal-payments' ) );
		$documentation_link = sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://realhomes.io/documentation/realhomes-paypal-payments/', esc_html__( 'Documentation', 'realhomes-paypal-payments' ) );

		array_unshift( $links, $settings_link, $documentation_link );

		return $links;
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
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    object Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}
}

if ( ! function_exists( 'rpp_is_enabled' ) ) {
	/**
	 * Check if RealHomes PayPal Payments functionality is enabled.
	 *
	 * @return bool
	 */
	function rpp_is_enabled() {

		$rpp_settings = get_option( 'rpp_settings' );
		if ( ! empty( $rpp_settings['enable_paypal'] ) &&
			! empty( $rpp_settings['client_id'] ) &&
			! empty( $rpp_settings['secret_id'] ) &&
			! empty( $rpp_settings['payment_amount'] ) &&
			! empty( $rpp_settings['currency_code'] ) &&
			! empty( $rpp_settings['redirect_page_url'] )
		) {
			return true;
		}

		return false;
	}
}

if ( ! function_exists( 'rpp_is_dashboard_properties_page' ) ) {
	/**
	 * Check if current page is front-end dashboard properties in a logical way.
	 *
	 * @return bool
	 */
	function rpp_is_dashboard_properties_page() {

		if ( 'true' === get_option( 'inspiry_properties_module_display' ) &&
			! empty( $_GET['module'] ) &&
			'properties' === $_GET['module'] &&
			( ! isset( $_GET['submodule'] ) || 'submit-property' !== $_GET['submodule'] ) &&
			( ! isset( $_GET['status'] ) || 'publish' !== $_GET['status'] ) ) {
			return true;
		}

		return false;
	}
}