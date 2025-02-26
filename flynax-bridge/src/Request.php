<?php

namespace Flynax\Plugins\FlynaxBridge;

use Flynax\Plugins\FlynaxBridge\Traits\SingletonTrait;

/**
 * Class Request
 *
 * @since 2.0.0
 *
 * @package Flynax\Plugins\FlynaxBridge
 */
class Request
{
    use SingletonTrait;

    /**
     * @var string - Flynax base url
     */
    private $flynaxAPIUrl = '';

    /**
     * @var string - Using WordPress bridge API version
     */
    private $apiVersion = 'v1';

    /**
     * @var bool - Should I authorize before sending request
     */
    private $isAuth = false;

    /**
     * {@inheritdoc}
     */
    public function __instance()
    {
        $this->flynaxAPIUrl = $this->getFlynaxAPIUrl();
    }

    /**
     * Enable authentication of the request
     *
     * @return \Flynax\Plugins\FlynaxBridge\Request - Current instance of the class
     */
    public static function auth()
    {
        $instance = Request::getInstance();
        $instance->isAuth = true;

        return $instance;
    }

    /**
     * Send post Request to WordPress bridge plugin
     *
     * @param string $url  - WordPress bridge REST API endpoint
     * @param array  $data - Parameters of the request
     * @param bool $isAuth - Enable authentication
     *
     * @return mixed
     */
    public static function post($url, $data = array(), $isAuth = false)
    {
        $instance = Request::getInstance();
        if ($isAuth) {
            $instance->isAuth = true;
        }

        return Request::getInstance()->makeRequest($url, 'post', $data);
    }

    /**
     * Make HTTP request to the WordPress bridge plugin
     *
     * @param string $endpoint - WordPress bridge REST API endpoint
     * @param string $type     - Request type: {get, post}
     * @param array  $data     - Arguments of the request
     *
     * @return \WP_REST_Response
     */
    public function makeRequest($endpoint, $type, $data)
    {
        $response = false;
        $endpoint = ltrim($endpoint, '/');
        $flAPIUrl = sprintf(
            '%splugins/wordpressBridge/requests.php/api/%s/%s',
            $this->flynaxAPIUrl,
            $this->apiVersion,
            $endpoint
        );

        if ($this->isAuth) {
            $data['fl_token'] = get_option('flb_fl_token');
        }


        $args = array(
            'timeout' => 45,
            'redirection' => 5,
            'httpversion' => '1.0',
            'blocking' => true,
            'headers' => array(),
            'body' => null,
            'cookies' => array(),
            'sslverify' => false
        );

        $type = strtolower($type);
        switch ($type) {
            case 'post':
                $args['body'] = $data;
                $response = wp_remote_post($flAPIUrl, $args);
                break;
            case 'get':
                $getUrl = $flAPIUrl;
                if (!empty($data)) {
                    $getUrl .= '?' . http_build_query($data);
                }

                $response = wp_remote_get($getUrl, $args);
                break;
        }

        return $response;
    }


    /**
     * Send get Request to WordPress bridge plugin
     *
     * @param string $url  - WordPress bridge REST API endpoint
     * @param array  $data - Parameters of the request
     * @param bool $isAuth - Enable authentication
     *
     * @return mixed
     */
    public static function get($url, $data = array(), $isAuth = false)
    {
        $instance = Request::getInstance();
        if ($isAuth) {
            $instance->isAuth = true;
        }

        return Request::getInstance()->makeRequest($url, 'get', $data);
    }

    /**
     * Get url of the Flynax with WordPress plugin installation
     *
     * @return string
     */
    public function getFlynaxAPIUrl()
    {
        return get_option('flb_fl_url');
    }

    /**
     * Set url of the Flynax option
     *
     * @param string $flynaxAPIUrl
     */
    public function setFlynaxAPIUrl($flynaxAPIUrl)
    {
        $this->flynaxAPIUrl = $flynaxAPIUrl;
    }
}
