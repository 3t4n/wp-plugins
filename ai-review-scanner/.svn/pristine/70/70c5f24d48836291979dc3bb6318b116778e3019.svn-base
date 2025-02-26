<?php

namespace AIReviewScanner\Providers;

if (!defined('ABSPATH')) {
    exit;
}

use AIReviewScanner\Models\Review;
use AIReviewScanner\WPBones\Support\ServiceProvider;

class ReviewProcessServiceProvider extends ServiceProvider
{
    protected $settings;

    public function register(): void
    {
        $this->settings = $this->plugin->options['ars_request_settings'];
        add_action('wp_ajax_ai_scan_review', [$this, 'handleScanReviewAjax']);
        $this->handleBulkReviewScanRequest();
    }

    protected function handleBulkReviewScanRequest()
    {
        add_filter('handle_bulk_actions-edit-comments', [$this, 'handleBulkReviewScan'], 10, 3);
    }
    public function handleBulkReviewScan($redirect_to, $action, $comment_ids)
    {
        if ($action === 'ai_review_scan') {

            // Sanitize and validate comment IDs
            $comment_ids = array_map('absint', $comment_ids);

            // Retrieve all comments based on the provided IDs
            $comments = Review::whereIn('comment_ID', $comment_ids)->get();

            // Get the API token and set up the endpoint URL

            // Prepare the data for the API request
            $reviews = [];
            foreach ($comments as $comment) {
                $reviews[] = sanitize_text_field($comment->comment_content); // Collect content of each comment
            }

            // Encode the data as JSON
            $body = [
                'review' => $reviews,
                'comment_id' => $comment_ids
            ];

            $result = $this->apiRequest($body);

            // Process each comment's response data
            foreach ($comments as $key => $comment) {

                $commentID = $comment->comment_ID;

                $responseData = $result['data'][$key] ?? null; // Use null coalescing to handle missing data

                if (!$responseData) {
                    continue; // Skip processing this comment if no data is available
                }

                $responseData = $responseData['data'];
                // Update comment meta with the label and score
                update_comment_meta($commentID, 'ars_rating', sanitize_text_field($responseData['rating']));
                update_comment_meta($commentID, 'ars_score', sanitize_text_field($responseData['score']));
                // Process the review
                $this->validate($comment, sanitize_text_field($responseData['rating']));
            }

            $redirect_to = add_query_arg('bulk_ai_reviews_scanned', count($comment_ids), $redirect_to);
        }
        return $redirect_to;
    }
    public function handleScanReviewAjax()
    {
        // Security check
        check_ajax_referer('ai_review_scan_nonce', '_ajax_nonce');

        try {

            $comment_ID = isset($_POST['comment_ID']) ? intval($_POST['comment_ID']) : 0;

            if (!$comment_ID) {
                wp_send_json_error('Invalid comment ID');
            }

            // Get the comment content
            $comment = get_comment($comment_ID);

            if (!$comment) {
                wp_send_json_error('Comment not found');
            }

            // Prepare the data for the API request
            $body = ['review' => $comment->comment_content, 'comment_id' => $comment_ID];
            // Make the API request
            $result = $this->apiRequest($body);

            // Process the response data
            // For example, update comment meta with the label and score
            update_comment_meta($comment_ID, 'ars_rating', $result['data']['rating']);
            update_comment_meta($comment_ID, 'ars_score', $result['data']['score']);

            $data['color'] = '#00a0d2';
            $data['message'] = esc_html__("Scan is completed", 'ai-review-scanner');
            $data['status'] = 'failed';

            if ($comment->comment_approved == 1) {
                $data['message'] = esc_html__("Review is already approved", 'ai-review-scanner');
                $data['color'] = "#FF8800";
            } else {
                $this->validate($comment, $result['data']['rating'], $data);
            }

            $data['rating'] = $result['data']['rating'];
            $data['score'] = $result['data']['score'];
            // Sending a success message back with the result data
            wp_send_json_success($data);
        } catch (\Exception $ex) {
            wp_send_json_error($ex->getMessage());
        }
    }
    private function apiRequest($body)
    {
        // Get the API token and set up the endpoint URL
        $api_token = $this->settings['ars_api_token'];

        // Make the API request
        $response = wp_remote_post($this->settings['ars_api_url'] . 'api/review-scan', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $api_token,
            ],
            'body' => $body,
            'timeout' => 10
        ]);

        // Check for a WP_Error
        if (is_wp_error($response)) {
            wp_send_json_error($response->get_error_message());
        }

        // Decode the response
        $response_code = wp_remote_retrieve_response_code($response);
        $response_body = wp_remote_retrieve_body($response);
        $result = json_decode($response_body, true);

        // Check for Laravel validation errors
        if (isset($result['errors'])) {
            $errors = [];
            foreach ($result['errors'] as $field => $messages) {
                $errors[] = implode(', ', $messages);
            }
            wp_send_json_error('Validation errors: ' . implode('; ', $errors));
        }

        // Check the response status
        if ($response_code !== 200) {
            $error_message = $result['message'] ?? 'Unknown API server error.';
            wp_send_json_error('API returned an error: ' . $error_message);
        }

        return $result;
    }

    public function validate($comment, $rating, &$data = null)
    {
        // TODO: Implement __invoke() method.
        if (!empty($this->settings['ars_enable_auto_approve']) && $comment->comment_approved != 1) {
            $auto_approve_rating_threshold = $this->settings['rating_threshold'];
            $auto_approve_rule_condition = $this->settings['rule_conditions'];
            if ($this->shouldApprove($rating, $auto_approve_rating_threshold, $auto_approve_rule_condition)) {
                if ($data != null) {
                    $data['status'] = 'success';
                    $data['message'] = "Review is Approved";
                }
                Review::where('comment_ID', $comment->comment_ID)->update(['comment_approved' => 1]);
            } else {
                if ($data != null) {
                    $data['message'] = "Review is Declined";
                    $data['color'] = "#f2348c";
                }
            }
        }
    }
    private function shouldApprove($rating, $threshold, $condition): bool
    {
        switch ($condition) {
            case 'equal_to_threshold':
                return $rating == $threshold;
            case 'greater_or_equal_to_threshold':
                return $rating >= $threshold;
            case 'less_than_to_threshold':
                return $rating < $threshold;
            case 'less_or_equal_to_threshold':
                return $rating <= $threshold;
            default:
                return false;
        }
    }
}