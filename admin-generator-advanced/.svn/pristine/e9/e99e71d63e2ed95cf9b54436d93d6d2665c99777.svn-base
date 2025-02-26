<?php
//Admin scripts and styles
add_action('admin_enqueue_scripts','agaEnqueue');
//Admin scripts and styles callback
function agaEnqueue(){
  //custom styles
  wp_register_style('agaStyles', plugin_dir_url( __FILE__ ) . '../css/aga.min.css' );
  wp_enqueue_style('agaStyles');
  //used libraries, mimified
  wp_register_script('agaLib', plugin_dir_url( __FILE__ ) . '../js/aga.lib.min.js' );
  wp_enqueue_script('agaLib');
  // custom scripts
  wp_register_script('agaScripts', plugin_dir_url( __FILE__ ) . '../js/aga.min.js' );
  wp_enqueue_script('agaScripts');
}
