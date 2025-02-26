<?php

namespace AIPT\Api;

use AIPT\Api\OpenAI\OpenAIClient;
use AIPT\Api\Gemini\GeminiClient;
use AIPT\Core\Activator;

class RestEndpoints {
    private $namespace = 'wp/v2/aipt';
    private $settings_fields = [
        'openai_api_key',
        'gemini_api_key',
        'api_provider',
        'system_prompt',
        'user_prompt',
        'language',
        'writing_style',
        'max_length',
        'max_short_length',
        'model',
        'enable_product_attributes',
        'enable_product_categories',
        'enable_product_tags',
        'enable_product_price',
        'enable_product_sku'
    ];

    private $style_descriptions = [
        'Professional' => 'Use clear, concise, and formal language. Focus on features, benefits, and technical details.',
        'Encouraging' => 'Use positive, motivational language that inspires confidence and action.',
        'Exaggerated' => 'Use dramatic and hyperbolic language to create excitement and emphasis.',
        'Friendly' => 'Use warm, conversational language that builds rapport and trust.',
        'Storytelling' => 'Create a narrative that engages readers and connects emotionally.',
        'Minimalist' => 'Use simple, straightforward language focusing on essential details.',
        'Luxurious and Elegant' => 'Use sophisticated, refined language that conveys premium quality and exclusivity.',
        'Adventurous' => 'Use dynamic, exciting language that creates a sense of exploration and discovery.',
        'Educational' => 'Use informative, detailed language that explains and educates.',
        'Humorous' => 'Use light-hearted, playful language with appropriate humor and wit.'
    ];

    private function get_ai_client() {
        $api_provider = get_option('aipt_api_provider', 'openai');
        
        if ($api_provider === 'gemini') {
            $api_key = get_option('aipt_gemini_api_key');
            if (empty($api_key)) {
                throw new \Exception(esc_html__('Gemini API key is not set. Please set your API key in the settings.', 'ai-product-tools'));
            }
            return new GeminiClient($api_key);
        } else {
            $api_key = get_option('aipt_openai_api_key');
            if (empty($api_key)) {
                throw new \Exception(esc_html__('OpenAI API key is not set. Please set your API key in the settings.', 'ai-product-tools'));
            }
            return new OpenAIClient($api_key);
        }
    }

