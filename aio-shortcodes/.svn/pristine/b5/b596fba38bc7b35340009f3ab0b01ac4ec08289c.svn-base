<?php

/**
 * Shortcode: [aio_read_time]
 * Description: Displays the estimated reading time based on the word count.
 * Usage: [aio_read_time] or [aio_read_time id="123" before_text="Approximate read time: " after_text=" minutes." class="custom-class"]
 */

function aiosc_read_time_shortcode($atts) {
    // Define default attributes with before_text, after_text, and class
    $atts = shortcode_atts(
        array(
            'id' => '', // Optional post/page ID
            'before_text' => '', // Optional text before the read time
            'after_text' => '',  // Optional text after the read time
            'class' => '',       // Optional class for custom styling
        ),
        $atts,
        'aio_read_time'
    );

    // Get the post ID (current post if no ID is provided)
    $post_id = $atts['id'] ? intval($atts['id']) : get_the_ID();

    // Retrieve the post object by ID
    $post = get_post($post_id);

    // Check if the post exists
    if (!$post) {
        return '0'; // Return 0 if the post is not found
    }

    // Retrieve the post content
    $content = $post->post_content;

    // Count words while ignoring special characters like apostrophes and parentheses
    $word_count = preg_match_all('/[A-Za-z0-9-]+/', wp_strip_all_tags($content)); // Updated to use wp_strip_all_tags

    // Calculate the read time (words per minute is 200)
    $read_time = round($word_count / 200);

    // Ensure at least 1 minute if the content has fewer than 200 words
    if ($read_time < 1) {
        $read_time = 1;
    }

    // Create the class attribute if provided
    $class_attribute = !empty($atts['class']) ? ' class="' . esc_attr($atts['class']) . '"' : '';

    // Return the custom text with the read time number and class if provided
    return '<span' . $class_attribute . '>' . $atts['before_text'] . ' ' . $read_time . ' ' . $atts['after_text'] . '</span>';
}

// Register the shortcode
add_shortcode('aio_read_time', 'aiosc_read_time_shortcode');
