<?php
/*
Plugin Name: Farticles
Plugin URI: http://wordpress.org/extend/plugins/farticles/
Description: Gives your WordPress site flatulence.
Author: Michael Atkins
Version: 1.2.1
Author URI: http://cubecolour.co.uk/
License: GPL
*/

// ==============================================
//	ADD LINK IN PLUGINS TABLE
// ==============================================

add_filter( 'plugin_row_meta', 'cc_frt_meta_links', 10, 2 );

function cc_frt_meta_links( $links, $file ) {

	$plugin = plugin_basename(__FILE__);

// create the links
	if ( $file == $plugin ) {
		return array_merge( $links, array( '<a href="options-general.php#farticles-options">Settings</a>', '<a href="http://cubecolour.co.uk/donate">Donate</a>', '<a href="http://twitter.com/cubecolour">Twitter</a>' ) );
	}

	return $links;
}

// ==============================================
//	ENQUEUE SCRIPT WITH JQUERY DEPENDENCY
// ==============================================

function cc_fartscroll_script() {
	wp_enqueue_script('fartscroll', plugins_url( 'fartscroll/fartscroll.js', __FILE__ ), array('jquery'));
}

function cc_farthead_js() {

	$pixeldist = 400;

    echo "
    <script>
        jQuery(document).ready(function($){
            fartscroll(" . $pixeldist . ");
        });
        </script>
    ";
}

// Only attempt to fart on anything that isn't an apple iDevice
$useragent = $_SERVER['HTTP_USER_AGENT'];
if ( !( strstr( $useragent,'iP' ) ) && ( !empty( $useragent) ) ) {

	if(get_option('frontend_farts')) {
		add_action( 'wp_enqueue_scripts', 'cc_fartscroll_script' );
		add_action('wp_head', 'cc_farthead_js');
	}

	if(get_option('backend_farts')) {
		add_action( 'admin_enqueue_scripts', 'cc_fartscroll_script' );
		add_action('admin_head', 'cc_farthead_js');
	}

	if(get_option('login_farts')) {
		add_action( 'login_enqueue_scripts', 'cc_fartscroll_script' );
		add_action('login_head', 'cc_farthead_js');
	}
}

/* ------------------------------------------------------------------------ *
* SETTINGS REGISTRATION
* ------------------------------------------------------------------------ */

/**
* Initializes the theme options page by registering the Sections,
* Fields, and Settings.
*
* This function is registered with the 'admin_init' hook.
*/

add_action('admin_init', 'farticles_initialize_theme_options');
function farticles_initialize_theme_options() {

// First, we register a section. This is necessary since all future options must belong to one.
add_settings_section(
	'general_settings_section',				// ID used to identify this section and with which to register options
	'Farticles Options',					// Title to be displayed on the administration page
	'farticles_general_options_callback',	// Callback used to render the description of the section
	'general'								// Page on which to add this section of options
);

// Introduce the fields for enabling farts for the various site areas.

add_settings_field(
	'frontend_farts',					// ID used to identify the field throughout the plugin
	'Frontend Farts',					// The label to the left of the option interface element
	'farticles_frontend_farts_callback',	// The name of the callback function responsible for rendering the option interface
	'general',							// The page on which this option will be displayed
	'general_settings_section', array('Check this setting for Frontend Farts.')
	);

add_settings_field(
	'backend_farts',
	'Backend Farts',
	'farticles_backend_farts_callback',
	'general',
	'general_settings_section', array('Check this setting for Backend Farts.')
	);

add_settings_field(
	'login_farts',
	'Login Farts',
	'farticles_login_farts_callback',
	'general',
	'general_settings_section', array('Check this setting for Login Farts.')
	);

// Register the fields with WordPress
register_setting('general', 'frontend_farts');
register_setting('general', 'backend_farts');
register_setting('general', 'login_farts');
}

/* ------------------------------------------------------------------------ *
* Section Callbacks
* ------------------------------------------------------------------------ */

/**
* This function provides a simple description for the General Options page.
*
* It is called from the 'farticles_initialize_theme_options' function by being passed as a parameter
* in the add_settings_section function.
*/
function farticles_general_options_callback() {
	echo '<p id="farticles-options">Select where you would like your farts to appear.</p>';
}

/* ------------------------------------------------------------------------ *
* Field Callbacks
* ------------------------------------------------------------------------ */

/**
* This function renders the interface elements for toggling the visibility of the header element.
*
* It accepts an array of arguments and expects the first element in the array to be the description
* to be displayed next to the checkbox.
*/

function farticles_frontend_farts_callback($args) {
	$html = '<input type="checkbox" id="frontend_farts" name="frontend_farts" value="1" ' . checked(1, get_option('frontend_farts'), false) . '/>';
	$html .= '<label for="frontend_farts"> ' . $args[0] . '</label>';
	echo $html;
}

function farticles_backend_farts_callback($args) {
	$html = '<input type="checkbox" id="backend_farts" name="backend_farts" value="1" ' . checked(1, get_option('backend_farts'), false) . '/>';
	$html .= '<label for="backend_farts"> ' . $args[0] . '</label>';
	echo $html;
}

function farticles_login_farts_callback($args) {
	$html = '<input type="checkbox" id="login_farts" name="login_farts" value="1" ' . checked(1, get_option('login_farts'), false) . '/>';
	$html .= '<label for="login_farts"> ' . $args[0] . '</label>';
	echo $html;
}