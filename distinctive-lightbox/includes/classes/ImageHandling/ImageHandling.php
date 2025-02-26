<?php // phpcs:ignore

namespace DistinctiveLightbox\ImageHandling;

use \DistinctiveLightbox\DistinctiveLightbox as DistinctiveLightbox;

/**
 * SettingsPage - Class for handling settings
 */
class ImageHandling {

	/**
	 * Constructor.
	 */
	public function __construct() {

	}

	/**
	 * Search the_content and have a crack at grabbing the media details.
	 *
	 * @param  object $content Post content
	 * @return object          Modified content.
	 */
	public function prepare_inline_images( $content ) {

		// Check if we want to try and add a desc to an image in the post_content.
		if ( 'grab-description' === DistinctiveLightbox::get_distinctive_lightbox_setting( 'description-setting' ) ) {

			// If we dont have any img tags, move on.
			if ( ! preg_match_all( '/<img [^>]+>/', $content, $matches ) ) {
					return $content;
			}

			$selected_images = $attachment_ids = array();

			foreach ( $matches[0] as $image ) {
				if ( preg_match_all( '/< *img[^>]*src *= *["\']?([^"\']*)/i', $image, $match ) ) {

					foreach ( $match as $url_to_check ) {
						$url_to_check_unmodified = $url_to_check;
						// Strip things from the img to leave just the image URL.
						$url_to_check = str_replace( '<img src="', '', $url_to_check );

						$url_to_check_unmodified_url = $url_to_check[0];
						$url_to_check                = $url_to_check[0];
						$extension                   = '.' . pathinfo( $url_to_check, PATHINFO_EXTENSION );

						// Remove everything from last hypehn in image src, its probably the image sizes we dont want.
						$url_to_check = str_replace( '-' . $extension, $extension, preg_replace( '/(([\d ]{2,5}[x][\d ]{2,5}))/', '', $url_to_check ) );

						if ( preg_match( '/<img/', $url_to_check ) ) {
							$url_to_check = substr( strstr( $url_to_check, '"h' ), 1 );
						}

						// Check the image URL and see if we get an ID in return.
						$has_id = $this->get_image_id_from_url( $url_to_check );

						// If the URL retruns an ID, lets use it.
						if ( $has_id ) {
							global $post;
							$thumb_img   = get_post( $has_id[0] );
							$caption     = $thumb_img->post_title;
							$description = $thumb_img->post_content;

							$new_details = 'data-distinctive-lightbox-image-id="' . $has_id[0] . '" data-dl-image-title="' . $caption . '"  data-dl-image-description="' . esc_html( $description ) . '" />';
							$new_image = str_replace( '/>', $new_details, $image );
							// Swap the original <img src=" with our own.
							$content = str_replace( $image, $new_image, $content );

						} else {
							$id_from_class = str_replace( 'wp-image-', '', strstr( strstr( $url_to_check_unmodified[0], 'wp-image-' ), ' ', true ) );
							$thumb_img   = get_post( $id_from_class );
							$caption     = $thumb_img->post_title;
							$description = $thumb_img->post_content;

							$new_details = 'data-distinctive-lightbox-image-id="' . $id_from_class . '" data-dl-image-title="' . $caption . '"  data-dl-image-description="' . esc_html( $description ) . '" />';
							$new_image = str_replace( '/>', $new_details, $image );
							// Swap the original <img src=" with our own.
							$content = str_replace( $image, $new_image, $content );
						}
					}
				}
			}
		}

		return $content;
	}

	/**
	 * Search the database for an image with a matching URL to try and return an ID.
	 *
	 * @param  string $image_url URL to test.
	 * @return int $attachment ID for image.
	 */
	public function get_image_id_from_url( $image_url ) {
		global $wpdb;
		$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid=%s;", $image_url ) );
		return $attachment;
	}
}
