<?php 
/*
Plugin Name: Bootstrap's Columns Controller
Description: With "Bootstrap's Columns Controller" you can easily use colums to customize your content.
Version: 1.3
Author: WebArea | Vera Nedvyzhenko
*/

define( 'BCC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
function bcc_admin_scripts(){
	wp_enqueue_style('bcc_admin_styles', plugins_url('css/admin.css', __FILE__));
	wp_enqueue_script('bcc_admin_script', plugins_url('js/admin.js', __FILE__));
 	wp_localize_script( 'bcc_admin_script', 'the_ajax_script_plugin_adm', array( 'ajax_url_plugin_adm' => admin_url( 'admin-ajax.php' ) ) );
}

add_action('admin_enqueue_scripts', 'bcc_admin_scripts');

function bcc_scripts(){
	wp_enqueue_style('bcc_styles', plugins_url('css/style.css', __FILE__));
	wp_enqueue_style('bcc_bootstrap', plugins_url('css/bootstrap.min.css', __FILE__));
}

add_action('login_enqueue_scripts', 'bcc_scripts');
add_action( 'wp_enqueue_scripts', 'bcc_scripts' );

function bcc_editor_style(){
	add_editor_style( BCC_PLUGIN_URL . 'css/editor.css' );
}
add_action('init', 'bcc_editor_style');

// Add Tinymce
function bcc_tinymce_plugins( $plugins ) {
     $plugins['preventdelete'] = plugins_url( 'tinymce/', __FILE__ ) . 'preventdelete/editor_plugin.js';
     return $plugins;
}
add_filter( 'mce_external_plugins', 'bcc_tinymce_plugins' );

// Add media button
function bcc_media_button(){
	echo "<div id='bcc-media-button' class='button'><span class='dashicons dashicons-tagcloud'></span> Add Columns</div>";
}

add_action('media_buttons', 'bcc_media_button', 15);

?>