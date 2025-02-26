<?php

/**
 * The Refreshing Human Time Diff core plugin class
 */

 
// If this file is called directly, abort
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * The core plugin class
 */
if ( !class_exists( 'PP_Refreshing_Human_Time_Diff' ) ) { 

  class PP_Refreshing_Human_Time_Diff {
    
    /**
     * Instance
     *
     * @since  3
     * @var    singleton
     * @access protected
     */
    protected static $_instance = null;
    
    
    /**
     * Plugin Main File Path and Name
     * was $_file before
     * removed in v3
     */
     
    
    /**
     * Plugin Name
     *
     * @since  1
     * @var    string
     * @access private
     */
    private $plugin_name;
    
    
    /**
     * Plugin Slug
     *
     * @since  1
     * @var    string
     * @access private
     */
    private $plugin_slug;
    
    
    /**
     * Plugin Version
     *
     * @since  3
     * @var    int
     * @access private
     * was $version before
     */
    private $plugin_version;
    
    private $admin_handle;
    private $refresh = false;
    
    
    /**
     * Init the Class 
     *
     * @since 1
     * @see getInstance
     */
    protected function __construct( $settings ) {
     
      $this->plugin_file    = $settings['file'];
      $this->plugin_slug    = $settings['slug'];
      $this->plugin_name    = $settings['name'];
      $this->plugin_version = $settings['version'];
      
      $this->init();
      
    }
    
    
    /**
     * Prevent Cloning
     *
     * @since 3
     */
    protected function __clone() {}
    
    
    /**
	   * Get the Instance
     *
     * @since 3
     * @param array $settings {
     *   @type string $file    Plugin Main File Path and Name
     *   @type string $slug    Plugin Slug
     *   @type string $name    Plugin Name
     *   @type int    $version Plugin Verion
     * }
     * @return singleton
     */
    public static function getInstance( $settings ) {
     
      if ( null === self::$_instance ) {

        self::$_instance = new self( $settings );
        
      }
      
      return self::$_instance;
      
    }
    
    
    /**
	   * get plugin file
     *
     * @since 3
     * @access public
     */
    public function get_plugin_file() {
      
      return $this->plugin_file;
      
    }
    
    
    /**
	   * get plugin slug
     *
     * @since 3
     * @access public
     */
    public function get_plugin_slug() {
      
      return $this->plugin_slug;
      
    }
    
    
    /**
	   * get plugin name
     *
     * @since 3
     * @access public
     */
    public function get_plugin_name() {
      
      return $this->plugin_name;
      
    }
    
    
    /**
	   * get plugin version
     *
     * @since 3
     * @access public
     */
    public function get_plugin_version() {
      
      return $this->plugin_version;
      
    }
    
    
    /**
     * do plugin init 
     */
    private function init() {
      
      add_action( 'init', array( $this, 'add_text_domain' ) );
      add_action( 'admin_menu', array( $this, 'adminmenu' ) );
      add_filter( 'plugin_action_links_' . plugin_basename( $this->get_plugin_file() ), array( $this, 'add_links' ) );  
      add_action( 'admin_enqueue_scripts', array( $this, 'admin_style' ) );
      
      add_filter( 'human_time_diff', array( $this, 'make_human_time_diff_refreshing' ), 99, 4 );
      add_action( 'wp_footer', array( $this, 'add_refresh' ) );
      
    }
    
    
    /**
     * add text domain
     */
    function add_text_domain() {  
    
      load_plugin_textdomain( 'refreshing-human-time-diff' );
      
    }
    
    
    /**
     * make the human time diff refreshing
     */
    public function make_human_time_diff_refreshing( $since, $diff, $from, $to ) {
      
      // we only refresh the time diff if $to is now 
      if ( $to >= current_time( 'timestamp' ) - 1 && $to <= current_time( 'timestamp' ) + 1 ) {
          
        $this->refresh = true;
        
        $since = '<span data-refreshing-human-time-diff-from="' . $from . '">' . $since . '</span>';
        
      }
      
      return $since;
      
    }
    
    
    /**
     * add JavaScript code to refresh human time diff in client
     */
    public function add_refresh() {
      
      if ( $this->refresh ) {
        
        // for better performance store the translations as transient for a week
        
        $rhtd_strings = get_transient( 'pp_refreshing_human_time_diff_rhtd_strings' );
        
        if ( false === $rhtd_strings ) {
         
          // we need to get the translations
          
          $rhtd_translations = array();
          
          $rhtd_translations['min']    = substr( _n( '%s min',   '%s mins',   1 ), 3 );
          $rhtd_translations['mins']   = substr( _n( '%s min',   '%s mins',   2 ), 3 );
          $rhtd_translations['hour']   = substr( _n( '%s hour',  '%s hours',  1 ), 3 );
          $rhtd_translations['hours']  = substr( _n( '%s hour',  '%s hours',  2 ), 3 );
          $rhtd_translations['day']    = substr( _n( '%s day',   '%s days',   1 ), 3 );
          $rhtd_translations['days']   = substr( _n( '%s day',   '%s days',   2 ), 3 );
          $rhtd_translations['week']   = substr( _n( '%s week',  '%s weeks',  1 ), 3 );
          $rhtd_translations['weeks']  = substr( _n( '%s week',  '%s weeks',  2 ), 3 );
          $rhtd_translations['month']  = substr( _n( '%s month', '%s months', 1 ), 3 );
          $rhtd_translations['months'] = substr( _n( '%s month', '%s months', 2 ), 3 );
          $rhtd_translations['year']   = substr( _n( '%s year',  '%s years',  1 ), 3 );
          $rhtd_translations['years']  = substr( _n( '%s year',  '%s years',  2 ), 3 );
          
          $rhtd_strings = json_encode( $rhtd_translations );
          set_transient( 'pp_refreshing_human_time_diff_rhtd_strings', $rhtd_strings, 604800 );
          
        }
        
        ?>
        <script type="text/javascript">
          var rhtd_gap = 0;
          var rhtd_strings = <?php echo $rhtd_strings; ?>;
          var rhtd_steps = { min: 60, hour: 3600, day: 86400, week: 604800, month: 2592000, year: 31536000 };
          refresh_human_time_diff( <?php echo current_time( 'timestamp' ); ?>);
          function refresh_human_time_diff( timeref = null ) { var localtime = Math.round( new Date().getTime() / 1000 ); if ( null != timeref ) { rhtd_gap = localtime - timeref; setInterval( refresh_human_time_diff, 60000 ); } var from = localtime - rhtd_gap; var objects = document.querySelectorAll( '[data-refreshing-human-time-diff-from]' ); for ( var i in objects ) { if ( objects.hasOwnProperty( i ) ) { var to = objects[i].getAttribute( 'data-refreshing-human-time-diff-from' ); var diff = Math.abs( to - from ); var interval = 0; var caption = ''; var since = objects[i].innerHTML; if ( diff < rhtd_steps.hour ) { interval = Math.round( diff / rhtd_steps.min ); if ( interval <= 1 ) { interval = 1; caption = rhtd_strings.min; } else { caption = rhtd_strings.mins; } } else if ( diff < rhtd_steps.day && diff >= rhtd_steps.hour ) { interval = Math.round( diff / rhtd_steps.hour ); if ( interval <= 1 ) { interval = 1; caption = rhtd_strings.hour; } else { caption = rhtd_strings.hours; } } else if ( diff < rhtd_steps.week && diff >= rhtd_steps.day ) { interval = Math.round( diff / rhtd_steps.day ); if ( interval <= 1 ) { interval = 1; caption = rhtd_strings.day; } else { caption = rhtd_strings.days; } } else if ( diff < rhtd_steps.month && diff >= rhtd_steps.week ) { interval = Math.round( diff / rhtd_steps.week ); if ( interval <= 1 ) { interval = 1; caption = rhtd_strings.week; } else { caption = rhtd_strings.weeks; } } else if ( diff < rhtd_steps.year && diff >= rhtd_steps.month ) { interval = Math.round( diff / rhtd_steps.month ); if ( interval <= 1 ) { interval = 1; caption = rhtd_strings.month; } else { caption = rhtd_strings.months; } } else if ( diff >= rhtd_steps.year ) { interval = Math.round( diff / rhtd_steps.year ); if ( interval <= 1 ) { interval = 1; caption = rhtd_strings.year; } else { caption = rhtd_strings.years; } } since = interval + ' ' + caption; if ( since != objects[i].innerHTML ) { objects[i].innerHTML = since; } if ( diff > rhtd_steps.day * 2 ) { objects[i].removeAttribute( 'data-refreshing-human-time-diff-from' ); } } } }
        </script>
        <?php
        
      }
      
    }
    
    
    /**
     * add links to plugins table
     */
    function add_links( $links ) {
      
      return array_merge( $links, array( '<a href="' . menu_page_url( $this->get_plugin_slug(), false ) . '" title="' . __( 'Show plugin info', 'refreshing-human-time-diff' ) . '">' . __( 'Show plugin info', 'refreshing-human-time-diff' ) . '</a>', '<a href="https://wordpress.org/support/plugin/' . $this->get_plugin_slug() . '/reviews/" title="' . __( 'Please rate plugin', 'refreshing-human-time-diff' ) . '">' . __( 'Please rate plugin', 'refreshing-human-time-diff' ) . '</a>' ) );
      
    }

    
    /**
     * init backend
     */
    function adminmenu() {
      
      $this->admin_handle = add_submenu_page( null, $this->get_plugin_name(), $this->get_plugin_name(), 'read', $this->get_plugin_slug(), array( $this, 'showadmin' ) );
      
    }
    
    function showadmin() {
      
      require_once( plugin_dir_path( $this->get_plugin_file() ) . '/inc/admin/admin-page.php' );
      
    }
    
    
    /**
     * show the nav icons on admin page
     * @since 3
     */
    function show_nav_icons( $icons ) {
       
      foreach ( $icons as $icon ) {
         
        echo '<a href="' . $icon['link'] . '" title="' . $icon['title'] . '"><span class="dashicons ' . $icon['icon'] . '"></span><span class="text">' . $icon['title'] . '</span></a>';
         
      }
      
    }
    
    
    /**
     * add admin css files
     * @since 3
     * replaces inline style
     */
    function admin_style() {
      
      if ( get_current_screen()->id == $this->admin_handle ) {
        
        wp_enqueue_style( 'pp-admin-page', plugins_url( 'assets/css/pp-admin-page-v2.css', $this->get_plugin_file() ) );
        
      }
      
    }
    
    // uninstall plugin
    // there's nothing to do on uninstall because we have not settings to delete
    // therefore there is no uninstall function

    
  }
  
}
 
?>