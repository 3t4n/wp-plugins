<?php
function anb_close_shortcode( $atts, $content = null  ) {
	$a = shortcode_atts( array(
	    'class' => '',
	    'tag' => 'button',
	), $atts );
	$close_class = ($a['class'] != null) ? ' ' . $a['class'] : null;
	$print_shortcode = '<' . $a['tag'] . ' class="anb-close' . $close_class . '">' . $content . '</' . $a['tag'] . '>';
	return $print_shortcode;
}
add_shortcode( 'anb_close', 'anb_close_shortcode' );
