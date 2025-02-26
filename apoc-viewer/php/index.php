<?php
/**
 * Generate by admin side menu
 */
add_action('admin_menu', 'apoc_init_admin_menu');

function apoc_init_admin_menu() {
    /* css files */
    wp_register_style('apoc_admin_css_style', APOC_PLUGIN_URL .'assets/css/apoc-admin.css');
    wp_enqueue_style('apoc_admin_css_style');

    wp_register_style('apoc_block_css_style', APOC_PLUGIN_URL .'assets/css/apoc-block.css');
    wp_enqueue_style('apoc_block_css_style');

    /* create admin menu */
    $page_title = "APOC";
    $menu_title = "APOC";
    $capability = "manage_options";
    $menu_slug = "apoc-wordpress-app";
    $callback = "apoc_view_menu_page";
    $icon_url = APOC_PLUGIN_URL . 'assets/images/apoc-app-icon.jpg';
//    $icon_url="dashicons-format-image";
    $position = 10;
    add_menu_page(
        $page_title,
        $menu_title,
        $capability,
        $menu_slug,
        $callback,
        $icon_url,
        $position
    );
}

/**
 * Admin menu click on event move page
 *
 * @package   APOC
 * @copyright Copyright(c) 2022, FAMPPY INC
 */
function apoc_view_menu_page() {
    $file = APOC_PLUGIN_DIR . 'php/welcome.php';
    include $file;
}

/**
 * Import script file
 *
 * @package   APOC
 * @copyright Copyright(c) 2022, FAMPPY INC
 */
add_action('enqueue_block_editor_assets', 'apoc_init_script_register');
add_action('wp_enqueue_scripts', 'apoc_init_front_script_register');

/**
 * Generate Apoc block
 *
 * @package   APOC
 * @copyright Copyright(c) 2022, FAMPPY INC
 */
function apoc_init_script_register(){
    wp_enqueue_style('apoc-fa', APOC_PLUGIN_URL . 'assets/css/font-awesome.min.css', array(), '4.7.0', 'all' );
    wp_enqueue_script('apoc-generate-block', APOC_PLUGIN_URL . 'assets/js/apoc-generate-block.js', array('wp-blocks', 'wp-i18n', 'wp-editor'), true, false);
}

/**
 * Front customer post page to check apoc utils
 */
function apoc_init_front_script_register(){
    wp_enqueue_script('apoc-check-utils', APOC_PLUGIN_URL . 'assets/js/apoc-check-utils.js', array('jquery'), true, false);
}
