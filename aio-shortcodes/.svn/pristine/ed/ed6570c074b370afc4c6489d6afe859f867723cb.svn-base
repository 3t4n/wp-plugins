<?php

/**
* Shortcode: [aio_post_count]
* Description: Displays the count of posts for a specific post type and status.
* Example usage: [aio_post_count type="post" status="published"]
*/

function aiosc_post_count_shortcode($atts) {
    // Set default attributes for the shortcode
    $atts = shortcode_atts(
        array(
            'type' => 'post',      // Default post type is 'post'
            'status' => 'published', // Default status is 'published'
        ),
        $atts,
        'aio_post_count'
    );

    // Convert 'published' to 'publish' internally for WordPress
    if (strtolower($atts['status']) === 'published') {
        $atts['status'] = 'publish';
    }

    // Check if the status is 'scheduled' and handle it
    if ( 'scheduled' === $atts['status'] ) {
        // Modify the status to 'future' because WordPress uses 'future' for scheduled posts
        $atts['status'] = 'future';
    }

    // Check if the status is 'all' and calculate the total count of all posts (published, draft, scheduled)
    if ( 'all' === $atts['status'] ) {
        // Modify the status to include all possible statuses
        $atts['status'] = array('publish', 'draft', 'future'); // Include published, draft, and scheduled (future) posts
    }

    // Set up query arguments based on the attributes
    $args = array(
        'post_type' => $atts['type'],   // Get post type from attribute
        'post_status' => $atts['status'], // Get post status from attribute
        'fields' => 'ids',             // We only need the post IDs to count
        'posts_per_page' => -1,        // Get all posts
    );

    // Query the posts based on the arguments
    $query = new WP_Query($args);

    // Return the post count
    return $query->found_posts;
}

// Register the shortcode
add_shortcode('aio_post_count', 'aiosc_post_count_shortcode');

?>
