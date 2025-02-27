<?php

/**
 * AccurateCalculators.com auto loan calculator plugin
 *
 * Copyright (c) 2025 AccurateCalculators.com
 * https://AccurateCalculators.com
 *
 * This is an add-on for WordPress
 * http://wordpress.org/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * The copyright and this notice must remain intact with any derivations
 * of this plugin.
 */

/**
 * Plugin Name: AC Auto Loan Calculator
 * Plugin URI: https://AccurateCalculators.com/calculator-plugins/auto-loan-plugin
 * Description: A responsive auto loan calculator with down payment support, payment schedules, and interactive charts. Rebrand with your name. Supports 90 currencies, 6 date formats, and 15 languages. Highly customizable via extensive configuration options. Version 2.0 is a major update—test before upgrading.
 * Version: 2.0
 * Author: AccurateCalculators.com
 * Author URI: https://AccurateCalculators.com
 * License: GPL2
 * Text Domain: ac-auto-loan-calculator-plus
 * Domain Path: /languages
 */

// [KT] 02/05/2020 - added options for website owner to set default currency and date mask
// [KT] 09/19/2021 - added support for .PO translation files, requires WordPress 5.0 or greater
// [KT] 03/28/2023 - updated to reflect change in support domain from financial-calculators.com to AccurateCalculators.com

/*
	Prefixes:
	ac or ac_ : accurate calculators
	op_ : option, set via plugin's admin panel or passed in options object
	sc_ : a shortcode parameter

	Option array:
	array('op_size' => "large",
		'op_custom_style' => "No",
		'op_add_link' => "No",
		'op_brand_name' => "",
		'op_hide_resize' => "No",
		'op_price' => "35000.0",
		'op_dwn_pmt' => "2000.0",
		'op_loan_amt' => "0.0",
		'op_n_months' => "48",
		'op_rate' => "5.5"
		[KT] 02/05/2020 - new options below
		'op_currency' => "0",
		'op_date_mask' => "0",
		[KT] 08/21/2024 - new options
		'op_theme_base_font_size' => "16px",
		'op_theme_primary_color' => "#28a745",
		'op_theme_primary_color_hover' => "#218838",
		'op_theme_primary_color_light' => "#30c853",
		'op_theme_primary_color_text' => "#fff",
		'op_theme_primary_color_text_inverse' => "#fff",
		'op_theme_background_muted' => "#f7f7f7",
		'op_theme_background_color_disabled' => "#efefef",
		'op_theme_background_calculator_color' => "#fff",
		'op_theme_background_modal_color' => "#fff",
		'op_theme_border_color' => "#dee2e6",
		'op_theme_text_color' => "#333333",
		'op_theme_tooltip_text_color' => "#fff",
		'op_theme_shadow_color' => "rgba(0, 0, 0, 0.1)",
		'op_theme_primary_font_family_stack' => "Roboto, 'Helvetica Neue', Helvetica, Arial, sans-serif",
		'op_theme_mono_font_family_stack' => "'Roboto Mono', 'Source Code Pro', ui-monospace, monospace",
		'op_calculator_min_width_tiny' => "150px",
		'op_calculator_max_width_tiny' => "250px",
		'op_calculator_min_width_small' => "200px",
		'op_calculator_max_width_small' => "300px",
		'op_calculator_min_width_medium' => "200px",
		'op_calculator_max_width_medium' => "400px",
		'op_calculator_min_width_large' => "200px",
		'op_calculator_max_width_large' => "440px"
		'op_hide_intl_conventions' => "No",
		'op_hide_payment_method' => "No",
		)

	Shortcode - all options:
	[fcautoloanplugin sc_size="large" sc_custom_style="No" sc_add_link="No" sc_brand_name="" sc_hide_resize="No" sc_price="35000.0" sc_dwn_pmt="2000.0" sc_loan_amt="0.0" sc_n_months="48" sc_rate="5.5" sc_currency="0" sc_date_mask="0" sc_theme_base_font_size="16px" sc_theme_primary_color="#28a745" sc_theme_primary_color_hover="#218838" sc_theme_primary_color_light="#30c853" sc_theme_primary_color_text="#fff" sc_theme_primary_color_text_inverse="#fff" sc_theme_background_muted="#f7f7f7" sc_theme_background_color_disabled="#efefef" sc_theme_background_calculator_color="#fff" sc_theme_background_modal_color="#fff" sc_theme_border_color="#dee2e6" sc_theme_text_color="#333333" sc_theme_tooltip_text_color="#fff" sc_theme_shadow_color="rgba(0, 0, 0, 0.1)" sc_theme_primary_font_family_stack="Roboto, 'Helvetica Neue', Helvetica, Arial, sans-serif" sc_theme_mono_font_family_stack="'Roboto Mono', 'Source Code Pro', ui-monospace, monospace" sc_calculator_min_width_tiny="150px" sc_calculator_max_width_tiny="250px" sc_calculator_min_width_small="200px" sc_calculator_max_width_small="300px" sc_calculator_min_width_medium="200px" sc_calculator_max_width_medium="400px" sc_calculator_min_width_large="200px" sc_calculator_max_width_large="440px" sc_hide_intl_conventions="No" sc_hide_payment_method="No"]


	Function call:
	show_fcautoloan_plugin(<option array>);
*/


/*
	example error logging.
	<?php error_log('loan amount at input: ' . print_r($loan_amt, true));  // To log array or object contents ?>
*/

// Define constants for easy migration across plugins
const FC_AUTOLOAN_VER = '2.0'; // for cache busting
const FC_AUTOLOAN_PLUGIN_NAME = 'AC Auto Loan Calculator';
const FC_AUTOLOAN_CSS_SCOPED_RESET = 'dist/css/bootstrap-reboot-scoped.css';
const FC_AUTOLOAN_CSS_MAIN = 'dist/css/accurate-calculators.css';
const FC_AUTOLOAN_CSS_CUSTOM = 'dist/css/accurate-calculators-custom.css';
const FC_AUTOLOAN_JS_ENTRY = 'dist/js/interface.AUTO-LOAN.gpl.js';
const FC_AUTOLOAN_DOWNLOAD_URL = 'https://accuratecalculators.com/plugins/ZIPs/fc-auto-loan-calculator.2.0.zip';
const FC_AUTOLOAN_DERIVATIVE_OF = 'https://accuratecalculators.com/auto-loan-calculator';

const FC_AUTOLOAN_TIME_OUT = 15; // seconds

// endpoint gets site's domain where plugin is installed
// dev testing
// const ACTIVATION_ENDPOINT = 'http://localhost:8090/wp-content/themes/accurate/plugin-endpoints/plugin-activation-handler.php'; // The server endpoint to send the data
// production
// const ACTIVATION_ENDPOINT = 'https://accuratecalculators.com/wp-content/themes/accurate/plugin-endpoints/plugin-activation-handler.php'; // The server endpoint to send the data

// Constants for the plugin update check
const FC_AUTOLOAN_PLUGIN_SLUG = 'ac-auto-loan-calculator-plus/ac-auto-loan-calculator-plus.php'; // Path to the main plugin file
// const FC_AUTOLOAN_UPDATE_ENDPOINT = 'https://accuratecalculators.com/wp-content/themes/accurate/plugin-endpoints/autoloanplus-endpoint.php'; // URL to the update endpoint
const FC_AUTOLOAN_TIMEOUT_SECS = 15;

// Define constants for easy migration across plugins
const FC_AUTOLOAN_PLUGIN_AUTHOR = 'AccurateCalculators.com'; // Plugin author
const FC_AUTOLOAN_PLUGIN_AUTHOR_HOMEPAGE = 'https://accuratecalculators.com/contact';
const FC_AUTOLOAN_PLUGIN_HOMEPAGE = 'https://accuratecalculators.com/calculator-plugins/auto-loan-plus-plugin';
// for fallback only
const FC_AUTOLOAN_PLUGIN_DESCRIPTION = '';

// The following consts must be kept in sync with the CSS variables
if (!defined('THEME_BASE_FONT_SIZE')) {
	define('THEME_BASE_FONT_SIZE', '16px');
}

if (!defined('CALCULATOR_MIN_WIDTH_TINY')) {
	define('CALCULATOR_MIN_WIDTH_TINY', '150px');
}

if (!defined('CALCULATOR_MAX_WIDTH_TINY')) {
	define('CALCULATOR_MAX_WIDTH_TINY', '250px');
}

if (!defined('CALCULATOR_MIN_WIDTH_SMALL')) {
	define('CALCULATOR_MIN_WIDTH_SMALL', '200px');
}

if (!defined('CALCULATOR_MAX_WIDTH_SMALL')) {
	define('CALCULATOR_MAX_WIDTH_SMALL', '300px');
}

if (!defined('CALCULATOR_MIN_WIDTH_MEDIUM')) {
	define('CALCULATOR_MIN_WIDTH_MEDIUM', '200px');
}

if (!defined('CALCULATOR_MAX_WIDTH_MEDIUM')) {
	define('CALCULATOR_MAX_WIDTH_MEDIUM', '400px');
}

if (!defined('CALCULATOR_MIN_WIDTH_LARGE')) {
	define('CALCULATOR_MIN_WIDTH_LARGE', '200px');
}

if (!defined('CALCULATOR_MAX_WIDTH_LARGE')) {
	define('CALCULATOR_MAX_WIDTH_LARGE', '440px');
}

// Globals - 

// prevent duplicate modals from being loaded
global $ac_rendered_modals;
// prevent duplicate conventions from being loaded
global $ac_rendered_conventions;

// Initialize the global array if not already set
if (!isset($ac_rendered_modals)) {
	$ac_rendered_modals = array();
}
// Initialize global conventions if not set
if (!isset($ac_rendered_conventions)) {
	$ac_rendered_conventions = false;
}


/**
 * Retrieve plugin information, including changelog and other details, for the plugin details view.
 *
 * @param mixed $result The current result object passed to the filter.
 * @param string $action The type of information requested (e.g., 'plugin_information').
 * @param object $args Arguments related to the plugin being queried (e.g., the plugin slug).
 * @return mixed Updated result object with plugin details or the original result if action doesn't match.
 */
// function fc_autoloan_information($result, $action, $args)
// {
// 	// Ensure this runs only for plugin information requests
// 	if ($action !== 'plugin_information') {
// 		return $result;
// 	}

// 	// Check if the correct plugin is being queried
// 	if (isset($args->slug) && $args->slug === fc_autoloan_PLUGIN_SLUG) {
// 		// Fetch the update information from the update endpoint
// 		$response = wp_remote_get(fc_autoloan_UPDATE_ENDPOINT, ['timeout' => fc_autoloan_TIMEOUT_SECS]);

// 		// Check if there was an error with the request
// 		if (is_wp_error($response)) {
// 			error_log('Error fetching plugin update information: ' . $response->get_error_message());
// 			return $result;
// 		}

// 		// Decode the JSON response from the server
// 		$plugin_data = json_decode(wp_remote_retrieve_body($response), true);

// 		// Check for errors in JSON decoding
// 		if (json_last_error() !== JSON_ERROR_NONE) {
// 			return $result;
// 		}

// 		// Ensure that the plugin data is valid
// 		if (isset($plugin_data['new_version']) && isset($plugin_data['changelog'])) {
// 			// Construct the result object using returned data or constants
// 			$result = new stdClass();
// 			$result->name = $plugin_data['name'] ?? fc_autoloan_PLUGIN_NAME;
// 			$result->slug = fc_autoloan_PLUGIN_SLUG;
// 			$result->version = $plugin_data['new_version'];
// 			$result->tested = get_bloginfo('version');
// 			$result->author = $plugin_data['author'] ?? fc_autoloan_PLUGIN_AUTHOR;
// 			$result->author_profile = $plugin_data['author_homepage'] ?? fc_autoloan_PLUGIN_AUTHOR_HOMEPAGE;
// 			$result->homepage = $plugin_data['homepage'] ?? fc_autoloan_PLUGIN_HOMEPAGE;
// 			$result->sections = [
// 				'description' => $plugin_data['description'] ?? fc_autoloan_PLUGIN_DESCRIPTION,
// 				'changelog' => $plugin_data['changelog'],
// 				'installation' => $plugin_data['installation']
// 			];
// 		}
// 	}

// 	return $result;
// } // fc_autoloan_information


// Two functions to check for plugin updates from the custom endpoint.

/**
 * Fetch update information from the server endpoint.
 * Logs all steps to help track down the issue.
 *
 * @return array $update_info Decoded update info or empty array on failure.
 */
// function fc_autoloan_get_update_info()
// {

// 	// Fetch the update info from the remote server.
// 	$response = wp_remote_get(fc_autoloan_UPDATE_ENDPOINT, array('timeout' => fc_autoloan_TIMEOUT_SECS));

// 	// Check if the response is valid.
// 	if (is_wp_error($response)) {
// 		error_log('Error fetching update info: ' . $response->get_error_message());
// 		return [];
// 	} elseif (wp_remote_retrieve_response_code($response) == 200) {
// 		$body = wp_remote_retrieve_body($response);

// 		// Decode the JSON response.
// 		$update_info = json_decode($body, true);

// 		if (json_last_error() === JSON_ERROR_NONE) {
// 			return $update_info;
// 		} else {
// 			error_log('JSON decoding error: ' . json_last_error_msg());
// 			return [];
// 		}
// 	} else {
// 		error_log('Unexpected HTTP response code: ' . wp_remote_retrieve_response_code($response));
// 		return [];
// 	}
// }


/**
 * Check for plugin updates and notify WordPress if there's a new version.
 * 
 * @param object $transient WordPress update transient object.
 * @return object $transient Modified transient with update information if available.
 */
// function fc_autoloan_check_for_update($transient)
// {

// 	if (empty($transient->checked)) {

// 		return $transient;
// 	}

// 	// Get update information.
// 	$update_info = fc_autoloan_get_update_info();
// 	if (empty($update_info)) {
// 		return $transient;
// 	}

