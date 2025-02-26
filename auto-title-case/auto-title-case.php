<?php
/*
Plugin Name: Auto Title Case
Description: Automatically converts post and image titles to title case.
Version: 0.1
Author: Bryan Hadaway
Author URI: https://calmestghost.com/
Requires at least: 5.0
License: Public Domain
License URI: https://wikipedia.org/wiki/Public_domain
Text Domain: auto-title-case
*/

// block direct access to this file
if ( !defined( 'ABSPATH' ) ) {
	http_response_code( 404 );
	die();
}

// title case function
function atc_titlecase( $title ) {
	$exclude = array( 'a', 'an', 'and', 'as', 'at', 'but', 'by', 'en', 'for', 'from', 'if', 'in', 'is', 'it', 'nor', 'of', 'off', 'on', 'or', 'per', 'so', 'the', 'to', 'up', 'v', 'via', 'vs', 'with', 'yet' );
	$words   = explode( ' ', $title );
	foreach ( $words as $key => $word ) {
		if ( $key == 0 or !in_array( $word, $exclude ) ) {
			$words[$key] = ucwords( $word );
		}
	}
	$newtitle = implode( ' ', $words );
	return $newtitle;
}

// title case for post titles
add_action( 'the_post', 'atc_post_title' );
function atc_post_title( $post ) {
	if ( empty( $post->post_title ) ) {
		return;
	}
	$post_title = $post->post_title;
	if ( is_attachment() ) {
		$post_title = preg_replace( '%\s*[-_\s]+\s*%', ' ', $post_title );
		$post_title = strtolower( $post_title );
	}
	$post_title = atc_titlecase( $post_title );
	if ( $post->post_title === $post_title ) {
		return;
	}
	wp_update_post(
		array (
			'ID'		 => $post->ID,
			'post_title' => $post_title
		)
	);
	$post->post_title = $post_title;
}

// title case for file titles
add_action( 'add_attachment', 'atc_file_title' );
function atc_file_title( $file ) {
	$file_title = get_post( $file )->post_title;
	$file_title = preg_replace( '%\s*[-_\s]+\s*%', ' ', $file_title );
	$file_title = strtolower( $file_title );
	$file_title = atc_titlecase( $file_title );
	$file_meta  = array(
		'ID' 		 => $file,
		'post_title' => $file_title
	);
	update_post_meta( $file, '_wp_attachment_image_alt', sanitize_text_field( $file_title ) );
	wp_update_post( $file_meta );
}