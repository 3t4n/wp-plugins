<?php
if ( !defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'grfwpAJAX' ) ) {
	/**
	 * Class to handle AJAX interactions for Good Reviews for WP
	 *
	 * @since 2.1.0
	 */
	class grfwpAJAX {

		public function __construct() {

			add_action( 'wp_ajax_grfwp_ajax_load_reviews', array( $this, 'load_reviews' ) );
			add_action( 'wp_ajax_nopriv_grfwp_ajax_load_reviews', array( $this, 'load_reviews' ) );

			// add_action( 'admin_init', array( $this, 'get_available_tables' ) );
		}

		/**
		 * Get reservations that are associated with the email address that was sent
		 * @since 2.1.0
		 */
		public function load_reviews() {
			global $grfwp_controller;

			$page = isset( $_REQUEST['next_page'] ) ? intval( $_REQUEST['next_page'] ) : 1;

			$args = array_merge(
				array(
					'paged' => $page
				), 
				isset( $_REQUEST['shortcode_arg'] ) ? $_REQUEST['shortcode_arg'] : []
			);

			$grfwp_controller->get_query_args( $args );

			$reviews = new WP_Query( $grfwp_controller->args );

			$output = '';
			foreach ( $reviews->posts as $review ) {

				$output .= grfwp_print_review( $review );
			}

			if ( ! empty( $output ) ) {
				wp_send_json_success(
					array(
						'output' => $output,
						'more_pages' => $reviews->max_num_pages <= $page ? false : true,
					)
				);
			}
			else {
				wp_send_json_error(
					array(
						'error' => 'noreviews',
						'msg' => __( 'No reviews were found.', 'good-reviews-wp' ),
					)
				);
			}

			die();
		}

	}
}