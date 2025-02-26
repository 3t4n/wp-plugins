<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use AISummarizer\AISummarizerAdmin;

$post_types = get_option('ai_summarizer_post_types');

$post_types = get_option('ai_summarizer_post_types', '');
$post_types_array = !empty($post_types) ? explode(',', $post_types) : []; // Split string into array

$all_post_types = get_post_types(['public' => true], 'objects');

foreach ($all_post_types as $post_type) {
    if ($post_type->name === 'attachment') {
        continue;
    }
    echo '<label>';
    echo '<input type="radio" name="ai_summarizer_post_types" value="' . esc_attr($post_type->name) . '"'
        . (in_array($post_type->name, $post_types_array) ? ' checked="checked"' : '') . '>';
    echo esc_html($post_type->label);
    echo '</label><br>'; // Add a line break for better spacing
}
