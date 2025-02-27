<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.fredericgilles.net/fg-opencart-to-woocommerce/
 * @since 1.0.0
 *
 * @package    FG_OpenCart_to_WooCommerce
 * @subpackage FG_OpenCart_to_WooCommerce/includes
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
 * @since 1.0.0
 * @package    FG_OpenCart_to_WooCommerce
 * @subpackage FG_OpenCart_to_WooCommerce/includes
 * @author     Frédéric GILLES
 */
class FG_OpenCart_to_WooCommerce {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @access   protected
	 * @var      FG_OpenCart_to_WooCommerce_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
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
	 */
	public function __construct() {

		if ( defined( 'FGOC2WC_PLUGIN_VERSION' ) ) {
			$this->version = FGOC2WC_PLUGIN_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'fg-opencart-to-woocommerce';

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
	 * - FG_OpenCart_to_WooCommerce_Loader. Orchestrates the hooks of the plugin.
	 * - FG_OpenCart_to_WooCommerce_i18n. Defines internationalization functionality.
	 * - FG_OpenCart_to_WooCommerce_Admin. Defines all hooks for the admin area.
	 * - FG_OpenCart_to_WooCommerce_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-fg-opencart-to-woocommerce-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-fg-opencart-to-woocommerce-i18n.php';

		// Load Importer API
		require_once ABSPATH . 'wp-admin/includes/import.php';
		if ( !class_exists( 'WP_Importer' ) ) {
			$class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
			if ( file_exists( $class_wp_importer ) ) {
				require_once $class_wp_importer;
			}
		}

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-opencart-to-woocommerce-admin.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-fg-opencart-to-woocommerce-tools.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-opencart-to-woocommerce-modules-check.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-opencart-to-woocommerce-progressbar.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-opencart-to-woocommerce-debug-info.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-opencart-to-woocommerce-download.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-opencart-to-woocommerce-download-fs.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-opencart-to-woocommerce-download-ftp.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-opencart-to-woocommerce-download-http.php';

		/**
		 *  FTP functions
		 */
		require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-base.php';
		require_once ABSPATH . 'wp-admin/includes/class-wp-filesystem-ftpext.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fg-opencart-to-woocommerce-ftp.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */

		$this->loader = new FG_OpenCart_to_WooCommerce_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the FG_OpenCart_to_WooCommerce_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new FG_OpenCart_to_WooCommerce_i18n();
		$plugin_i18n->set_domain( $this->get_plugin_name() );
		$plugin_i18n->load_plugin_textdomain();

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @access   private
	 */
	private function define_admin_hooks() {

		// Add links to the plugin page
		$this->loader->add_filter( 'plugin_action_links_fg-opencart-to-woocommerce/fg-opencart-to-woocommerce.php', $this, 'plugin_action_links' );

		/**
		 * The plugin is hooked to the WordPress importer
		 */
		if ( !defined('WP_LOAD_IMPORTERS') && !defined('DOING_AJAX') && !defined('DOING_CRON') && !defined('WP_CLI') ) {
			return;
		}

		$plugin_admin = new FG_OpenCart_to_WooCommerce_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_init', $plugin_admin, 'init' );
		$this->loader->add_filter( 'fgoc2wc_sql_pre_query', $plugin_admin, 'convert_zero_date', 10, 1 );
		$this->loader->add_action( 'fgoc2wc_post_test_database_connection', $plugin_admin, 'get_opencart_info', 9 );
		$this->loader->add_action( 'fgoc2wc_post_empty_database', $plugin_admin, 'delete_woocommerce_data' );
		$this->loader->add_action( 'load-importer-fgoc2wc', $plugin_admin, 'add_help_tab', 20 );
		$this->loader->add_action( 'fgoc2wc_import_notices', $plugin_admin, 'display_media_count', 10 );
		$this->loader->add_action( 'admin_footer', $plugin_admin, 'display_notices', 20 );
		$this->loader->add_action( 'wp_ajax_fgoc2wc_import', $plugin_admin, 'ajax_importer' );
		$this->loader->add_filter( 'fgoc2wc_pre_import_check', $plugin_admin, 'pre_import_check', 10, 1 );
		$this->loader->add_filter( 'fgoc2wc_get_option_names', $plugin_admin, 'get_option_names', 10, 1 );
		$this->loader->add_filter( 'fgoc2wc_get_product_tags', $plugin_admin, 'get_product_tags', 10, 3 );
		$this->loader->add_action( 'fgoc2wc_pre_import', $plugin_admin, 'get_default_customer_group' );

		/*
		 * Modules checker
		 */
		$plugin_modules_check = new FG_OpenCart_to_WooCommerce_Modules_Check( $plugin_admin );
		$this->loader->add_action( 'fgoc2wc_post_test_database_connection', $plugin_modules_check, 'check_modules' );

		/*
		 * FTP connection
		 */
		$plugin_ftp = new FG_OpenCart_to_WooCommerce_FTP( $plugin_admin );
		$this->loader->add_filter( 'fgoc2wc_post_display_settings_options', $plugin_ftp, 'display_ftp_settings' );
		$this->loader->add_filter( 'fgoc2wc_post_save_plugin_options', $plugin_ftp, 'save_ftp_settings' );
		$this->loader->add_action( 'fgoc2wc_dispatch', $plugin_ftp, 'test_ftp_connection', 10, 1 );
		$this->loader->add_filter( 'fgoc2wc_get_option_names', $plugin_ftp, 'get_option_names', 10, 1 );

	}

	/**
	 * Customize the links on the plugins list page
	 *
	 * @param array $links Links
	 * @return array Links
	 */
	public function plugin_action_links($links) {
		// Add the import link
		$import_link = '<a href="admin.php?import=fgoc2wc">'. __('Import', $this->plugin_name) . '</a>';
		array_unshift($links, $import_link);
		return $links;
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @access   private
	 */
	private function define_public_hooks() {

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @return    FG_OpenCart_to_WooCommerce_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
