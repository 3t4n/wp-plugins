<?php

/*
Plugin Name: HTML Block
Plugin URI: https://www.codeteam.in/product/html-block/
Description: Create your HTML block and place it anywhere on your site using a shortcode.
Version: 1.1
Author: Siddharth Nagar
Author URI: http://www.codeteam.in/
License: GPLv2
*/

if ( !defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

if ( ! defined( 'SN_HB_AUTHOR_URL' ) ) {
    define( 'SN_HB_AUTHOR_URL', 'https://www.codeteam.in/' );
}

if ( ! defined( 'SN_HB_PLUGIN_URL' ) ) {
    define( 'SN_HB_PLUGIN_URL', SN_HB_AUTHOR_URL.'product/html-block/' );
}

if ( ! defined( 'SN_HB_PLUGIN_VERSION' ) ) {
    define( 'SN_HB_PLUGIN_VERSION', '1.1' );
}

if ( ! defined( 'SN_HB_SLUG' ) ) {
    define( 'SN_HB_SLUG', 'html-block' );
}

if ( ! defined( 'SN_HB_DIR' ) ) {
    define( 'SN_HB_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'SN_HB_URL' ) ) {
    define( 'SN_HB_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'SN_HB_FILE' ) ) {
    define( 'SN_HB_FILE', __FILE__ );
}

if ( ! defined( 'SN_HB_FILE_NAME' ) ) {
    define( 'SN_HB_FILE_NAME', plugin_basename(__FILE__) );
}


/**
 * Initialize the plugin
 * @description Function to initiate the plugin installation
 */
function sn_hb_init() {
    $labels = array(
        'name' => _x('HTML Blocks', 'post type general name'),
        'singular_name' => _x('HTML Block', 'post type singular name'),
        'add_new' => _x('Add New', 'HTML Block'),
        'add_new_item' => __('Add New HTML Block'),
        'edit_item' => __('Edit HTML Block'),
        'new_item' => __('New HTML Block'),
        'view_item' => __('View HTML Block'),
        'search_items' => __('Search HTML Block'),
        'not_found' =>  __('No HTML Block found'),
        'not_found_in_trash' => __('No HTML Block found in Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'HTML Blocks'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-tagcloud',
        'exclude_from_search' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor'),
        'rewrite' => array(
            'slug'       => 'html-block',
            'with_front' => FALSE,
        )
    );
    register_post_type('html-block',$args);
}
add_action('init', 'sn_hb_init');

/**
 * Plugin loaded
 * @description Function to initiate the plugin installation
 * @return null
 */
function sn_hb_loaded() {

    load_plugin_textdomain( SN_HB_SLUG, false, dirname( plugin_basename( __FILE__ ) ). '/languages/' );

    if(file_exists(SN_HB_DIR.'/includes/class.sn-hb-init.php')) {
        require_once(SN_HB_DIR.'/includes/class.sn-hb-init.php');
    }
}
add_action( 'plugins_loaded', 'sn_hb_loaded', 10 );