<?php
/*
Plugin Name: cookieBAR
Description: A free & easy solution to the EU cookie law
Version: 1.7.0
Author: Emanuele "ToX" Toscano
Author URI: http://emanuele.itoscano.com
Plugin URI: http://cookie-bar.eu
*/
defined('ABSPATH') or die('No script kiddies please!');
$plugin = plugin_basename(__FILE__);

/*
* FRONTEND ACTIONS
*/
add_action('wp_enqueue_scripts', 'script_caller');
function script_caller()
{
    $params = "?1";
    $options = get_option('cookiebar_settings');

    if ($options['force_lang']) {
        $params .= '&forceLang=' . $options['force_lang'];
    }
    if ($options['theme']) {
        $params .= '&theme=' . $options['theme'];
    }
    if ($options['tracking']) {
        $params .= '&tracking=1';
    }
    if ($options['thirdparty']) {
        $params .= '&thirdparty=1';
    }
    if ($options['scrolling']) {
        $params .= '&scrolling=1';
    }
    if ($options['always']) {
        $params .= '&always=1';
    }
    if ($options['top']) {
        $params .= '&top=1';
    }
    if ($options['show_no_consent']) {
        $params .= '&showNoConsent=1';
    }
    if ($options['blocking']) {
        $params .= '&blocking=1';
    }
    if ($options['remember']) {
        $params .= '&remember=' . $options['remember'];
    }
    if ($options['privacy_page']) {
        $params .= '&privacyPage=' . $options['privacy_page'];
    }
    if ($options['no_geo_ip']) {
        $params .= '&noGeoIp=' . $options['no_geo_ip'];
    }
    if ($options['hide_details_btn']) {
        $params .= '&hideDetailsBtn=' . $options['hide_details_btn'];
    }
    if ($options['policy_main_bar']) {
        $params .= '&showPolicyLink=' . $options['policy_main_bar'];
    }

    wp_enqueue_script(
        'cookieBAR',
        plugins_url('cookiebar-latest.min.js', __FILE__) . $params,
        array(),
        '1.7.0',
        false
    );
}

/*
* BACKEND ACTIONS
*/
add_action('admin_menu', 'cookiebar_add_admin_menu');
add_action('admin_init', 'cookiebar_settings_init');
add_filter("plugin_action_links_$plugin", 'plugin_settings_link');

function plugin_settings_link($links)
{
    array_unshift($links, '<a href="themes.php?page=cookiebar">Settings</a>');

    return $links;
}


function cookiebar_add_admin_menu()
{
    add_theme_page('cookieBAR', 'cookieBAR', 'manage_options', 'cookiebar', 'cookiebar_options_page');
}


function cookiebar_settings_init()
{
    register_setting('pluginPage', 'cookiebar_settings');

    add_settings_section(
        'cookiebar_pluginPage_section',
        __('cookieBAR configurations', 'wordpress'),
        'cookiebar_settings_section_callback',
        'pluginPage'
    );

    add_settings_field(
        'force_lang',
        __('Force a specific language', 'wordpress'),
        'force_lang_render',
        'pluginPage',
        'cookiebar_pluginPage_section'
    );

    add_settings_field(
        'theme',
        __('Theme', 'wordpress'),
        'theme_render',
        'pluginPage',
        'cookiebar_pluginPage_section'
    );

    add_settings_field(
        'tracking',
        __('This website uses tracking cookies', 'wordpress'),
        'tracking_render',
        'pluginPage',
        'cookiebar_pluginPage_section'
    );

    add_settings_field(
        'thirdparty',
        __('This website uses third party cookies', 'wordpress'),
        'thirdparty_render',
        'pluginPage',
        'cookiebar_pluginPage_section'
    );

    add_settings_field(
        'always',
        __('Always show cookieBAR (show cookieBAR even if no cookies are detected - RECOMMENDED)', 'wordpress'),
        'always_render',
        'pluginPage',
        'cookiebar_pluginPage_section'
    );

    add_settings_field(
        'no_geo_ip',
        __('No GeoIP lookup (show cookieBAR regardless of the user\'s location) ', 'wordpress'),
        'no_geo_ip_render',
        'pluginPage',
        'cookiebar_pluginPage_section'
    );

    add_settings_field(
        'scrolling',
        __('Accept cookies by scrolling window', 'wordpress'),
        'scrolling_render',
        'pluginPage',
        'cookiebar_pluginPage_section'
    );

    add_settings_field(
        'refresh',
        __('Refresh page on CookieAllowed', 'wordpress'),
        'refresh_render',
        'pluginPage',
        'cookiebar_pluginPage_section'
    );

    add_settings_field(
        'top',
        __('Show cookieBAR on top', 'wordpress'),
        'top_render',
        'pluginPage',
        'cookiebar_pluginPage_section'
    );

    add_settings_field(
        'show_no_consent',
        __('Show "DENY" button', 'wordpress'),
        'show_no_consent_render',
        'pluginPage',
        'cookiebar_pluginPage_section'
    );

    add_settings_field(
        'hide_details_btn',
        __('Hide the "Details" button', 'wordpress'),
        'hide_details_btn_render',
        'pluginPage',
        'cookiebar_pluginPage_section'
    );

    add_settings_field(
        'policy_main_bar',
        __('Show the policy page link in the main bar (you must specify the URL of your custom Privacy Page)', 'wordpress'),
        'policy_main_bar_render',
        'pluginPage',
        'cookiebar_pluginPage_section'
    );

    add_settings_field(
        'blocking',
        __('Block page', 'wordpress'),
        'blocking_render',
        'pluginPage',
        'cookiebar_pluginPage_section'
    );

    add_settings_field(
        'remember',
        __('Remember choice cookie duration (days)', 'wordpress'),
        'remember_render',
        'pluginPage',
        'cookiebar_pluginPage_section'
    );

    add_settings_field(
        'privacy_page',
        __('If you have a custom Privacy Page, type its address here', 'wordpress'),
        'privacy_page_render',
        'pluginPage',
        'cookiebar_pluginPage_section'
    );
}

