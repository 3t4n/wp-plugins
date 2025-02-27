<?php

// Function to add type="module" attribute to script tag
function pixobe_add_module_type_to_script($tag, $handle, $src)
{
    // Check if the script handle matches your script
    if ('pixobe-colorgizer' !== $handle) {
        return $tag;
    }
    // change the script tag by adding type="module" and return it.
    $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    return $tag;
}

// Define shortcode function
function pixobe_coloring_book($atts)
{
    $checkboxes = get_option('pixobe_coloring_book_checkboxes', array());
    // Retrieve saved options
    $colors = get_option('pixobe_coloring_book_colors', '');
    $zoom = in_array('zoom', $checkboxes);
    $paint = in_array('paint', $checkboxes);
    $pencil = in_array('pencil', $checkboxes);
    $print = in_array('print', $checkboxes);
    $download = in_array('download', $checkboxes);
    $brightness = in_array('brightness', $checkboxes);

    // get other options
    $site_id = get_option('pixobe_colorgizer_site_id', '');
    $digest = pixobe_colorgizer_get_nonce();
    $expiry = get_option("pixobe_coloring_expiry");

    $atts = shortcode_atts(array(
        'src' => '',
        'outline-color' => '',
        'colors' => $colors,
        'zoom' => $zoom,
        'paint' => $paint,
        'pencil' => $pencil,
        'print' => $print,
        'download' => $download,
        'brightness' => $brightness,
        'slider-image' => '',
        'upload' => false,
        'color-picker' => false
    ), $atts, 'pixobe_coloring_book');
    wp_enqueue_script(
        'pixobe-colorgizer',
        'https://colorgizer.pixobe.com/colorgizer/coloring-app.esm.js',
        array(),
        PIXOBE_COLORING_BOOK_VERSION,
        true
    );

    if (empty($atts['src']) && $atts['upload'] != true) {
        $post_id = get_the_ID();
        // Get the featured image ID
        $featured_image_id = get_post_thumbnail_id($post_id);
        // Get the full-size image URL
        $full_image_src = wp_get_attachment_image_src($featured_image_id, 'full');
        if ($full_image_src) {
            $atts['src'] = $full_image_src[0];
        }
    }

    if (empty($atts['src']) && $atts['upload'] != true) {
        $image_id = isset($_GET['id']) ? intval($_GET['id']) : null;

        if (!empty($image_id)) {
            $image_url = wp_get_attachment_url($image_id);
            $atts['src'] =  $image_url;
        }
    }


    $shortcode_output = '<coloring-app';
    foreach ($atts as $key => $value) {
        if (in_array($key, ['zoom', 'paint', 'pencil', 'print', 'download', 'brightness'])) {
            $value = filter_var($value, FILTER_VALIDATE_BOOLEAN) ? 'true' : 'false';
        }
        if (!empty($value)) {
            $shortcode_output .= ' ' . esc_attr($key) . '="' . esc_attr($value) . '"';
        }
    }
    $shortcode_output .= ' digest="' . esc_attr($digest) . '"';
    $shortcode_output .= ' expiry="' . esc_attr($expiry) . '"';
    $shortcode_output .= ' site="' . esc_attr($site_id) . '"';
    $shortcode_output .= '>';
    $shortcode_output .= '</coloring-app>';
    return $shortcode_output;
}

// Register shortcode
add_shortcode('pixobecoloringbook', 'pixobe_coloring_book');
add_filter('script_loader_tag', 'pixobe_add_module_type_to_script', 10, 3);
