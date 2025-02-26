<?php
function ambikly_block_support_styles()
{

    // Bail early if function does not exists.
    if (!function_exists('wp_style_engine_get_stylesheet_from_context')) {
        return;
    }

    $core_styles_keys = array('block-supports');


    $compiled_core_stylesheet = '';

    foreach ($core_styles_keys as $style_key) {
        $compiled_core_stylesheet .= wp_style_engine_get_stylesheet_from_context($style_key, array());
    }

     if (empty($compiled_core_stylesheet)) {
        return;
    }

    wp_register_style('ambikly-block-supports', false);
    wp_enqueue_style('ambikly-block-supports');
    wp_add_inline_style('ambikly-block-supports', $compiled_core_stylesheet);
}