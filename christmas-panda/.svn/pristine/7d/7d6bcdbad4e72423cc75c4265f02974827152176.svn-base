<?php
/**
 *
 * Main controller
 *
 * @package christmas-panda
 * @subpackage _controllers
 * @since Christmas Panda 1.0.0
 */

namespace PixChristmasPanda\Controllers;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

require_once PIX_CHR_PAN_PATH . '_models/cp-main.php';
use PixChristmasPanda\Models\Main as PixChristmasPanMainModel;

/**
 * Class Christmas Panda Controller
 *
 * @category Controller
 * @package  christmas-panda
 * @author  IV | PIXOLETTE
 * @license  http://wp.pixollete.com
 * @link     http://wp.pixollete.com
 */
class Main {

	/**
	 *
	 * Init function.
	 */
	function init_backend() {
		// Init model to retrive stored options data.
		$cp_model = new PixChristmasPanMainModel();
		$cp_options = json_decode( $cp_model->options_data );

		if ( isset( $_GET['section'] ) ) {
			$tab_section = $_GET['section'];
		} else {
			$tab_section = 'general';
		}

		if ( isset( $_POST['pix-cp-section'] ) ) {
			$errors = false;
			switch ( $_POST['pix-cp-section'] ) {
				case 'pix-cp-general':
					if ( in_array( $_POST['px_cp_is_active'], array( 'yes', 'no' ) ) ) {
						$data['px_cp_is_active'] = sanitize_text_field( $_POST['px_cp_is_active'] );
					} else {
						$errors['px_cp_is_active'] = esc_html( __( 'Invalid type', 'christmas-panda' ) );
					}
					if ( intval( $_POST['px_cp_display_type'] ) && in_array( $_POST['px_cp_display_type'], array( '1', '2', '3', '4', '5', '6', '7', '8', '9' ) ) ) {
						$data['px_cp_display_type'] = sanitize_text_field( $_POST['px_cp_display_type'] );
					} else {
						$errors['px_cp_display_type'] = esc_html( __( 'Invalid type', 'christmas-panda' ) );
					}
					if ( in_array( $_POST['px_cp_display_position'], array( 'bottom', 'top' ) ) ) {
						$data['px_cp_display_position'] = sanitize_text_field( $_POST['px_cp_display_position'] );
					} else {
						$errors['px_cp_display_position'] = esc_html( __( 'Invalid type', 'christmas-panda' ) );
					}
					if ( in_array( $_POST['px_cp_is_fixed'], array( 'yes', 'no' ) ) ) {
						$data['px_cp_is_fixed'] = sanitize_text_field( $_POST['px_cp_is_fixed'] );
					} else {
						$errors['px_cp_is_fixed'] = esc_html( __( 'Invalid type', 'christmas-panda' ) );
					}
					$data['px_cp_snowfall'] = $cp_options->px_cp_snowfall;

					$data['px_cp_display_popup'] = $cp_options->px_cp_display_popup;
					$data['px_cp_popup_type'] = $cp_options->px_cp_popup_type;
					$data['px_cp_popup_position'] = $cp_options->px_cp_popup_position;
					break;
				case 'pix-cp-snowfall':
					if ( in_array( $_POST['px_cp_snowfall'], array( 'yes', 'no' ) ) ) {
						$data['px_cp_snowfall'] = sanitize_text_field( $_POST['px_cp_snowfall'] );
					} else {
						$errors['px_cp_snowfall'] = esc_html( __( 'Invalid type', 'christmas-panda' ) );
					}
					$data['px_cp_display_type'] = $cp_options->px_cp_display_type;
					$data['px_cp_is_active'] = $cp_options->px_cp_is_active;
					$data['px_cp_display_position'] = $cp_options->px_cp_display_position;
					$data['px_cp_is_fixed'] = $cp_options->px_cp_is_fixed;

					$data['px_cp_display_popup'] = $cp_options->px_cp_display_popup;
					$data['px_cp_popup_type'] = $cp_options->px_cp_popup_type;
					$data['px_cp_popup_position'] = $cp_options->px_cp_popup_position;
					break;
				case 'pix-cp-popups':
					if ( in_array( $_POST['px_cp_display_popup'], array( 'yes', 'no' ) ) ) {
						$data['px_cp_display_popup'] = sanitize_text_field( $_POST['px_cp_display_popup'] );
					} else {
						$errors['px_cp_display_popup'] = esc_html( __( 'Invalid type', 'christmas-panda' ) );
					}
					if ( intval( $_POST['px_cp_popup_type'] ) && 25 > $_POST['px_cp_popup_type'] && 0 < $_POST['px_cp_popup_type'] ) {
						$data['px_cp_popup_type'] = sanitize_text_field( $_POST['px_cp_popup_type'] );
					} else {
						$errors['px_cp_popup_type'] = esc_html( __( 'Invalid type', 'christmas-panda' ) );
					}
					if ( in_array( $_POST['px_cp_popup_position'], array( 'right', 'left' ) ) ) {
						$data['px_cp_popup_position'] = sanitize_text_field( $_POST['px_cp_popup_position'] );
					} else {
						$errors['px_cp_popup_position'] = esc_html( __( 'Invalid type', 'christmas-panda' ) );
					}

					$data['px_cp_display_type'] = $cp_options->px_cp_display_type;
					$data['px_cp_is_active'] = $cp_options->px_cp_is_active;
					$data['px_cp_display_position'] = $cp_options->px_cp_display_position;
					$data['px_cp_is_fixed'] = $cp_options->px_cp_is_fixed;

					$data['px_cp_snowfall'] = $cp_options->px_cp_snowfall;
					break;
			}
			if ( ! $errors ) {
				$cp_model->save_options( $data );
				$cp_model->init();
				$cp_options = json_decode( $cp_model->options_data );
			}
		}
		include PIX_CHR_PAN_PATH . '_views/cp-backend.php';
	}

}
