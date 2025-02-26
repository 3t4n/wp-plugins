<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//Google Analytics
function rankology_google_analytics_auth_callback() {
    $options = get_option('rankology_google_analytics_option_name');

    $selected = isset($options['rankology_google_analytics_auth']) ? $options['rankology_google_analytics_auth'] : null;

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

    if ('' != rankology_google_analytics_auth_client_id_option()) {
        $client_id = rankology_google_analytics_auth_client_id_option();
    }

    if ('' != rankology_google_analytics_auth_secret_id_option()) {
        $client_secret = rankology_google_analytics_auth_secret_id_option();
    }

    $redirect_uri = admin_url('admin.php?page=rankology-google-analytics');

    if ('' != rankology_google_analytics_auth_client_id_option() && '' != rankology_google_analytics_auth_secret_id_option()) {
        require_once RANKOLOGY_FNO_PLUGIN_DIR_PATH . '/vendor/autoload.php';
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
    } else { ?>
<p>
    <?php esc_html_e('To sign in with Google Analytics, you have to set a Client and Secret ID in the fields below:', 'wp-rankology'); ?>
</p>
<?php }

    //Logout
    if (isset($_GET['logout'], $_GET['_wpnonce'])) {
        if (wp_verify_nonce($_GET['_wpnonce'], 'ga-logout')) {
            $rankology_google_analytics_options = get_option('rankology_google_analytics_option_name1');
            $rankology_google_analytics_options['refresh_token'] = '';
            $rankology_google_analytics_options['access_token'] = '';
            $rankology_google_analytics_options['code'] = '';
            $rankology_google_analytics_options['debug'] = '';
            update_option('rankology_google_analytics_option_name1', $rankology_google_analytics_options, 'yes');
            update_option('rankology_google_analytics_lock_option_name', '', 'yes');
        }
    }

    if ('' != rankology_google_analytics_auth_client_id_option() && '' != rankology_google_analytics_auth_secret_id_option()) {
        // No nonce token, GG will check if the code is correct, if not, nothing happen.
        if (isset($_GET['code']) && '' == rankology_google_analytics_auth_token_option()) {
            $client->authenticate($_GET['code']);
            $_SESSION['token'] = $client->getAccessToken();

            $rankology_google_analytics_options = get_option('rankology_google_analytics_option_name1');
            $rankology_google_analytics_options['access_token'] = $_SESSION['token']['access_token'];
            $rankology_google_analytics_options['refresh_token'] = $_SESSION['token']['refresh_token'];
            $rankology_google_analytics_options['debug'] = $_SESSION['token'];
            $rankology_google_analytics_options['code'] = $_GET['code'];
            update_option('rankology_google_analytics_option_name1', $rankology_google_analytics_options, 'yes');
        }

        //Login button
        if ( ! $client->getAccessToken() && '' == rankology_google_analytics_auth_token_option()) {
            $authUrl = $client->createAuthUrl(); ?>

            <p>
                <a class="login btn btnSecondary"
                    href="<?php echo $authUrl; ?> ">
                    <?php esc_html_e('Connect with Google Analytics', 'wp-rankology'); ?>
                </a>
            </p>
            <?php
        }

    //Logout button
    if ('' != rankology_google_analytics_auth_token_option()) {
        $client->setAccessToken(rankology_google_analytics_debug_option());

        if ($client->isAccessTokenExpired()) {
            $client->refreshToken(rankology_google_analytics_debug_option());

            $rankology_new_access_token = $client->getAccessToken(rankology_google_analytics_debug_option());

            $rankology_google_analytics_options = get_option('rankology_google_analytics_option_name1');
            $rankology_google_analytics_options['access_token'] = $rankology_new_access_token['access_token'];
            $rankology_google_analytics_options['refresh_token'] = $rankology_new_access_token['refresh_token'];
            $rankology_google_analytics_options['debug'] = $rankology_new_access_token;
            update_option('rankology_google_analytics_option_name1', $rankology_google_analytics_options, 'yes');
        } ?>

        <p>
            <a class="logout btn btnSecondary" href="<?php echo wp_nonce_url($redirect_uri . '&logout=1', 'ga-logout'); ?>"><?php esc_html_e('Log out from Google', 'wp-rankology'); ?></a>
        </p>

        <?php
        $service = new Google_Service_Analytics($client);

        //Select view from Google Analytics
        if ('1' == get_option('rankology_google_analytics_lock_option_name')) { ?>
            <p>
                <?php esc_html_e('Your Google Analytics view is locked. Log out from Google to unlocked it.', 'wp-rankology'); ?>
            </p>
            <input id="rankology_google_analytics_auth" name="rankology_google_analytics_option_name[rankology_google_analytics_auth]"
                type="hidden" value="<?php echo $selected; ?>">
            <?php } else {
                //Important to prevent fatal errors
                try {
                    $accounts = $service->management_accountSummaries->listManagementAccountSummaries();

                    if ( ! empty($accounts->getItems())) { ?>
                        <div class="rankology-notice is-warning">
                            <p><?php esc_html_e('Select a <strong>Universal Analytics (GA3)</strong> property below.','wp-rankology'); ?></p>
                            <p><?php esc_html_e('If the <strong>list is empty, it means you‘re using GA4</strong>. So go to the next field to enter your <strong>GA4 property ID</strong>.','wp-rankology'); ?></p>
                        </div>

                        <p>
                            <select id="rankology_google_analytics_auth"
                                name="rankology_google_analytics_option_name[rankology_google_analytics_auth]">

                                <?php foreach ($accounts->getItems() as $item) {
                                    foreach ($item->getWebProperties() as $wp) {
                                        $views = $wp->getProfiles();
                                        if ( ! is_null($views)) {
                                            foreach ($wp->getProfiles() as $view) {
                                                echo ' <option ';
                                                if ($view['id'] == $selected) {
                                                    echo 'selected="selected"';
                                                }
                                                echo ' value="' . $view['id'] . '">' . $item['name'] . ' > ' . $wp['name'] . ' > ' . $view['name'] . '</option>';
                                            }
                                        }
                                    }
                                } ?>

                            </select>
                        </p>

                    <?php if (null != $selected) { ?>
                            <div class="btn btnSecondary" id="rankology-google-analytics-lock">
                                <?php esc_html_e('Lock selection?', 'wp-rankology'); ?>
                            </div>
                            <span class="spinner"></span>
                        <?php }
                        } else { ?>
                            <div class="rankology-notice is-error">
                                <p>
                                    <?php esc_html_e('We couldn\'t find any GA properties associated with your Google account. Please use another Google account.', 'wp-rankology'); ?>
                                </p>
                            </div>
                        <?php }
                            } catch (Exception $e) {
                                $err = $e->getMessage();
                                $err = json_decode($err, true);

                                if ($err['error']['message']) { ?>
                            <div class="rankology-notice is-error">
                                <p>
                                    <?php esc_html_e('There was an Analytics API service error:', 'wp-rankology'); ?><br>
                                    <strong><?php echo $e->getCode(); ?>:<?php echo $err['error']['message']; ?></strong>
                                </p>
                            </div>
                            <?php
                            }
                        }
                    }
                }
            ?>
    <?php }
    if (isset($options['rankology_google_analytics_auth'])) {
        esc_attr($options['rankology_google_analytics_auth']);
    }
}

