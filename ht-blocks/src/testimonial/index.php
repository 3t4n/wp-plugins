<?php

function htblocks_testimonial_assets() {
	wp_enqueue_style( 'slick', HTBLOCKS_PLG_URI . 'src/testimonial/assets/css/slick.min.css');
	wp_enqueue_style( 'font-awesome');
} 
// Hook: Frontend assets.
add_action( 'enqueue_block_assets', 'htblocks_testimonial_assets' );