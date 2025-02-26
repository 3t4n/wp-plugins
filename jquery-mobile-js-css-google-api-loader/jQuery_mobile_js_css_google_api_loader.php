<?php
 
  /*
 
  Plugin Name: Load jQuery mobile and related css file from google apis
 
  Plugin URI:   ftp.elementarray.com/jQuery_mobile_js_css_google_api_loader.zip
 
  Description: load jQuery mobile and css from cdn
 
  Version:      1.0
 
  Author:       "William Holt"<bill@elementarray.com>
 
  Author URI:       http://www.elementarray.com
 
  License: GPLv3
 
*/
/* ...jquery-mobile */
function jQuery_mobile_js_css_google_api_loader(){
        $version="1.4.0";
            wp_register_script("jquery-mobile",
              "//ajax.googleapis.com/ajax/libs/jquerymobile/".$version."/jquery.mobile.min.js",
              false, $version);
              
            wp_enqueue_script(
              "jquery-mobile",
              array("jquery")
            );
            wp_register_style( "jquery-mobile-css",
                              "//ajax.googleapis.com/ajax/libs/jquerymobile/".$version."/jquery.mobile.min.css" );
            wp_enqueue_style( "jquery-mobile-css" );
}
// as of 6pm wednesday february 26th 2014, 1.4.0 is the latest version
// to get the latest version, edit the functions string parameter below
add_action( "wp_head", jQuery_mobile_js_css_google_api_loader() ); 

?>