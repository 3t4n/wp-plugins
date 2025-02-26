<?php



if (!defined('ABSPATH')) exit;
if (file_exists(AI24AI_CHILD_FUNCTIONS_FILE)) {
    require_once AI24AI_CHILD_FUNCTIONS_FILE;
}



//Function to handle source tags in GPT responses
function AI24AI_clean_gpt_response($text) {
    $pattern = '/【\d+(:\d+)?†source】/';
    $cleaned_text = preg_replace($pattern, '', $text);
    return $cleaned_text;
}



// Define a function to get the headers
function get_openai_headers() {
    $api_key = get_option('AI24AI_api_key'); // Retrieve API key from WP options
    return [
        'Authorization' => 'Bearer ' . $api_key,
        'Content-Type' => 'application/json',
        'OpenAI-Beta' => 'assistants=v2'
    ];
}



function AI24AI_process_markdown_and_links($message) {
    $options = get_option('AI24AI_text_options', array('markdown_enabled' => 1));

    if (isset($options['markdown_enabled']) && $options['markdown_enabled']) {
        // Initialize Parsedown only once
        static $Parsedown = null;
        if ($Parsedown === null) {
            $Parsedown = new Parsedown();
        }
        // Convert Markdown to HTML
        $message = $Parsedown->text($message);
    } else {
        // Convert Markdown to plain text, keep links
        $message = AI24AI_strip_markdown($message);
        $message = AI24AI_convert_links($message);
    }

    return $message;
}



function AI24AI_strip_markdown($text) {
    // Strip Markdown syntax to plain text but keep links
    $text = preg_replace('/(\*\*|__)(.*?)\1/', '\2', $text); // bold
    $text = preg_replace('/(\*|_)(.*?)\1/', '\2', $text); // italic
    $text = preg_replace('/\#(.*?)\n/', '\1\n', $text); // headers
    $text = preg_replace('/\n\-(.*?)\n/', '\1\n', $text); // lists
    return wp_strip_all_tags($text); // Strip any remaining HTML tags
}



function AI24AI_convert_links($text) {
    // Convert Markdown links to HTML links
    $text = preg_replace('/\[([^\]]+)\]\((http[s]?:\/\/[^\s]+)\)/', '<a href="$2" target="_blank">$1</a>', $text);
    return $text;
}

// Function to create thread 
function AI24AI_create_thread($platform = 'AI24AI') {
    $base_api_url = "https://api.openai.com/v1";
    $url = "{$base_api_url}/threads";

    // Send minimal data - empty object required by OpenAI API
    $response_data = AI24AI_execute_openai_request($url, 'POST', new stdClass());
    
    if (!$response_data || !isset($response_data['id'])) {
        error_log("[AI24AI] Thread creation failed");
        return null;
    }

    $thread_id = $response_data['id'];
    
    // Only add to DB if function exists
    if (function_exists('AI24AI_add_thread_to_db')) {
        AI24AI_add_thread_to_db($thread_id, $platform);
    }
    
    // Only store in session if function exists
    if (function_exists('AI24AI_store_thread_id_in_session')) {
        AI24AI_store_thread_id_in_session($thread_id);
    }
    return $thread_id;
}


// Function to send messages to thread 
function AI24AI_send_message_to_thread($thread_id, $user_input) {
    $url = "https://api.openai.com/v1/threads/{$thread_id}/messages";
    
    $data = [
        'role' => 'user',
        'content' => $user_input
    ];

    $response_data = AI24AI_execute_openai_request($url, 'POST', $data);
    
    if (!$response_data || !isset($response_data['id'])) {
        error_log("[AI24AI] Message send failed");
        return null;
    }

    return $response_data['id'];
}

// fetch latest function from OpenAI
function AI24AI_fetch_latest_message_from_openai($thread_id) {
    $url = "https://api.openai.com/v1/threads/{$thread_id}/messages?limit=1&order=desc"; 
    $response_data = AI24AI_execute_openai_request($url, 'GET');

    if (!is_array($response_data) || !isset($response_data['data'])) {
        error_log("[AI24AI] Failed to fetch messages.");
        return [];
    }

    // Immediately return the latest assistant message
    foreach ($response_data['data'] as $message) {
        if ($message['role'] === 'assistant') {
            return [$message];
        }
    }

    return [];
}


// Function to create a run with designated ASSISTANT ID
function AI24AI_create_run($thread_id, $assistant_id) {
    $base_api_url = "https://api.openai.com/v1";
    $url = "{$base_api_url}/threads/{$thread_id}/runs";

    $data = [
        'assistant_id' => $assistant_id
    ];

    $response_data = AI24AI_execute_openai_request($url, 'POST', $data);
    
    if (!$response_data || !isset($response_data['id'])) {
        error_log("[AI24AI] Run creation failed");
        return null;
    }

    return $response_data['id'];
}

