<?php
/*
Plugin Name: AdPress
Plugin URI: http://www.charlestonsw.com/product/adpress/
Description: Manage your own site and mobile ads from a simple WordPress admin panel. 
Version: 0.2
Author: Charleston Software Associates
Author URI: http://www.charlestonsw.com
License: GPL3

Copyright 2012  Charleston Software (info@charlestonsw.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

if (isset($_SERVER['SERVER_NAME']) && ($_SERVER['SERVER_NAME']==='wpdev.cybersprocket.com')){
    error_reporting(E_ALL);
}

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// If we haven't been loaded yet
//
if ( ! class_exists( 'Adpress' ) ) {

define('ADPRESS_PREFIX','csl-adpress');

// Call in wpcsl if we need it
if (class_exists('wpCSL_plugin__adpress') === false) {
        require_once('WPCSL-generic/classes/CSL-plugin.php');
}

/**
* A plugin for handling custom ads in wordpress
*/
class Adpress {
    /** The main wpcsl object for this plugin */
    var $wpcsl;

    /***********/
    /* Defines */
    /***********/

    /** Plugin prefix */
    var $prefix;

    /** The Plugin Base name */
    var $base_name;

    /** The plugin directory */
    var $plugin_dir;

    /** The directory to icons */
    var $icon_dir;

    /** The url to the plugin */
    var $plugin_url;

    /** The url to the icons */
    var $icon_url;

    /** The admin page */
    var $admin_page;

    /** Are we in widget mode?  */
    public $is_widget = false;

    /***********/
    /* Objects */
    /***********/

    /** Actions class */
    var $Actions;

    /** Admin page actions */
    var $Admin_actions;

    /** UI Stuff */
    var $UI;

    /** Mobile Listener */
    var $Mobile;

    /** Admin Filters */
    var $Admin_Filters;

    /** Global maps attributes */
    var $Attributes;

    /***********/
    /* Methods */
    /***********/

    /** 
    * Create a plugin
    */
    function __construct() {
        $this->plugin_dir = plugin_dir_path(__FILE__);
        $this->icon_dir = $this->plugin_dir . 'images/icons/';

        $this->plugin_url = plugins_url('',__FILE__);
        $this->icon_url = $this->plugin_url . 'images/icons/';
        $this->admin_page = admin_url() . 'admin.php?page=' . $this->plugin_dir;

        $this->base_name = plugin_basename(__FILE__);

        $this->prefix = ADPRESS_PREFIX;

        $this->_configure();
        $this->_includes();
        
        // Extra help : attach the packages
        //
        $this->wpcsl->extrahelp = new ADPRESS_Extra_Help(
               array(
                   'parent' => $this->wpcsl
                   )
               );        
    }

    /** 
    * Include our needed files
    */
    function _includes() {
        require_once($this->plugin_dir . 'include/actions_class.php');
        require_once($this->plugin_dir . 'include/admin_actions_class.php');
        require_once($this->plugin_dir . 'include/admin_filters_class.php');
        require_once($this->plugin_dir . 'include/ui_class.php');
        require_once($this->plugin_dir . 'include/widget_class.php');
        require_once($this->plugin_dir . 'include/extra_help_class.php');
        require_once($this->plugin_dir . 'include/mobile-listener.php');
    }

