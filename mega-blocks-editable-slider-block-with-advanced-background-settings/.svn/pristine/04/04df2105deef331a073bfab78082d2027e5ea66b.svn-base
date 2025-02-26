<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

// Shortcode to display a specific slider based on ID or title
function mega_slider_display_shortcode($atts) {
    $atts = shortcode_atts(array(
        'slider_id' => '', // Optionally pass a slider ID
        'slider_title' => '', // Optionally pass a slider title
    ), $atts);

    // Query for the slider post type
    $query_args = array(
        'post_type' => 'mega_slider',
        'posts_per_page' => 1, // Only need one slider
        'post_status' => 'publish',
    );

    // Modify query based on ID or title if provided
    if (!empty($atts['slider_id'])) {
        $query_args['p'] = intval($atts['slider_id']); // Specific post ID
    } elseif (!empty($atts['slider_title'])) {
        $query_args['title'] = sanitize_text_field($atts['slider_title']);
    }

    $slider_query = new WP_Query($query_args);

    if ($slider_query->have_posts()) {
        while ($slider_query->have_posts()) {
            $slider_query->the_post();

            // Get the slider content
            $slider_content = get_the_content();

            // Display slider block content
            echo apply_filters('the_content', $slider_content);
        }
        wp_reset_postdata();
    } else {
        echo '<p>' . esc_html__('Slider not found.', 'mega-blocks') . '</p>';
    }
}
add_shortcode('mega_slider_display', 'mega_slider_display_shortcode');

// Shortcode to list all available sliders
function mega_slider_list_shortcode() {
    // Query for all sliders
    $query_args = array(
        'post_type' => 'mega_slider',
        'post_status' => 'publish',
        'posts_per_page' => -1, // List all sliders
    );

    $slider_query = new WP_Query($query_args);
    ob_start(); // Start output buffering

    if ($slider_query->have_posts()) {
        echo '<div class="mega-slider-list">';
        while ($slider_query->have_posts()) {
            $slider_query->the_post();
            $slider_id = get_the_ID();
            $slider_title = get_the_title();

            // Display each slider with title and a button to display the specific slider
            echo '<div class="mega-slider-item">';
            echo '<h3>' . esc_html($slider_title) . '</h3>';
            echo '<p>' . esc_html__('Use this shortcode to display this slider:', 'mega-blocks') . '</p>';
            echo '<code>[mega_slider_display slider_id="' . esc_attr($slider_id) . '"]</code>';
            echo '</div>';
        }
        echo '</div>';
        wp_reset_postdata();
    } else {
        echo '<p>' . esc_html__('No sliders found.', 'mega-blocks') . '</p>';
    }

    return ob_get_clean(); // Return the output
}
add_shortcode('mega_slider_list', 'mega_slider_list_shortcode');
