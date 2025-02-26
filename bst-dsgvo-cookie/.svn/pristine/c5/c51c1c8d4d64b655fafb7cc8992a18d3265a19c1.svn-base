<?php
/*******************************
* Script control
*******************************/

function bst_load_options_page_scripts() {
	
	global $wp_version;
    if (version_compare( get_bloginfo('version'), '3.5', '<')) {
		 wp_enqueue_style( 'farbtastic' );
		 wp_enqueue_script( 'farbtastic' );
	} else {
		 wp_enqueue_style( 'wp-color-picker' );
		 wp_enqueue_script( 'wp-color-picker' );
	}
	 wp_enqueue_style('options-styles', plugin_dir_url(__FILE__) . 'css/options-page.css');
	 wp_enqueue_script('options-scripts', plugin_dir_url(__FILE__) . 'js/options-page.js', array( 'jquery' ), '1.0', true );
	 
}
add_action('admin_print_scripts', 'bst_load_options_page_scripts');

function bst_load_scripts() {
	
	 wp_enqueue_style('bst-styles', plugin_dir_url(__FILE__) . 'css/style.css');
	 wp_enqueue_script('bst-scripts', plugin_dir_url(__FILE__) . 'js/scripts.js', array( 'jquery' ), '1.0', true );
	 wp_enqueue_style('bst-alert1-css', plugin_dir_url(__FILE__) . 'css/bst-mesage.css');
	 wp_enqueue_style('bst-alert2-css', plugin_dir_url(__FILE__) . 'css/bst-mesage-flat-theme.css');
	 wp_enqueue_script('bst-alert-script', plugin_dir_url(__FILE__) . 'js/bst-message.js', array(), '1.0', true );

	 
}
add_action('wp_enqueue_scripts', 'bst_load_scripts');
?>