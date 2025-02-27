<?php
//all connections are from here
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
//admin
require_once plugin_dir_path(__FILE__) . 'includes/hmw-general-functions.php';
//core
require_once plugin_dir_path(__FILE__) . 'includes/hmw-https-protection.php';

 //Robots
 require_once plugin_dir_path(__FILE__) . 'includes/hmw-robots-functions.php';

//search engine discourage control
add_action('admin_init', 'hmwp_disable_crawlers_load');


/**
 * Enable crawl
 */
function hmwp_revert_robots_txt() {
    // error_log('blog_publicdeact');
    update_option('blog_public', '1');  // Allow search engines
}


/**
 * Disable crawl
 */
function hmwp_disable_crawlers_load() {
    
    $value = get_option('hmw_prevent_indexing');
    
    if($value){
        update_option('blog_public', '0');  // Disallow search engines
    }else{
        update_option('blog_public', '1');  // Allow search engines
    }
}
//enque some assets here
function hmw_enqueue_admin_assets() {
    // Check if we're on the "Hide My Website" settings page
    if (isset($_GET['page']) && $_GET['page'] === 'hide-my-website') {
        // Enqueue the stylesheet
        wp_enqueue_style(
            'hmw-render-style',
            plugin_dir_url(__FILE__) . 'render/css/hwm-render-style.css',
            array(),
            '1.0'
        );

        // Enqueue the JavaScript file
        wp_enqueue_script(
            'hmw-render-script',
            plugin_dir_url(__FILE__) . 'render/js/hwm-render-admin.js',
            array('jquery'), // Include jQuery as a dependency if needed
            '1.0',
            true // Load in the footer
        );
    }
}
add_action('admin_enqueue_scripts', 'hmw_enqueue_admin_assets');
