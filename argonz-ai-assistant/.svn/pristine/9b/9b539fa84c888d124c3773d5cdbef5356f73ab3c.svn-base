<?php
// If uninstall not called from WordPress, exit.
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// List of options to delete
$options = [
    'groq_api_key',
    'aiml_api_key',
    'api_service',
    'api_models',
];

// Loop through and delete each option
foreach ($options as $option) {
    delete_option($option);
}
