<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$value = get_option('ai_summarizer_widget_text_two', '');
echo '<input type="text" name="ai_summarizer_widget_text_two" value="' . esc_attr($value) . '" class="regular-text">';
