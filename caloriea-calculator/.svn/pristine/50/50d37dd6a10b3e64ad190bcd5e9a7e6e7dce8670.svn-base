<?php 
/**
* Plugin Name: Calorie Calculator
* Description: For Using This Plugin you Can Know That How Many calories You burn daily
* Version: 1.1
* Copyright: 2023
* License: GPLv3 or later
* Text Domain: calorie-calculator
*/


if (!defined('ABSPATH')) {
    die('-1');
}


// Include function files
include_once('backend/backend.php');
include_once('frontend/frontend.php');

function cfw_load_script_style() {
    // Get the plugin directory path dynamically
    $plugin_dir_path = plugin_dir_path(__FILE__);
    
    // Define the paths for the JavaScript and CSS files
    $ccfw_js_path = $plugin_dir_path . 'frontend/assets/js/script.js';
    $ccfw_css_path = $plugin_dir_path . 'frontend/assets/css/style.css';

    // Define versioning based on file modification times
    $ccfw_js_version = filemtime($ccfw_js_path);
    $ccfw_css_version = filemtime($ccfw_css_path);

    // Enqueue custom JavaScript with versioning
    wp_enqueue_script(
        'jquery-calculator', 
        plugins_url('frontend/assets/js/script.js', __FILE__), // Get the URL for the JS file
        array('jquery'), // Dependencies
        $ccfw_js_version, // Versioning based on file modification time
        true // Load in footer (true)
    );
    
    // Enqueue custom CSS with versioning
    wp_enqueue_style(
        'jquery-calculator-style', 
        plugins_url('frontend/assets/css/style.css', __FILE__), // Get the URL for the CSS file
        array(), // No dependencies
        $ccfw_css_version // Versioning based on file modification time
    );
}

add_action('wp_enqueue_scripts', 'cfw_load_script_style');
