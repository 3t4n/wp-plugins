<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

use RankologyFno\Helpers\Schemas\Currencies;

///////////////////////////////////////////////////////////////////////////////////////////////////
//Restrict Structured Data Types metaboxes to user roles
///////////////////////////////////////////////////////////////////////////////////////////////////
function rankology_advanced_security_metaboxe_sdt_role_hook_option() {
	return rankology_fno_get_service('AdvancedOptionPro')->getSecurityMetaboxRoleStructuredData();
}

/**
 * Get currencies schema.
 *
 * @return array
 */
function rankology_get_options_schema_currencies() {
	return Currencies::getOptions();
}

function rankology_get_schema_html_part($type, $data, $key_schema = 0) {
	switch ($type) {
		case 'article':
			rankology_get_schema_metaboxe_article($data, $key_schema);
			break;
		case 'local-business':
			rankology_get_schema_metaboxe_local_business($data, $key_schema);
			break;
		case 'faq':
			rankology_get_schema_metaboxe_faq($data, $key_schema);
			break;
		case 'how-to':
			rankology_get_schema_metaboxe_how_to($data, $key_schema);
			break;
		case 'course':
			rankology_get_schema_metaboxe_course($data, $key_schema);
			break;
		case 'recipe':
			rankology_get_schema_metaboxe_recipe($data, $key_schema);
			break;
		case 'jobs':
			rankology_get_schema_metaboxe_jobs($data, $key_schema);
			break;
		case 'video':
			rankology_get_schema_metaboxe_video($data, $key_schema);
			break;
		case 'event':
			rankology_get_schema_metaboxe_event($data, $key_schema);
			break;
		case 'product':
			rankology_get_schema_metaboxe_product($data, $key_schema);
			break;
		case 'software':
			rankology_get_schema_metaboxe_software($data, $key_schema);
			break;
		case 'service':
			rankology_get_schema_metaboxe_service($data, $key_schema);
			break;
		case 'review':
			rankology_get_schema_metaboxe_review($data, $key_schema);
			break;
		case 'custom':
			rankology_get_schema_metaboxe_custom($data, $key_schema);
			break;
	}
}

/**
 * @return array
 *
 * 
 */