function force_lang_render()
{
    $options = get_option('cookiebar_settings');
    echo "<select name='cookiebar_settings[force_lang]'>";
        echo "<option value='' " . selected($options['force_lang'], '') . ">Auto detect</option>";
        echo "<option value='ca' " . selected($options['force_lang'], 'ca') . ">Catalan</option>";
        echo "<option value='cz' " . selected($options['force_lang'], 'cz') . ">Czech</option>";
        echo "<option value='da' " . selected($options['force_lang'], 'da') . ">Danish</option>";
        echo "<option value='nl' " . selected($options['force_lang'], 'nl') . ">Dutch</option>";
        echo "<option value='en' " . selected($options['force_lang'], 'en') . ">English</option>";
        echo "<option value='fr' " . selected($options['force_lang'], 'fr') . ">French</option>";
        echo "<option value='de' " . selected($options['force_lang'], 'de') . ">German</option>";
        echo "<option value='hu' " . selected($options['force_lang'], 'hu') . ">Hungarian</option>";
        echo "<option value='it' " . selected($options['force_lang'], 'it') . ">Italian</option>";
        echo "<option value='es' " . selected($options['force_lang'], 'es') . ">Spanish</option>";
        echo "<option value='se' " . selected($options['force_lang'], 'se') . ">Swedish</option>";
        echo "<option value='pl' " . selected($options['force_lang'], 'pl') . ">Polish</option>";
        echo "<option value='po' " . selected($options['force_lang'], 'po') . ">Portuguese</option>";
        echo "<option value='ro' " . selected($options['force_lang'], 'ro') . ">Romanian</option>";
        echo "<option value='sk' " . selected($options['force_lang'], 'sk') . ">Slovak</option>";
        echo "<option value='sl' " . selected($options['force_lang'], 'sl') . ">Slovenian</option>";
        echo "<option value='sw' " . selected($options['force_lang'], 'sw') . ">Swedish</option>";
    echo "</select>";
}

function theme_render()
{
    $options = get_option('cookiebar_settings');
    echo "<select name='cookiebar_settings[theme]'>";
        echo "<option value='' " . selected($options['theme'], "") . ">Black (default)</option>";
        echo "<option value='altblack' " . selected($options['theme'], "altblack") . ">Alternative black</option>";
        echo "<option value='momh' " . selected($options['theme'], "momh") . ">Momh</option>";
        echo "<option value='flying' " . selected($options['theme'], "flying") . ">FlyingBAR</option>";
        echo "<option value='grey' " . selected($options['theme'], "grey") . ">Plain grey</option>";
        echo "<option value='white' " . selected($options['theme'], "white") . ">Thick white</option>";
    echo "</select>";
}

function tracking_render()
{
    $options = get_option('cookiebar_settings');
    echo "<input type='checkbox' name='cookiebar_settings[tracking]' " . checked($options['tracking'], 1, false) . " value='1'>";
}

