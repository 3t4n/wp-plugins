<?php
/**
 * [Short description]
 *
 * @package    DEVRY\ACFC
 * @copyright  Copyright (c) 2025, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.0
 */

namespace DEVRY\ACFC;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

if ( ! class_exists( 'ACFC_Bulk_Delete' ) ) {

	class ACFC_Bulk_Delete {
		/**
		 * Consturtor.
		 */
		public function __construct() {
			// Add constructor content...
		}

		/**
		 * Initializor.
		 */
		public function init() {
			add_action( 'wp_loaded', array( $this, 'on_loaded' ) );
		}

		/**
		 * Plugin loaded.
		 */
		public function on_loaded() {
			add_action( 'wp_ajax_remove_selected_fields', array( $this, 'remove_selected_fields' ) );
		}

		/**
		 * Delete and remove selected fields from group with bulk select.
		 */
		public function remove_selected_fields() {
			$selected_field_keys = isset( $_REQUEST['selected_field_keys'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['selected_field_keys'] ) ) : '';

			$acfc_admin = new ACFC_Admin();

			if ( ! $selected_field_keys ) {
				$acfc_admin->print_json_message(
					0,
					__( 'Something went wrong!', 'acf-copilot' ),
				);
			}

			$selected_field_keys_arr = explode( ',', $selected_field_keys );

			foreach ( $selected_field_keys_arr as $field_key ) {
				acf_delete_field( trim( $field_key ) );
			}

			$acfc_admin->print_json_message(
				1,
				__( 'Selected fields key have been removed successfully!', 'acf-copilot' ),
			);
		}
	}

		// Initialize.
		$acfc_bulk_delete = new ACFC_Bulk_Delete();
		$acfc_bulk_delete->init();
}
