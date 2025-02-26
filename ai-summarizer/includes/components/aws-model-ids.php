<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$value = get_option('ai_summarizer_bedrock_model_id', '');

// Dropdown options
$options = [
    'amazon.titan-text-express-v1' => 'Titan Text G1 - Express (Max 8k Words/token)',
    'amazon.titan-text-lite-v1' => 'Titan Text G1 - Lite (Max 4k Words/tokens)'
];

echo '<select name="ai_summarizer_bedrock_model_id" class="regular-text">';

// Loop through options and create select options
foreach ($options as $key => $label) {
    $selected = selected($value, $key, false);
    echo '<option value="' . esc_attr($key) . '" ' . esc_html($selected) . '>' . esc_html($label) . '</option>';
}

echo '</select>';
