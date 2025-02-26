<?php
/*
    Plugin Name: AddFunc IDs
    Version: 1.0
    Plugin URI: https://wordpress.org/plugins/addfunc-adaptive-content
    Description: Adds a button that allows authors/editors to easily generate ID attributes for subheadings.
    Author: AddFunc
    Author URI: http://profiles.wordpress.org/addfunc
    License: GPL v3
           ______
       _  |  ___/   _ _ __   ____
     _| |_| |__| | | | '_ \ / __/™
    |_ Add|  _/| |_| | | | | (__
      |_| |_|   \__,_|_| |_|\___\
*/



/*
    F U N C T I O N S
    =================
*/

# Register tinyMCE Plugin & Button
add_action('init','aFIDsRegMCEPlugin');
function aFIDsRegMCEPlugin(){
  add_filter('mce_external_plugins','aFIDsMCEPlugin');
  add_filter('mce_buttons','aFIDsRegButton');
}
# tinyMCE Plugin
function aFIDsMCEPlugin($plugin_array){
  $plugin_array['aFIDs'] = plugins_url('js/addfunc-ids-mce.js',__FILE__);
  return $plugin_array;
}
# tinyMCE Buttons
function aFIDsRegButton($buttons){
  array_push($buttons,'aFIDsAddID');
  array_push($buttons,'aFIDsRemoveID');
  return $buttons;
}
function aFIDsEnqCSS() {
  wp_enqueue_style('aFIcons', plugins_url('css/aFIcons.css', __FILE__));
  wp_enqueue_style('afidscss', plugins_url('css/addfunc-ids-mce.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'aFIDsEnqCSS');
