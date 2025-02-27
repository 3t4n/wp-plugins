<?php

namespace Codemanas\CmBlocks\Importer;

use WP_Error;

class ImageImporter {

	// Hold the class instance.
	private static $instance = null;

	// The constructor is private to prevent initiation with outer code.
	private function __construct() {
		// Include necessary files
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );
	}

	// The object is created from within the class itself only if the class has no instance.
	public static function get_instance() {
		if ( self::$instance == null ) {
			self::$instance = new ImageImporter();
		}

		return self::$instance;
	}

	public function get_attachment_url_by_meta($transformed_image_url) {
		$args = array(
			'post_type' => 'attachment',
			'post_status' => 'inherit',
			'posts_per_page' => 1,
			'meta_query' => array(
				array(
					'key' => 'cmblocks_image_url',
					'value' => $transformed_image_url,
				)
			)
		);

		$attachments = get_posts($args);

		if ($attachments) {
			// we found a match, return its URL
			return wp_get_attachment_url($attachments[0]->ID);
		} else {
			// no matches found
			return null;
		}
	}

	public function import_image( $image_url ) {
		if ( ! current_user_can( 'upload_files' ) || ! current_user_can( 'edit_posts' ) ) {
			return new WP_Error( 'permission_error', __( 'Insufficient permissions to upload files or edit posts.', 'cm-blocks' ) );
		}

		$parsed_url            = parse_url( $image_url );
		$transformed_image_url = str_replace( $parsed_url['scheme'] . '://' . $parsed_url['host'], site_url(), $image_url );

		// If image is already available in the media library, return its URL
		$found_attachment_url = $this->get_attachment_url_by_meta($transformed_image_url);
		if( $found_attachment_url ){
			return $found_attachment_url;
		}

		// Download the image and insert it into the post
		$media = media_sideload_image( $image_url, 0,null,'id' ); // Here we still use the original image url to download the image

		if ( is_wp_error( $media ) ) {
			return $media->get_error_message();
		} else {
			// Get the src attribute from the img tag which media_sideload_image() returns

			// Get the attachment URL
			$attachment_url = wp_get_attachment_url( $media );
			update_post_meta($media,'cmblocks_image_url', $transformed_image_url);

			return $attachment_url;
		}
	}
}
