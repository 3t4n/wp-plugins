<?php 
/************************
 * Simple Youtube Responsive - Frontend functions 
 ************************/
 
// Prevent accessed directly
if ( !defined('ABSPATH') ){
	die;
}


// Add button to TinyMCE Toolbar
function eirudo_ytresponsive_tinymce_init(){
	//Abort early if the user will never see TinyMCE
	if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ){
		return;
	}

	if ( get_user_option( 'rich_editing' ) !== 'true' ) {
        return;
    }
	//Add a callback to regiser our tinymce plugin   
	add_filter( 'mce_external_plugins', 'eirudo_ytresponsive_tinymce_register' ); 
	// Add a callback to add our button to the TinyMCE toolbar
	add_filter( 'mce_buttons', 'eirudo_ytresponsive_tinymce_button' );
}
add_action( 'init', 'eirudo_ytresponsive_tinymce_init' );

// This callback registers our plug-in
function eirudo_ytresponsive_tinymce_register($plugin_array) {
	$plugin_array['eirudo_ytresponsive'] = EIRUDO_YTRESPONSIVE_URL . 'js/yt-responsive-tinymce.js';
	return $plugin_array;
}

// This callback adds our button to the toolbar
function eirudo_ytresponsive_tinymce_button($buttons) {
	//Add the button ID to the $button array
	$buttons[] = 'eirudo_ytresponsive';
	return $buttons;
}
