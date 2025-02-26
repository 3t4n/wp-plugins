<?php
/**
 * Functions
 *
 * @package Avatar Proxy
 * @author Frans Allen
 */

# Exit if accessed directly

if ( !defined('ABSPATH') ) exit;

# Create function for edit the gravatar default uri

function avatar_proxy_replace_gravatar_uri($avatar) {
  # Get the match for gravatar uri
  preg_match('#(https?:\/\/0|https?:\/\/1|https?:\/\/2|https?:\/\/www|https?:\/\/en|https?:\/\/secure)\.gravatar\.com\/avatar\/'.'([\wp+]?[\?[\wp|=]+]?s)#',
    $avatar,
    $matches
  );

  $siteurl = AVATAR_LOCAL_SERVER;

  # Replace the gravatar with the proxy
  return str_replace(
    $matches[0],
    $siteurl . AVATAR_PROXY_RULES . '?apid=' . urlencode($matches[2]),
    $avatar
  );
}

# Except the options-discussion page.

preg_match('/[\wp\-]+.php/', $_SERVER['SCRIPT_FILENAME'], $match);

$current_page = array_shift($match);

if ($current_page !== 'options-discussion.php') {
  add_filter('get_avatar', 'avatar_proxy_replace_gravatar_uri', 10, 5);
}
