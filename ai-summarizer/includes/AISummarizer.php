<?php

/**
 * AI_Summarizer class file
 *
 * @category   Plugin
 * @package    AI_Summarizer
 * @subpackage Classes
 * @author     Santosh <santosh@soboldltd.com>
 * @license    GPL-2.0+ <https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html>
 */

namespace AISummarizer;

use AISummarizer\Factories\ModelFactory;
use AISummarizer\AISummarizerAdmin;
use WP_Error;
use WP_REST_Request;
use WP_REST_Response;

if (! defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Class AI_Summarizer
 *
 * Handles the integration of AI models for summarizing WordPress posts.
 *
 * @category Plugin
 * @package  AI_Summarizer
 * @author   Santosh <santosh@soboldltd.com>
 * @license  GPL-2.0+ <https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html>
 */
class AISummarizer
{
    /**
     * AI Model instance for handling summarization.
     *
     * @var object|null AI Model instance
     */
    private static $model;

    /**
     * Initializes the plugin by setting up actions and filters.
     *
     * @return void
     */
    public static function AISummarizer_init(): void
    {
        add_action('wp_enqueue_scripts', [__CLASS__, 'AISummarizer_enqueueAssets']);
        add_action('admin_enqueue_scripts', [__CLASS__, 'AISummarizer_enqueueAssets']);
        add_action('wp_footer', [__CLASS__, 'AISummarizer_renderWidgetBox']);
        add_action('rest_api_init', [__CLASS__, 'AISummarizer_registerRestRoutes']);

        // Initialize admin settings and the selected model
        AISummarizerAdmin::AISummarizer_admin_init();
        self::AISummarizer_initializeModel();
    }

    /**
     * Initializes the AI model based on plugin settings.
     *
     * @return void
     */
    private static function AISummarizer_initializeModel(): void
    {
        $bedrockOptions = [
            AISummarizerAdmin::AISummarizer_decrypt(get_option('ai_summarizer_aws_access_key')),
            AISummarizerAdmin::AISummarizer_decrypt(get_option('ai_summarizer_aws_secret_key')),
            get_option('ai_summarizer_aws_region'),
            get_option('ai_summarizer_bedrock_model_id')
        ];

        if (in_array(false, $bedrockOptions, true) || in_array('', $bedrockOptions, true)) {
            return;
        }

        $config = [
            'aws_access_key' => AISummarizerAdmin::AISummarizer_decrypt(get_option('ai_summarizer_aws_access_key')),
            'aws_secret_key' => AISummarizerAdmin::AISummarizer_decrypt(get_option('ai_summarizer_aws_secret_key')),
            'aws_region'     => get_option('ai_summarizer_aws_region'),
            'model_id'       => get_option('ai_summarizer_bedrock_model_id')
        ];

        self::$model = ModelFactory::AISummarizer_create($config);
    }

    /**
     * Enqueues JavaScript and localizes script data.
     *
     * @return void
     */
    public static function AISummarizer_enqueueAssets(): void
    {
        wp_enqueue_script(
            'ai-content-processor',
            plugins_url('assets/ai-summarizer.js', __FILE__),
            array(),
            '1.0',
            true
        );

        $summarySpeed = get_option('ai_summarizer_summary_speed', '25');

        wp_localize_script(
            'ai-content-processor',
            'aiSummarizer',
            [
                'rest_url'             => esc_url_raw(
                    rest_url('AISummarizer/v1/summarize')
                ),
                'rest_url_get_summary' => esc_url_raw(
                    rest_url('AISummarizer/v1/getSummary')
                ),
                'rest_url_delete'    => esc_url_raw(
                    rest_url('AISummarizer/v1/delete')
                ),
                'nonce'                => wp_create_nonce('wp_rest'),
                'summarizer' => \AISummarizer\GlobalFunction\AISummarizer_SpellingHelper::AISummarizer_getSummarizerSpelling(),
                'summarize' => \AISummarizer\GlobalFunction\AISummarizer_SpellingHelper::AISummarizer_getSummarizeSpelling(),
                'summarySpeed' => $summarySpeed,
            ]
        );

        wp_enqueue_style(
            'ai-summarizer-style',
            plugins_url('assets/ai-summarizer.css', __FILE__),
            [],
            '1.0'
        );
    }

    /**
     * Registers REST API routes for summarization.
     *
     * @return void
     */
    public static function AISummarizer_registerRestRoutes(): void
    {
        // POST route to summarize a post (requires user permission)
        register_rest_route(
            'AISummarizer/v1',
            '/summarize',
            [
                'methods'             => 'POST',
                'callback'            => [__CLASS__, 'AISummarizer_handleSummarization'],
                'permission_callback' => fn() => current_user_can('edit_posts'), // Requires the user to have permission
            ]
        );

        // Public GET route to fetch a post summary
        register_rest_route(
            'AISummarizer/v1',
            '/getSummary',
            [
                'methods'             => 'GET',
                'callback'            => [__CLASS__, 'AISummarizer_handleGetSummarization'],
                'permission_callback' => '__return_true', // Public access
            ]
        );

        // POST route to change approval of a post summary
        register_rest_route(
            'AISummarizer/v1',
            '/delete',
            [
                'methods'             => 'POST',
                'callback'            => [__CLASS__, 'AISummarizer_handleDeleteSummarization'],
                'permission_callback' =>  fn() => current_user_can(
                    'edit_posts'
                ), // Requires the user to have permission
            ]
        );
    }

    /**
     * Helper function to retrieve missing model field credentials.
     *
     * @return array An array of missing field messages.
     */
    private static function AISummarizer_getMissingModelFields(): array
    {
        $missingFields = [];

        if (!get_option('ai_summarizer_aws_access_key')) {
            $missingFields[] = __('AWS Access Key is missing', 'ai-summarizer');
        }

        if (!get_option('ai_summarizer_aws_secret_key')) {
            $missingFields[] = __('AWS Secret Key is missing', 'ai-summarizer');
        }

        if (!get_option('ai_summarizer_aws_region')) {
            $missingFields[] = __('AWS Region is missing', 'ai-summarizer');
        }

        if (!get_option('ai_summarizer_bedrock_model_id')) {
            $missingFields[] = __('Bedrock Model ID is missing', 'ai-summarizer');
        }

        return $missingFields;
    }



    /**
     * Handles the summarization of post content via REST API.
     *
     * @param WP_REST_Request $request The REST request object.
     *
     * @return WP_Error|WP_REST_Response The REST response or error object.
     */
    public static function AISummarizer_handleSummarization(WP_REST_Request $request)
    {
        $nonce = $request->get_header('X-WP-Nonce');

        if (!wp_verify_nonce($nonce, 'wp_rest')) {
            return new WP_Error('rest_forbidden', __('Invalid nonce', 'ai-summarizer'), ['status' => 403]);
        }

        $postId = sanitize_text_field($request->get_param('post_id'));

        if (!$postId || !is_numeric($postId)) {
            return new WP_Error('invalid_post_id', __('Invalid post ID', 'ai-summarizer'), ['status' => 400]);
        }

        $post = get_post($postId);

        if (!$post) {
            return new WP_Error('post_not_found', __('Post not found', 'ai-summarizer'), ['status' => 404]);
        }

        // Validate model credentials
        $missingFields = self::AISummarizer_getMissingModelFields();

        if (!empty($missingFields)) {
            return new WP_Error('fields_missing', implode(', ', $missingFields), ['status' => 400]);
        }

        // Ensure the AI model is initialized
        if (!self::$model) {
            return new WP_Error(
                'model_not_initialized',
                __('AI model is not initialized', 'ai-summarizer'),
                ['status' => 500]
            );
        }

        // Prepare post data
        $postObject = [
            'title'   => get_the_title($postId),
            'content' => self::AISummarizer_getFullPostContent($postId),
        ];

        $length = get_option('ai_summarizer_summary_length', '100');

        // Summarize the post content
        $summary = self::$model->AISummarizer_summarize(wp_json_encode($postObject), $length);

        // Check if summarization was successful
        if ($summary['success']) {
            // Clear existing value and add the new summary
            delete_post_meta($postId, 'ai_summary');
            $updated = update_post_meta($postId, 'ai_summary', $summary['summary']);
            if (!$updated) {
                return new WP_Error(
                    'meta_update_failed',
                    __('Failed to save summary to post meta', 'ai-summarizer'),
                    ['status' => 500]
                );
            }
            return new WP_REST_Response(['summary' => $summary['summary']], 200);
        } else {
            // Handle the error case, for example, log it or notify the user
            // error_log('Failed to summarize post: ' . $summary['summary']);
            return new WP_Error(
                'Failed to summarize post: ',
                sprintf(
                    // Translators: %s is the summary of the post.
                    __('Summary: %s', 'ai-summarizer'),
                    $summary['summary']
                ),
                ['status' => 500]
            );
        }
    }

    /**
     * Handles fetching the summarization of post content via REST API.
     *
     * @param WP_REST_Request $request The REST request object.
     *
     * @return WP_Error|WP_REST_Response The REST response or error object.
     */
    public static function AISummarizer_handleGetSummarization(WP_REST_Request $request)
    {
        $nonce = $request->get_header('X-WP-Nonce');

        if (!wp_verify_nonce($nonce, 'wp_rest')) {
            return new WP_Error('rest_forbidden', __('Invalid nonce', 'ai-summarizer'), ['status' => 403]);
        }

        $postId = sanitize_text_field($request->get_param('post_id'));

        if (!$postId || !is_numeric($postId)) {
            return new WP_Error('invalid_post_id', __('Invalid post ID', 'ai-summarizer'), ['status' => 400]);
        }

        $post = get_post($postId);

        if (!$post) {
            return new WP_Error('post_not_found', __('Post not found', 'ai-summarizer'), ['status' => 404]);
        }

        $summary = get_post_meta($postId, 'ai_summary', true);
        // $summary_status = get_post_meta($postId, 'summary_status', true);

        if (!$summary) {
            return new WP_Error('summary_not_found', __('No summary available', 'ai-summarizer'), ['status' => 404]);
        }

        return new WP_REST_Response(['summary' => $summary], 200);
    }

    /**
     * Handles the summarization of post content via REST API.
     *
     * @param WP_REST_Request $request The REST request object.
     *
     * @return WP_Error|WP_REST_Response The REST response or error object.
     */
    public static function AISummarizer_handleDeleteSummarization(WP_REST_Request $request)
    {
        $nonce = $request->get_header('X-WP-Nonce');

        if (!wp_verify_nonce($nonce, 'wp_rest')) {
            return new WP_Error('rest_forbidden', __('Invalid nonce', 'ai-summarizer'), ['status' => 403]);
        }

        $postId = sanitize_text_field($request->get_param('post_id'));
        $summaryStatus = sanitize_text_field($request->get_param('summary_status'));

        if (!$postId || !is_numeric($postId)) {
            return new WP_Error('invalid_post_id', __('Invalid post ID', 'ai-summarizer'), ['status' => 400]);
        }

        $post = get_post($postId);

        if (!$post) {
            return new WP_Error('post_not_found', __('Post not found', 'ai-summarizer'), ['status' => 404]);
        }

        $update_summary_status =  delete_post_meta($postId, 'ai_summary');

        // $update_summary_status = update_post_meta(
        //     $postId,
        //     'summary_status',
        //     $summaryStatus
        // );

        if (!$update_summary_status) {
            return new WP_Error('meta_update_failed', __('Failed to update summary status to post meta', 'ai-summarizer'), ['status' => 500]);
        }

        return new WP_REST_Response(['status' => 'Updated', 'new_status' => $summaryStatus], 200);
    }


    /**
     * Get full content of the post, including ACF fields, Gutenberg blocks, and WPBakery content.
     *
     * @param int $postId
     * @return string
     */
    private static function AISummarizer_getFullPostContent($postId)
    {
        $fullContent = '';

        // Get default post content
        $post = get_post($postId);
        $fullContent .= $post->post_content;

        // Get ACF fields (if ACF is active)
        if (function_exists('get_fields')) {
            $acfData = self::AISummarizer_getAcfData($postId);
            if (!empty($acfData)) {
                foreach ($acfData as $key => $value) {
                    if (is_string($value)) {
                        $fullContent .= "\n" . $value;
                    }
                }
            }
        }

        // Handle Gutenberg content
        if (has_blocks($post->post_content)) {
            $parsedBlocks = parse_blocks($post->post_content);
            $fullContent .= self::AISummarizer_extractContentFromBlocks($parsedBlocks);
        }

        // Handle WPBakery shortcodes (assuming it's shortcode-based)
        if (has_shortcode($post->post_content, 'vc_row')) {
            $fullContent .= self::AISummarizer_extractWpBakeryContent($post->post_content);
        }

        // Include other meta fields (optional: add any other meta fields you want to include)
        $metaFields = get_post_meta($postId);
        foreach ($metaFields as $key => $value) {
            if (is_string($value[0])) {
                $fullContent .= "\n" . $value[0];
            }
        }

        return $fullContent;
    }

    /**
     * Extract content from Gutenberg blocks recursively.
     *
     * @param array $blocks
     * @return string
     */
    private static function AISummarizer_extractContentFromBlocks($blocks)
    {
        $content = '';
        foreach ($blocks as $block) {
            if (isset($block['blockName'])) {
                if (!empty($block['innerHTML'])) {
                    $content .= "\n" . $block['innerHTML'];
                }
                if (!empty($block['innerBlocks'])) {
                    $content .= self::AISummarizer_extractContentFromBlocks($block['innerBlocks']);
                }
            }
        }
        return $content;
    }

    /**
     * Extract content from WPBakery shortcodes (as WPBakery uses shortcodes for structure).
     *
     * @param string $content
     * @return string
     */
    private static function AISummarizer_extractWpBakeryContent($content)
    {
        $content = do_shortcode($content); // Process shortcodes to get their inner content
        return $content;
    }

    /**
     * Retrieves ACF data for a given post ID.
     *
     * @param int $postId The ID of the post to retrieve ACF fields for.
     *
     * @return array|false An associative array containing ACF field data, or false if no fields are found.
     */
    public static function AISummarizer_getAcfData(int $postId)
    {
        $fields = get_field_objects($postId);

        if (!$fields) {
            return false;
        }

        $acfDataArray = [];
        foreach ($fields as $fieldName => $field) {
            $acfDataArray[$fieldName] = self::AISummarizer_getAcfFieldData($field['value']);
        }

        return $acfDataArray;
    }

    /**
     * Processes ACF field data, handling nested arrays or objects recursively.
     *
     * @param mixed $fieldValue The value of the ACF field.
     *
     * @return mixed The processed field value.
     */
    public static function AISummarizer_getAcfFieldData($fieldValue)
    {
        if (is_array($fieldValue)) {
            foreach ($fieldValue as &$value) {
                if (is_array($value) || is_object($value)) {
                    $value = self::AISummarizer_getAcfFieldData($value);
                }
            }
        }

        return $fieldValue;
    }

    /**
     * Renders the widget box on specified post types.
     *
     * @return void
     */
    public static function AISummarizer_renderWidgetBox(): void
    {

        if (!is_singular()) {
            return;
        }

        if (get_option('ai_summarizer_widget_visibility') !== 'on') {
            return;
        }

        $postTypes = get_option('ai_summarizer_post_types', []);
        $postTypes = !empty($postTypes) ? explode(',', $postTypes) : []; // Split string into array

        if (count($postTypes) !== 1 || !in_array(get_post_type(), $postTypes)) {
            return;
        }

        include_once 'assets/widget.php';
    }

    /**
     * Plugin activation tasks (e.g., setting default options).
     *
     * @return void
     */
    public static function AISummarizer_pluginActivation(): void
    {

        $encryption_key = get_option('ai_summarizer_key');

        if ($encryption_key) {
            return;
        }

        // Generate a secure random string (encryption key)
        $encryption_key = bin2hex(random_bytes(32)); // Generate a 256-bit key

        // Store the encryption key in the options table
        update_option('ai_summarizer_key', $encryption_key);
    }

    /**
     * Plugin deactivation tasks (e.g., cleanup).
     *
     * @return void
     */
    public static function AISummarizer_pluginDeactivation(): void
    {
        $ai_summarizer_configuration = get_option('ai_summarizer_configuration');

        if ($ai_summarizer_configuration) {
            return;
        }

        // Define an array of options to delete
        $options_to_delete = [
            'ai_summarizer_key',
            'ai_summarizer_aws_access_key',
            'ai_summarizer_aws_secret_key',
            'ai_summarizer_aws_region',
            'ai_summarizer_bedrock_model_id',
            'ai_summarizer_model_type',
            'ai_summarizer_post_types',
            'ai_summarizer_widget_colour',
            'ai_summarizer_widget_text',
            'ai_summarizer_widget_text_two',
        ];

        // Remove data from database tables
        foreach ($options_to_delete as $option) {
            delete_option($option);
        }

        // Get all posts with 'ai_summary' meta key
        $posts_with_summary = new \WP_Query(
            [
                'post_type'      => 'any',
                'post_status'    => 'any',
                'meta_query'     => [
                    [
                        'key'     => 'ai_summary',
                        'compare' => 'EXISTS',
                    ]
                ],
                'posts_per_page' => -1,
                'fields'         => 'ids'
            ]
        );


        // Loop through all found posts and delete 'ai_summary' meta
        if ($posts_with_summary->have_posts()) {
            foreach ($posts_with_summary->posts as $postId) {
                delete_post_meta($postId, 'ai_summary');
            }
        }
    }
}
