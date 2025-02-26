<?php

/*
Plugin Name: Hide Text Shortcode
Plugin URI: http://www.crawlermotori.com/210/hide-text-shortcode-plug-wordpress/
Description: Shortcode to hide text in post, category or pages; just add [htsP anchor_text="Read more..."]Some Text[/htsP].
Author: Danilo Franceschini      
Version: 1.1
Author URI: http://www.crawlermotori.com/
*/

add_shortcode('htsP', 'hide_text_shortcode_post');

function hide_text_shortcode_post($atts, $content = null) { ?>
    <script type="text/javascript">
    function visualizza(id){
        if (document.getElementById){
            if(document.getElementById(id).style.display == 'none'){
                document.getElementById(id).style.display = 'block';
            }else{
                document.getElementById(id).style.display = 'none';
            }
        }
    }
    </script><?php
   extract(shortcode_atts(array(
      "anchor_text" => "Read more"
   ), $atts));
    $testo = '<div id="testohtsP"><a href="#" onclick="visualizza(\'bodyhtsP\'); return false">';
    $testo .= $anchor_text;
    $testo .= '</a></div>';        
    $testo .= '<div id="bodyhtsP" style="display:none">';
    $testo .= $content;
    $testo .= '</div>';
    return $testo;

}




