<?php
/**
 * Security check
 * Prevent direct access to the file.
 *
 * @since 2.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/**
 * Slide.ly oEmbed
 * Register oEmbed provider.
 *
 * @since 2.0
 */
function slidely_oembed_provider() {

	wp_oembed_add_provider(
		'#https?://(www.)?slide.ly/(view|embed|photo|show/view|show/embed|gallery/view|gallery/embed|collage/view|collage/embed)/.*#i',
		'http://slide.ly/oembed',
		true
	);

}
add_action( 'init', 'slidely_oembed_provider' );
