<?php
defined( 'ABSPATH' ) or die();
require_once( WL_AGM_LITE_PLUGIN_DIR_PATH . 'admin/inc/helpers/WL_AGM_LITE_Helper.php' );

class WL_AGM_LITE_Setting {
	/* Register settings */
	public static function register_settings() {
		if ( ! wp_verify_nonce( $_REQUEST['wl_agm_setting_options'], 'wl_agm_save_settings' ) ) {
			die();
		}

		$wl_agm_gmap_api  = isset( $_POST['wl_agm_gmap_api'] ) ? sanitize_text_field( $_POST['wl_agm_gmap_api'] ) : '';
		$wl_agm_gmap_lang = isset( $_POST['wl_agm_gmap_lang'] ) ? sanitize_text_field( $_POST['wl_agm_gmap_lang'] ) : '';

		$language_array = WL_AGM_LITE_Helper::get_map_language_option_array();
		if ( ! in_array( $wl_agm_gmap_lang, array_keys( $language_array ) ) ) {
			$wl_agm_gmap_lang = 'en';
		}

		/* validations */
		$errors = [];
		if ( empty ( $wl_agm_gmap_api ) ) {
			$errors['wl_agm_gmap_api'] = esc_html__( 'Please enter Google Api Key', WL_AGM_LITE_DOMAIN );
		}
		if ( empty ( $wl_agm_gmap_lang ) ) {
			$errors['wl_agm_gmap_lang'] = esc_html__( 'Please Select Language', WL_AGM_LITE_DOMAIN );
		}
		/* End validations */

		if ( count( $errors ) < 1 ) {
			$wl_agm_settings_data = array(
				'wl_agm_gmap_api'  => $wl_agm_gmap_api,
				'wl_agm_gmap_lang' => $wl_agm_gmap_lang,
			);

			update_option( 'wl_agm_settings_data', $wl_agm_settings_data );
			wp_send_json_success( array( 'message' => esc_html__( 'Settings updated successfully', WL_AGM_LITE_DOMAIN ) ) );
		}
		wp_send_json_error( $errors );
	}
}
