<?php
/**
 * Sets or unsets automated generation for a specific context. Called via AJAX.
 *
 * @since 1.0
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

// === CHECK PARAMETER: context ============================================================== \\

// Get sanitized context parameter
$ai4seo_context = sanitize_key($_REQUEST["context"]);

if (!$ai4seo_context || !preg_match("/^[a-zA-Z0-9_-]+$/", $ai4seo_context)) {
    ai4seo_return_error_as_json("No or malformed context.", 491018723);
}


// === CHECK PARAMETER: set or unset ========================================================= \\

// get checked parameter
$ai4seo_is_automated_generation_enabled = sanitize_key($_REQUEST["checked"]);

if (!$ai4seo_is_automated_generation_enabled || !in_array($ai4seo_is_automated_generation_enabled, array("false", "true"))) {
    ai4seo_return_error_as_json("No or malformed checked.", 511018723);
}

// transform to int
$ai4seo_is_automated_generation_enabled = ($ai4seo_is_automated_generation_enabled == "true" ? "1" : "0");


// ___________________________________________________________________________________________ \\
// === PROCESS =============================================================================== \\
// ¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯ \\

if ($ai4seo_is_automated_generation_enabled) {
    ai4seo_enable_automated_generation($ai4seo_context);

    // if automation is activated, search for entries with missing data right away, so we can see first visual feedback
    switch ($ai4seo_context) {
        case "attachment":
            ai4seo_excavate_attachments_with_missing_attributes();
            break;
        default:
            ai4seo_excavate_post_entries_with_missing_metadata();
    }


// try to start the generation of data asap
    ai4seo_inject_additional_cronjob_call(AI4SEO_BULK_GENERATION_CRON_JOB_NAME);
} else {
    ai4seo_disable_automated_generation($ai4seo_context);

    // remove all pending post ids
    ai4seo_remove_all_post_ids_by_post_type_and_generation_status($ai4seo_context, AI4SEO_PENDING_METADATA_POST_IDS_OPTION_NAME);
    ai4seo_refresh_all_posts_generation_status_summary();
}


// ___________________________________________________________________________________________ \\
// === RESPONSE ============================================================================== \\
// ¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯ \\

wp_send_json_success();