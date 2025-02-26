<?php

/**
 * The admin-specific functionality of the plugin.
 *
 
 * @since      1.0.0
 *
 * @package    AATG_Text_Generator
 * @subpackage AATG_Text_Generator/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    AATG_Text_Generator
 * @subpackage AATG_Text_Generator/admin
 * @author     codersantosh <codersantosh@gmail.com>
 */
class AATG_Text_Generator_Admin {

    private static $instance = null;

	/**
	 * The ID of this plugin.
     * Used on slug of plugin menu.
     * Used on Root Div ID for React too.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		add_action('init', array($this, 'register_ajax_handlers'));
		// Add bulk action to the dropdown
		add_filter('bulk_actions-upload', array($this, 'add_bulk_action_option'));
		// Handle the bulk action
		add_filter('handle_bulk_actions-upload', array($this, 'handle_bulk_action'), 10, 3);
		// Add admin notice for bulk generation
		add_action('admin_notices', array($this, 'bulk_action_admin_notice'));

	}

    public static function get_instance() {
        if (self::$instance === null) {
            self::$instance = new self( 'ai-alt-text-generator', '1.0.0', '1.0.0');
        }
        return self::$instance;
    }

    /**
     * Add Admin Page Menu page.
     *
     * @since    1.0.0
     */
    public function add_admin_menu() {

        add_menu_page(
            esc_html__( 'AI Alt Generator', 'ai-alt-text-generator' ),
            esc_html__( 'AI Alt Generator', 'ai-alt-text-generator' ),
            'manage_options',
            $this->plugin_name,
            array( $this, 'add_setting_root_div' ),
            plugin_dir_url( __FILE__ ) . 'images/alt-icon.png' // Add the icon path here
        );
    }

    /**
     * Add Root Div For React.
     *
     * @since    1.0.0
     */
    public function add_setting_root_div() {
        echo '<div id="' . esc_attr( $this->plugin_name ) . '"></div>';
    }

	/**
	 * Register the CSS/JavaScript Resources for the admin area.
	 *
	 * Use Condition to Load it Only When it is Necessary
	 *
	 * @since    1.0.0
	 */
	public function enqueue_resources() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in AATG_Text_Generator_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The AATG_Text_Generator_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$screen              = get_current_screen();
		$admin_scripts_bases = array( 'toplevel_page_' . $this->plugin_name );
		if ( ! ( isset( $screen->base ) && in_array( $screen->base, $admin_scripts_bases ) ) ) {
			return;
		}

        // Enqueue WordPress media scripts
        wp_enqueue_media();

        wp_enqueue_style( 'at-grid', esc_url( AATG_TEXT_GENERATOR_URL . 'assets/library/at-grid/at-grid.min.css'), array(), $this->version );

        $at_grid_css_var = "
            :root{
                --at-container-sm: 540px;
                --at-container-md: 720px;
                --at-container-lg: 960px;
                --at-container-xl: 1140px;
                --at-gutter:15px;
            }
        ";
        wp_add_inline_style( 'at-grid', $at_grid_css_var );

        /*Scripts dependency files*/
        $deps_file = AATG_TEXT_GENERATOR_PATH . 'build/admin/settings.asset.php';

        /*Fallback dependency array*/
        $dependency = [];
        $version = $this->version;

        /*Set dependency and version*/
        if ( file_exists( $deps_file ) ) {
            $deps_file = require( $deps_file );
            $dependency      = $deps_file['dependencies'];
            $version      = $deps_file['version'];
        }


		wp_enqueue_script( $this->plugin_name, esc_url( AATG_TEXT_GENERATOR_URL . 'build/admin/settings.js' ), $dependency, $version, true );

		wp_enqueue_style( $this->plugin_name, esc_url( AATG_TEXT_GENERATOR_URL . 'build/admin/style-settings.css' ), array('wp-components'), $version );

