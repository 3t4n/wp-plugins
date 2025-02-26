<?php
/*
Plugin Name: Admin Email Carbon Copy
Plugin URI: https://wordpress.org/plugins/admin-email-carbon-copy
Description: Copies the admin user in on all emails
Version: 1.0
Author: Annesley Newholm
License: GPL2
*/

// No script kiddies
if ( ! defined( 'ABSPATH' ) ) exit; 

function admin_email_carbon_copy_wp_mail($args){
  $admin_email = get_option( 'admin_email' );
  if ( $admin_email && $args['to'] != $admin_email ) {
    $subject = 'Admin Copy from ' . get_option('blogname');
    $message = $args['to'] . "\n" . $args['subject'] . "\n" . $args['message'];
    remove_filter( 'wp_mail', 'admin_email_carbon_copy_wp_mail', 10 );
    wp_mail( $admin_email, $subject, $message, $args['headers'], $args['attachments'] );
    add_filter(    'wp_mail', 'admin_email_carbon_copy_wp_mail', 10, 1 );
  }
  
  return $args;
}
add_filter( 'wp_mail', 'admin_email_carbon_copy_wp_mail', 10, 1 );
