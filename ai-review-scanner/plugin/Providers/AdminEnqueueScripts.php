<?php

namespace AIReviewScanner\Providers;

if (!defined('ABSPATH')) {
    exit;
}

use AIReviewScanner\WPBones\Support\ServiceProvider;

class AdminEnqueueScripts extends ServiceProvider
{

    public function register()
    {
        $this->addEnqueueScripts();

    }

    protected function preLoadCommentMeta(): void
    {
        $args = [
            'post_type' => 'product',
        ];
        $comments = get_comments($args);
        $comment_ids = wp_list_pluck($comments, 'comment_ID');

        // Preload metadata for these comments
        update_meta_cache('comment', $comment_ids);
    }

    protected function addEnqueueScripts()
    {
        add_action('admin_enqueue_scripts', [$this, 'addScripts']);
    }

    public function addScripts()
    {
        $screen = get_current_screen();

        if ($screen->id == 'product_page_product-reviews') {

            $this->preLoadCommentMeta();

            // Enqueue the main AI Review Scan script
            wp_enqueue_script('ai-review-scan-script', WP_PLUGIN_URL . '/ai-review-scanner/public/js/ai-review-scan.js', array('jquery'), '1.0', true);

            // Enqueue another script that depends on jQuery
            wp_enqueue_script('button-loader-script', WP_PLUGIN_URL . '/ai-review-scanner/public/js/jquery.buttonLoader.js', array('jquery'), '1.0', true);

            // Enqueue the CSS for buttonLoader
            wp_enqueue_style('button-loader-style', WP_PLUGIN_URL . '/ai-review-scanner/public/css/buttonLoader.css', array(), '1.0', 'all');

            // Localize script to pass Ajax URL and security nonce to JavaScript
            wp_localize_script('ai-review-scan-script', 'aiScanParams', array(
                'ajaxUrl' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce('ai_review_scan_nonce'),
            ));

            wp_localize_script('button-loader-script', 'buttonLoaderParams', array(
                'svgPath' => WP_PLUGIN_URL . '/ai-review-scanner/public/images/loading.svg'
            ));

        }
    }
}