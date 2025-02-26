<?php
/**
 * Plugin Name: AlertWire
 * Plugin URI: https://www.alertwire.com/plugin/WordPress/AlertWire.zip
 * Description: AlertWire plug-in to easily insert script tag for AlertWire client sites.
 * Version: 1.2.2
 * Author: AlertWire
 * Author URI: https://www.alertwire.com/
 */
 /*  Copyright 2014-2017  AlertWire  (email : opensource@alertwire.com)

    This program is free software; you can redistribute it and/or modify
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
if(!class_exists('AlertWire_Plugin'))
{
    class AlertWire_Plugin
    {
        /**
         * Construct the plugin object
         */
        public function __construct()
        {
            add_action('admin_init', array(&$this, 'admin_init'));
            add_action('admin_menu', array(&$this, 'add_menu'));
            add_action('wp_footer',  array(&$this, 'insert_snippet'));
        } // END public function __construct

        /**
         * Activate the plugin
         */
        public static function activate()
        {
            // Do nothing
        } // END public static function activate

        /**
         * Deactivate the plugin
         */     
        public static function deactivate()
        {
            // Do nothing
        } // END public static function deactivate

        /**
         * hook into WP's admin_init action hook
         */
        public function admin_init()
        {
            // Set up the settings for this plugin
            $this->init_settings();
            // Possibly do additional admin_init tasks
        } // END public static function activate

        /**
         * Initialize some custom settings
         */     
        public function init_settings()
        {
            // register the settings for this plugin
            register_setting('alertwire-group', 'alertwireToken');
            register_setting('alertwire-group', 'alertwireTarget');
            register_setting('alertwire-group', 'alertwireOnHome');
            register_setting('alertwire-group', 'alertwireOnSinglePost');
        } // END public function init_custom_settings()

        /**
         * add a menu
         */     
        public function add_menu()
        {
            add_options_page('AlertWire Settings', 'AlertWire', 'manage_options', 'alertwire', array(&$this, 'plugin_settings_page'));
        } // END public function add_menu()

        /**
         * Menu Callback
         */     
        public function plugin_settings_page()
        {
            if(!current_user_can('manage_options'))
            {
                wp_die(__('You do not have sufficient permissions to access this page.'));
            }

            // Render the settings template
            include(sprintf("%s/settings.php", dirname(__FILE__)));
        } // END public function plugin_settings_page()

        function insert_snippet()
        {
            if(!is_admin())
            {
                if((is_home() || is_front_page()) && !get_option('alertwireOnHome'))
                    return;

                if(is_single() && !get_option('alertwireOnSinglePost'))
                    return;

                $alertwireToken = htmlspecialchars(get_option('alertwireToken'));
                $alertwireTarget = htmlspecialchars(get_option('alertwireTarget'));
                define('SRC', 'https://api.alertwire.com/Core/AWCore.min.js');
                
                if ($alertwireTarget !== '')
                {
                    echo '<script id="alert-system" type="text/javascript" src="' . SRC. '" data-token="' . $alertwireToken . '" data-container="' . $alertwireTarget . '" async></script>' . PHP_EOL;
                }
                else
                {
                    echo '<script id="alert-system" type="text/javascript" src="' . SRC. '" data-token="' . $alertwireToken . '" async></script>' . PHP_EOL;
                }
            }
        }
    } // END class AlertWire_Plugin
} // END if(!class_exists('AlertWire_Plugin'))

if(class_exists('AlertWire_Plugin'))
{
    // Installation and uninstallation hooks
    register_activation_hook(__FILE__, array('AlertWire_Plugin', 'activate'));
    register_deactivation_hook(__FILE__, array('AlertWire_Plugin', 'deactivate'));

    // instantiate the plugin class
    $alertwire = new AlertWire_Plugin();
}

// Add a link to the settings page onto the plugin page
if(isset($alertwire))
{
    // Add the settings link to the plugins page
    function plugin_settings_link($links)
    { 
        $settings_link = '<a href="options-general.php?page=alertwire">Settings</a>'; 
        array_unshift($links, $settings_link); 
        return $links; 
    }

    $plugin = plugin_basename(__FILE__); 
    add_filter("plugin_action_links_$plugin", 'plugin_settings_link');
}