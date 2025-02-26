<?php
/*
Plugin Name: Falling Snow
Plugin URI: http://serkan.feyvi.org/projects/falling-snow
Description: This plugin displays a falling snow effect on your blog.
Version: 1.0
Author: Serkan Kenar
Author URI: http://serkan.feyvi.org/blog/
*/
?>
<?php

if (!class_exists('FallingSnow')) {
  class FallingSnow {
    
    function FallingSnow() {
      add_action('wp_head', 'fallingsnow_addsnowjs');
    }
    
  } // end class
  
} // end if

function fallingsnow_addsnowjs() 
{
  echo "\n\t<script src=\"" . get_bloginfo('url') . 
      	"/wp-content/plugins/snow/snow.js\" type=\"text/javascript\"></script>\n";
}

if (class_exists('FallingSnow')) {
  $FallingSnow = new FallingSnow();
}
?>
