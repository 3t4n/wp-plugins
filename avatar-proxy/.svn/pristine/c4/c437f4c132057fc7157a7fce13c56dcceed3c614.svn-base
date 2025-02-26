<?php
/**
 * Rules
 *
 * Create new rules for avatar proxy.
 * To use this plugin correctly, the $query_vars for 'apid' must be empty.
 *
 * @package Avatar Proxy
 * @author Frans Allen
 */

# Exit if accessed directly

if ( !defined('ABSPATH') ) exit;

# Avatar Proxy Rules / Create the URL

function avatar_proxy_rules() {
  add_rewrite_rule(''.AVATAR_PROXY_RULES.'$', 'index.php?apid=true', 'top');
}
add_action('init', 'avatar_proxy_rules');

# Setting the $query_vars

function avatar_proxy_vars($query_vars) {
  $query_vars[] = 'apid';
  return $query_vars;
}
add_filter('query_vars', 'avatar_proxy_vars');

# Get the proxy file

function avatar_proxy_parse_request($wp) {
  if ( array_key_exists('apid', $wp->query_vars) ) {
    include 'proxy.php';
    exit();
  }

  return;
}
add_action('parse_request', 'avatar_proxy_parse_request');
