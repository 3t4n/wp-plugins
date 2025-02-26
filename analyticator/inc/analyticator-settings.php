<?php

function analyticator_settings() {

	register_setting( 'analyticator-settings-group', 'analyticator-google-analytics' );
	register_setting( 'analyticator-settings-group', 'analyticator-hotjar' );
	register_setting( 'analyticator-settings-group', 'analyticator-smartlook' );
	//register_setting( 'analyticator-settings-group', 'analyticator-ga-events' );
	register_setting( 'analyticator-settings-group', 'analyticator-fb-pixels' );

	register_setting( 'analyticator-group', 'analyticator-code' );
	register_setting( 'analyticator-hotjar-group', 'analyticator-hotjar-code' );
	register_setting( 'analyticator-smartlook-group', 'analyticator-smartlook-code' );
	register_setting( 'analyticator-ga-events-group', 'analyticator-code' );
	register_setting( 'analyticator-fb-group', 'analyticator-code' );

	//Settings Sections
	add_settings_section( 'analyticator-settings', '', 'analyticator_settings_modules', 'analyticator' );
	add_settings_section( 'analyticator-section', '', 'analyticator_save_code', 'analyticator-ga' );
	add_settings_section( 'analyticator-hotjar-section', '', 'analyticator_hotjar_section', 'analyticator-hotjar' );
	add_settings_section( 'analyticator-smartlook-section', '', 'analyticator_smartlook_section', 'analyticator-smartlook' );

	//Settings Fields from settings page
	add_settings_field( 'analyticator-google-analytics', 'Google Analytics', 'analyticator_setting_google_analytics', 'analyticator', 'analyticator-settings' );
	add_settings_field( 'analyticator-hotjar', 'Hotjar', 'analyticator_setting_hotjar', 'analyticator', 'analyticator-settings' );
	add_settings_field( 'analyticator-smartlook', 'Smartlook', 'analyticator_setting_smartlook', 'analyticator', 'analyticator-settings' );
	//add_settings_field( 'analyticator-ga-events', 'Google Analytics Events', 'analyticator_setting_ga_events', 'analyticator', 'analyticator-settings' );
	//add_settings_field( 'analyticator-fb-pixels', 'Facebook Pixels', 'analyticator_setting_fb_pixels', 'analyticator', 'analyticator-settings' );


	add_settings_field( 'analyticator-code', __( 'Google Analytics Tracking Code', 'analyticator' ), 'analyticator_code', 'analyticator-ga', 'analyticator-section' );
	add_settings_field( 'analyticator-hotjar-code', __( 'Hotjar Tracking Code', 'analyticator' ), 'analyticator_hotjar_code', 'analyticator-hotjar', 'analyticator-hotjar-section' );
	add_settings_field( 'analyticator-smartlook-code', __( 'Smartlook Tracking Code', 'analyticator' ), 'analyticator_smartlook_code', 'analyticator-smartlook', 'analyticator-smartlook-section' );
}

//Settings
function analyticator_save_code() {}
function analyticator_settings_modules() {}
function analyticator_hotjar_section() {}
function analyticator_smartlook_section() {}

//Settings Fields from settings sections
function analyticator_setting_google_analytics() {
	$settings_ga = get_option( 'analyticator-google-analytics' );
	if($settings_ga == 1){
		$ga_checked = " checked";
	}else{
		$ga_checked = "";
	}
	echo "<label><input type='checkbox' id='analyticator-google-analytics' name='analyticator-google-analytics'" . $ga_checked . " value='1'>" . __( 'Check to user Google Analytics tracking module', 'analyticator' ) . "</label>";
}

function analyticator_setting_hotjar() {
	$settings_hotjar = get_option( 'analyticator-hotjar' );
	if($settings_hotjar == 1){
		$hotjar_checked = " checked";
	}else{
		$hotjar_checked = "";
	}
	echo "<label><input type='checkbox' id='analyticator-hotjar' name='analyticator-hotjar'" . $hotjar_checked . " value='1'>" . __( 'Check to user Hotjar screen recorder module', 'analyticator' ) . "</label>";
}

function analyticator_setting_smartlook() {
	$settings_smartlook = get_option( 'analyticator-smartlook' );
	if($settings_smartlook == 1){
		$smartlook_checked = " checked";
	}else{
		$smartlook_checked = "";
	}
	echo "<label><input type='checkbox' id='analyticator-smartlook' name='analyticator-smartlook'" . $smartlook_checked . " value='1'>" . __( 'Check to user Smartlook screen recorder module', 'analyticator' ) . "</label>";
}

function analyticator_setting_ga_events() {
	$settings_ga_events = get_option( 'analyticator-ga-events' );
	if($settings_ga_events == 1){
		$ga_events_checked = " checked";
	}else{
		$ga_events_checked = "";
	}
	echo "<label><input type='checkbox' id='analyticator-ga-events' name='analyticator-ga-events'" . $ga_events_checked . " value='1'>" . __( 'Check to user Google Analytics Events tracking module', 'analyticator' ) . "</label>";
}

function analyticator_setting_fb_pixels() {
	$settings_fb_pixels = get_option( 'analyticator-fb-pixels' );
	if($settings_fb_pixels == 1){
		$fb_pixels_checked = " checked";
	}else{
		$fb_pixels_checked = "";
	}
	echo "<label><input type='checkbox' id='analyticator-fb-pixels' name='analyticator-fb-pixels'" . $fb_pixels_checked . " value='1'>" . __( 'Check to user Facebook Pixels tracking module', 'analyticator' ) . "</label>";
}


function analyticator_code() {
	$tid = get_option( 'analyticator-code' );
	echo "<textarea name='analyticator-code' id='analyticator-code' cols='50' rows='5'>" . $tid . "</textarea><p class='description'>" . __( 'Insert here your Google Analytics tracking code', 'analyticator' ) . "</p>";
}
function analyticator_hotjar_code() {
	$hotjar = get_option( 'analyticator-hotjar-code' );
	echo "<textarea name='analyticator-hotjar-code' id='analyticator-hotjar-code' cols='50' rows='5'>" . $hotjar . "</textarea><p class='description'>" . __( 'Insert here your Hotjar tracking code', 'analyticator' ) . "</p>";
}

function analyticator_smartlook_code() {
	$smartlook = get_option( 'analyticator-smartlook-code' );
	echo "<textarea name='analyticator-smartlook-code' id='analyticator-smartlook-code' cols='50' rows='5'>" . $smartlook . "</textarea><p class='description'>" . __( 'Insert here your Smartlook tracking code', 'analyticator' ) . "</p>";
}


function analyticator_insert_code() {
    echo get_option( 'analyticator-code' );
}
add_action( 'wp_footer', 'analyticator_insert_code' );

function analyticator_hotjar_insert_code() {
    echo get_option( 'analyticator-hotjar-code' );
}
add_action( 'wp_head', 'analyticator_hotjar_insert_code' );

function analyticator_smartlook_insert_code() {
    echo get_option( 'analyticator-smartlook-code' );
}
add_action( 'wp_head', 'analyticator_smartlook_insert_code' );