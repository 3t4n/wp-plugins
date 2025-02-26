<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// require_once plugin_dir_path(__FILE__) . 'includes/hsauto_posting_to_bluesky.php';
require_once 'hsauto_posting_to_bluesky.php'; 
add_action('wp_ajax_hsauto_connect_bluesky_network_hs', 'hsauto_connect_bluesky_network_hs');

// Delete Network Action (already in your file)
add_action('wp_ajax_hsauto_bluesky_delete_network_hs', 'hsauto_bluesky_delete_network_hs');

// Fetch Network Details Action
add_action('wp_ajax_hsauto_details_of_bluesky_network_hs', 'hsauto_details_of_bluesky_network_hs');
add_action('wp_ajax_hsauto_modify_blueskynetwork_details_hs', 'hsauto_modify_blueskynetwork_details_hs');
add_action('wp_ajax_hsauto_toggle_blueskynetwork_status_hs', 'hsauto_toggle_blueskynetwork_status_hs');
add_action('wp_ajax_hsauto_bluesky_submit_post_hs', 'hsauto_bluesky_submit_post_hs');
add_action('wp_ajax_hsauto_toggle_schedule_status_hs', 'hsauto_toggle_schedule_status_hs');
add_action('wp_ajax_hsauto_schedule_bluesky_deletepost_hs', 'hsauto_schedule_bluesky_deletepost_hs');
add_action('wp_ajax_hsauto_driving_schedule_post_data_hs', 'hsauto_driving_schedule_post_data_hs');
add_action('wp_ajax_fetch_bluesky_posts', 'hsauto_blueskyfetch_posts_hs');

add_action('wp_ajax_hsauto_bluesky_schedule_post_hs', 'hsauto_bluesky_schedule_post_hs');

add_action('wp_ajax_hsauto_blueskydelete_posted_post_hs', 'hsauto_blueskydelete_posted_post_hs');

// This function will generate the refresh token and store to the database 
function hsauto_token_generation_forbluesky_hs($username,$password){
    $login_url = "https://bsky.social/xrpc/com.atproto.server.createSession";
    $login_data =[
        "identifier" => $username,
        "password" => $password
    ];


    // Initialize cURL session for login

    $args = array(
        'method'      => 'POST',
        'timeout'     => 45, // Adjust as needed
        'redirection' => 5,
        'httpversion' => '1.0',
        'blocking'    => true,
        'headers'     => array(
            'Content-Type' => 'application/json', // Important!
        ), // Use the provided headers
        'body'        => wp_json_encode( $login_data ),
        
    );
    
    $response = wp_remote_post( $login_url, $args );


    if ( is_wp_error( $response ) ) {
        $error_message = $response->get_error_message();

        return false;
    } else {
        $login_response = wp_remote_retrieve_body( $response );
        $login_http_code = wp_remote_retrieve_response_code( $response );
        
    }
    // Decode the login response
    $login_data = json_decode($login_response, true);
    
    // Check if the login was successful and extract JWT tokens
    if (isset($login_data['accessJwt']) && isset($login_data['refreshJwt'])) {
        $did = $login_data['did'];
        $access_jwt = $login_data['accessJwt'];
        $refresh_jwt = $login_data['refreshJwt'];
        return ['refresh_token'=>$refresh_jwt,
                'access_jwt'=>$access_jwt,
        'did'=>$did];
    }
    else return 0;

}

function hsauto_blueskydownload_and_save_profile_image_hs($image_url, $username) {
    // Check if the image URL is valid
    if (empty($image_url) || !filter_var($image_url, FILTER_VALIDATE_URL)) {
        return new WP_Error('invalid_url', 'Invalid image URL');
    }

    // Extract the name from the username (e.g., name.bsky.social -> name)
    $name_parts = explode('.', $username);
    $name_only = sanitize_file_name($name_parts[0]); // Get only the name before the first dot

    // Get the WordPress uploads directory
    $upload_dir = wp_upload_dir();

    // Handle missing file extension by checking the Content-Type header
    $image_data = pathinfo($image_url);
    $extension = isset($image_data['extension']) ? $image_data['extension'] : '';
    if (empty($extension)) {
        $response = wp_remote_head($image_url);
        if (!is_wp_error($response) && isset($response['headers']['content-type'])) {
            $mime_type = $response['headers']['content-type'];
            $extension = match ($mime_type) {
                'image/jpeg' => 'jpg',
                'image/png' => 'png',
                'image/gif' => 'gif',
                default => 'jpg', // Default to .jpg if unknown
            };
        } else {
            $extension = 'jpg'; // Fallback to .jpg
        }
    }

    // Create a unique filename
    $filename = 'profile-' . $name_only . '.' . $extension;
    $file_path = $upload_dir['path'] . '/' . $filename;

    // Download the image
    $image_content = wp_remote_get($image_url);
    if (is_wp_error($image_content)) {
        return new WP_Error('image_download_failed', 'Failed to download image');
    }

    // Save the image locally
    $result = file_put_contents($file_path, wp_remote_retrieve_body($image_content));
    if (!$result) {
        return new WP_Error('file_save_failed', 'Failed to save image file');
    }

    // Create the URL for the saved image
    $file_url = $upload_dir['url'] . '/' . $filename;

    // Return the local URL of the saved image
    return $file_url;
}

