<?php

use IntroToursDP\Wp\Settings;
use IntroToursDP\Std\Core\Arr;


add_action('rest_api_init', 'dpit_admin_register_route');

function dpit_admin_register_route()
{

	register_rest_route(
		'dpintrotours/v1',
		'dismiss-create-first-notice',
		[
			'methods'             => WP_REST_SERVER::ALLMETHODS,
			'callback'            => 'dpit_dismiss_create_first_notice',
			'permission_callback' => function () {
				return true;
			},
		]
	);
	register_rest_route(
		'dpintrotours/v1',
		'trigger-action',
		[
			'methods'             => WP_REST_SERVER::ALLMETHODS,
			'callback'            => 'dpit_trigger_action',
			'permission_callback' => function () {
				return is_user_logged_in();
			},
		]
	);
	register_rest_route(
		'dpintrotours/v1',
		'set-transient',
		[
			'methods'             => WP_REST_SERVER::ALLMETHODS,
			'callback'            => 'dpit_set_transient_from_js',
			'permission_callback' => function () {
				return is_user_logged_in();
			},
		]
	);

	register_rest_route(
		'dpintrotours/v1',
		'get-permalink',
		[
			'methods'             => WP_REST_SERVER::ALLMETHODS,
			'callback'            => 'dpit_get_permalink',
			'permission_callback' => function () {
				return is_user_logged_in();
			},
		]
	);
}

function dpit_get_permalink($data)
{
	$parameters = $data->get_params();
	if ($parameters) {
		$id = Arr::get($parameters, 'id');
		if ($id) {
			$abs_url = get_permalink($id);
			if ($abs_url) {
				return Dp_Intro_Tours_Helper::unify_url($abs_url, false, true, true);
			}
		}
	}
	return null;
}


function dpit_dismiss_create_first_notice()
{
	Settings::update_setting_array_bool('dp_it_general_options', 'disable_first_tour_create_notice', true);
}

function dpit_trigger_action($data)
{
	$current_user_id = get_current_user_id();
	$parameters = $data->get_params();
	if ($parameters) {
		$action_name = Arr::get($parameters, 'actionName');
		switch ($action_name) {
			case 'clear_visits':
				if (current_user_can('edit_users')) {
					Dp_Intro_Tours_Visit_Count::clear_all_data($current_user_id);
					return true;
				}
				break;
			case 'clear_visits_4_tour':
				$tour_id = Arr::get($parameters, 'tourId');
				if (current_user_can('edit_users') && $tour_id) {
					Dp_Intro_Tours_Visit_Count::clear_data_4_tour($current_user_id, $tour_id);
					return true;
				}
				break;
			case 'process_visit':
				if ($current_user_id) {
					$tour_id = Arr::get($parameters, 'tourId');
					if ($tour_id) {
						Dp_Intro_Tours_Visit_Count::process_visit($current_user_id, $tour_id);
						return true;
					}
				}
				break;
			case 'disable_future_visits':
				if ($current_user_id) {
					$tour_id = Arr::get($parameters, 'tourId');
					if ($tour_id) {
						Dp_Intro_Tours_Visit_Count::disable_future_visits($current_user_id, $tour_id);
						return true;
					}
				}
				break;
		}
	}
	wp_die();
}


function dpit_set_transient_from_js($data)
{
	$parameters = $data->get_params();
	$res        = false;
	if ($parameters) {
		$transient_id = Dp_Intro_Tours_Helper::get_transient_id($parameters['name']);
		$transient    = get_transient($transient_id);
		if ($transient !== false) {
			delete_transient($transient_id);
		}
		$res = set_transient($transient_id, $parameters['transientData'], $parameters['expirationS']);
		if ($res) {
			return $res;
		}
	}
	wp_die();
}
