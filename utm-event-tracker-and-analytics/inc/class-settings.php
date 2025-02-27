<?php

namespace UTM_Event_Tracker;

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Settings class plugin
 */
final class Settings {

	/**
	 * The single instance of the class.
	 *
	 * @var Settings
	 * @since 1.1.2
	 */
	protected static $_instance = null;

	/**
	 * Admin Instance.
	 *
	 * @since 1.1.2
	 * @return Settings - Main instance.
	 */
	public static function get_instance() {
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Sanitize custom event data
	 * 
	 * @since 1.1.2
	 * @return array
	 */
	public static function sanitize_custom_event($event_data) {
		$event = wp_parse_args($event_data, array(
			'title' => '',
			'selector' => '',
			'event_type' => '',
		));

		$event['title'] = trim($event['title']);
		$event['event_type'] = sanitize_key($event['event_type']);

		return apply_filters('utm_event_tracker/sanitize_custom_event', $event);
	}

	/**
	 * Hold settings data
	 * 
	 * @since 1.1.2
	 */
	private $data = array();

	/** 
	 * Constructor 
	 * 
	 * @since 1.1.2
	 */
	public function __construct() {
		$get_settings = get_option('utm_event_tracker_settings');
		if (!is_array($get_settings)) {
			$get_settings = json_decode(stripslashes($get_settings), true);
		}

		$default_settings = apply_filters('utm_event_tracker/settings_default_values', array(
			'webhook_url' => '',
			'ipinfo_token' => '',
			'cookie_duration' => 30,
			'append_utm_parameter' => 'no',
			'capture_custom_events' => true,
			'custom_events' => array()
		));

		$settings = wp_parse_args($get_settings, $default_settings);
		if (absint($settings['cookie_duration']) === 0) {
			$settings['cookie_duration'] = 30;
		}

		$settings['cookie_duration'] = absint($settings['cookie_duration']);

		$this->data = $settings;
	}

	/**
	 * Get all settings
	 * 
	 * @since 1.1.2
	 * @return array
	 */
	public function get_all_data() {
		return $this->data;
	}

	/**
	 * Get magic method
	 * 
	 * @since 1.1.2
	 * @return mixed
	 */
	public function __get($key) {
		return isset($this->data[$key]) ? $this->data[$key] : null;
	}

	/**
	 * Get value from settings key
	 * 
	 * @since 1.1.2
	 * @return mixed
	 */
	public function get($key, $default_value = null) {
		return isset($this->data[$key]) ? $this->data[$key] : $default_value;
	}

	/**
	 * Get custom events
	 * 
	 * @since 1.1.2
	 * @return array
	 */
	public function get_custom_events() {
		if (!isset($this->data['custom_events']) || !is_array($this->data['custom_events'])) {
			return array();
		}

		return array_map(function ($event) {
			return self::sanitize_custom_event($event);
		}, $this->data['custom_events']);
	}

	/**
	 * Has custom events
	 * 
	 * @since 1.1.2
	 * @return boolean
	 */
	public function has_custom_events() {
		return count($this->get_custom_events()) > 0;
	}
}
