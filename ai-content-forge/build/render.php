<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

function aicg_render_ai_content_generator_block( $attributes ) {
    // Retrieve the content attribute
   $markdown_content = $attributes['content'];
   $allowed_html = array(
    'a' => array(
        'href' => array(),
        'title' => array(),
    ),
    'p' => array(),
    'h1' => array(),
    'h2' => array(),
    'h3' => array(),
    'ul' => array(),
    'ol' => array(),
    'li' => array(),
    'strong' => array(),
    'em' => array(),
    'b' => array(),
    'i' => array(),
    'br' => array(),
    'img' => array(
        'src' => array(),
        'alt' => array(),
        'width' => array(),
        'height' => array(),
    ),
    // Add any additional tags you need here
);

// Sanitize output with the allowed HTML tags
$parsed_content = wp_kses( $markdown_content, $allowed_html );
	return sprintf(
		'<div class="wp-block-aicg-ai-content-forge">%s</div>',
		
		$markdown_content
	);
}