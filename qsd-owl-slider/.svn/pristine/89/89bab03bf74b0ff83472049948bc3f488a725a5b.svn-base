<?php

function Rpc_script(){
	 wp_enqueue_style('bootstarp', plugins_url( 'css/bootstrap.min.css', dirname(__FILE__) ) );
	 wp_enqueue_style('rpc-style', plugins_url( 'css/style.css', dirname(__FILE__) ) );
	 wp_enqueue_script('rpc-newsboxscript', plugins_url( 'scripts/newsboxscript.js', dirname(__FILE__) ) );
	 wp_enqueue_script('rpc_newsbox_main', plugins_url( 'scripts/jquery.bootstrap.newsbox.min.js', dirname(__FILE__) ) );

}
add_action('wp_enqueue_scripts','Rpc_script');

 function rpc_admin_script(){
  wp_enqueue_style( 'wp-color-picker' ); 
  wp_enqueue_script('wp-color-picker');
  wp_enqueue_script('rpc_color', plugins_url( 'scripts/color-picker.js', dirname(__FILE__) ) );
 }
 add_action('admin_enqueue_scripts','rpc_admin_script');