function hsauto_blueskyfetch_and_saveprofile_image_hs($did, $network_id,$access_token) {
    // API endpoint for getting profile
    $url = 'https://bsky.social/xrpc/app.bsky.actor.getProfile';

    // Build the query parameters

    $url = add_query_arg(['actor' => $did], $url);

    // Prepare headers with the access token
    $headers = [
        'Authorization' => 'Bearer ' . $access_token,
    ];
    $response = wp_remote_get($url, [
        'headers' => $headers,
    ]);

    if (is_wp_error($response)) {
        return new WP_Error('request_failed', 'Failed to fetch profile data: ' . $response->get_error_message());
    }
    

    // Check for errors
    // Decode the response body
    $response_body = wp_remote_retrieve_body($response);
    $data = json_decode($response_body, true);

    // Check if avatar URI is present
    if (empty($data['avatar'])) {
        return new WP_Error('missing_avatar', 'Avatar URI not found in the response');
    }

    $avatar_uri = $data['avatar'];

    // Use the function to download and save the profile image
    $file_url = hsauto_blueskydownload_and_save_profile_image_hs($avatar_uri, $network_id);

    // Check if image download was successful
    if (is_wp_error($file_url)) {
        return $file_url; // Return the error
    }

    // Return the file URL of the saved image
    return $file_url;
}