// 	// Compare current version with new version.
// 	if (version_compare($transient->checked[fc_autoloan_PLUGIN_SLUG], $update_info['new_version'], '<')) {
// 		$plugin_info = new stdClass();
// 		$plugin_info->slug = fc_autoloan_PLUGIN_SLUG;
// 		$plugin_info->new_version = $update_info['new_version'];
// 		$plugin_info->package = $update_info['download_url'];
// 		// $plugin_info->url = $update_info['details_url'];
// 		// $plugin_info->url = 'https://accuratecalculators.com/calculator-plugins/---plus-plugin';
// 		$plugin_info->url = $update_info['details_url']; // documented as a required array element, see: wp-includes/update.php

// 		// Add the update info to the transient.
// 		$transient->response[fc_autoloan_PLUGIN_SLUG] = $plugin_info;
// 	}
// 	// else {
// 	// 	error_log('Current plugin version is up to date: ' . fc_autoloan_VER);
// 	// }

// 	return $transient;
// } // fc_autoloan_check_for_update
// add_filter('pre_set_site_transient_update_plugins', 'fc_autoloan_check_for_update', 20);


/**
 * Function: fc_autoloan_activate
 * activation hook
 * Initializes the options in the WordPress database when
 * plugin is activated
 *
 * args: none
 * returns: nothing
 */
function fc_autoloan_activate()
{

	/* activation code here */
	/* as options are added to widget, this array must be updated to update db */
	// WAS: fcautocalc_plugin
	update_option('acautoloan_key', array(
		'op_size' => null,
		'op_custom_style' => "No",
		'op_add_link' => "No",
		'op_brand_name' => "",
		'op_hide_resize' => "No",
		'op_price' => "35000.0",
		'op_dwn_pmt' => "2000.0",
		'op_loan_amt' => "0.0",
		'op_n_months' => "60",
		'op_rate' => "5.5",
		'op_currency' => "999",
		'op_date_mask' => "999",
		// [KT] 08/21/2024 - new options
		'op_theme_base_font_size' => "16px",
		'op_theme_primary_color' => "#28a745",
		'op_theme_primary_color_hover' => "#218838",
		'op_theme_primary_color_light' => "#30c853",
		'op_theme_primary_color_text' => "#fff",
		'op_theme_primary_color_text_inverse' => "#fff",
		'op_theme_background_muted' => "#f7f7f7",
		'op_theme_background_color_disabled' => "#efefef",
		'op_theme_background_calculator_color' => "#fff",
		'op_theme_background_modal_color' => "#fff",
		'op_theme_border_color' => "#dee2e6",
		'op_theme_text_color' => "#333333",
		'op_theme_tooltip_text_color' => "#fff",
		'op_theme_shadow_color' => "rgba(0, 0, 0, 0.1)",
		'op_theme_primary_font_family_stack' => "Roboto, 'Helvetica Neue', Helvetica, Arial, sans-serif",
		'op_theme_mono_font_family_stack' => "'Roboto Mono', 'Source Code Pro', ui-monospace, monospace",
		'op_calculator_min_width_tiny' => "150px",
		'op_calculator_max_width_tiny' => "250px",
		'op_calculator_min_width_small' => "200px",
		'op_calculator_max_width_small' => "300px",
		'op_calculator_min_width_medium' => "200px",
		'op_calculator_max_width_medium' => "400px",
		'op_calculator_min_width_large' => "200px",
		'op_calculator_max_width_large' => "440px",
		// [KT] 09/03/2024 - new options
		'op_hide_intl_conventions' => "No",
		'op_hide_payment_method' => "No",
		// [KT] 09/10/2024 - for future use
		'op_preparer' => null,
		'op_preparer_company' => null,
		'op_preparer_address' => null,
		'op_preparer_city_state' => null,
		'op_preparer_phone' => null,
		'op_preparer_email' => null
	));
}
register_activation_hook(__FILE__, 'fc_autoloan_activate');


/**
 * Function: fc_autoloan_show_widget
 * WAS: show_fcautoloan_widget
 * Shows the plugin in a WordPress widget area / sidebar
 *
 * args: $args (environment variables handled automatically by the hook)
 * returns: nothing
 */
function fc_autoloan_show_widget($args)
{
	error_log('fc_autoloan_show_widget called with:');
	extract($args);
	$options = get_option('acautoloan_key');
	$title = null;

	//production
	echo $before_widget;
	echo $before_title . $title . $after_title;

	show_fcautoloan_plugin($options);

	echo $after_widget;
} // fc_autoloan_show_widget

// Helper functions for ac_autoloanplus
if (!function_exists('fc_autoloan_validate_yes_no')) {
	function fc_autoloan_validate_yes_no($value, $default = 'No', $option_name = null)
	{
		$value = strtolower(sanitize_text_field($value));
		return ($value === 'yes') ? 'Yes' : 'No';
	}
}

if (!function_exists('fc_autoloan_validate_size')) {
	function fc_autoloan_validate_size($value, $default = 'large', $option_name = null)
	{
		$value = strtolower(sanitize_text_field($value));
		$allowed_sizes = array('tiny', 'small', 'medium', 'large');
		return in_array($value, $allowed_sizes) ? $value : $default;
	}
}

if (!function_exists('fc_autoloan_validate_numeric')) {
	function fc_autoloan_validate_numeric($value, $default = '0', $option_name = null)
	{
		$value = sanitize_text_field($value);
		if (is_numeric($value) && $value >= 0) {
			return $value;
		} else {
			if ($option_name) {
				echo __('Please enter a valid number greater than 0 for', 'fc-auto-loan-calculator') . " \"$option_name.\"<br>";
			}
			return $default;
		}
	}
}

if (!function_exists('fc_autoloan_validate_text')) {
	function fc_autoloan_validate_text($value, $default = '', $option_name = null)
	{
		return preg_replace("/[^\w#&'\-,. ]/", '', $value);
	}
}

