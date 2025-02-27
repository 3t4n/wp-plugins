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
 * Slide.ly shortcode
 * Register shortcode handler.
 *
 * usage: [slidely src="" w="520" h="292" autoplay="0" remove_ref="1"]
 *
 * @since 1.0
 */
function slidely_shortcode( $atts ) {

	// Set default attributes
	$atts = shortcode_atts(
		array(
			'src'        => null,
			'w'          => 520,
			'h'          => 292,
			'autoplay'   => 0,
			'remove_ref' => 1,
		), $atts
	);

	// Src
	if ( empty( $atts['src'] ) || !preg_match( '/slide\.ly\/(view|embed|photo|show\/view|show\/embed|gallery\/view|gallery\/embed|collage\/view|collage\/embed)\/([0-9a-z]+)/i', $atts['src'], $matches ) )
		return null;

	$embedUrl = 'http://slide.ly/';
	switch ( $matches[1] ) {
		case 'view':
		case 'embed':
			$embedUrl .= 'embed/' . $matches[2] . '/autoplay/' . $atts['autoplay'];
			break;

		case 'photo':
			$embedUrl .= 'photo/' . $matches[2];
			break;

		case 'show/view':
		case 'show/embed':
			$embedUrl .= 'show/embed/' . $matches[2];
			break;

		case 'gallery/view':
		case 'gallery/embed':
			$embedUrl .= 'gallery/embed/' . $matches[2];
			break;

		case 'collage/view':
		case 'collage/embed':
			$embedUrl .= 'collage/embed/' . $matches[2];
			break;
	}

	// Embed code
	$code = '<iframe src="' . esc_attr( $embedUrl ) . '" width="' . esc_attr( $atts['w'] ) . '" height="' . esc_attr( $atts['h'] ) . '" frameborder="0" scrolling="no" allowfullscreen></iframe>';

	// Ref
	if ( intval( $atts['remove_ref'] ) !== 1 ) {
		$code .= '<p>';
		$code .= sprintf(
			/* translators: %s: Slide.ly */
			__( 'By %s', 'slidely-slideshows-embed' ),
			'<a href="http://slide.ly" target="_blank">' . __( 'Slide.ly - SlideShow Maker', 'slidely-slideshows-embed' ) . '</a>'
		);
		$code .= '</p>';
	}

	// Return code
	return $code;

}
add_shortcode( 'slidely', 'slidely_shortcode' );
