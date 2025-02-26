<?php
/**
 * Plugin Name: Add LD Courses list in WC Account Page
 * Description: Add Learndash Courses list in WooCommerce Account Page.
 * Version: 1.0.0
 * Author: Sanjeev Aryal
 * Author URI: https://sanjeebaryal.com.np
 * Text Domain: wc-learndash-courses-list
 * Domain Path: /languages/
 *
 * @package    Add Learndash Courses list in WooCommerce Account Page
 * @author     Sanjeev Aryal
 * @link       https://github.com/sanzeeb3/wc-learndash-courses-list
 * @since      1.0.0
 * @license    GPL-3.0+
 */

defined( 'ABSPATH' ) || exit;
// Exit if accessed directly.

const WC_LEARNDASH_COURSES_LIST_FILE = __FILE__;

const WC_LEARNDASH_COURSES_LIST = '1.0.0';

add_action(
	'plugins_loaded',
	function() {

		// Return if WooCommerce is not installed.
		if ( ! defined( 'WC_VERSION' ) ) {
			return;
		}

		require_once __DIR__ . '/src/Plugin.php';

		return \WCLearnDashCoursesList\Plugin::hooks();
	}
);