    /** 
    * Configre wpcsl
    */
    function _configure() {
        $this->wpcsl = new wpCSL_plugin__adpress(
            array(
                'prefix'                => $this->prefix,
                'name'                  => 'AdPress',
                'sku'                   => 'ADPRESS',
            
                'url'                   => 'http://www.charlestonsw.com/product/adpress/',
                'support_url'           => 'http://wordpress.org/support/plugin/adpress',
                'purchase_url'          => 'http://www.charlestonsw.com/product/adpress-pro-pack/',
               

                // Nag menu
                //
                'rate_url'              => 'http://wordpress.org/support/view/plugin-reviews/adpress',
                'forum_url'             => 'http://wordpress.org/support/plugin/adpress',
                'version'               => '0.2',
            
                'basefile'              => $this->base_name,
                'plugin_path'           => $this->plugin_dir,
                'plugin_url'            => $this->plugin_url,
                'cache_path'            => $this->plugin_dir . 'cache',
            
                // We don't want default wpCSL objects, let's set our own
                //
                'use_obj_defaults'      => false,
            
                'cache_obj_name'        => 'none',
                'products_obj_name'     => 'none',
            
                'license_obj_name'      => 'default',            
                'helper_obj_name'       => 'default',
                'notifications_obj_name'=> 'default',
                'settings_obj_name'     => 'default',
            
                'has_packages'          => true,

                // Themes and CSS
                //
                'themes_obj_name'       => 'none',
                'themes_enabled'        => false,
                'css_prefix'            => 'csl_themes',
                'css_dir'               => $this->plugin_dir . 'css/',
                'no_default_css'        => true,
            
                // Custom Config Settings
                //
                'display_settings_collapsed'=> false,
                'show_locale'               => false,            
                'uses_money'                => false,            
            
                'driver_type'           => 'none',
                'driver_args'           => array(
                ),
            )
        );
    }

    /**
    * Set up actions and filters
    */
    function _actions() {
        // adpress Specific filters
        //
        add_filter($this->prefix."MetaValue", array(&$this->Admin_actions, 'getMetaValue'),1,2);
        add_filter($this->prefix."Render", array(&$this->UI, "render_shortcode"),1,1);
        add_filter($this->prefix."Change Destination", array(&$this->Admin_actions, 'processDestination'), 1, 2);
        add_filter($this->prefix."Settings", array($this->Admin_actions, 'settings'), 1, 1);

        // adpress Specific actions
        //
        add_action($this->prefix."ProPack", array(&$this->Admin_actions, 'propack'));
        
        // Regular Actions
        //
        add_action('init'                       ,array(&$this->Actions,'init')                            );
        add_action('widgets_init'               ,create_function( '', 'register_widget( "adpressWidget" );'));

        // Admin Actions
        //
        add_action('admin_init'                 ,array(&$this->Admin_actions,'admin_init')                );
        add_action('admin_print_styles'         ,array(&$this->Admin_actions,'admin_print_styles')        );
        add_action('manage_posts_custom_column' ,array(&$this->Admin_actions,'manage_posts_custom_column'));
        add_action('save_post'                  ,array(&$this->Admin_actions,'save_post')                 );

        // Mobile Listener
        //
        add_action('wp_ajax_csl_get_ads'                    , array(&$this->Mobile, 'GetAds')               );
        add_action('wp_ajax_nopriv_csl_get_ads'             , array(&$this->Mobile, 'GetAds')               );
        add_action('wp_ajax_license_reset_propack'          , array(&$this->Mobile, 'license_reset_propack'));
        add_action('wp_ajax_nopriv_license_reset_propack'   , array(&$this->Mobile, 'license_reset_propack'));

        // Admin Filters
        //
        add_filter('manage_edit-adpress_ad_columns',array(&$this->Admin_Filters, 'adpress_ad_columns'));

        // Short Codes
        //
        add_shortcode('adpress'   ,array(&$this->UI,'render_shortcode')  );
        add_shortcode('ADPRESS'   ,array(&$this->UI,'render_shortcode')  );
        add_shortcode('AdPress'   ,array(&$this->UI,'render_shortcode')  );
        add_shortcode('Adpress'   ,array(&$this->UI,'render_shortcode')  );

        // Text Domains
        //
        load_plugin_textdomain($this->prefix, false, $this->base_name . '/languages/');
    }

    /**
    * Create objects
    */
    function _create_objects() {
        $this->Actions = new ADPRESS_Actions();
        $this->Admin_actions = new ADPRESS_Admin_Actions();
        $this->Admin_Filters = new ADPRESS_Admin_Filters();
        $this->UI = new ADPRESS_UserInterface();
        $this->Mobile = new adpress_mobile_listener();
    }
}

$GLOBALS['AdPress'] = new Adpress();
$GLOBALS['AdPress']->_create_objects();
$GLOBALS['AdPress']->_actions();
}