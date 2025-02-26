<?php

/**
 * Handles the generation of alt text for a single image
 *
 * @link       https://alttextgo.com
 * @since      1.0.0
 * @package    ALTGOO
 * @subpackage ALTGOO/includes
 * @author     AltTextGo <support@alttextgo.com>
 */
class ALTGOO_Image_Editor {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
     */
    public function generate_alt_text_single(){
		// Check nounce
		check_ajax_referer( 'altgoo_generate_alt_text_single', 'security' );

		// Validation and sanitization for image_id
		if ( ! isset( $_REQUEST['image_id'] ) || empty( $_REQUEST['image_id'] ) || ! is_numeric( $_REQUEST['image_id'] ) ) {
			wp_send_json([
				'error_code' => 400
			]);
			return;
		}
		$image_id = sanitize_text_field( wp_unslash( $_REQUEST['image_id'] ) );

		// Validation and sanitization for image_url
		if ( ! isset( $_REQUEST['image_url'] ) || empty( $_REQUEST['image_url'] ) || ! is_string( $_REQUEST['image_url'] )) {
			wp_send_json([
				'error_code' => 400
			]);
			return;
		}
		$image_url = sanitize_text_field( wp_unslash( $_REQUEST['image_url'] ) );
		if (validate_file( $image_url ) > 0){
			wp_send_json([
				'error_code' => 400
			]);
			return;
		}

		// Validation and sanitization for keywords
		if ( ! isset( $_REQUEST['keywords'] ) || ! is_string( $_REQUEST['keywords'] ) ){
			wp_send_json([
				'error_code' => 400
			]);
			return;
		}
		$keywords = sanitize_text_field( wp_unslash( $_REQUEST['keywords'] ) );
		
		// check api key
		$api_key = get_option('altgoo_api_key');
		if ( empty( $api_key ) ) {
			wp_send_json([
				'error_code' => 401
			]);
		  	return;
		}
		$api = new ALTGOO_API( $api_key );

		$response = $api->generate_alt_text( $image_id, $image_url, $keywords);
		if (is_wp_error( $response )) {
			wp_send_json([
				'error_code' => $response->get_error_code()
			]);
		} else {
			wp_send_json([
				'alt_text' => $response['alt_text'],
				'credit_balance' => $response['credit_balance'],
			]);
		}
	}
}