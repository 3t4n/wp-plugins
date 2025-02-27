<?php
namespace BBlocks\Inc\Templates;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Image {
	private $already_imported_ids = array();

    private static $instance = null;

    public function __construct() {
    }

    public function maybe_import_images( $content ) {
      // Extract all links.
      preg_match_all( '#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $content, $match );

      $all_links = array_unique( $match[0] );
      // return $all_links;

      // Not have any link.
      if ( empty( $all_links ) ) {
        return $content;
      }

      $link_mapping = array();
      $image_links  = array();
      $other_links  = array();

      // // Extract normal and image links.
      foreach ( $all_links as $key => $link ) {
        if ( $this->ast_block_templates_is_valid_image( $link ) ) {

          // Get all image links.
          // Avoid *-150x, *-300x and *-1024x images.
          if (
            false === strpos( $link, '-150x' ) &&
            false === strpos( $link, '-300x' ) &&
            false === strpos( $link, '-1024x' )
          ) {
            $image_links[] = $link;
          }
        } else {

          // Collect other links.
          $other_links[] = $link;
        }
      }

      // return $image_links;

      // Step 1: Download images.
      if ( ! empty( $image_links ) ) {
        foreach ( $image_links as $key => $image_url ) {
          // Download remote image.
          $image            = array(
            'url' => $image_url,
            'id'  => 0,
          );
          $downloaded_image = $this->import( $image );

          // Old and New image mapping links.
          $link_mapping[ $image_url ] = $downloaded_image['url'];
        }
      }

      // Step 3: Replace mapping links.
      foreach ( $link_mapping as $old_url => $new_url ) {
        $old_url = (string) $old_url;
        $content = str_replace( $old_url, $new_url, $content );

        // Replace the slashed URLs if any exist.
        $old_url = str_replace( '/', '/\\', $old_url );
        $new_url = str_replace( '/', '/\\', $new_url );
        $content = str_replace( $old_url, $new_url, $content );
      }
      return $content;
	}
  
	/**
	 * Get Saved Image.
	 *
	 * @since 1.0.0
	 * @param  string $attachment   Attachment Data.
	 * @return string                 Hash string.
	 */
	private function get_saved_image( $attachment ) {

		// if ( apply_filters( 'ast_block_templates_image_importer_skip_image', false, $attachment ) ) {
		// 	Helper::instance()->ast_block_templates_log( 'BATCH - SKIP Image - {from filter} - ' . $attachment['url'] . ' - Filter name `ast_block_templates_image_importer_skip_image`.' );
		// 	return array(
		// 		'status'     => true,
		// 		'attachment' => $attachment,
		// 	);
		// }

		global $wpdb;

		// 1. Is already imported in Batch Import Process?
		$post_id = $wpdb->get_var( $wpdb->prepare( 'SELECT `post_id` FROM `' . $wpdb->postmeta . '` WHERE `meta_key` = \'_ast_block_templates_image_hash\' AND `meta_value` = %s;', $this->get_hash_image( $attachment['url'] ) ) ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching

		// 2. Is image already imported though XML?
		if ( empty( $post_id ) ) {

			// Get file name without extension.
			// To check it exist in attachment.
			$filename = basename( $attachment['url'] );

			$post_id = $wpdb->get_var( $wpdb->prepare( "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = '_wp_attached_file' AND meta_value LIKE %s", '%/' . $filename . '%' ) ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
			// Helper::instance()->ast_block_templates_log( 'BATCH - SKIP Image {already imported from xml} - ' . $attachment['url'] );
		}

		if ( $post_id ) {
			$new_attachment               = array(
				'id'  => $post_id,
				'url' => wp_get_attachment_url( $post_id ),
			);
			$this->already_imported_ids[] = $post_id;

			return array(
				'status'     => true,
				'attachment' => $new_attachment,
			);
		}

		return array(
			'status'     => false,
			'attachment' => $attachment,
		);
	}

	/**
	 * Import Image
	 *
	 * @since 1.0.0
	 * @param  array $attachment Attachment array.
	 * @return array              Attachment array.
	 */
	public function import( $attachment ) {

		// Helper::instance()->ast_block_templates_log( 'Source - ' . $attachment['url'] );
		$saved_image = $this->get_saved_image( $attachment );
		// Helper::instance()->ast_block_templates_log( 'Log - ' . wp_json_encode( $saved_image['attachment'] ) );

		if ( $saved_image['status'] ) {
			return $saved_image['attachment'];
		}

		// Extract the file name and extension from the URL.
		$filename = basename( $attachment['url'] );

		if ( isset( $attachment['engine'] ) && 'unsplash' === $attachment['engine'] ) {
			$filename = 'unsplash-photo-' . $attachment['id'] . '.jpg';
		}

		$file_content = wp_remote_retrieve_body(
			wp_safe_remote_get(
				$attachment['url'],
				array(
					'timeout'   => '60',
				)
			)
		);

		// Empty file content?
		if ( empty( $file_content ) ) {

			// Helper::instance()->ast_block_templates_log( 'BATCH - FAIL Image {Error: Failed wp_remote_retrieve_body} - ' . $attachment['url'] );
			return $attachment;
		}

		$upload = wp_upload_bits( $filename, null, $file_content );

		// Helper::instance()->ast_block_templates_log( $filename );
		// Helper::instance()->ast_block_templates_log( wp_json_encode( $upload ) );

		$post = array(
			'post_title' => $filename,
			'guid'       => $upload['url'],
		);
		// Helper::instance()->ast_block_templates_log( wp_json_encode( $post ) );

		$info = wp_check_filetype( $upload['file'] );
		if ( $info ) {
			$post['post_mime_type'] = $info['type'];
		} else {
			// For now just return the origin attachment.
			return $attachment;
		}

		if ( ! function_exists( 'wp_generate_attachment_metadata' ) ) {
			include ABSPATH . 'wp-admin/includes/image.php';
		}

		$post_id = wp_insert_attachment( $post, $upload['file'] );
		wp_update_attachment_metadata(
			$post_id,
			wp_generate_attachment_metadata( $post_id, $upload['file'] )
		);
		update_post_meta( $post_id, '_ast_block_templates_image_hash', $this->get_hash_image( $attachment['url'] ) );

		$new_attachment = array(
			'id'  => $post_id,
			'url' => $upload['url'],
		);

		// Helper::instance()->ast_block_templates_log( 'BATCH - SUCCESS Image {Imported} - ' . $new_attachment['url'] );

		$this->already_imported_ids[] = $post_id;

		return $new_attachment;
	}

  public function get_hash_image( $attachment_url ) {
		return sha1( $attachment_url );
	}


  public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

  public function ast_block_templates_is_valid_image( $link = '' ) {
		return preg_match( '/^((https?:\/\/)|(www\.))([a-z0-9-].?)+(:[0-9]+)?\/[\w\-]+\.(jpg|png|gif|jpeg)\/?$/i', $link );
	}
}
new Image();