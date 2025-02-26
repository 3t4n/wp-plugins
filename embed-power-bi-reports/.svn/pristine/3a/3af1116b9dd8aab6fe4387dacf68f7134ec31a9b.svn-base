<?php
/**
 * Handles powerBI settings Configurations.
 *
 * @package embed-power-bi-reports\Controller
 */

namespace MoEmbedPowerBI\Controller;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use MoEmbedPowerBI\Wrappers\wpWrapper;

/**
 * Class to handle all the functionalitites related to Power BI Settings Config tab.
 */
class powerBIsettingsConfig {

	/**
	 * Holds the Power BI Settings Config class instance.
	 *
	 * @var Power_BI_Settings_Config
	 */
	private static $instance;

	/**
	 * Object instance(Power BI Settings Config) getter method.
	 *
	 * @return Power_BI_Settings_Config
	 */
	public static function get_controller() {
		if ( ! isset( self::$instance ) ) {
			$class          = __CLASS__;
			self::$instance = new $class();
		}
		return self::$instance;
	}

	/**
	 * Function to call the other functions according to the form submitted.
	 *
	 * @param mixed $option Has the option value sent from the form submitted.
	 * @return void
	 */
	public function mo_epbr_save_settings( $option ) {
		// $option = sanitize_text_field($_POST['option']);
		switch ( $option ) {
			case 'mo_epbr_report_settings':
				$this->mo_epbr_update_report_settings();
		}
	}

	/**
	 * Function to update the report settings in database.
	 *
	 * @return void
	 */
	private function mo_epbr_update_report_settings() {
		check_admin_referer( 'mo_epbr_report_settings' );
		if ( isset( $_POST['mo_epbr_add_filters_pane'] ) && 'on' === $_POST['mo_epbr_add_filters_pane'] ) {
			wpWrapper::mo_epbr_set_option( 'mo_epbr_add_filters_pane', true );
		} else {
			wpWrapper::mo_epbr_set_option( 'mo_epbr_add_filters_pane', false );
		}
		if ( isset( $_POST['mo_epbr_add_page_navigation'] ) && 'on' === $_POST['mo_epbr_add_page_navigation'] ) {
			wpWrapper::mo_epbr_set_option( 'mo_epbr_add_page_navigation', true );
		} else {
			wpWrapper::mo_epbr_set_option( 'mo_epbr_add_page_navigation', false );
		}
		if ( isset( $_POST['languages'] ) ) {
			$selected_language = sanitize_text_field( wp_unslash( $_POST['languages'] ) );
			wpWrapper::mo_epbr_set_option( 'mo_epbr_selected_language_for_embed', $selected_language );
		}
		if ( isset( $_POST['localelanguages'] ) ) {
			$selected_locale = sanitize_text_field( wp_unslash( $_POST['localelanguages'] ) );
			wpWrapper::mo_epbr_set_option( 'mo_epbr_selected_locale_language_for_embed', $selected_locale );
		}
		if ( isset( $_POST['embed_mobile_height'] ) ) {
			$mobile_height = sanitize_text_field( wp_unslash( $_POST['embed_mobile_height'] ) );
			wpWrapper::mo_epbr_set_option( 'mo_epbr_embed_mobile_height', $mobile_height );
		}
		if ( isset( $_POST['embed_mobile_width'] ) ) {
			$mobile_width = sanitize_text_field( wp_unslash( $_POST['embed_mobile_width'] ) );
			wpWrapper::mo_epbr_set_option( 'mo_epbr_embed_mobile_width', $mobile_width );
		}
		if ( isset( $_POST['embed_mobile_breakpoint'] ) ) {
			$breakpoint = sanitize_text_field( wp_unslash( $_POST['embed_mobile_breakpoint'] ) );
			wpWrapper::mo_epbr_set_option( 'mo_epbr_mobile_display_breakpoint', $breakpoint );
		}
		wpWrapper::mo_epbr__show_success_notice( 'Settings Updated Successfully.' );
	}
}
