<?php

class AATG_Text_Generator_Restpoint {
    private $batch_size = 10;
	private $rewrite_all = false;

    public function __construct() {
		$options = get_option('aatg_text_generator_options');
		error_log('Constructor loading settings: ' . print_r($options, true));
		$this->rewrite_all = is_array($options) && isset($options['all_alt_text']) ? $options['all_alt_text'] : false;
        add_action('rest_api_init', array($this, 'register_rest_routes'));
        add_action('ai_process_media_batch', array($this, 'process_media_batch'), 10, 1);
    }

    public function register_rest_routes() {
        register_rest_route('ai-alt-text-generator/v1', '/start-processing', array(
            'methods' => 'POST',
            'callback' => array($this, 'start_processing'),
            'permission_callback' => function() {
                return current_user_can('manage_options');
            },
        ));

        register_rest_route('ai-alt-text-generator/v1', '/process-next', array(
            'methods' => 'POST',
            'callback' => array($this, 'process_next_image'),
            'permission_callback' => function() {
                return current_user_can('manage_options');
            },
        ));

        register_rest_route('ai-alt-text-generator/v1', '/processing-status', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_processing_status'),
            'permission_callback' => function() {
                return current_user_can('manage_options');
            },
        ));

        register_rest_route('ai-alt-text-generator/v1', '/is-processing', array(
            'methods' => 'GET',
            'callback' => array($this, 'check_processing_status'),
            'permission_callback' => function() {
                return current_user_can('manage_options');
            },
        ));

        register_rest_route('ai-alt-text-generator/v1', '/stop-processing', array(
            'methods' => 'POST',
            'callback' => array($this, 'stop_processing'),
            'permission_callback' => function() {
                return current_user_can('manage_options');
            },
        ));

        register_rest_route('ai-alt-text-generator/v1', '/validate-key', array(
            'methods' => 'POST',
            'callback' => array($this, 'validate_openai_key'),
            'permission_callback' => function() {
                return current_user_can('manage_options');
            },
        ));

        register_rest_route('ai-alt-text-generator/v1', '/settings', array(
            array(
                'methods' => 'GET',
                'callback' => array($this, 'get_settings'),
                'permission_callback' => function() {
                    return current_user_can('manage_options');
                },
            ),
            array(
                'methods' => 'POST',
                'callback' => array($this, 'update_settings'),
                'permission_callback' => function() {
                    return current_user_can('manage_options');
                },
            ),
        ));

