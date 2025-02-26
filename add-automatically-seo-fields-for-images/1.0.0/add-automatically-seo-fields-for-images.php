<?php
/**
 * Add Automatically SEO fields for Images
 *
 * Plugin Name: Add Automatically SEO fields for Images
 * Plugin URI:  https://wordpress.org/plugins/add-automatically-seo-fields-for-images/
 * Description: Add automatically main SEO fields for Images when you upload to Media Library
 * Version:     1.0.0
 * Author:      Piranha Designs
 * Author URI:  https://www.piranhadesigns.com
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: add-automatically-seo-fields-for-images
 * Domain Path: /languages
 * Requires at least: 4.9
 * Tested up to: 5.8
 * Requires PHP: 5.2.4
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_action('add_attachment', 'ais_image_meta_upon_image_upload');
function ais_image_meta_upon_image_upload($post_ID) {

    // Check if uploaded file is an image, else do nothing
    if (wp_attachment_is_image($post_ID)) {

        $my_image_title = get_post($post_ID)->post_title;

        // Sanitize the title:  remove hyphens, underscores & extra spaces:
        $my_image_title = preg_replace('%\s*[-_\s]+\s*%', ' ',  $my_image_title);

        // Sanitize the title:  capitalize first letter of every word (other letters lower case):
        $my_image_title = ucwords(strtolower($my_image_title));

        // Create an array with the image meta (Title, Caption, Description) to be updated
        // Note:  comment out the Excerpt/Caption or Content/Description lines if not needed
        $my_image_meta = array(
            'ID'        => $post_ID,            // Specify the image (ID) to be updated
            'post_title'    => $my_image_title,     // Set image Title to sanitized title
            //'post_excerpt'    => $my_image_title,     // Set image Caption (Excerpt) to sanitized title
            'post_content'  => $my_image_title,     // Set image Description (Content) to sanitized title
        );

        // Set the image Alt-Text
        update_post_meta($post_ID, '_wp_attachment_image_alt', $my_image_title.' Image');

        // Set the image meta (e.g. Title, Excerpt, Content)
        wp_update_post($my_image_meta);
    } 
}

?>