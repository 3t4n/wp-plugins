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

if ( ! class_exists( 'ACFC_Custom_Help' ) ) {

	class ACFC_Custom_Help {
		// Usage and examples tab content.
		public $custom_help_tab = array();

		/**
		 * Consturtor.
		 */
		public function __construct() {
			$this->custom_help_tab = array(
				'acfc_help_screen' =>
				array(
					'title'   => __( 'Usage & Examples', 'acf-copilot' ),
					'content' => '<p>' . sprintf(
						wp_kses(
							__( 'Click the <strong>Help</strong> icon next to each type to view detailed <strong>Usage</strong> and <strong>Examples</strong> information.', 'acf-copilot' ),
							json_decode( ACFC_PLUGIN_ALLOWED_HTML_ARR )
						) . '</p>',
					),
				),
			);
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
					add_action( 'wp_ajax_display_custom_help_contents', array( $this, 'display_custom_help_contents' ) );
					add_action( "load-{$pagenow}", array( $this, 'add_custom_help_tab' ), 20 );
				}
			}

			if ( 'admin-ajax.php' === $pagenow ) {
				add_action( 'wp_ajax_display_custom_help_contents', array( $this, 'display_custom_help_contents' ) );
				add_action( "load-{$pagenow}", array( $this, 'add_custom_help_tab' ), 20 );
			}
		}

		/**
		 * Add custom Help tab.
		 */
		function add_custom_help_tab() {
			foreach ( $this->custom_help_tab as $id => $data ) {
				get_current_screen()->add_help_tab(
					array(
						'id'       => $id,
						'title'    => __( $data['title'], 'acf-copilot' ), // phpcs:ignore
						'content'  => '',
						'callback' => array( $this, 'prepare' ),
					)
				);
			}
		}

		function prepare( $screen, $tab ) {
			echo $tab['callback'][0]->custom_help_tab[ $tab['id'] ]['content']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		/**
		 * Display custom help content for usage and examples.
		 */
		function display_custom_help_contents() {
			$url        = sanitize_text_field( wp_unslash( $_REQUEST['url'] ?? '' ) );
			$field_type = sanitize_key( wp_unslash( $_REQUEST['field_type'] ?? '' ) );

			if ( empty( $url ) || empty( $field_type ) ) {
				wp_send_json_error( __( 'Invalid parameters provided.', 'acf-copilot' ), 400 );
			}

			$file_path = ACFC_PLUGIN_DIR_PATH . '/static/help/' . $field_type . '.tpl';

			if ( ! file_exists( $file_path ) ) {
				wp_send_json_error( __( 'Help file not found.', 'acf-copilot' ), 404 );
			}

			$response = wp_remote_get( $file_path );

			if ( ! is_wp_error( $response ) ) {
				$html = wp_remote_retrieve_body( $response );
			} else {
				$html = '';
			}

			$html .= sprintf(
				wp_kses(
					/* translators: %1$s link to Options page */
					__( '<p><hr /><em>Original and full help section content can be found on the Advanced Custom Fields website <a href="%s" target="_blank">here</a>.</em></p>', 'acf-copilot' ),
					json_decode( ACFC_PLUGIN_ALLOWED_HTML_ARR )
				),
				esc_url( $url )
			);

			wp_send_json_success( $html );
		}
	}

	// Initialize.
	$acfc_custom_help = new ACFC_Custom_Help();
	$acfc_custom_help->init();
}
