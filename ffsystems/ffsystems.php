<?php
/*
Plugin Name: FFSystems
Plugin URI: https://ffsystems.nl/?ref=wordpress-plugin-uri
Description: An easy way to implement the FFSystems widget to your Wordpress sites.
Author: FFSystems
Author URI: https://ffsystems.nl/?ref=wordpress-author-uri-ffsystems
Version: 1.0.1

FFSystems for WordPress
Copyright (C) 2021 FFSystems

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/

const FFSYSTEMS_CUSTOM_DOMAIN_OPTION_NAME = 'ffsystems_custom_domain';
const FFSYSTEMS_URL_OPTION_NAME = 'ffsystems_url';
const FFSYSTEMS_SITE_HASH_OPTION_NAME = 'ffsystems_site_hash';
const FFSYSTEMS_ADMIN_TRACKING_OPTION_NAME = 'ffsystems_track_admin';
const FFSYSTEMS_SHOW_ANALYTICS_MENU_ITEM = 'ffsystems_show_menu';

/**
 * @since 0.1
 */
function ffSystemsGetUrl() {
    $ffSystemsUrl = get_option(FFSYSTEMS_URL_OPTION_NAME, '');

    // don't print snippet if URL is empty
    if(empty($ffSystemsUrl)) {
        return 'cdn.ffsystems.nl';
    }

    // trim trailing slash
    $ffSystemsUrl = rtrim($ffSystemsUrl, '/');

    // make relative
    $ffSystemsUrl = str_replace(['https:', 'http:'], '', $ffSystemsUrl);

    return $ffSystemsUrl;
}

/**
 * @since 0.1
 */
function ffSystemsGetTeamHash() {
    return get_option( FFSYSTEMS_SITE_HASH_OPTION_NAME, '' );
}

/**
 * @since 0.1
 */
function ffSystemsGetCustomDomain() {
    // Error proof the input
    $customDomainOption = 'https://' . str_replace(['https://', 'http://'], '', get_option( FFSYSTEMS_CUSTOM_DOMAIN_OPTION_NAME, 'https://cdn.ffsystems.nl/' ));

    // If we have a host
    if (array_key_exists('host', (array) parse_url($customDomainOption))) {
        return parse_url($customDomainOption)['host'];
    } else {
        return 'https://cdn.ffsystems.nl/';
    }
}

/**
 * @since 0.1
 */
function ffSystemsGetAdminTracking() {
    return get_option(FFSYSTEMS_ADMIN_TRACKING_OPTION_NAME, '');
}

/**
 * @since 0.1
 */
function ffSystemsPrintJsSnippet() {
    $url = ffSystemsGetUrl();
    $exclude_admin = ffSystemsGetAdminTracking();

    // don't print snippet if ffsystems URL is empty
    if(empty($url)) {
        return;
    }

    if(empty($exclude_admin) && current_user_can('manage_options')) {
        return;
    }

    $teamHash = ffSystemsGetTeamHash();

    if (empty($teamHash)) {
        return;
    }

    if (empty(ffSystemsGetCustomDomain())) {
        $widgetUrl = 'https://cdn.ffsystems.nl/widget/'.esc_attr($teamHash).'/script.js';
    } else {
        $widgetUrl = 'https://'.str_replace(['http://', 'https://', '/'], '', ffSystemsGetCustomDomain()).'/widget/'.esc_attr($teamHash).'/script.js';
    }

    $widgetScriptName = 'ffsystems-widget';
    wp_register_script($widgetScriptName, $widgetUrl, [], false, false);
    wp_enqueue_script($widgetScriptName);
}

/**
 * @since 0.1
 */
function ffSystemsStatsPage() {
    add_menu_page('FFSystems', 'FFSystems', 'edit_pages', 'analytics', 'ffSystemsPrintStatsPage', 'dashicons-chart-bar', 6);
}

/**
 * @since 0.1
 */
function ffSystemsPrintStatsPage() {
    if (!empty(get_option( FFSYSTEMS_SITE_HASH_OPTION_NAME ))) {
        //todo
        $openUrl = 'https://ffsystems.nl/external/'.get_option(FFSYSTEMS_SITE_HASH_OPTION_NAME).'/plugins/wordpress/dashboard';

        wp_register_script('ffsystems-dashboard-redirect', '');
        wp_enqueue_script('ffsystems-dashboard-redirect');
        wp_add_inline_script('ffsystems-dashboard-redirect', 'setTimeout(function(){ let win = window.open("'.$openUrl.'", "_blank");win.focus();}, 500);');

        echo '<div class="wrap">';
        echo 'Redirecting you to <a target="_blank" href="'.$openUrl.'">'.$openUrl.'</a>...';
        echo '</div>';
    } else {
        echo '<div class="wrap">You have not configured FFSystems. Go to Settings -> FFSystems to configure this page.</div>';
    }
}

/**
 * @since 0.1
 */
