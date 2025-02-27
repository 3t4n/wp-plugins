<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

// Create the row to store the keys
function storelocatorwidget_create_first_row(){
  global $wpdb;
  $table_name = storelocatorwidget_get_table_name();
  // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
  $wpdb->insert( $table_name, array('storelocatorwidget_api' => '', 'google_api' => ''), array());
}

// Save the storelocatorwidget API key
function storelocatorwidget_save_storelocatorwidget_api($api){
  global $wpdb;

  $table_id = 1;
  $table_name = esc_sql(storelocatorwidget_get_table_name());
  // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching 
  $wpdb->query($wpdb->prepare("UPDATE %i SET storelocatorwidget_api=%s WHERE id = %d", $table_name, $api, $table_id));
}

// Save the Google API key
function storelocatorwidget_save_google_api($gapi){
  global $wpdb;

  $table_id = 1;
  $table_name = storelocatorwidget_get_table_name();
  // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching 
  $wpdb->query($wpdb->prepare("UPDATE %i SET google_api=%s WHERE id = %d", $table_name, $gapi, $table_id));
}

// Get the storelocatorwidget api from the db
function storelocatorwidget_get_storelocatorwidget_api(){
  global $wpdb;

  $table_id = 1;
  $table_name = storelocatorwidget_get_table_name();
  // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching 
  $api = $wpdb->get_row( $wpdb->prepare( "SELECT storelocatorwidget_api FROM %i WHERE ID = %d", $table_name, $table_id));
  return $api->storelocatorwidget_api;
}

// Get the google API from the db
function storelocatorwidget_get_google_api(){
  global $wpdb;

  $table_id = 1;
  $table_name = storelocatorwidget_get_table_name();
  // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching 
  $gapi = $wpdb->get_row( $wpdb->prepare( "SELECT google_api FROM %i WHERE ID = %d", $table_name, $table_id));
  return $gapi->google_api;
}

// Process the form data
function storelocatorwidget_process_storelocatorwidget_keys() {
	if (isset($_POST['admin_post_nonce_field']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['admin_post_nonce_field'])), 'admin_post_action')) {
		// Securely process data as nonce is verified

		// Check for the google api key
		if (isset($_POST['google_api_key'])){
		  storelocatorwidget_save_google_api(sanitize_text_field(wp_unslash($_POST['google_api_key'])));
		}

		// Check for the apply api key
		if (isset($_POST['storelocatorwidget_api_key'])){
		  storelocatorwidget_save_storelocatorwidget_api(sanitize_text_field(wp_unslash($_POST['storelocatorwidget_api_key'])));
		}

		// redirect
		$nonce = wp_create_nonce('settings-saved-nonce');
		wp_redirect(admin_url( 'admin.php?page=storelocatorwidgets_slug&settings-saved=true&nonce=' . $nonce));
		exit;
	} else {
		wp_die('Security check failed');
	}
}
