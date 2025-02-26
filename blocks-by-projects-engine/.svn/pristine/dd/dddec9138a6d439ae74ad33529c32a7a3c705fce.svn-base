<?php

function gbpe_custom_plugin_row_meta($links, $file) {
    if (strpos($file, 'goodblocks/goodblocks.php') !== false) {
        // Add your custom links
        $new_links = array(
            '<a href="https://projectsengine.com/contact" target="_blank" alt="Support">Support</a>',
            '<a href="https://projectsengine.com/plugin/blocks-by-projects-engine" target="_blank" alt="Subscribe">Subscribe</a>',
        );

        $links = array_merge($links, $new_links);
    }
    return $links;
}
add_filter('plugin_row_meta', 'gbpe_custom_plugin_row_meta', 10, 2);