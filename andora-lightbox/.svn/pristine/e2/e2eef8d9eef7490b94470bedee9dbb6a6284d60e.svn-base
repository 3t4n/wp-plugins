<?php
/**
 * Add scripts, styles and icons
*/
if ( ! defined( 'ABSPATH' ) ) { exit; }

//Register equal heights java script
function abcfal_reg_scripts() {
    wp_register_script( 'abcfal-magnific-js', ABCFAL_PLUGIN_URL . 'templates/abcf-magnific-igf-min-099.js', array( 'jquery' ), ABCFAL_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'abcfal_reg_scripts' );

function abcfal_enq_styles() {
    wp_register_style('abcfal-css-andora', ABCFAL_PLUGIN_URL . 'templates/andora-lightbox-01.css', array(), ABCFAL_VERSION, 'all');
    wp_enqueue_style('abcfal-css-andora');
}
add_action( 'wp_enqueue_scripts', 'abcfal_enq_styles', 10000 );

//Add admin CSS
function abcfal_enq_admin_style() {
    wp_register_style('abcfal-admin', ABCFAL_PLUGIN_URL . 'css/abcfal-admin.css', ABCFAL_VERSION, 'all');
    wp_enqueue_style('abcfal-admin');
}
add_action( 'admin_enqueue_scripts', 'abcfal_enq_admin_style', 100 );