<?php

namespace AIPT\Api\OpenAI;

use AIPT\Api\AIClientInterface;

class OpenAIClient implements AIClientInterface {
    private $api_key;
    private $api_url = 'https://api.openai.com/v1/chat/completions';
    private $models = [
        'gpt-4o' => [
            'name' => 'gpt-4o',
            'max_completion_tokens' => 4096,
            'temperature' => 0.7,
            'use_legacy_params' => false,
            'has_temperature' => true,
            'supports_system_message' => false
        ],
        'o3-mini' => [
            'name' => 'o3-mini',
            'max_completion_tokens' => 100000,
            'temperature' => 0.7,
            'use_legacy_params' => false,
            'has_temperature' => true,
            'supports_system_message' => false
        ],
        'gpt-4o-mini' => [
            'name' => 'gpt-4o-mini',
            'max_completion_tokens' => 4096,
            'temperature' => 0.7,
            'use_legacy_params' => false,
            'has_temperature' => true,
            'supports_system_message' => false
        ],
        'o1-mini' => [
            'name' => 'o1-mini',
            'max_completion_tokens' => 4096,
            'use_legacy_params' => false,
            'has_temperature' => false,
            'supports_system_message' => false
        ],
        'gpt-4-turbo' => [
            'name' => 'gpt-4-turbo-preview',
            'max_tokens' => 4096,
            'temperature' => 0.7,
            'use_legacy_params' => true,
            'has_temperature' => true,
            'supports_system_message' => true
        ],
        'gpt-4' => [
            'name' => 'gpt-4',
            'max_tokens' => 8192,
            'temperature' => 0.7,
            'use_legacy_params' => true,
            'has_temperature' => true,
            'supports_system_message' => true
        ],
        'gpt-3.5-turbo' => [
            'name' => 'gpt-3.5-turbo',
            'max_tokens' => 4096,
            'temperature' => 0.7,
            'use_legacy_params' => true,
            'has_temperature' => true,
            'supports_system_message' => true
        ],
    ];

    public function __construct($api_key) {
        $this->api_key = $api_key;
    }

    public function generate_description(string $system_prompt, string $user_prompt, string $model = 'gpt-4o', ?int $maximum_length = null): string {
        if (!isset($this->models[$model])) {
            throw new \Exception('Invalid model selected');
        }

        $model_config = $this->models[$model];
        $messages = [];

        if ($model_config['supports_system_message']) {
            $messages[] = [
                'role' => 'system',
                'content' => $system_prompt
            ];
            $messages[] = [
                'role' => 'user',
                'content' => $user_prompt
            ];
        } else {
            $messages[] = [
                'role' => 'user',
                'content' => $system_prompt . "\n\n" . $user_prompt
            ];
        }

        $request_body = [
            'model' => $model_config['name'],
            'messages' => $messages
        ];

        if ($model_config['has_temperature']) {
            $request_body['temperature'] = $model_config['temperature'];
        }

        $response = wp_remote_post($this->api_url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->api_key,
                'Content-Type' => 'application/json',
            ],
            'body' => wp_json_encode($request_body),
            'timeout' => 30,
        ]);

        if (is_wp_error($response)) {
            throw new \Exception(esc_html($response->get_error_message()));
        }

        $body = json_decode(wp_remote_retrieve_body($response), true);

        if (isset($body['error'])) {
            throw new \Exception(esc_html($body['error']['message']));
        }

        if (!isset($body['choices'][0]['message']['content'])) {
            throw new \Exception('Invalid response from OpenAI API');
        }

        return trim($body['choices'][0]['message']['content']);
    }

    public static function validate_api_key(string $api_key): bool {
        

        $api_key = trim($api_key);
        
        try {
            $response = wp_remote_post('https://api.openai.com/v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $api_key,
                    'Content-Type' => 'application/json',
                ],
                'body' => wp_json_encode([
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => 'Hi, how are you'
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

            if ($response_code === 200 && isset($body['choices'])) {
                return true;
            }

            if (isset($body['error'])) {
                throw new \Exception($body['error']['message']);
            }

            throw new \Exception('Unexpected response format from OpenAI API');

        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function get_available_models(): array {
        return $this->models;
    }
} 