<?php

/*
Plugin Name: NinjaSEO
Plugin URI: https://ninjaseo.com/
Author: 500apps
Author URI: 500apps.com/
Version: 0.3
Description:  NinjaSEO is an exclusive page grader and web crawler plugin to help website owners find and fix pressing issues to improve seo performance.
 */

define('NINJASEOFILE_ROOT', __FILE__);
define('NINJASEO_DIR', plugin_dir_path(__FILE__));

require __DIR__ . '/ninjaseo_functions.php';
spl_autoload_register('ninjaseo_class_loader');

/**
 * Parse configuration
 */
$settings = parse_ini_file(__DIR__ . '/settings.ini', true);
add_action('plugins_loaded', array(\ninjaseoplugin\Ninjaseo::$class, 'init'));

/**
 * Columns Management
 */
add_filter('manage_posts_columns', 'ninjaseo_add_columns');
add_action('manage_posts_custom_column', 'ninjaseo_show_columns');
add_action('template_redirect', 'ninjaseo_service_pages');

add_filter('manage_pages_columns', 'ninjaseo_add_columns');
add_action('manage_pages_custom_column', 'ninjaseo_show_columns');

add_action('admin_print_styles', 'ninjaseo_stylesheet');
function ninjaseo_stylesheet() 
{
    wp_enqueue_style( 'myCSS', plugins_url( '/ninjaseo.css', __FILE__ ) );
}

function wpNinjaSeoScripts(){
    wp_register_script('ninjaapp_script', plugins_url('/js/ninjaseo_admin.js', NINJASEOFILE_ROOT), array('jquery'),time(),true);
    wp_enqueue_script('ninjaapp_script');
}    

add_action('admin_enqueue_scripts', 'wpNinjaSeoScripts');


/**
 * Post Metabox and WP Admin Management
 */
add_action('wp_ajax_ninjaseo_get_value', 'ninjaseo_get_value');
add_action('wp_ajax_ninjaseo_save_keyword', 'ninjaseo_save_keyword');
add_action('wp_ajax_ninjaseo_save_score', 'ninjaseo_save_score');
add_action('add_meta_boxes', 'ninjaseo_add_metabox_keyword');
