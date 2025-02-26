<?php

namespace RANKOLOGY_STATS;

class settings_page
{

    public function __construct()
    {

        // Save Setting Action
        add_action('admin_init', array($this, 'save'));

        // Check Access Level
        if (Menus::in_page('settings') and !User::Access('manage')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }
    }

    /**
     * Show Setting Page Html
     */
    public static function view()
    {

        // Check admin notices.
        if (Option::get('admin_notices') == true) {
            Option::update('disable_donation_nag', false);
            Option::update('disable_suggestion_nag', false);
        }

        // Add Class inf
        $args['class'] = 'rankology-stats-settings';

        // Check User Access To Save Setting
        $args['rkns_admin'] = false;
        if (User::Access('manage')) {
            $args['rkns_admin'] = true;
        }
        if ($args['rkns_admin'] === false) {
            $args['rkns_admin'] = 0;
        }

        // Get Search List
        $args['selist'] = SearchEngine::getList(true);

        // Get Permalink Structure
        $args['permalink']                    = get_option('permalink_structure');
        $args['disable_strip_uri_parameters'] = false;
        if ($args['permalink'] == '' || strpos($args['permalink'], '?') !== false) {
            $args['disable_strip_uri_parameters'] = true;
        }

        // Get List All Options
        $args['rankology_stats_options'] = Option::getOptions();

        // Load Template
        Admin_Template::get_template(array('layout/header', 'layout/tabs-settings', 'layout/title-after', 'settings', 'layout/footer'), $args);
    }

    /**
     * Save Setting
     */
    public function save()
    {

        // Check Form Nonce
        if (isset($_POST['rankology-stats-nonce']) and wp_verify_nonce($_POST['rankology-stats-nonce'], 'update-options')) {

            // Check Reset Option Rankology-Stats
            self::reset_rankology_stats_options();

            // Get All List Options
            $rankology_stats_options = Option::getOptions();

            // Run Update Option
            $method_list = array(
                'general',
                'visitor_ip',
                'access_level',
                'exclusion',
                'geoipset',
                'maintenance',
                'notification',
                'dashboard',
                'privacy'
            );
            foreach ($method_list as $method) {
                $rankology_stats_options = self::{'save_' . $method . '_option'}($rankology_stats_options);
            }

            // Save Option
            Option::save_options($rankology_stats_options);

            // Get tab name for redirect to the current tab
            $tab = isset($_POST['tab']) && $_POST['tab'] ? sanitize_text_field($_POST['tab']) : 'general-settings';

            $redirectAfterSave = true;

            // Update Referrer Spam
            if (isset($_POST['update-referrer-spam'])) {
                $status = Referred::download_referrer_spam();
                if (is_bool($status)) {
                    if ($status === false) {
                        Helper::addAdminNotice(__("Error Updating Referrer Spam Blacklist.", "rankology-stats"), "error");
                    } else {
                        Helper::addAdminNotice(__("Updated Referrer Spam Blacklist.", "rankology-stats"), "success");
                    }
                    $redirectAfterSave = false;
                }
            }

            // Update GEO IP
            if (Option::get('geoip') and isset($_POST['update_geoip']) and isset($_POST['geoip_name'])) {
                //Check Geo ip Exist in Database
                if (isset(GeoIP::$library[sanitize_text_field($_POST['geoip_name'])])) {
                    $result = GeoIP::download(sanitize_text_field($_POST['geoip_name']), "update");
                    if (is_array($result) and isset($result['status'])) {
                        Helper::addAdminNotice($result['notice'], ($result['status'] === false ? "error" : "success"));
                        $redirectAfterSave = false;
                    }
                }
            }

            if ($redirectAfterSave) {
                // Redirect User To Save Setting
                wp_redirect(add_query_arg(array(
                    'save_setting' => 'yes',
                    'tab'          => $tab,
                ), Menus::admin_url('settings')));

                // die
                exit;
            }
        }

        // Save Setting
        if (isset($_GET['save_setting'])) {
            Helper::addAdminNotice(__("Saved Settings.", "rankology-stats"), "success");
        }

        // Reset Setting
        if (isset($_GET['reset_settings'])) {
            Helper::addAdminNotice(__("All settings reset.", "rankology-stats"), "success");
        }
    }

