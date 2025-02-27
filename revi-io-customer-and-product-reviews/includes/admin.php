<?php

if (!defined('ABSPATH')) {
    exit;
}

function my_theme_notice()
{
    $REVI_NOTIFICATIONS = get_option('REVI_NOTIFICATIONS');
    if ($REVI_NOTIFICATIONS == false) {
        $REVI_NOTIFICATIONS = array();
    }
    $id_user = get_current_user_id();
    if (isset($_GET['revi_dismiss_notification'])) {
        array_push($REVI_NOTIFICATIONS, $id_user);
        update_option('REVI_NOTIFICATIONS', $REVI_NOTIFICATIONS);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    if (is_array(($REVI_NOTIFICATIONS))) {
        if (!in_array($id_user, $REVI_NOTIFICATIONS)) {
            include REVI_DIR . 'templates/admin/rate_revi_notification.php';
        }
    }
}

function revi_load_plugin_textdomain()
{
    load_plugin_textdomain('revi-io-customer-and-product-reviews', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}

function revi_admin_styles()
{
    $plugin_data = get_plugin_data(WP_PLUGIN_DIR . '/revi-io-customer-and-product-reviews/revi.php');

    wp_enqueue_style('back_css', REVI_PLUGIN_URL . 'assets/css/back.css?v=' . $plugin_data['Version']);
}

function revi_plugin_admin_add_page()
{
    add_menu_page('Revi', 'Revi', 'manage_options', 'revi', 'revi_plugin_configuration_page', REVI_PLUGIN_URL . 'icon.png');
}

// Plugin configuration page
function revi_plugin_configuration_page()
{
    wp_enqueue_style('revi_bootstrap_css', REVI_PLUGIN_URL . 'assets/css/bootstrap.min.css');

    update_revi_database_from_files();


    $saveFormMessage = null;
    $result_update = false;
    if (isset($_POST['REVI_API_KEY'])) {
        $saveFormMessage = revi_save_content();
    }

    // Not logged in
    if (!get_option('REVI_API_KEY')) {
        include REVI_DIR . 'templates/admin/login.php';
        return;
    }

    $reviGeneralModel = new reviGeneralModel();
    $moduleMessage =  $reviGeneralModel->checkModuleMessage();

    $moduleAlert = null;
    if (!empty($moduleMessage->success)) {
        $moduleAlert = [
            'label' => $moduleMessage->label,
            'message' => $moduleMessage->message,
        ];
    }


    $selectedStatuses = get_option('REVI_ORDER_STATUSES');
    if (empty($selectedStatuses)) {
        $selectedStatuses = [];
    }

    $allStatuses = [];
    if (WOOCOMMERCE_ACTIVE) {
        $allStatuses = wc_get_order_statuses();
    }

    $status_selected = [];
    if (is_array(($selectedStatuses))) {
        foreach ($allStatuses as $key => $value) {

            if (in_array($key, $selectedStatuses)) {
                $status_selected[$key] = true;
            } else {
                $status_selected[$key] = false;
            }
        }
    }

    $order_status = [];
    if (WOOCOMMERCE_ACTIVE) {
        $order_status = wc_get_order_statuses();
    }

    $REVI_ACTIVE_LANGUAGES = json_decode(get_option('REVI_ACTIVE_LANGUAGES'));
    $REVI_SELECTED_LANGUAGE = get_option('REVI_SELECTED_LANGUAGE');

    $REVI_PRODUCT_METADATA = get_option('REVI_PRODUCT_METADATA');
    $REVI_TAB_REVIEWS = get_option('REVI_TAB_REVIEWS');
    $REVI_TAB_PRODUCT_STARS = get_option('REVI_TAB_PRODUCT_STARS');
    $REVI_DISPLAY_WIDGET_FLOATING = get_option('REVI_DISPLAY_WIDGET_FLOATING');

    $REVI_WOOCOMMERCE_REVIEWS = get_option('REVI_WOOCOMMERCE_REVIEWS');

    $REVI_DISPLAY_PRODUCT_LIST_ALIGN = get_option('REVI_DISPLAY_PRODUCT_LIST_ALIGN');
    $REVI_DISPLAY_PRODUCT_LIST_EMPTY = get_option('REVI_DISPLAY_PRODUCT_LIST_EMPTY');
    $REVI_DISPLAY_PRODUCT_LIST_BLANK_SPACE = get_option('REVI_DISPLAY_PRODUCT_LIST_BLANK_SPACE');
    $REVI_DISPLAY_PRODUCT_LIST_TEXT = get_option('REVI_DISPLAY_PRODUCT_LIST_TEXT');

    $REVI_DISPLAY_WIDGET_WITHOUT_REVIEWS = get_option('REVI_DISPLAY_WIDGET_WITHOUT_REVIEWS');

    $subscription = 'free';
    if (get_option('REVI_SUBSCRIPTION') == 2) {
        $subscription = 'pro';
    } else if (get_option('REVI_SUBSCRIPTION') == 3) {
        $subscription = 'premium';
    } else if (get_option('REVI_SUBSCRIPTION') == 4) {
        $subscription = 'unlimited';
    }

    include REVI_DIR . 'templates/admin/settings.php';
}


function revi_save_content()
{
    $reviGeneralModel = new reviGeneralModel();
    $reviGeneralModel->sendModuleVersion();

    // Update API key
    $api_key = sanitize_text_field($_POST['REVI_API_KEY']);
    update_option('REVI_API_KEY', $api_key);

    // Update configuration
    $result_update = $reviGeneralModel->updateConfiguration();
    if (!$result_update) {
        update_option('REVI_API_KEY', '');
        return [
            'success' => false,
            'label' => 'danger',
            'message' =>  'Wrong API KEY, not logged in, try again or contact us at revi.io'
        ];
    }

    // Define an array of options to update
    $options = [
        'status' => 'REVI_ORDER_STATUSES',
        'REVI_SELECTED_LANGUAGE' => 'REVI_SELECTED_LANGUAGE',
        'REVI_PRODUCT_METADATA' => 'REVI_PRODUCT_METADATA',
        'REVI_TAB_REVIEWS' => 'REVI_TAB_REVIEWS',
        'REVI_TAB_PRODUCT_STARS' => 'REVI_TAB_PRODUCT_STARS',
        'REVI_DISPLAY_WIDGET_FLOATING' => 'REVI_DISPLAY_WIDGET_FLOATING',
        'REVI_WOOCOMMERCE_REVIEWS' => 'REVI_WOOCOMMERCE_REVIEWS',

        'REVI_DISPLAY_PRODUCT_LIST_ALIGN' => 'REVI_DISPLAY_PRODUCT_LIST_ALIGN',
        'REVI_DISPLAY_PRODUCT_LIST_EMPTY' => 'REVI_DISPLAY_PRODUCT_LIST_EMPTY',
        'REVI_DISPLAY_PRODUCT_LIST_BLANK_SPACE' => 'REVI_DISPLAY_PRODUCT_LIST_BLANK_SPACE',
        'REVI_DISPLAY_PRODUCT_LIST_TEXT' => 'REVI_DISPLAY_PRODUCT_LIST_TEXT',

        'REVI_DISPLAY_WIDGET_WITHOUT_REVIEWS' => 'REVI_DISPLAY_WIDGET_WITHOUT_REVIEWS'
    ];

    // Loop through each option and update it if set
    foreach ($options as $post_key => $option_name) {
        if (isset($_POST[$post_key])) {
            $sanitized_value = is_array($_POST[$post_key]) ? array_map('sanitize_text_field', $_POST[$post_key]) : sanitize_text_field($_POST[$post_key]);
            update_option($option_name, $sanitized_value);
        }
    }

    revi_verifyTables();

    return [
        'success' => true,
        'label' => 'success',
        'message' => 'Congratulations! You are now logged in successfully'
    ];
}
