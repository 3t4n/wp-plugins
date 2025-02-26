<?php

/**
* Shortcode: [aio_wp_version]
* Description: Displays the current WordPress version.
* Example usage: [aio_wp_version]
*/

function aiosc_wp_version_shortcode() {
    // Get the current WordPress version
    global $wp_version;
    
    // Return the WordPress version
    return $wp_version;
}

// Register the shortcode
add_shortcode('aio_wp_version', 'aiosc_wp_version_shortcode');

?>
