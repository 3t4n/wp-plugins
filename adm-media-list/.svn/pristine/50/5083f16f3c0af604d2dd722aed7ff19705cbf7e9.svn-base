<?php
/**
 * Plugin Name: ADM Media List
 * Description: Adds a widget to the dashboard that displays a list of urls for each item in the media library.
 * Version:     1.0
 * Author:      Adrian Georgel
 * Author URI:  https://adriangeorgel.com/
 */


function admi_enqueue_scripts() {

	// Register Stylesheet
	wp_register_style( 'styles-css', plugins_url( '/css/styles.css', __FILE__ ) );

	// Enqueue Stylesheet
	wp_enqueue_style( 'styles-css' );

	// Register Javascript
	wp_register_script( 'copy-urls-js', plugins_url( '/js/copy-urls.js', __FILE__ ) );

	// Enqueue Scripts
	wp_enqueue_script( 'copy-urls-js' );
}
add_action('admin_enqueue_scripts', 'admi_enqueue_scripts');

function admi_media_dashboard_widget() {

	// Add Widget ID, Name & Callback
	wp_add_dashboard_widget(
		'media_library_list',
		'Media Library List',
		'admi_media_list_function'
	);
}
add_action( 'wp_dashboard_setup', 'admi_media_dashboard_widget' );

function admi_media_list_function() {

	$args = array(
		'post_type'   => 'attachment',
		'numberposts' => - 1,
		'post_status' => null,
		'post_parent' => null,
	);

	$attachments = get_posts( $args );

	if ( $attachments ) {

		echo '<div class="media-items">';
		echo '<form><textarea readonly name="text" id="mediaItems">';

		foreach ( $attachments as $attachment ) {
			$link = wp_get_attachment_url($attachment->ID);
			echo $link . "\n";
		}

		echo '</textarea></form>';
		echo '<button class="copy-btn" onclick="admi_copy_text()">Copy URLs</button>';
		echo '</div>';

	}

}