    /**
     * Convert input name to Option
     *
     * @param $name
     * @return mixed
     */
    public static function input_name_to_option($name)
    {
        return str_replace("rkns_", "", $name);
    }

    /**
     * Save Privacy Option
     *
     * @param $rankology_stats_options
     * @return mixed
     */
    public static function save_privacy_option($rankology_stats_options)
    {
        $rkns_option_list = array(
            'rkns_anonymize_ips',
            'rkns_hash_ips',
            'rkns_store_ua',
            'rkns_all_online',
            'rkns_do_not_track',
        );

        // If the IP hash's are enabled, disable storing the complete user agent.
        if (array_key_exists('rkns_hash_ips', $_POST)) {
            $_POST['rkns_store_ua'] = '';
        }

        foreach ($rkns_option_list as $option) {
            $rankology_stats_options[self::input_name_to_option($option)] = (isset($_POST[$option]) ? $_POST[$option] : '');
        }

        return $rankology_stats_options;
    }

    /**
     * Save Notification
     *
     * @param $rankology_stats_options
     * @return mixed
     */
    public static function save_notification_option($rankology_stats_options)
    {

        if (isset($_POST['rkns_time_report'])) {
            if (Option::get('time_report') != $_POST['rkns_time_report']) {

                if (wp_next_scheduled('rankology_stats_report_hook')) {
                    wp_unschedule_event(wp_next_scheduled('rankology_stats_report_hook'), 'rankology_stats_report_hook');
                }

                wp_schedule_event(time(), sanitize_text_field($_POST['rkns_time_report']), 'rankology_stats_report_hook');
            }
        }

        $rkns_option_list = array(
            "rkns_stats_report",
            "rkns_time_report",
            "rkns_send_report",
            "rkns_content_report",
            "rkns_email_list",
            "rkns_geoip_report",
            "rkns_prune_report",
            "rkns_upgrade_report",
            "rkns_admin_notices",
        );

        foreach ($rkns_option_list as $option) {

            $value = '';

            if (isset($_POST[$option])) {
                if ($option == 'rkns_content_report') {
                    $value = stripslashes(wp_kses_post($_POST[$option]));
                } else {
                    $value = stripslashes(sanitize_textarea_field($_POST[$option]));
                }
            }

            $rankology_stats_options[self::input_name_to_option($option)] = $value;
        }

        return $rankology_stats_options;
    }

    /**
     * Save Dashboard Option
     *
     * @param $rankology_stats_options
     * @return mixed
     */
    public static function save_dashboard_option($rankology_stats_options)
    {
        $rkns_option_list = array('rkns_disable_map', 'rkns_disable_dashboard', 'rkns_disable_editor');
        foreach ($rkns_option_list as $option) {
            $rankology_stats_options[self::input_name_to_option($option)] = (isset($_POST[$option]) ? sanitize_text_field($_POST[$option]) : '');
        }

        return $rankology_stats_options;
    }

    /**
     * Save maintenance Option
     *
     * @param $rankology_stats_options
     * @return mixed
     */
    public static function save_maintenance_option($rankology_stats_options)
    {
        $rkns_option_list = array(
            'rkns_schedule_dbmaint',
            'rkns_schedule_dbmaint_days',
            'rkns_schedule_dbmaint_visitor',
            'rkns_schedule_dbmaint_visitor_hits',
        );
        foreach ($rkns_option_list as $option) {
            $rankology_stats_options[self::input_name_to_option($option)] = (isset($_POST[$option]) ? sanitize_text_field($_POST[$option]) : '');
        }

        return $rankology_stats_options;
    }

