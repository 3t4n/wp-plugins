<?php
//START UPLOAD A IMAGE AND RETURN ITS ATTACHMENT ID.
function apie_image_upload_and_get_id($image_url) {
    // Check if the URL is valid
    if (empty($image_url)) {
        return false;
    }

    // Check if the image already exists in the media library
    $attachment_id = attachment_url_to_postid($image_url);
    if ($attachment_id) {
        // If the image already exists, return the attachment ID
        return $attachment_id;
    }

    // Download the image data using wp_remote_get
    $response = wp_remote_get($image_url);

    if (is_wp_error($response)) {
        return false;
    }

    $image_data = wp_remote_retrieve_body($response);
    
    if (!$image_data) {
        return false;
    }

    // Get the file name from the URL
    $filename = basename($image_url);

    // Define the upload directory
    $upload_dir = wp_upload_dir();
    $upload_path = $upload_dir['path'] . '/' . $filename;

    // Save the image to the WordPress uploads folder
    $saved = file_put_contents($upload_path, $image_data);

    if (!$saved) {
        return false;
    }

    // Prepare the attachment data
    $file_type = wp_check_filetype($filename, null);
    $attachment = array(
        'guid'           => $upload_dir['url'] . '/' . $filename,
        'post_mime_type' => $file_type['type'],
        'post_title'     => sanitize_file_name($filename),
        'post_content'   => '',
        'post_status'    => 'inherit'
    );

    // Insert the attachment into the media library
    $attachment_id = wp_insert_attachment($attachment, $upload_path);

    // Generate attachment metadata
    if ($attachment_id) {
        require_once(ABSPATH . 'wp-admin/includes/media.php');
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        $attachment_metadata = wp_generate_attachment_metadata($attachment_id, $upload_path);
        wp_update_attachment_metadata($attachment_id, $attachment_metadata);
    }

    return $attachment_id;
}
//END UPLOAD A IMAGE AND RETURN ITS ATTACHMENT ID.

//START UPLOAD A FILE AND RETURN ITS ATTACHMENT ID.
function apie_file_upload_and_get_id($file_url) {
    // Check if the URL is valid
    if (empty($file_url)) {
        return false;
    }

    // Try to get the attachment ID from the media library based on the file URL
    $attachment_id = attachment_url_to_postid($file_url);

    if ($attachment_id) {
        // If the file already exists in the media library, return the attachment ID
        return $attachment_id;
    }

    // If the file does not exist, download and upload it
    $file_data = file_get_contents($file_url);

    if (!$file_data) {
        return false;
    }

    // Get the file name from the URL
    $filename = basename($file_url);

    // Define the upload directory
    $upload_dir = wp_upload_dir();
    $upload_path = $upload_dir['path'] . '/' . $filename;

    // Save the file to the WordPress uploads folder
    $saved = file_put_contents($upload_path, $file_data);

    if (!$saved) {
        return false;
    }

    // Prepare the attachment data
    $file_type = wp_check_filetype($filename, null);
    $attachment = array(
        'guid'           => $upload_dir['url'] . '/' . $filename,
        'post_mime_type' => $file_type['type'],
        'post_title'     => sanitize_file_name($filename),
        'post_content'   => '',
        'post_status'    => 'inherit'
    );

    // Insert the attachment into the media library
    $attachment_id = wp_insert_attachment($attachment, $upload_path);

    // Generate attachment metadata (optional, depending on the file type)
    if ($attachment_id) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        $attachment_metadata = wp_generate_attachment_metadata($attachment_id, $upload_path);
        wp_update_attachment_metadata($attachment_id, $attachment_metadata);
    }

    return $attachment_id;
}

//END UPLOAD A FILE AND RETURN ITS ATTACHMENT ID.