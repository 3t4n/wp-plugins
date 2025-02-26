<?php
// restaurant-reviews.php

/*
Plugin Name: Restaurant Reviews
Plugin URI: https://places-to-eat-near-me.com/wordpress/plugins/restaurant-reviews
Description: Easily collect and showcase customer reviews on your restaurant site with customizable fields for name, email, star ratings, and optional website links. Includes full support for rich schema markup to enhance SEO visibility.
Version: 1.0
Author: Places to Eat Near Me
Author URI: https://places-to-eat-near-me.com
License: GPL2
Text Domain: restaurant-reviews
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

defined('ABSPATH') || exit;
define('Ptenm_Restaurant_Reviews_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('Ptenm_Restaurant_Reviews_PLUGIN_URL', plugin_dir_url(__FILE__));

// Includes
require_once plugin_dir_path(__FILE__) . 'includes/cpt-restaurant-reviews.php';
require_once plugin_dir_path(__FILE__) . 'includes/metabox-reviews.php';
require_once plugin_dir_path(__FILE__) . 'includes/shortcode-display.php';
require_once plugin_dir_path(__FILE__) . 'includes/enqueue-scripts.php';
require_once plugin_dir_path(__FILE__) . 'includes/review-settings.php';
require_once plugin_dir_path(__FILE__) . 'includes/display-reviews-auto.php';
require_once plugin_dir_path(__FILE__) . 'includes/review-helpers.php';  

// Hooks to register CPT and enqueue scripts
add_action('init', 'ptenm_restaurant_reviews_register_custom_post_type');
add_action('wp_enqueue_scripts', 'ptenm_restaurant_reviews_enqueue_plugin_scripts');
add_action('admin_menu', 'ptenm_restaurant_reviews_register_settings');

// Function to add stars, URL, and other custom fields to the content of restaurant reviews on front end
function ptenm_restaurant_reviews_add_custom_content_to_single($content) {
    // Check if the current post type is 'restaurant_reviews' and we are on a single post
    if (is_singular('ptenmrr_reviews_cpt') && in_the_loop() && is_main_query()) {
        // Get the current post ID
        $post_id = get_the_ID();
        
        // Retrieve the star rating, reviewer URL, and reviewer name
        $rating = intval(get_post_meta($post_id, 'ptenm_restaurant_reviews_review_rating', true));
        $reviewer_url = esc_url(get_post_meta($post_id, 'ptenm_restaurant_reviews_reviewer_url', true));
        $reviewer_name = esc_html(get_post_meta($post_id, 'ptenm_restaurant_reviews_reviewer_name', true));
        
        // Build the custom HTML to display the stars and reviewer URL
        $custom_content = '<div class="ptenm_restaurant_reviews-review-meta">';
        $custom_content .= '<div class="ptenm_restaurant_reviews-review-header" style="display: flex; align-items: center; justify-content: space-between;">';

        // Display the reviewer's name and link to their URL if available
        if (!empty($reviewer_url)) {
            $custom_content .= '<span class="ptenm_restaurant_reviews-reviewer-name"><a href="' . $reviewer_url . '" target="_blank" rel="nofollow noopener noreferrer">' . esc_html($reviewer_name) . '</a></span>';
        } else {
            $custom_content .= '<span class="ptenm_restaurant_reviews-reviewer-name">' . esc_html($reviewer_name) . '</span>';
        }

        // Display the star rating
        $custom_content .= '<span class="ptenm_restaurant_reviews-stars" style="margin-left: 5px;">';
        for ($i = 1; $i <= 5; $i++) {
            $custom_content .= ($i <= $rating) ? '<span class="star filled" style="color: gold;">★</span>' : '<span class="star" style="color: grey;">★</span>';
        }
        $custom_content .= '</span>';

        $custom_content .= '</div>'; // Close review-header
        $custom_content .= '</div>'; // Close ptenm_restaurant_reviews-review-meta

        // Append the custom content to the post content
        $content = $custom_content . $content;
    }

    return $content;
}
add_filter('the_content', 'ptenm_restaurant_reviews_add_custom_content_to_single');

function ptenm_restaurant_reviews_start_session() {
    if (!session_id()) {
        session_start(['read_and_close' => true]);
    }
}
add_action('init', 'ptenm_restaurant_reviews_start_session', 11);

// Add dropdown in add new/edit screen of reviews for post type and post id
function ptenm_restaurant_reviews_get_posts_by_type() {
    // Verify nonce for security
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'ptenm_restaurant_reviews_nonce')) {
        wp_send_json_error(array('message' => 'Invalid nonce.'));
    }
    

    // Check user permissions
    if (!isset($_POST['post_type']) || !current_user_can('edit_posts')) {
        wp_send_json_error(array('message' => 'Invalid request.'));
    }

    // Sanitize and process the post type
    $post_type = sanitize_text_field(wp_unslash($_POST['post_type']));

    $posts = get_posts(array(
        'post_type' => $post_type,
        'posts_per_page' => -1,
        'post_status' => 'publish',
    ));

    if (!empty($posts)) {
        $response = array();
        foreach ($posts as $post) {
            $response[] = array(
                'ID' => $post->ID,
                'title' => $post->post_title,
            );
        }
        wp_send_json_success(array('posts' => $response));
    } else {
        wp_send_json_error(array('message' => 'No posts found.'));
    }
}
add_action('wp_ajax_get_posts_by_type', 'ptenm_restaurant_reviews_get_posts_by_type');