function ffSystemsRegisterSettings() {
    $ffsystems_logo_html = sprintf( '<a target="_blank" href="https://ffsystems.nl/?ref=wordpress-logo">FFSystems <img src="%s" width=20 height=20 style="margin-left: 6px; vertical-align: bottom;"></a>', plugins_url( 'ffsystems.png', __FILE__ ) );

    // register page + section
    add_options_page( 'FFSystems', 'FFSystems', 'manage_options', 'ffsystems', 'ffSystemsPrintSettingsPage' );
    add_settings_section( 'default', $ffsystems_logo_html, '__return_true', 'ffsystems' );

    // register options
    register_setting( 'ffsystems', FFSYSTEMS_SITE_HASH_OPTION_NAME, array( 'type' => 'string' ) );
    register_setting( 'ffsystems', FFSYSTEMS_ADMIN_TRACKING_OPTION_NAME, array( 'type' => 'string') );
    register_setting( 'ffsystems', FFSYSTEMS_SHOW_ANALYTICS_MENU_ITEM, array( 'type' => 'boolean' ) );
    register_setting( 'ffsystems', FFSYSTEMS_CUSTOM_DOMAIN_OPTION_NAME, array( 'type' => 'string' ) );

    // register settings fields
    add_settings_field( FFSYSTEMS_SITE_HASH_OPTION_NAME, __( 'Team Hash', 'ffsystems' ), 'ffSystemsPrintTeamHashSettingField', 'ffsystems', 'default' );
    add_settings_field( FFSYSTEMS_ADMIN_TRACKING_OPTION_NAME, __('Track Administrators', 'ffsystems'), 'ffSystemsPrintAdminTrackingSettingField', 'ffsystems', 'default');
    // add_settings_field( FFSYSTEMS_CUSTOM_DOMAIN_OPTION_NAME, __( 'Custom Domain', 'ffsystems' ), 'ffSystemsPrintCustomDomainSettingField', 'ffsystems', 'default' ); // Upcoming feature?
    add_settings_field( FFSYSTEMS_SHOW_ANALYTICS_MENU_ITEM,  __( 'Display Analytics Menu Item', 'ffsystems' ), 'ffSystemsPrintDisplayAnalyticsMenuSettingField', 'ffsystems', 'default' );
}

/**
 * @since 0.1
 */
function ffSystemsPrintSettingsPage() {
    echo '<div class="wrap">';
    echo sprintf( '<form method="POST" action="%s">', esc_attr( admin_url( 'options.php' ) ) );
    settings_fields( 'ffsystems' );
    do_settings_sections( 'ffsystems' );
    submit_button();
    echo '</form>';
    echo '</div>';
}

/**
 * @since 0.1
 */
function ffSystemsPrintDisplayAnalyticsMenuSettingField( $args = array() ) {
    $value = get_option( FFSYSTEMS_SHOW_ANALYTICS_MENU_ITEM );
    echo sprintf( '<input type="checkbox" name="%s" id="%s" class="regular-text" ' . (esc_attr($value) ? 'checked' : '') .' />', FFSYSTEMS_SHOW_ANALYTICS_MENU_ITEM, FFSYSTEMS_SHOW_ANALYTICS_MENU_ITEM);
    echo '<p class="description">' . __( 'Pro: Display the FFSystems Tab in the sidebar for easy access to your dashboard', 'ffsystems' ) . '</p>';
}

/**
 * @since 0.1
 */
function ffSystemsPrintCustomDomainSettingField( $args = array() ) {
    $value = get_option( FFSYSTEMS_CUSTOM_DOMAIN_OPTION_NAME );
    $placeholder = 'https://cname.yourwebsite.com';
    echo sprintf( '<input type="text" name="%s" id="%s" class="regular-text" value="%s" placeholder="%s" />', FFSYSTEMS_CUSTOM_DOMAIN_OPTION_NAME, FFSYSTEMS_CUSTOM_DOMAIN_OPTION_NAME, esc_attr( $value ), esc_attr( $placeholder ) );
    echo '<p class="description">' . __( 'Optional. Do not put anything in here unless you have a custom domain', 'ffsystems' ) . '</p>';
}

/**
 * @since 0.1
 */
function ffSystemsPrintTeamHashSettingField($args = []) {
    $value = get_option( FFSYSTEMS_SITE_HASH_OPTION_NAME );
    $placeholder = 'ABCDEF';
    echo sprintf( '<input type="text" name="%s" id="%s" class="regular-text" value="%s" placeholder="%s" />', FFSYSTEMS_SITE_HASH_OPTION_NAME, FFSYSTEMS_SITE_HASH_OPTION_NAME, esc_attr( $value ), esc_attr( $placeholder ) );

    //todo
    echo '<p class="description">' . __( 'This is the <a href="https://ffsystems.nl/support/wordpress#unique-team-hash" target="_blank">unique Team Hash</a> for your site', 'ffsystems' ) . '</p>';
}

/**
 * @since 0.1
 */
function ffSystemsPrintAdminTrackingSettingField($args = []) {
    $value = get_option( FFSYSTEMS_ADMIN_TRACKING_OPTION_NAME );
    echo sprintf( '<input type="checkbox" name="%s" id="%s" value="1" %s />', FFSYSTEMS_ADMIN_TRACKING_OPTION_NAME, FFSYSTEMS_ADMIN_TRACKING_OPTION_NAME, checked( 1, $value, false ) );
    echo '<p class="description">' . __( 'Check if you want to show the widget to administrators', 'ffsystems' ) . '</p>';
}

add_action('wp_head', 'ffSystemsPrintJsSnippet', 50);

if(is_admin() && ! wp_doing_ajax()) {
    add_action('admin_menu', 'ffSystemsRegisterSettings');
}

if (get_option(FFSYSTEMS_SHOW_ANALYTICS_MENU_ITEM)) {
    add_action('admin_menu', 'ffSystemsStatsPage');
}
