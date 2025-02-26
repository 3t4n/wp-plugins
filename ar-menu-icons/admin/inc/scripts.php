<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.
add_action('admin_enqueue_scripts', 'armicn_admin_scripts');
function armicn_admin_scripts (){

    wp_enqueue_media();
    wp_enqueue_style( 'wp-color-picker');
    wp_enqueue_script( 'wp-color-picker');
    wp_enqueue_style( 'dashicons' );

    wp_enqueue_style( 'armicn-fontawesome', ARMICN_DIR_URL . 'admin/assets/lib/font-awesome/css/all.min.css', array(), ARMICN_VERSION );
    wp_enqueue_style( 'armicn-themify-icons', ARMICN_DIR_URL . 'admin/assets/lib/themify/themify-icons.css', array(), ARMICN_VERSION );
    
    wp_enqueue_style( 'armicn-admin-style', ARMICN_DIR_URL . 'admin/assets/css/armicn.css', array(), ARMICN_VERSION );
    wp_enqueue_script( 'armicn-jquery-qucik-search', ARMICN_DIR_URL . 'admin/assets/js/jquery.quicksearch.js', array('jquery'), ARMICN_VERSION, TRUE );
    wp_enqueue_script( 'armicn-admin', ARMICN_DIR_URL . 'admin/assets/js/armicn.js', array('jquery'), ARMICN_VERSION, TRUE );
    
    $user_email = '';
    if(function_exists('wp_get_current_user')){
        $current_user = wp_get_current_user();
        if ($current_user->exists()) {
            $user_email = $current_user->user_email;
        }
    }
    


    wp_localize_script(
            'armicn-admin', 
            'armicn_ajax',
                [
                    'ajaxurl'          => admin_url( 'admin-ajax.php' ),
                    'nonce'            => wp_create_nonce('armicn_nonce'),
                    'plugin_dir_url'    => ARMICN_DIR_URL,
                    'plugin_name'    => __('AR Menu Icons', 'ar-menu-icons'),
                    'plugin_version'    => ARMICN_VERSION,
                    'user_email'    => $user_email,
                    'site_url'    => site_url(),
                ],
        );

}