function rankology_google_analytics_auth_client_id_callback() {
    $options = get_option('rankology_google_analytics_option_name');

    $selected = isset($options['rankology_google_analytics_auth_client_id']) ? esc_attr($options['rankology_google_analytics_auth_client_id']) : null; ?>

<input type="text" name="rankology_google_analytics_option_name[rankology_google_analytics_auth_client_id]"
    placeholder="<?php esc_html_e('Enter your client ID', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('Google Console Client ID', 'wp-rankology'); ?>"
    value="<?php echo $selected; ?>" />

<?php if (isset($options['rankology_google_analytics_auth_client_id'])) {
    esc_html($options['rankology_google_analytics_auth_client_id']);
}

}

function rankology_google_analytics_auth_secret_id_callback() {
    $options = get_option('rankology_google_analytics_option_name');

    $selected = isset($options['rankology_google_analytics_auth_secret_id']) ? esc_attr($options['rankology_google_analytics_auth_secret_id']) : null; ?>

<input type="text" name="rankology_google_analytics_option_name[rankology_google_analytics_auth_secret_id]"
    placeholder="<?php esc_html_e('Enter your secret ID', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('Google Console Secret ID', 'wp-rankology'); ?>"
    value="<?php echo $selected; ?>" />

    <?php if (isset($options['rankology_google_analytics_auth_secret_id'])) {
        esc_html($options['rankology_google_analytics_auth_secret_id']);
    }
}

function rankology_google_analytics_ga4_property_id_callback() {
    $options = get_option('rankology_google_analytics_option_name');

    $selected = isset($options['rankology_google_analytics_ga4_property_id']) ? esc_attr($options['rankology_google_analytics_ga4_property_id']) : null; ?>

<input type="text" name="rankology_google_analytics_option_name[rankology_google_analytics_ga4_property_id]"
    placeholder="<?php esc_html_e('Enter your Google Analytics v4 property ID', 'wp-rankology'); ?>"
    aria-label="<?php esc_html_e('GA4 property ID', 'wp-rankology'); ?>"
    value="<?php echo $selected; ?>" />

<?php if (isset($options['rankology_google_analytics_ga4_property_id'])) {
    esc_html($options['rankology_google_analytics_ga4_property_id']);
}
?>

<p class="description"><?php esc_html_e('If you enter a GA4 property ID, we will use GA4 instead of Universal Analytics to display stats.', 'wp-rankology'); ?>
</p>

<?php
}

function rankology_google_analytics_dashboard_widget_callback() {
    $options = get_option('rankology_google_analytics_option_name');

    $check = isset($options['rankology_google_analytics_dashboard_widget']); ?>

<label for="rankology_google_analytics_dashboard_widget">
    <input id="rankology_google_analytics_dashboard_widget"
        name="rankology_google_analytics_option_name[rankology_google_analytics_dashboard_widget]" type="checkbox" <?php if ('1' == $check) { ?>
    checked="yes"
    <?php } ?>
    value="1"/>

    <?php esc_html_e('Remove Google Analytics stats widget from WordPress dashboard', 'wp-rankology'); ?>
</label>

<?php if (isset($options['rankology_google_analytics_dashboard_widget'])) {
    esc_attr($options['rankology_google_analytics_dashboard_widget']);
}
}
