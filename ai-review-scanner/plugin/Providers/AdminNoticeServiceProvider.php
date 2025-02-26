<?php

namespace AIReviewScanner\Providers;

if (!defined('ABSPATH')) {
    exit;
}

use AIReviewScanner\WPBones\Support\ServiceProvider;

class AdminNoticeServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->adminNotice();
    }

    protected function adminNotice()
    {
        add_action('admin_notices', [$this, 'addNotice']);
    }

    public function addNotice()
    {
        $bulk_ai_review_request = sanitize_text_field($_REQUEST['bulk_ai_reviews_scanned'] ?? "");
        if (!empty($bulk_ai_review_request)) {
            $review_count = intval($bulk_ai_review_request);

            if ($review_count === 1) {
                /* translators: %s: the number of review that has been scanned */
                $message = sprintf(__('Total %s review has been scanned.', 'ai-review-scanner'), esc_html($review_count));
            } else {
                /* translators: %s: the number of reviews that have been scanned */
                $message = sprintf(__('Total %s reviews have been scanned.', 'ai-review-scanner'), esc_html($review_count));
            }

            printf('<div id="message" class="updated fade">%s</div>', esc_html($message));
        }
    }

}