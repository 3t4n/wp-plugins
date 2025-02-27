<?php
class TPUL_Terms_Userstate_Service {

    private static $debug = false;

    /**
     * Fetch all user records
     */
    public static function fetch_all_user_records_by_model(TPUL_Terms_User_State_Model $user_state_model) {
        $user_state_DB = new TPUL_terms_user_state();
        $user_records = $user_state_DB->fetch_by_column_value('user_id', $user_state_model->user_id);
        return $user_records;
    }

    /** 
     * Fetch all user records by user_id
     */
    public static function fetch_all_user_records_by_userid($user_id) {
        $user_state_DB = new TPUL_terms_user_state();
        $user_records = $user_state_DB->fetch_by_column_value('user_id', $user_id);
        return $user_records;
    }

    /**
     * Fetch User last modified user record
     */
    public static function fetch_user_record_most_recent_time_last_action($user_id) {

        $user_state_DB = new TPUL_terms_user_state();
        // fetch_latest_timae_last_action
        $user_records = $user_state_DB->fetch_latest_time_last_action($user_id);
        /**
         * return first record
         */
        foreach ($user_records as $key => $record) {
            $user_state_model = TPUL_Terms_User_State_Model::from_object($record);
            return $user_state_model;
        }

        return null;
    }

    /**
     * Fetch user record for content hash
     */
    public static function fetch_user_record_for_content_hash($user_id, $terms_text_snapshot_hash) {
        $user_state_DB = new TPUL_terms_user_state();
        $user_records = $user_state_DB->fetch_by_multiple_column_value(array('user_id' => $user_id, 'terms_text_snapshot_hash' => $terms_text_snapshot_hash));
        foreach ($user_records as $key => $record) {
            $user_state_model = TPUL_Terms_User_State_Model::from_object($record);
            return $user_state_model;
        }
        return null;
    }

    /**
     * Fetch user record for content hash and version
     */
    public static function fetch_user_record_for_content_hashand_and_version($user_id, $terms_text_snapshot_hash, $terms_version) {
        $user_state_DB = new TPUL_terms_user_state();
        $user_records = $user_state_DB->fetch_by_multiple_column_value(array('user_id' => $user_id, 'terms_text_snapshot_hash' => $terms_text_snapshot_hash, 'terms_version' => $terms_version));
        foreach ($user_records as $key => $record) {
            $user_state_model = TPUL_Terms_User_State_Model::from_object($record);
            return $user_state_model;
        }
        return null;
    }

    /**
     * Fetch user record for current content hash and version
     */
    public static function fetch_user_record_for_current_content_hash_and_version($user_id) {
        $current_terms_content_hash = TPUL_Terms_Content_Service::get_default_terms_content_hash();
        $current_version = TPUL_Terms_Content_Service::get_default_terms_content_version();

        $user_record = self::fetch_user_record_for_content_hashand_and_version($user_id, $current_terms_content_hash, $current_version);
        return $user_record;
    }

    /**
     * Reset user record
     */
    public static function reset_user_record($user_id) {
        $user_record = self::fetch_user_record_for_current_content_hash_and_version($user_id);
        if (empty($user_record)) {
            return false;
        }
        $user_record->reset();
        self::set_or_update_record_with_new_action($user_record);
    }

    public static function did_user_interact_with_terms($user_id) {
        $user_record = self::fetch_user_record_for_current_content_hash_and_version($user_id);
        if (empty($user_record)) {
            return false;
        }
        if ($user_record->did_user_interact_with_terms()) {
            return true;
        }
        return false;
    }


    /**
     * Find record by user_state_model
     * return the original record
     * find by user id and terms content hash, to see if this terms content wasalready accepted or decliend
     * needed so we override the record instead of adding new record for same user same terms
     */
    public static function find_original_record(TPUL_Terms_User_State_Model $user_state_model) {
        $user_state_DB = new TPUL_terms_user_state();
        $user_records = $user_state_DB->fetch_by_column_value('user_id', $user_state_model->user_id);

        foreach ($user_records as $key => $record) {
            $old_user_state_model = TPUL_Terms_User_State_Model::from_object($record);
            /**
             * Compare terms
             * If terms are the same
             * return the old record
             * we are just going to update the timestamp and history
             */
            if ($user_state_model->compare_terms($old_user_state_model)) {
                if (self::$debug) {
                    // error_log('Record UserState Already Exists');
                }
                return $old_user_state_model;
            }
        }
        return null;
    }

