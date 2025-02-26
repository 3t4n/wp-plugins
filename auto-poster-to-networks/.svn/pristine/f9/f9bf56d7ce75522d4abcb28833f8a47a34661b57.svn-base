<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
/**
 * Function to post a text message on Bluesky network.
 *
 * @param string $username The username for Bluesky.
 * @param string $password The password for Bluesky.
 * @param string $message The message to post on Bluesky.
 * @return array The response from Bluesky API.
 */

function textposter($access_jwt,$message,$username){
    $post_url = "https://bsky.social/xrpc/com.atproto.repo.createRecord";

    // Get current UTC time in the required format
    $now_str = gmdate("Y-m-d\TH:i:s\Z");
    $post_headers = array(
        "content-type" => "application/json", 
        "Authorization" => "Bearer " . $access_jwt,
    );
    $post_data = json_encode([
        "repo" => $username,
        "collection" => "app.bsky.feed.post",
        "record" => [
            "text" => $message,  // Post the provided message
            "createdAt" => $now_str
        ]
    ]);

    $args = array(
        'method'      => 'POST',
        'timeout'     => 45, // Adjust as needed
        'redirection' => 5,
        'httpversion' => '1.0',
        'blocking'    => true,
        'headers'     => $post_headers,
        'body'        => $post_data,
    );
    
    $response = wp_remote_post( $post_url, $args );

    if ( is_wp_error( $response ) ) {
        $error_message = $response->get_error_message();
        return false; // Or handle the error as needed
    } else {
        $post_response = wp_remote_retrieve_body( $response );
        $post_body = json_decode($post_response,true);
        if (empty($post_body['uri'])) {
            return [
                'error' => 'Post creation failed.',
                'response' => $post_body,
            ];
        }
        $post_status_code = wp_remote_retrieve_response_code( $response );
        return array( 'response' => $post_body, 'status_code' => $post_status_code ); // Return both
    }

}
function blueskypostwithattachment($access_jwt,$username, $message, $attachment_path){
    
    $upload_url = "https://bsky.social/xrpc/com.atproto.repo.uploadBlob";
    $post_url = "https://bsky.social/xrpc/com.atproto.repo.createRecord";
    $now_str = gmdate("Y-m-d\TH:i:s.v\Z");

    // Validate the attachment size (max 1MB)
    // if (filesize($attachment_path) > 1000000) {
    //     return [
    //         'error' => 'Attachment size too large. Maximum allowed size is 1MB.'
    //     ];
    // }
    $image_data = file_get_contents($attachment_path);
    // $image_mime_type = mime_content_type($attachment_path);
    $image_filename = basename($attachment_path);
    $file_extension = pathinfo($attachment_path, PATHINFO_EXTENSION);
    $mime_types = [
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
    ];
    $image_mime_type = $mime_types[strtolower($file_extension)] ?? null;

if (!$image_mime_type) {
    return null; // Handle error gracefully
}

if (!$image_data || !$image_mime_type) {
    return null; // Handle error gracefully
}

$args = array(
    'method'      => 'POST',
    'timeout'     => 45, // Set appropriate timeout
    'redirection' => 5,
    'httpversion' => '1.0',
    'blocking'    => true,
    'headers'     => array(
        'Authorization' => "Bearer " . $access_jwt,
        'Content-Type'  => $image_mime_type,
    ),
    'body'        => $image_data, // The image data
    
);

$response = wp_remote_post( $upload_url, $args );

if ( is_wp_error( $response ) ) {
    $error_message = $response->get_error_message();
    
    return false; // Or handle the error as needed
} else {
    $upload_http_code = wp_remote_retrieve_response_code( $response );
    $upload_response = wp_remote_retrieve_body( $response );

}

if ($upload_http_code !== 200 || !$upload_response) {
    return [
        'error' => 'Failed to upload the image.',
        'details' => $upload_response,
    ];
}

$upload_body = json_decode($upload_response, true);
$blob = $upload_body['blob'] ?? null;

if (!$blob) {
    return [
        'error' => 'Image upload failed.',
        'response' => $upload_body,
    ];
}

    // Step 3: Post the content
    $embed_data = [
        '$type' => 'app.bsky.embed.images',
        'images' => [
            [
                'alt' => 'Brief alt text description of the image',
                'image' => $blob,
                'aspectRatio' => [
                    'width' => 1000,
                    'height' => 500,
                ],
            ],
        ],
    ];

    $record_data = array(
        'text' => $message,
        'embed' => $embed_data,
        'createdAt' => $now_str,
    );

    $post_data = json_encode([
        'repo' => $username,
        'collection' => 'app.bsky.feed.post',
        'record' => $record_data,
    ]);

    $args = array(
        'method'      => 'POST',
        'timeout'     => 45, // Set appropriate timeout
        'redirection' => 5,
        'httpversion' => '1.0',
        'blocking'    => true,
        'headers'     => array(
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $access_jwt,
        ),
        'body'        => $post_data, // The JSON encoded post data
        
    );
    $response = wp_remote_post( $post_url, $args );
    
    if ( is_wp_error( $response ) ) {
        $error_message = $response->get_error_message();
        
        return false; // Or handle the error as needed
    } 
    $post_http_code = $response['response']['code'];
    $post_response = $response['body'];
    if ($post_http_code !== 200 || !$post_response) {
        return [
            'error' => 'Failed to post to Bluesky.',
            'details' => $post_response,
        ];
    }

    $post_body = json_decode($post_response,true);

    
    if (empty($post_body['uri'])) {
        return [
            'error' => 'Post creation failed.',
            'response' => $post_body,
        ];
    }
    return [
        'success' => true,
        'response' => $post_body,
    ];

}

