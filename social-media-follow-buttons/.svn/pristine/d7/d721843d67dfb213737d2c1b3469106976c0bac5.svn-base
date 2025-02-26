<?php
/******************
 * script control
*******************/

// styles for admin settings

function smfbvv_load_admin_scripts ( $hook_suffix ) {
	if(is_admin()) {
		wp_enqueue_style( 'smfbvv-styles', plugin_dir_url( __FILE__ ) . 'css/plugin-admin-styles.css' );
	}
}

add_action('admin_enqueue_scripts', 'smfbvv_load_admin_scripts');

// styles for content display

function smfbvv_load_scripts () {
	if(is_singular()) {
		wp_enqueue_style( 'smfbvv-styles', plugin_dir_url( __FILE__ ) . 'css/plugin-styles.css' );
	}
}

add_action('wp_enqueue_scripts', 'smfbvv_load_scripts');

// control for wordpress colorpicker

function vv_enqueue_color_picker( $hook_suffix ) {
	// first check that $hook_suffix is appropriate for your admin page
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'vv-color-picker', plugin_dir_url( __FILE__ ) . 'js/vv-color-picker.js', array( 'wp-color-picker' ), false, true );
}

add_action( 'admin_enqueue_scripts', 'vv_enqueue_color_picker' );

// control for wordpress image uploader

function vv_image_upload() {
	if (isset($_GET['page']) && $_GET['page'] == 'smfbvv-options') {
		wp_enqueue_media();
		wp_register_script('smfb-vv-admin', plugin_dir_url( __FILE__ ) . 'js/smfb-vv-admin.js', array('jquery'));
		wp_enqueue_script('smfb-vv-admin');
	}
}

add_action('admin_enqueue_scripts', 'vv_image_upload');