function rankology_get_keys_rich_snippets() {
	return [
		'_rankology_fno_rich_snippets_type' => [
			'key' => '_rankology_fno_rich_snippets_type',
			'post_key' => 'rankology_fno_rich_snippets_type',
		],
		'_rankology_fno_rich_snippets_article_type' => [
			'key' => '_rankology_fno_rich_snippets_article_type',
			'post_key' => 'rankology_fno_rich_snippets_article_type',
		],
		'_rankology_fno_rich_snippets_article_title' => [
			'key' => '_rankology_fno_rich_snippets_article_title',
			'post_key' => 'rankology_fno_rich_snippets_article_title',
		],
		'_rankology_fno_rich_snippets_article_desc' => [
			'key' => '_rankology_fno_rich_snippets_article_desc',
			'post_key' => 'rankology_fno_rich_snippets_article_desc',
		],
		'_rankology_fno_rich_snippets_article_author' => [
			'key' => '_rankology_fno_rich_snippets_article_author',
			'post_key' => 'rankology_fno_rich_snippets_article_author',
		],
		'_rankology_fno_rich_snippets_article_img' => [
			'key' => '_rankology_fno_rich_snippets_article_img',
			'post_key' => 'rankology_fno_rich_snippets_article_img',
		],
		'_rankology_fno_rich_snippets_article_img_width' => [
			'key' => '_rankology_fno_rich_snippets_article_img_width',
			'post_key' => 'rankology_fno_rich_snippets_article_img_width',
		],
		'_rankology_fno_rich_snippets_article_img_height' => [
			'key' => '_rankology_fno_rich_snippets_article_img_height',
			'post_key' => 'rankology_fno_rich_snippets_article_img_height',
		],
		'_rankology_fno_rich_snippets_article_coverage_start_date' => [
			'key' => '_rankology_fno_rich_snippets_article_coverage_start_date',
			'post_key' => 'rankology_fno_rich_snippets_article_coverage_start_date',
		],
		'_rankology_fno_rich_snippets_article_coverage_start_time' => [
			'key' => '_rankology_fno_rich_snippets_article_coverage_start_time',
			'post_key' => 'rankology_fno_rich_snippets_article_coverage_start_time',
		],
		'_rankology_fno_rich_snippets_article_coverage_end_date' => [
			'key' => '_rankology_fno_rich_snippets_article_coverage_end_date',
			'post_key' => 'rankology_fno_rich_snippets_article_coverage_end_date',
		],
		'_rankology_fno_rich_snippets_article_coverage_end_time' => [
			'key' => '_rankology_fno_rich_snippets_article_coverage_end_time',
			'post_key' => 'rankology_fno_rich_snippets_article_coverage_end_time',
		],
		'_rankology_fno_rich_snippets_article_speakable_css_selector' => [
			'key' => '_rankology_fno_rich_snippets_article_speakable_css_selector',
			'post_key' => 'rankology_fno_rich_snippets_article_speakable_css_selector',
		],
		'_rankology_fno_rich_snippets_lb_name' => [
			'key' => '_rankology_fno_rich_snippets_lb_name',
			'post_key' => 'rankology_fno_rich_snippets_lb_name',
		],
		'_rankology_fno_rich_snippets_lb_type' => [
			'key' => '_rankology_fno_rich_snippets_lb_type',
			'post_key' => 'rankology_fno_rich_snippets_lb_type',
		],
		'_rankology_fno_rich_snippets_lb_cuisine' => [
			'key' => '_rankology_fno_rich_snippets_lb_cuisine',
			'post_key' => 'rankology_fno_rich_snippets_lb_cuisine',
		],
		'_rankology_fno_rich_snippets_lb_menu' => [
			'key' => '_rankology_fno_rich_snippets_lb_menu',
			'post_key' => 'rankology_fno_rich_snippets_lb_menu',
		],
		'_rankology_fno_rich_snippets_lb_accepts_reservations' => [
			'key' => '_rankology_fno_rich_snippets_lb_accepts_reservations',
			'post_key' => 'rankology_fno_rich_snippets_lb_accepts_reservations',
		],
		'_rankology_fno_rich_snippets_lb_img' => [
			'key' => '_rankology_fno_rich_snippets_lb_img',
			'post_key' => 'rankology_fno_rich_snippets_lb_img',
		],
		'_rankology_fno_rich_snippets_lb_img_width' => [
			'key' => '_rankology_fno_rich_snippets_lb_img_width',
			'post_key' => 'rankology_fno_rich_snippets_lb_img_width',
		],
		'_rankology_fno_rich_snippets_lb_img_height' => [
			'key' => '_rankology_fno_rich_snippets_lb_img_height',
			'post_key' => 'rankology_fno_rich_snippets_lb_img_height',
		],
		'_rankology_fno_rich_snippets_lb_street_addr' => [
			'key' => '_rankology_fno_rich_snippets_lb_street_addr',
			'post_key' => 'rankology_fno_rich_snippets_lb_street_addr',
		],
		'_rankology_fno_rich_snippets_lb_city' => [
			'key' => '_rankology_fno_rich_snippets_lb_city',
			'post_key' => 'rankology_fno_rich_snippets_lb_city',
		],
		'_rankology_fno_rich_snippets_lb_state' => [
			'key' => '_rankology_fno_rich_snippets_lb_state',
			'post_key' => 'rankology_fno_rich_snippets_lb_state',
		],
		'_rankology_fno_rich_snippets_lb_pc' => [
			'key' => '_rankology_fno_rich_snippets_lb_pc',
			'post_key' => 'rankology_fno_rich_snippets_lb_pc',
		],
		'_rankology_fno_rich_snippets_lb_country' => [
			'key' => '_rankology_fno_rich_snippets_lb_country',
			'post_key' => 'rankology_fno_rich_snippets_lb_country',
		],
		'_rankology_fno_rich_snippets_lb_lat' => [
			'key' => '_rankology_fno_rich_snippets_lb_lat',
			'post_key' => 'rankology_fno_rich_snippets_lb_lat',
		],
		'_rankology_fno_rich_snippets_lb_lon' => [
			'key' => '_rankology_fno_rich_snippets_lb_lon',
			'post_key' => 'rankology_fno_rich_snippets_lb_lon',
		],
		'_rankology_fno_rich_snippets_lb_website' => [
			'key' => '_rankology_fno_rich_snippets_lb_website',
			'post_key' => 'rankology_fno_rich_snippets_lb_website',
		],
		'_rankology_fno_rich_snippets_lb_tel' => [
			'key' => '_rankology_fno_rich_snippets_lb_tel',
			'post_key' => 'rankology_fno_rich_snippets_lb_tel',
		],
		'_rankology_fno_rich_snippets_lb_price' => [
			'key' => '_rankology_fno_rich_snippets_lb_price',
			'post_key' => 'rankology_fno_rich_snippets_lb_price',
		],
		'_rankology_fno_rich_snippets_lb_opening_hours' => [
			'key' => '_rankology_fno_rich_snippets_lb_opening_hours',
			'post_key' => 'rankology_fno_rich_snippets_lb_opening_hours',
		],
		'_rankology_fno_rich_snippets_faq' => [
			'key' => '_rankology_fno_rich_snippets_faq',
			'post_key' => 'rankology_fno_rich_snippets_faq',
		],
		'_rankology_fno_rich_snippets_how_to_name' => [
			'key' => '_rankology_fno_rich_snippets_how_to_name',
			'post_key' => 'rankology_fno_rich_snippets_how_to_name',
		],
		'_rankology_fno_rich_snippets_how_to_desc' => [
			'key' => '_rankology_fno_rich_snippets_how_to_desc',
			'post_key' => 'rankology_fno_rich_snippets_how_to_desc',
		],
		'_rankology_fno_rich_snippets_how_to_img' => [
			'key' => '_rankology_fno_rich_snippets_how_to_img',
			'post_key' => 'rankology_fno_rich_snippets_how_to_img',
		],
		'_rankology_fno_rich_snippets_how_to_img_width' => [
			'key' => '_rankology_fno_rich_snippets_how_to_img_width',
			'post_key' => 'rankology_fno_rich_snippets_how_to_img_width',
		],
		'_rankology_fno_rich_snippets_how_to_img_height' => [
			'key' => '_rankology_fno_rich_snippets_how_to_img_height',
			'post_key' => 'rankology_fno_rich_snippets_how_to_img_height',
		],
		'_rankology_fno_rich_snippets_how_to_currency' => [
			'key' => '_rankology_fno_rich_snippets_how_to_currency',
			'post_key' => 'rankology_fno_rich_snippets_how_to_currency',
		],
		'_rankology_fno_rich_snippets_how_to_cost' => [
			'key' => '_rankology_fno_rich_snippets_how_to_cost',
			'post_key' => 'rankology_fno_rich_snippets_how_to_cost',
		],
		'_rankology_fno_rich_snippets_how_to_total_time' => [
			'key' => '_rankology_fno_rich_snippets_how_to_total_time',
			'post_key' => 'rankology_fno_rich_snippets_how_to_total_time',
		],
		'_rankology_fno_rich_snippets_how_to' => [
			'key' => '_rankology_fno_rich_snippets_how_to',
			'post_key' => 'rankology_fno_rich_snippets_how_to',
		],
		'_rankology_fno_rich_snippets_courses_title' => [
			'key' => '_rankology_fno_rich_snippets_courses_title',
			'post_key' => 'rankology_fno_rich_snippets_courses_title',
		],
		'_rankology_fno_rich_snippets_courses_desc' => [
			'key' => '_rankology_fno_rich_snippets_courses_desc',
			'post_key' => 'rankology_fno_rich_snippets_courses_desc',
		],
		'_rankology_fno_rich_snippets_courses_school' => [
			'key' => '_rankology_fno_rich_snippets_courses_school',
			'post_key' => 'rankology_fno_rich_snippets_courses_school',
		],
		'_rankology_fno_rich_snippets_courses_website' => [
			'key' => '_rankology_fno_rich_snippets_courses_website',
			'post_key' => 'rankology_fno_rich_snippets_courses_website',
		],
		'_rankology_fno_rich_snippets_recipes_name' => [
			'key' => '_rankology_fno_rich_snippets_recipes_name',
			'post_key' => 'rankology_fno_rich_snippets_recipes_name',
		],
		'_rankology_fno_rich_snippets_recipes_desc' => [
			'key' => '_rankology_fno_rich_snippets_recipes_desc',
			'post_key' => 'rankology_fno_rich_snippets_recipes_desc',
		],
		'_rankology_fno_rich_snippets_recipes_cat' => [
			'key' => '_rankology_fno_rich_snippets_recipes_cat',
			'post_key' => 'rankology_fno_rich_snippets_recipes_cat',
		],
		'_rankology_fno_rich_snippets_recipes_img' => [
			'key' => '_rankology_fno_rich_snippets_recipes_img',
			'post_key' => 'rankology_fno_rich_snippets_recipes_img',
		],
		'_rankology_fno_rich_snippets_recipes_video' => [
			'key' => '_rankology_fno_rich_snippets_recipes_video',
			'post_key' => 'rankology_fno_rich_snippets_recipes_video',
		],
		'_rankology_fno_rich_snippets_recipes_prep_time' => [
			'key' => '_rankology_fno_rich_snippets_recipes_prep_time',
			'post_key' => 'rankology_fno_rich_snippets_recipes_prep_time',
		],
		'_rankology_fno_rich_snippets_recipes_cook_time' => [
			'key' => '_rankology_fno_rich_snippets_recipes_cook_time',
			'post_key' => 'rankology_fno_rich_snippets_recipes_cook_time',
		],
		'_rankology_fno_rich_snippets_recipes_calories' => [
			'key' => '_rankology_fno_rich_snippets_recipes_calories',
			'post_key' => 'rankology_fno_rich_snippets_recipes_calories',
		],
		'_rankology_fno_rich_snippets_recipes_yield' => [
			'key' => '_rankology_fno_rich_snippets_recipes_yield',
			'post_key' => 'rankology_fno_rich_snippets_recipes_yield',
		],
		'_rankology_fno_rich_snippets_recipes_keywords' => [
			'key' => '_rankology_fno_rich_snippets_recipes_keywords',
			'post_key' => 'rankology_fno_rich_snippets_recipes_keywords',
		],
		'_rankology_fno_rich_snippets_recipes_cuisine' => [
			'key' => '_rankology_fno_rich_snippets_recipes_cuisine',
			'post_key' => 'rankology_fno_rich_snippets_recipes_cuisine',
		],
		'_rankology_fno_rich_snippets_recipes_ingredient' => [
			'key' => '_rankology_fno_rich_snippets_recipes_ingredient',
			'post_key' => 'rankology_fno_rich_snippets_recipes_ingredient',
		],
		'_rankology_fno_rich_snippets_recipes_instructions' => [
			'key' => '_rankology_fno_rich_snippets_recipes_instructions',
			'post_key' => 'rankology_fno_rich_snippets_recipes_instructions',
		],
		'_rankology_fno_rich_snippets_jobs_name' => [
			'key' => '_rankology_fno_rich_snippets_jobs_name',
			'post_key' => 'rankology_fno_rich_snippets_jobs_name',
		],
		'_rankology_fno_rich_snippets_jobs_desc' => [
			'key' => '_rankology_fno_rich_snippets_jobs_desc',
			'post_key' => 'rankology_fno_rich_snippets_jobs_desc',
		],
		'_rankology_fno_rich_snippets_jobs_date_posted' => [
			'key' => '_rankology_fno_rich_snippets_jobs_date_posted',
			'post_key' => 'rankology_fno_rich_snippets_jobs_date_posted',
		],
		'_rankology_fno_rich_snippets_jobs_valid_through' => [
			'key' => '_rankology_fno_rich_snippets_jobs_valid_through',
			'post_key' => 'rankology_fno_rich_snippets_jobs_valid_through',
		],
		'_rankology_fno_rich_snippets_jobs_employment_type' => [
			'key' => '_rankology_fno_rich_snippets_jobs_employment_type',
			'post_key' => 'rankology_fno_rich_snippets_jobs_employment_type',
		],
		'_rankology_fno_rich_snippets_jobs_identifier_name' => [
			'key' => '_rankology_fno_rich_snippets_jobs_identifier_name',
			'post_key' => 'rankology_fno_rich_snippets_jobs_identifier_name',
		],
		'_rankology_fno_rich_snippets_jobs_identifier_value' => [
			'key' => '_rankology_fno_rich_snippets_jobs_identifier_value',
			'post_key' => 'rankology_fno_rich_snippets_jobs_identifier_value',
		],
		'_rankology_fno_rich_snippets_jobs_hiring_organization' => [
			'key' => '_rankology_fno_rich_snippets_jobs_hiring_organization',
			'post_key' => 'rankology_fno_rich_snippets_jobs_hiring_organization',
		],
		'_rankology_fno_rich_snippets_jobs_hiring_same_as' => [
			'key' => '_rankology_fno_rich_snippets_jobs_hiring_same_as',
			'post_key' => 'rankology_fno_rich_snippets_jobs_hiring_same_as',
		],
		'_rankology_fno_rich_snippets_jobs_hiring_logo' => [
			'key' => '_rankology_fno_rich_snippets_jobs_hiring_logo',
			'post_key' => 'rankology_fno_rich_snippets_jobs_hiring_logo',
		],
		'_rankology_fno_rich_snippets_jobs_hiring_logo_width' => [
			'key' => '_rankology_fno_rich_snippets_jobs_hiring_logo_width',
			'post_key' => 'rankology_fno_rich_snippets_jobs_hiring_logo_width',
		],
		'_rankology_fno_rich_snippets_jobs_hiring_logo_height' => [
			'key' => '_rankology_fno_rich_snippets_jobs_hiring_logo_height',
			'post_key' => 'rankology_fno_rich_snippets_jobs_hiring_logo_height',
		],
		'_rankology_fno_rich_snippets_jobs_address_street' => [
			'key' => '_rankology_fno_rich_snippets_jobs_address_street',
			'post_key' => 'rankology_fno_rich_snippets_jobs_address_street',
		],
		'_rankology_fno_rich_snippets_jobs_address_locality' => [
			'key' => '_rankology_fno_rich_snippets_jobs_address_locality',
			'post_key' => 'rankology_fno_rich_snippets_jobs_address_locality',
		],
		'_rankology_fno_rich_snippets_jobs_address_region' => [
			'key' => '_rankology_fno_rich_snippets_jobs_address_region',
			'post_key' => 'rankology_fno_rich_snippets_jobs_address_region',
		],
		'_rankology_fno_rich_snippets_jobs_postal_code' => [
			'key' => '_rankology_fno_rich_snippets_jobs_postal_code',
			'post_key' => 'rankology_fno_rich_snippets_jobs_postal_code',
		],
		'_rankology_fno_rich_snippets_jobs_country' => [
			'key' => '_rankology_fno_rich_snippets_jobs_country',
			'post_key' => 'rankology_fno_rich_snippets_jobs_country',
		],
		'_rankology_fno_rich_snippets_jobs_remote' => [
			'key' => '_rankology_fno_rich_snippets_jobs_remote',
			'post_key' => 'rankology_fno_rich_snippets_jobs_remote',
		],
		'_rankology_fno_rich_snippets_jobs_direct_apply' => [
			'key' => '_rankology_fno_rich_snippets_jobs_direct_apply',
			'post_key' => 'rankology_fno_rich_snippets_jobs_direct_apply',
		],
		'_rankology_fno_rich_snippets_jobs_salary' => [
			'key' => '_rankology_fno_rich_snippets_jobs_salary',
			'post_key' => 'rankology_fno_rich_snippets_jobs_salary',
		],
		'_rankology_fno_rich_snippets_jobs_salary_currency' => [
			'key' => '_rankology_fno_rich_snippets_jobs_salary_currency',
			'post_key' => 'rankology_fno_rich_snippets_jobs_salary_currency',
		],
		'_rankology_fno_rich_snippets_jobs_salary_unit' => [
			'key' => '_rankology_fno_rich_snippets_jobs_salary_unit',
			'post_key' => 'rankology_fno_rich_snippets_jobs_salary_unit',
		],
		'_rankology_fno_rich_snippets_jobs_location_requirement' => [
			'key' => '_rankology_fno_rich_snippets_jobs_location_requirement',
			'post_key' => 'rankology_fno_rich_snippets_jobs_location_requirement',
		],
		'_rankology_fno_rich_snippets_videos_name' => [
			'key' => '_rankology_fno_rich_snippets_videos_name',
			'post_key' => 'rankology_fno_rich_snippets_videos_name',
		],
		'_rankology_fno_rich_snippets_videos_description' => [
			'key' => '_rankology_fno_rich_snippets_videos_description',
			'post_key' => 'rankology_fno_rich_snippets_videos_description',
		],
		'_rankology_fno_rich_snippets_videos_date_posted' => [
			'key' => '_rankology_fno_rich_snippets_videos_date_posted',
			'post_key' => 'rankology_fno_rich_snippets_videos_date_posted',
		],
		'_rankology_fno_rich_snippets_videos_img' => [
			'key' => '_rankology_fno_rich_snippets_videos_img',
			'post_key' => 'rankology_fno_rich_snippets_videos_img',
		],
		'_rankology_fno_rich_snippets_videos_img_width' => [
			'key' => '_rankology_fno_rich_snippets_videos_img_width',
			'post_key' => 'rankology_fno_rich_snippets_videos_img_width',
		],
		'_rankology_fno_rich_snippets_videos_img_height' => [
			'key' => '_rankology_fno_rich_snippets_videos_img_height',
			'post_key' => 'rankology_fno_rich_snippets_videos_img_height',
		],
		'_rankology_fno_rich_snippets_videos_duration' => [
			'key' => '_rankology_fno_rich_snippets_videos_duration',
			'post_key' => 'rankology_fno_rich_snippets_videos_duration',
		],
		'_rankology_fno_rich_snippets_videos_url' => [
			'key' => '_rankology_fno_rich_snippets_videos_url',
			'post_key' => 'rankology_fno_rich_snippets_videos_url',
		],
		'_rankology_fno_rich_snippets_events_type' => [
			'key' => '_rankology_fno_rich_snippets_events_type',
			'post_key' => 'rankology_fno_rich_snippets_events_type',
		],
		'_rankology_fno_rich_snippets_events_name' => [
			'key' => '_rankology_fno_rich_snippets_events_name',
			'post_key' => 'rankology_fno_rich_snippets_events_name',
		],
		'_rankology_fno_rich_snippets_events_desc' => [
			'key' => '_rankology_fno_rich_snippets_events_desc',
			'post_key' => 'rankology_fno_rich_snippets_events_desc',
		],
		'_rankology_fno_rich_snippets_events_img' => [
			'key' => '_rankology_fno_rich_snippets_events_img',
			'post_key' => 'rankology_fno_rich_snippets_events_img',
		],
		'_rankology_fno_rich_snippets_events_start_date' => [
			'key' => '_rankology_fno_rich_snippets_events_start_date',
			'post_key' => 'rankology_fno_rich_snippets_events_start_date',
		],
		'_rankology_fno_rich_snippets_events_start_date_timezone' => [
			'key' => '_rankology_fno_rich_snippets_events_start_date_timezone',
			'post_key' => 'rankology_fno_rich_snippets_events_start_date_timezone',
		],
		'_rankology_fno_rich_snippets_events_start_time' => [
			'key' => '_rankology_fno_rich_snippets_events_start_time',
			'post_key' => 'rankology_fno_rich_snippets_events_start_time',
		],
		'_rankology_fno_rich_snippets_events_end_date' => [
			'key' => '_rankology_fno_rich_snippets_events_end_date',
			'post_key' => 'rankology_fno_rich_snippets_events_end_date',
		],
		'_rankology_fno_rich_snippets_events_end_time' => [
			'key' => '_rankology_fno_rich_snippets_events_end_time',
			'post_key' => 'rankology_fno_rich_snippets_events_end_time',
		],
		'_rankology_fno_rich_snippets_events_previous_start_date' => [
			'key' => '_rankology_fno_rich_snippets_events_previous_start_date',
			'post_key' => 'rankology_fno_rich_snippets_events_previous_start_date',
		],
		'_rankology_fno_rich_snippets_events_previous_start_time' => [
			'key' => '_rankology_fno_rich_snippets_events_previous_start_time',
			'post_key' => 'rankology_fno_rich_snippets_events_previous_start_time',
		],
		'_rankology_fno_rich_snippets_events_location_name' => [
			'key' => '_rankology_fno_rich_snippets_events_location_name',
			'post_key' => 'rankology_fno_rich_snippets_events_location_name',
		],
		'_rankology_fno_rich_snippets_events_location_url' => [
			'key' => '_rankology_fno_rich_snippets_events_location_url',
			'post_key' => 'rankology_fno_rich_snippets_events_location_url',
		],
		'_rankology_fno_rich_snippets_events_location_address' => [
			'key' => '_rankology_fno_rich_snippets_events_location_address',
			'post_key' => 'rankology_fno_rich_snippets_events_location_address',
		],
		'_rankology_fno_rich_snippets_events_offers_name' => [
			'key' => '_rankology_fno_rich_snippets_events_offers_name',
			'post_key' => 'rankology_fno_rich_snippets_events_offers_name',
		],
		'_rankology_fno_rich_snippets_events_offers_cat' => [
			'key' => '_rankology_fno_rich_snippets_events_offers_cat',
			'post_key' => 'rankology_fno_rich_snippets_events_offers_cat',
		],
		'_rankology_fno_rich_snippets_events_offers_price' => [
			'key' => '_rankology_fno_rich_snippets_events_offers_price',
			'post_key' => 'rankology_fno_rich_snippets_events_offers_price',
		],
		'_rankology_fno_rich_snippets_events_offers_price_currency' => [
			'key' => '_rankology_fno_rich_snippets_events_offers_price_currency',
			'post_key' => 'rankology_fno_rich_snippets_events_offers_price_currency',
		],
		'_rankology_fno_rich_snippets_events_offers_availability' => [
			'key' => '_rankology_fno_rich_snippets_events_offers_availability',
			'post_key' => 'rankology_fno_rich_snippets_events_offers_availability',
		],
		'_rankology_fno_rich_snippets_events_offers_valid_from_date' => [
			'key' => '_rankology_fno_rich_snippets_events_offers_valid_from_date',
			'post_key' => 'rankology_fno_rich_snippets_events_offers_valid_from_date',
		],
		'_rankology_fno_rich_snippets_events_offers_valid_from_time' => [
			'key' => '_rankology_fno_rich_snippets_events_offers_valid_from_time',
			'post_key' => 'rankology_fno_rich_snippets_events_offers_valid_from_time',
		],
		'_rankology_fno_rich_snippets_events_offers_url' => [
			'key' => '_rankology_fno_rich_snippets_events_offers_url',
			'post_key' => 'rankology_fno_rich_snippets_events_offers_url',
		],
		'_rankology_fno_rich_snippets_events_performer' => [
			'key' => '_rankology_fno_rich_snippets_events_performer',
			'post_key' => 'rankology_fno_rich_snippets_events_performer',
		],
		'_rankology_fno_rich_snippets_events_organizer_name' => [
			'key' => '_rankology_fno_rich_snippets_events_organizer_name',
			'post_key' => 'rankology_fno_rich_snippets_events_organizer_name',
		],
		'_rankology_fno_rich_snippets_events_organizer_url' => [
			'key' => '_rankology_fno_rich_snippets_events_organizer_url',
			'post_key' => 'rankology_fno_rich_snippets_events_organizer_url',
		],
		'_rankology_fno_rich_snippets_events_status' => [
			'key' => '_rankology_fno_rich_snippets_events_status',
			'post_key' => 'rankology_fno_rich_snippets_events_status',
		],
		'_rankology_fno_rich_snippets_events_attendance_mode' => [
			'key' => '_rankology_fno_rich_snippets_events_attendance_mode',
			'post_key' => 'rankology_fno_rich_snippets_events_attendance_mode',
		],
		'_rankology_fno_rich_snippets_product_name' => [
			'key' => '_rankology_fno_rich_snippets_product_name',
			'post_key' => 'rankology_fno_rich_snippets_product_name',
		],
		'_rankology_fno_rich_snippets_product_description' => [
			'key' => '_rankology_fno_rich_snippets_product_description',
			'post_key' => 'rankology_fno_rich_snippets_product_description',
		],
		'_rankology_fno_rich_snippets_product_img' => [
			'key' => '_rankology_fno_rich_snippets_product_img',
			'post_key' => 'rankology_fno_rich_snippets_product_img',
		],
		'_rankology_fno_rich_snippets_product_price' => [
			'key' => '_rankology_fno_rich_snippets_product_price',
			'post_key' => 'rankology_fno_rich_snippets_product_price',
		],
		'_rankology_fno_rich_snippets_product_price_valid_date' => [
			'key' => '_rankology_fno_rich_snippets_product_price_valid_date',
			'post_key' => 'rankology_fno_rich_snippets_product_price_valid_date',
		],
		'_rankology_fno_rich_snippets_product_sku' => [
			'key' => '_rankology_fno_rich_snippets_product_sku',
			'post_key' => 'rankology_fno_rich_snippets_product_sku',
		],
		'_rankology_fno_rich_snippets_product_brand' => [
			'key' => '_rankology_fno_rich_snippets_product_brand',
			'post_key' => 'rankology_fno_rich_snippets_product_brand',
		],
		'_rankology_fno_rich_snippets_product_global_ids' => [
			'key' => '_rankology_fno_rich_snippets_product_global_ids',
			'post_key' => 'rankology_fno_rich_snippets_product_global_ids',
		],
		'_rankology_fno_rich_snippets_product_global_ids_value' => [
			'key' => '_rankology_fno_rich_snippets_product_global_ids_value',
			'post_key' => 'rankology_fno_rich_snippets_product_global_ids_value',
		],
		'_rankology_fno_rich_snippets_product_price_currency' => [
			'key' => '_rankology_fno_rich_snippets_product_price_currency',
			'post_key' => 'rankology_fno_rich_snippets_product_price_currency',
		],
		'_rankology_fno_rich_snippets_product_condition' => [
			'key' => '_rankology_fno_rich_snippets_product_condition',
			'post_key' => 'rankology_fno_rich_snippets_product_condition',
		],
		'_rankology_fno_rich_snippets_product_availability' => [
			'key' => '_rankology_fno_rich_snippets_product_availability',
			'post_key' => 'rankology_fno_rich_snippets_product_availability',
		],
		'_rankology_fno_rich_snippets_product_positive_notes' => [
			'key' => '_rankology_fno_rich_snippets_product_positive_notes',
			'post_key' => 'rankology_fno_rich_snippets_product_positive_notes',
		],
		'_rankology_fno_rich_snippets_product_negative_notes' => [
			'key' => '_rankology_fno_rich_snippets_product_negative_notes',
			'post_key' => 'rankology_fno_rich_snippets_product_negative_notes',
		],
		'_rankology_fno_rich_snippets_product_energy_consumption' => [
			'key' => '_rankology_fno_rich_snippets_product_energy_consumption',
			'post_key' => 'rankology_fno_rich_snippets_product_energy_consumption',
		],
		'_rankology_fno_rich_snippets_softwareapp_name' => [
			'key' => '_rankology_fno_rich_snippets_softwareapp_name',
			'post_key' => 'rankology_fno_rich_snippets_softwareapp_name',
		],
		'_rankology_fno_rich_snippets_softwareapp_os' => [
			'key' => '_rankology_fno_rich_snippets_softwareapp_os',
			'post_key' => 'rankology_fno_rich_snippets_softwareapp_os',
		],
		'_rankology_fno_rich_snippets_softwareapp_cat' => [
			'key' => '_rankology_fno_rich_snippets_softwareapp_cat',
			'post_key' => 'rankology_fno_rich_snippets_softwareapp_cat',
		],
		'_rankology_fno_rich_snippets_softwareapp_price' => [
			'key' => '_rankology_fno_rich_snippets_softwareapp_price',
			'post_key' => 'rankology_fno_rich_snippets_softwareapp_price',
		],
		'_rankology_fno_rich_snippets_softwareapp_currency' => [
			'key' => '_rankology_fno_rich_snippets_softwareapp_currency',
			'post_key' => 'rankology_fno_rich_snippets_softwareapp_currency',
		],
		'_rankology_fno_rich_snippets_softwareapp_rating' => [
			'key' => '_rankology_fno_rich_snippets_softwareapp_rating',
			'post_key' => 'rankology_fno_rich_snippets_softwareapp_rating',
		],
		'_rankology_fno_rich_snippets_softwareapp_max_rating' => [
			'key' => '_rankology_fno_rich_snippets_softwareapp_max_rating',
			'post_key' => 'rankology_fno_rich_snippets_softwareapp_max_rating',
		],
		'_rankology_fno_rich_snippets_service_name' => [
			'key' => '_rankology_fno_rich_snippets_service_name',
			'post_key' => 'rankology_fno_rich_snippets_service_name',
		],
		'_rankology_fno_rich_snippets_service_type' => [
			'key' => '_rankology_fno_rich_snippets_service_type',
			'post_key' => 'rankology_fno_rich_snippets_service_type',
		],
		'_rankology_fno_rich_snippets_service_description' => [
			'key' => '_rankology_fno_rich_snippets_service_description',
			'post_key' => 'rankology_fno_rich_snippets_service_description',
		],
		'_rankology_fno_rich_snippets_service_img' => [
			'key' => '_rankology_fno_rich_snippets_service_img',
			'post_key' => 'rankology_fno_rich_snippets_service_img',
		],
		'_rankology_fno_rich_snippets_service_area' => [
			'key' => '_rankology_fno_rich_snippets_service_area',
			'post_key' => 'rankology_fno_rich_snippets_service_area',
		],
		'_rankology_fno_rich_snippets_service_provider_name' => [
			'key' => '_rankology_fno_rich_snippets_service_provider_name',
			'post_key' => 'rankology_fno_rich_snippets_service_provider_name',
		],
		'_rankology_fno_rich_snippets_service_lb_img' => [
			'key' => '_rankology_fno_rich_snippets_service_lb_img',
			'post_key' => 'rankology_fno_rich_snippets_service_lb_img',
		],
		'_rankology_fno_rich_snippets_service_provider_mobility' => [
			'key' => '_rankology_fno_rich_snippets_service_provider_mobility',
			'post_key' => 'rankology_fno_rich_snippets_service_provider_mobility',
		],
		'_rankology_fno_rich_snippets_service_slogan' => [
			'key' => '_rankology_fno_rich_snippets_service_slogan',
			'post_key' => 'rankology_fno_rich_snippets_service_slogan',
		],
		'_rankology_fno_rich_snippets_service_street_addr' => [
			'key' => '_rankology_fno_rich_snippets_service_street_addr',
			'post_key' => 'rankology_fno_rich_snippets_service_street_addr',
		],
		'_rankology_fno_rich_snippets_service_city' => [
			'key' => '_rankology_fno_rich_snippets_service_city',
			'post_key' => 'rankology_fno_rich_snippets_service_city',
		],
		'_rankology_fno_rich_snippets_service_state' => [
			'key' => '_rankology_fno_rich_snippets_service_state',
			'post_key' => 'rankology_fno_rich_snippets_service_state',
		],
		'_rankology_fno_rich_snippets_service_pc' => [
			'key' => '_rankology_fno_rich_snippets_service_pc',
			'post_key' => 'rankology_fno_rich_snippets_service_pc',
		],
		'_rankology_fno_rich_snippets_service_country' => [
			'key' => '_rankology_fno_rich_snippets_service_country',
			'post_key' => 'rankology_fno_rich_snippets_service_country',
		],
		'_rankology_fno_rich_snippets_service_lat' => [
			'key' => '_rankology_fno_rich_snippets_service_lat',
			'post_key' => 'rankology_fno_rich_snippets_service_lat',
		],
		'_rankology_fno_rich_snippets_service_lon' => [
			'key' => '_rankology_fno_rich_snippets_service_lon',
			'post_key' => 'rankology_fno_rich_snippets_service_lon',
		],
		'_rankology_fno_rich_snippets_service_tel' => [
			'key' => '_rankology_fno_rich_snippets_service_tel',
			'post_key' => 'rankology_fno_rich_snippets_service_tel',
		],
		'_rankology_fno_rich_snippets_service_price' => [
			'key' => '_rankology_fno_rich_snippets_service_price',
			'post_key' => 'rankology_fno_rich_snippets_service_price',
		],
		'_rankology_fno_rich_snippets_review_item' => [
			'key' => '_rankology_fno_rich_snippets_review_item',
			'post_key' => 'rankology_fno_rich_snippets_review_item',
		],
		'_rankology_fno_rich_snippets_review_item_type' => [
			'key' => '_rankology_fno_rich_snippets_review_item_type',
			'post_key' => 'rankology_fno_rich_snippets_review_item_type',
		],
		'_rankology_fno_rich_snippets_review_img' => [
			'key' => '_rankology_fno_rich_snippets_review_img',
			'post_key' => 'rankology_fno_rich_snippets_review_img',
		],
		'_rankology_fno_rich_snippets_review_rating' => [
			'key' => '_rankology_fno_rich_snippets_review_rating',
			'post_key' => 'rankology_fno_rich_snippets_review_rating',
		],
		'_rankology_fno_rich_snippets_review_max_rating' => [
			'key' => '_rankology_fno_rich_snippets_review_max_rating',
			'post_key' => 'rankology_fno_rich_snippets_review_max_rating',
		],
		'_rankology_fno_rich_snippets_review_body' => [
			'key' => '_rankology_fno_rich_snippets_review_body',
			'post_key' => 'rankology_fno_rich_snippets_review_body',
		],
		'_rankology_fno_rich_snippets_custom' => [
			'key' => '_rankology_fno_rich_snippets_custom',
			'post_key' => 'rankology_fno_rich_snippets_custom',
		],
	];
}

