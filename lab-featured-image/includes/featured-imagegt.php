<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/* Require Featured Image Gutenberg*/		

$options = get_option( 'chec_settings' );
if ( $options['chec_checkbox_field_0'] == '1' )  {
if (get_locale() == 'es_ES') {

function labfi_custom_script() { 
	
		if((get_post_type($post_id) != 'post') || ( has_post_thumbnail( $post_id ) ))
        return;
	
    wp_enqueue_script('custom-script', plugins_url('../js/customes.js', __FILE__), array('jquery'),'1', true );
    }
add_action('admin_enqueue_scripts', 'labfi_custom_script');

function labfi_enqueue_notice_block() {
	wp_enqueue_script(
		'script-notice-blocks',
		get_stylesheet_directory_uri().'../js/customes.js',
		array(),
		"1.0",
		true
	);
add_action( 'enqueue_block_editor_assets', 'labfi_enqueue_notice_block' );
}
} else {
function labfi_custom_script() {
	
		    if((get_post_type($post_id) != 'post') || ( has_post_thumbnail( $post_id ) ))
        return;
	
    wp_enqueue_script('custom-script', plugins_url('../js/custom.js', __FILE__), array('jquery'),'1', true );
    }
add_action('admin_enqueue_scripts', 'labfi_custom_script');

function labfi_enqueue_notice_block() {
	wp_enqueue_script(
		'script-notice-blocks',
		get_stylesheet_directory_uri().'../js/custom.js',
		array(),
		"1.0",
		true
	);
add_action( 'enqueue_block_editor_assets', 'labfi_enqueue_notice_block' );
}	
}	
}
