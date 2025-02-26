<?php
/**
 * Plugin Name: AI Content Generator for WooCommerce
 * Description: Generate product images, descriptions, and gallery images for WooCommerce products using ChatGPT API based on product details.
 * Version: 1.0.1
 * Author: WebToffee
 * Author URI: https://www.webtoffee.com
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: ai-content-generator-for-woocommerce
 * Requires at least: 5.0
 * Requires PHP: 7.4
 * Requires Plugins:  woocommerce
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Main plugin class for generating product content using ChatGPT API
 * 
 * @since 1.0.0
 */
class WTOFE_WC_AI_Content_Generator {

    /**
     * Constructor - registers all necessary hooks and filters
     *
     * @since 1.0.0
     */
    public function __construct() {
        // Update text domain in all translation functions
        add_action('admin_menu', [$this, 'add_admin_menu']);
        add_action('admin_init', [$this, 'register_settings']);
        add_action('add_meta_boxes', [$this, 'add_meta_boxes']);
        add_action('wp_ajax_generate_product_image', [$this, 'ajax_generate_product_image']);
        add_action('wp_ajax_attach_generated_image', [$this, 'ajax_attach_generated_image']);
        add_action('wp_ajax_generate_product_description', [$this, 'ajax_generate_product_description']);
        add_action('wp_ajax_generate_product_short_description', [$this, 'ajax_generate_product_short_description']);
        add_action('wp_ajax_get_product_gallery', [$this, 'ajax_get_product_gallery']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_scripts']);
        add_action('admin_footer', [$this, 'add_description_generator_button']);
    }

    /**
     * Adds the plugin settings page to WordPress admin menu
     *
     * @return void
     */
    public function add_admin_menu() {
        $parent_slug = 'woocommerce';
        $page_title = __('AI Content Generator', 'ai-content-generator-for-woocommerce');
        $menu_title = __('AI Content Generator', 'ai-content-generator-for-woocommerce');
        $capability = 'manage_woocommerce';
        $menu_slug = 'wc-ai-content-generator';

        add_submenu_page(
            $parent_slug,
            $page_title,
            $menu_title,
            $capability,
            $menu_slug,
            [$this, 'settings_page']
        );

        // Add help link in plugin action links
        add_filter('plugin_action_links_' . plugin_basename(__FILE__), [$this, 'add_plugin_action_links']);
    }

    /**
     * Gets the appropriate user guide URL based on site language
     *
     * @return string URL to the language-specific user guide
     */
    private function get_user_guide_url() {
        $locale = get_locale();
        $guide_base = plugins_url('user-guide', __FILE__);
        
        // Map of supported locales to their guide files
        $supported_locales = array(
            'de_DE' => $guide_base . '-de_DE.html',
            'de_AT' => $guide_base . '-de_DE.html',
            'de_CH' => $guide_base . '-de_DE.html',
            'de_LU' => $guide_base . '-de_DE.html',
            'es_ES' => $guide_base . '-es_ES.html',
            'es_MX' => $guide_base . '-es_ES.html',
            'es_AR' => $guide_base . '-es_ES.html',
            'es_CO' => $guide_base . '-es_ES.html',
            'es_PE' => $guide_base . '-es_ES.html',
            'es_CL' => $guide_base . '-es_ES.html'
        );

        // Return localized guide if available, otherwise return English version
        return isset($supported_locales[$locale]) ? $supported_locales[$locale] : $guide_base . '-en.html';
    }

    /**
     * Adds plugin action links
     *
     * @param array $links Existing plugin action links
     * @return array Modified plugin action links
     */
    public function add_plugin_action_links($links) {
        $guide_url = $this->get_user_guide_url();
        $settings_url = admin_url('admin.php?page=wc-ai-content-generator');
        
        $custom_links = array(
            '<a href="' . esc_url($settings_url) . '">' . __('Settings', 'ai-content-generator-for-woocommerce') . '</a>',
            '<a href="' . esc_url($guide_url) . '" target="_blank">' . __('User Guide', 'ai-content-generator-for-woocommerce') . '</a>'
        );
        
        return array_merge($custom_links, $links);
    }

    /**
     * Registers plugin settings and creates settings fields
     *
     * @return void
     */
    public function register_settings() {
        register_setting('wc_product_image_generator', 'wtofe_chatgpt_api_key',array(
            'type'              => 'string',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        register_setting('wc_product_image_generator', 'wtofe_ai_debug_mode', array(
            'type' => 'boolean',
            'default' => false,
            'sanitize_callback' => 'rest_sanitize_boolean'
        ));

        add_settings_section(
            'wt_product_image_generator_section',
            esc_html__('API Settings', 'ai-content-generator-for-woocommerce'),
            null,
            'wc_product_image_generator'
        );

        // API Key field
        add_settings_field(
            'wtofe_chatgpt_api_key',
            esc_html__('ChatGPT API Key', 'ai-content-generator-for-woocommerce'),
            [$this, 'api_key_field_html'],
            'wc_product_image_generator',
            'wt_product_image_generator_section'
        );

        // Debug mode field
        add_settings_field(
            'wtofe_ai_debug_mode',
            esc_html__('Enable Debug Mode', 'ai-content-generator-for-woocommerce'),
            [$this, 'debug_mode_field_html'],
            'wc_product_image_generator',
            'wt_product_image_generator_section'
        );
    }
    
    /**
     * Renders the API key input field HTML
     *
     * @return void
     */
    public function api_key_field_html() {
        $api_key = get_option('wtofe_chatgpt_api_key', '');
        printf(
            '<input type="text" id="%1$s" name="%1$s" value="%2$s" class="regular-text">',
            esc_attr('wtofe_chatgpt_api_key'),
            esc_attr($api_key)
        );
    }
    
    /**
     * Renders the debug mode checkbox HTML
     */
    public function debug_mode_field_html() {
        $debug_mode = get_option('wtofe_ai_debug_mode', false);
        ?>
        <label>
            <input type="checkbox" 
                   name="wtofe_ai_debug_mode" 
                   value="1" 
                   <?php checked($debug_mode, true); ?>>
            <?php esc_html_e('Enable logging of API responses (for debugging purposes)', 'ai-content-generator-for-woocommerce'); ?>
        </label>
        <p class="description">
            <?php esc_html_e('When enabled, all API responses will be logged in WooCommerce logs with the source \'webtoffee-ai\'', 'ai-content-generator-for-woocommerce'); ?>
        </p>
        <?php
    }
    
    /**
     * Renders the plugin settings page
     *
     * @return void
     */
    public function settings_page() {
        ?>
        <div class="wrap">
            <h1><?php echo esc_html__('AI Content Generator for WooCommerce', 'ai-content-generator-for-woocommerce'); ?></h1>
            
            <div class="notice notice-info">
                <p>
                    <?php 
                    $guide_url = $this->get_user_guide_url();
                    printf(
                        /* translators: %s: URL to the user guide */
                        esc_html__('Need help? Check out our %s', 'ai-content-generator-for-woocommerce'),
                        sprintf(
                            '<a href="%s" target="_blank">%s</a>',
                            esc_url($guide_url),
                            esc_html__('User Guide', 'ai-content-generator-for-woocommerce')
                        )
                    );
                    ?>
                </p>
            </div>

            <form method="post" action="options.php">
                <?php
                settings_fields('wc_product_image_generator');
                do_settings_sections('wc_product_image_generator');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    /**
     * Adds the image generation meta box to product edit page
     *
     * @return void
     */
    public function add_meta_boxes() {
        // Featured Image Generator Meta Box
        add_meta_box(
            'wc_product_image_generator_box',
            __('Generate Featured Image', 'ai-content-generator-for-woocommerce'),
            [$this, 'featured_image_meta_box_callback'],
            'product',
            'side',
            'low'
        );

        // Gallery Image Generator Meta Box - positioned in side column after product gallery
        add_meta_box(
            'wc_product_gallery_generator_box',
            __('Generate Gallery Images', 'ai-content-generator-for-woocommerce'),
            [$this, 'gallery_image_meta_box_callback'],
            'product',
            'side',    // Changed to 'side' to appear in right sidebar
            'default'  // Using 'default' priority to appear after product gallery
        );
    }

    /**
     * Renders the content of the image generation meta box
     *
     * @param WP_Post $post The post object
     * @return void
     */
    public function featured_image_meta_box_callback($post) {
        $post_id = absint($post->ID);
        
        printf(
            '<p>%s</p>',
            esc_html__('Generate featured image based on product details.', 'ai-content-generator-for-woocommerce')
        );
        
        printf(
            '<button type="button" class="button button-primary" id="generate-product-image" data-post-id="%d">%s</button>',
            absint( $post_id ),
            esc_html__('Generate Featured Image', 'ai-content-generator-for-woocommerce')
        );
        
        // Add status div with display:none
        echo '<div id="featured-image-generation-status" class="generation-status" style="display: none;"></div>';

        // Add preview container
        ?>
        <div id="featured-image-preview-container" class="image-preview-container" style="margin-top: 10px; display: none;">
            <div id="featured-image-grid" class="image-grid"></div>
            <?php
            printf(
                '<button type="button" class="button" id="regenerate-featured-image" style="margin-top: 15px;">%s</button>',
                esc_html__('Generate More Images', 'ai-content-generator-for-woocommerce')
            );
            ?>
        </div>
        <?php
        wp_nonce_field('wc_product_image_generator_nonce', 'wc_product_image_generator_nonce');
    }

    /**
     * Renders the content of the gallery image generation meta box
     *
     * @param WP_Post $post The post object
     * @return void
     */
    public function gallery_image_meta_box_callback($post) {
        $post_id = absint($post->ID);
        
        printf(
            '<p>%s</p>',
            esc_html__('Generate gallery images based on product details.', 'ai-content-generator-for-woocommerce')
        );
        
        printf(
            '<button type="button" class="button button-primary" id="generate-gallery-images" data-post-id="%d">%s</button>',
            absint( $post_id ),
            esc_html__('Generate Gallery Images', 'ai-content-generator-for-woocommerce')
        );
        
        echo '<div id="gallery-generation-status" class="generation-status"></div>';
        ?>
        <div id="gallery-image-preview-container" class="image-preview-container" style="margin-top: 10px; display: none;">
            <div id="gallery-image-grid" class="image-grid" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; margin-bottom: 10px;"></div>
            <?php
            printf(
                '<button type="button" class="button" id="regenerate-gallery-images" style="margin-top: 15px;">%s</button>',
                esc_html__('Generate More Gallery Images', 'ai-content-generator-for-woocommerce')
            );
            ?>
        </div>
        <?php
    }

    /**
     * Handles AJAX request to generate product image
     */
    public function ajax_generate_product_image() {
        if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash($_POST['nonce']) ), 'wc_product_image_generator_nonce')) {
            wp_send_json_error(['message' => 'Invalid nonce.']);
        }

        $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : false;
        if (!$post_id) {
            wp_send_json_error(['message' => 'Invalid post ID.']);
        }

        $api_key = get_option('wtofe_chatgpt_api_key');
        if (!$api_key) {
            wp_send_json_error(['message' => 'API key is missing.']);
        }

        // Log the request
        $this->log_debug('Generating product image', [
            'post_id' => $post_id,
            'is_preview' => isset($_POST['preview_only']),
            'is_gallery' => isset($_POST['is_gallery'])
        ]);

        $response = wp_remote_post('https://api.openai.com/v1/images/generations', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $api_key
            ],
            'body' => wp_json_encode([
                'prompt' => $this->generate_image_prompt($post_id),
                'n' => 2,
                'size' => '1024x1024',
                'response_format' => 'url'
            ]),
            'timeout' => 30
        ]);

