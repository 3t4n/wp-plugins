<?php
/**
 * This file has all the main shortcode functions
 */


function sq_shortcodes_add_mce_button() {
	// check user permissions
	if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
		return;
	}
	// check if WYSIWYG is enabled
	if ( 'true' == get_user_option( 'rich_editing' ) ) {
		add_filter( 'mce_external_plugins', 'sq_shortcodes_add_tinymce_plugin' );
		add_filter( 'mce_buttons', 'sq_shortcodes_register_mce_button' );
	}
}
add_action('admin_head', 'sq_shortcodes_add_mce_button');


function sq_shortcodes_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['sq_shortcodes_mce_button'] = plugins_url( '/js/sq_shortcodes_tinymce.js', __FILE__ );
	return $plugin_array;
}


function sq_shortcodes_register_mce_button( $buttons ) {
	array_push( $buttons, 'sq_shortcodes_mce_button' );
	return $buttons;
}


function sq_shortcodes_mce_css() {
	wp_enqueue_style('sq_shortcodes-tc', plugins_url('/css/sq_shortcodes_tinymce_style.css', __FILE__) );
}
add_action( 'admin_enqueue_scripts', 'sq_shortcodes_mce_css' );