<?php

add_action('wp_enqueue_scripts', function () {

	/* JS */
	wp_enqueue_script(
		'sangoplus-script',
		SANGOPLUS_PLUGIN_URL . 'assets/script.js',
		array(),
		SANGOPLUS_PLUGIN_VERSION,
		true
	);

	/* TOC JS */
	$options = get_option( 'my_theme_options' );
	if ( $options['originCheckbox1'] || $options['originCheckbox2'] ) {
		wp_enqueue_script(
			'sangoplus-scripttoc',
			SANGOPLUS_PLUGIN_URL . 'assets/toc_script.js',
			array(),
			SANGOPLUS_PLUGIN_VERSION,
			true
		);
	}

	/* Fadein JS */
	$loading_url = get_theme_mod( 'loadinganime_img' );
	if ( ! empty( $loading_url ) ) {
		wp_enqueue_script(
			'sangoplus-scriptfadein',
			SANGOPLUS_PLUGIN_URL . 'assets/fadein_script.js',
			array(),
			SANGOPLUS_PLUGIN_VERSION,
			true
		);
	}

	/* CSS */
	wp_enqueue_style(
		'sangoplus-style',
		SANGOPLUS_PLUGIN_URL . 'assets/style.css',
		array(),
		SANGOPLUS_PLUGIN_VERSION
	);

	/* TOCCSS */
	$options = get_option( 'my_theme_options' );
	if ( $options['originCheckbox3'] ) {
		if ( $options['originCheckbox1'] || $options['originCheckbox2'] ) {
			wp_enqueue_style(
				'sangoplus-styletoc',
				SANGOPLUS_PLUGIN_URL . 'assets/toc_style.css',
				array(),
				SANGOPLUS_PLUGIN_VERSION
			);
		}
	}

	/* FadeinCSS */
	$loading_url = get_theme_mod( 'loadinganime_img' );
	if ( ! empty( $loading_url ) ) {
			wp_enqueue_style(
				'sangoplus-stylefadein',
				SANGOPLUS_PLUGIN_URL . 'assets/fadein_style.css',
				array(),
				SANGOPLUS_PLUGIN_VERSION
			);
	}
},
9999);