    public function register_routes(): void {
        register_rest_route($this->namespace, '/generate-description', [
            'methods' => 'POST',
            'callback' => [$this, 'generate_description'],
            'permission_callback' => [$this, 'check_permissions'],
            'args' => [
                'product_id' => [
                    'required' => true,
                    'type' => 'integer',
                ],
                'is_short' => [
                    'required' => false,
                    'type' => 'boolean',
                    'default' => false,
                ],
                'system_prompt' => [
                    'required' => true,
                    'type' => 'string',
                ],
                'user_prompt' => [
                    'required' => true,
                    'type' => 'string',
                ],
            ],
        ]);

        register_rest_route($this->namespace, '/apply-description', [
            'methods' => 'POST',
            'callback' => [$this, 'apply_description'],
            'permission_callback' => [$this, 'check_permissions'],
            'args' => [
                'product_id' => [
                    'required' => true,
                    'type' => 'integer',
                ],
                'description' => [
                    'required' => true,
                    'type' => 'string',
                ],
            ],
        ]);

        register_rest_route($this->namespace, '/settings', [
            [
                'methods' => 'GET',
                'callback' => [$this, 'get_settings'],
                'permission_callback' => [$this, 'check_permissions'],
            ],
            [
                'methods' => 'POST',
                'callback' => [$this, 'update_settings'],
                'permission_callback' => [$this, 'check_permissions'],
                'args' => [
                    'openai_api_key' => [
                        'required' => false,
                        'type' => 'string',
                    ],
                    'gemini_api_key' => [
                        'required' => false,
                        'type' => 'string',
                    ],
                    'api_provider' => [
                        'required' => true,
                        'type' => 'string',
                        'enum' => ['openai', 'gemini']
                    ],
                    'system_prompt' => [
                        'required' => true,
                        'type' => 'string',
                    ],
                    'user_prompt' => [
                        'required' => true,
                        'type' => 'string',
                    ],
                    'language' => [
                        'required' => true,
                        'type' => 'string',
                    ],
                    'writing_style' => [
                        'required' => true,
                        'type' => 'string',
                    ],
                    'max_length' => [
                        'required' => true,
                        'type' => 'string',
                    ],
                    'max_short_length' => [
                        'required' => true,
                        'type' => 'string',
                    ],
                    'model' => [
                        'required' => true,
                        'type' => 'string',
                    ],
                    'enable_product_attributes' => [
                        'required' => true,
                        'type' => 'boolean',
                    ],
                    'enable_product_categories' => [
                        'required' => true,
                        'type' => 'boolean',
                    ],
                    'enable_product_tags' => [
                        'required' => true,
                        'type' => 'boolean',
                    ],
                    'enable_product_price' => [
                        'required' => true,
                        'type' => 'boolean',
                    ],
                    'enable_product_sku' => [
                        'required' => true,
                        'type' => 'boolean',
                    ],
                ],
            ],
        ]);

        register_rest_route($this->namespace, '/validate-api-key', [
            'methods' => 'POST',
            'callback' => [$this, 'validate_api_key'],
            'permission_callback' => [$this, 'check_permissions']
        ]);

        register_rest_route($this->namespace, '/check-api-keys', [
            'methods' => 'GET',
            'callback' => [$this, 'check_api_keys'],
            'permission_callback' => [$this, 'check_permissions']
        ]);

        register_rest_route($this->namespace, '/complete-setup', [
            'methods' => 'POST',
            'callback' => [$this, 'complete_setup'],
            'permission_callback' => [$this, 'check_permissions']
        ]);

        register_rest_route($this->namespace, '/get-available-models', [
            'methods' => 'GET',
            'callback' => [$this, 'get_available_models'],
            'permission_callback' => [$this, 'check_permissions']
        ]);

        register_rest_route('wp/v2/aipt', '/limits', [
            'methods' => 'GET',
            'callback' => [$this, 'get_limits'],
            'permission_callback' => [$this, 'check_admin_permissions']
        ]);
    }

    public function check_permissions() {
        return current_user_can('manage_options');
    }

    public function generate_description($request) {
        try {
            $api_provider = get_option('aipt_api_provider', 'openai');
            
            $client = $this->get_ai_client();
            
            $product_id = $request['product_id'];
            $is_short = isset($request['is_short']) ? $request['is_short'] : false;
            
            $default_model = $api_provider === 'gemini' ? 'gemini-pro' : 'gpt-4o';
            $model = get_option('aipt_model', $default_model);
            
            if ($api_provider === 'gemini') {
                if (!in_array($model, ['gemini-pro', 'gemini-pro-vision'])) {
                    $model = 'gemini-pro';
                    update_option('aipt_model', $model);
                }
            }
            
            
            $product = wc_get_product($product_id);
            if (!$product) {
                return new \WP_Error('invalid_product', 'Invalid product ID', ['status' => 404]);
            }

            $language = get_option('aipt_language', Activator::get_default_value('language'));
            $writing_style = get_option('aipt_writing_style', Activator::get_default_value('writing_style'));
            $max_length = $is_short ? 
                get_option('aipt_max_short_length', Activator::get_default_value('max_short_length')) : 
                get_option('aipt_max_length', Activator::get_default_value('max_length'));
            $system_prompt = get_option('aipt_system_prompt', Activator::get_default_value('system_prompt'));
            $user_prompt = get_option('aipt_user_prompt', Activator::get_default_value('user_prompt'));

            $style_description = isset($this->style_descriptions[$writing_style]) 
                ? $this->style_descriptions[$writing_style] 
                : $this->style_descriptions['Professional'];

            $system_prompt = str_replace(
                ['{max_length}'],
                [$max_length],
                $system_prompt
            );

            $product_info = $this->get_product_info($product);
            
            $user_prompt = str_replace(
                ['{language}', '{style}', '{title}'],
                [
                    $language,
                    $style_description,
                    $product->get_name()
                ],
                $user_prompt
            );
            
            
            $full_prompt = "Product Information:\n" . implode("\n", $product_info) . "\n\n";
            $full_prompt .= "Task: " . $user_prompt;
            
            
            $description = $client->generate_description(
                $system_prompt,
                $full_prompt,
                $model,
                $max_length
            );
            
            return [
                'description' => $description,
            ];
        } catch (\Exception $e) {
            return new \WP_Error('generation_failed', $e->getMessage(), ['status' => 500]);
        }
    }

