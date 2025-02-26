<?php 
    /*
    Plugin Name: Auto Link Generator iTunes
    Plugin URI: http://www.kisimedia.de
    Description: This Plugin automatically makes an Affilate Link out of every iTunes Link in your Blog
    Author: Kisimedia.de
    Version: 1.0.1
    Author URI: http://www.kisimedia.de
    */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit();


/*
 * Import Admin View and Scripts
 * @ Since 1.0.0
 */
function autolinkitunes_admin() {
    if (current_user_can('manage_options')) {
        include('autolink_import_admin.php');
    } else {
        wp_die( __('You do not have sufficient permissions to access this page.') );
    }
}

/* 
 * Add Plugin to Admin Menu
 * @ Since 1.0.0
 */
function autolinkitunes_admin_actions() {
    add_options_page("Auto Link iTunes", "Auto Link iTunes", 1, "Auto Link iTunes", "autolinkitunes_admin");
}
 
add_action('admin_menu', 'autolinkitunes_admin_actions');

/* 
 * Add Plugin Script to the footer of every page
 * @ Since 1.0.0
 */
function autolinkitunes_admin_script()
{
    if(trim(get_option('autolinkitunes_token')) != "") {
        echo "<script type='text/javascript'>var _merchantSettings=_merchantSettings || [];_merchantSettings.push(['AT', '".get_option('autolinkitunes_token')."']);(function(){var autolink=document.createElement('script');autolink.type='text/javascript';autolink.async=true; autolink.src= ('https:' == document.location.protocol) ? 'https://autolinkmaker.itunes.apple.com/js/itunes_autolinkmaker.js' : 'http://autolinkmaker.itunes.apple.com/js/itunes_autolinkmaker.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(autolink, s);})();</script>";
    }
}

add_action( 'wp_footer', 'autolinkitunes_admin_script');


/* 
 * Add Links to Plugin Page (Settings/Support/Donate)
 * @ Since 1.0.1
 */
add_filter( 'plugin_action_links', 'add_action_plugin', 10, 5 );
function add_action_plugin( $actions, $plugin_file ) 
{
    static $plugin;

    if (!isset($plugin))
        $plugin = plugin_basename(__FILE__);
    if ($plugin == $plugin_file) {

            $settings = array('settings' => '<a href="options-general.php?page=Auto%20Link%20iTunes#redirecthere">' . __('Settings', 'General') . '</a>');
            $site_link = array('support' => '<a href="mailto:kontakt@kisimedia.de?Subject=Help with WP Plugin" target="_blank">Support</a>');
            $donate = array('donate' => '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=GALJKHVNEE334" target="_blank">Donate</a>');
        
                $actions = array_merge($donate, $actions);
                $actions = array_merge($site_link, $actions);
                $actions = array_merge($settings, $actions);
            
        }
        
        return $actions;
}

?>