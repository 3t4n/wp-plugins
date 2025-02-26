<?php

/*
  Plugin Name: Feed Widget for Runkeeper activities
  Description: Displays your latest Runkeeper activities.
  Author: Ginchen
  Version: 1.0
  Author URI: http://ginchen.de
  Text Domain: grkw
  Domain Path: /lang
 */
// Block direct requests
if (!defined('ABSPATH')) {
	die('-1');
}


add_action('widgets_init', function() {
	register_widget('Ginchens_Runkeeper_Widget');
});

add_action('plugins_loaded', function() {
	load_plugin_textdomain('grkw', false, dirname(plugin_basename(__FILE__)) . '/lang/');
});

// add scripts and styles
function Ginchens_Runkeeper_Widget_Scripts_and_Styles() {
	wp_register_style('Ginchens_Runkeeper_Widget_Styles', plugin_dir_url(__FILE__)
			. 'style.css');
	wp_enqueue_style('Ginchens_Runkeeper_Widget_Styles');
}

add_action('wp_enqueue_scripts', 'Ginchens_Runkeeper_Widget_Scripts_and_Styles');

/**
 * Adds Ginchens_Runkeeper_Widget widget.
 */
class Ginchens_Runkeeper_Widget extends WP_Widget {

	private $default_values = null;

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
				'Ginchens_Runkeeper_Widget', // Base ID
				__('Runkeeper Feed', 'grkw'), // Name
				array('description' => __('Displays your latest Runkeeper activities.', 'grkw')) // Args
		);
		$this->default_values = array(
			'title' => "",
			'numposts' => 5,
			'unit' => "miles",
			'showlogo' => 1,
			'showdate' => 1,
			'showtime' => 1,
			'showdistance' => 1,
			'showduration' => 1,
			'showspeed' => 0,
			'showcalories' => 0,
			'dateformat' => __('n/j/Y', 'grkw'),
			'timeformat' => __('g:i a', 'grkw')
		);
		require_once(plugin_dir_path(__FILE__) . 'class.grkw-output.php');
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget($args, $instance) {

		// output the widget header
		GRKW_Output::outputWidgetHeader($args, $instance);

		// get access token for Health Graph
		$token = get_option("grkw_access_token");

		// if access token is not yet available (i.e. Runkeeper is not connected yet):
		if (empty($token) && current_user_can('administrator')) {

			// check if code and temporarily saved Client ID and Secret are present
			// (i.e. we are in step 2 of authorization process)
			$code = filter_input(INPUT_GET, 'code', FILTER_SANITIZE_ENCODED);
			$clientId = get_option('grkw_client_id');
			$clientSecret = get_option('grkw_client_secret');

			// if this is step 2 of the auth process, finish the connection
			if (!empty($code) && !empty($clientId) && !empty($clientSecret)) {
				$token = $this->connectToHealthGraph($code);
			} else {
				// check if Client ID and Secret have already been provided by the user
				$clientId = filter_input(INPUT_POST, 'client_id', FILTER_SANITIZE_ENCODED);
				$clientSecret = filter_input(INPUT_POST, 'client_secret', FILTER_SANITIZE_ENCODED);
				// if any of these are empty, ask user to enter the keys
				if (empty($clientId) || empty($clientSecret)) {
					// ask user for Client ID and Secret
					GRKW_Output::clientIdForm();
				} else {
					// if the keys are present, save them temporarily
					update_option('grkw_client_id', $clientId);
					update_option('grkw_client_secret', $clientSecret);
					// display the connect button
					GRKW_Output::displayConnectButton($clientId);
				}
			}
		}

		// if token is (now) available, display feed
		if (!empty($token)) {
			$this->outputActivities($instance);
		}

		GRKW_Output::outputWidgetFooter($args);
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update($new_instance, $old_instance) {
		foreach ($new_instance as $key => $value) {
			if ($value === "on") {
				$new_instance[$key] = true;
			}
		}
		return $new_instance;
	}

	/**
	 * Displays the list of Runkeeper activities.
	 * @param object $instance The Widget instance.
	 */
	private function outputActivities($instance) {
		// get desired number of activities from Health Graph
		$activities = $this->getActivities($instance['numposts']);
		// if activities could not be loaded, display an error
		if (empty($activities->items)) {
			GRKW_Output::displayAuthorizationError($activities->reason);
			return;
		}
		GRKW_Output::outputActivities($activities, $instance);
	}

	/**
	 * Displays a "connect" button and later finishes connection to Health Graph.
	 * @return string|null A Health Graph access token; or null, if authorization
	 * has not yet been granted manually by the user.
	 */
	private function connectToHealthGraph($code) {
		$token = $this->getAccessToken($code);
		update_option('grkw_access_token', $token);
		return $token;
	}

	/**
	 * Requests an access token from Health Graph when first connecting the plugin.
	 * @return string The access token.
	 */
	private function getAccessToken($code) {
		$postfields = array(
			'grant_type' => 'authorization_code',
			'code' => $code,
			'client_id' => get_option('grkw_client_id'),
			'client_secret' => get_option('grkw_client_secret'),
			'redirect_uri' => get_permalink()
		);
		delete_option('grkw_client_id');
		delete_option('grkw_client_secret');

		$curl = curl_init("https://runkeeper.com/apps/token");
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $postfields);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($curl);
		curl_close($curl);

		$json = json_decode($response);
		return $json->access_token;
	}

	/**
	 * Fetches recent Runkeeper activities from Health Graph.
	 * @param int $pagesize Number of activities to fetch.
	 * @return string The result in JSON format.
	 */
	private function getActivities($pagesize) {
		$curl = curl_init("https://api.runkeeper.com/fitnessActivities?pageSize=$pagesize");
		$headers = array(
			'Authorization: Bearer ' . get_option('grkw_access_token'),
			'Accept: application/vnd.com.runkeeper.FitnessActivityFeed+json'
		);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($curl);
		curl_close($curl);

		$json = json_decode($response);
		return $json;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form($instance) {
		// if newly added widget: fill with defauls values
		if (empty($instance)) {
			$instance = $this->default_values;
		}
		GRKW_Output::displayForm($instance);
	}

}

/**
 * Displays the widget from a shortcode.
 * @param array $atts Values the user entered in the shortcode.
 */
function grkw_shortcode($atts) {
	// set some default attributes for the widget
	$grkw_default_values = array(
		'title' => "",
		'numposts' => 5,
		'unit' => "miles",
		'showlogo' => true,
		'showdate' => true,
		'showtime' => true,
		'showdistance' => true,
		'showduration' => true,
		'showspeed' => false,
		'showcalories' => false,
		'dateformat' => __('n/j/Y', 'grkw'),
		'timeformat' => __('g:i a', 'grkw')
	);

	// merge default values with the values that the user entered inside the
	// [runkeeper] shortcode ( e.g. [runkeeper numposts=7] )
	$instance = shortcode_atts($grkw_default_values, $atts);

	// call the widget
	the_widget('Ginchens_Runkeeper_Widget', $instance);
}

add_shortcode('runkeeper', 'grkw_shortcode');

/**
 * Clean up on uninstall
 */
function grkw_uninstall() {
	delete_option('grkw_client_id');
	delete_option('grkw_client_secret');
	delete_option('grkw_access_token');
}

register_uninstall_hook(__FILE__, 'grkw_uninstall');
