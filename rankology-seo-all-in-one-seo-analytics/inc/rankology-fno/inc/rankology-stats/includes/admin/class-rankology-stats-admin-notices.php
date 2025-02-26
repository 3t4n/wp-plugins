<?php

namespace RANKOLOGY_STATS;

class Admin_Notices
{
    /**
     * List Of Admin Notice
     *
     * @var array
     */
    private static $core_notices = array(
        'use_cache_plugin',
        'enable_rest_api',
        'active_geo_ip',
        'donate_plugin',
        'active_collation'
    );

    /**
     * Admin Notice constructor.
     */
    public function __construct()
    {
        add_action('admin_notices', array($this, "setup"), 20, 2);
    }

    public function setup()
    {
        if (is_admin() and !Helper::is_request('ajax')) {
            $list_notice = self::$core_notices;
            foreach ($list_notice as $notice) {
                self::{$notice}();
            }
        }
    }

    public function use_cache_plugin()
    {
        $plugin = Helper::is_active_cache_plugin();
        if (!Option::get('use_cache_plugin') and $plugin['status'] === true) {
            $text = ($plugin['plugin'] == "core" ? __('Rankology Stats might not count the stats since <code>WP_CACHE</code> is detected in <code>wp-config.php</code>', 'rankology-stats') : sprintf(__('Rankology Stats might not count the stats due to use <b>%s</b> plugin', 'rankology-stats'), $plugin['plugin']));
            Helper::wp_admin_notice($text . ", " . sprintf(__('To fix it, please enable the %1$sCache Compatibility%2$s option on the Settings page, otherwise, if the stats count properly, check out <a href="%3$s" target="_blank">this article</a> to disable this notice permanently.', 'rankology-stats'), '<a href="' . Menus::admin_url('settings') . '">', '</a>', ''), 'warning', true);
        }
    }

    public function enable_rest_api()
    {
        if (isset($_GET['page']) and $_GET['page'] === 'rkns_overview_page' and Option::get('use_cache_plugin') and false === ($check_rest_api = get_transient('rkns_check_rest_api'))) {

            // Check Connect To WordPress Rest API
            $status  = false;
            $message = '';

            $params = array_merge(array(
                '_'                  => time(),
                Hits::$rest_hits_key => 'yes',
            ), Helper::getHitsDefaultParams());

            $requestUrl = add_query_arg($params, get_rest_url(null, RestAPI::$namespace . '/' . Api\v2\Hit::$endpoint));
            $request    = wp_remote_get($requestUrl, array('timeout' => 30, 'sslverify' => false));

            if (is_wp_error($request)) {
                $status  = false;
                $message = $request->get_error_message();
            } else {
                $body = wp_remote_retrieve_body($request);
                $data = json_decode($body, true);
                if (isset($data['status']) && $data['status'] == true) {
                    $status = true;
                }
            }

            if ($status === true) {
                set_transient('rkns_check_rest_api', array("status" => "enable"), 3 * HOUR_IN_SECONDS);
            } else {
                $error_msg = __('Here is an error associated with Connecting WP REST API', 'rankology-stats') . '<br />';
                if (!empty($message)) {
                    $error_msg .= $message . '<br />';
                }
                $error_msg .= sprintf(__('Please Flushing rewrite rules by updating permalink in %1$sSettings->Permalinks%2$s and make sure the WP REST API is enabled.', 'rankology-stats'), '<a href="' . esc_url(admin_url('options-permalink.php')) . '">', '</a>');
                Helper::wp_admin_notice($error_msg, 'warning', true);
            }
        }

    }

    public function active_geo_ip()
    {
        if (Menus::in_plugin_page() and !Option::get('geoip') and GeoIp::IsSupport() and User::Access('manage') and !Option::get('hide_notices')) {
            //Helper::wp_admin_notice(sprintf(__('GeoIP collection is not enabled. Please go to <a href="%s">setting page</a> to enable GeoIP for getting more information and location (country) from the visitor.', 'rankology-stats'), Menus::admin_url('settings', array('tab' => 'geoipsets-settings'))), 'warning', true);
        }
    }

    public function donate_plugin()
    {
        
    }

    public function active_collation()
    {
        if (Menus::in_plugin_page() and User::Access('manage') and !Option::get('hide_notices')) {

            // Create Default Active List item
            $active_collation = array();

            // Check Active User Online
            if (!Option::get('useronline')) {
                $active_collation[] = __('online user tracking', 'rankology-stats');
            }

            // Check Active visits
            if (!Option::get('visits')) {
                $active_collation[] = __('hit tracking', 'rankology-stats');
            }

            // Check Active Visitors
            if (!Option::get('visitors')) {
                $active_collation[] = __('visitor tracking', 'rankology-stats');
            }

            if (count($active_collation) > 0) {
                Helper::wp_admin_notice(sprintf(__('The following features are disabled, please go to %ssettings page%s and enable them: %s', 'rankology-stats'), '<a href="' . Menus::admin_url('settings') . '">', '</a>', implode(__(',', 'rankology-stats'), $active_collation)), 'info', true);
            }
        }
    }
}

new Admin_Notices;