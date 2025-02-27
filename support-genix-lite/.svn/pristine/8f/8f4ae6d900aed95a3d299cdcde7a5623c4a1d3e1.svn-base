<?php

/**
 * API config.
 */

defined('ABSPATH') || exit;

class APBDWPSAPIConfig extends Apbd_WPS_API_Base
{
    public function __construct($namespace, $register = true)
    {
        parent::__construct($namespace, $register);
    }

    function setAPIBase()
    {
        return 'basic';
    }

    function routes()
    {
        $this->RegisterRestRoute('GET', 'nonce', [$this, "get_nonce"]);
        $this->RegisterRestRoute('GET', 'settings', [$this, "basic_settings"]);
        $this->RegisterRestRoute('POST', 'is-valid-custom-field', [$this, "is_valid_cf"]);
    }

    public function get_nonce()
    {
        $this->response->SetResponse(true, "", [
            'rest' => wp_create_nonce('wp_rest'),
            'ajax' => wp_create_nonce('ajax-nonce'),
        ]);

        return $this->response;
    }

    function basic_settings()
    {
        global $getUser;

        // Home URL.
        $home_url = get_home_url();

        // Core object.
        $coreObject = APBDWPSupportLite::GetInstance();

        // Logged user.
        $getUser = wp_get_current_user();
        $logged_user = null;
        $is_master = false;

        if (is_user_logged_in()) {
            $userObj = wp_get_current_user();

            $logged_user = new stdClass();
            $logged_user->id = strval(absint($userObj->ID));
            $logged_user->first_name = $userObj->first_name;
            $logged_user->last_name = $userObj->last_name;
            $logged_user->name = trim($userObj->first_name . ' ' . $userObj->last_name);
            $logged_user->email = $userObj->user_email;
            $logged_user->img = get_user_meta($userObj->ID, 'supportgenix_avatar', true) ? get_user_meta($userObj->ID, 'supportgenix_avatar', true) : get_avatar_url($userObj->ID);

            if (empty($logged_user->name)) {
                $logged_user->name = $userObj->display_name;
            }

            $logged_user->custom_fields = apply_filters('apbd-wps/filter/user-custom-properties', [], $userObj->ID);
            $is_master = Apbd_wps_settings::isAgentLoggedIn($userObj);
        }

        // Categories.
        $catObj = new Mapbd_wps_ticket_category();
        $catRecords = $catObj->SelectAllWithKeyValue("id", "title", 'id', 'ASC', '', '', '', '', ['status' => 'A']);
        $categories = [
            [
                'value' => '',
                'label' => '-- ' . $coreObject->__('Select Category') . ' --',
            ]
        ];

        if ($catRecords) {
            foreach ($catRecords as $id => $title) {
                $categories[] = [
                    'value' => strval($id),
                    'label' => $title,
                ];
            }
        }

        // File settings.
        $ticket_file_upload = Apbd_wps_settings::GetModuleOption('ticket_file_upload', 'A');
        $file_upload_size = Apbd_wps_settings::GetModuleOption('file_upload_size', 2);
        $allowed_type = Apbd_wps_settings::GetModuleOption('allowed_type', ['image', 'docs', 'text', 'pdf']);

        $ticket_file_upload = ('A' === $ticket_file_upload) ? true : false;

        $file_upload = [
            'ticket_file_upload' => $ticket_file_upload,
            'file_upload_size' => $file_upload_size,
            'allowed_type' => $allowed_type,
        ];

        // Custom fields.
        $custom_fields = Mapbd_wps_custom_field::getCustomFieldForAPI();
        $custom_fields = apply_filters('apbd-wps/filter/before-custom-get', $custom_fields);

        // General settings.
        $close_ticket_opt_for_customer = 'N';
        $disable_closed_ticket_reply = 'N';
        $disable_closed_ticket_reply_notice = '';
        $is_public_ticket_opt_on_creation = Apbd_wps_settings::GetModuleOption("is_public_ticket_opt_on_creation", 'N');
        $is_public_ticket_opt_on_details = Apbd_wps_settings::GetModuleOption("is_public_ticket_opt_on_details", 'N');
        $is_public_tickets_menu = Apbd_wps_settings::GetModuleOption("is_public_tickets_menu", 'N');
        $disable_registration_form = Apbd_wps_settings::GetModuleOption('disable_registration_form', 'N');
        $disable_guest_ticket_creation = Apbd_wps_settings::GetModuleOption('disable_guest_ticket_creation', 'N');

        // Login with google
        $login_with_google_url = '';

        // Login with envato
        $login_with_envato_url = '';

        // Finalize.
        $close_ticket_opt_for_customer = 'Y' === $close_ticket_opt_for_customer ? 'Y' : 'N';
        $disable_closed_ticket_reply = 'Y' === $disable_closed_ticket_reply ? 'Y' : 'N';
        $disable_closed_ticket_reply_notice = sanitize_text_field($disable_closed_ticket_reply_notice);
        $is_public_ticket_opt_on_creation = 'Y' === $is_public_ticket_opt_on_creation ? 'Y' : 'N';
        $is_public_ticket_opt_on_details = 'Y' === $is_public_ticket_opt_on_details ? 'Y' : 'N';
        $is_public_tickets_menu = 'Y' === $is_public_tickets_menu ? 'Y' : 'N';
        $disable_registration_form = 'Y' === $disable_registration_form ? 'Y' : 'N';
        $disable_guest_ticket_creation = 'Y' === $disable_guest_ticket_creation ? 'Y' : 'N';

        if ('Y' !== $disable_closed_ticket_reply) {
            $disable_closed_ticket_reply_notice = '';
        }

        $settings = new stdClass();

        $settings->logged_user = $logged_user;
        $settings->is_master = $is_master;
        $settings->categories = $categories;
        $settings->file_upload = $file_upload;
        $settings->custom_fields = $custom_fields;
        $settings->close_ticket_opt_for_customer = $close_ticket_opt_for_customer;
        $settings->disable_closed_ticket_reply = $disable_closed_ticket_reply;
        $settings->disable_closed_ticket_reply_notice = $disable_closed_ticket_reply_notice;
        $settings->is_public_ticket_opt_on_creation = $is_public_ticket_opt_on_creation;
        $settings->is_public_ticket_opt_on_details = $is_public_ticket_opt_on_details;
        $settings->is_public_tickets_menu = $is_public_tickets_menu;
        $settings->disable_registration_form = $disable_registration_form;
        $settings->disable_guest_ticket_creation = $disable_guest_ticket_creation;
        $settings->login_with_google_url = $login_with_google_url;
        $settings->login_with_envato_url = $login_with_envato_url;
        $settings->captcha = Apbd_wps_settings::GetCaptchaSetting();

        $settings = apply_filters('apbd-wps/filter/settings-data', $settings);
        $settings = is_object($settings) ? $settings : new stdClass();

        $this->response->SetResponse(true, "", $settings);

        return $this->response;
    }

    function SetRoutePermission($route)
    {
        return true;
    }

    function is_valid_cf()
    {
        $fieldName = $this->GetPayload("fld_name", "");
        $fieldvalue = $this->GetPayload("fld_value", "");
        $fieldStatus = apply_filters('apbd-wps/filter/custom-field-validate', true, $fieldName, $fieldvalue);
        $msg = trim(APBD_GetMsg_API());
        if (empty($msg) && !$fieldStatus) {
            $msg = Apbd_wps_settings::GetModuleInstance()->__("Invalid input");
        }
        $this->response->SetResponse($fieldStatus, $msg, null);
        return $this->response;
    }
}
