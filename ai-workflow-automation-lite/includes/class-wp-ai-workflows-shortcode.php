<?php
/**
 * Manages shortcode functionality for WP AI Workflows plugin.
 */
class WP_AI_Workflows_Shortcode {

    public function init() {
        add_shortcode('wp_ai_workflows_output', array($this, 'output_shortcode'));
    }

    public function output_shortcode($atts) {
        $atts = shortcode_atts(array(
            'id' => '',
        ), $atts, 'wp_ai_workflows_output');
    
        $workflow_id = $atts['id'];
        
        if (!isset($_COOKIE['wp_ai_workflows_session_id'])) {
            $session_id = wp_generate_uuid4();
            setcookie('wp_ai_workflows_session_id', $session_id, time() + (86400 * 30), "/", '', is_ssl(), true);
        } else {
            $session_id = sanitize_text_field(wp_unslash($_COOKIE['wp_ai_workflows_session_id']));
        }
    
        // Force refresh of assets by adding version timestamp
        $version = WP_AI_WORKFLOWS_LITE_VERSION . '.' . time();
        
        wp_enqueue_style(
            'wp-ai-workflows-shortcode', 
            plugin_dir_url(dirname(__FILE__)) . 'assets/css/shortcode-output.css', 
            array(), 
            $version
        );
    
        wp_enqueue_script(
            'wp-ai-workflows-shortcode', 
            plugin_dir_url(dirname(__FILE__)) . 'assets/js/shortcode-output.js', 
            array('jquery'), 
            $version, 
            true
        );
        
        wp_localize_script('wp-ai-workflows-shortcode', 'wpAiWorkflowsShortcode', array(
            'workflowId' => $workflow_id,
            'sessionId' => $session_id,
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('wp_ai_workflows_shortcode_nonce'),
            'apiRoot' => esc_url_raw(rest_url())
        ));
    
        // Return clean container
        return sprintf(
            '<div id="wp-ai-workflows-output-%s" data-workflow-id="%s" class="wp-ai-workflows-container"></div>',
            esc_attr($workflow_id),
            esc_attr($workflow_id)
        );
    }

    public static function get_shortcode_output($request) {
        global $wpdb;
        $workflow_id = $request->get_param('workflow_id');
        $session_id = $request->get_param('session_id');
        
        // Input validation
        if (empty($workflow_id)) {
            WP_AI_Workflows_Utilities::debug_log("Invalid shortcode request", "error", [
                "reason" => "Missing workflow ID"
            ]);
            return new WP_REST_Response(['error' => 'Missing workflow ID'], 400);
        }
        
        $table_name = $wpdb->prefix . 'wp_ai_workflows_shortcode_outputs';
        
    
        // Get the output
        $result = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT output_data, updated_at FROM {$table_name} 
                 WHERE workflow_id = %s AND (session_id = %s OR session_id = 'public')
                 ORDER BY session_id DESC, updated_at DESC LIMIT 1",
                $workflow_id,
                $session_id
            )
        );
        
    
        if ($result) {
            try {
                $output_data = json_decode($result->output_data, true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    throw new Exception('Invalid JSON in output data');
                }
                
                $output_data['timestamp'] = $result->updated_at;
                
                return new WP_REST_Response([
                    'output' => json_encode($output_data),
                    'timestamp' => $result->updated_at
                ], 200);
            } catch (Exception $e) {
                WP_AI_Workflows_Utilities::debug_log("Error processing output data", "error", [
                    "workflow_id" => $workflow_id,
                    "error" => $e->getMessage()
                ]);
                return new WP_REST_Response(['error' => 'Error processing output data'], 500);
            }
        }
        
        return new WP_REST_Response(['output' => null], 200);
    }
}