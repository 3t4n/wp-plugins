<?php

namespace AceBlocks;

/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 * @package CGB
 */
class Scripts {

  public function __construct() {
    add_action( 'enqueue_block_assets', array( $this, 'load' ) );
    add_action( 'enqueue_block_editor_assets', array( $this, 'load' ) );
  }

  /**
   * [load description]
   * @return [type] [description]
   */
  public function load() {
    $paths = array();

    if ( defined('ACEBLOCKS_DEV') && ACEBLOCKS_DEV ) {
      $paths['base'] = 'http://localhost:8080/';
      $paths['script'] = 'http://localhost:8080/scripts.js';
      $paths['style'] = 'http://localhost:8080/styles.css';
    } else {
      $manifest = ACEBLOCKS_URL . '/dist/manifest.json';
      $manifest = file_get_contents( $manifest );
      $manifest = (array) json_decode( $manifest );

      $paths['base'] = ACEBLOCKS_URL . '/dist/';
      $paths['script'] = ACEBLOCKS_URL . sprintf( 'dist/%s', $manifest['main.js'] );

      if ( isset( $manifest['main.css'] ) ) {
        $paths['style'] = ACEBLOCKS_URL . sprintf( 'dist/%s', $manifest['main.css'] );
        wp_enqueue_style( 'aceblocks', $paths['style'], array( 'wp-blocks' ) );
      }
    }

    wp_enqueue_script( 'aceblocks', $paths['script'], array( 'wp-blocks', 'wp-i18n', 'wp-element' ) );
  }

}
