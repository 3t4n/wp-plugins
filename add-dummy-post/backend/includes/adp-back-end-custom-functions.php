<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// import page settings
function adp_dummy_settings()
{
    include ADP_ADMIN_DIR . '/methods/adp-import-settings.php';
}

/**
 * on the submitting of import url, data will start to import
 */
include ADP_ADMIN_DIR . '/methods/adp-import-functions.php';

/**
 * Add Custom admin menu
 */
function adp_add_custom_admin_menu()
{
    add_management_page(esc_html__('Dummy Post Settings', 'adp'), esc_html__('Add Dummy Post', 'adp'), 'manage_options', 'adp-post', 'adp_dummy_settings');
}
add_action('admin_menu', 'adp_add_custom_admin_menu');


//function to check the session
function adp_register_my_session()
{
    if (!session_id()) {
        session_start();
    }
}

add_action('init', 'adp_register_my_session');
