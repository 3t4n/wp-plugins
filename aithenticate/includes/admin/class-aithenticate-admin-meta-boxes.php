<?php
/**
 * Admin meta boxes
 *
 * @package Aithenticate
 */

/**
 * Admin meta boxes class
 */
class Aithenticate_Admin_Meta_Boxes {

	/**
	 * Initialize
	 *
	 * @return void
	 */
	public static function init() {
		$self = new self();

		add_action( 'add_meta_boxes', array( $self, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $self, 'save_meta_boxes' ), 10, 2 );

		foreach ( aithenticate_get_supported_post_types() as $post_type ) {
			add_action( 'aithenticate_process_' . $post_type->name . '_meta', 'Aithenticate_Meta_Box::save', 10, 2 );
		}
	}

	/**
	 * Add the meta boxes
	 *
	 * @return void
	 */
	public function add_meta_boxes() {
		if ( aithenticate_has_valid_license_and_email() ) {
			add_meta_box( 'aithenticate', __( 'Aithenticate', 'aithenticate' ), 'Aithenticate_Meta_Box::output', array_column( aithenticate_get_supported_post_types(), 'name' ), 'side', 'high' );
		}
	}

	/**
	 * Check if saving is allowed, and if so trigger an action.
	 *
	 * @param int     $post_id Post ID.
	 * @param WP_Post $post Post.
	 * @return void
	 */
	public function save_meta_boxes( $post_id, $post ) {
		$post_id = absint( $post_id );

		// $post_id and $post are required
		if ( empty( $post_id ) || empty( $post ) ) {
			return;
		}

		// Dont save meta boxes for revisions or autosaves.
		if ( defined( 'DOING_AUTOSAVE' ) || is_int( wp_is_post_revision( $post ) ) || is_int( wp_is_post_autosave( $post ) ) ) {
			return;
		}

		// Check the nonce.
		if (
			empty( $_POST['aithenticate_meta_nonce'] ) ||
			! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['aithenticate_meta_nonce'] ) ), 'aithenticate_save_data' )
		) {
			return;
		}

		// Check user has permission to edit.
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		do_action( 'aithenticate_process_' . $post->post_type . '_meta', $post_id, $post );
	}

}
