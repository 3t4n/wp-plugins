<?php
/**
 * Updates the automated generation order for a specific context. Called via AJAX.
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
    ai4seo_return_error_as_json("No or malformed context.", 3711171224);
}


// === CHECK PARAMETER: ORDER ========================================================= \\

// get checked parameter
$ai4seo_new_automated_generation_order = sanitize_key($_REQUEST["order"]);

if (!$ai4seo_new_automated_generation_order || !defined('AI4SEO_AVAILABLE_AUTOMATED_GENERATION_ORDER_OPTIONS') || !isset(AI4SEO_AVAILABLE_AUTOMATED_GENERATION_ORDER_OPTIONS[$ai4seo_new_automated_generation_order])) {
    ai4seo_return_error_as_json("No or malformed order.", 3811171224);
}


// ___________________________________________________________________________________________ \\
// === PROCESS =============================================================================== \\
// ¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯ \\

ai4seo_update_automated_generation_order_direction($ai4seo_context, $ai4seo_new_automated_generation_order);


// ___________________________________________________________________________________________ \\
// === RESPONSE ============================================================================== \\
// ¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯ \\

wp_send_json_success();