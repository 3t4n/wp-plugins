<?php
/**
 * [Short Description]
 *
 * @package    DEVRY\MLR
 * @copyright  Copyright (c) 2024, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.0
 */

namespace DEVRY\MLR;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

if ( ! class_exists( 'Media_Library_Recovery' ) ) {

	class Media_Library_Recovery {
		/**
		 * Set a file size limit to prevent max_execution timeout error.
		 */
		public $file_size_limit;

		/**
		 * Show number of results per page.
		 */
		public $results_per_page;

		/**
		 * Supported post types.
		 */
		public $post_types_supported;

		/**
		 * Compact mode.
		 */
		public $compact_mode;

		/**
		 * Constructor.
		 */
		public function __construct() {
			// Set the default file size limit at 2MB.
			$this->file_size_limit = 2 * 1024 * 1024; // In bytes.

			// Set the default to 25.
			$this->results_per_page = 25;

			// Be able to use the in content and thumbnail recovery for these post types.
			$this->post_types_supported = array( 'post', 'page' );
			$this->compact_mode         = ''; // No

			$this->compact_mode = get_option( 'mlr_compact_mode', $this->compact_mode );
		}

		/**
		 * Initializator.
		 */
		public function init() {
			add_action( 'wp_loaded', array( $this, 'on_loaded' ) );
		}

		/**
		 * WP is loaded.
		 */
		public function on_loaded() {}

		/**
		 * Get the total # of images in the /uploads folder.
		 */
		public function get_total_image_files() {
			$image_files = 0;

			$base_dir = wp_normalize_path( wp_upload_dir()['basedir'] );

			$iterator = new \RecursiveDirectoryIterator( $base_dir );

			foreach ( new \RecursiveIteratorIterator( $iterator ) as $file_path ) {
				// Path partials.
				$path_parts = pathinfo( $file_path );

				// Skip . and .. from the directory list.
				if ( strpos( $file_path, DIRECTORY_SEPARATOR . '.' ) !== false
					|| strpos( $file_path, DIRECTORY_SEPARATOR . '..' ) !== false
					|| ! array_key_exists( 'extension', $path_parts ) ) {
					continue;
				}

				if ( is_array( getimagesize( $file_path ) ) ) {
					// Count only the main parent file.
					if ( ! preg_match( '/\d+x\d+$/i', $path_parts['filename'], $matches )
						&& ! preg_match( '/scaled/i', $path_parts['filename'], $matches )
						&& ! preg_match( '/rotated/i', $path_parts['filename'], $matches ) ) {
						$image_files++;
					}
				}
			}

			return $image_files;
		}

		/**
		 * Display all the media contents of image type from the uploads directory.
		 */
		public function display_media_grid() {
			$html = '';

			// Pagination.
			$current_page = ( isset( $_REQUEST['p'] ) ) ? sanitize_text_field( wp_unslash( $_REQUEST['p'] ) ) : 1;

			$results_per_page = $this->results_per_page;
			$results_from     = ( 0 === $current_page ) ? 1 : ( $current_page * $results_per_page ) - $results_per_page;
			$results_to       = $current_page * $results_per_page;

			// Uploads base directory and URL.
			$base_dir = wp_normalize_path( wp_upload_dir()['basedir'] );
			$base_url = site_url( '/' ) . str_replace( wp_normalize_path( ABSPATH ), '', $base_dir );

			$images = $this->get_media_contents( $results_from, $results_to );

			foreach ( $images as $image ) {
				$thumbnail_url = '';

				// Get image thumbnail URL.
				foreach ( $image as $image_size => $image_data ) {
					/**
					 * 0 - full path
					 * 1 - full name
					 * 2 - extension
					 */
					if ( preg_match( '/150x150/i', $image_size ) ) {
						$thumbnail_url = $base_url . str_replace( $base_dir, '', $image_data['fullpath'] ) . '/' . $image_data['filename'];
						break;
					}
				}

				if ( array_key_exists( 'parent', $image ) ) {
					$file_path = $image['parent']['fullpath'] . '/' . $image['parent']['filename'];
					$file_url  = $base_url . str_replace( $base_dir, '', $image['parent']['fullpath'] ) . '/' . $image['parent']['filename'];

					// If image is uploaded directly and don't have sizes use [parent] image as thumbnail.
					if ( ! $thumbnail_url ) {
						$thumbnail_url = $file_url;
					}

					$html .= $this->get_media_html( $file_url, $file_path, $thumbnail_url );
				}
			}

			if ( $current_page > ceil( sizeof( $images ) / $this->results_per_page ) ) {
				$html .= '<div style="padding: 20px;"><strong>No more results found.</strong><br />Go back to the previous page.</div>';
			}

			return $html;
		}

		/**
		 * Get media thumbnail HTML contents.
		 */
		public function get_media_html( $file_url, $file_path, $thumbnail_url ) {
			$html = '';

			// Generate the contents for the media explorer.
			if ( filesize( $file_path ) <= $this->file_size_limit ) { // In bytes.
				// Check if file is found in the database, NO RECOVERY needed.
				if ( attachment_url_to_postid( $file_url ) ) {
					$html = $this->get_thumbnail_contents( $file_path, $thumbnail_url, 'dashicons-visibility', 'in-library' );
				} else {
					$html = $this->get_thumbnail_contents( $file_path, $thumbnail_url, 'dashicons-hidden' );
				}
			} else {
				// Check if file is within the file size limit specified on the Options page.
				$html = $this->get_thumbnail_contents( $file_path, $thumbnail_url, 'dashicons-lock', 'oversize-limit' );
			}

			return $html;
		}

		/**
		 * Rebuild and restore passed media files for recovery.
		 */
		public function rebuild_media_file( $file_path ) {
			if ( empty( $file_path ) ) {
				return;
			}

			$wp_uploads_dir = wp_upload_dir();

			$path_parts = pathinfo( $file_path );

			// 2013/12/image.jpg
			$file_path_rel = str_replace( wp_normalize_path( $wp_uploads_dir['basedir'] . '/' ), '', $file_path );
			// https://domain.com/wp-content/uploads/image.jpg
			$file_url = site_url( '/' ) . str_replace( wp_normalize_path( ABSPATH ), '', $file_path );

			$attachment_args = array(
				'guid'           => $file_url,
				'post_mime_type' => mime_content_type( $file_path ),
				'post_title'     => $path_parts['filename'],
				'post_content'   => '',
				'post_status'    => 'inherit',
				'post_date'      => gmdate( 'Y-m-d H:i:s', filemtime( $file_path ) ),
				'post_parent'    => $this->find_post_attachment_id( $file_url ),
			);

			$attachment_id = wp_insert_attachment( $attachment_args, $file_path_rel );

			if ( ! is_wp_error( $attachment_id ) ) {
				require_once ABSPATH . 'wp-admin/includes/image.php';
				require_once ABSPATH . 'wp-admin/includes/media.php';

				$meta_data = wp_generate_attachment_metadata( $attachment_id, $file_path );
				wp_update_attachment_metadata( $attachment_id, $meta_data );
			}
		}

		/**
		 * Loop through all supported posts and find the
		 * images in post content to be linked and recovered.
		 */
		public function find_post_attachment_id( $image_recovery_url ) {
			$posts = $this->get_posts_supported();

			foreach ( $posts as $post ) {
				// Check if the image file name is contained within the post content
				preg_match_all( '/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches );

				if ( isset( $matches[1] ) && ! empty( $matches[1] ) ) {
					foreach ( $matches[1] as $image_source_url ) {
						// Extract parts of the recovery URL.
						$recovery_parts    = pathinfo( $image_recovery_url );
						$recovery_filename = $recovery_parts['filename']; // original

						// Extract parts of the source URL.
						$source_parts    = pathinfo( $image_source_url );
						$source_filename = $source_parts['filename']; // original-1024x1024

						// Check if the image file name is contained within the image URL
						if ( strpos( strtolower( $source_filename ), strtolower( $recovery_filename ) ) !== false ) {
							return $post->ID;
						}
					}
				}
			}

			return 0;
		}

		/**
		 * Get ALL posts from the supported types defined earlier.
		 */
		public function get_posts_supported() {
			// Create a unique cache key based on the supported post types
			$cache_key = 'mlr_posts_supported_' . md5( implode( '_', $this->post_types_supported ) );

			// Try to get cached data
			$posts_supported = wp_cache_get( $cache_key, 'mlr_cache_group' );

			if ( false === $posts_supported ) {
				// If no cached data, retrieve posts using get_posts()
				$args = array(
					'post_type'   => implode( "', '", array_map( 'esc_sql', $this->post_types_supported ) ),
					'post_status' => 'publish',
					'fields'      => 'ID, content',
					'numberposts' => -1,
				);

				// Retrieve the posts
				$posts_supported = get_posts( $args );

				// Store the result in cache
				wp_cache_set( $cache_key, $posts_supported, 'mlr_cache_group', 3600 ); // Cached for 1 hour
			}

			return $posts_supported;
		}

		/**
		 * Loop over the uploads directory and get all the media contents of type image.
		 */
		public function get_media_contents( $results_from, $results_to ) {
			$contents        = array();
			$results_counter = 0;

			$base_dir = wp_normalize_path( wp_upload_dir()['basedir'] );

			$iterator = new \RecursiveDirectoryIterator( $base_dir );

			foreach ( new \RecursiveIteratorIterator( $iterator ) as $path ) {
				// Path partials.
				$path_parts = pathinfo( $path );

				$file_path = wp_normalize_path( $path_parts['dirname'] . '/' . $path_parts['basename'] );

				// Skip . and .. from the directory list.
				if ( strpos( $path, DIRECTORY_SEPARATOR . '.' ) !== false
					|| strpos( $path, DIRECTORY_SEPARATOR . '..' ) !== false
					|| ! array_key_exists( 'extension', $path_parts ) ) {
					continue;
				}

				if ( is_array( getimagesize( $file_path ) ) ) {
					$parent_filepath = strtolower( rtrim( preg_replace( '/[^a-zA-Z0-9]+/', '-', $file_path ), '-' ) );

					if ( ! preg_match( '/\d+x\d+$/i', $path_parts['filename'], $matches )
						&& ! preg_match( '/scaled/i', $path_parts['filename'], $matches )
						&& ! preg_match( '/rotated/i', $path_parts['filename'], $matches ) ) {

						if ( $results_counter >= $results_from && $results_counter <= $results_to ) {
							// Add data for the the originally uploaded media file as [parent].
							$contents[ $parent_filepath ]['parent'] = $this->get_meta_data( null, $path_parts );
						}

						// Count only the parent files.
						$results_counter++;
					} else {
						// Add data for the resized, cropped & scaled versions of the media file.
						$parent_filepath = str_replace( '-' . $matches[0], '', $parent_filepath );

						$contents[ $parent_filepath ][ $matches[0] ] = $this->get_meta_data( null, $path_parts );
					}
				}

				if ( $results_counter > $results_to ) {
					break;
				}
			}

			/**
			 *  Example contents array.
			 *
			 * array(
			 *  'desert-flowers' => array(
			 *    [1024x683] => array( 0 => fullpath, 1 => file_name, 2 => extension ),
			 *    [150x150]  => array( ... ),
			 *    ...
			 *    [scaled]   => array( ... ),
			 *    [rotated]  => array( ... ),
			 *    [parent]   => array( ... ),
			 *  )
			 */
			return $contents;
		}

		/**
		 * Get the image/file meta data used for filters.
		 */
		public function get_meta_data( $type, $parts ) {
			if ( empty( $parts ) ) {
				return;
			}

			return array(
				'type'     => $type,
				'fullpath' => wp_normalize_path( $parts['dirname'] ),
				'filename' => $parts['basename'],
				'ext'      => $parts['extension'],
			);
		}

		/**
		 * Get the media explorer image thumbnail with meta.
		 */
		public function get_thumbnail_contents( $file_path, $thumbnail_url, $image_type, $extra = '' ) {
			if ( ! $file_path || ! $thumbnail_url || ! $image_type ) {
				return;
			}

			// Get the URL of the WordPress uploads directory
			$upload_dir = wp_upload_dir();
			$base_dir   = wp_normalize_path( $upload_dir['basedir'] );
			$base_url   = $upload_dir['baseurl'];

			// Replace the base directory path with the base URL
			$file_url         = str_replace( $base_dir, $base_url, wp_normalize_path( $file_path ) );
			$file_url_preview = admin_url( 'upload.php?item=' . attachment_url_to_postid( $file_url ) );

			$html = '
				<div class="mlr-media-thumbnail ' . $extra . '">
					<label>
						<input type="checkbox" name="image_files[]" value="' . $file_path . '" />
						<img src="' . $thumbnail_url . '" alt="" />
						<i class="dashicons ' . $image_type . '"></i>
					</label>
				</div>
			';

			if ( 'in-library' === $extra ) {
				$html = '<a href="' . $file_url_preview . '" target="_blank" title="' . esc_html__( 'Open in Media Library...', 'wp-media-recovery' ) . '">' . $html . '</a>';
			}

			return $html;
		}
	}

	$mlr = new Media_Library_Recovery();
	$mlr->init();
}
