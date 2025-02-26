<?php

/**
 * Class for working with API from konfirmi-backend repo
 * 
 * @package Konfirmi Plugin
 */
namespace Konfirmi\Api;
use \Konfirmi\Base\BaseController;

class RestfulApi extends BaseController
{

    /**
     * Create HTTP requests to Konfirmi Back-end
     * 
     * @param string $url endpoint url 
     * @param string $type endpoint method
     * @param array $data data endpoint body
     * @param bool $use_token add token to request
     */
    public function makeRequest($url, $type, $data = null, $use_token = true) {
        $options = array('method' => $type);
        $headers['Content-Type'] = 'application/x-www-form-urlencoded\r\n';
        if($use_token && array_key_exists('konfirmiToken', $_COOKIE)) {
            $headers['authorization'] = 'Token '.$_COOKIE['konfirmiToken'];
        }
        $options['headers'] = $headers;
        if(!empty($data) && is_array($data)) {
            $options['body'] = $data;
        }
        $response = wp_remote_request($url, $options);
        if ($response === FALSE) {
            return array('error' => 'Request error');
        }

        if (!empty($response['body'])) {
            return json_decode($response['body'], true);
        }
        return json_decode($response, true);
    }
}