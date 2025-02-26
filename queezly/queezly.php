<?php
/*
Plugin Name: Queezly
Plugin URI: http://queezly.com
Description: Easily embed interactive content (quiz, poll, personality test, ranking list) into your blog post.
Version:     1.2
Author:      Queezly
Author URI:  http://queezly.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages/
Text Domain: queezly
*/

define( 'QUEEZLY_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'QUEEZLY_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'QUEEZLY_URL', 'https://app.queezly.com/' );

require_once( QUEEZLY_PLUGIN_DIR . 'includes/queezly-media.php' );

function load_queezly_textdomain() {
  load_plugin_textdomain( 'queezly', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}

function include_queezly_css_files()
{
  wp_enqueue_style(
    'bootstrap_css',
    QUEEZLY_PLUGIN_URL . 'css/bootstrap.css'
  );

  wp_enqueue_style(
    'queezly_css',
    QUEEZLY_PLUGIN_URL . 'css/main.css'
  );
}

add_action('admin_enqueue_scripts', 'include_queezly_css_files');

add_action( 'plugins_loaded', 'load_queezly_textdomain' );

if (is_admin()) {
  wp_queezly_media::init();
} else {
  function queez_func( $atts ) {
    $a = shortcode_atts( array(
      'key' => '',
    ), $atts );

    return '<queezly:iframe data-key="' . $a['key'] . '" data-ev="p"></queezly:iframe>';
  }
  add_shortcode( 'queez', 'queez_func' );

  wp_queezly_media::init();
}
