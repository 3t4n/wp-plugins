<?php 
/**
 * Provides options set or default value if field-value is empty 
*/

function exggmap_get_options() {

  $exggmap_get_options = get_option( 'exggmap_option' );

   /* Define the array of defaults */ 
  $defaults = array(
    "exggmap_google_iframe" =>'<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2373.6552195432196!2d10.219831315843969!3d53.49248998000993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47b18f63a9e417a1%3A0x80de4a528b9a4682!2seXactly%20Webdesign!5e0!3m2!1sde!2sde!4v1587038478122!5m2!1sde!2sde" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>',
    "exggmap_button_title"=>__("Load Map",'exactly-gdpr-google-maps'),
    "exggmap_map_width"=>"16",
    "exggmap_map_height"=>"9",
    "exggmap_layer_text"=>__('By loading the map you accept the privacy policy of Google.', 'exactly-gdpr-google-maps'),
    "exggmap_anchor_text"=>__('learn more', 'exactly-gdpr-google-maps'),
    "exggmap_layer_background_color"=>"#000000",
    "exggmap_button_background_color"=>"#693e91",
    "exggmap_layer_font_color"=>"#fff",
    "exggmap_enable_powered_by"=>""
  );

  $exggmap_options = wp_parse_args( array_filter($exggmap_get_options), $defaults );

  if( isset($exggmap_options) ){
    return  $exggmap_options;
  }
  return false;
}