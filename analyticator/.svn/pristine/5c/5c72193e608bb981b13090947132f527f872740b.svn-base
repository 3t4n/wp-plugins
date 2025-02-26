<?php
function analyticator_admin_page() {

	//Main Page
	add_menu_page( 'Analyticator', 'Analyticator', 'manage_options', 'analyticator', 'analyticator_create_admin_page', 'dashicons-chart-area', '24' );

	//Get Modules	
	$page_ga = get_option( 'analyticator-google-analytics' );
	$page_hotjar = get_option( 'analyticator-hotjar' );
	$page_smartlook = get_option( 'analyticator-smartlook' );
	$page_ga_events = get_option( 'analyticator-ga-events' );
	$page_fb = get_option( 'analyticator-fb-pixels' );

	//Submenu pages
	add_submenu_page( 'analyticator', 'Settings - Analyticator', 'Settings', 'manage_options', 'analyticator', 'analyticator_create_admin_page' );
	if($page_ga == 1):
		add_submenu_page( 'analyticator', 'Google Analytics - Analyticator', 'Google Analytics', 'manage_options', 'analyticator-ga', 'analyticator_google_analytics_page' );
	endif;
	if($page_hotjar == 1):
		add_submenu_page( 'analyticator', 'Hotjar - Analyticator', 'Hotjar', 'manage_options', 'analyticator-hotjar', 'analyticator_hotjar_page' );
	endif;
	if($page_smartlook == 1):
		add_submenu_page( 'analyticator', 'Smartlook - Analyticator', 'Smartlook', 'manage_options', 'analyticator-smartlook', 'analyticator_smartlook_page' );
	endif;/*
	if($page_ga_events == 1):
		add_submenu_page( 'analyticator', 'Google Analytics Events Tracking - Analyticator', 'GA Events', 'manage_options', 'analyticator-ga-events', 'analyticator_google_analytics_events_page' );
	endif;
	if($page_fb == 1):
		add_submenu_page( 'analyticator', 'Facebook Pixels - Analyticator', 'Facebook Pixels', 'manage_options', 'analyticator-facebook', 'analyticator_facebook_page' );
	endif;
	*/

	add_action("admin_init", "analyticator_settings");
}

//Pages
function analyticator_create_admin_page() {
	require_once 'templates/settings.php';
}

function analyticator_google_analytics_page() {
	require_once 'templates/google-analytics.php';
}

function analyticator_hotjar_page() {
	require_once 'templates/hotjar.php';
}

function analyticator_smartlook_page() {
	require_once 'templates/smartlook.php';
}

function analyticator_google_analytics_events_page() {
	require_once 'templates/ga-events.php';
}

function analyticator_facebook_page() {
	require_once 'templates/facebook.php';
}