        register_rest_route('ai-alt-text-generator/v1', '/generate-test', array(
            'methods' => 'POST',
            'callback' => array($this, 'handle_test_generation'),
            'permission_callback' => function() {
                return current_user_can('manage_options');
            },
        ));
    }

    public function start_processing(WP_REST_Request $request) {
        try {
            // Get total number of images to process
            $args = array(
                'post_type'      => 'attachment',
                'post_status'    => 'inherit',
                'post_mime_type' => 'image',
                'posts_per_page' => -1,
                'fields'         => 'ids'
            );

            // If not processing all images, only get those without alt text
            if (!$this->rewrite_all) {
                $ids = $this->get_images_without_alt_text_ids();
                if (!empty($ids)) {
                    $args['post__in'] = $ids;
                }
            }

            $total_images = count(get_posts($args));

            if ($total_images === 0) {
                return new WP_REST_Response(array(
                    'status' => 'error',
                    'message' => 'No images found to process'
                ), 200);
            }

            // Store processing state
            update_option('aatg_is_processing', true);
            update_option('aatg_processing_total', $total_images);
            update_option('aatg_processing_current', 0);

            return new WP_REST_Response(array(
                'status' => 'success',
                'message' => sprintf('Found %d images to process', $total_images),
                'total_items' => $total_images,
                'is_processing' => true
            ), 200);

        } catch (Exception $e) {
            // Clean up on error
            update_option('aatg_is_processing', false);
            update_option('aatg_processing_total', 0);
            update_option('aatg_processing_current', 0);
            
            return new WP_REST_Response(array(
                'status' => 'error',
                'message' => 'Internal server error: ' . $e->getMessage()
            ), 500);
        }
    }

    public function process_next_image() {
        try {
            if (!get_option('aatg_is_processing', false)) {
                return new WP_REST_Response(array(
                    'status' => 'error',
                    'message' => 'Processing is not active'
                ), 200);
            }

            $current = get_option('aatg_processing_current', 0);
            $total = get_option('aatg_processing_total', 0);

            if ($current >= $total) {
                update_option('aatg_is_processing', false);
                update_option('aatg_processing_total', 0);
                update_option('aatg_processing_current', 0);
                return new WP_REST_Response(array(
                    'status' => 'completed',
                    'message' => 'All images processed',
                    'current' => $current,
                    'total' => $total
                ), 200);
            }

            $args = array(
                'post_type'      => 'attachment',
                'post_status'    => 'inherit',
                'post_mime_type' => 'image',
                'posts_per_page' => 1,
                'offset'         => $current
            );

            if (!$this->rewrite_all) {
                $ids = $this->get_images_without_alt_text_ids();
                if (empty($ids)) {
                    update_option('aatg_is_processing', false);
                    update_option('aatg_processing_total', 0);
                    update_option('aatg_processing_current', 0);
                    return new WP_REST_Response(array(
                        'status' => 'completed',
                        'message' => 'No more images to process',
                        'current' => $current,
                        'total' => $total
                    ), 200);
                }
                $args['post__in'] = $ids;
            }

            $media_items = get_posts($args);
            
            if (empty($media_items)) {
                update_option('aatg_is_processing', false);
                update_option('aatg_processing_total', 0);
                update_option('aatg_processing_current', 0);
                return new WP_REST_Response(array(
                    'status' => 'completed',
                    'message' => 'No more images to process',
                    'current' => $current,
                    'total' => $total
                ), 200);
            }

            $item = $media_items[0];
            
            // Get OpenAI key from options
            $options = get_option('aatg_text_generator_options', array());
            if (empty($options['openai_key'])) {
                throw new Exception('OpenAI API key is not configured');
            }

            // Get image file path
            $upload_dir = wp_upload_dir();
            $image_meta = wp_get_attachment_metadata($item->ID);
            
            if (!$image_meta || !isset($image_meta['file'])) {
                throw new Exception('Failed to get image metadata');
            }

            // Get the full server path to the image
            $image_path = $upload_dir['basedir'] . '/' . $image_meta['file'];

            // Check if file exists
            if (!file_exists($image_path)) {
                throw new Exception('Image file not found');
            }

            // Read image file directly
            $image_data = file_get_contents($image_path);
            if ($image_data === false) {
                throw new Exception('Failed to read image file');
            }

            // Convert image to base64
            $image_base64 = base64_encode($image_data);
            if (empty($image_base64)) {
                throw new Exception('Failed to process image');
            }

            // Prepare OpenAI API request
            $api_url = 'https://api.openai.com/v1/chat/completions';
            $prompt = $options['prompt'] ?: 'Create a SEO optimized alt text for this image. Don\'t include quotes and keep it informative and concise.';
            $language = $options['language'] ?: 'english';
            $prompt_with_lang = $prompt . ' Write it in this language: ' . $language;

            $body = wp_json_encode([
                'model' => 'gpt-4o-mini',
                'temperature' => 0.6,
                'max_tokens' => 100,
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => [
                            [
                                'type' => 'text',
                                'text' => $prompt_with_lang,
                            ],
                            [
                                'type' => 'image_url',
                                'image_url' => [
                                    'url' => 'data:image/jpeg;base64,' . $image_base64
                                ],
                            ],
                        ],
                    ],
                ],
            ]);

            $response = wp_remote_post($api_url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $options['openai_key'],
                    'Content-Type' => 'application/json',
                ],
                'body' => $body,
                'timeout' => 30,
            ]);

            if (is_wp_error($response)) {
                throw new Exception('OpenAI API error: ' . $response->get_error_message());
            }

            $response_code = wp_remote_retrieve_response_code($response);
            $response_body = wp_remote_retrieve_body($response);

            if ($response_code !== 200) {
                throw new Exception('OpenAI API error: ' . $response_body);
            }

            $data = json_decode($response_body);
            if (!$data || !isset($data->choices[0]->message->content)) {
                throw new Exception('Invalid response from OpenAI');
            }

            $alt_text = trim($data->choices[0]->message->content);

            // Update the alt text
            update_post_meta($item->ID, '_wp_attachment_image_alt', $alt_text);
            $current++;
            update_option('aatg_processing_current', $current);

            return new WP_REST_Response(array(
                'status' => 'success',
                'message' => 'Image processed successfully',
                'current' => $current,
                'total' => $total,
                'is_processing' => true
            ), 200);

        } catch (Exception $e) {
            error_log('Error processing image: ' . $e->getMessage());
            
            // Skip this image but continue processing
            $current++;
            update_option('aatg_processing_current', $current);
            
            return new WP_REST_Response(array(
                'status' => 'error',
                'message' => $e->getMessage(),
                'current' => $current,
                'total' => $total,
                'is_processing' => true
            ), 200);
        }
    }

    public function validate_openai_key(WP_REST_Request $request) {
        $key = $request->get_param('key');
        if (empty($key)) {
            return new WP_REST_Response(array(
                'valid' => false,
                'message' => 'API key is required'
            ), 400);
        }

        $response = wp_remote_get('https://api.openai.com/v1/models', array(
            'headers' => array(
                'Authorization' => 'Bearer ' . $key,
            ),
        ));

        if (is_wp_error($response)) {
            return new WP_REST_Response(array(
                'valid' => false,
                'message' => 'Failed to validate API key'
            ), 400);
        }

        $response_code = wp_remote_retrieve_response_code($response);
        $body = json_decode(wp_remote_retrieve_body($response), true);

        if ($response_code === 200) {
            return new WP_REST_Response(array(
                'valid' => true,
                'message' => 'API key is valid'
            ), 200);
        } else {
            return new WP_REST_Response(array(
                'valid' => false,
                'message' => isset($body['error']['message']) ? $body['error']['message'] : 'Invalid API key'
            ), 400);
        }
    }

	private function log($message) {
        $log_file = '/var/log/wordpress/debug.log';
        $timestamp = date('Y-m-d H:i:s');
        error_log("[$timestamp] $message\n", 3, $log_file);
    }

	public function process_media_batch($batch_size) {
        $this->log('Starting batch processing with batch size: ' . $batch_size);
        
        if (!get_option('aatg_is_processing', false)) {
            $this->log('Processing flag is false, stopping batch process');
            update_option('aatg_processing_total', 0);
            update_option('aatg_processing_current', 0);
            return;
        }

        $args = array(
            'post_type'      => 'attachment',
            'post_status'    => 'inherit',
            'post_mime_type' => 'image',
            'posts_per_page' => $batch_size,
            'offset'         => get_option('aatg_processing_current', 0)
        );

        // If not rewriting all, fetch images without alt text
        if (!$this->rewrite_all) {
            $ids = $this->get_images_without_alt_text_ids();
            $this->log('Found ' . count($ids) . ' images without alt text');
            if (empty($ids)) {
                $this->log('No images without alt text found, marking as complete');
                update_option('aatg_is_processing', false);
                update_option('aatg_processing_total', 0);
                update_option('aatg_processing_current', 0);
                return;
            }
            $args['post__in'] = $ids;
        }
    
        $media_items = get_posts($args);
        $this->log('Retrieved ' . count($media_items) . ' media items for processing');
    
        if (empty($media_items)) {
            $this->log('No media items found in this batch, marking as complete');
            update_option('aatg_is_processing', false);
            update_option('aatg_processing_total', 0);
            update_option('aatg_processing_current', 0);
            return;
        }

        $admin_instance = AATG_Text_Generator_Admin::get_instance();
        $current = get_option('aatg_processing_current', 0);
        $total = get_option('aatg_processing_total', 0);

        $this->log("Starting to process batch. Current: $current, Total: $total");

        foreach ($media_items as $item) {
            if (!get_option('aatg_is_processing', false)) {
                $this->log('Processing stopped by user');
                return;
            }

            $this->log("Processing media item ID: {$item->ID}");
            $image_url = $admin_instance->get_image_url_by_size($item->ID, 'thumbnail');
            
            if (!$image_url) {
                $this->log('Failed to get image URL for media ID: ' . $item->ID);
                continue;
            }

            try {
                $alt_text = $admin_instance->generate_alt_text_with_openai($image_url);
                $this->log("Generated alt text for media ID {$item->ID}: $alt_text");
        
                if ($alt_text) {
                    update_post_meta($item->ID, '_wp_attachment_image_alt', $alt_text);
                    $current++;
                    update_option('aatg_processing_current', $current);
                    $this->log("Updated progress - Current: $current, Total: $total");

                    // Check if we've processed all images
                    if ($current >= $total) {
                        $this->log('All images processed, marking as complete');
                        update_option('aatg_is_processing', false);
                        update_option('aatg_processing_total', 0);
                        update_option('aatg_processing_current', 0);
                        return;
                    }
                } else {
                    $this->log('Failed to generate alt text for media ID: ' . $item->ID);
                }
            } catch (Exception $e) {
                $this->log('Error processing media ID ' . $item->ID . ': ' . $e->getMessage());
                continue;
            }
        }
    
        if (get_option('aatg_is_processing', false)) {
            $this->log('Scheduling next batch');
            wp_schedule_single_event(time() + 5, 'ai_process_media_batch', array($batch_size));
        }
	}

	private function get_images_without_alt_text_ids() {
		global $wpdb;

		$query = "
			SELECT p.ID
			FROM {$wpdb->posts} p
			LEFT JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id AND pm.meta_key = '_wp_attachment_image_alt'
			WHERE p.post_type = 'attachment'
			AND p.post_mime_type LIKE 'image%'
			AND (pm.meta_value IS NULL OR pm.meta_value = '')
		";

		$results = $wpdb->get_results($query);
		$ids = array_map(function($result) {
			return $result->ID;
		}, $results);

		return $ids;
	}

    public function get_settings() {
        $defaults = array(
            'openai_key' => '',
            'on_upload_alt_text' => false,
            'all_alt_text' => false,
            'prompt' => 'Create a SEO optimized alt text for this image. Don\'t include quotes and keep it informative and concise.',
            'language' => 'english'
        );
        
        $options = get_option('aatg_text_generator_options', $defaults);
        error_log('Getting settings from DB: ' . print_r($options, true));
        return new WP_REST_Response($options, 200);
    }

    public function update_settings(WP_REST_Request $request) {
        $settings = $request->get_params();
        error_log('Received settings to save: ' . print_r($settings, true));
        
        $defaults = array(
            'openai_key' => '',
            'on_upload_alt_text' => false,
            'all_alt_text' => false,
            'prompt' => 'Create a SEO optimized alt text for this image. Don\'t include quotes and keep it informative and concise.',
            'language' => 'english'
        );
        
        // Ensure we have all required fields
        $settings = wp_parse_args($settings, $defaults);
        
        // Delete the option first to ensure it's updated
        delete_option('aatg_text_generator_options');
        
        // Save the new settings
        $result = update_option('aatg_text_generator_options', $settings, false);
        error_log('Update result: ' . ($result ? 'success' : 'failed'));
        
        // Verify the save
        $saved = get_option('aatg_text_generator_options');
        error_log('Verified saved settings: ' . print_r($saved, true));
        
        if (!$result || !$saved) {
            return new WP_REST_Response(array(
                'error' => 'Failed to save settings',
                'settings' => $settings
            ), 500);
        }
        
        return new WP_REST_Response($saved, 200);
    }

    public function check_processing_status() {
        $is_processing = get_option('aatg_is_processing', false);
        return new WP_REST_Response(array('is_processing' => $is_processing), 200);
    }

    public function stop_processing() {
        update_option('aatg_is_processing', false);
        update_option('aatg_processing_total', 0);
        update_option('aatg_processing_current', 0);
        return new WP_REST_Response(array(
            'status' => 'success',
            'message' => 'Processing stopped'
        ), 200);
    }

    public function get_processing_status() {
        $is_processing = get_option('aatg_is_processing', false);
        $total_items = get_option('aatg_processing_total', 0);
        $current_item = get_option('aatg_processing_current', 0);

        // Validate the status - if current equals total, processing is done
        if ($total_items > 0 && $current_item >= $total_items) {
            update_option('aatg_is_processing', false);
            update_option('aatg_processing_total', 0);
            update_option('aatg_processing_current', 0);
            $is_processing = false;
            $total_items = 0;
            $current_item = 0;
        }

        // If not processing, ensure counters are reset
        if (!$is_processing) {
            update_option('aatg_processing_total', 0);
            update_option('aatg_processing_current', 0);
            $total_items = 0;
            $current_item = 0;
        }

        return new WP_REST_Response(array(
            'is_processing' => $is_processing,
            'total_items' => $total_items,
            'current_item' => $current_item
        ), 200);
    }

    public function handle_test_generation(WP_REST_Request $request) {
        try {
            $image_id = $request->get_param('image_id');
            $custom_prompt = $request->get_param('prompt');

            if (!$image_id) {
                return new WP_REST_Response(array(
                    'success' => false,
                    'message' => 'Image ID is required'
                ), 400);
            }

            // Get OpenAI key from options
            $options = get_option('aatg_text_generator_options', array());
            if (empty($options['openai_key'])) {
                return new WP_REST_Response(array(
                    'success' => false,
                    'message' => 'OpenAI API key is not configured'
                ), 400);
            }

            // Get image file path instead of URL
            $upload_dir = wp_upload_dir();
            $image_meta = wp_get_attachment_metadata($image_id);
            
            if (!$image_meta || !isset($image_meta['file'])) {
                return new WP_REST_Response(array(
                    'success' => false,
                    'message' => 'Failed to get image metadata'
                ), 400);
            }

            // Get the full server path to the image
            $image_path = $upload_dir['basedir'] . '/' . $image_meta['file'];

            // Check if file exists
            if (!file_exists($image_path)) {
                return new WP_REST_Response(array(
                    'success' => false,
                    'message' => 'Image file not found'
                ), 400);
            }

            // Read image file directly
            $image_data = file_get_contents($image_path);
            if ($image_data === false) {
                return new WP_REST_Response(array(
                    'success' => false,
                    'message' => 'Failed to read image file'
                ), 400);
            }

            // Convert image to base64
            $image_base64 = base64_encode($image_data);
            if (empty($image_base64)) {
                return new WP_REST_Response(array(
                    'success' => false,
                    'message' => 'Failed to process image'
                ), 400);
            }

            // Prepare OpenAI API request
            $api_url = 'https://api.openai.com/v1/chat/completions';
            $prompt = $custom_prompt ?: $options['prompt'] ?: 'Create a SEO optimized alt text for this image. Don\'t include quotes and keep it informative and concise.';
            $language = $options['language'] ?: 'english';
            $prompt_with_lang = $prompt . ' Write it in this language: ' . $language;

            $body = wp_json_encode([
                'model' => 'gpt-4o-mini',
                'temperature' => 0.6,
                'max_tokens' => 100,
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => [
                            [
                                'type' => 'text',
                                'text' => $prompt_with_lang,
                            ],
                            [
                                'type' => 'image_url',
                                'image_url' => [
                                    'url' => 'data:image/jpeg;base64,' . $image_base64
                                ],
                            ],
                        ],
                    ],
                ],
            ]);

            $response = wp_remote_post($api_url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $options['openai_key'],
                    'Content-Type' => 'application/json',
                ],
                'body' => $body,
                'timeout' => 30,
            ]);

            if (is_wp_error($response)) {
                error_log('OpenAI API error: ' . $response->get_error_message());
                return new WP_REST_Response(array(
                    'success' => false,
                    'message' => 'OpenAI API error: ' . $response->get_error_message()
                ), 400);
            }

            $response_code = wp_remote_retrieve_response_code($response);
            $response_body = wp_remote_retrieve_body($response);

            if ($response_code !== 200) {
                error_log('OpenAI API error: ' . $response_body);
                return new WP_REST_Response(array(
                    'success' => false,
                    'message' => 'OpenAI API error: ' . $response_body
                ), 400);
            }

            $data = json_decode($response_body);
            if (!$data || !isset($data->choices[0]->message->content)) {
                return new WP_REST_Response(array(
                    'success' => false,
                    'message' => 'Invalid response from OpenAI'
                ), 400);
            }

            $alt_text = trim($data->choices[0]->message->content);

            return new WP_REST_Response(array(
                'success' => true,
                'alt_text' => $alt_text
            ), 200);

        } catch (Exception $e) {
            error_log('Error in test generation: ' . $e->getMessage());
            return new WP_REST_Response(array(
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ), 500);
        }
    }
}

// Initialize the class
new AATG_Text_Generator_Restpoint();
