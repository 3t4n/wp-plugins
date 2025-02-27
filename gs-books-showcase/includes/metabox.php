<?php

namespace GS_BOOKS;

use function GS_BOOKS_PRO\is_pro_valid;

defined( 'ABSPATH' ) || exit;

/**
 * Responsible for handling plugins meta boxes.
 *
 * @since 1.2.11
 */
class MetaBox {

	/**
	 * Class constructor.
	 *
	 * @since 1.2.11
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	/**
	 * Adds a box to the main column on the post and page edit screens.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function add_meta_box() {

		add_meta_box( 'gs-book-information', __( 'Book Information', 'gsbookshowcase' ), array( $this, 'book_information' ), 'gs_bookshowcase', 'normal', 'high' );

		add_meta_box( 'gs-book-gallery', __( 'Book Gallery', 'gsbookshowcase' ), array( $this, 'book_gallery' ), 'gs_bookshowcase', 'normal', 'high' );

		add_meta_box( 'gs-book-stores', __( 'Book Stores', 'gsbookshowcase' ), array( $this, 'book_stores' ), 'gs_bookshowcase', 'normal', 'high' );
		
		add_meta_box( 'gs-book-formats', __( 'Book Formats', 'gsbookshowcase' ), array( $this, 'book_formats' ), 'gs_bookshowcase', 'normal', 'high' );

	}

	/**
	 * Displays the Basic Information
	 *
	 * @since 1.2.11
	 *
	 * @return void
	 */
	public function book_information() {
		if ( is_pro_active() && is_pro_valid() ) {
			require_once GS_BOOKS_PRO_PLUGIN_DIR . 'includes/meta-fields/information.php';
		} else {
			require_once GS_BOOKS_PLUGIN_DIR . 'includes/meta-fields/information.php';
		}
	}

	/**
	 * Displays the Book Gallery
	 *
	 * @since 1.2.11
	 *
	 * @return void
	 */
	public function book_gallery() {

		wp_nonce_field( 'gs_bookshowcase_nonce_name', 'gs_bookshowcase_token' );

		if ( is_pro_active() && is_pro_valid() ) {
			require_once GS_BOOKS_PRO_PLUGIN_DIR . 'includes/meta-fields/gallery.php';
		} else {
			require_once GS_BOOKS_PLUGIN_DIR . 'includes/meta-fields/gallery.php';
		}
	}

	/**
	 * Displays the Book Stores
	 * 
	 * @since 1.2.11
	 * 
	 * @return void
	 */
	public function book_stores() {
		if ( is_pro_active() && is_pro_valid() ) {
			require_once GS_BOOKS_PRO_PLUGIN_DIR . 'includes/meta-fields/stores.php';
		} else {
			require_once GS_BOOKS_PLUGIN_DIR . 'includes/meta-fields/stores.php';
		}
	}

	/**
	 * Displays the Book Formats
	 * 
	 * @since 1.2.11
	 * 
	 * @return void
	 */
	public function book_formats() {
		if ( is_pro_active() && is_pro_valid() ) {
			require_once GS_BOOKS_PRO_PLUGIN_DIR . 'includes/meta-fields/formats.php';
		} else {
			require_once GS_BOOKS_PLUGIN_DIR . 'includes/meta-fields/formats.php';
		}
	}

	/**
	 * When the post is saved, saves our custom data.
	 *
	 * @since 1.2.11
	 *
	 * @param  int $post_id The ID of the post being saved.
	 * @return void
	 */
	public function save( $post_id ) {

		if ( ! isset( $_POST['gs_bookshowcase_token'] ) || ! wp_verify_nonce( $_POST['gs_bookshowcase_token'], 'gs_bookshowcase_nonce_name' ) ) return;
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if ( ! current_user_can( 'edit_post', $post_id ) ) return;

		// Sanitize user input.
		$gsbks_publish_data           = sanitize_text_field( isset( $_POST['gsbks_publish'] ) ? $_POST['gsbks_publish'] : '' );
		$gsbks_isbn_ten_data          = sanitize_text_field( isset( $_POST['gsbks_isbn_10'] ) ? $_POST['gsbks_isbn_10'] : '' );
		$gsbks_isbn_thirteen_data     = sanitize_text_field( isset( $_POST['gsbks_isbn_13'] ) ? $_POST['gsbks_isbn_13'] : '' );
		$gsbks_pages_data             = sanitize_text_field( isset( $_POST['gsbks_pages'] ) ? $_POST['gsbks_pages'] : '' );
		$gsbks_dimension_data         = sanitize_text_field( isset( $_POST['gsbks_dimension'] ) ? $_POST['gsbks_dimension'] : '' );
		$gsbks_fsize_data             = sanitize_text_field( isset( $_POST['gsbks_fsize'] ) ? $_POST['gsbks_fsize'] : '' );
		$gsbks_url_data               = sanitize_text_field( isset( $_POST['gsbks_url'] ) ? $_POST['gsbks_url'] : '' );

		// Update the meta field in the database.
		$meta_data = array(
			'_gsbks_publish'          => $gsbks_publish_data,
			'_gsbks_isbn_ten'         => $gsbks_isbn_ten_data,
			'_gsbks_isbn_thirteen'    => $gsbks_isbn_thirteen_data,
			'_gsbks_pages'            => $gsbks_pages_data,
			'_gsbks_dimension'        => $gsbks_dimension_data,
			'_gsbks_fsize'            => $gsbks_fsize_data,
			'_gsbks_url'              => $gsbks_url_data,
		);

		foreach ( $meta_data as $meta_key => $meta_value ) {
			update_post_meta( $post_id, $meta_key, $meta_value );
		}

	}

}
