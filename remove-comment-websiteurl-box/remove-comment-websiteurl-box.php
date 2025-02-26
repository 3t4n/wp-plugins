<?php
/*
Plugin Name: Remove Comment Website/URL Box
Plugin URI: http://themedy.com/
Description: Hide the Website / URL input box on the comment form, supports Genesis 2.X, Thesis 2.X and some other WordPress themes (may not work on all themes)
Author: Mark Hodder
Version: 1.0
Author URI: http://themedy.com/
*/

define( 'RCUB', '1.0' );

/* Prevent direct access to plugin */
if ( !defined( 'ABSPATH' ) ) {
    die( "Sorry, you are not allowed to access this page directly." );
}

/* Check if Genesis is being used as the active theme */
function rcub_genesis_remove_website_url() {
	add_filter( 'genesis_comment_form_args', 'rcub_url_filtered' );
	add_filter( 'comment_form_default_fields', 'rcub_url_filtered' );
}
add_action( 'genesis_init', 'rcub_genesis_remove_website_url', 99 );

/* If it is remove website URL for Genesis users - props to http://www.wpkube.com */
function rcub_url_filtered( $fields ) {

	if ( isset( $fields['url'] ) )
		unset($fields['url']);

	if ( isset( $fields['fields']['url'] ) )
		unset($fields['fields']['url']);

	return $fields;
}

/* Remove website URL from general WordPress themes */
function rcub_remove_comment_fields($fields) {

	if ( isset( $fields['url'] ) )
    	unset($fields['url']);

    return $fields;
}
add_filter('comment_form_default_fields','rcub_remove_comment_fields');

/* Try to cover anything else with CSS */
function rcub_load_comment_styles() {
    wp_enqueue_style( 'remove-website-url-box', plugins_url( 'css/remove_url_box.css', __FILE__ ), array(), RCUB, 'screen' );
}

if ( wp_get_theme() == "Thesis") {
	add_action( 'wp_enqueue_scripts', 'rcub_load_comment_styles' );
}

?>