<?php

/**
 * Plugin Name: Easy Schema -  Structured Data & Rich Snippets
 * Plugin URI: https://starkplugins.com/easy-schema/
 * Description: Easy Schema allows you to add structured data to your website, giving Google the information it needs to display your website prominently.
 * Author: StarkPlugins
 * Author URI: https://starkplugins.com/
 * Version: 2.3.0
 * 
 * Easy Schema is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 * 
 * Easy Schema is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */

if ( !defined( 'ABSPATH' ) ) {
    exit;
    // Exit if accessed directly.
}


if ( function_exists( 'essdrs_fs' ) ) {
    essdrs_fs()->set_basename( false, __FILE__ );
} else {
    
    if ( !function_exists( 'essdrs_fs' ) ) {
        // Create a helper function for easy SDK access.
        function essdrs_fs()
        {
            global  $essdrs_fs ;
            
            if ( !isset( $essdrs_fs ) ) {
                // Include Freemius SDK.
                require_once dirname( __FILE__ ) . '/freemius/start.php';
                $essdrs_fs = fs_dynamic_init( array(
                    'id'             => '11537',
                    'slug'           => 'easy-schema-structured-data-rich-snippets',
                    'type'           => 'plugin',
                    'public_key'     => 'pk_89de40e01a655241f5e0225b6d399',
                    'is_premium'     => false,
                    'premium_suffix' => 'Easy Schema PRO',
                    'has_addons'     => false,
                    'has_paid_plans' => true,
                    'menu'           => array(
                    'slug'    => 'easy-schema-options-menu',
                    'contact' => false,
                    'support' => false,
                ),
                    'is_live'        => true,
                ) );
            }
            
            return $essdrs_fs;
        }
        
        // Init Freemius.
        essdrs_fs();
        // Signal that SDK was initiated.
        do_action( 'essdrs_fs_loaded' );
    }
    
    // Main plugin logic (After premium active check)
    // Create the schema settings on the menu
    add_action( 'admin_menu', 'essdrs_easy_schema_menu' );
    function essdrs_easy_schema_menu()
    {
        $page_title = 'Easy Schema options';
        $menu_title = 'Easy Schema';
        $capability = 'manage_options';
        $slug = 'easy-schema-options-menu';
        $callback = 'essdrs_easy_schema_settings_page';
        $icon = 'dashicons-dashboard';
        $position = 80;
        global  $jsonschema_menu_page ;
        $jsonschema_menu_page = add_menu_page(
            $page_title,
            $menu_title,
            $capability,
            $slug,
            $callback,
            $icon,
            $position
        );
        add_action( 'admin_init', 'register_essdrs_easy_schema_settings' );
    }
    
    // Add meta to the plugin links
    add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'essdrs_plugin_settings_action_links' );
    function essdrs_plugin_settings_action_links( $actions )
    {
        $mylinks = array( '<a href="https://starkplugins.com/easy-schema/" target="_blank" style="color: #FF7601; font-weight: 700;">Easy Schema PRO</a>' );
        $actions = array_merge( $actions, $mylinks );
        return $actions;
    }
    
    // Include scripts for settings page
    add_action( 'admin_enqueue_scripts', 'essdrs_easy_schema_admin_style' );
    function essdrs_easy_schema_admin_style()
    {
        $screen = get_current_screen();
        
        if ( $screen->base == 'toplevel_page_easy-schema-options-menu' ) {
            wp_enqueue_style( 'json_schema_admin_styles', plugins_url( 'admin/css/admin-style.css', __FILE__ ) );
            wp_enqueue_script(
                'json_schema_admin_javascript',
                plugins_url( 'admin/javascript/es_admin_javascript.js', __FILE__ ),
                '',
                '',
                true
            );
            wp_enqueue_script(
                'json_schema_admin_settings_ajax',
                plugins_url( 'admin/javascript/es_admin_settings_ajax.js', __FILE__ ),
                '',
                '',
                true
            );
            wp_enqueue_script(
                'json_schema_admin_local_business_form',
                plugins_url( 'admin/javascript/es_admin_local_business_form.js', __FILE__ ),
                '',
                '',
                true
            );
            wp_enqueue_script(
                'json_schema_admin_activated_monitor',
                plugins_url( 'admin/javascript/es_admin_activated_monitor.js', __FILE__ ),
                '',
                '',
                true
            );
        }
    
    }
    
    // Link to settings page from plugins table
    add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'add_action_links_essdrs' );
    function add_action_links_essdrs( $links )
    {
        $mylinks = array( '<a href="' . admin_url( 'admin.php?page=easy-schema-options-menu' ) . '">Settings</a>' );
        return array_merge( $mylinks, $links );
    }
    
    // Register our plugin settings -> es-register-settings.php
    function register_essdrs_easy_schema_settings()
    {
        // Return registered plugin settings
        include_once plugin_dir_path( __FILE__ ) . '/es-register-settings.php';
    }
    
    // This function creates and populates the easy schema settings page (retrieves code files with each fragment in)
    function essdrs_easy_schema_settings_page()
    {
        // Get each setting attribute variables -> es-admin-options.php
        include_once plugin_dir_path( __FILE__ ) . '/es-admin-options.php';
        // Start the admin settings page HTML form etc.
        //end php
        ?> 
        <div class="easy_schema_admin_dashboard">
        <form method="post" action="options.php" id="esAdminSaveSettings">
        <?php 
        settings_fields( 'jsonschema_settings_ui' );
        ?>
        <?php 
        do_settings_sections( 'jsonschema_settings_ui' );
        ?>
        <div class="easy_schema_admin_dashboard_settings">
            
        <?php 
        // Get the admin settings left navigation bar -> es-admin-navigation.php
        include_once plugin_dir_path( __FILE__ ) . '/es-admin-navigation.php';
        ?>
        
        <!-- right_settings -->
        <div class="easy_schema_right_options">
            
        <?php 
        // Get the admin settings 'getting started' tab -> es-getting-started.php
        include_once plugin_dir_path( __FILE__ ) . '/es-getting-started.php';
        // Get the admin settings 'getting started' tab -> es-getting-started.php
        include_once plugin_dir_path( __FILE__ ) . '/es-getting-started.php';
        // Get the admin settings 'local business' settings  -> es-local-business-settings.php
        include_once plugin_dir_path( __FILE__ ) . '/es-local-business-settings.php';
        // Get the admin settings 'faq page schema' settings  -> es-faq-settings.php
        include_once plugin_dir_path( __FILE__ ) . '/es-faq-settings.php';
        // Get the admin settings 'logo schema' settings  -> es-logo-schema-settings.php
        include_once plugin_dir_path( __FILE__ ) . '/es-logo-schema-settings.php';
        // Get the admin settings 'sitelinks' settings  -> es-sitelinks-searchbox-settings.php
        include_once plugin_dir_path( __FILE__ ) . '/es-sitelinks-searchbox-settings.php';
        // Get the admin settings 'woocommerce' settings  -> es-woocommerce-settings.php
        include_once plugin_dir_path( __FILE__ ) . '/es-woocommerce-settings.php';
        // Get the admin settings 'Article schema' settings  -> es-article-settings.php
        include_once plugin_dir_path( __FILE__ ) . '/es-article-settings.php';
        // Get the admin settings 'Recipe schema' settings  -> es-recipe-settings.php
        include_once plugin_dir_path( __FILE__ ) . '/es-recipe-settings.php';
        // Get the admin settings 'Video Object schema' settings  -> es-video-settings.php
        include_once plugin_dir_path( __FILE__ ) . '/es-video-settings.php';
        // Get the admin settings 'Software Application schema' settings  -> es-software-settings.php
        include_once plugin_dir_path( __FILE__ ) . '/es-software-settings.php';
        // Get the admin settings 'Events schema' settings  -> es-events-settings.php
        include_once plugin_dir_path( __FILE__ ) . '/es-events-settings.php';
        // Get the admin settings 'Job Posting schema' settings  -> es-job-settings.php
        include_once plugin_dir_path( __FILE__ ) . '/es-job-settings.php';
        // Get the admin settings 'Person schema' settings  -> es-person-settings.php
        include_once plugin_dir_path( __FILE__ ) . '/es-person-settings.php';
        // Get the admin settings 'Course schema' settings  -> es-course-settings.php
        include_once plugin_dir_path( __FILE__ ) . '/es-course-settings.php';
        // Get the upgrade to pro landing tab  -> es-upgrade-pro-lander.php
        include_once plugin_dir_path( __FILE__ ) . '/es-upgrade-pro-lander.php';
        ?>        
            
        </div>
        </div>
        </div>
    </div>
    </form>
    <?php 
    }
    
    /**
     * Get the display functions for local business schema -> /site-display-schema/es-admin-site-local-business-schema-functions.php
     *
     */
    include_once plugin_dir_path( __FILE__ ) . '/site-display-schema/es-admin-site-local-business-schema-functions.php';
    /**
     * Get the display functions for FAQ schema -> /site-display-schema/es-admin-site-faq-schema-functions.php
     *
     */
    include_once plugin_dir_path( __FILE__ ) . '/site-display-schema/es-admin-site-faq-schema-functions.php';
    /**
     * Get the display functions for Logo schema -> /site-display-schema/es-admin-site-logo-schema-functions.php
     *
     */
    include_once plugin_dir_path( __FILE__ ) . '/site-display-schema/es-admin-site-logo-schema-functions.php';
    /**
     * Get the display functions for Sitelinks schema -> /site-display-schema/es-admin-site-sitelinks-schema-functions.php
     *
     */
    include_once plugin_dir_path( __FILE__ ) . '/site-display-schema/es-admin-site-sitelinks-schema-functions.php';
    /**
     * Get the display functions for WooCommerce schema -> /site-display-schema/es-admin-site-woocommerce-schema-functions.php
     *
     */
    include_once plugin_dir_path( __FILE__ ) . '/site-display-schema/es-admin-site-woocommerce-schema-functions.php';
    /**
     * Get the save / update article schema post function and schema output function -> /post-metabox-schema/es-admin-post-article-schema-functions.php
     *
     */
    include_once plugin_dir_path( __FILE__ ) . '/post-metabox-schema/es-admin-post-article-schema-functions.php';
    /**
     * Get the save / update recipe schema post function and schema output function -> /post-metabox-schema/es-admin-post-review-schema-functions.php
     *
     */
    include_once plugin_dir_path( __FILE__ ) . '/post-metabox-schema/es-admin-post-recipe-schema-functions.php';
    /**
     * Get the save / update video object schema post function and schema output function -> /post-metabox-schema/es-admin-post-video-schema-functions.php
     *
     */
    include_once plugin_dir_path( __FILE__ ) . '/post-metabox-schema/es-admin-post-video-schema-functions.php';
    /**
     * Get the save / update software app schema post function and schema output function -> /post-metabox-schema/es-admin-post-software-app-schema-functions.php
     *
     */
    include_once plugin_dir_path( __FILE__ ) . '/post-metabox-schema/es-admin-post-software-app-schema-functions.php';
    /**
     * Get the save / update job posting schema post function and schema output function -> /post-metabox-schema/es-admin-post-job-posting-schema-functions.php
     *
     */
    include_once plugin_dir_path( __FILE__ ) . '/post-metabox-schema/es-admin-post-job-posting-schema-functions.php';
    /**
     * Get the save / update person schema post function and schema output function -> /post-metabox-schema/es-admin-post-person-schema-functions.php
     *
     */
    include_once plugin_dir_path( __FILE__ ) . '/post-metabox-schema/es-admin-post-person-schema-functions.php';
    /**
     * Get the save / update course schema post function and schema output function -> /post-metabox-schema/es-admin-post-course-schema-functions.php
     *
     */
    include_once plugin_dir_path( __FILE__ ) . '/post-metabox-schema/es-admin-post-course-schema-functions.php';
    /**
     * Get the save / update events schema post function and schema output function -> /post-metabox-schema/es-admin-post-events-schema-functions.php
     *
     */
    include_once plugin_dir_path( __FILE__ ) . '/post-metabox-schema/es-admin-post-events-schema-functions.php';
}
