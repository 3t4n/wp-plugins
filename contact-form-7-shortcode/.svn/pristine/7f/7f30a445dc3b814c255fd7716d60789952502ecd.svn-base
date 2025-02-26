<?php
/*
Plugin Name: Contact Form 7 Shortcode
Plugin URI: http://andreihusanu.ro/projects/wordpress/plugins/contact-form-7-shortcode/
Description: Enable custom shortcode in contact form 7's forms
Author: Andrei Husanu
Author URI: http://andreihusanu.ro/
Version: 0.1.1
License: GPLv2 or later
*/

function contact_form_7_shortcode_filter( $form ) {
	return do_shortcode( $form );
}

add_filter( 'wpcf7_form_elements', 'contact_form_7_shortcode_filter' );
