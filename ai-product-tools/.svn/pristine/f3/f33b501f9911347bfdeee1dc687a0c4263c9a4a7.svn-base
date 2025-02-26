<?php

namespace AIPT\Api\Gemini;

use AIPT\Api\AIClientInterface;

class GeminiClient implements AIClientInterface {
    private $api_key;
    private $api_url = 'https://generativelanguage.googleapis.com/v1beta/models';
    private $models = [
        'gemini-pro' => [
            'name' => 'gemini-pro',
            'max_tokens' => 2048,
            'temperature' => 0.7,
            'supports_system_message' => true
        ],
        'gemini-pro-vision' => [
            'name' => 'gemini-pro-vision',
            'max_tokens' => 2048,
            'temperature' => 0.7,
            'supports_system_message' => true
        ]
    ];

    public function __construct($api_key) {
        $this->api_key = $api_key;
    }

    public function generate_description(string $system_prompt, string $user_prompt, string $model = 'gemini-pro', ?int $maximum_length = null): string {

        if (!isset($this->models[$model])) {
            throw new \Exception('Invalid model selected: ' . esc_html($model));
        }

        $model_config = $this->models[$model];
        $endpoint = "{$this->api_url}/{$model_config['name']}:generateContent?key={$this->api_key}";

        $request_body = [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $system_prompt . "\n\n" . $user_prompt]
                    ]
                ]
            ],
            'generationConfig' => [
                'temperature' => $model_config['temperature']
            ]
        ];

        $response = wp_remote_post($endpoint, [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body' => wp_json_encode($request_body),
            'timeout' => 30,
        ]);

        if (is_wp_error($response)) {
            throw new \Exception(esc_html($response->get_error_message()));
        }

        $body = json_decode(wp_remote_retrieve_body($response), true);
        $response_code = wp_remote_retrieve_response_code($response);

        if (isset($body['error'])) {
            throw new \Exception(esc_html($body['error']['message'] ?? 'Unknown API error'));
        }

        if (!isset($body['candidates'][0]['content']['parts'][0]['text'])) {
            throw new \Exception('Invalid response from Gemini API');
        }

        return trim($body['candidates'][0]['content']['parts'][0]['text']);
    }

    public static function validate_api_key(string $api_key): bool {
        try {

            $api_key = trim($api_key);
            
            $endpoint = "https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key={$api_key}";
            
            $response = wp_remote_post($endpoint, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'body' => wp_json_encode([
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => 'Hi, how are you']
                            ]
                        ]
                    ]
                ]),
                'timeout' => 20
            ]);

            if (is_wp_error($response)) {
                throw new \Exception($response->get_error_message());
            }

            $response_code = wp_remote_retrieve_response_code($response);
            $body = json_decode(wp_remote_retrieve_body($response), true);

            if ($response_code === 200 && isset($body['candidates'])) {
                return true;
            }

            if (isset($body['error'])) {
                throw new \Exception($body['error']['message']);
            }

            throw new \Exception('Unexpected response format from Gemini API');

        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function get_available_models(): array {
        return $this->models;
    }
} 