<?php
/**
 * Helper functions for handling plugin images
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get the attachment ID for the logo image
 * 
 * @return int|false Attachment ID or false if not found
 */
function albfre_get_logo_attachment_id() {
    // You'll need to implement the logic to get the attachment ID
    // This could involve storing the ID in options when the plugin is activated
    // or using get_page_by_title() to find the image by filename
    $attachment = get_page_by_title('albfre_logo-bg', OBJECT, 'attachment');
    return $attachment ? $attachment->ID : false;
}

/**
 * Get the attachment ID for the reload icon
 * 
 * @return int|false Attachment ID or false if not found
 */
function albfre_get_reload_icon_attachment_id() {
    $attachment = get_page_by_title('albfre_reload', OBJECT, 'attachment');
    return $attachment ? $attachment->ID : false;
} 