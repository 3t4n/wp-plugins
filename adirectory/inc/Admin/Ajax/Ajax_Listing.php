<?php

namespace ADQS_Directory\Admin\Ajax;

use ADQS_Directory\Admin\AdminHelper;
use ADQS_Directory\Admin\Setting;



// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

class Ajax_Listing extends Ajax_Base
{

	/**
	 * Instance
	 *
	 * @access private
	 * @var object Class object.
	 *
	 * @since 2.0.0
	 */
	private static $instance;

	/**
	 * Initiator
	 *
	 * @return object initialized object of class.
	 *
	 * @since 2.0.0
	 */
	public static function get_instance()
	{
		if (!isset(self::$instance)) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Register_ajax_events.
	 *
	 * @return void
	 */
	public function register_ajax_events()
	{

		$ajax_events = array(
			'admin_dashbaord_content',
			'add_terms_and_fields',
			'get_fields_by_term',
			'delete_listing_type',
			'import_directory_builder',
		);

		$this->init_ajax_events($ajax_events);
	}

	/**
	 * Generate JSON for directory builder
	 */

	// public function ai_generate_json()
	// {
	// 	if (!check_ajax_referer('adqs___directory_admin', 'security', false)) {
	// 		wp_send_json_error(array('messsage' => $this->get_error_msg('nonce')));
	// 	}
	// 	if (!current_user_can('manage_options')) {
	// 		wp_send_json_error(array('messsage' => $this->get_error_msg('permission')));
	// 	}

	// 	$prompt = sanitize_text_field($_POST['prompt']);

	// 	$openai_api_key = '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';

	// 	$openai_endpoint = 'https://api.openai.com/v1/chat/completions';

	// 	$fields_data = $this->get_directory_fields();

	// 	$required_fields = [
	// 		['input_type' => 'phone', 'label' => 'Phone', 'name' => 'Phone', 'placeholder' => 'Enter phone number', 'is_required' => 1],
	// 		['input_type' => 'email', 'label' => 'Email', 'name' => 'Email', 'placeholder' => 'Enter email address', 'is_required' => 1],
	// 		['input_type' => 'address', 'label' => 'Address', 'name' => 'Address', 'placeholder' => 'Enter address', 'is_required' => 1],
	// 		['input_type' => 'map', 'label' => 'Map', 'name' => 'Map', 'placeholder' => 'Enter map location', 'is_required' => 1],
	// 	];

	// 	$query = [
	// 		'model' => 'gpt-3.5-turbo-1106',
	// 		'messages' => [
	// 			['role' => 'system', 'content' => 'You are a WordPress directory builder assistant. Generate structured JSON for a directory plugin based on given requirements. Use only the following available fields: ' . json_encode($fields_data) . '. Ensure that the JSON contains at least the required fields: ' . json_encode($required_fields) . '. The JSON format should be: {"termName": "", "termIcon": "", "termImage": "", "dirfields": [{"sectiontitle": "", "id": "", "fields": [{"fieldid": "", "input_type": "", "label": "", "name": "", "placeholder": "", "is_required": 1}]}]}.'],
	// 			['role' => 'user', 'content' => $prompt]
	// 		],
	// 		'max_tokens' => 500
	// 	];

	// 	$response = wp_remote_post($openai_endpoint, array(
	// 		'headers' => array(
	// 			'Authorization' => 'Bearer ' . $openai_api_key,
	// 			'Content-Type'  => 'application/json',
	// 		),
	// 		'body'    => json_encode($query),
	// 	));



	// 	if (is_wp_error($response)) {
	// 		return new WP_Error('api_error', 'Failed to fetch response from OpenAI.', array('status' => 500));
	// 	}

	// 	$body = wp_remote_retrieve_body($response);
	// 	$decoded_body = json_decode($body, true);

	// 	wp_send_json_success($decoded_body);

	// 	if (!isset($decoded_body['choices'][0]['message']['content'])) {
	// 		return new WP_Error('invalid_response', 'Invalid response from OpenAI.', array('status' => 500));
	// 	}

	// 	$generated_json = json_decode($decoded_body['choices'][0]['message']['content'], true);
	// 	if (!isset($generated_json['dirfields'])) {
	// 		return new WP_Error('invalid_format', 'Generated JSON does not match required structure.', array('status' => 500));
	// 	}

	// 	// Ensure required fields exist in the generated JSON
	// 	$required_section = [
	// 		'sectiontitle' => 'Contact Information',
	// 		'id' => uniqid(),
	// 		'fields' => $required_fields
	// 	];

	// 	// Check if the required fields are already included, if not, append them
	// 	$has_required_fields = false;
	// 	foreach ($generated_json['dirfields'] as &$section) {
	// 		foreach ($section['fields'] as $field) {
	// 			if (in_array($field['input_type'], ['phone', 'email', 'address', 'map'])) {
	// 				$has_required_fields = true;
	// 				break 2;
	// 			}
	// 		}
	// 	}

	// 	if (!$has_required_fields) {
	// 		$generated_json['dirfields'][] = $required_section;
	// 	}

	// 	wp_send_json_success($generated_json);
	// }

	// public function get_directory_fields()
	// {
	// 	return [
	// 		'preset' => [
	// 			'tagline',
	// 			'pricing',
	// 			'view_count',
	// 			'phone',
	// 			'zip',
	// 			'website',
	// 			'address',
	// 			'map',
	// 			'video',
	// 			'email'
	// 		],
	// 		'custom' => [
	// 			'text',
	// 			'textarea',
	// 			'number',
	// 			'select',
	// 			'radio',
	// 			'time',
	// 			'checkbox',
	// 			'field_images'
	// 		]
	// 	];
	// }


	/**
	 * Import directory builder
	 */

	public function import_directory_builder()
	{
		if (!$this->is_valid_request()) {
			return;
		}

		if (!isset($_FILES['json_file'])) {
			wp_send_json_error(['message' => 'No file uploaded.']);
			return;
		}

		$file = $_FILES['json_file'];
		if ($file['type'] !== 'application/json') {
			wp_send_json_error(['message' => 'Invalid file type. Please upload a JSON file.']);
			return;
		}

		$parsed_data = $this->parse_json_file($file['tmp_name']);
		if (!$parsed_data || empty($parsed_data['termName'])) {
			wp_send_json_error(['message' => 'Invalid JSON file. Please upload a valid JSON file.']);
			return;
		}

		if (get_term_by('name', $parsed_data['termName'], 'adqs_listing_types')) {
			wp_send_json_error(['message' => 'Directory already exists.']);
			return;
		}

		$parsed_data['termImage'] = $this->upload_image_from_url($parsed_data['termImage']);
		$this->insert_term_data($parsed_data);
	}

	private function is_valid_request()
	{
		if (!check_ajax_referer('adqs___directory_admin', 'security', false)) {
			wp_send_json_error(['message' => $this->get_error_msg('nonce')]);
			return false;
		}

		if (!current_user_can('manage_options')) {
			wp_send_json_error(['message' => $this->get_error_msg('permission')]);
			return false;
		}

		return true;
	}

	private function parse_json_file($file_path)
	{
		$json_data = file_get_contents($file_path);
		$parsed_data = json_decode($json_data, true);

		return [
			'termName'  => sanitize_text_field($parsed_data['termName'] ?? ''),
			'termIcon'  => sanitize_text_field($parsed_data['termIcon'] ?? ''),
			'termImage' => sanitize_text_field($parsed_data['termImage'] ?? ''),
			'dirfields' => map_deep(wp_unslash($parsed_data['dirfields'] ?? []), 'sanitize_text_field')
		];
	}

	private function upload_image_from_url($image_url)
	{
		$tmp = download_url($image_url);
		if (is_wp_error($tmp)) {
			return '';
		}

		$file_array = [
			'name'     => basename($image_url),
			'tmp_name' => $tmp
		];

		$id = media_handle_sideload($file_array, 0);
		if (is_wp_error($id)) {
			@unlink($tmp);
			return '';
		}

		return wp_get_attachment_url($id);
	}

	private function insert_term_data($parsed_data)
	{
		$term_insert_result = wp_insert_term($parsed_data['termName'], 'adqs_listing_types');

		if (is_wp_error($term_insert_result)) {
			wp_send_json_error(['message' => $this->get_error_msg('default')]);
			return;
		}

		$termid = absint($term_insert_result['term_id'] ?? 0);
		update_term_meta($termid, 'adqs_metafields_types', $parsed_data['dirfields']);
		update_term_meta($termid, 'adqs_term_icon', $parsed_data['termIcon']);
		update_term_meta($termid, 'adqs_term_img', $parsed_data['termImage']);

		wp_send_json_success(['termid' => $termid, 'termname' => $parsed_data['termName']]);
	}



	/**
	 * Admin dashboard content
	 */
	public function admin_dashbaord_content()
	{
		if (!check_ajax_referer('adqs___directory_admin', 'security', false)) {
			wp_send_json_error(array('messsage' => $this->get_error_msg('nonce')));
		}
		if (!current_user_can('manage_options')) {
			wp_send_json_error(array('messsage' => $this->get_error_msg('permission')));
		}

		$all_listings_count       = AdminHelper::listing_count_by_status();
		$published_listings_count = AdminHelper::listing_count_by_status('publish');
		$pending_listings_count   = AdminHelper::listing_count_by_status('pending');
		$today_listings_count     = AdminHelper::listing_count_by_today();
		$all_listing_types        = get_terms(
			array(
				'taxonomy'   => 'adqs_listing_types',
				'hide_empty' => false,
			)
		);

		$settings_nav = Setting::get_settings_nav();
		$settings_fields = Setting::get_settings_fields();

		$settings_value =  is_array(get_option("adqs_admin_settings")) ? get_option("adqs_admin_settings") : array();

		wp_send_json_success(
			array(
				'stats'     => array(
					'all_count'       => $all_listings_count,
					'published_count' => $published_listings_count,
					'pending_count'   => $pending_listings_count,
					'today_count'     => $today_listings_count,
				),
				'dir_types' => $all_listing_types,
				'settings_nav' =>  $settings_nav,
				'settings_fields' => $settings_fields,
				'settings_value'  => $settings_value,
				'terms' => adqs_get_directory_types_available(),
			)
		);
	}


	/**
	 * Ajax handler for getting directory infromation by id
	 * return void
	 */
	public function get_fields_by_term()
	{
		if (!check_ajax_referer('adqs___directory_admin', 'security', false)) {
			wp_send_json_error(array('messsage' => $this->get_error_msg('nonce')));
		}
		if (!current_user_can('manage_options')) {
			wp_send_json_error(array('messsage' => $this->get_error_msg('permission')));
		}
		$builder = get_term_meta(absint(sanitize_text_field($_POST['termid'])), 'adqs_metafields_types', true);

		$termicon = get_term_meta(absint($_POST['termid']), 'adqs_term_icon', true);
		$termimg = get_term_meta(absint($_POST['termid']), 'adqs_term_img', true);
		$preview_img = get_term_meta(absint($_POST['termid']), 'adqs_term_preview_img', true);


		wp_send_json_success(array(
			"fields" => $builder,
			"termicon" => $termicon,
			"termimg" => $termimg,
			"preview_img" => $preview_img
		));
	}

	/**
	 * Ajax handler for deleting directory listing type by id
	 */
	public function delete_listing_type()
	{
		if (!check_ajax_referer('adqs___directory_admin', 'security', false)) {
			wp_send_json_error(array('messsage' => $this->get_error_msg('nonce')));
		}
		if (!current_user_can('manage_options')) {
			wp_send_json_error(array('messsage' => $this->get_error_msg('permission')));
		}

		$term_id = absint(sanitize_text_field($_POST['termid']));
		$termid  = wp_delete_term($term_id, 'adqs_listing_types');
		if ($termid) {
			wp_send_json_success();
		}
	}

	/**
	 * Ajax handler for adding directory name and builder with data
	 */
	public function add_terms_and_fields()
	{
		if (!check_ajax_referer('adqs___directory_admin', 'security', false)) {
			wp_send_json_error(array('messsage' => $this->get_error_msg('nonce')));
		}
		if (!current_user_can('manage_options')) {
			wp_send_json_error(array('messsage' => $this->get_error_msg('permission')));
		}
		$status = sanitize_text_field($_POST['status']);
		if ('edit' === $status) {
			$json_to_array = json_decode(map_deep(wp_unslash($_POST['submisiion_fields']), 'sanitize_text_field'), true);
			$termid        = absint(sanitize_text_field($_POST['termid']));
			$termname = sanitize_text_field($_POST['termname']);
			$termicon   = isset($_POST['termicon']) ? sanitize_text_field($_POST['termicon']) : '';
			$termimg   = isset($_POST['termimg']) ? sanitize_text_field($_POST['termimg']) : '';

			$term = get_term($termid, 'adqs_listing_types');
			if (is_wp_error($term) || !$term) {
				wp_send_json_error(['message' => 'Term not found.']);
			}


			if ($term->name !== $termname) {
				// Update the term name and generate a new slug
				$args = [
					'name' => $termname,
					'slug' => sanitize_title($termname),
				];
				$updated_term = wp_update_term($termid, 'adqs_listing_types', $args);

				if (is_wp_error($updated_term)) {
					wp_send_json_error(['message' => 'Error updating term.']);
				}
			}



			update_term_meta($termid, 'adqs_metafields_types', $json_to_array);
			update_term_meta($termid, 'adqs_term_icon', $termicon);
			update_term_meta($termid, 'adqs_term_img', $termimg);
			wp_send_json_success();
		} else {
			$json_to_array = json_decode(map_deep(wp_unslash($_POST['submisiion_fields']), 'sanitize_text_field'), true);
			$term_insert_result = wp_insert_term(sanitize_text_field($_POST['termname']), 'adqs_listing_types');
			if (is_wp_error($term_insert_result)) {
				// Handle error
				wp_send_json_error(array('messsage' => $this->get_error_msg('default')));
			} else {
				$termid     = isset($term_insert_result['term_id']) ? absint(sanitize_text_field($term_insert_result['term_id'])) : 0;
				$termicon   = isset($_POST['termicon']) ? sanitize_text_field($_POST['termicon']) : '';
				$termimg   = isset($_POST['termimg']) ? sanitize_text_field($_POST['termimg']) : '';
				$previewimg = isset($_POST['previewimg']) ? sanitize_text_field($_POST['previewimg']) : '';
				update_term_meta($termid, 'adqs_metafields_types', $json_to_array);
				update_term_meta($termid, 'adqs_term_icon', $termicon);
				update_term_meta($termid, 'adqs_term_img', $termimg);
				update_term_meta($termid, 'adqs_term_preview_img', $previewimg);
				wp_send_json_success(['termid' => $termid, 'termname' => sanitize_text_field($_POST['termname'] ?? '')]);
			}
		}
	}
}
