<?php
/*
Plugin Name: Smartwaiver Waiver Widget
Plugin URI: https://www.smartwaiver.com/
Description: Easily add the Smartwaiver Waiver Widget to your WordPress site so customers can sign your digital waiver without ever leaving your site.
Version: 2.0.3
Author: Smartwaiver
Author URI: https://www.smartwaiver.com/
*/

// exit if accessed directly
if(!defined('ABSPATH')){ exit; }

// GLOBAL VARIABLES
$SW_BUILD_SNIPPET_LINK = "https://www.smartwaiver.com/m/webpl/webpl.php?webpl_create";
$SW_SETTINGS = "smartwaiver_settings";
$SW_SETTINGS_FIELD = "smartwaiver_settings";
$SW_SNIPPET = "smartwaiver_snippet";
$SW_PAGE = "smartwaiver_page";


// INITIALIZE THE SMARTWAIVER PLUGIN - REGISTER
function smartwaiver_init(){
    global $SW_SETTINGS, $SW_SETTINGS_FIELD;
    register_setting(
        $SW_SETTINGS,
        $SW_SETTINGS_FIELD);
}
add_action('admin_init', 'smartwaiver_init');


// CREATE ADMIN PAGE UNDER WP SETTINGS
function smartwaiver_admin_actions() {
    add_options_page(
        "Smartwaiver Waiver Widget Setup", // admin page title
        "Smartwaiver", // name of Settings' submenu (Smartwaiver)
        "manage_options", // roles and permissions
        "smartwaiver_settings", //$config_link_slug
        "smartwaiver_config_page" // link to the SW config admin page
    );
}
// Hook: add smartwaiver to administration menu
add_action('admin_menu', 'smartwaiver_admin_actions');


// INCLUDE SMARTWAIVER_CONFIG_PAGE.PHP
function smartwaiver_config_page() {
    global $SW_BUILD_SNIPPET_LINK, $SW_SETTINGS, $SW_SETTINGS_FIELD, $SW_SNIPPET, $SW_PAGE;
    include('smartwaiver_config_page.php');
}


// ADD SCRIPT TO SPECIFIED PAGE(S) IN FOOTER
function smartwaiver_add_sw_snippet_to_footer(){
    global $SW_SETTINGS_FIELD, $SW_SNIPPET, $SW_PAGE;
    $sw_settings = get_option($SW_SETTINGS_FIELD); // access wp sw db
    $pageSelectedId = $sw_settings[$SW_PAGE];

    if ($pageSelectedId == '-1'){ // 'All Pages' selected
        echo $sw_settings[$SW_SNIPPET];
    } elseif (is_front_page() && $pageSelectedId == '-2'){ // 'Front Page Only' selected
        echo $sw_settings[$SW_SNIPPET];
    } elseif (get_post()->ID == $pageSelectedId){ // A single page was selected
        echo $sw_settings[$SW_SNIPPET];
    }
//    else { echo '<script type="text/javascript">console.log(' . $pageSelectedId . ');</script>'; }
}
// Hook: add to footer
add_action('wp_footer', 'smartwaiver_add_sw_snippet_to_footer');
