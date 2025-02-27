<?php
/**
* Plugin Name: Reviewexchanger Demo Importer
* Description: Import all the demos on your site
* Version: 1.0
* Copyright: 2020
* Text Domain: reviewexchanger-demo-importer
* 
*/
// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit();
}
if (!defined('EDI_PLUGIN_NAME')) {
  define('EDI_PLUGIN_NAME', 'Reviewexchanger Demo Importer');
}
if (!defined('EDI_PLUGIN_VERSION')) {
  define('EDI_PLUGIN_VERSION', '2.0.0');
}
if (!defined('EDI_PLUGIN_FILE')) {
  define('EDI_PLUGIN_FILE', __FILE__);
}
if (!defined('EDI_PLUGIN_DIR')) {
  define('EDI_PLUGIN_DIR',plugins_url('', __FILE__));
}
if (!defined('EDI_BASE_NAME')) {
    define('EDI_BASE_NAME', plugin_basename(EDI_PLUGIN_FILE));
}
if (!defined('EDI_DOMAIN')) {
  define('EDI_DOMAIN', 'reviewexchanger-demo-importer');
}
define( 'EDI_PLUGIN_DIR_PATH' , plugin_dir_path( __FILE__ ) );

$my_theme = wp_get_theme();
switch ( $my_theme->Name ) {
  case 'Goldly':
    require EDI_PLUGIN_DIR_PATH . 'theme/goldly/demo.php';
    break;

  case 'Goldly Pro':
    require EDI_PLUGIN_DIR_PATH . 'theme/goldly-pro/demo.php';
    break;

  case 'Experoner':
    require EDI_PLUGIN_DIR_PATH . 'theme/experoner/demo.php';
    break;

  case 'Experoner Pro':
    require EDI_PLUGIN_DIR_PATH . 'theme/experoner-pro/demo.php';
    break;

  case 'Ecommerce Goldly':
    require EDI_PLUGIN_DIR_PATH . 'theme/ecommerce-goldly/demo.php';
    break;

  case 'Ecommerce Goldly Pro':
    require EDI_PLUGIN_DIR_PATH . 'theme/ecommerce-goldly-pro/demo.php';
    break;

  case 'Goldly Grocery':
    require EDI_PLUGIN_DIR_PATH . 'theme/goldly-grocery/demo.php';
    break;

  case 'Goldly Grocery Pro':
    require EDI_PLUGIN_DIR_PATH . 'theme/goldly-grocery-pro/demo.php';
    break;

  default: 

    break;
}

if (!class_exists('EDI_main')) {

  class EDI_main {

    protected static $EDI_instance;
    
    /*function includes() {
    	include_once('theme/goldly/demo.php');
      include_once('theme/goldly-pro/demo.php');
    }*/


    public static function EDI_do_activation() {
      set_transient('EDI-first-rating', true, MONTH_IN_SECONDS);
    }

    public static function EDI_instance() {
      if (!isset(self::$EDI_instance)) {
        self::$EDI_instance = new self();
        //self::$EDI_instance->init();
        //self::$EDI_instance->includes();
      }
      return self::$EDI_instance;
    }

  }

  add_action('plugins_loaded', array('EDI_main', 'EDI_instance'));

  register_activation_hook(EDI_PLUGIN_FILE, array('EDI_main', 'EDI_do_activation'));
}
