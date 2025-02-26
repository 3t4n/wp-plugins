<?php

/**
 * The public-facing functionality of the plugin.
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 */
class Clearbit_Visitor_Report_Public {

  /**
   * The ID of this plugin.
   */
  private $clearbit_visitor_report;

  /**
   * The version of this plugin.
   */
  private $version;

  /**
   * Initialize the class and set its properties.
   */
  public function __construct( $clearbit_visitor_report, $version ) {

    $this->clearbit_visitor_report = $clearbit_visitor_report;
    $this->version = $version;

  }

  /**
   * Register the stylesheets for the public-facing side of the site.
   */
  public function enqueue_styles() {

    /**
     * This function is provided for demonstration purposes only.
     *
     * An instance of this class should be passed to the run() function
     * defined in Clearbit_Visitor_Report_Loader as all of the hooks are defined
     * in that particular class.
     *
     * The Clearbit_Visitor_Report_Loader will then create the relationship
     * between the defined hooks and the functions defined in this
     * class.
     */

    // We don't need it at the moment, as load_public_page_content() will serve the script
    // wp_enqueue_style( $this->clearbit_visitor_report, plugin_dir_url( __FILE__ ) . 'css/clearbit-visitor-report-public.css', array(), $this->version, 'all' );
  }

  /**
   * Register the JavaScript for the public-facing side of the site.
   */
  public function enqueue_scripts() {

    /**
     * This function is provided for demonstration purposes only.
     *
     * An instance of this class should be passed to the run() function
     * defined in Clearbit_Visitor_Report_Loader as all of the hooks are defined
     * in that particular class.
     *
     * The Clearbit_Visitor_Report_Loader will then create the relationship
     * between the defined hooks and the functions defined in this
     * class.
     */

    // We don't need it at the moment, as load_public_page_content() will serve the script
    // wp_enqueue_script( $this->clearbit_visitor_report, plugin_dir_url( __FILE__ ) . 'js/clearbit-visitor-report-public.js', array( 'jquery' ), $this->version, false );

  }

  public function load_public_page_content() {
    require_once plugin_dir_path( __FILE__ ). 'partials/clearbit-visitor-report-public-display.php';
  }

}
