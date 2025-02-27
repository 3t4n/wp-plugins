<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
 
// Function to enqueue custom JavaScript for the admin
function digages_enqueue_frontadmin_scripts() { 
    //Bootstrap js
    
    // Enqueue Bootstrap CSS and JS
    wp_enqueue_style('digages-admin-direct-payments', plugin_dir_url(__FILE__) . '../assets/css/digages-direct-payments.css', array(), '1.5.1', 'all');
    wp_enqueue_style('bootstrap-css', plugin_dir_url(__FILE__) . '../assets/css/bootstrap.min.css', array(), '1.5.1', 'all');
    wp_enqueue_style('bootstrap-font', plugin_dir_url(__FILE__) . '../assets/css/bootstrap-icons.min.css', array(), '1.5.1', 'all');
    wp_enqueue_script('bootstrap-js', plugin_dir_url(__FILE__) . '../assets/js/bootstrap.bundle.min.js', array('jquery'), '5.2.4', true);
    
        // Enqueue popup CSS and JS
        wp_enqueue_style('digages-new-popup-css', plugin_dir_url(__FILE__) . '../assets/css/popup.css', array(), '2.0.1', 'all');
        wp_enqueue_script('digages-new-popup-js', plugin_dir_url(__FILE__) . '../assets/js/popup.js', array('jquery'), '2.0.1', true);
        wp_enqueue_style('digages-new-grid-css', plugin_dir_url(__FILE__) . '../assets/css/grid.css', array(), '2.0.1', 'all');
    
}

// Hook into the admin_enqueue_scripts action for admin scripts
add_action('admin_enqueue_scripts', 'digages_enqueue_frontadmin_scripts');

add_action('wp_enqueue_scripts', 'digages_enqueue_frontadmin_scripts'); // Frontend 
?>