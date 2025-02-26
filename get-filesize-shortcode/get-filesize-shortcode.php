<?php 
/**
 * Plugin Name: Get Filesize Shortcode
 * Plugin URI:  http://ika-ring.net
 * Description: Simple shortcode to get filesize of a file( eg. PDF, JPG, PNG ... ) with a human readable format, using the largest unit the bytes will fit into. Now added Get filesize block.
 * Version:     1.2.0
 * Author:      Kan Ikawa
 * Author URI:  https://ika-ring.net
 * Text Domain: get-filesize-shortcode
 * Domain Path: /languages/
 * License:     GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

// Usage: [filesize]http://wordpress.com/path/to/filename.pdf[/filesize]

function ika_get_filesize( $atts, $content = null ) {
  // i18n
  load_plugin_textdomain(
    'get-filesize-shortcode',
    false,
    basename( dirname( __FILE__ ) ) .'/languages'
  );
  
  extract( shortcode_atts( array(
  	'url' => '',
  ), $atts ) );
  
  //Replace url to directory path
  if ( empty( $content ) ) {
    $path = str_replace( site_url('/'), ABSPATH, strip_tags( $url ) );
  } else {
    $path = str_replace( site_url('/'), ABSPATH, strip_tags( $content ) );
  }
  
  if ( is_file( $path ) ){
    $filesize = size_format( filesize( $path ) );
  } else {
    $filesize = __( 'File not found!', 'get_filesize_shortcode');
  }
  return $filesize;

}
add_shortcode('filesize', 'ika_get_filesize');


/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
if ( ! function_exists( 'get_filesize_block_get_filesize_block_block_init' ) ) {
  function get_filesize_block_get_filesize_block_block_init() {
    register_block_type( __DIR__ . '/build' );
  }
  add_action( 'init', 'get_filesize_block_get_filesize_block_block_init' );
}
