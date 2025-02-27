<?php

/**
* Trigger this file on Plugin uninstall
*
* @package SeersCookieConsentBannerPrivacyPolicyPlugin
*/

if ( ! defined('WP_UNINSTALL_PLUGIN')) {
	die;
}

//clear Database stored Data



//Access the database via SQL
global $wpdb;
$prefix = $wpdb->prefix;
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_id'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_msg'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_url'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_email'");
/*** Code added on 10-06-2012 ********/
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_policy_declaration_url'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_enable_policy'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_is_active'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_cookies_expiry'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_lang'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_show_badge'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_agree_btn_color'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_disagree_btn_color'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_preferences_btn_color'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_banner_bg_color'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_body_text_color'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_agree_text_color'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_disagree_text_color'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_preferences_text_color'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_body_text'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_accept_btn_text'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_reject_btn_text'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_setting_btn_text'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_font_style'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_font_size'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_button_type'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_userplan'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_bannerid_1'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_bannerid_2'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_cdnscripturl'");
//new options removing
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_child_privacy'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_do_not_track'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_global_privacy_control'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_do_not_sell'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_iab_tcf'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_google_consent'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_facebook_consent'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_logo_status'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_auto_block_vendor'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_defaultsettings'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_banner_position'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_existing_msgtype'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_existing_msg'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name LIKE 'SCCBPP_cookie_userid_%'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SSCCBPP_cookie_access_token'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_existing_show_popup'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_show_popup'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_showloginpopup'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_resumeloginpro'");
$wpdb->query("DELETE FROM ".$prefix."options WHERE option_name = 'SCCBPP_cookie_consent_wporseersbanner'");
