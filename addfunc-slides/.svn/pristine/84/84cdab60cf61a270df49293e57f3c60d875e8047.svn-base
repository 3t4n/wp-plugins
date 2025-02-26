<?php


/*
    M C E   B U T T O N S
    =====================
*/

# Register tinyMCE Plugin & Button
add_filter('mce_external_plugins','aFSMCEPlugin');
add_filter('mce_buttons_4','aFSRegButton');
# tinyMCE Plugin
function aFSMCEPlugin($plugin_array){
  global $post_type;
  if('slides' == $post_type){
    $plugin_array['aFSMCE'] = plugins_url('js/addfunc-slides-mce.js',__FILE__);
    return $plugin_array;
  }
  else {
    return $plugin_array;
  }
}
# tinyMCE Buttons
function aFSRegButton($buttons){
  global $post_type;
  if('slides' == $post_type){
    array_push($buttons,'aFSLeft');
    array_push($buttons,'aFSRight');
    array_push($buttons,'aFSUp');
    array_push($buttons,'aFSDown');
    array_push($buttons,'aFSClock');
    array_push($buttons,'aFSCntrClock');
    array_push($buttons,'aFSMor');
    array_push($buttons,'aFSLes');
    return $buttons;
  }
  else {
    return $buttons;
  }
}
function aFSEnqCSS() {
  global $post_type;
  if('slides' == $post_type){
    wp_enqueue_style('aFScss', plugins_url('/css/mce-icons.css', __FILE__));
  }
}
add_action('admin_enqueue_scripts', 'aFSEnqCSS');
