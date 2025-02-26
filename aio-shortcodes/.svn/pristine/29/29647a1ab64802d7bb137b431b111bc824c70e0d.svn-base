<?php

/**
 * Shortcode: [aio_search]
 * Description: Displays a WordPress search bar with customizable attributes.
 * Example usage: [aio_search width="400px" alignment="center" placeholder="Search here..." class="custom-search" button_text="Go!"]
 */
function aiosc_shortcode_search_bar($atts) {
    // Set default attributes
    $atts = shortcode_atts(array(
        'width' => '',                // Default width of the search input field
        'alignment' => 'center',      // Default alignment of the search bar (left, center, right)
        'placeholder' => 'Search...', // Default placeholder text for the search input
        'class' => '',                // Custom CSS class for the search form
        'button_text' => 'Search'     // Default text for the search button
    ), $atts);

    // Set the alignment CSS based on the 'alignment' attribute
    $alignment_styles = '';
    if ($atts['alignment'] === 'center') {
        $alignment_styles = 'text-align: center;';
    } elseif ($atts['alignment'] === 'right') {
        $alignment_styles = 'text-align: right;';
    }

    // Construct the search form HTML with custom attributes
    $form = '<form method="get" action="' . esc_url(home_url('/')) . '" class="' . esc_attr($atts['class']) . '" style="' . esc_attr($alignment_styles) . '">';
    $form .= '<input type="text" name="s" placeholder="' . esc_attr($atts['placeholder']) . '" style="width: ' . esc_attr($atts['width']) . ';" class="aio-search-input" />';
    $form .= '<button type="submit" class="aio-search-button">' . esc_html($atts['button_text']) . '</button>';
    $form .= '</form>';

    return $form;
}

add_shortcode('aio_search', 'aiosc_shortcode_search_bar');
