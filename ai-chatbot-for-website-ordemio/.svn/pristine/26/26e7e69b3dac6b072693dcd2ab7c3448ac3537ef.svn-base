<?php
class OrdemioApi {
    private const REGISTER_ENDPOINT = 'account/register';
    private const AUTH_ENDPOINT = 'account/login';
    private const REFRESH_TOKEN = 'account/token/refresh';
    private const ASSISTANTS_LIST = 'assistant/list';
    private const CREATE_ASSISTANT_ENDPOINT = 'onboarding';
    private string $version = 'v1';
    private string $base_url = 'https://app.ordemio.com/api';

    private array $headers = [
        "Accept" => "application/json",
        "Content-Type" => "application/json",
    ];

    public function __construct()
    {

    }

    public function setAuth(string $accessToken, string $refreshToken): void
    {
        $this->headers['Authorization'] = 'Bearer ' . $refreshToken;

        $response = wp_remote_post($this->makeUrl(self::REFRESH_TOKEN), [
            'headers' => $this->headers,
        ]);
        if (wp_remote_retrieve_response_code($response) != 201 && wp_remote_retrieve_response_code($response) != 200) {
            return;
        } else {

            $body = json_decode(wp_remote_retrieve_body($response), true);
            update_option(OrdemioIntegration::OPTION_TOKEN, $body['token']);
            update_option(OrdemioIntegration::OPTION_REFRESH_TOKEN, $body['refresh_token']);
            $this->headers['Authorization'] = 'Bearer ' . $body['token'];
        }
    }

    public function isAuth(): bool
    {
        return isset($this->headers['Authorization']);
    }

    public function create_assistant(string $name, string $url): ?array
    {
        if (!$this->isAuth()) {
            return null;
        }
        $response = wp_remote_post($this->makeUrl(self::CREATE_ASSISTANT_ENDPOINT), [
            'headers' => $this->headers,
            'body' => json_encode([
                'name' => $name,
                'url' => $url,
            ])
        ]);
        if (wp_remote_retrieve_response_code($response) != 201 && wp_remote_retrieve_response_code($response) != 200) {
            if (wp_remote_retrieve_response_code($response) == 400) {
                return  ["error" => 'The website address does not respond'];
            }
            $error = json_decode(wp_remote_retrieve_body($response), true);
            return  ["error" => $error['error']];
        } else {
            $body = wp_remote_retrieve_body($response);
            return json_decode($body, true);
        }
    }

    public function assistants_list(): array
    {
        $response = wp_remote_get($this->makeUrl(self::ASSISTANTS_LIST), ['headers' => $this->headers]);
        if (wp_remote_retrieve_response_code($response) != 200) {
            $error = json_decode(wp_remote_retrieve_body($response));
            return  ["error" => $error['error']];
        } else {
            $body = wp_remote_retrieve_body($response);
            return json_decode($body, true);
        }
    }

    public function auth(string $email, string $password): array
    {
        $response = wp_remote_post(
            $this->makeUrl(self::AUTH_ENDPOINT),
            [
                'headers' => $this->headers,
                'body' => json_encode([
                    'email' => $email,
                    'password' => $password,
                ])
            ]
        );
        if (wp_remote_retrieve_response_code($response) != 201 && wp_remote_retrieve_response_code($response) != 200) {
            if (wp_remote_retrieve_response_code($response) == 403) {
                return  ["error" => 'Incorrect password or email'];
            }
            $error = json_decode(wp_remote_retrieve_body($response));
            return  ["error" => $error['error']];
        } else {
            $body = wp_remote_retrieve_body($response);
            return json_decode($body, true);
        }
    }

    public function register(string $email, string $password, string $name): ?array
    {
        $response = wp_remote_post(
            $this->makeUrl(self::REGISTER_ENDPOINT),
            [
                'headers' => $this->headers,
                'body' => json_encode([
                    'email' => $email,
                    'password' => $password,
                    'confirm_password' => $password,
                    'account_name' => $name,
                    'name' => $name,
                    'register_type' => 'wordpress',
                ])
            ]
        );
        if (wp_remote_retrieve_response_code($response) != 201 && wp_remote_retrieve_response_code($response) != 200) {
            if (wp_remote_retrieve_response_code($response) == 400) {
                return  ["error" => 'Email already exists. Please login or use another email address.'];
            }
            $error = json_decode(wp_remote_retrieve_body($response));
            return  ["error" => $error['error']];
        } else {
            $body = wp_remote_retrieve_body($response);
            return json_decode($body, true);
        }
    }

    private function makeUrl(string $endpoint): string
    {
        return implode('/',[$this->base_url , $this->version , $endpoint]);
    }
}