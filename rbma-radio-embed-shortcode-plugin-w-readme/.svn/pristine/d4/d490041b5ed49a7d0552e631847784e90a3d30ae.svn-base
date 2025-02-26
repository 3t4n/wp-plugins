<?php
/*
Plugin Name: RBMARadio Shortcode
Plugin URI: http://wordpress.org/extend/plugins/rbmar-shortcode/
Description: Converts RBMARadio WordPress shortcodes to a RBMARadio Embed Player. Example: [rbmar]http://www.rbmaradio.com/shows/dixon-live-at-la-machine-du-moulin-rouge[/rbmar]
Version: 1.0
Author: Red Bull Music Academy Radio
Author URI: http://rbmaradio.com
License: GPLv2

Original version: Oliver Zeyen <o.zeyen@de.edenspiekermann.comn>
*/


/* Register oEmbed provider
   ========================================================================== */

wp_oembed_add_provider('#http?://(?:www\.)?rbmaradio\.com/.*#i', 'http://www.rbmaradio.com/oembed', true);

/* Register RBMAR shortcode
   ========================================================================== */

add_shortcode("rbmaradio", "rbmar_shortcode");

/**
 * RBMARadio shortcode handler
 * @param  {string|array}  $atts     The attributes passed to the shortcode like [rbmar attr1="value" /].
 *                                   Is an empty string when no arguments are given.
 * @param  {string}        $content  The content between non-self closing [rbmar]…[/rbmar] tags.
 * @return {string}                  Widget embed code HTML
 */
function rbmar_shortcode($atts, $content = null) {
  // We need to use the WP_Embed class instance
  global $wp_embed;

  // Custom sh
  $options = array('url' => trim($content));

  // The "url" option is required
  if (!isset($options['url'])) { return ''; }

  // This handler handles calling the oEmbed class
  // and and return the embed

  return $wp_embed->shortcode(array(), $options['url']);
}
?>