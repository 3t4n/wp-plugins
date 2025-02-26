<?php

/**
 * Shortcode: [aio_word_count]
 * Description: Displays the exact word count number shown in the WordPress editor for the current or specific post/page.
 * Usage: [aio_word_count] or [aio_word_count id="123" class="custom-class"]
 */
 
function aiosc_word_count_shortcode($atts) {
    // Define default attributes with class
    $atts = shortcode_atts(
        array(
            'id' => '',   // Optional post/page ID
            'class' => '', // Optional class for custom styling
        ),
        $atts,
        'aio_word_count'
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

    // Strip HTML tags and remove extra spaces
    $content = wp_strip_all_tags($content);  // Updated to use wp_strip_all_tags
    $content = preg_replace('/\s+/', ' ', $content); // Normalize spaces

    // Refined regular expression to count words properly
    preg_match_all('/\b(?:[a-zA-Z0-9]+(?:[-\'a-zA-Z0-9]+)*)\b/', $content, $matches);

    // Get the word count (number of matches)
    $word_count = count($matches[0]);

    // Create the class attribute if provided
    $class_attribute = !empty($atts['class']) ? ' class="' . esc_attr($atts['class']) . '"' : '';

    // Return the word count wrapped in a span with class if provided
    return '<span' . $class_attribute . '>' . $word_count . '</span>';
}

// Register the shortcode
add_shortcode('aio_word_count', 'aiosc_word_count_shortcode');
