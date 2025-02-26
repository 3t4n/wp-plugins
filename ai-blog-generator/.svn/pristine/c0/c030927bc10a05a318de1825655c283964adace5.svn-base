<?php
/**
* Plugin Name: AI Blog Generator
* Plugin URI: https://wordpress.org/plugins/ai-blog-generator/
* Description: AI Blog Generator for WP Sites.
* Version: 1.0.3
* Author: Kudosta Solution LLP.
* Author URI: https://kudosta.com/
* License: GPLv2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: ai-blog-generator
*/

// Ensure that the script is not directly accessed.
if (!defined('ABSPATH')){
    exit; // Exit if accessed directly    
}

// Include WordPress plugin API to ensure plugin functionality.
include_once (ABSPATH . 'wp-admin/includes/plugin.php');

// Define the plugin path constant for easy reference throughout the code.
define('AI_BLOG_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('AI_BLOG_PLUGIN_BASE_NAME', plugin_basename(__FILE__));

// Register activation and deactivation hooks for the plugin.
// These functions will be called when the plugin is activated or deactivated.
register_activation_hook(__FILE__, 'AI_blog_install');
register_deactivation_hook(__FILE__, 'AI_blog_uninstall');

// Function to handle tasks when the plugin is activated.
// You can add database tables, options, or other initialization code here.
function AI_blog_install(){
    // Add tasks on plugin activation, if any.
}

// Function to handle tasks when the plugin is deactivated.
// You can remove options or clean up tasks here.
function AI_blog_uninstall(){
    // Add cleanup tasks on plugin deactivation, if any.
}

// Enqueue frontend styles and scripts for the plugin.
add_action('wp_enqueue_scripts', 'AI_blog_enqueued_assets');
function AI_blog_enqueued_assets(){
    // Enqueue the main CSS for the frontend of the plugin.
    $css_version = filemtime(plugin_dir_path(__FILE__) . 'assets/css/style.css');
    wp_enqueue_style('ai-blog-css', plugin_dir_url(__FILE__) . 'assets/css/style.css', false, $css_version, 'all');
    
    // Register the main JavaScript file for the frontend.
    $js_version = filemtime(plugin_dir_path(__FILE__) . 'assets/js/plugin.js');
    wp_register_script( 'ai-blog-js',  plugin_dir_url(__FILE__) . 'assets/js/plugin.js', array('jquery'), $js_version, true );

    // Localize the script to pass PHP variables to JavaScript (such as AJAX URL).
    wp_localize_script('ai-blog-js', 'AI_Blog_WP_ARGS', array(
        'siteurl' => get_option('siteurl'),  // WordPress site URL.
        'ajaxurl' => admin_url('admin-ajax.php'),  // URL for admin AJAX functionality.
    ));
    
    // Enqueue the JavaScript file after localization.
    wp_enqueue_script('ai-blog-js');
}

// Enqueue admin-specific styles and scripts for the plugin.
add_action('admin_enqueue_scripts', 'AI_blog_admin_enqueued_assets');
function AI_blog_admin_enqueued_assets(){
    // Enqueue the CSS file for the plugin in the WordPress admin dashboard.
    $css_version = filemtime(plugin_dir_path(__FILE__) . 'assets/css/admin.css');
    wp_enqueue_style('ai-blog-admin-css', plugin_dir_url(__FILE__) . 'assets/css/admin.css', false, $css_version, 'all');
    
    // Register the JavaScript file for the plugin in the WordPress admin dashboard.
    $js_version = filemtime(plugin_dir_path(__FILE__) . 'assets/js/admin.js');
    wp_register_script( 'ai-blog-admin-js',  plugin_dir_url(__FILE__) . 'assets/js/admin.js', array('jquery'), $js_version, true );

    // Localize the script to pass PHP variables to JavaScript for use in the admin panel.
    wp_localize_script('ai-blog-admin-js', 'AI_Blog_Admin_WP_ARGS', array(
        'siteurl' => get_option('siteurl'),  // WordPress site URL.
        'ajaxurl' => admin_url('admin-ajax.php'),  // URL for admin AJAX functionality.
        'nonce'   => wp_create_nonce('ai_blog_nonce'), // This is for security
        'generatingText' => __('Generating...', 'ai-blog-generator'),
        'generateNewText' => __('Generate a New Blog Post', 'ai-blog-generator'),
        'emptyFieldError' => __('The field cannot be empty or blank.', 'ai-blog-generator'),
        'wordCountError' => __('The post topic must be at least 5 words long.', 'ai-blog-generator'),
        'alphaOnlyError' => __('The field can only contain alphabetic characters.', 'ai-blog-generator'),
        'numericError' => __('The words limit must contain only numeric values.', 'ai-blog-generator'),
        'minLimitError' => __('The words limit must be at least 50.', 'ai-blog-generator'),
        'maxLimitError' => __('The words limit must not exceed 500. <a href="https://products.kudosta.com" target="_blank">Upgrade to premium</a> for a higher limit.', 'ai-blog-generator'),
    ));
    
    // Enqueue the JavaScript file after localization for the admin panel.
    wp_enqueue_script('ai-blog-admin-js');
}

// Render the Premium Plugin Promotion Section
function ai_blog_premium_promotion_section() {
    ?>
    <div class="ai-blog-premium-promotion">
        <h2><?php esc_html_e('Upgrade to AI Blog Premium', 'ai-blog-generator'); ?></h2>
        <p><?php esc_html_e('Unlock advanced features and take your blogging to the next level with our premium plugin. Get access to extended word limits, priority support, and much more!', 'ai-blog-generator'); ?></p>
        <a href="https://products.kudosta.com" target="_blank" class="button button-primary">
            <?php esc_html_e('Upgrade to Premium', 'ai-blog-generator'); ?>
        </a>
    </div>
    <?php
}


// Include the custom admin menu class, which will define the admin panel functionality for the plugin.
require_once 'includes/class-admin-menu.php';

?>