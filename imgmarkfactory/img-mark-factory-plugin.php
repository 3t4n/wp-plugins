<?php
/**
 * Plugin Name:       ImgMarkFactory
 * Description:       Add professional watermarks to your images with real-time preview and drag-and-drop positioning. Support for both text and image watermarks.
 * Version:           1.0.0
 * Requires at least: 5.0
 * Requires PHP:      7.2
 * Author:            ntuummm
 * Author URI:        https://ntuummm.github.io/my/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       imgmarkfactory
 */


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Check GD Library.
if (!extension_loaded('gd')) {
    add_action('admin_notices', function () {
        echo '<div class="notice notice-error"><p>GD Library is not enabled on this server. ImgMarkFactory Plugin requires GD Library to function.</p></div>';
    });
    return;
}

// Enqueue scripts and styles.
add_action('admin_enqueue_scripts', function ($hook) {
    if ($hook === 'tools_page_img_mark_factory') {
        wp_enqueue_media();
        wp_enqueue_script('img-mark-factory-script', plugin_dir_url(__FILE__) . 'assets/js/img-mark-factory.js', ['jquery'], '1.0.0', true);
        wp_enqueue_style('img-mark-factory-style', plugin_dir_url(__FILE__) . 'assets/css/img-mark-factory.css', [], '1.0.0');
        wp_localize_script('img-mark-factory-script', 'imgMarkFactoryData', [
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('export_image_with_watermark'), // Create the nonce
        ]);
    }
});

// Add a menu under Tools.
add_action('admin_menu', function () {
    add_submenu_page(
        'tools.php',
        'ImgMarkFactory',
        'ImgMarkFactory',
        'manage_options',
        'img_mark_factory',
        'imgmarkfactor_page'
    );
});

// Watermark Page Content.
function imgmarkfactor_page()
{
    ?>
    <div class="wrap">
        <h1>ImgMarkFactory Plugin</h1>
        <form id="watermark-form">
            <!-- Images Selection -->
            <div>
                <label for="select-images">Select Images (Limit 3):</label>
                <button type="button" id="select-images-button" class="button">Select from Media</button>
                <input type="hidden" id="selected-images" name="selected_images" value="">
                <div id="preview-selected-images"></div>
            </div>

            <!-- Watermark Type -->
            <div>
                <label>Watermark Type:</label>
                <select id="watermark-type" name="watermark_type">
                    <option value="text">Text</option>
                </select>
            </div>

            <!-- Text Watermark Options -->
            <div id="watermark-text-options">
                <label for="watermark-text">Watermark Text:</label>
                <input type="text" id="watermark-text" name="watermark_text">
            </div>

            <!-- Text Color Options -->
            <div id="watermark-text-color-options">
                <label for="watermark-color">Watermark Text Color:</label>
                <div id="color-palette">
                    <div class="color-option" data-color="#FFFFFF" style="background-color: #FFFFFF;"></div>
                    <div class="color-option" data-color="#000000" style="background-color: #000000;"></div>
                    <div class="color-option" data-color="#FF0000" style="background-color: #FF0000;"></div>
                    <div class="color-option" data-color="#00FF00" style="background-color: #00FF00;"></div>
                    <div class="color-option" data-color="#0000FF" style="background-color: #0000FF;"></div>
                </div>
                <input type="hidden" id="watermark-color" name="watermark_color" value="#FFFFFF">
            </div>

            <!-- Image Watermark Options -->
            <div id="watermark-image-options" style="display: none;">
                <label for="watermark-image">Select Watermark Image:</label>
                <button type="button" id="select-watermark-image-button" class="button">Select from Media</button>
                <input type="hidden" id="watermark-image" name="watermark_image" value="">
            </div>

            <!-- Watermark Position -->
            <div>
                <label for="watermark-position">Watermark Position:</label>
                <select id="watermark-position" name="watermark_position">
                    <option value="center">Center</option>
                    <option value="bottom-right">Bottom Right</option>
                </select>
            </div>


            <!-- Watermark Opacity -->
            <div>
                <label for="watermark-opacity">Watermark Opacity (0 to 1):</label>
                <input type="number" id="watermark-opacity" name="watermark_opacity" step="0.1" min="0.1" max="1"
                    value="0.7">
            </div>

            <!-- Preview Section -->
            <div id="watermark-preview">
                <h3>Preview</h3>
                <span><strong>Tip:</strong> You can adjust the position of the text or image watermark by dragging it
                    directly on the preview!
                    <br>
                    <strong>Note:</strong> The preview quality may appear low, but this does not
                    affect the quality of the final export.</span>

                <div id="watermark-preview-area"></div>
            </div>

            <!-- Buttons -->
            <button type="button" id="export-image-with-watermark-button" class="button button-primary">Apply
                Watermark</button>
            <button type="button" id="reset-button" class="button button-secondary">Reset</button>
            <div>
                <p><strong>Please note:</strong> You can export up to 20 images per hour. This limit helps ensure optimal
                    performance for all
                    users.</p>
            </div>
            <div id="watermark-message" style="margin-top: 10px; padding: 10px; display: none; border-radius: 5px;"></div>
            <div id="loading-overlay"></div>
            <div id="loading-indicator" style="display: none;">
                <p id="loading-text">Processing, please wait</p>
            </div>
        </form>
    </div>

    <?php
}

