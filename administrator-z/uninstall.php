<?php
global $wpdb;

$options_to_delete = $wpdb->get_results(
    "SELECT option_name FROM {$wpdb->options} WHERE option_name LIKE 'adminz_%'",
    ARRAY_A
);

if (!empty($options_to_delete)) {
    foreach ($options_to_delete as $option) {
        delete_option($option['option_name']);
    }
}