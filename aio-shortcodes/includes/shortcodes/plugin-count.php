<?php

/**
* Shortcode: [aio_plugin_count]
* Description: Displays the count of plugins based on their status (active, inactive, all, or installed).
* Example usage: [aio_plugin_count status="active"], [aio_plugin_count status="inactive"], [aio_plugin_count status="all"], or [aio_plugin_count status="installed"]
*/

function aiosc_plugin_count_shortcode($atts) {
    // Set default attributes for the shortcode
    $atts = shortcode_atts(
        array(
            'status' => 'active', // Default status is 'active'
        ),
        $atts,
        'aio_plugin_count'
    );

    // Get all installed plugins
    $all_plugins = get_plugins();
    $plugin_count = 0;

    // If status is 'all' or 'installed', count total number of installed plugins (both active and inactive)
    if ( in_array($atts['status'], array('all', 'installed')) ) {
        $plugin_count = count($all_plugins); // Total number of installed plugins
    } else {
        // Count active or inactive plugins based on the status
        foreach ($all_plugins as $plugin_file => $plugin_data) {
            $plugin_status = is_plugin_active($plugin_file) ? 'active' : 'inactive';

            // If the status is 'active', count active plugins, or inactive if 'inactive' is set
            if ($atts['status'] === $plugin_status) {
                $plugin_count++;
            }
        }
    }

    // Return the plugin count
    return $plugin_count;
}

// Register the shortcode
add_shortcode('aio_plugin_count', 'aiosc_plugin_count_shortcode');

?>
