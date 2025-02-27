<?php
defined( 'ABSPATH' ) || die;

// enqueue css file into front-end
add_action('elementor/frontend/after_enqueue_styles', function() {
	wp_enqueue_style(
		'farsi_font_for_elementor-frontend_css',
		FARSI_FONT_FOR_ELEMENTOR['CSS'].'fonts.css',
		[],
		FARSI_FONT_FOR_ELEMENTOR['V']
	);
});
