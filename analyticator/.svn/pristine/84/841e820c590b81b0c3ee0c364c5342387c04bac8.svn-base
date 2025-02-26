<?php

function analyticator_scripts() {
	wp_register_style( 'analyticator-css', plugins_url() . '/analyticator/assets/css/analyticator.css', array(), '', 'all' );
	wp_register_style( 'analyticator-grid', plugins_url() . '/analyticator/assets/css/simple-grid.css', array(), '', 'all' );

	wp_enqueue_style( 'analyticator-css' );
	wp_enqueue_style( 'analyticator-grid' );

	wp_register_script( 'analyticator-fontawesome', 'https://use.fontawesome.com/eb411371dd.js', array(), false, false );
	wp_register_script( 'analyticator-js', plugins_url() . '/analyticator/assets/js/analyticator.js', array(), false, false );

	wp_enqueue_script( 'analyticator-fontawesome' );
	wp_enqueue_script( 'analyticator-js' );
}