        // Log the response
        $this->log_debug('API Response received', [
            'response' => $response,
            'is_wp_error' => is_wp_error($response)
        ]);

        if (is_wp_error($response)) {
            wp_send_json_error(['message' => $response->get_error_message()]);
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if (isset($data['data'])) {
            wp_send_json_success([
                'message' => 'Images generated successfully.',
                'image_urls' => array_map(function($item) {
                    return $item['url'];
                }, $data['data'])
            ]);
        } else {
            $error_message = isset($data['error']['message']) ? $data['error']['message'] : 'Unknown error.';
            $this->log_debug('API Error', ['error' => $data['error'] ?? 'Unknown error']);
            wp_send_json_error(['message' => 'Failed to generate images. ' . $error_message]);
        }
    }

    /**
     * Handles AJAX request to attach a generated image to a product
     */
    public function ajax_attach_generated_image() {
        check_ajax_referer('wc_product_image_generator_nonce', 'nonce');

        $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : false;
        $image_url = isset($_POST['image_url']) ? esc_url_raw($_POST['image_url']) : '';
        $is_gallery = isset($_POST['is_gallery']) && $_POST['is_gallery'] === '1';

        if (!$post_id || !$image_url) {
            wp_send_json_error(['message' => 'Missing required parameters.']);
            return;
        }

        try {
            // Get product details for metadata
            $product = wc_get_product($post_id);
            if (!$product) {
                throw new Exception('Invalid product.');
            }
            
            // Get product name for metadata
            $product_name = $product->get_name();
            
            // Download image
            require_once(ABSPATH . 'wp-admin/includes/media.php');
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            require_once(ABSPATH . 'wp-admin/includes/image.php');

            // Use WordPress media handling functions
            $tmp = download_url($image_url);
            if (is_wp_error($tmp)) {
                throw new Exception('Failed to download image: ' . $tmp->get_error_message());
            }

            $file_array = array(
                'name' => 'product-image-' . $post_id . '-' . time() . '.png',
                'tmp_name' => $tmp
            );

            // Prepare attachment data with product metadata
            $attachment_data = array(
                'post_title' => $product_name,
                'post_content' => $product_name,
                'post_excerpt' => $product_name
            );

            // Do the validation and storage stuff
            $attach_id = media_handle_sideload($file_array, $post_id, '', $attachment_data);

            // If error storing permanently, unlink
            if (is_wp_error($attach_id)) {
                wp_delete_file($file_array['tmp_name']);
                throw new Exception($attach_id->get_error_message());
            }

            // Set alt text for the attachment
            update_post_meta($attach_id, '_wp_attachment_image_alt', $product_name);

            if ($is_gallery) {
                // Get existing gallery
                $gallery = get_post_meta($post_id, '_product_image_gallery', true);
                $gallery_array = array_filter(explode(',', $gallery));
                
                // Add new image
                $gallery_array[] = $attach_id;
                
                // Update gallery preserving existing images
                $gallery_string = implode(',', array_unique($gallery_array));
                
                // Update both post meta and WooCommerce product meta
                update_post_meta($post_id, '_product_image_gallery', $gallery_string);
                $product->set_gallery_image_ids($gallery_array);
                $product->save();

                wp_send_json_success([
                    'message' => 'Image added to gallery successfully',
                    'attachment_id' => $attach_id,
                    'gallery_ids' => $gallery_array
                ]);
            } else {
                // Set as featured image
                set_post_thumbnail($post_id, $attach_id);
                
                // Update WooCommerce product meta
                $product->set_image_id($attach_id);
                $product->save();
                
                wp_send_json_success([
                    'message' => 'Featured image set successfully',
                    'attachment_id' => $attach_id
                ]);
            }

        } catch (Exception $e) {
            wp_send_json_error(['message' => $e->getMessage()]);
        }
    }

