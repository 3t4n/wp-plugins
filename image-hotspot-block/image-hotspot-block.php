<?php

/**
 * Plugin Name: Image Hotspot Block
 * Description: Image Hotspot Block lets you create dynamic images with links to your products.
 * Version: 1.0.4
 * Author: Studio Kobune
 * Author URI: https://studiokobune.com
 * Text Domain: image-hotspot-block
 * Domain Path: /languages
 */

if(!defined( 'ABSPATH' )) exit; // Exit if accessed directly

class ImageHotspotBlock {
  function __construct() {
    require_once __DIR__ . '/inc/required-plugins.php';

    $url = plugin_dir_url(__FILE__);
    define('IMAGE_HOTSPOT_BLOCK_PLUGIN_URL',$url);

    add_action( 'init', array($this, 'registerBlock'));
  }

  function loadTextDomain() {
    load_plugin_textdomain( 'image-hotspot-block', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
  }

  function registerBlock() {
    $this->loadTextDomain();

    require_once __DIR__ . '/classes/ImageHotspotBlockRenderer.php';
    
    if (class_exists('ImageHotspotBlockRenderer')) {
      $renderer = new ImageHotspotBlockRenderer();

      register_block_type( __DIR__ . '/config/image-hotspot-block.json', array(
        'render_callback' => array($renderer, 'render')
      ) );
    }
  }
}

$imagehotspotblock = new ImageHotspotBlock();
