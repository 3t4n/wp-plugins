<?php

/**
 * We need the generic WPCSL plugin class, since that is the
 * foundation of much of our plugin.  So here we make sure that it has
 * not already been loaded by another plugin that may also be
 * installed, and if not then we load it.
 */
if (defined('ADPRESS_PLUGINDIR')) {
    if (class_exists('wpCSL_plugin__adpress') === false) {
        require_once(ADPRESS_PLUGINDIR.'WPCSL-generic/classes/CSL-plugin.php');
    }
    
    /**
     * This section defines the settings for the admin menu.
     */ 
    global $adpress_plugin;
    $adpress_plugin = new wpCSL_plugin__adpress(
        array(
            'prefix'                => ADPRESS_PREFIX,
            'name'                  => 'AdPress',
            'sku'                   => 'ADPRESS',
            
            'url'                   => 'http://www.cybersprocket.com/products/adpress/',            
            'support_url'           => 'http://www.cybersprocket.com/products/adpress/',
            
            'basefile'              => ADPRESS_BASENAME,
            'plugin_path'           => ADPRESS_PLUGINDIR,
            'plugin_url'            => ADPRESS_PLUGINURL,
            'cache_path'            => ADPRESS_PLUGINDIR . 'cache',
            
            // We don't want default wpCSL objects, let's set our own
            //
            'use_obj_defaults'      => false,
            
            'cache_obj_name'        => 'none',
            'products_obj_name'     => 'none',
            
            'helper_obj_name'       => 'default',
            'notifications_obj_name'=> 'default',
            'settings_obj_name'     => 'default',
            
            // Licensing and Packages
            //
            'license_obj_name'      => 'default',            
            'url'                   => 'http://www.cybersprocket.com/products/adpress/',            
            'support_url'           => 'http://redmine.cybersprocket.com/procets/adpress/',
            'purchase_url'          => 'http://www.cybersprocket.com/products/adpress/',                        
            'has_packages'          => true,            
            
            
            // Themes and CSS
            //
            'display_settings'      => false,
            'themes_obj_name'       => 'none',
            'themes_enabled'        => false,
            'css_prefix'            => 'csl_themes',
            'css_dir'               => ADPRESS_PLUGINDIR . 'css/',
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
    
    // Setup our optional packages
    //
    require_once(ADPRESS_PLUGINDIR . 'include/extra_help_class.php');    
    $adpress_plugin->extrahelper = new ADPRESS_Extra_Help(
        array(
            'parent' => $adpress_plugin
            )
        );
}    

