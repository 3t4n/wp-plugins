<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Admin CSS
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
	
	function adosui_admin_css() {
		wp_register_style('adosui-plugin-page-css', plugins_url('../assets/css/admin.css', __FILE__));
		wp_enqueue_style('adosui-plugin-page-css');
	}
	add_action( 'admin_enqueue_scripts', 'adosui_admin_css' );

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Frontend CSS
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */	
	
	function adosui_frontend_css() {
		wp_register_style('adosui-frontend-page-css', plugins_url('../assets/css/frontend.css', __FILE__));
		wp_enqueue_style('adosui-frontend-page-css');
	}
	add_action( 'wp_enqueue_scripts', 'adosui_frontend_css' );
