<?php
/**
 * Meta box
 *
 * @package Aithenticate
 */

/**
 *  Meta box class
 */
class Aithenticate_Meta_Box {

	/**
	 * Output the meta box
	 *
	 * @param WP_Post $post Post.
	 * @return void
	 */
	public static function output( $post ) {
		wp_nonce_field( 'aithenticate_save_data', 'aithenticate_meta_nonce' );

		include __DIR__ . '/views/html-aithenticate.php';
	}

	/**
	 * Save the meta box data
	 *
	 * @param int     $post_id Post ID.
	 * @param WP_Post $post Post.
	 * @return void
	 */
	public static function save( $post_id, $post ) {
		// Check the nonce.
		if (
			empty( $_POST['aithenticate_meta_nonce'] ) ||
			! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['aithenticate_meta_nonce'] ) ), 'aithenticate_save_data' )
		) {
			return;
		}

		if (
			! empty( $_POST['content_type'] ) &&
			in_array( $_POST['content_type'], array( 'ai', 'human' ), true )
		) {
			update_post_meta( $post_id, '_content_type', sanitize_text_field( wp_unslash( $_POST['content_type'] ) ) );
		}

		$license_type = aithenticate_get_license_type();

		if ( 'unlimited' === $license_type || aithenticate_get_enabled_posts_count() < $license_type ) {
			update_post_meta( $post_id, '_aithenticate_enabled', ! empty( $_POST['aithenticate_enabled'] ) );
		}
	}

}
