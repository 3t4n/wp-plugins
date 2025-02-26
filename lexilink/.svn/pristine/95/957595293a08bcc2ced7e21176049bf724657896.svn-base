<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Importer class for managing the import process of a WXR file
 */
class Lexilink_Import {

	// 5MB
	const FILE_SIZE = 5242880;

	public $lexilink_file;

	/**
	 * Get the CSV file
	 */
	public function get_file() {

		if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash ( $_POST['_wpnonce'] ) ) , 'lexilink-settings' ) ) return false;

		$file_name     = sanitize_text_field( $_FILES['lexilink_import_file']['name'] ?? '' );
		$file_tmp_name = sanitize_text_field( $_FILES['lexilink_import_file']['tmp_name'] ?? '' );
		$file_error    = sanitize_text_field( $_FILES['lexilink_import_file']['error'] ?? '' );

		if ( empty( $file_name ) || empty( $file_tmp_name ) || $file_error !== '0' ) {
			return false;
		}

		$this->lexilink_file = array(
			'name'     => $file_name,
			'tmp_name' => $file_tmp_name,
		);

		return true;
	}

	/**
	 * Check if the file is an CSV file
	 */
	public function check_file_type() {

		$mime_type = mime_content_type( $this->lexilink_file['tmp_name'] );
		$extension = pathinfo( $this->lexilink_file['name'], PATHINFO_EXTENSION );

		if ( ( $mime_type === 'text/plain' || $mime_type === 'text/csv' ) && $extension === 'csv' ) {
			return true;
		}
	}

	/**
	 * Check if the file size is too large
	 */
	public function check_file_size() {

		$file_size = filesize( $this->lexilink_file['tmp_name'] );

		if ( self::FILE_SIZE > $file_size ) {
			return true;
		}
	}

	/**
	 * The main controller for the actual import stage.
	 */
	public function import() {
		if ( ( $handle = fopen( $this->lexilink_file['tmp_name'], "r" ) ) !== FALSE ) {
			while ( ( $data = fgetcsv( $handle, 1000, "," ) ) !== FALSE ) {
				
				// Skip the first row
				if ( $data[0] == 'ID' ) {
					continue;
				}

				if( empty( $data[1] ) ) {
					continue;
				}

				$already_exist = $this->post_exist( $data );

				if ( $already_exist ) {
					$this->update_post( $data, $already_exist );
				} else {
					$this->insert_post( $data );
				}
			}

			fclose( $handle );
		}

		return true;
	}

	/**
	 * Check if a post with the same title already exists
	 */
	public function post_exist( $data ) {
		global $wpdb;

		$title   = $data[1] ?? '';		
		$post_id = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type = 'lexilink-glossary' AND post_status = 'publish'", $title ) );

		if ( $post_id ) {
			return $post_id;
		}
	}

	/**
	 * Update post
	 */
	public function update_post( $data, $already_exist ) {
		$postarr = array(
			'ID'           => $already_exist,
			'post_content' => $data[2] ?? '',
			'post_excerpt' => $data[3] ?? '',
			'post_type'    => 'lexilink-glossary',
		);
		if ( wp_update_post( $postarr, true ) ) {
			$this->update_custom_link( $already_exist, $data[5] );
			$this->update_thumbnail( $already_exist, $data[4] );
		}
	}

	/**
	 * Insert post
	 */
	public function insert_post( $data ) {
		$postarr = array(
			'post_title'   => $data[1] ?? '',
			'post_content' => $data[2] ?? '',
			'post_excerpt' => $data[3] ?? '',
			'post_type'    => 'lexilink-glossary',
			'post_status'  => 'publish',
		);
		$new_id = wp_insert_post( $postarr, true );

		if ( ! is_wp_error( $new_id ) ) {
			$this->update_custom_link( $new_id, $data[5] );
			$this->update_thumbnail( $new_id, $data[4] );
		}
	}

	/**
	 * Update custom link
	 */
	public function update_custom_link( $post_id, $custom_link ) {
		if ( ! empty( $custom_link ) ) {
			update_post_meta( $post_id, Lexilink_CPT::CUSTOM_LINK_ID, $custom_link );
		} else {
			delete_post_meta( $post_id, Lexilink_CPT::CUSTOM_LINK_ID );
		}
	}

	/**
	 * Update thumbnail
	 */
	public function update_thumbnail( $post_id, $url ) {
		global $wpdb;

		if ( empty( $url ) ) {
			return;
		}

		$image_name      = sanitize_title( pathinfo( $url, PATHINFO_FILENAME ) );
        $image_extension = pathinfo( $url, PATHINFO_EXTENSION );
		
		$query       = $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid REGEXP %s", '/' . $image_name . '.' . $image_extension );
		$media_exist = $wpdb->get_var( $query );

		if ( $media_exist ) {
			$attachment_id = $media_exist;
		} else {
			$upload = $this->fetch_remote_file( $url );
			if ( is_wp_error( $upload ) ) {
				return $upload;
			}

			$info = wp_check_filetype( $upload['file'] );
			if ( ! $info ) {
				return new WP_Error( 'attachment_processing_error', __( 'Invalid file type', 'lexilink' ) );
			}

			$attachment_args = array(
				'guid'           => $upload['url'],
				'post_title'     => basename( $upload['url'] ),
				'post_mime_type' => $info['type'],
			);
			$attachment_id = wp_insert_attachment( $attachment_args, $upload['file'] );
			wp_update_attachment_metadata( $attachment_id, wp_generate_attachment_metadata( $attachment_id, $upload['file'] ) );
		}

		if ( ! $attachment_id ) {
			return new WP_Error( 'attachment_processing_error', __( 'Could not create attachment', 'lexilink' ) );
		}

		set_post_thumbnail( $post_id, $attachment_id );
		return true;
	}

	/**
	 * Attempt to download a remote file attachment
	 *
	 * @param string $url URL of item to fetch
	 * @return array|WP_Error Local file location details on success, WP_Error otherwise
	 */
	public function fetch_remote_file( $url ) {
		// Extract the file name from the URL.
		$path      = wp_parse_url( $url, PHP_URL_PATH );
		$file_name = '';
		if ( is_string( $path ) ) {
			$file_name = basename( $path );
		}

		if ( ! $file_name ) {
			$file_name = md5( $url );
		}

		$tmp_file_name = wp_tempnam( $file_name );
		if ( ! $tmp_file_name ) {
			return new WP_Error( 'import_no_file', __( 'Could not create temporary file.', 'lexilink' ) );
		}

		// Fetch the remote URL and write it to the placeholder file.
		$remote_response = wp_safe_remote_get(
			$url,
			array(
				'timeout'  => 300,
				'stream'   => true,
				'filename' => $tmp_file_name,
				'headers'  => array(
					'Accept-Encoding' => 'identity',
				),
			)
		);

		if ( is_wp_error( $remote_response ) ) {
			wp_delete_file( $tmp_file_name );
			return new WP_Error(
				'import_file_error',
				sprintf(
					/* translators: 1: The WordPress error message. 2: The WordPress error code. */
					__( 'Request failed due to an error: %1$s (%2$s)', 'lexilink' ),
					esc_html( $remote_response->get_error_message() ),
					esc_html( $remote_response->get_error_code() )
				)
			);
		}

		$remote_response_code = (int) wp_remote_retrieve_response_code( $remote_response );

		// Make sure the fetch was successful.
		if ( 200 !== $remote_response_code ) {
			wp_delete_file( $tmp_file_name );
			return new WP_Error(
				'import_file_error',
				sprintf(
					/* translators: 1: The HTTP error message. 2: The HTTP error code. */
					__( 'Remote server returned the following unexpected result: %1$s (%2$s)', 'lexilink' ),
					get_status_header_desc( $remote_response_code ),
					esc_html( $remote_response_code )
				)
			);
		}

		$headers = wp_remote_retrieve_headers( $remote_response );

		// Request failed.
		if ( ! $headers ) {
			wp_delete_file( $tmp_file_name );
			return new WP_Error( 'import_file_error', __( 'Remote server did not respond', 'lexilink' ) );
		}

		$filesize = (int) filesize( $tmp_file_name );

		if ( 0 === $filesize ) {
			wp_delete_file( $tmp_file_name );
			return new WP_Error( 'import_file_error', __( 'Zero size file downloaded', 'lexilink' ) );
		}

		if ( ! isset( $headers['content-encoding'] ) && isset( $headers['content-length'] ) && $filesize !== (int) $headers['content-length'] ) {
			wp_delete_file( $tmp_file_name );
			return new WP_Error( 'import_file_error', __( 'Downloaded file has incorrect size', 'lexilink' ) );
		}

		if ( $filesize > self::FILE_SIZE ) {
			wp_delete_file( $tmp_file_name );
			/* translators: %s: maximum file size */
			return new WP_Error( 'import_file_error', sprintf( __( 'Remote file is too large, limit is %s', 'lexilink' ), size_format( self::FILE_SIZE ) ) );
		}

		// Override file name with Content-Disposition header value.
		if ( ! empty( $headers['content-disposition'] ) ) {
			$file_name_from_disposition = $this->get_filename_from_disposition( (array) $headers['content-disposition'] );
			if ( $file_name_from_disposition ) {
				$file_name = $file_name_from_disposition;
			}
		}


		// Set file extension if missing.
		$file_ext = pathinfo( $file_name, PATHINFO_EXTENSION );
		if ( ! $file_ext && ! empty( $headers['content-type'] ) ) {
			$extension = $this->get_file_extension_by_mime_type( $headers['content-type'] );
			if ( $extension ) {
				$file_name = "{$file_name}.{$extension}";
			}
		}

		// Handle the upload like _wp_handle_upload() does.
		$wp_filetype     = wp_check_filetype_and_ext( $tmp_file_name, $file_name );
		$ext             = empty( $wp_filetype['ext'] ) ? '' : $wp_filetype['ext'];
		$type            = empty( $wp_filetype['type'] ) ? '' : $wp_filetype['type'];
		$proper_filename = empty( $wp_filetype['proper_filename'] ) ? '' : $wp_filetype['proper_filename'];

		// Check to see if wp_check_filetype_and_ext() determined the filename was incorrect.
		if ( $proper_filename ) {
			$file_name = $proper_filename;
		}

		if ( ( ! $type || ! $ext ) && ! current_user_can( 'unfiltered_upload' ) ) {
			return new WP_Error( 'import_file_error', __( 'Sorry, this file type is not permitted for security reasons.', 'lexilink' ) );
		}

		$uploads = wp_upload_dir();
		if ( ! ( $uploads && false === $uploads['error'] ) ) {
			return new WP_Error( 'upload_dir_error', $uploads['error'] );
		}

		// Move the file to the uploads dir.
		$file_name     = wp_unique_filename( $uploads['path'], $file_name );
		$new_file      = $uploads['path'] . "/$file_name";
		$move_new_file = copy( $tmp_file_name, $new_file );

		if ( ! $move_new_file ) {
			wp_delete_file( $tmp_file_name );
			return new WP_Error( 'import_file_error', __( 'The uploaded file could not be moved', 'lexilink' ) );
		}

		// Set correct file permissions.
		$stat  = stat( dirname( $new_file ) );
		$perms = $stat['mode'] & 0000666;
		chmod( $new_file, $perms );

		$upload = array(
			'file'  => $new_file,
			'url'   => $uploads['url'] . "/$file_name",
			'type'  => $wp_filetype['type'],
			'error' => false,
		);

		return $upload;
	}

	/**
	 * Parses filename from a Content-Disposition header value.
	 *
	 * As per RFC6266:
	 *
	 *     content-disposition = "Content-Disposition" ":"
	 *                            disposition-type *( ";" disposition-parm )
	 *
	 *     disposition-type    = "inline" | "attachment" | disp-ext-type
	 *                         ; case-insensitive
	 *     disp-ext-type       = token
	 *
	 *     disposition-parm    = filename-parm | disp-ext-parm
	 *
	 *     filename-parm       = "filename" "=" value
	 *                         | "filename*" "=" ext-value
	 *
	 *     disp-ext-parm       = token "=" value
	 *                         | ext-token "=" ext-value
	 *     ext-token           = <the characters in token, followed by "*">
	 *
	 * @since 0.7.0
	 *
	 * @see WP_REST_Attachments_Controller::get_filename_from_disposition()
	 *
	 * @link http://tools.ietf.org/html/rfc2388
	 * @link http://tools.ietf.org/html/rfc6266
	 *
	 * @param string[] $disposition_header List of Content-Disposition header values.
	 * @return string|null Filename if available, or null if not found.
	 */
	public function get_filename_from_disposition( $disposition_header ) {
		// Get the filename.
		$filename = null;

		foreach ( $disposition_header as $value ) {

			$value = trim( $value );

			if ( strpos( $value, ';' ) === false ) {
				continue;
			}

			list( $type, $attr_parts ) = explode( ';', $value, 2 );

			$attr_parts = explode( ';', $attr_parts );
			$attributes = array();

			foreach ( $attr_parts as $part ) {
				if ( strpos( $part, '=' ) === false ) {
					continue;
				}

				list( $key, $value ) = explode( '=', $part, 2 );

				$attributes[ trim( $key ) ] = trim( $value );
			}

			if ( empty( $attributes['filename'] ) ) {
				continue;
			}

			$filename = trim( $attributes['filename'] );

			// Unquote quoted filename, but after trimming.
			if ( substr( $filename, 0, 1 ) === '"' && substr( $filename, -1, 1 ) === '"' ) {
				$filename = substr( $filename, 1, -1 );
			}
		}

		return $filename;
	}

	/**
	 * Retrieves file extension by mime type.
	 *
	 * @since 0.7.0
	 *
	 * @param string $mime_type Mime type to search extension for.
	 * @return string|null File extension if available, or null if not found.
	 */
	public function get_file_extension_by_mime_type( $mime_type ) {
		static $map = null;

		if ( is_array( $map ) ) {
			return isset( $map[ $mime_type ] ) ? $map[ $mime_type ] : null;
		}

		$mime_types = wp_get_mime_types();
		$map        = array_flip( $mime_types );

		// Some types have multiple extensions, use only the first one.
		foreach ( $map as $type => $extensions ) {
			$map[ $type ] = strtok( $extensions, '|' );
		}

		return isset( $map[ $mime_type ] ) ? $map[ $mime_type ] : null;
	}
}
