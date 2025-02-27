<?php
/*
Plugin Name: WP Version Remover
Plugin URI: http://www.mrwebsolution.in/
Description: It's a very simple plugin to remove version number from js/css files url(i.e http://domain.com/style.css?ver=xyz to  http://domain.com/style.css) and remove version generator tag.
Author: WP-EXPERTS.IN Team
Author URI: https://www.wp-experts.in
Version: 1.5
*/
/**
License GPL2
Copyright 2018-21  MR Web Solution  (email  raghunath.0087@gmail.com)

This program is free software; you can redistribute it andor modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if(!class_exists('WPVersionRemover'))
{
    class WPVersionRemover
    {
        /**
         * Construct the plugin object
         */
        public function __construct()
        {
            // register actions
			add_action('admin_init', array(&$this, 'wvr_admin_init'));
			add_action('admin_menu', array(&$this, 'wvr_add_menu'));
			add_action('init', array(&$this, 'init_wp_version_remover'));
			// Installation and uninstallation hooks
			register_activation_hook(__FILE__, array(&$this, 'wvr_activate'));
			register_deactivation_hook(__FILE__, array(&$this, 'wvr_deactivate'));
			add_filter("plugin_action_links_".plugin_basename(__FILE__), array(&$this, 'wvr_settings_link'));
        } // END public function __construct
		
		/**
		* remove wp version param from any enqueued scripts
		*/
		function init_wp_version_remover()
		{
			if(!is_admin()){
				$remove_from_css = get_option('wvr_remove_css');
				$remove_from_script = get_option('wvr_remove_script');
				$remove_from_generator = get_option('wvr_remove_generator');
				// remove ?ver=xxx from css files
				if($remove_from_css)
				add_filter( 'style_loader_src', array(&$this,'wp_version_remover_css_js') );
			    // remove ?ver=xxx from js files
				if($remove_from_script)
				add_filter( 'script_loader_src', array(&$this,'wp_version_remover_css_js') );
				// remove generator tag		   
			    if($remove_from_generator)
				add_filter( 'the_generator', array(&$this,'wp_version_remover_generator') );
			}
		}
		/**
		* remove wp version param from any enqueued scripts
		*/
		function wp_version_remover_css_js( $src ) {
			if ( strpos( $src, 'ver=' ) )
				$src = remove_query_arg( 'ver', $src );
			return $src;
		}
		/**
		* remove wp generator tag from head section
		*/
		function wp_version_remover_generator(){
			return '';
		}
		
		/**
		 * hook into WP's admin_init action hook
		 */
		public function wvr_admin_init()
		{
			// Set up the settings for this plugin
			$this->wvr_init_settings();
			// Possibly do additional admin_init tasks
		} // END public static function activate
		/**
		 * Initialize some custom settings
		 */     
		public function wvr_init_settings()
		{
			// register the settings for this plugin
			register_setting('wvr-group', 'wvr_remove_css');
			register_setting('wvr-group', 'wvr_remove_script');
			register_setting('wvr-group', 'wvr_remove_generator');
		} // END public function init_custom_settings()
		/**
		 * add a menu
		 */     
		public function wvr_add_menu()
		{
			add_options_page('WP Version Remover Settings', 'WP Version Remover', 'manage_options', 'wp_version_remover', array(&$this, 'wrv_settings_page'));
		} // END public function add_menu()
		/**
		 * Menu Callback
		 */     
		public function wrv_settings_page()
		{
			if(!current_user_can('manage_options'))
			{
				wp_die(__('You do not have sufficient permissions to access this page.'));
			}

			// Render the settings template
			include(sprintf("%s/lib/settings.php", dirname(__FILE__)));
			//include(sprintf("%s/css/admin.css", dirname(__FILE__)));
			// Style Files
			wp_register_style( 'wvr_admin_style', plugins_url( 'css/wvr-admin.css',__FILE__ ) );
			wp_enqueue_style( 'wvr_admin_style' );
			// JS files
			wp_register_script('wvr_admin_script', plugins_url('/js/wvr-admin.js',__FILE__ ), array('jquery'));
            wp_enqueue_script('wvr_admin_script');
		} // END public function plugin_settings_page()
		// Add the settings link to the plugins page
		function wvr_settings_link($links)
		{ 
			$settings_link = '<a href="options-general.php?page=wp_version_remover">Settings</a>'; 
			array_unshift($links, $settings_link); 
			return $links; 
		}
        /**
         * Activate the plugin
         */
        public static function wvr_activate()
        {
            // Do nothing
        } // END public static function activate
        /**
         * Deactivate the plugin
         */     
        public static function wvr_deactivate()
        {
          delete_option('wvr_remove_css');
        } // END public static function deactivate
    } // END class WPVersionRemover
} // END if(!class_exists('WPVersionRemover'))

if(class_exists('WPVersionRemover'))
{
    // instantiate the plugin class
    $wvr_plugin_template = new WPVersionRemover();
}
