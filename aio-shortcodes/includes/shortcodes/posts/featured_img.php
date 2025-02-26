<?php
/**
 * Shortcode: [aio_post_featured_image]
 * Description: Displays the featured image of the specified post without dimension limits.
 * Example usage: [aio_post_featured_image id="456" size="thumbnail" link="yes" new_window="yes"]
 */

function aiosc_post_featured_image_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'id' => null,           // Default value is null
            'size' => 'thumbnail',  // Default image size
            'link' => 'no',         // Default link value is 'no'
            'new_window' => 'no',   // Default new window value is 'no'
        ),
        $atts,
        'aio_post_featured_image'
    );

    if (empty($atts['id'])) {
        // If 'id' attribute is not provided, use the current post ID
        $post_id = get_the_ID();
    } else {
        // Use the specified post ID
        $post_id = absint($atts['id']);
    }

    // Validate the size attribute to use only allowed sizes (thumbnail, medium, large)
    $allowed_sizes = array('thumbnail', 'medium', 'large');
    $atts['size'] = in_array($atts['size'], $allowed_sizes) ? $atts['size'] : 'thumbnail';

    // Get the featured image ID for the post
    $thumbnail_id = get_post_thumbnail_id($post_id);

    if ($thumbnail_id) {
        // Get the image HTML using wp_get_attachment_image()
        $image_html = wp_get_attachment_image($thumbnail_id, $atts['size'], false, array('alt' => esc_attr(get_the_title($post_id))));

        // Check if link attribute is set to yes
        if ($atts['link'] === 'yes') {
            $target = $atts['new_window'] === 'yes' ? ' target="_blank"' : '';
            return '<a href="' . esc_url(get_permalink($post_id)) . '"' . $target . '>' . $image_html . '</a>';
        } else {
            return $image_html;
        }
    } else {
        return ''; // No featured image found
    }
}
add_shortcode('aio_post_featured_image', 'aiosc_post_featured_image_shortcode');
