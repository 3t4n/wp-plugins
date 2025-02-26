<?php
/**
 * Plugin Name: Admin Sticky Notes
 * Plugin URI: 
 * Description: Add Sticky note to admin area For better Remebrance
 * Version: 1.0.0
 * Author: Farhan Girach
 * Author URI: fg-webdesigner.com
 * License: GPL2
 */
if ( ! defined( 'WPINC' ) ) { die; }
function load_adminnote_style($hook) {   
  wp_enqueue_style( 'note_css', plugins_url('css/main.css', __FILE__) );
  wp_enqueue_style( 'font_css', 'https://fonts.googleapis.com/css?family=Handlee' );
  wp_enqueue_style( 'font_test_css', 'https://fonts.googleapis.com/css?family=Montserrat:500&amp;subset=cyrillic,cyrillic-ext,latin-ext,vietnamese' );
  wp_enqueue_script( 'interect_js', plugins_url('js/interact.js', __FILE__));
  wp_enqueue_script( 'note_custom_js', plugins_url('js/custom.js', __FILE__));

}
add_action( 'admin_enqueue_scripts', 'load_adminnote_style' );

add_action( 'admin_menu', 'linked_url' );
    function linked_url() {
    add_menu_page( 'linked_url', 'Sticky Note', 'read', 'asn_but', '', 'dashicons-editor-table', 2 );
    }

    add_action( 'admin_menu' , 'linkedurl_function' );
    function linkedurl_function() {
     
    }