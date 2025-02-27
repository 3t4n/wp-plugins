<?php

/**
 * Admin setup for the plugin
 *
 * @since 1.0
 * @function	tswchc_add_menu_links()		Add admin menu pages
 * @function	tswchc_register_settings	Register Settings
 * @function	tswchc_validater_and_sanitizer()	Validate And Sanitize User Input Before Its Saved To Database
 * @function	tswchc_get_settings()		Get settings from database
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;


/**
 * Register Settings
 *
 * @since 1.0
 */
function tswchc_register_settings() {

	// Register Setting
	register_setting('tswchc_settings_group', 'tswchc_rules');
	register_setting('tswchc_settings_group', 'tswchc_redirect_url');
	register_setting('tswchc_settings_group', 'tswchc_redirect_mode');
	register_setting('tswchc_settings_group', 'tswchc_display_custom_message');
	register_setting('tswchc_settings_group', 'tswchc_message_wrapper');
	register_setting('tswchc_settings_group', 'tswchc_message_styles');

	// General Settings
	add_settings_field(
		'tswchc_general_settings_field',					// ID
		__('General Settings', 'ts-wchc'),					// Title
		'tswchc_general_settings_field_callback',			// Callback function
		'ts-wchc',											// Page slug
		'tswchc_general_settings_section'					// Settings Section ID
	);
}
add_action('admin_init', 'tswchc_register_settings');

/**
 * Validate and sanitize user input before its saved to database
 *
 * @since 1.0
 */
function tswchc_validater_and_sanitizer($settings) {

	// Sanitize text field
	$settings['text_input'] = sanitize_text_field($settings['text_input']);

	return $settings;
}

/**
 * Get settings from database
 *
 * @return	Array	A merged array of default and settings saved in database.
 *
 * @since 1.0
 */
function tswchc_get_settings() {

	$defaults = array(
		'tswchc_rules' => '',
		'tswchc_redirect_url' => get_permalink(wc_get_page_id('shop')),
	);

	$settings = get_option('tswchc_settings', $defaults);

	return $settings;
}

/**
 * Enqueue Admin CSS and JS
 *
 * @since 1.0
 */
function tswchc_enqueue_css_js($hook) {

	// Load only on Hide Category by User Role for WooCommerce Plugin plugin pages
	if ($hook != "toplevel_page_ts-wchc") {
		return;
	}

	// Enqueue wp-i18n for JavaScript translations
	wp_enqueue_script('wp-i18n');

	// Include Bootstrap
	wp_enqueue_style('ts-wchc-bootstrap_css', TSWCHC_PLUGIN_URL .  'assets/css/bootstrap.min.css');
	wp_enqueue_script('ts-wchc-bootstrap_js', TSWCHC_PLUGIN_URL .  'assets/js/bootstrap.bundle.min.js', array(), '20151215', false);

	// Set script data for AJAX calls
	$script_data_array = array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'nonce' => wp_create_nonce('tswchc-nonce'),
	);

	// Localize the script with additional data and translations
	$translation_array = array(
		'hidden_for_role' => __('Hidden for %d Role', 'ts-wchc'),
		'hidden_for_roles' => __('Hidden for %d Roles', 'ts-wchc'),
		'hidden_category' => _n('%d Hidden Category', '%d Hidden Categories', 1, 'ts-wchc'),
		'hidden_categories' => _n('%d Hidden Category', '%d Hidden Categories', 2, 'ts-wchc'),
		'download_link_text' => __('Download Settings', 'ts-wchc'),
		'reloading_page' => __('Reloading the page...', 'ts-wchc')
	);

	// Set translations for JavaScript files
	wp_set_script_translations(
		'ts-wchc-admin-main-js', // Handle for the main JS file
		'ts-wchc',               // Text domain
		plugin_dir_path(__FILE__) . 'languages' // Path to the languages directory
	);

	// Register the main JS script
	wp_register_script('ts-wchc-admin-main-js', TSWCHC_PLUGIN_URL . 'assets/js/plugin_scripts.js', array('jquery', 'wp-i18n'), time(), true);

	// Localize the script with additional data
	wp_localize_script('ts-wchc-admin-main-js', 'tswchc_ajax_object', $script_data_array);

	// Add translation strings to the localized object
	wp_localize_script('ts-wchc-admin-main-js', 'tswchc_translations', $translation_array);

	// Enqueue the script
	wp_enqueue_script('ts-wchc-admin-main-js');

	// Load plugin textdomain for translation handling
	load_plugin_textdomain('ts-wchc', false, dirname(plugin_basename(__FILE__)) . '/languages');

	// Main CSS
	wp_enqueue_style('ts-wchc-admin-main-css', TSWCHC_PLUGIN_URL . 'assets/css/plugin_style.css', '', TSWCHC_VERSION_NUM);
}

add_action('admin_enqueue_scripts', 'tswchc_enqueue_css_js');

// Dequeues theme stylesheets for the plugin's options page
function tswchc_dequeue_theme_styles_for_plugin_options_page() {
	global $pagenow;

	// Check if it's your plugin's options page
	if ($pagenow === 'admin.php' && isset($_GET['page']) && $_GET['page'] === 'ts-wchc') {
		// Get enqueued styles
		global $wp_styles;

		// Iterate through styles and dequeue if loaded from theme directory
		foreach ($wp_styles->registered as $style) {
			if (strpos($style->src, '/wp-content/themes/') !== false) {
				wp_dequeue_style($style->handle);
			}
		}
	}
}
add_action('admin_enqueue_scripts', 'tswchc_dequeue_theme_styles_for_plugin_options_page', 999);

// Displays an admin notice when settings are updated on the plugin's options page
function tswchc_general_admin_notice() {

	// Check if the current URL query string indicates settings were updated on the plugin's options page
	if ($_SERVER['QUERY_STRING'] == "page=ts-wchc&settings-updated=true") {
		echo '<div class="alert alert-warning notice  d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg><div>' . __('Your rules were successfully saved! You may need to clear the site/server cache in order to display the changes on your site.', 'ts-wchc') . '</div>
            </div>';
	}
}
