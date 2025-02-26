<?php
/*
 * Author: Michael Finkenberger
 * @since V1.2.2.0
 * Last change in plugin version: V1.2.3.0
 * Date: 03.05.2021
 * Tested with the latest plugin version
*/

if(!defined('ABSPATH')) die(); // no direct access



// Shortcode (with separate closing tag): show content for selected roles only
function foodle_display_on_for_roles($atts, $content) {

  if ( strlen($content) == 0 ) return ''; // no separate closing tag or empty content
  
  $role_on = ( isset($atts["roles"]) ) ? $atts["roles"] : '';
  $marking = ( isset($atts["marking"]) ) ? ( $atts["marking"] == 'true' ) : false;

  if ( $role_on != '' ) { // no roles selected: behave as if the shortcode wasn't present
    $roles_on = explode(",", $role_on);
    $current_user = wp_get_current_user();
    if ( count( array_intersect( $roles_on, (array) $current_user->roles ) ) > 0 ) {
      if ( $marking )
        $foodle_out_before = "<div class='foodle-display-on-with-marking' style='border: 1px dashed DarkGoldenRod; margin:0px; padding:6px;'>";
      else
        $foodle_out_before = "<div class='foodle-display-on-no-marking'>";

        $content = $foodle_out_before.$content.'</div>';
    }
    else $content = ''; // hide the content
  }
  if ( $content != '' ) $content = do_shortcode($content); // recursive do_shortode to parse a potential shorcode inside $content
  return $content;
}
function foodle_init_foodle_display_on_for_roles_shortcode(){
  add_shortcode('foodle-display-on-for-roles', 'foodle_display_on_for_roles');
}
add_action('wp_loaded','foodle_init_foodle_display_on_for_roles_shortcode');


