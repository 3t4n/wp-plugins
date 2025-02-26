<?php
/*
* Plugin Name: Auto table scroll
* Description: Adds horizontal scroll to big tables in content if they don't fit, useful on mobile viewport
* Version: 0.0.1
* Author: Elm
* Author URI: https://me.dvr-s.com
*/
function elm_adds_ats_css() { 

    ?>
      <style type="text/css" data-elm-ats>
			.elm-ats-table {
			  overflow-x: auto;
			}
      </style>

   <?php 

}
add_action( 'wp_head', 'elm_adds_ats_css', 109 );

function elm_enables_ats( $text ){
	$pattern = "/<table[^>]*>/";
	$text = preg_replace($pattern, '<div class="elm-ats-table">$0', $text);
	$text = str_replace('</table>', '</table></div>', $text);
	return $text;
}

add_filter('the_content', 'elm_enables_ats');