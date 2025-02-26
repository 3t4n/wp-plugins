<?php

// Register the API Widgets block
add_action('init', 'api_widgets_register_block');

function api_widgets_register_block() {
    wp_register_script(
        'api-widgets-block-editor', // Handle
        API_WIDGETSURL . 'includes/block-editor/index.js', // Block JS file
        array('wp-blocks', 'wp-element', 'wp-editor'), // Dependencies
        filemtime(API_WIDGETSDIR . 'includes/block-editor/index.js'),  // Version (based on file modification time)
        true
    );

     wp_localize_script(
        'api-widgets-block-editor', 
        'apiWidgetsBlock', 
        array(
            'pluginUrl' => API_WIDGETSURL
        )
    );

    // Register the block
    register_block_type('api-widgets/block', array(
        'editor_script' => 'api-widgets-block-editor',
        'render_callback' => 'api_widgets_render_block',
        'attributes' => array(
            'id' => array(
                'type' => 'string',
                'default' => '', // Default value for the ID attribute
            ),
        ),
    ));
}

// Render callback for the block
function api_widgets_render_block($attributes) {
    // Sanitize and get the ID attribute
    $id = !empty($attributes['id']) ? absint($attributes['id']) : '';

    // Return the HTML tag with the ID
    if ($id) {
        return '<api-widgets id="' . esc_attr($id) . '"></api-widgets>';
    }
    return '<p>' . __('Please specify an ID for the API Widget.', 'api-widgets') . '</p>';
}