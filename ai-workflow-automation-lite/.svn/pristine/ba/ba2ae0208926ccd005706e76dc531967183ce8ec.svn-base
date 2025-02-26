<?php

class WP_AI_Workflows_Chat_Handler {
    private $session;
    private $model;
    private $system_prompt;
    private $model_params;
    
    public function __construct($workflow_id, $session_id = null) {
        $this->session = new WP_AI_Workflows_Chat_Session($workflow_id, $session_id);
        $this->load_workflow_config();
    }
    
    private function load_workflow_config() {
        global $wpdb;
        $executions_table = $wpdb->prefix . 'wp_ai_workflows_executions';
        
        // Get the latest successful execution for this workflow
        $execution = $wpdb->get_row($wpdb->prepare(
            "SELECT * FROM $executions_table 
            WHERE workflow_id = %s 
            AND status = 'completed' 
            ORDER BY created_at DESC 
            LIMIT 1",
            $this->session->get_workflow_id()
        ));
    
        if ($execution && $execution->output_data) {
            $output_data = json_decode($execution->output_data, true);
            
            // Find the chat node data in the execution output
            foreach ($output_data as $node_id => $node_output) {
                if ($node_output['type'] === 'chat') {
                    $this->model = $node_output['content']['model'];
                    $this->system_prompt = $node_output['content']['systemPrompt'];
                    $this->model_params = $node_output['content']['settings']['modelParams'] ?? [];
                    break;
                }
            }
        } else {
            // Fallback to loading from workflow config if no execution exists
            $workflow = $this->get_workflow_by_id($this->session->get_workflow_id());
            if ($workflow) {
                $chat_node = $this->find_chat_node($workflow['nodes']);
                if ($chat_node) {
                    $this->model = $chat_node['data']['model'];
                    $this->system_prompt = $chat_node['data']['systemPrompt'];
                    $this->model_params = $chat_node['data']['modelParams'];
                }
            }
        }
    }

    public function get_session() {
        return $this->session;
    }
    
    public function handle_message($message, $stream = false) {
        $allowed_origins = array(get_site_url());
        if (!empty($_SERVER['HTTP_ORIGIN']) && !in_array($_SERVER['HTTP_ORIGIN'], $allowed_origins)) {
            throw new Exception('Invalid request origin');
        }
    
            // Validate message length
            if (strlen($message) > 2000) {
                throw new Exception('Message too long');
            }
            
            // Basic content validation
            if (empty(trim($message))) {
                throw new Exception('Empty message');
            }

            // Sanitize input
            $message = wp_kses($message, array(
                'a' => array(
                    'href' => array(),
                    'target' => array('_blank')
                ),
                'b' => array(),
                'strong' => array(),
                'i' => array(),
                'em' => array(),
                'code' => array(),
                'pre' => array()
            ));
            
        try {
            $this->current_message = $message; // Store current message
            
            WP_AI_Workflows_Utilities::debug_log("Starting message handling", "debug", [
                'workflow_id' => $this->session->get_workflow_id(),
                'message' => $message,
                'model' => $this->model
            ]);
    
            if (!$this->session->can_send_message()) {
                throw new Exception('Rate limit exceeded');
            }
    
            $context = $this->prepare_context($this->session->get_history());
            
    
            $is_openrouter = strpos($this->model, '/') !== false;
        
            // Models without a prefix are direct OpenAI models
            $response = $is_openrouter 
                ? $this->call_openrouter($context)
                : $this->call_openai($context);
    
            // Save messages after successful response
            $this->session->add_message('user', $message);
            $this->session->add_message('assistant', $response);
    
            return $response;
    
        } catch (Exception $e) {
            WP_AI_Workflows_Utilities::debug_log("Error in handle_message", "error", [
                'error_type' => get_class($e),
                'message' => 'Chat message handling failed',
                //'trace' => $e->getTraceAsString()  // Only log this in development
            ]);
            
            // Return sanitized error messages to the client
            throw new Exception('Unable to process message. Please try again later.');
        }
    }
    
    
    private function prepare_context($history) {
        $messages = array();
        
        // Add system prompt if exists
        if (!empty($this->system_prompt)) {
            $messages[] = array(
                'role' => 'system',
                'content' => $this->system_prompt
            );
        }
        
        // Add conversation history
        foreach ($history as $msg) {
            $messages[] = array(
                'role' => $msg->role,
                'content' => $msg->content
            );
        }
        
        // Add the current message
        $messages[] = array(
            'role' => 'user',
            'content' => $this->current_message
        );
    
        return $messages;
    }
    
    private function generate_response($message, $context) {
        // Add user message to context
        $context[] = array(
            'role' => 'user',
            'content' => $message
        );
        
        // Generate response using appropriate model
        if (strpos($this->model, 'openai/') === 0) {
            $response = $this->call_openai($context);
        } else {
            $response = $this->call_openrouter($context);
        }
        
        return $response;
    }
    
    private function call_openai($messages) {
        $response = WP_AI_Workflows_Utilities::call_openai_api(
            json_encode($messages),
            $this->model,
            [],
            $this->model_params
        );
    
        if (is_wp_error($response)) {
            throw new Exception($response->get_error_message());
        }
    
        // Extract just the content from the response
        if (isset($response['choices'][0]['message']['content'])) {
            return $response['choices'][0]['message']['content'];
        }
    
        throw new Exception('Unexpected response format from OpenAI');
    }
    
    private function call_openrouter($messages) {
        $response = WP_AI_Workflows_Utilities::call_openrouter_api(
            json_encode($messages),
            $this->model,
            [],
            $this->model_params
        );
    
        if (is_wp_error($response)) {
            throw new Exception($response->get_error_message());
        }
    
        // Extract just the content from the response
        if (isset($response['choices'][0]['message']['content'])) {
            return $response['choices'][0]['message']['content'];
        }
    
        throw new Exception('Unexpected response format from OpenRouter');
    }
    
    public function get_chat_history() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'wp_ai_workflows_chat_messages';
        
        return $wpdb->get_results($wpdb->prepare(
            "SELECT * FROM $table_name 
            WHERE session_id = %s 
            ORDER BY created_at ASC",
            $this->session_id
        ));
    }
    
    private function save_message($role, $content) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'wp_ai_workflows_chat_messages';
        
        $wpdb->insert(
            $table_name,
            array(
                'session_id' => $this->session_id,
                'role' => $role,
                'content' => $content,
                'created_at' => current_time('mysql')
            ),
            array('%s', '%s', '%s', '%s')
        );
    }
    
    private function get_workflow_by_id($workflow_id) {
        $workflows = get_option('wp_ai_workflows', array());
        foreach ($workflows as $workflow) {
            if ($workflow['id'] === $workflow_id) {
                return $workflow;
            }
        }
        return null;
    }
    
    private function find_chat_node($nodes) {
        foreach ($nodes as $node) {
            if ($node['type'] === 'chat') {
                return $node;
            }
        }
        return null;
    }
}