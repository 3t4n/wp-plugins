<?php 
 /*
 Plugin Name: Extend Business
 Plugin URI: https://extendapp.io/
 Description: Plugin to help connect customers directly to a representative via web calls
 Author: Extend
 Version: 1.0
 Anthor URI: https://extendapp.io
 */ 

 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 function extend_admin() {
    include('wp_extend_admin.php');
 }

 function show_extend_plugin() {
   wp_enqueue_script( "extend_business",'https://extendapp.io/api/plugin.js?publickey='.get_option('extend_public_key'));
 }

 function extend_setting(){
     add_options_page("Extend Business","Extend Business", 1, "Extend Business", "extend_admin");
 }

 add_action('admin_menu','extend_setting');
 add_action('wp_footer','show_extend_plugin');
?>