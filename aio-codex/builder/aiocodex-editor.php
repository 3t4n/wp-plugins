<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Shortcode generation function
function aiocodex_generate_new_shortcode($atts) {
    if (!empty($atts['id'])) {
        $post_id = $atts['id'];

        // Ensure the ID is valid
        if (!preg_match('/^[0-9]+$/', $post_id)) {
            return false;
        }

        // Get the post status and content
        $post_status = get_post_field('post_status', $post_id);
        $post_content = get_post_field('post_content', $post_id);

        // Ensure the post is published and has content
        if (!empty($post_content) && $post_status === 'publish') {
            return '<div class="aiocodex_widget" style="margin-bottom:25px;">' . 
                   wp_kses_post(wpautop(do_shortcode($post_content))) . 
                   '</div>';
        }
    }
    return '';
}
add_shortcode('aiocodex', 'aiocodex_generate_new_shortcode');

// Save the shortcode when the post is updated
function aiocodex_update_shortcode_on_save($post_id) {
    if (get_post_type($post_id) !== 'aiocodex') {
        return;
    }

    $shortcode = '[aiocodex id="' . $post_id . '"]';

    // No date validation anymore, simply save the shortcode
    update_post_meta($post_id, '_aiocodex_shortcode', $shortcode);
}

add_action('save_post', 'aiocodex_update_shortcode_on_save');

// Display shortcode after the title in the editor
function aiocodex_display_shortcode_after_title($post) {
    if (get_post_type($post->ID) !== 'aiocodex') {
        return;
    }

    $shortcode = '[aiocodex id="' . $post->ID . '"]';

    if ($shortcode) {
        echo '<div style="margin-top: 15px; padding: 12px 20px; background: #ffffff; border: 1px solid #cccccc; border-radius: 3px; font-size: 13px; display: inline-block;">
                <strong>Shortcode:</strong> <code>' . esc_html($shortcode) . '</code>
              </div>';
    }
}
add_action('edit_form_after_title', 'aiocodex_display_shortcode_after_title');

?>
