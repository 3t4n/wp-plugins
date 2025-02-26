<?php
/**
 * [Short Description]
 *
 * @package    DEVRY\ELEMSNR
 * @copyright  Copyright (c) 2024, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.3
 */

namespace DEVRY\ELEMSNR;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

if ( ! class_exists( 'ELEMSNR_Admin' ) ) {

	class ELEMSNR_Admin {
		/**
		 * Set a size limit for a single Elementor data page.
		 */
		public $data_size_limit;

		/**
		 * Main menu admin page based on the compact mode.
		 */
		public $admin_page;

		/**
		 * Consturtor.
		 */
		public function __construct() {
			$this->data_size_limit = 300;
			$this->admin_page      = ( ! get_option( 'elemsnr_compact_mode', '' ) ) ? 'admin.php?page=' : 'admin.php?page=';
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
		public function on_loaded() {}

		/**
		 * Return a response message in JSON format and exit.
		 */
		public function print_json_message( $status, $message, $values_arr = array(), $runtime = 0 ) {
			if ( $runtime > 0 ) {
				$message .= " (<em>executed in {$runtime}sec</em>)";
			}

			echo wp_json_encode(
				array(
					array(
						'status'  => $status,
						'message' => vsprintf(
							wp_kses(
								$message,
								json_decode( ELEMSNR_PLUGIN_ALLOWED_HTML_ARR, true )
							),
							$values_arr
						),
					),
				),
			);
			exit;
		}

		/**
		 * Check the validity of the nonce token for the plugin's AJAX requests.
		 */
		public function check_nonce_token() {
			if ( ! check_ajax_referer( 'elemsnr_ajax_nonce', '_wpnonce', false ) ) {
				return false;
			}

			return true;
		}

		/**
		 * Check if the nonce token is invalid; if so, print an
		 * error message with a support email link.
		 */
		public function get_invalid_nonce_token() {
			/* translators: %1$s is replaced with "Invalid security token" */
			/* translators: %2$s is replaced with "contact@domain.com" */
			$message    = esc_html__( '%1$s! Contact us @ %2$s.', 'search-replace-for-elementor' );
			$values_arr = array(
				'<strong>' . esc_html__( 'Invalid security token', 'search-replace-for-elementor' ) . '</strong>',
				'<a href="mailto:contact@' . ELEMSNR_PLUGIN_DOMAIN . '">contact@' . ELEMSNR_PLUGIN_DOMAIN . '</a>',
			);

			if ( ! $this->check_nonce_token() ) {
				$this->print_json_message(
					0,
					$message,
					$values_arr
				);
			}
		}

		/**
		 * Check if the current user has the necessary capability, typically for
		 * administrative tasks in the plugin.
		 */
		public function check_user_cap() {
			if ( ! current_user_can( 'administrator' ) ) {
				return false;
			}

			return true;
		}

		/**
		 * Check if the current user has the necessary capabilities;
		 * otherwise, print an error message.
		 */
		public function get_invalid_user_cap() {
			/* translators: %1$s is replaced with "Access denied" */
			$message    = esc_html__( '%1$s! The current user does not have the necessary capabilities to access this function.', 'search-replace-for-elementor' );
			$values_arr = array( '<strong>' . esc_html__( 'Access denied', 'search-replace-for-elementor' ) . '</strong>' );

			if ( ! $this->check_user_cap() ) {
				$this->print_json_message(
					0,
					$message,
					$values_arr
				);
			}
		}

		/**
		 * Display error if post id is empty.
		 */
		public function get_invalid_post_id( $current_post_id ) {
			/* translators: %1$s is replaced with link to support email */
			$message    = esc_html__( 'Post ID not found! Please contact the plugin author at %1$s.', 'search-replace-for-elementor' );
			$values_arr = array( '<a href="mailto:contact@' . ELEMSNR_PLUGIN_DOMAIN . '">contact@' . ELEMSNR_PLUGIN_DOMAIN . '</a>' );

			if ( ! $current_post_id ) {
				$this->print_json_message(
					0,
					$message,
					$values_arr
				);
			}
		}

		/**
		 * Display error if data size limit is exceeded.
		 */
		public function get_invalid_data_size_limit( $elementor_data_size ) {
			/* translators: %1$s is replaced with "data size limit" */
			$message    = esc_html__( 'Elementor page/post data exceeds the limit of %1$skb! You need upgrade to Pro if you need to do search and replace pages with a lot of content.', 'search-replace-for-elementor' );
			$values_arr = array( '<em>' . $this->data_size_limit . '</em>' );

			if ( $elementor_data_size > $this->data_size_limit ) {
				$this->print_json_message(
					0,
					$message,
					$values_arr
				);
			}
		}

		/**
		 * Display error if elementor data is empty.
		 */
		public function get_invalid_elementor_data( $elementor_data ) {
			/* translators: %1$s is replaced with "contact@domain.com" */
			$message    = esc_html__( 'Elementor data is empty! Add content to this page or contact us at %1$s.', 'search-replace-for-elementor' );
			$values_arr = array( '<a href="mailto:contact@' . ELEMSNR_PLUGIN_DOMAIN . '">contact@' . ELEMSNR_PLUGIN_DOMAIN . '</a>' );

			if ( empty( $elementor_data ) ) {
				$this->print_json_message(
					0,
					$message,
					$values_arr
				);
			}
		}
	}
}
