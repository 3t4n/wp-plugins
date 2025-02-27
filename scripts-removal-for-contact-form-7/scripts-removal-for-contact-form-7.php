<?php
/*
Plugin Name: Scripts Removal for Contact Form 7
Plugin URI: https://wordpress.org/plugins/scripts-removal-for-contact-form-7/
Description:  Remove Contact Form 7 CSS and JS Unless Contact form 7 shortcode is used.
Version: 1
Author: Amit Mittal
Author URI: 
*/


/* version check */
global $wp_version;

if(version_compare($wp_version,"4.9.6","<")) {
	exit(__('Scripts Removal for Contact Form 7 requires WordPress version4.9 or higher. 
				<a href="http://codex.wordpress.org/Upgrading_Wordpress">Please update!</a>', 'scripts-removal-for-contact-form-7'));
}


function scripts_removal_contact_form_7() {
    global $post;
    if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'contact-form-7') ) {
        wp_enqueue_script('contact-form-7');
         wp_enqueue_style('contact-form-7');

    }else{
        wp_dequeue_script( 'contact-form-7' );
        wp_dequeue_style( 'contact-form-7' );
    }
}
add_action( 'wp_enqueue_scripts', 'scripts_removal_contact_form_7',PHP_INT_MAX);
?>