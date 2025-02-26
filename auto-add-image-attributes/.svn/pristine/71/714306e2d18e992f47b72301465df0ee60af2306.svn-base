<?php
/*
Plugin Name: Auto Add Image Attributes
Description: Automatically add image's Title, Caption, Alt Text and Description from image's filename with this WordPress plugin.
Version: 1.0
Author: Suraj Lulla
Author URI: https://websiters.in/
*/

// Auto Add Image Attributes From Image's Filename by Srj begin

function auto_img_attri( $post_ID ) {
$attachment = get_post( $post_ID );
$attachment_title = $attachment->post_title;
$attachment_title = str_replace( '-', ' ', $attachment_title ); // This removed the hyphen
$attachment_title = ucwords( $attachment_title ); // To change the case of first letter
$uploaded_img = array();
$uploaded_img['ID'] = $post_ID; // This gets the image id
$uploaded_img['post_title'] = $attachment_title; // This is the Title of image
$uploaded_img['post_excerpt'] = $attachment_title; // This is the Caption of image
$uploaded_img['post_content'] = $attachment_title; // This is the Description of image
update_post_meta( $post_ID, '_wp_attachment_image_alt', $attachment_title ); // This is the Alt Text of image
wp_update_post( $uploaded_img );
}

add_action( 'add_attachment', 'auto_img_attri' ); // Final action for the magic wond.

// Auto Add Image Attributes From Image Filename by Srj end