<?php
/*
Plugin Name:  Easy Soundcloud Shortcode
Plugin URI:   https://itroz.com
Description:  With the help of this plugin users would be able to see published files on the website, SoundCloud.com. quickly and optimally.
Version:      0.1
Author:       itroz
Author URI:   https://itroz.com
License:      GPLv2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  itroz
*/

wp_oembed_add_provider('#https?://(?:api\.)?soundcloud\.com/.*#i', 'http://soundcloud.com/oembed', true);
add_shortcode("soundcloud", "Scld");

function Scld($atts, $content = null) {
  $shortcode_options = array_merge(array('url' => trim($content)), is_array($atts) ? $atts : array());
  $shortcode_params = array();
  if (isset($shortcode_options['params'])) {
    parse_str(html_entity_decode($shortcode_options['params']), $shortcode_params);
  }
    $shortcode_options['params'] = $shortcode_params;
    $plugin_options['params'] = array(); 
    $options = array_merge(
    $plugin_options,
    $shortcode_options );
    $options['params'] = array_merge(
    $plugin_options['params'],
    $shortcode_options['params']);
    $options['url'] = trim($options['url']);
    $options['params'] = array_merge(array(
      'url' => $options['url']
    ), $options['params']);
	
        return ScldIframeWidget($options);}

function ScldBooleanize($value) {
  return is_bool($value) ? $value : $value === 'true' ? true : false;
}

function ScldUrlHasTracklist($url) {
  return preg_match('/^(.+?)\/(sets|groups|playlists)\/(.+?)$/', $url);
}

function ScldIframeWidget($options) {
  $url = 'https://w.soundcloud.com/player?' . http_build_query($options['params']);
  $width = isset($options['width']) && $options['width'] !== 0 ? $options['width'] : '100%';
  $height = isset($options['height']) && $options['height'] !== 0
              ? $options['height']
              : (ScldUrlHasTracklist($options['url']) || (isset($options['params']['visual']) && ScldBooleanize($options['params']['visual'])) ? '450' : '166');
  return sprintf('<iframe width="%s" height="%s" scrolling="no" frameborder="no" src="%s"></iframe>', $width, $height, $url);
}
include_once 'admin/Description.php';