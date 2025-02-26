<?php

/**
 * WWE Small Get Distance
 *
 * @package     WWE Small Quotes
 * @author      Eniture-Technology
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Distance Request Class
 */
class Get_odfl_quotes_distance
{

    function __construct()
    {
        add_filter("odfl_en_wd_get_address", array($this, "sm_address"), 10, 2);
    }

    /**
     * Get Address Upon Access Level
     * @param $map_address
     * @param $accessLevel
     */
    function odfl_quotes_address($map_address, $accessLevel, $destinationZip = [])
    {

        $domain = odfl_quotes_get_domain();
        $postData = array(
            'acessLevel' => $accessLevel,
            'address' => $map_address,
            'originAddresses' => (isset($map_address)) ? $map_address : "",
            'destinationAddress' => (isset($destinationZip)) ? $destinationZip : "",
            'eniureLicenceKey' => get_option('wc_settings_odfl_plugin_licence_key'),
            'ServerName' => $domain,
        );

        $odfl_quotes_Curl_Request = new ODFL_Curl_Request();
        $output = $odfl_quotes_Curl_Request->odfl_get_curl_response(ODFL_FREIGHT_DOMAIN_HITTING_URL . '/addon/google-location.php', $postData);
        return $output;
    }

}
