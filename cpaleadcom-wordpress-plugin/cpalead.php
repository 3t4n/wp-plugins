<?php

    /*
        Plugin Name: CPAlead Ads
        Description: This plugin will allow you to add content locker on any page/post or category you would like.
        Version: 4.4
        Author: CPAlead
        Author URI: http://www.cpalead.com/
    */

    register_activation_hook(__FILE__, 'my_gateway_install');
    register_activation_hook(__FILE__, 'installAdTbl');
    add_action('admin_menu', 'my_gateway_menu');

    define("MAIN_URL", "https://www.cpalead.com/");
    define("API_URL", "https://www.cpalead.com/ad_banners_api.php");
    define("BANNERS_URL", "https://trklvs.com/contact.html");
    define("SUPERLINK_URL", "https://trklvs.com/index.html");
    define("SCRIPTS_URL", "https://trklvs.com/track.html");
    define("OFFERWALL_URL", "https://trklvs.com/");

    function fetchApi($url)
    {
        $data = array();
        $response = wp_remote_post($url, array('data' => $data, 'timeout' => 300));
        return $response['body'];
    }

    if (!function_exists('my_gateway_menu')) 
    {
        function my_gateway_menu() 
        {
            add_menu_page(__('CPAlead Options', 'textdomain'), 'CPAlead Ads', 'manage_options', 'CPAlead', 'my_gateway_options', plugins_url('cpaleadcom-wordpress-plugin/img/icon.png'), 3);

            add_submenu_page('Edit banner', 'Edit Banner Ad', 'Edit Banner Ad', 'manage_options', 'edit_banner_ad', 'pageEditBannerAd', 0);
            add_submenu_page('Edit publisher ID', 'Edit Publisher ID', 'Edit Publisher ID', 'manage_options', 'set_pub_id', 'pageEditPublisherId', 0);

            add_submenu_page('CPAlead', 'Add Banners', 'Add Banners', 'manage_options', 'add_banner_ad', 'pageAddBannerAd', 1);
            add_submenu_page('CPAlead', 'Add CustomAd', 'Add CustomAd', 'manage_options', 'add_custom_ad', 'pageAddBannerAd', 2);
            add_submenu_page('CPAlead', 'Add PopUnder', 'Add PopUnder', 'manage_options', 'add_pop_under_ad', 'pageAddBannerAd', 3);
            add_submenu_page('CPAlead', 'Add Interstitial', 'Add Interstitial', 'manage_options', 'add_interstitial_ad', 'pageAddBannerAd', 4);
            add_submenu_page('CPAlead', 'Add Superlink', 'Add Superlink', 'manage_options', 'add_superlink_ad', 'pageAddBannerAd', 5);
            add_submenu_page('CPAlead', 'Add PushUp', 'Add PushUp', 'manage_options', 'add_push_up_ad', 'pageAddBannerAd', 6);
            add_submenu_page('CPAlead', 'Add Locker', 'Add Locker', 'manage_options', 'add_locker', 'pageAddBannerAd', 7);
            add_submenu_page('CPAlead', 'Add OfferWall', 'Add OfferWall', 'manage_options', 'add_offerwall', 'pageAddBannerAd', 8);

            add_submenu_page('CPAlead', 'Manage Ads', 'Manage Ads', 'manage_options', 'manage_ads', 'page_manage_ads', 9);
            add_submenu_page('CPAlead', 'Earnings Stats', 'Earnings Stats', 'manage_options', 'earnings_ads', 'page_earnings_ads', 10);
            add_submenu_page('CPAlead', 'CPC Rates', 'CPC Rates', 'manage_options', 'rates', 'page_rates', 11);

            global $submenu;
            unset($submenu['CPAlead'][0]);
        }
    }


    if (isset($_GET['page']) && $_GET['page'] == 'CPAlead') 
    {
        wp_register_style('cpa_custom_css', plugin_dir_url(__FILE__) . '/css/style.css?v=4.3');
        wp_enqueue_style('cpa_custom_css');
    }
    
    function page_manage_ads() 
    {
        global $wpdb;
        $Res = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "cpasettings LIMIT 1");
        $pub_id = $Res[0]->pub_id;
        $token = $Res[0]->token;

        $parsed_json = fetchApi(API_URL."?q=check_token&pub_id=".$pub_id."&token=".$token);
        $Res = json_decode($parsed_json);
        if ($Res == "1") 
        {
            $parsed_json = fetchApi(API_URL."?q=get&pub_id=".$pub_id."&token=".$token);
            $Res = json_decode($parsed_json);
            include_once 'AdsListing.php';
        } 
        else 
        {
            $incorrect_token = 1;
            include_once 'SetPublisher.php';
        }
    }

    function page_earnings_ads() 
    {
        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_style('jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
        
        global $wpdb;
        $Res = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "cpasettings LIMIT 1");
        $pub_id = $Res[0]->pub_id;
        $token = $Res[0]->token;

        $parsed_json = fetchApi(API_URL."?q=check_token&pub_id=".$pub_id."&token=".$token);
        $Res = json_decode($parsed_json);
        if ($Res == "1") 
        {
            if($_REQUEST['date_start'] != '' && $_REQUEST['date_end'] != '') 
            {
                $parsed_json = fetchApi(API_URL."?q=get_with_earnings&pub_id=".$pub_id."&token=".$token."&date_start=".$_REQUEST['date_start']."&date_end=".$_REQUEST['date_end']);
                $Res = json_decode($parsed_json);
            }
            else
            {
                $Res = null;
            }
            include_once 'AdsEarnings.php';
        } 
        else 
        {
            $incorrect_token = 1;
            include_once 'SetPublisher.php';
        }
    }

    function page_rates() 
    {   
        global $wpdb;
        $Res = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "cpasettings LIMIT 1");
        $pub_id = $Res[0]->pub_id;
        $token = $Res[0]->token;

        $parsed_json = fetchApi(API_URL."?q=check_token&pub_id=".$pub_id."&token=".$token);
        $Res = json_decode($parsed_json);
        if ($Res == "1") 
        {
            $parsed_json = fetchApi(API_URL."?q=get_rates&pub_id=".$pub_id."&token=".$token);
            $Res = json_decode($parsed_json);
            include_once 'AdsRates.php';
        } 
        else 
        {
            $incorrect_token = 1;
            include_once 'SetPublisher.php';
        }
    }

    function getBanner($id) 
    {
        global $wpdb;
        $Res = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "cpasettings LIMIT 1");
        $pub_id = $Res[0]->pub_id;
        $token = $Res[0]->token;

        $parsed_json = fetchApi(API_URL."?q=get&requested_id=".$id."&pub_id=".$pub_id."&token=".$token);
        $Res = json_decode($parsed_json);

        return $Res[0];
    }

    function getBanners() 
    {
        global $wpdb;
        $Res = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "cpasettings LIMIT 1");
        $pub_id = $Res[0]->pub_id;
        $token = $Res[0]->token;

        $parsed_json = fetchApi( API_URL."?q=get&pub_id=".$pub_id."&token=".$token);
        $Res = json_decode($parsed_json);

        return $Res;
    }

    function pageAddBannerAd() 
    {
        global $wpdb;
        $Res = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "cpasettings LIMIT 1");
        $pub_id = $Res[0]->pub_id;
        $token = $Res[0]->token;

        $parsed_json = fetchApi(API_URL."?q=check_token&pub_id=".$pub_id."&token=".$token);
        $Res = json_decode($parsed_json);
        if ($Res == "1") 
        {
            include_once 'AdsAdd.php';
        } 
        else 
        {
            $incorrect_token = 1;
            include_once 'SetPublisher.php';
        }
    }

    function pageEditBannerAd() {

        global $wpdb;
        $Res = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "cpasettings LIMIT 1");
        $pub_id = $Res[0]->pub_id;
        $token = $Res[0]->token;

        include_once 'AdsEdit.php';
    }

    function pageEditPublisherId() 
    {
        global $wpdb;
        $Res = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "cpasettings LIMIT 1");
        $pub_id = $Res[0]->pub_id;
        $token = $Res[0]->token;

        if ($token != '') 
        {
            $parsed_json = fetchApi(API_URL."?q=check_token&pub_id=".$pub_id."&token=".$token);
            $Res = json_decode($parsed_json);
            if ($Res != "1") 
            {
                $incorrect_token = 1;
            }
        }

        include_once 'SetPublisher.php';
    }

    function installAdTbl() 
    {
        global $wpdb;
        $TblName = $wpdb->prefix . 'cpasettings';
        $wpdb->query("CREATE TABLE IF NOT EXISTS `" . $TblName . "` (
              `pub_id` int(11) NOT NULL,
              `token` varchar(20) NOT NULL
            ) ENGINE=MyISAM  DEFAULT CHARSET=latin1;
        ");
    }

    function setPubId($pub_id, $token) 
    {
        global $wpdb;
        $Res = $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "cpasettings LIMIT 1");
        $token = preg_replace("/\W/", "", $token);
        if ($Res[0]->pub_id=='') 
        {
            $wpdb->query("INSERT INTO " . $wpdb->prefix . "cpasettings" . " (pub_id, token) VALUES ('".intval($pub_id)."', '".$token."')");
        } 
        else 
        {
            $wpdb->query("UPDATE " . $wpdb->prefix . "cpasettings  SET pub_id = '".intval($pub_id)."', token = '".$token."'");
        }

        $parsed_json = fetchApi(API_URL."?q=validate_domain&pub_id=".$pub_id."&token=".$token."&domain=".get_home_url());
        print_r($parsed_json);
    }

    include('functions.php');