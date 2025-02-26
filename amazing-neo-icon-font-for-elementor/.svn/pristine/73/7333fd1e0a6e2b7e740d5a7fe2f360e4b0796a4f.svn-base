<?php

/**
 * Plugin Name: Amazing Neo Icon Font for elementor
 * Plugin URI:			https://github.com/andropplelab/amazing-neo
 * Description:			Amazing Neo for popular free page builder Elementor.
 * Version:				2.0.1
 * Author:				Amazing Team
 * Author URI:			https://amazingneo.com
 * Text Domain: 		amazing-neo-icon-font-for-wp-elementor
 * Domain Path: 	 	/languages
 */
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

define( 'AMZ_NEO__FILE__', __FILE__ );
define( 'AMZ_NEO_PLUGIN_BASE', plugin_basename( AMZ_NEO__FILE__ ) );
define( 'AMZ_NEO_PATH', plugin_dir_path( AMZ_NEO__FILE__ ) );


if ( function_exists( 'cwfe_fs' ) ) {
    cwfe_fs()->set_basename( false, __FILE__ );
} else {
  
    
    if ( !defined( 'ABSPATH' ) ) {
        exit;
        // Exit if accessed directly.
    }
    
    /**
     * Main Amazing Neo Icon Contact Elementor Widgets
     *
     * The main class that initiates and runs the plugin.
     *
     * @since 1.0.0
     */
    final class Amazing_Elementor_Icon_Widgets
    {
        /**
         * Plugin Version
         *
         * @since 1.0.0
         * @var string The plugin version.
         */
        const  VERSION = '1.0' ;
        /**
         * Minimum Elementor Version
         *
         * @since 1.0.0
         * @var string Minimum Elementor version required to run the plugin.
         */
        const  MINIMUM_ELEMENTOR_VERSION = '2.0' ;
        /**
         * Minimum PHP Version
         *
         * @since 1.0.0
         * @var string Minimum PHP version required to run the plugin.
         */
        const  MINIMUM_PHP_VERSION = '5.6' ;
        /**
         * Constructor
         *
         * @since 1.0.0
         * @access public
         */
        public function __construct()
        {
            // Load translation
            add_action( 'init', array( $this, 'i18n' ) );
            // Init Plugin
            add_action( 'plugins_loaded', array( $this, 'init' ) );
        }
        
        /**
         * Load Textdomain
         *
         * Load plugin localization files.
         * Fired by `init` action hook.
         *
         * @since 1.0.0
         * @access public
         */
        public function i18n()
        {
            load_plugin_textdomain( 'amazing-neo-font-widget', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
            //load_plugin_textdomain( 'amazing-neo-font-widget' );
        }
        
        /**
         * Initialize the plugin
         *
         * Validates that Elementor is already loaded.
         * Checks for basic plugin requirements, if one check fail don't continue,
         * if all check have passed include the plugin class.
         *
         * Fired by `plugins_loaded` action hook.
         *
         * @since 1.0.0
         * @access public
         */
        public function init()
        {
            // Check if Elementor installed and activated
            
            if ( !did_action( 'elementor/loaded' ) ) {
                add_action( 'admin_notices', array( $this, 'amazing_admin_notice_missing_main_plugin' ) );
                return;
            }
            
            // Check for required Elementor version
            
            if ( !version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
                add_action( 'admin_notices', array( $this, 'amazing_admin_notice_minimum_elementor_version' ) );
                return;
            }

            // Check for required PHP version
            
            if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
                add_action( 'admin_notices', array( $this, 'amazing_admin_notice_minimum_php_version' ) );
                return;
            }
            
            // Once we get here, We have passed all validation checks so we can safely include our plugin
            require_once  AMZ_NEO_PATH . 'plugin.php';
            require_once AMZ_NEO_PATH . 'functions.php';
        }
        
        /**
         * Admin notice
         *
         * Warning when the site doesn't have Elementor installed or activated.
         *
         * @since 1.0.0
         * @access public
         */
        public function amazing_admin_notice_missing_main_plugin()
        {
            if ( isset( $_GET['activate'] ) ) {
                unset( $_GET['activate'] );
            }
            $message = sprintf(
                /* translators: 1: Plugin name 2: Elementor */
                esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'amazing-neo-font-widget' ),
                '<strong>' . esc_html__( 'amazing neo for elementor', 'amazing-neo-font-widget' ) . '</strong>',
                '<strong>' . esc_html__( 'Elementor', 'amazing-neo-font-widget' ) . '</strong>'
            );
            printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
        }
        
        /**
         * Admin notice
         *
         * Warning when the site doesn't have a minimum required Elementor version.
         *
         * @since 1.0.0
         * @access public
         */
        public function amazing_admin_notice_minimum_elementor_version()
        {
            if ( isset( $_GET['activate'] ) ) {
                unset( $_GET['activate'] );
            }
            $message = sprintf(
                /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
                esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'amazing-neo-font-widget' ),
                '<strong>' . esc_html__( 'amazing neo for elementor', 'amazing-neo-font-widget' ) . '</strong>',
                '<strong>' . esc_html__( 'Elementor', 'amazing-neo-font-widget' ) . '</strong>',
                self::MINIMUM_ELEMENTOR_VERSION
            );
            printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
        }
        
        /**
         * Admin notice
         *
         * Warning when the site doesn't have a minimum required PHP version.
         *
         * @since 1.0.0
         * @access public
         */
        public function amazing_admin_notice_minimum_php_version()
        {
            if ( isset( $_GET['activate'] ) ) {
                unset( $_GET['activate'] );
            }
            $message = sprintf(
                /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
                esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'amazing-neo-font-widget' ),
                '<strong>' . esc_html__( 'amazing neo for elementor', 'amazing-neo-font-widget' ) . '</strong>',
                '<strong>' . esc_html__( 'PHP', 'amazing-neo-font-widget' ) . '</strong>',
                self::MINIMUM_PHP_VERSION
            );
            printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
        }
    
    }
    // Instantiate Amazing_Elementor_Contact_Widgets.
    new Amazing_Elementor_Icon_Widgets();
}
