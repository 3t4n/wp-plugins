<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
Plugin Name: Atlas Discuss Quote Form Demo
Plugin URI: http://shop.atlassoftweb.com/extensions/wordpress-plugin.html
Description: Simple but flexible, Atlas Discuss Quote Form is a graph rich form which a customer can submit while getting an approximate insight to the budget of the project he is requesting for.
Author: Atlas Soft Web
Author URI: https://www.atlassoftweb.com/
Text Domain: atlas-discuss-form-demo
Version: 1.0.3
*/

define( 'ADF_PLUGIN', __FILE__ );
define( 'ADF_PLUGIN_BASENAME', plugin_basename( ADF_PLUGIN ) );
define( 'ADF_PLUGIN_NAME', trim( dirname( ADF_PLUGIN_BASENAME ), '/' ) );
define( 'ADF_PLUGIN_DIR', untrailingslashit( dirname( ADF_PLUGIN ) ) );

require_once ADF_PLUGIN_DIR . '/settings.php';

if (! function_exists('adf_plugin_install')) {
  function adf_plugin_install()
  {
      global $wpdb;

      /*--------- Create Dir inside Upload Folder -------*/
      $upload = wp_upload_dir();
      $upload_dir = $upload['basedir'];
      $upload_dir = $upload_dir . '/discuss-form';
      if (! is_dir($upload_dir)) {
      mkdir( $upload_dir, 0700 );
      }

  }
  register_activation_hook(__FILE__, 'adf_plugin_install');
}
?>
