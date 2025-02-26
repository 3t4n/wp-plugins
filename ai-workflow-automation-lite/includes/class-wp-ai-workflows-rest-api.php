<?php
/**
 * Manages all REST API endpoints for the plugin.
 */
class WP_AI_Workflows_REST_API {

    public function init() {
        add_action('rest_api_init', array($this, 'register_rest_routes'));
    }

    public function register_rest_routes() {
        // Workflows
        register_rest_route('wp-ai-workflows/v1', '/workflows', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_workflows'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        register_rest_route('wp-ai-workflows/v1', '/workflows', array(
            'methods' => 'POST',
            'callback' => array($this, 'create_workflow'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        register_rest_route('wp-ai-workflows/v1', '/workflows/(?P<id>[\w-]+)', array(
            'methods' => 'PUT',
            'callback' => array($this, 'update_workflow'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        register_rest_route('wp-ai-workflows/v1', '/workflows/(?P<id>[\w-]+)', array(
            'methods' => 'DELETE',
            'callback' => array($this, 'delete_workflow'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        register_rest_route('wp-ai-workflows/v1', '/workflows/(?P<id>[\w-]+)', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_single_workflow'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        // Workflow Execution
        register_rest_route('wp-ai-workflows/v1', '/execute-workflow/(?P<id>[\w-]+)', array(
            'methods' => 'POST',
            'callback' => array($this, 'execute_workflow_endpoint'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        register_rest_route('wp-ai-workflows/v1', '/executions', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_executions'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        register_rest_route('wp-ai-workflows/v1', '/executions/(?P<id>\d+)', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_execution'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        register_rest_route('wp-ai-workflows/v1', '/executions/(?P<id>\d+)', array(
            'methods' => 'DELETE',
            'callback' => array($this, 'stop_and_delete_execution'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        // Settings
        register_rest_route('wp-ai-workflows/v1', '/settings', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_settings'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        register_rest_route('wp-ai-workflows/v1', '/settings', array(
            'methods' => 'POST',
            'callback' => array($this, 'update_settings'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        // API key verification
        register_rest_route('wp-ai-workflows/v1', '/generate-api-key', array(
            'methods' => 'POST',
            'callback' => array($this, 'generate_api_key'),
            'permission_callback' => array($this, 'authorize_request')
        ));
        
        register_rest_route('wp-ai-workflows/v1', '/verify-api-key', array(
            'methods' => 'POST',
            'callback' => array($this, 'verify_api_key'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        // Webhooks
        register_rest_route('wp-ai-workflows/v1', '/webhook/(?P<node_id>[\w-]+)', array(
            'methods' => 'POST',
            'callback' => array($this, 'handle_webhook_trigger'),
            'permission_callback' => '__return_true'
        ));

        register_rest_route('wp-ai-workflows/v1', '/generate-webhook', array(
            'methods' => 'POST',
            'callback' => array($this, 'generate_webhook_url'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        register_rest_route('wp-ai-workflows/v1', '/sample-webhook/(?P<id>[\w-]+)', array(
            'methods' => 'GET',
            'callback' => array($this, 'sample_webhook'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        // Post
        register_rest_route('wp-ai-workflows/v1', '/post-types', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_post_types'),
            'permission_callback' => array($this, 'authorize_request')
        ));
        
        register_rest_route('wp-ai-workflows/v1', '/post-fields/(?P<post_type>[\w-]+)', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_post_fields'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        register_rest_route('wp-ai-workflows/v1', '/execute-post-node', array(
            'methods' => 'POST',
            'callback' => array($this, 'execute_post_node'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        // Unsplash
        register_rest_route('wp-ai-workflows/v1', '/unsplash/search', array(
            'methods' => 'POST',
            'callback' => array($this, 'search_unsplash'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        // Outputs
        register_rest_route('wp-ai-workflows/v1', '/save-output', array(
            'methods' => 'POST',
            'callback' => array($this, 'save_output'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        register_rest_route('wp-ai-workflows/v1', '/outputs', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_outputs'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        register_rest_route('wp-ai-workflows/v1', '/latest-output', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_latest_output'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        register_rest_route('wp-ai-workflows/v1', '/shortcode-output', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_shortcode_output'),
            'permission_callback' => '__return_true'
        ));

            // Gravity Forms
        register_rest_route('wp-ai-workflows/v1', '/gravity-forms', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_gravity_forms_data'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        register_rest_route('wp-ai-workflows/v1', '/wpforms', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_wpforms_data'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        // Chat endpoint
        register_rest_route('wp-ai-workflows/v1', '/chat', array(
            'methods' => 'POST',
            'callback' => array($this, 'handle_chat_message'),
            'permission_callback' => '__return_true'
        ));
    
        register_rest_route('wp-ai-workflows/v1', '/chat-history', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_chat_history'),
            'permission_callback' => '__return_true'
        ));
    
    
        register_rest_route('wp-ai-workflows/v1', '/chat-config/(?P<workflow_id>[a-zA-Z0-9-]+)', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_chat_config'),
            'permission_callback' => '__return_true'
        ));

        // Chat Logs
        register_rest_route('wp-ai-workflows/v1', '/chat-logs', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_chat_logs'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        register_rest_route('wp-ai-workflows/v1', '/chat-messages/(?P<session_id>[^/]+)', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_chat_messages'),
            'permission_callback' => array($this, 'authorize_request')
        ));

        register_rest_route('wp-ai-workflows/v1', '/chat-statistics', array(
            'methods' => 'GET',
            'callback' => array($this, 'get_chat_statistics'),
            'permission_callback' => array($this, 'authorize_request')
        ));


    }

    public function authorize_request($request) {
        if (current_user_can('manage_options')) {
            return true;
        }
    
        $provided_key = $request->get_header('X-Api-Key');
        $encrypted_key = get_option('wp_ai_workflows_encrypted_api_key');
        
        if ($provided_key && wp_check_password($provided_key, $encrypted_key)) {
            return true;
        }
    
        WP_AI_Workflows_Utilities::debug_log("Authorization failed", "error", [
            'route' => $request->get_route(),
            'method' => $request->get_method()
        ]);
        return new WP_Error('rest_forbidden', 'Unauthorized access', array('status' => 401));
    }

    public function get_workflows($request) {
        return WP_AI_Workflows_Workflow::get_workflows($request);
    }

    public function create_workflow($request) {
        return WP_AI_Workflows_Workflow::create_workflow($request);
    }

    public function update_workflow($request) {
        return WP_AI_Workflows_Workflow::update_workflow($request);
    }

    public function get_gravity_forms_data($request) {
        return WP_AI_Workflows_Utilities::get_gravity_forms_data($request);
    }

    public function get_wpforms_data($request) {
        return WP_AI_Workflows_Utilities::get_wpforms_data($request);
    }

    public function delete_workflow($request) {
        return WP_AI_Workflows_Workflow::delete_workflow($request);
    }

    public function get_single_workflow($request) {
        return WP_AI_Workflows_Workflow::get_single_workflow($request);
    }

    public function execute_workflow_endpoint($request) {
        return WP_AI_Workflows_Workflow::execute_workflow_endpoint($request);
    }

    public function get_executions($request) {
        return WP_AI_Workflows_Workflow::get_executions($request);
    }

    public function get_execution($request) {
        return WP_AI_Workflows_Workflow::get_execution($request);
    }

    public function stop_and_delete_execution($request) {
        return WP_AI_Workflows_Workflow::stop_and_delete_execution($request);
    }

    public function handle_webhook_trigger($request) {
        return WP_AI_Workflows_Workflow::handle_webhook_trigger($request);
    }

    public function generate_webhook_url($request) {
        return WP_AI_Workflows_Workflow::generate_webhook_url($request);
    }

    public function save_output($request) {
        return WP_AI_Workflows_Workflow::save_output($request);
    }

    public function get_outputs($request) {
        return WP_AI_Workflows_Workflow::get_outputs($request);
    }

    public function get_latest_output($request) {
        return WP_AI_Workflows_Workflow::get_latest_output($request);
    }

    public function get_shortcode_output($request) {
        return WP_AI_Workflows_Shortcode::get_shortcode_output($request);
    }

    public function get_post_types($request) {
        return WP_AI_Workflows_Node_Execution::get_post_types($request);
    }

    public function get_post_fields($request) {
        return WP_AI_Workflows_Node_Execution::get_post_fields($request);
    }

    public function execute_post_node($request) {
        return WP_AI_Workflows_Node_Execution::execute_post_node($request);
    }

    public function generate_api_key($request) {
        try {
            $new_key = WP_AI_Workflows_Utilities::generate_and_encrypt_api_key();
            
            // Return both the new key (for immediate use) and the masked version
            return new WP_REST_Response([
                'ai_workflow_api_key' => $new_key,
                'masked_key' => WP_AI_Workflows_Utilities::get_api_key()
            ], 200);
            
        } catch (Exception $e) {
            return new WP_Error(
                'api_key_generation_failed',
                $e->getMessage(),
                array('status' => 500)
            );
        }
    }
    
    public function verify_api_key($request) {
        try {
            $provided_key = $request->get_param('api_key');
            if (empty($provided_key)) {
                return new WP_Error(
                    'missing_api_key',
                    'API key is required',
                    array('status' => 400)
                );
            }
            
            $encrypted_key = get_option('wp_ai_workflows_encrypted_api_key');
            if (!$encrypted_key) {
                return new WP_Error(
                    'no_key_configured',
                    'No API key is configured',
                    array('status' => 404)
                );
            }
            
            $is_valid = wp_check_password($provided_key, $encrypted_key);
            return new WP_REST_Response(['valid' => $is_valid], 200);
            
        } catch (Exception $e) {
            return new WP_Error(
                'verification_failed',
                $e->getMessage(),
                array('status' => 500)
            );
        }
    }

    
    public function get_settings($request) {
        // Get all settings from the utilities class
        $response = WP_AI_Workflows_Utilities::get_settings($request);
        
        if (is_wp_error($response)) {
            return $response;
        }
        
        $settings = $response->get_data();
        
        // Add legacy settings if they exist
        $legacy_openai_key = get_option('wp_ai_workflows_openai_api_key', '');
        if (!empty($legacy_openai_key) && empty($settings['openai_api_key'])) {
            $settings['openai_api_key'] = $legacy_openai_key;
        }
        
        $legacy_workflow_key = get_option('wp_ai_workflows_api_key', '');
        if (!empty($legacy_workflow_key) && empty($settings['ai_workflow_api_key'])) {
            $settings['ai_workflow_api_key'] = $legacy_workflow_key;
        }
        
        return new WP_REST_Response($settings, 200);
    }
    
    public function update_settings($request) {
        // Update all settings through the utilities class
        $response = WP_AI_Workflows_Utilities::update_settings($request);
        
        if (is_wp_error($response)) {
            return $response;
        }
        
        // Handle legacy settings for backward compatibility
        $openai_api_key = $request->get_param('openai_api_key');
        if ($openai_api_key) {
            update_option('wp_ai_workflows_openai_api_key', $openai_api_key);
        }
        
        return $response;
    }

    public function sample_webhook($request) {
        $node_id = $request['id'];
        $timeout = 60; // 60 seconds timeout
        $start_time = time();
    
        while (time() - $start_time < $timeout) {
            $webhook_data = get_transient('wp_ai_workflows_webhook_sample_' . $node_id);
            if ($webhook_data) {
                delete_transient('wp_ai_workflows_webhook_sample_' . $node_id);
                return new WP_REST_Response(array('keys' => $this->parse_webhook_keys($webhook_data)), 200);
            }
            sleep(1);
        }
    
        return new WP_REST_Response(array('message' => 'No webhook data received within the timeout period'), 404);
    }
    
    private function parse_webhook_keys($data, $prefix = '') {
        $keys = array();
        foreach ($data as $key => $value) {
            $full_key = $prefix ? $prefix . '/' . $key : $key;
            if (is_array($value) || is_object($value)) {
                $keys = array_merge($keys, $this->parse_webhook_keys($value, $full_key));
            } else {
                $keys[] = array(
                    'key' => $full_key,
                    'type' => $this->get_value_type($value)
                );
            }
        }
        return $keys;
    }
    
    private function get_value_type($value) {
        if (is_numeric($value)) return 'number';
        if (is_bool($value)) return 'boolean';
        return 'string';
    }

    public function search_unsplash($request) {
        $params = $request->get_json_params();
        $search_term = sanitize_text_field($params['searchTerm']);
        $orientation = sanitize_text_field($params['orientation']);
        $random_result = isset($params['randomResult']) ? (bool)$params['randomResult'] : false;
        $image_size = isset($params['imageSize']) ? sanitize_text_field($params['imageSize']) : 'regular';
    
        $api_key = WP_AI_Workflows_Utilities::get_unsplash_api_key();
        if (empty($api_key)) {
            return new WP_Error('unsplash_api_key_missing', 'Unsplash API key is not set', array('status' => 403));
        }
    
        $query_params = array(
            'query' => $search_term,
            'per_page' => $random_result ? 10 : 1,
        );
    
        if ($orientation !== 'all') {
            $query_params['orientation'] = $orientation;
        }
    
        $url = add_query_arg($query_params, 'https://api.unsplash.com/search/photos');
    
        $response = wp_remote_get($url, array(
            'headers' => array(
                'Authorization' => 'Client-ID ' . $api_key,
                'Accept-Version' => 'v1'
            )
        ));
    
        if (is_wp_error($response)) {
            return new WP_Error('unsplash_api_error', $response->get_error_message(), array('status' => 500));
        }
    
        $response_code = wp_remote_retrieve_response_code($response);
        $body = json_decode(wp_remote_retrieve_body($response), true);
    
        if ($response_code === 429) {
            return new WP_Error('rate_limit_exceeded', 'Unsplash API rate limit exceeded', array('status' => 429));
        }
    
        if ($response_code !== 200 || empty($body['results'])) {
            return new WP_Error('unsplash_api_error', 'Failed to fetch image from Unsplash', array('status' => $response_code));
        }
    
        // Get random result if enabled, otherwise get first result
        $result = $random_result ? 
            $body['results'][array_rand($body['results'])] : 
            $body['results'][0];
    
        // Just return the specific URL and basic info needed for preview
        return new WP_REST_Response([
            'url' => $result['urls'][$image_size] ?? $result['urls']['regular'],
            'thumb' => $result['urls']['thumb'], // For preview in the node
            'id' => $result['id']
        ], 200);
    }

    public function handle_chat_message($request) {
        try {
            $workflow_id = $request->get_param('workflow_id');
            $message = $request->get_param('message');
            $session_id = $request->get_param('session_id');
            
            if (empty($workflow_id) || empty($message)) {
                return new WP_Error(
                    'invalid_request',
                    'Workflow ID and message are required',
                    array('status' => 400)
                );
            }
            
            $chat_handler = new WP_AI_Workflows_Chat_Handler($workflow_id, $session_id);
            $response = $chat_handler->handle_message($message, false);
            
            return new WP_REST_Response(array(
                'message' => $response,
                'session_id' => $chat_handler->get_session()->get_session_id()
            ), 200);
            
        } catch (Exception $e) {
            WP_AI_Workflows_Utilities::debug_log("Chat error", "error", [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
    
            return new WP_Error(
                'chat_error',
                $e->getMessage(),
                array('status' => 500)
            );
        }
    }
    
    
    public function get_chat_history($request) {
        try {
            $workflow_id = $request->get_param('workflow_id');
            $session_id = $request->get_param('session_id');
            
            if (empty($workflow_id)) {
                return new WP_Error(
                    'invalid_request',
                    'Workflow ID is required',
                    array('status' => 400)
                );
            }
            
            $chat_handler = new WP_AI_Workflows_Chat_Handler($workflow_id, $session_id);
            $history = $chat_handler->get_session()->get_history();
            
            return new WP_REST_Response(array(
                'history' => $history,
                'session_id' => $chat_handler->get_session()->get_session_id()
            ), 200);
            
        } catch (Exception $e) {
            return new WP_Error(
                'chat_error',
                $e->getMessage(),
                array('status' => 400)
            );
        }
    }
    
    public function get_chat_config($request) {
        try {
            $workflow_id = $request['workflow_id'];
            WP_AI_Workflows_Utilities::debug_log("Getting chat config", "debug", [
                'workflow_id' => $workflow_id
            ]);
    
            // Get workflows from option
            $workflows = get_option('wp_ai_workflows', array());
            $workflow = null;
    
            // Find the workflow by ID without the node suffix
            $base_workflow_id = preg_replace('/-[\w\d]+$/', '', $workflow_id);
            
            foreach ($workflows as $w) {
                if ($w['id'] === $base_workflow_id) {
                    $workflow = $w;
                    break;
                }
            }
    
            if (!$workflow) {
                WP_AI_Workflows_Utilities::debug_log("Workflow not found", "error", [
                    'workflow_id' => $workflow_id,
                    'base_workflow_id' => $base_workflow_id
                ]);
                return new WP_Error('not_found', 'Workflow not found', array('status' => 404));
            }
    
            // Find chat node
            foreach ($workflow['nodes'] as $node) {
                if ($node['type'] === 'chat') {
                    $chat_node = $node;
                    break;
                }
            }
    
            if (!$chat_node) {
                WP_AI_Workflows_Utilities::debug_log("Chat node not found", "error", [
                    'workflow_id' => $workflow_id
                ]);
                return new WP_Error('no_chat', 'No chat configuration found', array('status' => 404));
            }
    
            $config = array(
                'design' => $chat_node['data']['design'],
                'behavior' => $chat_node['data']['behavior']
            );
    
            WP_AI_Workflows_Utilities::debug_log("Chat config retrieved", "debug", [
                'workflow_id' => $workflow_id,
                'config' => $config
            ]);
    
            return new WP_REST_Response(array('config' => $config), 200);
    
        } catch (Exception $e) {
            WP_AI_Workflows_Utilities::debug_log("Error getting chat config", "error", [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return new WP_Error('error', $e->getMessage(), array('status' => 500));
        }
    }

    public function get_chat_logs($request) {
        global $wpdb;
        $sessions_table = $wpdb->prefix . 'wp_ai_workflows_chat_sessions';
        $messages_table = $wpdb->prefix . 'wp_ai_workflows_chat_messages';

        if($wpdb->get_var("SHOW TABLES LIKE '$sessions_table'") != $sessions_table) {
            return new WP_REST_Response([
                'logs' => [],
                'total' => 0
            ], 200);
        }
    
        // Get all workflows first
        $workflows = get_option('wp_ai_workflows', array());
        $workflow_names = array();
        foreach ($workflows as $workflow) {
            $workflow_names[$workflow['id']] = $workflow['name'];
        }
    
        $page = $request->get_param('page') ?: 1;
        $per_page = $request->get_param('per_page') ?: 10;
        $search = $request->get_param('search');
        $workflow_id = $request->get_param('workflow_id');
        $start_date = $request->get_param('start_date');
        $end_date = $request->get_param('end_date');
    
        // Build query conditions
        $where_clauses = [];
        $where_values = [];
    
        if ($search) {
            $where_clauses[] = "(s.session_id LIKE %s OR m.content LIKE %s)";
            $where_values[] = '%' . $wpdb->esc_like($search) . '%';
            $where_values[] = '%' . $wpdb->esc_like($search) . '%';
        }
    
        if ($workflow_id) {
            $where_clauses[] = "s.workflow_id = %s";
            $where_values[] = $workflow_id;
        }
    
        if ($start_date) {
            $where_clauses[] = "s.created_at >= %s";
            $where_values[] = $start_date . ' 00:00:00';
        }
    
        if ($end_date) {
            $where_clauses[] = "s.created_at <= %s";
            $where_values[] = $end_date . ' 23:59:59';
        }
    
        $where_sql = $where_clauses ? 'WHERE ' . implode(' AND ', $where_clauses) : '';
    
        // Get total count
        $count_query = $wpdb->prepare(
            "SELECT COUNT(DISTINCT s.session_id) 
            FROM $sessions_table s 
            LEFT JOIN $messages_table m ON s.session_id = m.session_id 
            $where_sql",
            $where_values
        );
        
        $total = $wpdb->get_var($count_query);
    
        // Get paginated results
        $offset = ($page - 1) * $per_page;
        $query = $wpdb->prepare(
            "SELECT 
                s.session_id,
                s.workflow_id,
                s.created_at,
                s.updated_at,
                COUNT(DISTINCT m.id) as message_count
            FROM $sessions_table s
            LEFT JOIN $messages_table m ON s.session_id = m.session_id
            $where_sql
            GROUP BY s.session_id, s.workflow_id, s.created_at, s.updated_at
            ORDER BY s.updated_at DESC
            LIMIT %d OFFSET %d",
            array_merge($where_values, array($per_page, $offset))
        );
    
        $logs = $wpdb->get_results($query);
        
        // Add workflow names to the results
        foreach ($logs as &$log) {
            $log->workflow_name = isset($workflow_names[$log->workflow_id]) 
                ? $workflow_names[$log->workflow_id] 
                : 'Unknown Workflow';
        }
    
        WP_AI_Workflows_Utilities::debug_log("Chat logs fetched");

        if (!$logs) {
            $logs = [];  // Ensure logs is always an array
        }
    
        return new WP_REST_Response([
            'logs' => $logs,
            'total' => (int) $total
        ], 200);
    }
    
    public function get_chat_messages($request) {
        global $wpdb;
        $messages_table = $wpdb->prefix . 'wp_ai_workflows_chat_messages';
        $session_id = $request->get_param('session_id');

        if($wpdb->get_var("SHOW TABLES LIKE '$messages_table'") != $messages_table) {
            return new WP_REST_Response([], 200);
        }
    
        $messages = $wpdb->get_results($wpdb->prepare(
            "SELECT * FROM $messages_table WHERE session_id = %s ORDER BY created_at ASC",
            $session_id
        ));
    
        return new WP_REST_Response($messages, 200);
    }
    
    public function get_chat_statistics($request) {
        global $wpdb;
        $sessions_table = $wpdb->prefix . 'wp_ai_workflows_chat_sessions';
        $messages_table = $wpdb->prefix . 'wp_ai_workflows_chat_messages';

        if($wpdb->get_var("SHOW TABLES LIKE '$sessions_table'") != $sessions_table) {
            return new WP_REST_Response([
                'totalSessions' => 0,
                'activeToday' => 0,
                'totalMessages' => 0,
                'averageMessagesPerChat' => 0
            ], 200);
        }
    
        // Get total sessions
        $total_sessions = $wpdb->get_var("SELECT COUNT(*) FROM $sessions_table");
    
        // Get active sessions today
        $active_today = $wpdb->get_var($wpdb->prepare(
            "SELECT COUNT(DISTINCT session_id) FROM $sessions_table WHERE DATE(updated_at) = %s",
            current_time('Y-m-d')
        ));
    
        // Get total messages and average per chat
        $message_stats = $wpdb->get_row(
            "SELECT 
                COUNT(*) as total_messages,
                COUNT(*) / COUNT(DISTINCT session_id) as avg_messages_per_chat
            FROM $messages_table"
        );
    
        return new WP_REST_Response([
            'totalSessions' => (int) $total_sessions,
            'activeToday' => (int) $active_today,
            'totalMessages' => (int) $message_stats->total_messages,
            'averageMessagesPerChat' => round($message_stats->avg_messages_per_chat, 1)
        ], 200);
    }
}