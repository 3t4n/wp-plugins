<?php

class TPUL_DB_Service {

    const DB_USERSTATE_VERSION = 1;
    const DB_USERSTATE_OPTION_LABEL = 'tpul_terms_user_state_version';

    public static $debug = false;

    public static function check_table_exists($table_name) {
        global $wpdb;
        $table_name = $wpdb->prefix . $table_name;
        $sql        = "SHOW TABLES LIKE '$table_name'";
        $results    = $wpdb->get_results($sql);

        return count($results) > 0;
    }

    /**
     * Remove TPUL Userstate Reference
     */
    public static function remove_TPUL_Userstate_Reference() {
        delete_site_option(self::DB_USERSTATE_OPTION_LABEL);
    }

    /**
     * Remove TPUL Userstate Table
     */
    public static function remove_TPUL_Userstate_Table() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'tpul_terms_user_state';
        $sql        = "DROP TABLE IF EXISTS $table_name";
        $wpdb->query($sql);
        self::remove_TPUL_Userstate_Reference();
    }

    public static function Create_TPUL_Terms_User_State_Table() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $version         = (int) get_site_option(self::DB_USERSTATE_OPTION_LABEL, 0);
        error_log('Create_TPUL_Terms_User_State_Table Version: ' . print_r($version, true));
        $success = false;
        $primary_key = TPUL_terms_user_state::get_primary_key();

        if ($version < 1) {

            $sql = "CREATE TABLE `{$wpdb->base_prefix}tpul_terms_user_state` (
                `{$primary_key}` int(11) NOT NULL AUTO_INCREMENT,
                `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                `guid` varchar(255) NOT NULL,
                `timestamp_created_at` int(11) NOT NULL,
                `time_created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
                `timestamp_last_action` int(11) NOT NULL,
                `time_last_action` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
                `timestamp_last_reset` int(11) NOT NULL,
                `time_last_reset` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
                `user_id` int(11) NOT NULL,
                `user_name` varchar(255) NOT NULL,
                `user_displayname` varchar(255),
                `user_first_name` varchar(255),
                `user_last_name` varchar(255),
                `user_action` varchar(255),
                `user_action_code` varchar(255),
                `user_action_for_session` varchar(255),
                `user_action_code_for_session` varchar(255),
                `user_action_method` varchar(255),
                `user_device_info` varchar(255),
                `user_useragent` text NOT NULL,
                `user_ip_address` text,
                `user_geolocation` text,
                `user_language_preference` varchar(255),
                `user_visitor_id` varchar(255),
                `user_action_log` text NOT NULL,
                `terms_page_id` varchar(255),
                `terms_content_id` varchar(255),
                `terms_version` varchar(255),
                `terms_acceptance_url_reference` text NOT NULL,
                `terms_text_snapshot_hash` text NOT NULL,
                `order_id` varchar(255),
                `meta` text NOT NULL,
                `history` text NOT NULL,
                PRIMARY KEY (`{$primary_key}`)
            ) $charset_collate;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);

            $success = empty($wpdb->last_error);
            if ($success) {
                update_site_option('tpul_terms_user_state_version', 1);
            }
        }
        error_log('Create_tpul_terms_user_state_Table Success: ' . print_r($success, true));
        return $success;
    }


    public static function create_TPUL_Userstate_table_if_missing() {

        // error_log('create_TPUL_Userstate_table_if_missing');

        $TpulUserstateTableExists =  self::check_table_exists('tpul_terms_user_state');

        if (!$TpulUserstateTableExists) {

            $create_TPUL_userstate_DB = self::Create_TPUL_Terms_User_State_Table();
            error_log('create_TPUL_userstate_DB: ' . print_r($create_TPUL_userstate_DB, true));
            if ($create_TPUL_userstate_DB) {
                error_log('TPUL Userstate Table Created');
                self::set_TPUL_userstate_table_version();
            } else {
                error_log('TPUL Userstate Table Not Created');
            }
        }
    }

    public static function set_TPUL_userstate_table_version() {
        update_site_option(self::DB_USERSTATE_OPTION_LABEL, self::DB_USERSTATE_VERSION);
    }

    public static function get_TPUL_userstate_table_version() {
        return get_site_option(self::DB_USERSTATE_OPTION_LABEL);
    }
}
