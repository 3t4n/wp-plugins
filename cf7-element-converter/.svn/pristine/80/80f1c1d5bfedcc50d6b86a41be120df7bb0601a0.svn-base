<?php
/**
 * Plugin Name:       Contact Form 7 Element Converter
 * Description:       Convert HTML Elements to Contact Form 7 Shortcodes. Supports: Text, Email, Tel, Number, URL, Textarea
 * Version:           1.0.0
 * Author:            Ken Key
 * Author URI:        https://www.kennykey.com
 * Text Domain:       kennykey
 */


 class CF7_ELEMENT_CONVERTER
 {
     private $prefix = 'cf7_element_converter';
     public function __construct() {

       if(!defined('CF7_ELEMENT_CONVERTER_URL'))
         define('CF7_ELEMENT_CONVERTER_URL', plugin_dir_url( __FILE__ ));
       if(!defined('CF7_ELEMENT_CONVERTER_PATH'))
         define('CF7_ELEMENT_CONVERTER_PATH', plugin_dir_path( __FILE__ ));

         add_action( 'init', [$this, "init"] );

     }


     function init(){
              add_action( 'wpcf7_admin_footer', [$this, 'cf7_element_converter_footer'], 10, 1 );
           }

           function cf7_element_converter_footer(){
             wp_enqueue_script( "cf7_tag_converter", CF7_ELEMENT_CONVERTER_URL."js/admin-script.js", [], true, true);
           }

   }


 $cf7_element_converter = new CF7_ELEMENT_CONVERTER();
