<?php
/*
Plugin Name: Allow Accents and Special Characters in Permalinks
Plugin URI: https://arpentechnologies.com
Description: Allow you to put accents and special character in your posts permalinks (URLs).
Version: 1.0
Author: Arpen Technologies
Author URI: http://arpentechnologies.com
License: GPL2
*/
remove_filter( 'sanitize_title', 'sanitize_title_with_dashes');
function allow_accented_characters_permalinks( $title, $raw_title, $context ) {
  if ( $context == 'save' ){
	 $filter1 = str_replace(" ", "-", $raw_title);
	 $filter2 = strtolower($filter1);
 	 return rawurlencode($filter2);
 }else{
   $newTitle = str_replace(" ", "-", $title);
   return strtolower($newTitle);
  }
}
add_filter( 'sanitize_title', 'allow_accented_characters_permalinks', 9, 3 );