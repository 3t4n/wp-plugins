<?php

/**
 * Main File
 *
 * @package SeersCookieConsentBannerPrivacyPolicyPlugin
 */

/*
* Plugin Name: Seers Cookie Consent Banner Privacy Policy
* Plugin URI: https://seersco.com/plugins/wordpress-plugin-installation-of-seers-cookie-consent/
* Description: Seers cookie consent management platform is trusted by thousands of businesses. Become GDPR, CCPA, ePrivacy and LGPD compliant in three clicks.
* Version: 9.1.0
* Author: Seers
* Author URI: https://seersco.com/
* Text Domain: Seers-Cookie-Consent-Banner-Privacy-Policy
* Domain Path: /Languages
* License: GPLv3 or later
* License URI: https://www.gnu.org/licenses/gpl-3.0.html
**/

/*
Copyright (C) 2020  Seers Group

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

defined('ABSPATH') || die('Sorry you cant access');


if (!class_exists('SCCBPP_WpCookie_Save')) {
    class SCCBPP_WpCookie_Save
    {

        public $plugin;
        public $cookiename = 'SeersCMPConsent';
        public $textdomain = 'seers-cookie-consent-banner-privacy-policy';
        public $apibaseurl = 'https://cmp.seersco.com/api/v2/';
        public $defaultfontsize = 12;
        public $wpcurversion = 0;

        public function __construct()
        {
            $this->wpcurversion = get_bloginfo( 'version' );
            $this->plugin = plugin_basename(__FILE__);
        }


        public function register()
        {

            add_action('admin_menu', array($this, 'SCCBPP_page_admin_actions'), 30);
            add_filter("plugin_action_links_$this->plugin", array($this, 'seers_premium_upgrade_link'));
            add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
            add_action('wp_head', array($this, 'SCCBPP_theme_name_scripts'), -1000);
            //by Shoaib Jilani
            add_action('wp_footer', array($this, 'SCCBPP_theme_userinterface'), 1);
            add_action('admin_notices', array($this, 'seers_author_admin_notice'));
            add_action( 'wp_enqueue_scripts', array($this,'seers_adding_styles'));
            add_action( 'admin_enqueue_scripts', array($this,'seers_admin_adding_styles'));
            //by Shoaib Jilani every time when user get logged in then update his plan by getting the latest plan from API
            add_action('wp_login', array($this, 'SCCBPP_get_userplan'), 10, 2);
            add_action('pre_update_option_WPLANG', array($this, 'SCCBPP_wplang_preupdate'), 10, 2);
            add_action('admin_init', array($this, 'SCCBPP_upgrade_completed'), 10);
            add_filter( 'auto_update_translation', '__return_false' );
            add_filter( 'async_update_translation', array($this, 'SCCBPP_async_langupdate'), 10, 2 );

            add_action('wp_ajax_cookies_setting', array($this,'cookies_setting'));

            add_action('wp_ajax_cookies_policy', array($this,'cookies_policy'));

            add_action('wp_ajax_savecookie', array($this,'save_cookie'));
            add_action('wp_ajax_nopriv_savecookie', array($this,'save_cookie'));
            
            add_action('wp_ajax_login_api', array($this,'user_login'));
            add_action('wp_ajax_nopriv_login_api', array($this,'user_login'));

        }

        function seers_adding_styles() {
            wp_register_style('cookie-style', plugins_url('/css/cookie-style.css', __FILE__));
            wp_enqueue_style('cookie-style');
            wp_register_style('popup', plugins_url('/css/popup.css', __FILE__));
            wp_enqueue_style('popup');
        }
        
        function seers_admin_adding_styles() {
            wp_register_style('SCCBPP_dashicons', plugins_url( '/css/seers-plugin-font-icons.css', __FILE__ ));
            wp_enqueue_style('SCCBPP_dashicons');
        }

        function seers_author_admin_notice()
        {
            global $pagenow;
            if ($pagenow == 'plugins.php' && get_option('SCCBPP_cookie_consent_id') == '') {
                echo '<div class="notice notice-info is-dismissible" style=" padding: 15px 45px 15px 15px; display: -webkit-flex;  display: -moz-flex;  display: -ms-flex;
	display: -o-flex; display: flex; justify-content: flex-end; -ms-align-items: center;  align-items: center;  background:url(' . plugin_dir_url(dirname(__FILE__)) . 'seers-cookie-consent-banner-privacy-policy/images/icon.gif), linear-gradient( rgba(239, 250, 239, 0.4), rgba(239, 250, 239, 0.4)); background-position: left; background-repeat: no-repeat; background-position-x: 15px; background-size: contain;  border-radius: 7px;">
							<div class="inf-hol" style=" display: -webkit-flex; display: -moz-flex; display: -ms-flex; display: -o-flex;  display: flex; -ms-align-items: center;
	align-items: center; justify-content: space-between; width: 94%;">
								<p>To customize Seers cookie banner on your website, go to <b>Settings</b>.</p>
								<a href="admin.php?page=SCCBPP-cookie-consent" class="btn btn-blue-bg" style=" width: max-content;
			position: relative;
			background: #3B6EF8;
			text-decoration: none;
			color: #fff;
			display: inline-block;
			vertical-align: middle;
			-webkit-transform: translateZ(0);
			transform: translateZ(0);
			border: 1px solid transparent;
			-webkit-backface-visibility: hidden;
			backface-visibility: hidden;
			-moz-osx-font-smoothing: grayscale;
			position: relative;
			-webkit-transition-property: color;
			transition-property: color;
			-webkit-transition-duration: 0.3s;
			transition-duration: 0.3s;
			white-space: nowrap;
			font: 500 12px/1.6 \'Poppins\', sans-serif;
			padding: 7px 21px;
			border-radius: 4px;
			outline: none;
			margin: 0 0 0 15px;
			text-transform: capitalize;
			transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">Settings</a>
							</div>
						  
						</div>';
            }
        }

        public function settings_link($links)
        {
            $settings_link = array('<a href="admin.php?page=SCCBPP-cookie-consent">' . __('Settings', $this->textdomain) . '</a>');
            return array_merge($settings_link, $links);
        }

        public function seers_premium_upgrade_link($links)
        {
            $seers_premium_upgrade_link = array('<a href="https://seersco.com/price-plan" target="_blank"><b>' . __('Upgrade Premium', $this->textdomain) . '</b></a>');
            return array_merge($seers_premium_upgrade_link, $links);
        }

        public function SCCBPP_admin()
        {
            
            //check if we have to show login popup
            if (get_option('SCCBPP_cookie_consent_showloginpopup') === 'show') {
                delete_option( 'SCCBPP_cookie_consent_showloginpopup' );
                $showloginpopup = 'yes';
            } else {
                
                $cookie_consent_url = "";
                $cookie_consent_email = "";
                // this parameter will have tow values 
                // 1- keepcurrent - current follow will keep working that all banners settings from seersco.com is adding to wp plugin banner
                // 2- popupconsent - ask to user wheather to keep wp settings or seersco settings
                $processtype = 'keepcurrent';
                $getseersbanner = false;
                $keepwpbanner = true;
                $wpbannerisdefault = get_option('SCCBPP_cookie_consent_defaultsettings', 'default');
                $alreadyexistinseers = 'no';
                $showloginpopup = 'no';
                $accesstoken = get_option( 'SCCBPP_cookie_access_token' );
                $currenttab = "";


                //if accesstoken is not empty then see if we have to resume login activities 
                if ($accesstoken && get_option( 'SCCBPP_cookie_consent_resumeloginpro' ) === 'show') {
                    delete_option( 'SCCBPP_cookie_consent_resumeloginpro' );
                    $this->SCCBPP_get_userplan();
                }

                if (isset($_POST['SCCBPP_cookie_consent_url'])) {
                    $cookie_consent_url = get_site_url();
                }
                if (isset($_POST['SCCBPP_cookie_consent_email'])) {
                    $cookie_consent_email = sanitize_email($_POST['SCCBPP_cookie_consent_email']);
                } else {

                    if(get_option('SCCBPP_cookie_consent_msgtype') === 'error')
                        update_option( 'SCCBPP_cookie_consent_msg', "" );
                }

                // if you is existing client and he want to copied the key on form
                if (isset($_POST['SCCBPP_save_cookieid'])) {
                    $cursiteurl = get_site_url();
                    if(get_option('SCCBPP_cookie_consent_url')!=''){
                        $cursiteurl = get_option('SCCBPP_cookie_consent_url');
                    }

                    $admin_Email = get_option('admin_email');
                    if(get_option('SCCBPP_cookie_consent_email')!=''){
                        $admin_Email = get_option('SCCBPP_cookie_consent_email');
                    }

                    $savedpassword = get_option( 'SCCBPP_cookie_userid_' . get_current_user_id() . '_pass');

                    if(!$accesstoken) {
                        if ($savedpassword) {$savedpassword = "";}
                        $loginresponse = $this->loginFromSeers($admin_Email, $savedpassword);

                        if (!empty($loginresponse->access_token)) {
                            //echo $loginresponse->access_token;
                            $alreadyexistinseers = 'yes';
                            $showloginpopup = 'no';
                            update_option( 'SCCBPP_cookie_access_token', $loginresponse->access_token );
                            $accesstoken = $loginresponse->access_token;
                        } else if (!empty($loginresponse->message)) {

                            if (stripos($loginresponse->message, "Ask for password") !== false || empty($savedpassword)) {
                                $passfilterurl = $this->removeProtocol($cursiteurl);
                                $loginresponse = $this->loginFromSeers($admin_Email, $passfilterurl);

                                if (!empty($loginresponse->access_token)) {
                                    //echo $loginresponse->access_token;
                                    $alreadyexistinseers = 'yes';
                                    $showloginpopup = 'no';
                                    update_option( 'SCCBPP_cookie_access_token', $loginresponse->access_token );
                                    $accesstoken = $loginresponse->access_token;
                                } else if (!empty($loginresponse->message)) {

                                    if (stripos($loginresponse->message, "Ask for password") !== false) {
                                        $showloginpopup = 'yes';
                                        $alreadyexistinseers = 'yes';
                                    } else {
                                        $showloginpopup = 'no';
                                        $alreadyexistinseers = 'no';
                                    }


                                }
                            } else {
                                $showloginpopup = 'no';
                                $alreadyexistinseers = 'no';
                            }


                        }
                    }


                    $response = $this->user_key_exists();

                    $currenttab = "already_existing";

                    if ($response && gettype($response) === 'string') {
                        $response = json_decode($response);
                    }

                    if (!empty($response->message) && stripos($response->message, "Unauthenticated") !== false) {
                        $showloginpopup = 'yes';
                    } else {

                        $keyentered = filter_var($_POST['SCCBPP_cookie_consent_already_id'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

                        update_option( 'SCCBPP_cookie_consent_existing_msg', $response->already_message );
                        // these following words can be in the already_message must having
                        __("Cannot find domain with this key.", $this->textdomain);
                        __("Secret does not match", $this->textdomain);
                        __("Current domain not added for this Cookie ID.", $this->textdomain);
                        __("Key is wrong.", $this->textdomain);
                        __("Key is correct for current domain.", $this->textdomain);
                        update_option('SCCBPP_cookie_consent_existing_show_popup', true);
                        update_option('SCCBPP_cookie_consent_existing_msgtype', 'error');
                        if (!$response->iserror) {
                            update_option('SCCBPP_cookie_consent_existing_msgtype', 'success');
                            //now customer have provided the correct key for current domain
                            update_option('SCCBPP_cookie_consent_id', $keyentered);
                            update_option('SCCBPP_cookie_consent_url', $cursiteurl);
                            $cookie_consent_code = $keyentered;
                            $cookie_consent_url = get_site_url();

                            if (!empty($response->useremail))
                            $cookie_consent_email = $response->useremail;
                        } else {
                            update_option( 'SCCBPP_cookie_consent_existing_msg', $response->errors->key[0] );
                        }
                    }

                } else if ( $cookie_consent_url != '' && $cookie_consent_email != '' ) {
                    
                    $currenttab = "create_account";

                    if(get_option('SCCBPP_cookie_consent_existing_msgtype') === 'error')
                        update_option( 'SCCBPP_cookie_consent_existing_msg', "" );
                }


                $do_save_domain = true;
                if (($cookie_consent_url != '') && ($cookie_consent_email != '')) {

                    global $wpdb;
                    $prefix = $wpdb->prefix;
                    $update_cookie_consent_code = sanitize_text_field($_POST['SCCBPP_cookie_consent_id']);
                    if (!empty($update_cookie_consent_code) && $cookie_consent_email == get_option('SCCBPP_cookie_consent_email') && $cookie_consent_url == get_option('SCCBPP_cookie_consent_url') ) {

                        $alreadyKey = get_option('SCCBPP_cookie_consent_id');

                        if ($alreadyKey !== false) {
                            if (get_option("SCCBPP_cookie_consent_savedomain") !== 'do')
                                $do_save_domain = false;
                            
                            update_option('SCCBPP_cookie_consent_id', $update_cookie_consent_code);
                        }
                    }
                    
                    //first check if user is already exists on seersco.com
                    $filterurl = $this->removeProtocol($cookie_consent_url);
                    $loginresponse = $this->loginFromSeers($cookie_consent_email, $filterurl);
                    // if accesstoken is in response
                    if (!empty($loginresponse->access_token)) {
                        //echo $loginresponse->access_token;
                        $alreadyexistinseers = 'yes';
                        $showloginpopup = 'no';
                        update_option( 'SCCBPP_cookie_access_token', $loginresponse->access_token );
                        $accesstoken = $loginresponse->access_token;
                    } else if (!empty($loginresponse->message)) {
                        //echo $loginresponse->message;
                        if (stripos($loginresponse->message, "Ask for password") !== false) {
                            // now check if we have already some password saved
                            $savedpassword = get_option( 'SCCBPP_cookie_userid_' . get_current_user_id() . '_pass');

                            if ($savedpassword) {
                                $loginresponse = $this->loginFromSeers($cookie_consent_email, $savedpassword);

                                if (!empty($loginresponse->access_token)) {
                                    //echo $loginresponse->access_token;
                                    $alreadyexistinseers = 'yes';
                                    $showloginpopup = 'no';
                                    update_option( 'SCCBPP_cookie_access_token', $loginresponse->access_token );
                                    $accesstoken = $loginresponse->access_token;
                                } else if (!empty($loginresponse->message)) {

                                    if (stripos($loginresponse->message, "Ask for password") !== false) {
                                        $showloginpopup = 'yes';
                                        $alreadyexistinseers = 'yes';
                                    } else {
                                        $showloginpopup = 'no';
                                        $alreadyexistinseers = 'no';
                                    }


                                }

                            } else {

                                $showloginpopup = 'yes';
                                $alreadyexistinseers = 'yes';
                            }


                        } else {
                            $showloginpopup = 'no';
                            $alreadyexistinseers = 'no';
                        }


                    }
                    

                    if ($do_save_domain) {



                        if(strcmp($showloginpopup, 'no') === 0) {

                            $accesstoken = get_option( 'SCCBPP_cookie_access_token' );

                            $postData = array(
                                'domain' => $cookie_consent_url,
                                'email' => $cookie_consent_email,
                                'platform' => 'wordpress',
                                'allowcustomize' => 'y',
                                'lang' => ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale()),
                            );

                            $request_headers = array(
                                'Content-Type' => 'application/json',
                                'Accept' => 'application/json',
                                'Referer' => $cookie_consent_url
                            );

                            if ($accesstoken && $alreadyexistinseers == "yes") {
                                $request_headers = array(
                                    'Content-Type' => 'application/json',
                                    'Accept' => 'application/json',
                                    'Referer' => $cookie_consent_url,
                                    'Authorization' => 'Bearer ' . $accesstoken
                                );
                            }

                            $url = $this->apibaseurl . "save-domain-credentials";
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

                            /*echo "<br> ---111---- <br>";
                            print_r($request_headers);
                            echo "<br> ---222---- <br>";
                            print_r($result['body']);
                            if ( is_wp_error( $result ) ) {
                                echo "<br> ----------------- <br>";
                                echo $result->get_error_message();
                                echo "<br> === Error on result.... <br>";
                            }
                            echo "<br> ------ <br>";
                            print_r($result);
                            exit();*/

                            if ( !is_wp_error( $result ) ) {

                                $keyResponse = json_decode($result['body']);

                                //now first check if user is newly created or it is old user

                                if (!empty($keyResponse->message)) {
                                    //$message = $result['response']['message'];
                                    $message = $keyResponse->message;

                                    update_option('SCCBPP_cookie_consent_msg', $message);

                                    if(!get_option("SCCBPP_cookie_consent_existing_show_popup")) {
                                        update_option("SCCBPP_cookie_consent_show_popup", true);
                                        update_option('SCCBPP_cookie_consent_existing_msgtype', '');
                                        update_option('SCCBPP_cookie_consent_msgtype', 'error');
                                    } else {
                                        update_option("SCCBPP_cookie_consent_show_popup", false);
                                    }

                                }
                                
                                if (!empty($keyResponse->message) && stripos($keyResponse->message, "Unauthenticated") !== false) {
                                    $showloginpopup = 'yes';
                                } else {
                                    if (!empty($result['response']['message']) && strtolower($result['response']['message']) != 'ok') {
                                        //now there is error message now update the email and cookie_consent_id
                                        update_option('SCCBPP_cookie_consent_id', '');
                                        update_option('SCCBPP_cookie_consent_email', $cookie_consent_email);
                                        update_option('SCCBPP_cookie_consent_url', $cookie_consent_url);
                                        update_option( 'SCCBPP_cookie_consent_userplan', "" );
                                    }
                                    if (!empty($keyResponse->key)) {
                                        $cookie_consent_code = $keyResponse->key;
                                        
                                        if ( !empty($keyResponse->access_token) ) {
                                            $accesstoken = $keyResponse->access_token;
                                        }
                                        
                                        $alreadyKey = get_option('SCCBPP_cookie_consent_id');
                                        //by Shoaib if userplan then save it in db options
                                        //This user_plan element only handle in newer versions of this plugin
                                        if (!empty($keyResponse->user_plan)) {
                                            update_option( 'SCCBPP_cookie_consent_userplan', $keyResponse->user_plan );
                                        }

                                        if (!empty($keyResponse->user_id)) {
                                            update_option( 'SCCBPP_cookie_consent_bannerid_1', ((!empty($keyResponse->user_id)) ? intval($keyResponse->user_id) : '' ) );
                                        } else {
                                            update_option( 'SCCBPP_cookie_consent_bannerid_1', "" );
                                        }

                                        if (!empty($keyResponse->domain_id)) {
                                            update_option( 'SCCBPP_cookie_consent_bannerid_2', ((!empty($keyResponse->domain_id)) ? intval($keyResponse->domain_id) : '' ) );
                                        } else {
                                            update_option( 'SCCBPP_cookie_consent_bannerid_2', "" );
                                        }
                                        
                                        if (!empty($keyResponse->cdnbaseurl)) {
                                            update_option( 'SCCBPP_cookie_consent_cdnscripturl', ((!empty($keyResponse->cdnbaseurl)) ? intval($keyResponse->cdnbaseurl) : '' ) );
                                        } else {
                                            update_option( 'SCCBPP_cookie_consent_cdnscripturl', "" );
                                        }


                                        if ($alreadyKey !== false) {

                                            update_option( 'SCCBPP_cookie_consent_msg', "" );
                                            update_option('SCCBPP_cookie_consent_msgtype', "");

                                            update_option( 'SCCBPP_cookie_consent_id', $cookie_consent_code );
                                            /*$query1 = $wpdb->prepare("Update " . $prefix . "options SET option_value = '$cookie_consent_code' where option_name = 'SCCBPP_cookie_consent_id'");
                                            $wpdb->query($query1);*/
                                            $install_lang = ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale());
                                            update_option( 'SCCBPP_cookie_consent_lang', $install_lang );
                                        } else {

                                            update_option( 'SCCBPP_cookie_consent_msg', "" );
                                            update_option('SCCBPP_cookie_consent_msgtype', "");

                                            update_option( 'SCCBPP_cookie_consent_id', $cookie_consent_code );
                                            update_option( 'SCCBPP_cookie_consent_lang', ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale()) );
                                        }

                                        //by Shoaib check if there is already some setting saved then call another API to save setting in paid condition
                                        // first also check if there is any settings already doneon seersco.com account also sync those changes with wordpress.
                                        if ($cookie_consent_code) {

                                            if (($cookie_consent_url != '') && ($cookie_consent_email != '')) {
                                                
                                                if (!$accesstoken || $alreadyexistinseers == 'no') {
                                                    
                                                    $filterurl = $this->removeProtocol($cookie_consent_url);
                                                    $loginresponse = $this->loginFromSeers($cookie_consent_email, $filterurl);
                                                    // if accesstoken is in response
                                                    if (!empty($loginresponse->access_token)) {
                                                        update_option( 'SCCBPP_cookie_access_token', $loginresponse->access_token );
                                                        $accesstoken = $loginresponse->access_token;
                                                    }
                                                    
                                                }

                                                $postData = array(
                                                    'domain' => $cookie_consent_url,
                                                    'email' => $cookie_consent_email,
                                                    'platform' => 'wordpress',
                                                    'lang' => ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale())
                                                );

                                                // for localhost testing
                                                /*$postData = array(
                                                    'domain' => $cookie_consent_url,
                                                    'email' => "umar.malik@seersco.com",
                                                    'secret' => $this->apisecrekkey,
                                                    'platform' => 'wordpress'
                                                );*/

                                                $request_headers = array(
                                                    'Content-Type' => 'application/json',
                                                    'Accept' => 'application/json',
                                                    'Referer' => $cookie_consent_url
                                                );

                                                if ($accesstoken) {
                                                    $request_headers = array(
                                                        'Content-Type' => 'application/json',
                                                        'Accept' => 'application/json',
                                                        'Referer' => $cookie_consent_url,
                                                        'Authorization' => 'Bearer ' . $accesstoken
                                                    );
                                                }

                                                $url = $this->apibaseurl . "get-banner-settings";
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


                                                if ( !is_wp_error( $result ) ) {
                                                    $response = json_decode($result['body']);

                                                    if ( !empty($response->bannersettings) ) {
                                                        $seerscosettings = $response->bannersettings;
                                                        $seerscosettingsbanner = $response->bannersettingsbanners;

                                                        //check scenarios do get settings from seers of keep wp or to show a popup to current user
                                                        if (get_option('SCCBPP_cookie_consent_defaultsettings') === 'changed' && $alreadyexistinseers === 'yes' && !empty($response->platform) && $response->platform === "custom" ) {
                                                            $processtype = 'popupconsent';
                                                            update_option('SCCBPP_cookie_consent_wporseersbanner', 'popupconsent');
                                                            $getseersbanner = false;
                                                            $keepwpbanner = false;
                                                        } else if (get_option('SCCBPP_cookie_consent_defaultsettings') !== 'changed' && $alreadyexistinseers === 'no') {
                                                            $processtype = 'keepwpbanner';
                                                            $getseersbanner = false;
                                                            $keepwpbanner = true;
                                                        } else if (get_option('SCCBPP_cookie_consent_defaultsettings') !== 'changed' &&  $alreadyexistinseers === 'yes') {
                                                            $processtype = 'keepseesbanner';
                                                            $getseersbanner = true;
                                                            $keepwpbanner = false;
                                                        }
                                                        
                                                        global $wpdb;
                                                        $prefix = $wpdb->prefix;
                                                        $result ='';

                                                        if ($getseersbanner) {
                                                            
                                                            update_option( 'SCCBPP_cookie_consent_is_active', (($seerscosettings && !empty($seerscosettings->is_active)) ? $seerscosettings->is_active : get_option("SCCBPP_cookie_consent_is_active", 1) ) );
                                                            update_option( 'SCCBPP_cookie_consent_cookies_expiry', (($seerscosettings && isset($seerscosettings->agreement_expire)) ? $seerscosettings->agreement_expire : get_option("SCCBPP_cookie_consent_cookies_expiry", 0) ) );
                                                            update_option( 'SCCBPP_cookie_consent_lang', ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale()) );
                                                            update_option( 'SCCBPP_cookie_consent_show_badge', (($seerscosettings && isset($seerscosettings->has_badge)) ? (($seerscosettings->has_badge) ? 'true' : 'false' ) : ((get_option("SCCBPP_cookie_consent_show_badge", "")) ? 'true' : 'false' ) ) );
                                                            update_option( 'SCCBPP_cookie_consent_agree_btn_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->agree_btn_color)) ? trim($seerscosettingsbanner->agree_btn_color) : get_option("SCCBPP_cookie_consent_agree_btn_color", "#3B6EF8") ) );
                                                            update_option( 'SCCBPP_cookie_consent_disagree_btn_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->disagree_btn_color)) ? trim($seerscosettingsbanner->disagree_btn_color) : get_option("SCCBPP_cookie_consent_disagree_btn_color", '#3B6EF8') ) );
                                                            update_option( 'SCCBPP_cookie_consent_preferences_btn_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->preferences_btn_color)) ? trim($seerscosettingsbanner->preferences_btn_color) : get_option("SCCBPP_cookie_consent_preferences_btn_color", '#FFFFFF') ) );
                                                            update_option( 'SCCBPP_cookie_consent_banner_bg_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->banner_bg_color)) ? trim($seerscosettingsbanner->banner_bg_color) : get_option("SCCBPP_cookie_consent_banner_bg_color", '#FFFFFF') ) );
                                                            update_option( 'SCCBPP_cookie_consent_body_text_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->body_text_color)) ? trim($seerscosettingsbanner->body_text_color) : get_option("SCCBPP_cookie_consent_body_text_color", '#000000') ) );
                                                            update_option( 'SCCBPP_cookie_consent_agree_text_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->agree_text_color)) ? trim($seerscosettingsbanner->agree_text_color) : get_option("SCCBPP_cookie_consent_agree_text_color", '#FFFFFF') ) );
                                                            update_option( 'SCCBPP_cookie_consent_disagree_text_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->disagree_text_color)) ? trim($seerscosettingsbanner->disagree_text_color) : get_option("SCCBPP_cookie_consent_disagree_text_color", '#FFFFFF') ) );
                                                            update_option( 'SCCBPP_cookie_consent_preferences_text_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->preferences_text_color)) ? trim($seerscosettingsbanner->preferences_text_color) : get_option("SCCBPP_cookie_consent_preferences_text_color", '#000000') ) );
                                                            update_option( 'SCCBPP_cookie_consent_body_text', (($seerscosettings && !empty($seerscosettings->body)) ? $seerscosettings->body : get_option("SCCBPP_cookie_consent_body_text", '') ) );
                                                            update_option( 'SCCBPP_cookie_consent_accept_btn_text', (($seerscosettings && !empty($seerscosettings->btn_agree_title)) ? $seerscosettings->btn_agree_title : get_option("SCCBPP_cookie_consent_accept_btn_text", '') ) );
                                                            update_option( 'SCCBPP_cookie_consent_reject_btn_text', (($seerscosettings && !empty($seerscosettings->btn_disagree_title)) ? $seerscosettings->btn_disagree_title : get_option("SCCBPP_cookie_consent_reject_btn_text", '') ) );
                                                            update_option( 'SCCBPP_cookie_consent_setting_btn_text', (($seerscosettings && !empty($seerscosettings->btn_preference_title)) ? $seerscosettings->btn_preference_title : get_option("SCCBPP_cookie_consent_setting_btn_text", '') ) );
                                                            update_option( 'SCCBPP_cookie_consent_font_style', (($seerscosettingsbanner && !empty($seerscosettingsbanner->font_style)) ? $seerscosettingsbanner->font_style : get_option("SCCBPP_cookie_consent_font_style", '') ) );
                                                            update_option( 'SCCBPP_cookie_consent_font_size', (($seerscosettingsbanner && !empty($seerscosettingsbanner->font_size)) ? $seerscosettingsbanner->font_size : get_option("SCCBPP_cookie_consent_font_size", '') ) );
                                                            update_option( 'SCCBPP_cookie_consent_button_type', (($seerscosettingsbanner && !empty($seerscosettingsbanner->button_type)) ? $seerscosettingsbanner->button_type : get_option("SCCBPP_cookie_consent_button_type", '') ) );

                                                            // new changes on phase 2 advance features
                                                            update_option( 'SCCBPP_cookie_consent_child_privacy', (($seerscosettings && !empty($seerscosettings->child_privacy)) ? (($seerscosettings->child_privacy) ? 'true' : 'false' ) : get_option("SCCBPP_cookie_consent_child_privacy", 'false') ) );
                                                            update_option( 'SCCBPP_do_not_track', (($seerscosettings && !empty($seerscosettings->do_not_track)) ? (($seerscosettings->do_not_track) ? 'true' : 'false' ) : get_option("SCCBPP_do_not_track", 'false') ) );
                                                            update_option( 'SCCBPP_cookie_consent_iab_tcf', (($seerscosettings && !empty($seerscosettings->iab_tcf)) ? (($seerscosettings->iab_tcf) ? 'true' : 'false' ) : get_option("cookie_consent_iab_tcf", 'false') ) );
                                                            update_option( 'SCCBPP_cookie_consent_do_not_sell', (($seerscosettings && !empty($seerscosettings->do_not_sell)) ? (($seerscosettings->do_not_sell) ? 'true' : 'false' ) : get_option("SCCBPP_cookie_consent_do_not_sell", 'false') ) );
                                                            update_option( 'SCCBPP_cookie_consent_global_privacy_control', (($seerscosettings && !empty($seerscosettings->global_privacy_control)) ? (($seerscosettings->global_privacy_control) ? 'true' : 'false' ) : get_option("SCCBPP_cookie_consent_global_privacy_control", 'false') ) );
                                                            update_option( 'SCCBPP_cookie_consent_google_consent', (($seerscosettings && !empty($seerscosettings->apply_google_consent)) ? (($seerscosettings->apply_google_consent) ? 'true' : 'false' ) : get_option("SCCBPP_cookie_consent_google_consent", 'false') ) );
                                                            update_option( 'SCCBPP_cookie_consent_facebook_consent', (($seerscosettings && !empty($seerscosettings->apply_facebook_consent)) ? (($seerscosettings->apply_facebook_consent) ? 'true' : 'false' ) : get_option("SCCBPP_cookie_consent_facebook_consent", 'false') ) );
                                                            update_option( 'SCCBPP_cookie_consent_logo_status', (($seerscosettings && !empty($seerscosettings->logo_status)) ? $seerscosettings->logo_status : get_option("SCCBPP_cookie_consent_logo_status", 'seers') ) );
                                                            update_option( 'SCCBPP_cookie_consent_auto_block_vendor', (($seerscosettings && !empty($seerscosettings->auto_block_vendor)) ? (($seerscosettings->auto_block_vendor) ? 'true' : 'false' ) : get_option("SCCBPP_cookie_consent_auto_block_vendor", 'false') ) );
                                                            update_option( 'SCCBPP_cookie_consent_banner_position', (($seerscosettingsbanner && !empty($seerscosettingsbanner->position) && $seerscosettingsbanner->is_active > 0) ? $seerscosettingsbanner->position : (($seerscosettings && $seerscosettingsbanner->is_active === 0) ? "google_banner" : get_option("SCCBPP_cookie_consent_banner_position", 'seers-cmp-banner-bar') )  ) );

                                                            update_option('SCCBPP_cookie_consent_enable_policy', (($seerscosettings && !empty($seerscosettings->cookie_policy_url)) ? "true" : get_option("SCCBPP_cookie_consent_enable_policy", "") ));
                                                            update_option('SCCBPP_cookie_consent_policy_declaration_url', (($seerscosettings && !empty($seerscosettings->cookie_policy_url)) ? $seerscosettings->cookie_policy_url : get_option("SCCBPP_cookie_consent_policy_declaration_url", "") ));
                                                            
                                                            
                                                            $privacyenabled = get_option('SCCBPP_cookie_consent_enable_policy');

                                                            $postData = array(
                                                                'domain' => $cookie_consent_url,
                                                                'email' => $cookie_consent_email,
                                                                'platform' => 'wordpress',

                                                                'agree_btn_color'=> ((!empty($seerscosettingsbanner) && !empty($seerscosettingsbanner->agree_btn_color)) ? trim($seerscosettingsbanner->agree_btn_color) : get_option('SCCBPP_cookie_consent_agree_btn_color', '#3B6EF8' )),
                                                                'disagree_btn_color'=> ((!empty($seerscosettingsbanner) && !empty($seerscosettingsbanner->disagree_btn_color)) ? trim($seerscosettingsbanner->disagree_btn_color) : get_option('SCCBPP_cookie_consent_disagree_btn_color', '#3B6EF8' )),
                                                                'preferences_btn_color'=> ((!empty($seerscosettingsbanner) && !empty($seerscosettingsbanner->preferences_btn_color)) ? trim($seerscosettingsbanner->preferences_btn_color) : get_option('SCCBPP_cookie_consent_preferences_btn_color', '#FFFFFF' )),
                                                                'banner_bg_color'=> ((!empty($seerscosettingsbanner) && !empty($seerscosettingsbanner->banner_bg_color)) ? trim($seerscosettingsbanner->banner_bg_color) : get_option('SCCBPP_cookie_consent_banner_bg_color', '#FFFFFF' )),

                                                                'body_text_color'=> ((!empty($seerscosettingsbanner) && !empty($seerscosettingsbanner->body_text_color)) ? trim($seerscosettingsbanner->body_text_color) : get_option('SCCBPP_cookie_consent_body_text_color', '#000000' )),
                                                                'agree_text_color'=> ((!empty($seerscosettingsbanner) && !empty($seerscosettingsbanner->agree_text_color)) ? trim($seerscosettingsbanner->agree_text_color) : get_option('SCCBPP_cookie_consent_agree_text_color', '#FFFFFF' )),
                                                                'disagree_text_color'=> ((!empty($seerscosettingsbanner) && !empty($seerscosettingsbanner->disagree_text_color)) ? trim($seerscosettingsbanner->disagree_text_color) : get_option('SCCBPP_cookie_consent_disagree_text_color', '#FFFFFF' )),
                                                                'preferences_text_color'=> ((!empty($seerscosettingsbanner) && !empty($seerscosettingsbanner->preferences_text_color)) ? trim($seerscosettingsbanner->preferences_text_color) : get_option('SCCBPP_cookie_consent_preferences_text_color', '#000000' )),

                                                                'font_style'=> ((!empty($seerscosettingsbanner) && !empty($seerscosettingsbanner->font_style)) ? $seerscosettingsbanner->font_style : get_option('SCCBPP_cookie_consent_font_style', '' )),
                                                                'font_size'=> ((!empty($seerscosettingsbanner) && !empty($seerscosettingsbanner->font_size)) ? $seerscosettingsbanner->font_size : get_option('SCCBPP_cookie_consent_font_size', '' )),
                                                                'button_type'=> ((!empty($seerscosettingsbanner) && !empty($seerscosettingsbanner->button_type)) ? $seerscosettingsbanner->button_type : get_option('SCCBPP_cookie_consent_button_type', '' )),
                                                                'banner_position'=> (($seerscosettingsbanner && !empty($seerscosettingsbanner->position) && $seerscosettingsbanner->is_active > 0) ? $seerscosettingsbanner->position : (($seerscosettings && $seerscosettingsbanner->is_active === 0) ? "google_banner" : get_option("SCCBPP_cookie_consent_banner_position", 'seers-cmp-banner-bar') )  ),

                                                                'is_active' => ((!empty($seerscosettings) && !empty($seerscosettings->is_active)) ? (($seerscosettings->is_active) ? "true" : "false" ) : ((get_option('SCCBPP_cookie_consent_is_active', 1)) ? "true" : "false") ),
                                                                'show_badge'=> ((!empty($seerscosettings) && isset($seerscosettings->has_badge)) ? (($seerscosettings->has_badge) ? 'true' : 'false' ) : ((get_option('SCCBPP_cookie_consent_show_badge', '' )) ? 'true' : 'false' )),
                                                                'cookies_expiry' => ((!empty($seerscosettings) && isset($seerscosettings->agreement_expire)) ? $seerscosettings->agreement_expire : get_option('SCCBPP_cookie_consent_cookies_expiry', 0 )),


                                                                //'logo_bg_color'=>sanitize_text_field($_POST['logo_bg_color']),
                                                                'lang'=> get_option('SCCBPP_cookie_consent_lang', ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale())),

                                                                'body_text'=> ((!empty($seerscosettings) && !empty($seerscosettings->body)) ? $seerscosettings->body : get_option('SCCBPP_cookie_consent_body_text', __("We use cookies to ensure you get the best experience", $this->textdomain))),
                                                                'accept_btn_text'=> ((!empty($seerscosettings) && !empty($seerscosettings->btn_agree_title)) ? $seerscosettings->btn_agree_title : get_option('SCCBPP_cookie_consent_accept_btn_text', __("Allow All", $this->textdomain))),
                                                                'reject_btn_text'=> ((!empty($seerscosettings) && !empty($seerscosettings->btn_disagree_title)) ? $seerscosettings->btn_disagree_title : get_option('SCCBPP_cookie_consent_reject_btn_text', __("Disable All", $this->textdomain))),
                                                                'setting_btn_text'=> ((!empty($seerscosettings) && !empty($seerscosettings->preference_title)) ? $seerscosettings->preference_title : get_option('SCCBPP_cookie_consent_setting_btn_text', __("Preference", $this->textdomain))),
                                                                'policy_url'=> ((!empty($seerscosettings) && !empty($seerscosettings->cookie_policy_url)) ? $seerscosettings->cookie_policy_url : (($privacyenabled && $privacyenabled !== 'false') ? get_option('SCCBPP_cookie_consent_policy_declaration_url', "") : "" )),
                                                            );
                                                            $request_headers = array(
                                                                'Content-Type' => 'application/json',
                                                                'Referer' => $cookie_consent_url,
                                                            );

                                                            if ($accesstoken) {
                                                                $request_headers = array(
                                                                    'Content-Type' => 'application/json',
                                                                    'Accept' => 'application/json',
                                                                    'Referer' => $cookie_consent_url,
                                                                    'Authorization' => 'Bearer ' . $accesstoken
                                                                );
                                                            }


                                                            $url = $this->apibaseurl . "update-banner-customization";
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

                                                            if ( !is_wp_error( $result ) ) {
                                                                $response = json_decode($result['body']);

                                                                if(!get_option("SCCBPP_cookie_consent_existing_show_popup")) {
                                                                    update_option("SCCBPP_cookie_consent_show_popup", true);
                                                                    update_option('SCCBPP_cookie_consent_existing_msgtype', '');
                                                                    update_option('SCCBPP_cookie_consent_msgtype', 'success');
                                                                    update_option( 'SCCBPP_cookie_consent_msg', __("Account created successfully", $this->textdomain) );
                                                                }

                                                                if (!empty($response->user_id)) {
                                                                    update_option( 'SCCBPP_cookie_consent_bannerid_1', ((!empty($response->user_id)) ? intval($response->user_id) : '' ) );
                                                                } else {
                                                                    update_option( 'SCCBPP_cookie_consent_bannerid_1', "" );
                                                                }

                                                                if (!empty($response->domain_id)) {
                                                                    update_option( 'SCCBPP_cookie_consent_bannerid_2', ((!empty($response->domain_id)) ? intval($response->domain_id) : '' ) );
                                                                } else {
                                                                    update_option( 'SCCBPP_cookie_consent_bannerid_2', "" );
                                                                }
                                                                
                                                                if (!empty($keyResponse->cdnbaseurl)) {
                                                                    update_option( 'SCCBPP_cookie_consent_cdnscripturl', ((!empty($keyResponse->cdnbaseurl)) ? intval($keyResponse->cdnbaseurl) : '' ) );
                                                                } else {
                                                                    update_option( 'SCCBPP_cookie_consent_cdnscripturl', "" );
                                                                }

                                                                //now banner settings are updated
                                                                update_option('SCCBPP_cookie_consent_defaultsettings', 'changed');
                                                            }
                                                            
                                                        }
                                                        

                                                        if ($keepwpbanner) {

                                                            $privacyenabled = get_option('SCCBPP_cookie_consent_enable_policy');

                                                            $postData = array(
                                                                'domain' => $cookie_consent_url,
                                                                'email' => $cookie_consent_email,
                                                                'platform' => 'wordpress',

                                                                'agree_btn_color'=> get_option('SCCBPP_cookie_consent_agree_btn_color', '#3B6EF8' ),
                                                                'disagree_btn_color'=> get_option('SCCBPP_cookie_consent_disagree_btn_color', '#3B6EF8' ),
                                                                'preferences_btn_color'=> get_option('SCCBPP_cookie_consent_preferences_btn_color', '#FFFFFF' ),
                                                                'banner_bg_color'=> get_option('SCCBPP_cookie_consent_banner_bg_color', '#FFFFFF' ),

                                                                'body_text_color'=> get_option('SCCBPP_cookie_consent_body_text_color', '#000000' ),
                                                                'agree_text_color'=> get_option('SCCBPP_cookie_consent_agree_text_color', '#FFFFFF' ),
                                                                'disagree_text_color'=> get_option('SCCBPP_cookie_consent_disagree_text_color', '#FFFFFF' ),
                                                                'preferences_text_color'=> get_option('SCCBPP_cookie_consent_preferences_text_color', '#000000' ),

                                                                'font_style'=> get_option('SCCBPP_cookie_consent_font_style', '' ),
                                                                'font_size'=> get_option('SCCBPP_cookie_consent_font_size', '' ),
                                                                'button_type'=> get_option('SCCBPP_cookie_consent_button_type', '' ),
                                                                'banner_position'=> get_option("SCCBPP_cookie_consent_banner_position", 'seers-cmp-banner-bar'),

                                                                'is_active' => ((get_option('SCCBPP_cookie_consent_is_active', 1)) ? "true" : "false"),
                                                                'show_badge'=> ((get_option('SCCBPP_cookie_consent_show_badge', '' )) ? 'true' : 'false' ),
                                                                'cookies_expiry' => get_option('SCCBPP_cookie_consent_cookies_expiry', 1 ),


                                                                //'logo_bg_color'=>sanitize_text_field($_POST['logo_bg_color']),
                                                                'lang'=> get_option('SCCBPP_cookie_consent_lang', ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale())),

                                                                'body_text'=> get_option('SCCBPP_cookie_consent_body_text', __("We use cookies to ensure you get the best experience", $this->textdomain)),
                                                                'accept_btn_text'=> get_option('SCCBPP_cookie_consent_accept_btn_text', __("Allow All", $this->textdomain)),
                                                                'reject_btn_text'=> get_option('SCCBPP_cookie_consent_reject_btn_text', __("Disable All", $this->textdomain)),
                                                                'setting_btn_text'=> get_option('SCCBPP_cookie_consent_setting_btn_text', __("Preference", $this->textdomain)),
                                                                'policy_url'=> (($privacyenabled && $privacyenabled !== 'false') ? get_option('SCCBPP_cookie_consent_policy_declaration_url', "") : "" ),
                                                            );
                                                            $request_headers = array(
                                                                'Content-Type' => 'application/json',
                                                                'Referer' => $cookie_consent_url,
                                                            );

                                                            if ($accesstoken) {
                                                                $request_headers = array(
                                                                    'Content-Type' => 'application/json',
                                                                    'Accept' => 'application/json',
                                                                    'Referer' => $cookie_consent_url,
                                                                    'Authorization' => 'Bearer ' . $accesstoken
                                                                );
                                                            }


                                                            $url = $this->apibaseurl . "update-banner-customization";
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

                                                            if ( !is_wp_error( $result ) ) {
                                                                $response = json_decode($result['body']);

                                                                if(!get_option("SCCBPP_cookie_consent_existing_show_popup")) {
                                                                    update_option("SCCBPP_cookie_consent_show_popup", true);
                                                                    update_option('SCCBPP_cookie_consent_existing_msgtype', '');
                                                                    update_option('SCCBPP_cookie_consent_msgtype', 'success');
                                                                    update_option( 'SCCBPP_cookie_consent_msg', __("Account created successfully", $this->textdomain) );
                                                                }

                                                                if (!empty($response->user_id)) {
                                                                    update_option( 'SCCBPP_cookie_consent_bannerid_1', ((!empty($response->user_id)) ? intval($response->user_id) : '' ) );
                                                                } else {
                                                                    update_option( 'SCCBPP_cookie_consent_bannerid_1', "" );
                                                                }

                                                                if (!empty($response->domain_id)) {
                                                                    update_option( 'SCCBPP_cookie_consent_bannerid_2', ((!empty($response->domain_id)) ? intval($response->domain_id) : '' ) );
                                                                } else {
                                                                    update_option( 'SCCBPP_cookie_consent_bannerid_2', "" );
                                                                }
                                                                
                                                                if (!empty($keyResponse->cdnbaseurl)) {
                                                                    update_option( 'SCCBPP_cookie_consent_cdnscripturl', ((!empty($keyResponse->cdnbaseurl)) ? intval($keyResponse->cdnbaseurl) : '' ) );
                                                                } else {
                                                                    update_option( 'SCCBPP_cookie_consent_cdnscripturl', "" );
                                                                }

                                                                //now banner settings are updated
                                                                update_option('SCCBPP_cookie_consent_defaultsettings', 'changed');
                                                            }
                                                            
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }                               
                            }
                        }
                        
                        delete_option("SCCBPP_cookie_consent_savedomain");
                    }

                    if ($cookie_consent_email != '') {

                        update_option('SCCBPP_cookie_consent_email', $cookie_consent_email);
                    }
                } else {
                    
                    
                    $getoptionwporseers = get_option('SCCBPP_cookie_consent_wporseersbanner');
                    
                    if ($processtype === 'keepcurrent' && $getoptionwporseers) {
                        $processtype = $getoptionwporseers;
                    }
                    
                    $cookie_consent_code = get_option('SCCBPP_cookie_consent_id');
                    $cookie_consent_url = get_option('SCCBPP_cookie_consent_url');
                    $cookie_consent_email = get_option('SCCBPP_cookie_consent_email');
                }
                
            }

            wp_enqueue_style('style-name', plugins_url('/css/cookie-style.css', __FILE__));
            require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
        }
        
        function user_key_exists() {
            // if you is existing client and he want to copied the key on form
            $response = "";
            if (isset($_POST['SCCBPP_save_cookieid'])) {
                if (!isset($_POST['SCCBPP_existing_account']) || !wp_verify_nonce(sanitize_text_field($_POST['SCCBPP_existing_account']), 'SCCBPP-cookie-consent-already')) {
                    $noncemsg = __('Sorry, link is expire please try again.', $this->textdomain);
                    update_option('SCCBPP_cookie_consent_existing_msg', $noncemsg);
                } else {
                    
                    $accesstoken = get_option( 'SCCBPP_cookie_access_token' );
                    
                    $siteurl = get_site_url();
                    $keyentered = filter_var($_POST['SCCBPP_cookie_consent_already_id'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
                    
                    $postData = array(
                        'url' => $siteurl,
                        'key' => $keyentered
                    );
                    $request_headers = array(
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json'
                    );
                    
                    if ($accesstoken) {
                        $request_headers = array(
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                            'Authorization' => 'Bearer ' . $accesstoken
                        );
                    }
                    
                    $url = $this->apibaseurl . "domain-key-already";
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
                    
                    if ( !is_wp_error( $result ) ) {
                        $response = json_decode($result['body']);
                    } else {
                        $response =  ["message" => $result->get_error_message()];
                    }
                }
            }
            
            return $response;
        }

        function cookies_policy()
        {

            //if current user has capablity of customize then do not do any thing
            if (!current_user_can( 'customize' ))
                return false;

            $cookie_consent_url = get_option('SCCBPP_cookie_consent_url');
            $cookie_consent_email = get_option('SCCBPP_cookie_consent_email');
            
            $cookie_consent_code = get_option('SCCBPP_cookie_consent_id');

            $policynonce = $_POST['seerspolicynonce'];
            
            if ( !isset($_POST['seerspolicynonce']) || !wp_verify_nonce( $policynonce, 'seers-policy-call' ) ) {
                // This nonce is not valid. 
                echo __('Security check failed.', $this->textdomain);
            } else {
                // The nonce was valid.
                // Do stuff here.

                if (!empty($cookie_consent_code)) {
                
                    $accesstoken = get_option( 'SCCBPP_cookie_access_token' );
                    
                    //if (!$accesstoken) {
                        
                        $filterurl = $this->removeProtocol($cookie_consent_url);
                        $loginresponse = $this->loginFromSeers($cookie_consent_email, $filterurl);
                        // if accesstoken is in response
                        if (!empty($loginresponse->access_token)) {
                            //echo $loginresponse->access_token;
                            $accesstoken = $loginresponse->access_token;
                            update_option( 'SCCBPP_cookie_access_token', $loginresponse->access_token );
                            $showloginpopup = 'no';
                            $alreadyexistinseers = 'yes';
                        } else if (!empty($loginresponse->message)) {
                            //echo $loginresponse->message;
                            if (stripos($loginresponse->message, "Ask for password") !== false) {
                                // now check if we have already some password saved
                                $savedpassword = get_option( 'SCCBPP_cookie_userid_' . get_current_user_id() . '_pass');
                                
                                if ($savedpassword) {
                                    $loginresponse = $this->loginFromSeers($cookie_consent_email, $savedpassword);
                                    
                                    if (!empty($loginresponse->access_token)) {
                                        //echo $loginresponse->access_token;
                                        update_option( 'SCCBPP_cookie_access_token', $loginresponse->access_token );
                                        $accesstoken = $loginresponse->access_token;
                                        $showloginpopup = 'no';
                                        $alreadyexistinseers = 'yes';
                                    } else if (!empty($loginresponse->message)) {
                                        
                                        if (stripos($loginresponse->message, "Ask for password") !== false) {
                                            $showloginpopup = 'yes';
                                            $alreadyexistinseers = 'yes';
                                        } else {
                                            $showloginpopup = 'no';
                                            $alreadyexistinseers = 'no';
                                        }
                                        
                                        
                                    }
                                    
                                } else {
                                    $showloginpopup = 'yes';
                                    $alreadyexistinseers = 'yes';
                                }
                                
                                
                            } else {
                                $showloginpopup = 'no';
                                $alreadyexistinseers = 'no';
                            }
    
    
                        }
                        
                    //}
                    
                    if ($accesstoken && $showloginpopup === 'no') {
                        
                        global $wpdb;
                        $prefix = $wpdb->prefix;
                        $enable_policy  =   sanitize_text_field($_POST['enable_policy']);
                        // $enable_policy = $enable_policy == "on"? true: false;
                        $cookies_policy =  sanitize_text_field($_POST['cookies_url']);
    
    
    
                        $postData = array(
                            'domain' => $cookie_consent_url,
                            'email' => $cookie_consent_email,
                            'platform' => 'wordpress',
                            'policy_url' => $cookies_policy,
                            'enable_policy' => $enable_policy
                        );
    
                        $request_headers = array(
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                            'Referer' => $cookie_consent_url,
                        );
                        
                        if ($accesstoken && $alreadyexistinseers == "yes") {
                            $request_headers = array(
                                'Content-Type' => 'application/json',
                                'Accept' => 'application/json',
                                'Referer' => $cookie_consent_url,
                                'Authorization' => 'Bearer ' . $accesstoken
                            );
                        }
    
                        $url = $this->apibaseurl . "update-policy-url";
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
    
    
                        if ( !is_wp_error( $result ) ) {
                            $response = json_decode($result['body']);
    
                            if ($response->message == 'Policy URL has been updated successfully') {
    
                                $existEnablePolicy = get_option('SCCBPP_cookie_consent_enable_policy');
    
    
    
                                    update_option('SCCBPP_cookie_consent_enable_policy', $enable_policy);
    
                                $existUrl = get_option('SCCBPP_cookie_consent_policy_declaration_url');
    
                                        update_option('SCCBPP_cookie_consent_policy_declaration_url', $cookies_policy);
    
                                        // update policy url in cdn also by update banner customization
                                        $this->SCCBPP_policy_update((($enable_policy == "true" || $enable_policy === true) ? $cookies_policy : "" ));
    
                                        if ($enable_policy == "true" || $enable_policy === true ) {
                                            echo __('Cookies policy added successfully.', $this->textdomain);
                                        } else {
                                            echo __('Cookies policy disabled successfully.', $this->textdomain);
                                        }
    
                            } else {
                                
                                //if response is Unauthenticated then its mean to show login form again
                                if (stripos($response->message, "Unauthenticated") !== false) {
                                    update_option( 'SCCBPP_cookie_consent_showloginpopup', 'show' );
                                    echo __('Please login again.', $this->textdomain);
                                } else {
                                    echo __('Some thing went wrong. Please check url and try again', $this->textdomain);
                                }
                            }
    
                        } else {
                            echo __('Some thing went wrong. Please check url and try again', $this->textdomain);
                        }
                        
                    } else {
                        update_option( 'SCCBPP_cookie_consent_showloginpopup', 'show' );
                        echo __('Please login again.', $this->textdomain);
                    }
    
                    
                } else {
                    $enable_policy  =   sanitize_text_field($_POST['enable_policy']);
                    // $enable_policy = $enable_policy == "on"? true: false;
                    $cookies_policy =  sanitize_text_field($_POST['cookies_url']);
                    
                    $existEnablePolicy = get_option('SCCBPP_cookie_consent_enable_policy');
                        
                        update_option('SCCBPP_cookie_consent_enable_policy', $enable_policy);
    
                    if($enable_policy == "true" || $enable_policy === true ){
    
                       $existUrl = get_option('SCCBPP_cookie_consent_policy_declaration_url');
                        
                            update_option('SCCBPP_cookie_consent_policy_declaration_url', $cookies_policy);
                            
                            //now banner settings are updated
                            update_option('SCCBPP_cookie_consent_defaultsettings', 'changed');
    
                        echo __('Cookies policy added successfully.', $this->textdomain);
                    } else {
                        $existUrl = get_option('SCCBPP_cookie_consent_policy_declaration_url');
                        update_option('SCCBPP_cookie_consent_enable_policy', $enable_policy);
                        
                        //now banner settings are updated
                        update_option('SCCBPP_cookie_consent_defaultsettings', 'changed');
                        
                        echo __('Cookies policy disabled successfully.', $this->textdomain);
                    }
                }

            }


            exit;

        }
        function cookies_setting()
        {

            //if current user has capablity of customize then do not do any thing
            if (!current_user_can( 'customize' ))
                return false;
            
            $cookie_consent_url = get_option('SCCBPP_cookie_consent_url');
            $cookie_consent_email = get_option('SCCBPP_cookie_consent_email');
            
            $cookie_consent_code = get_option('SCCBPP_cookie_consent_id');

            $seersettingnonce = $_POST['seerscoosettingnonce'];
            
            if ( !isset($_POST['seerscoosettingnonce']) || !wp_verify_nonce( $seersettingnonce, 'seers-cooksetting-call' ) ) {
                // This nonce is not valid. 
                $result = array(
                    'resp_message'=>__('Security check failed.', $this->textdomain),
                  );
                echo json_encode($result);
            } else {
                // The nonce was valid.
                // Do stuff here.

                if (!empty($cookie_consent_code)) {
                
                    $accesstoken = get_option( 'SCCBPP_cookie_access_token' );
                    $getseersbanner = true;
                    $keepwpbanner = true;
                    $alreadyexistinseers = 'no';
                    $showloginpopup = 'no';
                    
                    //if (!$accesstoken) {
                        
                        $filterurl = $this->removeProtocol($cookie_consent_url);
                        $loginresponse = $this->loginFromSeers($cookie_consent_email, $filterurl);
                        // if accesstoken is in response
                        if (!empty($loginresponse->access_token)) {
                            //echo $loginresponse->access_token;
                            $accesstoken = $loginresponse->access_token;
                            update_option( 'SCCBPP_cookie_access_token', $loginresponse->access_token );
                        } else if (!empty($loginresponse->message)) {
                            //echo $loginresponse->message;
                            if (stripos($loginresponse->message, "Ask for password") !== false) {
                                // now check if we have already some password saved
                                $savedpassword = get_option( 'SCCBPP_cookie_userid_' . get_current_user_id() . '_pass');
                                
                                if ($savedpassword) {
                                    $loginresponse = $this->loginFromSeers($cookie_consent_email, $savedpassword);
                                    
                                    if (!empty($loginresponse->access_token)) {
                                        //echo $loginresponse->access_token;
                                        update_option( 'SCCBPP_cookie_access_token', $loginresponse->access_token );
                                        $accesstoken = $loginresponse->access_token;
                                        $showloginpopup = 'no';
                                        $alreadyexistinseers = 'yes';
                                    } else if (!empty($loginresponse->message)) {
                                        
                                        if (stripos($loginresponse->message, "Ask for password") !== false) {
                                            $showloginpopup = 'yes';
                                            $alreadyexistinseers = 'yes';
                                        } else {
                                            $showloginpopup = 'no';
                                            $alreadyexistinseers = 'no';
                                        }
                                        
                                        
                                    }
                                    
                                } else {
                                    $showloginpopup = 'yes';
                                    $alreadyexistinseers = 'yes';
                                }
                                
                                
                            } else {
                                $showloginpopup = 'no';
                                $alreadyexistinseers = 'no';
                            }
    
    
                        }
                        
                    //}
                    
                    if ($accesstoken && $showloginpopup === 'no') {
                        
                        global $wpdb;
                        $prefix = $wpdb->prefix;
                        $result ='';
                        $postData = array(
                            'domain' => $cookie_consent_url,
                            'email' => $cookie_consent_email,
                            'platform' => 'wordpress',
                            'lang' => ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale())
                        );
    
                        $request_headers = array(
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                            'Referer' => $cookie_consent_url,
                        );
                        
                        if ($accesstoken) {
                            $request_headers = array(
                                'Content-Type' => 'application/json',
                                'Accept' => 'application/json',
                                'Referer' => $cookie_consent_url,
                                'Authorization' => 'Bearer ' . $accesstoken
                            );
                        }
    
                        $url = $this->apibaseurl . "get-banner-settings";
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
    
    
                        if ( !is_wp_error( $result ) ) {
                            $response = json_decode($result['body']);
    
                            if ( !empty($response->bannersettings) ) {
    
                                $seerscosettings = $response->bannersettings;
                                $seerscosettingsbanner = $response->bannersettingsbanners;
                                
                                //check scenarios do get settings from seers of keep wp or to show a popup to current user
                                if (!empty($_POST['keepbansetting']) && $_POST['keepbansetting'] === "keepseers") {
                                    $getseersbanner = true;
                                    $keepwpbanner = false;
                                    delete_option('SCCBPP_cookie_consent_wporseersbanner');
                                } else if (!empty($_POST['keepbansetting']) && $_POST['keepbansetting'] === "keepwp") {
                                    $getseersbanner = false;
                                    $keepwpbanner = true;
                                    delete_option('SCCBPP_cookie_consent_wporseersbanner');
                                }
                                
                                if ($getseersbanner) {
                                                                
                                    update_option( 'SCCBPP_cookie_consent_is_active', (($seerscosettings && !empty($seerscosettings->is_active)) ? $seerscosettings->is_active : get_option("SCCBPP_cookie_consent_is_active", 1) ) );
                                    update_option( 'SCCBPP_cookie_consent_cookies_expiry', (($seerscosettings && isset($seerscosettings->agreement_expire)) ? $seerscosettings->agreement_expire : get_option("SCCBPP_cookie_consent_cookies_expiry", 0) ) );
                                    update_option( 'SCCBPP_cookie_consent_lang', ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale()) );
                                    update_option( 'SCCBPP_cookie_consent_show_badge', (($seerscosettings && isset($seerscosettings->has_badge)) ? (($seerscosettings->has_badge) ? 'true' : 'false' ) : ((get_option("SCCBPP_cookie_consent_show_badge", "")) ? 'true' : 'false' ) ) );
                                    update_option( 'SCCBPP_cookie_consent_agree_btn_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->agree_btn_color)) ? trim($seerscosettingsbanner->agree_btn_color) : get_option("SCCBPP_cookie_consent_agree_btn_color", "#3B6EF8") ) );
                                    update_option( 'SCCBPP_cookie_consent_disagree_btn_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->disagree_btn_color)) ? trim($seerscosettingsbanner->disagree_btn_color) : get_option("SCCBPP_cookie_consent_disagree_btn_color", '#3B6EF8') ) );
                                    update_option( 'SCCBPP_cookie_consent_preferences_btn_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->preferences_btn_color)) ? trim($seerscosettingsbanner->preferences_btn_color) : get_option("SCCBPP_cookie_consent_preferences_btn_color", '#FFFFFF') ) );
                                    update_option( 'SCCBPP_cookie_consent_banner_bg_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->banner_bg_color)) ? trim($seerscosettingsbanner->banner_bg_color) : get_option("SCCBPP_cookie_consent_banner_bg_color", '#FFFFFF') ) );
                                    update_option( 'SCCBPP_cookie_consent_body_text_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->body_text_color)) ? trim($seerscosettingsbanner->body_text_color) : get_option("SCCBPP_cookie_consent_body_text_color", '#000000') ) );
                                    update_option( 'SCCBPP_cookie_consent_agree_text_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->agree_text_color)) ? trim($seerscosettingsbanner->agree_text_color) : get_option("SCCBPP_cookie_consent_agree_text_color", '#FFFFFF') ) );
                                    update_option( 'SCCBPP_cookie_consent_disagree_text_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->disagree_text_color)) ? trim($seerscosettingsbanner->disagree_text_color) : get_option("SCCBPP_cookie_consent_disagree_text_color", '#FFFFFF') ) );
                                    update_option( 'SCCBPP_cookie_consent_preferences_text_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->preferences_text_color)) ? trim($seerscosettingsbanner->preferences_text_color) : get_option("SCCBPP_cookie_consent_preferences_text_color", '#000000') ) );
                                    update_option( 'SCCBPP_cookie_consent_body_text', (($seerscosettings && !empty($seerscosettings->body)) ? $seerscosettings->body : get_option("SCCBPP_cookie_consent_body_text", '') ) );
                                    update_option( 'SCCBPP_cookie_consent_accept_btn_text', (($seerscosettings && !empty($seerscosettings->btn_agree_title)) ? $seerscosettings->btn_agree_title : get_option("SCCBPP_cookie_consent_accept_btn_text", '') ) );
                                    update_option( 'SCCBPP_cookie_consent_reject_btn_text', (($seerscosettings && !empty($seerscosettings->btn_disagree_title)) ? $seerscosettings->btn_disagree_title : get_option("SCCBPP_cookie_consent_reject_btn_text", '') ) );
                                    update_option( 'SCCBPP_cookie_consent_setting_btn_text', (($seerscosettings && !empty($seerscosettings->btn_preference_title)) ? $seerscosettings->btn_preference_title : get_option("SCCBPP_cookie_consent_setting_btn_text", '') ) );
                                    update_option( 'SCCBPP_cookie_consent_font_style', (($seerscosettingsbanner && !empty($seerscosettingsbanner->font_style)) ? $seerscosettingsbanner->font_style : get_option("SCCBPP_cookie_consent_font_style", '') ) );
                                    update_option( 'SCCBPP_cookie_consent_font_size', (($seerscosettingsbanner && !empty($seerscosettingsbanner->font_size)) ? $seerscosettingsbanner->font_size : get_option("SCCBPP_cookie_consent_font_size", '') ) );
                                    update_option( 'SCCBPP_cookie_consent_button_type', (($seerscosettingsbanner && !empty($seerscosettingsbanner->button_type)) ? $seerscosettingsbanner->button_type : get_option("SCCBPP_cookie_consent_button_type", '') ) );
                                    update_option( 'SCCBPP_cookie_consent_banner_position', (($seerscosettingsbanner && !empty($seerscosettingsbanner->position) && $seerscosettingsbanner->is_active > 0) ? $seerscosettingsbanner->position : (($seerscosettings && $seerscosettingsbanner->is_active === 0) ? "google_banner" : get_option("SCCBPP_cookie_consent_banner_position", 'seers-cmp-banner-bar') )  ) );
    
                                    // new changes on phase 2 advance features
                                    update_option( 'SCCBPP_cookie_consent_child_privacy', (($seerscosettings && !empty($seerscosettings->child_privacy)) ? (($seerscosettings->child_privacy) ? 'true' : 'false' ) : get_option("SCCBPP_cookie_consent_child_privacy", 'false') ) );
                                    update_option( 'SCCBPP_do_not_track', (($seerscosettings && !empty($seerscosettings->do_not_track)) ? (($seerscosettings->do_not_track) ? 'true' : 'false' ) : get_option("SCCBPP_do_not_track", 'false') ) );
                                    update_option( 'SCCBPP_cookie_consent_iab_tcf', (($seerscosettings && !empty($seerscosettings->iab_tcf)) ? (($seerscosettings->iab_tcf) ? 'true' : 'false' ) : get_option("cookie_consent_iab_tcf", 'false') ) );
                                    update_option( 'SCCBPP_cookie_consent_do_not_sell', (($seerscosettings && !empty($seerscosettings->do_not_sell)) ? (($seerscosettings->do_not_sell) ? 'true' : 'false' ) : get_option("SCCBPP_cookie_consent_do_not_sell", 'false') ) );
                                    update_option( 'SCCBPP_cookie_consent_global_privacy_control', (($seerscosettings && !empty($seerscosettings->global_privacy_control)) ? (($seerscosettings->global_privacy_control) ? 'true' : 'false' ) : get_option("SCCBPP_cookie_consent_global_privacy_control", 'false') ) );                                    update_option( 'SCCBPP_cookie_consent_google_consent', (($seerscosettings && !empty($seerscosettings->apply_google_consent)) ? (($seerscosettings->apply_google_consent) ? 'true' : 'false' ) : get_option("SCCBPP_cookie_consent_google_consent", 'false') ) );
                                    update_option( 'SCCBPP_cookie_consent_facebook_consent', (($seerscosettings && !empty($seerscosettings->apply_facebook_consent)) ? (($seerscosettings->apply_facebook_consent) ? 'true' : 'false' ) : get_option("SCCBPP_cookie_consent_facebook_consent", 'false') ) );
                                    update_option( 'SCCBPP_cookie_consent_logo_status', (($seerscosettings && !empty($seerscosettings->logo_status)) ? $seerscosettings->logo_status : get_option("SCCBPP_cookie_consent_logo_status", 'seers') ) );
                                    update_option( 'SCCBPP_cookie_consent_auto_block_vendor', (($seerscosettings && !empty($seerscosettings->auto_block_vendor)) ? (($seerscosettings->auto_block_vendor) ? 'true' : 'false' ) : get_option("SCCBPP_cookie_consent_auto_block_vendor", 'false') ) );
    
                                    update_option('SCCBPP_cookie_consent_enable_policy', (($seerscosettings && !empty($seerscosettings->cookie_policy_url)) ? "true" : get_option("SCCBPP_cookie_consent_enable_policy", "") ));
                                    update_option('SCCBPP_cookie_consent_policy_declaration_url', (($seerscosettings && !empty($seerscosettings->cookie_policy_url)) ? $seerscosettings->cookie_policy_url : get_option("SCCBPP_cookie_consent_policy_declaration_url", "") ));
                                    
                                    
                                    if (!$keepwpbanner) {
                                        
                                        $result = array(
                                            'resp_message'=>__($response->message, $this->textdomain),
                                            'accept_btn_text'=>$response->accept_btn_text,
                                            'reject_btn_text'=>$response->reject_btn_text,
                                            'setting_btn_text'=>$response->setting_btn_text,
                                            'bodyText'=>$response->body_text,
                                        );
                                        echo  json_encode($result);
                                        
                                    }
    
                                }
    
                                $privacyenabled = get_option('SCCBPP_cookie_consent_enable_policy');
                                
                                if ($keepwpbanner) {
                                    
                                    delete_option('SCCBPP_cookie_consent_wporseersbanner');
                                    
                                    $result ='';
                                    $postData = array(
                                        'domain' => $cookie_consent_url,
                                        'email' => $cookie_consent_email,
                                        'platform' => 'wordpress',
    
                                        'agree_btn_color'=>sanitize_text_field($_POST['agree_btn_color']),
                                        'disagree_btn_color'=>sanitize_text_field($_POST['disagree_btn_color']),
                                        'preferences_btn_color'=>sanitize_text_field($_POST['setting_btn_color']),
                                        'banner_bg_color'=>sanitize_text_field($_POST['banner_bg_color']),
    
                                        'body_text_color'=>sanitize_text_field($_POST['body_text_color']),
                                        'agree_text_color'=>sanitize_text_field($_POST['agree_text_color']),
                                        'disagree_text_color'=>sanitize_text_field($_POST['disagree_text_color']),
                                        'preferences_text_color'=>sanitize_text_field($_POST['preferences_text_color']),
    
                                        'font_style'=>sanitize_text_field($_POST['seers_fonts_fm']),
                                        'font_size'=>sanitize_text_field($_POST['seers_fonts_fs']),
                                        'button_type'=>sanitize_text_field($_POST['selectedBtn']),
                                        'banner_position'=> ((get_option("SCCBPP_cookie_consent_banner_position") === 'google_banner') ? get_option("SCCBPP_cookie_consent_banner_position") : sanitize_text_field($_POST['seers_bannerposition']) ),
    
                                        'is_active' => sanitize_text_field($_POST['banners']),
                                        'show_badge'=>sanitize_text_field($_POST['show_badge']),
                                        'cookies_expiry' => sanitize_text_field($_POST['cookies_expiry']),
    
    
                                        //'logo_bg_color'=>sanitize_text_field($_POST['logo_bg_color']),
                                        //'lang'=>sanitize_text_field($_POST['cookies_lang']),
                                        'lang'=>((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale()),
    
                                        'body_text'=>sanitize_text_field($_POST['body_text']),
                                        'accept_btn_text'=>sanitize_text_field($_POST['accept_btn_text']),
                                        'reject_btn_text'=>sanitize_text_field($_POST['reject_btn_text']),
                                        'setting_btn_text'=>sanitize_text_field($_POST['setting_btn_text']),
                                        'policy_url'=> (($privacyenabled && $privacyenabled !== 'false') ? get_option('SCCBPP_cookie_consent_policy_declaration_url', "") : "" )
                                   );
                                    $request_headers = array(
                                        'Content-Type' => 'application/json',
                                        'Accept' => 'application/json',
                                        'Referer' => $cookie_consent_url,
                                    );
    
                                    if ($accesstoken) {
                                        $request_headers = array(
                                            'Content-Type' => 'application/json',
                                            'Accept' => 'application/json',
                                            'Referer' => $cookie_consent_url,
                                            'Authorization' => 'Bearer ' . $accesstoken
                                        );
                                    }
    
    
                                    $url = $this->apibaseurl . "update-banner-customization";
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
    
                                    if ( !is_wp_error( $result ) ) {
    
                                        $response = json_decode($result['body']);
                                        
    
                                        if ($response->message=='Settings has been updated successfully') {
    
                                            $setting_options = array(
                                                'is_active' => sanitize_text_field($_POST['banners']),
                                                'cookies_expiry' => sanitize_text_field($_POST['cookies_expiry']),
                                                'lang'=>sanitize_text_field($_POST['cookies_lang']),
                                                'show_badge'=>sanitize_text_field($_POST['show_badge']),
    
                                                'agree_btn_color'=>sanitize_text_field($_POST['agree_btn_color']),
                                                'disagree_btn_color'=>sanitize_text_field($_POST['disagree_btn_color']),
                                                'preferences_btn_color'=>sanitize_text_field($_POST['setting_btn_color']),
                                                'banner_bg_color'=>sanitize_text_field($_POST['banner_bg_color']),
                                                'body_text_color'=>sanitize_text_field($_POST['body_text_color']),
                                                'agree_text_color'=>sanitize_text_field($_POST['agree_text_color']),
                                                'disagree_text_color'=>sanitize_text_field($_POST['disagree_text_color']),
                                                'preferences_text_color'=>sanitize_text_field($_POST['preferences_text_color']),
                                                'font_style'=>sanitize_text_field($_POST['seers_fonts_fm']),
                                                'font_size'=>sanitize_text_field($_POST['seers_fonts_fs']),
                                                'button_type'=>sanitize_text_field($_POST['selectedBtn']),
                                                'lang'=>sanitize_text_field($_POST['lang']),
                                                'body_text'=>sanitize_text_field($_POST['body_text']),
                                                'accept_btn_text'=>sanitize_text_field($_POST['accept_btn_text']),
                                                'reject_btn_text'=>sanitize_text_field($_POST['reject_btn_text']),
                                                'setting_btn_text'=>sanitize_text_field($_POST['setting_btn_text']),
                                            );
    
                                            /*foreach( $setting_options as $key => $value ) {
    
                                                if( $existing = get_option( 'SCCBPP_cookie_consent_' . $key ) ) {
    
                                                    $setting_options[$key] = $existing;
                                                    delete_option( 'SCCBPP_cookie_consent_' . $key );
                                                }
                                            }*/
    
    
    
                                            update_option( 'SCCBPP_cookie_consent_is_active', ((!empty($_POST['banners']) && ($_POST['banners'] === 'true' || $_POST['banners'] === true)) ? 1 : 0 ) );
                                            update_option( 'SCCBPP_cookie_consent_cookies_expiry', ((!empty($_POST['cookies_expiry'])) ? intval( sanitize_text_field($_POST['cookies_expiry'])) : 0 ) );
                                            update_option( 'SCCBPP_cookie_consent_lang', ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale()) );
                                            update_option( 'SCCBPP_cookie_consent_show_badge', ((!empty($_POST['show_badge'])) ? sanitize_text_field($_POST['show_badge']) : '' ) );
                                            update_option( 'SCCBPP_cookie_consent_agree_btn_color', ((!empty($_POST['agree_btn_color'])) ? sanitize_text_field($_POST['agree_btn_color']) : '#3B6EF8' ) );
                                            update_option( 'SCCBPP_cookie_consent_disagree_btn_color', ((!empty($_POST['disagree_btn_color'])) ? sanitize_text_field($_POST['disagree_btn_color']) : '#3B6EF8' ) );
                                            update_option( 'SCCBPP_cookie_consent_preferences_btn_color', ((!empty($_POST['setting_btn_color'])) ? sanitize_text_field($_POST['setting_btn_color']) : '#FFFFFF' ) );
                                            update_option( 'SCCBPP_cookie_consent_banner_bg_color', ((!empty($_POST['banner_bg_color'])) ? sanitize_text_field($_POST['banner_bg_color']) : '#FFFFFF' ) );
                                            update_option( 'SCCBPP_cookie_consent_body_text_color', ((!empty($_POST['body_text_color'])) ? sanitize_text_field($_POST['body_text_color']) : '#000000' ) );
                                            update_option( 'SCCBPP_cookie_consent_agree_text_color', ((!empty($_POST['agree_text_color'])) ? sanitize_text_field($_POST['agree_text_color']) : '#FFFFFF' ) );
                                            update_option( 'SCCBPP_cookie_consent_disagree_text_color', ((!empty($_POST['disagree_text_color'])) ? sanitize_text_field($_POST['disagree_text_color']) : '#FFFFFF' ) );
                                            update_option( 'SCCBPP_cookie_consent_preferences_text_color', ((!empty($_POST['preferences_text_color'])) ? sanitize_text_field($_POST['preferences_text_color']) : '#000000' ) );
                                            update_option( 'SCCBPP_cookie_consent_body_text', ((!empty($_POST['body_text'])) ? sanitize_text_field($_POST['body_text']) : '' ) );
                                            update_option( 'SCCBPP_cookie_consent_accept_btn_text', ((!empty($_POST['accept_btn_text'])) ? sanitize_text_field($_POST['accept_btn_text']) : '' ) );
                                            update_option( 'SCCBPP_cookie_consent_reject_btn_text', ((!empty($_POST['reject_btn_text'])) ? sanitize_text_field($_POST['reject_btn_text']) : '' ) );
                                            update_option( 'SCCBPP_cookie_consent_setting_btn_text', ((!empty($_POST['setting_btn_text'])) ? sanitize_text_field($_POST['setting_btn_text']) : '' ) );
                                            update_option( 'SCCBPP_cookie_consent_font_style', ((!empty($_POST['seers_fonts_fm'])) ? sanitize_text_field($_POST['seers_fonts_fm']) : '' ) );
                                            update_option( 'SCCBPP_cookie_consent_font_size', ((!empty($_POST['seers_fonts_fs'])) ? sanitize_text_field($_POST['seers_fonts_fs']) : '' ) );
                                            update_option( 'SCCBPP_cookie_consent_button_type', ((!empty($_POST['selectedBtn'])) ? sanitize_text_field($_POST['selectedBtn']) : '' ) );
                                            update_option( 'SCCBPP_cookie_consent_banner_position', ((get_option("SCCBPP_cookie_consent_banner_position") === 'google_banner') ? get_option("SCCBPP_cookie_consent_banner_position") : sanitize_text_field($_POST['seers_bannerposition']) ) );
    
                                            if (!empty($response->user_id)) {
                                                update_option( 'SCCBPP_cookie_consent_bannerid_1', ((!empty($response->user_id)) ? intval($response->user_id) : '' ) );
                                            } else {
                                                update_option( 'SCCBPP_cookie_consent_bannerid_1', "" );
                                            }
    
                                            if (!empty($response->domain_id)) {
                                                update_option( 'SCCBPP_cookie_consent_bannerid_2', ((!empty($response->domain_id)) ? intval($response->domain_id) : '' ) );
                                            } else {
                                                update_option( 'SCCBPP_cookie_consent_bannerid_2', "" );
                                            }
                                            
                                            if (!empty($keyResponse->cdnbaseurl)) {
                                                update_option( 'SCCBPP_cookie_consent_cdnscripturl', ((!empty($keyResponse->cdnbaseurl)) ? intval($keyResponse->cdnbaseurl) : '' ) );
                                            } else {
                                                update_option( 'SCCBPP_cookie_consent_cdnscripturl', "" );
                                            }
    
                                            /*** Insert records here ******/
                                            /*$wpdb->insert($wpdb->prefix . 'options', array(
                                                'option_name' => 'SCCBPP_cookie_consent_is_active',
                                                'option_value' => ((!empty($_POST['banners']) && ($_POST['banners'] === 'true' || $_POST['banners'] === true)) ? 1 : 0 ),
                                            ));
    
                                            $wpdb->insert($wpdb->prefix . 'options', array(
                                                'option_name' => 'SCCBPP_cookie_consent_cookies_expiry',
                                                'option_value' => intval( sanitize_text_field($_POST['cookies_expiry'])),
                                            ));
                                            $wpdb->insert($wpdb->prefix . 'options', array(
                                                'option_name' => 'SCCBPP_cookie_consent_lang',
                                                'option_value' => sanitize_text_field($_POST['cookies_lang']),
                                            ));
    
                                            $wpdb->insert($wpdb->prefix . 'options', array(
                                                'option_name' => 'SCCBPP_cookie_consent_show_badge',
                                                'option_value' => sanitize_text_field($_POST['show_badge']),
                                            ));
    
                                            $wpdb->insert($wpdb->prefix . 'options', array(
                                                'option_name' => 'SCCBPP_cookie_consent_agree_btn_color',
                                                'option_value' => sanitize_text_field($_POST['agree_btn_color']),
                                            ));
                                            $wpdb->insert($wpdb->prefix . 'options', array(
                                                'option_name' => 'SCCBPP_cookie_consent_disagree_btn_color',
                                                'option_value' => sanitize_text_field($_POST['disagree_btn_color']),
                                            ));
                                            $wpdb->insert($wpdb->prefix . 'options', array(
                                                'option_name' => 'SCCBPP_cookie_consent_preferences_btn_color',
                                                'option_value' => sanitize_text_field($_POST['agree_btn_color']),
                                            ));
                                            $wpdb->insert($wpdb->prefix . 'options', array(
                                                'option_name' => 'SCCBPP_cookie_consent_banner_bg_color',
                                                'option_value' => sanitize_text_field($_POST['banner_bg_color']),
                                            ));
                                            $wpdb->insert($wpdb->prefix . 'options', array(
                                                'option_name' => 'SCCBPP_cookie_consent_body_text_color',
                                                'option_value' => sanitize_text_field($_POST['body_text_color']),
                                            ));
                                            $wpdb->insert($wpdb->prefix . 'options', array(
                                                'option_name' => 'SCCBPP_cookie_consent_agree_text_color',
                                                'option_value' => sanitize_text_field($_POST['agree_text_color']),
                                            ));
                                            $wpdb->insert($wpdb->prefix . 'options', array(
                                                'option_name' => 'SCCBPP_cookie_consent_disagree_text_color',
                                                'option_value' => sanitize_text_field($_POST['disagree_text_color']),
                                            ));
                                            $wpdb->insert($wpdb->prefix . 'options', array(
                                                'option_name' => 'SCCBPP_cookie_consent_preferences_text_color',
                                                'option_value' => sanitize_text_field($_POST['preferences_text_color']),
                                            ));
                                            $wpdb->insert($wpdb->prefix . 'options', array(
                                                'option_name' => 'SCCBPP_cookie_consent_body_text',
                                                'option_value' => sanitize_text_field($_POST['body_text']),
                                            ));
                                            $wpdb->insert($wpdb->prefix . 'options', array(
                                                'option_name' => 'SCCBPP_cookie_consent_accept_btn_text',
                                                'option_value' => sanitize_text_field($_POST['accept_btn_text']),
                                            ));
                                            $wpdb->insert($wpdb->prefix . 'options', array(
                                                'option_name' => 'SCCBPP_cookie_consent_reject_btn_text',
                                                'option_value' => sanitize_text_field($_POST['reject_btn_text']),
                                            ));
                                            $wpdb->insert($wpdb->prefix . 'options', array(
                                                'option_name' => 'SCCBPP_cookie_consent_setting_btn_text',
                                                'option_value' => sanitize_text_field($_POST['setting_btn_text']),
                                            ));
    
                                            $wpdb->insert($wpdb->prefix . 'options', array(
                                                'option_name' => 'SCCBPP_cookie_consent_font_style',
                                                'option_value' => sanitize_text_field($_POST['seers_fonts_fm']),
                                            ));
                                            $wpdb->insert($wpdb->prefix . 'options', array(
                                                'option_name' => 'SCCBPP_cookie_consent_font_size',
                                                'option_value' => sanitize_text_field($_POST['seers_fonts_fs']),
                                            ));
                                            $wpdb->insert($wpdb->prefix . 'options', array(
                                                'option_name' => 'SCCBPP_cookie_consent_button_type',
                                                'option_value' => sanitize_text_field($_POST['selectedBtn']),
                                            ));*/
                                            //echo 'Settings has been updated successfully';
                                            $result = array(
                                                'resp_message'=>__($response->message, $this->textdomain),
                                                'accept_btn_text'=>$response->accept_btn_text,
                                                'reject_btn_text'=>$response->reject_btn_text,
                                                'setting_btn_text'=>$response->setting_btn_text,
                                                'bodyText'=>$response->body_text,
                                            );
                                            echo  json_encode($result);
    
                                        }else{
    
                                            if (!empty($response->user_id)) {
                                                update_option( 'SCCBPP_cookie_consent_bannerid_1', ((!empty($response->user_id)) ? intval($response->user_id) : '' ) );
                                            } else {
                                                update_option( 'SCCBPP_cookie_consent_bannerid_1', "" );
                                            }
    
                                            if (!empty($response->domain_id)) {
                                                update_option( 'SCCBPP_cookie_consent_bannerid_2', ((!empty($response->domain_id)) ? intval($response->domain_id) : '' ) );
                                            } else {
                                                update_option( 'SCCBPP_cookie_consent_bannerid_2', "" );
                                            }
                                            
                                            if (!empty($keyResponse->cdnbaseurl)) {
                                                update_option( 'SCCBPP_cookie_consent_cdnscripturl', ((!empty($keyResponse->cdnbaseurl)) ? intval($keyResponse->cdnbaseurl) : '' ) );
                                            } else {
                                                update_option( 'SCCBPP_cookie_consent_cdnscripturl', "" );
                                            }
    
                                          //  echo 'Some thing went wronge.';
                                            $result = array(
                                                'resp_message'=>__('Some thing went wrong.', $this->textdomain),
                                              );
                                            echo json_encode($result);
                                        }
    
                                    } else {
                                        //  echo 'Some thing went wronge.';
                                        $result = array(
                                            'resp_message'=>__('Some thing went wrong.', $this->textdomain),
                                          );
                                        echo json_encode($result);
                                    }
                                    
                                }
    
                            } else {
                                //  echo 'Some thing went wronge.';
                                
                                if (!empty($response->message) && stripos($response->message, "Unauthenticated") !== false) {
                                        update_option( 'SCCBPP_cookie_consent_showloginpopup', 'show' );
                                        $result = array(
                                            'resp_message'=>__('Please login again.', $this->textdomain),
                                          );
                                    } else {
                                        $result = array(
                                            'resp_message'=>__('Some thing went wrong.', $this->textdomain),
                                          );
                                    }
                                  
                                  echo json_encode($result);
                              }
                        } else {
                            //  echo 'Some thing went wronge.';
                            $result = array(
                                'resp_message'=>__('Some thing went wrong.', $this->textdomain),
                              );
                            echo json_encode($result);
                        }
                        
                    } else {
                        update_option( 'SCCBPP_cookie_consent_showloginpopup', 'show' );
                        $result = array(
                            'resp_message'=>__('Please login again.', $this->textdomain),
                          );
                        echo json_encode($result);
                    }
                    
                    exit;
                } else {
                    
                    // in free mode also save these settings
                    $setting_options = array(
                        'is_active' => sanitize_text_field($_POST['banners']),
                        'cookies_expiry' => sanitize_text_field($_POST['cookies_expiry']),
                        'lang'=>sanitize_text_field($_POST['cookies_lang']),
                        'show_badge'=>sanitize_text_field($_POST['show_badge']),
    
                        'agree_btn_color'=>sanitize_text_field($_POST['agree_btn_color']),
                        'disagree_btn_color'=>sanitize_text_field($_POST['disagree_btn_color']),
                        'preferences_btn_color'=>sanitize_text_field($_POST['setting_btn_color']),
                        'banner_bg_color'=>sanitize_text_field($_POST['banner_bg_color']),
                        'body_text_color'=>sanitize_text_field($_POST['body_text_color']),
                        'agree_text_color'=>sanitize_text_field($_POST['agree_text_color']),
                        'disagree_text_color'=>sanitize_text_field($_POST['disagree_text_color']),
                        'preferences_text_color'=>sanitize_text_field($_POST['preferences_text_color']),
                        'font_style'=>sanitize_text_field($_POST['seers_fonts_fm']),
                        'font_size'=>sanitize_text_field($_POST['seers_fonts_fs']),
                        'button_type'=>sanitize_text_field($_POST['selectedBtn']),
                        'lang'=>sanitize_text_field($_POST['lang']),
                        'body_text'=>sanitize_text_field($_POST['body_text']),
                        'accept_btn_text'=>sanitize_text_field($_POST['accept_btn_text']),
                        'reject_btn_text'=>sanitize_text_field($_POST['reject_btn_text']),
                        'setting_btn_text'=>sanitize_text_field($_POST['setting_btn_text']),
                    );
    
                    /*** Insert records here ******/
                    
                    update_option( 'SCCBPP_cookie_consent_is_active', ((!empty($_POST['banners']) && ($_POST['banners'] === 'true' || $_POST['banners'] === true)) ? 1 : 0 ) );
                    update_option( 'SCCBPP_cookie_consent_cookies_expiry', ((!empty($_POST['cookies_expiry'])) ? intval( sanitize_text_field($_POST['cookies_expiry'])) : 1 ) );
                    update_option( 'SCCBPP_cookie_consent_lang', ((!empty($_POST['cookies_lang'])) ? sanitize_text_field($_POST['cookies_lang']) : '' ) );
                    update_option( 'SCCBPP_cookie_consent_show_badge', ((!empty($_POST['show_badge'])) ? sanitize_text_field($_POST['show_badge']) : '' ) );
                    update_option( 'SCCBPP_cookie_consent_agree_btn_color', ((!empty($_POST['agree_btn_color'])) ? sanitize_text_field($_POST['agree_btn_color']) : '#3B6EF8' ) );
                    update_option( 'SCCBPP_cookie_consent_disagree_btn_color', ((!empty($_POST['disagree_btn_color'])) ? sanitize_text_field($_POST['disagree_btn_color']) : '#3B6EF8' ) );
                    update_option( 'SCCBPP_cookie_consent_preferences_btn_color', ((!empty($_POST['setting_btn_color'])) ? sanitize_text_field($_POST['setting_btn_color']) : '#FFFFFF' ) );
                    update_option( 'SCCBPP_cookie_consent_banner_bg_color', ((!empty($_POST['banner_bg_color'])) ? sanitize_text_field($_POST['banner_bg_color']) : '#FFFFFF' ) );
                    update_option( 'SCCBPP_cookie_consent_body_text_color', ((!empty($_POST['body_text_color'])) ? sanitize_text_field($_POST['body_text_color']) : '#000000' ) );
                    update_option( 'SCCBPP_cookie_consent_agree_text_color', ((!empty($_POST['agree_text_color'])) ? sanitize_text_field($_POST['agree_text_color']) : '#FFFFFF' ) );
                    update_option( 'SCCBPP_cookie_consent_disagree_text_color', ((!empty($_POST['disagree_text_color'])) ? sanitize_text_field($_POST['disagree_text_color']) : '#FFFFFF' ) );
                    update_option( 'SCCBPP_cookie_consent_preferences_text_color', ((!empty($_POST['preferences_text_color'])) ? sanitize_text_field($_POST['preferences_text_color']) : '#000000' ) );
                    update_option( 'SCCBPP_cookie_consent_body_text', ((!empty($_POST['body_text'])) ? sanitize_text_field($_POST['body_text']) : '' ) );
                    update_option( 'SCCBPP_cookie_consent_accept_btn_text', ((!empty($_POST['accept_btn_text'])) ? sanitize_text_field($_POST['accept_btn_text']) : '' ) );
                    update_option( 'SCCBPP_cookie_consent_reject_btn_text', ((!empty($_POST['reject_btn_text'])) ? sanitize_text_field($_POST['reject_btn_text']) : '' ) );
                    update_option( 'SCCBPP_cookie_consent_setting_btn_text', ((!empty($_POST['setting_btn_text'])) ? sanitize_text_field($_POST['setting_btn_text']) : '' ) );
                    update_option( 'SCCBPP_cookie_consent_font_style', ((!empty($_POST['seers_fonts_fm'])) ? sanitize_text_field($_POST['seers_fonts_fm']) : '' ) );
                    update_option( 'SCCBPP_cookie_consent_font_size', ((!empty($_POST['seers_fonts_fs'])) ? sanitize_text_field($_POST['seers_fonts_fs']) : '' ) );
                    update_option( 'SCCBPP_cookie_consent_button_type', ((!empty($_POST['selectedBtn'])) ? sanitize_text_field($_POST['selectedBtn']) : '' ) );
                    update_option( 'SCCBPP_cookie_consent_banner_position', ((get_option("SCCBPP_cookie_consent_banner_position") === 'google_banner') ? get_option("SCCBPP_cookie_consent_banner_position") : sanitize_text_field($_POST['seers_bannerposition']) ) );
                    
                    /*$wpdb->insert($wpdb->prefix . 'options', array(
                        'option_name' => 'SCCBPP_cookie_consent_is_active',
                        'option_value' => sanitize_text_field($_POST['banners']),
                    ));
    
                    $wpdb->insert($wpdb->prefix . 'options', array(
                        'option_name' => 'SCCBPP_cookie_consent_cookies_expiry',
                        'option_value' => intval( sanitize_text_field($_POST['cookies_expiry'])),
                    ));
                    $wpdb->insert($wpdb->prefix . 'options', array(
                        'option_name' => 'SCCBPP_cookie_consent_lang',
                        'option_value' => sanitize_text_field($_POST['cookies_lang']),
                    ));
    
                    $wpdb->insert($wpdb->prefix . 'options', array(
                        'option_name' => 'SCCBPP_cookie_consent_show_badge',
                        'option_value' => sanitize_text_field($_POST['show_badge']),
                    ));
    
                    $wpdb->insert($wpdb->prefix . 'options', array(
                        'option_name' => 'SCCBPP_cookie_consent_agree_btn_color',
                        'option_value' => sanitize_text_field($_POST['agree_btn_color']),
                    ));
                    $wpdb->insert($wpdb->prefix . 'options', array(
                        'option_name' => 'SCCBPP_cookie_consent_disagree_btn_color',
                        'option_value' => sanitize_text_field($_POST['disagree_btn_color']),
                    ));
                    $wpdb->insert($wpdb->prefix . 'options', array(
                        'option_name' => 'SCCBPP_cookie_consent_preferences_btn_color',
                        'option_value' => sanitize_text_field($_POST['agree_btn_color']),
                    ));
                    $wpdb->insert($wpdb->prefix . 'options', array(
                        'option_name' => 'SCCBPP_cookie_consent_banner_bg_color',
                        'option_value' => sanitize_text_field($_POST['banner_bg_color']),
                    ));
                    $wpdb->insert($wpdb->prefix . 'options', array(
                        'option_name' => 'SCCBPP_cookie_consent_body_text_color',
                        'option_value' => sanitize_text_field($_POST['body_text_color']),
                    ));
                    $wpdb->insert($wpdb->prefix . 'options', array(
                        'option_name' => 'SCCBPP_cookie_consent_agree_text_color',
                        'option_value' => sanitize_text_field($_POST['agree_text_color']),
                    ));
                    $wpdb->insert($wpdb->prefix . 'options', array(
                        'option_name' => 'SCCBPP_cookie_consent_disagree_text_color',
                        'option_value' => sanitize_text_field($_POST['disagree_text_color']),
                    ));
                    $wpdb->insert($wpdb->prefix . 'options', array(
                        'option_name' => 'SCCBPP_cookie_consent_preferences_text_color',
                        'option_value' => sanitize_text_field($_POST['preferences_text_color']),
                    ));
                    $wpdb->insert($wpdb->prefix . 'options', array(
                        'option_name' => 'SCCBPP_cookie_consent_body_text',
                        'option_value' => sanitize_text_field($_POST['body_text']),
                    ));
                    $wpdb->insert($wpdb->prefix . 'options', array(
                        'option_name' => 'SCCBPP_cookie_consent_accept_btn_text',
                        'option_value' => sanitize_text_field($_POST['accept_btn_text']),
                    ));
                    $wpdb->insert($wpdb->prefix . 'options', array(
                        'option_name' => 'SCCBPP_cookie_consent_reject_btn_text',
                        'option_value' => sanitize_text_field($_POST['reject_btn_text']),
                    ));
                    $wpdb->insert($wpdb->prefix . 'options', array(
                        'option_name' => 'SCCBPP_cookie_consent_setting_btn_text',
                        'option_value' => sanitize_text_field($_POST['setting_btn_text']),
                    ));
    
                    $wpdb->insert($wpdb->prefix . 'options', array(
                        'option_name' => 'SCCBPP_cookie_consent_font_style',
                        'option_value' => sanitize_text_field($_POST['seers_fonts_fm']),
                    ));
                    $wpdb->insert($wpdb->prefix . 'options', array(
                        'option_name' => 'SCCBPP_cookie_consent_font_size',
                        'option_value' => sanitize_text_field($_POST['seers_fonts_fs']),
                    ));
                    $wpdb->insert($wpdb->prefix . 'options', array(
                        'option_name' => 'SCCBPP_cookie_consent_button_type',
                        'option_value' => sanitize_text_field($_POST['selectedBtn']),
                    ));*/
                    //echo 'Settings has been updated successfully';
                    $result = array(
                        'resp_message'=> __("Settings has been updated successfully", $this->textdomain),
                        'accept_btn_text'=> $setting_options['accept_btn_text'],
                        'reject_btn_text'=> $setting_options['reject_btn_text'],
                        'setting_btn_text'=> $setting_options['setting_btn_text'],
                        'bodyText'=> $setting_options['body_text'],
                       );
                    
                    wp_send_json($result);
                    
                }

            }

        }
        //by Shoaib save cookies
        function save_cookie() {
            
            $cookie_name = $this->cookiename;
            //SCCBPP_cookie_consent_is_active
            $seersettingnonce = $_POST['savecooienonce'];
            
            if ( !isset($_POST['savecooienonce']) || !wp_verify_nonce( $seersettingnonce, 'seers-cooksave-call' ) ) {
                // This nonce is not valid. 
                $return = array(
                    'message'  => __('Security check failed.', $this->textdomain)
                );
                wp_send_json($return);
            } else {
                // The nonce was valid.
                // Do stuff here.

                if ($_POST['save'] && $_POST['save'] == 'n') {
                    $cookie_name = false;
                }
                
                update_option( 'SCCBPP_cookie_less_name', $cookie_name );
                
                $return = array(
                    'message'  => 'Cookie Saved'
                );
                wp_send_json($return);
            }
        }
        
        //by Shoaib login user form his seers login info
        function user_login() {
            
            $loginresponse = ["message" => ""];
            
            $useremail = "";
            $userpassword = "";
            $loginnonce = $_POST['seersloginonce'];
            //SCCBPP_cookie_consent_is_active
            
            if ( !isset($_POST['seersloginonce']) || !wp_verify_nonce( $loginnonce, 'seers-login-call' ) ) {
                // This nonce is not valid.
                $loginresponse["message"] = __( 'Security check failed.', $this->textdomain ); 
            } else {
                // The nonce was valid.
                // Do stuff here.
                
                if (!empty($_POST['email'])) {
                    $useremail = sanitize_text_field($_POST['email']);
                }

                if (!empty($_POST['password'])) {
                    $userpassword = sanitize_text_field($_POST['password']);
                }

                $loginresponse = $this->loginFromSeers($useremail, $userpassword);

                if (!empty($loginresponse->access_token)) {
                    //echo $loginresponse->access_token;
                    update_option( 'SCCBPP_cookie_userid_' . get_current_user_id() . '_pass', $userpassword );
                    update_option( 'SCCBPP_cookie_consent_savedomain', "do" );
                    update_option( 'SCCBPP_cookie_access_token', $loginresponse->access_token );
                }
            }
            
            
            
            wp_send_json($loginresponse);
        }
        
        public function SCCBPP_page_admin_actions()
        {
            add_menu_page('Cookie Consent', 'Seers Cookie Consent', 'manage_options', 'SCCBPP-cookie-consent', array($this, 'SCCBPP_admin'), 'dashicons-shield', 110);
        }

        public function SCCBPP_theme_name_scripts()
        {
            $cookie_consent_code = get_option('SCCBPP_cookie_consent_id');
            //for paid include this js other wise not include this js
            if ($cookie_consent_code) {
                
                $bannerid1 = get_option( 'SCCBPP_cookie_consent_bannerid_1', "" );
                $bannerid2 = get_option( 'SCCBPP_cookie_consent_bannerid_2', "" );
                $cdnbaseurl = get_option( 'SCCBPP_cookie_consent_cdnscripturl', "" );
                
                if (!empty($cdnbaseurl) && !empty($bannerid1) && !empty($bannerid2)) {
                    $seers_Tag = '<script data-key="' . $cookie_consent_code . '" data-name="CookieXray" src="' . $cdnbaseurl . 'banners/' . $bannerid1 . '/' . $bannerid2 . '/cb.js" type="text/javascript"></script>';
                } else if (!empty($bannerid1) && !empty($bannerid2)) {
                    $seers_Tag = '<script data-key="' . $cookie_consent_code . '" data-name="CookieXray" src="https://cdn.seersco.com/banners/' . $bannerid1 . '/' . $bannerid2 . '/cb.js" type="text/javascript"></script>';
                } else {
                    $seers_Tag = '<script data-key="' . $cookie_consent_code . '" data-name="CookieXray" src="https://cmp.seersco.com/script/cb.js" type="text/javascript"></script>';
                }
                        
                
                
                echo $seers_Tag;
            }
            //echo wp_kses($seers_Tag, array('script' => array('data-key' => array(), 'data-name' => array(), 'src' => array(), 'type' => array(),)));
        }
        
        //by Shoaib Jilani
        public function SCCBPP_theme_userinterface()
        {
            //if banner is active then show the banner
            $cookie_banner_active = get_option('SCCBPP_cookie_consent_is_active', true);
            $cookie_banner_cookieless = get_option('SCCBPP_cookie_less_name', false);
            
            if ($cookie_banner_active) {
                
                $showbadge = get_option("SCCBPP_cookie_consent_show_badge");
                $cookie_consent_code = get_option('SCCBPP_cookie_consent_id');
                
                if ($showbadge !== false && ($showbadge === 'true' || $showbadge === true) && ($cookie_consent_code === false || $cookie_consent_code === 'false' || empty($cookie_consent_code))) {
                    echo '<div class="seers-cmp-badge" id="SeersCMPBannerBadgeIcon" style="display: block;">
                        <img src="' . plugin_dir_url(dirname(__FILE__)) . 'seers-cookie-consent-banner-privacy-policy/images/seers-cmp-badge.svg" alt="seers cmp badge">
                    </div>';
                    
                    echo '<script>window.onload = Badgeclick();'
                    . 'function Badgeclick(e) {
                        let concentname = "SeersCMPConsent";
                        
                        document.getElementById("SeersCMPBannerBadgeIcon").onclick = function(){let seersbannerbar = document.getElementsByClassName("seers-cmp-banner-bar")[0];seersbannerbar.classList.remove("seers-cmp-banner-bar-hide");seersbannerbar.classList.remove("seers-cmp-banner-bar-hide-noanimation");
                        document.getElementById("SeersCMPBannerBadgeIcon").style.display = "none";
                        }

                    }'
                    . '</script>';
                }
                
                
                
                if ( !$cookie_consent_code ) {
                    
                    if ($showbadge !== false && ($showbadge === 'true' || $showbadge === true)) {
                        require_once plugin_dir_path(__FILE__) . 'templates/frontend-popup.php';
                        echo '<script>window.onload = seers_showconsentpopup_new();
                        function seers_showconsentpopup_new() {
                            let concentname = "SeersCMPConsent";

                            let isvalueset = localStorage.getItem(concentname);
                            var params = "action=savecookie&savecooienonce=' . wp_create_nonce( 'seers-cooksave-call' ) . '&save=n";

                            if (isvalueset) {
                                //now check if expry is empty then show popup again if there is expiry date then popup will shown after expiry.
                                let storval = JSON.parse(isvalueset);
                                let expirydat = storval.expiry.split("=");

                                if (expirydat.length === 1 && storval.expiry == "") {
                                    let seersbannerbar = document.getElementsByClassName("seers-cmp-banner-bar")[0];
                                    seersbannerbar.classList.remove("seers-cmp-banner-bar-hide");
                                    seersbannerbar.classList.remove("seers-cmp-banner-bar-hide-noanimation");
                                } else if (expirydat.length > 1) {
                                    var expirydate = new Date(expirydat[1]);
                                    var todaydate = new Date();

                                    if (expirydat[1] === "" || todaydate.getTime() > expirydate.getTime()) {

                                        let seersbannerbar = document.getElementsByClassName("seers-cmp-banner-bar")[0];
                                        seersbannerbar.classList.remove("seers-cmp-banner-bar-hide");
                                        seersbannerbar.classList.remove("seers-cmp-banner-bar-hide-noanimation");

                                    }
                                }

                            } else { 
                                let seersbannerbar = document.getElementsByClassName("seers-cmp-banner-bar")[0];
                                seersbannerbar.classList.remove("seers-cmp-banner-bar-hide");
                                seersbannerbar.classList.remove("seers-cmp-banner-bar-hide-noanimation");
                            }


                        }</script>';
                    } else {
                        require_once plugin_dir_path(__FILE__) . 'templates/frontend-popup.php';
                        echo '<script>window.onload = seers_showconsentpopup();
                        function seers_showconsentpopup()  {
                            let concentname = "SeersCMPConsent";

                            let isvalueset = localStorage.getItem(concentname);
                            var params = "action=savecookie&savecooienonce=' . wp_create_nonce( 'seers-cooksave-call' ) . '&save=n";

                            console.log("Local Storage value = ", isvalueset);

                            if (isvalueset) {
                                //now check if expry is empty then show popup again if there is expiry date then popup will shown after expiry.
                                let storval = JSON.parse(isvalueset);
                                let expirydat = storval.expiry.split("=");

                                if (expirydat.length === 1 && storval.expiry == "") {
                                    let seersbannerbar = document.getElementsByClassName("seers-cmp-banner-bar")[0];
                                    seersbannerbar.classList.remove("seers-cmp-banner-bar-hide");
                                    seersbannerbar.classList.remove("seers-cmp-banner-bar-hide-noanimation");
                                } else if (expirydat.length > 1) {
                                    var expirydate = new Date(expirydat[1]);
                                    var todaydate = new Date();

                                    if (expirydat[1] === "" || todaydate.getTime() > expirydate.getTime()) {
                                        console.log("The first if");

                                        let seersbannerbar = document.getElementsByClassName("seers-cmp-banner-bar")[0];
                                        seersbannerbar.classList.remove("seers-cmp-banner-bar-hide");
                                        seersbannerbar.classList.remove("seers-cmp-banner-bar-hide-noanimation");

                                    } else if (expirydat[1] !== "" || todaydate.getTime() < expirydate.getTime()) {
                                        console.log("The first else if");
                                        let seersbannerbar = document.getElementsByClassName("seers-cmp-banner-bar")[0];
                                        seersbannerbar.classList.add("seers-cmp-banner-bar-hide");
                                        seersbannerbar.classList.add("seers-cmp-banner-bar-hide-noanimation");
                                    }
                                }

                            } else { 
                                let seersbannerbar = document.getElementsByClassName("seers-cmp-banner-bar")[0];
                                seersbannerbar.classList.remove("seers-cmp-banner-bar-hide");
                                seersbannerbar.classList.remove("seers-cmp-banner-bar-hide-noanimation");
                            }


                        }</script>';
                    }
                }
            }
        }

        public function SCCBPP_get_userplan () {

            $cookie_consent_url = get_option("SCCBPP_cookie_consent_url", "");
            $cookie_consent_email = get_option("SCCBPP_cookie_consent_email", "");
            $cookie_consent_code = get_option('SCCBPP_cookie_consent_id', "");


            if (($cookie_consent_url != '') && ($cookie_consent_email != '') && ($cookie_consent_code != '')) {
                
                $accesstoken = get_option( 'SCCBPP_cookie_access_token' );
                $showloginpopup = 'no';
                
                if (!$accesstoken) {
                    
                    $filterurl = $this->removeProtocol($cookie_consent_url);
                    $loginresponse = $this->loginFromSeers($cookie_consent_email, $filterurl);
                    // if accesstoken is in response
                    if (!empty($loginresponse->access_token)) {
                        //echo $loginresponse->access_token;
                        $accesstoken = $loginresponse->access_token;
                        update_option( 'SCCBPP_cookie_access_token', $loginresponse->access_token );
                    } else if (!empty($loginresponse->message)) {
                        //echo $loginresponse->message;
                        if (stripos($loginresponse->message, "Ask for password") !== false) {
                            // now check if we have already some password saved
                            $savedpassword = get_option( 'SCCBPP_cookie_userid_' . get_current_user_id() . '_pass');
                            
                            if ($savedpassword) {
                                $loginresponse = $this->loginFromSeers($cookie_consent_email, $savedpassword);
                                
                                if (!empty($loginresponse->access_token)) {
                                    //echo $loginresponse->access_token;
                                    update_option( 'SCCBPP_cookie_access_token', $loginresponse->access_token );
                                    $accesstoken = $loginresponse->access_token;
                                    $showloginpopup = 'no';
                                } else if (!empty($loginresponse->message)) {
                                    
                                    if (stripos($loginresponse->message, "Ask for password") !== false) {
                                        $showloginpopup = 'yes';
                                    } else {
                                        $showloginpopup = 'no';
                                    }
                                    
                                    
                                }
                                
                            } else {
                                $showloginpopup = 'yes';
                            }
                            
                            
                        } else {
                            $showloginpopup = 'no';
                        }


                    }
                    
                }
                
                if ($showloginpopup === 'yes') {
                    update_option( 'SCCBPP_cookie_consent_showloginpopup', 'show' );
                    update_option( 'SCCBPP_cookie_consent_resumeloginpro', 'show' );
                }
                
                if ($accesstoken) {
                    
                    $message = "";
                    
                    global $wpdb;
                    $prefix = $wpdb->prefix;
                    $postData = array(
                        'domain' => $cookie_consent_url,
                        'email' => $cookie_consent_email,
                        'platform' => 'wordpress',
                        'lang' => ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale()),
                    );
                    $request_headers = array(
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                        'Referer' => $cookie_consent_url,
                    );
                    
                    if ($accesstoken) {
                        $request_headers = array(
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                            'Referer' => $cookie_consent_url,
                            'Authorization' => 'Bearer ' . $accesstoken
                        );
                    }
                    
                    $url = $this->apibaseurl . "save-domain-credentials";
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

                    if ( !is_wp_error( $result ) ) {

                        $keyResponse = json_decode($result['body']);

                        if (!empty($keyResponse->message)) {
                            //$message = $result['response']['message'];
                            $message = $keyResponse->message;

                            update_option('SCCBPP_cookie_consent_msg', $message);

                        }
                        
                        if (stripos($message, "Unauthenticated") !== false) {
                            update_option( 'SCCBPP_cookie_consent_showloginpopup', 'show' );
                        } else {
                            if (!empty($result['response']['message']) && strtolower($result['response']['message']) != 'ok') {
                                //now there is error message now update the email and cookie_consent_id
                                update_option('SCCBPP_cookie_consent_id', '');
                                update_option('SCCBPP_cookie_consent_email', $cookie_consent_email);
                                update_option('SCCBPP_cookie_consent_url', $cookie_consent_url);
                                update_option( 'SCCBPP_cookie_consent_userplan', "" );
                            }

                            if (!empty($keyResponse->key)) {                       
                                //by Shoaib if userplan then save it in db options
                                //This user_plan element only handle in newer versions of this plugin
                                update_option('SCCBPP_cookie_consent_id', $keyResponse->key);
                                if (!empty($keyResponse->user_plan)) {
                                    update_option( 'SCCBPP_cookie_consent_userplan', $keyResponse->user_plan );
                                }

                                if (!empty($keyResponse->user_id)) {
                                    update_option( 'SCCBPP_cookie_consent_bannerid_1', ((!empty($keyResponse->user_id)) ? intval($keyResponse->user_id) : '' ) );
                                } else {
                                    update_option( 'SCCBPP_cookie_consent_bannerid_1', "" );
                                }

                                if (!empty($keyResponse->domain_id)) {
                                    update_option( 'SCCBPP_cookie_consent_bannerid_2', ((!empty($keyResponse->domain_id)) ? intval($keyResponse->domain_id) : '' ) );
                                } else {
                                    update_option( 'SCCBPP_cookie_consent_bannerid_2', "" );
                                }
                                
                                if (!empty($keyResponse->cdnbaseurl)) {
                                    update_option( 'SCCBPP_cookie_consent_cdnscripturl', ((!empty($keyResponse->cdnbaseurl)) ? intval($keyResponse->cdnbaseurl) : '' ) );
                                } else {
                                    update_option( 'SCCBPP_cookie_consent_cdnscripturl', "" );
                                }
                            }
                        }
                        
                        

                    }
                    
                    if (stripos($message, "Unauthenticated") !== false) {
                        update_option( 'SCCBPP_cookie_consent_showloginpopup', 'show' );
                    } else if (current_user_can( 'customize' )) {
                        
                        // now also get the changes of banners from seersco.com
                        $postData = array(
                            'domain' => $cookie_consent_url,
                            'email' => $cookie_consent_email,
                            'platform' => 'wordpress',
                            'lang' => ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale())
                        );

                        $request_headers = array(
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                            'Referer' => $cookie_consent_url,
                        );

                        if ($accesstoken) {
                            $request_headers = array(
                                'Content-Type' => 'application/json',
                                'Accept' => 'application/json',
                                'Referer' => $cookie_consent_url,
                                'Authorization' => 'Bearer ' . $accesstoken
                            );
                        }

                        $url = $this->apibaseurl . "get-banner-settings";
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


                        if ( !is_wp_error( $result ) ) {
                            $response = json_decode($result['body']);

                            $seerscosettings = $response->bannersettings;
                            $seerscosettingsbanner = $response->bannersettingsbanners;

                            /*print_r($seerscosettings);
                            echo "<br> --- settings banners .-------<br>";
                            print_r($seerscosettingsbanner);
                            exit();*/

                            // now update our banners settings to the live settings of seersco.com
                            update_option( 'SCCBPP_cookie_consent_is_active', (($seerscosettings && isset($seerscosettings->is_active)) ? $seerscosettings->is_active : get_option("SCCBPP_cookie_consent_is_active", 0) ) );
                            update_option( 'SCCBPP_cookie_consent_cookies_expiry', (($seerscosettings && isset($seerscosettings->agreement_expire)) ? $seerscosettings->agreement_expire : get_option("SCCBPP_cookie_consent_cookies_expiry", 0) ) );
                            update_option( 'SCCBPP_cookie_consent_lang', ((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale()) );
                            update_option( 'SCCBPP_cookie_consent_show_badge', (($seerscosettings && isset($seerscosettings->has_badge)) ? (($seerscosettings->has_badge) ? 'true' : 'false' ) : ((get_option("SCCBPP_cookie_consent_show_badge", "")) ? 'true' : 'false' ) ) );
                            update_option( 'SCCBPP_cookie_consent_agree_btn_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->agree_btn_color)) ? trim($seerscosettingsbanner->agree_btn_color) : get_option("SCCBPP_cookie_consent_agree_btn_color", "#3B6EF8") ) );
                            update_option( 'SCCBPP_cookie_consent_disagree_btn_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->disagree_btn_color)) ? trim($seerscosettingsbanner->disagree_btn_color) : get_option("SCCBPP_cookie_consent_disagree_btn_color", '#3B6EF8') ) );
                            update_option( 'SCCBPP_cookie_consent_preferences_btn_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->preferences_btn_color)) ? trim($seerscosettingsbanner->preferences_btn_color) : get_option("SCCBPP_cookie_consent_preferences_btn_color", '#FFFFFF') ) );
                            update_option( 'SCCBPP_cookie_consent_banner_bg_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->banner_bg_color)) ? trim($seerscosettingsbanner->banner_bg_color) : get_option("SCCBPP_cookie_consent_banner_bg_color", '#FFFFFF') ) );
                            update_option( 'SCCBPP_cookie_consent_body_text_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->body_text_color)) ? trim($seerscosettingsbanner->body_text_color) : get_option("SCCBPP_cookie_consent_body_text_color", '#000000') ) );
                            update_option( 'SCCBPP_cookie_consent_agree_text_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->agree_text_color)) ? trim($seerscosettingsbanner->agree_text_color) : get_option("SCCBPP_cookie_consent_agree_text_color", '#FFFFFF') ) );
                            update_option( 'SCCBPP_cookie_consent_disagree_text_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->disagree_text_color)) ? trim($seerscosettingsbanner->disagree_text_color) : get_option("SCCBPP_cookie_consent_disagree_text_color", '#FFFFFF') ) );
                            update_option( 'SCCBPP_cookie_consent_preferences_text_color', (($seerscosettingsbanner && !empty($seerscosettingsbanner->preferences_text_color)) ? trim($seerscosettingsbanner->preferences_text_color) : get_option("SCCBPP_cookie_consent_preferences_text_color", '#000000') ) );
                            update_option( 'SCCBPP_cookie_consent_body_text', (($seerscosettings && !empty($seerscosettings->body)) ? $seerscosettings->body : get_option("SCCBPP_cookie_consent_body_text", '') ) );
                            update_option( 'SCCBPP_cookie_consent_accept_btn_text', (($seerscosettings && !empty($seerscosettings->btn_agree_title)) ? $seerscosettings->btn_agree_title : get_option("SCCBPP_cookie_consent_accept_btn_text", '') ) );
                            update_option( 'SCCBPP_cookie_consent_reject_btn_text', (($seerscosettings && !empty($seerscosettings->btn_disagree_title)) ? $seerscosettings->btn_disagree_title : get_option("SCCBPP_cookie_consent_reject_btn_text", '') ) );
                            update_option( 'SCCBPP_cookie_consent_setting_btn_text', (($seerscosettings && !empty($seerscosettings->btn_preference_title)) ? $seerscosettings->btn_preference_title : get_option("SCCBPP_cookie_consent_setting_btn_text", '') ) );
                            update_option( 'SCCBPP_cookie_consent_font_style', (($seerscosettingsbanner && !empty($seerscosettingsbanner->font_style)) ? $seerscosettingsbanner->font_style : get_option("SCCBPP_cookie_consent_font_style", '') ) );
                            update_option( 'SCCBPP_cookie_consent_font_size', (($seerscosettingsbanner && !empty($seerscosettingsbanner->font_size)) ? $seerscosettingsbanner->font_size : get_option("SCCBPP_cookie_consent_font_size", '') ) );
                            update_option( 'SCCBPP_cookie_consent_button_type', (($seerscosettingsbanner && !empty($seerscosettingsbanner->button_type)) ? $seerscosettingsbanner->button_type : get_option("SCCBPP_cookie_consent_button_type", '') ) );
                            update_option( 'SCCBPP_cookie_consent_banner_position', (($seerscosettingsbanner && !empty($seerscosettingsbanner->position) && $seerscosettingsbanner->is_active > 0) ? $seerscosettingsbanner->position : (($seerscosettings && $seerscosettingsbanner->is_active === 0) ? "google_banner" : get_option("SCCBPP_cookie_consent_banner_position", 'seers-cmp-banner-bar') )  ) );

                            // new changes on phase 2 advance features
                            update_option( 'SCCBPP_cookie_consent_child_privacy', (($seerscosettings && !empty($seerscosettings->child_privacy)) ? (($seerscosettings->child_privacy) ? 'true' : 'false' ) : get_option("SCCBPP_cookie_consent_child_privacy", 'false') ) );
                            update_option( 'SCCBPP_do_not_track', (($seerscosettings && !empty($seerscosettings->do_not_track)) ? (($seerscosettings->do_not_track) ? 'true' : 'false' ) : get_option("SCCBPP_do_not_track", 'false') ) );
                            update_option( 'SCCBPP_cookie_consent_iab_tcf', (($seerscosettings && !empty($seerscosettings->iab_tcf)) ? (($seerscosettings->iab_tcf) ? 'true' : 'false' ) : get_option("cookie_consent_iab_tcf", 'false') ) );
                            update_option( 'SCCBPP_cookie_consent_do_not_sell', (($seerscosettings && !empty($seerscosettings->do_not_sell)) ? (($seerscosettings->do_not_sell) ? 'true' : 'false' ) : get_option("SCCBPP_cookie_consent_do_not_sell", 'false') ) );
                            update_option( 'SCCBPP_cookie_consent_global_privacy_control', (($seerscosettings && !empty($seerscosettings->global_privacy_control)) ? (($seerscosettings->global_privacy_control) ? 'true' : 'false' ) : get_option("SCCBPP_cookie_consent_global_privacy_control", 'false') ) );                            update_option( 'SCCBPP_cookie_consent_google_consent', (($seerscosettings && !empty($seerscosettings->apply_google_consent)) ? (($seerscosettings->apply_google_consent) ? 'true' : 'false' ) : get_option("SCCBPP_cookie_consent_google_consent", 'false') ) );
                            update_option( 'SCCBPP_cookie_consent_facebook_consent', (($seerscosettings && !empty($seerscosettings->apply_facebook_consent)) ? (($seerscosettings->apply_facebook_consent) ? 'true' : 'false' ) : get_option("SCCBPP_cookie_consent_facebook_consent", 'false') ) );
                            update_option( 'SCCBPP_cookie_consent_logo_status', (($seerscosettings && !empty($seerscosettings->logo_status)) ? $seerscosettings->logo_status : get_option("SCCBPP_cookie_consent_logo_status", 'seers') ) );
                            update_option( 'SCCBPP_cookie_consent_auto_block_vendor', (($seerscosettings && !empty($seerscosettings->auto_block_vendor)) ? (($seerscosettings->auto_block_vendor) ? 'true' : 'false' ) : get_option("SCCBPP_cookie_consent_auto_block_vendor", 'false') ) );

                            update_option('SCCBPP_cookie_consent_enable_policy', (($seerscosettings && !empty($seerscosettings->cookie_policy_url)) ? "true" : get_option("SCCBPP_cookie_consent_enable_policy", "") ));
                            update_option('SCCBPP_cookie_consent_policy_declaration_url', (($seerscosettings && !empty($seerscosettings->cookie_policy_url)) ? $seerscosettings->cookie_policy_url : get_option("SCCBPP_cookie_consent_policy_declaration_url", "") ));
                        }
                        
                    }

                    
                    
                }
                
            }
        }
        
        public function SCCBPP_wplang_preupdate ( $new_value, $old_value  ) {
            
            if (strcmp($new_value, $old_value) !== 0) {
                
                $this->SCCBPP_remove_languages("removepossettapi");
            
                $cookie_consent_url = get_option('SCCBPP_cookie_consent_url');
                $cookie_consent_email = get_option('SCCBPP_cookie_consent_email');

                if (($cookie_consent_url != '') && ($cookie_consent_email != '')) {
                    
                    $accesstoken = get_option( 'SCCBPP_cookie_access_token' );
                
                    if (!$accesstoken) {

                        $filterurl = $this->removeProtocol($cookie_consent_url);
                        $loginresponse = $this->loginFromSeers($cookie_consent_email, $cookie_consent_url);
                        // if accesstoken is in response
                        if (!empty($loginresponse->access_token)) {
                            //echo $loginresponse->access_token;
                            $accesstoken = $loginresponse->access_token;
                            update_option( 'SCCBPP_cookie_access_token', $loginresponse->access_token );
                        } else if (!empty($loginresponse->message)) {
                            //echo $loginresponse->message;
                            if (stripos($loginresponse->message, "Ask for password") !== false) {
                                // now check if we have already some password saved
                                $savedpassword = get_option( 'SCCBPP_cookie_userid_' . get_current_user_id() . '_pass');

                                if ($savedpassword) {
                                    $loginresponse = $this->loginFromSeers($cookie_consent_email, $savedpassword);

                                    if (!empty($loginresponse->access_token)) {
                                        //echo $loginresponse->access_token;
                                        update_option( 'SCCBPP_cookie_access_token', $loginresponse->access_token );
                                        $accesstoken = $loginresponse->access_token;
                                        $showloginpopup = 'no';
                                        $alreadyexistinseers = 'yes';
                                    } else if (!empty($loginresponse->message)) {

                                        if (stripos($loginresponse->message, "Ask for password") !== false) {
                                            $showloginpopup = 'yes';
                                            $alreadyexistinseers = 'yes';
                                        } else {
                                            $showloginpopup = 'no';
                                            $alreadyexistinseers = 'no';
                                        }


                                    }

                                } else {
                                    $showloginpopup = 'yes';
                                    $alreadyexistinseers = 'yes';
                                }


                            } else {
                                $showloginpopup = 'no';
                                $alreadyexistinseers = 'no';
                            }


                        }

                    }
                    
                    if ($accesstoken) {
                        
                        $result ='';
                        $privacyenabled = get_option('SCCBPP_cookie_consent_enable_policy');
                        $postData = array(
                            'domain' => $cookie_consent_url,
                            'email' => $cookie_consent_email,
                            'platform' => 'wordpress',

                            'agree_btn_color'=> get_option('SCCBPP_cookie_consent_agree_btn_color', '#3B6EF8'),
                            'disagree_btn_color'=> get_option('SCCBPP_cookie_consent_disagree_btn_color', '#3B6EF8'),
                            'preferences_btn_color'=> get_option('SCCBPP_cookie_consent_preferences_btn_color', '#FFFFFF'),
                            'banner_bg_color'=> get_option('SCCBPP_cookie_consent_banner_bg_color', '#FFFFFF'),

                            'body_text_color'=> get_option('SCCBPP_cookie_consent_body_text_color', '#000000'),
                            'agree_text_color'=> get_option('SCCBPP_cookie_consent_agree_text_color', '#FFFFFF'),
                            'disagree_text_color'=> get_option('SCCBPP_cookie_consent_disagree_text_color', '#FFFFFF'),
                            'preferences_text_color'=> get_option('SCCBPP_cookie_consent_preferences_text_color', '#000000'),

                            'font_style'=> get_option('SCCBPP_cookie_consent_font_style', ''),
                            'font_size'=> get_option('SCCBPP_cookie_consent_font_size', ''),
                            'button_type'=> get_option('SCCBPP_cookie_consent_button_type', ''),
                            'banner_position'=> ((get_option("SCCBPP_cookie_consent_banner_position") === 'google_banner') ? get_option("SCCBPP_cookie_consent_banner_position") : sanitize_text_field($_POST['seers_bannerposition']) ),

                            'is_active' => ((get_option('SCCBPP_cookie_consent_is_active', 1)) ? "true" : "false"),
                            'show_badge'=> get_option('SCCBPP_cookie_consent_show_badge', ''),
                            'cookies_expiry' => get_option('SCCBPP_cookie_consent_cookies_expiry', 0),


                            //'logo_bg_color'=>sanitize_text_field($_POST['logo_bg_color']),
                            'lang'=> $new_value,

                            'body_text'=> get_option('SCCBPP_cookie_consent_body_text', __("We use cookies to ensure you get the best experience", $this->textdomain)),
                            'accept_btn_text'=> get_option('SCCBPP_cookie_consent_accept_btn_text', __("Allow All", $this->textdomain)),
                            'reject_btn_text'=> get_option('SCCBPP_cookie_consent_reject_btn_text', __("Disable All", $this->textdomain)),
                            'setting_btn_text'=> get_option('SCCBPP_cookie_consent_setting_btn_text', __("Preference", $this->textdomain)),
                            'policy_url'=> (($privacyenabled && $privacyenabled !== 'false') ? get_option('SCCBPP_cookie_consent_policy_declaration_url', "") : "" )
                        );
                        $request_headers = array(
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                            'Referer' => $cookie_consent_url,
                        );

                        if ($accesstoken) {
                            $request_headers = array(
                                'Content-Type' => 'application/json',
                                'Accept' => 'application/json',
                                'Referer' => $cookie_consent_url,
                                'Authorization' => 'Bearer ' . $accesstoken
                            );
                        }


                        $url = $this->apibaseurl . "update-banner-customization";
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

                        if ( !is_wp_error( $result ) ) {
                            $response = json_decode($result['body']);
                            
                            if (!empty($response->message) && stripos($response->message, "Unauthenticated") !== false) {
                                update_option( 'SCCBPP_cookie_consent_showloginpopup', 'show' );
                            } else {
                                
                                if($response->message=='Settings has been updated successfully'){

                                    update_option( 'SCCBPP_cookie_consent_lang', $new_value );


                                }

                                if (!empty($response->user_id)) {
                                    update_option( 'SCCBPP_cookie_consent_bannerid_1', ((!empty($response->user_id)) ? intval($response->user_id) : '' ) );
                                } else {
                                    update_option( 'SCCBPP_cookie_consent_bannerid_1', "" );
                                }

                                if (!empty($response->domain_id)) {
                                    update_option( 'SCCBPP_cookie_consent_bannerid_2', ((!empty($response->domain_id)) ? intval($response->domain_id) : '' ) );
                                } else {
                                    update_option( 'SCCBPP_cookie_consent_bannerid_2', "" );
                                }
                                
                                if (!empty($keyResponse->cdnbaseurl)) {
                                    update_option( 'SCCBPP_cookie_consent_cdnscripturl', ((!empty($keyResponse->cdnbaseurl)) ? intval($keyResponse->cdnbaseurl) : '' ) );
                                } else {
                                    update_option( 'SCCBPP_cookie_consent_cdnscripturl', "" );
                                }
                                
                            }
                        }
                        
                    }
                }
                
            }
            
            
            
            return $new_value;
            
        }
        
        public function SCCBPP_remove_languages($locale="") {
            
            
            if ( !empty($locale) && strcmp($locale, "removepos") === 0 && strcmp($locale, get_option('SCCBPP_cookie_consent_lang')) !== 0 ) {
                $languagespath = WP_CONTENT_DIR . '/languages/plugins/';
                $files = glob($languagespath. $this->textdomain .'*');
                foreach ($files as $file) {
                    unlink($file);
                }
            } else if ( !empty($locale) && strcmp($locale, "removepossettapi") === 0 && strcmp($locale, get_option('SCCBPP_cookie_consent_lang')) !== 0 ) {
                $languagespath = WP_CONTENT_DIR . '/languages/plugins/';
                $files = glob($languagespath. $this->textdomain .'*');
                foreach ($files as $file) {
                    unlink($file);
                }
            }
        }
        
        public function SCCBPP_upgrade_completed(  ){
            //update.php?action=upload-plugin&package=9&overwrite=update-plugin&_wpnonce=978d2c4eff
            
            //if wp default banner seetings are not created in db then crete this option with value 'default'
            if (get_option('SCCBPP_cookie_consent_defaultsettings') === false) {
                update_option('SCCBPP_cookie_consent_defaultsettings', 'default');
            }
            
            if ( !empty($_GET['action']) && !empty($_GET['overwrite']) && strcmp($_GET['action'], 'upload-plugin') === 0 && strcmp($_GET['overwrite'] , 'update-plugin') === 0 ) {
                // remove languages files if current posted language is change then the saved
                     $this->SCCBPP_remove_languages("removepos");
            }
        }
        
        public function SCCBPP_async_langupdate ($update, $language_update) {
            return false;
        }
        
        public function SCCBPP_policy_update ( $policyurl  ) {
            
            $cookie_consent_url = get_option('SCCBPP_cookie_consent_url');
            $cookie_consent_email = get_option('SCCBPP_cookie_consent_email');

            if (($cookie_consent_url != '') && ($cookie_consent_email != '')) {
                
                $accesstoken = get_option( 'SCCBPP_cookie_access_token' );
                
                if (!$accesstoken) {

                    $filterurl = $this->removeProtocol($cookie_consent_url);
                    $loginresponse = $this->loginFromSeers($cookie_consent_email, $cookie_consent_url);
                    // if accesstoken is in response
                    if (!empty($loginresponse->access_token)) {
                        //echo $loginresponse->access_token;
                        $accesstoken = $loginresponse->access_token;
                        update_option( 'SCCBPP_cookie_access_token', $loginresponse->access_token );
                        $showloginpopup = 'no';
                        $alreadyexistinseers = 'yes';
                    } else if (!empty($loginresponse->message)) {
                        //echo $loginresponse->message;
                        if (stripos($loginresponse->message, "Ask for password") !== false) {
                            // now check if we have already some password saved
                            $savedpassword = get_option( 'SCCBPP_cookie_userid_' . get_current_user_id() . '_pass');

                            if ($savedpassword) {
                                $loginresponse = $this->loginFromSeers($cookie_consent_email, $savedpassword);

                                if (!empty($loginresponse->access_token)) {
                                    //echo $loginresponse->access_token;
                                    update_option( 'SCCBPP_cookie_access_token', $loginresponse->access_token );
                                    $accesstoken = $loginresponse->access_token;
                                    $showloginpopup = 'no';
                                    $alreadyexistinseers = 'yes';
                                } else if (!empty($loginresponse->message)) {

                                    if (stripos($loginresponse->message, "Ask for password") !== false) {
                                        $showloginpopup = 'yes';
                                        $alreadyexistinseers = 'yes';
                                    } else {
                                        $showloginpopup = 'no';
                                        $alreadyexistinseers = 'no';
                                    }


                                }

                            } else {
                                $showloginpopup = 'yes';
                                $alreadyexistinseers = 'yes';
                            }


                        } else {
                            $showloginpopup = 'no';
                            $alreadyexistinseers = 'no';
                        }


                    }

                }
                    
                if ($accesstoken && $showloginpopup === 'no') {
                    
                    $result ='';
                    $postData = array(
                        'domain' => $cookie_consent_url,
                        'email' => $cookie_consent_email,
                        'platform' => 'wordpress',

                        'agree_btn_color'=> get_option('SCCBPP_cookie_consent_agree_btn_color', '#3B6EF8'),
                        'disagree_btn_color'=> get_option('SCCBPP_cookie_consent_disagree_btn_color', '#3B6EF8'),
                        'preferences_btn_color'=> get_option('SCCBPP_cookie_consent_preferences_btn_color', '#FFFFFF'),
                        'banner_bg_color'=> get_option('SCCBPP_cookie_consent_banner_bg_color', '#FFFFFF'),

                        'body_text_color'=> get_option('SCCBPP_cookie_consent_body_text_color', '#000000'),
                        'agree_text_color'=> get_option('SCCBPP_cookie_consent_agree_text_color', '#FFFFFF'),
                        'disagree_text_color'=> get_option('SCCBPP_cookie_consent_disagree_text_color', '#FFFFFF'),
                        'preferences_text_color'=> get_option('SCCBPP_cookie_consent_preferences_text_color', '#000000'),

                        'font_style'=> get_option('SCCBPP_cookie_consent_font_style', ''),
                        'font_size'=> get_option('SCCBPP_cookie_consent_font_size', ''),
                        'button_type'=> get_option('SCCBPP_cookie_consent_button_type', ''),
                        'banner_position'=> ((get_option("SCCBPP_cookie_consent_banner_position") === 'google_banner') ? get_option("SCCBPP_cookie_consent_banner_position") : sanitize_text_field($_POST['seers_bannerposition']) ),

                        'is_active' => ((get_option('SCCBPP_cookie_consent_is_active', 1)) ? "true" : "false"),
                        'show_badge'=> get_option('SCCBPP_cookie_consent_show_badge', ''),
                        'cookies_expiry' => get_option('SCCBPP_cookie_consent_cookies_expiry', 0),


                        //'logo_bg_color'=>sanitize_text_field($_POST['logo_bg_color']),
                        'lang'=>((version_compare($this->wpcurversion,'4.7.0', '>=')) ? get_user_locale() : get_locale()),

                        'body_text'=> get_option('SCCBPP_cookie_consent_body_text', __("We use cookies to ensure you get the best experience", $this->textdomain)),
                        'accept_btn_text'=> get_option('SCCBPP_cookie_consent_accept_btn_text', __("Allow All", $this->textdomain)),
                        'reject_btn_text'=> get_option('SCCBPP_cookie_consent_reject_btn_text', __("Disable All", $this->textdomain)),
                        'setting_btn_text'=> get_option('SCCBPP_cookie_consent_setting_btn_text', __("Preference", $this->textdomain)),
                        'policy_url'=> $policyurl
                    );
                    $request_headers = array(
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                        'Referer' => $cookie_consent_url,
                    );
                    
                    if ($accesstoken) {
                        $request_headers = array(
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json',
                            'Referer' => $cookie_consent_url,
                            'Authorization' => 'Bearer ' . $accesstoken
                        );
                    }


                    $url = $this->apibaseurl . "update-banner-customization";
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
                    
                }
            }
            
        }
        
        /**
        * removes the protocol and extra slashes from the domain.
        * @param $URL
        * @return string
        */
       private function removeProtocol($URL) {
           $remove = ["http://", "https://", "www.", "WWW."];
           $final_url =  str_replace($remove, "", $URL);
           if (strpos($final_url, '/') !== false) {
               $final_url = explode('/', $final_url);
               return $final_url[0];
           } else {
               return $final_url;
           }
       }
       
       private function loginFromSeers ($username, $password) {
           
           $resobj = '';
           $postData = array(
                'email' => $username,
                'password' => $password
            );
            $request_headers = array(
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            );
            $url = $this->apibaseurl . "login";
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

            /*print_r($result['body']);
            if ( is_wp_error( $result ) ) {
                echo "<br> ----------------- <br>";
                echo "Error on result.... <br>";
            }
            exit();*/

            if ( !is_wp_error( $result ) ) {

                $resobj =  json_decode($result['body']);
            } else {
                $resobj =  ["message" => $result->get_error_message()];
            }
            
            return $resobj;
           
       }


    }


    $seersCookieConsentPlugin = new SCCBPP_WpCookie_Save();

    load_plugin_textdomain($seersCookieConsentPlugin->textdomain, true, basename(dirname(__FILE__)) . '/languages/');
    
    $seersCookieConsentPlugin->register();

    //activation
    require_once plugin_dir_path(__FILE__) . 'inc/seers-cookie-consent-plugin-activate.php';
    register_activation_hook(__FILE__, array('SeersCookieConsentPluginActivate', 'activate'));

    //deactivation
    require_once plugin_dir_path(__FILE__) . 'inc/seers-cookie-consent-plugin-deactivate.php';
    register_deactivation_hook(__FILE__, array('SeersCookieConsentPluginDeactivate','deactivate'));





}
