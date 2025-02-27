<?php
// Add a new column to the admin post list
function catcwp_add_custom_shortcode_column($columns) {
    $new_columns = array();
    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        if ($key === 'title') {
            $new_columns['shortcode'] = 'Shortcode';
        }
    }
    return $new_columns;
}
add_filter('manage_copy_to_clipboard_posts_columns', 'catcwp_add_custom_shortcode_column');

// Populate the custom column with data
function catcwp_display_custom_shortcode_column($column) {
    if ($column === 'shortcode') {
        // Output the shortcode with dynamic post ID
        $meta = get_post_meta(get_the_ID(), 'copy_to_clipboard_options', true);
        $copy_clipboard_selector = strtolower($meta['copy_clipboard_selector']);
        $shortcode = '[copy_clipboard tag="' . $copy_clipboard_selector . '"]';

        // Output the shortcode with a click-to-copy functionality
        echo '<div class="catcwp-shortcode-wrap">
            <div class="selectable">' . esc_html($shortcode) . '</div>
        </div>';
    }
}

add_action('manage_copy_to_clipboard_posts_custom_column', 'catcwp_display_custom_shortcode_column', 10, 2);

// Adjust column order
function catcwp_move_shortcode_column($columns) {
    $shortcode = $columns['shortcode'];
    unset($columns['shortcode']);
    $new_columns = array();
    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        if ($key === 'title') {
            $new_columns['shortcode'] = $shortcode;
        }
    }
    return $new_columns;
}
add_filter('manage_copy_to_clipboard_posts_columns', 'catcwp_move_shortcode_column');

// Make the column sortable
function catcwp_make_shortcode_column_sortable($columns) {
    $columns['shortcode'] = 'shortcode';
    return $columns;
}
add_filter('manage_edit-copy_to_clipboard_sortable_columns', 'catcwp_make_shortcode_column_sortable');

// Add a metabox to the sidebar for the "copy_to_clipboard" post type
function catcwp_copy_to_clipboard_shortcode_metabox() {
    add_meta_box(
        'copy_to_clipboard_metabox',
        'Copy to Clipboard Shortcode',
        'catcwp_render_copy_to_clipboard_shortcode_metabox',
        'copy_to_clipboard',
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'catcwp_copy_to_clipboard_shortcode_metabox');

// Render the content of the metabox
function catcwp_render_copy_to_clipboard_shortcode_metabox($post) {
    // Output the shortcode with dynamic post ID
    $meta = get_post_meta($post->ID, 'copy_to_clipboard_options', true);

    if (isset($meta['copy_clipboard_selector'])) {
        $copy_clipboard_selector = strtolower($meta['copy_clipboard_selector']);
        $shortcode = '[copy_clipboard tag="' . $copy_clipboard_selector . '"]';

        // Output the shortcode with a click-to-copy functionality
        echo '<div class="catcwp-shortcode-wrap">
            <div class="selectable">' . esc_html($shortcode) . '</div>
        </div>';
    }
}


