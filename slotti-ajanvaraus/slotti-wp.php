<?php
	/*
	Plugin Name: Slotti Ajanvaraus
	Plugin URI: https://slotti.fi
	Description: Slotti Ajanvaraus -lisäosa helpottaa ajanvaruspainikkeen tai upotetun varaussivun lisäämistä WordPress-sivuille.
	Author: Teonos Oy
	Version: 2.0.0
	License: GPLv2 or later
	License URI: https://www.gnu.org/licenses/gpl-2.0.html
	*/

//[slotti url="https://slotti.fi/booking/EXAMPLE"]
function slotti_shortcode($atts){

	$a = shortcode_atts( array(
		'url' => NULL,
		'text' => 'Varaa aika'
	), $atts, 'slotti' );

	$url = esc_url( sanitize_text_field( $a['url'] ) );
    $text = esc_html( sanitize_text_field( $a['text'] ));

	// filter only data- prefixed parameters and create data-attributes out of
	$data_attrs = '';
	foreach ($atts as $key => $value) {
		if (strpos($key, 'data-') === 0) {
			$data_attrs .= esc_attr( $key ) . '="' . esc_attr( sanitize_text_field( $value ) ) . '" ';
		}
	}

	// Construct the link, omitting href if URL is NULL
	$link = '<a ' . ( $url ? 'href="' . $url . '" ' : '' ) . $data_attrs . ' class="slotti-book-now">' . $text . '</a>';
	return $link;
}


add_shortcode( 'slotti', 'slotti_shortcode' );

function register_embed_script(){
	wp_register_script('slotti_embed_js', 'https://slotti.fi/static/js/embed.js');
	wp_enqueue_script('slotti_embed_js');

}

// add embed script to footer, so the slotti-book-now -tags exists before
// scanning.
add_action('wp_footer', 'register_embed_script');

?>
