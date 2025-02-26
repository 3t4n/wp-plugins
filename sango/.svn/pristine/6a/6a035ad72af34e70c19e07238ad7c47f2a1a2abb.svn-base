<?php

function sngplus_is_selected_font() {
	return ( get_theme_mod( 'sangoplusfont_options' ) === $name );
}

/**
 * Fontfile
 */
function sangoplus_enqueue_scripts() {
	$options = get_option( 'sangoplusfont_options' );
	if ( ! sng_is_selected_font( 'notosansjp' ) && ! sng_is_selected_font( 'mplusrounded1c' ) ) {
		if ( $options === 'mplus1p' ) {
			wp_enqueue_style( 'https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@100;300;400;500;700;800;900&display=swap' );
		}
		if ( $options === 'notoserifjapanese' ) {
			wp_enqueue_style( 'notoSerifJapanese', 'https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200;300;400;500;600;700;900&display=swap' );
		}
		if ( $options === 'kaiseitokumin' ) {
			wp_enqueue_style( 'kaiseitokumin', 'https://fonts.googleapis.com/css2?family=Kaisei+Tokumin:wght@400;500;700;800&display=swap' );
		}
		if ( $options === 'kaiseiopti' ) {
			wp_enqueue_style( 'kaiseiopti', 'https://fonts.googleapis.com/css2?family=Kaisei+Opti:wght@400;500;700&display=swap' );
		}
		if ( $options === 'shipporimincho' ) {
			wp_enqueue_style( 'shipporimincho', 'https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@400;500;600;700;800&display=swap' );
		}
		if ( $options === 'kiwimaru' ) {
			wp_enqueue_style( 'kiwimaru', 'https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300;400;500&display=swap' );
		}
		if ( $options === 'shipporiminchob1' ) {
			wp_enqueue_style( 'shipporiminchob1', 'https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1:wght@400;500;600;700;800&display=swap' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'sangoplus_enqueue_scripts' );

/**
 * Style
 */
function customizer_sangoplus_fontstyle() {
	$options = get_option( 'sangoplusfont_options' );
	if ( ! sng_is_selected_font( 'notosansjp' ) && ! sng_is_selected_font( 'mplusrounded1c' ) ) {
		if ( $options === 'mplus1p' ) {
			?>
	<style type="text/css">
	body {font-family: 'M PLUS 1p', "Helvetica", "Arial", sans-serif;}
	body .dfont {font-family: "Helvetica", "Arial", 'M PLUS 1p', sans-serif;}
	</style>
			<?php
		}
		if ( $options === 'notoserifjapanese' ) {
			?>
	<style type="text/css">
	body {font-family: 'Noto Serif JP', serif;}
	body .dfont {font-family: 'Noto Serif JP', serif;}
	</style>
			<?php
		}
		if ( $options === 'kaiseitokumin' ) {
			?>
	<style type="text/css">
	body {font-family: 'Kaisei Tokumin', serif;}
	body .dfont {font-family: 'Kaisei Tokumin', serif;}
	</style>
			<?php
		}
		if ( $options === 'kaiseiopti' ) {
			?>
	<style type="text/css">
	body {font-family: 'Kaisei Opti', serif;}
	body .dfont {font-family: 'Kaisei Opti', serif;}
	</style>
			<?php
		}
		if ( $options === 'shipporimincho' ) {
			?>
	<style type="text/css">
	body {font-family: 'Shippori Mincho', serif;}
	body .dfont {font-family: 'Shippori Mincho', serif;}
	</style>
			<?php
		}
		if ( $options === 'kiwimaru' ) {
			?>
	<style type="text/css">
	body {font-family: 'Kiwi Maru', serif;}
	body .dfont {font-family: 'Kiwi Maru', serif;}
	</style>
			<?php
		}
		if ( $options === 'shipporiminchob1' ) {
			?>
	<style type="text/css">
	body {font-family: 'Shippori Mincho B1', serif;}
	body .dfont {font-family: 'Shippori Mincho B1', serif;}
	</style>
			<?php
		}
	}
}
add_action( 'wp_head', 'customizer_sangoplus_fontstyle', 1000 );
