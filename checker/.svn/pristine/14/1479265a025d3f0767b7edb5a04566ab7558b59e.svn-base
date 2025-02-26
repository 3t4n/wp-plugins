<?php
/**
* Plugin Name: Checker
* Description: Checklist
* Version: 0.1.0
* Author: Media Jedi
* License: GPL+2
* Text Domain: checker
*/
// Exit if accessed directly
if ( ! defined('ABSPATH') ) {
    exit;
}


add_action( 'admin_init', 'chkr_admin_init_plugin', 1 );
function chkr_admin_init_plugin(){

    global $chkr_plugin_url;
    $chkr_plugin_url = plugin_dir_url( __FILE__ );

    include(plugin_dir_path(__FILE__ ) . 'inc/checklist-manager.php');

}

add_action('init', 'chkr_init_plugin');
function chkr_init_plugin() {
    // register post
    chkr_register_custom_post_type();

    //register custom routes
    chkr_register_custom_routes();
}

function chkr_register_custom_post_type() {
    register_post_type('chkr_task',
        array(
            'labels' => array(
                'name' => __('Tasks'),
                'singular_name' => __('Task')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'chkr_task'),
            'show_in_rest' => true, 
            'show_ui' => false,
        )
    );
}

function chkr_register_custom_routes() {
    include(plugin_dir_path(__FILE__ ) . 'inc/custom-routes/tasks.php');
    $task_custom_routes = new CHKR_Task_Custom_Routes();
}

// Register tab
add_action('admin_menu', 'chkr_admin_menu_page');
function chkr_admin_menu_page() {
    add_menu_page(
        __( 'Checker', 'checker' ),
        'Checker',
        'manage_options',
        'checker',
        'chkr_checklist_manager_callback',
        'dashicons-yes-alt'
    );

}


?>