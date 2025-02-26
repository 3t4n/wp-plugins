<?php
/*
Plugin Name: AW Schema
Plugin URI:  http://arachnidworks-dev.com/wp-plugins/aw-schema
Description: Adds forms to generate schema information in JSON-LD format
Version:     1.0.2.0
Author:      ArachnidWorks, Inc.
Author URI:  http://arachnidworks.com
License:     GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: aw-schema
*/



/* -------------------- Create shortcodes ------------------------------- */
/* Create shortcode */
//[aw-schema]
function aw_schema_func( $atts ){
	return "AW Schema";
}
add_shortcode( 'aw-schema', 'aw_schema_func' );



/* -------------------- Add elements to HEAD tag ------------------------ */


function aw_add_schema_head() {
	//if(get_option('aw_schema_setting_enabled')) {
		echo '<script type="application/ld+json">' . aw_create_json_ld_schema() . '</script>';
	//}
}
add_action('wp_head', 'aw_add_schema_head');


function aw_create_json_ld_schema() {

	$postal_arr = 	array(
						"@type" =>				"PostalAddress",
						"streetAddress" =>		get_option('aw_schema_setting_address'),
						"addressLocality" =>	get_option('aw_schema_setting_city'),
						"addressRegion" =>		get_option('aw_schema_setting_state'),
						"postalCode" =>			get_option('aw_schema_setting_zip'),
						"addressCountry" =>		get_option('aw_schema_setting_country'),
					);

	$social_arr = 	array(
						get_option('aw_schema_setting_twitter'),
						get_option('aw_schema_setting_facebook'),
						get_option('aw_schema_setting_linkedin'),
						get_option('aw_schema_setting_googleplus'),
						get_option('aw_schema_setting_instagram'),
					);

	$geo_arr = 	array(
					"@type" =>		"GeoCoordinates",
					"longitude" =>	get_option('aw_schema_setting_longitude'),
					"latitude" =>	get_option('aw_schema_setting_latitude'),
				);

	$basics_arr =	array(
						"@context" =>		"http://schema.org",
						"@type" =>			"LocalBusiness",
						"@id" =>			get_option('aw_schema_setting_id'),
						"image" =>			get_option('aw_schema_setting_logo'),
						"url" =>			esc_url(site_url()),
						"name" =>			get_option('aw_schema_setting_name'),
						"description" =>	get_option('aw_schema_setting_description'),
						"telephone" =>		get_option('aw_schema_setting_phone'),
						"address" =>		$postal_arr,
						"geo" =>			$geo_arr,
						"sameAs" =>			$social_arr,
					);

	return json_encode($basics_arr);
}


/* -------------------- Call other plugin PHP files --------------------- */
include( plugin_dir_path( __FILE__ ) . 'admin-functions.php');
