<?php

/*
Plugin name: Ad Block Defender
Version: 1.1
Description: This plugin will ask users to reconsider their ad blocking preferences.  
Author: IPDM Solutions LLC
Author URI: http://www.ipdmsolutions.com/about-us/
*/


function ABD_script()
   {
      echo '<script>Running=1;</script>';
      wp_enqueue_script('js1', plugin_dir_url(__FILE__) . "ads.js", array("jquery"), '1.0.0', true);

      wp_enqueue_script('js2', plugin_dir_url(__FILE__) . "script.js", array("jquery"), '1.0.0', true);
   }

   add_action("wp_footer", "ABD_script");

?>