function hsauto_blueskydelete_posted_post_hs(){
    if (!current_user_can('administrator')) {
        wp_send_json_error(['message' => 'hi dear you can not access it :)'], 403);
    }
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'bluesky_nonce')) {; 
        wp_send_json_error(['message' => 'Invalid nonce.']);
    }
    // $post_id = $_POST['post_id'];
    if ( isset( $_POST['post_id'] ) ) {
        $post_id = absint( wp_unslash( $_POST['post_id'] ) );
    } else {
        $post_id = 0; // Or a default value if appropriate
    }
    
    // Now $post_id is sanitized. You can use it safely, but consider validating if it's a valid post ID before using it in database queries.
    global $wpdb;
    $table_name = $wpdb->prefix . 'bluesky_posted_posts';
    // $query = $wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $post_id);
    $post = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $post_id));
    
    $result = $wpdb->delete($table_name, ['id' => $post_id]);
    if (!$result) {
        wp_send_json_error(['msg' => "Failed to delete post from database"]);
    }
    $delete_status = get_option('bluesky_delete_posts', 0); 
    if($delete_status == 1){
        
        $table_name2 = $wpdb->prefix . 'bluesky_networks';
        // $query = $wpdb->prepare("SELECT * FROM $table_name2 WHERE id = %d", $post[0]->network_id);
        $find_user = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id = %d", $post[0]->network_id));
        $record_key =0;
        $post_url = $post[0]->response;
        
        if (preg_match('/\/([^\/]+)$/', $post_url, $matches)) {
            $record_key = $matches[1]; 
        }
        if(empty($record_key)){
            wp_send_json_error(
                ['msg' => "post uri is not saved properly, you need to delete maually"]);  }
        $did = $find_user[0]->did;
        $password = $find_user[0]->password;
        $refreshtoken = $find_user[0]->refreshJWT;

        $access_jwt = hsauto_refresh_accress_token_hs($refreshtoken);

        if($access_jwt['status']==0){
            wp_send_json_error(
                ['msg' => "your credentials are wrong"]);
        }
        $access_jwt = $access_jwt['token'];
        $url = "https://bsky.social/xrpc/com.atproto.repo.deleteRecord";
    
        $body = json_encode([
            'repo' => $did,
            'collection' => 'app.bsky.feed.post',
            'rkey' => $record_key, // Record key to delete
        ]);
    
        // Initialize cURL
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
            'body'        => $body, // Assumes $body is already JSON encoded
            'cookies'     => array()
        );
        
        $response = wp_remote_post( $url, $args );
        if ( is_wp_error( $response ) ) {
            $error_message = $response->get_error_message();

            return false;
        } else {
            $http_code = wp_remote_retrieve_response_code( $response );
            $response = wp_remote_retrieve_body( $response );
        
            if ($http_code !== 200) {
                wp_send_json_error(
                    ['msg' => "Post deleted but not deleted from the bluesky please delete manually"]);
                       }
         else {
                
                wp_send_json_success(
                    ['msg' => "post success fully deleted from site and bluesky"]);
            }
        }
    
        
        

    }
    else{
        wp_send_json_success(
            ['msg' => "post success fully deleted"]);
    }
    


    // Decode and return response
    return json_decode($response, true);
}
function hsauto_refresh_accress_token_hs($refresh_jwt){
    
    $url = "https://bsky.social/xrpc/com.atproto.server.refreshSession";

    // Set up headers
    $headers = array(
        'Content-Type'  => 'application/json',
        'Authorization' => 'Bearer ' . $refresh_jwt, // Correct: Key-value pair
    );

    // Initialize cURL
    $args = array(
        'method'      => 'POST',
        'timeout'     => 45, // Adjust as needed
        'redirection' => 5,
        'httpversion' => '1.0',
        'blocking'    => true,
        'headers'     => $headers, // Use the provided $headers array
    );
    
// ... your code to make the wp_remote_post request

$response = wp_remote_post( $url, $args );
$http_status = $response['response']['code'];

$decoded_response =json_decode($response['body'],true) ;
    // Check for successful response
    if ($http_status === 200 && isset($decoded_response['accessJwt'])) {

        return ['token'=> $decoded_response['accessJwt'],'status'=> 1]; // Return accessJwt
    } else {
        return [
            'error' => 'Request failed',
            'status' => 0,
            'response' => $response
        ];
    }
}

function hsauto_connect_bluesky_network_hs() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'bluesky_nonce')) {
        wp_send_json_error(['message' => 'Invalid nonce.']);
        return;
    }
    if (!current_user_can('administrator')) {
        wp_send_json_error(['message' => 'hi dear you can not access it :)'], 403);
    }
    global $wpdb;
    $table_name = $wpdb->prefix . 'bluesky_networks';

    $network_name = sanitize_text_field(wp_unslash($_POST['network_name']));
    $username = sanitize_text_field(wp_unslash($_POST['username']));
    $password = sanitize_text_field(wp_unslash($_POST['password']));
    
    if (!$network_name || !$username || !$password) {
        wp_send_json_error(['message' => 'All fields are required.']);
    }
    
    $response = hsauto_token_generation_forbluesky_hs($username,$password);

    $refreshJWT = $response['refresh_token'];
    $access_jwt = $response['access_jwt'];
    $did = $response['did'];
    $profile_response = hsauto_blueskyfetch_and_saveprofile_image_hs($did, $username,$access_jwt);
    
    if($refreshJWT!=0){ 
    $result = $wpdb->insert($table_name, [
        'network_name' => $network_name,
        'username' => $username,
        'password' => $password,
        'refreshJWT' =>$refreshJWT,
        'did' =>$did,
        'avatar' =>$profile_response,
    ]);
    }
    else{
        wp_send_json_error(['message' => 'Can not generated refresh token please try again']);
    }
    if ($result) {
        wp_send_json_success(['message' => 'Network added successfully!']);
    } else {
        wp_send_json_error(['message' => 'Failed to add network.']);
    }
}

