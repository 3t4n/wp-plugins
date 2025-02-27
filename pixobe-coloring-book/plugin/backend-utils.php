<?php


// Function to call backend API on plugin activation
function pixobe_colorgizer_activate()
{

    global $pixobe_api_endpoint;

    $site_url = parse_url(get_home_url(), PHP_URL_HOST);
    // Construct the JSON payload
    $payload = json_encode(array(
        'site_url' =>  $site_url,
        'app_name' => 'Colorgizer',
        'app_version' => '6.0',
        'platform' => 'wordpress'
    ));

    // Set up the API request arguments
    $args = array(
        'method' => 'POST',
        'headers' => array(
            'Content-Type' => 'application/json',
        ),
        'body' => $payload,
    );

    // Make the API request
    $response = wp_remote_post("$pixobe_api_endpoint/subscriber", $args);
    // Check if request was successful
    // Check if request was successful
    if (is_wp_error($response)) {
        // Log error if needed
        error_log('Error calling API: ' . $response->get_error_message());
    } else {
        // Decode the API response
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);
        // Check if the response contains site_id
        pixobe_colorgizer_update_site_data($data);
    }
}


/**
 * 
 */
function pixobe_colorgizer_get_free_trial()
{

    global $pixobe_api_endpoint;

    //reset nonce 
    delete_option('pixobe_coloring_nonce');

    // Get the site ID from plugin settings
    $site_id = get_option('pixobe_colorgizer_site_id');
    // If site ID is not set, return early
    if (empty($site_id)) {
        return;
    }
    // Set up the request arguments
    $args = array(
        'headers' => array(
            'x-pixobe-site-id' => $site_id,
        ),
    );
    // Make the API request
    $response = wp_remote_post("$pixobe_api_endpoint/trial", $args);

    // Check if request was successful
    if (is_wp_error($response)) {
        // Log error if needed
        error_log('Error calling API: ' . $response->get_error_message());
        return "Unable to activate, please try again later";
    } else {
        // Decode the API response
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);
        // Check if the response contains success status and site_id
        if (isset($data['success']) && $data['success'] && isset($data['site_id'])) {
            // Save site_id to plugin settings
            pixobe_colorgizer_update_site_data($data);
        }
    }
}


function pixobe_colorgizer_fetch_and_store_nonce()
{
    global $pixobe_api_endpoint;
    // Get the site ID from plugin settings
    $site_id = get_option('pixobe_colorgizer_site_id');
    // If site ID is not set, return early
    if (empty($site_id)) {
        return;
    }
    // Set up the request arguments
    $args = array(
        'headers' => array(
            'x-pixobe-site-id' => $site_id,
        ),
    );
    $pixobe_api_endpoint .= '/nonce?version=' . urlencode(PIXOBE_COLORING_BOOK_VERSION);
    // Make the API request to fetch the nonce
    $response = wp_remote_get($pixobe_api_endpoint, $args);
    // Check if the request was successful
    if (!is_wp_error($response)) {
        // Decode the API response
        $body = wp_remote_retrieve_body($response);
        // decode
        $data = json_decode($body, true);
        // Check if the response contains nonce
        pixobe_colorgizer_update_site_data($data);
        if (isset($data['nonce'])) {
            return $data['nonce'];
        }
        return "";
    }
}

function pixobe_colorgizer_get_nonce($refresh = false)
{
    $nonce = false;
    // Get the nonce from the transient
    if ($refresh != true) {
        // Retrieve nonce data from the options table
        $nonce = get_option('pixobe_coloring_nonce', array());
    }
    // Check if the nonce exists and is not empty
    if ($nonce !== false && !empty($nonce)) {
        // Use the nonce for your application logic
        return $nonce;
    } else {
        // Nonce is not available or expired
        return pixobe_colorgizer_fetch_and_store_nonce();
    }
}

/**
 *  On app deactivation
 */

function pixobe_colorgizer_deactivation()
{
    //delete nonce
    delete_option('pixobe_coloring_nonce');
    //delete site id
    delete_option('pixobe_colorgizer_site_id');
    //delete plan
    delete_option('pixobe_colorgizer_plan');
    //delete essage
    delete_option('pixobe_colorgizer_message');
    //delete pixobe_coloring_expiry
    delete_option('pixobe_coloring_expiry');
}


/**
 * common data
 */
function pixobe_colorgizer_update_site_data($data)
{
    if (isset($data['site_id'])) {
        update_option('pixobe_colorgizer_site_id', $data['site_id']);
    }

    if (isset($data['plan'])) {
        update_option('pixobe_colorgizer_plan', $data['plan']);
    }

    if (isset($data['message'])) {
        update_option('pixobe_colorgizer_message', $data['message']);
    }

    if (isset($data['nonce'])) {
        // Store updated nonce data in the options table
        update_option('pixobe_coloring_nonce', $data['nonce']);
    }
    if (isset($data['expiry_date'])) {
        // Store updated nonce data in the options table
        update_option('pixobe_coloring_expiry', $data['expiry_date']);
    }
}
