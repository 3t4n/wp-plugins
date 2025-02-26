<?php

namespace FIC\Featured_Image_Customizer;

! defined( ABSPATH ) || exit;

if ( ! class_exists( 'FIC_Create_Image' ) ) {

	class FIC_Create_Image extends Featured_Image_Customizer {

		public function __construct() {
			parent::__construct();
		}

		public function init() {
			add_action( 'wp_loaded', array( $this, 'on_loaded' ) );
		}

		public function on_loaded() {
			add_action( 'wp_ajax_create_featured_image', array( $this, 'create_featured_image' ) );
		}

		public function create_featured_image() {
			$post_id      = isset( $_REQUEST['post_id'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['post_id'] ) ) : '';
			$tmp_filepath = isset( $_REQUEST['tmp_filepath'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['tmp_filepath'] ) ) : '';
			$img_filename = isset( $_REQUEST['img_filename'] ) ? sanitize_file_name( wp_unslash( $_REQUEST['img_filename'] ) ) : '';

			// Upload tmp file to /uploads folder
			$uploads_dir     = wp_upload_dir();
			$img_contents    = file_get_contents( $tmp_filepath );
			$unique_filename = wp_unique_filename( $uploads_dir['path'], $img_filename );
			$filename        = basename( $unique_filename );
			$img_url         = $uploads_dir['url'] . '/' . $filename . '.jpg';

			if ( wp_mkdir_p( $uploads_dir['path'] ) ) {
				$file = $uploads_dir['path'] . '/' . $filename . '.jpg';
			} else {
				$file = $uploads_dir['basedir'] . '/' . $filename . '.jpg';
			}

			file_put_contents( $file, $img_contents );

			// Add featured image attachment into database
			$img_parts    = pathinfo( $img_url );
			$abs_filepath = str_replace( home_url( '/' ), ABSPATH, $img_url ); // absolute
			$rel_filepath = str_replace( $uploads_dir['basedir'], '/', $abs_filepath ); // relative

			$attachment = array(
				// basename
				'guid'           => $img_url,
				// extension
				'post_mime_type' => 'image/' . $img_parts['extension'],
				'post_title'     => sanitize_file_name( ucwords( str_replace( '-', ' ', $img_parts['filename'] ) ) ),
				'post_content'   => '',
				'post_status'    => 'inherit',
			);

			$attachment_id = wp_insert_attachment( $attachment, $rel_filepath, $post_id );

			if ( ! is_wp_error( $attachment_id ) ) {
				require_once ABSPATH . 'wp-admin/includes/image.php';
				require_once ABSPATH . 'wp-admin/includes/media.php';

				$attach_data = wp_generate_attachment_metadata( $attachment_id, $abs_filepath );

				wp_update_attachment_metadata( $attachment_id, $attach_data );

				set_post_thumbnail( $post_id, $attachment_id );
			}

			// Remove tmp file
			wp_delete_file( $tmp_filepath );

			exit;
		}
	}

	$fic = new FIC_Create_Image();
	$fic->init();
}
