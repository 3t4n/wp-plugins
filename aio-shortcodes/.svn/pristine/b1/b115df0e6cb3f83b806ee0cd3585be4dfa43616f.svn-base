<?php

/**
 * Shortcode: [aio_logout]
 * Description: Generates a logout link with customizable text, optional custom text, redirect URL, and custom CSS classes.
 * Example usage: [aio_logout text="Log Out" custom_text="Click here to " redirect="https://example.com" class="custom-logout-link"]
 */
function aiosc_shortcode_logout($atts)
{
    // Check if the user is logged in
    if (!is_user_logged_in()) {
        return ''; // Return nothing if the user is not logged in
    }

    // Set default attributes
    $atts = shortcode_atts(array(
        'text' => 'Log Out',    // Default text for the logout link
        'redirect' => '',       // Optional redirect URL after logout
        'text' => '',    // Additional custom text to display before the link
        'class' => 'btn-logout',          // Custom CSS class for the logout link
    ), $atts);

    // Determine the redirect URL
    $redirect_url = '';
    if (!empty($atts['redirect'])) {
        $redirect_url = esc_url($atts['redirect']);
    }

    // Sanitize the CSS class
    $class_attr = !empty($atts['class']) ? ' class="' . esc_attr($atts['class']) . '"' : '';

    // Generate the logout URL
    $logout_url = wp_logout_url($redirect_url);

    // Create the logout link
    $logout_link = '<a href="' . $logout_url . '"' . $class_attr . '>' . esc_html($atts['text']) . '</a>';

    // Combine custom text and the logout link
    return esc_html($atts['custom_text']) . ' ' . $logout_link;
}

add_shortcode("aio_logout", "aiosc_shortcode_logout");