function hsauto_bluesky_delete_network_hs() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'bluesky_nonce')) {
        wp_send_json_error(['message' => 'Invalid nonce.']);
        return;
    }
    if (!current_user_can('administrator')) {
        wp_send_json_error(['message' => 'hi dear you can not access it :)'], 403);
    }

    global $wpdb;
    $network_id = intval($_POST['network_id']);
    $table_name = $wpdb->prefix . 'bluesky_networks';

    $result = $wpdb->delete($table_name, ['id' => $network_id]);

    if ($result) {
        wp_send_json_success(['message' => 'Network deleted successfully!']);
    } else {
        wp_send_json_error(['message' => 'Failed to delete network.']);
    }
}
function hsauto_details_of_bluesky_network_hs() {
    // Verify nonce for security
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'bluesky_nonce')) {
        wp_send_json_error(['message' => 'Invalid nonce.']);
        return;
    }
    if (!current_user_can('administrator')) {
        wp_send_json_error(['message' => 'hi dear you can not access it :)'], 403);
    }

    // Fetch network ID from request
    $network_id = isset($_POST['network_id']) ? intval($_POST['network_id']) : 0;

    if (!$network_id) {
        wp_send_json_error(['message' => 'Invalid network ID.']);
        return;
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'bluesky_networks';

    // Retrieve the network details
    $network = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $network_id), ARRAY_A);

    if (!$network) {
        wp_send_json_error(['message' => 'Network not found.']);
        return;
    }

    // Send network details as JSON
    wp_send_json_success($network);
}
function hsauto_modify_blueskynetwork_details_hs() {
    // Verify nonce for security
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'bluesky_nonce')) {
        wp_send_json_error(['message' => 'Invalid nonce.']);
        return;
    }
    if (!current_user_can('administrator')) {
        wp_send_json_error(['message' => 'hi dear you can not access it :)'], 403);
    }

    // Fetch data from request
    $network_id = isset($_POST['network_id']) ? intval($_POST['network_id']) : 0;
    $network_name = isset($_POST['network_name']) ? sanitize_text_field(wp_unslash($_POST['network_name'])) : '';
    $username = isset($_POST['username']) ? sanitize_text_field(wp_unslash($_POST['username'])) : '';
    $password = isset($_POST['password']) ? sanitize_text_field(wp_unslash(($_POST['password']))) : '';
    if (!$network_name || !$username || !$password) {
        wp_send_json_error(['message' => 'All fields are required.']);
    }
    
    $response = hsauto_token_generation_forbluesky_hs($username,$password);
    $refreshJWT = $response['refresh_token'];
    $access_jwt = $response['access_jwt'];
    $did = $response['did'];
    $profile_response = hsauto_blueskyfetch_and_saveprofile_image_hs($did, $username,$access_jwt);
    

    if (!$network_id || !$network_name || !$username || !$password) {
        wp_send_json_error(['message' => 'All fields are required.']);
        return;
    }
    global $wpdb;
    $table_name = $wpdb->prefix . 'bluesky_networks';

    // Update the network details
    $updated = $wpdb->update(
        $table_name,
        [
            'network_name' => $network_name,
            'username' => $username,
            'password' => $password,
            'refreshJwt' => $refreshJWT,
            'avatar' => $profile_response,
        ],
        ['id' => $network_id],
        ['%s', '%s', '%s','%s','%s'],
        ['%d']
    );

    if ($updated === false) {
        wp_send_json_error(['message' => 'Failed to update the network.']);
        return;
    }

    // Send success response
    wp_send_json_success(['message' => 'Network updated successfully.']);
}


function hsauto_toggle_blueskynetwork_status_hs() {
    global $wpdb;

    // Check nonce for security
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'bluesky_nonce')) {
        wp_send_json_error('Invalid nonce.');
    }
    if (!current_user_can('administrator')) {
        wp_send_json_error(['message' => 'hi dear you can not access it :)'], 403);
    }

    // Get data from AJAX
    $network_id = intval($_POST['network_id']);
    $status = intval($_POST['status']);

    if ($network_id && in_array($status, [1, 2])) {
        $table_name = $wpdb->prefix . 'bluesky_networks';

        // Update the status in the database
        $updated = $wpdb->update(
            $table_name,
            ['status' => $status],
            ['id' => $network_id],
            ['%d'],
            ['%d']
        );

        if ($updated !== false) {
            wp_send_json_success();
        } else {
            wp_send_json_error('Database update failed.');
        }
    } else {
        wp_send_json_error('Invalid data.');
    }
}