    /**
     * Set or Update accept record
     */
    public static function set_or_update_record_with_new_action(TPUL_Terms_User_State_Model $user_state_model) {

        if (empty($user_state_model->user_id)) {
            return false;
        }

        /**
         * Check if table exists
         * create if it doesnt
         */
        TPUL_DB_Service::create_TPUL_Userstate_table_if_missing();

        /**
         * Update record if exists
         */
        $old_record = self::find_original_record($user_state_model);
        if (!empty($old_record)) {
            /**
             * Record already exists
             * user is re accepting the terms
             */
            if (self::$debug) {
                error_log('Record UserState Already Exists');
            }
            return self::update_record_with_new_action($user_state_model, $old_record);
        }

        /**
         * Create new record
         */
        return self::insert_new_action_record($user_state_model);
    }

    /**
     * Update accept record
     */
    public static function update_record_with_new_action(TPUL_Terms_User_State_Model $user_state_model, TPUL_Terms_User_State_Model $old_user_state_model) {

        if (self::$debug) {
            // error_log('TPUL_Terms_Userstate_Service::old_record: ' . print_r($old_user_state_model, true));
            // error_log('TPUL_Terms_Userstate_Service::update_record_with_new_action: ' . print_r($user_state_model, true));
        }

        /**
         * Keep history of the old record
         * makes sure we update the same record
         */
        if (self::$debug) {
            error_log('TPUL_Terms_Userstate_Service:: Copy data');
        }

        // Merge New Record with Old Record
        $user_state_model->copyOldData($old_user_state_model);
        $user_state_model->mergeUserActionCodes($old_user_state_model);


        // Roll GUID
        $user_state_model->rollGuid();

        // Insert to DB
        $user_state_DB = new TPUL_terms_user_state();
        $user_state_DB->update($user_state_model->to_array(), array('userstate_primary_key' => $old_user_state_model->userstate_primary_key));
    }

    /**
     * Clear session of record
     */

    public static function clear_session_record($user_id, $terms_text_snapshot_hash, $terms_version) {

        /**
         * Find record
         */
        $user_state_DB = new TPUL_terms_user_state();

        $user_records = $user_state_DB->fetch_by_multiple_column_value(
            array(
                'user_id' => $user_id,
                'terms_text_snapshot_hash' => $terms_text_snapshot_hash,
                'terms_version' => $terms_version
            )
        );
        if (empty($user_records)) {
            return false;
        }
        // Go into every record found and clear their session
        foreach ($user_records as $key => $record) {
            $user_state_model = TPUL_Terms_User_State_Model::from_object($record);
            $user_state_model->clearSession();
            $user_state_DB->update($user_state_model->to_array(), array('userstate_primary_key' => $user_state_model->userstate_primary_key));
            // error_log('Clearing session for record: ' . print_r($record, true));
        }
        return null;
    }

    public static function clear_session_for_default_terms($user_id) {
        $version = TPUL_Terms_Content_Service::get_default_terms_content_version();
        $hash = TPUL_Terms_Content_Service::get_default_terms_content_hash();
        self::clear_session_record($user_id, $hash, $version);
    }


    /**
     * Insert new record
     */
    public static function insert_new_action_record(TPUL_Terms_User_State_Model $user_state_model) {

        if (empty($user_state_model->user_id)) {
            return;
        }
        $user_state_model->rollGuid();
        $user_state_DB = new TPUL_terms_user_state();
        // We want the db to come up with a new primary key
        $user_state_DB->insert($user_state_model->to_array_witout_primary_key());

        if (self::$debug) {
            error_log('TPUL_Terms_Userstate_Service::save_accept_record: ' . print_r($user_state_model, true));
        }
    }

    /**
     * Fetch all user records
     */
    public static function fetch_all_user_records() {
        $user_state_DB = new TPUL_terms_user_state();
        $user_records = $user_state_DB->fetch_all();
        return $user_records;
    }

    /**
     * fetch all visitor IDs for a user
     * @param $user_id
     */
    public static function fetch_all_visitor_ids_for_user($user_id) {
        $user_state_DB = new TPUL_terms_user_state();
        $user_records = $user_state_DB->fetch_by_column_value('user_id', $user_id);
        $visitor_ids = array();
        foreach ($user_records as $key => $record) {
            $user_state_model = TPUL_Terms_User_State_Model::from_object($record);
            $visitor_ids[] = $user_state_model->getUserVisitorId();
        }
        return $visitor_ids;



        // @TODO

        // MEgnezni hogy kinek a felhasználói azonosítóját kell visszaadni
        // a vizitor ID az a felhasználói azonosító, amit a felhasználó kapott a cookie-ban, amikor elfogadta a feltételeket
        // vissza kella dni oket a fugvennyel, ezt jelenitjuk emg az edit page-n
        // ugynakakor tobbet kell tudjunk megjegyezni ebbol



        // function guidv4($data = null) {
        //     // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        //     $data = $data ?? random_bytes(16);
        //     assert(strlen($data) == 16);

        //     // Set version to 0100
        //     $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        //     // Set bits 6-7 to 10
        //     $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

        //     // Output the 36 character UUID.
        //     return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}
