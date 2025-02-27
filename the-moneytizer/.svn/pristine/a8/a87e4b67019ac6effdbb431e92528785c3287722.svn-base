<?php
if(isset($_POST['themoneytizer_setting_token'])){
    $token = $_POST['themoneytizer_setting_token'];

    $body = ['version' => get_option('themoneytizer_plugin_version')];
    $url = "https://www.themoneytizer.com/plugin/tokenValidation?token=$token";
    $res = (array) json_decode(post_req($url, $body));
    if($res['msg'] == 1){
        update_option("themoneytizer_user_logged","1");
        update_option("themoneytizer_setting_token",$token);
    } else {
        update_option("themoneytizer_user_logged","0");
        update_option("themoneytizer_setting_token","");
    }
    
    if(get_option("themoneytizer_user_logged")==1){
        if(get_option("themoneytizer_site_id")==''){
            /*
            * Init
            */
            $body = ['version' => get_option('themoneytizer_plugin_version'), 'action' => 'init'];
            $url = "https://www.themoneytizer.com/plugin/setWebsiteInformations?token=$token";
            post_req($url, $body);
        }
        $url = "https://www.themoneytizer.com/plugin/getSiteID?token=$token";
        $res = get_req($url);
        if($res['response']['code'] == 200){
            $res = (array) json_decode($res['body']);
            if($res['status'] == 'success'){
                update_option("themoneytizer_site_id", $res['message']);
            } else {
                update_option("themoneytizer_site_id", "");
            }
        }
    }
}