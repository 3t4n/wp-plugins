<?php
/**
* Plugin Name: Multiple Location Google Map
* Plugin URI: https://wordpress.org/plugins/multiple-location-google-map/
* Description: Multiple Location Google Map is a user friendly plugin that doesn't require any coding skills or customization. MLGM allows you to crease a custom post type for location markers on a Google Map along with title and description. This map can be easily embedded into pages using a shortcode or you can also select pages where you want this plugin to be displayed. Location markers can be created with an option to set icons using featured image or choose from different set of icons. Multiple Location Google Map enables you to easily holds your multiple location google map and location specific data.
* License: GPL v2
* Version: 1.0
* Author: Y Design Services
* Author URI: http://www.ydesignservices.com/
* Text Domain: mlgm
* Domain Path: /languages
*/
if (! defined( 'ABSPATH')){
	exit; // Exit if accessed directly
}

final class MultipleLocationGoogleMap{
	       public function __construct() {
           $this->mlgm_define_constants();
           register_activation_hook( __FILE__, array($this,'mlgm_installation'));
           $this->mlgm_installation();
           $this->mlgm_include_files();
		   add_action('plugins_loaded', array($this,'plugin_load_plugin_mlgm'));
	}

	private function mlgm_define_constants() {
		  define('MLGM_PLUGIN_URL', plugin_dir_url( __FILE__ ));
		  define('MLGM_PLUGIN_DIR', plugin_dir_path( __FILE__ ));
	}
	
	function plugin_load_plugin_mlgm() {
    load_plugin_textdomain('mlgm', FALSE, MLGM_PLUGIN_DIR.'languages/');
    }

       private function mlgm_include_files(){
			  if (is_admin()) {
			  include_once(MLGM_PLUGIN_DIR.'includes/admin/admin.php');
          }
		  else {
				   include_once(MLGM_PLUGIN_DIR.'includes/shortcode.php' );
		        }
	}

	function mlgm_installation(){
	   include_once(MLGM_PLUGIN_DIR.'includes/admin/installation.php');
      }
  }
$GLOBALS['MultipleLocationGoogleMap']=new MultipleLocationGoogleMap();
?>