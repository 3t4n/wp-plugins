<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.
if(! is_admin())  add_action('wp_enqueue_scripts', 'armicn_scripts');

function armicn_scripts (){
    // Enqueue Dashicons
    wp_enqueue_style('dashicons');
    wp_enqueue_style( 'armicn-fontawesome', ARMICN_DIR_URL . 'admin/assets/lib/font-awesome/css/all.min.css', array(), ARMICN_VERSION );
    wp_enqueue_style( 'armicn-themify-icons', ARMICN_DIR_URL . 'admin/assets/lib/themify/themify-icons.css', array(), ARMICN_VERSION );
    wp_enqueue_style( 'armicn-style', ARMICN_DIR_URL . 'public/assets/css/armicn.css', array(), ARMICN_VERSION );
}

