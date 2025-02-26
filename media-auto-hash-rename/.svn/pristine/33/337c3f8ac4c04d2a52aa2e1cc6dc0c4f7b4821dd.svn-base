<?php
/**
 * Plugin Name: Media Auto Hash Rename
 * Plugin URI:  https://wordpress.org/plugins/media-auto-hash-rename/
 * Description: Rename media filename during upload with unique hash
 * Version:     1.0.1
 * Author:      Tunghsiao Liu
 * Author URI:  https://sparanoid.com/
 * Text Domain: wporg
 * Domain Path: /languages
 * License:     GPL2
 */

if ( ! function_exists( 'mahr_unique_id' ) ) :
  function mahr_unique_id( $limit = 8, $chars = '0123456789abcdefghijklmnopqrstuvwxyz_' ) {
    $limit = ( defined( 'MAHR_LENGTH' ) && MAHR_LENGTH ) ? MAHR_LENGTH : $limit;
    $characters = ( defined( 'MAHR_CHARS' ) && MAHR_CHARS ) ? MAHR_CHARS : $chars;
    $randstring = '';
    for ($i = 0; $i < $limit; $i++) {
      $randstring .= $characters[rand(0, strlen($characters))];
    }
    return $randstring;
  }
endif;

if ( ! function_exists( 'mahr_auto_rename' ) ) :
  function mahr_auto_rename( $attachment, $ignored = 'pdf, zip' ) {
    // Get file extensions to ignore from settings
    $ignored_exts_raw = defined( 'MAHR_IGNORE' ) ? MAHR_IGNORE : $ignored;
    $ignored_exts = ! empty( $ignored_exts_raw )
      ? array_map( 'trim', explode( ',', $ignored_exts_raw ) ) : [];

    // Get current file extension
    $current_ext = pathinfo( basename( $attachment['name'] ), PATHINFO_EXTENSION );

    // Check if current file extension in ignored list
    if ( in_array( $current_ext, $ignored_exts ) ) return $attachment;

    // Apply new unique file name
    $processed_ext = empty( $current_ext ) ? '' : '.' . $current_ext;
    $attachment['name'] = sanitize_file_name( mahr_unique_id() . $processed_ext );
    $attachment['title'] = 'wtf';

    // Return new attachment object
    return $attachment;
  }
  add_filter( 'wp_handle_upload_prefilter', 'mahr_auto_rename', 20, 2 );
endif;