///////////////////////////////////////////////////////////////////////////////////////////////////
//Display Rich Snippets metabox in Custom Post Type
///////////////////////////////////////////////////////////////////////////////////////////////////
function rankology_fno_admin_std_metaboxe_display() {
	add_action('add_meta_boxes', 'rankology_fno_init_metabox', 20);
	function rankology_fno_init_metabox() {
		if (rankology_get_service('AdvancedOption')->getAppearanceMetaboxePosition() !== null) {
			$metaboxe_position = rankology_get_service('AdvancedOption')->getAppearanceMetaboxePosition();
		} else {
			$metaboxe_position = 'default';
		}

		$rankology_get_post_types = rankology_get_service('WordPressData')->getPostTypes();
		$rankology_get_post_types = apply_filters('rankology_fno_metaboxe_sdt', $rankology_get_post_types);

		if ( ! empty($rankology_get_post_types)) {
			foreach ($rankology_get_post_types as $key => $value) {
				add_meta_box('rankology_fno_cpt', __('Structured Data Settings', 'wp-rankology'), 'rankology_fno_cpt', $key, 'normal', $metaboxe_position);
			}
		}
	}

	function rankology_fno_cpt($post) {
		$options_schemas_available = [
			[
				'file' => dirname(__DIR__) . '/schemas/manual/Article.php',
				'value' => 'articles',
				'label' => __('Article (WebPage)', 'wp-rankology'),
				'key_html_part' => 'article',
			],
			[
				'file' => dirname(__DIR__) . '/schemas/manual/LocalBusiness.php',
				'value' => 'localbusiness',
				'label' => __('Local Business', 'wp-rankology'),
				'key_html_part' => 'local-business',
			],
			[
				'file' => dirname(__DIR__) . '/schemas/manual/Faq.php',
				'value' => 'faq',
				'label' => __('FAQ', 'wp-rankology'),
				'key_html_part' => 'faq',
			],
			[
				'file' => dirname(__DIR__) . '/schemas/manual/HowTo.php',
				'value' => 'howto',
				'label' => __('How-to', 'wp-rankology'),
				'key_html_part' => 'how-to',
			],
			[
				'file' => dirname(__DIR__) . '/schemas/manual/Course.php',
				'value' => 'courses',
				'label' => __('Course', 'wp-rankology'),
				'key_html_part' => 'course',
			],
			[
				'file' => dirname(__DIR__) . '/schemas/manual/Recipe.php',
				'value' => 'recipes',
				'label' => __('Recipe', 'wp-rankology'),
				'key_html_part' => 'recipe',
			],
			[
				'file' => dirname(__DIR__) . '/schemas/manual/Job.php',
				'value' => 'jobs',
				'label' => __('Job', 'wp-rankology'),
				'key_html_part' => 'jobs',
			],
			[
				'file' => dirname(__DIR__) . '/schemas/manual/Video.php',
				'value' => 'videos',
				'label' => __('Video', 'wp-rankology'),
				'key_html_part' => 'video',
			],
			[
				'file' => dirname(__DIR__) . '/schemas/manual/Event.php',
				'value' => 'events',
				'label' => __('Event', 'wp-rankology'),
				'key_html_part' => 'event',
			],
			[
				'file' => dirname(__DIR__) . '/schemas/manual/Product.php',
				'value' => 'products',
				'label' => __('Product', 'wp-rankology'),
				'key_html_part' => 'product',
			],
			[
				'file' => dirname(__DIR__) . '/schemas/manual/SoftwareApp.php',
				'value' => 'softwareapp',
				'label' => __('Software Application', 'wp-rankology'),
				'key_html_part' => 'software',
			],
			[
				'file' => dirname(__DIR__) . '/schemas/manual/Service.php',
				'value' => 'services',
				'label' => __('Service', 'wp-rankology'),
				'key_html_part' => 'service',
			],
			[
				'file' => dirname(__DIR__) . '/schemas/manual/Review.php',
				'value' => 'review',
				'label' => __('Review', 'wp-rankology'),
				'key_html_part' => 'review',
			],
			[
				'file' => dirname(__DIR__) . '/schemas/manual/Custom.php',
				'value' => 'custom',
				'label' => __('Custom', 'wp-rankology'),
				'key_html_part' => 'custom',
			],
		];

		foreach ($options_schemas_available as $item) {
			include_once $item['file'];
		}

		$prefix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

		wp_nonce_field(plugin_basename(__FILE__), 'rankology_fno_cpt_nonce');
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('rankology-fno-media-uploader-js', RANKOLOGY_FNO_ASSETS_DIR . '/js/rankology-fno-media-uploader' . $prefix . '.js', ['jquery'], RANKOLOGY_VERSION, false);
		wp_enqueue_script('rankology-fno-rich-snippets-js', RANKOLOGY_FNO_ASSETS_DIR . '/js/rankology-fno-rich-snippets' . $prefix . '.js', ['jquery', 'jquery-ui-tabs'], RANKOLOGY_VERSION, false);
		wp_enqueue_media();
		wp_enqueue_script('jquery-ui-datepicker');

		$rankology_fno_rich_snippets_data = get_post_meta($post->ID, '_rankology_fno_schemas_manual', true);

		$tab1 = '<li><a href="#rankology-schemas-tabs-2">' . __('Automatic', 'wp-rankology') . '</a></li>';
		$tab2 = '';

		if ( ! rankology_get_service('EnqueueModuleMetabox')->canEnqueue()) {
			$tab2 = '<li><a href="#rankology-schemas-tabs-1">' . __('Manual', 'wp-rankology') . '</a></li>';
		}
		$tabs = $tab1 . $tab2;
		if (function_exists('rankology_advanced_appearance_schema_default_tab_option') && rankology_advanced_appearance_schema_default_tab_option()) {
			if ('manual' == rankology_advanced_appearance_schema_default_tab_option()) {
				$tabs = $tab2 . $tab1;
			}
		}

		//Classic Editor compatibility
		if (function_exists('get_current_screen') && method_exists(get_current_screen(), 'is_block_editor') && true === get_current_screen()->is_block_editor()) {
			$btn_classes_tertiary = 'components-button is-tertiary';
		} else {
			$btn_classes_tertiary = 'submitdelete deletion';
		} ?>
<div id="rankology-schemas-tabs" class="rankology-tabs-preview">
	<ul class="wrap-schemas-list">
		<?php if ( ! rankology_get_service('EnqueueModuleMetabox')->canEnqueue()) { ?>
		<li><a href="#rankology-schemas-tabs-1"><?php esc_html_e('Manual', 'wp-rankology'); ?></a>
		</li>
		<?php } ?>
		<li><a id="rkseo-automatic-tab" href="#rankology-schemas-tabs-2"><?php esc_html_e('Automatic', 'wp-rankology'); ?><span></span></a>
		</li>
	</ul>
	<input type="hidden" name="can_enqueue_rankology_metabox"
		value="<?php echo rankology_get_service('EnqueueModuleMetabox')->canEnqueue() ? '1' : '0'; ?>">

	<template id="js-select-template-schema">
		<div class="box-schema-item" data-key="[X]">
			<div class="wrap-rich-snippets-type">
				<button type="button" class="js-handle-snippet-type" aria-expanded="true">
					<span class="toggle-indicator" aria-hidden="true"></span>
				</button>
				<div>
					<label for="rankology_fno_rich_snippets_type_meta"><?php esc_html_e('Select your data type', 'wp-rankology'); ?></label>
					<select id="rankology_fno_rich_snippets_type" class="js-select_rankology_fno_rich_snippets_type"
						name="rankology_fno_rich_snippets_data[X][rankology_fno_rich_snippets_type]">
						<option value="none"><?php esc_html_e('None', 'wp-rankology'); ?>
						</option>
						<?php foreach ($options_schemas_available as $item) { ?>
						<option
							value="<?php echo $item['value']; ?>">
							<?php echo $item['label']; ?>
						</option>
						<?php } ?>
					</select>
				</div>
				<a href="#"
					class="js-delete-schema-manual <?php echo $btn_classes_tertiary; ?> is-destructive"
					data-key="[X]">
					<?php esc_html_e('Delete schema', 'wp-rankology'); ?>
				</a>
			</div>
		</div>
	</template>
	<?php foreach ($options_schemas_available as $item) { ?>
	<template
		id="schema-template-<?php echo $item['value']; ?>">
		<?php rankology_get_schema_html_part($item['key_html_part'], [], 'X'); ?>
	</template>
	<?php } ?>
	<template id="schema-template-none">
		<div class="wrap-rich-snippets-item">
			<ul class="advice rankology-list rankology-notice">
				<li><?php esc_html_e('Be sure to select the right structure data type for your content.', 'wp-rankology'); ?>
				</li>
				<li><?php esc_html_e('When you choose one, fill all fields with the right format.', 'wp-rankology'); ?>
				</li>
				<li><?php esc_html_e('Make sure you don\'t have already included structured data type with a theme or plugin (e.g. the default WooCommerce Theme, Storefront, already implements this for single page products).', 'wp-rankology'); ?>
				</li>
				<li><?php esc_html_e('You can test your page with Google Data Structure Test tool.', 'wp-rankology'); ?>
					<a href="https://search.google.com/test/rich-results" target="_blank"><?php esc_html_e('Make a test', 'wp-rankology'); ?></a>
				</li>
			</ul>
		</div>
	</template>
	<template id="schema-template-empty">
		<div class="box-schema-item" data-key="[X]">
			<div class="wrap-rich-snippets-type">
				<button type="button" class="js-handle-snippet-type" aria-expanded="true">
					<span class="toggle-indicator" aria-hidden="true"></span>
				</button>
				<div>
					<label for="rankology_fno_rich_snippets_type_meta"><?php esc_html_e('Select your data type', 'wp-rankology'); ?></label>
					<select id="rankology_fno_rich_snippets_type" class="js-select_rankology_fno_rich_snippets_type"
						name="rankology_fno_rich_snippets_data[X][rankology_fno_rich_snippets_type]">
						<option value="none"><?php esc_html_e('None', 'wp-rankology'); ?>
						</option>
						<?php foreach ($options_schemas_available as $item) { ?>
						<option
							value="<?php echo $item['value']; ?>">
							<?php echo $item['label']; ?>
						</option>
						<?php } ?>
					</select>
				</div>
				<a href="#"
					class="js-delete-schema-manual <?php echo $btn_classes_tertiary; ?> is-destructive"
					data-key="[X]">
					<?php esc_html_e('Delete schema', 'wp-rankology'); ?>
				</a>
			</div>
			<div class="wrap-rich-snippets-item">
				<ul class="advice rankology-list rankology-notice">
					<li><?php esc_html_e('Be sure to select the right structure data type for your content.', 'wp-rankology'); ?>
					</li>
					<li><?php esc_html_e('When you choose one, fill all fields with the right format.', 'wp-rankology'); ?>
					</li>
					<li><?php esc_html_e('Make sure you don\'t have already included structured data type with a theme or plugin (e.g. the default WooCommerce Theme, Storefront, already implements this for single page products).', 'wp-rankology'); ?>
					</li>
					<li><?php esc_html_e('You can test your page with Google Data Structure Test tool.', 'wp-rankology'); ?>
						<a href="https://search.google.com/test/rich-results" target="_blank"><?php esc_html_e('Make a test', 'wp-rankology'); ?></a>
					</li>
				</ul>
			</div>
		</div>
	</template>
	<?php if ( ! rankology_get_service('EnqueueModuleMetabox')->canEnqueue()) {?>
	<div id="rankology-schemas-tabs-1">
		<div class="box-lefteasy">

			<p class="description-alt">
				<?php esc_html_e('To increase the likelihood of obtaining a rich snippet in Google search results, it is advisable to provide as many properties as you can.', 'wp-rankology'); ?>
			</p>

			<div class="schemas-bar-new">
				<p>
					<a href="#" id="js-add-schema-manual"
						class="<?php echo rankology_btn_secondary_classes(); ?>">
						<?php esc_html_e('Add a schema', 'wp-rankology'); ?>
					</a>
				</p>
			</div>

			<div id="js-box-list-schemas">
				<?php
					if (!empty($rankology_fno_rich_snippets_data)) {
						foreach ($rankology_fno_rich_snippets_data as $key => $data) {
							if (is_array($data)) {
							$rankology_fno_rich_snippets_type = $data['_rankology_fno_rich_snippets_type'];
							} else {
								break;
							}
						?>
						<div class="box-schema-item"
							data-key="<?php echo $key; ?>">
							<div class="wrap-rich-snippets-type">
								<button type="button" class="js-handle-snippet-type" aria-expanded="true">
									<span class="toggle-indicator" aria-hidden="true"></span>
								</button>
								<div>
									<label for="rankology_fno_rich_snippets_type_meta"><?php esc_html_e('Select your data type', 'wp-rankology'); ?></label>
									<select id="rankology_fno_rich_snippets_type"
										class="js-select_rankology_fno_rich_snippets_type"
										name="rankology_fno_rich_snippets_data[<?php echo $key; ?>][rankology_fno_rich_snippets_type]">
										<option <?php echo selected('none', $rankology_fno_rich_snippets_type); ?>
											value="none"><?php esc_html_e('None', 'wp-rankology'); ?>
										</option>
										<?php foreach ($options_schemas_available as $item) { ?>
										<option <?php echo selected($item['value'], $rankology_fno_rich_snippets_type); ?>
											value="<?php echo $item['value']; ?>"><?php echo $item['label']; ?>
										</option>
										<?php } ?>
									</select>
								</div>

								<a href="#"
									class="js-delete-schema-manual <?php echo $btn_classes_tertiary; ?> is-destructive"
									data-key="<?php echo $key; ?>">
									<?php esc_html_e('Delete schema', 'wp-rankology'); ?>
								</a>
							</div>

							<div class="wrap-rich-snippets-item">
								<ul class="advice rankology-list rankology-notice">
									<li><?php esc_html_e('Be sure to select the right structure data type for your content.', 'wp-rankology'); ?>
									</li>
									<li><?php esc_html_e('When you choose one, fill all fields with the right format.', 'wp-rankology'); ?>
									</li>
									<li><?php esc_html_e('Make sure you don\'t have already included structured data type with a theme or plugin (e.g. the default WooCommerce Theme, Storefront, already implements this for single page products).', 'wp-rankology'); ?>
									</li>
									<li><?php esc_html_e('You can test your page with Google Data Structure Test tool.', 'wp-rankology'); ?>
										<a href="https://search.google.com/test/rich-results" target="_blank"><?php esc_html_e('Make a test', 'wp-rankology'); ?></a>
									</li>
								</ul>
							</div>
							<?php
								foreach ($options_schemas_available as $item) {
									if ($item['value'] === $rankology_fno_rich_snippets_type) {
										rankology_get_schema_html_part($item['key_html_part'], $data, $key);
									}
								}
							?>
						</div>
						<?php
						}
					}
				?>
			</div>
			<p>
				<a href="https://search.google.com/test/rich-results?url=<?php echo get_permalink(); ?>"
					target="_blank"
					class="<?php echo rankology_btn_secondary_classes(); ?>">
					<?php esc_html_e('Validate my schema', 'wp-rankology'); ?>
				</a>
			</p>
		</div>
	</div>

	<?php } ?>
	<div id="rankology-schemas-tabs-2">
		<?php include_once dirname(__FILE__) . '/admin-metaboxes-schemas.php'; ?>
	</div>
</div>
<?php
	}

	///////////////////////////////////////////////////////////////////////////////////////////////////
	//Save datas
	///////////////////////////////////////////////////////////////////////////////////////////////////
	add_action('save_post', 'rankology_fno_save_metabox', 10, 2);
	function rankology_fno_save_metabox($post_id, $post) {
		//Nonce
		if ( ! isset($_POST['rankology_fno_cpt_nonce']) || ! wp_verify_nonce($_POST['rankology_fno_cpt_nonce'], plugin_basename(__FILE__))) {
			return $post_id;
		}

		//Post type object
		$post_type = get_post_type_object($post->post_type);

		//Check permission
		if ( ! current_user_can($post_type->cap->edit_post, $post_id)) {
			return $post_id;
		}

		if ('attachment' !== get_post_type($post_id) && 'rankology_schemas' !== get_post_type($post_id)) {
			//Automatic
			if (isset($_POST['rankology_fno_schemas'])) {
				update_post_meta($post_id, '_rankology_fno_schemas', $_POST['rankology_fno_schemas']);
			}

			//Disable all automatic schemas
			if (isset($_POST['rankology_fno_rich_snippets_disable_all'])) {
				update_post_meta($post_id, '_rankology_fno_rich_snippets_disable_all', esc_attr($_POST['rankology_fno_rich_snippets_disable_all']));
			} else {
				delete_post_meta($post_id, '_rankology_fno_rich_snippets_disable_all', '');
			}

			//Disable automatic schemas individually
			if (isset($_POST['rankology_fno_rich_snippets_disable'])) {
				update_post_meta($post_id, '_rankology_fno_rich_snippets_disable', $_POST['rankology_fno_rich_snippets_disable']);
			} else {
				delete_post_meta($post_id, '_rankology_fno_rich_snippets_disable', '');
			}

			// Rankology >= 3.9
			if (! rankology_get_service('EnqueueModuleMetabox')->canEnqueue()) {
				$_rankology_fno_rich_snippets_videos_duration = null;
				if (isset($_POST['rankology_fno_rich_snippets_videos_duration'])) {
					$duration = $_POST['rankology_fno_rich_snippets_videos_duration'];
					$findme = ':';
					$pos = strpos($duration, $findme);
					if (false === $pos) {
						$_POST['rankology_fno_rich_snippets_videos_duration'] = '00:' . $_POST['rankology_fno_rich_snippets_videos_duration'];
					}
					$_rankology_fno_rich_snippets_videos_duration = esc_html($_POST['rankology_fno_rich_snippets_videos_duration']);
				}

				if ( ! isset($_POST['rankology_fno_rich_snippets_data'])) {
					delete_post_meta($post_id, '_rankology_fno_schemas_manual');

					return;
				}

				$data_schemas = $_POST['rankology_fno_rich_snippets_data'];
				$keys_rich_snippets = rankology_get_keys_rich_snippets();
				$data_pro_rich_snippets = [];

				foreach ($data_schemas as $number_item => $value) {
					foreach ($keys_rich_snippets as $key => $item) {
						if (isset($value[$item['post_key']])) {
							$data_pro_rich_snippets[$number_item][$item['key']] = $value[$item['post_key']];
						}
					}
				}

				update_post_meta($post_id, '_rankology_fno_schemas_manual', array_values($data_pro_rich_snippets));
			}
		}
	}
}

if ('1' == rankology_get_toggle_option('rich-snippets') && '1' === rankology_fno_get_service('OptionPro')->getRichSnippetEnable()) {
	if (is_user_logged_in()) {
		if (is_super_admin()) {
			echo rankology_fno_admin_std_metaboxe_display();
		} else {
			global $wp_roles;

			//Get current user role
			if (isset(wp_get_current_user()->roles[0])) {
				$rankology_user_role = wp_get_current_user()->roles[0];
				//If current user role matchs values from Security settings then apply
				if (function_exists('rankology_advanced_security_metaboxe_sdt_role_hook_option') && '' != rankology_advanced_security_metaboxe_sdt_role_hook_option()) {
					if (array_key_exists($rankology_user_role, rankology_advanced_security_metaboxe_sdt_role_hook_option())) {
						//do nothing
					} else {
						echo rankology_fno_admin_std_metaboxe_display();
					}
				} else {
					echo rankology_fno_admin_std_metaboxe_display();
				}
			}
		}
	}
}