function thirdparty_render()
{
    $options = get_option('cookiebar_settings');
    echo "<input type='checkbox' name='cookiebar_settings[thirdparty]' " . checked($options['thirdparty'], 1, false) . " value='1'>";
}

function scrolling_render()
{
    $options = get_option('cookiebar_settings');
    echo "<input type='checkbox' name='cookiebar_settings[scrolling]' " . checked($options['scrolling'], 1, false) . " value='1'>";
}

function always_render()
{
    $options = get_option('cookiebar_settings');
    echo "<input type='checkbox' name='cookiebar_settings[always]' " . checked($options['always'], 1, false) . " value='1'>";
}

function top_render()
{
    $options = get_option('cookiebar_settings');
    echo "<input type='checkbox' name='cookiebar_settings[top]' " . checked($options['top'], 1, false) . " value='1'>";
}

function show_no_consent_render()
{
    $options = get_option('cookiebar_settings');
    echo "<input type='checkbox' name='cookiebar_settings[show_no_consent]' " . checked($options['show_no_consent'], 1, false) . " value='1'>";
}

function blocking_render()
{
    $options = get_option('cookiebar_settings');
    echo "<input type='checkbox' name='cookiebar_settings[blocking]' " . checked($options['blocking'], 1, false) . " value='1'>";
}

function no_geo_ip_render()
{
    $options = get_option('cookiebar_settings');
    echo "<input type='checkbox' name='cookiebar_settings[no_geo_ip]' " . checked($options['no_geo_ip'], 1, false) . " value='1'>";
}

function refresh_render()
{
    $options = get_option('cookiebar_settings');
    echo "<input type='checkbox' name='cookiebar_settings[refresh]' " . checked($options['refresh'], 1, false) . " value='1'>";
}

function hide_details_btn_render()
{
    $options = get_option('cookiebar_settings');
    echo "<input type='checkbox' name='cookiebar_settings[hide_details_btn]' " . checked($options['hide_details_btn'], 1, false) . " value='1'>";
}

function policy_main_bar_render()
{
    $options = get_option('cookiebar_settings');
    echo "<input type='checkbox' name='cookiebar_settings[policy_main_bar]' " . checked($options['policy_main_bar'], 1, false) . " value='1'>";
}

function remember_render()
{
    $options = get_option('cookiebar_settings');
    echo "<input type='number' name='cookiebar_settings[remember]' placeholder='30' value='" . $options['remember'] . "'>";
}

function privacy_page_render()
{
    $options = get_option('cookiebar_settings');
    echo "<input type='text' class='regular-text' name='cookiebar_settings[privacy_page]' value='" . $options['privacy_page'] . "'>";
}

function cookiebar_settings_section_callback()
{
    // Nothing to do here
}


