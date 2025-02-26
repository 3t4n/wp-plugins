<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$summary_speed = get_option('ai_summarizer_summary_speed', '');

if (empty($summary_speed)) {
    $summary_speed = '25';
}

// Dropdown options
$options = [
    '10' => 'Fast',
    '25' => 'Normal',
    '50' => 'Slow',
];

echo '<select name="ai_summarizer_summary_speed" class="regular-text">';

// Loop through options and create select options
foreach ($options as $key => $label) {
    $selected = selected($summary_speed, $key, false);
    echo '<option value="' . esc_attr($key) . '" ' . esc_attr($selected) . '>' . esc_html($label) . '</option>';
}

echo '</select>';
