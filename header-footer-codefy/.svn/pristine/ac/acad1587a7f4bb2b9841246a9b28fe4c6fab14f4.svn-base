<?php

/**
 * prevent direct access
 */
defined( 'ABSPATH' ) or die( 'Restricted access!' );

/**
@package   Header & Footer Codefy
@author    Gabriel Froes <gabriel.froes@gmail.com>
@license   GPL-2.0+
@link      https://www.rwstudio.com.br
@copyright 2018 RW Studio

Plugin Name: Header & Footer Codefy
Text Domain: header-footer-codefy
Domain Path: /languages
Plugin URI: https://www.rwstudio.com.br/header-footer-codefy
Description: Add a specific script, text or any kind of code in header and footer to every page on your Wordpress blog.
Version: 1.0.0
Author: RW Studio 
Author URI: https://www.rwstudio.com.br/
License: GPL-2.0+
*/

if ( is_admin() ) {
    // we are in admin mode
//    require_once( dirname( __FILE__ ) . '/admin/header-footer-codefy-admin.php' );
}

/**
* Insert Headers and Footers Class
*/
class HeaderAndFooterCodefy {
    /**
    * Constructor
    */
    public function __construct() {

        // Plugin Info
        $this->plugin               = new stdClass;
        $this->plugin->name         = 'header-footer-codefy'; // Folder
        $this->plugin->displayName  = 'Header & Footer Codefy'; // Name
        $this->plugin->version      = '1.0.0';
        $this->plugin->option       = 'rwstudio_hfc_options';
        $this->plugin->prefix       = 'rwstudio_hfc_';
        $this->plugin->folder       = plugin_dir_path( __FILE__ );
        $this->plugin->file         = plugin_basename(__FILE__);
        $this->plugin->url          = plugin_dir_url( __FILE__ );
        $this->plugin->donateUrl    = "";
        $this->plugin->pluginUrl    = "https://www.rwstudio.com.br/header-footer-codefy";

        // Admin Hooks
        add_action( 'admin_init', array(&$this, 'admin_init') );
        add_action('admin_menu', array(&$this, 'admin_menu') );

        // Frontend Hooks
        add_action('wp_head', array(&$this, 'head_get_option'), 0);
        add_action('wp_footer', array(&$this, 'footer_get_option'), 1000);

        //Admin CSS
        add_action( 'admin_enqueue_scripts', array($this, 'register_plugin_styles') );

        //Load Languages
        add_action( 'plugins_loaded', array(&$this, 'myplugin_load_textdomain') );

        // Filters
        add_filter( 'plugin_action_links_' . $this->plugin->file, array(&$this, 'add_action_links') );


        if( !get_option( $this->plugin->option ) ) {
          add_action( 'admin_notices', array(&$this, 'my_alert') );
        }
    }

    function my_alert() {
      ?>
      <div class="notice notice-info is-dismissible">
          <p><?php printf( __( 'Please check the %s settings, it is required for this plugin to work properly!', $this->plugin->name ), $this->plugin->displayName) ; ?></p>
      </div>
      <?php
    }   

    // Plugin links on plugins page
    function add_action_links ( $links ) {
        $settings_link = '<a href="' . admin_url( 'options-general.php?page='. $this->plugin->name ) . '">'. __('Settings' ) . '</a>';
        array_unshift($links, $settings_link); 
        return $links;
    }

    // get option functions
    function head_get_option() {$this->rwstudio_get_option('head');}
    function footer_get_option() {$this->rwstudio_get_option('footer');}

    // frontend get option generic
    function rwstudio_get_option($opt) {
        // ignore
        if (is_admin() || is_robots() || is_trackback() || is_feed()) return;

        // get option
        $options = get_option($this->plugin->option);
        $option =  wp_unslash($options[$opt]);
        if(empty($option)) {return;}
        
        // add comments
        $option = "<!-- " . $this->plugin->displayName . " Plugin :: v" . $this->plugin->version ." -->\n" . $option . "\n\n";

        // output
        echo $option;
    }

    // admin get option generic
    function admin_get_option($opt) {
        // get option
        $options = get_option($this->plugin->option);
        $option =  wp_unslash($options[$opt]);
        return $option;
    }

    // Register Settings
    function admin_init(){
        // Register a setting and its sanitization callback.
        register_setting( $this->plugin->prefix .'options', $this->plugin->prefix . 'options');
    }

    // Admin Menu
    function admin_menu() {
        add_options_page($this->plugin->displayName . ' ' . __( 'Settings' ), $this->plugin->displayName, 'manage_options', $this->plugin->name, array(&$this, $this->plugin->prefix . 'admin_page') ) ;
    }

    // Admin Form
    function rwstudio_hfc_admin_page() {
        // only admin user can access this page
        if ( !current_user_can( 'administrator' ) ) {
            echo '<p>' . __( 'Sorry, you are not allowed to access this page.', $this->plugin->name ) . '</p>';
            return;
        }

        // Save Settings
        if ( isset( $_REQUEST['submit'] ) ) {
            // Check nonce
            if ( !isset( $_REQUEST[$this->plugin->name.'_nonce'] ) ) {
                // Missing nonce
                $this->errorMessage = __( 'nonce field is missing. Settings NOT saved.', $this->plugin->name );
            } elseif ( !wp_verify_nonce( $_REQUEST[$this->plugin->name.'_nonce'], $this->plugin->name ) ) {
                // Invalid nonce
                $this->errorMessage = __( 'Invalid nonce specified. Settings NOT saved.', $this->plugin->name );
            } else {
                // Save
                $options = array(
                    "head" => $_REQUEST[$this->plugin->prefix . 'head'],
                    "footer" => $_REQUEST[$this->plugin->prefix . 'footer']
                );

                update_option( $this->plugin->option, $options);
                $this->message = __( 'Settings Saved.', $this->plugin->name );
            }
        }

        // Load Settings Form
        include_once( WP_PLUGIN_DIR . '/' . $this->plugin->name . '/admin/settings.php' );
    }

    // Register and enqueue style sheet.
    public function register_plugin_styles() {
        wp_register_style( 'hfc_admin_bootstrap_css', plugins_url( $this->plugin->name . '/admin/css/bootstrap.min.css' ) );
        wp_register_style( 'hfc_admin_css', plugins_url( $this->plugin->name . '/admin/css/style.css' ) );
        wp_enqueue_style( 'hfc_admin_css' );
        wp_enqueue_style( 'hfc_admin_bootstrap_css' );
    }

    //Load languages
    function myplugin_load_textdomain() {
        load_plugin_textdomain( $this->plugin->name, false, dirname( $this->plugin->file ) . '/languages' );
    }
}

// Init
$rwstudio_hfc = new HeaderAndFooterCodefy();

?>