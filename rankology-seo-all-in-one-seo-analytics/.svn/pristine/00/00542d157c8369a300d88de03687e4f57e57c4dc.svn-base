<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');
//Google Analytics Results
//=================================================================================================
if ('1' == rankology_get_toggle_option('google-analytics')) {
    if (rankology_advanced_security_ga_widget_check() === true) {
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
         * @uses rankology_fno_get_service('GoogleAnalyticsOptionPro')->getAccessToken()
         */
        function rankology_google_analytics_auth_token_option() {
            return rankology_fno_get_service('GoogleAnalyticsOptionPro')->getAccessToken();
        }

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

        add_action('admin_menu', 'rankology_ga_stats_results_widget');

        function rankology_ga_stats_results_widget() {
            $return_false = '';
            $return_false = apply_filters('rankology_ga_stats_results_widget', $return_false);

            if (has_filter('rankology_ga_stats_results_widget') && false == $return_false) {
                //do nothing
            } else {
               add_submenu_page('rankology-option', __('Analytics Statistics', 'wp-rankology'), __('Analytics Statistics', 'wp-rankology'), 'manage_options', 'rankology-analytics-results', 'rankology_ga_stats_results_widget_display');
            }
        }

        function rankology_ga_stats_results_widget_display() {

            echo '<div class="rkns-ga-ovrall-reslts">';
            echo '<h2>' . __('Analytics Results', 'wp-rankology') . '</h2>';
            if (('' != rankology_google_analytics_auth_option() || '' != rankology_google_analytics_ga4_property_id_option()) && '' != rankology_google_analytics_auth_token_option()) {
                echo '<span class="spinner"></span>';

                $rankology_results_google_analytics_cache = get_transient('rankology_results_google_analytics');

                function rankology_ga_table_html($ga_dimensions, $rankology_results_google_analytics_cache, $i18n) {
                    if (isset($rankology_results_google_analytics_cache[$ga_dimensions]) && ! empty($rankology_results_google_analytics_cache[$ga_dimensions])) {
                        echo '<div class="wrap-single-stat table-row">';
                        echo '<span class="label-stat">' . __($i18n, 'wp-rankology') . '</span>';
                        echo '<ul id="rankology-ga-' . $ga_dimensions . '" class="value-stat wrap-row-stat">';
                        $i = 0;

                        $gaData = array_shift($rankology_results_google_analytics_cache[$ga_dimensions]);
                        $users = array_shift($rankology_results_google_analytics_cache[$ga_dimensions]);

                        foreach ($gaData as $key => $value) {
                            if ( ! array_key_exists($key, $users)) {
                                continue;
                            }
                            printf('<li>%s <span>%s</span></li>', $value, $users[$key]);
                            if (10 == ++$i) {
                                break;
                            }
                        }

                        echo '</ul>';
                        echo '</div>';
                    }
                }

                echo '<div class="wrap-chart-stat rkns-ga-overll-chart">';
                echo '<canvas id="rankology_ga_stats_results_widget_sessions" width="400" height="250"></canvas>';
                echo '<script>var ctxrankology = document.getElementById("rankology_ga_stats_results_widget_sessions");</script>';
                echo '</div>';

                if ('' != rankology_google_analytics_ga4_property_id_option() && '' != rankology_google_analytics_auth_token_option()) { ?>
                    <div id="rankology-tabs2" class="rkns-ga-overll-stats">
                        <div id="rkseo-tabs-1" class="rankology-summary-items">

                            <!-- //Page -->
                            <div class="rankology-summary-item">
                                <div class="rankology-summary-item-label">
                                    <?php esc_html_e('Page Views', 'wp-rankology'); ?>
                                </div>
                                <div id="rankology-ga-pageviews" class="rankology-summary-item-data"></div>
                            </div>

                            <!-- //Users -->
                            <div class="rankology-summary-item">
                                <div class="rankology-summary-item-label">
                                    <?php esc_html_e('Users', 'wp-rankology'); ?>
                                </div>
                                <div id="rankology-ga-users" class="rankology-summary-item-data"></div>
                            </div>

                            <!-- //Sessions -->
                            <div class="rankology-summary-item">
                                <div class="rankology-summary-item-label">
                                    <?php esc_html_e('Sessions', 'wp-rankology'); ?>
                                </div>
                                <div id="rankology-ga-sessions" class="rankology-summary-item-data"></div>
                            </div>
                            
                            <!-- //Average session duration -->
                            <div class="rankology-summary-item">
                                <div class="rankology-summary-item-label">
                                    <?php esc_html_e('Average session duration', 'wp-rankology'); ?>
                                </div>
                                <div id="rankology-ga-avgSessionDuration" class="rankology-summary-item-data"></div>
                            </div>
                        </div>
                    </div>
                    <?php
                }

            } else {
                global $pagenow;
                ?>
                <div class="rankology-tools-card">
                    <p>
                        <?php esc_html_e('You need to login to Google Analytics.', 'wp-rankology'); ?>
                    </p>

                    <p>
                        <?php esc_html_e('Make sure you have enabled these 3 APIs from <strong>Google Cloud Console</strong>:', 'wp-rankology'); ?>
                    </p>

                    <ul>
                        <li><span class="dashicons dashicons-minus"></span><strong>Google Analytics API</strong></li>
                        <li><span class="dashicons dashicons-minus"></span><strong>Google Analytics Data API</strong></li>
                        <li><span class="dashicons dashicons-minus"></span><strong>Google Analytics Reporting API</strong></li>
                    </ul>

                    <p>
                        <a class="rankology-btn" href="<?php echo admin_url('admin.php?page=rankology-google-analytics#rankology-analytics-stats'); ?>">
                            <?php esc_html_e('Connect with Google API', 'wp-rankology'); ?>
                        </a>
                    </p>
                </div>
                <?php 
            }

            echo '</div>';
        }

    }
}
