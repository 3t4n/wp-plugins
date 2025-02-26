<?php
/*
Plugin Name: Advanced Comment Validation
Plugin URI: http://www.interactiveitsolutions.com/
Description: Wordpress Comments Validation Plugin
Author: Abhishek Shukla
Version: 2.2
Author URI: http://www.interactiveitsolutions.com/
*/

function wordpress_comment_validation() {
	wp_enqueue_style( 'wordpresscommentvalidation', WP_PLUGIN_URL . '/advanced-comment-validation/css/validation.css');
	wp_enqueue_script('validate', WP_PLUGIN_URL . '/advanced-comment-validation/js/jquery.js', array('jquery'));
	wp_enqueue_script('wordpresscommentvalidation', WP_PLUGIN_URL . '/advanced-comment-validation/js/validation.js', array('jquery','validate'));
}

add_action('init', 'wordpress_comment_validation');

?>