function hsauto_bluesky_submit_post_hs() {
    global $wpdb;

    // Validate nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'bluesky_nonce')) {
        wp_send_json_error(['message' => 'Invalid nonce.']);
    }
    
    if (!current_user_can('administrator')) {
        wp_send_json_error(['message' => 'hi dear you can not access it :)'], 403);
    }

    // Retrieve form data
    $message = sanitize_text_field(wp_unslash($_POST['message']));
    $media_url = esc_url_raw(wp_unslash($_POST['media_url']));
    // $selected_networks = sanitize_text_field(wp_unslash($_POST['networks']));
    if ( isset( $_POST['networks'] ) && is_array( $_POST['networks'] ) ) {
        $selected_networks = array_map( 'absint', wp_unslash( $_POST['networks'] ) );
        $selected_networks = array_filter($selected_networks); // Remove any 0 values that absint might produce from non-numeric input
    
    } else {
        $networks = array(); // Important: Initialize to an empty array
    }
    if ( isset( $_POST['networksnames'] ) && is_array( $_POST['networksnames'] ) ) {
        $selected_networks_names = array_map( 'sanitize_text_field', wp_unslash( $_POST['networksnames'] ) );
        $selected_networks_names = array_filter($selected_networks_names); // Remove empty strings after sanitization.
    } else {
        $selected_networks_names = array(); // Initialize as empty array to prevent errors later
    }
    $post_type = sanitize_text_field(wp_unslash($_POST['post_type']));
    $schedule_time = sanitize_text_field(wp_unslash($_POST['schedule_time'])); // Only for scheduled posts
    
    
    if (empty($message)) {
        wp_send_json_error(['message' => 'Message cannot be empty.']);
    }

    if (strlen($message) > 300) {
        wp_send_json_error(['message' => 'Message exceeds 300 characters.']);
    }

    if (empty($selected_networks)) {
        wp_send_json_error(['message' => 'Please select at least one network.']);
    }

    // Determine post type (publish now or schedule)
    $table_name = $wpdb->prefix . 'bluesky_scheduled_posts';
    if ($post_type === 'schedule') {
        if (empty($schedule_time) || strtotime($schedule_time) <= time()) {
            wp_send_json_error(['message' => 'Please select a valid future date and time.']);
        }

        // Insert into scheduled posts table
        $wpdb->insert($table_name, [
            'message' => $message,
            'attachment_url' => $media_url,
            'network_id' => json_encode($selected_networks),
            'network_name' => json_encode($selected_networks_names),
            'schedule_time' => $schedule_time,
            'posted_status' => 0,
            'created_at' => current_time('mysql')
        ]);
        wp_send_json_success(['message' => 'Post scheduled successfully!']);
    } else {
        // Publish immediately (direct API call can be implemented here)
         
        $i = 0;
        foreach($selected_networks as $net){

            $net = intval($net);
            $table_name2 = $wpdb->prefix . 'bluesky_networks'; 
            $posted_posts = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name2 WHERE id = %d", $net));
            $refresh_jwt = $posted_posts[0]->refreshJWT;
            $username = $posted_posts[0]->username;
            $password = $posted_posts[0]->password;
            $selected_networks_name = $posted_posts[0]->network_name;

            $access_token = hsauto_refresh_accress_token_hs($refresh_jwt);
            if($access_token['status']==0){
                $response = hsauto_token_generation_forbluesky_hs($username,$password);
                $refresh_token = $response['refresh_token'];

                if($refresh_token!=0){
                $access_token = hsauto_refresh_accress_token_hs($refresh_token);

                $table_name = $wpdb->prefix . 'bluesky_networks';

                // Update the network details
                $updated = $wpdb->update(
                    $table_name,
                    [
                        'username' => $username,
                        'password' => $password,
                        'refreshJwt' => $refresh_token,
                    ],
                    ['id' => $net],
                    ['%s', '%s', '%s','%s'],
                    ['%d']
                );
                }
                
            }
            $access_token = $access_token['token'];
            

            if(empty($media_url)) {
            $response = textposter($access_token,$message,$username);
            }
            else if(!empty($media_url)) {
                $file_extension = pathinfo($media_url, PATHINFO_EXTENSION);
                $mime_types = [
                    'mp4' => 'video/mp4',
                ];

                $mime_type = $mime_types[strtolower($file_extension)] ?? null;
                
                if ($mime_type === 'video/mp4') {
                    wp_send_json_error(['message' => 'sorry but currently not allowing to uploading video']);
                    return;
                    // $response = blueskypostwithvideo($access_token, $username, $message, $media_url);
                }else {
                $response = blueskypostwithattachment($access_token,$username, $message, $media_url);

                }
            }
            
            if (isset($response['response']['uri'])) {
                // Extract the post ID from the URI using a regular expression
                preg_match('/\/([^\/]+)$/', $response['response']['uri'], $matches);
        
                // If a match is found, display the custom post URL
                if (isset($matches[1])) {
                    $post_id = $matches[1];
                    $post_url = "https://bsky.app/profile/{$username}/post/{$post_id}";
                }
            }else {
                $post_url =0;
            }
            $i = $i + 1;
            $table_name1 = $wpdb->prefix .'bluesky_posted_posts';
            $wpdb->insert($table_name1, [
                'network_id' => $net,
                'network_name' => json_encode($selected_networks_name),
                'response' => $post_url,
                'actual_response' =>json_encode($response),
                'scheduled_post_id' => 0,
                'message' => $message,
                'attachment_url' => $media_url,
                'schedule_time' => $schedule_time,
                'posted_at' => current_time('mysql')
            ]);
        }
    }
        
        wp_send_json_success(['message' => 'Post published successfully!']);
    }

