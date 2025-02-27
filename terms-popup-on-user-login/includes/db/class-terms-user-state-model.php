<?php

class TPUL_Terms_User_State_Model {

    public $userstate_primary_key = 0;

    public $timestamp;              // The timestamp of record created
    public $guid;                   // The guid of the record
    public $timestamp_created_at;
    public $time_created_at;        // The time original record was created.
    public $timestamp_last_action;              // The timestamp of record created
    public $time_last_action;       // The time the action occurred.
    public $timestamp_last_reset;   // The time the record was reset.
    public $time_last_reset;        // The time the record was reset.

    public int $user_id;                // The user's ID.
    public $user_name;              // The user's username.
    public $user_displayname;       // The user's display name, if available.
    public $user_first_name;        // The user's first name, if available.
    public $user_last_name;         // The user's last name, if available.
    public $user_action;            // The action the user performed, e.g., "Accept Terms".
    public int $user_action_code;            // The action the user performed, e.g., "Accept Terms".
    public $user_action_for_session; // The action the user performed, e.g., "Accept Terms".
    public int $user_action_code_for_session; // The action the user performed, e.g., "Accept Terms".
    public $user_action_method;     // The method by which the user action was performed, e.g., button click, form submission, etc.
    public $user_device_info;       // Details about the device used, including browser type, operating system, and device type (e.g., mobile, desktop).
    public $user_useragent;         // The complete user agent string from the browser, which can give more context about the environment in which the acceptance occurred.
    public $user_ip_address;        // The IP address of the user at the time of acceptance.
    public $user_geolocation;       // The geolocation of the user at the time of acceptance, if available.
    public $user_language_preference;   // The user's preferred language, if available.
    private $user_visitor_id;        // A unique identifier for the user, which can be used to track their activity across sessions.
    public $user_action_log;        // A log of the user's actions leading up to the acceptance, which can provide more context about the user's behavior.

    public $terms_page_id;       // Page Id of the terms that were accepted.
    public $terms_content_id;       // Content ID, autoincremented on every update
    public $terms_version;          // The human version of the terms that were accepted.
    public $terms_acceptance_url_reference; // The URL of the terms that were accepted, which can be used to retrieve the terms text.
    public $terms_text_snapshot_hash;   // A hash of the terms text at the time of acceptance, which can be used to verify the integrity of the terms.

    public $order_id;               // The ID of the order associated with the acceptance, if applicable.
    public $meta;                   // Additional metadata about the acceptance, which can be used to store custom data.
    public $history;                // The history of the user's actions 