// Function to submit tool outputs to OpenAI
function AI24AI_submit_tool_outputs_to_openai($thread_id, $run_id, $tool_outputs) {
    $url = "https://api.openai.com/v1/threads/{$thread_id}/runs/{$run_id}/submit_tool_outputs";
    $data = [
        'tool_outputs' => $tool_outputs  // Make sure tool_outputs are formatted correctly
    ];

    $response_data = AI24AI_execute_openai_request($url, 'POST', $data);

    if ($response_data) {
        $response_code = $response_data['status'] ?? null;
        if ($response_code != 200) {
            $response_body = wp_json_encode($response_data);
            error_log("Failed to submit tool outputs: HTTP Status Code {$response_code}, Response: {$response_body}");
        }
    } else {
        error_log("Error submitting tool outputs.");
    }
}


// Create a thread and run in a single API Call
function AI24AI_create_thread_and_run($user_input, $assistant_id) {
    $url = "https://api.openai.com/v1/threads/runs";
    
    $data = [
        'assistant_id' => $assistant_id,
        'thread' => [
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $user_input
                ]
            ]
        ]
    ];

    $response_data = AI24AI_execute_openai_request($url, 'POST', $data);
    
    if (!$response_data || !isset($response_data['thread_id'])) {
        error_log("[AI24AI] Thread and run creation failed");
        return null;
    }

    return [
        'thread_id' => $response_data['thread_id'],
        'run_id' => $response_data['id']
    ];
}

// Fetch messages from OpenAI 
function AI24AI_fetch_messages_from_openai($thread_id) {
    $url = "https://api.openai.com/v1/threads/{$thread_id}/messages?order=desc&limit=3";
    
    
    $response_data = AI24AI_execute_openai_request($url, 'GET');

    if (!is_array($response_data) || empty($response_data['data'])) {
        error_log("[AI24AI] Failed to fetch messages.");
        return [];
    }

    // Process messages (CLEAN + FORMAT)
    return array_map(function ($message) {
        if ($message['role'] === 'assistant') {
            if (is_array($message['content'])) {
                foreach ($message['content'] as &$contentItem) {
                    if (isset($contentItem['text']['value'])) {
                        $cleaned_content = AI24AI_clean_gpt_response($contentItem['text']['value']);
                        $contentItem['text']['value'] = AI24AI_process_markdown_and_links($cleaned_content);
                    }
                }
            } else {
                $cleaned_content = AI24AI_clean_gpt_response($message['content']);
                $message['content'] = AI24AI_process_markdown_and_links($cleaned_content);
            }
        }
        return $message;
    }, $response_data['data']);
}


// Poll for response
function AI24AI_poll_for_response_and_retrieve_details($thread_id, $run_id) {
    $base_api_url = "https://api.openai.com/v1";
    $max_attempts = 40; 
    $attempt = 0;
    
    // Initial delay to let assistant start processing
    usleep(500000);  // 500ms initial delay
    $run_start = microtime(true);

    while ($attempt < $max_attempts) {
        $attempt++;
        $elapsed = microtime(true) - $run_start;
        // Dynamic delay based on elapsed time
        if ($attempt > 1) {
            $delay = (int)min(1000000, $elapsed * 200000);  // Scale up to max 1s
            usleep($delay);
        }
        
        $run_status_response = AI24AI_execute_openai_request(
            "{$base_api_url}/threads/{$thread_id}/runs/{$run_id}",
            'GET'
        );
        
        $status = $run_status_response['status'] ?? 'unknown';


        if ($status === 'completed') {
            $structured_messages = AI24AI_fetch_messages_from_openai($thread_id);

            return [
                'messages' => $structured_messages
            ];
        }

        if (in_array($status, ['failed', 'cancelled', 'expired'])) {
            error_log("[AI24AI] Run {$status}");
            return [];
        }
    }

    error_log("[AI24AI] Max polling attempts reached");
    return [];
}


// Function to execute cURL request
function AI24AI_execute_openai_request($url, $method = 'GET', $data = null) {
    static $requestCache = [];
    
    // More efficient cache key generation
    $cacheKey = $url . $method . ($data ? json_encode($data) : '');

    // Longer cache for polling status checks (300ms), shorter for other requests (100ms)
    $isStatusCheck = strpos($url, '/runs/') && strpos($url, '/threads/');
    $cacheDuration = $isStatusCheck ? 0.3 : 0.1;
    
    // Faster cache check (100ms window)
    if (isset($requestCache[$cacheKey]) && (microtime(true) - $requestCache[$cacheKey]['time'] < $cacheDuration)) {
        return $requestCache[$cacheKey]['response'];
    }

    // Pre-build headers once
    static $headers = null;
    if ($headers === null) {
        $headers = [
            'Authorization' => 'Bearer ' . get_option('AI24AI_api_key'),
            'Content-Type' => 'application/json',
            'OpenAI-Beta' => 'assistants=v2'
        ];
    }

    $args = [
        'headers' => $headers,
        'method' => $method,
        'timeout' => 15,     // Reduced timeout
        'data_format' => 'body'
    ];

    if ($data) {
        $args['body'] = wp_json_encode($data);
    }

    $response = wp_remote_post($url, $args);

    if (is_wp_error($response)) {
        return null;
    }

    $response_data = json_decode(wp_remote_retrieve_body($response), true);

    // At the end before cache update
    if (count($requestCache) > 100) { // Limit cache size
        array_shift($requestCache); // Remove oldest entry
    }
    
    // Simple cache update
    $requestCache[$cacheKey] = [
        'time' => microtime(true),
        'response' => $response_data
    ];

    return $response_data;
}