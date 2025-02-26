<?php
/**
 * Plugin Name: Image to WebP Converter
 * Description: Automatically converts uploaded PNG, JPG, and JPEG images to WebP format to enhance website performance and reduce load times for newly added images.
 * Version: 1.0
 * Author: Sachinraj CP
 * Text Domain: image-to-webp
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Requires at least: 5.0
 * Requires PHP: 7.0
 * Tested up to: 6.7
 */


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Hook into the upload process
add_filter('wp_handle_upload', 'image_to_webp_convert_uploaded_image');

function image_to_webp_convert_uploaded_image($upload) {
    // Ensure required fields exist
    if (!isset($upload['file']) || !isset($upload['type'])) {
        image_to_webp_log_debug('Upload data is missing required fields.');
        return $upload;
    }

    $file_path = $upload['file'];
    $file_type = $upload['type'];

    // Check if the file is an image (JPEG, PNG)
    if (in_array($file_type, ['image/jpeg', 'image/png', 'image/jpg'])) {
        $webp_path = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $file_path);

        // Check if GD library is available
        if (!function_exists('imagewebp')) {
            image_to_webp_log_debug('GD library or WebP support is not available.');
            return $upload;
        }

        // Convert the image to WebP
        $image = null;
        if ($file_type === 'image/jpeg' || $file_type === 'image/jpg') {
            $image = @imagecreatefromjpeg($file_path);
        } elseif ($file_type === 'image/png') {
            $image = @imagecreatefrompng($file_path);
        }

        if ($image) {
            // Attempt to save the WebP image
            if (imagewebp($image, $webp_path, 80)) {
                imagedestroy($image);

                // Update the upload array to point to the WebP file
                $upload['file'] = $webp_path;
                $upload['url'] = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $upload['url']);
                $upload['type'] = 'image/webp';
            } else {
                image_to_webp_log_debug('Failed to save WebP image.');
                imagedestroy($image);
            }
        } else {
            image_to_webp_log_debug('Failed to create image resource from file: ' . $file_path);
        }
    }

    return $upload;
}

/**
 * Log debug messages using WordPress logging mechanisms.
 *
 * @param string $message The debug message.
 */
function image_to_webp_log_debug($message) {
    if (defined('WP_DEBUG') && WP_DEBUG && defined('WP_DEBUG_LOG') && WP_DEBUG_LOG) {
        $log_message = '[Image to WebP Converter] ' . $message;

        // Use the error_log mechanism only through do_action('error_log') to maintain compatibility
        do_action('error_log', $log_message); // Triggers WordPress log handling
    }
}
