<?php
/*
Plugin Name: Simple Follow Buttons Light
Plugin URI: https://simplefollowbuttons.com/light/
Description: One of the fastest WordPress follow button plugins available.
Version: 1.0.0
Author: Simple Share Buttons
Author URI: https://simplefollowbuttons.com
License: GPLv2

Copyright 2015 Simple Share Buttons admin@simplefollowbuttons.com

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
    __     _ _            _         _   _
   / _|___| | |_____ __ _| |__ _  _| |_| |_ ___ _ _  ___
  |  _/ _ \ | / _ \ V  V / '_ \ || |  _|  _/ _ \ ' \(_-<
  |_| \___/_|_\___/\_/\_/|_.__/\_,_|\__|\__\___/_||_/__/

*/

//======================================================================
// 		CONSTANTS
//======================================================================

    // set constants
    define('SFBL_FILE', __FILE__);
    define('SFBL_ROOT', dirname(__FILE__));
    define('SFBL_VERSION', '1.0.0');

//======================================================================
// 		 SFBL SETTINGS
//======================================================================

    // get sfbl settings
    $sfbl_settings = get_sfbl_settings();

//======================================================================
// 		INCLUDES
//======================================================================

    // db includes in case needed
    include_once SFBL_ROOT.'/system/models/database.php';

    // frontend side functions
    include_once SFBL_ROOT.'/system/controllers/buttons.php';

//======================================================================
// 		ADMIN ONLY
//======================================================================

    // register/deactivate/uninstall
    register_activation_hook(__FILE__, 'sfbl_activate');
    //register_deactivation_hook( __FILE__, 'sfbl_deactivate' );
    register_uninstall_hook(__FILE__, 'sfbl_uninstall');

    // sfbl admin area hook
    add_action('plugins_loaded', 'sfbl_admin_area');

    // sfbl admin area
    function sfbl_admin_area()
    {
        // if in admin area
        if (is_admin()) {
            // can manage plugin options
            if (current_user_can('manage_options')) {
                // include the admin panel
                include_once SFBL_ROOT.'/system/views/admin_panel.php';

                // include core admin requirements
                include_once plugin_dir_path(__FILE__).'/system/controllers/admin_bits.php';

                // add menu to dashboard
                add_action('admin_menu', 'sfbl_menu');

                // lower than current version
                if (get_option('sfbl_version') < SFBL_VERSION) {
                    // run upgrade script
                    upgrade_sfbl(get_option('sfbl_version'));
                }

                // if viewing an sfbl admin page
                if (isset($_GET['page']) && $_GET['page'] == 'simple-follow-buttons-light') {
                    // admin and sfbl admin pages only includes
                    include_once plugin_dir_path(__FILE__).'/system/models/admin_save.php';
                    include_once plugin_dir_path(__FILE__).'/system/helpers/forms.php';

                    // add the admin styles
                    add_action('admin_print_styles', 'sfbl_admin_styles');

                    // also include js
                    add_action('admin_print_scripts', 'sfbl_admin_scripts');
                }
            }
        }
    }

//======================================================================
// 		ADMIN HOOKS
//======================================================================

    // add filter hook for plugin action links
    add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'sfbl_settings_link');

//======================================================================
// 		SHORTCODES
//======================================================================

    // register shortcode [sfbl]
    add_shortcode('sfbl', 'sfbl_buttons');

//======================================================================
// 		FRONTEND HOOKS
//======================================================================

    // add follow buttons to content and/or excerpts
    add_filter('the_content', 'sfbl_show_follow_buttons');

    // hook into head to add css
    add_action('wp_head','hook_css');

    // add sfbl css
    function hook_css()
    {
    	$output="<style>.sfbl-wrap .sfbl-container .sfbl-img{width:50px;height:50px;padding:5px;border:0;box-shadow:0;display:inline}.sfbl-wrap .sfbl-container a{border:0}</style>";

    	echo $output;

    }

//======================================================================
// 		GET SFBL SETTINGS
//======================================================================

    // return sfbl settings
    function get_sfbl_settings()
    {
        // get json array settings from DB
        $jsonSettings = get_option('sfbl_settings');

        // decode and return settings
        return json_decode($jsonSettings, true);
    }

//======================================================================
// 		UPDATE SFBL SETTINGS
//======================================================================

    // update an array of options
    function sfbl_update_options($arrOptions)
    {
        // if not given an array
        if (! is_array($arrOptions)) {
            die('Value parsed not an array');
        }

        // get sfbl settings
        $jsonSettings = get_option('sfbl_settings');

        // decode the settings
        $sfbl_settings = json_decode($jsonSettings, true);

        // loop through array given
        foreach ($arrOptions as $name => $value) {
            // update/add the option in the array
            $sfbl_settings[$name] = $value;
        }

        // encode the options ready to save back
        $jsonSettings = json_encode($sfbl_settings);

        // update the option in the db
        update_option('sfbl_settings', $jsonSettings);
    }
