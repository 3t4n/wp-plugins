<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Enqueue the script in the footer if needed.
 * 
 * @since 1.0.0
 */
function api_widgets_maybe_enqueue_script() {
    if (did_action('api_widgets_script_needed')) {
        wp_enqueue_script_module('api-widgets-output', 'https://apiwidgets.com/widget/output.js', array(), API_WIDGETSVERSION, true );
    }
}
add_action('wp_footer', 'api_widgets_maybe_enqueue_script');


/**
 * Output a widget via shortcode.
 * 
 * @since 1.0.0
 */
function api_widgets_shortcode($atts = array()) {
    do_action('api_widgets_script_needed'); // Trigger script enqueue

    $a = shortcode_atts(array(
        'id' => '',
    ), $atts);

    if (!isset($a['id']) || $a['id'] == '' || !is_numeric($a['id'])) {
        return __('id attribute is not set or is not a number.', 'api-widgets');
    }

    return '<api-widgets id="' . absint($a['id']) . '"></api-widgets>';
}
add_shortcode('api-widgets', 'api_widgets_shortcode');


/**
 * Output a widget via template tag.
 * 
 * @since 1.0.0
 */
function api_widgets($id = null) {
    do_action('api_widgets_script_needed'); // Trigger script enqueue

    if ($id == null || $id == '' || !is_numeric($id)) {
        esc_html_e('id is not set or is not a number.', 'api-widgets');
        return;
    }

    echo '<api-widgets id="' . absint($id) . '"></api-widgets>';
}
