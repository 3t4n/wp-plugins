<?php

/**
 * Plugin Name: Date Time Picker for WPForms
 * Plugin URI: https://wpapplab.com/
 * Description: This plugin can be used to display date and time picker into WPForms text input field by using css class. This plugin specifically designed to work with WPForms. Other form plugins are not tested.
 * Version: 1.1.0
 * Author: Ruhul Amin
 * Author URI: https://mircode.com
 * Text Domain: walwpf-datetimepicker
 *
 * @package WAL Demo
 */

define('WALWPF_DTP_FILE', __FILE__);
define('WALWPF_DTP_BASE', plugin_basename(WALWPF_DTP_FILE));
define('WALWPF_DTP_DIR', plugin_dir_path(WALWPF_DTP_FILE));
define('WALWPF_DTP_URI', plugins_url('/', WALWPF_DTP_FILE));


// Load backend scripts
function walwpf_dtp_script_loader()
{

	wp_enqueue_script(
		'walwpf-datepicker-js',
		WALWPF_DTP_URI . 'assets/js/jquery.datetimepicker.full.min.js',
		array("jquery"),
		false,
		true
	);
	wp_enqueue_style(
		'walwpf-datepicker-css',
		WALWPF_DTP_URI . 'assets/css/jquery.datetimepicker.min.css',
		false,
		'1.0.0',
		'all'
	);

	wp_enqueue_script(
		'walwpf-datepicker',
		WALWPF_DTP_URI . 'assets/js/datetimepicker.js',
		array(
			'jquery', // make sure this only loads if jQuery has loaded
		),
		'1.0.0',
		true // Outputs this at footer
	); // Custom Child Theme jQuery
}

add_action('wp_enqueue_scripts', 'walwpf_dtp_script_loader');

add_filter('plugin_row_meta', 'walwpf_plugin_row_meta', 10, 2);

function walwpf_plugin_row_meta($links, $file)
{
	if (plugin_basename(__FILE__) == $file) {
		$row_meta = array(
			'walwpf_pro'    => '<a href="' . esc_url('https://wpapplab.com/plugins/date-time-picker-for-wpforms-pro/') . '" target="_blank" aria-label="' . esc_attr__('Date Time Picker Pro', 'walwpf-datetimepicker') . '" style="color:red;"><b>' . esc_html__('Get Pro Version', 'walwpf-datetimepicker') . '</b></a>'
		);

		return array_merge($links, $row_meta);
	}
	return (array) $links;
}