/**
 * Convert WordPress image attachment ID to base64 string with type validation
 * 
 * @param int $attachment_id WordPress attachment ID
 * @return string|false Base64 encoded image string or false on failure
 */
function imgmarkfactory_get_base64_from_image_id($attachment_id)
{
    // Check if ID is valid
    if (!$attachment_id || !is_numeric($attachment_id)) {
        return false;
    }

    // Get attachment post
    $attachment = get_post($attachment_id);
    if (!$attachment) {
        return false;
    }

    // Verify this is an attachment
    if ($attachment->post_type !== 'attachment') {
        return false;
    }

    // Get attachment mime type
    $mime_type = get_post_mime_type($attachment_id);
    if (!$mime_type) {
        return false;
    }

    // Validate mime type
    $allowed_mime_types = array(
        'image/jpeg',
        'image/png',
    );

    if (!in_array($mime_type, $allowed_mime_types)) {
        return false;
    }

    // Get attachment URL
    $image_url = wp_get_attachment_url($attachment_id);
    if (!$image_url) {
        return false;
    }

    // Get the image data using wp_remote_get
    $response = wp_remote_get($image_url, array(
        'timeout' => 60,
        'sslverify' => false
    ));

    // Check for errors
    if (is_wp_error($response)) {
        return false;
    }

    // Get image data
    $image_data = wp_remote_retrieve_body($response);

    // Verify content type from response matches attachment mime type
    $response_content_type = wp_remote_retrieve_header($response, 'content-type');
    if ($response_content_type !== $mime_type) {
        return false;
    }

    // Check if we got valid image data
    if (empty($image_data)) {
        return false;
    }

    // Return base64 encoded string with mime type
    return 'data:' . $mime_type . ';base64,' . base64_encode($image_data);
}

function imgmarkfactory_check_remote_file_size_by_id($attachment_id)
{
    // Get the URL of the attachment
    $url = wp_get_attachment_url($attachment_id);

    if (!$url) {
        wp_send_json_error('Invalid attachment ID or file URL not found.', 400);
    }

    // Fetch headers only
    $response = wp_remote_head($url);

    if (is_wp_error($response)) {
        wp_send_json_error('Failed to fetch remote file: ' . $response->get_error_message(), 400);
    }

    // Retrieve the Content-Length header
    $contentLength = wp_remote_retrieve_header($response, 'content-length');

    if (!$contentLength) {
        wp_send_json_error('Content-Length header is missing. Unable to determine file size.', 400);
    }

    $fileSize = intval($contentLength); // Convert size to integer
    $fileSizeLimit = 1 * 1024 * 1024; // 1 MB in bytes

    if ($fileSize > $fileSizeLimit) {
        wp_send_json_error('File exceeds 1 MB size limit.', 400);
    }

    return $fileSize;
}



