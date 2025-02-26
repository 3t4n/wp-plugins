<?php

/**
 * Shortcode: [aio_post_title]
 * Description: Displays the title of the specified post with additional options for case and custom classes.
 * Example usage: [aio_post_title id="456" link="yes" new_window="yes" case="first" class="custom-class"]
 */

function aiosc_post_title_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'id' => null,           // Default value is null
            'link' => 'no',         // Default value is 'no'
            'new_window' => 'no',   // Default value is 'no'
            'case' => 'default',    // Default case option
            'class' => '',          // Default custom class
        ),
        $atts,
        'aio_post_title'
    );

    // Determine the page ID
    $page_id = empty($atts['id']) ? get_the_ID() : absint($atts['id']);

    // Get the title
    $page_title = get_the_title($page_id);

    // Apply case customization
    switch ($atts['case']) {
        case 'uppercase':
            $page_title = mb_strtoupper($page_title);
            break;
        case 'lowercase':
            $page_title = mb_strtolower($page_title);
            break;
        case 'capitalize':
            $page_title = ucwords(mb_strtolower($page_title));
            break;
        case 'sentence':
            $page_title = ucfirst(mb_strtolower($page_title));
            break;
        case 'first':
            $page_title = ucfirst($page_title); // Capitalizes only the first character
            break;
        default:
            $page_title = $page_title; // Leave as is
            break;
    }

    // Add link if specified
    if ($atts['link'] === 'yes') {
        $target = $atts['new_window'] === 'yes' ? ' target="_blank"' : '';
        $page_title = '<a href="' . esc_url(get_permalink($page_id)) . '"' . $target . '>' . esc_html($page_title) . '</a>';
    } else {
        $page_title = esc_html($page_title);
    }

    // Add custom class if specified
    $class_attribute = !empty($atts['class']) ? ' class="' . esc_attr($atts['class']) . '"' : '';

    // Wrap in a span with optional class
    return '<span' . $class_attribute . '>' . $page_title . '</span>';
}

add_shortcode('aio_post_title', 'aiosc_post_title_shortcode');