/*function blueskypostwithvideo($access_jwt, $username, $message, $video_path) {
    $upload_url = "https://bsky.social/xrpc/com.atproto.repo.uploadBlob";
    $post_url = "https://bsky.social/xrpc/com.atproto.repo.createRecord";
    $now_str = gmdate("Y-m-d\TH:i:s.v\Z");

    // Validate the video file size (max 10MB)
    // if (filesize($video_path) > 10 * 1024 * 1024) { // 10MB
    //     return [
    //         'error' => 'Video size too large. Maximum allowed size is 10MB.'
    //     ];
    // }

    // Validate the file extension and MIME type
    $file_extension = pathinfo($video_path, PATHINFO_EXTENSION);
    $mime_types = [
        'mp4' => 'video/mp4'
    ];
    $video_mime_type = $mime_types[strtolower($file_extension)] ?? null;

    if (!$video_mime_type) {
        return [
            'error' => 'Invalid file type. Only MP4 videos are supported.'
        ];
    }

    // Read video file
    $video_data = file_get_contents($video_path);
    if (!$video_data) {
        return [
            'error' => 'Unable to read video file.'
        ];
    }

    // Step 1: Upload the video
    $upload_url = 'your_upload_url'; // Replace with your actual URL
    $access_jwt = 'your_access_jwt'; // Replace with your actual token
    $video_mime_type = 'video/mp4'; // Or whatever your mime type is
    $video_data = 'your_video_data'; // Replace with your actual video data
    
    $args = array(
        'method'      => 'POST',
        'timeout'     => 45, // Adjust as needed
        'redirection' => 5,
        'httpversion' => '1.0',
        'blocking'    => true,
        'headers'     => array(
            'Authorization' => 'Bearer ' . $access_jwt,
            'Content-Type'  => $video_mime_type,
        ),
        'body'        => $video_data, // The video data
        'cookies'     => array()
    );
    
    $response = wp_remote_post( $upload_url, $args );
    if ( is_wp_error( $response ) ) {
        $error_message = $response->get_error_message();
        
        return false; // Or handle the error as needed
    }
    else {
        $upload_http_code = wp_remote_retrieve_response_code( $response );
        $upload_response = wp_remote_retrieve_body( $response );
    
    }


    if ($upload_http_code !== 200 || !$upload_response) {
        return [
            'error' => 'Failed to upload the video.',
            'details' => $upload_response,
        ];
    }

    $upload_body = json_decode($upload_response, true);
    $blob = $upload_body['blob'] ?? null;

    if (!$blob) {
        return [
            'error' => 'Video upload failed.',
            'response' => $upload_body,
        ];
    }

    // Step 2: Create a post with the video embed
    $embed_data = [
        '$type' => 'app.bsky.embed.video',
        'video' => $blob,
        'alt' => 'Brief alt text description of the video',
    ];

    $record_data = [
        'text' => $message,
        'embed' => $embed_data,
        'createdAt' => $now_str,
    ];

    $post_data = json_encode([
        'repo' => $username,
        'collection' => 'app.bsky.feed.post',
        'record' => $record_data,
    ]);

    // Step 3: Post the content
    $args = array(
        'method'      => 'POST',
        'timeout'     => 45, // Adjust as needed
        'redirection' => 5,
        'httpversion' => '1.0',
        'blocking'    => true,
        'headers'     => array(
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $access_jwt,
        ),
        'body'        => $post_data, // The JSON encoded post data
        'cookies'     => array()
    );
    
    $response = wp_remote_post( $post_url, $args );
    
    if ( is_wp_error( $response ) ) {
        $error_message = $response->get_error_message();

        return false; // Or handle the error as needed
    }
    $post_http_code = $response['response']['code'];
    $post_response = $response['body'];
    
    if ($post_http_code !== 200 || !$post_response) {
        return [
            'error' => 'Failed to post to Bluesky.',
            'details' => $post_response,
        ];
    }

    $post_body = json_decode($post_response,true);

    if (empty($post_body['uri'])) {
        return [
            'error' => 'Post creation failed.',
            'response' => $post_body,
        ];
    }

    return [
        'success' => true,
        'response' => $post_body,
    ];
}
*/



?>
