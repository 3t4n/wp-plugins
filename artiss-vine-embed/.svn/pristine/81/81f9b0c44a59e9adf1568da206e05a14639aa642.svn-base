<?php
/**
* Embed Code
*
* Various functions to enable embedding
*
* @package	Artiss-Vine-Embed
*/

/**
* Embed shortcode
*
* Extract shortcode parameters and return vine code
*
* @since	1.0
*
* @uses		ave_generate_embed_code		Generate the Vine code
*
* @param	string		$paras			Shortcode parameters
* @param	string		$content		Shortcode content
* @return	string						Vine code
*/

function ave_embed_shortcode( $paras = '', $content = '' ) {

	// Extract shortcode parameters

	$paras = shortcode_atts( array( 'size' => '', 'type' => '' ), $paras );

	// Add content to parameter array

	$paras[ 'content' ] = $content;

	// Call function to generate code

	return do_shortcode( ave_generate_embed_code( $paras ) );
}

add_shortcode( 'vine', 'ave_embed_shortcode' );

/**
* Generate embed code
*
* Generate the Vine embed code based on supplied parameters
*
* @since	1.0
*
* @param	string		$paras			Array of parameters
* @return	string						Vine code
*/

function ave_generate_embed_code( $paras ) {

	extract( $paras );
	$options = ave_get_options();

	// If no ID is specified used the content parameter
	// However, strip down the URL to leave just the ID

	if ( !isset( $id ) ) {
		$id = str_replace( 'vine.co/v/', '', $content );
		$id = str_replace( 'https://', '', $id );
		$id = str_replace( 'http://', '', $id );
		$id = str_replace( '/embed', '', $id );
	}

	// Generate video type

	$type = strtolower( $type );
	if ( ( $type != 'simple' ) && ( $type != 'postcard' ) ) { $type = $options[ 'type' ]; }

	// Get size
	if ( ( !isset( $size ) ) or ( !is_numeric( $size ) ) ) { $size = $options[ 'size' ]; }

	// Build a URL for the embed

	$url = 'https://vine.co/v/' . $id . '/embed/' . $type;

	// Put code together, including metadata

	$code = '<span itemscope="itemscope" xmlns:media="http://search.yahoo.com/searchmonkey/media/" xmlns:dc="http://purl.org/dc/terms/">' . "\n";

	$code .= '<iframe class="vine-embed" src="' . $url . '" width="' . $size . '" height="' . $size . '" frameborder="0"></iframe><script async src="//platform.vine.co/static/scripts/embed.js" charset="utf-8"></script>' . "\n";

	$code .= '<link itemprop="media:video" rel="alternate" href="' . $url . '"/>' . "\n";
	$code .= '<meta itemprop="media:width" content="' . $size . '"/>' . "\n";
	$code .= '<meta itemprop="media:height" content="' . $size . '"/>' . "\n";
	$code .= '</span>' . "\n";

	// Add comment wrap

	$code = "\n" . '<!-- Artiss Vine Embed v' . artiss_vine_embed_version . ' -->' . "\n" . $code;
	$code .= '<!-- End of Artiss Vine Embed code -->' . "\n";

	return $code;
}
?>