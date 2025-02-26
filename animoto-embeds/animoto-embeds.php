<?php /*
Plugin Name:  Animoto Embeds
Version:      1.3.0
Description:  Add support for easily embedding Animoto videos.
Author:       Animoto Inc
Author URI:   http://animoto.com
*/

/**
 * Animoto video embed handler callback.
 * @param  array  $matches The regexp matches.
 * @param  array  $attr    Embed attributes
 * @param  string $url     The original URL that was matched.
 * @param  array  $rawAttr The original unmodified attributes.
 * @return string          Embed HTML
 */
function wp_embed_handler_animoto($matches, $attr, $url, $rawAttr){
  $defaults = wp_embed_defaults();

  $serviceUrl = "http://animoto.com/oembeds/create";
  $serviceUrlWithArgs = add_query_arg('url', urlencode($url), $serviceUrl);
  $serviceUrlWithArgs = add_query_arg('format', 'json', $serviceUrlWithArgs);
  $serviceUrlWithArgs = add_query_arg('maxwidth', (int) $defaults['width'], $serviceUrlWithArgs);
  $serviceUrlWithArgs = add_query_arg('maxheight', (int) $defaults['height'], $serviceUrlWithArgs);

  $response = wp_remote_get($serviceUrlWithArgs, array('reject_unsafe_urls' => true));

  if(501 == wp_remote_retrieve_response_code($response))
    return new WP_Error('not-implemented');
  if(! $body = wp_remote_retrieve_body($response))
    return false;

  $data = json_decode(trim($body));

  if(!is_object($data) || empty($data->type))
    return false;

  if(!empty($data->html) && is_string($data->html))
   return $data->html;

  return false;
}

 wp_embed_register_handler('animoto', '#http://animoto.com/play/[a-zA-Z0-9]{22}#i', 'wp_embed_handler_animoto');

 ?>