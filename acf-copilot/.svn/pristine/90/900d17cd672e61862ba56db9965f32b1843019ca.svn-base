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

if ( ! class_exists( 'ACFC_Code_Snippets' ) ) {

	class ACFC_Code_Snippets {
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
			global $pagenow;

			$post_id = absint( isset( $_GET['post'] ) ? $_GET['post'] : ( isset( $_POST['post_ID'] ) ? $_POST['post_ID'] : 0 ) );
			$post    = ( 0 !== $post_id ) ? get_post( $post_id ) : false;

			if ( in_array( $pagenow, array( 'post-new.php', 'post.php' ), true ) ) {
				if ( in_array( $post->post_type, array( 'acf-field-group' ), true ) ) {
					add_action( 'wp_ajax_display_code_snippets', array( $this, 'display_code_snippets' ) );
				}
			}

			if ( 'admin-ajax.php' === $pagenow ) {
				add_action( 'wp_ajax_display_code_snippets', array( $this, 'display_code_snippets' ) );
			}
		}

		/**
		 * Display quick code snippets for each field type.
		 */
		public function display_code_snippets() {
			$group_name = sanitize_key( wp_unslash( $_REQUEST['group_name'] ?? '' ) );
			$field_type = sanitize_key( wp_unslash( $_REQUEST['field_type'] ?? '' ) );
			$field_name = sanitize_key( wp_unslash( $_REQUEST['field_name'] ?? '' ) );

			if ( empty( $field_type ) ) {
				wp_send_json_error( __( 'Invalid parameters provided.', 'acf-copilot' ), 400 );
			}

			$file_path = ACFC_PLUGIN_DIR_PATH . '/static/snippets/' . $field_type . '.tpl';

			$custom_template_html = '';
			$acf_field_groups     = acf_get_field_groups();

			foreach ( $acf_field_groups as $field_group ) {
				if ( $field_group['key'] === $group_name ) {
					$fields = acf_get_fields( $field_group['key'] );
					foreach ( $fields as $field ) {
						if ( $field['name'] === $field_name ) {
							foreach ( $field as $name => $value ) {
								if ( strpos( $name, 'custom_template' ) !== false ) {
									$custom_template_html = $value;
								}
							}
						}
					}
				}
			}

			if ( ! file_exists( $file_path ) ) {
				wp_send_json_error( __( 'Code snippet file not found.', 'acf-copilot' ), 404 );
			}

			$response = wp_remote_get( $file_path );

			if ( ! is_wp_error( $response ) ) {
				$html = wp_remote_retrieve_body( $response );
			} else {
				$html = '';
			}

			if ( $custom_template_html ) {
				$html .= '<pre><code class="language-php">' . htmlspecialchars( $custom_template_html ) . '</code></pre></div></div>';
			} else {
				$html .= '<pre><code class="language-php">No custom template found.</code></pre></div></div>';
			}

			wp_send_json_success( $html );
		}
	}

	// Initialize.
	$acfc_code_snippets = new ACFC_Code_Snippets();
	$acfc_code_snippets->init();
}


