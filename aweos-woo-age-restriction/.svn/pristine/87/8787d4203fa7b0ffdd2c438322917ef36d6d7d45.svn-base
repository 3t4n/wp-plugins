<?php

if ( !defined( 'ABSPATH' ) ) exit;

function awar_popup_scripts() {
	// load scripts just for the first time 
	// the popup will appear just once after success

	if (isset($_COOKIE['awarStatus']) && $_COOKIE['awarStatus'] == 'accepted') return;

	if (AWAR_ENQUEUE_DEV_MODE) {
		awar_auto_enqueue('js', [
			'js/extensions/selectize.js',
			'js/extensions/js-cookie.js',
			'js/extensions/aw-open-popup.js',
			'js/templates.js'
		]);
	} else {
		awar_auto_enqueue('js', [
			'js/public.min.js',
		]);
	}

	add_action('wp_footer', 'awar_enqueue_templates');
	return;
}

add_shortcode('awar_age_popup', 'awar_popup_scripts');

function awar_enqueue_for_category() {
	// load scripts if the category is listed as vulnerable for underage users

	global $post;
	$id = $post->ID;

	if (is_shop()) return; // is in the loop
	$terms = get_the_terms( $post->ID, 'product_cat' );
	if (!$terms) return;

	foreach ($terms as $term) {
		$current_slug = $term->slug;
		$restrict_for = get_option('awar-woo-categories');
		$restrict_for = explode(', ', $restrict_for);

		foreach ($restrict_for as $restrict_slug) {
			if ($restrict_slug == $current_slug) {
				awar_popup_scripts();
				break;
			}
		}
	}
}

add_action('get_footer', 'awar_enqueue_for_category');

function awar_enqueue_styles() {
	// load styles, styles will always be enqueued
	if (AWAR_ENQUEUE_DEV_MODE) {
		awar_auto_enqueue('css', [
			'css/extensions/selectize.css',
			'css/templates.css'
		]);
	} else {
		awar_auto_enqueue('css', [
			'css/public.min.css'
		]);
	}
}

add_action('wp_head', 'awar_enqueue_styles');

function awar_print_overriding_inline_style_for_submit_button() {
	$picker_color_hex = get_option('awar-color-picker-submit');
	$picker_color_hex_shadow = get_option('awar-color-picker-submit-shadow');
	$picker_color_text = get_option('awar-color-picker-submit-text-color');

	$submit_button_css = "
	.awar-picker-submit { 		
		background-color: $picker_color_hex;
		box-shadow: 0px 5px 0px 0px $picker_color_hex_shadow;
		color: $picker_color_text;
	}
	";

	wp_register_style( 'awar-override-submit-buttons-inline-style', false );
	wp_enqueue_style( 'awar-override-submit-buttons-inline-style' );
	wp_add_inline_style( 'awar-override-submit-buttons-inline-style', $submit_button_css );
}

add_action( 'wp_head', 'awar_print_overriding_inline_style_for_submit_button' );
