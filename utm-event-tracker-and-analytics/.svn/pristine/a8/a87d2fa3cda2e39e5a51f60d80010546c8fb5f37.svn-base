<?php

namespace UTM_Event_Tracker;

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Replace placeholder
 * 
 * @since 1.1.1
 * @return array
 */
function elementor_replace_placehoder($item) {
	if (empty($item['field_value'])) {
		return $item;
	}

	$session = Session::get_current_session();

	$parameters = array_keys(Utils::get_all_parameters());
	while ($key = current($parameters)) {
		$item['field_value'] = str_replace('{utm_event_tracker:' . $key . '}', $session->$key, $item['field_value']);
		next($parameters);
	}

	return $item;
}
add_filter('elementor_pro/forms/render/item', '\UTM_Event_Tracker\elementor_replace_placehoder');

/**
 * Handle form of elementor
 * 
 * @since 1.1.2
 * @return void
 */
function elementor_form_handle_submit($record) {
	utm_event_tracker_add_event('elementor_form_submit', array(
		'title' => esc_html__('Form Submit - Elementor', 'utm-event-tracker'),
		'meta_data' => array(
			'form_name' => $record->get_form_settings('form_name'),
			'form_data' => $record->get_formatted_data(),
		)
	));
}
add_action('elementor_pro/forms/new_record', '\UTM_Event_Tracker\elementor_form_handle_submit');

/**
 * Send data to webhook URL after submitting the form
 * 
 * @since 1.1.2
 */
function elementor_webhook_submission($record) {
	if (!Session::is_available()) {
		return;
	}

	Webhook::get_instance()->send($record->get_formatted_data());
}
add_action('elementor_pro/forms/new_record', '\UTM_Event_Tracker\elementor_webhook_submission');

/**
 * Add form description
 * 
 * @since 1.1.2
 * @return array
 */
function elementor_event_description($descriptions, $event) {
	if (!empty($event->form_name)) {
		$descriptions[] = sprintf(
			/* translators: %s order ID */
			esc_html__('Form Name: %s', 'utm-event-tracker'),
			esc_html($event->form_name)
		);
	}

	return $descriptions;
}
add_filter('utm_event_tracker/elementor_form_submit/event_descriptions', '\UTM_Event_Tracker\elementor_event_description', 10, 2);
