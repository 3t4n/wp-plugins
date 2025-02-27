<?php
/**
 * This condition avoids direct access to the removal of the plugin
 */
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

$options = [
    'slope_options',
    'slope_promotions_options'
];
foreach ($options as $option) {
    if (get_option($option)) {
        delete_option($option);
    }
}
