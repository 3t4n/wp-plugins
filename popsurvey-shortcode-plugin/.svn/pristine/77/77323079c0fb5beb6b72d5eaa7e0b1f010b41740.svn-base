<?php
/*
Plugin Name: PopSurvey Shortcode Plugin
Description: Embed a PopSurvey wherever you'd like with a shortcode. Usage: [popsurvey s="aw15ut"]
Version: 0.1
Author: PopSurvey
Author URI: http://popsurvey.com
*/

function popsurvey_parse($atts){
  extract(shortcode_atts(array(
    's' => ''
  ), $atts));
  
  if (!$s){
    $error = "Hmm, seems something is wrong with your shortcode. Did you copy and paste it from your PopSurvey Promote page?";
    
    return $error;
  } else {
    $embed = '<iframe src="http://www.popsurvey.com/s/'.$s.'?embed=true" scrolling="no" frameborder="0" style="border:none;overflow:hidden;width:590px;height:432px;" allowTransparency="true"></iframe>';

    return $embed;
  } 
}

add_shortcode("popsurvey","popsurvey_parse");

?>