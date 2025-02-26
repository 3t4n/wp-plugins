<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
require_once 'hsauto_posting_to_bluesky.php'; 
require_once 'hsauto_ajax.php';
add_action('bluesky_cron_job_hook', 'hsauto_blueskyprocess_scheduledposts_hs');
// Callback function that runs on each scheduled refresh
add_action('bluesky_refresh_token_hook', 'hsauto_blueskyrefresh_tokens_for_all_network_hs');
function hsauto_blueskyrefresh_tokens_for_all_network_hs() {
    // Get all networks from the database
    global $wpdb;
    $table_name = $wpdb->prefix . 'bluesky_networks'; // Your networks table
    $networks = $wpdb->get_results("SELECT * FROM $table_name WHERE status=1");

    if ($networks) {
        // Loop through each network and call the refresh token function
        foreach ($networks as $network) {
            $username = $network ->username;
            $password = $network->password;
            $response = hsauto_token_generation_forbluesky_hs($username,$password);
            if($response!=0){
                $refresh_token=$response['refresh_token'];
                $wpdb->update(
                    $table_name,
                    [
                        'refreshJwt' => $refresh_token,
                       
                    ],
                    ['id' => $network->id],
                    ['%s'],
                    ['%d']
                );
            }


        }
    } else {
        
    }
}

function hsauto_blueskyprocess_scheduledposts_hs() {
    
    global $wpdb;
    $table_name = $wpdb->prefix . 'bluesky_scheduled_posts';
    $current_utc_time = time(); // Current UTC timestamp

    $scheduled_posts = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM $table_name WHERE posted_status = 0 AND UNIX_TIMESTAMP(schedule_time) <= %d",
            $current_utc_time
        )
    );

   if (!empty($scheduled_posts)) {
        foreach ($scheduled_posts as $post) {
            
            $media_url = $post->attachment_url;
            $selected_networks = $post->network_id;
            

            // Decode JSON string into a PHP array
            $selected_networks = json_decode($selected_networks, true); 
            
            // Check if decoding was successful
            if (json_last_error() === JSON_ERROR_NONE && is_array($selected_networks)) {
                foreach ($selected_networks as $network_id) {

                }
            } else {
                
                continue;
            }
            $message = $post->message;
            $schedule_time = $post->schedule_time;
            $i = 0;
            foreach ($selected_networks as $net) {


                $net = intval($net); // Ensure network ID is an integer
                $table_name2 = $wpdb->prefix . 'bluesky_networks';
                $query = $wpdb->prepare("SELECT * FROM $table_name2 WHERE id = %d", $net);
                $posted_posts = $wpdb->get_results($query);


                if (empty($posted_posts) || !isset($posted_posts[0])) {
                    
                    continue; // Skip this network if not found
                }

                $username = $posted_posts[0]->username;
                $password = $posted_posts[0]->password;
                $selected_networks_names = $posted_posts[0]->network_name;
                $refresh_jwt = $posted_posts[0]->refreshJWT;
                
                $access_token = hsauto_refresh_accress_token_hs($refresh_jwt);

                if($access_token['status']==0){
                    $response = hsauto_token_generation_forbluesky_hs($username,$password);
                    $refresh_token = $response['refresh_token'];
                    if($refresh_token!=0){
                    $access_token = hsauto_refresh_accress_token_hs($refresh_jwt);
                    }
                    else{

                    }
                }
                $access_token = $access_token['token'];
                

                // Ensure selected_networks_names is an array
                if (!is_array($selected_networks_names)) {
                    $selected_networks_names = explode(',', $selected_networks_names); // Convert to array if string
                }

                if(empty($media_url)){
                    $response = textposter($access_token,$message,$username);
                }
                else{
                    $file_extension = pathinfo($media_url, PATHINFO_EXTENSION);
                    $mime_types = [
                        'mp4' => 'video/mp4',
                    ];
                    
                    $mime_type = $mime_types[strtolower($file_extension)] ?? null;
                    
                    if ($mime_type === 'video/mp4') {
                        // $response = blueskypostwithvideo($access_token, $username, $message, $media_url);
                    }else {
                    $response = blueskypostwithattachment($access_token,$username, $message, $media_url);
                    }
                }

                $response = $response['response'] ?? 'No response'; // Safely extract response
                $selected_networks_name = $selected_networks_names[$i] ?? null;
                if (!$selected_networks_name) {
                    
                    continue;
                }

                $i++;
                if (isset($response['uri'])) {
                    // Extract the post ID from the URI using a regular expression
                    preg_match('/\/([^\/]+)$/', $response['uri'], $matches);
            
                    // If a match is found, display the custom post URL
                    if (isset($matches[1])) {
                        $post_id = $matches[1];
                        $post_url = "https://bsky.app/profile/{$username}/post/{$post_id}";
                    }
                }else {
                    $post_url =0;
                }
                                   

                $table_name1 = $wpdb->prefix . 'bluesky_posted_posts';
                $wpdb->insert($table_name1, [
                    'network_id' => $net,
                    'network_name' => json_encode($selected_networks_name),
                    'response' => $post_url,
                    'actual_response' => $response,
                    'scheduled_post_id' => $post->id,
                    'message' => $message,
                    'attachment_url' => $media_url,
                    'schedule_time' => $schedule_time,
                    'posted_at' => current_time('mysql'),
                ]);
            }

            $post_id = intval($post->id);
            $deleted = $wpdb->delete($table_name, ['id' => $post_id]);
        }
    }
}
?>
