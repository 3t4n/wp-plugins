<?php
/**
* Plugin Name: Multiple Location Google Map
* Plugin URI: https://wordpress.org/plugins/multiple-location-google-map/
* Description: MLGM allows you to create a custom post type for location markers on a Google Map along with title and description. 
* License: GPL v2
* Version: 1.1
* Author: Ydesignservices
* Author URI: http://www.ydesignservices.com/
* Text Domain: mlgm
* Domain Path: /languages
*/
if (! defined( 'ABSPATH')){
	exit; // Exit if accessed directly
}

final class YDSGoogleMaps{
	       public function __construct() {
           $this->define_constants();
           register_activation_hook( __FILE__, array($this,'installation') );
           $this->installation();
           $this->include_files();
		   add_action('plugins_loaded', array($this,'plugin_load_plugin_mlgm'));
	}

	private function define_constants() {
		  define('YDSGM_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
		  define('YDSGM_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
	}
	
	function plugin_load_plugin_mlgm() {
    load_plugin_textdomain('mlgm', FALSE, YDSGM_PLUGIN_DIR.'languages/');
    }

       private function include_files(){
			  if (is_admin()) {
			  include_once(YDSGM_PLUGIN_DIR.'includes/admin/admin.php');
          }
		  else {
				   include_once(YDSGM_PLUGIN_DIR.'includes/shortcode.php' );
		        }
	}

	function installation(){
	   include_once(YDSGM_PLUGIN_DIR.'includes/admin/installation.php');
      }
  }
$GLOBALS['YDSGoogleMaps'] =new YDSGoogleMaps();
?>