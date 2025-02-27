<?php
/**
 * Simplebooklet
 *
 * @package simplebooklet
 */

/*
Plugin Name: Simplebooklet PDF Viewer and Embedder
Plugin URI: https://simplebooklet.com/wordpress
Description: [simplebooklet src="{booklet embed url}" width="{booklet width}" height="{booklet height}"] shortcode
Version: 1.1.3
Author: simplebooklet
Author Email: support(at)simplebooklet.com
Author URI: https://simplebooklet.com/
*/

if ( ! function_exists( 'simplebooklet_embed_shortcode' ) ) :


  /**
   * Load jQuery for Simplebooklet
   *
   * @access public
   * @return void
   */
  function simplebooklet_enqueue_script() {
    wp_enqueue_script( 'jquery' );
  }
  add_action( 'wp_enqueue_scripts', 'simplebooklet_enqueue_script' );


  /**
   * Simplebooklet Embed Shortcode
   *
   * @access public
   * @param mixed $atts Atts.
   * @param mixed $content (default: null) Content.
   * @return $html HTML for Simplebooklet iframe.
   */
  function simplebooklet_embed_shortcode( $atts, $content = null ) {
    $html = '';
    $html .= "\n".'<!-- simplebooklet plugin v.1.1.2 (wordpress.org/extend/plugins/simplebooklet/) -->'."\n";
    $html .= '<iframe class="simplebooklet_iframe" scrolling="no" frameborder="0" style="border: 0px; overflow: hidden; width: '.$atts['width'].'px; height: '.$atts['height'].'px;" ';
    foreach ( $atts as $attr => $value ) {
      switch ( $attr ) {
        case 'src' :
          // Sanitize URL
          $value = esc_url( $value );
          $html .= " src=\"$value\"";
          break;
        case 'width' :
          // Sanitize width
          $value = absint( $value );
          $html .= " width=\"$value\"";
          break;
        case 'height' :
          // Sanitize height
          $value = absint( $value );
          $html .= " height=\"$value\"";
          break;
      }
    }
    $html .= '></iframe>';

    return $html;
  }
  add_shortcode( 'simplebooklet', 'simplebooklet_embed_shortcode' );

endif;
