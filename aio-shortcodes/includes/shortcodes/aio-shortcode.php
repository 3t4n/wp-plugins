<?php
 
 /**
 * Custom shortcode to display the shortcode name along with its output.
 * Example usage: [aio_shortcode shortcode="[example_shortcode]" class="custom-class"]
 */
function display_aio_shortcode($atts, $content = null) {
    if (empty($atts['shortcode'])) {
        // If the 'shortcode' attribute is missing, display an error message.
        return '<span style="color: red;">Error: Missing "shortcode" attribute in the shortcode.</span>';
    }

    $shortcode = $atts['shortcode']; // Get the shortcode from the attribute

    // Generate the shortcode tag
    $shortcode_tag = '[' . $shortcode;

    // Add any other attributes to the shortcode
    foreach ($atts as $attribute => $value) {
        if ($attribute !== 'shortcode' && $attribute !== 'class') {
            $shortcode_tag .= ' ' . $attribute . '="' . $value . '"';
        }
    }

    $shortcode_tag .= ']';

    // Execute the shortcode and capture its output
    $shortcode_output = do_shortcode($shortcode_tag);

    // Escape the output for safe display
    $escaped_output = esc_html($shortcode_output);

    // If content is passed, display it instead
    if ($content) {
        $escaped_output = esc_html($content);
    }

    // Add custom class if provided
    $class_attribute = !empty($atts['class']) ? ' class="' . esc_attr($atts['class']) . '"' : '';

    // Return the shortcode with output and custom class
    return '<span' . $class_attribute . '>' . $escaped_output . '</span>';
}

add_shortcode('aio_shortcode', 'display_aio_shortcode');
