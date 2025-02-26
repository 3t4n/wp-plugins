<?php
/*
Plugin Name: Our Google Map
Plugin URI:https://github.com/Mdsujansarkar/googleMap/
Description: It helps to show google map.
Version: 1.0
Author: Sujan
Author URI:https://www.facebook.com/sujan1miya
License: GPLv2 or later
Text Domain: google-map
Domain Path: /languages/
*/

class GoogleMap{
	public function __construct(){
		add_action('plugins_loaded', array($this, 'gole_map_textdomain'));
		add_shortcode( 'golema', array($this, 'gole_default_attributes') );
	}
    
    public function gole_default_attributes($attributes){
     
     $deafult = array(
    'place' => 'Mirpur 11',
    'width' => '600',
    'height' => '500',
    'zoom'   => '13'
      );
     $parameter = shortcode_atts($deafult,$attributes);
     ?>
    <iframe width="<?php echo $parameter['width']; ?>" height="<?php echo $parameter['height']; ?>" src="https://maps.google.com/maps?q=<?php echo $parameter['place']; ?>&t=&z=<?php echo $parameter['zoom']; ?>&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
   <?php  
    }

    public function gole_map_textdomain(){
    	load_plugin_textdomain( 'google-map', false, dirname(__FILE__).'/languages' );
    }
}
new GoogleMap();

