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

if ( ! class_exists( 'ACFC_Bulk_Drag_Drop' ) ) {

	class ACFC_Bulk_Drag_Drop {
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
			add_action( 'wp_ajax_update_group_fields_order', array( $this, 'update_group_fields_order' ) );
		}

		/**
		 * Update ACF group fields order when we do bulk re-order.
		 */
		public function update_group_fields_order() {
			$fields_arr = isset( $_REQUEST['fields'] ) ? wp_unslash( $_REQUEST['fields'] ) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized

			if ( is_array( $fields_arr ) ) {
				$fields_arr = array_map( 'sanitize_text_field', $fields_arr );
			} else {
				$fields_arr = array(); // Ensure it's an array if input is invalid
			}

			$acfc_admin = new ACFC_Admin();

			if ( ! $fields_arr ) {
				$acfc_admin->print_json_message(
					0,
					__( 'Something went wrong!', 'acf-copilot' ),
				);
			}

			foreach ( $fields_arr as $field ) {
				if ( isset( $field['field_id'], $field['order'], $field['parent_id'] ) ) {
					$field_data = array(
						'ID'          => intval( $field['field_id'] ),
						'menu_order'  => intval( $field['order'] ),
						'post_parent' => intval( $field['parent_id'] ),
					);

					$update_result = wp_update_post( $field_data, true );

					if ( is_wp_error( $update_result ) ) {
						$acfc_admin->print_json_message(
							0,
							esc_html(
								sprintf(
									/* translators: %1$s is replaced with "field ID" */
									/* translators: %2$s is replaced with "error message" */
									__( 'Failed to update field: %1$s. Error: %2$s', 'acf-copilot' ),
									$field['field_id'],
									$update_result->get_error_message()
								)
							)
						);
					}
				} else {
					$acfc_admin->print_json_message(
						0,
						esc_html(
							sprintf(
								/* translators: %1$s is replaced with "fields array" */
								__( 'Missing field data: %1$s.', 'acf-copilot' ),
								wp_json_encode( $field, true )
							)
						)
					);
				}
			}

			$acfc_admin->print_json_message(
				1,
				__( 'Selected fields keys have been reordered successfully!', 'acf-copilot' ),
			);
		}
	}

	// Initialize.
	$acfc_bulk_darg_drop = new ACFC_Bulk_Drag_Drop();
	$acfc_bulk_darg_drop->init();
}
