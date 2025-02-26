<?php
$word_limit = absint($column['wordCount']);
if (sanitize_text_field($product->get_type() == 'variation')) {
    $content = $product->get_description();
} else {
    $content = get_the_content();
}
$moreso = "...";

if (!$content) {
    return;
}


if (empty($word_limit)) {
    $content_html = '<div class="awcpt-content">';
    $content_html .= $content;
    $content_html .= '</div>';
} else {
    $content_html = '<div class="awcpt-content">';
    $content_html .= wp_trim_words($content, $word_limit, $moreso);
    $content_html .= '</div>';
}

echo wp_kses_post($content_html);


