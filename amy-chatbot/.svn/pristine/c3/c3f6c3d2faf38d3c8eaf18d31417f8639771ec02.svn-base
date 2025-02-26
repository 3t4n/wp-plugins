<?php
/*
Plugin Name: Amy Chatbot Plugin
Description: Plugin component for WordPress
Version: 3.8
Author: Amy.us
License: GPLv2 or later
*/

//loading all dependencies
require_once 'plugin_files/utility.php';
require_once 'plugin_files/landing.php';
require_once 'plugin_files/signin.php';
require_once 'plugin_files/signup.php';
require_once 'plugin_files/previewbot.php';
require_once 'plugin_files/connected.php';
require_once 'plugin_files/header.php';

// enqueue jquery to load
function amy_enqueue_stype_scripts()
{
	global $pagenow;
	if ($pagenow != 'admin.php') {
		return;
	}

	// LOAD JAVASCRIPTS 
	wp_register_script('bootstrapbundle', amy_get_plugin_url() . '/js/bootstrap.bundle.min.js', false, '1.0.0');
	wp_add_inline_script('jquery-core', 'window.$ = jQuery;');
	wp_enqueue_script('bootstrapbundle');

	wp_register_script('fullstory', amy_get_plugin_url() . '/js/fullstory.js', false, '1.0.0');
	wp_enqueue_script('fullstory');

	// LOAD STYLESHEETS 
	wp_register_style('amy_bootstraps', amy_get_plugin_url() . '/css/bootstraps.css', false, '1.0.0');
	wp_register_style('amy_login', amy_get_plugin_url() . '/css/login.css', false, '1.0.0');

	wp_enqueue_style('amy_bootstraps');
	wp_enqueue_style('amy_login');
}

//register and enqueue all the scripts and stylesheets
add_action('admin_enqueue_scripts', 'amy_enqueue_stype_scripts');

// web hook to register the chatbot code into webiste 
add_action('wp_head', 'amy_installcode');

register_activation_hook(__FILE__, 'amy_chatbot_activate');
register_deactivation_hook(__FILE__, 'amy_chatbot_deactivate');
register_uninstall_hook(__FILE__, 'amy_chatbot_uninstall');

//adding menu in admin dashboard
add_action('admin_menu', 'amychatbot');

//adding chatbot link in side panel
function amychatbot()
{
	//   add_menu_page('Amy', 'Amy', 'administrator', 'amysettings', 'amy_bot_settings', amy_get_plugin_url() . '/images/favicon.png');
	add_menu_page('Amy', 'Amy', 'administrator', 'amysettings', 'amy_bot_settings', amy_get_plugin_url() . '/images/left-menu-logo.svg');
}

//------------------------------------------------------
// managing the plugin configuration flow 
//------------------------------------------------------
function amy_bot_settings()
{
	amyheader();

	//render if the signinsuccess has been achieved 
	if (isset($_POST['signinsuccess'])) {
		if (wp_verify_nonce($_POST['nonce_signinsuccess'], "nonce_signinsuccess")) {
			amy_update_emailidconnected(sanitize_email($_POST['emailIdConnected']));
			amy_update_campaignd(sanitize_text_field($_POST['campaignId']));
			amy_update_token(sanitize_text_field($_POST['token']));
			amy_update_firstname(sanitize_text_field($_POST['firstName']));
			amy_update_lastname(sanitize_text_field($_POST['lastName']));
			amy_update_adminconsoleurl(sanitize_url($_POST['adminConsoleUrl']));
			amy_update_agentid(sanitize_text_field($_POST['agentId']));
			amy_update_avatarurl(sanitize_url($_POST['avatarUrl']));
			amy_update_editbotflowurl(sanitize_url($_POST['editBotFlowUrl']));
			amy_update_editdesignurl(sanitize_url($_POST['editdesignUrl']));
			amy_update_siteid(sanitize_text_field($_POST['siteId']));
			amy_update_taskbotid(sanitize_text_field($_POST['taskbotId']));
			amy_update_signinsuccess(sanitize_text_field($_POST['signinsuccess']));
			amy_update_viewcollectedleadsurl(sanitize_url($_POST['viewCollectedLeadsUrl']));
			amy_connectedpage();
		}
		return;
	}

	// render signin page flow 
	if (isset($_POST['signin'])) {
		if (wp_verify_nonce($_POST['nonce_signin'], 'nonce_signin')) {
			amy_signin();
		}
		return;
	}

	//render when business type is changed in the preview window
	if (isset($_POST['businesstypechange'])) {
		if (wp_verify_nonce($_POST['nonce_businesstypechange'], 'nonce_businesstypechange')) {
			if (isset($_POST['selectedcolor'])) {
				amy_update_primarycolor(sanitize_text_field($_POST['selectedcolor']));
			}
			amy_update_businesstype(sanitize_text_field($_POST['listBusinessType']));
			amy_updatepreview();
			amy_previewbot();
		}
		return;
	}

	// hand when back to preview is clicked on preview page 
	if (isset($_POST['backtopreview'])) {

		if (wp_verify_nonce($_POST['nonce_backtopreview'], 'nonce_backtopreview')) {
			if (amy_get_businesstype() == "") {
				amy_deleteallamykeys();
				amy_landingpage();
				return;
			}
			amy_updatepreview();
			amy_previewbot();
		}
		return;
	}

	// render preview page
	if (isset($_POST['preview'])) {
		if (wp_verify_nonce($_POST['nonce_preview'], 'nonce_preview')) {
			amy_update_businesstype(sanitize_text_field($_POST['listBusinessType']));
			amy_createpreview();
			amy_previewbot();
		}
		return;
	}

	//render signup page
	if (isset($_POST['signup'])) {
		if (wp_verify_nonce($_POST['nonce_signup'], "nonce_signup")) {
			amy_update_primarycolor(sanitize_text_field($_POST['selectedcolor']));
			amy_signup();
		}
		return;
	}

	//reset all values in wordpress options 
	if (isset($_POST['reset'])) {
		if (wp_verify_nonce($_POST['nonce_reset'], "nonce_reset")) {
			amy_deleteallamykeys();
		}
	}

	//set the chatbot status on/off on the website
	if (isset($_POST['amylivecheck'])) {
		if (wp_verify_nonce($_POST['nonce_amylivecheck'], "nonce_amylivecheck")) {
			if ($_POST["amyliveval"] == "true") {
				amy_update_isamylive("true");
			} else {
				amy_update_isamylive("false");
			}
			amy_connectedpage();
		}
		return;
	}

	//render connected page
	if (get_option('amy_connect') == 'connected') {
		amy_connectedpage();
		return;
	}

	//render sign in page if admin email exists at amy
	if (amy_checkemailexists(get_option('admin_email'))) {
		amy_delete_businesstype();
		amy_signin();
		return;
	}
	amy_deleteallamykeys();
	amy_landingpage();
}

//handle activation
function amy_chatbot_activate()
{
	amy_update_isamylive("true");
}

//handle deactivation
function amy_chatbot_deactivate()
{
	amy_update_isamylive("false");
}

//handle uninstall
function amy_chatbot_uninstall()
{
	amy_deleteallamykeys();
}
