<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// enqueue-scripts.php
// Enqueue styles and scripts for the front end
function ptenm_restaurant_reviews_enqueue_plugin_scripts() {
    if (!is_admin()) {
        // Construct the correct paths
        $style_path = plugin_dir_path(__DIR__) . 'assets/css/style.css'; // Absolute path to the CSS file
        $style_url = plugin_dir_url(__DIR__) . 'assets/css/style.css';  // URL to the CSS file

        // Check if the file exists to avoid errors
        if (file_exists($style_path)) {
            $style_version = filemtime($style_path); // Get the file modification time
            wp_enqueue_style('ptenm_restaurant_reviews-reviews-styles', $style_url, array(), $style_version);
        }
    }
}
add_action('wp_enqueue_scripts', 'ptenm_restaurant_reviews_enqueue_plugin_scripts');

// Enqueue styles and scripts for the admin area
function ptenm_restaurant_reviews_enqueue_admin_scripts() {
    // Enqueue the admin-specific CSS for the reviews in the backend
    $admin_style_version = filemtime(plugin_dir_path(__FILE__) . '../assets/css/admin-style.css'); // Get the file modification time
    wp_enqueue_style('ptenm_restaurant_reviews-reviews-admin-styles', plugin_dir_url(__FILE__) . '../assets/css/admin-style.css', array(), $admin_style_version);

      // Enqueue additional admin-specific CSS
      $additional_css_version = filemtime(plugin_dir_path(__FILE__) . '../assets/css/review-settings.css'); // Get the file modification time
      wp_enqueue_style('ptenm_restaurant_reviews-review-settings-styles', plugin_dir_url(__FILE__) . '../assets/css/review-settings.css', array(), $additional_css_version);
  
    // Enqueue additional admin-specific JS
    // Enqueue review-settings.js
    $settings_js_version = filemtime(plugin_dir_path(__FILE__) . '../assets/js/review-settings.js'); // Get the file modification time
    wp_enqueue_script(
        'ptenm_restaurant_reviews-review-settings-js',
        plugin_dir_url(__FILE__) . '../assets/js/review-settings.js',
        array('jquery'),
        $settings_js_version,
        true
    );

    // Enqueue review-edit.js
    $edit_js_version = filemtime(plugin_dir_path(__FILE__) . '../assets/js/review-edit.js'); // Get the file modification time
    wp_enqueue_script(
        'ptenm_restaurant_reviews-review-edit-js',
        plugin_dir_url(__FILE__) . '../assets/js/review-edit.js',
        array('jquery'),
        $edit_js_version,
        true
    );

    // Localize the script to pass `ajaxurl` and nonce
    wp_localize_script(
        'ptenm_restaurant_reviews-review-edit-js',
        'ptenm_restaurant_reviews',
        array(
            'ajaxurl' => admin_url('admin-ajax.php'), // WordPress AJAX URL
            'nonce' => wp_create_nonce('ptenm_restaurant_reviews_nonce'), // Security nonce
        )
    );


        // Enqueue the color picker
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
    
        // Initialize the color picker in the admin
        wp_add_inline_script('wp-color-picker', '
            jQuery(document).ready(function($){
                $(".ptenm_restaurant_reviews-color-picker").wpColorPicker();
            });
        ');
}
add_action('admin_enqueue_scripts', 'ptenm_restaurant_reviews_enqueue_admin_scripts');