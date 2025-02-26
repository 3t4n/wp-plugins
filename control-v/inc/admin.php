<?php
/**
 * Settings Page
 */
add_action('admin_menu', 'ctrlv_settings_page');

function ctrlv_settings_page() {

	$parent_slug 	= 'edit.php?post_type=ctrlv_templates';
	$page_title 	= 'Settings';
	$menu_title 	= 'Settings';
	$capability 	= 'manage_options';
	$menu_slug 		= 'ctrlv-settings';
	$function 		= 'ctrlv_output_settings';

	add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );

	function ctrlv_output_settings() {
		echo '<div class="wrap">
		<img src="'.plugins_url().'/liren-ctrlv/imgs/liren-logo.png">
		<h2>Import Templates</h2>
		<p class="description">Imports all default templates.</p>
		</div>';
		
	}
}


/**
 * Documentation Page
 */
add_action('admin_menu', 'ctrlv_documentation_page');

function ctrlv_documentation_page() {

	$parent_slug 	= 'edit.php?post_type=ctrlv_templates';
	$page_title 	= 'Documentation';
	$menu_title 	= 'Documentation';
	$capability 	= 'manage_options';
	$menu_slug 		= 'ctrlv-documentation';
	$function 		= 'ctrlv_output_documentation';

	add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );

	function ctrlv_output_documentation() {
		echo '
		<div class="wrap">
		<img src="'.plugins_url().'/liren-ctrlv/imgs/liren-logo.png">
		<h2>Documentation</h2>
		<p class="description">Imports all default templates.</p>
		</div>';
		
	}
}