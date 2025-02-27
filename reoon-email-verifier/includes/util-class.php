<?php

namespace REOONENV\util;

use Exception;
use REOONENV\api\ReoonApi;

class Util
{


    public static function get_encrypted_api_key()
    {
        $reoon_api_key = Util::get_reoon_option("reoon_api_key");

        $newString = "";

        if (!$reoon_api_key) {
            return "";
        }


        if (strlen($reoon_api_key) >= 32) {
            $newString = substr_replace($reoon_api_key, str_repeat("*", strlen($reoon_api_key) - 7), 3, -4);
        }


        return $newString;
    }


    public static function get_error_message()
    {
        $custom_error_message = Util::get_reoon_option("custom_error_message");
    
        // Check if WPML is active
        if (function_exists('icl_translate')) {
            // Translate the custom error message
            $translated_error_message = icl_translate('reoonev', 'Custom Error Message', $custom_error_message);
            // Use the translated error message if available
            $custom_error_message = $translated_error_message ?: $custom_error_message;
        }
    
        // If custom error message is not set or empty, provide a default error message
        if (!$custom_error_message) {
            return __("Invalid Email Address", "your-text-domain");
        }
    
        return $custom_error_message;
    }
    


    public static function get_reoon_option($field_name)
    {
        $options = get_option("reoonev-settings");

        if (isset($options[$field_name])) {
            return $options[$field_name];
        }

        return "";
    }

    public static function get_support_url()
    {
        echo '<div style="text-align:center">Need any help? <a href="">Contact Support</a></div>';
    }

    // check if user has activated API key
    // or is out of credits
    public static function can_validate_email()
    {
        //ReoonApi
        $api = new ReoonApi();

        $key = Util::get_reoon_option("reoon_api_key");
        if(!$key)
        {
            return false;
        }

        $account_info = $api->GetAccountInfo();


        if($account_info && property_exists($account_info,"status"))
        {

            if($account_info->status=="error")
            {
                return false;
            }
            return true;            
        }

        return false;
    }

}
