<?php

class AdInkApiUnauthenticatedExeption extends \Exception
{
}

class AdInkApi
{

    public $token;

    const ERROR = "Error";
    const UNAUTHENTICATED = "Unauthenticated";

    /**
     * CreativsApi constructor.
     * @param string $token
     */
    public function __construct($token = null)
    {
        $this->token = $token;
        $this->baseUri = "https://api.clap.ink/api";
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getUrl()
    {
        return $this->baseUri;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function login($email, $password, $website)
    {
        return $this->request("POST", "auth/login", [
            "email" => $email,
            "password" => $password,
            "url" => $website,
        ]);
    }

    public function register($args)
    {
        return $this->request("POST", "auth/register", $args);
    }

    public function getUser()
    {
        $response = $this->request("GET", "user");
        if (isset($response["data"])) {
            return $response["data"];
        }
        return $response;
    }

    public function getCategories()
    {
        $response = $this->request("GET", "categories");
        if ($response !== self::ERROR) {
            return $response["data"];
        }
        return [];
    }

    public function getVideoSamples()
    {
        $response = $this->request("GET", "videos/samples");
        if ($response !== self::ERROR) {
            return $response["data"];
        }
        return [];
    }

    public function getWebsite($url, $with = [])
    {
        if ($url === null) {
            return null;
        }
        $response = $this->request("GET", "websites", [
            "with" => $with,
            "url" => $url
        ]);

        if (isset($response["data"])) {
            if (count($response["data"]) > 0) {
                return $response["data"][0];
            }
            return null;
        }
        return $response;
    }

    public function createWebsite($params)
    {
        $response = $this->request("POST", "websites/store", $params);
        if (isset($response["data"])) {
            return $response["data"];
        }
        return $response;
    }

    public function updateWebsite($id, $params)
    {
        return $this->request("POST", "websites/" . $id . '/update', $params);
    }

    public function getAdsTxt($id)
    {
        if ($id === null) {
            return null;
        }
        $response = $this->request("GET", "websites/" . $id . "/adstxt");

        if (isset($response["data"])) {
            return $response["data"];
        }
        return $response;
    }

    /**
     * Make an api request
     *
     * @return mixed
     */
    private function request($method, $endpoint, $args = [], $headers = [], $body = [])
    {
        $url = $this->cleanEndpoint($this->baseUri) . "/" . $endpoint . '?' . http_build_query($this->args($args));
        $data = [
            'method' => $method,
            'timeout' => 30
        ];
        $headers = $this->headers($headers);
        if (count($headers) > 0) {
            $data["headers"] = $headers;
        }
        if (count($body) > 0) {
            $data["body"] = json_encode($body);
        }
        $response = wp_remote_request($url, $data);

        if (is_wp_error($response)) {
            return null;
        }

        if ($response['response']['code'] === 401) {
            throw new AdInkApiUnauthenticatedExeption;
        }

        if ($response['response']['code'] === 200 || $response['response']['code'] === 201 || $response['response']['code'] === 422) {
            return json_decode($response['body'], true);
        }

        return self::ERROR;
    }

    /**
     * create args array
     *
     * @return mixed
     */
    private function args($args = [])
    {
        return array_merge([], $args);
    }

    /**
     * create header array
     *
     * @return mixed
     */
    private function headers($headers = [])
    {
        return array_merge([
            'Content-Type' => 'application/json; charset=UTF8',
            'X-Requested-With' => 'XMLHttpRequest',
            'Authorization' => 'Bearer ' . $this->token
        ], $headers);
    }

    /**
     * Remove leading or trailing forward slashes from the endpoint.
     * @param $endpoint
     * @return string
     */
    private function cleanEndpoint($endpoint)
    {
        $endpoint = ltrim($endpoint, "/");
        $endpoint = rtrim($endpoint, "/");
        return $endpoint;
    }
}
