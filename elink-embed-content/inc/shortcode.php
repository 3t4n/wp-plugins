<?php
/**
 * The [elink] shortcode and related functions
 *
 * @package elink-embed
 */

/**
 * A shortcode to simplify the process of embedding articles using elink
 *
 * This function also powers the elink Embed block output in Gutenberg,
 * as the render callback for a dynamic block.
 *
 * @param Array  $atts    the attributes passed in the shortcode.
 * @param String $content the enclosed content; should be empty for this shortcode.
 * @param String $tag     the shortcode tag.
 * @uses elink_shortcode_script_footer_enqueue
 * @uses embed_js_url
 * @return String the embed HTML
 */
function elink_shortcode( $atts = array(), $content = '', $tag = '' ) {
	// generate an ID for this embed; necessary to prevent conflicts.
	global $elink_id;
	if ( ! isset( $elink_id ) ) {
		$elink_id = 0;
	} else {
		++$elink_id;
	}

	// Set us up the vars.
	$id = empty( $atts['id'] ) ? '' : esc_attr( $atts['id'] );
	$actual_id = empty( $id ) ? 'elink_' . $elink_id : $id;
	$src = $atts['src'];

	ob_start();

	printf(
		'<div id="%1$s"></div>', esc_attr( $actual_id ) 
	);

	// If this is the first elink element on the page,
	// register the default embed_js_src script tag for output.
	$embed_js_url = elink_embed_js_url();
	if ( 0 === $elink_id ) {
		$elink_js_output = ElinkJS_Output::get_instance();
		$elink_js_output->add( $embed_js_url );
	}

	// Output the parent's scripts.
	elink_shortcode_script_footer_enqueue( array(
		'elink_id' => $elink_id,
		'actual_id' => $actual_id,
		'src' => $src
	) );

	// What is output to the page:
	$ret = ob_get_clean();
	return $ret;
}
add_shortcode( 'elink', 'elink_shortcode' );

/**
 * Given the necessary arguments for creating an embed's activation javascript, enqueue that script in the footer
 */
if ( ! function_exists( 'elink_shortcode_script_footer_enqueue' ) ) {
	function elink_shortcode_script_footer_enqueue( $args = array() ) {
		add_action(
			'wp_footer',
			function() use ( $args ) {
				// Output the parent's scripts.
				echo '<script>';
				echo sprintf(
					'var elink_%1$s = new elEmbed.Parent(\'%2$s\', \'%3$s\', {})',
					esc_js( (string) $args['elink_id'] ),
					esc_js( $args['actual_id'] ),
					esc_js( $args['src'] )
				);
				echo '</script>';
				echo PHP_EOL; // for pretty printing of scripts in the footer.
			},
			20 // So that this comes after the elinksrc tag is output at priority 10.
		);
	}
}

/**
 * The plugin-provided elink_embed_js_url
 *
 * @return string The URL for /wp-content/plugins/elink-embed/js/embed.js
 */
function elink_embed_js_url() {
	return plugins_url( '/js/embed.v1.js', dirname( __FILE__ ) );
}
