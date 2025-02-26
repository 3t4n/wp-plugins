<?php
/**
 * Plugin Name: Auto Fill Form Fields
 * Description: Auto fill any form fields with info passed through the URL of a link. https://example.com/?name=JohnDoe
 * Version: 1.2
 * Author: Adrian Tobey
 * Author URI: http://www.trainingbusinesspros.com/the-team/
 *
 * Copyright (c) Training Business Pros 2016
 * 25 Lesmill Road, Toronto, Ontario, July 2016
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
define('VERSION', '1.2');

function faf_activate(){
    register_uninstall_hook(__FILE__,'faf_deactivate_script');
}

function faf_deactivate_script(){
    wp_dequeue_script( 'faf-form-auto-populate' );
    wp_deregister_script('faf-form-auto-populate');
}

function faf_add_script() {
    wp_register_script( 'faf-form-auto-populate', plugins_url( 'js/form-auto-fill-js.js', __FILE__ ), array(), VERSION , true );
    wp_enqueue_script( 'faf-form-auto-populate' );
}

register_activation_hook(__FILE__, 'faf_activate');
add_action( 'wp_enqueue_scripts', 'faf_add_script' );
