<?php
/*
 * Plugin Name: Loginstyle Admin Login Customizer & Styler
 * Plugin URI: http://archtheme.com/loginstyle
 * Description: Beautify, brand and customize your WordPress Admin login page.
 * Author: ArchTheme
 * Author URI: http://archtheme.com/
 * Version: 1.0.1
 * License: GPL 2.0+
 * Copyright: 2016 ArchTheme
 */

// Define plugin path
if ( !defined('LOGINSTYLE_PATH') ) {
       define('LOGINSTYLE_PATH', plugin_dir_path(__FILE__) ); 
}

// Define plugin url
if ( !defined('LOGINSTYLE_URL') ) {
       define('LOGINSTYLE_URL', plugins_url( '/', __FILE__) ); 
}

// Define plugin name
if ( !defined('LOGINSTYLE_NAME') ) {
        define('LOGINSTYLE_NAME', "Loginstyle Admin Login Customizer & Styler");
}

// Define plugin version
if ( !defined('LOGINSTYLE_VERSION') ) {
        define ("LOGINSTYLE_VERSION", "1.0.1");
}

// Define plugin slug
if ( !defined('LOGINSTYLE_SLUG') ) {
      define ("LOGINSTYLE_SLUG", 'loginstyle');  
}

// Define plugin options name
if ( !defined('LOGINSTYLE_OPTIONS') ) {
      define ("LOGINSTYLE_OPTIONS", 'loginstyle_options');  
}

/* ==========================================================================
   Internalisation and Translation
   ========================================================================== */
add_action('plugins_loaded', 'loginstyle_load_language');

if (!function_exists('loginstyle_load_language'))
{
	function loginstyle_load_language()
	{
		load_plugin_textdomain( LOGINSTYLE_SLUG, false, dirname( plugin_basename( __FILE__ ) ) . '/languages');
	}
}

/* ==========================================================================
   Activation and Uninstall Hooks
   ========================================================================== */
if( !function_exists('_loginstyle_activate') )
{
        function _loginstyle_activate() {
                
                // If previous versions exist, regenerate custom.css
                if( get_option( 'loginstyle_version' ) ) {
                        loginstyle_update_static_css();
                }
                
                // Save plugin version in db
                add_option( 'loginstyle_version', LOGINSTYLE_VERSION );
        }
}

if( !function_exists('_loginstyle_uninstall') )
{
        function _loginstyle_uninstall() {
    
                // Remove saved options
                $loginstyle_options = get_option( LOGINSTYLE_OPTIONS );
                
                if( $loginstyle_options['deactivate_deletes_data'] == '1' ) {

                        // Remove Loginstyle options
                        delete_option( LOGINSTYLE_OPTIONS );
                        delete_option('loginstyle_version');
                        delete_option('loginstyle_css');
                }
        }
}


if( !function_exists('loginstyle_network_propagate') )
{
        function loginstyle_network_propagate($function, $networkwide) {
                
                // Multisite activation
                if (function_exists('is_multisite') && is_multisite()) {
                        // check if it is a network activation - if so, run the activation function for each blog id
                        if ( $networkwide ) {
                                global $wpdb;
                                
                                $old_blog = $wpdb->blogid;
                                // Get all blog ids
                                $blogids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
                                
                                foreach ($blogids as $blog_id) {
                                        switch_to_blog($blog_id);
                                        call_user_func($function, $networkwide);
                                }
                                
                                switch_to_blog($old_blog);
                                return;
                        }   
                } 
                
                // Single site activation
                call_user_func($function, $networkwide);
        }
}

if( !function_exists('loginstyle_activate') )
{
        function loginstyle_activate( $networkwide ) {
                
                // Network propagate
                loginstyle_network_propagate('_loginstyle_activate', $networkwide);
        }
}

if( !function_exists('loginstyle_uninstall') )
{
        function loginstyle_uninstall( $networkwide ) {
                // Network propagate
                loginstyle_network_propagate('_loginstyle_uninstall', $networkwide);
        }
}

register_activation_hook(__FILE__, 'loginstyle_activate');
register_uninstall_hook(__FILE__, 'loginstyle_uninstall');

/* ==========================================================================
   Includes
   ========================================================================== */
include_once( LOGINSTYLE_PATH . 'admin/loginstyle-admin.php'); //admin
include_once( LOGINSTYLE_PATH . 'public/loginstyle-public.php'); //public
