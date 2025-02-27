<?php

/**
 * returns
 * false - not logged in
 * 0  - never accepted, never prompted
 * 1  - accepted but the terms have been updated since
 * 2  - accepted, and terms have not been updated since he accepted it, latest terms accepted for him
 * -1 - has accepted before, but has declined latest updated terms
 * -2 - declined the very first time
 *
 */

class TPUL_User_State {

    private $debug = false;
    private $user_id = false;
    private $user_state = false;
    private TPUL_Terms_User_State_Model $user_state_model;

    public function __construct($user_id) {
        $this->user_id = $user_id;
        $user_record = TPUL_Terms_Userstate_Service::fetch_user_record_for_current_content_hash_and_version($this->user_id);
        if (!empty($user_record)) {
            $this->user_state_model = $user_record;
        }
    }

    /**
     * ID
     */
    public function get_user_id() {
        return $this->user_id;
    }

    /**
     * Acceptance State
     */


    public function get_visitor_token() {
        if (empty($this->user_state_model)) {
            return '';
        }
        return $this->user_state_model->getUserVisitorId();
    }

    /**
     * Get user agent
     */
    public function get_recorded_useragent() {
        if (empty($this->user_state_model)) {
            return '';
        }
        return $this->user_state_model->getUserUseragent();
    }

    /**
     * Get user agent
     */
    public function get_location_coordinates() {
        if (empty($this->user_state_model)) {
            return '';
        }
        return $this->user_state_model->getUserGeolocation();
    }

    /**
     * Get user agent
     */
    public function get_clientIP() {
        if (empty($this->user_state_model)) {
            return '';
        }
        return $this->user_state_model->getUserIpAddress();
    }

    /**
     * Get stroed ip addresses as text
     */
    public function get_clientIP_as_Text() {
        // Get the JSON string
        $json_input = $this->get_clientIP();

        // Remove starting and closing quotes if present
        if (substr($json_input, 0, 1) === '"' && substr($json_input, -1) === '"') {
            $json_input = substr($json_input, 1, -1);
        }

        // Decode the JSON input
        $data = json_decode($json_input, true);

        // Check if json_decode() failed
        if (json_last_error() !== JSON_ERROR_NONE) {
            error_log('JSON decode error: ' . json_last_error_msg());
            error_log('JSON input: ' . $json_input);
            return '';
        }

        // Initialize an array to hold the IP addresses
        $ip_addresses = array();

        // Check and add REMOTE_ADDR if it's not empty
        if (!empty($data['REMOTE_ADDR']) && $data['REMOTE_ADDR'] !== 'n/a') {
            $ip_addresses[] = $data['REMOTE_ADDR'];
        }

        // Check and add HTTP_X_FORWARDED_FOR if it's not empty
        if (!empty($data['HTTP_X_FORWARDED_FOR']) && $data['HTTP_X_FORWARDED_FOR'] !== 'n/a') {
            // Split the HTTP_X_FORWARDED_FOR string by comma and trim spaces
            $forwarded_ips = array_map('trim', explode(',', $data['HTTP_X_FORWARDED_FOR']));
            $ip_addresses = array_merge($ip_addresses, $forwarded_ips);
        }

        // Check and add HTTP_CLIENT_IP if it's not empty
        if (!empty($data['HTTP_CLIENT_IP']) && $data['HTTP_CLIENT_IP'] !== 'n/a') {
            $ip_addresses[] = $data['HTTP_CLIENT_IP'];
        }

        // Join the IP addresses into a single string separated by commas
        return implode(', ', $ip_addresses);
    }

    /**
     * This session data
     * this data on the user is used if popup on every login is turned on
     * we set this at acceptance
     * we clear it on reset
     * clear it on decline
     * clear it on logout
     * they have to accept again after login
     */

    public function get_user_acc_for_this_session() {
        if (empty($this->user_state_model)) {
            return 0;
        }
        return $this->user_state_model->getUserActionCodeForSession();
    }
    public function did_user_acc_for_this_session() {
        $this_session_action = $this->get_user_acc_for_this_session();

        if (empty($this_session_action)) {
            return 0;
        }

        if ($this_session_action == 1) {
            return 1;
        }
        return 0;
    }

    public function did_user_take_action_this_session() {
        $this_session_action = $this->get_user_acc_for_this_session();
        if ($this_session_action == 0) {
            return false;
        }
        return true;
    }

