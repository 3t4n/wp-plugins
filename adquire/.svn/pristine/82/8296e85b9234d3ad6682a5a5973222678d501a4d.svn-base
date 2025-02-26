<?php

/**
 * Load plugin-styles.css & plugin-admin-page.js at our AdQuire admin page
 */
function adqwp_load_scripts() {
	// Load some css
	wp_register_style(
		'adqwp-styles',
		plugins_url('css/plugin-styles.css', __FILE__)
	);
	wp_enqueue_style('adqwp-styles');

	// Load some JS logic
	// $handle, $path, $dependencies, $version, $location
	wp_register_script(
		'plugin-admin-page-logic',
		plugins_url('/js/plugin-admin-page.js', __FILE__),
		array('jquery'),
		'1.1',
		true
	);
	wp_enqueue_script('plugin-admin-page-logic');
}

add_action('admin_enqueue_scripts', 'adqwp_load_scripts');

/**
 * Loads capture.js ONLY on the webpage that the user inputs
 */
function adqwp_load_custom_script() {
	global $adqwp_options;

	// Enqueue AdQuireCapture script conditionally
	// on the page the user has a form on
	if (!is_admin() && is_page($adqwp_options['adqcapture'])) {
		wp_register_script(
			'adq-capture',
			plugins_url('/js/AdQuireCapture.js', __FILE__),
			true
		);
		wp_enqueue_script('adq-capture');
	}

	// Enqueue AdQuireEmbed logic script conditionally
	// on the page the user wants AdQuire on
	if (!is_admin() && is_page($adqwp_options['embed'])) {
		wp_register_script(
			'plugin-adquire-embed-logic',
			plugins_url('/js/plugin-adquire-embed.js', __FILE__),
			array('jquery'),
			'1.1',
			true
		);
		wp_enqueue_script('plugin-adquire-embed-logic');
	}
}

add_action('wp_print_scripts', 'adqwp_load_custom_script');

/**
 * Create a new instance of AdQuireCapture and initialize it conditionally
 * on the page the user has a form on
 */
function adqwp_load_capture_instance() {
	global $adqwp_options;

	if (!empty($adqwp_options['adqcapture'])) {
		if (!is_admin() && is_page($adqwp_options['adqcapture'])) {
			$capture_instance = sprintf(
				'<script> var globalAdQCapture = new AdQuireCapture(%s); ' .
				'globalAdQCapture.init(); </script>',
				json_encode($adqwp_options, JSON_PRETTY_PRINT)
			);

			print $capture_instance;
		}
	}
}

add_action('wp_footer', 'adqwp_load_capture_instance');