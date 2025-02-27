<?php

/**
 * @param $atts
 * @return string
 * @author DemonIa sanchoclo@gmail.com
 * @function mightyforms_shortcode_handler
 * @description This function render iframe by given form id
 */
function mightyforms_shortcode_handler($atts)
{
    wp_enqueue_script('mightyforms_script');

    return '<!-- MightyForms Section -->
    <div class="mighty-form" id="' . esc_attr($atts['id']) . '"></div>
    <!-- End MightyForms Section -->';
}

add_shortcode('mightyforms', 'mightyforms_shortcode_handler');


function mightyforms_register_myscripts()
{
    global $wp_version;

    if ( version_compare( $wp_version,'6.3', '>=' ) ) {
        wp_register_script('mightyforms_script', 'https://form.mightyforms.com/loader/v1/mightyforms.min.js', array(), MF_VERSION, array('in_footer' => true, 'strategy' => 'async'));
    } else {
        wp_register_script('mightyforms_script', 'https://form.mightyforms.com/loader/v1/mightyforms.min.js', array(), MF_VERSION, false);
        add_filter('script_loader_tag', 'mightyforms_add_async_to_frontend_script', 10, 2);
    }
}

add_action('wp_enqueue_scripts', 'mightyforms_register_myscripts');

function mightyforms_add_async_to_frontend_script($tag, $handle)
{
    // Only affects foo script.
    if ('mightyforms_script' !== $handle) {
        return $tag;
    }

    return str_replace(' src=', ' async src=', $tag);
}