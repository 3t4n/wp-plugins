<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 */
class Clearbit_Visitor_Report {

  /**
   * The loader that's responsible for maintaining and registering all hooks that power
   * the plugin.
   */
  protected $loader;

  /**
   * The unique identifier of this plugin.
   */
  protected $clearbit_visitor_report;

  /**
   * The current version of the plugin.
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
    if ( defined( 'CLEARBIT_VISITOR_REPORT_VERSION' ) ) {
      $this->version = CLEARBIT_VISITOR_REPORT_VERSION;
    } else {
      $this->version = '1.0.0';
    }
    $this->clearbit_visitor_report = 'clearbit-visitor-report';

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
   * - Clearbit_Visitor_Report_Loader. Orchestrates the hooks of the plugin.
   * - Clearbit_Visitor_Report_i18n. Defines internationalization functionality.
   * - Clearbit_Visitor_Report_Admin. Defines all hooks for the admin area.
   * - Clearbit_Visitor_Report_Public. Defines all hooks for the public side of the site.
   *
   * Create an instance of the loader which will be used to register the hooks
   * with WordPress.
   */
  private function load_dependencies() {

    /**
     * The class responsible for orchestrating the actions and filters of the
     * core plugin.
     */
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-clearbit-visitor-report-loader.php';

    /**
     * The class responsible for defining internationalization functionality
     * of the plugin.
     */
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-clearbit-visitor-report-i18n.php';

    /**
     * The class responsible for defining all actions that occur in the admin area.
     */
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-clearbit-visitor-report-admin.php';

    /**
     * The class responsible for defining all actions that occur in the public-facing
     * side of the site.
     */
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-clearbit-visitor-report-public.php';

    $this->loader = new Clearbit_Visitor_Report_Loader();

  }

  /**
   * Define the locale for this plugin for internationalization.
   *
   * Uses the Clearbit_Visitor_Report_i18n class in order to set the domain and to register the hook
   * with WordPress.
   */
  private function set_locale() {

    $plugin_i18n = new Clearbit_Visitor_Report_i18n();

    $this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

  }

  /**
   * Register all of the hooks related to the admin area functionality
   * of the plugin.
   */
  private function define_admin_hooks() {

    $plugin_admin = new Clearbit_Visitor_Report_Admin( $this->get_clearbit_visitor_report(), $this->get_version() );

    $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
    $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
    $this->loader->add_action( 'admin_menu', $plugin_admin, 'add_admin_page' );
    $this->loader->add_action( 'admin_notices', $plugin_admin, 'admin_notice_check_activation_message');
  }

  /**
   * Register all of the hooks related to the public-facing functionality
   * of the plugin.
   */
  private function define_public_hooks() {

    $plugin_public = new Clearbit_Visitor_Report_Public( $this->get_clearbit_visitor_report(), $this->get_version() );

    $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
    $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
    $this->loader->add_action( 'wp_head', $plugin_public, 'load_public_page_content' );

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
   */
  public function get_clearbit_visitor_report() {
    return $this->clearbit_visitor_report;
  }

  /**
   * The reference to the class that orchestrates the hooks with the plugin.
   */
  public function get_loader() {
    return $this->loader;
  }

  /**
   * Retrieve the version number of the plugin.
   */
  public function get_version() {
    return $this->version;
  }

}
