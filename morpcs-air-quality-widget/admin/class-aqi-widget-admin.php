<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and
 * enqueues the admin-specific stylesheet and JavaScript.
 *
 * @package    Aqi_Widget
 * @subpackage Aqi_Widget/admin
 * @author     Mid-Ohio Regional Planning Commission <gohio@morpc.org>
 */
class Aqi_Widget_Admin {
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Private instance of the admin fields class
	 *
	 */
	private $obj_admin_fields;

	/**
	 * Initializes the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name
	 * @param      string    $version
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->obj_admin_fields = new Aqi_Admin_Fields();
	}

	/**
	 * Registers the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function aqi_admin_enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/aqi-widget-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Registers the settings page for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function register_aqi_settings_pages() {
	    $page_title = 'Air Quality Widget Settings';
	    $menu_title = 'Air Quality';
	    $capability = 'manage_options';
	    $parent_slug = 'aqi-widget';
	    $callback = array($this, 'display_settings_page');
	    $icon = 'dashicons-cloud';
	    $position = '250.2';

	    add_menu_page(
			$page_title,
			$menu_title,
			$capability,
			$parent_slug,
			$callback,
			$icon,
			$position
		);
	}

	/**
	 * Registers the AQI settings for the AirNow
	 * API and the widget's presentation.
	 *
	 * @since    1.0.0
	 */
	public function register_aqi_settings() {
		$this->register_airnow_settings();
		$this->register_widget_settings();
	}

	/**
	 * Registers the AirNow API settings.
	 *
	 * @since    1.0.0
	 */
	private function register_airnow_settings() {
		// Defines the AirNow API section
		add_settings_section(
	   		'aqi-api-section',
	   		'AirNow Settings',
	   		false,
	   		'aqi-widget'
   		);

		$field_args = array();
		$field_args['option_name'] = 'aqi_api_key';
		$field_args['field_size'] = '50';
		$field_args['required'] = 'required';

		add_settings_field(
			'aqi_api_key', //ID
			'AirNow API Key', //TITLE
			array( $this->obj_admin_fields, 'text_field_callback' ), //CALLBACK
			'aqi-widget', //PAGE
			'aqi-api-section', //SECTION
			$field_args //ARGS DEFINING THE FIELD - CREATED ABOVE
		);
		register_setting('aqi-widget', 'aqi_api_key');

		$field_args = array();
		$field_args['option_name'] = 'aqi_api_zip';
		$field_args['required'] = 'required';
		add_settings_field(
			'aqi_api_zip',
			'Reporting Area Zip Code',
			array( $this->obj_admin_fields, 'number_field_callback' ),
			'aqi-widget',
			'aqi-api-section',
			$field_args
		);
		register_setting('aqi-widget', 'aqi_api_zip');
	}

	/**
	 * Registers all other widget settings.
	 *
	 * @since    1.0.0
	 */
	private function register_widget_settings() {
		// Defines the Widget Configuration section
		add_settings_section(
	   		'aqi-widget-section',
	   		'Widget Settings',
	   		false,
	   		'aqi-widget'
   		);

		$field_args = array();
		$field_args["option_name"] = "aqi_widget_show_forecast";
		$field_args["items"] = array("Yes", "No");
		add_settings_field(
			'aqi_widget_show_forecast',
			'Show Forecast',
			array($this->obj_admin_fields, 'radio_field_callback'),
			'aqi-widget',
			'aqi-widget-section',
			$field_args
		);
		register_setting('aqi-widget', 'aqi_widget_show_forecast');

		$field_args = array();
		$field_args["option_name"] = "aqi_widget_show_legend";
		$field_args["items"] = array("Yes", "No");
		add_settings_field(
			'aqi_widget_show_legend',
			'Show Legend',
			array($this->obj_admin_fields, 'radio_field_callback'),
			'aqi-widget',
			'aqi-widget-section',
			$field_args
		);
		register_setting('aqi-widget', 'aqi_widget_show_legend');

		$field_args = array();
		$field_args["option_name"] = "aqi_widget_theme";
		$field_args["items"] = array("Light", "Dark");
		add_settings_field(
			'aqi_widget_theme',
			'Theme',
			array($this->obj_admin_fields, 'radio_field_callback'),
			'aqi-widget',
			'aqi-widget-section',
			$field_args
		);
		register_setting('aqi-widget', 'aqi_widget_theme');

	}

	/**
	 * Displays the settings page content.
	 *
	 * @since    1.0.0
	 */
	public function display_settings_page() {
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/aqi-widget-admin-display.php';
	}

}
