<?php
if ( ! defined('ABSPATH')) {
    exit;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
//Request Google PageSpeed Insights
///////////////////////////////////////////////////////////////////////////////////////////////////
function rankology_request_page_speed_fn($cron = false) {
    $options = get_option('rankology_fno_option_name');

    //Save URLs field
    if (isset($_POST['rankology_ps_url'])) {
        $options['rankology_ps_url'] = sanitize_textarea_field($_POST['rankology_ps_url']);
        update_option('rankology_fno_option_name', $options);
    } elseif (isset($options['rankology_ps_url'])) {
        $rankology_get_site_url = $options['rankology_ps_url'];
    } else {
        $rankology_get_site_url = get_home_url();
    }

    $options = get_option('rankology_fno_option_name');

    //Save API key
    if (isset($_POST['rankology_ps_api_key'])) {
        $options['rankology_ps_api_key'] = sanitize_textarea_field($_POST['rankology_ps_api_key']);
        update_option('rankology_fno_option_name', $options);
    }

    $options = get_option('rankology_fno_option_name');

    $rankology_google_api_key = ! empty($options['rankology_ps_api_key']) ? $options['rankology_ps_api_key'] : 'AIzaSyBqvSx2QrqbEqZovzKX8znGpTosw7KClHQ';
    $rankology_get_site_url = ! empty($options['rankology_ps_url']) ? $options['rankology_ps_url'] : get_home_url();

    delete_transient('rankology_results_page_speed');
    delete_transient('rankology_results_page_speed_desktop');

    $args = ['timeout' => 30, 'blocking' => true];

    //Mobile
    if (false === ($rankology_results_page_speed_cache = get_transient('rankology_results_page_speed'))) {
        $rankology_results_page_speed = wp_remote_retrieve_body(wp_remote_get('https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=' . $rankology_get_site_url . '&key=' . $rankology_google_api_key . '&screenshot=true&strategy=mobile&category=performance&category=seo&category=best-practices&locale=' . get_locale(), $args));
        $rankology_results_page_speed_cache = $rankology_results_page_speed;
        set_transient('rankology_results_page_speed', $rankology_results_page_speed_cache, 1 * DAY_IN_SECONDS);
    }

    //Desktop
    if (false === ($rankology_results_page_speed_desktop_cache = get_transient('rankology_results_page_speed_desktop'))) {
        $rankology_results_page_speed_desktop = wp_remote_retrieve_body(wp_remote_get('https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=' . $rankology_get_site_url . '&key=' . $rankology_google_api_key . '&screenshot=true&strategy=desktop&category=performance&locale=' . get_locale(), $args));
        $rankology_results_page_speed_desktop_cache = $rankology_results_page_speed_desktop;
        set_transient('rankology_results_page_speed_desktop', $rankology_results_page_speed_desktop_cache, 1 * DAY_IN_SECONDS);
    }
    $data = ['url' => add_query_arg('ps', 'done', remove_query_arg(['data_permalink', 'ps'], admin_url('admin.php?page=rankology-fno-page&ps=done#tab=tab_rankology_page_speed')))];

    if ($cron === false) {
        wp_send_json_success($data);
    }
    exit();
}
/**
 * Request Page Speed Insights by CRON.
 *
 * 
 * @param boolean Is is a CRON request?
 *
 * 
 */
function rankology_request_page_speed_insights_cron() {
    rankology_request_page_speed_fn(true);
}
add_action('rankology_page_speed_insights_cron', 'rankology_request_page_speed_insights_cron');

function rankology_request_page_speed() {
    check_ajax_referer('rankology_request_page_speed_nonce');

    if (current_user_can(rankology_capability('manage_options', 'cron')) && is_admin()) {
        rankology_request_page_speed_fn();
    }
}
add_action('wp_ajax_rankology_request_page_speed', 'rankology_request_page_speed');

///////////////////////////////////////////////////////////////////////////////////////////////////
//Request Google Analytics
///////////////////////////////////////////////////////////////////////////////////////////////////
use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\OrderBy;
use Google\Analytics\Data\V1beta\Metric;
use Google\ApiCore\ApiException;
use Google\Auth\OAuth2;

function rankology_request_google_analytics_fn($clear = false) {
    if (function_exists('rankology_google_analytics_dashboard_widget_option') && rankology_google_analytics_dashboard_widget_option() === '1') {
        exit();
    }

    /**
     * @
     * @uses rankology_get_service('GoogleAnalyticsOption')
     */
    function rankology_google_analytics_auth_option() {
        $service = rankology_get_service('GoogleAnalyticsOption');

        if ( ! empty($service) || ! method_exists($service, 'getAuth')) {
            $data = get_option('rankology_google_analytics_option_name');
            if (isset($data['rankology_google_analytics_auth'])) {
                return $data['rankology_google_analytics_auth'];
            }
        }

        return $service->getAuth();
    }

    /**
    * @
    * @uses rankology_get_service('GoogleAnalyticsOption')
    */
    function rankology_google_analytics_auth_client_id_option() {
        $service = rankology_get_service('GoogleAnalyticsOption');

        if ( ! empty($service) || ! method_exists($service, 'getAuthClientId')) {
            $data = get_option('rankology_google_analytics_option_name');
            if (isset($data['rankology_google_analytics_auth_client_id'])) {
                return $data['rankology_google_analytics_auth_client_id'];
            }
        }

        return $service->getAuthClientId();
    }

    /**
     * @
     * @uses rankology_get_service('GoogleAnalyticsOption')
     */
    function rankology_google_analytics_auth_secret_id_option() {
        $service = rankology_get_service('GoogleAnalyticsOption');

        if ( ! empty($service) || ! method_exists($service, 'getAuthSecretId')) {
            $data = get_option('rankology_google_analytics_option_name');
            if (isset($data['rankology_google_analytics_auth_secret_id'])) {
                return $data['rankology_google_analytics_auth_secret_id'];
            }
        }

        return $service->getAuthSecretId();
    }


    /**
     * @
     * @uses rankology_fno_get_service('GoogleAnalyticsPro')
     */
    function rankology_google_analytics_auth_token_option() {
        return rankology_fno_get_service('GoogleAnalyticsOptionPro')->getAccessToken();
    }

    /**
    * @
    * @uses rankology_fno_get_service('GoogleAnalyticsPro')
    */
    function rankology_google_analytics_refresh_token_option() {
        return rankology_fno_get_service('GoogleAnalyticsOptionPro')->getRefreshToken();
    }

    /**
     * @
     * @uses rankology_fno_get_service('GoogleAnalyticsPro')
     */
    function rankology_google_analytics_debug_option() {
        return rankology_fno_get_service('GoogleAnalyticsOptionPro')->getDebug();
    }

    /**
     * @
     * @uses rankology_get_service('GoogleAnalyticsOption')
     */
    function rankology_google_analytics_ga4_2_option() {
       return rankology_get_service('GoogleAnalyticsOption')->getGA4();
    }

    /**
     * @
     * @uses rankology_get_service('GoogleAnalyticsOption')
     */
    function rankology_google_analytics_ga4_property_id_option() {
        $service = rankology_get_service('GoogleAnalyticsOption');

        if ( ! empty($service) || ! method_exists($service, 'getGA4PropertId')) {
            $data = get_option('rankology_google_analytics_option_name');
            if (isset($data['rankology_google_analytics_ga4_property_id'])) {
                return $data['rankology_google_analytics_ga4_property_id'];
            }
        }

        return $service->getGA4PropertId();
    }
    $authOption = rankology_google_analytics_auth_option();
    if ((!empty($authOption)  || '' != rankology_google_analytics_ga4_property_id_option() ) && '' != rankology_google_analytics_auth_token_option()) {

        try {
            // get saved data
            if ( ! $widget_options = get_option('rankology_ga_dashboard_widget_options')) {
                $widget_options = [];
            }

            // check if saved data contains content
            $rankology_ga_dashboard_widget_options_period = isset($widget_options['period']) ? $widget_options['period'] : false;

            $rankology_ga_dashboard_widget_options_type = isset($widget_options['type']) ? $widget_options['type'] : 'ga_sessions';

            // custom content saved by control callback, modify output
            if ($rankology_ga_dashboard_widget_options_period) {
                $period = $rankology_ga_dashboard_widget_options_period;
            } else {
                $period = '30daysAgo';
            }

            $client_id = rankology_google_analytics_auth_client_id_option();
            $client_secret = rankology_google_analytics_auth_secret_id_option();

            if(empty($client_id) || empty($client_secret)) {
                return;
            }

            $ga_account = 'ga:' . $authOption;
            $redirect_uri = admin_url('admin.php?page=rankology-google-analytics');

            require_once RANKOLOGY_FNO_PLUGIN_DIR_PATH . '/vendor/autoload.php';

            $oauth = new OAuth2([
                'scope' => 'https://www.googleapis.com/auth/analytics.readonly',
                'tokenCredentialUri' => 'https://oauth2.googleapis.com/token',
                'authorizationUri' => 'https://accounts.google.com/o/oauth2/auth',
                'clientId' => rankology_google_analytics_auth_client_id_option(),
                'clientSecret' => rankology_google_analytics_auth_secret_id_option(),
                'redirectUri' => admin_url('admin.php?page=rankology-google-analytics'),
                'plugin_name' => 'Rankology',
            ]);

            $client = new \Google\Client();
            $client->setApplicationName('Client_Library_Examples');
            $client->setClientId($client_id);
            $client->setClientSecret($client_secret);
            $client->setRedirectUri($redirect_uri);
            $client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
            $client->setApprovalPrompt('force');   // mandatory to get this fucking refreshtoken
            $client->setAccessType('offline'); // mandatory to get this fucking refreshtoken
            $client->setIncludeGrantedScopes(true); // mandatory to get this fucking refreshtoken
            $client->setPrompt('consent'); // mandatory to get this fucking refreshtoken

            $client->setAccessToken(rankology_google_analytics_debug_option());

            if ($client->isAccessTokenExpired()) {
                $client->refreshToken(rankology_google_analytics_debug_option());

                $rankology_new_access_token = $client->getAccessToken(rankology_google_analytics_debug_option());

                $rankology_google_analytics_options = get_option('rankology_google_analytics_option_name1');
                $rankology_google_analytics_options['access_token'] = $rankology_new_access_token['access_token'];
                $rankology_google_analytics_options['refresh_token'] = $rankology_new_access_token['refresh_token'];
                $rankology_google_analytics_options['debug'] = $rankology_new_access_token;
                update_option('rankology_google_analytics_option_name1', $rankology_google_analytics_options, 'yes');
            }

            $service = new Google_Service_AnalyticsReporting($client);

            $oauth->setAccessToken(rankology_google_analytics_auth_token_option());
            $oauth->setRefreshToken(rankology_google_analytics_refresh_token_option());

            // GA4 Stats
            $all = [];

            //Get GA4 property ID
            $property_id = '';
            if (rankology_google_analytics_ga4_property_id_option()) {
                $property_id = rankology_google_analytics_ga4_property_id_option();

                //Get GA4 data
                $ga4_data = new BetaAnalyticsDataClient(['credentials' => $oauth]);
                // sessions
                $sessions = $ga4_data->runReport(
                    [
                        'property' => 'properties/' . $property_id,
                        'dateRanges' => [
                            new DateRange([
                                'start_date' => $period,
                                'end_date' => 'today',
                            ]),
                        ],
                        'dimensions' => [new Dimension([
                            'name' => 'date',
                        ]),
                        ],
                        'metrics' => [new Metric([
                            'name' => 'sessions',
                        ]),
                        ],
                        'orderBys' => [
                            new OrderBy([
                                'dimension' => new OrderBy\DimensionOrderBy([
                                    'dimension_name' => 'date',
                                    'order_type' => OrderBy\DimensionOrderBy\OrderType::ALPHANUMERIC
                                ]),
                                'desc' => false,
                            ]),
                        ],
                    ]
                );

                $users = $ga4_data->runReport(
                    [
                        'property' => 'properties/' . $property_id,
                        'dateRanges' => [
                            new DateRange([
                                'start_date' => $period,
                                'end_date' => 'today',
                            ]),
                        ],
                        'dimensions' => [new Dimension([
                            'name' => 'date',
                        ]),
                        ],
                        'metrics' => [new Metric([
                            'name' => 'totalUsers',
                        ]),
                        ],
                        'orderBys' => [
                            new OrderBy([
                                'dimension' => new OrderBy\DimensionOrderBy([
                                    'dimension_name' => 'date',
                                    'order_type' => OrderBy\DimensionOrderBy\OrderType::ALPHANUMERIC
                                ]),
                                'desc' => false,
                            ]),
                        ],
                    ]
                );

                $pageviews = $ga4_data->runReport(
                    [
                        'property' => 'properties/' . $property_id,
                        'dateRanges' => [
                            new DateRange([
                                'start_date' => $period,
                                'end_date' => 'today',
                            ]),
                        ],
                        'dimensions' => [new Dimension([
                            'name' => 'date',
                        ]),
                        ],
                        'metrics' => [new Metric([
                            'name' => 'screenPageViews',
                        ]),
                        ],
                        'orderBys' => [
                            new OrderBy([
                                'dimension' => new OrderBy\DimensionOrderBy([
                                    'dimension_name' => 'date',
                                    'order_type' => OrderBy\DimensionOrderBy\OrderType::ALPHANUMERIC
                                ]),
                                'desc' => false,
                            ]),
                        ],
                    ]
                );

                $avgSessionDuration = $ga4_data->runReport(
                    [
                        'property' => 'properties/' . $property_id,
                        'dateRanges' => [
                            new DateRange([
                                'start_date' => $period,
                                'end_date' => 'today',
                            ]),
                        ],
                        'dimensions' => [new Dimension([
                            'name' => 'date',
                        ]),
                        ],
                        'metrics' => [new Metric([
                            'name' => 'userEngagementDuration',
                        ]),
                        ],
                        'orderBys' => [
                            new OrderBy([
                                'dimension' => new OrderBy\DimensionOrderBy([
                                    'dimension_name' => 'date',
                                    'order_type' => OrderBy\DimensionOrderBy\OrderType::ALPHANUMERIC
                                ]),
                                'desc' => false,
                            ]),
                        ],
                    ]
                );

                $results = [
                    'sessions' => $sessions,
                    'users' => $users,
                    'pageviews' => $pageviews,
                    'avgSessionDuration' => $avgSessionDuration
                ];

                foreach ($results as $key => $value) {
                    foreach ($value->getRows() as $row) {
                        $all[0][$key][$row->getDimensionValues()[0]->getValue()] = $row->getMetricValues()[0]->getValue();
                    }
                }
            }

            if (true === $clear) {
                delete_transient('rankology_results_google_analytics');
            }

            if (false === ($rankology_results_google_analytics_cache = get_transient('rankology_results_google_analytics'))) {
                $rankology_results_google_analytics_cache = [];

                //////GA4/////////////
                if (rankology_google_analytics_ga4_property_id_option()) {
                    $rankology_results_google_analytics_cache['sessions'] = isset($all[0]['sessions']) && is_array($all[0]['sessions']) ? array_sum($all[0]['sessions']) : 0;
                    $rankology_results_google_analytics_cache['users'] = isset($all[0]['users']) && is_array($all[0]['users']) ? array_sum($all[0]['users']) : 0;
                    $rankology_results_google_analytics_cache['pageviews'] = isset($all[0]['pageviews']) && is_array($all[0]['pageviews']) ? array_sum($all[0]['pageviews']) : 0;


                    $rankology_results_google_analytics_cache['avgSessionDuration'] = 0;
                    if (isset($all[0]['avgSessionDuration']) && is_array($all[0]['avgSessionDuration'])) {
                        $sum = array_sum($all[0]['avgSessionDuration']);
                        $divided = count($all[0]['avgSessionDuration']);
                        if ($divided === 0) {
                            $divided = 1;
                        }

                        $rankology_results_google_analytics_cache['avgSessionDuration'] = gmdate('i:s', $sum / $divided);
                    }


                    switch ($rankology_ga_dashboard_widget_options_type) {
                        case 'ga_sessions':
                            $ga_sessions_rows = $all[0]['sessions'];
                            $rankology_ga_dashboard_widget_options_title = __('Sessions', 'wp-rankology');
                            break;
                        case 'ga_users':
                            $ga_sessions_rows = $all[0]['users'];
                            $rankology_ga_dashboard_widget_options_title = __('Users', 'wp-rankology');
                            break;
                        case 'ga_pageviews':
                            $ga_sessions_rows = $all[0]['pageviews'];
                            $rankology_ga_dashboard_widget_options_title = __('Page Views', 'wp-rankology');
                            break;
                        case 'ga_avgSessionDuration':
                            $ga_sessions_rows = $all[0]['avgSessionDuration'];
                            $rankology_ga_dashboard_widget_options_title = __('Session Duration', 'wp-rankology');
                            break;
                        default:
                            $ga_sessions_rows = $all[0]['sessions'];
                            $rankology_ga_dashboard_widget_options_title = __('Sessions', 'wp-rankology');
                    }

                    function rankology_ga_dashboard_4_get_sessions_labels($ga_date) {
                        $labels = [];
                        foreach ($ga_date as $key => $value) {
                            array_push($labels, date_i18n(get_option('date_format'), strtotime($key)));
                        }

                        return $labels;
                    }

                    function rankology_ga_dashboard_4_get_sessions_data($ga_sessions_rows) {
                        $data = [];
                        foreach ($ga_sessions_rows as $key => $value) {
                            array_push($data, $value);
                        }

                        return $data;
                    }
                    $rankology_results_google_analytics_cache['sessions_graph_labels'] = rankology_ga_dashboard_4_get_sessions_labels($ga_sessions_rows);
                    $rankology_results_google_analytics_cache['sessions_graph_data'] = rankology_ga_dashboard_4_get_sessions_data($ga_sessions_rows);
                    $rankology_results_google_analytics_cache['sessions_graph_title'] = $rankology_ga_dashboard_widget_options_title;
                } else {

                    ////////////////////////////////////////////////////////////////////////////////////////
                    //Request Google Stats
                    ////////////////////////////////////////////////////////////////////////////////////////

                    //DATE RANGE
                    ////////////////////////////////////////////////////////////////////////////////////////

                    // Date
                    $dateRange = new Google_Service_AnalyticsReporting_DateRange();
                    $dateRange->setStartDate($period);
                    $dateRange->setEndDate('today');

                    //METRICS
                    ////////////////////////////////////////////////////////////////////////////////////////

                    // Sessions
                    $sessions = new Google_Service_AnalyticsReporting_Metric();
                    $sessions->setExpression('ga:sessions');
                    $sessions->setAlias('sessions');

                    // Users
                    $users = new Google_Service_AnalyticsReporting_Metric();
                    $users->setExpression('ga:users');
                    $users->setAlias('users');

                    // Page Views
                    $pageviews = new Google_Service_AnalyticsReporting_Metric();
                    $pageviews->setExpression('ga:pageviews');
                    $pageviews->setAlias('pageviews');

                    // Page Views per session
                    $pageviewsPerSession = new Google_Service_AnalyticsReporting_Metric();
                    $pageviewsPerSession->setExpression('ga:pageviewsPerSession');
                    $pageviewsPerSession->setAlias('pageviewsPerSession');

                    // Average session duration
                    $avgSessionDuration = new Google_Service_AnalyticsReporting_Metric();
                    $avgSessionDuration->setExpression('ga:avgSessionDuration');
                    $avgSessionDuration->setAlias('avgSessionDuration');

                    // Bounce rate
                    $bounceRate = new Google_Service_AnalyticsReporting_Metric();
                    $bounceRate->setExpression('ga:bounceRate');
                    $bounceRate->setAlias('bounceRate');

                    // % New sessions
                    $percentNewSessions = new Google_Service_AnalyticsReporting_Metric();
                    $percentNewSessions->setExpression('ga:percentNewSessions');
                    $percentNewSessions->setAlias('percentNewSessions');

                    // Total events
                    $totalEvents = new Google_Service_AnalyticsReporting_Metric();
                    $totalEvents->setExpression('ga:totalEvents');
                    $totalEvents->setAlias('totalEvents');

                    // Unique events
                    $uniqueEvents = new Google_Service_AnalyticsReporting_Metric();
                    $uniqueEvents->setExpression('ga:uniqueEvents');
                    $uniqueEvents->setAlias('uniqueEvents');

                    //DIMENSIONS
                    ////////////////////////////////////////////////////////////////////////////////////////

                    // Date
                    $date = new Google_Service_AnalyticsReporting_Dimension();
                    $date->setName('ga:date');

                    // Language
                    $language = new Google_Service_AnalyticsReporting_Dimension();
                    $language->setName('ga:language');

                    // Country
                    $country = new Google_Service_AnalyticsReporting_Dimension();
                    $country->setName('ga:country');

                    // Device Category
                    $deviceCategory = new Google_Service_AnalyticsReporting_Dimension();
                    $deviceCategory->setName('ga:deviceCategory');

                    // Browser
                    $browser = new Google_Service_AnalyticsReporting_Dimension();
                    $browser->setName('ga:browser');

                    // Social Network
                    $socialNetwork = new Google_Service_AnalyticsReporting_Dimension();
                    $socialNetwork->setName('ga:socialNetwork');

                    // Channel Grouping
                    $channelGrouping = new Google_Service_AnalyticsReporting_Dimension();
                    $channelGrouping->setName('ga:channelGrouping');

                    // Source
                    $source = new Google_Service_AnalyticsReporting_Dimension();
                    $source->setName('ga:source');

                    // Full Referrer
                    $fullReferrer = new Google_Service_AnalyticsReporting_Dimension();
                    $fullReferrer->setName('ga:fullReferrer');

                    // Page Title
                    $pageTitle = new Google_Service_AnalyticsReporting_Dimension();
                    $pageTitle->setName('ga:pageTitle');

                    // Event Category
                    $eventCategory = new Google_Service_AnalyticsReporting_Dimension();
                    $eventCategory->setName('ga:eventCategory');

                    // Event Action
                    $eventAction = new Google_Service_AnalyticsReporting_Dimension();
                    $eventAction->setName('ga:eventAction');

                    // Event Label
                    $eventLabel = new Google_Service_AnalyticsReporting_Dimension();
                    $eventLabel->setName('ga:eventLabel');

                    //ORDERS
                    ////////////////////////////////////////////////////////////////////////////////////////

                    // Order by user desc
                    $order_by_users_desc = new Google_Service_AnalyticsReporting_OrderBy();
                    $order_by_users_desc->setFieldName('ga:users');
                    $order_by_users_desc->setOrderType('VALUE');
                    $order_by_users_desc->setSortOrder('DESCENDING');

                    // Order by page views desc
                    $order_by_pageviews_desc = new Google_Service_AnalyticsReporting_OrderBy();
                    $order_by_pageviews_desc->setFieldName('ga:pageviews');
                    $order_by_pageviews_desc->setOrderType('VALUE');
                    $order_by_pageviews_desc->setSortOrder('DESCENDING');

                    // Order by total events desc
                    $order_by_events_desc = new Google_Service_AnalyticsReporting_OrderBy();
                    $order_by_events_desc->setFieldName('ga:totalEvents');
                    $order_by_events_desc->setOrderType('VALUE');
                    $order_by_events_desc->setSortOrder('DESCENDING');

                    //REPORTS
                    ////////////////////////////////////////////////////////////////////////////////////////

                    // Sessions, Users, Page Views, Page Views Per Session, Average Session Duration, Bounce Rate, New Sessions, Total Events and Unique Events by Date
                    $request_by_date = new Google_Service_AnalyticsReporting_ReportRequest();
                    $request_by_date->setViewId(rankology_google_analytics_auth_option());
                    $request_by_date->setDateRanges($dateRange);
                    $request_by_date->setDimensions([$date]);
                    $request_by_date->setMetrics([$sessions, $users, $pageviews, $pageviewsPerSession, $avgSessionDuration, $bounceRate, $percentNewSessions, $totalEvents, $uniqueEvents]);
                    $request_by_date->setSamplingLevel('SMALL');

                    // Users by language
                    $request_users_by_language = new Google_Service_AnalyticsReporting_ReportRequest();
                    $request_users_by_language->setViewId(rankology_google_analytics_auth_option());
                    $request_users_by_language->setDateRanges($dateRange);
                    $request_users_by_language->setDimensions([$language]);
                    $request_users_by_language->setMetrics([$users]);
                    $request_users_by_language->setSamplingLevel('SMALL');
                    $request_users_by_language->setOrderBys($order_by_users_desc);

                    // Users by country
                    $request_users_by_country = new Google_Service_AnalyticsReporting_ReportRequest();
                    $request_users_by_country->setViewId(rankology_google_analytics_auth_option());
                    $request_users_by_country->setDateRanges($dateRange);
                    $request_users_by_country->setDimensions([$country]);
                    $request_users_by_country->setMetrics([$users]);
                    $request_users_by_country->setSamplingLevel('SMALL');
                    $request_users_by_country->setOrderBys($order_by_users_desc);

                    // Users by device category
                    $request_users_by_device_cat = new Google_Service_AnalyticsReporting_ReportRequest();
                    $request_users_by_device_cat->setViewId(rankology_google_analytics_auth_option());
                    $request_users_by_device_cat->setDateRanges($dateRange);
                    $request_users_by_device_cat->setDimensions([$deviceCategory]);
                    $request_users_by_device_cat->setMetrics([$users]);
                    $request_users_by_device_cat->setSamplingLevel('SMALL');
                    $request_users_by_device_cat->setOrderBys($order_by_users_desc);

                    // Users by Browser
                    $request_users_by_browser = new Google_Service_AnalyticsReporting_ReportRequest();
                    $request_users_by_browser->setViewId(rankology_google_analytics_auth_option());
                    $request_users_by_browser->setDateRanges($dateRange);
                    $request_users_by_browser->setDimensions([$browser]);
                    $request_users_by_browser->setMetrics([$users]);
                    $request_users_by_browser->setSamplingLevel('SMALL');
                    $request_users_by_browser->setOrderBys($order_by_users_desc);

                    // Users by Social Platforms
                    $request_users_by_social_network = new Google_Service_AnalyticsReporting_ReportRequest();
                    $request_users_by_social_network->setViewId(rankology_google_analytics_auth_option());
                    $request_users_by_social_network->setDateRanges($dateRange);
                    $request_users_by_social_network->setDimensions([$socialNetwork]);
                    $request_users_by_social_network->setMetrics([$users]);
                    $request_users_by_social_network->setSamplingLevel('SMALL');
                    $request_users_by_social_network->setOrderBys($order_by_users_desc);

                    // Users by Channel
                    $request_users_by_channel = new Google_Service_AnalyticsReporting_ReportRequest();
                    $request_users_by_channel->setViewId(rankology_google_analytics_auth_option());
                    $request_users_by_channel->setDateRanges($dateRange);
                    $request_users_by_channel->setDimensions([$channelGrouping]);
                    $request_users_by_channel->setMetrics([$users]);
                    $request_users_by_channel->setSamplingLevel('SMALL');

                    // Users by Source
                    $request_users_by_source = new Google_Service_AnalyticsReporting_ReportRequest();
                    $request_users_by_source->setViewId(rankology_google_analytics_auth_option());
                    $request_users_by_source->setDateRanges($dateRange);
                    $request_users_by_source->setDimensions([$source]);
                    $request_users_by_source->setMetrics([$users]);
                    $request_users_by_source->setSamplingLevel('SMALL');
                    $request_users_by_source->setOrderBys($order_by_users_desc);

                    // Users by Referrer
                    $request_users_by_ref = new Google_Service_AnalyticsReporting_ReportRequest();
                    $request_users_by_ref->setViewId(rankology_google_analytics_auth_option());
                    $request_users_by_ref->setDateRanges($dateRange);
                    $request_users_by_ref->setDimensions([$fullReferrer]);
                    $request_users_by_ref->setMetrics([$users]);
                    $request_users_by_ref->setSamplingLevel('SMALL');
                    $request_users_by_ref->setOrderBys($order_by_users_desc);

                    // Page Views by Page Title
                    $request_page_views_page_title = new Google_Service_AnalyticsReporting_ReportRequest();
                    $request_page_views_page_title->setViewId(rankology_google_analytics_auth_option());
                    $request_page_views_page_title->setDateRanges($dateRange);
                    $request_page_views_page_title->setDimensions([$pageTitle]);
                    $request_page_views_page_title->setMetrics([$pageviews]);
                    $request_page_views_page_title->setSamplingLevel('SMALL');
                    $request_page_views_page_title->setOrderBys($order_by_pageviews_desc);

                    // Event Cat
                    $request_events_by_cat = new Google_Service_AnalyticsReporting_ReportRequest();
                    $request_events_by_cat->setViewId(rankology_google_analytics_auth_option());
                    $request_events_by_cat->setDateRanges($dateRange);
                    $request_events_by_cat->setDimensions([$eventCategory]);
                    $request_events_by_cat->setMetrics([$totalEvents]);
                    $request_events_by_cat->setSamplingLevel('SMALL');
                    $request_events_by_cat->setOrderBys($order_by_events_desc);

                    // Event Action
                    $request_events_by_action = new Google_Service_AnalyticsReporting_ReportRequest();
                    $request_events_by_action->setViewId(rankology_google_analytics_auth_option());
                    $request_events_by_action->setDateRanges($dateRange);
                    $request_events_by_action->setDimensions([$eventAction]);
                    $request_events_by_action->setMetrics([$totalEvents]);
                    $request_events_by_action->setSamplingLevel('SMALL');
                    $request_events_by_action->setOrderBys($order_by_events_desc);

                    // Event Label
                    $request_events_by_label = new Google_Service_AnalyticsReporting_ReportRequest();
                    $request_events_by_label->setViewId(rankology_google_analytics_auth_option());
                    $request_events_by_label->setDateRanges($dateRange);
                    $request_events_by_label->setDimensions([$eventLabel]);
                    $request_events_by_label->setMetrics([$totalEvents]);
                    $request_events_by_label->setSamplingLevel('SMALL');
                    $request_events_by_label->setOrderBys($order_by_events_desc);

                    //BATCH REPORT
                    ////////////////////////////////////////////////////////////////////////////////////////

                    function rankology_analytics_get_reports($reports) {
                        $return = [];

                        for ($reportIndex = 0; $reportIndex < count($reports); ++$reportIndex) {
                            $report = $reports[$reportIndex];
                            $header = $report->getColumnHeader();
                            $dimensionHeaders = $header->getDimensions();
                            $metricHeaders = $header->getMetricHeader()->getMetricHeaderEntries();
                            $rows = $report->getData()->getRows();

                            for ($rowIndex = 0; $rowIndex < count($rows); ++$rowIndex) {
                                $row = $rows[$rowIndex];
                                $dimensions = $row->getDimensions();
                                $metrics = $row->getMetrics();
                                for ($i = 0; $i < count($dimensionHeaders) && $i < count($dimensions); ++$i) {
                                    $return[$dimensionHeaders[$i]][] = $dimensions[$i];
                                }

                                for ($j = 0; $j < count($metrics); ++$j) {
                                    $values = $metrics[$j]->getValues();
                                    for ($k = 0; $k < count($values); ++$k) {
                                        $entry = $metricHeaders[$k];
                                        $return[$entry->getName()][] = $values[$k];
                                    }
                                }
                            }
                        }

                        return $return;
                    }

                    $all = [];

                    $requests = [
                        $request_by_date,
                        $request_users_by_country,
                        $request_users_by_device_cat,
                        $request_users_by_browser,
                        $request_users_by_social_network,
                        $request_users_by_channel,
                        $request_users_by_source,
                        $request_users_by_ref,
                        $request_page_views_page_title,
                        $request_events_by_cat,
                        $request_events_by_action,
                        $request_events_by_label,
                        $request_users_by_language,
                    ];

                    foreach ($requests as $key => $request) {
                        $body = new Google_Service_AnalyticsReporting_GetReportsRequest();
                        $body->setReportRequests([$request]);
                        $body = $service->reports->batchGet($body);

                        $all[$key] = rankology_analytics_get_reports($body);
                    }

                    ////////////////////////////////////////////////////////////////////////////////////////
                    //Saving datas
                    ////////////////////////////////////////////////////////////////////////////////////////
                    $rankology_results_google_analytics_cache['sessions'] = isset($all[0]['sessions']) && $all[0]['sessions'] !== null ? array_sum($all[0]['sessions']) : 0;
                    $rankology_results_google_analytics_cache['users'] = isset($all[0]['users']) && $all[0]['users'] !== null ? array_sum($all[0]['users']) : 0;
                    $rankology_results_google_analytics_cache['pageviews'] = isset($all[0]['pageviews']) && $all[0]['pageviews'] !== null ? array_sum($all[0]['pageviews']) : 0;

                    $rankology_results_google_analytics_cache['pageviewsPerSession'] = 0;
                    if (isset($all[0]['pageviewsPerSession']) && $all[0]['pageviewsPerSession'] !== null) {
                        $divided = isset($all[0]['pageviewsPerSession']) && $all[0]['pageviewsPerSession'] !== null ? count($all[0]['pageviewsPerSession']) : 1;
                        if ($divided === 0) {
                            $divided = 1;
                        }

                        $rankology_results_google_analytics_cache['pageviewsPerSession'] = round(array_sum($all[0]['pageviewsPerSession']) / $divided, 2);
                    }


                    $rankology_results_google_analytics_cache['avgSessionDuration'] = 0;
                    if (isset($all[0]['avgSessionDuration']) && $all[0]['avgSessionDuration'] !== null) {
                        $divided = isset($all[0]['avgSessionDuration']) && $all[0]['avgSessionDuration'] !== null ? count($all[0]['avgSessionDuration']) : 1;
                        if ($divided === 0) {
                            $divided = 1;
                        }
                        $avg = array_sum($all[0]['avgSessionDuration']);
                        $rankology_results_google_analytics_cache['avgSessionDuration'] = gmdate('i:s', round($avg / $divided));
                    }

                    $rankology_results_google_analytics_cache['bounceRate'] = 0;
                    if (isset($all[0]['bounceRate']) && $all[0]['bounceRate'] !== null) {
                        $divided = isset($all[0]['bounceRate']) && $all[0]['bounceRate'] !== null ? count($all[0]['bounceRate']) : 1;
                        if ($divided === 0) {
                            $divided = 1;
                        }
                        $rankology_results_google_analytics_cache['bounceRate'] = round(array_sum($all[0]['bounceRate']) / $divided, 2);
                    }

                    $rankology_results_google_analytics_cache['percentNewSessions'] = 0;
                    if (isset($all[0]['percentNewSessions']) && $all[0]['percentNewSessions'] !== null) {
                        $divided = isset($all[0]['percentNewSessions']) && $all[0]['percentNewSessions'] !== null ? count($all[0]['percentNewSessions']) : 1;
                        if ($divided === 0) {
                            $divided = 1;
                        }
                        $rankology_results_google_analytics_cache['percentNewSessions'] = round(array_sum($all[0]['percentNewSessions']) / $divided, 2);
                    }

                    $rankology_results_google_analytics_cache['language'] = $all[12];
                    $rankology_results_google_analytics_cache['country'] = $all[1];
                    $rankology_results_google_analytics_cache['deviceCategory'] = $all[2];
                    $rankology_results_google_analytics_cache['browser'] = $all[3];
                    $rankology_results_google_analytics_cache['socialNetwork'] = $all[4];
                    $rankology_results_google_analytics_cache['channelGrouping'] = $all[5];
                    $rankology_results_google_analytics_cache['source'] = $all[6];
                    $rankology_results_google_analytics_cache['fullReferrer'] = $all[7];
                    $rankology_results_google_analytics_cache['contentpageviews'] = $all[8];
                    $rankology_results_google_analytics_cache['totalEvents'] = $all[0]['totalEvents'] ? $all[0]['totalEvents'] : '';
                    $rankology_results_google_analytics_cache['uniqueEvents'] = $all[0]['uniqueEvents'] ? $all[0]['uniqueEvents'] : '';
                    $rankology_results_google_analytics_cache['eventCategory'] = $all[9];
                    $rankology_results_google_analytics_cache['eventAction'] = $all[10];
                    $rankology_results_google_analytics_cache['eventLabel'] = $all[11];

                    switch ($rankology_ga_dashboard_widget_options_type) {
                        case 'ga_sessions':
                            $ga_sessions_rows = $all[0]['sessions'];
                            $rankology_ga_dashboard_widget_options_title = __('Sessions', 'wp-rankology');
                            break;
                        case 'ga_users':
                            $ga_sessions_rows = $all[0]['users'];
                            $rankology_ga_dashboard_widget_options_title = __('Users', 'wp-rankology');
                            break;
                        case 'ga_pageviews':
                            $ga_sessions_rows = $all[0]['pageviews'];
                            $rankology_ga_dashboard_widget_options_title = __('Page Views', 'wp-rankology');
                            break;
                        case 'ga_pageviewsPerSession':
                            $ga_sessions_rows = $all[0]['pageviewsPerSession'];
                            $rankology_ga_dashboard_widget_options_title = __('Page Views Per Session', 'wp-rankology');
                            break;
                        case 'ga_avgSessionDuration':
                            $ga_sessions_rows = $all[0]['avgSessionDuration'];
                            $rankology_ga_dashboard_widget_options_title = __('Average Session Duration', 'wp-rankology');
                            break;
                        case 'ga_bounceRate':
                            $ga_sessions_rows = $all[0]['bounceRate'];
                            $rankology_ga_dashboard_widget_options_title = __('Bounce Rate', 'wp-rankology');
                            break;
                        case 'ga_percentNewSessions':
                            $ga_sessions_rows = $all[0]['percentNewSessions'];
                            $rankology_ga_dashboard_widget_options_title = __('New Sessions', 'wp-rankology');
                            break;
                        default:
                            $ga_sessions_rows = $all[0]['sessions'];
                            $rankology_ga_dashboard_widget_options_title = __('Sessions', 'wp-rankology');
                    }

                    function rankology_ga_dashboard_get_sessions_labels($ga_date) {
                        $labels = [];
                        if ( ! empty($ga_date) && is_array($ga_date)) {
                            foreach ($ga_date as $key => $value) {
                                array_push($labels, date_i18n(get_option('date_format'), strtotime($value)));
                            }
                        }

                        return $labels;
                    }

                    function rankology_ga_dashboard_get_sessions_data($ga_sessions_rows) {
                        $data = [];
                        if ( ! empty($ga_sessions_rows) && is_array($ga_sessions_rows)) {
                            foreach ($ga_sessions_rows as $key => $value) {
                                array_push($data, $value);
                            }
                        }

                        return $data;
                    }
                    $ga_date = $all[0]['ga:date'];
                    $rankology_results_google_analytics_cache['sessions_graph_labels'] = rankology_ga_dashboard_get_sessions_labels($ga_date);
                    $rankology_results_google_analytics_cache['sessions_graph_data'] = rankology_ga_dashboard_get_sessions_data($ga_sessions_rows);
                    $rankology_results_google_analytics_cache['sessions_graph_title'] = $rankology_ga_dashboard_widget_options_title;
                }

                //Transient
                set_transient('rankology_results_google_analytics', $rankology_results_google_analytics_cache, 2 * HOUR_IN_SECONDS);
            }

            //Return
            $rankology_results_google_analytics_transient = get_transient('rankology_results_google_analytics');

            wp_send_json_success($rankology_results_google_analytics_transient);

        } catch (\Exception $e) {
            $error = $e->getMessage();
            wp_send_json(json_decode($error));
        }
    }

    exit();
}
/**
 * Request GA stats by CRON.
 *
 * 
 *
 * 
 */
function rankology_request_google_analytics_cron() {
    if (function_exists('rankology_get_toggle_option') && '1' === rankology_get_toggle_option('google-analytics')) {
        rankology_request_google_analytics_fn(true);
    }
}
add_action('rankology_google_analytics_cron', 'rankology_request_google_analytics_cron');

function rankology_request_google_analytics() {
    check_ajax_referer('rankology_request_google_analytics_nonce');
    if ((current_user_can(rankology_capability('manage_options', 'cron')) || rankology_advanced_security_ga_widget_check() === true) && is_admin()) {
        if (function_exists('rankology_get_toggle_option') && '1' === rankology_get_toggle_option('google-analytics')) {
            rankology_request_google_analytics_fn(false);
        }
    }
}
add_action('wp_ajax_rankology_request_google_analytics', 'rankology_request_google_analytics');

//Send 404 weekly email notifications
function rankology_404_send_alert() {
    function rankology_404_send_alert_content_type() {
        return 'text/html';
    }
    add_filter('wp_mail_content_type', 'rankology_404_send_alert_content_type');

    $to = rankology_fno_get_service('OptionPro')->get404RedirectEnableMailsFrom();
    $subject = sprintf(__('404 alert - %s', 'wp-rankology'), get_bloginfo('name'));
    $content = '';

    // Get the Latest 404 errors
    $args = [
        'date_query' => [
            [
                'column' => 'post_date_gmt',
                'before' => '1 week ago',
            ],
        ],
        'posts_per_page' => 10,
        'post_type' => 'rankology_404',
        'meta_key' => '_rankology_redirections_type',
        'meta_compare' => 'NOT EXISTS',
    ];

    $args = apply_filters('rankology_404_email_alerts_latest_query', $args);

    $latest_404_query = new WP_Query($args);

    if ($latest_404_query->have_posts()) {
        $errors['latest'] = [];
        while ($latest_404_query->have_posts()) {
            $latest_404_query->the_post();

            $errors['latest'][] = ['url' => get_the_title(), 'count' => get_post_meta( get_the_ID(), 'rankology_404_count', true )];
        }
        wp_reset_postdata();
    }

    if (!empty($errors['latest'])) {
        $content .= '<h2>' . __('Latest 404 errors since 1 week', 'wp-rankology') . '</h2>';
        $content .= '<ul>';
        foreach($errors['latest'] as $error) {
            $hits = !empty($error['count']) ? ' - ' . $error['count'] . __('Traffic','wp-rankology') : '';
            $content .= '<li>' . get_home_url() . '/' . $error['url'] . $hits . '</li>';
        }
        $content .= '</ul>';
    }

    // Get the top 404 errors
    $args = [
        'posts_per_page' => 10,
        'post_type' => 'rankology_404',
        'meta_key' => 'rankology_404_count',
        'meta_query' => [
            'relation' => 'AND',
            [
                'key' => 'rankology_404_count',
                'compare' => 'EXISTS',
                'type' => 'NUMERIC'
            ],
            [
                'key' => '_rankology_redirections_type',
                'compare' => 'NOT EXISTS',
            ],
        ],
        'order' => 'DESC',
        'orderby' => 'meta_value_num',
    ];

    $args = apply_filters('rankology_404_email_alerts_top_query', $args);

    $top_404_query = new WP_Query($args);

    if ($top_404_query->have_posts()) {
        $errors['top'] = [];
        while ($top_404_query->have_posts()) {
            $top_404_query->the_post();

            $errors['top'][] = ['url' => get_the_title(), 'count' => get_post_meta( get_the_ID(), 'rankology_404_count', true )];

        }
        wp_reset_postdata();
    }

    if (!empty($errors['top'])) {
        $content .= '<h2>' . __('Top 404 errors', 'wp-rankology') . '</h2>';
        $content .= '<ul>';
        foreach($errors['top'] as $error) {
            $hits = !empty($error['count']) ? ' - ' . $error['count'] . __('Traffic','wp-rankology') : '';
            $content .= '<li>' . get_home_url() . '/' . $error['url'] . $hits . '</li>';
        }
        $content .= '</ul>';
    }

    $body = "<style>
        #wrapper {
            background-color: #F9F9F9;
            margin: 0;
            padding: 70px 0 70px 0;
            -webkit-text-size-adjust: none !important;
            width: 100%;
        }

        #template_container {
            box-shadow:0 0 0 1px #f3f3f3 !important;
            background-color: #ffffff;
            border: 1px solid #e9e9e9;
            padding: 0;
        }

        #template_header {
            color: #333;
            font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;
        }

        #template_header h1,
        #template_header h1 a {
            color: #232323;
        }

        #template_footer td {
            padding: 0;
        }

        #template_footer #credit a {
            font-size: 13px;
            line-height: 125%;
            text-align: center;
            padding: 12px 28px 28px 28px;
            display: block;
            font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;
        }

        #body_content {
            background-color: #ffffff;
        }

        #body_content table td {
            padding: 30px;
        }

        #body_content table td td {
            padding: 12px;
        }

        #body_content table td th {
            padding: 12px;
        }

        #body_content p {
            margin: 0 0 16px;
        }

        .button {
            font-size: 13px;
            font-weight: bold;
            background: #007cba;
            color: #fff;
            text-decoration: none;
            display: inline-block;
            margin: 0;
            border: 0;
            cursor: pointer;
            -webkit-appearance: none;
            height: 36px;
            padding: 6px 24px;
            border-radius: 2px;
            vertical-align: middle;
            white-space: nowrap;
            line-height: 36px;
            outline: 1px solid transparent;
            font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;
        }

        #body_content_inner {
            color: #505050;
            font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;
            font-size: 14px;
            line-height: 150%;
        }

        .td {
            color: #505050;
            border: 1px solid #E5E5E5;
        }

        .text {
            color: #505050;
            font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;
        }

        .link {
            color: #232323;
        }

        #header_wrapper {
            padding: 24px 48px 24px 48px;
            display: block;
            border-bottom: 1px solid #F1F1F1;
            text-align: center;
        }

        h1 {
            color: #232323;
            font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;
            font-size: 18px;
            margin: 0;
            -webkit-font-smoothing: antialiased;
        }

        h2 {
            color: #232323;
            display: block;
            font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;
            font-size: 18px;
            font-weight: bold;
            line-height: 130%;
            margin: 16px 0 8px;
        }

        h3 {
            color: #232323;
            display: block;
            font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;
            font-size: 16px;
            font-weight: bold;
            line-height: 130%;
            margin: 16px 0 8px;
        }

        a {
            color: #232323;
            font-weight: normal;
            text-decoration: underline;
        }

        img {
            border: none;
            display: inline;
            font-size: 14px;
            font-weight: bold;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            text-transform: capitalize;
        }
    </style>";
    $body .= '<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
        <div id="wrapper">
            <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                <tr>
                    <td align="center" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" width="600" id="template_container">
                            <tr>
                                <td align="center" valign="top">
                                    <!-- Header -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="600" id="template_header">
                                        <tr>
                                            <td id="header_wrapper">
                                                <h1>' . __('404 Error Reporting', 'wp-rankology') . '</h1>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Header -->
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">
                                    <!-- Body -->
                                    <table border="0" cellpadding="0" cellspacing="0" width="600" id="template_body">
                                        <tr>
                                            <td valign="top" id="body_content">
                                                <!-- Content -->
                                                <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td valign="top">
                                                            <div id="body_content_inner">
                                                                <p>' . __('You are receiving this email because 404 error notifications are enabled on your WordPress site.', 'wp-rankology') . '</p>
                                                                ' . $content . '
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" align="center">
                                                            <div id="body_content_inner">
                                                                <a class="button" href="' . get_home_url() . '/wp-admin/edit.php?post_type=rankology_404&action=-1&m=0&redirect-cat=0&redirection-type=404&redirection-enabled&filter_action=Filter&paged=1&action2=-1&post_status=404">' . __('View all 404 errors', 'wp-rankology') . '</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- End Content -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Body -->
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top">
                                    <!-- Footer -->
                                    <table border="0" cellpadding="10" cellspacing="0" width="600" id="template_footer">
                                        <tr>
                                            <td valign="top">
                                                <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td colspan="2" id="credit" style="border:0;color: #878787; border-top: 1px solid #F1F1F1;" valign="middle">
                                                            <p><a href="' . get_home_url() . '">' . get_bloginfo('name') . '</a></p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Footer -->
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </body>';

    if (!empty($content)) {
        wp_mail($to, $subject, $body);
    }

    remove_filter('wp_mail_content_type', 'rankology_404_send_alert_content_type');
}