    public function apply_description($request) {
        try {
            $product_id = $request['product_id'];
            $description = $request['description'];
            
            $product = wc_get_product($product_id);
            if (!$product) {
                return new \WP_Error('invalid_product', 'Invalid product ID', ['status' => 404]);
            }
            
            $product->set_description($description);
            $product->save();
            
            return [
                'success' => true,
            ];
        } catch (\Exception $e) {
            return new \WP_Error('update_failed', $e->getMessage(), ['status' => 500]);
        }
    }

    public function get_settings() {
        if (!current_user_can('manage_options')) {
            return new \WP_Error('rest_forbidden', 'Sorry, you are not allowed to do that.', ['status' => 401]);
        }

        $settings = [];
        foreach ($this->settings_fields as $field) {
            $option_value = get_option('aipt_' . $field, Activator::get_default_value($field));
            
            if (in_array($field, ['enable_product_attributes', 'enable_product_categories', 'enable_product_tags', 'enable_product_price', 'enable_product_sku'])) {
                $settings[$field] = rest_sanitize_boolean($option_value);
                continue;
            }
            
            $settings[$field] = sanitize_text_field($option_value);
        }
        return $settings;
    }

    public function update_settings($request) {
        try {
            if (!current_user_can('manage_options')) {
                return new \WP_Error('rest_forbidden', 'Sorry, you are not allowed to do that.', ['status' => 401]);
            }

            $api_provider = isset($request['api_provider']) ? sanitize_text_field($request['api_provider']) : 'openai';
            $model = isset($request['model']) ? sanitize_text_field($request['model']) : '';

            if ($api_provider === 'openai' && strpos($model, 'gemini-') === 0) {
                return new \WP_Error(
                    'invalid_model',
                    esc_html__('OpenAI API provider cannot be used with Gemini models.', 'ai-product-tools'),
                    ['status' => 400]
                );
            }

            if ($api_provider === 'gemini' && strpos($model, 'gemini-') !== 0) {
                return new \WP_Error(
                    'invalid_model',
                    esc_html__('Gemini API provider cannot be used with non-Gemini models.', 'ai-product-tools'),
                    ['status' => 400]
                );
            }

            if ($api_provider === 'openai') {
                $api_key = isset($request['openai_api_key']) ? sanitize_text_field($request['openai_api_key']) : '';
                if (!empty($api_key) && $api_key !== get_option('aipt_openai_api_key')) {
                    if (!OpenAIClient::validate_api_key($api_key)) {
                        return new \WP_Error('invalid_api_key', 'Invalid OpenAI API key', ['status' => 400]);
                    }
                }
                update_option('aipt_openai_api_key', $api_key);
            } else {
                $gemini_api_key = isset($request['gemini_api_key']) ? sanitize_text_field($request['gemini_api_key']) : '';
                if (!empty($gemini_api_key) && $gemini_api_key !== get_option('aipt_gemini_api_key')) {
                    if (!GeminiClient::validate_api_key($gemini_api_key)) {
                        return new \WP_Error('invalid_api_key', 'Invalid Gemini API key', ['status' => 400]);
                    }
                }
                update_option('aipt_gemini_api_key', $gemini_api_key);
            }

            foreach ($this->settings_fields as $field) {
                if (isset($request[$field]) && !in_array($field, ['openai_api_key', 'gemini_api_key'])) {
                    $value = $request[$field];

                    if (in_array($field, ['enable_product_attributes', 'enable_product_categories', 'enable_product_tags', 'enable_product_price', 'enable_product_sku'])) {
                        $value = rest_sanitize_boolean($value);
                    } else {
                        $value = sanitize_text_field($value);
                    }

                    switch ($field) {
                        case 'max_length':
                        case 'max_short_length':
                            if (!is_numeric($value) || intval($value) < 1) {
                                return new \WP_Error(
                                    'invalid_' . $field, 
                                    $field === 'max_length' ? 
                                        'Maximum length must be a positive number' : 
                                        'Maximum short description length must be a positive number', 
                                    ['status' => 400]
                                );
                            }
                            break;
                        case 'language':
                            if (!in_array($value, ['Afrikaans', 'Arabic', 'Bulgarian', 'Bengali', 'Czech', 'Danish', 'German', 'Greek', 'English', 'Spanish', 'Estonian', 'Persian', 'Finnish', 'French', 'Hebrew', 'Hindi', 'Croatian', 'Hungarian', 'Indonesian', 'Italian', 'Japanese', 'Korean', 'Lithuanian', 'Latvian', 'Malay', 'Dutch', 'Norwegian', 'Polish', 'Portuguese', 'Romanian', 'Russian', 'Slovak', 'Slovenian', 'Swedish', 'Thai', 'Turkish', 'Ukrainian', 'Urdu', 'Vietnamese', 'Chinese'])) {
                                return new \WP_Error('invalid_language', 'Invalid language selection', ['status' => 400]);
                            }
                            break;
                        case 'writing_style':
                            if (!array_key_exists($value, $this->style_descriptions)) {
                                return new \WP_Error('invalid_style', 'Invalid writing style selection', ['status' => 400]);
                            }
                            break;
                        case 'api_provider':
                            if (!in_array($value, ['openai', 'gemini'])) {
                                return new \WP_Error('invalid_provider', 'Invalid API provider selection', ['status' => 400]);
                            }
                            break;
                    }

                    update_option('aipt_' . $field, $value);
                }
            }

            return [
                'success' => true,
                'message' => esc_html__('Settings updated successfully!', 'ai-product-tools')
            ];
        } catch (\Exception $e) {
            return new \WP_Error('update_failed', $e->getMessage(), ['status' => 500]);
        }
    }

