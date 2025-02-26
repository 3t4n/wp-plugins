<?php
/*
Plugin Name: Accept Shorcodes - Contact Form 7
Plugin URI: http://wordpress.org/plugins/accept-shortcodes-contact-form-7/
Description: A simple addon to Contact Form 7 to enable external shortcodes within form and message body. 
Author: Ekin Tertemiz
Version: 1.1
Author URI: http://ekn.dev/
*/

// Source: https://stackoverflow.com/a/33382282
// Allow custom shortcodes in CF7 HTML form
add_filter( 'wpcf7_form_elements', 'do_shortcodes_wpcf7_form' );
function do_shortcodes_wpcf7_form( $form ) {
    $form = do_shortcode( $form );
    return $form;
}

// Allow custom shortcodes in CF7 mailed message body
add_filter( 'wpcf7_mail_components', 'do_shortcodes_wpcf7_mail_body', 10, 2 );
function do_shortcodes_wpcf7_mail_body( $components, $number ) {
    $components['body'] = do_shortcode( $components['body'] );
    return $components;
};