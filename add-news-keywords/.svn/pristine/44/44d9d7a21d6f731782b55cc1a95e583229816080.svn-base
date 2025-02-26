<?php
/*
Plugin Name: Add news_keywords
Plugin URI: http://www.flomei.de/
Description: This plugin adds the "news_keywords" meta tag, so Google News can index your site better.
Version: 1.0
Author: Florian Meier
Author URI: http://www.flomei.de/
License: GPLv3 - http://www.gnu.org/licenses/gpl-3.0.html
*/

// My first plugin. Woooohooo! :-)

add_action('wp_head', 'flo_add_news_meta');

function flo_add_news_meta()
{
   echo flo_prepare_news_meta();
}

function flo_prepare_news_meta()
{
  if(is_single() && !(is_page()) && !(is_attachment()))
  {
     $output .= '<meta name="news_keywords" content="';

     global $wp_query;
     $posttags = get_the_tags($wp_query->post->ID);
     $numberoftags = count($posttags)-1;
     if ($posttags) {
        foreach($posttags as $tag) {
           $output .= $tag->name;
           if($i < $numberoftags) $output .= ',';
           $i++;
        }
     }

     $output .= '">';

     return $output;
  }
}

?>