function hsauto_toggle_schedule_status_hs() {
    global $wpdb;
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'bluesky_nonce')) {
        wp_send_json_error(['message' => 'Invalid nonce.']);
    }
    
    if (!current_user_can('administrator')) {
        wp_send_json_error(['message' => 'hi dear you can not access it :)'], 403);
    }
    $table_name = $wpdb->prefix . 'bluesky_scheduled_posts';

    $post_id = intval($_POST['post_id']);
    $status = intval($_POST['status']);

    $updated = $wpdb->update(
        $table_name,
        ['posted_status' => $status],
        ['id' => $post_id]
    );

    wp_send_json(['success' => $updated !== false]);
}
function hsauto_schedule_bluesky_deletepost_hs() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'bluesky_nonce')) {
        wp_send_json_error(['message' => 'Invalid nonce.']);
    }
    
    if (!current_user_can('administrator')) {
        wp_send_json_error(['message' => 'hi dear you can not access it :)'], 403);
    }
    global $wpdb;
    $table_name = $wpdb->prefix . 'bluesky_scheduled_posts';

    $post_id = intval($_POST['post_id']);

    $deleted = $wpdb->delete($table_name, ['id' => $post_id]);

    wp_send_json(['success' => $deleted !== false]);
}

function hsauto_driving_schedule_post_data_hs() {
    // Check if post_id is provided
    if (!current_user_can('administrator')) {
        wp_send_json_error(['message' => 'hi dear you can not access it :)'], 403);
    }
    
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash( $_POST['prefix_nonce'] ) ), 'bluesky_nonce')) {; 
        wp_send_json_error(['message' => 'Invalid nonce.']);
    }
    
    if (!isset($_POST['post_id'])) {
        wp_send_json_error(array('message' => 'Post ID is required.'));
        
        return;
    }

    $post_id = intval($_POST['post_id']);
    global $wpdb;

    // Fetch post details
    $table_name = $wpdb->prefix . 'bluesky_scheduled_posts';
    $post = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $post_id));

    if (!$post) {
        wp_send_json_error(array('message' => 'Post not found.'));
        return;
    }

    // Fetch active networks
    $networks = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}bluesky_networks WHERE status = 1");

    // Send response with post and networks data
    wp_send_json_success(array(
        'post' => $post,
        'networks' => $networks
    ));

    wp_die();
}

add_action('wp_ajax_hsauto_modifly_schedule_post_details_hs', 'hsauto_modifly_schedule_post_details_hs');

