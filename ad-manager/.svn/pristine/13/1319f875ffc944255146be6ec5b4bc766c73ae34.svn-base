<?php
/**
 * Plugin Name: Ad Manager
 * Plugin URI: http://myplugin.nexuslinkservices.com
 * Description: This plugin set dynamic ad at any place in website.
 * Version: 1.0.0
 * Author: NexusLink Services
 * Author URI: http://nexuslinkservices.com
 * License: GPL2
 */
require_once('pages/admanager_shortcode.php');

function admanager_options_install() {

    global $wpdb;

    $table_name = $wpdb->prefix . "admanager";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
            `id` bigint(100) NOT NULL AUTO_INCREMENT,
         `title` varchar(255) NOT NULL,
         `ad_image` varchar(255) NOT NULL,
         `target_url` varchar(255) NOT NULL,
         `div_width` varchar(255) NOT NULL,
         `div_height` varchar(255) NOT NULL,
         `short_code` varchar(255) NOT NULL,
         `clicks` int(11) NOT NULL,
         `created_date` datetime NOT NULL,
         `status` int(11) NOT NULL,
         PRIMARY KEY  (`id`)
        ) $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

function load_wp_media_files() {
    wp_enqueue_media();
    wp_register_style('custom_wp_admin_style', plugins_url('/css/style-admin.css', __FILE__), false, '1.0.0');
    wp_enqueue_style('custom_wp_admin_style');
}

add_action('admin_enqueue_scripts', 'load_wp_media_files');
// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'admanager_options_install');

//menu items
add_action('admin_menu', 'admanager_modifymenu');

function admanager_modifymenu() {

    //this is the main item for the menu
    add_menu_page('Ad Manager', //page title
            'Ad Manager', //menu title
            'manage_options', //capabilities
            'ad_list', //menu slug
            'ad_list' //function
    );

    //this is a submenu
    add_submenu_page('ad_list', //parent slug
            'Add New Ad', //page title
            'Add New', //menu title
            'manage_options', //capability
            'ad_create', //menu slug
            'ad_create'); //function
    //this is a submenu
    add_submenu_page(null, //parent slug
            'Update Ad', //page title
            'Update', //menu title
            'manage_options', //capability
            'ad_update', //menu slug
            'ad_update'); //function
}

define('ROOTDIR', plugin_dir_path(__FILE__));

require_once(ROOTDIR . 'pages/admanager-list.php');
require_once(ROOTDIR . 'pages/admanager-create.php');
require_once(ROOTDIR . 'pages/admanager-update.php');