    public function __construct(
        array $userstate
    ) {

        $this->userstate_primary_key = (isset($userstate['userstate_primary_key'])) ? $userstate['userstate_primary_key'] : '';

        // set time to now
        $this->timestamp = (isset($userstate['timestamp'])) ? $userstate['timestamp'] : current_time('mysql');

        $this->timestamp_created_at = (isset($userstate['timestamp_created_at'])) ? $userstate['timestamp_created_at'] : time();
        $this->time_created_at = (isset($userstate['time_created_at'])) ? $userstate['time_created_at'] : date('Y-m-d H:i:s');

        $this->timestamp_last_action = (isset($userstate['timestamp_last_action'])) ? $userstate['timestamp_last_action'] :  $this->timestamp_created_at;
        $this->time_last_action = (isset($userstate['time_last_action'])) ? $userstate['time_last_action'] : $this->time_created_at;

        $this->timestamp_last_reset = (isset($userstate['timestamp_last_reset'])) ? $userstate['timestamp_last_reset'] : '';
        $this->time_last_reset = (isset($userstate['time_last_reset'])) ? $userstate['time_last_reset'] : '';

        $this->user_id = (isset($userstate['user_id'])) ? $userstate['user_id'] : get_current_user_id();
        $user = get_user_by('id', $this->user_id);
        $this->user_name = (isset($userstate['user_name'])) ? $userstate['user_name'] : ($user ? $user->user_login : '');
        $this->user_displayname = (isset($userstate['user_displayname'])) ? $userstate['user_displayname'] : ($user ? $user->display_name : '');
        $this->user_first_name = (isset($userstate['user_first_name'])) ? $userstate['user_first_name'] : get_user_meta($this->user_id, 'first_name', true);
        $this->user_last_name = (isset($userstate['user_last_name'])) ? $userstate['user_last_name'] : get_user_meta($this->user_id, 'last_name', true);
        $this->user_action = (isset($userstate['user_action'])) ? $userstate['user_action'] : '';
        $this->user_action_code = (isset($userstate['user_action_code'])) ? $userstate['user_action_code'] : 0;
        $this->user_action_for_session = (isset($userstate['user_action_for_session'])) ? $userstate['user_action_for_session'] : '';
        $this->user_action_code_for_session = (isset($userstate['user_action_code_for_session'])) ? $userstate['user_action_code_for_session'] : 0;
        $this->user_action_method = (isset($userstate['user_action_method'])) ? $userstate['user_action_method'] : '';
        $this->user_device_info = (isset($userstate['user_device_info'])) ? $userstate['user_device_info'] : '';
        $this->user_useragent = (isset($userstate['user_useragent'])) ? $userstate['user_useragent'] : '';
        $this->user_visitor_id = (isset($userstate['user_visitor_id'])) ? $userstate['user_visitor_id'] : '';
        $this->user_ip_address = (isset($userstate['user_ip_address'])) ? $userstate['user_ip_address'] : '';
        $this->user_geolocation = (isset($userstate['user_geolocation'])) ? $userstate['user_geolocation'] : '';
        $this->user_language_preference = (isset($userstate['user_language_preference'])) ? $userstate['user_language_preference'] : '';
        $this->user_action_log = (isset($userstate['user_action_log'])) ? $userstate['user_action_log'] : '';

        $this->terms_content_id = (isset($userstate['terms_content_id'])) ? $userstate['terms_content_id'] : '';
        $this->terms_page_id = (isset($userstate['terms_page_id'])) ? $userstate['terms_page_id'] : '';
        $this->terms_version = (isset($userstate['terms_version'])) ? $userstate['terms_version'] : '';
        $this->terms_acceptance_url_reference = (isset($userstate['terms_acceptance_url_reference'])) ? $userstate['terms_acceptance_url_reference'] : '';
        $this->terms_text_snapshot_hash = (isset($userstate['terms_text_snapshot_hash'])) ? $userstate['terms_text_snapshot_hash'] : '';

        $this->history = (isset($userstate['history'])) ? $userstate['history'] : '';
        $this->order_id = (isset($userstate['order_id'])) ? $userstate['order_id'] : '';
        $this->meta = (isset($userstate['meta'])) ? $userstate['meta'] : '';
        $this->history = (isset($userstate['history'])) ? $userstate['history'] : '';

        $this->guid = $this->getUuid();
    }

    public function setToCurrentUser() {
        $this->user_id = get_current_user_id();
        $this->user_name = get_user_by('id', $this->user_id)->user_login;
        $this->user_displayname = get_user_by('id', $this->user_id)->display_name;
        $this->user_first_name = get_user_meta($this->user_id, 'first_name', true);
        $this->user_last_name = get_user_meta($this->user_id, 'last_name', true);
    }

    public function getTimestamp() {
        return $this->timestamp;
    }

