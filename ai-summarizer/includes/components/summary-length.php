<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$summary_length = get_option('ai_summarizer_summary_length', '');

// Dropdown options
$options = [
    '100' => '100 Word Summary',
    '150' => '150 Word Summary',
    '200' => '200 Word Summary'
];

echo '<select name="ai_summarizer_summary_length" class="regular-text">';

// Loop through options and create select options
foreach ($options as $key => $label) {
    $selected = selected($summary_length, $key, false);
    echo '<option value="' . esc_attr($key) . '" ' . esc_html($selected) . '>' . esc_html($label) . '</option>';
}

echo '</select>';
