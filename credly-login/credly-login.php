<?php

/**
 * Plugin Name: Credly Login for WordPress
 * Plugin URI: hhttp://badgeos.org/downloads
 * Description: Log in to Wordpress with your Credly account.
 * Version: 1.0.0
 * Author: Fuzz Productions for Credly, LLC
 * Author URI: http://fuzzproductions.com
 * Copyright: 2013 Credly, LLC
 * License: GNU AGPLv3
 * License URI: http://www.gnu.org/licenses/agpl-3.0.html
 */

defined( 'WPINC' ) or die( 'No direct file access allowed.' );

define( 'CREDLY_LOGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'CREDLY_LOGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'CREDLY_LOGIN_TABLE', 'credly_login_ids' );

// Register activation and deactivation hooks for plugin installation and uninstallation.
register_activation_hook( __FILE__, 'credly_login_activate' );
register_deactivation_hook( __FILE__, 'credly_login_deactivate' );

// Includes
require_once CREDLY_LOGIN_PATH . 'includes/db.php';
require_once CREDLY_LOGIN_PATH . 'includes/credly.php';
require_once CREDLY_LOGIN_PATH . 'includes/login-interface.php';
require_once CREDLY_LOGIN_PATH . 'widgets/credly-login-sidebar.php';

// Scripts and AJAX object
wp_enqueue_script( 'credly-login-script', CREDLY_LOGIN_URL . 'assets/js/login.js', array( 'jquery' ) );
wp_localize_script( 'credly-login-script', 'CredlyLogin', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

/**
 * Add our hooks to render the login form.
 *
 * @since 1.0.0
 * @see 	includes/login-interface.php
 */
add_action( 'login_head', 'credly_login_form_styles' );
// add_action( 'wp_head', 'credly_login_frontend_form_styles' );
add_action( 'login_form', 'credly_login_render_form' );
add_action( 'login_footer', 'credly_login_render_modal' );
add_action( 'wp_ajax_nopriv_credly-login-callback', 'credly_login_callback' );
add_action( 'wp_ajax_credly-login-callback', 'credly_login_callback' );

// Buddypress frontend hooks.
if ( function_exists( 'bp_is_active' ) ) {
	add_action( 'wp_head', 'credly_login_buddypress_form_styles' );
	add_action( 'bp_after_sidebar_login_form', 'credly_login_render_form' );
	add_action( 'bp_after_sidebar_login_form', 'credly_login_render_modal' );
}

// Register sidebar widget.
add_action( 'wp_head', 'credly_login_frontend_form_styles' );
add_action( 'widgets_init', create_function( '', 'return register_widget( "CredlyLoginSidebar" );' ) );

/**
 * Activate the plugin!
 *
 * @since 1.0.0
 */
function credly_login_activate()
{
	credly_login_table_create();
}

/**
 * Deactivate the plugin.
 *
 * @since 1.0.0
 */
function credly_login_deactivate()
{
	credly_login_table_delete();
}

/**
 * Credly Login form verification ajax endpoint.
 *
 * @since 1.0.0
 */
function credly_login_callback()
{
	if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

		$email    = $_POST['credly_email'];
		$password = $_POST['credly_password'];
		$response = array( 'success' => false );

		// Check if fields are empty.
		if ( !empty( $email ) && !empty( $password ) ) {

			// Check if email really an email.
			if ( !is_email( $email ) ) {

				// No email...
				$response['message'] = 'Please provide a valid email address.';
			} else {

				// Check in with Credly...
				$credly = credly_login_api( $email, $password );

				if ( isset( $credly['error'] ) ) {
					// Bad login creds for Credly.
					$response['message'] = $credly['error'];
				} else {
					// Good job. Set redirect URLs.
					$response['admin_url'] = admin_url();
					$response['home_url']  = home_url();
					$response['success']   = true;
				}
			}
		} else {
			// Fields are empty...
			$response['message'] = 'Please make sure all fields have been filled out.';
		}

		// Return json response and die.
		wp_send_json( $response );
	}

	// no request was made...
	wp_redirect( home_url() );
}
