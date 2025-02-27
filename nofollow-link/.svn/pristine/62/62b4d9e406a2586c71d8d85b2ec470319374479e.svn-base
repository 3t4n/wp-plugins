<?php
/*
Plugin Name: Nofollow for External Link
Plugin URI: http://alexjose.in
Description: Add rel="nofollow" to any links in your post on the go.
Version: 2.0
Author: Alex Jose (Ginger Codes)
Author URI: http://alexjose.in
*/
 
function nofollow_addbuttons() {
   // Don't bother doing this stuff if the current user lacks permissions
   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
     return;
 
   // Add only in Rich Editor mode
   if ( get_user_option('rich_editing') == 'true') {
     add_filter("mce_external_plugins", "add_nofollow_tinymce_plugin");
     add_filter('mce_buttons', 'register_nofollow_button');
   }
}
 
function register_nofollow_button($buttons) {
   array_push($buttons, "|", "nofollow");
   return $buttons;
}
 
function add_nofollow_tinymce_plugin($plugin_array) {
   $plugin_array['nofollow'] = WP_PLUGIN_URL.'/nofollow-link/mce/nofollow/editor_plugin.js';
   return $plugin_array;
}
 
// init process for button control
add_action('init', 'nofollow_addbuttons');
?>