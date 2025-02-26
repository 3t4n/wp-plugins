<?php
/*
Plugin Name: AdForum oEmbed
Plugin URI: http://wordpress.org/extend/plugins/adforum-oembed/
Description: AdForum Open Embed provider
Version: 1.0.0
Author: jmserra
*/

function adforum_oembed_provider() {
  wp_oembed_add_provider( 'https://www.adforum.com/embed/*', 'https://www.adforum.com/oembed', false );
}

add_action( 'init', 'adforum_oembed_provider' );