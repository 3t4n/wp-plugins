<?php
namespace Fw360Connect;

class api {

    private $endpoint = null;
    private $apiKey = null;

    public function __construct() {
        $this->apiKey = get_option('fw360_api_key');
        $this->endpoint = 'https://' . trim(str_replace(array("http://", "https://", "www."), array("", "", ""), get_option('fw360_api_url')), '/');
    }

    public function call($endpoint, $params) {
        $url = rtrim($this->endpoint, "/") . "/m/api/" . ltrim($endpoint, "/");

        return wp_remote_post( $url, array(
            'method'      => 'POST',
            'headers' => array(
                'Content-Type' => 'application/json',
                'X-Fw360-Key' => $this->apiKey
            ),
            'body' => $params,
            'timeout'     => 60,
            'redirection' => 5,
            'blocking'    => true,
            'httpversion' => '1.0',
            'sslverify'   => false,
            'data_format' => 'body',
        ));
    }

}