    public function clear_acceptance_for_this_session() {
        TPUL_Terms_Userstate_Service::clear_session_for_default_terms($this->user_id);
    }

    /**
     *  SET User Last Action
     *   0 - if no action was taken ever 
     *   1 - if no user action was taken since reset
     * -10 - if last user action was decline since reset
     * +10 - if last user action was accept since reset
     */



    /**
     * Date
     */


    public function get_user_accepted_date_raw() {
        if (empty($this->user_state_model)) {
            return '';
        }
        return $this->user_state_model->getTimestampLastAction();
    }

    public function get_user_accepted_date() {

        $user_accepted_date = "";
        $tpul_user_accepted_terms_date = $this->get_user_accepted_date_raw();
        // Format dete to the website preferred format
        if (!empty($tpul_user_accepted_terms_date)) {
            $date_format = get_option('date_format');
            $time_format = get_option('time_format');
            $user_accepted_date = wp_date("{$date_format} {$time_format}", $tpul_user_accepted_terms_date);
        }

        return $user_accepted_date;
    }

    /********************************************
     * Actions
     ********************************************/

    /**
     * helper to flatten array
     */
    public function _flattenArrayToString($array, $separator) {
        return implode($separator, array_map(
            function ($key, $value) {
                $value = str_replace(',', ' ', $value);
                return "{$key}:{$value}";
            },
            array_keys($array),
            $array
        ));
    }

    /**
     * Build user state model array from request
     */
    public function build_user_state_array_from_request($user_id, $request_body) {
        $modal_options = new TPUL_Modal_Options();

        $user_state_array_from_request['user_id']  = $user_id;
        $user_state_array_from_request['user_action_method']  = isset($request_body['user_action_method']) ? sanitize_text_field($request_body['user_action_method']) : 'n/a';
        $user_state_array_from_request['user_device_info']  = isset($request_body['user_device_info']) ? sanitize_text_field($request_body['user_device_info']) : 'n/a';
        $user_state_array_from_request['user_useragent'] = isset($request_body['user_device_info']) ? sanitize_text_field($request_body['useragent']) : 'n/a';
        if ($modal_options->get_track_IP()) {
            $user_state_array_from_request['user_ip_address'] = [
                'REMOTE_ADDR' => $_SERVER['REMOTE_ADDR'] ?? 'n/a',
                'HTTP_X_FORWARDED_FOR' => $_SERVER['HTTP_X_FORWARDED_FOR'] ?? 'n/a',
                'HTTP_CLIENT_IP' => $_SERVER['HTTP_CLIENT_IP'] ?? 'n/a',
            ];
        }
        if ($modal_options->get_track_location()) {
            $user_state_array_from_request['user_geolocation'] = isset($request_body['locationCoordinates']) ? json_decode($request_body['locationCoordinates'], true) : 'n/a';
        }
        $user_state_array_from_request['user_language_preference']  = isset($request_body['user_language_preference']) ? sanitize_text_field($request_body['user_language_preference']) : 'n/a';
        $user_state_array_from_request['user_visitor_id'] = isset($request_body['tpul_visitor_id']) ? sanitize_text_field($request_body['tpul_visitor_id']) : 'n/a';

        $user_state_array_from_request['terms_version'] = $modal_options->get_terms_version();
        $user_state_array_from_request['terms_acceptance_url_reference']  = isset($request_body['currentURL']) ? esc_url($request_body['currentURL']) : '';
        $user_state_array_from_request['terms_text_snapshot_hash'] = isset($request_body['terms_text_snapshot_hash']) ? esc_url($request_body['terms_text_snapshot_hash']) : TPUL_Terms_Content_Service::get_default_terms_content_hash();
        $user_state_array_from_request['user_action_log'] = isset($request_body['user_action_log']) ? sanitize_text_field($request_body['user_action_log']) : 'n/a';
        $user_state_array_from_request['order_id'] = isset($request_body['order_id']) ? sanitize_text_field($request_body['order_id']) : '';

        return $user_state_array_from_request;
    }

    /**
     * ACCEPT
     */
    public function useraction_accepted($user_id, $request_body = []) {

        $user_state_array_from_request = $this->build_user_state_array_from_request($user_id, $request_body);

        $user_state_model = new TPUL_Terms_User_State_Model($user_state_array_from_request);
        $user_state_model->setActionAcceptedTerms();
        TPUL_Terms_Userstate_Service::set_or_update_record_with_new_action($user_state_model);

        // Legacy Save

    }



