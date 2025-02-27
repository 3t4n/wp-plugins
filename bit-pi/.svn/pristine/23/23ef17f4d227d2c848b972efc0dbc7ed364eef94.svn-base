<?php

namespace BitApps\Pi\src\Integrations\Brevo;

use BitApps\Pi\Deps\BitApps\WPKit\Helpers\JSON;
use BitApps\Pi\Deps\BitApps\WPKit\Http\Client\HttpClient;

class BrevoContact
{
    private $baseUrl;

    private $http;

    private $headers;

    /**
     * BrevoService constructor.
     *
     * @param       $baseUrl
     * @param mixed $headers
     */
    public function __construct($baseUrl, $headers)
    {
        $this->baseUrl = $baseUrl;
        $this->http = new HttpClient();
        $this->headers = $headers;
    }

    /**
     * Create New Contact
     *
     * @param mixed $data
     *
     * @return array
     */
    public function createNewContact($data)
    {
        $url = $this->baseUrl . '/contacts';

        $response = $this->http->request($url, 'POST', JSON::encode($data), $this->headers);

        return [
            'response'    => $response,
            'payload'     => $data,
            'status_code' => $this->http->getResponseCode()
        ];
    }
}