function cookiebar_options_page()
{
    ?>
    <style>
    .form-table th {
        min-width: 220px;
        text-align: right;
    }       
    .regular-text {
        width: 100%;
    }
    .submit {
        text-align: center !important;
    }
    </style>

    <div class="wrap">
        <h1>CookieBAR</h1>

        <div class="widget-liquid-left sidebars-column-1">
            <div class='card'>
                <form action='options.php' method='post'>
                    <?php
                    settings_fields('pluginPage');
                    do_settings_sections('pluginPage');
                    submit_button();
                    ?>
                </form>
            </div>
        </div>

        <div class="widget-liquid-right sidebars-column-1">
            <div class='card'>
                <h3 style="text-align: center;">Recommended</h3>
                If your site uses WordPress and you’re working on being GDPR-compliant, you’ll soon learn that WordPress’s
                built in export/erase tools only access the data on your site. What about the off-site user data? Privacy WP
                is here to help. With this simple one-stop-shop plugin you can easily provide and/or erase ALL of
                the end user data you need no matter where it’s stored. Get Privacy WP today and let it be your perfect
                assist in becoming GDPR-compliant.

                <p style="text-align: center;">
                    <a href="https://privacywp.com/ref/3/" title="Privacy WP">
                        <img src="https://privacywp.com/wp-content/uploads/2018/06/320x100-1DI56KL.jpg" alt="Privacy WP" />
                    </a>
                </p>
            </div>

            <div class='card'>
                <p>
                    <h3 style="text-align: center;">Important reading</h3>
                    Please note that cookieBAR doesn't prevent wordpress or your installed plugins to set cookies prior to the user's choice. Some countries, instead, wants you to preventively block them before they are set, in a opt-in choice for the user.
                </p>
                <p>
                I'm not even sure that it would be possibile for a similar plugin to block every possible cookie that could be created by wordpress itself or a plugin.
                </p><p>
                Some cookie law plugins try to do so by blocking specific service's cookies, but in my opinion that is a bad solution and gives a false sense of security: What happens if you use some other services / plugins?.
                </p>
                <hr>
                If you happen to know a solid solution, please <a href='http://cookie-bar.eu/'>let me know</a>. I would be very glad to implement it.
            </div>

            <div class='card'>
                <h3 style="text-align: center;">Support</h3>
                I hope that you will try and enjoy cookieBAR as much as I did writing it.<br>
                If cookieBAR has been useful to you, please consider to make a small donation as a token of your appreciation and to help me to keep this up :)
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIHTwYJKoZIhvcNAQcEoIIHQDCCBzwCAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYC+ZR+Y8BmdbLbbm3YmQq//LfZJ+ElLq0+Shb5r3qonNKHe+/h9zhpnUbHtgZmqN6kTewx9XDwNzwlyKHnCIlbUYM2cP2c4LmyWeuRZ5Uq0ITdhyXzhA6NG3ZLAqC4XQ4bCDLm30IyLJSutY8rP6JopJSxzPO6W12pYuGZzCmYq5zELMAkGBSsOAwIaBQAwgcwGCSqGSIb3DQEHATAUBggqhkiG9w0DBwQIKu1xv6L0wyaAgag1UD1hgJ/eGuWXRsxD9dnPVKQJkzBYOS4RXDYi4LzehvX7QZ4yX5t5ALudJScu7lcPo5tJeSmbv2TKcxqtOf/KtRlifLvxggdNzhkiUPlZLO6ji/W1md8F11th+gV9z5JhttiKQFaqvXS9PgSzluKACW9ntBPPf5DFMOIES8CGUbWLiHOzftC1VgYZOzb4046AEOcEM8fDX0Smn51dXEm9KOHhjlXtIaCgggOHMIIDgzCCAuygAwIBAgIBADANBgkqhkiG9w0BAQUFADCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20wHhcNMDQwMjEzMTAxMzE1WhcNMzUwMjEzMTAxMzE1WjCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20wgZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBAMFHTt38RMxLXJyO2SmS+Ndl72T7oKJ4u4uw+6awntALWh03PewmIJuzbALScsTS4sZoS1fKciBGoh11gIfHzylvkdNe/hJl66/RGqrj5rFb08sAABNTzDTiqqNpJeBsYs/c2aiGozptX2RlnBktH+SUNpAajW724Nv2Wvhif6sFAgMBAAGjge4wgeswHQYDVR0OBBYEFJaffLvGbxe9WT9S1wob7BDWZJRrMIG7BgNVHSMEgbMwgbCAFJaffLvGbxe9WT9S1wob7BDWZJRroYGUpIGRMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbYIBADAMBgNVHRMEBTADAQH/MA0GCSqGSIb3DQEBBQUAA4GBAIFfOlaagFrl71+jq6OKidbWFSE+Q4FqROvdgIONth+8kSK//Y/4ihuE4Ymvzn5ceE3S/iBSQQMjyvb+s2TWbQYDwcp129OPIbD9epdr4tJOUNiSojw7BHwYRiPh58S1xGlFgHFXwrEBb3dgNbMUa+u4qectsMAXpVHnD9wIyfmHMYIBmjCCAZYCAQEwgZQwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tAgEAMAkGBSsOAwIaBQCgXTAYBgkqhkiG9w0BCQMxCwYJKoZIhvcNAQcBMBwGCSqGSIb3DQEJBTEPFw0xNTAzMTYxMDQ2MzRaMCMGCSqGSIb3DQEJBDEWBBRJygLpbDzWj8+C6LNleOKoDqJuFDANBgkqhkiG9w0BAQEFAASBgD3HShvjYnN8J11NnZJhXWoyAnddJINVYTt5uaLymXRHMgCrTF/JSIl/BDP7a8yexcjwcwPVvFVI4kGw1wK3nO8qOwpxAcB7lJArTQ1DTlkPjLayINhCXrz96ES4g4WIH7o41q/DOP1bN0mMgvgg2n2pBYKEl8xVa2T/DKWLrddI-----END PKCS7-----
                ">
                <input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
                <img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
                </form>
                
                <hr>

                If you prefere Bitcoins, you can make a donation to: <strong>168uVh3cg4j5ZDi6E8Y7t9zG9uQeH4JtPR</strong>
            </div>
        </div>
    </div>

    <?php
}
