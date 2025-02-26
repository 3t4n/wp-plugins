<?php
/*
Plugin Name: ATN Ajax Search
Description: ATN Ajax Search is a powerful AJAX-based search plugin for WordPress that allows users to search posts or custom post types using a fast and responsive AJAX search bar.
Version: 1.1.0
Requires at least: 5.6
Requires PHP: 7.0
Author: Aciano Technologies
License: GPL-2.0-or-later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: atn-ajax-search
Domain Path: /languages
*/

// Hook into WordPress initialization
function ajax_search_plugin_enqueue_scripts() {
    // Enqueue jQuery (if it's not already included)
    wp_enqueue_script('jquery');

    // Enqueue custom JS for AJAX functionality
    wp_enqueue_script('ajax-search-plugin', plugin_dir_url(__FILE__) . 'js/ajax-search.js', array('jquery'), null, true);

    // Localize script to pass AJAX URL to JavaScript
    wp_localize_script('ajax-search-plugin', 'ajaxsearch', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));

    // Optionally, add CSS for search result styles
    wp_enqueue_style('ajax-search-plugin-style', plugin_dir_url(__FILE__) . 'css/style.css');
}
add_action('wp_enqueue_scripts', 'ajax_search_plugin_enqueue_scripts');

function ajax_search_plugin_ajax_handler() {
    // Get the search query and post type
    $search_query = isset($_POST['query']) ? sanitize_text_field($_POST['query']) : '';
    $post_type = isset($_POST['post_type']) ? sanitize_text_field($_POST['post_type']) : 'product'; // Default to 'product'

    // If there's a query, proceed with search
    if (!empty($search_query)) {
        $args = array(
            'post_type' => $post_type,  // Dynamically set the post type
            'posts_per_page' => -1,     // Limit the number of results
            's' => $search_query        // Search query
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
            $results = array(); // Initialize the results array
            while ($query->have_posts()) {
                $query->the_post();
                $results[] = array(
                    'title' => get_the_title(),
                    'url' => get_permalink(),
                    'excerpt' => get_the_excerpt(),
                    'postimg' => get_the_post_thumbnail_url()
                );
            }
            wp_send_json_success($results);
        } else {
            wp_send_json_error(array('message' => 'No results found.'));
        }
        wp_reset_postdata();
    } else {
        wp_send_json_error(array('message' => 'No query provided.'));
    }
}
add_action('wp_ajax_ajax_search', 'ajax_search_plugin_ajax_handler');
add_action('wp_ajax_nopriv_ajax_search', 'ajax_search_plugin_ajax_handler');



function ajax_search_plugin_form($atts) {
    // Set default post type if not provided in shortcode
    $atts = shortcode_atts(array(
        'post_type' => 'product', // Default to 'product' post type
    ), $atts, 'ajax_search_form');
    
    // Store post type in a hidden field
    $output = '<div class="ajaxparentformsearchwrapper"><div id="ajax-search-form" class="ajaxsearchformparentwrapper">';
    $output .= '<input type="text" id="ajax-search-input" placeholder="Search..." />';
    $output .= '<input type="hidden" id="ajax-search-post-type" value="' . esc_attr($atts['post_type']) . '" />';
    $output .= '</div>';
    $output .= '<div id="ajax-search-results"></div></div>';

    return $output;
}

// Register the shortcode
function ajax_search_plugin_register_shortcode() {
    add_shortcode('ajax_search_form', 'ajax_search_plugin_form');
}
add_action('init', 'ajax_search_plugin_register_shortcode');