    public function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }

    public function getTimestampCreatedAt() {
        return $this->timestamp_created_at;
    }

    public function setTimestampCreatedAt($timestamp_created_at) {
        $this->timestamp_created_at = $timestamp_created_at;
    }

    public function getTimeCreatedAt() {
        return $this->time_created_at;
    }

    public function setTimeCreatedAt($time) {
        $this->time_created_at = $time;
    }

    public function getTimestampLastAction() {
        return $this->timestamp_last_action;
    }

    public function setTimestampLastAction($timestamp_last_action) {
        $this->timestamp_last_action = $timestamp_last_action;
    }

    public function getTimeLastAction() {
        return $this->time_last_action;
    }

    public function setTimeLastAction($time) {
        $this->time_last_action = $time;
    }

    public function getTimestampLastReset() {
        return $this->timestamp_last_reset;
    }

    public function setTimestampLastReset($timestamp_last_reset) {
        $this->timestamp_last_reset = $timestamp_last_reset;
    }

    public function getTimeLastReset() {
        return $this->time_last_reset;
    }

    public function setTimeLastReset($time) {
        $this->time_last_reset = $time;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function getUserName() {
        return $this->user_name;
    }

    public function setUserName($user_name) {
        $this->user_name = $user_name;
    }

    public function getUserDisplayname() {
        return $this->user_displayname;
    }

    public function setUserDisplayname($user_displayname) {
        $this->user_displayname = $user_displayname;
    }

    public function getUserAction() {
        return $this->user_action;
    }

    public function setUserAction($user_action) {
        $this->user_action = $user_action;
    }

    public function getUserActionCode() {
        return $this->user_action_code;
    }

    public function setUserActionCode($user_action_code) {
        $accepted_values = array(2, -2, 0, 1, -1);
        if (!in_array($user_action_code, $accepted_values)) {
            throw new Exception('Invalid user action code');
        }
        $this->user_action_code = $user_action_code;
    }

    public function getUserActionCodeForSession() {
        return $this->user_action_code_for_session;
    }

    public function setUserActionCodeForSession($user_action_code_for_session) {
        $accepted_values = array(1, 0, -1);
        if (!in_array($user_action_code_for_session, $accepted_values)) {
            throw new Exception('Invalid user action code for session');
        }
        $this->user_action_code_for_session = $user_action_code_for_session;
    }

    public function getUserActionMethod() {
        return $this->user_action_method;
    }

    public function setUserActionMethod($user_action_method) {
        $this->user_action_method = $user_action_method;
    }

    public function getUserDeviceInfo() {
        return $this->user_device_info;
    }

    public function setUserDeviceInfo($user_device_info) {
        $this->user_device_info = $user_device_info;
    }

    public function getUserUseragent() {
        return $this->user_useragent;
    }

    public function setUserUseragent($user_useragent) {
        $this->user_useragent = $user_useragent;
    }

    public function getUserIpAddress() {
        return $this->user_ip_address;
    }

    public function setUserIpAddress($user_ip_address) {
        $this->user_ip_address = $user_ip_address;
    }

    public function getUserGeolocation() {
        return $this->user_geolocation;
    }

    public function setUserGeolocation($user_geolocation) {
        $this->user_geolocation = $user_geolocation;
    }

    public function getUserLanguagePreference() {
        return $this->user_language_preference;
    }

    public function setUserLanguagePreference($user_language_preference) {
        $this->user_language_preference = $user_language_preference;
    }

    public function getUserVisitorId() {
        return $this->user_visitor_id;
    }

    public function setUserVisitorId($user_visitor_id) {
        $this->user_visitor_id = $user_visitor_id;
    }

    public function getTermsVersion() {
        return $this->terms_version;
    }

    public function setTermsVersion($terms_version) {
        $this->terms_version = $terms_version;
    }

    public function getTermsPageID() {
        return $this->terms_page_id;
    }

    public function setTermsPageID($terms_page_id) {
        $this->terms_page_id = $terms_page_id;
    }

    public function getTermsContentID() {
        return $this->terms_content_id;
    }

    public function setTermsContentID($terms_content_id) {
        $this->terms_content_id = $terms_content_id;
    }

    public function getTermsAcceptanceUrlReference() {
        return $this->terms_acceptance_url_reference;
    }

    public function setTermsAcceptanceUrlReference($terms_acceptance_url_reference) {
        $this->terms_acceptance_url_reference = $terms_acceptance_url_reference;
    }

    public function getTermsTextSnapshotHash() {
        return $this->terms_text_snapshot_hash;
    }

    public function setTermsTextSnapshotHash($terms_text_snapshot_hash) {
        $this->terms_text_snapshot_hash = $terms_text_snapshot_hash;
    }

    public function getActionLog() {
        return $this->user_action_log;
    }

    public function setActionLog($user_action_log) {
        $this->user_action_log = $user_action_log;
    }

    public function getOrderId() {
        return $this->order_id;
    }

    public function setOrderId($order_id) {
        $this->order_id = $order_id;
    }

    public function getMeta() {
        return $this->meta;
    }

    public function setMeta($meta) {
        $this->meta = $meta;
    }

    public function getPrimaryKey() {
        return $this->userstate_primary_key;
    }

    public function setPrimaryKey($userstate_primary_key) {
        $this->userstate_primary_key = $userstate_primary_key;
    }

    public function getHistory() {
        return $this->history;
    }

    public function setHistory($history) {
        $this->history = $history;
    }

    public function getGuid() {
        return $this->guid;
    }

    public function setGuid($guid) {
        $this->guid = $guid;
    }

    public function setActionAcceptedTerms() {
        $this->user_action = 'Accepted Terms';
        $this->setUserActionCode(2);
        $this->setActionAcceptedTermsForSession();
    }

    public function setActionAcceptedTermsForSession() {
        $this->user_action_for_session = 'Accepted Terms';
        $this->setUserActionCodeForSession(1);
    }

    public function setActionDeclinedTerms() {
        $this->user_action = 'Declined Terms';
        $this->setUserActionCode(-2);
        // decline for session as well
        $this->setActionDeclinedTermsForSession();
    }

    public function setActionDeclinedTermsForSession() {
        $this->user_action_for_session = 'Declined Terms';
        $this->setUserActionCodeForSession(-1);
    }

    public function clearSession() {
        $this->user_action_for_session = '';
        $this->setUserActionCodeForSession(0);
    }

    public function rollGuid() {
        $this->guid = $this->getUuid();
    }

    public function reset() {

        /**
         * User Action code
         */
        $user_action_code = $this->getUserActionCode();

        if (empty($user_action_code)) {
            $this->setUserActionCode(0);
        }

        switch ($user_action_code) {
            case 0:
                // never seen it
                // resetting now
                $this->setUserActionCode(0);
                break;
            case -2:
                // declined first go
                // resetting now
                $this->setUserActionCode(-2);
                break;
            case 2:
                // accepted first go
                // resetting now
                $this->setUserActionCode(1);
                break;
            case -1:
                // accepted first go
                // then declined
                // declining now as well
                $this->setUserActionCode(-1);
                break;
            case 1:
                // accepted at some point
                // then got reset
                // never seen it after reset
                // resetting again now
                $this->setUserActionCode(1);
                break;

            default:
                # code...
                break;
        }

        /**
         * User Action code for session
         */
        $this->setUserActionCodeForSession(0);

        /**
         * Record the time of reset
         */
        $this->setTimestampLastReset(time());
        $this->setTimeLastReset(date('Y-m-d H:i:s'));
    }

    public function did_user_interact_with_terms() {
        if (empty($this->user_action_code)) {
            return false;
        }
        return true;
    }

    /**
     * Returns object from array
     * @param array $array
     * @return TPUL_Terms_User_State_Model
     */
    public static function from_array($array) {
        return new TPUL_Terms_User_State_Model(
            array(
                'userstate_primary_key' => $array['userstate_primary_key'],
                'guid' => $array['guid'],
                'timestamp' => $array['timestamp'],
                'timestamp_created_at' => $array['timestamp_created_at'],
                'time_created_at' => $array['time_created_at'],
                'timestamp_last_action' => $array['timestamp_last_action'],
                'time_last_action' => $array['time_last_action'],
                'timestamp_last_reset' => $array['timestamp_last_reset'],
                'time_last_reset' => $array['time_last_reset'],
                'user_id' => $array['user_id'],
                'user_name' => $array['user_name'],
                'user_displayname' => $array['user_displayname'],
                'user_first_name' => $array['user_first_name'],
                'user_last_name' => $array['user_last_name'],
                'user_action' => $array['user_action'],
                'user_action_code' => $array['user_action_code'],
                'user_action_for_session' => $array['user_action_for_session'],
                'user_action_code_for_session' => $array['user_action_code_for_session'],
                'user_action_method' => $array['user_action_method'],
                'user_device_info' => $array['user_device_info'],
                'user_useragent' => $array['user_useragent'],
                'user_ip_address' => $array['user_ip_address'],
                'user_geolocation' => $array['user_geolocation'],
                'user_language_preference' => $array['user_language_preference'],
                'user_visitor_id' => $array['user_visitor_id'],
                'user_action_log' => $array['user_action_log'],
                'terms_version' => $array['terms_version'],
                'terms_page_id' => $array['terms_page_id'],
                'terms_content_id' => $array['terms_content_id'],
                'terms_acceptance_url_reference' => $array['terms_acceptance_url_reference'],
                'terms_text_snapshot_hash' => $array['terms_text_snapshot_hash'],
                'order_id' => $array['order_id'],
                'meta' => $array['meta'],
                'history' => $array['history']
            )

        );
    }

    /**
     * Returns object as array
     * @return array
     */
    public function to_array() {
        return array(
            'userstate_primary_key' => esc_sql($this->userstate_primary_key),
            'guid' => esc_sql($this->guid),
            'timestamp' => esc_sql($this->timestamp),
            'timestamp_created_at' => esc_sql($this->timestamp_created_at),
            'time_created_at' => esc_sql($this->time_created_at),
            'timestamp_last_action' => esc_sql($this->timestamp_last_action),
            'time_last_action' => esc_sql($this->time_last_action),
            'timestamp_last_reset' => esc_sql($this->timestamp_last_reset),
            'time_last_reset' => esc_sql($this->time_last_reset),
            'user_id' => esc_sql($this->user_id),
            'user_name' => esc_sql($this->user_name),
            'user_displayname' => esc_sql($this->user_displayname),
            'user_first_name' => esc_sql($this->user_first_name),
            'user_last_name' => esc_sql($this->user_last_name),
            'user_action' => esc_sql($this->user_action),
            'user_action_code' => esc_sql($this->user_action_code),
            'user_action_for_session' => esc_sql($this->user_action_for_session),
            'user_action_code_for_session' => esc_sql($this->user_action_code_for_session),
            'user_action_method' => esc_sql($this->user_action_method),
            'user_device_info' => esc_sql($this->user_device_info),
            'user_useragent' => esc_sql($this->user_useragent),
            'user_ip_address' => esc_sql($this->user_ip_address),
            'user_geolocation' => esc_sql($this->user_geolocation),
            'user_language_preference' => esc_sql($this->user_language_preference),
            'user_visitor_id' => esc_sql($this->user_visitor_id),
            'user_action_log' => esc_sql($this->user_action_log),
            'terms_page_id' => esc_sql($this->terms_page_id),
            'terms_content_id' => esc_sql($this->terms_content_id),
            'terms_version' => esc_sql($this->terms_version),
            'terms_acceptance_url_reference' => esc_sql($this->terms_acceptance_url_reference),
            'terms_text_snapshot_hash' => esc_sql($this->terms_text_snapshot_hash),
            'order_id' => esc_sql($this->order_id),
            'meta' => esc_sql($this->meta),
            'history' => esc_sql($this->history)
        );
    }

    public static function from_object(Object $obj) {
        // we skip guid so event hough this si copy of the object, it will have new guid
        // needed for syncing with other systems
        return self::from_array(
            array(
                'userstate_primary_key' => $obj->userstate_primary_key,
                'guid' =>  $obj->userstate_primary_key,
                'timestamp_created_at' => $obj->timestamp_created_at,
                'timestamp' => $obj->timestamp,
                'time_created_at' => $obj->time_created_at,
                'timestamp_last_action' => $obj->timestamp_last_action,
                'time_last_action' => $obj->time_last_action,
                'timestamp_last_reset' => $obj->timestamp_last_reset,
                'time_last_reset' => $obj->time_last_reset,
                'user_id' => $obj->user_id,
                'user_name' => $obj->user_name,
                'user_displayname' => $obj->user_displayname,
                'user_first_name' => $obj->user_first_name,
                'user_last_name' => $obj->user_last_name,
                'user_action' => $obj->user_action,
                'user_action_code' => $obj->user_action_code,
                'user_action_for_session' => $obj->user_action_for_session,
                'user_action_code_for_session' => $obj->user_action_code_for_session,
                'user_action_method' => $obj->user_action_method,
                'user_device_info' => $obj->user_device_info,
                'user_useragent' => $obj->user_useragent,
                'user_ip_address' => $obj->user_ip_address,
                'user_geolocation' => $obj->user_geolocation,
                'user_language_preference' => $obj->user_language_preference,
                'user_visitor_id' => $obj->user_visitor_id,
                'user_action_log' => $obj->user_action_log,
                'terms_version' => $obj->terms_version,
                'terms_page_id' => $obj->terms_page_id,
                'terms_content_id' => $obj->terms_content_id,
                'terms_acceptance_url_reference' => $obj->terms_acceptance_url_reference,
                'terms_text_snapshot_hash' => $obj->terms_text_snapshot_hash,
                'order_id' => $obj->order_id,
                'meta' => $obj->meta,
                'history' => $obj->history
            )
        );
    }

    /**
     * Returns the array without the primary key
     * @return array
     */
    public function to_array_witout_primary_key() {
        $array = $this->to_array();
        unset($array['userstate_primary_key']);
        return $array;
    }

    public function __toString() {
        return json_encode($this->to_array());
    }

    public static function from_json($json) {
        return self::from_array(json_decode($json, true));
    }

    public function to_json() {
        return json_encode($this->to_array());
    }

    public function compare_terms(TPUL_Terms_User_State_Model $other) {
        if (
            ($this->terms_text_snapshot_hash === $other->terms_text_snapshot_hash) &&
            ($this->terms_version === $other->terms_version) &&
            ($this->terms_page_id === $other->terms_page_id) &&
            ($this->terms_content_id === $other->terms_content_id) &&
            ($this->order_id === $other->order_id)
        ) {
            return true;
        }
        return false;
    }


    public function copyOriginalCreatedAt(TPUL_Terms_User_State_Model $other) {
        $this->timestamp_created_at = $other->timestamp_created_at;
        $this->time_created_at = $other->time_created_at;
    }

    public function copyOriginalPrimaryKey(TPUL_Terms_User_State_Model $other) {
        $this->userstate_primary_key = $other->userstate_primary_key;
    }

    public function updateLastAction() {
        $this->timestamp_last_action = time();
        $this->time_last_action = date('Y-m-d H:i:s');
    }

    public function copyOldData(TPUL_Terms_User_State_Model $other) {
        $this->userstate_primary_key = $other->userstate_primary_key;

        $this->timestamp_created_at = $other->timestamp_created_at;
        $this->time_created_at = $other->time_created_at;
    }

    public function mergeUserActionCodes(TPUL_Terms_User_State_Model $other) {

        $old_code = $other->getUserActionCode();
        $current_code = $this->getUserActionCode();
        $code_after_merge = 0;

        /**
         * If current code is 2 its an accept we keep it as is
         */
        if (2 === $current_code) {
            $code_after_merge = 2;
        }

        /**
         * If current code is 1 its a reset
         */
        if (1 === $current_code) {
            // this is a reset
            if (2 === $old_code) {
                // if old code was accept
                // we reset it
                $code_after_merge = 1;
            } else {
                //anything else we keep it as to havee an accurate history
                $code_after_merge = $old_code;
            }
        }

        if (-1 === $current_code) {
            // this is a second time decline
            // we keep it as is
            $code_after_merge = -1;
        }

        if (-2 === $current_code) {
            /**
             * If this is a decline, we encode it differently based on the previous state
             */
            switch ($old_code) {
                case 0:
                    // never seen it
                    // declining now
                    $code_after_merge = -2;
                    break;
                case -2:
                    // declined first go
                    // declining now again
                    $code_after_merge = -2;
                    break;
                case 2:
                    // accepted first go
                    // declining now
                    $code_after_merge = -1;
                    break;
                case -1:
                    // accepted first go
                    // then got reset
                    // then declined second time
                    // declining now as well
                    $code_after_merge = -1;
                    break;
                case 1:
                    // accepted at some point
                    // then got reset
                    // now declining
                    $code_after_merge = -1;
                    break;

                default:
                    $code_after_merge = -2;
                    break;
            }
        }
        $this->setUserActionCode($code_after_merge);
    }

    public function getUuid($data = null) {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);

        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    public function pushOldDataIntoHistory(TPUL_Terms_User_State_Model $other) {
        // $this->history = $other->history;
        // $this->history[] = $other->to_array();
    }
}
