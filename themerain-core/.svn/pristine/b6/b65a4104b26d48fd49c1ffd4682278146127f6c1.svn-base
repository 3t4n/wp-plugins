<?php

/**
 * Enqueue block editor assets
 */
function trc_enqueue_editor_assets() {
	if ( is_admin() ) {
		wp_enqueue_script( 'swiper-element', TRC_ASSETS_URL . '/js/swiper-element.min.js', array(), null, true );
	}
}
add_action( 'enqueue_block_assets', 'trc_enqueue_editor_assets' );

/**
 * Register ThemeRain Slider block
 */
function trc_slider___register_block() {
	register_block_type( __DIR__ . '/slider' );
}
add_action( 'init', 'trc_slider___register_block' );
