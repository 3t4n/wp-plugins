<?php
/**
 * Add plugin menu pages
 */
function apg_add_menu_pages() {
    add_menu_page(
        __('Arvand Posts', 'arvnad-posts'),
        __('Arvand Posts', 'arvnad-posts'),
        'manage_options',
        'arvnad-posts',
        'apg_page_callback',
        'dashicons-screenoptions'
    );

    global $general_page_hook;

    $general_page_hook = add_submenu_page(
        'arvnad-posts',
        __('General', 'arvnad-posts'),
        __('General', 'arvnad-posts'),
        'manage_options',
        'apg-general',
        'apg_general_callback'
    );

    global $options_page_hook;

    $options_page_hook = add_submenu_page(
        'arvnad-posts',
        __('Styles & Settings', 'arvnad-posts'),
        __('Styles & Settings', 'arvnad-posts'),
        'manage_options',
        'apg-options',
        'apg_options_callback'
    );

    global $information_page_hook;

    $information_page_hook = add_submenu_page(
        'arvnad-posts',
        __('Information', 'arvnad-posts'),
        __('Information', 'arvnad-posts'),
        'manage_options',
        'apg-information',
        'apg_information_callback'
    );

    remove_submenu_page('arvnad-posts', 'arvnad-posts');
}
add_action('admin_menu', 'apg_add_menu_pages');

/**
 * plugin main page callback
 */
function apg_page_callback() {
    include APG_ADMIN_PATH . 'general-page.php';
}

/**
 * General submenu page callback
 */
function apg_general_callback() {
    include APG_ADMIN_PATH . 'general-page.php';
}

/**
 * Options submenu page callback
 */
function apg_options_callback() {
    include APG_ADMIN_PATH . 'options-page.php';
}

/**
 * Information submenu page callback
 */
function apg_information_callback() {
    include APG_ADMIN_PATH . 'information-page.php';
}