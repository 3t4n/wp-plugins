<?php

function acb_enqueuing($hook) {

	wp_register_script('live-preview-of-changes', plugin_dir_url(get_FILE()).'js/live-preview-of-changes.js');
	wp_register_script('wp-color-picker-settings', plugin_dir_url(get_FILE()).'js/wp-color-picker-settings.js');
	wp_register_script('jquery-ui-slider-settings', plugin_dir_url(get_FILE()).'js/jquery-ui-slider-settings.js');
	wp_register_style('jquery-ui-slider', plugin_dir_url(get_FILE()).'css/jquery-ui-1.10.3.custom.css.php');
	wp_register_style('option-page-style', plugin_dir_url(get_FILE()).'css/option-page.css');

	if('appearance_page_admin_classic_borders_optionspage' == $hook) {
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_script('wp-color-picker-settings');
		wp_enqueue_style('jquery-ui-slider');
		wp_enqueue_script('jquery-ui-slider');
		wp_enqueue_script('jquery-ui-slider-settings');
		wp_enqueue_style('option-page-style');
		wp_enqueue_script('live-preview-of-changes');
	}
}
add_action('admin_enqueue_scripts', 'acb_enqueuing');