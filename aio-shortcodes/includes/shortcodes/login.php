<?php

/**
 * Shortcode: [aio_login]
 * Description: Generates a login link with customizable text and an optional redirection.
 * Example usage: [aio_login text="Login" logged_in_text="Welcome, you are logged in!" logged_in_redirect="/dashboard" logged_in_class="btn-logged-in" class="btn-login" logged_in_link_text="Go to Dashboard"]
 */
function aiosc_shortcode_login($atts)
{
    // Set default attributes
    $atts = shortcode_atts(array(
        'text' => 'Login',                   // Default text for the login link
        'redirect' => '',                    // Default redirect URL after login
        'class' => 'btn-login',              // Custom CSS class for login link
        'logged_in_text' => 'You are already logged in!', // Text to display when logged in
        'logged_in_redirect' => '',          // Redirect URL for logged-in users
        'logged_in_class' => 'btn-logged-in', // Custom CSS class for logged-in users
        'logged_in_link_text' => 'Go to Dashboard' // Text for the dashboard link when logged in
    ), $atts);

    // If the user is logged in
    if (is_user_logged_in()) {
        // Check if a redirect URL for logged-in users is set
        $redirect_logged_in = !empty($atts['logged_in_redirect']) ? esc_url($atts['logged_in_redirect']) : home_url();

        // Create the message for logged-in users with the logged-in class
        $logged_in_message = '<span class="' . esc_attr($atts['logged_in_class']) . '">' . esc_html($atts['logged_in_text']) . '</span>';

        // Provide the link to redirect logged-in users (optional)
        return $logged_in_message . ' <a href="' . esc_url($redirect_logged_in) . '">' . esc_html($atts['logged_in_link_text']) . '</a>';
    }

    // If the user is not logged in
    // Set the redirect URL
    $redirect_url = !empty($atts['redirect']) ? esc_url($atts['redirect']) : home_url();

    // Generate the login URL
    $login_url = wp_login_url($redirect_url);

    // Create the login link with the login class
    return '<a class="' . esc_attr($atts['class']) . '" href="' . $login_url . '">' . esc_html($atts['text']) . '</a>';
}

add_shortcode("aio_login", "aiosc_shortcode_login");