    /**
     * Save Option
     *
     * @param $rankology_stats_options
     * @return mixed
     */
    public static function save_geoipset_option($rankology_stats_options)
    {

        $rkns_option_list = array(
            'rkns_geoip',
            'rkns_geoip_city',
            'rkns_geoip_license_type',
            'rkns_geoip_license_key',
            'rkns_update_geoip',
            'rkns_schedule_geoip',
            'rkns_auto_pop',
            'rkns_private_country_code',
            'rkns_referrerspam',
            'rkns_schedule_referrerspam'
        );

        // For country codes we always use upper case, otherwise default to 000 which is 'unknown'.
        if (array_key_exists('rkns_private_country_code', $_POST)) {
            $_POST['rkns_private_country_code'] = trim(strtoupper(sanitize_text_field($_POST['rkns_private_country_code'])));
        } else {
            $_POST['rkns_private_country_code'] = GeoIP::$private_country;
        }

        if ($_POST['rkns_private_country_code'] == '') {
            $_POST['rkns_private_country_code'] = GeoIP::$private_country;
        }

        foreach ($rkns_option_list as $option) {
            $rankology_stats_options[self::input_name_to_option($option)] = (isset($_POST[$option]) ? $_POST[$option] : '');
        }

        // Check Is Checked GEO-IP and Download
        foreach (array("geoip" => "country", "geoip_city" => "city") as $geo_opt => $geo_name) {
            if (!isset($_POST['update_geoip']) and isset($_POST['rkns_' . $geo_opt])) {

                //Check File Not Exist
                $file = GeoIP::get_geo_ip_path($geo_name);
                if (!file_exists($file)) {
                    $result = GeoIP::download($geo_name);
                    if (isset($result['status']) and $result['status'] === false) {
                        $rankology_stats_options[$geo_opt] = '';
                    }
                }
            }
        }

        // Check Update Referrer Spam List
        if (isset($_POST['rkns_referrerspam'])) {
            $status = Referred::download_referrer_spam();
            if (is_bool($status) and $status === false) {
                $rankology_stats_options['referrerspam'] = '';
            }
        }

        return $rankology_stats_options;
    }

    /**
     * Save Exclude Option
     *
     * @param $rankology_stats_options
     * @return mixed
     */
    public static function save_exclusion_option($rankology_stats_options)
    {

        // Save Exclude Role
        foreach (User::get_role_list() as $role) {
            $role_post                                                     = 'rkns_exclude_' . str_replace(" ", "_", strtolower($role));
            $rankology_stats_options[self::input_name_to_option($role_post)] = (isset($_POST[$role_post]) ? $_POST[$role_post] : '');
        }

        // Save HoneyPot
        if (isset($_POST['rkns_create_honeypot'])) {
            $my_post                      = array(
                'post_type'    => 'page',
                'post_title'   => __('Rankology Stats Honey Pot Page', 'rankology-stats') . ' [' . TimeZone::getCurrentDate() . ']',
                'post_content' => __('This is the Honey Pot for Rankology Stats to use, do not delete.', 'rankology-stats'),
                'post_status'  => 'publish',
                'post_author'  => 1,
            );
            $_POST['rkns_honeypot_postid'] = wp_insert_post($my_post);
        }

        // Save Exclusion
        $rkns_option_list = array(
            'rkns_record_exclusions',
            'rkns_robotlist',
            'rkns_exclude_ip',
            'rkns_exclude_loginpage',
            'rkns_force_robot_update',
            'rkns_excluded_countries',
            'rkns_included_countries',
            'rkns_excluded_hosts',
            'rkns_robot_threshold',
            'rkns_use_honeypot',
            'rkns_honeypot_postid',
            'rkns_exclude_feeds',
            'rkns_excluded_urls',
            'rkns_exclude_404s',
            'rkns_corrupt_browser_info',
        );

        foreach ($rkns_option_list as $option) {
            $rankology_stats_options[self::input_name_to_option($option)] = (isset($_POST[$option]) ? sanitize_textarea_field($_POST[$option]) : '');
        }

        return $rankology_stats_options;
    }

    /**
     * Save Access Level Option
     *
     * @param $rankology_stats_options
     * @return mixed
     */
    public static function save_access_level_option($rankology_stats_options)
    {
        $rkns_option_list = array('rkns_read_capability', 'rkns_manage_capability');
        foreach ($rkns_option_list as $option) {
            $rankology_stats_options[self::input_name_to_option($option)] = (isset($_POST[$option]) ? $_POST[$option] : '');
        }

        return $rankology_stats_options;
    }

