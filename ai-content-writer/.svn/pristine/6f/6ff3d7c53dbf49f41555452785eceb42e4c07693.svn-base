<?php

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * Render an external image.
 *
 * @param string $image_url The image URL.
 * @param string $alt The alt text.
 * @param string $class_name The class name.
 *
 * @since 1.0.0
 * @package AIContentWriter
 * @return string The image HTML.
 */
function aicw_render_external_image( $image_url, $alt = '', $class_name = '' ) {
	if ( empty( $image_url ) ) {
		return ''; // Return early if no image URL.
	}

	// Sanitize the URL, alt text, and class.
	$image_url  = esc_url( $image_url );
	$alt        = esc_attr( $alt );
	$class_name = esc_attr( $class_name );

	// Prepare the attributes.
	$attributes = sprintf(
		'src="%s" alt="%s" class="%s"',
		$image_url,
		$alt,
		$class_name
	);

	if ( empty( $attributes ) ) {
		return ''; // Return early if no attributes.
	}

	// Allow only the <img> tag with specific attributes.
	$allowed_html = array(
		'img' => array(
			'src'   => array(),
			'alt'   => array(),
			'class' => array(),
		),
	);

	// Construct the <img> tag.
	$img_tag = '<img ' . $attributes . '>';

	// Return sanitized HTML.
	return wp_kses( $img_tag, $allowed_html );
}

/**
 * Convert OpenAI Markdown to HTML.
 *
 * @param string $content The OpenAI Markdown content.
 * @param string $title The title of the content.
 *
 * @since 1.0.0
 * @package AIContentWriter
 * @return array The HTML content and title.
 */
function aicw_convert_openai_markdown_to_html( $content, $title = '' ) {
	// Replace headers.
	$content = preg_replace( '/###### (.+)/', '<h6>$1</h6>', $content );
	$content = preg_replace( '/##### (.+)/', '<h5>$1</h5>', $content );
	$content = preg_replace( '/#### (.+)/', '<h4>$1</h4>', $content );
	$content = preg_replace( '/### (.+)/', '<h3>$1</h3>', $content );
	$content = preg_replace( '/## (.+)/', '<h2>$1</h2>', $content );

	// Replace bold text.
	$content = preg_replace( '/\*\*(.+?)\*\*/', '<strong>$1</strong>', $content );

	// Extract title if present.
	preg_match( '/^# (.+)/m', $content, $matches );
	$title = $matches[1] ?? $title;
	// Remove title from content.
	$content = preg_replace( '/^# .+\n*/', '', $content );

	return array(
		'title'   => $title,
		'content' => $content,
	);
}
