<?php
// shortcode-display.php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Prevent direct access
}

// use [restaurant_reviews] to show reviews and form (if new reviews are enabled)

function ptenm_restaurant_reviews_display_reviews_with_form($atts) {
    ob_start();  // Start output buffering

    // Get current post ID and post type
    $post_id = get_the_ID();
    $post_type = get_post_type($post_id);

    // Query reviews
    $reviews_query = ptenm_restaurant_reviews_get_reviews_query($post_id, $post_type);

    // Append reviews to the content
    $content = ptenm_restaurant_reviews_render_reviews($reviews_query); // Use $content to store reviews output

    // Render review submission form
    $disable_new_reviews = get_option('ptenm_restaurant_reviews_disable_new_reviews_' . $post_type);
    
    if ($disable_new_reviews != 1) {
        $content .= ptenm_restaurant_reviews_render_review_form($post_id);  // Append form if new reviews are not disabled
    }

    $content .= wp_kses_post(ptenm_restaurant_reviews_footer()); // Append footer output

    // Handle form submission
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ptenm_restaurant_reviews_submit_review'])) {
        // Check for nonce verification
        if (isset($_POST['ptenm_restaurant_reviews_submit_review_nonce'])) {
            // Unslash and sanitize the nonce
            $nonce = sanitize_text_field(wp_unslash($_POST['ptenm_restaurant_reviews_submit_review_nonce']));
    
            // Verify the nonce
            if (!wp_verify_nonce($nonce, 'ptenm_restaurant_reviews_submit_review_action')) {
                wp_die(esc_html__('Security check failed. Please try again.', 'restaurant-reviews'));
            }
    
            ptenm_restaurant_reviews_handle_review_submission();
        } else {
            wp_die(esc_html__('Nonce verification failed. Please try again.', 'restaurant-reviews'));
        }
    }

    return $content;  // Return the combined content
}
add_shortcode('restaurant_reviews', 'ptenm_restaurant_reviews_display_reviews_with_form');

// use [restaurant_reviews_only_reviews] to show the reviews without the form

function ptenm_restaurant_reviews_display_reviews($atts) {
    // Initialize content variable
    $content = '';

    // Get current post ID and post type
    $post_id = get_the_ID();
    $post_type = get_post_type($post_id);

    // Query reviews
    $reviews_query = ptenm_restaurant_reviews_get_reviews_query($post_id, $post_type);

    // Render reviews and append to content
    $reviews_output = ptenm_restaurant_reviews_render_reviews($reviews_query);
    $content .= $reviews_output;  // Append the reviews output (includes script tags)

    // Append footer to content
    $content .= wp_kses_post(ptenm_restaurant_reviews_footer());

    // Handle form submission
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ptenm_restaurant_reviews_submit_review'])) {
        // Check for nonce verification
        if (isset($_POST['ptenm_restaurant_reviews_submit_review_nonce'])) {
            // Unslash the nonce
            $nonce = sanitize_text_field(wp_unslash($_POST['ptenm_restaurant_reviews_submit_review_nonce']));
    
            // Verify the nonce
            if (!wp_verify_nonce($nonce, 'ptenm_restaurant_reviews_submit_review_action')) {
                wp_die(esc_html__('Security check failed. Please try again.', 'restaurant-reviews'));
            }
    
            ptenm_restaurant_reviews_handle_review_submission();
        } else {
            wp_die(esc_html__('Nonce verification failed. Please try again.', 'restaurant-reviews'));
        }
    }

    return $content;  // Return the accumulated content
}
add_shortcode('restaurant_reviews_only_reviews', 'ptenm_restaurant_reviews_display_reviews');

// use [restaurant_reviews_only_form] to show only the form

function ptenm_restaurant_reviews_display_form($atts) {
    // Initialize content variable
    $content = '';

    // Get current post ID and post type
    $post_id = get_the_ID();
    $post_type = get_post_type($post_id);

    // Check if reviews are enabled for the current post type
    $reviews_enabled = get_option('ptenm_restaurant_reviews_enable_reviews_' . $post_type);
    $disable_new_reviews = get_option('ptenm_restaurant_reviews_disable_new_reviews_' . $post_type);

    // Only proceed if reviews are enabled

        // Render review form and append to content
        $form_output = ptenm_restaurant_reviews_render_review_form($post_id);
        $content .= $form_output;  // Ensure the form HTML is sanitized

        // Append footer to content
        $content .= wp_kses_post(ptenm_restaurant_reviews_footer());

        // Handle form submission
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ptenm_restaurant_reviews_submit_review'])) {
            // Check for nonce verification
            if (isset($_POST['ptenm_restaurant_reviews_submit_review_nonce'])) {
                // Unslash and sanitize the nonce
                $nonce = sanitize_text_field(wp_unslash($_POST['ptenm_restaurant_reviews_submit_review_nonce']));

                // Verify the nonce
                if (!wp_verify_nonce($nonce, 'ptenm_restaurant_reviews_submit_review_action')) {
                    wp_die(esc_html__('Security check failed. Please try again.', 'restaurant-reviews'));
                }

                // Call the review submission handler
                ptenm_restaurant_reviews_handle_review_submission();
            } else {
                wp_die(esc_html__('Nonce verification failed. Please try again.', 'restaurant-reviews'));
            }
        }


    return $content;  // Return the accumulated content
}
add_shortcode('restaurant_reviews_only_form', 'ptenm_restaurant_reviews_display_form');
