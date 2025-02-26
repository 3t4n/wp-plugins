<?php

namespace Ambikly;

use Ambikly\Gateways\PayPal\PayPalApi;

class RestApi
{
    protected $api_classes = [
        PayPalApi::class,
    ];

    public function __construct()
    {
        $this->register_routes();
    }

    public function register_routes()
    {
        foreach (apply_filters('ambikly_rest_classes', $this->api_classes) as $api_class) {
            if (class_exists($api_class)) {
                $api_instance = new $api_class();
                $api_instance->register_routes();
            }
        }
    }
}