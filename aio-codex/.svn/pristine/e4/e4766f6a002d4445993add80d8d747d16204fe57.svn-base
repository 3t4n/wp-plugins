<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Add shortcode column to admin table
function aiocodex_add_shortcode_column($columns) {
    // Get the current columns
    $new_columns = array();

    // Place the shortcode column right after the title column
    foreach ($columns as $key => $column) {
        $new_columns[$key] = $column;
        if ($key == 'title') {
            // After the title column, add the shortcode column
            $new_columns['aiocodex_shortcode'] = __('Shortcode', 'aio-codex');
        }
    }

    return $new_columns;
}
add_filter('manage_edit-aiocodex_columns', 'aiocodex_add_shortcode_column');

// Display the shortcode in the custom column
function aiocodex_display_shortcode_column($column, $post_id) {
    if ($column === 'aiocodex_shortcode') {
        // Generate the shortcode
        $shortcode = '[aiocodex id="' . $post_id . '"]';

        // Display the shortcode
        echo '<input type="text" value="' . esc_attr($shortcode) . '" readonly />';
    }
}
add_action('manage_aiocodex_posts_custom_column', 'aiocodex_display_shortcode_column', 10, 2);

?>
