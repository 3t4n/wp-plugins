<?php

/**
 * Shortcode [aio_ip] to display the user's IP address.
 *
 * @return string The user's IP address.
 */
function aiosc_shortcode_user_ip() {
    // Check if 'REMOTE_ADDR' exists
    if ( isset( $_SERVER['REMOTE_ADDR'] ) ) {
        // Unsplash the IP address before sanitizing
        $user_ip = wp_unslash( $_SERVER['REMOTE_ADDR'] );

        // Sanitize the IP address
        $user_ip = sanitize_text_field( $user_ip );

        // Validate the IP address format (IPv4 or IPv6)
        if ( filter_var( $user_ip, FILTER_VALIDATE_IP ) ) {
            return $user_ip;
        } else {
            return 'Invalid IP address';
        }
    }

    return 'IP address not found'; // Fallback message if REMOTE_ADDR is not set
}

// Add the shortcode for IP address.
add_shortcode('aio_ip', 'aiosc_shortcode_user_ip');