		$localize = array(
			'version' => $this->version,
			'root_id' => $this->plugin_name,
		);
        wp_set_script_translations( $this->plugin_name, $this->plugin_name );
		wp_localize_script( $this->plugin_name, 'wpReactPluginBoilerplateBuild', $localize );
	}

    public function add_bulk_action_option( $bulk_actions ) {
        $bulk_actions['generate_alt_text'] = esc_html__( 'Generate Alt Text', 'ai-alt-text-generator' );
        return $bulk_actions;
    }

    public function enqueue_media_admin_scripts() {
        // only in media and post edit pages
        if ( ! ( 'post.php' === $GLOBALS['pagenow'] || 'post-new.php' === $GLOBALS['pagenow'] || 'upload.php' === $GLOBALS['pagenow'] ) ) {
            return;
        }
        wp_enqueue_script( 'ai-alt-text-generator-media', esc_url( plugin_dir_url( __FILE__ ) . 'js/media-button.js' ), array( 'jquery', 'wp-media-utils', 'media-editor' ), $this->version, true );
        wp_enqueue_script(
            'alt-gen-gutenberg-blocks',
            AATG_TEXT_GENERATOR_URL . 'build/admin/blocks.js', // Adjust the path
            array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'),
            $this->version
        );
        $nonce = wp_create_nonce( 'alt_gen_ajax_nonce' );
        wp_localize_script( 'ai-alt-text-generator-media', 'aiAltTextGenerator', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'nonce' => $nonce ) );
    }

    public function add_admin_css() {
        echo '<style>
        #toplevel_page_' . esc_attr( $this->plugin_name ) . ' a.menu-top img {
            opacity: 1;
            width: 28px;
            margin-top: -5px;
        }
        </style>';
    }
    

    // AJAX Handler Function
    public function generate_alt_text_ajax() {
        try {
            // Check nonce
            if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'alt_gen_ajax_nonce')) {
                wp_send_json_error([
                    'message' => 'Security check failed.',
                    'debug' => [
                        'nonce_exists' => isset($_POST['nonce']),
                        'provided_nonce' => $_POST['nonce'] ?? 'not set'
                    ]
                ]);
                return;
            }

            $attachment_id = null;
            $image_url = null;

            // First try to get attachment ID directly
            if (!empty($_POST['post_id'])) {
                $attachment_id = absint($_POST['post_id']);
                // Get the full size image URL
                $image_url = wp_get_attachment_url($attachment_id);
                
                // If we're in the list view and the above fails, try getting from the current page URL
                if (!$image_url && isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], 'post.php') !== false) {
                    $post_id = isset($_GET['post']) ? absint($_GET['post']) : 0;
                    if ($post_id) {
                        $image_url = wp_get_attachment_url($post_id);
                        $attachment_id = $post_id;
                    }
                }
            }
            // If no ID, try to get from URL
            else if (!empty($_POST['image_url'])) {
                $image_url = esc_url_raw($_POST['image_url']);
                // Only try to get attachment ID if it's a local URL
                if (strpos($image_url, site_url()) !== false) {
                    $attachment_id = attachment_url_to_postid($image_url);
                }
            }
            // If still no URL, try getting from the img tag in the page
            if (!$image_url && $attachment_id) {
                $image_url = wp_get_attachment_url($attachment_id);
            }

            // Debug information
            $debug_info = [
                'received_post_id' => $_POST['post_id'] ?? 'not set',
                'received_image_url' => $_POST['image_url'] ?? 'not set',
                'processed_attachment_id' => $attachment_id,
                'processed_image_url' => $image_url,
                'request_uri' => $_SERVER['REQUEST_URI'] ?? 'not set',
                'post_data' => $_POST,
                'is_external' => $image_url ? strpos($image_url, site_url()) === false : null
            ];

            // Validate we have at least a URL
            if (empty($image_url)) {
                wp_send_json_error([
                    'message' => 'Could not find image URL.',
                    'debug' => $debug_info
                ]);
                return;
            }

            // Get OpenAI API key
            $options = get_option('aatg_text_generator_options');
            if (empty($options['openai_key'])) {
                wp_send_json_error([
                    'message' => 'OpenAI API key is not configured. Please configure it in the plugin settings.',
                    'debug' => $debug_info
                ]);
                return;
            }

            // Generate alt text
            $alt_text = $this->generate_alt_text_with_openai($image_url);

            if (empty($alt_text)) {
                wp_send_json_error([
                    'message' => 'Failed to generate alt text. Please check the error log for details.',
                    'debug' => $debug_info
                ]);
                return;
            }

            // If we have an attachment ID, save the alt text
            if ($attachment_id) {
                update_post_meta($attachment_id, '_wp_attachment_image_alt', $alt_text);
            }

            wp_send_json_success($alt_text);

        } catch (Exception $e) {
            wp_send_json_error([
                'message' => $e->getMessage(),
                'debug' => $debug_info ?? []
            ]);
        }
    }
    

    public function handle_bulk_action($redirect_to, $doaction, $post_ids) {
        if ($doaction !== 'generate_alt_text') {
            return $redirect_to;
        }

        $processed = 0;
        $failed = 0;

        foreach ($post_ids as $post_id) {
            // Verify this is an image attachment
            if (!wp_attachment_is_image($post_id)) {
                $failed++;
                continue;
            }

            try {
                // Get the image URL
                $image_url = wp_get_attachment_url($post_id);
                if (!$image_url) {
                    $failed++;
                    continue;
                }

                // Generate alt text
                $alt_text = $this->generate_alt_text_with_openai($image_url);
                
                if ($alt_text) {
                    // Update the alt text
                    update_post_meta($post_id, '_wp_attachment_image_alt', $alt_text);
                    $processed++;
                } else {
                    $failed++;
                }
            } catch (Exception $e) {
                if (defined('WP_DEBUG') && WP_DEBUG) {
                    error_log('Failed to generate alt text for image ' . $post_id . ': ' . $e->getMessage());
                }
                $failed++;
            }
        }

        // Add query args for the admin notice
        $redirect_to = add_query_arg(array(
            'aatg_text_generated' => $processed,
            'aatg_text_failed' => $failed,
            'aatg_text_total' => count($post_ids)
        ), $redirect_to);

        return $redirect_to;
    }

    public function bulk_action_admin_notice() {
        if (!empty($_REQUEST['aatg_text_generated'])) {
            $processed = intval($_REQUEST['aatg_text_generated']);
            $failed = intval($_REQUEST['aatg_text_failed'] ?? 0);
            $total = intval($_REQUEST['aatg_text_total'] ?? $processed);

            $message = sprintf(
                /* translators: 1: number of processed images, 2: total number of images */
                _n(
                    'Generated alt text for %1$d out of %2$d image.',
                    'Generated alt text for %1$d out of %2$d images.',
                    $total,
                    'ai-alt-text-generator'
                ),
                $processed,
                $total
            );

            if ($failed > 0) {
                $message .= ' ' . sprintf(
                    /* translators: %d: number of failed images */
                    _n(
                        '%d image failed.',
                        '%d images failed.',
                        $failed,
                        'ai-alt-text-generator'
                    ),
                    $failed
                );
            }

            printf(
                '<div class="notice notice-%1$s is-dismissible"><p>%2$s</p></div>',
                ($failed > 0 ? 'warning' : 'success'),
                esc_html($message)
            );
        }
    }

    public function get_image_url_by_size($post_id, $size = 'thumbnail') {
        // Get the image attachment URL in the specified size
        $image = wp_get_attachment_image_src($post_id, $size);
    
        // Check if the image exists
        if ($image) {
            return $image[0]; // URL of the image
        }
    
        return false; // Return false if the image doesn't exist
    }

    public function generate_alt_text_for_image_function( $post_id ) {
        // Get the smaller image URL (e.g., thumbnail)
        $image_url = $this->get_image_url_by_size($post_id, 'thumbnail');

        // Generate alt text using the OpenAI API
        $alt_text = $this->generate_alt_text_with_openai( $image_url );

        // Update the alt text for the media item
        update_post_meta( $post_id, '_wp_attachment_image_alt', $alt_text );
    }

    public function generate_alt_text_on_upload( $attachment_id ) {
        // Check if the attachment is an image
        if ( wp_attachment_is_image( $attachment_id ) ) {
            // Get the image URL
            $image_url = $this->get_image_url_by_size($attachment_id, 'thumbnail');

            // Generate alt text using OpenAI
            $alt_text = $this->generate_alt_text_with_openai( $image_url );

            // Update the alt text for the media item
            update_post_meta( $attachment_id, '_wp_attachment_image_alt', $alt_text );
        }
    }

    public function generate_alt_text_with_openai($image_url) {
        try {
            // OpenAI API key from settings
            $options = get_option('aatg_text_generator_options');
            $openai_key = $options['openai_key'];

            if (empty($openai_key)) {
                throw new Exception('OpenAI API key not configured');
            }

            // Get image data using WordPress functions
            $upload_dir = wp_upload_dir();
            $image_path = str_replace($upload_dir['baseurl'], $upload_dir['basedir'], $image_url);
            
            if (!file_exists($image_path)) {
                throw new Exception('Image file not found at path: ' . $image_path);
            }

            $image_data = file_get_contents($image_path);
            if ($image_data === false) {
                throw new Exception('Failed to read image data from path: ' . $image_path);
            }

            $image_base64 = base64_encode($image_data);

            // Get prompt and language from settings
            $prompt = $options['prompt'] ?? 'Create a SEO optimized alt text for this image. Don\'t include quotes and keep it informative and concise.';
            $language = $options['language'] ?? 'english';
            $prompt_with_lang = $prompt . ' Write it in this language: ' . $language;

            // Set up the request to OpenAI
            $api_url = 'https://api.openai.com/v1/chat/completions';
            $headers = [
                'Authorization' => 'Bearer ' . $openai_key,
                'Content-Type'  => 'application/json',
            ];

            $body = wp_json_encode([
                'model' => 'gpt-4o-mini',
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => [
                            [
                                'type' => 'text',
                                'text' => $prompt_with_lang,
                            ],
                            [
                                'type' => 'image_url',
                                'image_url' => [
                                    'url' => 'data:image/jpeg;base64,' . $image_base64
                                ],
                            ],
                        ],
                    ],
                ],
                'max_tokens' => 100,
            ]);
        
            // Send the request
            $response = wp_remote_post($api_url, [
                'headers' => $headers,
                'body'    => $body,
                'timeout' => 30,
            ]);
        
            if (is_wp_error($response)) {
                throw new Exception('OpenAI API request failed: ' . $response->get_error_message());
            }
        
            $response_code = wp_remote_retrieve_response_code($response);
            if ($response_code !== 200) {
                $response_body = wp_remote_retrieve_body($response);
                $error_data = json_decode($response_body, true);
                $error_message = isset($error_data['error']['message']) ? $error_data['error']['message'] : 'Unknown error';
                throw new Exception('OpenAI API error: ' . $error_message . ' (Status code: ' . $response_code . ')');
            }

            $body = wp_remote_retrieve_body($response);
            $data = json_decode($body);
        
            if (!$data || !isset($data->choices[0]->message->content)) {
                throw new Exception('Invalid response from OpenAI API: ' . $body);
            }

            return trim($data->choices[0]->message->content);

        } catch (Exception $e) {
            // Only log critical errors in production
            if (defined('WP_DEBUG') && WP_DEBUG) {
                error_log('Exception in generate_alt_text_with_openai: ' . $e->getMessage());
            }
            throw $e;
        }
    }

    private function generate_alt_text_with_openai_batch( $images_data ) {
        // OpenAI API key from settings
        $openai_key = get_option( 'aatg_text_generator_options' )['openai_key'];
    
        // Prepare tasks
        $tasks = [];
        foreach ( $images_data as $index => $image_data ) {
            $sanitized_url = esc_url_raw( $image_data['image_url'] );
            $image = file_get_contents( $sanitized_url );
            if ( $image === false ) {
                // Handle error, perhaps log it or notify the admin
                continue;
            }
            $image_base64 = base64_encode( $image );
    
            $task = [
                'custom_id' => 'task-' . $index,
                'method' => 'POST',
                'url' => '/v1/chat/completions',
                'body' => [
                    'model' => 'gpt-4o',
                    'temperature' => 0.2,
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => 'Your goal is to generate a SEO optimized alt text for this image. Don\'t include quotes and keep it informative and concise.',
                        ],
                        [
                            'role' => 'user',
                            'content' => [
                                [
                                    'type' => 'text',
                                    'text' => 'Create a SEO optimized alt text for this image. Don\'t include quotes and keep it informative and concise.',
                                ],
                                [
                                    'type' => 'image_url',
                                    'image_url' => [
                                        'url' => 'data:image/jpeg;base64,' . $image_base64,
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ];
    
            $tasks[] = $task;
        }
    
        // Create JSONL file
        $file_name = 'batch_tasks_images.jsonl';
        $file_path = wp_upload_dir()['basedir'] . '/' . $file_name;
        $file = fopen( $file_path, 'w' );
        foreach ( $tasks as $task ) {
            fwrite( $file, json_encode( $task ) . "\n" );
        }
        fclose( $file );
    
        // Upload the JSONL file to OpenAI using curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/files");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $openai_key,
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'file' => new CURLFile($file_path, 'application/jsonl', $file_name),
            'purpose' => 'batch',
        ]);
    
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            // Handle error
            return [];
        }
        curl_close($ch);
    
        $file_data = json_decode($response, true);
        $file_id = $file_data['id'] ?? '';
    
        if ( empty( $file_id ) ) {
            // Handle error
            return [];
        }
    
        // Create the batch job
        $batch_url = 'https://api.openai.com/v1/batches';
        $batch_response = wp_remote_post( $batch_url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $openai_key,
                'Content-Type'  => 'application/json',
            ],
            'body' => json_encode([
                'input_file_id' => $file_id,
                'endpoint' => '/v1/chat/completions',
                'completion_window' => '24h',
            ]),
        ]);
    
        if ( is_wp_error( $batch_response ) ) {
            // Handle error
            return [];
        }
    
        $batch_body = wp_remote_retrieve_body( $batch_response );
        $batch_data = json_decode( $batch_body, true );
        $batch_id = $batch_data['id'] ?? '';
    
        if ( empty( $batch_id ) ) {
            // Handle error
            return [];
        }
    
        // Check batch status (implement a mechanism to check status periodically if needed)
        $status_url = 'https://api.openai.com/v1/batches/' . $batch_id;
        do {
            $status_response = wp_remote_get( $status_url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $openai_key,
                ],
            ]);
    
            if ( is_wp_error( $status_response ) ) {
                // Handle error
                return [];
            }
    
            $status_body = wp_remote_retrieve_body( $status_response );
            $status_data = json_decode( $status_body, true );
    
            if ( $status_data['status'] === 'completed' ) {
                break;
            }
    
            // Wait before checking again
            sleep(60);
        } while ( $status_data['status'] !== 'completed' );
    
        // Retrieve results
        $result_file_id = $status_data['output_file_id'] ?? '';
        if ( empty( $result_file_id ) ) {
            // Handle error
            return [];
        }
    
        $result_url = 'https://api.openai.com/v1/files/' . $result_file_id . '/content';
        $result_response = wp_remote_get( $result_url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $openai_key,
            ],
        ]);
    
        if ( is_wp_error( $result_response ) ) {
            // Handle error
            return [];
        }
    
        $result_body = wp_remote_retrieve_body( $result_response );
        $results = explode("\n", trim( $result_body ));
    
        // Process results
        $alt_texts = [];
        foreach ( $results as $result ) {
            $result_data = json_decode( $result, true );
            $task_id = $result_data['custom_id'] ?? '';
            $alt_text = $result_data['response']['body']['choices'][0]['message']['content'] ?? '';
    
            if ( !empty( $task_id ) && !empty( $alt_text ) ) {
                $index = (int) str_replace('task-', '', $task_id);
                $alt_texts[] = [
                    'post_id' => $images_data[$index]['post_id'],
                    'alt_text' => $alt_text,
                ];
            }
        }
    
        return $alt_texts;
    }
    
    
    
    

    /**
     * Register settings.
     * Common callback function of rest_api_init and admin_init
     * Schema: http://json-schema.org/draft-04/schema#
     *
     * Add your own settings fields here
     *
     * @since 1.0.0
     *
     * @param null.
     * @return void
     */
    public function register_settings() {
        $defaults = aatg_text_generator_default_options();
        register_setting(
            'aatg_text_generator_settings_group',
            'aatg_text_generator_options',
            array(
                'type'         => 'object',
                'default'      => $defaults,
                'show_in_rest' => array(
                    'schema' => array(
                        'type'       => 'object',
                        'properties' => array(
                            /*===Settings===*/
                            /*Settings -> General*/
                            'openai_key' => array(
                                'type'              => 'string',
                                'default'           => $defaults['openai_key'],
                                'sanitize_callback' => 'sanitize_text_field', // Sanitize the API key
                            ),
                            'on_upload_alt_text' => array(
                                'type' => 'boolean',
                                'default' => $defaults['on_upload_alt_text']
                            ),
                            'all_alt_text' => array(
                                'type' => 'boolean',
                                'default' => $defaults['all_alt_text']
                            ),
                            'prompt' => array(
                                'type' => 'string',
                                'default' => $defaults['prompt']
                            ),
                            'language' => array(
                                'type' => 'string',
                                'default' => $defaults['language']
                            ),
                        ),
                    ),
                ),
            )
        );
    }

    /**
     * Register the AJAX handlers
     */
    public function register_ajax_handlers() {
        add_action('wp_ajax_generate_alt_text', array($this, 'generate_alt_text_ajax_handler'));
        add_action('wp_ajax_nopriv_generate_alt_text', array($this, 'generate_alt_text_ajax_handler'));
    }

    /**
     * Handle the generate alt text AJAX request
     */
    public function generate_alt_text_ajax_handler() {
        // Get the main plugin instance
        global $ai_alt_text_generator;
        
        if (method_exists($ai_alt_text_generator, 'generate_alt_text_ajax')) {
            $ai_alt_text_generator->generate_alt_text_ajax();
        } else {
            wp_send_json_error('Method not found');
        }
        
        wp_die();
    }
}
