<?php
/*
Plugin Name: Mixlr Shortcode
Plugin URI: http://
Description: Converts Mixlr WordPress shortcodes to an embeddable player. [mixlr]http://mixlr.com/BROADCASTER/embed[/mixlr]
Version: 1.0.1
Author: Mixlr Ltd.
Author URI: http://mixlr.com
License: GPLv2
*/

/* Register oEmbed provider
   -------------------------------------------------------------------------- */
function add_oembed_mixlr(){
  wp_oembed_add_provider( 'http://mixlr.com/*', 'http://mixlr.com/services/oembed');
}
add_action('init','add_oembed_mixlr');


/* Register Mixlr shortcode
   -------------------------------------------------------------------------- */
add_shortcode('mixlr', 'mixlr_shortcode');

function mixlr_shortcode($atts) {
  extract( shortcode_atts( array(
      'url' => 'http://the-url',
      'width' => "100%",
      'height' => "180"
  ), $atts ) );
  return '<iframe width="'.$width.'" height="'.$height.'" scrolling="no" frameborder="no" src="'.$url.'"></iframe>';
}

?>