function hsauto_modifly_schedule_post_details_hs() {
    if (!current_user_can('administrator')) {
        wp_send_json_error(['message' => 'hi dear you can not access it :)'], 403);
    }
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'bluesky_nonce')) {; 
        wp_send_json_error(['message' => 'Invalid nonce.']);
    }
    if (!isset($_POST['post_id'])) {
        wp_send_json_error(array('message' => 'Post ID is required.'));
        return;
    }

    $post_id = intval($_POST['post_id']);
    $message = sanitize_text_field(wp_unslash($_POST['message']));
    $network_id = intval($_POST['network_id']);
    $schedule_time = sanitize_text_field(wp_unslash($_POST['schedule_time']));
    $attachment_url = esc_url_raw(wp_unslash($_POST['attachment_url']));

    global $wpdb;
    $table_name = $wpdb->prefix . 'bluesky_scheduled_posts';

    // Update the post details in the database
    $result = $wpdb->update(
        $table_name,
        array(
            'message' => $message,
            'network_id' => $network_id,
            'schedule_time' => $schedule_time,
            'attachment_url' => $attachment_url,
        ),
        array('id' => $post_id),
        array('%s', '%d', '%s', '%s'),
        array('%d')
    );

    if ($result !== false) {
        wp_send_json_success(array('message' => 'Post updated successfully.'));
    } else {
        wp_send_json_error(array('message' => 'Failed to update post.'));
    }

    wp_die(); // Always call this at the end of the function to terminate the request properly
}
function hsauto_bluesky_schedule_post_hs() {
    global $wpdb;
    if (!current_user_can('administrator')) {
        wp_send_json_error(['message' => 'hi dear you can not access it :)'], 403);
    }
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'bluesky_nonce')) {; 
        wp_send_json_error(['message' => 'Invalid nonce.']);
    }
    $table_name = $wpdb->prefix . 'bluesky_scheduled_posts';
    $search = isset($_POST['search']) ? sanitize_text_field(wp_unslash($_POST['search'])) : '';
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $posts_per_page = 10;

    $offset = ($page - 1) * $posts_per_page;

    // Base query
    $query = "SELECT * FROM $table_name WHERE 1=1";

    // Search filter
    if (!empty($search)) {
        $query .= $wpdb->prepare(" AND message LIKE %s", '%' . $wpdb->esc_like($search) . '%');
    }

    // Network filter
    if (!empty($network)) {
        $query .= $wpdb->prepare(" AND network_name = %s", $network);
    }

    // Order by latest
    $query .= " ORDER BY id DESC LIMIT %d OFFSET %d";
    $query = $wpdb->prepare($query, $posts_per_page, $offset);
    $posts = $wpdb->get_results($query);

    // Count total posts for pagination
    $total_query = "SELECT COUNT(*) FROM $table_name WHERE 1=1";
    if (!empty($search)) {
        $total_query .= $wpdb->prepare(" AND message LIKE %s", '%' . $wpdb->esc_like($search) . '%');
    }
    if (!empty($network)) {
        $total_query .= $wpdb->prepare(" AND network_name = %s", $network);
    }
    $total_posts = $wpdb->get_var($total_query);
    
    // Build HTML for posts
    ob_start();
    if ($posts) {
        foreach ($posts as $post) {
            $network = $post->network_name;
            $network = str_replace('"', '',$network);
            
            ?>
            
            <tr>
                <td><?php echo esc_html($post->id); ?></td>
                <td><?php echo esc_html($post->message); ?></td>
                <td>
                    <?php if ($post->attachment_url): ?>
                        <?php if (strpos($post->attachment_url, '.mp4') !== false): ?>
                            <a href="<?php echo esc_url($post->attachment_url); ?>" target="_blank">View Video</a>
                        <?php else: ?>
                            <a href="<?php echo esc_url($post->attachment_url); ?>" target="_blank">View Image</a>
                        <?php endif; ?>
                    <?php else: ?>
                        No Attachment
                    <?php endif; ?>
                </td>
                <td><?php echo esc_html($network); ?></td>
                <td><label class="switch">
                    <input type="checkbox" class="status-toggle" id="status-toggle" data-id="<?php echo esc_attr($post->id); ?>" <?php echo esc_attr($post->posted_status) == 0 ? 'checked' : ''; ?>>
                    <span class="slider round"></span>
                    </label>
            </td>
                <td><?php echo esc_html($post->schedule_time); ?></td>
                <td>
                    <a href="#" class="delete-post" id="delete-post" data-id="<?php echo esc_attr($post->id); ?>">Delete</a>
                </td>
            </tr>
            <?php
        }
    } else {
        echo '<tr><td colspan="5">No posts found.</td></tr>';
    }
    $posts_html = ob_get_clean();

    // Build pagination HTML
    $total_pages = ceil($total_posts / $posts_per_page);
    ob_start();
    if ($total_pages > 1) {
        for ($i = 1; $i <= $total_pages; $i++) {
            $active = ($i == $page) ? 'active' : '';
            printf(
                '<a href="#" class="pagination-link %s" data-page="%s">%s</a> ',
                esc_attr( $active ),
                esc_attr( $i ),
                esc_html( $i )
            );
        }
    }
    $pagination_html = ob_get_clean();

    // Return response
    wp_send_json_success([
        'posts_html' => $posts_html,
        'pagination_html' => $pagination_html,
        'total_pages'=>$total_pages
    ]);
}


