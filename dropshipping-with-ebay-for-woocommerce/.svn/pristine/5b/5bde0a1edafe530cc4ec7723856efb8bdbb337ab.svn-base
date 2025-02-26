<?php

/**
 * Description of E2WL_RequestHelper
 *
 * @author Andrey
 */
if (!class_exists('E2WL_RequestHelper')) {

    class E2WL_RequestHelper {
        public static function build_request($function, $params=array()){
            $request_url = e2wl_get_setting('api_endpoint').$function.'.php?' . E2WL_Account::getInstance()->build_params() /*. E2WL_EbayLocalizator::getInstance()->build_params()*/."&su=".  urlencode(site_url());
            
            if(!empty($params) && is_array($params)){
                foreach($params as $key=>$val){
                    $request_url .= "&".str_replace("%7E", "~", rawurlencode($key))."=".str_replace("%7E", "~", rawurlencode($val));
                }    
            }
            return $request_url;
        }
    }
}
