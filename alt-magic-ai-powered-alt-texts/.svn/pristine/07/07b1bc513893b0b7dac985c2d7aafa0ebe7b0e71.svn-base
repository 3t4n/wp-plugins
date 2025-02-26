<?php

// Ensure this file is not accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Updates the alt text of the image in the parent post.
function altm_update_alt_text_in_parent_post($attachment_id, $alt_text) {
    // Get the parent post ID of the attachment
    $parent_post_id = wp_get_post_parent_id($attachment_id);
    // Get the option to determine if alt text should be refreshed
    $refresh_alt_text = get_option('alt_magic_refresh_alt_text');

    // If no parent post is found, log an error and exit
    if (!$parent_post_id) {
        altm_log('No parent post found for attachment ID: ' . $attachment_id);
        return;
    }

    // Retrieve the parent post object
    $parent_post = get_post($parent_post_id);
    
    // If the parent post cannot be retrieved, log an error and exit
    if (!$parent_post) {
        altm_log('Failed to retrieve parent post for attachment ID: ' . $attachment_id);
        return;
    }

    // Update the alt text in the parent post's content
    $updated_content = preg_replace_callback(
        '/<img[^>]*wp-image-' . $attachment_id . '[^>]*>/', // Regex to find the image tag
        function($matches) use ($alt_text, $refresh_alt_text) {
            $img_tag = $matches[0];
            // Extract current alt text from the image tag
            $current_alt = preg_match('/alt=["\']([^"\']*)["\']/', $img_tag, $alt_matches) ? $alt_matches[1] : '';
            
            // Update alt text if the option is set to 'all' or if the current alt is empty
            if ($refresh_alt_text === 'all' || empty($current_alt)) {
                // Replace existing alt text or add new alt attribute
                $img_tag = preg_replace('/alt=["\'][^"\']*["\']/', 'alt="' . esc_attr($alt_text) . '"', $img_tag);
                if (strpos($img_tag, 'alt=') === false) {
                    $img_tag = str_replace('<img', '<img alt="' . esc_attr($alt_text) . '"', $img_tag);
                }
            }
            return $img_tag;
        },
        $parent_post->post_content
    );

    // If the content was updated, save the changes and log the update
    if ($updated_content !== $parent_post->post_content) {
        wp_update_post(array(
            'ID' => $parent_post_id,
            'post_content' => $updated_content,
        ));
        altm_log('Updated alt text in parent post ID: ' . $parent_post_id);
    } else {
        altm_log('No changes made to parent post ID: ' . $parent_post_id);
    }
}



// Updates the alt text of the image in all posts containing the image.
function altm_update_alt_text_in_all_posts($attachment_id, $alt_text) {
    global $wpdb;
    // Get the option to determine if alt text should be refreshed
    $refresh_alt_text = get_option('alt_magic_refresh_alt_text');

    // Query to find all posts containing the image
    $posts = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT ID, post_content FROM {$wpdb->posts} 
            WHERE post_content LIKE %s 
            AND post_type NOT IN ('revision', 'attachment')",
            '%wp-image-' . $attachment_id . '%'
        )
    );

    // If no posts are found, log an error and exit
    if (empty($posts)) {
        altm_log('No posts found containing attachment ID: ' . $attachment_id);
        return;
    }

    // Iterate over each post and update the alt text
    foreach ($posts as $post) {
        $updated_content = preg_replace_callback(
            '/<img[^>]*wp-image-' . $attachment_id . '[^>]*>/', // Regex to find the image tag
            function($matches) use ($alt_text, $refresh_alt_text) {
                $img_tag = $matches[0];
                // Extract current alt text from the image tag
                $current_alt = preg_match('/alt=["\']([^"\']*)["\']/', $img_tag, $alt_matches) ? $alt_matches[1] : '';
                
                // Update alt text if the option is set to 'all' or if the current alt is empty
                if ($refresh_alt_text === 'all' || empty($current_alt)) {
                    // Replace existing alt text or add new alt attribute
                    $img_tag = preg_replace('/alt=["\'][^"\']*["\']/', 'alt="' . esc_attr($alt_text) . '"', $img_tag);
                    if (strpos($img_tag, 'alt=') === false) {
                        $img_tag = str_replace('<img', '<img alt="' . esc_attr($alt_text) . '"', $img_tag);
                    }
                }
                return $img_tag;
            },
            $post->post_content
        );

        // If the content was updated, save the changes and log the update
        if ($updated_content !== $post->post_content) {
            wp_update_post(array(
                'ID' => $post->ID,
                'post_content' => $updated_content,
            ));
            altm_log('Updated alt text in post ID: ' . $post->ID);
        } else {
            altm_log('No changes made to post ID: ' . $post->ID);
        }
    }
}