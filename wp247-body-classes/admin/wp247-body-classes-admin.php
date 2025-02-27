<?php
/*
	Program: WP247 Body Classes Administration Functions
	Version: 2.0
	Author: Wes Cleveland
	Author URI: http://wp247.us/
	Uses: weDevs Settings API wrapper class from http://tareq.weDevs.com Tareq's Planet
*/

// Don't allow direct execution
defined( 'ABSPATH' ) or die ( 'Forbidden' );

if ( !class_exists( 'WP247_body_classes_settings' ) )
{

	define( 'WP247_BODY_CLASSES_PLUGIN_ADMIN_PATH', plugin_dir_path( __FILE__ ) );

	require_once WP247_BODY_CLASSES_PLUGIN_ADMIN_PATH . 'wp247-settings-api/wp247-settings-api.php';

/* Skip namespace usage due to errors
	class WP247_body_classes_settings extends \wp247sapi\WP247_settings_API
*/
	class WP247_body_classes_settings extends WP247_settings_API_2
	{

		/**
		 * Class Constructor
		 *
		 * @return void
		 */
		function __construct()
		{
			parent::__construct();
		}

		/**
		 * Returns Admin Menu
		 *
		 * @return array settings sections
		 */
		function get_settings_admin_menu()
		{
			require_once WP247_BODY_CLASSES_PLUGIN_ADMIN_PATH . 'wp247-body-classes-admin-menu.php';
			return wp247_body_classes_admin_menu();
		}

		/**
		 * Returns all the settings sections
		 *
		 * @return array settings sections
		 */
		function get_settings_sections()
		{
			global $wp247_mobile_detect;
			require_once WP247_BODY_CLASSES_PLUGIN_ADMIN_PATH . 'wp247-body-classes-admin-sections.php';
			return wp247_body_classes_admin_sections();
		}

		/**
		 * Returns all the settings fields
		 *
		 * @return array settings fields
		 */
		function get_settings_fields()
		{
			global $wp247_mobile_detect;
			require_once WP247_BODY_CLASSES_PLUGIN_ADMIN_PATH . 'wp247-body-classes-admin-fields.php';
			return wp247_body_classes_admin_fields();
		}

		/**
		 * Returns all the settings infobar
		 *
		 * @return array settings infobar
		 */
		function get_settings_infobar()
		{
			global $wp247_mobile_detect;
			require_once WP247_BODY_CLASSES_PLUGIN_ADMIN_PATH . 'wp247-body-classes-admin-infobar.php';
			return wp247_body_classes_admin_infobar();
		}

		/**
		 * Returns the infobar width
		 *
		 * @return integer infobar width
		 */
		function get_infobar_width()
		{
			require_once WP247_BODY_CLASSES_PLUGIN_ADMIN_PATH . 'wp247-body-classes-admin-infobar.php';
			return wp247_body_classes_admin_infobar_width();
		}

		/**
		 * Enqueue scripts and styles
		 */
		function enqueue_scripts()
		{
//			wp_enqueue_style( 'wp247-body-classes-admin-styles', plugins_url( 'wp247-body-classes-admin.css', __FILE__ ) );
		}

		/**
		 * Returns the head scripts and styles
		 *
		 * @return string head scripts and styles
		 * @return array  head scripts and styles
		 */
		function get_head_scripts()
		{
			return array();
		}

	}

	$wp247_body_classes_settings = new WP247_body_classes_settings();
}