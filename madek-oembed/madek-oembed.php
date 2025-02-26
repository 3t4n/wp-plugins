<?php

/*
 * Plugin Name: madek-oembed
 * Version: 0.0.1
 * Plugin URI: https://github.com/Madek/madek-wordpress-oembed-plugin
 * Description: adds medienarchiv.zhdk.ch domain as a trusted oEmbed provider
 * Author: Madek Project
 * Author URI: https://madek.zhdk.ch
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * @package WordPress
 * @author Madek Project
 * @since 0.0.1
 */

// Register oEmbed providers
function madek_oembed_provider() {

  wp_oembed_add_provider(
    'https://medienarchiv.zhdk.ch/entries/*',
    'https://medienarchiv.zhdk.ch/oembed',
    false
  );

}

add_action( 'init', 'madek_oembed_provider' );

?>
