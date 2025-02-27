<?php

namespace REOONENV\api;

use REOONENV\util\Util;

class ReoonApi
{

    public function __construct()
    {
    }
	
	// This function is only used inside the settings, where user can manually check an email address.
    public function ValidateEmail_plugin_settings($email)
    {
		$email = str_replace("+", "%2B", $email);
		
        $key = Util::get_reoon_option("reoon_api_key");
        $mode = Util::get_reoon_option("validation_mode");
        $timeout = Util::get_reoon_option("timeout");
        $allow_role_email = Util::get_reoon_option("allow_role_email") == "1" ? true : false;
        $allow_catch_all = Util::get_reoon_option("allow_catch_all") == "1" ? true : false;
        $allow_temp_disposable = Util::get_reoon_option("allow_temp_disposable") == "1" ? true : false;
        $allow_inbox_full = Util::get_reoon_option("allow_inbox_full") == "1" ? true : false;
        $allow_unknown = Util::get_reoon_option("allow_unknown") == "1" ? true : false;

        if (!$timeout) {
            $timeout = 120;
        }



        $data = wp_remote_get("https://emailverifier.reoon.com/api/v1/verify?email=" . $email . "&mode=" . $mode . "&key=" . $key, array(
            "timeout" => $timeout
        ));

        if (is_wp_error($data)) {
            return false;
        }

        $res =  json_decode($data["body"]);



        //checking Email Acceptance Settings
        if ($allow_role_email == true && $res->status == "role_account") {
            return $res->status;
        } else if ($allow_catch_all == true && $res->status == "catch_all") {
            return $res->status;
        } else if ($allow_temp_disposable == true && $res->status == "disposable") {
            return $res->status;
        } else if ($allow_inbox_full == true && $res->status == "inbox_full") {
            return false;
        } else if ($allow_unknown == true && ($res->status == "unknown" || $res->status == "error")) {
            return false;
        }

        //reverting to default mode   
        if ($res->status == "valid" || $res->status == "safe" || $res->status == "role_account") {
            return $res->status;
        }



        return false;
    }
	
	

	// This function is used by all type of forms.
    public function ValidateEmail($email)
    {
		$email = str_replace("+", "%2B", $email);
		
        $key = Util::get_reoon_option("reoon_api_key");
        $mode = Util::get_reoon_option("validation_mode");
        $timeout = Util::get_reoon_option("timeout");
        $allow_role_email = Util::get_reoon_option("allow_role_email") == "1" ? true : false;
        $allow_catch_all = Util::get_reoon_option("allow_catch_all") == "1" ? true : false;
        $allow_temp_disposable = Util::get_reoon_option("allow_temp_disposable") == "1" ? true : false;
        $allow_inbox_full = Util::get_reoon_option("allow_inbox_full") == "1" ? true : false;
        $allow_unknown = Util::get_reoon_option("allow_unknown") == "1" ? true : false;

        if (!$timeout) {
            $timeout = 120;
        }

        //All the forms start rejecting the emails (just like invalid emails) if the API key is not activated 
        //in the form. In case the user hasn't activated an API key or he is out of credits,
        //the plugin should just act as if it is not there (which means every email should pass in such case)
        if(!Util::can_validate_email())
        {
            return true;
        }

        $data = wp_remote_get("https://emailverifier.reoon.com/api/v1/verify?email=" . $email . "&mode=" . $mode . "&key=" . $key, array(
            "timeout" => $timeout
        ));

        if (is_wp_error($data)) {
            return false;
        }

        $res =  json_decode($data["body"]);



        //checking Email Acceptance Settings
        if ($allow_role_email == true && $res->status == "role_account") {
            return true;
        } else if ($allow_catch_all == true && $res->status == "catch_all") {
            return true;
        } else if ($allow_temp_disposable == true && $res->status == "disposable") {
            return true;
        } else if ($allow_inbox_full == true && $res->status == "inbox_full") {
            return false;
        } else if ($allow_unknown == true && ($res->status == "unknown" || $res->status == "error")) {
            return false;
        }

        //reverting to default mode   
        if ($res->status == "valid" || $res->status == "safe" || $res->status == "role_account") {
            return true;
        }



        return false;
    }

    public function GetAccountInfo($api_key = "")
    {
        $key = Util::get_reoon_option("reoon_api_key");

        if (!$key) {
            $key = $api_key;
        }

        $data = wp_remote_get("https://emailverifier.reoon.com/api/v1/get-account-info?key=" . $key);

        if (is_wp_error($data)) {
            return false;
        }

        return json_decode($data["body"]);
    }
    
}