    private function get_product_info($product) {
        $info = [];
        $settings = $this->get_settings();

        $info[] = "Name: " . $product->get_name();

        if ($settings['enable_product_sku'] && $product->get_sku()) {
            $info[] = "SKU: " . $product->get_sku();
        }

        if ($settings['enable_product_price'] && $product->get_price()) {
            $info[] = "Price: " . $product->get_price() . ' ' . get_woocommerce_currency();
        }

        if ($settings['enable_product_categories']) {
            $categories = wp_get_post_terms($product->get_id(), 'product_cat', ['fields' => 'names']);
            if (!empty($categories) && !is_wp_error($categories)) {
                $info[] = "Categories: " . implode(', ', $categories);
            }
        }

        if ($settings['enable_product_tags']) {
            $tags = wp_get_post_terms($product->get_id(), 'product_tag', ['fields' => 'names']);
            if (!empty($tags) && !is_wp_error($tags)) {
                $info[] = "Tags: " . implode(', ', $tags);
            }
        }

        if ($settings['enable_product_attributes']) {
            $attributes = $product->get_attributes();
            if (!empty($attributes)) {
                foreach ($attributes as $attribute) {
                    if ($attribute->get_visible()) {
                        $name = wc_attribute_label($attribute->get_name());
                        $values = [];
                        if ($attribute->is_taxonomy()) {
                            $terms = wp_get_post_terms($product->get_id(), $attribute->get_name(), ['fields' => 'names']);
                            if (!is_wp_error($terms)) {
                                $values = $terms;
                            }
                        } else {
                            $values = $attribute->get_options();
                        }
                        if (!empty($values)) {
                            $info[] = $name . ": " . implode(', ', $values);
                        }
                    }
                }
            }
        }

        return $info;
    }

