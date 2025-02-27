<?php
/**Static Class runs and clear rules when Plugin is activated
*
* @package SeersCookieConsentBannerPrivacyPolicyPlugin
* Plugin Name: Seers Cookie Consent Banner Privacy Policy GDPR CCPA
* Description: Seers cookie consent management platform is trusted by thousands of businesses. Become GDPR, CCPA, ePrivacy and LGPD compliant in three clicks.
**/

class SeersCookieConsentPluginActivate {
	public static function activate() {
		flush_rewrite_rules();
                //by Shoaib Jilani send email the cureent site url
                //echo "<br> ----- Activated.... ----- <br>";
                //$to = 'jinbahoo@gmail.com';
                $current_user = wp_get_current_user();
                $username     = $current_user->display_name;
                $useremail    = $current_user->user_email;
                $to = 'plugins.support@seersco.com';
                $subject = 'Seers Cookie Consent Banner Privacy Policy - Activated';
                $body = 'Hi Admin, <div>This plugin is activated on site ' . get_site_url() . "</div><div>Regards, <br>Seers Development Team</div>";
                $headers = array('Content-Type: text/html; charset=UTF-8','From: Seers Plugin Support <plugins.support@seersco.com>');

                wp_mail( $to, $subject, $body, $headers );
                
                $plugin_data = get_plugin_data( dirname(__FILE__) . '/../seers-cookie-consent-banner-privacy-policy.php' );
                $theplugin_name = $plugin_data['Name'] . " - v" . $plugin_data['Version'];
                //on activate plugin update in db
                $cookie_consent_url = get_option('SCCBPP_cookie_consent_url');
                $postData = array(
                    'domain' => get_site_url(),
                    'isactive' => 1,
                    'platform' => 'wordpress',
                    'pluginname' => $theplugin_name
                );
                $request_headers = array(
                    'Content-Type' => 'application/json',
                    'Referer' => get_site_url(),
                );
                
                $url = "https://cmp.seersco.com/api/v2/plugin-domain";
                $postdata = json_encode($postData);

                $result = wp_remote_post( $url, array(
                        'method' => 'POST',
                        'redirection' => 5,
                        'httpversion' => '1.0',
                        'timeout'     => 45,
                        'sslverify' => false,
                        'headers' => $request_headers,
                        'body' => $postdata,
                        'cookies' => array()
                    )
                );
                
                $seersCookieConsentPlugin = new SCCBPP_WpCookie_Save();
                $seersCookieConsentPlugin->SCCBPP_remove_languages("removepos");
	}
}
