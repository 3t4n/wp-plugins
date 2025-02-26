<?php

function acanimations_is_license_valid($license) {
    if ($license == 'animateconversions') {
        return false;
    }
    $js = file_get_contents(acanimations_get_js_url($license));
    return isset($js[10]);
}

function acanimations_get_js_url($license = 'wp') {
    return "https://animate-conversions.web.app/p/$license/v1.js";
}

function acanimations_get_checked_if_contains($value, $search) {
    return strpos($value, $search) !== false ? 'checked' : '';
}

function acanimations_enqueue_script_tag($in_footer = false) {
    global $wp_version;

    $license = get_option('acanimations_license_key');
    $url = acanimations_get_js_url(!empty($license) ? $license : 'wp');

    $handle = 'ac-script';
    $deps = array(); // No dependencies in this case
    $version = null; // No versioning needed
    $args = array(
        'in_footer' => $in_footer,
    );

    // Check if WP version is 6.3 or higher
    if (version_compare($wp_version, '6.3', '>=')) {
        wp_enqueue_script($handle, $url, $deps, $version, $args);
    } else {
        // Fallback for older versions (pre-6.3), use boolean for in_footer
        $in_footer_legacy = isset($args['in_footer']) ? $args['in_footer'] : false;
        wp_enqueue_script($handle, $url, $deps, $version, $in_footer_legacy);
    }
}

function acanimations_add_attributes( $tag, $handle ) {
    if ('ac-script' === $handle) {
        $isOptionInHead = get_option('acanimations_load_location') === 'head';
        $optionElements = get_option('acanimations_elements');
        $optionStyle = get_option('acanimations_style');
        $optionNavigation = get_option('acanimations_navigation');

        $replace_tag = '<script id="ac-script"' .
            ' data-selectors="' . htmlentities($optionElements) . '"' .
            ' data-style="' . esc_attr($optionStyle) . '"' .
            ($optionNavigation === 'loading' ? ' data-loading="true" ' : '') .
            ($isOptionInHead ? ' defer ' : ' async ');

        $tag = str_replace('<script', $replace_tag, $tag);
    }
    return $tag;
}