    public function validate_api_key($request) {
        $params = $request->get_json_params();
        $api_key = sanitize_text_field($params['api_key']);
        $api_provider = sanitize_text_field($params['api_provider'] ?? 'openai');

        if (empty($api_key)) {
            return new \WP_Error('empty_api_key', 'API key cannot be empty.', [
                'status' => 400,
                'error_details' => 'API key cannot be empty. Please enter a valid API key.'
            ]);
        }

        try {

            $api_provider === 'gemini' ? 
                GeminiClient::validate_api_key($api_key) : 
                OpenAIClient::validate_api_key($api_key);

            return [
                'success' => true
            ];
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
            $is_temporary_error = strpos(strtolower($error_message), 'overloaded') !== false || 
                               strpos(strtolower($error_message), 'unavailable') !== false ||
                               strpos(strtolower($error_message), 'capacity') !== false ||
                               strpos(strtolower($error_message), 'rate limit') !== false;

            if ($is_temporary_error) {
                return new \WP_Error(
                    'temporary_error',
                    'API service is temporarily unavailable.',
                    [
                        'status' => 503,
                        'error_details' => $error_message . ' Please try again in a few moments.'
                    ]
                );
            }

            return new \WP_Error(
                'validation_error',
                'API key validation failed.',
                [
                    'status' => 400,
                    'error_details' => $error_message
                ]
            );
        }
    }

    public function complete_setup($request) {
        $params = $request->get_json_params();
        $api_key = sanitize_text_field($params['api_key'] ?? '');
        $api_provider = sanitize_text_field($params['api_provider'] ?? 'openai');

        try {
            if (!current_user_can('manage_options')) {
                return new \WP_Error(
                    'rest_forbidden',
                    esc_html__('Sorry, you are not allowed to do that.', 'ai-product-tools'),
                    ['status' => 401]
                );
            }

            if (!in_array($api_provider, ['openai', 'gemini'], true)) {
                return new \WP_Error(
                    'invalid_provider',
                    esc_html__('Invalid API provider selected.', 'ai-product-tools'),
                    ['status' => 400]
                );
            }

            if (!empty($api_key)) {
                try {
                    $api_provider === 'gemini' ? 
                        GeminiClient::validate_api_key($api_key) : 
                        OpenAIClient::validate_api_key($api_key);
                } catch (\Exception $e) {
                    $error_message = $e->getMessage();
                    $is_temporary_error = strpos(strtolower($error_message), 'overloaded') !== false || 
                                       strpos(strtolower($error_message), 'unavailable') !== false ||
                                       strpos(strtolower($error_message), 'capacity') !== false ||
                                       strpos(strtolower($error_message), 'rate limit') !== false;

                    if ($is_temporary_error) {
                        return new \WP_Error(
                            'temporary_error',
                            esc_html__('API service is temporarily unavailable.', 'ai-product-tools'),
                            [
                                'status' => 503,
                                'error_details' => $error_message . ' Please try again in a few moments.'
                            ]
                        );
                    }

                    return new \WP_Error(
                        'invalid_api_key',
                        esc_html__('Invalid API key. Please check and try again.', 'ai-product-tools'),
                        [
                            'status' => 400,
                            'error_details' => $error_message
                        ]
                    );
                }
            }

            update_option('aipt_api_provider', $api_provider);

            if ($api_provider === 'gemini') {
                update_option('aipt_gemini_api_key', $api_key);
                update_option('aipt_model', 'gemini-pro'); 
            } else {
                update_option('aipt_openai_api_key', $api_key);
                update_option('aipt_model', 'gpt-4o'); 
            }

            update_option('aipt_setup_completed', true);
            update_option('aipt_needs_setup', false);
            
            return [
                'success' => true,
                'message' => esc_html__('Setup completed successfully.', 'ai-product-tools')
            ];
        } catch (\Exception $e) {
            return new \WP_Error(
                'setup_failed',
                esc_html__('Error completing setup: ', 'ai-product-tools') . esc_html($e->getMessage()),
                ['status' => 500]
            );
        }
    }