function hsauto_blueskyfetch_posts_hs() {
    global $wpdb;
    if (!current_user_can('administrator')) {
        wp_send_json_error(['message' => 'hi dear you can not access it :)'], 403);
    }
    if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'bluesky_nonce')) {; 
        wp_send_json_error(['message' => 'Invalid nonce.']);
    }
    $table_name = $wpdb->prefix . 'bluesky_posted_posts';
    $search = isset($_POST['search']) ? sanitize_text_field(wp_unslash($_POST['search'])) : '';
    $network = isset($_POST['network']) ? sanitize_text_field(wp_unslash($_POST['network'])) : '';
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $posts_per_page = 10;

    $offset = ($page - 1) * $posts_per_page;

    // Base query
    $query = "SELECT * FROM $table_name WHERE 1=1";

    // Search filter
    if (!empty($search)) {
        $query .= $wpdb->prepare(" AND message LIKE %s", '%' . $wpdb->esc_like($search) . '%');
    }

    // Network filter
    if (!empty($network)) {
        $query .= $wpdb->prepare(" AND network_name = %s", $network);
    }

    // Order by latest
    $query .= " ORDER BY id DESC LIMIT %d OFFSET %d";
    $query = $wpdb->prepare($query, $posts_per_page, $offset);

    // Fetch posts
    $posts = $wpdb->get_results($query);

    // Count total posts for pagination
    $total_query = "SELECT COUNT(*) FROM $table_name WHERE 1=1";
    if (!empty($search)) {
        $total_query .= $wpdb->prepare(" AND message LIKE %s", '%' . $wpdb->esc_like($search) . '%');
    }
    if (!empty($network)) {
        $total_query .= $wpdb->prepare(" AND network_name = %s", $network);
    }
    $total_posts = $wpdb->get_var($total_query);

    // Build HTML for posts
    ob_start();
    if ($posts) {
        foreach ($posts as $post) {
            $network = $post->network_name;
            $network = str_replace('"', '',$network);
            $response = $post->response;
            

            ?>
            
            <tr>
                <td><?php echo esc_html($post->id); ?></td>
                <td><?php echo esc_html($post->message); ?></td>
                <td>
                    <?php if ($post->attachment_url): ?>
                        <?php if (strpos($post->attachment_url, '.mp4') !== false): ?>
                            <a href="<?php echo esc_url($post->attachment_url); ?>" target="_blank">View Video</a>
                        <?php else: ?>
                            <a href="<?php echo esc_url($post->attachment_url); ?>" target="_blank">View Image</a>
                        <?php endif; ?>
                    <?php else: ?>
                        No Attachment
                    <?php endif; ?>
                </td>
                <td><?php echo esc_html($network); ?></td>
                <td>
                    <?php 
                    if ($response == 0) {
                        $display_response = $post->actual_response;
                        echo esc_html($display_response);
                    } else { 
                    ?>
                        <a href="<?php echo esc_url($post->response); ?>" target="_blank">View Post</a>
                    <?php 
                    } 
                    ?>
                </td>
                <td>
                    <a href="#" class="delete-post" id="delete-posted-post" data-id="<?php echo esc_attr($post->id); ?>">Delete</a>
                </td>
            </tr>
            <?php
        }
    } else {
        echo '<tr><td colspan="5">No posts found.</td></tr>';
    }
    $posts_html = ob_get_clean();

    // Build pagination HTML
    $total_pages = ceil($total_posts / $posts_per_page);
    ob_start();
    if ($total_pages > 1) {
        for ($i = 1; $i <= $total_pages; $i++) {
            $active = ($i == $page) ? 'active' : '';
            // echo "<a href='#' class='pagination-link $active' data-page='$i'>$i</a> ";
            // echo "<a href='#' class='pagination-link $active' data-page='" . esc_attr($i) . "'>$i</a> ";
            printf(
                '<a href="#" class="pagination-link %s" data-page="%s">%s</a> ',
                esc_attr( $active ),
                esc_attr( $i ),
                esc_html( $i )
            );
        }
    }
    $pagination_html = ob_get_clean();

    // Return response
    wp_send_json_success([
        'posts_html' => $posts_html,
        'pagination_html' => $pagination_html,
        'total_pages'=>$total_pages
    ]);
}

?>