/**
 * Send 404 email alerts by CRON.
 *
 * 
 *
 * 
 */
function rankology_404_send_alert_cron() {
    if ((function_exists('rankology_get_toggle_option') && '1' === rankology_get_toggle_option('404')) && '1' === rankology_fno_get_service('OptionPro')->get404RedirectEnableMails() && '' !== rankology_fno_get_service('OptionPro')->get404RedirectEnableMailsFrom()) {
        rankology_404_send_alert();
    }
}
add_action('rankology_404_email_alerts_cron', 'rankology_404_send_alert_cron');

///////////////////////////////////////////////////////////////////////////////////////////////////
// 404 Cleaning CRON
///////////////////////////////////////////////////////////////////////////////////////////////////
function rankology_404_cron_cleaning_action($force = false) {
    if ('1' === rankology_fno_get_service('OptionPro')->get404Cleaning() || true === $force) {
        $args = [
            'date_query' => [
                [
                    'column' => 'post_date_gmt',
                    'before' => '1 month ago',
                ],
            ],
            'posts_per_page' => -1,
            'post_type' => 'rankology_404',
            'meta_key' => '_rankology_redirections_type',
            'meta_compare' => 'NOT EXISTS',
        ];

        $args = apply_filters('rankology_404_cleaning_query', $args);

        // The Query
        $old_404_query = new WP_Query($args);

        // The Loop
        if ($old_404_query->have_posts()) {
            while ($old_404_query->have_posts()) {
                $old_404_query->the_post();
                wp_delete_post(get_the_ID(), true);
            }
            /* Restore original Post Data */
            wp_reset_postdata();
        }
    }
}
add_action('rankology_404_cron_cleaning', 'rankology_404_cron_cleaning_action', 10, 1);

///////////////////////////////////////////////////////////////////////////////////////////////////
//Daily Get Insights from Google Search Console
///////////////////////////////////////////////////////////////////////////////////////////////////
function rankology_get_insights_gsc_cron() {
    //Check if GSC toggle is ON
    if (rankology_get_service('ToggleOption')->getToggleInspectUrl() !=='1') {
        return;
    }

    //Get Google API Key
    $options = get_option('rankology_instant_indexing_option_name');
    $google_api_key = isset($options['rankology_instant_indexing_google_api_key']) ? $options['rankology_instant_indexing_google_api_key'] : '';

    if (empty($google_api_key)) {
        return;
    }

    try {
        $service = rankology_fno_get_service('SearchConsole');

        $response = $service->handle();
        if($response['status'] === 'error'){
            return;
        }

        foreach($response['data'] as $row){
            $result = $service->saveDataFromRowResult($row);
        }

    } catch (\Exception $e) {
        // No need to do anything here
    }
}
add_action('rankology_insights_gsc_cron', 'rankology_get_insights_gsc_cron');