    public function get_available_models($request) {
        try {
            $api_provider = get_option('aipt_api_provider', 'openai');
            
            if ($api_provider === 'openai') {
                $client = new OpenAIClient('dummy-key');
            } else {
                $client = new GeminiClient('dummy-key');
            }

            return [
                'models' => $client->get_available_models()
            ];
        } catch (\Exception $e) {
            return new \WP_Error('models_fetch_failed', $e->getMessage(), ['status' => 500]);
        }
    }

    public function get_limits(): \WP_REST_Response {
        try {
            

            $script_path = AIPT_PLUGIN_DIR . 'dist/js/settings.js';
            
            if (!file_exists($script_path)) {
                throw new Exception('Settings file not found');
            }

            require_once(ABSPATH . 'wp-admin/includes/file.php');
            WP_Filesystem();
            global $wp_filesystem;
            
            if (!$wp_filesystem) {
                throw new Exception('WP Filesystem not available');
            }

            $script_content = $wp_filesystem->get_contents($script_path);
            if ($script_content === false) {
                throw new Exception('Could not read settings file');
            }

            if (!preg_match('/window\.aiptLimits\s*=\s*{[^}]+}/', $script_content, $matches)) {
                throw new Exception('Limit configuration not found in settings');
            }

            preg_match_all("/[fp]l:\s*['\"]([^'\"]+)['\"]/", $matches[0], $limitMatches);
            
            if (empty($limitMatches[1])) {
                throw new Exception('Invalid limit configuration format');
            }

            $limits = [];
            foreach ($limitMatches[1] as $encrypted) {
                

                $firstDecode = base64_decode($encrypted);
                if ($firstDecode === false) {
                    continue;
                }

                $secondDecode = base64_decode($firstDecode);
                if ($secondDecode === false) {
                    continue;
                }

                $value = intval($secondDecode);
                
                if ($value === 500) {
                    $limits['fl'] = $value;
                } elseif ($value === 5000) {
                    $limits['pl'] = $value;
                }
            }

            if (empty($limits) || !isset($limits['fl']) || !isset($limits['pl'])) {
                throw new Exception('Could not decode limit values');
            }

            return new \WP_REST_Response($limits, 200);
        } catch (Exception $e) {
            return new \WP_REST_Response([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    private function decode_limit(string $key): int {
        if (!in_array($key, ['fl', 'pl'])) {
            return 0;
        }

        try {
            $script_path = AIPT_PLUGIN_DIR . 'dist/js/settings.js';
            
            if (!file_exists($script_path)) {
                return 0;
            }

            require_once(ABSPATH . 'wp-admin/includes/file.php');
            WP_Filesystem();
            global $wp_filesystem;
            
            if (!$wp_filesystem) {
                return 0;
            }

            $script_content = $wp_filesystem->get_contents($script_path);
            if ($script_content === false) {
                return 0;
            }

            if (!preg_match('/window\.aiptLimits\s*=\s*{[^}]+}/', $script_content, $matches)) {
                return 0;
            }

            preg_match("/$key:\s*['\"]([^'\"]+)['\"]/", $matches[0], $limitMatch);
            
            if (empty($limitMatch[1])) {
                return 0;
            }

            $firstDecode = base64_decode($limitMatch[1]);
            if ($firstDecode === false) {
                return 0;
            }

            $secondDecode = base64_decode($firstDecode);
            if ($secondDecode === false) {
                return 0;
            }

            $value = intval($secondDecode);
            return ($key === 'fl' && $value === 500) || ($key === 'pl' && $value === 5000) ? $value : 0;
        } catch (Exception $e) {
            return 0;
        }
    }

    public function check_api_keys() {
        if (!current_user_can('manage_options')) {
            return new \WP_Error(
                'rest_forbidden',
                esc_html__('Sorry, you are not allowed to do that.', 'ai-product-tools'),
                ['status' => 401]
            );
        }

        $openai_api_key = get_option('aipt_openai_api_key', '');
        $gemini_api_key = get_option('aipt_gemini_api_key', '');

        return [
            'hasApiKey' => !empty($openai_api_key) || !empty($gemini_api_key)
        ];
    }
} 