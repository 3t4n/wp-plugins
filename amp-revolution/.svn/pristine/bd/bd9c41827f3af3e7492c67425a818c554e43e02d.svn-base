<?php
if ( ! class_exists( 'ARSCP_Comments_Handler' ) ) {
	class ARSCP_Comments_Handler {

		public function __construct() {
			add_action( 'wp_ajax_amp_comment_submit', array( $this, 'amp_comment_submit' ), 5 );
			add_action( 'wp_ajax_nopriv_amp_comment_submit', array( $this, 'amp_comment_submit' ), 5 );
		}

		function amp_comment_submit() {
			$comment = wp_handle_comment_submission( wp_unslash( $_POST ) );
			if ( is_wp_error( $comment ) ) {
				$data = intval( $comment->get_error_data() );
				if ( ! empty( $data ) ) {
					status_header( 500 );
					wp_send_json( array(
						'msg'       => $comment->get_error_message(),
						'response'  => $data,
						'back_link' => true
					) );
				}
			} else {
				@header( "Content-type: application/json" );
				//@header('AMP-Redirect-To: '. get_permalink($_POST['comment_post_ID']));
				@header( 'AMP-Access-Control-Allow-Source-Origin: ' . $_REQUEST['__amp_source_origin'] );
				wp_send_json( array( 'success' => true ) );
			}

		}
	}
}
