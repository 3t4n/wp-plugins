<?php
defined('ABSPATH') or die('not allowed.');

/**
 * Register a custom menu page.
 */
function custom_tag_manager_admin_menu(){
    add_menu_page( 
        __( 'Custom tag manager panel', 'textdomain' ),
        'Tag Manager',
        'manage_options',
        'custom-tag-manager',
        'load_custom_tag_manager_admin_page',
        plugins_url( 'add-custom-google-tag-manager/assets/images/icon.png' ),
        10
    ); 
}
add_action( 'admin_menu', 'custom_tag_manager_admin_menu' );
 
/**
 * Display dashboard page
 */
function load_custom_tag_manager_admin_page(){
    include 'dashboard.php';
}