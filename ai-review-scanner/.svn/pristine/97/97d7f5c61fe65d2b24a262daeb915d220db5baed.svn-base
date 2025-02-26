<?php

namespace AIReviewScanner\Providers;

if (!defined('ABSPATH')) {
    exit;
}

use AIReviewScanner\WPBones\Support\ServiceProvider;

class AddColumnServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->addColumnHeader();
        $this->addToBulkAction();
        $this->addContentToAIReviewColumn();
    }

    protected function addToBulkAction()
    {
        add_filter('bulk_actions-product_page_product-reviews', [$this, 'add']);
    }

    public function add($actions)
    {
        $screen = get_current_screen();
        // Check if we're specifically on the WooCommerce product reviews list
        if ($screen->id == 'product_page_product-reviews') {
            $actions['ai_review_scan'] = 'AI Scan';
        }
        return $actions;
    }
    protected function addContentToAIReviewColumn(): void
    {
        add_action('woocommerce_product_reviews_table_column_ai_review_scan', [$this, 'addContent']);
    }

    public function addContent($comment)
    {
        $comment_id = $comment->comment_ID;
        $rating = get_comment_meta($comment_id, 'ars_rating')[0] ?? 0;
        $score = get_comment_meta($comment_id, 'ars_score')[0] ?? 0;

        $view = AIReviewScanner()->view('dashboard.review-scan.review-result', [
            'title' => esc_html__('Welcome to AI Review Scanner', 'ai-review-scanner'),
            'comment_id' => $comment_id,
            'rating' => $rating,
            'score' => $score,
        ]);

        return $view->render();
    }

    protected function addColumnHeader()
    {
        add_filter('woocommerce_product_reviews_table_columns', [$this, 'addColumn'], 10, 1);
    }

    public function addColumn($columns)
    {
        $columns['ai_review_scan'] = __('AI Review', 'ai-review-scanner');
        return $columns;
    }
}