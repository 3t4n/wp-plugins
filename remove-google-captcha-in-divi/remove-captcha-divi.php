<?php
/*
Plugin Name: Remove Google captcha in Divi
Description: Removes Google captcha functionality that loads Google's font "Roboto".
Version: 1.0
Author: Jan-Hendrik Wierk
Author URI: https://www.skybrush.de/
*/

if (!defined('ABSPATH')) {
    exit;
}

function rgcid_dequeue_recaptcha() {
    wp_dequeue_script( 'recaptcha-v3' );
	wp_deregister_script( 'recaptcha-v3' );
    wp_dequeue_script( 'et-core-api-spam-recaptcha' );
	wp_deregister_script( 'et-core-api-spam-recaptcha' );
}
add_action( 'wp_print_scripts', 'rgcid_dequeue_recaptcha' );
?>
