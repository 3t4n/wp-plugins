<?php
/**
 * Updates the licence key. Called via AJAX.
 *
 * @since 1.1
 */

if (!defined("ABSPATH")) {
    exit;
}

if (!ai4seo_can_manage_this_plugin()) {
    return;
}


// ___________________________________________________________________________________________ \\
// === PREPARE =============================================================================== \\
// ¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯ \\

// === CHECK PARAMETER: licence_key ============================================================== \\

// get sanitized username parameter
$ai4seo_new_robhub_api_username = sanitize_key($_REQUEST["ai4seo_username"]);

// Get sanitized licence key parameter
$ai4seo_new_robhub_api_password = sanitize_key($_REQUEST["ai4seo_licence_key"]);

if (!$ai4seo_new_robhub_api_username || !preg_match("/^[a-z0-9_-]+$/", $ai4seo_new_robhub_api_username)) {
    ai4seo_return_error_as_json("No or malformed username.", 4710271224);
}

if (!$ai4seo_new_robhub_api_password || !preg_match("/^[a-z0-9]+$/", $ai4seo_new_robhub_api_password)) {
    ai4seo_return_error_as_json("No or malformed licence key.", 371222324);
}

if (!ai4seo_robhub_api() instanceof Ai4Seo_RobHubApiCommunicator) {
    ai4seo_return_error_as_json("Could not initialize API communicator. Please contact the plugin developer.", 401222324);
}


// ___________________________________________________________________________________________ \\
// === READ OLD AUTH DATA ==================================================================== \\
// ¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯ \\

$ai4seo_robhub_auth_data = ai4seo_robhub_api()->read_auth_data();

if ($ai4seo_robhub_auth_data) {
    if (!is_array($ai4seo_robhub_auth_data) || count($ai4seo_robhub_auth_data) !== 2) {
        ai4seo_return_error_as_json("Could not read old credentials.", 421222324);
    }

    $ai4seo_robhub_auth_data = ai4seo_deep_sanitize($ai4seo_robhub_auth_data);
}

$ai4seo_old_robhub_api_username = $ai4seo_robhub_auth_data[0] ?? "";
$ai4seo_old_robhub_api_password = $ai4seo_robhub_auth_data[1] ?? "";


// ___________________________________________________________________________________________ \\
// === UPDATE AUTH DATA IN DATABASE ========================================================== \\
// ¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯ \\

$ai4seo_save_credentials_success = ai4seo_robhub_api()->use_this_credentials($ai4seo_new_robhub_api_username, $ai4seo_new_robhub_api_password, true);

if (!$ai4seo_save_credentials_success) {
    ai4seo_return_error_as_json("Could not save new credentials.", 381222324);
}


// ___________________________________________________________________________________________ \\
// === TEST NEW CREDENTIALS ================================================================== \\
// ¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯ \\

$ai4seo_robhub_api_response = ai4seo_robhub_api()->call("client/credits-balance");

if (!isset($ai4seo_robhub_api_response["success"]) || $ai4seo_robhub_api_response["success"] !== true) {
    // try to restore old licence key before returning error
    if ($ai4seo_old_robhub_api_username && $ai4seo_old_robhub_api_password) {
        // restore old licence key
        $ai4seo_save_credentials_success = ai4seo_robhub_api()->use_this_credentials($ai4seo_old_robhub_api_username, $ai4seo_old_robhub_api_password, true);

        if (!$ai4seo_save_credentials_success) {
            ai4seo_return_error_as_json("Could not restore old credentials.", 616181024);
        }
    }

    ai4seo_return_error_as_json("Could not verify new credentials.", 391222324);
}


// ___________________________________________________________________________________________ \\
// === RESPONSE ============================================================================== \\
// ¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯ \\

// unset option _ai4seo_last_credit_balance_check, so we can check the balance again
delete_option("_ai4seo_last_credit_balance_check");

wp_send_json_success();