<?php

class Wos_biawp 
{
	protected $loader;

	protected $plugin_name;

	protected $version;

	public function __construct() {
		if ( defined( 'WOS_BIAWP_VERSION' ) ) {
			$this->version = WOS_BIAWP_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'wos';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wos-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wos-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wos-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-wos-public.php';

		$this->loader = new Wos_biawp_Loader();

	}

	private function set_locale() {

		$plugin_i18n = new Wos_biawp_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	private function define_admin_hooks() {

		$plugin_admin = new Wos_biawp_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_menu', $plugin_admin, 'admin_menu' );
		$this->loader->add_action( 'admin_init', $plugin_admin, 'admin_init' );

	}

	private function define_public_hooks() {

		$plugin_public = new Wos_biawp_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		
		$this->loader->add_action( 'woocommerce_before_account_orders', $plugin_public, 'wos_woocommerce_before_account_orders' );
		$this->loader->add_filter( 'woocommerce_my_account_my_orders_query', $plugin_public, 'wos_woocommerce_my_account_my_orders_query' );

	}

	public function run() {
		$this->loader->run();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}

}
