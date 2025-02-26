<?php
/*
  Plugin Name: Random Numbers Generator
  Plugin URI:  https://plugins.codecide.net/product/ranb
  Description: Shortcode to generate random numbers
  Version:     1.0
  Author:      Codecide
  Author URI:  https://plugins.codecide.net/
  License: GPL2
  Requirements: PHP <= 7.1
 */

defined('ABSPATH') or exit;

define('randomnumbers_pluginpath', dirname(__FILE__) . '/');
define('randomnumbers_pluginname', 'randomnumbers_generator');
require_once(randomnumbers_pluginpath .'class/'. randomnumbers_pluginname . '.class.php');

function randomnumbers_generator_shortcode($atts, $content, $shortcode) {
    if (!(is_single() || is_page() || !is_admin())) {
        return;
    }
    $atts = shortcode_atts([
        "range" => null,
        "format" => null,
        "use" => null
        ], $atts, $shortcode);
    $n = new randomNumbers_generator($atts);
    return $n->getResult();
}

add_shortcode('rann', 'randomnumbers_generator_shortcode');

