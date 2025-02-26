<?php

class DPD_Cart_API
{
    private $options;
    private $base_url;

    public function __construct()
    {
        session_start();
        $this->options = get_option('dpdcart-settings');
        $this->base_url = 'https://api.getdpd.com/v2/';
    }

    public function products()
    {
        $products = $this->fetch('products', ['storefront_id' => $this->options['store']]);
        if(is_array($products)){
        foreach ($products as $key => $product) {
            if ($product['visibility'] != 1) {
                unset($products[$key]);
            }
        }}
        return $products;
    }

    public function product($id)
    {
        return $this->fetch('products/' . $id, []);
    }

    public function stores()
    {
        return $this->fetch('storefronts', []);
    }

    public function store($id, $user, $key)
    {
        $response = $this->fetch('storefronts/' . $id, [], ['user-name' => $user, 'api-key' => $key], true);
        if (is_wp_error($response)) {
            $_SESSION['dpdcart_notices'][] = 'api-404';
        } else {

            if (isset($response['body']) && isset(json_decode($response['body'], true)['subdomain'])) {
                return json_decode($response['body'], true);
            } else {
                return false;
            }
        }
    }

    public function check_auth($user, $key)
    {
        $response = wp_remote_get($this->base_url, ['headers' => ["Authorization" => "Basic " . base64_encode($user . ':' . $key)]]);
        if (is_wp_error($response)) {
            $_SESSION['dpdcart_notices'][] = 'api-404';
        } else {
            if (isset($response['body']) && json_decode($response['body'], true)['status'] == "SUCCESS") {
                return true;
            } else {
                $_SESSION['dpdcart_notices'][] = 'api-auth-error';
                return false;
            }
        }
    }

    private function fetch($url, $param, $auth = null, $raw = false)
    {
        if ($auth != null) {
            $user_name = $auth['user-name'];
            $api_key = $auth['api-key'];
        } else {
            $user_name = $this->options['user-name'];
            $api_key = $this->options['api-key'];
        }
        $args = array(
            'headers' => array(
                "Authorization" => "Basic " . base64_encode($user_name . ':' . $api_key)
            ),
            'body' => $param,
        );

        $response = wp_remote_get($this->base_url . $url, $args);
//        var_dump($response);
        if ($raw) {
            return $response;
        }
        if (!is_wp_error($response) && isset($response['body'])) {
            $body = json_decode($response['body'], true);
            return $body;
        }
    }
}