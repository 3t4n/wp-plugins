<?php
/**
 * Renders the content of the submenu page for the AI for SEO dashboard page.
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

// === RESET CREDITS BALANCE CHECK =========================================================== \\

if (isset($_GET["ai4seo_refresh_credits_balance"])) {
    ai4seo_robhub_api()->reset_last_credit_balance_check();
}


// === CONNECT TO ROBHUB API & CHECK CLIENTS CREDENTIALS ===================================== \\

$ai4seo_successfully_init_credentials = ai4seo_robhub_api()->init_credentials();

// Define variable for the client-id
$ai4seo_client_id = "";
$ai4seo_current_credits_balance = 0;
$ai4seo_current_subscription_data = array();

// get current consumption via robhub api
if (ai4seo_robhub_api()->has_credentials()) {
    $ai4seo_client_id = ai4seo_robhub_api()->get_api_username();

    $ai4seo_client_subscription_response = ai4seo_robhub_api()->call("client/subscription");

    // Interpret results
    $ai4seo_current_subscription_data = $ai4seo_client_subscription_response["data"] ?? array();
    $ai4seo_current_credits_balance = ai4seo_robhub_api()->get_credits_balance();

    // if the subscription data contains a new-credits-balance, we update the current_credits_balance and reset the last credit balance check
    // as the user may have purchased a plan and the old cache value is not valid anymore
    if (isset($ai4seo_current_subscription_data["new-credits-balance"]) && $ai4seo_current_subscription_data["new-credits-balance"] != $ai4seo_current_credits_balance) {
        $ai4seo_current_credits_balance = (int) $ai4seo_current_subscription_data["new-credits-balance"];
        ai4seo_robhub_api()->reset_last_credit_balance_check();
    }
}


// === CHECK SUBSCRIPTION ====================================================================== \\

// set default values for a free plan if something went wrong
if (!$ai4seo_current_subscription_data) {
    $ai4seo_current_subscription_data = array (
        "plan" => "free",
    );
}

$ai4seo_current_subscription_plan = $ai4seo_current_subscription_data["plan"] ?? "free";
$ai4seo_user_is_on_free_plan = ($ai4seo_current_subscription_plan == "free");
$ai4seo_current_subscription_plan_css_class = ($ai4seo_user_is_on_free_plan ? "ai4seo-black-message" : "ai4seo-green-message");
$ai4seo_current_subscription_start_date_and_time = $ai4seo_current_subscription_data["subscription_start"] ?? false;
$ai4seo_current_subscription_start_timestamp = $ai4seo_current_subscription_start_date_and_time
    ? strtotime($ai4seo_current_subscription_start_date_and_time) : 0;
$ai4seo_current_subscription_duration_in_seconds = $ai4seo_current_subscription_start_timestamp ? time() - $ai4seo_current_subscription_start_timestamp : 0;
$ai4seo_current_subscription_duration_in_days = $ai4seo_current_subscription_duration_in_seconds ? $ai4seo_current_subscription_duration_in_seconds / DAY_IN_SECONDS : 0;
$ai4seo_current_subscription_end_date_and_time = $ai4seo_current_subscription_data["subscription_end"] ?? false;
$ai4seo_current_subscription_end_timestamp = $ai4seo_current_subscription_end_date_and_time
    ? strtotime($ai4seo_current_subscription_end_date_and_time) : 0;
$ai4seo_current_subscription_end_date_and_time = ai4seo_format_unix_timestamp($ai4seo_current_subscription_end_timestamp);
$ai4seo_current_subscription_do_renew = $ai4seo_current_subscription_data["do_renew"] ?? false;
$ai4seo_current_subscription_renew_frequency = $ai4seo_current_subscription_data["renew_frequency"] ?? false;
$ai4seo_current_subscription_next_credits_refresh_date_and_time = $ai4seo_current_subscription_data["next_credits_refresh"] ?? false;
$ai4seo_current_subscription_next_credits_refresh_timestamp = $ai4seo_current_subscription_next_credits_refresh_date_and_time
    ? strtotime($ai4seo_current_subscription_next_credits_refresh_date_and_time) : 0;
$ai4seo_next_free_credits_timestamp = $ai4seo_current_subscription_data["next_free_credits"] ?? false;
$ai4seo_last_website_toc_and_pp_update_time = (int) ($ai4seo_current_subscription_data["last_terms_update_time"] ?? false);

// double check if subscription should be renewed
$ai4seo_current_subscription_do_renew = !$ai4seo_user_is_on_free_plan
    && $ai4seo_current_subscription_end_date_and_time
    && $ai4seo_current_subscription_do_renew == "1";

$ai4seo_current_subscription_renew_frequency = $ai4seo_current_subscription_do_renew
    ? $ai4seo_current_subscription_renew_frequency : false;

$ai4seo_current_subscription_renew_date_and_time = $ai4seo_current_subscription_do_renew
    ? $ai4seo_current_subscription_end_date_and_time : false;

$ai4seo_current_subscription_plan_name = ai4seo_get_plan_name($ai4seo_current_subscription_plan);
$ai4seo_current_subscription_plan_credits = ai4seo_get_plan_credits($ai4seo_current_subscription_plan);

if ($ai4seo_current_credits_balance > $ai4seo_current_subscription_plan_credits) {
    $ai4seo_current_subscription_plan_credits = $ai4seo_current_credits_balance;
}

$ai4seo_credits_used = $ai4seo_current_subscription_plan_credits - $ai4seo_current_credits_balance;
$ai4seo_credits_used_percentage = $ai4seo_current_subscription_plan_credits
    ? round($ai4seo_credits_used / $ai4seo_current_subscription_plan_credits * 100) : 0;

// check if we should show the licence key
if (!$ai4seo_user_is_on_free_plan) {
    // check for the environmental variable to see if the licence key was already shown
    $ai4seo_licence_key_shown = (bool) ai4seo_read_environmental_variable(AI4SEO_ENVIRONMENTAL_VARIABLE_LICENCE_KEY_SHOWN);

    if (!$ai4seo_licence_key_shown) {
        // set or create the option to true
        ai4seo_update_environmental_variable(AI4SEO_ENVIRONMENTAL_VARIABLE_LICENCE_KEY_SHOWN, true);
        $ai4seo_robhub_api_username = ai4seo_robhub_api()->get_api_username();
        $ai4seo_robhub_api_password = ai4seo_robhub_api()->get_api_password();
        $ai4seo_congratulation_text = __("Thank you for purchasing your subscription! Your username and license key will be displayed shortly. These credentials are essential for accessing your subscription. Please keep them secure, as you’ll need them to continue using your subscription, reinstall the plugin, or activate it on another website. If you have any questions or need assistance, our team is here to help.", "ai-for-seo");
        $ai4seo_your_api_username_text = __("Your username", "ai-for-seo");
        $ai4seo_your_api_password_text = __("Your license key", "ai-for-seo");
        $ai4seo_thank_you_text = __("Thank you!", "ai-for-seo");

        // use js function ai4seo_show_notification_modal to show the licence key
        echo "<script>";
        // on script load
        echo "jQuery(document).ready(function() {";
            echo "const ai4seo_notification_modal_headline = '" . esc_js($ai4seo_thank_you_text) . "';";
            echo "const ai4seo_notification_modal_content = \"" . esc_js($ai4seo_congratulation_text) . "<br><br>" . esc_js($ai4seo_your_api_username_text) . ": <textarea class='ai4seo-username-box'>" . esc_js($ai4seo_robhub_api_username) . "</textarea>" . "<br><br>" . esc_js($ai4seo_your_api_password_text) . ": <textarea class='ai4seo-licence-key-box'>" . esc_js($ai4seo_robhub_api_password) . "</textarea>" . "\";";
            echo "const ai4seo_notification_modal_button_row_html = \"<a onclick='ai4seo_hide_notification_modal();' class='button ai4seo-button ai4seo-success-button'>" . esc_js(__("Got it!", "ai-for-seo")) . "</a>\";";
            echo "ai4seo_show_notification_modal(ai4seo_notification_modal_content, ai4seo_notification_modal_headline, ai4seo_notification_modal_button_row_html);";
        echo "});";
        echo "</script>";

        unset($ai4seo_robhub_api_username, $ai4seo_robhub_api_password);
    }
}

// already purchased modal
$ai4seo_already_purchased_modal_headline = __("Just purchased?", "ai-for-seo");
$ai4seo_already_purchased_modal_content_1 = __("Try to reload the page to see your new plan. If you still see the old plan, please contact us.", "ai-for-seo");
$ai4seo_already_purchased_modal_content_2 = __("If you have reinstalled the plugin or wish to activate an existing subscription from your main account, please enter your username and license key below to continue using your subscription.", "ai-for-seo");
$ai4seo_already_purchased_modal_content_3 = __("Username", "ai-for-seo") . ":";

// find the matching badge image for the current plan
switch ($ai4seo_current_subscription_plan) {
    case "s":
        $ai4seo_current_subscription_plan_badge_image_path = "basic-plan.jpg";
        break;
    case "m":
        $ai4seo_current_subscription_plan_badge_image_path = "pro-plan.jpg";
        break;
    case "l":
        $ai4seo_current_subscription_plan_badge_image_path = "premium-plan.jpg";
        break;
    default:
        $ai4seo_current_subscription_plan_badge_image_path = "free-plan.jpg";
        break;
}

$ai4seo_purchase_plan_url = ai4seo_get_purchase_plan_url($ai4seo_client_id);

// update the last website's ToC and PP update time if it is not set
if ($ai4seo_last_website_toc_and_pp_update_time && $ai4seo_last_website_toc_and_pp_update_time != ai4seo_read_environmental_variable(AI4SEO_ENVIRONMENTAL_VARIABLE_LAST_WEBSITE_TOC_AND_PP_UPDATE_TIME)) {
    ai4seo_update_environmental_variable(AI4SEO_ENVIRONMENTAL_VARIABLE_LAST_WEBSITE_TOC_AND_PP_UPDATE_TIME, $ai4seo_last_website_toc_and_pp_update_time);

    // in addition, if the product terms update time is newer than the TOS accepted time, we reload the page, so the user
    // sees the new terms of service
    if ($ai4seo_last_website_toc_and_pp_update_time > ai4seo_read_environmental_variable(AI4SEO_ENVIRONMENTAL_VARIABLE_TOS_TOC_AND_PP_ACCEPTED_TIME)) {
        // reload page in this event
        echo "<script>";
            echo "jQuery(document).ready(function() {";
                echo "location.reload();";
            echo "});";
        echo "</script>";
        return;
    }
}


// === CHECK BULK GENERATION STATUS ========================================================== \\

$ai4seo_bulk_generation_status = ai4seo_get_cron_job_status(AI4SEO_BULK_GENERATION_CRON_JOB_NAME);


// ___________________________________________________________________________________________ \\
// === JAVASCRIPT ============================================================================ \\
// ¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯ \\

if ($ai4seo_user_is_on_free_plan) {
    $ai4seo_robhub_api_username = ai4seo_robhub_api()->get_api_username();

    // --- JAVASCRIPT --------------------------------------------------------- \\
    ?><script type="text/javascript">
        let ai4seo_lost_your_key_headline = '<?=esc_js(__("Lost your licence key?", "ai-for-seo"))?>';
        let ai4seo_lost_your_key_content = '<?=esc_js(__("Please contact us for assistance. To help us resolve your issue quickly, kindly provide details such as your website domain and the email address used during the purchase.", "ai-for-seo"))?>';
        ai4seo_lost_your_key_content += '<br><br><a href=\"<?=esc_url(AI4SEO_OFFICIAL_CONTACT_URL)?>\" target=\"_blank\" class=\"button ai4seo-button\"><?=esc_js(__("Contact us", "ai-for-seo"))?></a>';

        const ai4seo_already_purchased_modal_headline = '<?=esc_js($ai4seo_already_purchased_modal_headline)?>';
        let ai4seo_already_purchased_modal_content = '<?=esc_js($ai4seo_already_purchased_modal_content_1)?>';
        ai4seo_already_purchased_modal_content += '<br><br><div style=\"text-align: center;\"><a onclick=\"location.reload();\" class=\"button ai4seo-button\"><?=esc_js(__("Try refresh page", "ai-for-seo"))?></a></div><br><br>';
        ai4seo_already_purchased_modal_content += '<h2 style=\"display: block; text-align: center;\">- <?=esc_js(__("OR", "ai-for-seo"))?> -</h2><br>';
        ai4seo_already_purchased_modal_content += '<h2 style=\"display: block; text-align: center;\"><?=esc_js(__("Reinstalled plugin?", "ai-for-seo"))?></h2><br>';
        ai4seo_already_purchased_modal_content += '<?=esc_js($ai4seo_already_purchased_modal_content_2)?>';
        ai4seo_already_purchased_modal_content += '<br><br><?=esc_js($ai4seo_already_purchased_modal_content_3)?>';
        ai4seo_already_purchased_modal_content += '<br><input class=\"ai4seo-username-input\" id=\"ai4seo-username-input\" placeholder=\"<?=esc_attr__("Enter your username here", "ai-for-seo")?>\" value=\"<?=esc_attr($ai4seo_robhub_api_username)?>\">';
        ai4seo_already_purchased_modal_content += '<br><br><input class=\"ai4seo-licence-key-input\" id=\"ai4seo-licence-key-input\" placeholder=\"<?=esc_attr__("Enter licence code here", "ai-for-seo")?>\">';
        ai4seo_already_purchased_modal_content += '<br><br><a href=\"#\" onclick=\"ai4seo_show_notification_modal(ai4seo_lost_your_key_content, ai4seo_lost_your_key_headline)\">Lost your licence key?</a>';
        let ai4seo_already_purchased_modal_button_row_html = '<a onclick=\"ai4seo_hide_notification_modal();\" class=\"button ai4seo-button ai4seo-abort-button\"><?=esc_js(__("Abort", "ai-for-seo"))?></a> ';
        ai4seo_already_purchased_modal_button_row_html += '<a onclick=\"ai4seo_submit_new_licence_key();\" class=\"button ai4seo-button ai4seo-success-button\"><?=esc_js(__("Submit", "ai-for-seo"))?></a>';
    </script><?php
    // ------------------------------------------------------------------------ \\

    unset($ai4seo_robhub_api_username);
}


// ___________________________________________________________________________________________ \\
// === OUTPUT ================================================================================ \\
// ¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯ \\

if (isset($_GET["ai4seo_debug_generate_cronjob"]) && $_GET["ai4seo_debug_generate_cronjob"]) {
    ai4seo_automated_generation_cron_job(true);
}

if (isset($_GET["ai4seo_debug_analyze_cronjob"]) && $_GET["ai4seo_debug_analyze_cronjob"]) {
    ai4seo_analyze_plugin_performance(true);
}

if (isset($_GET["ai4seo-tidyup"]) && $_GET["ai4seo-tidyup"]) {
    ai4seo_tidy_up();

    $ai4seo_dashboard_url = ai4seo_get_admin_url("dashboard");

    // reload page
    echo "<script>";
        echo "jQuery(document).ready(function() {";
            echo "location.href = '" . esc_url($ai4seo_dashboard_url) . "';";
        echo "});";
    echo "</script>";

    return;
}


// === ERRORS ================================================================================= \\

// no subscription data -> echo error
$ai4seo_error_notice = "";

if (!$ai4seo_successfully_init_credentials) {
    $ai4seo_error_notice = esc_html__("Failed to verify your credentials", "ai-for-seo") . " #1. ";
} else if (isset($ai4seo_client_subscription_response) && !isset($ai4seo_client_subscription_response["success"]) || !$ai4seo_client_subscription_response["success"]) {
    $ai4seo_error_notice = esc_html__("Failed to verify your credentials", "ai-for-seo") . " #2. ";
} else if (isset($ai4seo_client_subscription_response) && !isset($ai4seo_client_subscription_response["data"]) || !$ai4seo_client_subscription_response["data"]) {
    $ai4seo_error_notice = esc_html__("Failed to verify your credentials", "ai-for-seo") . " #3. ";
} else if (!$ai4seo_current_subscription_plan) {
    $ai4seo_error_notice = esc_html__("Failed to verify your credentials", "ai-for-seo") . " #4. ";
}

// check if we have an error notice -> add more information and then echo it
if ($ai4seo_error_notice) {
    if (isset($ai4seo_client_subscription_response) && $ai4seo_client_subscription_response["message"]) {
        $ai4seo_error_notice .= "<strong>"  . esc_html($ai4seo_client_subscription_response["message"]) . "</strong> ";
    }

    if (isset($ai4seo_client_subscription_response) && $ai4seo_client_subscription_response["code"]) {
        $ai4seo_error_notice .= esc_html("(#" . $ai4seo_client_subscription_response["code"] . ").") . " ";
    }

    $ai4seo_error_notice .= sprintf(
            __("Please check your <a href='#' onclick='%s'>license data</a>, or feel free to <a href='%s' target='_blank'>contact us</a> for assistance. We offer support in any language.", "ai-for-seo"),
            "ai4seo_show_notification_modal(ai4seo_already_purchased_modal_content, ai4seo_already_purchased_modal_headline, ai4seo_already_purchased_modal_button_row_html)",
            esc_html(AI4SEO_OFFICIAL_CONTACT_URL)
    );

    ai4seo_echo_error_notice($ai4seo_error_notice, false);
}

// === MULTI LANGUAGE PLUGINS NOTICES ================================================================================= \\

if ((!ai4seo_is_one_time_notice_dismissed("wpml-notice") && ai4seo_is_plugin_or_theme_active(AI4SEO_THIRD_PARTY_PLUGIN_WPML))) {
    $ai4seo_wpml_notice = sprintf(esc_html__("Please note that %s is active on your website, and %s fully supports its functionality. Ideally, metadata and media attributes should be generated for each entry in every language. For this reason, the total number displayed on the dashboard appears higher, as each entry is processed separately for each language.", "ai-for-seo"), "<strong>WPML</strong>", "<span class='ai4seo-plugin-name'>" . AI4SEO_PLUGIN_NAME . "</span>");
    $ai4seo_wpml_notice .= "<p>" . esc_html__("For best results, we recommend keeping the language settings at \"automatic\", as this ensures the metadata is generated correctly for each language.", "ai-for-seo") . "</p>";
    ai4seo_echo_error_notice($ai4seo_wpml_notice, true, "wpml-notice");
}


// === STATISTICS ============================================================================ \\

$ai4seo_num_finished_posts_by_post_type = ai4seo_get_all_finished_posts_by_post_type();
$ai4seo_num_failed_posts_by_post_type = ai4seo_get_all_failed_posts_by_post_type();
$ai4seo_num_pending_posts_by_post_type = ai4seo_get_all_pending_posts_by_post_type();
$ai4seo_num_processing_posts_by_post_type = ai4seo_get_all_processing_posts_by_post_type();
$ai4seo_num_missing_posts_by_post_type = ai4seo_get_all_missing_posts_by_post_type();

echo "<div class='card ai4seo-card' style='overflow: hidden;'>";

// default values
$ai4seo_chart_values = [
    'done' => ['value' => 0, 'color' => '#00aa00'], // Green
    'processing' => ['value' => 0, 'color' => '#007bff'], // Blue
    'missing' => ['value' => 0, 'color' => '#dddddd'], // gray
    'failed' => ['value' => 0, 'color' => '#dc3545'], // Red
];

$ai4seo_supported_post_types = ai4seo_get_supported_post_types();

// push "attachment" to the end of the array
$ai4seo_supported_post_types[] = "attachment";

foreach ($ai4seo_supported_post_types AS $ai4seo_supported_post_type) {
    $ai4seo_this_num_finished_post_ids = $ai4seo_num_finished_posts_by_post_type[$ai4seo_supported_post_type] ?? 0;
    $ai4seo_this_num_failed_post_ids = $ai4seo_num_failed_posts_by_post_type[$ai4seo_supported_post_type] ?? 0;
    $ai4seo_this_num_pending_post_ids = $ai4seo_num_pending_posts_by_post_type[$ai4seo_supported_post_type] ?? 0;
    $ai4seo_this_num_processing_post_ids = $ai4seo_num_processing_posts_by_post_type[$ai4seo_supported_post_type] ?? 0;
    $ai4seo_this_num_missing_post_ids = $ai4seo_num_missing_posts_by_post_type[$ai4seo_supported_post_type] ?? 0;

    //workaround when cron job is not processing -> set pending and processing to 0
    if ($ai4seo_bulk_generation_status != "processing") {
        $ai4seo_this_num_pending_post_ids = 0;
        $ai4seo_this_num_processing_post_ids = 0;
    }

    // remove failed, pending and failed from missing
    $ai4seo_this_num_missing_post_ids -= $ai4seo_this_num_failed_post_ids;
    $ai4seo_this_num_missing_post_ids -= $ai4seo_this_num_pending_post_ids;
    $ai4seo_this_num_missing_post_ids -= $ai4seo_this_num_processing_post_ids;

    if ($ai4seo_this_num_missing_post_ids < 0) {
        $ai4seo_this_num_missing_post_ids = 0;
    }

    # todo: separate pending and processing posts
    # workaround: add $ai4seo_this_num_processing_post_ids to $ai4seo_this_num_pending_post_ids until we can better
    # separate them in the future
    $ai4seo_this_num_pending_post_ids += $ai4seo_this_num_processing_post_ids;

    $ai4seo_chart_values = [
        'done' => ['value' => $ai4seo_this_num_finished_post_ids, 'color' => '#00aa00'], // Green
        'processing' => ['value' => $ai4seo_this_num_pending_post_ids, 'color' => '#007bff'], // Blue
        'missing' => ['value' => $ai4seo_this_num_missing_post_ids, 'color' => '#dddddd'], // gray
        'failed' => ['value' => $ai4seo_this_num_failed_post_ids, 'color' => '#dc3545'], // Red
    ];

    // get total value, and continue if it is 0
    $ai4seo_total_value = array_sum(array_column($ai4seo_chart_values, "value"));

    if ($ai4seo_total_value == 0) {
        continue;
    }

    // attachment -> media workaround
    if ($ai4seo_supported_post_type == "attachment") {
        $ai4seo_supported_post_type = "media files";
    }

    $ai4seo_supported_post_type_label = ai4seo_get_post_type_translation($ai4seo_supported_post_type, true);
    $ai4seo_supported_post_type_label = ucfirst($ai4seo_supported_post_type_label);

    ai4seo_echo_half_donut_chart_with_headline_and_percentage($ai4seo_supported_post_type_label, $ai4seo_chart_values, $ai4seo_this_num_finished_post_ids, $ai4seo_total_value);
}

echo "<div class='ai4seo-chart-legend-container'>";
    ai4seo_echo_chart_legend($ai4seo_chart_values);
echo "</div>";

// clear both
echo "<div class='ai4seo-clear-both'></div>";

echo "</div>";


// === USED CREDITS ========================================================================== \\

echo "<div class='card ai4seo-card'>";

// Display the current consumption including a progress-bar and headline
echo "<h4>";
echo esc_html__("Credits used", "ai-for-seo");
echo "<div class='ai4seo-refresh-credits-balance-button-wrapper'>";
echo ai4seo_wp_kses(ai4seo_get_small_button_tag("#", "rotate", __("Refresh", "ai-for-seo"), "ai4seo-show-credits-used-info", "add_refresh_credits_balance_parameter_and_reload_page();"));
echo "</div>";
echo "</h4>";

if ($ai4seo_current_credits_balance < AI4SEO_MIN_CREDITS_BALANCE) {
    $ai4seo_consumption_progress_bar_class = "ai4seo-consumption-progress ai4seo-consumption-progress-red";
} else if ($ai4seo_credits_used_percentage >= 70) {
    $ai4seo_consumption_progress_bar_class = "ai4seo-consumption-progress ai4seo-consumption-progress-orange";
} else {
    $ai4seo_consumption_progress_bar_class = "ai4seo-consumption-progress";
}

echo "<div class='ai4seo-consumption-background'>";
echo "<div class='" . esc_attr($ai4seo_consumption_progress_bar_class) . "' style='width:" . esc_attr($ai4seo_credits_used_percentage) . "%'></div>";
echo "</div>";

// Display credits left
echo "<p>";

echo sprintf(
    esc_html__('%1$s of %2$s credits used.', 'ai-for-seo'),
    esc_html($ai4seo_credits_used),
    esc_html($ai4seo_current_subscription_plan_credits)
);

if ($ai4seo_next_free_credits_timestamp) {
    $ai4seo_next_free_credits_seconds_left = ai4seo_get_time_difference_in_seconds($ai4seo_next_free_credits_timestamp);
    echo " ";
    echo ai4seo_wp_kses(sprintf(
        __('Next <span class="ai4seo-green-bubble">+%1$s credits</span> in <strong>%2$s</strong>.', 'ai-for-seo'),
        esc_html(AI4SEO_DAILY_FREE_CREDITS_AMOUNT),
        "<span class='ai4seo-countdown' data-trigger='add_refresh_credits_balance_parameter_and_reload_page'>" . esc_html(ai4seo_format_seconds_to_hhmmss($ai4seo_next_free_credits_seconds_left)) . "</span>",
    ));
}

echo "</p>";
echo "<p>";

if ($ai4seo_current_credits_balance >= AI4SEO_MIN_CREDITS_BALANCE) {
    $ai4seo_num_approximate_remaining_ai_generation = floor($ai4seo_current_credits_balance / AI4SEO_MIN_CREDITS_BALANCE);
    echo ai4seo_wp_kses(sprintf(
        __('Your remaining credits cover up to <strong>%1$s</strong> pages, posts, products, media etc.', 'ai-for-seo'),
        esc_html($ai4seo_num_approximate_remaining_ai_generation)
    ));
} else {
    echo "<div class='ai4seo-tiny-gap'></div>";
    echo "<span class='ai4seo-red-message'>";
    echo ai4seo_wp_kses(ai4seo_get_svg_tag("triangle-exclamation", "", "ai4seo-red-icon ai4seo-big-paragraph-icon")) . " ";
    echo esc_html__("Your remaining credits are insufficient to cover any additional content entry.", "ai-for-seo");
    echo "</span>";
}

echo " ";

// Display credits-renewal-details
if ($ai4seo_user_is_on_free_plan) {
    $ai4seo_no_more_renewals_message = __("Please select a plan to activate monthly renewals.", "ai-for-seo");
} else if ($ai4seo_current_subscription_do_renew) {
    $ai4seo_no_more_renewals_message = __("Please consider upgrading your plan or wait for the next renewal.", "ai-for-seo");
} else {
    $ai4seo_no_more_renewals_message = __("Please consider continuing your subscription to activate monthly renewals.", "ai-for-seo");
}

if ($ai4seo_current_subscription_next_credits_refresh_date_and_time && $ai4seo_current_subscription_next_credits_refresh_timestamp > time()) {
    // subscription-end is more than one month in the future or we are going to renew the plan anyway (e.g. we are on a monthly renew frequency)
    if ($ai4seo_current_subscription_end_timestamp > strtotime("+1 month") || $ai4seo_current_subscription_do_renew) {
        // todo: translation could be done better with sprintf
        echo "<span class='ai4seo-green-message'><strong>";
        echo ai4seo_wp_kses(sprintf(
            __("Renews on %s.", "ai-for-seo"),
            esc_html($ai4seo_current_subscription_next_credits_refresh_date_and_time),
        ));
        echo "</strong></span>";
    } else {
        echo "<span class='ai4seo-red-message'><strong>" . esc_html($ai4seo_no_more_renewals_message) . "</strong></span>";
    }
} else {
    echo esc_html($ai4seo_no_more_renewals_message);
}

echo "</p>";

echo "</div>";


// ___________________________________________________________________________________________ \\
// === BLACK FRIDAY OFFER NOTICE ============================================================= \\
// ¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯¯ \\

if ($ai4seo_user_is_on_free_plan && time() <= 1733612399) {
    echo "<div class='card ai4seo-card' style='border-color:#037;background-color:#ace4f5;'>";
    echo "<h2 style='margin-bottom:5px;color:#037;font-weight:bold;font-size:2.5em;text-align:center;'>";
    echo "BLACK-FRIDAY-SALE:";
    echo "</h2>";

    echo "<h3 style='color:#b40a0a;text-decoration:underline;text-align:center;font-size:1.8em;font-weight:bold;'>";
    echo "30% LIFETIME DISCOUNT";
    echo "</h3>";

    echo "<p style='margin-top:0;font-size:larger;text-align:center;line-height:2em;'>";
    echo "By using the coupon-code ";
    echo "<span style='background-color:#003377;color:#fff;padding:2px 8px;border-radius:5px;'>";
    echo "BLACKFRIDAY";
    echo "</span>";
    echo " you will get a <span style='font-weight: bold; font-size: larger;'>30% lifetime discount</span> on all plans.";
    echo "</p>";

    echo "<p style='text-align:center;'>";
    echo ai4seo_wp_kses(ai4seo_get_button_text_link_tag($ai4seo_purchase_plan_url, "circle-up", esc_html__("Secure This Offer", "ai-for-seo"), "ai4seo-success-button"));
    echo "</p>";
    echo "</div>";
}


// === CURRENT PLAN ========================================================================== \\

// Display headline for the current plan
echo "<div class='card ai4seo-card'>";
    echo "<h4>" . esc_html__("Current plan", "ai-for-seo") . "</h4>";

    // plan badge
    echo "<div class='ai4seo-subscription-plan-badge'>";
    echo "<img alt='" . esc_attr($ai4seo_current_subscription_plan_name) . "' src='" . esc_url(ai4seo_get_assets_images_url("plan-badges/" . $ai4seo_current_subscription_plan_badge_image_path)) . "' />";
    echo "</div>";

    // credits renewal info
    $ai4seo_credits_renewal_info = "";

    if (!$ai4seo_user_is_on_free_plan) {
        $ai4seo_credits_renewal_info = sprintf(esc_html__("+%s credits/month", "ai-for-seo"), esc_html(ai4seo_get_plan_credits($ai4seo_current_subscription_plan)));
        $ai4seo_credits_renewal_info .= ", ";
    }

    $ai4seo_credits_renewal_info .= sprintf(esc_html__("+%s credits/day", "ai-for-seo"), esc_html(AI4SEO_DAILY_FREE_CREDITS_AMOUNT));

    // plan name
    echo "<div class='ai4seo-plan-name " . esc_attr($ai4seo_current_subscription_plan_css_class) . "'>" . esc_html($ai4seo_current_subscription_plan_name) . " <span class='ai4seo-credits-renewal-info'>(" . esc_html($ai4seo_credits_renewal_info) . ")</span></div>";

    // FREE PLAN
    if ($ai4seo_user_is_on_free_plan) {
        echo "<p>" . esc_html__("Click 'Upgrade' to view our plans.", "ai-for-seo") . "</p>";

        // Upgrade button
        echo "<div class='ai4seo-plan-buttons'>";
        echo ai4seo_wp_kses(ai4seo_get_button_text_link_tag($ai4seo_purchase_plan_url, "circle-up", esc_html__("Upgrade", "ai-for-seo"), "ai4seo-success-button"));

        // already purchased? button
        echo ai4seo_wp_kses(ai4seo_get_button_text_link_tag("#", "bolt", esc_html__("Already purchased?", "ai-for-seo"), "", "ai4seo_show_notification_modal(ai4seo_already_purchased_modal_content, ai4seo_already_purchased_modal_headline, ai4seo_already_purchased_modal_button_row_html)"));
        echo "</div>";
    } else {
        // PAID PLAN
        // infos about renewing the plan
        if ($ai4seo_current_subscription_do_renew) {
            echo "<p>";
                echo ai4seo_wp_kses(sprintf(
                    __("Renews on: %s (%s).", "ai-for-seo"),
                    esc_html($ai4seo_current_subscription_end_date_and_time),
                    esc_html($ai4seo_current_subscription_renew_frequency),
                ));
            echo "</p>";
        } else {
            // Check if subscription-end is in the past (should never be the case, as the user will fall back to the free plan)
            if ($ai4seo_current_subscription_end_timestamp < time()) {
                echo "<p class='ai4seo-red-message'>";
                    echo sprintf(esc_html__("Cancelled as of %s", "ai-for-seo"), esc_html($ai4seo_current_subscription_end_date_and_time));
                echo "</p>";
            } else {
                // Check if subscription-end is in the future
                echo "<p class='ai4seo-red-message'>";
                    echo sprintf(esc_html__("Plan expires on %s", "ai-for-seo"), esc_html($ai4seo_current_subscription_end_date_and_time));
                echo "</p>";
            }
        }

        echo "<div class='ai4seo-plan-buttons'>";
        echo ai4seo_wp_kses(ai4seo_get_button_text_link_tag(AI4SEO_STRIPE_BILLING_URL, "stripe", esc_html__("Manage Plan", "ai-for-seo"), "", "", "_blank"));
        echo ai4seo_wp_kses(ai4seo_get_button_text_link_tag("#", "key", esc_html__("Show Licence", "ai-for-seo"), "", "ai4seo_confirm_display_licence_information();"));
        echo "</div>";
    }

    // clear float
    echo "<div style='clear: both;'></div>";

echo "</div>";


// === MONEY BACK GUARANTEE ================================================================== \\

/*if ($ai4seo_current_subscription_duration_in_days < AI4SEO_MONEY_BACK_GUARANTEE_DAYS) {
    ai4seo_output_money_back_guarantee_notice();
}
echo "<div style='clear: both; height: 20px;'></div>";
*/


// === Ask for feedback ========================================================================== \\

echo "<div class='card ai4seo-card'>";
    // WordPress help icon
    echo ai4seo_wp_kses(ai4seo_get_svg_tag("circle-question", __("Help", "ai-for-seo"), "ai4seo-big-paragraph-icon")) . " ";

    echo ai4seo_wp_kses(sprintf(
        /* translators: %s is a clickable email address */
        __("Missing a feature, need assistance, or looking for a quote?", "ai-for-seo") . " " .
        __("Please <a href='%s' target='blank'>contact us</a>. We offer support in any language.", "ai-for-seo"),
        esc_attr(AI4SEO_OFFICIAL_CONTACT_URL)
    ));
echo "</div>";