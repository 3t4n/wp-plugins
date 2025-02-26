<?php

/**
 * The admin-specific functionality of the plugin.
 */

/**
 * The admin-specific functionality of the plugin.
 */
class Clearbit_Visitor_Report_Admin {

  /**
   * The ID of this plugin.
   */
  private $plugin_name;

  /**
   * The version of this plugin.
   */
  private $version;

  /**
   * Initialize the class and set its properties.
   */
  public function __construct( $plugin_name, $version ) {
    $this->plugin_name = $plugin_name;
    $this->version = $version;
  }

  public function enqueue_styles($hook) {
    if ($hook === 'settings_page_clearbit-visitor-report') {
      wp_enqueue_style( 'admin'.$this->clearbit_visitor_report, plugin_dir_url( __FILE__ ) . 'css/clearbit-visitor-report-admin.css', array(), $this->version, 'all' );
    }
  }

  /**
   * Register the JavaScript for the admin area.
   */
  public function enqueue_scripts($hook) {
    if ($hook === 'settings_page_clearbit-visitor-report') {
     wp_enqueue_script( 'admin'.$this->clearbit_visitor_report, plugin_dir_url( __FILE__ ) . 'js/clearbit-visitor-report-admin.js', array( 'jquery' ), $this->version, false );
    }
  }

  public function add_admin_page() {
    add_options_page('Clearbit Settings', 'Clearbit Settings', 'manage_options', $this->plugin_name, array( $this, 'load_admin_page_content' ) );
    add_filter( 'plugin_action_links_clearbit-visitor-report/clearbit-visitor-report.php', array($this, 'add_action_links') );
  }

  public function load_admin_page_content() {
    require_once plugin_dir_path( __FILE__ ). 'partials/clearbit-visitor-report-admin-display.php';
  }

  public function add_action_links ( $actions ) {
    $additional_links = array(
      '<a href="' . admin_url( 'options-general.php?page='.$this->plugin_name ) . '">Settings</a>',
    );

    return array_merge( $additional_links, $actions );
  }

  public function admin_notice_check_activation_message() {
    if( get_option( 'wvr-plugin-just-activated' ) ){
      if ( $_GET['page'] !== 'clearbit-visitor-report' ){
        echo '<div class="wrap"><a href="'.admin_url( 'options-general.php?page=clearbit-visitor-report' ).'" class="notice" style="text-decoration:none;display:block; position:relative;border:0;overflow:hidden;background-image: linear-gradient(to top, #59219f,#9549be);color:#fff;padding:1rem 2rem;border-radius:4px;margin:2rem 0;">
          <p style="font-size:1rem;font-family:\'avenir next\', avenir, \'helvetica neue\', helvetica, Ubuntu, roboto, noto, \'segoe ui\', arial, sans-serif">Your Weekly Visitor Report is almost installed! Please <span style="text-decoration:underline">finish your setup</span> to see what companies are visiting your site.</p>
          <img style="position: absolute; top: 1rem; bottomt: 0; right: 0; width: 20rem; object-fit: cover; object-position: top;border-radius: 10px 0 0 0" alt="Weekly Visitor Report" width="100%" height="100%" src="https://clearbit.com/resources/sharing/visitor-report-og.png" />
        </a></div>';
      }
    }
  }
}
