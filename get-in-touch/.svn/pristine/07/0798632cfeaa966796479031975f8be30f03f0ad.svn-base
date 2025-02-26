<?php
/**
 * @package Internals
 *
 * Code used when the plugin is removed (not just deactivated but actively deleted through the WordPress Admin).
 */

function git_pause()
{	
	return true;
}	

function git_remove()
{
	global $wpdb;
	$table_prefix = $wpdb->prefix;
	$git_input_data = $table_prefix.'git_inputdata';
	$git_form_data = $table_prefix.'git_formdata';
	$git_function = $table_prefix.'git_function';
	$git_shortcode = $table_prefix.'git_shortcode';
	$git_contact_form_data = $table_prefix.'git_contact_form_data';
	$git_session = $table_prefix.'git_session';
	$git_map = $table_prefix.'git_map';

	$git_input_data = "DROP TABLE $git_input_data;";
	$wpdb->query($git_input_data);

	$git_form_data = "DROP TABLE $git_form_data;";
	$wpdb->query($git_form_data);

	$git_function = "DROP TABLE $git_function;";
	$wpdb->query($git_function);

	$git_shortcode = "DROP TABLE $git_shortcode;";
	$wpdb->query($git_shortcode);

	$git_map = "DROP TABLE $git_map;";
	$wpdb->query($git_map);	

	$git_contact_form_data = "DROP TABLE $git_contact_form_data;";
	$wpdb->query($git_contact_form_data);

	$git_session = "DROP TABLE $git_session;";
	$wpdb->query($git_session);		
}
?>