    /**
     * Save Visitor IP Option
     *
     * @param $rankology_stats_options
     * @return mixed
     */
    public static function save_visitor_ip_option($rankology_stats_options)
    {

        $value = IP::$default_ip_method;
        if (isset($_POST['ip_method']) and !empty($_POST['ip_method'])) {

            // Check Custom Header
            if ($_POST['ip_method'] == "CUSTOM_HEADER") {
                if (trim($_POST['user_custom_header_ip_method']) != "") {
                    $value = sanitize_text_field($_POST['user_custom_header_ip_method']);
                }
            } else {
                $value = sanitize_text_field($_POST['ip_method']);
            }
        }

        $rankology_stats_options['ip_method'] = $value;
        return $rankology_stats_options;
    }

    /**
     * Save General Options
     *
     * @param $rankology_stats_options
     * @return mixed
     */
    public static function save_general_option($rankology_stats_options)
    {

        $selist                       = SearchEngine::getList(true);
        $permalink                    = get_option('permalink_structure');
        $disable_strip_uri_parameters = false;

        if ($permalink == '' || strpos($permalink, '?') !== false) {
            $disable_strip_uri_parameters = true;
        }
        foreach ($selist as $se) {
            $se_post     = 'rkns_disable_se_' . $se['tag'];
            $optionValue = isset($_POST[$se_post]) ? sanitize_text_field($_POST[$se_post]) : '';

            $rankology_stats_options[self::input_name_to_option($se_post)] = $optionValue;
        }

        $rkns_option_list = array(
            'rkns_useronline',
            'rkns_visits',
            'rkns_visitors',
            'rkns_visitors_log',
            'rkns_enable_user_column',
            'rkns_pages',
            'rkns_track_all_pages',
            'rkns_use_cache_plugin',
            'rkns_disable_column',
            'rkns_hit_post_metabox',
            'rkns_show_hits',
            'rkns_display_hits_position',
            'rkns_check_online',
            'rkns_menu_bar',
            'rkns_coefficient',
            'rkns_chart_totals',
            'rkns_hide_notices',
            'rkns_all_online',
            'rkns_strip_uri_parameters',
            'rkns_addsearchwords',
        );

        // We need to check the permalink format for the strip_uri_parameters option
        if ($disable_strip_uri_parameters) {
            $_POST['rkns_strip_uri_parameters'] = '';
        }

        foreach ($rkns_option_list as $option) {
            $optionValue                                                = isset($_POST[$option]) ? sanitize_text_field($_POST[$option]) : '';
            $rankology_stats_options[self::input_name_to_option($option)] = $optionValue;
        }

        //Add Visitor RelationShip Table
        if (isset($_POST['rkns_visitors_log']) and $_POST['rkns_visitors_log'] == 1) {
            Install::create_visitor_relationship_table();
        }

        //Flush Rewrite Use Cache Plugin
        if (isset($_POST['rkns_use_cache_plugin'])) {
            flush_rewrite_rules();
        }

        return $rankology_stats_options;
    }

    /**
     * Reset Rankology-Stats Option
     */
    public static function reset_rankology_stats_options()
    {

        if (isset($_POST['rkns_reset_plugin'])) {

            if (is_multisite()) {
                $sites = Helper::get_wp_sites_list();
                foreach ($sites as $blog_id) {
                    switch_to_blog($blog_id);
                    self::reset_option();
                    restore_current_blog();
                }
            } else {
                self::reset_option();
            }

            wp_redirect(add_query_arg(array('reset_settings' => 'yes'), Menus::admin_url('settings')));
            exit;
        }
    }

    /**
     * Reset Rankology Stats Option
     */
    public static function reset_option()
    {
        global $wpdb;

        // Get Default Option
        $default_options = Option::defaultOption();

        // Delete the rankology_stats option.
        update_option(Option::$opt_name, array());

        // Delete the user options.
        $wpdb->query("DELETE FROM {$wpdb->prefix}usermeta WHERE meta_key LIKE 'rankology_stats%'");

        // Update Option
        update_option(Option::$opt_name, $default_options);
    }
}

new settings_page;