add_action('wp_ajax_export_image_with_watermark', function () {
    try {
        global $wp_filesystem;

        // Verify the nonce
        if (!isset($_POST['_wpnonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['_wpnonce'])), 'export_image_with_watermark')) {
            wp_send_json_error('Invalid nonce verification.', 400);
        }

        // Ensure the filesystem is initialized
        if (!function_exists('WP_Filesystem')) {
            require_once ABSPATH . 'wp-admin/includes/file.php';
        }

        if (!WP_Filesystem()) {
            wp_send_json_error('Unable to initialize WordPress filesystem.', 500);
        }


        $payload = [];

        // Validate and sanitize sourceImageId input
        $sourceImageId = isset($_POST['sourceImageId']) ? intval($_POST['sourceImageId']) : 0;
        if (!$sourceImageId) {
            wp_send_json_error('Missing or invalid sourceImageId ID.', 400);
        }

        $sourceImagePath = get_attached_file($sourceImageId);
        if (!$sourceImagePath || !file_exists($sourceImagePath)) {
            wp_send_json_error('Image not found.', 404);
        }

        $base64SourceImage = imgmarkfactory_get_base64_from_image_id($sourceImageId);
        if (!$base64SourceImage) {
            wp_send_json_error('Failed to encode image.', 400);
        }
        imgmarkfactory_check_remote_file_size_by_id($sourceImageId);
        $payload["base64SourceImage"] = $base64SourceImage; // set payload

        $sourceImageInfo = pathinfo($sourceImagePath);
        if (strtolower($sourceImageInfo['extension']) === 'png') {
            $sourceImageResource = imagecreatefrompng($sourceImagePath);
            imagesavealpha($sourceImageResource, true);
        } else {
            $sourceImageResource = imagecreatefromjpeg($sourceImagePath);
        }
        $canvasWidth = isset($_POST['canvasWidth']) ? intval($_POST['canvasWidth']) : 300;
        $payload["canvasWidth"] = $canvasWidth; // set payload
        $canvasHeight = isset($_POST['canvasHeight']) ? intval($_POST['canvasHeight']) : 300;
        $payload["canvasHeight"] = $canvasHeight; // set payload



        $sourceImageName = $sourceImageInfo['basename'];
        $payload["sourceImageName"] = $sourceImageName; // set payload


        $watermarkType = isset($_POST['watermarkType']) ? sanitize_text_field(wp_unslash($_POST['watermarkType'])) : '';
        $payload["watermarkType"] = $watermarkType; // set payload

        if ($watermarkType == "image") {
            $watermarkImageId = isset($_POST['watermarkImageId']) ? intval($_POST['watermarkImageId']) : 0;
            if (!$watermarkImageId) {
                wp_send_json_error('Missing or invalid watermarkImageId ID.', 400);
            }

            $watermarkImagePath = get_attached_file($watermarkImageId);
            if (!$watermarkImagePath || !file_exists($watermarkImagePath)) {
                wp_send_json_error('Image not found.', 404);
            }

            $base64WatermarkImage = imgmarkfactory_get_base64_from_image_id($watermarkImageId);
            if (!$base64WatermarkImage) {
                wp_send_json_error('Failed to encode image.', 400);
            }
            imgmarkfactory_check_remote_file_size_by_id($watermarkImageId);
            $payload["base64WatermarkImage"] = $base64WatermarkImage; // set payload
        } else if ($watermarkType == "text") {
            $watermarkText = isset($_POST['watermarkText']) ? sanitize_text_field(wp_unslash($_POST['watermarkText'])) : '';
            $payload["watermarkText"] = $watermarkText; // set payload
        } else {
            wp_send_json_error('Invalid watermark type.', 400);
        }

        $watermarkOpacity = isset($_POST['watermarkOpacity']) ? floatval($_POST['watermarkOpacity']) : 1.0;
        $payload["watermarkOpacity"] = $watermarkOpacity; // set payload

        $watermarkTextColor = isset($_POST['watermarkTextColor']) ? sanitize_text_field(wp_unslash($_POST['watermarkTextColor'])) : '#000000';
        $payload["watermarkTextColor"] = $watermarkTextColor; // set payload
        $watermarkXPosition = isset($_POST['watermarkXPosition']) ? floatval($_POST['watermarkXPosition']) : 0;
        $payload["watermarkXPosition"] = $watermarkXPosition; // set payload
        $watermarkYPosition = isset($_POST['watermarkYPosition']) ? floatval($_POST['watermarkYPosition']) : 0;
        $payload["watermarkYPosition"] = $watermarkYPosition; // set payload



        $apiUrl = 'https://api.ntuummm.com/api/free/v1/export-images-with-watermark';
        // Send the request to the  backend
        $response = wp_remote_post($apiUrl, [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => wp_json_encode($payload),
            'timeout' => 30,
        ]);

        if (is_wp_error($response)) {
            wp_send_json_error('Failed to communicate with the backend.', 500);
        }

        $responseCode = wp_remote_retrieve_response_code($response);
        if ($responseCode !== 200) {
            $errorMessage = "";
            if (isset($response['body'])) {
                $errorMessage = $response['body'];
            }
            wp_send_json_error($errorMessage, $responseCode);
        }

        $responseBody = wp_remote_retrieve_body($response);
        $responseData = json_decode($responseBody, true);
        if (!isset($responseData['imageName']) || !isset($responseData['resultData'])) {
            wp_send_json_error('Invalid response from backend: Missing imageName or resultData.', 400);
        }

        $resultImageName = sanitize_file_name($responseData['imageName']);
        $base64Image = $responseData['resultData'];
        $decodedImage = base64_decode(str_replace('data:image/', '', strstr($base64Image, ',')));

        if (!$decodedImage) {
            wp_send_json_error('Failed to decode the base64 image.', 400);
        }

        $uploadDir = wp_upload_dir();
        $outputFolder = $uploadDir['basedir'] . '/img-mark-factory-exported';

        if (!file_exists($outputFolder)) {
            wp_mkdir_p($outputFolder);
        }

        $filePath = $outputFolder . '/' . $resultImageName;
        if (!$wp_filesystem->put_contents($filePath, $decodedImage, FS_CHMOD_FILE)) {
            wp_send_json_error('Failed to save the image to WordPress storage.', 500);
        }

        $fileUrl = $uploadDir['baseurl'] . '/img-mark-factory-exported/' . $resultImageName;
        wp_send_json_success(['message' => 'Watermark applied successfully.', 'image_url' => $fileUrl]);
    } catch (Exception $e) {
        wp_send_json_error('Unexpected error ' . $e->getMessage(), 400);
    }
});
