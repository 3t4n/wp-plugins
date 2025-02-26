<?php
$options = get_option( 'avanutilities_option' );

if( !empty( $options['avshort1']) ) {
	add_shortcode('avsh1', 'avan_get_shortcodef');
}
function avan_get_shortcodef( $atts, $content = null ) {
	ob_start();
	echo avan_getoption( 'avshort1' );
	return ob_get_clean();
}

if( !empty( $options['avshort2']) ) {
	add_shortcode('avsh2', 'avan_get_shortcodes');
}
function avan_get_shortcodes( $atts, $content = null ) {
	ob_start();
	echo avan_getoption( 'avshort2' );
	return ob_get_clean();
}

if( !empty( $options['avshort3']) ) {
	add_shortcode('avsh3', 'avan_get_shortcodet');
}
function avan_get_shortcodet( $atts, $content = null ) {
	ob_start();
	echo avan_getoption( 'avshort3' );
	return ob_get_clean();
}

if( !empty( $options['avshort4']) ) {
	add_shortcode('avsh4', 'avan_get_shortcodefo');
}
function avan_get_shortcodefo( $atts, $content = null ) {
	ob_start();
	echo avan_getoption( 'avshort4' );
	return ob_get_clean();
}

if( !empty( $options['avshort5']) ) {
	add_shortcode('avsh5', 'avan_get_shortcodefi');
}
function avan_get_shortcodefi( $atts, $content = null ) {
	ob_start();
	echo avan_getoption( 'avshort5' );
	return ob_get_clean();
}

if( !empty( $options['avshort6']) ) {
	add_shortcode('avsh6', 'avan_get_shortcodesi');
}
function avan_get_shortcodesi( $atts, $content = null ) {
	ob_start();
	echo avan_getoption( 'avshort6' );
	return ob_get_clean();
}