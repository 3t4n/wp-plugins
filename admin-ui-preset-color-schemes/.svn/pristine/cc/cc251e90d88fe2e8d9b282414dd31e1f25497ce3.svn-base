<?php
/**
 * Plugin Name: Admin UI - Preset color schemes
 * Description: Clean admin theme. 
 * Tags: admin ui, admin color schemes, wordpress admin ui
 * Version: 1.0.1
 * Stable tag: 1.0.1
 * Author: SpiceHook Solutions
 * Author URI: https://www.spicehook.biz
 * Text Domain: sh-language
 * Requires at least: 4.6.0
 * Tested up to: 6.1.1
 * Requires PHP: 5.6
 * PHP Version Tested up to: 8.1
 * License: GPLv2
 */
// protection
if (!defined('ABSPATH')) {
    exit;
}
// Exit if accessed directly
define('SH_AU_VERSION', 101);

function sh_au_register_activation_hook()
{
    if (version_compare(get_bloginfo("version"), "4.5", "<")) {
        wp_die("Please update WordPress to use this plugin");
    }
    update_option('SH_AU_VERSION', SH_AU_VERSION);
}
register_deactivation_hook(__FILE__, 'sh_au_deactivate');
register_uninstall_hook(__FILE__, 'sh_au_deactivate_uninstall');
function sh_au_deactivate_uninstall()
{
    delete_option('SH_AU_VERSION');
}
function sh_au_deactivate()
{
    delete_option('SH_AU_VERSION');
}

function sh_au_init()
{
    register_activation_hook(__FILE__, "sh_au_register_activation_hook");
    
    
}
sh_au_init(); 


function sh_au_admin_theme_styles()
{
    wp_enqueue_style(
		'sh-au-admin-theme-style',
		plugin_dir_url(__FILE__) . 'admin-ui-css/sh-au-admin.css'
	);

}
add_action( 'admin_enqueue_scripts', 'sh_au_admin_theme_styles' );
?>