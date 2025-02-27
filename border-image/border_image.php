<?php
/*
Plugin Name: Border Image
Plugin URI: https://www.border-image.com
Description: Create border image
Author: Border-Image.com
Version: 0.3
*/

// Basic plugin definitions
define( 'BRDIMG_PLG_NAME', 'border_image' );
define( 'BRDIMG_PLG_VERSION', '0.1' );
define( 'BRDIMG_URL', plugins_url() . '/' . str_replace( basename( __FILE__ ), '', plugin_basename( __FILE__ ) ) );
define( 'BRDIMG_URI', plugin_dir_path(__FILE__) );
define( 'BRDIMG_DIR', WP_PLUGIN_DIR . '/' . str_replace( basename( __FILE__ ), '', plugin_basename( __FILE__ ) ) );

// Plugin INIT
require_once( BRDIMG_DIR . 'inc/install.php' );
require_once( BRDIMG_DIR . 'inc/shortcode.php' );


