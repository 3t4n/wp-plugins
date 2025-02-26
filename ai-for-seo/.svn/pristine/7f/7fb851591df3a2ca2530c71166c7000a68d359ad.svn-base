<?php
/**
 * Updates the automated generation new or existing filter for a specific context. Called via AJAX.
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
    ai4seo_return_error_as_json("No or malformed context.", 3911171224);
}


// === CHECK PARAMETER: NEW OR EXISTING FILTER ========================================================= \\

$ai4seo_new_new_or_existing_filter = sanitize_key($_REQUEST["new_or_existing_filter"]);

if (!$ai4seo_new_new_or_existing_filter || !defined('AI4SEO_AVAILABLE_AUTOMATED_GENERATION_NEW_OR_EXISTING_FILTER_OPTIONS') || !isset(AI4SEO_AVAILABLE_AUTOMATED_GENERATION_NEW_OR_EXISTING_FILTER_OPTIONS[$ai4seo_new_new_or_existing_filter])) {
    ai4seo_return_error_as_json("No or malformed new_or_existing_filter.", 4011171224);
}

// exclude the refresh of the timestamp on swaps between new and existing filter
$ai4seo_old_automated_generation_new_or_existing_filter = ai4seo_get_automated_generation_new_or_existing_filter($ai4seo_context);
$ai4seo_old_automated_generation_new_or_existing_filter_reference_timestamp = ai4seo_get_automated_generation_new_or_existing_filter_reference_timestamp($ai4seo_context);

$do_refresh_reference_timestamp = true;
$exclude_swaps_between_these_filters = array("new", "existing");

if ($ai4seo_old_automated_generation_new_or_existing_filter_reference_timestamp) {
    if (in_array($ai4seo_old_automated_generation_new_or_existing_filter, $exclude_swaps_between_these_filters) && in_array($ai4seo_new_new_or_existing_filter, $exclude_swaps_between_these_filters)) {
        $do_refresh_reference_timestamp = false;
    }
}

// ___________________________________________________________________________________________ \\
// === PROCESS =============================================================================== \\
// ¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯ \\

ai4seo_update_automated_generation_new_or_existing_filter($ai4seo_context, $ai4seo_new_new_or_existing_filter);

if ($do_refresh_reference_timestamp) {
    ai4seo_update_automated_generation_new_or_existing_filter_reference_timestamp($ai4seo_context, time());
}


// ___________________________________________________________________________________________ \\
// === RESPONSE ============================================================================== \\
// ¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯ \\

wp_send_json_success();