if (!function_exists('fc_autoloan_validate_color')) {
	function fc_autoloan_validate_color($value, $default = '#000000', $option_name = null)
	{
		$value = sanitize_text_field($value);
		if (preg_match('/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $value) || preg_match('/^rgba?\([\d\s.,]+\)$/', $value)) {
			return $value;
		} else {
			return $default; // Default to black if invalid
		}
	}
}

if (!function_exists('fc_autoloan_validate_dimension')) {
	function fc_autoloan_validate_dimension($value, $default = '0', $option_name = null)
	{
		$value = sanitize_text_field($value);
		if (preg_match('/^\d+(\.\d+)?(px|em|rem|%)$/', $value)) {
			return $value;
		} else {
			return $default; // Default to '0' if invalid
		}
	}
}

if (!function_exists('fc_autoloan_validate_font_stack')) {
	function fc_autoloan_validate_font_stack($value, $default = '', $option_name = null)
	{
		return sanitize_text_field($value);
	}
}

if (!function_exists('fc_autoloan_validate_shadow')) {
	function fc_autoloan_validate_shadow($value, $default = '', $option_name = null)
	{
		return sanitize_text_field($value);
	}
}

if (!function_exists('fc_autoloan_get_processed_option')) {
	function fc_autoloan_get_processed_option($option_name, $keys, $sources, $default, $validation_func = null)
	{
		$value = null;
		foreach ($keys as $key) {
			foreach ($sources as $source) {
				if (isset($source[$key])) {
					$value = $source[$key];
					break 2;
				}
			}
		}
		if ($value === null) {
			$value = $default;
		}
		if ($validation_func) {
			$value = $validation_func($value, $default, $option_name);
		}
		return $value;
	}
}

/**
 * Displays the auto loan calculator GUI with options for shortcode attributes or direct function parameters.
 *
 * @param array $options An associative array of options for customizing the display.
 * @param string|null $content Content for the shortcode if provided.
 * @param string|null $code Shortcode identifier.
 * @return string|null The rendered GUI output if used as a shortcode, or null if directly included.
 */
function show_fcautoloan_plugin($options = array(), $content = null, $code = "")
{

	// Log function parameters to the debug log
	// error_log('show_fcautoloan_plugin called with:');
	// error_log('Options: ' . print_r($options, true));
	// error_log('Content: ' . var_export($content, true));
	// error_log('Code: ' . var_export($code, true));



	wp_enqueue_script('fc-i18n-auto-loan');
	wp_enqueue_script('fc-auto-loan-interface');

	// Set translations for hack script only
	wp_set_script_translations('fc-i18n-auto-loan', 'fc-auto-loan-calculator', plugin_dir_path(__FILE__) . 'languages');

	$language = "en";
	$WL_DIR_PREFIX = $language . "/";

	// Define default values
	$default_values = array(
		'size' => 'large',
		'custom_style' => 'No',
		'add_link' => 'No',
		'brand_name' => '',
		'hide_resize' => 'No',
		'hide_intl_conventions' => 'No',
		'hide_payment_method' => 'No',
		'price' => '35000.0',
		'dwn_pmt' => '2000.0',
		'loan_amt' => '0.0',
		'n_months' => '48',
		'rate' => '5.5',
		'currency' => '999',
		'date_mask' => '999',
		// Theme variables
		'theme_base_font_size' => '16px',
		'theme_primary_color' => '#28a745',
		'theme_primary_color_hover' => '#218838',
		'theme_primary_color_light' => '#30c853',
		'theme_primary_color_text' => '#fff',
		'theme_primary_color_text_inverse' => '#fff',
		'theme_background_muted' => '#f7f7f7',
		'theme_background_color_disabled' => '#efefef',
		'theme_background_calculator_color' => '#fff',
		'theme_background_modal_color' => '#fff',
		'theme_border_color' => '#dee2e6',
		'theme_text_color' => '#333333',
		'theme_tooltip_text_color' => '#fff',
		'theme_shadow_color' => 'rgba(0, 0, 0, 0.1)',
		'theme_primary_font_family_stack' => "Roboto, 'Helvetica Neue', Helvetica, Arial, sans-serif",
		'theme_mono_font_family_stack' => "'Roboto Mono', 'Source Code Pro', ui-monospace, monospace",
		'calculator_min_width_tiny' => '150px',
		'calculator_max_width_tiny' => '250px',
		'calculator_min_width_small' => '200px',
		'calculator_max_width_small' => '300px',
		'calculator_min_width_medium' => '200px',
		'calculator_max_width_medium' => '400px',
		'calculator_min_width_large' => '200px',
		'calculator_max_width_large' => '440px',
	);

	// Define allowed values
	$allowed_sizes = array('tiny', 'small', 'medium', 'large');

	// Determine if shortcode is used
	$shortcode = false;
	if (!empty($code) || (!empty($options) && array_key_exists(0, $options) && in_array(strtolower($options[0]), ['fcloanplugin', 'fcautoloanplugin']))) {
		$shortcode = true;
		$codes = shortcode_atts(array(
			'sc_size' => null,
			'sc_custom_style' => "No",
			'sc_add_link' => "No",
			'sc_brand_name' => "",
			'sc_hide_resize' => "No",
			'sc_price' => "35000.0",
			'sc_dwn_pmt' => "2000.0",
			'sc_loan_amt' => "0.0",
			'sc_n_months' => "48",
			'sc_rate' => "5.5",
			'sc_currency' => null,
			'sc_date_mask' => null,
			'sc_hide_intl_conventions' => "No",
			'sc_hide_payment_method' => "No",
			// Theme variables
			'sc_theme_base_font_size' => "16px",
			'sc_theme_primary_color' => "#28a745",
			'sc_theme_primary_color_hover' => "#218838",
			'sc_theme_primary_color_light' => "#30c853",
			'sc_theme_primary_color_text' => "#fff",
			'sc_theme_primary_color_text_inverse' => "#fff",
			'sc_theme_background_muted' => "#f7f7f7",
			'sc_theme_background_color_disabled' => "#efefef",
			'sc_theme_background_calculator_color' => "#fff",
			'sc_theme_background_modal_color' => "#fff",
			'sc_theme_border_color' => "#dee2e6",
			'sc_theme_text_color' => "#333333",
			'sc_theme_tooltip_text_color' => "#fff",
			'sc_theme_shadow_color' => "rgba(0, 0, 0, 0.1)",
			'sc_theme_primary_font_family_stack' => "Roboto, 'Helvetica Neue', Helvetica, Arial, sans-serif",
			'sc_theme_mono_font_family_stack' => "'Roboto Mono', 'Source Code Pro', ui-monospace, monospace",
			'sc_calculator_min_width_tiny' => "150px",
			'sc_calculator_max_width_tiny' => "250px",
			'sc_calculator_min_width_small' => "200px",
			'sc_calculator_max_width_small' => "300px",
			'sc_calculator_min_width_medium' => "200px",
			'sc_calculator_max_width_medium' => "400px",
			'sc_calculator_min_width_large' => "200px",
			'sc_calculator_max_width_large' => "440px",
		), $options);
		$sources = array($codes);
	} else {
		$temp_options = get_option('acautoloan_key');
		$sources = array($options, $temp_options);
	}

	// Define option mappings
	$option_mappings = array(
		'size' => array('sc_size', 'op_size'),
		'custom_style' => array('sc_custom_style', 'op_custom_style'),
		'add_link' => array('sc_add_link', 'op_add_link'),
		'brand_name' => array('sc_brand_name', 'op_brand_name'),
		'hide_resize' => array('sc_hide_resize', 'op_hide_resize'),
		'hide_intl_conventions' => array('sc_hide_intl_conventions', 'op_hide_intl_conventions'),
		'hide_payment_method' => array('sc_hide_payment_method', 'op_hide_payment_method'),
		'price' => array('sc_price', 'op_price'),
		'dwn_pmt' => array('sc_dwn_pmt', 'op_dwn_pmt'),
		'loan_amt' => array('sc_loan_amt', 'op_loan_amt'),
		'n_months' => array('sc_n_months', 'op_n_months'),
		'rate' => array('sc_rate', 'op_rate'),
		'currency' => array('sc_currency', 'op_currency'),
		'date_mask' => array('sc_date_mask', 'op_date_mask'),
		// Theme variables
		'theme_base_font_size' => array('sc_theme_base_font_size', 'op_theme_base_font_size'),
		'theme_primary_color' => array('sc_theme_primary_color', 'op_theme_primary_color'),
		'theme_primary_color_hover' => array('sc_theme_primary_color_hover', 'op_theme_primary_color_hover'),
		'theme_primary_color_light' => array('sc_theme_primary_color_light', 'op_theme_primary_color_light'),
		'theme_primary_color_text' => array('sc_theme_primary_color_text', 'op_theme_primary_color_text'),
		'theme_primary_color_text_inverse' => array('sc_theme_primary_color_text_inverse', 'op_theme_primary_color_text_inverse'),
		'theme_background_muted' => array('sc_theme_background_muted', 'op_theme_background_muted'),
		'theme_background_color_disabled' => array('sc_theme_background_color_disabled', 'op_theme_background_color_disabled'),
		'theme_background_calculator_color' => array('sc_theme_background_calculator_color', 'op_theme_background_calculator_color'),
		'theme_background_modal_color' => array('sc_theme_background_modal_color', 'op_theme_background_modal_color'),
		'theme_border_color' => array('sc_theme_border_color', 'op_theme_border_color'),
		'theme_text_color' => array('sc_theme_text_color', 'op_theme_text_color'),
		'theme_tooltip_text_color' => array('sc_theme_tooltip_text_color', 'op_theme_tooltip_text_color'),
		'theme_shadow_color' => array('sc_theme_shadow_color', 'op_theme_shadow_color'),
		'theme_primary_font_family_stack' => array('sc_theme_primary_font_family_stack', 'op_theme_primary_font_family_stack'),
		'theme_mono_font_family_stack' => array('sc_theme_mono_font_family_stack', 'op_theme_mono_font_family_stack'),
		'calculator_min_width_tiny' => array('sc_calculator_min_width_tiny', 'op_calculator_min_width_tiny'),
		'calculator_max_width_tiny' => array('sc_calculator_max_width_tiny', 'op_calculator_max_width_tiny'),
		'calculator_min_width_small' => array('sc_calculator_min_width_small', 'op_calculator_min_width_small'),
		'calculator_max_width_small' => array('sc_calculator_max_width_small', 'op_calculator_max_width_small'),
		'calculator_min_width_medium' => array('sc_calculator_min_width_medium', 'op_calculator_min_width_medium'),
		'calculator_max_width_medium' => array('sc_calculator_max_width_medium', 'op_calculator_max_width_medium'),
		'calculator_min_width_large' => array('sc_calculator_min_width_large', 'op_calculator_min_width_large'),
		'calculator_max_width_large' => array('sc_calculator_max_width_large', 'op_calculator_max_width_large'),
	);

	// Define validation functions mapping
	$validation_functions = array(
		'size' => function ($value, $default, $option_name) use ($allowed_sizes) {
			return fc_autoloan_validate_size($value, $default, $option_name);
		},
		'custom_style' => 'fc_autoloan_validate_yes_no',
		'add_link' => 'fc_autoloan_validate_yes_no',
		'brand_name' => 'fc_autoloan_validate_text',
		'hide_resize' => 'fc_autoloan_validate_yes_no',
		'hide_intl_conventions' => 'fc_autoloan_validate_yes_no',
		'hide_payment_method' => 'fc_autoloan_validate_yes_no',
		'price' => function ($value, $default, $option_name) {
			return fc_autoloan_validate_numeric($value, '0', $option_name);
		},
		'dwn_pmt' => function ($value, $default, $option_name) {
			return fc_autoloan_validate_numeric($value, '0', $option_name);
		},
		'loan_amt' => function ($value, $default, $option_name) {
			return fc_autoloan_validate_numeric($value, '0', $option_name);
		},
		'n_months' => function ($value, $default, $option_name) {
			return fc_autoloan_validate_numeric($value, '0', $option_name);
		},
		'rate' => function ($value, $default, $option_name) {
			return fc_autoloan_validate_numeric($value, '0', $option_name);
		},
		'currency' => function ($value, $default, $option_name) {
			$value = sanitize_text_field($value);
			return ctype_digit($value) ? $value : $default;
		},
		'date_mask' => function ($value, $default, $option_name) {
			$value = sanitize_text_field($value);
			return ctype_digit($value) ? $value : $default;
		},
		// Validation functions for theme variables
		'theme_base_font_size' => 'fc_autoloan_validate_dimension',
		'theme_primary_color' => 'fc_autoloan_validate_color',
		'theme_primary_color_hover' => 'fc_autoloan_validate_color',
		'theme_primary_color_light' => 'fc_autoloan_validate_color',
		'theme_primary_color_text' => 'fc_autoloan_validate_color',
		'theme_primary_color_text_inverse' => 'fc_autoloan_validate_color',
		'theme_background_muted' => 'fc_autoloan_validate_color',
		'theme_background_color_disabled' => 'fc_autoloan_validate_color',
		'theme_background_calculator_color' => 'fc_autoloan_validate_color',
		'theme_background_modal_color' => 'fc_autoloan_validate_color',
		'theme_border_color' => 'fc_autoloan_validate_color',
		'theme_text_color' => 'fc_autoloan_validate_color',
		'theme_tooltip_text_color' => 'fc_autoloan_validate_color',
		'theme_shadow_color' => 'fc_autoloan_validate_shadow',
		'theme_primary_font_family_stack' => 'fc_autoloan_validate_font_stack',
		'theme_mono_font_family_stack' => 'fc_autoloan_validate_font_stack',
		'calculator_min_width_tiny' => 'fc_autoloan_validate_dimension',
		'calculator_max_width_tiny' => 'fc_autoloan_validate_dimension',
		'calculator_min_width_small' => 'fc_autoloan_validate_dimension',
		'calculator_max_width_small' => 'fc_autoloan_validate_dimension',
		'calculator_min_width_medium' => 'fc_autoloan_validate_dimension',
		'calculator_max_width_medium' => 'fc_autoloan_validate_dimension',
		'calculator_min_width_large' => 'fc_autoloan_validate_dimension',
		'calculator_max_width_large' => 'fc_autoloan_validate_dimension',
	);

	// Process options
	$processed_options = array();
	foreach ($option_mappings as $option_name => $keys) {
		$default = $default_values[$option_name];
		$validation_func = isset($validation_functions[$option_name]) ? $validation_functions[$option_name] : null;
		$processed_options[$option_name] = fc_autoloan_get_processed_option($option_name, $keys, $sources, $default, $validation_func);
	}

	// Adjust brand_name if add_link is not 'Yes'
	if ($processed_options['add_link'] !== 'Yes') {
		$processed_options['brand_name'] = '';
	}

	// Extract processed options to variables
	extract($processed_options);

	// REGISTER STYLES

	// Register the scoped reset styles first
	wp_register_style('accuratecalcs-reset-style', plugins_url(FC_AUTOLOAN_CSS_SCOPED_RESET, __FILE__), array(), FC_AUTOLOAN_VER, 'screen');

	// Register the main styles with 'accuratecalcs-reset-style' as a dependency
	wp_register_style('accuratecalcs-style', plugins_url(FC_AUTOLOAN_CSS_MAIN, __FILE__), array('accuratecalcs-reset-style'), FC_AUTOLOAN_VER, 'screen');

	// Always enqueue the main styles
	wp_enqueue_style('accuratecalcs-style');

	// Optionally register and enqueue the custom styles last, so they can override the others
	if (strtolower($custom_style) === 'yes') {
		wp_register_style('accuratecalcs-custom-style', plugins_url(FC_AUTOLOAN_CSS_CUSTOM, __FILE__), array('accuratecalcs-reset-style'), FC_AUTOLOAN_VER, 'screen');
		wp_enqueue_style('accuratecalcs-custom-style');
	}

	// Build the custom CSS string
	$custom_css = ':root {';

	// Base Font Size
	if (!empty($theme_base_font_size) && $theme_base_font_size !== '16px') {
		$custom_css .= '--ac-theme-base-font-size: ' . esc_attr($theme_base_font_size) . ';';
	}

	// Primary Colors
	if (!empty($theme_primary_color) && $theme_primary_color !== '#28a745') {
		$custom_css .= '--ac-theme-primary-color: ' . esc_attr($theme_primary_color) . ';';
	}

	if (!empty($theme_primary_color_hover) && $theme_primary_color_hover !== '#218838') {
		$custom_css .= '--ac-theme-primary-color-hover: ' . esc_attr($theme_primary_color_hover) . ';';
	}

	if (!empty($theme_primary_color_light) && $theme_primary_color_light !== '#30c853') {
		$custom_css .= '--ac-theme-primary-color-light: ' . esc_attr($theme_primary_color_light) . ';';
	}

	if (!empty($theme_primary_color_text) && $theme_primary_color_text !== '#fff') {
		$custom_css .= '--ac-theme-primary-color-text: ' . esc_attr($theme_primary_color_text) . ';';
	}

	if (!empty($theme_primary_color_text_inverse) && $theme_primary_color_text_inverse !== '#fff') {
		$custom_css .= '--ac-theme-primary-color-text-inverse: ' . esc_attr($theme_primary_color_text_inverse) . ';';
	}

	// Background Colors
	if (!empty($theme_background_muted) && $theme_background_muted !== '#f7f7f7') {
		$custom_css .= '--ac-theme-background-muted: ' . esc_attr($theme_background_muted) . ';';
	}

	if (!empty($theme_background_color_disabled) && $theme_background_color_disabled !== '#efefef') {
		$custom_css .= '--ac-theme-background-color-disabled: ' . esc_attr($theme_background_color_disabled) . ';';
	}

	if (!empty($theme_background_calculator_color) && $theme_background_calculator_color !== '#fff') {
		$custom_css .= '--ac-theme-background-calculator-color: ' . esc_attr($theme_background_calculator_color) . ';';
	}

	if (!empty($theme_background_modal_color) && $theme_background_modal_color !== '#fff') {
		$custom_css .= '--ac-theme-background-modal-color: ' . esc_attr($theme_background_modal_color) . ';';
	}

	// Border Color
	if (!empty($theme_border_color) && $theme_border_color !== '#dee2e6') {
		$custom_css .= '--ac-theme-border-color: ' . esc_attr($theme_border_color) . ';';
	}

	// Text Colors
	if (!empty($theme_text_color) && $theme_text_color !== '#333333') {
		$custom_css .= '--ac-theme-text-color: ' . esc_attr($theme_text_color) . ';';
	}

	if (!empty($theme_tooltip_text_color) && $theme_tooltip_text_color !== '#fff') {
		$custom_css .= '--ac-theme-tooltip-text-color: ' . esc_attr($theme_tooltip_text_color) . ';';
	}

	// Shadow Color
	if (!empty($theme_shadow_color) && $theme_shadow_color !== 'rgba(0, 0, 0, 0.1)') {
		$custom_css .= '--ac-theme-shadow-color: ' . esc_attr($theme_shadow_color) . ';';
	}

	// Font Family Stacks
	if (!empty($theme_primary_font_family_stack) && $theme_primary_font_family_stack !== "Roboto, 'Helvetica Neue', Helvetica, Arial, sans-serif") {
		$custom_css .= '--ac-theme-primary-font-family-stack: ' . esc_attr($theme_primary_font_family_stack) . ';';
	}

	if (!empty($theme_mono_font_family_stack) && $theme_mono_font_family_stack !== "'Roboto Mono', 'Source Code Pro', ui-monospace, monospace") {
		$custom_css .= '--ac-theme-mono-font-family-stack: ' . esc_attr($theme_mono_font_family_stack) . ';';
	}

	// Calculator Dimensions
	if (!empty($calculator_min_width_tiny) && $calculator_min_width_tiny !== '150px') {
		$custom_css .= '--ac-calculator-min-width-tiny: ' . esc_attr($calculator_min_width_tiny) . ';';
	}

	if (!empty($calculator_max_width_tiny) && $calculator_max_width_tiny !== '250px') {
		$custom_css .= '--ac-calculator-max-width-tiny: ' . esc_attr($calculator_max_width_tiny) . ';';
	}

	if (!empty($calculator_min_width_small) && $calculator_min_width_small !== '200px') {
		$custom_css .= '--ac-calculator-min-width-small: ' . esc_attr($calculator_min_width_small) . ';';
	}

	if (!empty($calculator_max_width_small) && $calculator_max_width_small !== '300px') {
		$custom_css .= '--ac-calculator-max-width-small: ' . esc_attr($calculator_max_width_small) . ';';
	}

	if (!empty($calculator_min_width_medium) && $calculator_min_width_medium !== '200px') {
		$custom_css .= '--ac-calculator-min-width-medium: ' . esc_attr($calculator_min_width_medium) . ';';
	}

	if (!empty($calculator_max_width_medium) && $calculator_max_width_medium !== '400px') {
		$custom_css .= '--ac-calculator-max-width-medium: ' . esc_attr($calculator_max_width_medium) . ';';
	}

	if (!empty($calculator_min_width_large) && $calculator_min_width_large !== '200px') {
		$custom_css .= '--ac-calculator-min-width-large: ' . esc_attr($calculator_min_width_large) . ';';
	}

	if (!empty($calculator_max_width_large) && $calculator_max_width_large !== '440px') {
		$custom_css .= '--ac-calculator-max-width-large: ' . esc_attr($calculator_max_width_large) . ';';
	}

	$custom_css .= '}';

	// Only add the custom CSS if it's not empty
	if (trim($custom_css) !== ':root {}') {
		wp_add_inline_style('accuratecalcs-style', $custom_css);
	}

	// Load a custom stylesheet so defaults can be easily overridden
	if (strtolower($custom_style) === 'yes') {
		wp_enqueue_style('accuratecalcs-custom-style');
	}

	if ($shortcode) ob_start();

	// Display the widget
	include($WL_DIR_PREFIX . "calculator.gui.php");

	if ($shortcode) {
		$result = ob_get_contents();
		ob_end_clean();
		if (is_null($content)) {
			return $result;
		} else {
			return $content . $result;
		}
	}
} // show_fcautoloan_plugin


/**
 * Scripts are only registered here.
 * See: show_fcautoloan_plugin for enqueuing.
 * Enqueuing in show_fcautoloan_plugin() prevents script from being loaded on pages where plugin is not utilized.
 */
function fc_autoloan_enqueue_scripts()
{
	// Register the hack script required for i18n support for ES6 modules.
	wp_register_script('fc-i18n-auto-loan', plugin_dir_url(__FILE__) . 'dist/js/ac-i18n-fix.js', array('wp-i18n'), null, true);

	// Register the module script
	wp_register_script('fc-auto-loan-interface', plugins_url(FC_AUTOLOAN_JS_ENTRY, __FILE__), array(), FC_AUTOLOAN_VER, true);

	// see: show_fcautoloan_plugin
	// wp_set_script_translations('fc-i18n-auto-loan', 'fc-auto-loan-calculator', plugin_dir_path(__FILE__) . 'languages');

	// $locale = get_locale();
	// error_log('$locale -> ' . $locale);
}
add_action('wp_enqueue_scripts', 'fc_autoloan_enqueue_scripts');


/** 
 * Initialize the plugin: load text domain and setup plugin update hooks.
 * 
 */
function fc_autoloan_init()
{
	// Load the plugin's .mo file
	load_plugin_textdomain('fc-auto-loan-calculator', false, basename(dirname(__FILE__)) . '/languages/');
	// add_filter('plugins_api', 'fc_autoloan_information', 10, 3);
}
add_action('init', 'fc_autoloan_init');


/**
 * Function: fc_autoloan_show_admin_options
 *
 * Show/process options on the Wordpress admin's widget page
 *
 * args: nothing
 * returns: nothing
 */
function fc_autoloan_show_admin_options()
{

	// AccurateCalculators.com loan calculator widget options
	$options = $newoptions = get_option('acautoloan_key');

	// [KT] 02/05/2020 - updated for 2 new parameters op_currency, op_date_mask
	// in event admin updated plugin but did not deactivate / activate, pickup possible new options
	if (!array_key_exists('op_size', $options) || !array_key_exists('op_custom_style', $options) || !array_key_exists('op_add_link', $options) || !array_key_exists('op_brand_name', $options) || !array_key_exists('op_hide_resize', $options) || !array_key_exists('op_price', $options) || !array_key_exists('op_dwn_pmt', $options) || !array_key_exists('op_loan_amt', $options) || !array_key_exists('op_n_months', $options) || !array_key_exists('op_rate', $options) || !array_key_exists('op_currency', $options) || !array_key_exists('op_date_mask', $options)) {
		// echo('Updated options'. implode(" ", $options));
		update_option('acautoloan_key', array(
			'op_size' => null,
			'op_custom_style' => "No",
			'op_add_link' => "No",
			'op_brand_name' => "",
			'op_hide_resize' => "No",
			'op_price' => "35000.0",
			'op_dwn_pmt' => "2000.0",
			'op_loan_amt' => "0.0",
			'op_n_months' => "60",
			'op_rate' => "5.5",
			'op_currency' => '999',
			'op_date_mask' => '999',
			'op_theme_base_font_size' => "16px",
			'op_theme_primary_color' => "#28a745",
			'op_theme_primary_color_hover' => "#218838",
			'op_theme_primary_color_light' => "#30c853",
			'op_theme_primary_color_text' => "#fff",
			'op_theme_primary_color_text_inverse' => "#fff",
			'op_theme_background_muted' => "#f7f7f7",
			'op_theme_background_color_disabled' => "#efefef",
			'op_theme_background_calculator_color' => "#fff",
			'op_theme_background_modal_color' => "#fff",
			'op_theme_border_color' => "#dee2e6",
			'op_theme_text_color' => "#333333",
			'op_theme_tooltip_text_color' => "#fff",
			'op_theme_shadow_color' => "rgba(0, 0, 0, 0.1)",
			'op_theme_primary_font_family_stack' => "Roboto, 'Helvetica Neue', Helvetica, Arial, sans-serif",
			'op_theme_mono_font_family_stack' => "'Roboto Mono', 'Source Code Pro', ui-monospace, monospace",
			'op_calculator_min_width_tiny' => "150px",
			'op_calculator_max_width_tiny' => "250px",
			'op_calculator_min_width_small' => "200px",
			'op_calculator_max_width_small' => "300px",
			'op_calculator_min_width_medium' => "200px",
			'op_calculator_max_width_medium' => "400px",
			'op_calculator_min_width_large' => "200px",
			'op_calculator_max_width_large' => "440px",
			'op_hide_intl_conventions' => "No",
			'op_hide_payment_method' => "No",
			'op_preparer' => null,
			'op_preparer_company' => null,
			'op_preparer_address' => null,
			'op_preparer_city_state' => null,
			'op_preparer_phone' => null,
			'op_preparer_email' => null
		));
		$options = $newoptions = get_option('acautoloan_key'); // keep everything in sync
	}


	// if widget's options have previously been set/saved in current session
	if (!empty($_POST['acautoloan_opts'])) {
		$newoptions['op_size'] = strip_tags(stripslashes($_POST['acautoloan-op_size']));
		if (strtolower($newoptions['op_size']) != 'tiny' && strtolower($newoptions['op_size']) != 'small' && strtolower($newoptions['op_size']) != 'medium') {
			$newoptions['op_size'] = 'large';
		}
		$newoptions['op_custom_style'] = strip_tags(stripslashes($_POST['acautoloan-op_custom_style']));
		if (strtolower($newoptions['op_custom_style']) != 'yes') {
			$newoptions['op_custom_style'] = 'No';
		}
		$newoptions['op_add_link'] = strip_tags(stripslashes($_POST['acautoloan-op_add_link']));
		if (strtolower($newoptions['op_add_link']) != 'yes') {
			$newoptions['op_add_link'] = 'no';
		}
		// allow word characters, numbers, ampersand, dash, apostrophe, space and number sign
		$newoptions['op_brand_name'] = preg_replace("/[^\w#&'\-,. ]/", '', $_POST['acautoloan-op_brand_name']);
		if (strtolower($newoptions['op_add_link']) != 'yes') {
			$newoptions['op_brand_name'] = '';
		}
		$newoptions['op_hide_resize'] = strip_tags(stripslashes($_POST['acautoloan-op_hide_resize']));
		if (strtolower($newoptions['op_hide_resize']) != 'yes') {
			$newoptions['op_hide_resize'] = 'no';
		}
		$newoptions['op_price'] = strip_tags(stripslashes($_POST['acautoloan-op_price']));
		$newoptions['op_dwn_pmt'] = strip_tags(stripslashes($_POST['acautoloan-op_dwn_pmt']));
		$newoptions['op_loan_amt'] = strip_tags(stripslashes($_POST['acautoloan-op_loan_amt']));
		$newoptions['op_n_months'] = strip_tags(stripslashes($_POST['acautoloan-op_n_months']));
		$newoptions['op_rate'] = strip_tags(stripslashes($_POST['acautoloan-op_rate']));
		// [KT] 02/05/2020 - new options
		$newoptions['op_currency'] = strip_tags(stripslashes($_POST['acautoloan-op_currency']));
		$newoptions['op_date_mask'] = strip_tags(stripslashes($_POST['acautoloan-op_date_mask']));

		// [KT] 08/21/2024 - new options
		$newoptions['op_theme_base_font_size'] = strip_tags(stripslashes($_POST['acautoloan-op_theme_base_font_size']));
		$newoptions['op_theme_primary_color'] = strip_tags(stripslashes($_POST['acautoloan-op_theme_primary_color']));
		$newoptions['op_theme_primary_color_hover'] = strip_tags(stripslashes($_POST['acautoloan-op_theme_primary_color_hover']));
		$newoptions['op_theme_primary_color_light'] = strip_tags(stripslashes($_POST['acautoloan-op_theme_primary_color_light']));
		$newoptions['op_theme_primary_color_text'] = strip_tags(stripslashes($_POST['acautoloan-op_theme_primary_color_text']));
		$newoptions['op_theme_primary_color_text_inverse'] = strip_tags(stripslashes($_POST['acautoloan-op_theme_primary_color_text_inverse']));
		$newoptions['op_theme_background_muted'] = strip_tags(stripslashes($_POST['acautoloan-op_theme_background_muted']));
		$newoptions['op_theme_background_color_disabled'] = strip_tags(stripslashes($_POST['acautoloan-op_theme_background_color_disabled']));
		$newoptions['op_theme_background_calculator_color'] = strip_tags(stripslashes($_POST['acautoloan-op_theme_background_calculator_color']));
		$newoptions['op_theme_background_modal_color'] = strip_tags(stripslashes($_POST['acautoloan-op_theme_background_modal_color']));
		$newoptions['op_theme_border_color'] = strip_tags(stripslashes($_POST['acautoloan-op_theme_border_color']));
		$newoptions['op_theme_text_color'] = strip_tags(stripslashes($_POST['acautoloan-op_theme_text_color']));
		$newoptions['op_theme_tooltip_text_color'] = strip_tags(stripslashes($_POST['acautoloan-op_theme_tooltip_text_color']));
		$newoptions['op_theme_shadow_color'] = strip_tags(stripslashes($_POST['acautoloan-op_theme_shadow_color']));
		$newoptions['op_theme_primary_font_family_stack'] = strip_tags(stripslashes($_POST['acautoloan-op_theme_primary_font_family_stack']));
		$newoptions['op_theme_mono_font_family_stack'] = strip_tags(stripslashes($_POST['acautoloan-op_theme_mono_font_family_stack']));
		$newoptions['op_calculator_min_width_tiny'] = strip_tags(stripslashes($_POST['acautoloan-op_calculator_min_width_tiny']));
		$newoptions['op_calculator_max_width_tiny'] = strip_tags(stripslashes($_POST['acautoloan-op_calculator_max_width_tiny']));
		$newoptions['op_calculator_min_width_small'] = strip_tags(stripslashes($_POST['acautoloan-op_calculator_min_width_small']));
		$newoptions['op_calculator_max_width_small'] = strip_tags(stripslashes($_POST['acautoloan-op_calculator_max_width_small']));
		$newoptions['op_calculator_min_width_medium'] = strip_tags(stripslashes($_POST['acautoloan-op_calculator_min_width_medium']));
		$newoptions['op_calculator_max_width_medium'] = strip_tags(stripslashes($_POST['acautoloan-op_calculator_max_width_medium']));
		$newoptions['op_calculator_min_width_large'] = strip_tags(stripslashes($_POST['acautoloan-op_calculator_min_width_large']));
		$newoptions['op_calculator_max_width_large'] = strip_tags(stripslashes($_POST['acautoloan-op_calculator_max_width_large']));
		// [KT] 09/03/2024 - new options
		$newoptions['op_hide_intl_conventions'] = strip_tags(stripslashes($_POST['acautoloan-op_hide_intl_conventions']));
		$newoptions['op_hide_payment_method'] = strip_tags(stripslashes($_POST['acautoloan-op_hide_payment_method']));


		// Initialize an array to collect error messages
		$error_messages = array();

		// start additional validation - validate what user entered via the admin's GUI page.
		if (!is_numeric($newoptions['op_price'])) {
			// $newoptions['op_price'] = '0';
			$newoptions['op_price'] = $options['op_price']; // leave it unchanged
			$error_messages[] = __('Please enter a valid number for "Default price".', 'fc-auto-loan-calculator') . "<br>";
		}
		if (!is_numeric($newoptions['op_dwn_pmt'])) {
			// $newoptions['op_dwn_pmt'] = '0';
			$newoptions['op_dwn_pmt'] = $options['op_dwn_pmt']; // leave it unchanged
			$error_messages[] = __('Please enter a valid number for "Default down payment".', 'fc-auto-loan-calculator') . "<br>";
		}
		if (!is_numeric($newoptions['op_loan_amt'])) {
			// $newoptions['op_loan_amt'] = '0';
			$newoptions['op_loan_amt'] = $options['op_loan_amt']; // leave it unchanged
			$error_messages[] = __('Please enter a valid number for "Default loan amount."', 'fc-auto-loan-calculator') . "<br>";
		}
		if (!is_numeric($newoptions['op_n_months'])) {
			$newoptions['op_n_months'] = $options['op_n_months'];
			$error_messages[] = __('Please enter a valid number for "Default number of months."', 'fc-auto-loan-calculator') . "<br>";
		}
		if (!is_numeric($newoptions['op_rate'])) {
			$newoptions['op_rate'] = $options['op_rate'];
			$error_messages[] = __('Please enter a valid number for "Default interest rate."', 'fc-auto-loan-calculator') . "<br>";
		}
		// [KT] 02/05/2020 - new options
		if (!is_numeric($newoptions['op_currency'])) {
			$newoptions['op_currency'] = '999';
			$error_messages[] = __('Please enter a valid value for "Default Currency."', 'fc-auto-loan-calculator') . "<br>";
		}
		if (!is_numeric($newoptions['op_date_mask'])) {
			$newoptions['op_date_mask'] = '999';
			$error_messages[] = __('Please enter a valid number for "Default Date Format."', 'fc-auto-loan-calculator') . "<br>";
		}

		// validate min and max calculator dimensions
		// Validation for CSS dimension values (e.g., min/max width with units like px, rem)
		foreach (
			[
				'op_calculator_min_width_tiny',
				'op_calculator_max_width_tiny',
				'op_calculator_min_width_small',
				'op_calculator_max_width_small',
				'op_calculator_min_width_medium',
				'op_calculator_max_width_medium',
				'op_calculator_min_width_large',
				'op_calculator_max_width_large',
				'op_theme_base_font_size'
			] as $option
		) {
			if (!preg_match('/^\d+(px|rem|em|%)$/', $newoptions[$option])) {
				// Leave the value unchanged if validation fails
				$newoptions[$option] = $options[$option];
				$error_messages[] = __(sprintf('Please enter a valid CSS dimension (e.g., "340px", "10rem") for "%s".', $option), 'fc-auto-loan-calculator');
			}
		}

		// Validation for color values (e.g., hex color, rgba, or rgb)
		foreach (
			[
				'op_theme_primary_color',
				'op_theme_primary_color_hover',
				'op_theme_primary_color_light',
				'op_theme_primary_color_text',
				'op_theme_primary_color_text_inverse',
				'op_theme_background_muted',
				'op_theme_background_color_disabled',
				'op_theme_background_calculator_color',
				'op_theme_background_modal_color',
				'op_theme_border_color',
				'op_theme_text_color',
				'op_theme_tooltip_text_color',
				'op_theme_shadow_color'
			] as $option
		) {

			if (!preg_match('/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$|^rgba?\(\s*\d{1,3}\s*,\s*\d{1,3}\s*,\s*\d{1,3}\s*(,\s*0?\.\d+)?\s*\)$/', $newoptions[$option])) {
				// Leave the value unchanged if validation fails
				$newoptions[$option] = $options[$option];
				$error_messages[] = __(sprintf('Please enter a valid color value (e.g., "#ffffff", "rgba(255, 255, 255, 0.5)") for "%s".', $option), 'fc-auto-loan-calculator');
			}
		}


		// Check if there are any error messages and store them in a transient or session - message is not visible, revisit
		// At least write to error log.
		if (!empty($error_messages)) {
			error_log('AC Auto Loan Calculator Plugin admin page error -> ' . implode(', ', $error_messages));
			// set_transient is not showing the error message - revisit
			// set_transient('acautoloanplus_error_messages', $error_messages, 30); // 30 seconds duration
		}
	}
	//debug
	//else {
	// echo('Options not yet posted.');
	//}


	// 1st check if options changed and if valid session
	if ($options != $newoptions && (wp_verify_nonce($_POST['acautoloan_opts'], 'fc_options'))) {

		// 2nd check permissions
		if (is_user_logged_in() && current_user_can('update_plugins')) {
			$options = $newoptions;
			update_option('acautoloan_key', $options);
		}
		//debug
		//else if (array_key_exists('acautoloanplus_opts', $_POST) && (!wp_verify_nonce($_POST['acautoloan_opts'], 'fc_options'))) {
		// echo ('Update failed. Session expired. Please log in again.');
		//}
	}


	$brand_name = esc_attr($options['op_brand_name']);
	$price = esc_attr($options['op_price']);
	$dwn_pmt = esc_attr($options['op_dwn_pmt']);
	$loan_amt = esc_attr($options['op_loan_amt']);
	$n_months = esc_attr($options['op_n_months']);
	$rate = esc_attr($options['op_rate']);
	// [KT] 02/05/2020
	$currency = esc_attr($options['op_currency']);
	$date_mask = esc_attr($options['op_date_mask']);

?>

	<!-- HTML for widget's option page in WordPress' admin panel i.e. Appearance -> Widgets -->
	<div class="ac-container">

		<p class="small">
			<?php _e('Do not forget to save your changes. Scroll all the way down in this panel for the <span class="red">[Save]</span> button.', 'fc-auto-loan-calculator'); ?>
		</p>

		<div class="ac-option">
			<label for="acautoloanplus-op_size">
				<?php _e('Widget\'s size (size limits adjustable below)?', 'fc-auto-loan-calculator'); ?>:
				<select name="acautoloanplus-op_size" id="acautoloanplus-op_size" class="widefat">
					<option value="tiny" <?php selected($options['op_size'], 'tiny'); ?>><?php _e('Tiny (max width = 180px)', 'fc-auto-loan-calculator'); ?></option>
					<option value="small" <?php selected($options['op_size'], 'small'); ?>><?php _e('Small (max width = 300px)', 'fc-auto-loan-calculator'); ?></option>
					<option value="medium" <?php selected($options['op_size'], 'medium'); ?>><?php _e('Medium (max width = 340px)', 'fc-auto-loan-calculator'); ?></option>
					<option value="large" <?php selected($options['op_size'], 'large'); ?>><?php _e('Large (max width = 440px)', 'fc-auto-loan-calculator'); ?></option>
				</select>
			</label>
		</div>

		<div class="ac-option">
			<label for="acautoloanplus-op_custom_style">
				<?php _e('Load custom style sheet?', 'fc-auto-loan-calculator'); ?>:
				<select name="acautoloanplus-op_custom_style" id="acautoloanplus-op_custom_style" class="widefat">
					<option value="No" <?php selected($options['op_custom_style'], 'No'); ?>><?php _e('No', 'fc-auto-loan-calculator'); ?></option>
					<option value="Yes" <?php selected($options['op_custom_style'], 'Yes'); ?>><?php _e('Yes', 'fc-auto-loan-calculator'); ?></option>
				</select>
			</label>
			<p class="ac-description">
				<?php _e('If "Yes" loads &lt;site&gt;\wp-content\plugins\ac-auto-loan-calculator-plus\css\accurate-calculators-custom.css. Entries in <b>accurate-calculators-custom.css</b> override the plugin\'s look. Editing the provided custom stylesheet is another way to modify the look of the calculator. For best performance include only the rules in the custom stylesheet you are overriding. BACKUP YOUR CUSTOMIZATIONS! You will need to manually replace them when (if) you upgrade the plugin.', 'fc-auto-loan-calculator'); ?>
			</p>
		</div>

		<div class="ac-option">
			<label for="acautoloanplus-op_currency">
				<?php _e('Set a default currency?', 'fc-auto-loan-calculator'); ?>:
				<select name="acautoloanplus-op_currency" id="acautoloanplus-op_currency" class="widefat">
					<option value="999" <?php selected($options['op_currency'], '999'); ?>><?php _e('Use visitor\'s browser\'s settings to set currency - do not override.', 'fc-auto-loan-calculator'); ?></option>
					<!-- Add other currency options here -->
					<option value="59" <?php selected($options['op_currency'], '59'); ?>><?php echo ('Albania&nbsp;&nbsp;&nbsp;&nbsp;(Lek)&nbsp;&nbsp;&nbsp;&nbsp;Lek12,345,678.99'); ?></option>
					<option value="90" <?php selected($options['op_currency'], '90'); ?>><?php echo ('Algeria&nbsp;&nbsp;&nbsp;&nbsp;(Algerian Dinar)&nbsp;&nbsp;&nbsp;&nbsp;DZD12,345,678.99'); ?></option>
					<option value="36" <?php selected($options['op_currency'], '36'); ?>><?php echo ('Argentina&nbsp;&nbsp;&nbsp;&nbsp;(Argentine Peso)&nbsp;&nbsp;&nbsp;&nbsp;$12.345.678,99'); ?></option>
					<option value="88" <?php selected($options['op_currency'], '88'); ?>><?php echo ('Armenia&nbsp;&nbsp;&nbsp;&nbsp;(Armenian Dram)&nbsp;&nbsp;&nbsp;&nbsp;AMD12,345,678.99'); ?></option>
					<option value="49" <?php selected($options['op_currency'], '49'); ?>><?php echo ('Australia&nbsp;&nbsp;&nbsp;&nbsp;(Australian Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99'); ?></option>
					<option value="43" <?php selected($options['op_currency'], '43'); ?>><?php echo ('Austria&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;€12.345.678,99'); ?></option>
					<option value="84" <?php selected($options['op_currency'], '84'); ?>><?php echo ('Azerbaijan&nbsp;&nbsp;&nbsp;&nbsp;(Manat)&nbsp;&nbsp;&nbsp;&nbsp;₼12,345,678.99'); ?></option>
					<option value="89" <?php selected($options['op_currency'], '89'); ?>><?php echo ('Bahrain&nbsp;&nbsp;&nbsp;&nbsp;(Bahraini Dinar)&nbsp;&nbsp;&nbsp;&nbsp;BHD12,345,678.994'); ?></option>
					<option value="54" <?php selected($options['op_currency'], '54'); ?>><?php echo ('Belarus&nbsp;&nbsp;&nbsp;&nbsp;(Ruble)&nbsp;&nbsp;&nbsp;&nbsp;Br12,345,678.99'); ?></option>
					<option value="18" <?php selected($options['op_currency'], '18'); ?>><?php echo ('Belgium&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€'); ?></option>
					<option value="42" <?php selected($options['op_currency'], '42'); ?>><?php echo ('Belgium&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;€12.345.678,99'); ?></option>
					<option value="53" <?php selected($options['op_currency'], '53'); ?>><?php echo ('Belize&nbsp;&nbsp;&nbsp;&nbsp;(Belize Dollar)&nbsp;&nbsp;&nbsp;&nbsp;BZ$12,345,678.99'); ?></option>
					<option value="38" <?php selected($options['op_currency'], '38'); ?>><?php echo ('Bolivia&nbsp;&nbsp;&nbsp;&nbsp;(Boliviano)&nbsp;&nbsp;&nbsp;&nbsp;$b12.345.678,99'); ?></option>
					<option value="28" <?php selected($options['op_currency'], '28'); ?>><?php echo ('Bosnia/Herzegovina&nbsp;&nbsp;&nbsp;&nbsp;(Mark)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99KM'); ?></option>
					<option value="40" <?php selected($options['op_currency'], '40'); ?>><?php echo ('Brazil&nbsp;&nbsp;&nbsp;&nbsp;(Brazilian Real)&nbsp;&nbsp;&nbsp;&nbsp;R$12.345.678,99'); ?></option>
					<option value="49" <?php selected($options['op_currency'], '49'); ?>><?php echo ('Brunei&nbsp;&nbsp;&nbsp;&nbsp;(Brunei Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99'); ?></option>
					<option value="27" <?php selected($options['op_currency'], '27'); ?>><?php echo ('Bulgaria&nbsp;&nbsp;&nbsp;&nbsp;(Bulgarian Lev)&nbsp;&nbsp;&nbsp;&nbsp;12345678,99лв'); ?></option>
					<option value="50" <?php selected($options['op_currency'], '50'); ?>><?php echo ('Canada&nbsp;&nbsp;&nbsp;&nbsp;(Canadian Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99'); ?></option>
					<option value="13" <?php selected($options['op_currency'], '13'); ?>><?php echo ('Canada&nbsp;&nbsp;&nbsp;&nbsp;(Canadian Dollar)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99$'); ?></option>
					<option value="35" <?php selected($options['op_currency'], '35'); ?>><?php echo ('Chile&nbsp;&nbsp;&nbsp;&nbsp;(Chilean Peso)&nbsp;&nbsp;&nbsp;&nbsp;$12.345.679'); ?></option>
					<option value="73" <?php selected($options['op_currency'], '73'); ?>><?php echo ('China&nbsp;&nbsp;&nbsp;&nbsp;(Yuan Renminbi)&nbsp;&nbsp;&nbsp;&nbsp;¥12,345,678.99'); ?></option>
					<option value="36" <?php selected($options['op_currency'], '36'); ?>><?php echo ('Colombia&nbsp;&nbsp;&nbsp;&nbsp;(Colombian Peso)&nbsp;&nbsp;&nbsp;&nbsp;$12.345.678,99'); ?></option>
					<option value="26" <?php selected($options['op_currency'], '26'); ?>><?php echo ('Costa Rica&nbsp;&nbsp;&nbsp;&nbsp;(Colon)&nbsp;&nbsp;&nbsp;&nbsp;₡12 345 678,99'); ?></option>
					<option value="29" <?php selected($options['op_currency'], '29'); ?>><?php echo ('Croatia&nbsp;&nbsp;&nbsp;&nbsp;(Kuna)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99kn'); ?></option>
					<option value="15" <?php selected($options['op_currency'], '15'); ?>><?php echo ('Czechia&nbsp;&nbsp;&nbsp;&nbsp;(Czech Koruna)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99Kč'); ?></option>
					<option value="30" <?php selected($options['op_currency'], '30'); ?>><?php echo ('Denmark&nbsp;&nbsp;&nbsp;&nbsp;(Danish Krone)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99kr'); ?></option>
					<option value="63" <?php selected($options['op_currency'], '63'); ?>><?php echo ('Dominican Republic&nbsp;&nbsp;&nbsp;&nbsp;(DR Peso)&nbsp;&nbsp;&nbsp;&nbsp;RD$1,234.99'); ?></option>
					<option value="36" <?php selected($options['op_currency'], '36'); ?>><?php echo ('Ecuador&nbsp;&nbsp;&nbsp;&nbsp;(US Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12.345.678,99'); ?></option>
					<option value="70" <?php selected($options['op_currency'], '70'); ?>><?php echo ('Egypt&nbsp;&nbsp;&nbsp;&nbsp;(Egyptian Pound)&nbsp;&nbsp;&nbsp;&nbsp;£12,345,678.99'); ?></option>
					<option value="49" <?php selected($options['op_currency'], '49'); ?>><?php echo ('El Salvador&nbsp;&nbsp;&nbsp;&nbsp;(El Salvador Colon)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99'); ?></option>
					<option value="20" <?php selected($options['op_currency'], '20'); ?>><?php echo ('Estonia&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€'); ?></option>
					<option value="68" <?php selected($options['op_currency'], '68'); ?>><?php echo ('Faroe Islands&nbsp;&nbsp;&nbsp;&nbsp;(Danish Krone)&nbsp;&nbsp;&nbsp;&nbsp;kr12,345,678.99'); ?></option>
					<option value="20" <?php selected($options['op_currency'], '20'); ?>><?php echo ('Finland&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€'); ?></option>
					<option value="18" <?php selected($options['op_currency'], '18'); ?>><?php echo ('France&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€'); ?></option>
					<option value="91" <?php selected($options['op_currency'], '91'); ?>><?php echo ('Georgia&nbsp;&nbsp;&nbsp;&nbsp;(Lari)&nbsp;&nbsp;&nbsp;&nbsp;GEL12,345,678.99'); ?></option>
					<option value="34" <?php selected($options['op_currency'], '34'); ?>><?php echo ('Germany&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€'); ?></option>
					<option value="33" <?php selected($options['op_currency'], '33'); ?>><?php echo ('Greece&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€'); ?></option>
					<option value="61" <?php selected($options['op_currency'], '61'); ?>><?php echo ('Guatemala&nbsp;&nbsp;&nbsp;&nbsp;(Quetzal)&nbsp;&nbsp;&nbsp;&nbsp;Q12,345,678.99'); ?></option>
					<option value="58" <?php selected($options['op_currency'], '58'); ?>><?php echo ('Honduras&nbsp;&nbsp;&nbsp;&nbsp;(Lempira)&nbsp;&nbsp;&nbsp;&nbsp;L12,345,678.99'); ?></option>
					<option value="56" <?php selected($options['op_currency'], '56'); ?>><?php echo ('Hong Kong&nbsp;&nbsp;&nbsp;&nbsp;(HK Dollar)&nbsp;&nbsp;&nbsp;&nbsp;HK$12,345,678.99'); ?></option>
					<option value="14" <?php selected($options['op_currency'], '14'); ?>><?php echo ('Hungary&nbsp;&nbsp;&nbsp;&nbsp;(Forint)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99Ft'); ?></option>
					<option value="67" <?php selected($options['op_currency'], '67'); ?>><?php echo ('Iceland&nbsp;&nbsp;&nbsp;&nbsp;(Iceland Krona)&nbsp;&nbsp;&nbsp;&nbsp;kr12,345,679'); ?></option>
					<option value="83" <?php selected($options['op_currency'], '83'); ?>><?php echo ('India&nbsp;&nbsp;&nbsp;&nbsp;(Indian Rupee)&nbsp;&nbsp;&nbsp;&nbsp;₹12,345,678.99'); ?></option>
					<option value="41" <?php selected($options['op_currency'], '41'); ?>><?php echo ('Indonesia&nbsp;&nbsp;&nbsp;&nbsp;(Rupiah)&nbsp;&nbsp;&nbsp;&nbsp;Rp12.345.678,99'); ?></option>
					<option value="85" <?php selected($options['op_currency'], '85'); ?>><?php echo ('Iran&nbsp;&nbsp;&nbsp;&nbsp;(Iranian Rial)&nbsp;&nbsp;&nbsp;&nbsp;﷼12,345,678.99'); ?></option>
					<option value="92" <?php selected($options['op_currency'], '92'); ?>><?php echo ('Iraq&nbsp;&nbsp;&nbsp;&nbsp;(Iraqi Dinar)&nbsp;&nbsp;&nbsp;&nbsp;IQD12,345,678.994'); ?></option>
					<option value="80" <?php selected($options['op_currency'], '80'); ?>><?php echo ('Ireland&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;€12,345,678.99'); ?></option>
					<option value="78" <?php selected($options['op_currency'], '78'); ?>><?php echo ('Israel&nbsp;&nbsp;&nbsp;&nbsp;(Sheqel)&nbsp;&nbsp;&nbsp;&nbsp;₪12,345,678.99'); ?></option>
					<option value="33" <?php selected($options['op_currency'], '33'); ?>><?php echo ('Italy&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€'); ?></option>
					<option value="57" <?php selected($options['op_currency'], '57'); ?>><?php echo ('Jamaica&nbsp;&nbsp;&nbsp;&nbsp;(Jamaican Dollar)&nbsp;&nbsp;&nbsp;&nbsp;J$12,345,678.99'); ?></option>
					<option value="72" <?php selected($options['op_currency'], '72'); ?>><?php echo ('Japan&nbsp;&nbsp;&nbsp;&nbsp;(Yen)&nbsp;&nbsp;&nbsp;&nbsp;¥12,345,679'); ?></option>
					<option value="93" <?php selected($options['op_currency'], '93'); ?>><?php echo ('Jordan&nbsp;&nbsp;&nbsp;&nbsp;(Jordanian Dinar)&nbsp;&nbsp;&nbsp;&nbsp;JOD12,345,678.994'); ?></option>
					<option value="74" <?php selected($options['op_currency'], '74'); ?>><?php echo ('Kazakhstan&nbsp;&nbsp;&nbsp;&nbsp;(Tenge)&nbsp;&nbsp;&nbsp;&nbsp;лв12,345,678.99'); ?></option>
					<option value="94" <?php selected($options['op_currency'], '94'); ?>><?php echo ('Kenya&nbsp;&nbsp;&nbsp;&nbsp;(Kenyan Shilling)&nbsp;&nbsp;&nbsp;&nbsp;KES12,345,678.99'); ?></option>
					<option value="77" <?php selected($options['op_currency'], '77'); ?>><?php echo ('Korea (South)&nbsp;&nbsp;&nbsp;&nbsp;(Won)&nbsp;&nbsp;&nbsp;&nbsp;₩12,345,679'); ?></option>
					<option value="95" <?php selected($options['op_currency'], '95'); ?>><?php echo ('Kuwait&nbsp;&nbsp;&nbsp;&nbsp;(Kuwaiti Dinar)&nbsp;&nbsp;&nbsp;&nbsp;KWD12,345,678.994'); ?></option>
					<option value="74" <?php selected($options['op_currency'], '74'); ?>><?php echo ('Kyrgyzstan&nbsp;&nbsp;&nbsp;&nbsp;(Som)&nbsp;&nbsp;&nbsp;&nbsp;лв12,345,678.99'); ?></option>
					<option value="21" <?php selected($options['op_currency'], '21'); ?>><?php echo ('Latvia&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€'); ?></option>
					<option value="70" <?php selected($options['op_currency'], '70'); ?>><?php echo ('Lebanon&nbsp;&nbsp;&nbsp;&nbsp;(Lebanese Pound)&nbsp;&nbsp;&nbsp;&nbsp;£12,345,678.99'); ?></option>
					<option value="96" <?php selected($options['op_currency'], '96'); ?>><?php echo ('Libya&nbsp;&nbsp;&nbsp;&nbsp;(Libyan Dinar)&nbsp;&nbsp;&nbsp;&nbsp;LYD12,345,678.994'); ?></option>
					<option value="103" <?php selected($options['op_currency'], '103'); ?>><?php echo ('Liechtenstein&nbsp;&nbsp;&nbsp;&nbsp;(Swiss Franc)&nbsp;&nbsp;&nbsp;&nbsp;CHF12’345’678.99'); ?></option>
					<option value="19" <?php selected($options['op_currency'], '19'); ?>><?php echo ('Lithuania&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€'); ?></option>
					<option value="34" <?php selected($options['op_currency'], '34'); ?>><?php echo ('Luxembourg&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€'); ?></option>
					<option value="33" <?php selected($options['op_currency'], '33'); ?>><?php echo ('Luxembourg&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€'); ?></option>
					<option value="98" <?php selected($options['op_currency'], '98'); ?>><?php echo ('Macao&nbsp;&nbsp;&nbsp;&nbsp;(Pataca)&nbsp;&nbsp;&nbsp;&nbsp;MOP12,345,678.99'); ?></option>
					<option value="64" <?php selected($options['op_currency'], '64'); ?>><?php echo ('Malaysia&nbsp;&nbsp;&nbsp;&nbsp;(Ringgit)&nbsp;&nbsp;&nbsp;&nbsp;RM12,345,678.99'); ?></option>
					<option value="99" <?php selected($options['op_currency'], '99'); ?>><?php echo ('Maldives&nbsp;&nbsp;&nbsp;&nbsp;(Rufiyaa)&nbsp;&nbsp;&nbsp;&nbsp;MVR12,345,678.99'); ?></option>
					<option value="79" <?php selected($options['op_currency'], '79'); ?>><?php echo ('Malta&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;€12,345,678.99'); ?></option>
					<option value="49" <?php selected($options['op_currency'], '49'); ?>><?php echo ('Mexico&nbsp;&nbsp;&nbsp;&nbsp;(Mexican Peso)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99'); ?></option>
					<option value="18" <?php selected($options['op_currency'], '18'); ?>><?php echo ('Monaco&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€'); ?></option>
					<option value="81" <?php selected($options['op_currency'], '81'); ?>><?php echo ('Mongolia&nbsp;&nbsp;&nbsp;&nbsp;(Tugrik)&nbsp;&nbsp;&nbsp;&nbsp;₮12,345,678.99'); ?></option>
					<option value="97" <?php selected($options['op_currency'], '97'); ?>><?php echo ('Morocco&nbsp;&nbsp;&nbsp;&nbsp;(Dirham)&nbsp;&nbsp;&nbsp;&nbsp;MAD12,345,678.99'); ?></option>
					<option value="44" <?php selected($options['op_currency'], '44'); ?>><?php echo ('Netherlands&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;€12.345.678,99'); ?></option>
					<option value="49" <?php selected($options['op_currency'], '49'); ?>><?php echo ('New Zealand&nbsp;&nbsp;&nbsp;&nbsp;(NZ Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99'); ?></option>
					<option value="55" <?php selected($options['op_currency'], '55'); ?>><?php echo ('Nicaragua&nbsp;&nbsp;&nbsp;&nbsp;(Cordoba Oro)&nbsp;&nbsp;&nbsp;&nbsp;C$12,345,678.99'); ?></option>
					<option value="104" <?php selected($options['op_currency'], '104'); ?>><?php echo ('Nigeria&nbsp;&nbsp;&nbsp;&nbsp;(Naira)&nbsp;&nbsp;&nbsp;&nbsp;₦12,345,678.99'); ?></option>
					<option value="25" <?php selected($options['op_currency'], '25'); ?>><?php echo ('Norway&nbsp;&nbsp;&nbsp;&nbsp;(Norwegian Krone)&nbsp;&nbsp;&nbsp;&nbsp;kr12 345 678,99'); ?></option>
					<option value="68" <?php selected($options['op_currency'], '68'); ?>><?php echo ('Norway&nbsp;&nbsp;&nbsp;&nbsp;(Norwegian Krone)&nbsp;&nbsp;&nbsp;&nbsp;kr12,345,678.99'); ?></option>
					<option value="86" <?php selected($options['op_currency'], '86'); ?>><?php echo ('Oman&nbsp;&nbsp;&nbsp;&nbsp;(Rial Omani)&nbsp;&nbsp;&nbsp;&nbsp;﷼12,345,678.994'); ?></option>
					<option value="76" <?php selected($options['op_currency'], '76'); ?>><?php echo ('Pakistan&nbsp;&nbsp;&nbsp;&nbsp;(Pakistan Rupee)&nbsp;&nbsp;&nbsp;&nbsp;₨12,345,678.99'); ?></option>
					<option value="52" <?php selected($options['op_currency'], '52'); ?>><?php echo ('Panama&nbsp;&nbsp;&nbsp;&nbsp;(Balboa)&nbsp;&nbsp;&nbsp;&nbsp;B/.12,345,678.99'); ?></option>
					<option value="39" <?php selected($options['op_currency'], '39'); ?>><?php echo ('Paraguay&nbsp;&nbsp;&nbsp;&nbsp;(Guarani)&nbsp;&nbsp;&nbsp;&nbsp;Gs12.345.679'); ?></option>
					<option value="65" <?php selected($options['op_currency'], '65'); ?>><?php echo ('Peru&nbsp;&nbsp;&nbsp;&nbsp;(Sol)&nbsp;&nbsp;&nbsp;&nbsp;S/.12,345,678.99'); ?></option>
					<option value="82" <?php selected($options['op_currency'], '82'); ?>><?php echo ('Philippines&nbsp;&nbsp;&nbsp;&nbsp;(Philippine Peso)&nbsp;&nbsp;&nbsp;&nbsp;₱12,345,678.99'); ?></option>
					<option value="17" <?php selected($options['op_currency'], '17'); ?>><?php echo ('Poland&nbsp;&nbsp;&nbsp;&nbsp;(Zloty)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99zł'); ?></option>
					<option value="18" <?php selected($options['op_currency'], '18'); ?>><?php echo ('Portugal&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€'); ?></option>
					<option value="85" <?php selected($options['op_currency'], '85'); ?>><?php echo ('Qatar&nbsp;&nbsp;&nbsp;&nbsp;(Qatari Rial)&nbsp;&nbsp;&nbsp;&nbsp;﷼12,345,678.99'); ?></option>
					<option value="31" <?php selected($options['op_currency'], '31'); ?>><?php echo ('Romania&nbsp;&nbsp;&nbsp;&nbsp;(Romanian Leu)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99lei'); ?></option>
					<option value="23" <?php selected($options['op_currency'], '23'); ?>><?php echo ('Russian Federation&nbsp;&nbsp;&nbsp;&nbsp;(Ruble)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99₽'); ?></option>
					<option value="85" <?php selected($options['op_currency'], '85'); ?>><?php echo ('Saudi Arabia&nbsp;&nbsp;&nbsp;&nbsp;(Saudi Riyal)&nbsp;&nbsp;&nbsp;&nbsp;﷼12,345,678.99'); ?></option>
					<option value="51" <?php selected($options['op_currency'], '51'); ?>><?php echo ('Singapore&nbsp;&nbsp;&nbsp;&nbsp;(Singapore Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99'); ?></option>
					<option value="20" <?php selected($options['op_currency'], '20'); ?>><?php echo ('Slovakia&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99€'); ?></option>
					<option value="34" <?php selected($options['op_currency'], '34'); ?>><?php echo ('Slovenia&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€'); ?></option>
					<option value="62" <?php selected($options['op_currency'], '62'); ?>><?php echo ('South Africa&nbsp;&nbsp;&nbsp;&nbsp;(Rand)&nbsp;&nbsp;&nbsp;&nbsp;R12,345,678.99'); ?></option>
					<option value="62" <?php selected($options['op_currency'], '62'); ?>><?php echo ('South Africa&nbsp;&nbsp;&nbsp;&nbsp;(Rand)&nbsp;&nbsp;&nbsp;&nbsp;R12 345 678,99'); ?></option>
					<option value="33" <?php selected($options['op_currency'], '33'); ?>><?php echo ('Spain&nbsp;&nbsp;&nbsp;&nbsp;(Euro)&nbsp;&nbsp;&nbsp;&nbsp;12.345.678,99€'); ?></option>
					<option value="16" <?php selected($options['op_currency'], '16'); ?>><?php echo ('Sweden&nbsp;&nbsp;&nbsp;&nbsp;(Swedish Krona)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99kr'); ?></option>
					<option value="103" <?php selected($options['op_currency'], '103'); ?>><?php echo ('Switzerland&nbsp;&nbsp;&nbsp;&nbsp;(Swiss Franc)&nbsp;&nbsp;&nbsp;&nbsp;CHF12’345’678.99'); ?></option>
					<option value="47" <?php selected($options['op_currency'], '47'); ?>><?php echo ('Switzerland&nbsp;&nbsp;&nbsp;&nbsp;(Swiss Franc)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678.99CHF'); ?></option>
					<option value="102" <?php selected($options['op_currency'], '102'); ?>><?php echo ('Switzerland&nbsp;&nbsp;&nbsp;&nbsp;(Swiss Franc)&nbsp;&nbsp;&nbsp;&nbsp;CHF12’345’678.99'); ?></option>
					<option value="" <?php selected($options['op_currency'], ''); ?>><?php echo ('Syrian Arab Republic&nbsp;&nbsp;&nbsp;&nbsp;(SYP)&nbsp;&nbsp;&nbsp;&nbsp;SYP 12,345,679'); ?></option>
					<option value="60" <?php selected($options['op_currency'], '60'); ?>><?php echo ('Taiwan&nbsp;&nbsp;&nbsp;&nbsp;(Taiwan Dollar)&nbsp;&nbsp;&nbsp;&nbsp;NT$12,345,678.99'); ?></option>
					<option value="75" <?php selected($options['op_currency'], '75'); ?>><?php echo ('Thailand&nbsp;&nbsp;&nbsp;&nbsp;(Baht)&nbsp;&nbsp;&nbsp;&nbsp;฿12,345,678.99'); ?></option>
					<option value="66" <?php selected($options['op_currency'], '66'); ?>><?php echo ('Trinidad & Tobago&nbsp;&nbsp;&nbsp;&nbsp;(T/T Dollar)&nbsp;&nbsp;&nbsp;&nbsp;TT$1,234.99'); ?></option>
					<option value="100" <?php selected($options['op_currency'], '100'); ?>><?php echo ('Tunisia&nbsp;&nbsp;&nbsp;&nbsp;(Tunisian Dinar)&nbsp;&nbsp;&nbsp;&nbsp;TND12,345,678.994'); ?></option>
					<option value="45" <?php selected($options['op_currency'], '45'); ?>><?php echo ('Turkey&nbsp;&nbsp;&nbsp;&nbsp;(Turkish Lira)&nbsp;&nbsp;&nbsp;&nbsp;₺12.345.678,99'); ?></option>
					<option value="22" <?php selected($options['op_currency'], '22'); ?>><?php echo ('Ukraine&nbsp;&nbsp;&nbsp;&nbsp;(Hryvnia)&nbsp;&nbsp;&nbsp;&nbsp;12 345 678,99₴'); ?></option>
					<option value="87" <?php selected($options['op_currency'], '87'); ?>><?php echo ('United Arab Emirates&nbsp;&nbsp;&nbsp;&nbsp;(UAE Dirham)&nbsp;&nbsp;&nbsp;&nbsp;AED12,345,678.99'); ?></option>
					<option value="71" <?php selected($options['op_currency'], '71'); ?>><?php echo ('United Kingdom&nbsp;&nbsp;&nbsp;&nbsp;(GBP)&nbsp;&nbsp;&nbsp;&nbsp;£12,345,678.99'); ?></option>
					<option value="48" <?php selected($options['op_currency'], '48'); ?>><?php echo ('United States&nbsp;&nbsp;&nbsp;&nbsp;(US Dollar)&nbsp;&nbsp;&nbsp;&nbsp;$12,345,678.99'); ?></option>
					<option value="37" <?php selected($options['op_currency'], '37'); ?>><?php echo ('Uruguay&nbsp;&nbsp;&nbsp;&nbsp;(Peso Uruguayo)&nbsp;&nbsp;&nbsp;&nbsp;$U12.345.678,99'); ?></option>
					<option value="74" <?php selected($options['op_currency'], '74'); ?>><?php echo ('Uzbekistan&nbsp;&nbsp;&nbsp;&nbsp;(Uzbekistan Sum)&nbsp;&nbsp;&nbsp;&nbsp;лв12,345,678.99'); ?></option>
					<option value="46" <?php selected($options['op_currency'], '46'); ?>><?php echo ('Venezuela&nbsp;&nbsp;&nbsp;&nbsp;(Bolívar Soberano)&nbsp;&nbsp;&nbsp;&nbsp;VES12.345.678,99'); ?></option>
					<option value="32" <?php selected($options['op_currency'], '32'); ?>><?php echo ('Viet Nam&nbsp;&nbsp;&nbsp;&nbsp;(Dong)&nbsp;&nbsp;&nbsp;&nbsp;12.345.679₫'); ?></option>
					<option value="85" <?php selected($options['op_currency'], '85'); ?>><?php echo ('Yemen&nbsp;&nbsp;&nbsp;&nbsp;(Yemeni Rial)&nbsp;&nbsp;&nbsp;&nbsp;﷼12,345,678.99'); ?></option>
					<option value="101" <?php selected($options['op_currency'], '101'); ?>><?php echo ('Zimbabwe&nbsp;&nbsp;&nbsp;&nbsp;(ZWL)&nbsp;&nbsp;&nbsp;&nbsp;ZWL12,345,678.99'); ?></option>
				</select>
			</label>
		</div>

		<div class="ac-option">
			<label for="acautoloanplus-op_date_mask">
				<?php _e('Set a date format convention?', 'fc-auto-loan-calculator'); ?>:
				<select name="acautoloanplus-op_date_mask" id="acautoloanplus-op_date_mask" class="widefat">
					<option value="999" <?php selected($options['op_date_mask'], '999'); ?>><?php _e('Use visitor\'s browser\'s settings to set date format - do not override.', 'fc-auto-loan-calculator'); ?></option>
					<!-- Add other date format options here -->
					<option value="0" <?php selected($options['op_date_mask'], '0'); ?>><?php echo ('MM/DD/YYYY'); ?></option>
					<option value="1" <?php selected($options['op_date_mask'], '1'); ?>><?php echo ('DD/MM/YYYY'); ?></option>
					<option value="2" <?php selected($options['op_date_mask'], '2'); ?>><?php echo ('YYYY-MM-DD'); ?></option>
					<option value="3" <?php selected($options['op_date_mask'], '3'); ?>><?php echo ('DD.MM.YYYY'); ?></option>
					<option value="4" <?php selected($options['op_date_mask'], '4'); ?>><?php echo ('DD-MM-YYYY'); ?></option>
					<option value="5" <?php selected($options['op_date_mask'], '5'); ?>><?php echo ('YYYY.MM.DD'); ?></option>
					<option value="6" <?php selected($options['op_date_mask'], '6'); ?>><?php echo ('YYYY/MM/DD'); ?></option>
				</select>
			</label>
			<p class="ac-description">
				<?php _e('When a user first visits your site, the plugin will use the browser\'s international conventions to set the currency and date format. If you wish, you may override the plugin and set a default currency and date format. The user will still have the ability to override either setting if you do not hide the &quot;international conventions&quot; below.', 'fc-auto-loan-calculator'); ?>
			</p>
		</div>

		<p class="small">
			<?php _e('<strong>Note:</strong> Your visitors may select a date format and currency by clicking on <span class="red">$ : MM/DD/YYYY</span> in the calculator\'s lower right corner if you do not set "Hide international conventions" to "yes".', 'fc-auto-loan-calculator'); ?>
		</p>

		<hr>

		<!-- 2 column -->
		<div class="ac-grid">
			<div class="ac-grid__item">
				<label for="acautoloanplus-op_hide_resize">
					<?php _e('Hide the resize buttons?', 'fc-auto-loan-calculator'); ?>:
					<select name="acautoloanplus-op_hide_resize" id="acautoloanplus-op_hide_resize" class="widefat">
						<option value="No" <?php selected($options['op_hide_resize'], 'No'); ?>><?php _e('No', 'fc-auto-loan-calculator'); ?></option>
						<option value="Yes" <?php selected($options['op_hide_resize'], 'Yes'); ?>><?php _e('Yes', 'fc-auto-loan-calculator'); ?></option>
					</select>
				</label>
			</div>
			<div class="ac-grid__item">
				<label for="acautoloanplus-op_hide_intl_conventions">
					<?php _e('Hide international conventions?', 'fc-auto-loan-calculator'); ?>:
					<select name="acautoloanplus-op_hide_intl_conventions" id="acautoloanplus-op_hide_intl_conventions" class="widefat">
						<option value="No" <?php selected($options['op_hide_intl_conventions'], 'No'); ?>><?php _e('No', 'fc-auto-loan-calculator'); ?></option>
						<option value="Yes" <?php selected($options['op_hide_intl_conventions'], 'Yes'); ?>><?php _e('Yes', 'fc-auto-loan-calculator'); ?></option>
					</select>
				</label>
			</div>
		</div>
		<div class="ac-grid">
			<div class="ac-grid__item">
				<label for="acautoloanplus-op_hide_payment_method">
					<?php _e('Hide the Payment Method?', 'fc-auto-loan-calculator'); ?>:
					<select name="acautoloanplus-op_hide_payment_method" id="acautoloanplus-op_hide_payment_method" class="widefat">
						<option value="No" <?php selected($options['op_hide_payment_method'], 'No'); ?>><?php _e('No', 'fc-auto-loan-calculator'); ?></option>
						<option value="Yes" <?php selected($options['op_hide_payment_method'], 'Yes'); ?>><?php _e('Yes', 'fc-auto-loan-calculator'); ?></option>
					</select>
				</label>
			</div>
			<div class="ac-grid__item">
				<label for="acautoloanplus-op_add_link">
					<?php _e('Link to', 'fc-auto-loan-calculator'); ?>&nbsp;AccurateCalculators.com?:
					<select name="acautoloanplus-op_add_link" id="acautoloanplus-op_add_link" class="widefat">
						<option value="No" <?php selected($options['op_add_link'], 'No'); ?>><?php _e('No', 'fc-auto-loan-calculator'); ?></option>
						<option value="Yes" <?php selected($options['op_add_link'], 'Yes'); ?>><?php _e('Yes', 'fc-auto-loan-calculator'); ?></option>
					</select>
				</label>
			</div>
		</div>

		<!-- end 2 column -->

		<p class="ac-description">
			<?php _e('If "Link to AccurateCalculators.com" is set to "Yes", one very discreet follow link will be inserted in the calculator. If you allow the link, you may rebrand the calculator with your name. Resetting this option to "No" at any time will remove the links. See FAQ\'s in readme file for details.', 'fc-auto-loan-calculator'); ?>
		</p>

		<div class="ac-option">
			<label for="acautoloanplus-op_brand_name">
				<?php _e('Add Your Brand Name', 'fc-auto-loan-calculator'); ?>:
				<input id="acautoloanplus-op_brand_name" name="acautoloanplus-op_brand_name" type="text" value="<?php echo $brand_name; ?>" />
			</label>
			<p class="ac-description">
				<?php _e('You may brand this widget with your brand. <b>Example: "Abe\'s Best"</b> will be preappended to "Loan Calculator". For this to work, the above "Link to" option must be set to "Yes".', 'fc-auto-loan-calculator'); ?>
			</p>
		</div>

		<!-- 2 column -->

		<hr>

		<div class="ac-grid">
			<div class="ac-grid__item">
				<label for="acautoloanplus-op_price">
					<?php _e('Default price', 'fc-auto-loan-calculator'); ?>:
					<input id="acautoloanplus-op_price" name="acautoloanplus-op_price" type="text" value="<?php echo $price; ?>" />
				</label>
			</div>
			<div class="ac-grid__item">
				<label for="acautoloanplus-op_dwn_pmt">
					<?php _e('Default down payment', 'fc-auto-loan-calculator'); ?>:
					<input id="acautoloanplus-op_dwn_pmt" name="acautoloanplus-op_dwn_pmt" type="text" value="<?php echo $dwn_pmt; ?>" />
				</label>
			</div>

			<div class="ac-grid__item">
				<label for="acautoloanplus-op_loan_amt">
					<?php _e('Default loan amount', 'fc-auto-loan-calculator'); ?>:
					<input id="acautoloanplus-op_loan_amt" name="acautoloanplus-op_loan_amt" type="text" value="<?php echo $loan_amt; ?>" />
				</label>
			</div>
			<div class="ac-grid__item">
				<label for="acautoloanplus-op_n_months">
					<?php _e('Default number of months', 'fc-auto-loan-calculator'); ?>:
					<input id="acautoloanplus-op_n_months" name="acautoloanplus-op_n_months" type="text" value="<?php echo $n_months; ?>" />
				</label>
			</div>

			<div class="ac-grid__item">
				<label for="acautoloanplus-op_rate">
					<?php _e('Default interest rate', 'fc-auto-loan-calculator'); ?>:
					<input id="acautoloanplus-op_rate" name="acautoloanplus-op_rate" type="text" value="<?php echo $rate; ?>" />
				</label>
			</div>
			<div class="ac-grid__item text__item">
				<span class="ac-note">
					<?php _e('Enter only digits.<br>No currency or formatting.', 'fc-auto-loan-calculator'); ?>
				</span>
			</div>
		</div>

		<hr>

		<!-- New Options -->

		<p class="ac-note">
			<?php _e('Style options.', 'fc-auto-loan-calculator'); ?>
			<br>
			<span class="small"><?php _e('(Defaults in parentheses. "hex", "rgb", or "rgba" values accepted for colors.)', 'fc-auto-loan-calculator'); ?></span>
		</p>

		<!-- [KT] 08/21/2024 - new options -->
		<div class="ac-grid">

			<div class="ac-grid__item">
				<label for="acautoloanplus-op_theme_base_font_size">
					<?php _e('op_theme_base_font_size', 'fc-auto-loan-calculator'); ?> (16px):
					<input id="acautoloanplus-op_theme_base_font_size" name="acautoloanplus-op_theme_base_font_size" type="text" value="<?php echo esc_attr($options['op_theme_base_font_size']); ?>" />
				</label>
			</div>

			<div class="ac-grid__item">
				<label for="acautoloanplus-op_theme_primary_color">
					<?php _e('op_theme_primary_color', 'fc-auto-loan-calculator'); ?> (#28a745):
					<input id="acautoloanplus-op_theme_primary_color" name="acautoloanplus-op_theme_primary_color" type="text" value="<?php echo esc_attr($options['op_theme_primary_color']); ?>" />
				</label>
			</div>

			<div class="ac-grid__item">
				<label for="acautoloanplus-op_theme_primary_color_hover">
					<?php _e('op_theme_primary_color_hover', 'fc-auto-loan-calculator'); ?>&nbsp(#218838):
					<input id="acautoloanplus-op_theme_primary_color_hover" name="acautoloanplus-op_theme_primary_color_hover" type="text" value="<?php echo esc_attr($options['op_theme_primary_color_hover']); ?>" />
				</label>
			</div>

			<div class="ac-grid__item">
				<label for="acautoloanplus-op_theme_primary_color_text">
					<?php _e('op_theme_primary_color_text', 'fc-auto-loan-calculator'); ?> (#fff):
					<input id="acautoloanplus-op_theme_primary_color_text" name="acautoloanplus-op_theme_primary_color_text" type="text" value="<?php echo esc_attr($options['op_theme_primary_color_text']); ?>" />
				</label>
			</div>

			<div class="ac-grid__item ac-grid__item--span-2">
				<label for="acautoloanplus-op_theme_primary_color_light">
					<?php _e('op_theme_primary_color_light', 'fc-auto-loan-calculator'); ?> (#30c853):
					<input id="acautoloanplus-op_theme_primary_color_light" name="acautoloanplus-op_theme_primary_color_light" type="text" value="<?php echo esc_attr($options['op_theme_primary_color_light']); ?>" />
				</label>
			</div>

			<div class="ac-grid__item ac-grid__item--span-2">
				<label for="acautoloanplus-op_theme_primary_color_text_inverse">
					<?php _e('op_theme_primary_color_text_inverse', 'fc-auto-loan-calculator'); ?> (#fff):
					<input id="acautoloanplus-op_theme_primary_color_text_inverse" name="acautoloanplus-op_theme_primary_color_text_inverse" type="text" value="<?php echo esc_attr($options['op_theme_primary_color_text_inverse']); ?>" />
				</label>
			</div>

			<div class="ac-grid__item ac-grid__item--span-2">
				<label for="acautoloanplus-op_theme_background_color_disabled">
					<?php _e('op_theme_background_color_disabled', 'fc-auto-loan-calculator'); ?> (#efefef):
					<input id="acautoloanplus-op_theme_background_color_disabled" name="acautoloanplus-op_theme_background_color_disabled" type="text" value="<?php echo esc_attr($options['op_theme_background_color_disabled']); ?>" />
				</label>
			</div>

			<div class="ac-grid__item ac-grid__item--span-2">
				<label for="acautoloanplus-op_theme_background_calculator_color">
					<?php _e('op_theme_background_calculator_color', 'fc-auto-loan-calculator'); ?> (#fff):
					<input id="acautoloanplus-op_theme_background_calculator_color" name="acautoloanplus-op_theme_background_calculator_color" type="text" value="<?php echo esc_attr($options['op_theme_background_calculator_color']); ?>" />
				</label>
			</div>

			<div class="ac-grid__item ac-grid__item--span-2">
				<label for="acautoloanplus-op_theme_background_modal_color">
					<?php _e('op_theme_background_modal_color', 'fc-auto-loan-calculator'); ?> (#fff):
					<input id="acautoloanplus-op_theme_background_modal_color" name="acautoloanplus-op_theme_background_modal_color" type="text" value="<?php echo esc_attr($options['op_theme_background_modal_color']); ?>" />
				</label>
			</div>

			<div class="ac-grid__item">
				<label for="acautoloanplus-op_theme_background_muted">
					<?php _e('op_theme_background_muted', 'fc-auto-loan-calculator'); ?> (#f7f7f7):
					<input id="acautoloanplus-op_theme_background_muted" name="acautoloanplus-op_theme_background_muted" type="text" value="<?php echo esc_attr($options['op_theme_background_muted']); ?>" />
				</label>
			</div>
			<div class="ac-grid__item">
				<label for="acautoloanplus-op_theme_border_color">
					<?php _e('op_theme_border_color', 'fc-auto-loan-calculator'); ?> (#dee2e6):
					<input id="acautoloanplus-op_theme_border_color" name="acautoloanplus-op_theme_border_color" type="text" value="<?php echo esc_attr($options['op_theme_border_color']); ?>" />
				</label>
			</div>
			<div class="ac-grid__item">
				<label for="acautoloanplus-op_theme_text_color">
					<?php _e('op_theme_text_color', 'fc-auto-loan-calculator'); ?> (#333333):
					<input id="acautoloanplus-op_theme_text_color" name="acautoloanplus-op_theme_text_color" type="text" value="<?php echo esc_attr($options['op_theme_text_color']); ?>" />
				</label>
			</div>

			<div class="ac-grid__item">
				<label for="acautoloanplus-op_theme_tooltip_text_color">
					<?php _e('op_theme_tooltip_text_color', 'fc-auto-loan-calculator'); ?> (#fff):
					<input id="acautoloanplus-op_theme_tooltip_text_color" name="acautoloanplus-op_theme_tooltip_text_color" type="text" value="<?php echo esc_attr($options['op_theme_tooltip_text_color']); ?>" />
				</label>
			</div>

			<div class="ac-grid__item ac-grid__item--span-2">
				<label for="acautoloanplus-op_theme_shadow_color">
					<?php _e('op_theme_shadow_color', 'fc-auto-loan-calculator'); ?> (rgba(0, 0, 0, 0.1)):
					<input id="acautoloanplus-op_theme_shadow_color" name="acautoloanplus-op_theme_shadow_color" type="text" value="<?php echo esc_attr($options['op_theme_shadow_color']); ?>" />
				</label>
			</div>

		</div>

		<div class="ac-grid">
			<div class="ac-grid__item">
				<label for="acautoloanplus-op_theme_primary_font_family_stack">
					<?php _e('op_theme_primary_font_family_stack', 'fc-auto-loan-calculator'); ?>:
					<input id="acautoloanplus-op_theme_primary_font_family_stack" name="acautoloanplus-op_theme_primary_font_family_stack" type="text" value="<?php echo esc_attr($options['op_theme_primary_font_family_stack']); ?>" />
				</label>
			</div>
			<div class="ac-grid__item">
				<label for="acautoloanplus-op_theme_mono_font_family_stack">
					<?php _e('op_theme_mono_font_family_stack', 'fc-auto-loan-calculator'); ?>:
					<input id="acautoloanplus-op_theme_mono_font_family_stack" name="acautoloanplus-op_theme_mono_font_family_stack" type="text" value="<?php echo esc_attr($options['op_theme_mono_font_family_stack']); ?>" />
				</label>
			</div>
		</div>

		<!-- end 2 column -->

		<hr>

		<p class="ac-note">
			<?php _e('You may tweak the minimum and maximum widths.', 'fc-auto-loan-calculator'); ?>
			<br>
			<span class="small"><?php _e('("px", "rem", and "em" units accepted.)', 'fc-auto-loan-calculator'); ?></span>
		</p>

		<!-- 2 column -->
		<div class="ac-grid">

			<div class="ac-grid__item">
				<label for="acautoloanplus-op_calculator_min_width_tiny">
					<?php _e('op_calculator_min_width_tiny', 'fc-auto-loan-calculator'); ?>:
					<input id="acautoloanplus-op_calculator_min_width_tiny" name="acautoloanplus-op_calculator_min_width_tiny" type="text" value="<?php echo esc_attr($options['op_calculator_min_width_tiny']); ?>" />
				</label>
			</div>

			<div class="ac-grid__item">
				<label for="acautoloanplus-op_calculator_max_width_tiny">
					<?php _e('op_calculator_max_width_tiny', 'fc-auto-loan-calculator'); ?>:
					<input id="acautoloanplus-op_calculator_max_width_tiny" name="acautoloanplus-op_calculator_max_width_tiny" type="text" value="<?php echo esc_attr($options['op_calculator_max_width_tiny']); ?>" />
				</label>
			</div>

			<div class="ac-grid__item">
				<label for="acautoloanplus-op_calculator_min_width_small">
					<?php _e('op_calculator_min_width_small', 'fc-auto-loan-calculator'); ?>:
					<input id="acautoloanplus-op_calculator_min_width_small" name="acautoloanplus-op_calculator_min_width_small" type="text" value="<?php echo esc_attr($options['op_calculator_min_width_small']); ?>" />
				</label>
			</div>

			<div class="ac-grid__item">
				<label for="acautoloanplus-op_calculator_max_width_small">
					<?php _e('op_calculator_max_width_small', 'fc-auto-loan-calculator'); ?>:
					<input id="acautoloanplus-op_calculator_max_width_small" name="acautoloanplus-op_calculator_max_width_small" type="text" value="<?php echo esc_attr($options['op_calculator_max_width_small']); ?>" />
				</label>
			</div>

			<div class="ac-grid__item">
				<label for="acautoloanplus-op_calculator_min_width_medium">
					<?php _e('op_calculator_min_width_medium', 'fc-auto-loan-calculator'); ?>:
					<input id="acautoloanplus-op_calculator_min_width_medium" name="acautoloanplus-op_calculator_min_width_medium" type="text" value="<?php echo esc_attr($options['op_calculator_min_width_medium']); ?>" />
				</label>
			</div>

			<div class="ac-grid__item">
				<label for="acautoloanplus-op_calculator_max_width_medium">
					<?php _e('op_calculator_max_width_medium', 'fc-auto-loan-calculator'); ?>:
					<input id="acautoloanplus-op_calculator_max_width_medium" name="acautoloanplus-op_calculator_max_width_medium" type="text" value="<?php echo esc_attr($options['op_calculator_max_width_medium']); ?>" />
				</label>
			</div>

			<div class="ac-grid__item">
				<label for="acautoloanplus-op_calculator_min_width_large">
					<?php _e('op_calculator_min_width_large', 'fc-auto-loan-calculator'); ?>:
					<input id="acautoloanplus-op_calculator_min_width_large" name="acautoloanplus-op_calculator_min_width_large" type="text" value="<?php echo esc_attr($options['op_calculator_min_width_large']); ?>" />
				</label>
			</div>

			<div class="ac-grid__item">
				<label for="acautoloanplus-op_calculator_max_width_large">
					<?php _e('op_calculator_max_width_large', 'fc-auto-loan-calculator'); ?>:
					<input id="acautoloanplus-op_calculator_max_width_large" name="acautoloanplus-op_calculator_max_width_large" type="text" value="<?php echo esc_attr($options['op_calculator_max_width_large']); ?>" />
				</label>
			</div>

		</div>
		<!-- end 2 column -->

	</div>

	<input type="hidden" id="acautoloanplus_opts" name="acautoloanplus_opts" value="<?php echo wp_create_nonce('acautoloanplus_ac_options'); ?>" />
<?php

} // fc_autoloan_show_admin_options()


/**
 * Function: fc_autoloan_register
 *
 * Registers the plugin to show in WordPress' admin's widget page.
 *
 * args: none
 * returns: nothing
 */
function fc_autoloan_register()
{
	$widget_ops = array('classname' => 'acautoloan_key', 'description' => __('AC Auto Loan Calculator by AccurateCalculators.com'));

	$name = __('AC Auto Loan Calculator Plugin');

	// Register WordPress Widgets for use in your themes sidebars.
	// You can also modify your theme and start Customizing Your Sidebar. 
	// wp_register_sidebar_widget($id, $name, $output_callback, $options, $params, ... ); 
	wp_register_sidebar_widget('fcautoloanplugin', $name, 'fc_autoloan_show_widget', $widget_ops);


	// Draws the controls form on the WordPress's widget page in admin area
	// and saves the settings when the "Save" button is clicked
	// Registers widget control callback for customizing options.
	// wp_register_widget_control( int|string $id, string $name, callable $control_callback, array $options = array() )
	wp_register_widget_control('fcautoloanplugin', $name, 'fc_autoloan_show_admin_options');
} // fc_autoloan_register


// Hooks a function on to a specific action.
add_action('widgets_init', 'fc_autoloan_register');

// Adds a hook for a shortcode tag.
// add_shortcode( 'fcloanplugin', 'show_fcloan_plugin' );
add_shortcode('fcautoloanplugin', 'show_fcautoloan_plugin');


/**
 * must declare the script an ES6 module
 */
function fc_autoloan_add_module_to_js($tag, $handle, $src)
{
	// Check if this is the handle for the script that needs the module type
	if ('fc-auto-loan-interface' === $handle) {
		// Add the type="module" attribute
		$tag = '<script type="module" src="' . esc_url($src) . '"></script>';
	}
	return $tag;
}
add_filter('script_loader_tag', 'fc_autoloan_add_module_to_js', 10, 3);


/**
 * Enqueue backend stylesheet for Appearance -> Widget page
 */
function fc_autoloan_admin_styles($hook)
{
	// Check if we're on the plugin's settings page.
	if ($hook != 'widgets.php') {
		return;
	}

	// Enqueue the custom stylesheet
	wp_enqueue_style('ac-plugin-admin-style', plugin_dir_url(__FILE__) . 'dist/css/admin-styles.css');
}
add_action('admin_enqueue_scripts', 'fc_autoloan_admin_styles');


// 08/22/24 Add a custom error message to the WordPress admin
// Admin notice not visible to user
// Register the admin notice
// add_action('admin_notices', 'fc_autoloan_show_error_messages');

/*
function fc_autoloan_show_error_messages() {
    global $pagenow;

		// Ensure this only runs on widget admin pages or where the widget is being displayed
    if ($pagenow == 'widgets.php' || $pagenow == 'customize.php') {
        $error_messages = get_transient('acautoloanplus_error_messages');

        if (!empty($error_messages)) {
            echo '<div class="notice notice-error"><ul>';
            foreach ($error_messages as $message) {
                echo '<li>' . esc_html($message) . '</li>';
            }
            echo '</ul></div>';

						// Clear the transient after displaying the message
            delete_transient('acautoloanplus_error_messages');
        }
    }
}
*/


/* end of file */