    /**
     * DECLINE
     */
    public function useraction_declined($user_id, $request_body = []) {

        $user_state_array_from_request = $this->build_user_state_array_from_request($user_id, $request_body);

        $user_state_model = new TPUL_Terms_User_State_Model($user_state_array_from_request);
        $user_state_model->setActionDeclinedTerms();
        TPUL_Terms_Userstate_Service::set_or_update_record_with_new_action($user_state_model);
    }



    /**
     * Checks if user accepted terms
     * can give full answer as 2,1,0,-1,-2 as the state
     * or binary answer of 1 or 0
     */
    public function has_accepted_terms_atsomepoint() {

        $all_user_records = TPUL_Terms_Userstate_Service::fetch_all_user_records_by_userid($this->user_id);
        /**
         * If no records found
         */
        if (empty($all_user_records)) {
            return 0;
        }
        /**
         * Find if the user has at last one record of acceptance
         * where the user action is 2 or 1
         */
        foreach ($all_user_records as $record) {
            if ($record->user_action_code == 2 || $record->user_action_code == 1) {
                return 1;
            }
        }

        return 0;
    }

    /**
     * Returns user accepted terms
     * in human language not at state variables
     */
    public function get_has_accepted_terms_labels() {

        $label = "";

        switch ($this->did_user_accept()) {

            case 2:

                $label = "&#x2713 " . __('Latest Terms Accepted', 'terms-popup-on-user-login');
                break;

            case 1:

                $label = "&nbsp;&nbsp;&nbsp;&nbsp;" . __('Accepted on', 'terms-popup-on-user-login');
                break;

            case -1:

                $label = "&nbsp;&nbsp;&nbsp;&nbsp;" . __('Latest Terms Declined', 'terms-popup-on-user-login');
                break;

            case -2:

                $label = "&nbsp;&nbsp;&nbsp;&nbsp;" . __('Declined', 'terms-popup-on-user-login');
                break;

            case 0:
            default:
                $label = "";
                break;
        }

        return $label;
    }

    /**
     * Checks if user accepted terms even after the last reset
     */
    public function did_accept_latest_terms() {

        $user_accepted_terms = $this->did_user_accept();

        if (empty($user_accepted_terms)) {
            return false;
        }
        if ($user_accepted_terms == 2) {
            return true;
        }
        return false;
    }

    public function get_terms_accepted_timestamp() {
        if (empty($this->user_state_model)) {
            return -1;
        }
        if ($this->user_state_model->getUserActionCode() == 2) {
            return $this->user_state_model->getTimestampLastAction();
        }
        return 0;
    }

    /**
     * returns
     * false - not logged in
     * 0  - never accepted, never prompted
     * 1  - accepted but the terms have been updated since
     * 2  - accepted, and terms have not been updated since he accepted it, latest terms accepted for him
     * -1 - has accepted before, but has declined latest updated terms
     * -2 - declined the very first time
     *
     */
    function did_user_accept() {

        if (!is_user_logged_in()) {
            return 0;
        }

        /**
         * Get last user Action
         */

        if (empty($this->user_state_model)) {
            return 0;
        }
        $timestamp_last_action = $this->user_state_model->timestamp_last_action;

        /**
         * Get last reset ran
         */
        $last_reset_ran = 0;
        $reset_info = get_option('tpul_settings_term_modal_reset_info');

        if (!empty($reset_info)) {
            $last_reset_ran = $reset_info['last_ran'];
        } else {
            $last_reset_ran = 0;
        }

        /**
         * Reset happened since last action
         */
        if ($last_reset_ran >= $timestamp_last_action) {
            if ($this->debug) error_log('Reset happened since last action');
            return 1;
            // accepted but the terms have been updated since
        }

        $last_user_action_code = $this->user_state_model->user_action_code;
        if (2 == $last_user_action_code) {
            if ($timestamp_last_action > $last_reset_ran) {
                // accepted and terms have not been updated since he accepted it
                return 2;
            } else {
                return 1;
            }
        }
        if (1 == $last_user_action_code) {
            // accepted but the terms have been updated since
            return 1;
        }
        if (-1 == $last_user_action_code) {
            // has accepted before, but has declined latest updated terms
            return -1;
        }
        if (-2 == $last_user_action_code) {
            // declined the very first time
            return -2;
        }

        return 0;
    }
}