    /**
     * Adds description generator buttons to the editor
     */
    public function add_description_generator_button() {
        $screen = get_current_screen();
        if ($screen->base !== 'post' || $screen->post_type !== 'product') {
            return;
        }

        // Add loading indicators
        ?>
        <div id="description-generating" class="description-generating" style="display: none;">
            <span class="spinner is-active"></span>
            <span><?php esc_html_e('Generating description...', 'ai-content-generator-for-woocommerce'); ?></span>
        </div>
        <div id="short-description-generating" class="description-generating" style="display: none;">
            <span class="spinner is-active"></span>
            <span><?php esc_html_e('Generating short description...', 'ai-content-generator-for-woocommerce'); ?></span>
        </div>
        <?php
    }

    /**
     * Handles AJAX request to generate product description
     */
    public function ajax_generate_product_description() {
        // Use the same nonce for all operations
        if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'wc_product_image_generator_nonce')) {
            wp_send_json_error(['message' => 'Invalid nonce.']);
            return;
        }

        $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : false;
        if (!$post_id) {
            wp_send_json_error(['message' => 'Invalid post ID.']);
            return;
        }

        $title = get_the_title($post_id);
        $tone = isset($_POST['tone']) ? sanitize_text_field(wp_unslash( $_POST['tone'] ) ) : 'formal';

        // Define tone instructions
        $tone_instructions = [
            'formal' => 'Write in a professional and business-like tone, using proper language and maintaining credibility.',
            'casual' => 'Write in a friendly, conversational tone that connects with everyday shoppers.',
            'persuasive' => 'Write in a compelling, action-oriented tone that emphasizes benefits and drives sales.',
            'technical' => 'Write in a detailed, specification-focused tone that highlights technical features and capabilities.',
            'luxury' => 'Write in an elegant, sophisticated tone that emphasizes exclusivity and premium quality.',
            'creative' => 'Write in an imaginative, engaging tone that tells a story and captures attention.'
        ];

        $tone_instruction = isset($tone_instructions[$tone]) ? $tone_instructions[$tone] : $tone_instructions['formal'];

        $api_key = get_option('wtofe_chatgpt_api_key');
        if (!$api_key) {
            wp_send_json_error(['message' => 'API key is missing.']);
            return;
        }

        // Log the request if debug is enabled
        $this->log_debug('Generating product description', [
            'post_id' => $post_id,
            'tone' => $tone
        ]);

        $response = wp_remote_post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $api_key
            ],
            'body' => wp_json_encode([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are a professional product description writer. ' . $tone_instruction
                    ],
                    [
                        'role' => 'user',
                        'content' => "Write both a short excerpt (max 50 words) and a detailed product description for a product titled: $title. Format the detailed description in HTML. Separate the excerpt and description with [EXCERPT] and [DESCRIPTION] tags."
                    ]
                ],
                'max_tokens' => 500,
                'temperature' => 0.7
            ]),
            'timeout' => 30
        ]);

        if (is_wp_error($response)) {
            wp_send_json_error(['message' => $response->get_error_message()]);
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if (isset($data['choices'][0]['message']['content'])) {
            $content = $data['choices'][0]['message']['content'];
            
            // Split content into excerpt and description
            preg_match('/\[EXCERPT\](.*?)\[DESCRIPTION\](.*)/s', $content, $matches);
            
            $excerpt = isset($matches[1]) ? trim($matches[1]) : '';
            $description = isset($matches[2]) ? trim($matches[2]) : $content;
            
            wp_send_json_success([
                'message' => 'Description generated successfully.',
                'description' => wp_kses_post($description),
                'excerpt' => wp_kses_post($excerpt)
            ]);
        } else {
            $error_message = isset($data['error']['message']) ? $data['error']['message'] : 'Unknown error.';
            wp_send_json_error(['message' => 'Failed to generate description. ' . $error_message]);
        }
    }

    /**
     * Handles AJAX request to generate product short description
     */
    public function ajax_generate_product_short_description() {
        // Use the same nonce for all operations
        if (!isset($_POST['nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'wc_product_image_generator_nonce')) {
            wp_send_json_error(['message' => 'Invalid nonce.']);
            return;
        }

        $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : false;
        if (!$post_id) {
            wp_send_json_error(['message' => 'Invalid post ID.']);
        }

        $title = get_the_title($post_id);
        $description = get_post_field('post_content', $post_id);
        $tone = isset($_POST['tone']) ? sanitize_text_field(wp_unslash( $_POST['tone']) ) : 'formal';

        $api_key = get_option('wtofe_chatgpt_api_key');
        if (!$api_key) {
            wp_send_json_error(['message' => 'API key is missing.']);
        }

        // Specific prompt for short description
        $prompt = "Write a concise, engaging short description (max 2-3 sentences) for an e-commerce product titled '$title'. ";
        
        switch ($tone) {
            case 'formal':
                $prompt .= "Use a professional and business-like tone.";
                break;
            case 'casual':
                $prompt .= "Use a friendly, conversational tone.";
                break;
            case 'persuasive':
                $prompt .= "Use a compelling, sales-focused tone.";
                break;
            case 'technical':
                $prompt .= "Focus on technical specifications and features.";
                break;
            case 'luxury':
                $prompt .= "Emphasize premium quality and exclusivity.";
                break;
            case 'creative':
                $prompt .= "Use creative and engaging language.";
                break;
        }

        $response = wp_remote_post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $api_key
            ],
            'body' => wp_json_encode([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are a professional e-commerce copywriter specializing in concise product descriptions.'
                    ],
                    [
                        'role' => 'user',
                        'content' => $prompt
                    ]
                ],
                'max_tokens' => 150,
                'temperature' => 0.7
            ]),
            'timeout' => 30
        ]);

        if (is_wp_error($response)) {
            wp_send_json_error(['message' => $response->get_error_message()]);
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if (isset($data['choices'][0]['message']['content'])) {
            wp_send_json_success([
                'description' => wpautop($data['choices'][0]['message']['content'])
            ]);
        } else {
            wp_send_json_error(['message' => 'Failed to generate description.']);
        }
    }

    /**
     * Enqueues necessary scripts and styles
     */
    public function enqueue_scripts($hook) {
        // Only load on product add/edit pages
        if (!in_array($hook, array('post.php', 'post-new.php'))) {
            return;
        }

        // Get current screen
        $screen = get_current_screen();
        if (!$screen || $screen->post_type !== 'product') {
            return;
        }

        // Enqueue CSS
        wp_enqueue_style(
            'wc-product-description-generator', 
            plugins_url('css/description-generator.css', __FILE__),
            array(),
            '1.0.0'
        );
        
        // Enqueue JavaScript
        wp_enqueue_script(
            'wc-product-description-generator',
            plugins_url('js/description-generator.js', __FILE__),
            array('jquery', 'wp-editor'),
            '1.0.0',
            true
        );

        // Pass necessary data to JavaScript
        wp_localize_script('wc-product-description-generator', 'wcProdDescGen', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('wc_product_image_generator_nonce'),
            'postId' => get_the_ID(),
            'generateDesc' => __('Generate Description', 'ai-content-generator-for-woocommerce'),
            'generateShortDesc' => __('Generate Short Description', 'ai-content-generator-for-woocommerce')
        ));
    }

    /**
     * Adds the gallery generator meta box
     */
    public function register_meta_boxes() {
        add_action('add_meta_boxes', [$this, 'add_meta_boxes'], 30); // Higher priority number to run after WooCommerce
        add_action('do_meta_boxes', function() {
            // Remove the default position if it was added
            remove_meta_box('wc_product_gallery_generator_box', 'product', 'side');
            
            // Re-add in the desired position
            add_meta_box(
                'wc_product_gallery_generator_box',
                __('Generate Gallery Images', 'ai-content-generator-for-woocommerce'),
                [$this, 'gallery_image_meta_box_callback'],
                'product',
                'normal',
                'high'
            );
        }, 30);
    }

    /**
     * Logs debug information if debug mode is enabled
     *
     * Uses WooCommerce logger to store debug information with 'webtoffee-ai' source
     *
     * @since 1.0.0
     * @param string $message The message to log
     * @param array $data Additional data to log
     * @return void
     */
    private function log_debug($message, $data = array()) {
        if (!get_option('wtofe_ai_debug_mode', false)) {
            return;
        }

        if (!class_exists('WC_Logger')) {
            return;
        }

        $logger = wc_get_logger();
        $context = array('source' => 'webtoffee-ai');

        if (is_array($data) || is_object($data)) {
            $message .= ' Data: ' . print_r($data, true);
        }

        $logger->debug($message, $context);
    }

    /**
     * Generates an image prompt based on product details
     *
     * Takes product information including title, categories, tags, and description
     * to create a detailed prompt for the image generation API.
     *
     * @since 1.0.0
     * @param int $post_id The product ID
     * @return string The generated prompt
     */
    private function generate_image_prompt($post_id) {
        $product = wc_get_product(absint($post_id));
        if (!$product) {
            return '';
        }

        // Get product details
        $title = $product->get_name();
        $description = $product->get_description();
        $short_description = $product->get_short_description();
        $categories = wp_get_post_terms(absint($post_id), 'product_cat', array('fields' => 'names'));
        $tags = wp_get_post_terms(absint($post_id), 'product_tag', array('fields' => 'names'));

        // Build the prompt
        $prompt_parts = array();
        $prompt_parts[] = "Product: " . esc_html($title);

        if (!empty($categories)) {
            $prompt_parts[] = "Category: " . esc_html(implode(', ', $categories));
        }

        if (!empty($tags)) {
            $prompt_parts[] = "Tags: " . esc_html(implode(', ', $tags));
        }

        if (!empty($short_description)) {
            $prompt_parts[] = "Details: " . esc_html(wp_strip_all_tags($short_description));
        }

        $prompt_parts[] = esc_html__('Style: Professional product photography, high quality, white background, clear lighting, centered composition', 'ai-content-generator-for-woocommerce');

        $prompt = implode(". ", $prompt_parts);
        $this->log_debug('Generated image prompt', ['prompt' => $prompt]);

        return $prompt;
    }

    /**
     * Handles AJAX request to get product gallery
     */
    public function ajax_get_product_gallery() {
        check_ajax_referer('wc_product_image_generator_nonce', 'nonce');
        
        $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
        if (!$post_id) {
            wp_send_json_error('Invalid post ID');
        }

        $gallery_ids = get_post_meta($post_id, '_product_image_gallery', true);
        $gallery_ids = array_filter(explode(',', $gallery_ids));
        
        wp_send_json_success($gallery_ids);
    }
}

new WTOFE_WC_AI_Content_Generator();
